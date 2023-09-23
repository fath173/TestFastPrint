<?php

namespace Database\Seeders;

use App\Models\status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id_status' => '1', 'nama_status' => 'bisa dijual'],          // 1
            ['id_status' => '2', 'nama_status' => 'tidak bisa dijual'],    // 2
        ];
        foreach ($data as $d) {
            status::create($d);
        }
    }
}
