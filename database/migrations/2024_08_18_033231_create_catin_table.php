<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         // Daftar kecamatan dan kelurahan/desa terkait
         $kelurahanDesaData = [
            'Kecamatan Balerejo' => [
                 'Desa Babadan', 'Desa Balerejo', 'Desa Banaran', 'Desa Bulakrejo', 'Desa Gading',
                 'Desa Garon', 'Desa Glonggong', 'Desa Jeruk Gulung', 'Desa Kebon Agung', 'Desa Kedung Jati',
                 'Desa Kedungrejo', 'Desa Kuwu', 'Desa Pacinan', 'Desa Simo', 'Desa Sogo',
                 'Desa Sumber Bening', 'Desa Tapelan', 'Desa Warurejo'
             ],
             'Kecamatan Dagangan' => [
                 'Desa Banjarejo', 'Desa Banjarsari Kulon', 'Desa Banjarsari Wetan', 'Desa Dagangan', 'Desa Jetis',
                 'Desa Joho', 'Desa Kepet', 'Desa Ketandan', 'Desa Mendak', 'Desa Mruwak',
                 'Desa Ngranget', 'Desa Padas', 'Desa Prambon', 'Desa Segulung', 'Desa Sewulan',
                 'Desa Sukosari', 'Desa Tileng'
             ],
             'Kecamatan Dolopo' => [
                 'Desa Bader', 'Desa Blimbing', 'Desa Candimulyo', 'Desa Doho', 'Desa Dolopo',
                 'Desa Glonggong', 'Desa Ketawang', 'Desa Kradinan', 'Desa Lembah', 'Desa Suluk', 'Kelurahan Bangunsari', 'Kelurahan Milir'
             ],
             'Kecamatan Geger' => [
                 'Desa Banaran', 'Desa Geger', 'Desa Jatisari', 'Desa Jogodayuh', 'Desa Kaibon',
                 'Desa Kertobanyon', 'Desa Kertosari', 'Desa Klorogan', 'Desa Kranggang', 'Desa Nglandung',
                 'Desa Pagotan', 'Desa Purworejo', 'Desa Putat', 'Desa Sambirejo', 'Desa Sangen',
                 'Desa Sareng', 'Desa Slambur', 'Desa Sumberejo', 'Desa Uteran'
             ],
             'Kecamatan Gemarang' => [
                 'Desa Batok', 'Desa Durenan', 'Desa Gemarang', 'Desa Nampu', 'Desa Sebayi',
                 'Desa Tawangrejo', 'Desa Winong'
             ],
             'Kecamatan Jiwan' => [
                 'Desa Bedoho', 'Desa Bibrik', 'Desa Bukur', 'Desa Jiwan', 'Desa Grobogan',
                 'Desa Kincangwetan', 'Desa Sukolilo', 'Desa Klagenserut', 'Desa Kwangsen', 'Desa Metesih',
                 'Desa Ngetrep', 'Desa Sambirejo', 'Desa Teguhan', 'Desa Wayut'
             ],
             'Kecamatan Kare' => [
                 'Desa Bodag', 'Desa Bolo', 'Desa Cermo', 'Desa Kare', 'Desa Kepel',
                 'Desa Kuwiran', 'Desa Morang', 'Desa Randualas'
             ],
             'Kecamatan Kebonsari' => [
                 'Desa Balerejo', 'Desa Bacem', 'Desa Kebonsari', 'Desa Kedondong', 'Desa Krandegan',
                 'Desa Mojorejo', 'Desa Palur', 'Desa Pucanganom', 'Desa Rejosari', 'Desa Sidorejo',
                 'Desa Singgahan', 'Desa Sukorejo', 'Desa Tambakmas', 'Desa Tanjungrejo'
             ],
             'Kecamatan Madiun' => [
                 'Desa Bagi', 'Desa Banjarsari', 'Desa Betek', 'Desa Dempelan', 'Desa Dimong',
                 'Desa Gunungsari', 'Desa Sendangrejo', 'Desa Sirapan', 'Desa Sumberejo', 'Desa Tanjungrejo',
                 'Desa Tiron', 'Desa Tulungrejo', 'Kelurahan Nglames'
             ],
             'Kecamatan Mejayan' => [
                 'Desa Blabakan', 'Desa Darmorejo', 'Desa Kaligunting', 'Desa Kaliabu', 'Desa Kebonagung',
                 'Desa Klecorejo', 'Desa Kuncen', 'Desa Mejayan', 'Desa Ngampel', 'Desa Sidodadi',
                 'Desa Wonorejo', 'Kelurahan Bangunsari', 'Kelurahan Krajan', 'Kelurahan Pandean'
             ],
             'Kecamatan Pilang Kenceng' => [
                 'Desa Bulu', 'Desa Dawuhan', 'Desa Duren', 'Desa Gandul', 'Desa Kedungbanteng',
                 'Desa Kedungmaron', 'Desa Kenongorejo', 'Desa Kendungrejo', 'Desa Krebet', 'Desa Luworo',
                 'Desa Muneng', 'Desa Ngale', 'Desa Ngengor', 'Desa Pilangkenceng', 'Desa Pulerejo',
                 'Desa Purworejo', 'Desa Sumbergandu', 'Desa Wonoayu'
             ],
             'Kecamatan Saradan' => [
                 'Desa Bajulan', 'Desa Bandungan', 'Desa Bongsopotro', 'Desa Bener', 'Desa Klangon',
                 'Desa Klumutan', 'Desa Ngepeh', 'Desa Pajaran', 'Desa Sambirejo', 'Desa Sidorejo',
                 'Desa Sugihwaras', 'Desa Sukorejo', 'Desa Sumberbendo', 'Desa Sumbersari', 'Desa Tulung'
             ],
             'Kecamatan Sawahan' => [
                 'Desa Bakur', 'Desa Cabean', 'Desa Golan', 'Desa Kajang', 'Desa Kanung',
                 'Desa Klumpit', 'Desa Krokeh', 'Desa Lebak Ayu', 'Desa Pucangrejo', 'Desa Pule',
                 'Desa Rejosari', 'Desa Sawahan', 'Desa Sidomulyo'
             ],
             'Kecamatan Wonoasri' => [
                 'Desa Banyukambang', 'Desa Bancong', 'Desa Buduran', 'Desa Jatirejo', 'Desa Klitik',
                 'Desa Ngadirejo', 'Desa Plumpungrejo', 'Desa Purwosari', 'Desa Sidomulyo', 'Desa Wonoasri'
             ],
             'Kecamatan Wungu' => [
                 'Desa Bantengan', 'Desa Brumbun', 'Desa Karangrejo', 'Desa Kresek', 'Desa Mojopurno',
                 'Desa Mojorayung', 'Desa Nglambangan', 'Desa Nglanduk', 'Desa Pilangrejo', 'Desa Sidorejo',
                 'Desa Sobrah', 'Desa Tempursari', 'Kelurahan Munggut', 'Kelurahan Wungu'
             ],
             // ... Tambahkan kecamatan dan desa lainnya seperti di JavaScript ...
         ];
 
        Schema::create('catins', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->ulid('user_id')->nullable();
            $table->string('nama');
            $table->string('nik', 16);
            $table->string('agama');
            //$table->string('alamat');
            $table->enum('provinsi', ['Jawa Timur'])->default('Jawa Timur'); // Dropdown Provinsi dengan default
            $table->enum('kabupaten', ['Madiun'])->default('Madiun'); // Dropdown Kabupaten dengan default
            $table->enum('kecamatan', [
                'Kecamatan Balerejo', 'Kecamatan Dagangan', 'Kecamatan Dolopo', 'Kecamatan Geger', 
                'Kecamatan Gemarang', 'Kecamatan Jiwan', 'Kecamatan Kare', 'Kecamatan Kebonsari', 
                'Kecamatan Madiun', 'Kecamatan Mejayan', 'Kecamatan Pilang Kenceng', 'Kecamatan Saradan', 
                'Kecamatan Sawahan', 'Kecamatan Wonoasri', 'Kecamatan Wungu'
            ]);
            /*
            $table->enum('kelurahan_desa', [
                'Kelurahan Bangunsari', 'Kelurahan Milir', 'Kelurahan Nglames', 'Kelurahan Bangusari', 'Kelurahan Krajan', 'Kelurahan Pandean', 
                'Kelurahan Munggut', 'Kelurahan Wungu'
            ]); // Anda bisa menambahkan semua 198 jika diperlukan
            */
            $table->string('kelurahan_desa');
            $table->float('rw');
            $table->float('rt');
            $table->string('jalan_no');
            $table->enum('kode_pos', [
                '63152', '63172', '63174', '63171', '63156', '63161', '63182', '63173', '63151', '63153', '63154', '63155', '63162', '63157', '63181' 
                // Lanjutkan hingga semua 206 Kode POS dimasukkan
            ]);
            $table->date('tanggal_lahir');
            $table->float('berat_badan');
            $table->float('tinggi');
            $table->float('lila');
            $table->float('hb');
            $table->string('tekanan_darah');
            $table->string('golongan_darah');
            $table->string('merokok_terpapar');
            $table->string('gizi');
            $table->string('kepesertaan_jkn');
            $table->string('pekerjaan');
            $table->string('pendidikan');
            $table->text('intervensi1')->nullable();
            $table->text('intervensi2')->nullable();
            $table->text('intervensi_lainnya1')->nullable();
            $table->text('intervensi_lainnya2')->nullable();
            $table->string('sumber_bantuan')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catin');
    }
};
