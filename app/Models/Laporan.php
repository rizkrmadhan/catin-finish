<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Laporan extends Model
{
    use HasFactory;
    use HasUlids;

    protected $table = 'catins';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
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
    ];

     // Menambahkan relasi ke model User
     public function user()
     {
         return $this->belongsTo(User::class);
     }

}
