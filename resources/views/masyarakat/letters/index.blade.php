@extends('layouts.app')

@section('title', 'Layanan Surat - Kelurahan Tanah Tinggi')

@section('sidebar')
    @include('masyarakat.sidebar')
@endsection

@section('content')
<div class="bg-white rounded-lg shadow-sm border border-gray-200">
    <!-- Header & Tabs -->
    <div class="p-6 border-b border-gray-200 bg-gray-50 rounded-t-lg">
        <div>
             <h1 class="text-2xl font-bold text-gray-900">Ajukan Permohonan Surat</h1>
             <p class="text-gray-500 text-sm">Pilih jenis surat yang ingin Anda ajukan kepada pemerintah kelurahan secara online.</p>
        </div>
    </div>

    <!-- Letters Grid -->
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($letterTypes as $type)
            <div class="group bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-all duration-300 flex flex-col items-center text-center">
                <div class="mb-6 h-24 w-24 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    @php 
                        $lname = strtolower($type->name);
                        $iconName = 'default';
                        if(str_contains($lname, 'domisili')) $iconName = 'domisili';
                        elseif(str_contains($lname, 'tidak mampu') || str_contains($lname, 'sktm')) $iconName = 'sktm';
                        elseif(str_contains($lname, 'usaha')) $iconName = 'usaha';
                        elseif(str_contains($lname, 'ktp')) $iconName = 'ktp';
                        elseif(str_contains($lname, 'kelahiran')) $iconName = 'kelahiran';
                        elseif(str_contains($lname, 'kematian')) $iconName = 'kematian';
                        elseif(str_contains($lname, 'cuti')) $iconName = 'cuti';
                        
                        $customIconPath = "storage/images/icons/{$iconName}.png";
                        $fallbackIconPath = "storage/images/logo-tanah-tinggi.png";
                        
                        $finalIconPath = file_exists(public_path($customIconPath)) ? $customIconPath : $fallbackIconPath;
                        $imgClass = file_exists(public_path($customIconPath)) ? "w-full h-full object-contain" : "w-20 h-20 object-contain";
                    @endphp
                    <img src="{{ asset($finalIconPath) }}" 
                         alt="{{ $type->name }}" 
                         class="{{ $imgClass }}">
                </div>
                <h3 class="font-bold text-gray-900 text-lg mb-2">{{ $type->name }}</h3>
                <p class="text-sm text-gray-500 mb-4 flex-1">{{ $type->description ?? 'Surat keterangan resmi dari pemerintah kelurahan.' }}</p>
                
                @php
                    $userAge = \Carbon\Carbon::parse(auth()->user()->birth_date)->age;
                @endphp

                @if($userAge < 17)
                    <button onclick="Swal.fire({
                        icon: 'error',
                        title: 'Usia Belum Mencukupi',
                        text: 'Maaf, Anda harus berusia minimal 17 tahun untuk mengajukan surat ini. Usia Anda saat ini: {{ $userAge }} tahun.',
                        confirmButtonColor: '#d33'
                    })" class="w-full inline-flex justify-center items-center text-white bg-gray-400 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center shadow-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        Terkunci (17+)
                    </button>
                @else
                    <a href="{{ route('masyarakat.letters.create', $type) }}" class="w-full inline-flex justify-center items-center text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition shadow hover:shadow-md">
                        Ajukan Sekarang
                    </a>
                @endif
            </div>
            @empty
            <div class="col-span-full py-12 text-center">
                <p class="text-gray-500">Belum ada layanan surat tersedia saat ini.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
