<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Akses Layanan - Kelurahan Tanah Tinggi')</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/images/logo-tanah-tinggi.png') }}?v={{ time() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-outfit { font-family: 'Outfit', sans-serif; }
        .glass-dark {
            background: rgba(13, 42, 28, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(201, 162, 39, 0.2);
        }
    </style>
</head>
<body class="bg-white text-[#0D2A1C]">

    <div class="min-h-screen flex">
        
        <!-- Left Side - Official Branding -->
        <div class="hidden lg:flex lg:w-1/2 relative bg-[#0D2A1C] overflow-hidden flex-col justify-between">
            <div class="absolute inset-0">
                <img src="{{ asset('storage/images/background-tanah-tinggi.jpeg') }}" class="w-full h-full object-cover opacity-30" alt="Background">
                <div class="absolute inset-0 bg-gradient-to-br from-[#0D2A1C] via-[#0D2A1C]/95 to-[#1B4332]/90"></div>
            </div>
            
            <div class="relative z-10 p-20 flex flex-col h-full justify-start pt-32">
                <!-- Branding Only -->
                <div class="text-center lg:text-left">
                    <div class="flex items-center space-x-6 mb-8">
                            <img src="{{ asset('storage/images/logo-tanah-tinggi.png') }}" class="h-20 w-auto" alt="Logo">
                        <div>
                            <h1 class="text-white font-extrabold text-3xl xl:text-4xl leading-none tracking-tight font-outfit uppercase whitespace-nowrap">KELURAHAN TANAH TINGGI</h1>
                            <p class="text-[#C9A227] text-xs mt-3 font-black uppercase tracking-[0.4em]">Kota Tangerang</p>
                        </div>
                    </div>
                    <!-- <div class="h-1 w-20 bg-[#C9A227] rounded-full mb-8"></div> -->
                    <p class="text-white text-[11px] font-medium tracking-[0.2em] leading-relaxed uppercase">
                        Sistem Informasi Kelurahan & Administrasi Terpadu Tanah Tinggi
                    </p>
                </div>
            </div>
        </div>

        <!-- Right Side - Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-white relative">
            <div class="max-w-md w-full">
                <!-- Mobile Logo -->
                <div class="text-center mb-12 lg:hidden">
                    <img src="{{ asset('storage/images/logo-tanah-tinggi.png') }}" class="h-16 w-auto mx-auto mb-4" alt="Logo">
                    <h2 class="text-xl font-bold text-[#0D2A1C] uppercase tracking-tighter">Tanah Tinggi</h2>
                </div>

                @yield('content')
            </div>
        </div>

    </div>

</body>
</html>
