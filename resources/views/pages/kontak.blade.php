<x-layouts.public title="Kontak - SIKATT">
    <section class="mx-auto max-w-6xl px-4 py-12">
        <h1 class="text-3xl font-bold text-slate-900">Kontak Kelurahan</h1>
        <div class="mt-8 grid gap-6 md:grid-cols-2">
            <div class="rounded-lg bg-white p-6 shadow-sm">
                <h2 class="font-semibold">Informasi Kantor</h2>
                <p class="mt-2 text-sm text-slate-600">Alamat: Jl. Contoh No. 10, Tanah Tinggi</p>
                <p class="text-sm text-slate-600">Telepon: (021) 555-0123</p>
                <p class="text-sm text-slate-600">Email: kantor@tanah-tinggi.id</p>
                <p class="text-sm text-slate-600">Jam layanan: Senin - Jumat, 08:00 - 16:00 WIB</p>
            </div>
            <div class="rounded-lg bg-white p-6 shadow-sm">
                <h2 class="font-semibold">Form Pesan Singkat</h2>
                <form class="mt-3 space-y-3">
                    <input type="text" class="w-full rounded-md border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Nama" />
                    <input type="email" class="w-full rounded-md border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Email" />
                    <textarea rows="4" class="w-full rounded-md border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Pesan"></textarea>
                    <button type="button" class="rounded-md bg-blue-700 px-4 py-2 text-sm font-medium text-white">Kirim</button>
                </form>
            </div>
        </div>
    </section>
</x-layouts.public>
