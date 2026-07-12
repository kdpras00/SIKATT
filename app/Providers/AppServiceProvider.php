<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     * Inject shared variables to all PDF views automatically.
     */
    public function boot(): void
    {
        // Inject logo, signature, and lurah data ke semua PDF views + partials
        view()->composer(['pdf.*', 'pdf.partials.*'], function ($view) {

            // Auto-detect logo Kelurahan Tanah Tinggi
            $logoBase64 = '';
            foreach ([
                public_path('images/logo-tanah-tinggi.png'),
                storage_path('app/public/images/logo-tanah-tinggi.png'),
                base_path('public/images/logo-tanah-tinggi.png'),
                '/home/kure8737/public_html/images/logo-tanah-tinggi.png',
                '/home/kure8737/asetkelurahantanah-tinggi.my.id/public/images/logo-tanah-tinggi.png',
            ] as $p) {
                if (file_exists($p)) {
                    try {
                        $logoBase64 = 'data:' . mime_content_type($p) . ';base64,' . base64_encode(file_get_contents($p));
                    } catch (\Exception $e) {}
                    break;
                }
            }

            // Auto-detect tanda tangan digital Lurah
            $sigBase64 = '';
            foreach ([
                public_path('images/tanda-tangan-lurah.jpeg'),
                storage_path('app/public/images/tanda-tangan-lurah.jpeg'),
                base_path('public/images/tanda-tangan-lurah.jpeg'),
                '/home/kure8737/public_html/images/tanda-tangan-lurah.jpeg',
                '/home/kure8737/asetkelurahantanah-tinggi.my.id/public/images/tanda-tangan-lurah.jpeg',
            ] as $p) {
                if (file_exists($p)) {
                    try {
                        $sigBase64 = 'data:' . mime_content_type($p) . ';base64,' . base64_encode(file_get_contents($p));
                    } catch (\Exception $e) {}
                    break;
                }
            }

            // Auto-detect cap/stempel surat
            $capBase64 = '';
            foreach ([
                public_path('images/capsurat.png'),
                storage_path('app/public/images/capsurat.png'),
                base_path('public/images/capsurat.png'),
                '/home/kure8737/public_html/images/capsurat.png',
                '/home/kure8737/asetkelurahantanah-tinggi.my.id/public/images/capsurat.png',
            ] as $p) {
                if (file_exists($p)) {
                    try {
                        $capBase64 = 'data:' . mime_content_type($p) . ';base64,' . base64_encode(file_get_contents($p));
                    } catch (\Exception $e) {}
                    break;
                }
            }

            // Data Lurah — dari DB jika ada, fallback ke data resmi Tanah Tinggi
            $letter    = $view->getData()['letter'] ?? null;
            $lurahName = ($letter && $letter->lurah)
                ? strtoupper($letter->lurah->name)
                : 'DEWI RATNA WATI, S.Sos';
            $lurahNip  = ($letter && $letter->lurah && $letter->lurah->nip)
                ? $letter->lurah->nip
                : '198603252011012001';

            $view->with([
                'logoBase64' => $logoBase64,
                'sigBase64'  => $sigBase64,
                'capBase64'  => $capBase64,
                'lurahName'  => $lurahName,
                'lurahNip'   => $lurahNip,
            ]);
        });
    }
}

