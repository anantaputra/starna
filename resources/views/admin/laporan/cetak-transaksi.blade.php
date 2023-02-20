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
                <th class="text-center">Nama Pemesan</th>
                <th class="text-center">Total Pembayaran</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Status Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($transaksi))
                @php
                    $no = 1;
                @endphp
                @foreach($transaksi as $item)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $item->pesanan->user->nama_depan }}</td>
                    <td>Rp{{ number_format($item->total, 0, '', '.') }}</td>
                    <td>{{ Carbon\Carbon::parse($item->updated_at)->format('d M Y') }}</td>
                    <td>
                        {{ strtoupper($item->status) }}
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