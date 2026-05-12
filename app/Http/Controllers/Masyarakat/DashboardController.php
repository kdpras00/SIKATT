<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Letter;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $stats = [
            'pending_letters' => $user->letters()->pending()->count(),
            'verified_letters' => $user->letters()->verified()->count(),
        ];

        return view('masyarakat.dashboard', compact('stats'));
    }
}
