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
        $deskKeripik = ['',
        '<p>Rasakan kelezatan keripik singkong yang dibuat dengan bahan-bahan berkualitas. Dihiasi dengan bumbu rempah alami yang membuat setiap gigitan tak terlupakan. Nikmati sebagai camilan sehari-hari atau saat bersantai bersama teman dan keluarga. Dapatkan sekarang juga di marketplace kami</p>',
        '<p>Keripik jamur alami dengan rasa gurih dan renyah. Dihasilkan dari bahan-bahan berkualitas dan diproses dengan teknologi modern. Cocok sebagai camilan sehat dan praktis untuk dibawa bepergian. Nikmati setiap gigitan dengan rasa yang tidak terlupakan. Dapatkan sekarang juga di marketplace kami</p>',
        '<p>Rasakan kelezatan keripik pisang yang dibuat dari bahan pisang segar dan berkualitas. Dihasilkan dengan proses penggorengan yang membuat rasa gurih dan renyah. Cocok sebagai camilan sehat dan praktis untuk dibawa bepergian. Nikmati setiap gigitan dengan rasa yang tidak terlupakan. Dapatkan sekarang juga di marketplace kami.</p>',
        '<p>Nikmati keripik tempe alami yang dibuat dengan bahan tempe berkualitas dan bumbu alami. Dihasilkan dengan proses pemanggangan yang membuat rasa gurih dan renyah. Cocok sebagai camilan sehat dan praktis untuk dibawa bepergian. Rasakan kelezatan setiap gigitan dengan rasa yang tidak terlupakan. Dapatkan sekarang juga di marketplace kami.</p>',
        '<p>Rasakan kelezatan keripik tahu yang dibuat dari bahan tahu segar dan berkualitas. Dihasilkan dengan proses pemanggangan yang membuat rasa gurih dan renyah. Cocok sebagai camilan sehat dan praktis untuk dibawa bepergian. Nikmati setiap gigitan dengan rasa yang tidak terlupakan. Dapatkan sekarang juga di marketplace kami.</p>',
        '<p>Nikmati kelezatan keripik ubi yang dibuat dari bahan ubi segar dan berkualitas. Dihasilkan dengan proses produksi yang membuat rasa gurih dan renyah. Cocok sebagai camilan sehat dan praktis untuk dibawa bepergian. Rasakan setiap gigitan dengan rasa yang tidak terlupakan. Dapatkan sekarang juga di marketplace kami.</p>',
        '<p>Nikmati kelezatan keripik ubi yang dibuat dari bahan ubi segar dan berkualitas. Dihasilkan dengan proses produksi yang membuat rasa gurih dan renyah. Cocok sebagai camilan sehat dan praktis untuk dibawa bepergian. Rasakan setiap gigitan dengan rasa yang tidak terlupakan. Dapatkan sekarang juga di marketplace kami.</p>'];
        $gambarKeripik = ['', '63d7bac22b347.png', '63d7bbf2e56e2.png', '63d7bc54749e0.png', '63d7bc8abc07e.png', '63d7bcb51de21.png', '63d7bd5ab4460.png', '63d7be2e8016b.png'];
        $kacang = ['','Kacang Polong', 'Popcorn'];
        $deskKacang = ['', '', ''];
        $gambarKacang = ['', '63d7be897bf1c.png', '63d7be9f9a303.png'];
        $hargaKacang = ['', 9000, 9000];
        $stik = ['', 'Lidi Pedas', 'Stik Balado', 'Chesee Stick'];
        $deskStik = ['', '', '', '<p>Rasakan kelezatan cheese stick yang dibuat dengan bahan-bahan berkualitas. Dihiasi dengan bumbu rempah alami yang membuat setiap gigitan tak terlupakan. Nikmati sebagai camilan sehari-hari atau saat bersantai bersama teman dan keluarga. Dapatkan sekarang juga di marketplace kami</p>'];
        $gambarStik = ['', '63d7beaea6b97.png', '63d7bee3c4f3b.png', '63dafb9acc5c8.png'];
        $hargaStik = ['', 14000, 12500, 13000];
        $kerupuk = ['', 'Kerupuk Seblak', 'Basreng', 'Pangsit Pedas'];
        $deskKerupuk = ['', '', '', '<p>Rasakan kelezatan pangsit yang dibuat dengan bahan-bahan berkualitas. Dihiasi dengan bumbu rempah alami yang membuat setiap gigitan tak terlupakan. Nikmati sebagai camilan sehari-hari atau saat bersantai bersama teman dan keluarga. Dapatkan sekarang juga di marketplace kami</p>'];
        $gambarKerupuk = ['', '63d7c0c02ad76.png', '63d7c18acc21c.png', '63dafb31e87b1.png'];
        $hargaKerupuk = ['', 11000, 15000, 13000];
        $cemilan = ['', 'Makaroni', 'Bakso Ikan', 'Usus Krispi', 'Keju Aroma', 'Onde-onde', 'Cendol Keju', 'Cimol Kering', 'Kue Bawang'];
        $deskCemilan = ['', '', '', '', '<p>Rasakan kelezatan keju aroma yang dibuat dengan bahan-bahan berkualitas. Dihiasi dengan bumbu rempah alami yang membuat setiap gigitan tak terlupakan. Nikmati sebagai camilan sehari-hari atau saat bersantai bersama teman dan keluarga. Dapatkan sekarang juga di marketplace kami</p>',
        '', '<p>Rasakan kelezatan cendol keju yang dibuat dengan bahan-bahan berkualitas. Dihiasi dengan bumbu rempah alami yang membuat setiap gigitan tak terlupakan. Nikmati sebagai camilan sehari-hari atau saat bersantai bersama teman dan keluarga. Dapatkan sekarang juga di marketplace kami</p>',
        '', '<p>Rasakan kelezatan kue bawang yang dibuat dengan bahan-bahan berkualitas. Dihiasi dengan bumbu rempah alami yang membuat setiap gigitan tak terlupakan. Nikmati sebagai camilan sehari-hari atau saat bersantai bersama teman dan keluarga. Dapatkan sekarang juga di marketplace kami</p>'];
        $gambarCemilan = ['', '63d7c12310649.png', '63dafbc585e0a.png', '63d7c130d0ca4.png', '63dafaea95c98.png', '63d7c111a9bb0.png', '63dafb5414c79.png', '63dafbf7a2da6.png', '63dafab3411a6.png'];
        $hargaCemilan = ['', 12000, 15000, 13000, 15000, 9000, 9500, 16000, 16000];

        for($i = 1; $i < sizeof($keripik); $i++){
            Produk::create([
                'id_produk' => 'PRD-'.sprintf("%05s", $i),
                'id_kategori' => 'KAT-001',
                'nama_produk' => $keripik[$i],
                'harga' => $hargaKeripik[$i],
                'berat' => 300,
                'deskripsi' => $deskKeripik[$i],
                'gambar' => json_encode(array($gambarKeripik[$i])),
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
                'deskripsi' => $deskKacang[$i],
                'gambar' => json_encode(array($gambarKacang[$i])),
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
                'deskripsi' => $deskStik[$i],
                'gambar' => json_encode(array($gambarStik[$i])),
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
                'deskripsi' => $deskKerupuk[$i],
                'gambar' => json_encode(array($gambarKerupuk[$i])),
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
                'deskripsi' => $deskCemilan[$i],
                'gambar' => json_encode(array($gambarCemilan[$i])),
                'stok' => rand(5, 15)
            ]);
        }
    }
}
