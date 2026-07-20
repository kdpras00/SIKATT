@extends('layouts.app')

@section('title', 'Verifikasi Surat - Kelurahan Tanah Tinggi')

@section('sidebar')
    @include('lurah.sidebar')
@endsection

@section('content')
<div class="bg-white rounded-lg shadow-sm border border-gray-200">
    <!-- Header -->
    <div class="p-6 border-b border-gray-200 flex justify-between items-center bg-gray-50 rounded-t-lg">
        <div>
             <h1 class="text-2xl font-bold text-gray-900">Tanda Tangan Digital</h1>
             <p class="text-gray-500 text-sm">Persetujuan akhir surat yang telah diproses staff</p>
        </div>
    </div>

    <!-- Tabs -->
    <div class="border-b border-gray-200">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500">
            <li class="mr-2">
                <a href="{{ route('lurah.letters.index', ['status' => 'processed']) }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ $status == 'processed' ? 'text-yellow-500 border-yellow-500 active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}">
                    Menunggu Tanda Tangan
                </a>
            </li>
            <li class="mr-2">
                 <a href="{{ route('lurah.letters.index', ['status' => 'history']) }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ $status == 'history' ? 'text-yellow-500 border-yellow-500 active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}">
                    Riwayat Persetujuan
                </a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="p-6">
        <div class="overflow-x-auto [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-3 whitespace-nowrap">JENIS SURAT</th>
                        <th class="px-6 py-3 whitespace-nowrap">NO. SURAT</th>
                        <th class="px-6 py-3 whitespace-nowrap">NAMA PEMOHON</th>
                        <th class="px-6 py-3 whitespace-nowrap">NIK</th>
                        <th class="px-6 py-3 whitespace-nowrap">TANGGAL PROSES</th>
                        <th class="px-6 py-3 whitespace-nowrap">CATATAN OPERATOR</th>
                        <th class="px-6 py-3 text-center whitespace-nowrap">STATUS</th>
                        <th class="px-6 py-3 text-center whitespace-nowrap">AKSI</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($letters as $letter)
                    <tr class="bg-white hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap font-bold text-gray-900">
                            {{ $letter->letterType->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-yellow-600 font-mono text-sm">
                            {{ $letter->letter_number }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $letter->user->name }}
                        </td>
                        <td class="px-6 py-4 text-gray-500 whitespace-nowrap text-sm">
                            {{ $letter->user->nik }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $letter->process_date ? \Carbon\Carbon::parse($letter->process_date)->translatedFormat('d M Y') : '-' }}
                            @if($letter->staff)
                                <div class="text-xs text-gray-400">Oleh: {{ $letter->staff->name }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 max-w-xs truncate italic text-gray-600">
                            "{{ $letter->staff_notes ?? '-' }}"
                        </td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            @if($letter->status == 'processed')
                                <span class="text-blue-600 font-bold text-xs uppercase tracking-wider">Menunggu TTD</span>
                            @elseif($letter->status == 'verified')
                                <div class="flex flex-col items-center">
                                    <span class="text-green-600 font-bold text-xs uppercase tracking-wider">Sudah TTD</span>
                                    <div class="text-[10px] text-gray-500 mt-1">{{ \Carbon\Carbon::parse($letter->approved_date)->format('d/m/Y H:i') }}</div>
                                </div>
                            @else
                                <span class="text-red-600 font-bold text-xs uppercase tracking-wider">Ditolak</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($letter->status == 'processed')
                                <div class="flex flex-col gap-2">
                                    <a href="{{ route('lurah.letters.show', $letter) }}" class="w-full inline-flex justify-center items-center text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-bold rounded-lg text-xs px-3 py-2 transition shadow-sm whitespace-nowrap">
                                        Review / Detail
                                    </a>
                                </div>
                            @else
                                <div class="flex flex-col items-center">
                                    <a href="{{ route('lurah.letters.show', $letter) }}" class="w-full inline-flex justify-center items-center text-gray-700 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:ring-gray-300 font-bold rounded-lg text-xs px-3 py-2 transition shadow-sm whitespace-nowrap">
                                        Lihat Detail
                                    </a>
                                </div>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-12 text-center text-gray-500 italic">
                            Tidak ada surat yang menunggu tanda tangan saat ini.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $letters->appends(['status' => $status])->links() }}
        </div>
    </div>
</div>

<!-- Reject Modal -->
<div id="rejectModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full bg-black/50 backdrop-blur-sm">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
             <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" onclick="closeRejectModal()">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
            </button>
            <div class="p-6 text-center">
                <svg class="mx-auto mb-4 w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500">Tolak Verifikasi Surat?</h3>
                <form id="rejectForm" method="POST">
                    @csrf
                    <textarea name="reason" rows="3" required class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-yellow-500 focus:border-yellow-500 mb-4" placeholder="Alasan penolakan / Revisi..."></textarea>
                    <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Tolak Laporan
                    </button>
                    <button type="button" onclick="closeRejectModal()" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function openRejectModal(url) {
        document.getElementById('rejectForm').action = url;
        document.getElementById('rejectModal').classList.remove('hidden');
        document.getElementById('rejectModal').classList.add('flex');
    }

    function closeRejectModal() {
        document.getElementById('rejectModal').classList.add('hidden');
        document.getElementById('rejectModal').classList.remove('flex');
    }
</script>
@endsection
