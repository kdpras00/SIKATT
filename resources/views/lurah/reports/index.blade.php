@extends('layouts.app')

@section('title', 'melihat laporan surat pengajuan - Kelurahan Tanah Tinggi')

@section('sidebar')
    @include('lurah.sidebar')
@endsection

@section('content')
<div class="bg-white rounded-lg shadow-sm border border-gray-200">
    <!-- Header -->
    <div class="p-6 border-b border-gray-200 flex justify-between items-center bg-gray-50 rounded-t-lg">
        <div>
             <h1 class="text-2xl font-bold text-gray-900">Laporan Surat Pengajuan</h1>
             <p class="text-gray-500 text-sm">Arsip laporan layanan surat pengajuan masyarakat.</p>
        </div>
        <a href="{{ route('lurah.reports.print-letters') }}" target="_blank" class="inline-flex items-center px-5 py-2.5 bg-[#0D2A1C] border border-transparent rounded-xl font-bold text-xs text-white uppercase tracking-widest hover:bg-[#1B4332] transition-all shadow-lg shadow-green-900/10">
             <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
             Download PDF Laporan
        </a>
    </div>

    <!-- Content -->
    <div class="p-6">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-3">No. Surat</th>
                        <th class="px-6 py-3">Pemohon</th>
                        <th class="px-6 py-3">Jenis Surat</th>
                        <th class="px-6 py-3">Tanggal Ajuan</th>
                        <th class="px-6 py-3">Status Verifikasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-mono text-xs text-gray-900">{{ $item->letter_number ?? '(Pending)' }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $item->user->name }}</td>
                        <td class="px-6 py-4">{{ $item->letterType->name }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($item->request_date)->translatedFormat('d M Y') }}</td>
                        <td class="px-6 py-4">
                             @if($item->status == 'verified') <span class="text-green-600 font-bold">Terverifikasi</span>
                             @elseif($item->status == 'rejected') <span class="text-red-600 font-bold">Ditolak</span>
                             @else <span class="text-gray-500">Proses</span> @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
