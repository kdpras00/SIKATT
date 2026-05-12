<x-layouts.public title="Beranda - SIKATT">
    <section class="bg-blue-800 text-white">
        <div class="mx-auto max-w-6xl px-4 py-16">
            <p class="mb-3 inline-block rounded-full bg-yellow-400/20 px-3 py-1 text-xs font-semibold text-yellow-300">WEBSITE RESMI PEMERINTAH</p>
            <h1 class="max-w-3xl text-4xl font-bold leading-tight md:text-5xl">Selamat Datang di Kelurahan Tanah Tinggi</h1>
            <p class="mt-4 max-w-2xl text-blue-100">
                Pusat pelayanan dan informasi digital untuk pengajuan surat administrasi kelurahan secara online.
            </p>
            <div class="mt-8 flex gap-3">
                <a href="{{ route('layanan') }}" class="rounded-md bg-yellow-400 px-5 py-3 font-semibold text-blue-900">Layanan Mandiri</a>
                <a href="{{ route('profil') }}" class="rounded-md border border-white px-5 py-3 font-semibold">Profil Kelurahan</a>
            </div>
        </div>
    </section>

    <section class="mx-auto grid max-w-6xl gap-4 px-4 py-10 md:grid-cols-3">
        <div class="rounded-lg bg-white p-6 shadow-sm">
            <p class="text-sm text-slate-500">Pengajuan Hari Ini</p>
            <p class="mt-2 text-3xl font-bold text-blue-900">{{ $stats['pengajuan_hari_ini'] }}</p>
        </div>
        <div class="rounded-lg bg-white p-6 shadow-sm">
            <p class="text-sm text-slate-500">Surat Selesai</p>
            <p class="mt-2 text-3xl font-bold text-blue-900">{{ $stats['surat_selesai'] }}</p>
        </div>
        <div class="rounded-lg bg-white p-6 shadow-sm">
            <p class="text-sm text-slate-500">Warga Terdaftar</p>
            <p class="mt-2 text-3xl font-bold text-blue-900">{{ $stats['warga_terdaftar'] }}</p>
        </div>
    </section>

    <section class="mx-auto max-w-6xl px-4 pb-12">
        <h2 class="mb-4 text-2xl font-bold text-slate-900">Info Terkini</h2>
        <div class="grid gap-4 md:grid-cols-2">
            @foreach ($pengumuman as $item)
                <article class="rounded-lg border border-slate-200 bg-white p-5">
                    <h3 class="font-semibold text-slate-900">{{ $item['judul'] }}</h3>
                    <p class="mt-2 text-sm text-slate-600">{{ $item['isi'] }}</p>
                </article>
            @endforeach
        </div>
    </section>
</x-layouts.public>
