@extends('layouts.auth')

@section('title', 'Pendaftaran Akun - Portal Resmi Kelurahan Tanah Tinggi')

@section('content')
<div class="pt-16 pb-12">
    <div class="mb-12">
    <h2 class="text-3xl font-extrabold text-[#0D2A1C] font-outfit tracking-tight mb-3">Pendaftaran Akun</h2>
    <p class="text-gray-500 text-sm leading-relaxed">Lengkapi data diri Anda sesuai KTP untuk mendaftar layanan digital Kelurahan.</p>
</div>

@if ($errors->any())
    <div class="mb-8 p-4 text-sm text-red-600 bg-red-50 rounded-2xl border border-red-100 font-medium" role="alert">
        <ul class="list-disc list-inside space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('register') }}" class="space-y-6">
    @csrf

    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
        <!-- Nama Lengkap -->
        <div class="md:col-span-2">
            <label for="name" class="block mb-2 text-[10px] font-black text-[#0D2A1C] uppercase tracking-[0.2em] opacity-40 ml-1">Nama Lengkap (Sesuai KTP)</label>
            <div class="relative group">
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="bg-white border border-gray-200 text-[#0D2A1C] text-sm rounded-2xl focus:ring-4 focus:ring-[#C9A227]/5 focus:border-[#C9A227] block w-full p-4 outline-none transition-all placeholder:text-gray-300 font-medium" 
                    placeholder="Budi Santoso">
            </div>
        </div>

        <!-- NIK -->
        <div>
            <label for="nik" class="block mb-2 text-[10px] font-black text-[#0D2A1C] uppercase tracking-[0.2em] opacity-40 ml-1">NIK (16 Digit)</label>
            <div class="relative group">
                <input type="text" name="nik" id="nik" value="{{ old('nik') }}" maxlength="16" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required
                    class="bg-white border border-gray-200 text-[#0D2A1C] text-sm rounded-2xl focus:ring-4 focus:ring-[#C9A227]/5 focus:border-[#C9A227] block w-full p-4 outline-none transition-all placeholder:text-gray-300 font-medium" 
                    placeholder="3671012345678901">
            </div>
        </div>

        <!-- No. KK -->
        <div>
            <label for="kk" class="block mb-2 text-[10px] font-black text-[#0D2A1C] uppercase tracking-[0.2em] opacity-40 ml-1">No. KK (16 Digit)</label>
            <div class="relative group">
                <input type="text" name="kk" id="kk" value="{{ old('kk') }}" maxlength="16" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required
                    class="bg-white border border-gray-200 text-[#0D2A1C] text-sm rounded-2xl focus:ring-4 focus:ring-[#C9A227]/5 focus:border-[#C9A227] block w-full p-4 outline-none transition-all placeholder:text-gray-300 font-medium" 
                    placeholder="3671012345678901">
            </div>
        </div>

        <!-- No. HP -->
        <div>
            <label for="phone" class="block mb-2 text-[10px] font-black text-[#0D2A1C] uppercase tracking-[0.2em] opacity-40 ml-1">Nomor WhatsApp</label>
            <div class="relative group">
                <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required maxlength="13" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                    class="bg-white border border-gray-200 text-[#0D2A1C] text-sm rounded-2xl focus:ring-4 focus:ring-[#C9A227]/5 focus:border-[#C9A227] block w-full p-4 outline-none transition-all placeholder:text-gray-300 font-medium" 
                    placeholder="081234567890">
            </div>
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block mb-2 text-[10px] font-black text-[#0D2A1C] uppercase tracking-[0.2em] opacity-40 ml-1">Alamat Email</label>
            <div class="relative group">
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="bg-white border border-gray-200 text-[#0D2A1C] text-sm rounded-2xl focus:ring-4 focus:ring-[#C9A227]/5 focus:border-[#C9A227] block w-full p-4 outline-none transition-all placeholder:text-gray-300 font-medium" 
                    placeholder="email@contoh.com">
            </div>
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block mb-2 text-[10px] font-black text-[#0D2A1C] uppercase tracking-[0.2em] opacity-40 ml-1">Kata Sandi</label>
            <div class="relative group">
                <input type="password" name="password" id="password" required
                    class="bg-white border border-gray-200 text-[#0D2A1C] text-sm rounded-2xl focus:ring-4 focus:ring-[#C9A227]/5 focus:border-[#C9A227] block w-full p-4 pr-12 outline-none transition-all placeholder:text-gray-300 font-medium" 
                    placeholder="••••••••">
                <button type="button" onclick="togglePasswordVisibility('password', 'eye-show-1', 'eye-hide-1')" class="absolute inset-y-0 right-0 pr-5 flex items-center text-gray-300 hover:text-[#0D2A1C] transition-colors">
                    <svg id="eye-show-1" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    <svg id="eye-hide-1" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                </button>
            </div>
        </div>

        <!-- Confirm PW -->
        <div>
            <label for="password_confirmation" class="block mb-2 text-[10px] font-black text-[#0D2A1C] uppercase tracking-[0.2em] opacity-40 ml-1">Konfirmasi Kata Sandi</label>
            <div class="relative group">
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="bg-white border border-gray-200 text-[#0D2A1C] text-sm rounded-2xl focus:ring-4 focus:ring-[#C9A227]/5 focus:border-[#C9A227] block w-full p-4 pr-12 outline-none transition-all placeholder:text-gray-300 font-medium" 
                    placeholder="••••••••">
                <button type="button" onclick="togglePasswordVisibility('password_confirmation', 'eye-show-2', 'eye-hide-2')" class="absolute inset-y-0 right-0 pr-5 flex items-center text-gray-300 hover:text-[#0D2A1C] transition-colors">
                    <svg id="eye-show-2" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    <svg id="eye-hide-2" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                </button>
            </div>
        </div>
    </div>

    <div class="pt-6">
        <button type="submit" class="w-full bg-[#0D2A1C] hover:bg-[#1B4332] text-white font-bold rounded-2xl text-sm px-5 py-5 text-center transition-all shadow-xl shadow-green-900/10 hover:-translate-y-1 uppercase tracking-[0.2em] font-outfit">
            Daftar Akun Sekarang
        </button>
    </div>

    <div class="text-center pt-4">
        <p class="text-xs text-gray-400 font-medium">Sudah punya akun? <a href="{{ route('login') }}" class="text-[#C9A227] font-black hover:underline transition-all ml-1 uppercase tracking-widest">Masuk Sekarang</a></p>
    </div>

    <div class="mt-12 pt-8 border-t border-gray-50 text-center">
         <a href="{{ route('home') }}" class="text-gray-300 hover:text-[#0D2A1C] text-[10px] font-black uppercase tracking-[0.3em] flex items-center justify-center transition-all group">
            <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Beranda
        </a>
    </div>
</form>
</div>

<script>
    function togglePasswordVisibility(fieldId, iconShowId, iconHideId) {
        const input = document.getElementById(fieldId);
        const iconShow = document.getElementById(iconShowId);
        const iconHide = document.getElementById(iconHideId);
        
        if (input.type === 'password') {
            input.type = 'text';
            iconShow.classList.add('hidden');
            iconHide.classList.remove('hidden');
        } else {
            input.type = 'password';
            iconShow.classList.remove('hidden');
            iconHide.classList.add('hidden');
        }
    }
</script>
@endsection
