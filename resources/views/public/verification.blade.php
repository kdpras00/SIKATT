@extends('layouts.public')

@section('title', 'Verifikasi Surat - Website Resmi Kelurahan Tanah Tinggi')

@section('content')
<div class="relative min-h-[700px] flex items-center justify-center py-24 bg-[#F9F6EE]">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('storage/images/background-tanah-tinggi2.jpeg') }}" class="w-full h-full object-cover opacity-10" alt="Background">
    </div>

    <div class="relative z-10 w-full max-w-lg px-4">
        <div class="bg-white rounded-[40px] shadow-2xl overflow-hidden">
            <div class="bg-[#F9F6EE]/50 p-8 text-center border-b border-gray-100">
                <img src="{{ asset('storage/images/logo-tanah-tinggi.png') }}" class="h-20 w-auto mx-auto mb-6" alt="Logo">
                <h2 class="text-3xl font-black text-[#0D2A1C] font-rubik">Verifikasi Surat</h2>
                <p class="text-[#1B4332] text-sm font-bold mt-2 uppercase tracking-widest">Validasi Dokumen Digital</p>
            </div>
            
            <div class="p-10">
                 @if(session('error'))
                    <div class="mb-8 p-4 text-sm text-red-800 rounded-2xl border border-red-200 bg-red-50 text-center font-bold" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                @if(isset($letter))
                    <!-- Result Card -->
                     <div class="text-center">
                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-3xl bg-[#1B4332]/10 text-[#1B4332] mb-6">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <h3 class="text-2xl font-black text-[#1B4332] mb-8 font-rubik">Dokumen Valid / Asli</h3>
                        
                        <div class="space-y-4 text-left bg-[#F9F6EE] p-8 rounded-[32px] border border-gray-100 text-sm">
                            <div class="flex justify-between border-b border-gray-200 pb-3">
                                <span class="text-gray-500 font-bold uppercase tracking-tighter">Nomor Surat</span>
                                <span class="font-black text-[#0D2A1C]">{{ $letter->letter_number }}</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-200 pb-3">
                                <span class="text-gray-500 font-bold uppercase tracking-tighter">Jenis Surat</span>
                                <span class="font-black text-[#0D2A1C]">{{ $letter->letterType->name }}</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-200 pb-3">
                                <span class="text-gray-500 font-bold uppercase tracking-tighter">Pemohon</span>
                                <span class="font-black text-[#0D2A1C]">{{ $letter->user->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500 font-bold uppercase tracking-tighter">Tanggal Terbit</span>
                                <span class="font-black text-[#0D2A1C]">{{ \Carbon\Carbon::parse($letter->created_at)->translatedFormat('d F Y') }}</span>
                            </div>
                        </div>

                        <div class="mt-10">
                             <a href="{{ route('verification.index') }}" class="inline-flex items-center justify-center w-full py-5 bg-[#0D2A1C] text-white font-black rounded-2xl hover:bg-[#1B4332] transition-all shadow-xl shadow-green-900/20">
                                Cek Dokumen Lain
                             </a>
                        </div>
                     </div>
                @else
                    <form action="{{ route('verification.verify') }}" method="POST">
                        @csrf
                        <div class="mb-8">
                            <label for="code" class="block text-xs font-black text-[#1B4332] uppercase tracking-[0.2em] mb-4 text-center">Kode Verifikasi / Nomor Surat</label>
                            <input type="text" name="code" id="code" class="w-full px-6 py-5 rounded-2xl border-2 border-gray-100 bg-[#F9F6EE] focus:border-[#C9A227] focus:ring-4 focus:ring-[#C9A227]/10 outline-none text-center text-2xl tracking-[0.2em] font-black text-[#0D2A1C] uppercase placeholder:tracking-normal placeholder:font-normal placeholder:text-gray-300" placeholder="KODE-SURAT" required>
                            <p class="text-[10px] text-gray-400 mt-4 text-center font-bold uppercase tracking-wider">Kode verifikasi tertera di bagian bawah dokumen surat</p>
                        </div>
                        <button type="submit" class="w-full py-5 bg-[#0D2A1C] text-white font-black rounded-2xl hover:bg-[#1B4332] transition-all shadow-xl shadow-green-900/20 group">
                            Cek Validitas
                            <svg class="w-5 h-5 ml-2 inline-block group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
