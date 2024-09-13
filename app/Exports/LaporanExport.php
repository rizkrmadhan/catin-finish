<?php

namespace App\Exports;

use App\Models\Catin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;

class LaporanExport implements FromCollection, WithHeadings, WithColumnWidths, WithColumnFormatting, WithStyles
{
    protected $search;
    protected $tanggal_min;
    protected $tanggal_max;

    public function __construct($search, $tanggal_min, $tanggal_max)
    {
        $this->search = $search;
        $this->tanggal_min = $tanggal_min;
        $this->tanggal_max = $tanggal_max;
    }

    public function collection()
    {
        // Query dengan filter
        $query = Catin::query();

        if ($this->search) {
            $query->where(function($q) {
                $q->where('nama', 'like', '%' . $this->search . '%')
                  ->orWhere('nik', 'like', '%' . $this->search . '%')
                  ->orWhere('agama', 'like', '%' . $this->search . '%')
                  ->orWhere('kecamatan', 'like', '%' . $this->search . '%')
                  ->orWhere('kelurahan_desa', 'like', '%' . $this->search . '%')
                  ->orWhere('jalan_no', 'like', '%' . $this->search . '%')
                  ->orWhere('rt', 'like', '%' . $this->search . '%')
                  ->orWhere('rw', 'like', '%' . $this->search . '%')
                  ->orWhere('kode_pos', 'like', '%' . $this->search . '%')
                  ->orWhere('tanggal_lahir', 'like', '%' . $this->search . '%')
                  ->orWhere('berat_badan', 'like', '%' . $this->search . '%')
                  ->orWhere('tinggi', 'like', '%' . $this->search . '%')
                  ->orWhere('lila', 'like', '%' . $this->search . '%')
                  ->orWhere('hb', 'like', '%' . $this->search . '%')
                  ->orWhere('tekanan_darah', 'like', '%' . $this->search . '%')
                  ->orWhere('golongan_darah', 'like', '%' . $this->search . '%')
                  ->orWhere('merokok_terpapar', 'like', '%' . $this->search . '%')
                  ->orWhere('gizi', 'like', '%' . $this->search . '%')
                  ->orWhere('kepesertaan_jkn', 'like', '%' . $this->search . '%')
                  ->orWhere('pekerjaan', 'like', '%' . $this->search . '%')
                  ->orWhere('pendidikan', 'like', '%' . $this->search . '%')
                  ->orWhere('intervensi1', 'like', '%' . $this->search . '%')
                  ->orWhere('intervensi2', 'like', '%' . $this->search . '%')
                  ->orWhere('intervensi_lainnya1', 'like', '%' . $this->search . '%')
                  ->orWhere('intervensi_lainnya2', 'like', '%' . $this->search . '%')
                  ->orWhere('sumber_bantuan', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->tanggal_min) {
            $query->whereDate('created_at', '>=', $this->tanggal_min);
        }

        if ($this->tanggal_max) {
            $query->whereDate('created_at', '<=', $this->tanggal_max);
        }

        // Eksekusi query dan return collection
        return $query->get([
            'id', 
           'nama',
           'nik',
           'agama',
           'provinsi',
           'kabupaten',
           'kecamatan',
           'kelurahan_desa',
           'rt',
           'rw',
           'jalan_no',
           'kode_pos',
           'tanggal_lahir',
           'berat_badan',
           'tinggi',
           'lila',
           'hb',
           'tekanan_darah',
           'golongan_darah',
           'merokok_terpapar',
           'gizi',
           'kepesertaan_jkn',
           'pekerjaan',
           'pendidikan',
           'intervensi1',
           'intervensi2',
           'intervensi_lainnya1',
           'intervensi_lainnya2',
           'sumber_bantuan',
           'created_at',
           'updated_at'
        ]);
    }

    /**
     * Define the column headings for the Excel export.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'NIK',
            'Agama',
            'Provinsi',
            'Kabupaten',
            'Kecamatan',
            'Kelurahan/Desa',
            'RT',
            'RW',
            'Jalan No',
            'Kode POS',
            'Tanggal Lahir',
            'Berat Badan',
            'Tinggi',
            'Lila',
            'HB',
            'Tekanan Darah',
            'Golongan Darah',
            'Merokok/Terpapar',
            'Gizi',
            'Kepesertaan JKN',
            'Pekerjaan',
            'Pendidikan',
            '1. Intervensi',
            '2. Intervensi',
            '1. Intervensi Lainnya',
            '2. Intervensi Lainnya',
            'Sumber Bantuan',
            'Dibuat Pada',
            'Diupdate Pada'
        ];
    }

        public function columnWidths(): array
        {
            return [
                'A' => 27.50,   // Lebar kolom ID
                'B' => 25,   // Lebar kolom Nama
                'C' => 20,   // Lebar kolom NIK
                'D' => 15,   // Lebar kolom Agama
                'E' => 15,   // Lebar kolom Provinsi
                'F' => 9.75,   // Lebar kolom Kabupaten
                'G' => 25,   // Lebar kolom Kecamatan
                'H' => 25,   // Lebar kolom Kelurahan/Desa
                'I' => 5,   // Lebar kolom RW
                'J' => 5,   // Lebar kolom RT
                'K' => 30,   // Lebar kolom Jalan dan Nomor
                'L' => 10,   // Lebar kolom Kode POS
                'M' => 12,   // Lebar kolom Tanggal Lahir
                'N' => 11,   // Lebar kolom Berat Badan (kg)
                'O' => 10,   // Lebar kolom Tinggi (cm)
                'P' => 10,   // Lebar kolom LILA (cm)
                'Q' => 10,   // Lebar kolom HB (g/dL)
                'R' => 15,   // Lebar kolom Tekanan Darah (mm/Hg)
                'S' => 15,   // Lebar kolom Golongan Darah
                'T' => 31,   // Lebar kolom Merokok/Terpapar
                'U' => 10,   // Lebar kolom Gizi
                'V' => 15,   // Lebar kolom Kepesertaan JKN
                'W' => 35,   // Lebar kolom Pekerjaan
                'X' => 12.50,   // Lebar kolom Pendidikan
                'Y' => 50,   // Lebar kolom Intervensi 1
                'Z' => 50,   // Lebar kolom Intervensi 2
                'AA' => 40,  // Lebar kolom Intervensi Lainnya
                'AB' => 40,  // Lebar kolom Intervensi Lainnya
                'AC' => 40,  // Lebar kolom Sumber Bantuan
                'AD' =>25.50,  // Lebar kolom Created At
                'AE' =>25.50,  // Lebar kolom Updated At
            ];
        }

        public function columnFormats(): array
        {
            return [
                'M' => NumberFormat::FORMAT_DATE_DDMMYYYY, // Format tanggal untuk kolom Tanggal Lahir
                'X' => NumberFormat::FORMAT_DATE_DATETIME, // Format tanggal dan waktu untuk kolom Created At
                'Y' => NumberFormat::FORMAT_DATE_DATETIME, // Format tanggal dan waktu untuk kolom Updated At
                'C' => NumberFormat::FORMAT_TEXT,           // Format teks untuk kolom NIK (misal di kolom A)
            ];
        }
    
        public function styles(Worksheet $sheet)
        {
            return [
                // Mengatur style untuk header
                1 => ['font' => ['bold' => true]],
            ];
        }  

        public function map($row): array
        {
            return [
                'nik' => (string)$row->nik,  // Mengonversi NIK menjadi string
                // kolom lainnya...
            ];
        }
    }

