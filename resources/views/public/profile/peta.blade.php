@extends('layouts.public')

@section('title', 'Peta Kelurahan - Website Resmi Kelurahan Tanah Tinggi')

@section('content')
<!-- Page Header -->
<div class="relative bg-[#0D2A1C] py-24 md:py-32 overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <img src="{{ asset('storage/images/background-tanah-tinggi.jpeg') }}" class="w-full h-full object-cover" alt="Background">
    </div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-5xl md:text-7xl font-black text-white mb-8 font-rubik opacity-0 translate-y-10 reveal-header leading-tight">Peta Wilayah</h1>
        <p class="text-amber-100/70 text-lg md:text-xl max-w-3xl mx-auto font-roboto opacity-0 translate-y-10 reveal-header leading-relaxed font-light">Gambaran geografis dan administratif wilayah Kelurahan Tanah Tinggi.</p>
    </div>
    <div class="absolute bottom-0 left-0 right-0 h-24 bg-[#F9F6EE] rounded-t-[60px] md:rounded-t-[100px]"></div>
</div>

<div class="bg-[#F9F6EE] py-12">
    <div class="max-w-screen-xl mx-auto px-4">
        
        <!-- Breadcrumb -->
        <nav class="flex mb-12 text-gray-500 text-sm reveal-header opacity-0" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center hover:text-[#1B4332] transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-[#C9A227] md:ml-2 font-bold uppercase tracking-widest">Peta Kelurahan</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Map Section -->
        <div class="bg-white rounded-[40px] p-4 md:p-6 shadow-sm border border-gray-100 reveal-content opacity-0 translate-y-10 mb-16 relative">
            <div class="relative bg-white rounded-[32px] overflow-hidden">
                <iframe 
                    src="https://maps.google.com/maps?q=Kantor+Kelurahan+Tanah+Tinggi,+Kota+Tangerang&t=&z=15&ie=UTF8&iwloc=&output=embed" 
                    width="100%" 
                    height="550" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade"
                    class="w-full h-[400px] md:h-[550px]">
                </iframe>
            </div>
        </div>

        <!-- Interactive Details Section -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Batas Wilayah (Takes up 7 columns on LG) -->
            <div class="lg:col-span-7 reveal-content opacity-0 translate-y-10">
                <h3 class="text-3xl font-black text-[#0D2A1C] mb-8 font-rubik flex items-center">
                    Batas Wilayah
                </h3>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Utara -->
                    <div class="bg-white rounded-[32px] p-8 shadow-sm border-2 border-transparent hover:border-[#1B4332]/20 hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 group relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-bl from-blue-50 to-transparent rounded-bl-full -z-10"></div>
                        <svg class="absolute -bottom-4 -right-4 w-32 h-32 text-gray-50 group-hover:text-blue-50 transform group-hover:-translate-y-4 transition-all duration-700 z-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                        
                        <div class="relative z-10 pt-2">
                            <h4 class="font-black text-[#C9A227] text-xs uppercase tracking-[0.3em] mb-2">Utara</h4>
                            <p class="text-xl font-bold text-[#0D2A1C] font-rubik leading-tight">Kelurahan Batusari</p>
                            <p class="text-sm text-gray-500 mt-1">Kec. Batuceper</p>
                        </div>
                    </div>

                    <!-- Selatan -->
                    <div class="bg-white rounded-[32px] p-8 shadow-sm border-2 border-transparent hover:border-[#1B4332]/20 hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 group relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-bl from-red-50 to-transparent rounded-bl-full -z-10"></div>
                        <svg class="absolute -bottom-4 -right-4 w-32 h-32 text-gray-50 group-hover:text-red-50 transform group-hover:translate-y-4 transition-all duration-700 z-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                        
                        <div class="relative z-10 pt-2">
                            <h4 class="font-black text-[#C9A227] text-xs uppercase tracking-[0.3em] mb-2">Selatan</h4>
                            <p class="text-xl font-bold text-[#0D2A1C] font-rubik leading-tight">Kelurahan Buaran Indah</p>
                            <p class="text-sm text-gray-500 mt-1">Kec. Tangerang</p>
                        </div>
                    </div>

                    <!-- Barat -->
                    <div class="bg-white rounded-[32px] p-8 shadow-sm border-2 border-transparent hover:border-[#1B4332]/20 hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 group relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-bl from-green-50 to-transparent rounded-bl-full -z-10"></div>
                        <svg class="absolute -bottom-4 -right-4 w-32 h-32 text-gray-50 group-hover:text-green-50 transform group-hover:-translate-x-4 transition-all duration-700 z-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        
                        <div class="relative z-10 pt-2">
                            <h4 class="font-black text-[#C9A227] text-xs uppercase tracking-[0.3em] mb-2">Barat</h4>
                            <p class="text-xl font-bold text-[#0D2A1C] font-rubik leading-tight">Kelurahan Sukaasih</p>
                            <p class="text-sm text-gray-500 mt-1">Kec. Tangerang</p>
                        </div>
                    </div>

                    <!-- Timur -->
                    <div class="bg-white rounded-[32px] p-8 shadow-sm border-2 border-transparent hover:border-[#1B4332]/20 hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 group relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-bl from-yellow-50 to-transparent rounded-bl-full -z-10"></div>
                        <svg class="absolute -bottom-4 -right-4 w-32 h-32 text-gray-50 group-hover:text-yellow-50 transform group-hover:translate-x-4 transition-all duration-700 z-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        
                        <div class="relative z-10 pt-2">
                            <h4 class="font-black text-[#C9A227] text-xs uppercase tracking-[0.3em] mb-2">Timur</h4>
                            <p class="text-xl font-bold text-[#0D2A1C] font-rubik leading-tight">Kelurahan Poris Plawad Indah</p>
                            <p class="text-sm text-gray-500 mt-1">Kec. Cipondoh</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Titik Lokasi Penting (Takes up 5 columns on LG) -->
            <div class="lg:col-span-5 reveal-content opacity-0 translate-y-10 delay-100">
                <div class="bg-white rounded-[40px] p-8 md:p-10 shadow-lg border border-gray-100 h-full relative overflow-hidden">
                    <div class="absolute -top-12 -right-12 w-40 h-40 bg-[#C9A227]/10 rounded-full blur-2xl pointer-events-none"></div>
                    
                    <h3 class="text-2xl font-black text-[#0D2A1C] mb-8 font-rubik flex items-center relative z-10">
                        Lokasi Penting
                    </h3>
                    
                    <div class="space-y-4 relative z-10">
                        @php
                            $lokasi_penting = [
                                ['Kantor Kelurahan', 'Pusat layanan administrasi', 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                                ['Stasiun Tanah Tinggi', 'Akses transportasi KRL', 'M12 19l9 2-9-18-9 18 9-2zm0 0v-8'],
                                ['Pasar Induk Tanah Tinggi', 'Pusat perbelanjaan grosir', 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z'],
                                ['Puskesmas', 'Fasilitas kesehatan utama', 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'],
                                ['Polsek Tangerang', 'Pusat keamanan & ketertiban', 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z']
                            ];
                        @endphp
                        @foreach($lokasi_penting as $item)
                        <div class="p-4 px-6 rounded-2xl bg-gray-50/50 border border-transparent">
                            <h4 class="text-base font-bold text-gray-800">{{ $item[0] }}</h4>
                            <p class="text-xs text-gray-500 mt-1 leading-relaxed">{{ $item[1] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        gsap.registerPlugin(ScrollTrigger);

        gsap.to(".reveal-header", {
            opacity: 1,
            y: 0,
            duration: 1,
            stagger: 0.2,
            ease: "power4.out"
        });

        gsap.to(".reveal-content", {
            opacity: 1,
            y: 0,
            duration: 1.2,
            ease: "power3.out",
            scrollTrigger: {
                trigger: ".reveal-content",
                start: "top 85%"
            }
        });
    });
</script>
@endpush
@endsection
