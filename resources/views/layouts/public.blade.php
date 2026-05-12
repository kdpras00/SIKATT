<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIKATT - Kelurahan Tanah Tinggi')</title>
    <meta name="description" content="Website Resmi Pemerintah Kelurahan Tanah Tinggi, Kota Tangerang.">
    <link rel="icon" type="image/png" href="{{ asset('storage/images/logo-tanah-tinggi.png') }}?v={{ time() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prata&family=Roboto:wght@300;400;500;700&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Roboto', sans-serif; }
        .font-rubik { font-family: 'Rubik', sans-serif; }
        .font-prata { font-family: 'Prata', serif; }
        .font-roboto { font-family: 'Roboto', sans-serif; }
    </style>
</head>
<body class="bg-[#F9F6EE] text-gray-800 flex flex-col min-h-screen">

    <!-- Top Bar (Official Info) -->
    <div class="bg-[#1B4331] text-white py-2 text-sm hidden md:block border-b border-[#1B4332]">
        <div class="max-w-screen-xl mx-auto px-4 flex justify-between items-center">
            <div class="flex space-x-6">
                <div class="flex items-center space-x-2">
                    <svg class="w-4 h-4 text-[#C9A227]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    <span>(021) 55770275</span>
                </div>
                <div class="flex items-center space-x-2">
                    <svg class="w-4 h-4 text-[#C9A227]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>kantor@tanahtinggi.kel.id</span>
                </div>
                <div class="flex items-center space-x-2">
                    <svg class="w-4 h-4 text-[#C9A227]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Senin - Jumat, 08:00 - 16:00</span>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                    <div class="flex space-x-4">
                        <!-- Social Icons -->
                         <a href="#" class="text-white hover:text-[#C9A227] hover:scale-125 transition-all" title="Facebook">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/></svg>
                        </a>
                        <a href="https://www.instagram.com/kelurahan_tanah-tinggi2020/" class="text-white hover:text-[#C9A227] hover:scale-125 transition-all" target="_blank" title="Instagram">
                             <span class="sr-only">Instagram</span>
                             <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.153 1.772 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.468 2.37c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"/></svg>
                        </a>
                        <a href="#" class="text-white hover:text-[#C9A227] hover:scale-125 transition-all" title="Youtube">
                             <span class="sr-only">Youtube</span>
                             <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.612 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 4-8 4z"/></svg>
                        </a>
                    </div>
            </div>
        </div>
    </div>

    <!-- Main Navbar -->
    <nav class="bg-white/80 backdrop-blur-md shadow-sm sticky top-0 z-50 font-rubik border-b border-gray-100">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="flex justify-between h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                        <img src="{{ asset('storage/images/logo-tanah-tinggi.png') }}" class="h-12 w-auto filter" alt="Logo Kelurahan Tanah Tinggi">
                        <div class="flex flex-col">
                            <span class="text-xl font-bold text-[#0D2A1C] leading-tight group-hover:text-[#1B4332] transition-colors uppercase">Tanah Tinggi</span>
                            <span class="text-xs font-medium text-[#C9A227] tracking-wider">KOTA TANGERANG</span>
                        </div>
                    </a>
                </div>

                <!-- Desktop Menu (Centered) -->
                <div class="hidden md:flex flex-grow justify-center items-center space-x-4">
                    <div class="relative group">
                         <button class="px-2 py-1 mx-2 text-[15px] font-medium transition-all {{ Request::is('profile*') ? 'text-[#1B4332] border-b-2 border-[#C9A227]' : 'text-gray-600 hover:text-[#1B4332]' }} inline-flex items-center">
                            Profil Kelurahan
                        </button>
                         <div class="absolute left-0 mt-0 w-48 bg-white rounded-md shadow-lg py-1 hidden group-hover:block border border-gray-100">
                            <a href="{{ route('profile.sejarah') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#F9F6EE] hover:text-[#1B4332]">Sejarah</a>
                            <a href="{{ route('profile.visi-misi') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#F9F6EE] hover:text-[#1B4332]">Visi & Misi</a>
                            <a href="{{ route('profile.struktur') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#F9F6EE] hover:text-[#1B4332]">Struktur Organisasi</a>
                            <a href="{{ route('profile.peta') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#F9F6EE] hover:text-[#1B4332]">Wilayah</a>
                        </div>
                    </div>
                    <a href="{{ route('public.layanan') }}" class="px-2 py-1 mx-2 text-[15px] font-medium transition-all {{ Request::routeIs('public.layanan') ? 'text-[#1B4332] border-b-2 border-[#C9A227]' : 'text-gray-600 hover:text-[#1B4332]' }}">
                        Layanan Surat
                    </a>
                    <a href="{{ route('verification.index') }}" class="px-2 py-1 mx-2 text-[15px] font-medium transition-all {{ Request::routeIs('verification.index') ? 'text-[#1B4332] border-b-2 border-[#C9A227]' : 'text-gray-600 hover:text-[#1B4332]' }}">
                        Cek Status
                    </a>
                </div>

                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center space-x-8 shrink-0 pl-8">
                    @auth
                        <a href="{{ route('home') }}" class="text-white bg-[#1B4332] hover:bg-[#0D2A1C] focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 shadow-sm transition-all">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-[#1B4332] font-medium text-[15px] transition-colors">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="text-gray-600 hover:text-[#1B4332] font-medium text-[15px] transition-colors">
                            Daftar
                        </a>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex md:hidden items-center">
                    <button data-collapse-toggle="mobile-menu" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-[#1B4332] hover:bg-gray-100 focus:outline-none" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden hidden bg-white border-t border-gray-100" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#1B4332] hover:bg-[#F9F6EE]">Beranda</a>
                <a href="{{ route('public.layanan') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#1B4332] hover:bg-[#F9F6EE]">Layanan</a>
                <a href="{{ route('public.stats') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#1B4332] hover:bg-[#F9F6EE]">Statistik</a>
                <a href="{{ route('verification.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#1B4332] hover:bg-[#F9F6EE]">Verifikasi Surat</a>
                @auth
                    <a href="{{ url('/home') }}" class="block w-full text-center mt-4 px-4 py-3 rounded-md text-base font-medium bg-[#1B4332] text-white hover:bg-[#0D2A1C]">Dashboard</a>
                @else
                    <div class="grid grid-cols-2 gap-2 mt-4 p-2">
                        <a href="{{ route('login') }}" class="block text-center px-4 py-3 rounded-md text-base font-medium bg-gray-100 text-gray-700">Masuk</a>
                        <a href="{{ route('register') }}" class="block text-center px-4 py-3 rounded-md text-base font-medium bg-[#C9A227] text-white">Daftar</a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Official Footer -->
    <footer class="bg-[#0D2A1C] text-gray-400 pt-16 pb-8 border-t-4 border-[#C9A227]">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <!-- Profile -->
                <div>
                     <div class="flex items-center space-x-3 mb-6">
                        <img src="{{ asset('storage/images/logo-tanah-tinggi.png') }}" class="h-10 w-auto" alt="Logo">
                        <div class="flex flex-col">
                            <span class="text-lg font-bold text-white uppercase leading-none">Tanah Tinggi</span>
                            <span class="text-xs text-[#C9A227]">Kota Tangerang</span>
                        </div>
                    </div>
                    <p class="text-sm leading-relaxed mb-6 text-gray-400">
                        Website resmi Kelurahan Tanah Tinggi, media pelayanan administrasi publik yang modern, akuntabel, dan terpercaya.
                    </p>
                    <div class="flex space-x-4">
                        <!-- Social Icons -->
                         <a href="https://www.facebook.com/KotaTangerang" class="text-white hover:text-[#C9A227] hover:scale-125 transition-all" target="_blank" title="Facebook">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/></svg>
                        </a>
                        <a href="https://www.instagram.com/kelurahan_tanah_tinggi/" class="text-white hover:text-[#C9A227] hover:scale-125 transition-all" target="_blank" title="Instagram">
                             <span class="sr-only">Instagram</span>
                             <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.153 1.772 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.468 2.37c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"/></svg>
                        </a>
                        <a href="https://www.youtube.com/@KotaTangerang" class="text-white hover:text-[#C9A227] hover:scale-125 transition-all" target="_blank" title="Youtube">
                             <span class="sr-only">Youtube</span>
                             <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.612 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 4-8 4z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Kontak -->
                <div>
                    <h3 class="text-white text-lg font-bold mb-6 relative">Hubungi Kami</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                             <svg class="w-6 h-6 text-[#C9A227] mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                             <span class="text-sm">Jl. Meteorologi, RT.005/RW.013, Tanah Tinggi, Kec. Tangerang, Kota Tangerang, Banten 15119</span>
                        </li>
                        <li class="flex items-center">
                             <svg class="w-5 h-5 text-[#C9A227] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                             <span class="text-sm">(021) 55764961</span>
                        </li>
                    </ul>
                </div>

                <!-- Tautan -->
                <div>
                     <h3 class="text-white text-lg font-bold mb-6 relative">Tautan Cepat</h3>
                     <ul class="space-y-2 text-sm">
                         <li><a href="{{ route('profile.sejarah') }}" class="hover:text-white hover:translate-x-1 transition-all inline-block">Profil Kelurahan</a></li>
                         <li><a href="{{ route('public.layanan') }}" class="hover:text-white hover:translate-x-1 transition-all inline-block">Layanan Surat</a></li>
                         <li><a href="{{ route('verification.index') }}" class="hover:text-white hover:translate-x-1 transition-all inline-block">Cek Status Surat</a></li>
                         <li><a href="{{ route('profile.peta') }}" class="hover:text-white hover:translate-x-1 transition-all inline-block">Peta Wilayah</a></li>
                     </ul>
                </div>

                <!-- Jam Layanan -->
                <div>
                    <h3 class="text-white text-lg font-bold mb-6 relative">Jam Layanan</h3>
                    <div class="bg-[#1B4332]/50 p-5 rounded-xl border border-[#1B4332]">
                        <ul class="space-y-3 text-sm">
                            <li class="flex justify-between items-center border-b border-[#1B4332]/50 pb-2">
                                <span class="text-gray-300">Senin - Kamis</span>
                                <span class="text-white font-bold tracking-wide">08:00 - 16:00</span>
                            </li>
                            <li class="flex justify-between items-center border-b border-[#1B4332]/50 pb-2">
                                <span class="text-gray-300">Jumat</span>
                                <span class="text-white font-bold tracking-wide">08:00 - 15:30</span>
                            </li>
                            <li class="flex justify-between items-center text-gray-500 pt-1">
                                <span>Sabtu - Minggu</span>
                                <span class="uppercase tracking-widest text-xs font-black text-red-400">Tutup</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="border-t border-[#1B4332] pt-8 text-center sm:text-left sm:flex justify-between items-center text-xs text-gray-500">
                <p>&copy; 2026 Kelurahan Tanah Tinggi.</p>
                <div class="mt-4 sm:mt-0 flex flex-wrap gap-4 justify-center sm:justify-end">
                    <a href="#" class="hover:text-white transition-colors">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-white transition-colors">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Animation Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/TextPlugin.min.js"></script>
    
    @stack('scripts')
</body>
</html>
