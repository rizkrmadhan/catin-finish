<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Catin>
 */
class CatinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
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

        // Pilih kecamatan secara acak
        $selectedKecamatan = $this->faker->randomElement(array_keys($kelurahanDesaData));

        // Pilih kelurahan/desa berdasarkan kecamatan yang dipilih
        $selectedKelurahanDesa = $this->faker->randomElement($kelurahanDesaData[$selectedKecamatan]);

        return [
            'user_id' => User::factory(),
            'nama' => $this->faker->name,
            'nik' => $this->faker->unique()->numerify('################'),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
            'provinsi' => 'Jawa Timur', // Default Provinsi
            'kabupaten' => 'Madiun', // Default Kabupaten
            'kecamatan' => $this->faker->randomElement([
                'Kecamatan Balerejo', 'Kecamatan Dagangan', 'Kecamatan Dolopo', 'Kecamatan Geger', 
                'Kecamatan Gemarang', 'Kecamatan Jiwan', 'Kecamatan Kare', 'Kecamatan Kebonsari', 
                'Kecamatan Madiun', 'Kecamatan Mejayan', 'Kecamatan Pilang Kenceng', 'Kecamatan Saradan', 
                'Kecamatan Sawahan', 'Kecamatan Wonoasri', 'Kecamatan Wungu'
            ]),'kecamatan' => $selectedKecamatan,
            'kelurahan_desa' => $kelurahanDesaData,
            'RW' =>   $this->faker->numberBetween(1, 10),
            'RT' =>  $this->faker->numberBetween(1, 20),
            'jalan_no' => 'Jalan ' . $this->faker->streetName . ' No. ' . $this->faker->buildingNumber,
            'kode_pos' => $this->faker->randomElement([
                '63152', '63172', '63174', '63171', '63156', '63161', '63182', '63173', '63151', '63153', '63154', '63155', '63162', '63157', '63181'
            ]),
            'tanggal_lahir' => $this->faker->date,
            'berat_badan' => $this->faker->randomFloat(1, 40, 100),
            'tinggi' => $this->faker->randomFloat(1, 140, 200),
            'lila' => $this->faker->randomFloat(1, 20, 50),
            'hb' => $this->faker->randomFloat(1, 6.8, 17.2),
            'tekanan_darah' => $this->faker->numberBetween(90, 180) . '/' . $this->faker->numberBetween(60, 120),
            'golongan_darah' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'merokok_terpapar' => $this->faker->randomElement(['Merokok', 'Terpapar Asap Rokok', 'Tidak Merokok dan Tidak Terpapar']),
            'gizi' => $this->faker->randomElement(['Normal', 'Kurus', 'Gemuk', 'Gizi Buruk', 'Obesitas']),
            'kepesertaan_jkn' => $this->faker->randomElement(['Peserta', 'Bukan Peserta']),
            'pekerjaan' => $this->faker->jobTitle,
            'pendidikan' => $this->faker->randomElement(['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'Diploma', 'Sarjana', 'Pascasarjana']),
            'intervensi' => $this->faker->sentence,
            'intervensi_lainnya' => $this->faker->sentence,
            'sumber_bantuan' => $this->faker->sentence,
        ];
    }
    
}
