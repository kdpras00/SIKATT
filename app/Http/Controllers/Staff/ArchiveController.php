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
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->input('search');
                return $query->where(function ($q) use ($search) {
                    $q->whereHas('user', function ($qu) use ($search) {
                        $qu->where('name', 'like', "%{$search}%")
                            ->orWhere('nik', 'like', "%{$search}%");
                    })
                    ->orWhere('purpose', 'like', "%{$search}%")
                    ->orWhere('letter_number', 'like', "%{$search}%");
                });
            })
            ->when($request->filled('letter_type_id'), function ($query) use ($request) {
                return $query->where('letter_type_id', $request->input('letter_type_id'));
            })
            ->when($request->filled('date'), function ($query) use ($request) {
                return $query->whereDate('updated_at', $request->input('date'));
            })
            ->latest()
            ->paginate(10);

        $letterTypes = \App\Models\LetterType::all();

        return view('staff.archive.index', compact('letters', 'status', 'letterTypes'));
    }
}
