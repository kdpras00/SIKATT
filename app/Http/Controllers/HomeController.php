<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // If already authenticated, redirect to appropriate dashboard
        if (auth()->check()) {
            $user = auth()->user();
            
            if ($user->isStaff()) {
                return redirect('/staff/dashboard');
            } elseif ($user->isLurah()) {
                return redirect('/lurah/dashboard');
            } else {
                return redirect('/masyarakat/dashboard');
            }
        }

        return view('public.home');
    }

    public function layanan()
    {
        $letterTypes = \App\Models\LetterType::all();
        return view('public.layanan', compact('letterTypes'));
    }

    public function statistik()
    {
        // Real Data Tanah Tinggi 2024
        $total_penduduk = 24913;
        $total_laki = 12500;
        $total_perempuan = 12413;
        
        // System Stats
        $total_letters = Letter::verified()->count();
        return view('public.stats', compact(
            'total_penduduk', 
            'total_laki', 
            'total_perempuan', 
            'total_letters'
        ));
    }
    public function sejarah()
    {
        return view('public.profile.sejarah');
    }

    public function visiMisi()
    {
        return view('public.profile.visi-misi');
    }

    public function struktur()
    {
        return view('public.profile.struktur');
    }

    public function peta()
    {
        return view('public.profile.peta');
    }
}
