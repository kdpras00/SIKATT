<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
}
