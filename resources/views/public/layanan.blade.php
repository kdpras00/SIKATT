@extends('layouts.public')

@section('title', 'Layanan Surat - Website Resmi Kelurahan Tanah Tinggi')

@section('content')
<!-- Header Section -->
<section class="relative bg-[#0D2A1C] py-24 md:py-32 overflow-hidden">
    <!-- Background Patterns -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-[#C9A227] rounded-full filter blur-[120px] -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#1B4332] rounded-full filter blur-[120px] translate-x-1/2 translate-y-1/2"></div>
    </div>
    
    <div class="absolute inset-0 opacity-20">
        <img src="{{ asset('storage/images/background-tanah-tinggi2.jpeg') }}" class="w-full h-full object-cover" alt="Background">
    </div>

    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="layanan-title opacity-0 translate-y-8 text-5xl md:text-7xl font-black text-white mb-8 font-rubik leading-tight">
            Layanan Administrasi
        </h1>
        <p class="layanan-subtitle opacity-0 translate-y-8 text-amber-100/70 text-lg md:text-xl max-w-3xl mx-auto font-roboto font-light leading-relaxed">
            Sistem pelayanan surat digital terintegrasi untuk masyarakat Kelurahan Tanah Tinggi. Cepat, transparan, dan dapat diakses kapan saja.
        </p>
    </div>

    <!-- Decorative Bottom Wave -->
    <div class="absolute bottom-0 left-0 right-0 h-24 bg-[#F9F6EE] rounded-t-[60px] md:rounded-t-[100px]"></div>
</section>

<div class="bg-[#F9F6EE] pb-32">
    <div class="max-w-screen-xl mx-auto px-4">
        
        <!-- Breadcrumb & Search -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-16 gap-6">
            <nav class="flex text-gray-400 text-sm breadcrumb font-medium opacity-0 -translate-x-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="inline-flex items-center hover:text-[#1B4332] transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                            Beranda
                        </a>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-[#C9A227] md:ml-2 font-black uppercase tracking-[0.1em]">Katalog Layanan</span>
                    </li>
                </ol>
            </nav>
            
            <div class="relative w-full md:w-96 search-container opacity-0 translate-y-4">
                <input type="text" placeholder="Cari jenis surat..." class="w-full pl-12 pr-6 py-4 bg-white rounded-2xl border border-gray-100 shadow-sm focus:ring-4 focus:ring-[#C9A227]/10 focus:border-[#C9A227] outline-none transition-all font-medium">
                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-12">
            <!-- Sidebar Filters -->
            <div class="w-full lg:w-1/4">
                <div class="sidebar-anim space-y-6 opacity-0 translate-y-8">
                    <div class="bg-white p-8 rounded-[40px] shadow-sm border border-gray-100 sticky top-32 overflow-hidden group">
                        
                        <h3 class="text-xl font-black text-[#0D2A1C] mb-8 flex items-center font-rubik relative z-10">
                            Kategori
                        </h3>
                        
                        <ul class="space-y-3 relative z-10" id="category-filters">
                            <li>
                                <a href="javascript:void(0)" data-category="all" class="category-btn flex items-center justify-between p-4 rounded-2xl bg-[#F9F6EE] text-[#0D2A1C] font-black transition-all group/cat active">
                                    <span class="text-sm">Semua Layanan</span>
                                    <span class="flex items-center justify-center w-7 h-7 rounded-full bg-white border border-gray-100 text-[10px] font-bold text-gray-400 shadow-sm">{{ count($letterTypes) }}</span>
                                </a>
                            </li>
                            @foreach($letterTypes->pluck('category')->unique() as $category)
                            @php $catName = $category ?? 'Umum'; @endphp
                            <li>
                                <a href="javascript:void(0)" data-category="{{ Str::slug($catName) }}" class="category-btn flex items-center justify-between p-4 rounded-2xl text-gray-500 hover:bg-[#F9F6EE] hover:text-[#1B4332] transition-all font-bold group/cat">
                                    <span class="text-sm">{{ $catName }}</span>
                                    <svg class="w-4 h-4 opacity-0 group-hover/cat:opacity-100 group-hover/cat:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            </li>
                            @endforeach
                        </ul>

                        <div class="mt-10 p-6 bg-[#F9F6EE] rounded-[28px] border border-gray-100 relative">
                             <div class="flex items-center mb-3">
                                <span class="text-xs font-black text-[#0D2A1C] uppercase tracking-wider">Informasi</span>
                             </div>
                             <p class="text-[11px] text-gray-500 leading-relaxed font-medium">
                                Gunakan NIK yang sudah terdaftar di sistem untuk kemudahan pengajuan.
                             </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="w-full lg:w-3/4">
                <div class="service-grid grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach($letterTypes as $type)
                    @php
                        $iconPath = 'storage/images/icons/' . $type->slug . '.png';
                        $iconExists = file_exists(public_path($iconPath));
                    @endphp
                    <div class="service-item opacity-0 translate-y-12 group bg-white p-10 rounded-[44px] shadow-sm border border-gray-100 hover:shadow-2xl hover:-translate-y-3 transition-all duration-500 relative overflow-hidden"
                         data-category="{{ Str::slug($type->category ?? 'Umum') }}"
                         data-name="{{ strtolower($type->name) }}">
                        <div class="flex items-start justify-between mb-10">
                            @if($iconExists)
                            <div class="w-20 h-20 bg-[#F9F6EE] rounded-[28px] flex items-center justify-center group-hover:bg-[#1B4332] transition-all duration-500 shadow-inner group-hover:shadow-green-900/20">
                                <img src="{{ asset($iconPath) }}" class="w-12 h-12 object-contain group-hover:brightness-0 group-hover:invert transition-all" alt="Icon">
                            </div>
                            @endif
                            <div class="text-right w-full">
                                <span class="px-5 py-2 rounded-full bg-[#1B4332]/5 text-[#1B4332] text-[10px] font-black uppercase tracking-[0.1em] border border-[#1B4332]/10">
                                    {{ $type->category ?? 'Umum' }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Text -->
                        <h3 class="text-2xl font-black text-[#0D2A1C] mb-4 font-rubik leading-tight tracking-tight group-hover:text-[#1B4332] transition-colors">{{ $type->name }}</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-10 line-clamp-2 h-10">
                            Layanan pengajuan administrasi {{ strtolower($type->name) }} secara digital dan efisien.
                        </p>
                        
                        
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        gsap.registerPlugin(ScrollTrigger);

        // 1. Header Hero Reveal (Animating TO visible state)
        const heroTl = gsap.timeline();
        heroTl.to(".layanan-title", { opacity: 1, y: 0, duration: 1.2, ease: "power4.out" })
              .to(".layanan-subtitle", { opacity: 1, y: 0, duration: 1, ease: "power4.out" }, "-=0.9");

        // 2. Navigation & Search Reveal
        gsap.to(".breadcrumb", { opacity: 1, x: 0, duration: 0.8, ease: "power3.out", scrollTrigger: { trigger: ".breadcrumb", start: "top 95%" } });
        gsap.to(".search-container", { opacity: 1, y: 0, duration: 0.8, ease: "power3.out", scrollTrigger: { trigger: ".search-container", start: "top 95%" } });

        // 3. Sidebar Reveal
        gsap.to(".sidebar-anim", {
            opacity: 1,
            y: 0,
            duration: 1,
            ease: "power3.out",
            scrollTrigger: {
                trigger: ".sidebar-anim",
                start: "top 90%"
            }
        });

        // 4. Service Items Stagger (Batch processing for safe grid animation)
        ScrollTrigger.batch(".service-item", {
            interval: 0.1,
            batchMax: 2,
            onEnter: batch => gsap.to(batch, {
                opacity: 1, 
                y: 0, 
                stagger: 0.15, 
                duration: 0.8, 
                ease: "power3.out",
                overwrite: true
            }),
            start: "top 95%"
        });

        // 5. Category & Search Filtering Logic
        const searchInput = document.querySelector('input[placeholder="Cari jenis surat..."]');
        const categoryBtns = document.querySelectorAll('.category-btn');
        const serviceItems = document.querySelectorAll('.service-item');

        function filterServices() {
            const searchTerm = searchInput.value.toLowerCase();
            const activeCategory = document.querySelector('.category-btn.active').dataset.category;

            serviceItems.forEach(item => {
                const name = item.dataset.name;
                const category = item.dataset.category;
                
                const matchesSearch = name.includes(searchTerm);
                const matchesCategory = activeCategory === 'all' || category === activeCategory;

                if (matchesSearch && matchesCategory) {
                    item.style.display = 'block';
                    gsap.to(item, { opacity: 1, scale: 1, duration: 0.4 });
                } else {
                    gsap.to(item, { 
                        opacity: 0, 
                        scale: 0.9, 
                        duration: 0.3, 
                        onComplete: () => { item.style.display = 'none'; } 
                    });
                }
            });
            
            ScrollTrigger.refresh();
        }

        categoryBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                categoryBtns.forEach(b => {
                    b.classList.remove('bg-[#F9F6EE]', 'text-[#0D2A1C]', 'active');
                    b.classList.add('text-gray-500');
                });
                
                btn.classList.add('bg-[#F9F6EE]', 'text-[#0D2A1C]', 'active');
                btn.classList.remove('text-gray-500');
                
                filterServices();
            });
        });

        searchInput.addEventListener('input', filterServices);
    });
</script>
@endpush
@endsection
