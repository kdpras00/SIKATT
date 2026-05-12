<header class="bg-white shadow-sm">
    <div class="bg-blue-900 text-white text-sm">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-2">
            <p>(021) 555-0123 | kantor@tanah-tinggi.id</p>
            <p>Senin - Jumat, 08:00 - 16:00</p>
        </div>
    </div>
    <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4">
        <div>
            <p class="text-lg font-bold text-blue-900">KELURAHAN TANAH TINGGI</p>
            <p class="text-xs text-slate-500">Kota Tangerang</p>
        </div>
        <nav class="hidden gap-5 text-sm font-medium md:flex">
            <a href="{{ route('home') }}" class="hover:text-blue-700">Beranda</a>
            <a href="{{ route('profil') }}" class="hover:text-blue-700">Profil Kelurahan</a>
            <a href="{{ route('layanan') }}" class="hover:text-blue-700">Layanan Surat</a>
            <a href="{{ route('status') }}" class="hover:text-blue-700">Status Pengajuan</a>
            <a href="{{ route('pengumuman') }}" class="hover:text-blue-700">Pengumuman</a>
            <a href="{{ route('kontak') }}" class="hover:text-blue-700">Kontak</a>
        </nav>
        <div class="flex items-center gap-2 text-sm">
            @auth
                <a href="{{ route('dashboard') }}" class="rounded-md bg-blue-700 px-4 py-2 font-medium text-white">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="rounded-md border border-blue-700 px-4 py-2 font-medium text-blue-700">Masuk</a>
                <a href="{{ route('register') }}" class="rounded-md bg-blue-700 px-4 py-2 font-medium text-white">Daftar</a>
            @endauth
        </div>
    </div>
</header>
