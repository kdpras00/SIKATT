<?php

namespace Database\Seeders;

use App\Models\LetterType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FixLetterTypeSlugsSeeder extends Seeder
{
    public function run(): void
    {
        $mappings = [
            'Tidak Mampu' => 'SKTM',
            'Domisili' => 'SKD',
            'Usaha' => 'SKU',
            'KTP' => 'KTP',
            'Kelahiran' => 'SKL',
            'Kematian' => 'SKM',
            'Keramaian' => 'SIK',
            'Kepolisian' => 'SKCK',
            'SKCK' => 'SKCK',
            'Penghasilan' => 'SKP',
            'Izin Cuti' => 'SIC',
            'Tidak Bekerja' => 'SKTB',
            'Belum Menikah' => 'SKBM',
            'Pindah' => 'SKP',
        ];

        $types = LetterType::all();

        foreach ($types as $type) {
            $prefix = null;
            foreach ($mappings as $key => $val) {
                if (Str::contains(strtolower($type->name), strtolower($key))) {
                    $prefix = $val;
                    break;
                }
            }

            if ($prefix) {
                // Update slug and form_config prefix
                $config = $type->form_config ?? [];
                $config['letter_number_prefix'] = $prefix;

                $type->update([
                    'slug' => $prefix,
                    'form_config' => $config
                ]);
                $this->command->info("Updated {$type->name} to prefix {$prefix}");
            } else {
                // Fallback to first word initials if no match
                $words = explode(' ', preg_replace('/[^A-Za-z0-9 ]/', '', $type->name));
                $fallback = '';
                if (count($words) >= 2) {
                    foreach ($words as $w) {
                        if (strtolower($w) !== 'surat' && strtolower($w) !== 'keterangan') {
                            $fallback .= strtoupper(substr($w, 0, 1));
                        }
                    }
                }
                
                if (empty($fallback)) {
                    $fallback = strtoupper(substr($words[count($words)-1], 0, 3));
                }

                $config = $type->form_config ?? [];
                $config['letter_number_prefix'] = $fallback;

                $type->update([
                    'slug' => $fallback,
                    'form_config' => $config
                ]);
                $this->command->warn("Fallback for {$type->name} to prefix {$fallback}");
            }
        }
    }
}
