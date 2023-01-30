<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->delete();

        $kategori = ['', 'Keripik', 'Kacang', 'Kerupuk', 'Stik', 'Camilan'];

        for($i = 1; $i <= 5; $i++){
            Kategori::create([
                'id_kategori' => 'KAT-'.sprintf("%03s", $i),
                'nama_kategori' => $kategori[$i]
            ]);
        }
    }
}
