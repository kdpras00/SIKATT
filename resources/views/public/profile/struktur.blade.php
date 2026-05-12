@extends('layouts.public')

@section('title', 'Struktur Organisasi - Website Resmi Kelurahan Tanah Tinggi')

@section('content')
<!-- Page Header -->
<div class="relative bg-[#0D2A1C] py-24 md:py-32 overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <img src="{{ asset('storage/images/background-tanah-tinggi.jpeg') }}" class="w-full h-full object-cover" alt="Background">
    </div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-5xl md:text-7xl font-black text-white mb-8 font-rubik opacity-0 translate-y-10 reveal-header leading-tight">Struktur Organisasi</h1>
        <p class="text-amber-100/70 text-lg md:text-xl max-w-3xl mx-auto font-roboto opacity-0 translate-y-10 reveal-header leading-relaxed font-light">Susunan Organisasi dan Tata Kerja Pemerintah Kelurahan Tanah Tinggi.</p>
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
                        <span class="ml-1 text-[#C9A227] md:ml-2 font-bold uppercase tracking-widest">Struktur Organisasi</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Digital Structure Chart -->
        <div class="mb-24 overflow-x-auto pb-12 reveal-chart opacity-0 translate-y-10">
            <div class="min-w-[900px] flex flex-col items-center font-sans pb-16">
                
                <!-- LEVEL 1: LURAH -->
                <div class="flex flex-col items-center relative z-10 w-full">
                    <div class="bg-white border border-gray-800 p-3 w-[300px] text-center relative z-20">
                        <div class="text-[13px] text-gray-800 mb-1 uppercase">Lurah</div>
                        <div class="text-[13px] text-gray-800 underline mb-1 uppercase">DIDIN KHOMARUDIN, S.Sos.M.Si</div>
                        <div class="text-[13px] text-gray-800">NIP: 196711102001121003</div>
                    </div>
                    <!-- Vertical line down -->
                    <div class="h-16 w-px bg-gray-800 relative z-0"></div>
                </div>

                <!-- LEVEL 2: Jabatan Fungsional & Sekretaris -->
                <div class="flex w-[800px] justify-between items-center relative -mt-px">
                    <!-- The vertical center line passing through -->
                    <div class="absolute left-1/2 w-px h-full bg-gray-800 top-0 z-0"></div>
                    <!-- The horizontal intersection line -->
                    <div class="absolute top-1/2 w-full h-px bg-gray-800 z-0"></div>
                    
                    <!-- Left Item: Jabatan Fungsional -->
                    <div class="bg-white border border-gray-800 w-52 text-center flex flex-col items-center relative z-10">
                        <div class="border-b border-gray-800 w-full p-2 text-[13px] text-gray-800">Jabatan Fungsional</div>
                        <div class="w-full grid grid-cols-3 grid-rows-3 h-24">
                            <div class="border-r border-b border-gray-800"></div>
                            <div class="border-r border-b border-gray-800"></div>
                            <div class="border-b border-gray-800"></div>
                            <div class="border-r border-b border-gray-800"></div>
                            <div class="border-r border-b border-gray-800"></div>
                            <div class="border-b border-gray-800"></div>
                            <div class="border-r border-gray-800"></div>
                            <div class="border-r border-gray-800"></div>
                            <div></div>
                        </div>
                    </div>

                    <!-- Right Item: Sekretaris -->
                    <div class="bg-white border border-gray-800 p-3 w-[280px] text-center relative z-10">
                        <div class="text-[13px] text-gray-800 mb-1 uppercase">Sekretaris</div>
                        <div class="text-[13px] text-gray-800 underline mb-1 uppercase">ALAMSYAH, SH</div>
                        <div class="text-[13px] text-gray-800">NIP: 197312032007011005</div>
                    </div>
                </div>
                
                <!-- Vertical line down to Level 3 -->
                <div class="h-12 w-px bg-gray-800 relative z-0"></div>

                <!-- LEVEL 3: Dua Kepala Seksi -->
                <div class="relative w-[700px]">
                    <!-- Horizontal line connecting the centers of the two 50% columns -->
                    <div class="absolute top-0 left-[25%] w-[50%] h-px bg-gray-800 z-0"></div>
                    
                    <div class="flex w-full">
                        <!-- Left: Tata Pemerintahan -->
                        <div class="flex flex-col items-center w-1/2 relative z-10">
                            <!-- Drop line from horizontal connection -->
                            <div class="h-8 w-px bg-gray-800 relative z-0"></div>
                            <div class="bg-white border border-gray-800 p-3 w-[280px] text-center relative z-20">
                                <div class="text-[13px] text-gray-800 mb-1 uppercase">Kepala Seksi Tata<br>Pemerintahan</div>
                                <div class="text-[13px] text-gray-800 underline mb-1 uppercase">IDA FARIDA,SE, M.Si</div>
                                <div class="text-[13px] text-gray-800">NIP: 1969099262009012001</div>
                            </div>
                        </div>

                        <!-- Right: Ekonomi dan Pembangunan -->
                        <div class="flex flex-col items-center w-1/2 relative z-10">
                            <!-- Drop line from horizontal connection -->
                            <div class="h-8 w-px bg-gray-800 relative z-0"></div>
                            <div class="bg-white border border-gray-800 p-3 w-[280px] text-center relative z-20">
                                <div class="text-[13px] text-gray-800 mb-1 uppercase">Kepala Seksi<br>Ekonomi Dan Pembangunan</div>
                                <div class="text-[13px] text-gray-800 underline mb-1 uppercase">WAHYU SUPRIYATNA</div>
                                <div class="text-[13px] text-gray-800">NIP: 196909262009012001</div>
                            </div>
                        </div>
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

        gsap.to(".reveal-chart", {
            opacity: 1,
            y: 0,
            duration: 1.5,
            ease: "power3.out",
            scrollTrigger: {
                trigger: ".reveal-chart",
                start: "top 85%"
            }
        });


    });
</script>
@endpush
@endsection
