@extends('layouts.public')

@section('title', 'Visi & Misi - Website Resmi Kelurahan Tanah Tinggi')

@section('content')
<!-- Page Header -->
<div class="relative bg-[#0D2A1C] py-24 md:py-32 overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <img src="{{ asset('storage/images/background-tanah-tinggi3.jpeg') }}" class="w-full h-full object-cover" alt="Background">
    </div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-5xl md:text-7xl font-black text-white mb-8 font-rubik opacity-0 translate-y-10 reveal-item leading-tight">Visi & Misi</h1>
        <p class="text-amber-100/70 text-lg md:text-xl max-w-3xl mx-auto font-roboto opacity-0 translate-y-10 reveal-item leading-relaxed font-light">Arah pembangunan dan cita-cita luhur Pemerintah Kelurahan Tanah Tinggi.</p>
    </div>
    <div class="absolute bottom-0 left-0 right-0 h-24 bg-[#F9F6EE] rounded-t-[60px] md:rounded-t-[100px]"></div>
</div>

<div class="bg-[#F9F6EE] py-24">
    <div class="max-w-screen-xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
            <!-- Visi -->
            <div class="reveal-item opacity-0 translate-x-[-50px]">
                <div class="bg-white border border-gray-300 rounded shadow-sm p-8 h-full">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Visi</h2>
                    <p class="text-xl text-gray-700 leading-relaxed text-justify">
                        "Terwujudnya Kelurahan Tanah Tinggi yang Berdaya Saing, Sejahtera, dan Berakhlakul Karimah, selaras dengan Visi Kota Tangerang dalam Mewujudkan Tata Kelola Pemerintahan yang Profesional dan Berintegritas."
                    </p>
                </div>
            </div>

            <!-- Misi -->
            <div class="reveal-item opacity-0 translate-x-[50px]">
                <div class="bg-white border border-gray-300 rounded shadow-sm p-8 h-full">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Misi Utama</h2>
                    <ul class="space-y-4">
                        @php
                            $misi = [
                                "Meningkatkan kualitas pelayanan administrasi publik yang profesional, cepat, tepat, dan transparan bagi seluruh warga.",
                                "Meningkatkan kualitas sumber daya manusia melalui dukungan pada sektor kesehatan, pendidikan, dan kesejahteraan sosial.",
                                "Mewujudkan penataan lingkungan perkotaan yang bersih, sehat, serta infrastruktur kelurahan yang memadai.",
                                "Mendorong pemberdayaan ekonomi masyarakat melalui pembinaan UMKM dan kemandirian warga.",
                                "Meningkatkan kesadaran beragama dan kerukunan antar warga untuk menciptakan lingkungan yang aman dan kondusif."
                            ];
                        @endphp
                        @foreach($misi as $index => $item)
                        <li class="flex items-start">
                            <span class="mr-3 font-bold text-gray-800 mt-1">{{ $index + 1 }}.</span>
                            <p class="text-gray-700 leading-relaxed text-justify">{{ $item }}</p>
                        </li>
                        @endforeach
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

        gsap.to(".reveal-item", {
            opacity: 1,
            y: 0,
            x: 0,
            duration: 1.2,
            stagger: 0.2,
            ease: "power4.out",
            scrollTrigger: {
                trigger: ".reveal-item",
                start: "top 85%"
            }
        });
    });
</script>
@endpush
@endsection
