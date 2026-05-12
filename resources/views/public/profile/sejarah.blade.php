@extends('layouts.public')

@section('title', 'Sejarah Kelurahan - Website Resmi Kelurahan Tanah Tinggi')

@section('content')
<!-- Page Header -->
<div class="relative bg-[#0D2A1C] py-24 md:py-32 overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <img src="{{ asset('storage/images/background-tanah-tinggi.jpeg') }}" class="w-full h-full object-cover" alt="Background">
    </div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-5xl md:text-7xl font-black text-white mb-8 font-rubik opacity-0 translate-y-10 reveal-header leading-tight">Sejarah Kelurahan</h1>
        <p class="text-amber-100/70 text-lg md:text-xl max-w-3xl mx-auto font-roboto opacity-0 translate-y-10 reveal-header leading-relaxed font-light">Menelusuri jejak perjalanan Kelurahan Tanah Tinggi dari masa ke masa.</p>
    </div>
    <div class="absolute bottom-0 left-0 right-0 h-24 bg-[#F9F6EE] rounded-t-[60px] md:rounded-t-[100px]"></div>
</div>

<div class="py-24 bg-[#F9F6EE]">
    <div class="max-w-screen-lg mx-auto px-4">
        <div class="prose prose-lg text-gray-600 mx-auto reveal-content opacity-0 translate-y-10">
            <h2 class="text-3xl font-black text-[#0D2A1C] mb-6 font-rubik flex items-center">
                Asal Usul Nama
            </h2>
            <p class="mb-8 text-lg leading-relaxed text-gray-700 text-justify">
                Kelurahan Tanah Tinggi merupakan wilayah administratif yang terletak di Kecamatan Tangerang, Kota Tangerang. 
                Nama "Tanah Tinggi" diambil langsung dari karakteristik geografis wilayahnya yang memiliki kontur tanah relatif lebih tinggi dibandingkan dengan daerah-daerah di sekitarnya. Hal ini terlihat sangat kontras saat membandingkannya dengan area dataran rendah di bantaran Sungai Cisadane atau sepanjang aliran Kali Mookervart.
            </p>

            <div class="my-16 relative">
                 <div class="absolute -inset-4 bg-[#C9A227]/10 rounded-[40px] blur-2xl"></div>
                 <div class="relative rounded-[32px] overflow-hidden shadow-2xl border-8 border-white">
                    <img src="{{ asset('storage/images/background-tanah-tinggi2.jpeg') }}" alt="Sejarah Kelurahan" class="w-full h-[500px] object-cover">
                 </div>
            </div>

            <h2 class="text-3xl font-black text-[#0D2A1C] mb-6 font-rubik flex items-center mt-16">
                Era Hindia Belanda
            </h2>
            <p class="mb-8 text-lg leading-relaxed text-gray-700 text-justify">
                Secara historis, kawasan ini memiliki rekam jejak panjang sejak masa kolonial Hindia Belanda. 
                Dahulu kala, pinggiran wilayah Tanah Tinggi yang berbatasan langsung dengan sisi Kali Mookervart dimanfaatkan oleh pemerintah kolonial sebagai area hijau atau semacam hutan kota. Lokasi ini sering difungsikan sebagai tempat plesiran sore hari, ruang interaksi sosial, dan rekreasi alam bagi masyarakat Eropa maupun pribumi.
            </p>

            <h2 class="text-3xl font-black text-[#0D2A1C] mb-6 font-rubik flex items-center mt-16">
                Transformasi Pusat Niaga
            </h2>
            <p class="mb-8 text-lg leading-relaxed text-gray-700 text-justify">
                Kini, kawasan Tanah Tinggi telah bertransformasi secara signifikan dari sekadar area hijau pinggiran sungai menjadi pusat perekonomian yang vital. 
                Keberadaan Pasar Induk Tanah Tinggi yang resmi beroperasi sejak tahun 2001 telah mengubah denyut nadi kelurahan ini menjadi kawasan niaga yang sangat sibuk, menopang suplai komoditas pangan untuk wilayah Tangerang Raya dan sekitarnya.
            </p>
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
            duration: 1.5,
            ease: "power3.out",
            scrollTrigger: {
                trigger: ".reveal-content",
                start: "top 80%"
            }
        });
    });
</script>
@endpush
@endsection
