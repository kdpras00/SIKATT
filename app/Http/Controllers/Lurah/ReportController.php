<?php

namespace App\Http\Controllers\Lurah;

use App\Http\Controllers\Controller;
use App\Models\Letter;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private function getFilteredLettersQuery(Request $request)
    {
        return Letter::with(['user', 'letterType'])
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
            ->when($request->filled('status'), function ($query) use ($request) {
                return $query->where('status', $request->input('status'));
            })
            ->when($request->filled('start_date'), function ($query) use ($request) {
                return $query->whereDate('request_date', '>=', $request->input('start_date'));
            })
            ->when($request->filled('end_date'), function ($query) use ($request) {
                return $query->whereDate('request_date', '<=', $request->input('end_date'));
            })
            ->latest();
    }

    /**
     * Display reports.
     */
    public function index(Request $request)
    {
        $data = $this->getFilteredLettersQuery($request)->paginate(15);
        $letterTypes = \App\Models\LetterType::all();
        return view('lurah.reports.index', compact('data', 'letterTypes'));
    }


    public function printLetters(Request $request)
    {
        $letters = $this->getFilteredLettersQuery($request)->get();

        $logoBase64 = '';
        $logoPath = public_path('images/logo-tanah-tinggi.png');
        if (!file_exists($logoPath)) $logoPath = storage_path('app/public/images/logo-tanah-tinggi.png');
        if (file_exists($logoPath)) {
            $logoBase64 = 'data:' . mime_content_type($logoPath) . ';base64,' . base64_encode(file_get_contents($logoPath));
        }

        $sigBase64 = '';
        $sigPath = public_path('images/tanda-tangan-lurah.jpeg');
        if (!file_exists($sigPath)) $sigPath = storage_path('app/public/images/tanda-tangan-lurah.jpeg');
        if (file_exists($sigPath)) {
            $sigBase64 = 'data:' . mime_content_type($sigPath) . ';base64,' . base64_encode(file_get_contents($sigPath));
        }

        $pdf = \PDF::loadView('pdf.letters_report', compact('letters', 'logoBase64', 'sigBase64'));
        return $pdf->stream('Laporan-Arsip-Surat.pdf');
    }
}
