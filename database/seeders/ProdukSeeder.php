<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produks')->delete();

        $keripik = ['', 'Keripik Singkong', 'Keripik Jamur', 'Keripik Pisang', 'Kripik Tempe', 'Keripik Tahu', 'Keripik Ubi', 'Keripik Bayam'];
        $hargaKeripik = ['', 8000, 9000, 12000, 12500, 7500, 13500, 7000];
        $kacang = ['', 'Kacang Polong', 'Popcorn'];
        $hargaKacang = ['', 9000, 9000];
        $stik = ['', 'Lidi Pedas', 'Stik Balado', 'Chesee Stick'];
        $hargaStik = ['', 14000, 12500, 13000];
        $kerupuk = ['', 'Kerupuk Seblak', 'Basreng', 'Pangsit Pedas'];
        $hargaKerupuk = ['', 11000, 15000, 13000];
        $cemilan = ['', 'Makaroni', 'Bakso Ikan', 'Usus Krispi', 'Keju Aroma', 'Onde-onde', 'Cendol Keju', 'Cimol Kering', 'Kue Bawang'];
        $hargaCemilan = ['', 12000, 15000, 13000, 15000, 9000, 9500, 16000, 16000];

        for($i = 1; $i < sizeof($keripik); $i++){
            Produk::create([
                'id_produk' => 'PRD-'.sprintf("%05s", $i),
                'id_kategori' => 'KAT-001',
                'nama_produk' => $keripik[$i],
                'harga' => $hargaKeripik[$i],
                'berat' => 300,
                'stok' => rand(5, 15)
            ]);
        }

        for($i = 1; $i < sizeof($kacang); $i++){
            Produk::create([
                'id_produk' => 'PRD-'.sprintf("%05s", (sizeof($keripik)-1)+$i),
                'id_kategori' => 'KAT-002',
                'nama_produk' => $kacang[$i],
                'harga' => $hargaKacang[$i],
                'berat' => 300,
                'stok' => rand(5, 15)
            ]);
        }

        for($i = 1; $i < sizeof($stik); $i++){
            Produk::create([
                'id_produk' => 'PRD-'.sprintf("%05s", ((sizeof($keripik)-1)+sizeof($kacang)-1)+$i),
                'id_kategori' => 'KAT-003',
                'nama_produk' => $stik[$i],
                'harga' => $hargaStik[$i],
                'berat' => 300,
                'stok' => rand(5, 15)
            ]);
        }

        for($i = 1; $i < sizeof($kerupuk); $i++){
            Produk::create([
                'id_produk' => 'PRD-'.sprintf("%05s", (((sizeof($keripik)-1)+sizeof($kacang)-1)+sizeof($stik)-1)+$i),
                'id_kategori' => 'KAT-004',
                'nama_produk' => $kerupuk[$i],
                'harga' => $hargaKerupuk[$i],
                'berat' => 300,
                'stok' => rand(5, 15)
            ]);
        }

        for($i = 1; $i < sizeof($cemilan); $i++){
            Produk::create([
                'id_produk' => 'PRD-'.sprintf("%05s", ((((sizeof($keripik)-1)+sizeof($kacang)-1)+sizeof($stik)-1)+sizeof($kerupuk)-1)+$i),
                'id_kategori' => 'KAT-005',
                'nama_produk' => $cemilan[$i],
                'harga' => $hargaCemilan[$i],
                'berat' => 300,
                'stok' => rand(5, 15)
            ]);
        }
    }
}
