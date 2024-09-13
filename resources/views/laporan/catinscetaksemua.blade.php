<!DOCTYPE html>
<html>
<head>
    <title>Cetak Semua Data Catin</title>
    <style>
        @page { 
            margin: 5px; 
            size: 215mm 330mm landscape; 
        }
        body { 
            font-family: 'Helvetica', 'Arial', sans-serif;
            margin: 10px;
            font-size: 9px; 
            color: #2c3e50;
        }
        h2 {
            text-align: center;
            font-size: 18px; 
            color: #4a4a4a;
            margin-bottom: 5px;
            text-transform: uppercase;
        }
        table { 
            width: 100%; 
            border-collapse: collapse;
            margin-bottom: 10px;
            font-size: 8px; 
        }
        th, td { 
            padding: 4px;
            text-align: left;
            border: 1px solid #aaa;
        }
        th { 
            background-color: #6c757d; 
            color: #fff;
            text-align: left;
            text-transform: uppercase;
            font-weight: bold;
        }
        td { 
            background-color: #f8f9fa;
            color: #2c3e50;
        }
        tr:nth-child(even) td {
            background-color: #e9ecef;
        }

        .timestamp {
            text-align: right;
            font-size: 8px;
            margin-top: 10px;
            color: #7f8c8d;
        }
        
        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 10px; /* Ukuran lebih kecil agar lebih rapi */
            color: #2c3e50;
            border-top: 10px solid #3b4a61;
            padding: 8px;
        }
    </style>
</head>
<body>

    <h2>Laporan Semua Data Catin</h2>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIK</th>
                <th>Agama</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Berat Badan</th>
                <th>Tinggi</th>
                <th>LILA</th>
                <th>Hb</th>
                <th>Tekanan Darah</th>
                <th>Golongan Darah</th>
                <th>Merokok/Terpapar</th>
                <th>Status Gizi</th>
                <th>Kesertaan JKN</th>
                <th>Pekerjaan</th>
                <th>Pendidikan</th>
                <th>Intervensi</th>
                <th>Intervensi Lainnya</th>
                <th>Sumber Bantuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($catins as $catin)
            <tr>
                <td>{{ $catin->nama }}</td>
                <td>{{ $catin->nik }}</td>
                <td>{{ $catin->agama }}</td>
                <td>
                    {{ $catin->kelurahan_desa }},
                    {{ $catin->jalan_no }},
                    RT {{ $catin->rt }},
                    RW {{ $catin->rw }},
                    {{ $catin->kecamatan }},
                    Kabupaten {{ $catin->kabupaten }},
                    Provinsi {{ $catin->provinsi }},
                    Kode POS {{ $catin->kode_pos }}
                </td>
                <td>{{ \Carbon\Carbon::parse($catin->tanggal_lahir)->format('d M Y') }}</td>
                <td>{{ $catin->berat_badan }}</td>
                <td>{{ $catin->tinggi }}</td>
                <td>{{ $catin->lila }}</td>
                <td>{{ $catin->hb }}</td>
                <td>{{ $catin->tekanan_darah }}</td>
                <td>{{ $catin->golongan_darah }}</td>
                <td>{{ $catin->merokok_terpapar }}</td>
                <td>{{ $catin->gizi }}</td>
                <td>{{ $catin->kepesertaan_jkn }}</td>
                <td>{{ $catin->pekerjaan }}</td>
                <td>{{ $catin->pendidikan }}</td>
                <td>
                    {{ $catin->intervensi1 }}
                    @if(!empty($catin->intervensi2))
                        dan {{ $catin->intervensi2 }}
                    @endif
                </td>
                
                <td>
                    {{ $catin->intervensi_lainnya1 }}
                    @if(!empty($catin->intervensi_lainnya2))
                        dan {{ $catin->intervensi_lainnya2 }}
                    @endif
                </td>
                <td>{{ $catin->sumber_bantuan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="timestamp">
        Dicetak pada: {{ now()->format('d-m-Y H:i:s') }}
    </div>
    
    <footer>
        SISTEM PENDATAAN CALON PENGANTIN | &copy; {{ date('Y') }} 
    </footer>

</body>
</html>
