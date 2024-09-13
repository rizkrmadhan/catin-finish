<!DOCTYPE html>
<html>
<head>
    <title>Cetak Data Catin</title>
    <style>
        @page { 
            margin: 10px; 
            size: A4;
        }
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap');
        body { 
            font-family: 'Helvetica', 'Arial', sans-serif;
            margin: 20px;
            font-size: 12px;
            color: #2c3e50;
        }
        h2 {
            text-align: center;
            font-size: 24px;
            color: #4a4a4a;
            margin-bottom: 10px;
            text-transform: uppercase;
            font-family: 'Playfair Display', serif;
            letter-spacing: 1.5px;
            font-weight: 700;
        }
        h3 {
            text-align: center;
            font-size: 16px;
            color: #4a4a4a;
            margin-bottom: 20px;
        }
        table { 
            width: 100%; 
            border-collapse: collapse;
            margin-bottom: 15px;
            font-size: 14px;
        }
        th, td { 
            padding: 10px;
            text-align: left;
            border: 1px solid #aaa;
        }
        th { 
            background-color: #6c757d; 
            color: #fff;
            text-align: left;
            text-transform: uppercase;
            font-weight: bold;
            width: 30%;
        }
        td { 
            background-color: #f8f9fa;
            color: #2c3e50;
            font-size: 14px;
        }
        tr:nth-child(even) td {
            background-color: #e9ecef;
        }
        .header {
            margin-bottom: 20px;
            text-align: center;
        }
        .header img {
            height: 50px;
            margin-bottom: 10px;
        }
        .timestamp {
            text-align: right;
            font-size: 10px;
            color: #555;
            margin-top: 15px;
        }
        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #6c757d;
            color: #fff;
            text-align: center;
            padding: 8px 0;
            font-size: 10px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>SISTEM PENDATAAN CALON PENGANTIN</h2>
        <h3>Data Catin: {{ $catin->nama }}</h3>
    </div>
    
    <table>
        <tr><th>NIK</th><td>{{ $catin->nik }}</td></tr>
        <tr><th>Nama</th><td>{{ $catin->nama }}</td></tr>
        <tr><th>Agama</th><td>{{ $catin->agama }}</td></tr>
        <tr><th>Alamat</th><td>
            {{ $catin->kelurahan_desa }},
            {{ $catin->jalan_no }},
            RT {{ $catin->rt }}
            RW {{ $catin->rw }},
            {{ $catin->kecamatan }},
            Kabupaten {{ $catin->kabupaten }},
            Provinsi {{ $catin->provinsi }}<br>
            Kode POS {{ $catin->kode_pos }}
        </td></tr>
        <tr><th>Tanggal Lahir</th><td>{{ \Carbon\Carbon::parse($catin->tanggal_lahir)->format('d M Y') }}</td></tr>
        <tr><th>Berat Badan (kg)</th><td>{{ $catin->berat_badan }}</td></tr>
        <tr><th>Tinggi Badan (cm)</th><td>{{ $catin->tinggi }}</td></tr>
        <tr><th>LILA (cm)</th><td>{{ $catin->lila }}</td></tr>
        <tr><th>Hemoglobin (Hb)</th><td>{{ $catin->hb }}</td></tr>
        <tr><th>Tekanan Darah</th><td>{{ $catin->tekanan_darah }}</td></tr>
        <tr><th>Golongan Darah</th><td>{{ $catin->golongan_darah }}</td></tr>
        <tr><th>Merokok/Terpapar Rokok</th><td>{{ $catin->merokok_terpapar }}</td></tr>
        <tr><th>Status Gizi</th><td>{{ $catin->gizi }}</td></tr>
        <tr><th>Kepesertaan JKN</th><td>{{ $catin->kepesertaan_jkn }}</td></tr>
        <tr><th>Pekerjaan</th><td>{{ $catin->pekerjaan }}</td></tr>
        <tr><th>Pendidikan</th><td>{{ $catin->pendidikan }}</td></tr>
        <tr>
            <th>Intervensi</th>
            <td>
                <div>{{ $catin->intervensi1 }}</div>
                <div>{{ $catin->intervensi2 }}</div>
            </td>
        </tr>
        <tr>
            <th>Intervensi Lainnya</th>
            <td>
                <div>{{ $catin->intervensi_lainnya1 }}</div>
                <div>{{ $catin->intervensi_lainnya2 }}</div>
            </td>
        </tr>
        <tr><th>Sumber Bantuan</th><td>{{ $catin->sumber_bantuan }}</td></tr>
    </table>

    <div class="timestamp">
        Dicetak pada: {{ now()->format('d-m-Y H:i:s') }}
    </div>

    <footer>
        SISTEM PENDATAAN CALON PENGANTIN | &copy; {{ date('Y') }} 
    </footer>

</body>
</html>
