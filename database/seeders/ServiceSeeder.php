<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        // Harga di bawah ini contoh. Ganti sesuai harga kamu, lalu jalankan: php artisan migrate:fresh --seed
        $rows = [
            ['Kartu Harian', 'Satu kartu untuk satu pertanyaan singkat.', 1, 15000, '±10 menit', false],
            ['Cinta & Hubungan', 'Tiga kartu: kamu, dia, dan arah hubungannya.', 3, 35000, '±20 menit', false],
            ['Karier & Keuangan', 'Lima kartu untuk pekerjaan, uang, dan langkah berikutnya.', 5, 55000, '±30 menit', true],
            ['Celtic Cross', 'Sepuluh kartu untuk satu situasi besar yang butuh dibedah pelan-pelan.', 10, 120000, '±60 menit', false],
        ];

        foreach ($rows as $i => [$name, $tagline, $count, $price, $duration, $featured]) {
            Service::create([
                'name' => $name, 'tagline' => $tagline, 'cards_count' => $count,
                'price' => $price, 'duration' => $duration, 'is_featured' => $featured,
                'sort_order' => $i + 1,
            ]);
        }
    }
}
