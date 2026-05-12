<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // Create Roles first
        \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'lurah']);
        \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'staff']);
        \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'masyarakat']);

        // Lurah
        $lurah = User::create([
            'name' => 'Bapak Lurah Tanah Tinggi',
            'email' => 'lurah@tanahtinggi.kel.id',
            'password' => Hash::make('password'),
            'phone' => '081234567890',
            'address' => 'Kelurahan Tanah Tinggi, Kecamatan Tangerang',
        ]);
        $lurah->assignRole('lurah');

        // Operator (Staff)
        $staff = User::create([
            'name' => 'Staff Kelurahan Tanah Tinggi',
            'email' => 'staff@tanahtinggi.kel.id',
            'password' => Hash::make('password'),
            'phone' => '081234567891',
            'address' => 'Kelurahan Tanah Tinggi, Kecamatan Tangerang',
        ]);
        $staff->assignRole('staff');

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
