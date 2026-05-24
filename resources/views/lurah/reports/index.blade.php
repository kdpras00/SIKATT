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
         <a href="{{ route('lurah.reports.print-letters', request()->query()) }}" target="_blank" class="inline-flex items-center px-5 py-2.5 bg-[#0D2A1C] border border-transparent rounded-xl font-bold text-xs text-white uppercase tracking-widest hover:bg-[#1B4332] transition-all shadow-lg shadow-green-900/10">
              <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
              Download PDF Laporan
         </a>
    </div>

    <!-- Content -->
    <div class="p-6">
        <!-- Filter Form -->
        <form method="GET" action="{{ route('lurah.reports.index') }}" class="mb-6 bg-white p-5 rounded-2xl border border-gray-100 shadow-sm">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                <div class="md:col-span-3">
                    <label for="search" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Cari Kata Kunci</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </span>
                        <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Nama, NIK, No. Surat..." class="pl-10 w-full text-sm rounded-xl border border-gray-300 bg-gray-50/50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 p-2.5 transition-all">
                    </div>
                </div>
                <div class="md:col-span-3">
                    <label for="letter_type_id" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Jenis Surat</label>
                    <select name="letter_type_id" id="letter_type_id" class="w-full text-sm rounded-xl border border-gray-300 bg-gray-50/50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 p-2.5 transition-all">
                        <option value="">Semua Jenis Surat</option>
                        @foreach($letterTypes as $type)
                            <option value="{{ $type->id }}" {{ request('letter_type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label for="status" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Status</label>
                    <select name="status" id="status" class="w-full text-sm rounded-xl border border-gray-300 bg-gray-50/50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 p-2.5 transition-all">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="processed" {{ request('status') == 'processed' ? 'selected' : '' }}>Proses (Paraf Staff)</option>
                        <option value="verified" {{ request('status') == 'verified' ? 'selected' : '' }}>Selesai</option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label for="start_date" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Dari Tanggal</label>
                    <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}" class="w-full text-sm rounded-xl border border-gray-300 bg-gray-50/50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 p-2.5 transition-all">
                </div>
                <div class="md:col-span-2">
                    <label for="end_date" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Sampai Tanggal</label>
                    <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}" class="w-full text-sm rounded-xl border border-gray-300 bg-gray-50/50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 p-2.5 transition-all">
                </div>
            </div>
            <div class="mt-4 flex justify-end gap-2">
                <button type="submit" class="inline-flex items-center justify-center bg-[#0D2A1C] hover:bg-[#1B4332] text-white font-bold text-sm py-2.5 px-6 rounded-xl shadow-md transition-all duration-300">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                    Filter
                </button>
                @if(request()->anyFilled(['search', 'letter_type_id', 'status', 'start_date', 'end_date']))
                    <a href="{{ route('lurah.reports.index') }}" class="inline-flex items-center justify-center p-2.5 bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold text-sm rounded-xl transition duration-300" title="Reset Filter">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 7.89M9 11l3-3 3 3m-3-3v12"></path></svg>
                    </a>
                @endif
            </div>
        </form>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-3">No. Surat</th>
                        <th class="px-6 py-3">Pemohon</th>
                        <th class="px-6 py-3">Jenis Surat</th>
                        <th class="px-6 py-3">Tanggal Ajuan</th>
                        <th class="px-6 py-3">Status</th>
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
                             @if($item->status == 'verified') <span class="text-green-600 font-bold">Selesai</span>
                             @elseif($item->status == 'rejected') <span class="text-red-600 font-bold">Ditolak</span>
                             @else <span class="text-gray-500">Proses</span> @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $data->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection
