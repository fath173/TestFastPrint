<?php

namespace Database\Seeders;

use App\Models\kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id_kategori' => '1', 'nama_kategori' => 'L QUEENLY'],               // 1
            ['id_kategori' => '2', 'nama_kategori' => 'L MTH AKSESORIS (IM)'],    // 2
            ['id_kategori' => '3', 'nama_kategori' => 'L MTH TABUNG (LK)'],       // 3
            ['id_kategori' => '4', 'nama_kategori' => 'SP MTH SPAREPART (LK)'],   // 4
            ['id_kategori' => '5', 'nama_kategori' => 'CI MTH TINTA LAIN (IM)'],  // 5
            ['id_kategori' => '6', 'nama_kategori' => 'L MTH AKSESORIS (LK)'],    // 6
            ['id_kategori' => '7', 'nama_kategori' => 'S MTH STEMPEL (IM)'],      // 7
        ];
        foreach ($data as $d) {
            kategori::create($d);
        }
    }
}
