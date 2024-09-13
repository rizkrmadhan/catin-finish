<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use App\Models\catin;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller

{
     public function index(Request $request)
   {
    // Ambil data filter dari request
    $search = $request->input('search');
    $tanggal_min = $request->input('tanggal_min');
    $tanggal_max = $request->input('tanggal_max');
    $intervensi = $request->input('intervensi'); // Ambil data intervensi dari dropdown

    // Daftar pilihan intervensi
    $listIntervensi = [
        'Obat Penambah Darah (Suplemen Zat Besi)',
        'Pemberian Makanan Tambahan',
        'Penyuluhan Gizi dan Pola Makan Seimbang',
        'Vaksinasi',
        'Pemeriksaan Kesehatan Berkala',
        'Program Cuci Tangan dan Kebersihan',
        'Kegiatan Fisik atau Olahraga Teratur'
    ];

    // Query untuk mendapatkan data dengan filter
    $query = Catin::query();

    // Filter berdasarkan peran user
    if (auth()->user()->role !== 'admin') {
        $query->where('user_id', auth()->user()->id);
    }

    // Filter berdasarkan search
    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('nama', 'like', '%' . $search . '%')
              ->orWhere('nik', 'like', '%' . $search . '%')
              ->orWhere('agama', 'like', '%' . $search . '%')
              ->orWhere('kelurahan_desa', 'like', '%' . $search . '%')
              ->orWhere('kecamatan', 'like', '%' . $search . '%')
              ->orWhere('rt', 'like', '%' . $search . '%')
              ->orWhere('rw', 'like', '%' . $search . '%')
              ->orWhere('jalan_no', 'like', '%' . $search . '%')
              ->orWhere('kode_pos', 'like', '%' . $search . '%')
              ->orWhere('tanggal_lahir', 'like', '%' . $search . '%')
              ->orWhere('berat_badan', 'like', '%' . $search . '%')
              ->orWhere('tinggi', 'like', '%' . $search . '%')
              ->orWhere('lila', 'like', '%' . $search . '%')
              ->orWhere('hb', 'like', '%' . $search . '%')
              ->orWhere('tekanan_darah', 'like', '%' . $search . '%')
              ->orWhere('golongan_darah', 'like', '%' . $search . '%')
              ->orWhere('merokok_terpapar', 'like', '%' . $search . '%')
              ->orWhere('gizi', 'like', '%' . $search . '%')
              ->orWhere('kepesertaan_jkn', 'like', '%' . $search . '%')
              ->orWhere('pekerjaan', 'like', '%' . $search . '%')
              ->orWhere('pendidikan', 'like', '%' . $search . '%')
              ->orWhere('intervensi1', 'like', '%' . $search . '%')
              ->orWhere('intervensi2', 'like', '%' . $search . '%')
              ->orWhere('intervensi_lainnya1', 'like', '%' . $search . '%')
              ->orWhere('intervensi_lainnya2', 'like', '%' . $search . '%')
              ->orWhere('sumber_bantuan', 'like', '%' . $search . '%');
        });
    }

    // Filter berdasarkan tanggal
    if ($tanggal_min) {
        $query->whereDate('created_at', '>=', $tanggal_min);
    }

    if ($tanggal_max) {
        $query->whereDate('created_at', '<=', $tanggal_max);
    }

    // Filter berdasarkan intervensi
    if ($intervensi) {
        $query->where(function($q) use ($intervensi) {
            $q->where('intervensi1', $intervensi)
              ->orWhere('intervensi2', $intervensi);
        });
    }

    // Eksekusi query dan ambil hasil
    $catins = $query->get();

    // Kirim hasil query dan daftar intervensi ke view
    return view('laporan.laporan', compact('catins', 'listIntervensi'));
}

    public function cetak($id)
    {
        $catin = catin::find($id);

        // Buat PDF dari data catin
        $pdf = Pdf::loadView('laporan.catincetak', compact('catin'));

        // Download PDF
        return $pdf->stream('laporan-catin-' . $catin->nama . '.pdf');
    }

    public function export(Request $request)
    {
        // Ambil data filter dari request
        $search = $request->input('search');
        $tanggal_min = $request->input('tanggal_min');
        $tanggal_max = $request->input('tanggal_max');
        $intervensi = $request->input('intervensi'); // Ambil intervensi dari request

        // Generate file Excel dengan data yang sudah difilter
        return Excel::download(new LaporanExport($search, $tanggal_min, $tanggal_max, $intervensi), 'laporan-laporan.xlsx');
    }

    public function cetakSemua(Request $request)
{
    // Ambil data filter dari request
    $search = $request->input('search');
    $tanggal_min = $request->input('tanggal_min');
    $tanggal_max = $request->input('tanggal_max');
    $intervensi = $request->input('intervensi');

    // Query untuk mendapatkan data dengan filter
    $query = Catin::query();

    // Filter berdasarkan peran user
    if (auth()->user()->role !== 'admin') {
        $query->where('user_id', auth()->user()->id);
    }

    // Filter berdasarkan search
    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('nama', 'like', '%' . $search . '%')
              ->orWhere('nik', 'like', '%' . $search . '%')
              ->orWhere('agama', 'like', '%' . $search . '%')
              ->orWhere('kelurahan_desa', 'like', '%' . $search . '%')
              ->orWhere('kecamatan', 'like', '%' . $search . '%')
              ->orWhere('rt', 'like', '%' . $search . '%')
              ->orWhere('rw', 'like', '%' . $search . '%')
              ->orWhere('jalan_no', 'like', '%' . $search . '%')
              ->orWhere('kode_pos', 'like', '%' . $search . '%')
              ->orWhere('tanggal_lahir', 'like', '%' . $search . '%')
              ->orWhere('berat_badan', 'like', '%' . $search . '%')
              ->orWhere('tinggi', 'like', '%' . $search . '%')
              ->orWhere('lila', 'like', '%' . $search . '%')
              ->orWhere('hb', 'like', '%' . $search . '%')
              ->orWhere('tekanan_darah', 'like', '%' . $search . '%')
              ->orWhere('golongan_darah', 'like', '%' . $search . '%')
              ->orWhere('merokok_terpapar', 'like', '%' . $search . '%')
              ->orWhere('gizi', 'like', '%' . $search . '%')
              ->orWhere('kepesertaan_jkn', 'like', '%' . $search . '%')
              ->orWhere('pekerjaan', 'like', '%' . $search . '%')
              ->orWhere('pendidikan', 'like', '%' . $search . '%')
              ->orWhere('intervensi1', 'like', '%' . $search . '%')
              ->orWhere('intervensi2', 'like', '%' . $search . '%')
              ->orWhere('intervensi_lainnya1', 'like', '%' . $search . '%')
              ->orWhere('intervensi_lainnya2', 'like', '%' . $search . '%')
              ->orWhere('sumber_bantuan', 'like', '%' . $search . '%');
        });
    }

    // Filter berdasarkan tanggal
    if ($tanggal_min) {
        $query->whereDate('created_at', '>=', $tanggal_min);
    }

    if ($tanggal_max) {
        $query->whereDate('created_at', '<=', $tanggal_max);
    }

    // Filter berdasarkan intervensi
    if ($intervensi) {
        $query->where(function($q) use ($intervensi) {
            $q->where('intervensi1', $intervensi)
              ->orWhere('intervensi2', $intervensi);
        });
    }

    // Eksekusi query dan ambil hasil
    $catins = $query->get();

    // Buat tampilan PDF menggunakan view Blade untuk semua data yang terfilter
    $pdf = Pdf::loadView('laporan.catinscetaksemua', compact('catins'));

    // Unduh atau tampilkan PDF dengan data yang sudah terfilter
    return $pdf->download('laporan-terfilter-catin.pdf');
}
}
