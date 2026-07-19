@extends('layouts.app')

@section('title', 'Kelola Arsip - Kelurahan Tanah Tinggi')

@section('sidebar')
    @include('staff.sidebar')
@endsection

@section('content')
<div class="bg-white rounded-lg shadow-sm border border-gray-200">
    <div class="p-6 border-b border-gray-200 flex justify-between items-center bg-gray-50 rounded-t-lg">
        <div>
             <h1 class="text-2xl font-bold text-gray-900">Kelola Arsip</h1>
             <p class="text-gray-500 text-sm">Manajemen arsip surat kelurahan yang telah selesai diproses.</p>
        </div>
    </div>

    <!-- Tabs -->
    <div class="border-b border-gray-200">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500">
            <li class="mr-2">
                <a href="{{ route('staff.archive.index', ['status' => 'verified']) }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ $status == 'verified' ? 'text-blue-600 border-blue-600 active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}">
                    Arsip Selesai
                </a>
            </li>
            <li class="mr-2">
                 <a href="{{ route('staff.archive.index', ['status' => 'rejected']) }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ $status == 'rejected' ? 'text-blue-600 border-blue-600 active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}">
                    Arsip Ditolak
                </a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="p-6">
        <!-- Filter Form -->
        <form method="GET" action="{{ route('staff.archive.index') }}" class="mb-6 bg-white p-5 rounded-2xl border border-gray-100 shadow-sm">
            <input type="hidden" name="status" value="{{ $status }}">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                <div class="md:col-span-5">
                    <label for="search" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Cari Kata Kunci</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </span>
                        <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Cari nama, NIK, No. Surat..." class="pl-10 w-full text-sm rounded-xl border border-gray-300 bg-gray-50/50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 p-2.5 transition-all">
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
                    <label for="date" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Tanggal Selesai</label>
                    <input type="date" name="date" id="date" value="{{ request('date') }}" class="w-full text-sm rounded-xl border border-gray-300 bg-gray-50/50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 p-2.5 transition-all">
                </div>
                <div class="md:col-span-2 flex gap-2">
                    <button type="submit" class="flex-1 inline-flex items-center justify-center bg-[#0D2A1C] hover:bg-[#1B4332] text-white font-bold text-sm py-2.5 px-4 rounded-xl shadow-md transition-all duration-300">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                        Filter
                    </button>
                    @if(request()->anyFilled(['search', 'letter_type_id', 'date']))
                        <a href="{{ route('staff.archive.index', ['status' => $status]) }}" class="inline-flex items-center justify-center p-2.5 bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold text-sm rounded-xl transition duration-300" title="Reset Filter">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 7.89M9 11l3-3 3 3m-3-3v12"></path></svg>
                        </a>
                    @endif
                </div>
            </div>
        </form>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                    <tr>
                        <th class="px-4 py-3">NO. SURAT</th>
                        <th class="px-4 py-3">JENIS SURAT</th>
                        <th class="px-4 py-3">NAMA PEMOHON</th>
                        <th class="px-4 py-3">NIK</th>
                        <th class="px-4 py-3">TANGGAL SELESAI</th>
                        <th class="px-4 py-3 text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($letters as $letter)
                    <tr class="bg-white hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-4 font-mono text-sm text-blue-600 whitespace-nowrap">
                            {{ $letter->letter_number ?? '-' }}
                        </td>
                        <td class="px-4 py-4 font-bold text-gray-900 whitespace-nowrap">
                            {{ $letter->letterType->name }}
                        </td>
                        <td class="px-4 py-4 font-medium whitespace-nowrap">
                            {{ $letter->user->name }}
                        </td>
                        <td class="px-4 py-4 text-gray-500 text-sm whitespace-nowrap">
                            {{ $letter->user->nik }}
                        </td>
                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                            {{ $letter->updated_at->format('d M Y, H:i') }}
                        </td>
                        <td class="px-4 py-4 text-center">
                            @if($letter->status == 'verified')
                                <a href="{{ route('staff.letters.download', $letter) }}" target="_blank" class="inline-flex items-center text-blue-600 hover:underline">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    Cetak surat
                                </a>
                            @else
                                <span class="text-gray-400">Tidak ada aksi</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-12 text-center text-gray-500">
                            Belum ada arsip untuk kategori ini.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $letters->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection
