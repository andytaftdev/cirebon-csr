<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header img {
            max-width: 200px;
        }
        .header h1 {
            color: #98100A; /* Dark Red */
            margin-top: 10px;
            font-size: 24px;
            text-transform: uppercase;
        }
        .letter {
            margin-bottom: 30px;
        }
        .letter h2 {
            color: #98100A;
            font-size: 20px;
            margin-bottom: 10px;
        }
        .letter p {
            margin-bottom: 10px;
        }
        .table-container {
            width: 100%;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #dddddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
            font-size: 14px
        }
        th {
            background-color: #98100A;
            color: white;
        }
        .footer {
            text-align: right;
            margin-top: 30px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ public_path('images/csr-logo.png') }}" alt="Logo">
            <h1>Laporan Kegiatan</h1>
        </div>
        <div class="letter">
            <p>Yang terhormat,</p>
            <p>Kami dari <strong>ForgeTeam</strong> mengucapkan terima kasih yang sebesar-besarnya atas kerja sama dan dukungan yang telah diberikan selama periode kegiatan ini. Dengan segala hormat, kami berharap laporan ini dapat memberikan gambaran yang jelas tentang pencapaian dan perkembangan yang telah dicapai.</p>
            <p>Segala kehormatan dan penghargaan kami sampaikan kepada semua pihak yang terlibat, kami meminta permohonan minta maaf yang sebesar-besarnya jika kami memiliki kesalahan.</p>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Lokasi</th>
                        <th>Realisasi</th>
                        <th>Tanggal Realisasi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laporan as $item)
                    <tr>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->proyek->kecamatan }}</td>
                        <td>Rp.{{number_format($item->realisasi, 0, ',', ',')}}</td>
                        <td>{{$item->releaseDay}} {{$item->releaseMonth}} {{$item->releaseYear}}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="footer">
            <p>Salam hormat,</p>
            <p><strong>ForgeTeam</strong></p>
        </div>
    </div>
</body>
</html>