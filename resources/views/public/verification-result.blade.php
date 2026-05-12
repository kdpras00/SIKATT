@extends('layouts.public')

@section('title', 'Hasil Verifikasi Surat - Website Resmi Kelurahan Tanah Tinggi')

@section('content')
<div class="relative min-h-[600px] flex items-center justify-center py-20 bg-gray-100">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('storage/images/background-tanah-tinggi2.jpeg') }}" class="w-full h-full object-cover opacity-10" alt="Background">
    </div>

    <div class="relative z-10 w-full max-w-2xl px-4">
        <div class="bg-white rounded-lg shadow-xl border-t-4 {{ isset($error) ? 'border-red-600' : 'border-green-600' }} overflow-hidden">
            <div class="{{ isset($error) ? 'bg-red-50' : 'bg-green-50' }} p-6 text-center border-b {{ isset($error) ? 'border-red-100' : 'border-green-100' }}">
                <img src="{{ asset('storage/images/logo-tanah-tinggi.png') }}" class="h-16 w-auto mx-auto mb-4" alt="Logo">
                <h2 class="text-2xl font-bold {{ isset($error) ? 'text-red-900' : 'text-green-900' }}">Hasil Verifikasi Dokumen</h2>
                <p class="{{ isset($error) ? 'text-red-600' : 'text-green-600' }} text-sm">Sistem Verifikasi Digital Kelurahan Tanah Tinggi</p>
            </div>
            
            <div class="p-8">
                @if(isset($error))
                    <!-- Error State -->
                    <div class="text-center">
                        <h3 class="text-2xl font-bold text-red-700 mb-3">Dokumen Tidak Valid</h3>
                        <p class="text-red-600 mb-6">{{ $error }}</p>
                        
                        <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                            <p class="text-sm text-red-800">
                                <strong>Peringatan:</strong> Dokumen ini mungkin palsu atau tidak terdaftar dalam sistem kami. 
                                Silakan hubungi kantor kelurahan untuk verifikasi lebih lanjut.
                            </p>
                        </div>
                        
                        <a href="{{ route('verification.index') }}" class="inline-block w-full py-3 bg-red-600 text-white font-bold rounded hover:bg-red-700 transition">
                            Cek Dokumen Lain
                        </a>
                    </div>
                @elseif(isset($letter))
                    <!-- Success State -->
                    <div class="text-center">
                        <h3 class="text-2xl font-bold text-green-700 mb-6">Dokumen Valid & Asli</h3>
                        
                        <!-- Document Details -->
                        <div class="space-y-3 text-left bg-gray-50 p-6 rounded-lg border border-gray-200 mb-6">
                            <div class="flex justify-between py-2 border-b border-gray-200">
                                <span class="text-gray-600 font-medium">Nomor Surat</span>
                                <span class="font-bold text-gray-900">{{ $letter->letter_number }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-200">
                                <span class="text-gray-600 font-medium">Jenis Surat</span>
                                <span class="font-bold text-gray-900">{{ $letter->letterType->name }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-200">
                                <span class="text-gray-600 font-medium">Pemohon</span>
                                <span class="font-bold text-gray-900">{{ $letter->user->name }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-200">
                                <span class="text-gray-600 font-medium">Tanggal Terbit</span>
                                <span class="font-bold text-gray-900">{{ \Carbon\Carbon::parse($letter->approved_date)->translatedFormat('d F Y') }}</span>
                            </div>
                        </div>
                        
                        <div class="flex gap-3">
                            <a href="{{ route('verification.index') }}" class="flex-1 py-3 bg-gray-600 text-white font-bold rounded hover:bg-gray-700 transition text-center">
                                Cek Dokumen Lain
                            </a>
                            <!-- Optional: Add download PDF button if PDF generation is implemented -->
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
