<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Letter;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'pending_letters' => Letter::pending()->count(),
            'processed_letters' => Letter::processed()->count(),
            'verified_letters' => Letter::verified()->count(),
        ];

        return view('staff.dashboard', compact('stats'));
    }
}
