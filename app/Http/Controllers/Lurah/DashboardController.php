<?php

namespace App\Http\Controllers\Lurah;

use App\Http\Controllers\Controller;
use App\Models\Letter;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'pending_verification' => Letter::processed()->count(),
            'verified_letters' => Letter::verified()->count(),
            'rejected_letters' => Letter::rejected()->count(),
            'total_requests' => Letter::count(),
        ];

        return view('lurah.dashboard', compact('stats'));
    }
}
