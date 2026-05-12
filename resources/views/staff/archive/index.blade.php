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
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-3">NO. SURAT</th>
                        <th class="px-6 py-3">JENIS SURAT</th>
                        <th class="px-6 py-3">PEMOHON</th>
                        <th class="px-6 py-3">TANGGAL SELESAI</th>
                        <th class="px-6 py-3 text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($letters as $letter)
                    <tr class="bg-white hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-mono text-xs text-blue-600">
                            {{ $letter->letter_number ?? '-' }}
                        </td>
                        <td class="px-6 py-4 font-bold text-gray-900">
                            {{ $letter->letterType->name }}
                        </td>
                        <td class="px-6 py-4 font-medium">
                            {{ $letter->user->name }}
                        </td>
                        <td class="px-6 py-4 text-xs">
                            {{ $letter->updated_at->format('d M Y, H:i') }}
                        </td>
                        <td class="px-6 py-4 text-center">
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
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            Belum ada arsip untuk kategori ini.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $letters->links() }}
        </div>
    </div>
</div>
@endsection
