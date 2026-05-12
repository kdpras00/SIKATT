@extends('layouts.public')

@section('title', 'Beranda - Website Resmi Kelurahan Tanah Tinggi')

@section('content')
<style>
    @keyframes spin-slow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    .animate-spin-slow {
        animation: spin-slow 12s linear infinite;
    }
</style>
<div id="debug-slugs" style="display:none;">@json(\App\Models\LetterType::pluck('slug', 'name')->toArray())</div>

<!-- Hero Section -->
<div class="relative h-[850px] md:h-[950px] overflow-hidden" id="hero-slider">
    <!-- Slide 1 -->
    <div class="hero-slide absolute inset-0 transition-opacity duration-1000 opacity-100 z-10">
        <div class="absolute inset-0">
            <img src="{{ asset('storage/images/background-tanah-tinggi.jpeg') }}" class="w-full h-full object-cover shadow-inner" alt="Kantor Kelurahan 1">
            <div class="absolute inset-0 bg-gradient-to-t from-[#0D2A1C] via-[#1B4332]/70 to-transparent"></div>
        </div>
        <div class="container mx-auto px-4 relative h-full flex flex-col justify-center items-center text-center">
            <div class="w-full text-white -mt-20">
                <h1 class="hero-title text-3xl md:text-5xl lg:text-6xl font-black mb-8 tracking-tight leading-tight font-rubik whitespace-nowrap">
                    PORTAL RESMI KELURAHAN TANAH TINGGI
                </h1>
                <p class="hero-desc text-xs md:text-sm lg:text-base text-amber-50/90 font-medium mb-8 leading-relaxed drop-shadow-lg font-roboto whitespace-nowrap">
                    Melayani masyarakat dengan integritas, kecepatan, dan transparansi melalui sistem pelayanan surat digital terintegrasi.
                </p>
            </div>
        </div>
    </div>

    <!-- Slide 2 -->
    <div class="hero-slide absolute inset-0 transition-opacity duration-1000 opacity-0 z-0">
        <div class="absolute inset-0">
            <img src="{{ asset('storage/images/background-tanah-tinggi2.jpeg') }}" class="w-full h-full object-cover shadow-inner" alt="Kantor Kelurahan 2">
            <div class="absolute inset-0 bg-gradient-to-t from-[#0D2A1C] via-[#1B4332]/70 to-transparent"></div>
        </div>
        <div class="container mx-auto px-4 relative h-full flex flex-col justify-center items-end text-right">
            <div class="w-full text-white -mt-20">
                <h1 class="hero-title text-3xl md:text-5xl lg:text-6xl font-black mb-8 tracking-tight leading-tight font-rubik whitespace-nowrap">
                    PORTAL RESMI KELURAHAN TANAH TINGGI
                </h1>
                <p class="hero-desc text-xs md:text-sm lg:text-base text-amber-50/90 font-medium mb-8 leading-relaxed drop-shadow-lg font-roboto whitespace-nowrap">
                    Melayani masyarakat dengan integritas, kecepatan, dan transparansi melalui sistem pelayanan surat digital terintegrasi.
                </p>
            </div>
        </div>
    </div>

    <!-- Curved Bottom Transition -->
    <div class="absolute bottom-0 left-0 right-0 h-24 bg-[#F9F6EE] rounded-t-[50px] md:rounded-t-[100px] z-10"></div>
</div>

