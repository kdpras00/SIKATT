@extends('layouts.app')

@section('title', 'Dashboard Lurah - Kelurahan Tanah Tinggi')

@section('sidebar')
    @include('lurah.sidebar')
@endsection

@section('content')
<div class="mb-10 flex flex-col md:flex-row justify-between items-start md:items-end border-b border-gray-100 pb-8">
    <div>
        <h1 class="text-2xl font-bold text-[#0D2A1C] font-rubik tracking-tight">Dashboard Lurah</h1>
        <p class="text-sm text-gray-500 mt-1">Kelurahan Tanah Tinggi — Selamat datang kembali, Bapak Lurah.</p>
    </div>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <div class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-sm transition-all">
        <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Butuh Verifikasi</div>
        <div class="text-2xl font-bold text-[#0D2A1C] tracking-tight">{{ $stats['pending_verification'] }}</div>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-sm transition-all">
        <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Surat Selesai</div>
        <div class="text-2xl font-bold text-[#0D2A1C] tracking-tight">{{ $stats['verified_letters'] }}</div>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-sm transition-all">
        <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Surat Ditolak</div>
        <div class="text-2xl font-bold text-[#0D2A1C] tracking-tight">{{ $stats['rejected_letters'] }}</div>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-sm transition-all">
        <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Total Pengajuan</div>
        <div class="text-2xl font-bold text-[#0D2A1C] tracking-tight">{{ $stats['total_requests'] }}</div>
    </div>
</div>

@endsection
