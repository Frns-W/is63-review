<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
<<<<<<< HEAD
        // User::factory(10)->create();

            $this->call([
            UserSeeder::class,        // <- PERTAMA, tidak bergantung tabel lain
=======
        // Urutan ini WAJIB diikuti karena adanya foreign key:
        // 1. Prodi dulu (tidak bergantung pada tabel lain)
        // 2. Mahasiswa (bergantung pada prodis)
        // 3. Nilai (bergantung pada mahasiswas)
        $this->call([
>>>>>>> 93f3c832ecf478fe90b79c99a5ff6e32cb71a03d
            ProdiSeeder::class,
            MahasiswaSeeder::class,
            NilaiSeeder::class,
        ]);
    }
}