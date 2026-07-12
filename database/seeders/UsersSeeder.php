<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions to prevent caching bugs in cPanel/production
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Roles first
        \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'lurah']);
        \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'staff']);
        \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'masyarakat']);

        // Lurah
        $lurah = User::create([
            'name'     => 'DEWI RATNA WATI, S.Sos',
            'email'    => 'dewi@tanahtinggi.kel.id',
            'password' => Hash::make('password'),
            'phone'    => '081234567890',
            'address'  => 'Kelurahan Tanah Tinggi, Kecamatan Tangerang',
        ]);
        $lurah->assignRole('lurah');

        // Sekretaris
        $sekretaris = User::create([
            'name' => 'ALAMSYAH, SH',
            'email' => 'alamsyah@tanahtinggi.kel.id',
            'password' => Hash::make('password'),
            'phone' => '081234567891',
            'address' => 'Kelurahan Tanah Tinggi, Kecamatan Tangerang',
        ]);
        $sekretaris->assignRole('staff');

        // Kasi Tata Pemerintahan
        $kasi_pemerintahan = User::create([
            'name' => 'IDA FARIDA, SE, M.Si',
            'email' => 'ida@tanahtinggi.kel.id',
            'password' => Hash::make('password'),
            'phone' => '081234567892',
            'address' => 'Kelurahan Tanah Tinggi, Kecamatan Tangerang',
        ]);
        $kasi_pemerintahan->assignRole('staff');

        // Kasi Ekonomi dan Pembangunan
        $kasi_ekonomi = User::create([
            'name' => 'WAHYU SUPRIYATNA',
            'email' => 'wahyu@tanahtinggi.kel.id',
            'password' => Hash::make('password'),
            'phone' => '081234567893',
            'address' => 'Kelurahan Tanah Tinggi, Kecamatan Tangerang',
        ]);
        $kasi_ekonomi->assignRole('staff');

        // Staff Leni
        $staff_leni = User::create([
            'name' => 'Leni',
            'email' => 'leni@tanahtinggi.kel.id',
            'password' => Hash::make('password'),
            'phone' => '081234567894',
            'address' => 'Kelurahan Tanah Tinggi, Kecamatan Tangerang',
        ]);
        $staff_leni->assignRole('staff');

        // Staff Andini
        $staff_andini = User::create([
            'name' => 'ANDINI, SH',
            'email' => 'andini@tanahtinggi.kel.id',
            'password' => Hash::make('password'),
            'phone' => '081234567895',
            'address' => 'Kelurahan Tanah Tinggi, Kecamatan Tangerang',
        ]);
        $staff_andini->assignRole('staff');

        // Sample Masyarakat 1
        $user1 = User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'password' => Hash::make('password'),
            'nik' => '3603010101900001',
            'phone' => '081234567892',
            'address' => 'Jl. Merdeka No. 1',
            'rt_rw' => '001/001',
        ]);
        $user1->assignRole('masyarakat');

        // Sample Warga 2
        $user2 = User::create([
            'name' => 'Siti Nurhaliza',
            'email' => 'siti@example.com',
            'password' => Hash::make('password'),
            'nik' => '3603010101920002',
            'phone' => '081234567893',
            'address' => 'Jl. Pahlawan No. 5',
            'rt_rw' => '002/001',
        ]);
        $user2->assignRole('masyarakat');

        // Sample Warga 3
        $user3 = User::create([
            'name' => 'Ahmad Yani',
            'email' => 'ahmad@example.com',
            'password' => Hash::make('password'),
            'nik' => '3603010101950003',
            'phone' => '081234567894',
            'address' => 'Jl. Sudirman No. 10',
            'rt_rw' => '003/002',
        ]);
        $user3->assignRole('masyarakat');
    }
}
