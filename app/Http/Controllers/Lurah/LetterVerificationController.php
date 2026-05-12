<?php

namespace App\Http\Controllers\Lurah;

use App\Http\Controllers\Controller;
use App\Models\Letter;
use App\Models\User;
use App\Notifications\LetterVerified;
use App\Notifications\LetterVerifiedForOperator;
use App\Notifications\RequestRejected;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class LetterVerificationController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'processed');

        $letters = Letter::with(['user', 'letterType', 'staff'])
            ->when($status, function ($query) use ($status) {
                if ($status === 'history') {
                    return $query->whereIn('status', ['verified', 'rejected']);
                }
                return $query->where('status', $status);
            })
            ->latest()
            ->paginate(10);

        return view('lurah.letters.index', compact('letters', 'status'));
    }

    public function show(Letter $letter)
    {
        $letter->load(['user', 'letterType', 'staff']);
        return view('lurah.letters.show', compact('letter'));
    }

    public function verify(Request $request, Letter $letter)
    {
        if ($letter->status !== 'processed') {
            return back()->with('error', 'Hanya surat yang sudah diproses admin yang dapat diverifikasi.');
        }

        $letter->update([
            'status' => 'verified',
            'lurah_id' => auth()->id(),
            'approved_date' => now(),
        ]);

        try {
            $letter->generateSHA256Hash();
        } catch (\Exception $e) {
            \Log::error('Failed to generate SHA-256 hash for letter: ' . $e->getMessage());
            return back()->with('warning', 'Surat berhasil diverifikasi, namun gagal memproses Tanda Tangan Digital. Silakan hubungi admin.');
        }

        $notification = auth()->user()->unreadNotifications
            ->where('data.letter_id', $letter->id)
            ->where('type', 'App\Notifications\LetterProcessed')
            ->first();
        
        if ($notification) {
            $notification->markAsRead();
        }

        $letter->user->notify(new LetterVerified($letter));

        $staff = User::role('staff')->get();
        Notification::send($staff, new LetterVerifiedForOperator($letter));

        return redirect()->back()->with('success', 'Surat berhasil diverifikasi dan Tanda Tangan Digital telah dibubuhkan.');
    }

    public function reject(Request $request, Letter $letter)
    {
        $request->validate(['reason' => 'required|string|max:255']);

        if ($letter->status !== 'processed') {
            return back()->with('error', 'Status surat tidak valid.');
        }

        $letter->update([
            'status' => 'rejected',
            'lurah_id' => auth()->id(),
            'rejection_reason' => $request->reason,
        ]);

        $notification = auth()->user()->unreadNotifications
            ->where('data.letter_id', $letter->id)
            ->where('type', 'App\Notifications\LetterProcessed')
            ->first();
        
        if ($notification) {
            $notification->markAsRead();
        }

        $letter->user->notify(new RequestRejected(
            'Permohonan surat ' . $letter->letterType->name . ' ditolak oleh Lurah: ' . $request->reason,
            route('masyarakat.letters.index', ['view' => 'history'])
        ));

        return redirect()->back()->with('success', 'Pengajuan surat ditolak.');
    }
}
