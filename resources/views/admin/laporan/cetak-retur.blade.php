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
                <th class="text-center">Nomor Pesanan</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Alasan</th>
                <th class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($retur))
                @php
                    $no = 1;
                @endphp
                @foreach($retur as $item)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $item->pesanan->id_pesanan }}</td>
                    <td>{{ $item->user->nama_depan }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td></td>
                    <td>
                        @if ($item->status == 'pending')
                            Sedang Diproses
                        @elseif ($item->status == 'accepted')
                            Diterima
                        @elseif ($item->status == 'denied')
                            Ditolak
                        @else
                            Dibatalkan
                        @endif
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