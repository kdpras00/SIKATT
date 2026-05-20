@extends('layouts.app')

@section('sidebar')
    @include('masyarakat.sidebar')
@endsection

@section('content')
<div class="space-y-6">
    <!-- Clean Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 border-b border-gray-200 pb-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Lihat Status Pengajuan</h2>
            <p class="text-sm text-gray-500 mt-1">Daftar semua permohonan surat keterangan Anda beserta status progresnya.</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="bg-gray-100 rounded-lg px-4 py-2 text-center">
                <span class="block text-xl font-bold text-gray-900">{{ $letters->total() }}</span>
                <span class="text-xs text-gray-500 uppercase tracking-wide">Total</span>
            </div>
        </div>
    </div>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('masyarakat.letters.index') }}" class="mb-6 bg-white p-5 rounded-2xl border border-gray-100 shadow-sm">
        <input type="hidden" name="view" value="history">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
            <div class="md:col-span-5">
                <label for="search" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Cari Kata Kunci</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                        <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                    <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Cari jenis surat, keperluan, no..." class="pl-10 w-full text-sm rounded-xl border border-gray-300 bg-gray-50/50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 p-2.5 transition-all">
                </div>
            </div>
            <div class="md:col-span-3">
                <label for="status" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Status</label>
                <select name="status" id="status" class="w-full text-sm rounded-xl border border-gray-300 bg-gray-50/50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 p-2.5 transition-all">
                    <option value="">Semua Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="processed" {{ request('status') == 'processed' ? 'selected' : '' }}>Diproses</option>
                    <option value="verified" {{ request('status') == 'verified' ? 'selected' : '' }}>Selesai</option>
                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>
            <div class="md:col-span-2">
                <label for="date" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Tanggal Pengajuan</label>
                <input type="date" name="date" id="date" value="{{ request('date') }}" class="w-full text-sm rounded-xl border border-gray-300 bg-gray-50/50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 p-2.5 transition-all">
            </div>
            <div class="md:col-span-2 flex gap-2">
                <button type="submit" class="flex-1 inline-flex items-center justify-center bg-[#0D2A1C] hover:bg-[#1B4332] text-white font-bold text-sm py-2.5 px-4 rounded-xl shadow-md transition-all duration-300">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                    Filter
                </button>
                @if(request()->anyFilled(['search', 'status', 'date']))
                    <a href="{{ route('masyarakat.letters.index', ['view' => 'history']) }}" class="inline-flex items-center justify-center p-2.5 bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold text-sm rounded-xl transition duration-300" title="Reset Filter">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 7.89M9 11l3-3 3 3m-3-3v12"></path></svg>
                    </a>
                @endif
            </div>
        </div>
    </form>

    <!-- Letters List -->
    <div class="space-y-4">
        @forelse($letters as $letter)
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">
            <div class="p-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <!-- Letter Info -->
                    <div class="flex-1">
                        <div class="flex items-start gap-4">
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $letter->letterType->name }}</h3>
                                <p class="text-sm text-gray-500 mb-2">{{ $letter->purpose }}</p>
                                <div class="flex flex-wrap items-center gap-3 text-xs text-gray-500">
                                    <span class="flex items-center">
                                        {{ \Carbon\Carbon::parse($letter->request_date)->translatedFormat('d M Y') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Status Info -->
                    <div class="flex-shrink-0">
                        @if($letter->status == 'pending')
                            <span class="text-yellow-600 font-bold text-sm uppercase tracking-wider">Pending</span>
                        @elseif($letter->status == 'processed')
                            <span class="text-blue-600 font-bold text-sm uppercase tracking-wider">Diproses</span>
                        @elseif($letter->status == 'verified')
                            <span class="text-green-600 font-bold text-sm uppercase tracking-wider">Selesai</span>
                        @else
                            <span class="text-red-600 font-bold text-sm uppercase tracking-wider">Ditolak</span>
                        @endif
                    </div>
                </div>

                <!-- Rejection Reason -->
                @if($letter->status == 'rejected' && $letter->rejection_reason)
                    <div class="mt-4 text-sm text-red-600 bg-red-50 p-3 rounded-lg border border-red-100">
                        <strong>Alasan Penolakan:</strong> {{ $letter->rejection_reason }}
                    </div>
                @endif

                <!-- Download Button for Verified Letters -->
                @if($letter->status == 'verified')
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <a href="{{ route('masyarakat.letters.download', $letter) }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition text-sm font-medium shadow-sm">
                            Download Surat (PDF)
                        </a>
                    </div>
                @endif
            </div>
        </div>
        @empty
        <div class="col-span-full py-16 text-center bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200">
            <h3 class="text-lg font-bold text-gray-900">Belum Ada Pengajuan Surat</h3>
            <p class="text-gray-500 mb-6 max-w-sm mx-auto p-2">Mulai ajukan surat keterangan yang Anda butuhkan.</p>
        </div>
        @endforelse
    </div>

    @if($letters->hasPages())
    <div class="mt-8">
        {{ $letters->appends(request()->query())->links() }}
    </div>
    @endif
</div>
@endsection