<!-- Quick Access Section -->
<section class="relative z-20 -mt-32 md:-mt-48 pb-20">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <a href="{{ route('public.layanan') }}" class="quick-card group bg-[#1B4332] p-8 rounded-[40px] shadow-2xl hover:-translate-y-4 transition-all duration-500 border border-white/10 opacity-0 scale-90">
                <h3 class="text-2xl font-black text-white mb-3 font-rubik tracking-tight">Buat Surat</h3>
                <p class="text-white/60 text-sm leading-relaxed mb-8">Ajukan pelayanan surat administrasi secara digital dan mandiri.</p>
            </a>

            <!-- Card 2 -->
            <a href="{{ route('verification.index') }}" class="quick-card group bg-[#C9A227] p-8 rounded-[40px] shadow-2xl hover:-translate-y-4 transition-all duration-500 border border-black/5 opacity-0 scale-90">
                <h3 class="text-2xl font-black text-white mb-3 font-rubik tracking-tight">Lacak Status</h3>
                <p class="text-white/60 text-sm leading-relaxed mb-8">Pantau proses pengajuan surat Anda secara real-time dengan kode unik.</p>  
            </a>

            <!-- Card 3 -->
            <a href="{{ route('profile.visi-misi') }}" class="quick-card group bg-[#2D6A4F] p-8 rounded-[40px] shadow-2xl hover:-translate-y-4 transition-all duration-500 border border-white/10 opacity-0 scale-90">
                <h3 class="text-2xl font-black text-white mb-3 font-rubik tracking-tight">Profil Kelurahan</h3>
                <p class="text-white/60 text-sm leading-relaxed mb-8">Kenali lebih dekat visi, misi, dan struktur organisasi Kelurahan Tanah Tinggi.</p>   
            </a>

            <!-- Card 4 -->
            <a href="{{ route('public.stats') }}" class="quick-card group bg-[#7D5A1E] p-8 rounded-[40px] shadow-2xl hover:-translate-y-4 transition-all duration-500 border border-white/10 opacity-0 scale-90">
                <h3 class="text-2xl font-black text-white mb-3 font-rubik tracking-tight">Statistik</h3>
                <p class="text-white/60 text-sm leading-relaxed mb-8">Data kependudukan dan transparansi pelayanan Kelurahan Tanah Tinggi.</p>   
            </a>
        </div>
    </div>
</section>

<!-- Welcome Section -->
<section id="profil" class="py-24 bg-white overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <div class="lg:w-1/2 welcome-text opacity-0 translate-x-[-100px]">
                <span class="text-[#C9A227] font-bold uppercase tracking-[0.2em] text-sm mb-4 block">Profile Kelurahan Tanah Tinggi</span>
                <h2 class="text-xl md:text-2xl lg:text-3xl font-black text-[#0D2A1C] mb-8 leading-tight font-rubik tracking-tight whitespace-nowrap">
                    Selamat Datang di Kelurahan Tanah Tinggi
                </h2>
                <div class="space-y-6 text-gray-600 leading-relaxed text-lg typewriter-container text-justify">
                    <p class="typewriter-text"></p>
                </div>
            </div>
            <div class="lg:w-1/2 welcome-image opacity-0 translate-x-[100px]">
                <div class="relative">
                    <!-- Circular Logo Badge Container -->
                    <div class="absolute -top-12 -left-12 w-32 h-32 z-30">
                        <!-- Rotating Border -->
                        <div class="absolute inset-0 rounded-full border-4 border-dashed border-[#C9A227] animate-spin-slow"></div>
                        <!-- Static Content -->
                        <div class="absolute inset-0 bg-white rounded-full shadow-2xl flex items-center justify-center p-6 m-1">
                            <img src="{{ asset('storage/images/logo-tanah-tinggi.png') }}" alt="Logo" class="w-full h-full object-contain">
                        </div>
                    </div>

                    <div class="absolute -top-6 -right-6 w-32 h-32 bg-[#C9A227]/20 rounded-full blur-3xl"></div>
                    <div class="absolute -bottom-6 -left-6 w-48 h-48 bg-[#1B4332]/10 rounded-full blur-3xl"></div>
                    
                    <img src="{{ asset('storage/images/background-tanah-tinggi.jpeg') }}" alt="Sambutan Lurah" class="relative z-10 rounded-[40px] shadow-2xl border-8 border-white">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Steps Section -->
