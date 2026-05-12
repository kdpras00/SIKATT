@extends('layouts.public')

@section('title', 'Statistik - Website Resmi Kelurahan Tanah Tinggi')

@section('content')
<!-- Header Section -->
<div class="relative bg-[#0D2A1C] py-20 overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <img src="{{ asset('storage/images/background-tanah-tinggi2.jpeg') }}" class="w-full h-full object-cover" alt="Background">
    </div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-4xl md:text-6xl font-black text-white mb-6 font-rubik stagger-reveal opacity-0 translate-y-10">Statistik Kelurahan</h1>
        <p class="text-amber-100/80 text-lg max-w-2xl mx-auto font-roboto stagger-reveal opacity-0 translate-y-10">Transparansi data kependudukan dan pelayanan publik Kelurahan Tanah Tinggi secara real-time.</p>
    </div>
    <div class="absolute bottom-0 left-0 right-0 h-16 bg-[#F9F6EE] rounded-t-[50px]"></div>
</div>

<div class="bg-[#F9F6EE] py-12">
    <div class="max-w-screen-xl mx-auto px-4">
        
        <!-- Breadcrumb -->
        <nav class="flex mb-12 text-gray-500 text-sm stagger-reveal opacity-0 translate-y-10" aria-label="Breadcrumb">
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
                        <span class="ml-1 text-[#C9A227] md:ml-2 font-bold">Statistik Publik</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Main Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-20">
            <!-- Card 1 -->
            <div class="stat-card bg-white p-8 rounded-[32px] shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-500 group overflow-hidden relative opacity-0 translate-y-10">
                <div class="absolute top-0 right-0 w-24 h-24 bg-[#1B4332]/5 rounded-bl-[100px] -mr-8 -mt-8 group-hover:scale-150 transition-transform duration-700"></div>
                <div class="text-gray-500 text-sm font-bold uppercase tracking-widest mb-2">Total Penduduk</div>
                <div class="text-5xl font-black text-[#0D2A1C] mb-4 count-up" data-value="{{ $total_penduduk }}">0</div>
            </div>

            <!-- Card 2 -->
            <div class="stat-card bg-white p-8 rounded-[32px] shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-500 group overflow-hidden relative opacity-0 translate-y-10">
                <div class="absolute top-0 right-0 w-24 h-24 bg-[#C9A227]/5 rounded-bl-[100px] -mr-8 -mt-8 group-hover:scale-150 transition-transform duration-700"></div>
                <div class="text-gray-500 text-sm font-bold uppercase tracking-widest mb-2">Surat Terbit</div>
                <div class="text-5xl font-black text-[#0D2A1C] mb-4 count-up" data-value="{{ $total_letters }}">0</div>
            </div>

            <!-- Card 3 -->
            <div class="stat-card bg-white p-8 rounded-[32px] shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-500 group overflow-hidden relative opacity-0 translate-y-10">
                <div class="absolute top-0 right-0 w-24 h-24 bg-[#1B4332]/5 rounded-bl-[100px] -mr-8 -mt-8 group-hover:scale-150 transition-transform duration-700"></div>
                <div class="text-gray-500 text-sm font-bold uppercase tracking-widest mb-2">Jumlah RT</div>
                <div class="text-5xl font-black text-[#0D2A1C] mb-4 count-up" data-value="84">0</div>
            </div>

            <!-- Card 4 -->
            <div class="stat-card bg-white p-8 rounded-[32px] shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-500 group overflow-hidden relative opacity-0 translate-y-10">
                <div class="absolute top-0 right-0 w-24 h-24 bg-[#C9A227]/5 rounded-bl-[100px] -mr-8 -mt-8 group-hover:scale-150 transition-transform duration-700"></div>
                <div class="text-gray-500 text-sm font-bold uppercase tracking-widest mb-2">Jumlah RW</div>
                <div class="text-5xl font-black text-[#0D2A1C] mb-4 count-up" data-value="14">0</div>
            </div>
        </div>

        <!-- Demographics Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 mb-20">
            <!-- Gender Distribution -->
            <div class="lg:col-span-2 reveal-section opacity-0 translate-y-10">
                <div class="bg-white p-10 rounded-[40px] shadow-sm border border-gray-100 h-full">
                    <h3 class="text-2xl font-black text-[#0D2A1C] mb-8 font-rubik flex items-center">
                        Komposisi Penduduk
                    </h3>
                    
                    <div class="space-y-10">
                        <!-- Laki-laki -->
                        <div>
                            <div class="flex justify-between items-center mb-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-[#1B4332]/10 rounded-xl flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-[#1B4332]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <span class="font-bold text-gray-700">Laki-laki</span>
                                </div>
                                <span class="font-black text-[#1B4332] text-xl">{{ number_format($total_laki) }} Jiwa</span>
                            </div>
                            <div class="w-full bg-gray-100 h-4 rounded-full overflow-hidden">
                                <div class="gender-bar h-full bg-[#1B4332] rounded-full" style="width: 0%" data-width="{{ ($total_laki / $total_penduduk) * 100 }}%"></div>
                            </div>
                        </div>

                        <!-- Perempuan -->
                        <div>
                            <div class="flex justify-between items-center mb-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-[#C9A227]/10 rounded-xl flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-[#C9A227]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <span class="font-bold text-gray-700">Perempuan</span>
                                </div>
                                <span class="font-black text-[#C9A227] text-xl">{{ number_format($total_perempuan) }} Jiwa</span>
                            </div>
                            <div class="w-full bg-gray-100 h-4 rounded-full overflow-hidden">
                                <div class="gender-bar h-full bg-[#C9A227] rounded-full" style="width: 0%" data-width="{{ ($total_perempuan / $total_penduduk) * 100 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Block -->
            <div class="reveal-section opacity-0 translate-y-10">
                <div class="bg-white p-10 rounded-[40px] shadow-sm border border-gray-100 h-full">
                    <h3 class="text-2xl font-black text-[#0D2A1C] mb-8 font-rubik flex items-center">Administrasi</h3>
                    <ul class="space-y-6">
                        <li class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-green-50 rounded-2xl flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-[#1B4332]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <div class="text-xs text-gray-500 uppercase tracking-widest font-bold">Luas Wilayah</div>
                                <div class="text-lg font-black text-[#0D2A1C]">1.24 km²</div>
                            </div>
                        </li>
                        <li class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-green-50 rounded-2xl flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-[#1B4332]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            </div>
                            <div>
                                <div class="text-xs text-gray-500 uppercase tracking-widest font-bold">Kecamatan</div>
                                <div class="text-lg font-black text-[#0D2A1C]">Tangerang</div>
                            </div>
                        </li>
                        <li class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-green-50 rounded-2xl flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-[#1B4332]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-7h.01M9 16h.01M7 16h.01"/></svg>
                            </div>
                            <div>
                                <div class="text-xs text-gray-500 uppercase tracking-widest font-bold">Kodepos</div>
                                <div class="text-lg font-black text-[#0D2A1C]">15119</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        gsap.registerPlugin(ScrollTrigger);

        // 1. Staggered Header Reveal
        gsap.to(".stagger-reveal", {
            opacity: 1,
            y: 0,
            duration: 1,
            stagger: 0.2,
            ease: "power4.out"
        });

        // 2. CountUp Animation for Stats
        const countElements = document.querySelectorAll('.count-up');
        countElements.forEach(el => {
            const target = parseInt(el.getAttribute('data-value'));
            gsap.to(el, {
                innerText: target,
                duration: 2,
                snap: { innerText: 1 },
                scrollTrigger: {
                    trigger: el,
                    start: "top 90%"
                }
            });
        });

        // 3. Stat Cards Entry
        gsap.to(".stat-card", {
            opacity: 1,
            y: 0,
            duration: 0.8,
            stagger: 0.1,
            ease: "back.out(1.2)",
            scrollTrigger: {
                trigger: ".stat-card",
                start: "top 95%"
            }
        });

        // 4. Progress Bars Grow
        const bars = document.querySelectorAll('.gender-bar');
        bars.forEach(bar => {
            const width = bar.getAttribute('data-width');
            gsap.to(bar, {
                width: width,
                duration: 1.5,
                ease: "expo.out",
                scrollTrigger: {
                    trigger: bar,
                    start: "top 90%"
                }
            });
        });

        // 5. Sections Reveal
        gsap.to(".reveal-section", {
            opacity: 1,
            y: 0,
            duration: 1,
            stagger: 0.3,
            ease: "power3.out",
            scrollTrigger: {
                trigger: ".reveal-section",
                start: "top 85%"
            }
        });
    });
</script>
@endpush
@endsection
