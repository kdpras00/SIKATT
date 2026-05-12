<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Letter;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'verified');
        $letters = Letter::where('status', $status)
            ->with(['user', 'letterType'])
            ->latest()
            ->paginate(10);

        return view('staff.archive.index', compact('letters', 'status'));
    }
}