<section class="py-24 bg-[#F9F6EE]">
    <div class="container mx-auto px-4">
        <div class="text-center mb-20 section-header opacity-0 translate-y-10">
            <span class="text-[#C9A227] font-bold uppercase tracking-[0.2em] text-sm mb-4 block">Alur Pelayanan</span>
            <h2 class="text-4xl md:text-5xl font-black text-[#0D2A1C] font-rubik">Cara Mudah Urus Surat</h2>
        </div>

        <div class="relative">
            <!-- Desktop Arrows -->
            <div class="hidden lg:block absolute top-12 left-[21.5%] z-0 pointer-events-none">
                <svg class="step-arrow opacity-0 -translate-x-8 w-16 h-8 text-black" fill="none" viewBox="0 0 64 32">
                    <path d="M0 16H60M60 16L48 4M60 16L48 28" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="hidden lg:block absolute top-12 left-[46.5%] z-0 pointer-events-none">
                <svg class="step-arrow opacity-0 -translate-x-8 w-16 h-8 text-black" fill="none" viewBox="0 0 64 32">
                    <path d="M0 16H60M60 16L48 4M60 16L48 28" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="hidden lg:block absolute top-12 left-[71.5%] z-0 pointer-events-none">
                <svg class="step-arrow opacity-0 -translate-x-8 w-16 h-8 text-black" fill="none" viewBox="0 0 64 32">
                    <path d="M0 16H60M60 16L48 4M60 16L48 28" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 relative z-10">
                <!-- Step 1 -->
                <div class="step-item text-center opacity-0 translate-y-20 group">
                    <div class="relative inline-block mb-8">
                        <div class="w-24 h-24 bg-white rounded-3xl shadow-xl flex items-center justify-center relative z-10 group-hover:scale-110 transition-transform duration-500">
                            <span class="text-4xl font-black text-[#1B4332]">01</span>
                        </div>
                        <div class="absolute -inset-4 bg-[#1B4332]/5 rounded-full blur-2xl group-hover:bg-[#1B4332]/10 transition-colors"></div>
                    </div>
                    <h3 class="text-2xl font-bold text-[#0D2A1C] mb-4">Daftar Akun</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">Registrasi menggunakan NIK valid untuk mendapatkan akses layanan digital.</p>
                </div>

                <!-- Step 2 -->
                <div class="step-item text-center opacity-0 translate-y-20 group">
                    <div class="relative inline-block mb-8">
                        <div class="w-24 h-24 bg-white rounded-3xl shadow-xl flex items-center justify-center relative z-10 group-hover:scale-110 transition-transform duration-500">
                            <span class="text-4xl font-black text-[#1B4332]">02</span>
                        </div>
                        <div class="absolute -inset-4 bg-[#C9A227]/10 rounded-full blur-2xl group-hover:bg-[#C9A227]/20 transition-colors"></div>
                    </div>
                    <h3 class="text-2xl font-bold text-[#0D2A1C] mb-4">Pilih & Isi Data</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">Pilih jenis surat dan lengkapi formulir sesuai dengan kebutuhan Anda.</p>
                </div>

                <!-- Step 3 -->
                <div class="step-item text-center opacity-0 translate-y-20 group">
                    <div class="relative inline-block mb-8">
                        <div class="w-24 h-24 bg-white rounded-3xl shadow-xl flex items-center justify-center relative z-10 group-hover:scale-110 transition-transform duration-500">
                            <span class="text-4xl font-black text-[#1B4332]">03</span>
                        </div>
                        <div class="absolute -inset-4 bg-[#1B4332]/5 rounded-full blur-2xl group-hover:bg-[#1B4332]/10 transition-colors"></div>
                    </div>
                    <h3 class="text-2xl font-bold text-[#0D2A1C] mb-4">Tanda Tangan</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">Lakukan tanda tangan digital secara langsung di layar perangkat Anda.</p>
                </div>

                <!-- Step 4 -->
                <div class="step-item text-center opacity-0 translate-y-20 group">
                    <div class="relative inline-block mb-8">
                        <div class="w-24 h-24 bg-white rounded-3xl shadow-xl flex items-center justify-center relative z-10 group-hover:scale-110 transition-transform duration-500">
                            <span class="text-4xl font-black text-[#1B4332]">04</span>
                        </div>
                        <div class="absolute -inset-4 bg-[#C9A227]/10 rounded-full blur-2xl group-hover:bg-[#C9A227]/20 transition-colors"></div>
                    </div>
                    <h3 class="text-2xl font-bold text-[#0D2A1C] mb-4">Unduh Surat</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">Setelah disetujui oleh pihak Kelurahan, surat resmi dapat langsung Anda unduh secara mandiri.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 relative overflow-hidden cta-section" style="background-size: 200% 200%;">
    <div class="absolute inset-0 bg-gradient-to-r from-[#0D2A1C] via-[#1B4332] to-[#0D2A1C]"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center cta-content opacity-0 scale-95">
            
            <p class="text-green-100/80 text-md mb-12 leading-relaxed">
                Tim layanan pelanggan kami siap membantu Anda melalui kanal WhatsApp resmi Kelurahan Tanah Tinggi.
            </p>
            <div class="flex justify-center">
                <a href="https://wa.me/622155770275" target="_blank" class="wa-button px-10 py-5 bg-[#25D366] hover:bg-[#128C7E] text-white font-black rounded-2xl transition-all shadow-2xl shadow-[#25D366]/20 flex items-center group transform hover:-translate-y-1">
                    <svg class="w-7 h-7 mr-3 fill-current" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    WhatsApp Layanan
                </a>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        gsap.registerPlugin(ScrollTrigger);

        // 1. Hero Slider
        const slides = document.querySelectorAll('.hero-slide');
        if(slides.length > 0) {
            let currentSlide = 0;
            setInterval(() => {
                slides[currentSlide].classList.remove('opacity-100', 'z-10');
                slides[currentSlide].classList.add('opacity-0', 'z-0');
                
                currentSlide = (currentSlide + 1) % slides.length;
                
                slides[currentSlide].classList.remove('opacity-0', 'z-0');
                slides[currentSlide].classList.add('opacity-100', 'z-10');
            }, 5000);
        }

        // 2. Quick Access Cards
        gsap.to(".quick-card", {
            y: 0,
            opacity: 1,
            scale: 1,
            duration: 0.8,
            stagger: 0.1,
            ease: "back.out(1.5)",
            scrollTrigger: {
                trigger: ".quick-card",
                start: "top 95%",
                toggleActions: "play reverse play reverse"
            }
        });

        // 3. Welcome Section
        const welcomeTl = gsap.timeline({
            scrollTrigger: {
                trigger: "#profil",
                start: "top 80%",
                toggleActions: "play reverse play reverse"
            }
        });

        welcomeTl.to(".welcome-image", { x: 0, opacity: 1, duration: 1, ease: "power3.out" })
                 .to(".welcome-text", { x: 0, opacity: 1, duration: 1, ease: "power3.out" }, "-=0.7")
                 .to(".typewriter-text", {
                     duration: 3,
                     text: "Selamat datang di portal resmi Kelurahan Tanah Tinggi. Kami berkomitmen untuk terus berinovasi dalam mempermudah segala urusan administrasi masyarakat melalui transformasi digital yang inklusif dan transparan.",
                     ease: "none"
                 })
                 .to(".italic-text", { opacity: 1, duration: 0.5 })
                 .to(".profile-info", { opacity: 1, y: 0, duration: 0.5 });

        // 4. Steps Section
        gsap.to(".section-header", {
            opacity: 1,
            y: 0,
            duration: 1,
            scrollTrigger: {
                trigger: ".section-header",
                start: "top 85%",
                toggleActions: "play reverse play reverse"
            }
        });

        gsap.to(".step-item", {
            opacity: 1,
            y: 0,
            duration: 0.8,
            stagger: 0.2,
            ease: "power3.out",
            scrollTrigger: {
                trigger: ".step-item",
                start: "top 85%",
                toggleActions: "play reverse play reverse"
            }
        });

        gsap.to(".step-arrow", {
            opacity: 1,
            x: 0,
            duration: 0.6,
            stagger: 0.2,
            ease: "back.out(1.5)",
            delay: 0.4,
            scrollTrigger: {
                trigger: ".step-item",
                start: "top 85%",
                toggleActions: "play reverse play reverse"
            }
        });

        // 5. CTA Section
        gsap.to(".cta-content", {
            opacity: 1,
            scale: 1,
            duration: 1,
            ease: "back.out(1.2)",
            scrollTrigger: {
                trigger: ".cta-section",
                start: "top 90%",
                toggleActions: "play reverse play reverse"
            }
        });

        gsap.to(".cta-section", {
            backgroundPosition: "100% 100%",
            duration: 15,
            repeat: -1,
            yoyo: true,
            ease: "linear"
        });

        // 6. WhatsApp Shake
        gsap.from(".wa-button", {
            x: -2,
            repeat: -1,
            yoyo: true,
            duration: 0.1,
            ease: "none",
            scrollTrigger: {
                trigger: ".wa-button",
                start: "top 95%"
            }
        });
    });
</script>
@endpush
@endsection
