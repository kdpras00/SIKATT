<?php

namespace App\Http\Controllers\Lurah;

use App\Http\Controllers\Controller;
use App\Models\Letter;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display reports.
     */
    public function index(Request $request)
    {
        $data = Letter::with(['user', 'letterType'])->latest()->get();
        return view('lurah.reports.index', compact('data'));
    }


    public function printLetters()
    {
        $letters = Letter::with(['user', 'letterType'])->latest()->get();

        $logoBase64 = '';
        $logoPath = public_path('storage/images/logo-tanah-tinggi.png');
        if (!file_exists($logoPath)) $logoPath = storage_path('app/public/images/logo-tanah-tinggi.png');
        if (file_exists($logoPath)) {
            $logoBase64 = 'data:' . mime_content_type($logoPath) . ';base64,' . base64_encode(file_get_contents($logoPath));
        }

        $sigBase64 = '';
        $sigPath = public_path('storage/images/tanda-tangan-lurah.jpeg');
        if (!file_exists($sigPath)) $sigPath = storage_path('app/public/images/tanda-tangan-lurah.jpeg');
        if (file_exists($sigPath)) {
            $sigBase64 = 'data:' . mime_content_type($sigPath) . ';base64,' . base64_encode(file_get_contents($sigPath));
        }

        $pdf = \PDF::loadView('pdf.letters_report', compact('letters', 'logoBase64', 'sigBase64'));
        return $pdf->stream('Laporan-Arsip-Surat.pdf');
    }
}
