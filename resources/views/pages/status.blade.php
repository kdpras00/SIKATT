<x-layouts.public title="Status Pengajuan - SIKATT">
    <section class="mx-auto max-w-6xl px-4 py-12">
        <h1 class="text-3xl font-bold text-slate-900">Status Pengajuan Surat</h1>
        <p class="mt-3 text-slate-600">
            Halo, {{ auth()->user()->name }}. Halaman ini akan menampilkan status real-time pengajuan Anda pada fase selanjutnya.
        </p>

        <div class="mt-8 rounded-lg border border-dashed border-slate-300 bg-white p-8 text-center">
            <p class="font-medium text-slate-700">Belum ada data pengajuan pada fase ini.</p>
            <p class="mt-2 text-sm text-slate-500">Fitur tracking status detail akan diaktifkan pada implementasi modul pengajuan surat.</p>
        </div>
    </section>
</x-layouts.public>
