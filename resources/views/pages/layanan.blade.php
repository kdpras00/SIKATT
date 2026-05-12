<x-layouts.public title="Layanan Surat - SIKATT">
    <section class="mx-auto max-w-6xl px-4 py-12">
        <h1 class="text-3xl font-bold text-slate-900">Layanan Surat</h1>
        <p class="mt-3 text-slate-600">Pilih jenis surat yang dibutuhkan. Pengajuan dilakukan setelah login.</p>

        <div class="mt-8 grid gap-4 md:grid-cols-2">
            @foreach ($jenisSurat as $surat)
                <div class="rounded-lg border border-slate-200 bg-white p-5">
                    <h2 class="font-semibold text-slate-900">{{ $surat }}</h2>
                    <p class="mt-2 text-sm text-slate-600">Lengkapi dokumen persyaratan lalu ajukan melalui layanan mandiri.</p>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            @auth
                <a href="{{ route('status') }}" class="rounded-md bg-blue-700 px-5 py-3 font-medium text-white">Lihat Status Pengajuan</a>
            @else
                <a href="{{ route('login') }}" class="rounded-md bg-blue-700 px-5 py-3 font-medium text-white">Masuk untuk Ajukan Surat</a>
            @endauth
        </div>
    </section>
</x-layouts.public>
