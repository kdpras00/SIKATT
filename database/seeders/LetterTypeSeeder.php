<?php

namespace Database\Seeders;

use App\Models\LetterType;
use Illuminate\Database\Seeder;

class LetterTypeSeeder extends Seeder
{
    public function run(): void
    {
        $letterTypes = [
            [
                'name' => 'Surat Pengantar Keterangan Domisili',
                'slug' => \Illuminate\Support\Str::slug('Surat Pengantar Keterangan Domisili'),
                'code' => '470',
                'description' => 'Surat keterangan tempat tinggal',
                'requirements' => ['KTP', 'KK'],
                'template' => 'Yang bertanda tangan di bawah ini Lurah Tanah Tinggi, Kecamatan Tangerang menerangkan bahwa...',
            ],
            [
                'name' => 'Surat Pengantar Keterangan Tidak Mampu',
                'slug' => \Illuminate\Support\Str::slug('Surat Pengantar Keterangan Tidak Mampu'),
                'code' => '401',
                'description' => 'Surat keterangan untuk warga tidak mampu',
                'requirements' => ['KTP', 'KK', 'Surat Pernyataan'],
                'template' => 'Yang bertanda tangan di bawah ini Lurah Tanah Tinggi, Kecamatan Tangerang menerangkan bahwa...',
            ],
            [
                'name' => 'Surat Pengantar Keterangan Usaha',
                'slug' => \Illuminate\Support\Str::slug('Surat Pengantar Keterangan Usaha'),
                'code' => '503',
                'description' => 'Surat keterangan untuk usaha',
                'requirements' => ['KTP', 'KK', 'Foto Usaha'],
                'template' => 'Yang bertanda tangan di bawah ini Lurah Tanah Tinggi, Kecamatan Tangerang menerangkan bahwa...',
            ],
            [
                'name' => 'Formulir Permohonan KTP',
                'slug' => \Illuminate\Support\Str::slug('Formulir Permohonan KTP'),
                'code' => '471.13',
                'description' => 'Surat pengantar untuk pembuatan KTP',
                'requirements' => ['KK', 'Akta Kelahiran'],
                'template' => 'Yang bertanda tangan di bawah ini Lurah Tanah Tinggi, Kecamatan Tangerang menerangkan bahwa...',
            ],
            [
                'name' => 'Surat Pengantar Kelahiran',
                'slug' => \Illuminate\Support\Str::slug('Surat Pengantar Kelahiran'),
                'code' => '474.1',
                'description' => 'Surat keterangan kelahiran',
                'requirements' => ['KTP Orang Tua', 'KK', 'Surat Keterangan Lahir dari Bidan/RS'],
                'template' => 'Yang bertanda tangan di bawah ini Lurah Tanah Tinggi, Kecamatan Tangerang menerangkan bahwa...',
            ],
            [
                'name' => 'Surat Pengantar Kematian',
                'slug' => \Illuminate\Support\Str::slug('Surat Pengantar Kematian'),
                'code' => '474.3',
                'description' => 'Surat keterangan kematian',
                'requirements' => ['KTP Almarhum', 'KK', 'Surat Keterangan Kematian dari RS/Puskesmas'],
                'template' => 'Yang bertanda tangan di bawah ini Lurah Tanah Tinggi, Kecamatan Tangerang menerangkan bahwa...',
            ],
            [
                'name' => 'Surat Pengantar Keterangan Penghasilan',
                'slug' => \Illuminate\Support\Str::slug('Surat Pengantar Keterangan Penghasilan'),
                'code' => '470',
                'description' => 'Surat keterangan penghasilan',
                'requirements' => ['KTP', 'KK'],
                'template' => 'Yang bertanda tangan di bawah ini Lurah Tanah Tinggi, Kecamatan Tangerang menerangkan bahwa...',
            ],
            [
                'name' => 'Surat Pengantar Izin Keramaian',
                'slug' => \Illuminate\Support\Str::slug('Surat Pengantar Izin Keramaian'),
                'code' => '331',
                'description' => 'Surat izin untuk acara/keramaian',
                'requirements' => ['KTP Penanggungjawab', 'Proposal Kegiatan'],
                'template' => 'Yang bertanda tangan di bawah ini Lurah Tanah Tinggi, Kecamatan Tangerang memberikan izin bahwa...',
            ],
        ];

        foreach ($letterTypes as $type) {
            LetterType::create($type);
        }
    }
}
