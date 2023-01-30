<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RajaOngkirController extends Controller
{
    public static function semua_provinsi()
    {        
        $client = new Client();
        $response = $client->request('GET', 'https://api.rajaongkir.com/starter/province', [
            'headers' => [
                'key' => env('RAJAONGKIR_API_KEY')
            ]
        ]);

        $provinsi = json_decode($response->getBody())->rajaongkir->results;

        return $provinsi;
    }

    public function kota(Request $request)
    {
        $client = new Client();
        $response = $client->request('GET' ,'https://api.rajaongkir.com/starter/city', [
            'headers' => [
                'key' => env('RAJAONGKIR_API_KEY'),
            ],
            'query' => [
                'province' => $request->province,
            ],
        ]);

        $city = json_decode($response->getbody())->rajaongkir->results;

        return $city;
    }

    public static function get_ongkir($tujuan, $kurir, $berat)
    {
        $client = new Client();
        $response = $client->post('https://api.rajaongkir.com/starter/cost', [
            'headers' => [
                'content-type' => 'application/x-www-form-urlencoded',
                'key' => env('RAJAONGKIR_API_KEY'),
            ],
            'form_params' => [
                'origin' => '196',
                'destination' => $tujuan,
                'weight' => $berat,
                'courier' => $kurir
            ]
        ]);

        $data = json_decode($response->getBody());
        return $data->rajaongkir->results[0]->costs;
    }

    public static function tglTerima($date)
    {
        $nama_bulan = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

        if(str_contains($date, 'HARI')){
            $tgl_terima = explode(' ', $date);
            $tgl_terima = $tgl_terima[0];
            if(str_contains($tgl_terima, '-')){
                $tgl = explode('-', $tgl_terima);
                $tgl_awal = Carbon::today()->addDays($tgl[0] + 2)->format('Y-m-d');
                $tgl_akhir = Carbon::today()->addDays($tgl[1] + 4)->format('Y-m-d');
            } else {
                $tgl_awal = Carbon::today()->addDays($tgl_terima + 2)->format('Y-m-d');
                $tgl_akhir = Carbon::today()->addDays($tgl_terima + 4)->format('Y-m-d');
            }
        } else if(str_contains($date, '-')){
            $tgl_terima = explode('-', $date);
            $tgl_awal = $tgl_terima[0];
            $tgl_akhir = $tgl_terima[1];
            $tgl_awal = Carbon::today()->addDays($tgl_awal + 2)->format('Y-m-d');
            $tgl_akhir = Carbon::today()->addDays($tgl_akhir + 4)->format('Y-m-d');
        } else {
            $tgl_awal = Carbon::today()->addDays($date + 2)->format('Y-m-d');
            $tgl_akhir = Carbon::today()->addDays($date + 4)->format('Y-m-d');
        }

            $tgl_awal = explode('-', $tgl_awal);
            $bulan_awal = $tgl_awal[1];
            $tgl_akhir = explode('-', $tgl_akhir);
            $bulan_akhir = $tgl_akhir[1];
            if($bulan_akhir == $bulan_awal){
                $bulan = (int) $bulan_akhir;
                $diterima = 'Akan diterima pada '.$tgl_awal[2].' - '.$tgl_akhir[2].' '.$nama_bulan[$bulan];
            } else {
                $bulan_awal = (int) $bulan_awal;
                $bulan_akhir = (int) $bulan_akhir;
                $diterima = 'Akan diterima pada '.$tgl_awal[2].' '.$nama_bulan[$bulan_awal].' - '.$tgl_akhir[2].' '.$nama_bulan[$bulan_akhir];
            }

        echo $diterima;
    }
}
