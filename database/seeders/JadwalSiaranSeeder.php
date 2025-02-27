<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JadwalSiaran;

class JadwalSiaranSeeder extends Seeder
{
    public function run()
    {
        JadwalSiaran::create([
            'penyiar' => 'Bella',
            'senin' => null,
            'selasa' => '21:00 - 02:00',
            'rabu' => '14:00 - 20:00',
            'kamis' => '08:00 - 20:00',
            'jumat' => '07:00 - 14:00',
        ]);
    }
}
