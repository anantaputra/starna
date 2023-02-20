<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        .garis{
            border-top: 4px solid black;
            height: 2px;
            
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="col-10 text-center">
            <h3>Laporan Pesanan Nasywa Snack</h3>
        </div>
        <div class="col-12 mt-3 mb-5">
            <div class="garis"></div>
        </div>
    </div>
    <table id="example" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Kode Pesanan</th>
                <th class="text-center">Nama Penerima</th>
                <th class="text-center">Alamat Penerima</th>
                <th class="text-center">Tanggal Pesan</th>
                <th class="text-center">Status</th>
                <th class="text-center">Total Pesanan</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($pesanan))
                @php
                    $no = 1;
                @endphp
                @foreach($pesanan as $item)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $item->pesanan->id_pesanan }}</td>
                    <td>{{ $item->pesanan->alamat->nama }}</td>
                    <td>{{ $item->pesanan->alamat->alamat.', '.$item->pesanan->alamat->kota.', '.$item->pesanan->alamat->provinsi }}</td>
                    <td>{{ Carbon\Carbon::parse($item->pesanan->created_at)->format('d M Y') }}</td>
                    <td>
                    @if ($item->pesanan->status == 'pending')
                        Belum Dikirim
                    @elseif ($item->pesanan->status == 'send')
                        Dikirim
                    @elseif ($item->pesanan->status == 'accepted')
                        Diterima 
                    @elseif ($item->pesanan->status == 'returned')
                        Proses Retur 
                    @elseif ($item->pesanan->status == 'retur accepted')
                        Retur Diterima 
                    @elseif ($item->pesanan->status == 'retur denied')
                        Retur Ditolak 
                    @endif    
                    </td>
                    <td>
                        Rp{{ number_format($item->total, 0, '', '.') }}
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <script>
        window.print();
    </script>
</body>
</html>