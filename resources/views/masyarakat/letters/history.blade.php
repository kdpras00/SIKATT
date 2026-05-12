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
                            <span class="text-yellow-600 font-bold text-sm uppercase tracking-wider">Menunggu</span>
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
        {{ $letters->appends(['view' => 'history'])->links() }}
    </div>
    @endif
</div>
@endsection
