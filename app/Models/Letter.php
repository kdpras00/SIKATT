<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

class Letter extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'staff_id',
        'lurah_id',
        'letter_type_id',
        'letter_number',
        'purpose',
        'request_date',
        'process_date',
        'approved_date',
        'status',
        'qr_code',
        'verification_code',
        'sha256_hash',
        'staff_notes',
        'rejection_reason',
        'attachment',
        'data',
    ];

    protected $casts = [
        'request_date' => 'datetime',
        'process_date' => 'datetime',
        'approved_date' => 'datetime',
        'data' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    public function lurah()
    {
        return $this->belongsTo(User::class, 'lurah_id');
    }

    public function letterType()
    {
        return $this->belongsTo(LetterType::class);
    }

    public function documentVerification()
    {
        return $this->hasOne(DocumentVerification::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeProcessed($query)
    {
        return $query->where('status', 'processed');
    }

    public function scopeVerified($query)
    {
        return $query->where('status', 'verified');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    public function generateVerificationCode()
    {
        $this->verification_code = strtoupper(Str::random(12));
        $this->save();
        return $this->verification_code;
    }

    public function generateQRCode()
    {
        if (!$this->verification_code) {
            $this->generateVerificationCode();
        }

        $url = url('/verify?code=' . $this->verification_code);
        $filename = 'qr_' . $this->verification_code . '.png';
        $path = storage_path('app/public/qrcodes/' . $filename);

        if (!file_exists(storage_path('app/public/qrcodes'))) {
            mkdir(storage_path('app/public/qrcodes'), 0755, true);
        }

        QrCode::format('png')
            ->size(300)
            ->generate($url, $path);

        $this->qr_code = 'qrcodes/' . $filename;
        $this->save();

        return $this->qr_code;
    }

    public function generateSHA256Hash()
    {
        $hashService = new \App\Services\DocumentHashService();
        $qrService = new \App\Services\QRCodeService();

        $hash = $hashService->generateHash($this);
        $verificationUrl = $hashService->generateVerificationUrl($hash);
        $qrCodePath = $qrService->generate($verificationUrl, 'qr_' . $hash);
        
        $this->sha256_hash = $hash;
        $this->qr_code = $qrCodePath;
        $this->save();
        
        $this->documentVerification()->create([
            'sha256_hash' => $hash,
            'verification_url' => $verificationUrl,
            'issued_at' => now(),
            'expires_at' => $this->calculateExpiration(),
        ]);
        
        return $hash;
    }

    public function isPending()
    {
        return $this->status === 'pending';
    }

    public function isProcessed()
    {
        return $this->status === 'processed';
    }

    public function isVerified()
    {
        return $this->status === 'verified';
    }

    public function isRejected()
    {
        return $this->status === 'rejected';
    }

    public function calculateExpiration()
    {
        $type = $this->letterType;
        if (!$type) return now()->addMonth(); 

        if ($type->slug === 'SKU') {
            return $this->approved_date->addYear();
        }
        
        return $this->approved_date ? $this->approved_date->addMonth() : now()->addMonth();
    }
}
