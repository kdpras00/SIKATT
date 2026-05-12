<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    public function profil(): View
    {
        return view('pages.profil');
    }

    public function layanan(): View
    {
        $jenisSurat = [
            'Surat Keterangan Domisili',
            'Surat Keterangan Tidak Mampu (SKTM)',
            'Surat Keterangan Kelahiran',
            'Surat Keterangan Kematian',
            'Surat Keterangan Usaha (SKU)',
            'Surat Pengantar Nikah (N1-N4)',
            'Surat Keterangan Lainnya',
        ];

        return view('pages.layanan', compact('jenisSurat'));
    }

    public function status(): View
    {
        return view('pages.status');
    }

    public function pengumuman(): View
    {
        return view('pages.pengumuman');
    }

    public function kontak(): View
    {
        return view('pages.kontak');
    }
}
