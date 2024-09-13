<x-app-layout>

     </style>
    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-bold mb-4 text-center">TAMBAH DATA CATIN</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Sukses!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        
        <form action="{{ route('catin.save') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('nama') border-red-500 @enderror" required>
                    @error('nama')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
    
                <div>
                    <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                    <input type="text" name="nik" id="nik" value="{{ old('nik') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('nik') border-red-500 @enderror" required>
                    @error('nik')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="agama" class="block text-sm font-medium text-gray-700">Agama</label>
                    <select name="agama" id="agama" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('agama') border-red-500 @enderror" required>
                        <option value="" disabled selected>Pilih Agama</option>
                        <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                        <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                        <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                        <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                    </select>
                    @error('agama')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('tanggal_lahir') border-red-500 @enderror" required>
                    @error('tanggal_lahir')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                    
        <div class="grid grid-cols-2 gap-4">        
        <!-- Provinsi -->
        <div>
            <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
            <select name="provinsi" id="provinsi" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('provinsi') border-red-500 @enderror" required>
                <option value="Jawa Timur" {{ old('provinsi') == 'Jawa Timur' ? 'selected' : '' }}>Jawa Timur</option>
            </select>
            @error('provinsi')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Kabupaten -->
        <div>
            <label for="kabupaten" class="block text-sm font-medium text-gray-700">Kabupaten</label>
            <select name="kabupaten" id="kabupaten" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('kabupaten') border-red-500 @enderror" required>
                <option value="Madiun" {{ old('kabupaten') == 'Madiun' ? 'selected' : '' }}>Madiun</option>
            </select>
            @error('kabupaten')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

       <div class="grid grid-cols-2 gap-4">    
        <!-- Kecamatan -->
        <div>
            <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
            <select name="kecamatan" id="kecamatan" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('kecamatan') border-red-500 @enderror" required>
                <option value="">Pilih Kecamatan</option>
                @foreach(['Kecamatan Balerejo', 'Kecamatan Dagangan','Kecamatan Dolopo', 'Kecamatan Geger', 
                'Kecamatan Gemarang', 'Kecamatan Jiwan', 'Kecamatan Kare', 'Kecamatan Kebonsari', 
                'Kecamatan Madiun', 'Kecamatan Mejayan', 'Kecamatan Pilang Kenceng', 'Kecamatan Saradan', 
                'Kecamatan Sawahan', 'Kecamatan Wonoasri', 'Kecamatan Wungu'] as $kecamatan)
                    <option value="{{ $kecamatan }}" {{ old('kecamatan') == $kecamatan ? 'selected' : '' }}>{{ $kecamatan }}</option>
                @endforeach
            </select>
            @error('kecamatan')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Kelurahan/Desa -->
        <div>
            <label for="kelurahan_desa" class="block text-sm font-medium text-gray-700">Kelurahan/Desa</label>
            <select name="kelurahan_desa" id="kelurahan_desa" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('kelurahan_desa') border-red-500 @enderror" required>
                <option value="">Pilih Kelurahan/Desa</option>
            </select>
            @error('kelurahan_desa')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const kecamatanSelect = document.getElementById('kecamatan');
            const kelurahanDesaSelect = document.getElementById('kelurahan_desa');
    
            const kelurahanDesaData = {
                'Kecamatan Balerejo': [
                    'Desa Babadan', 'Desa Balerejo', 'Desa Banaran', 'Desa Bulakrejo', 'Desa Gading',
                    'Desa Garon', 'Desa Glonggong', 'Desa Jeruk Gulung', 'Desa Kebon Agung', 'Desa Kedung Jati',
                    'Desa Kedungrejo', 'Desa Kuwu', 'Desa Pacinan', 'Desa Simo', 'Desa Sogo',
                    'Desa Sumber Bening', 'Desa Tapelan', 'Desa Warurejo'
                ],
                'Kecamatan Dagangan': [
                    'Desa Banjarejo', 'Desa Banjarsari Kulon', 'Desa Banjarsari Wetan', 'Desa Dagangan', 'Desa Jetis',
                    'Desa Joho', 'Desa Kepet', 'Desa Ketandan', 'Desa Mendak', 'Desa Mruwak',
                    'Desa Ngranget', 'Desa Padas', 'Desa Prambon', 'Desa Segulung', 'Desa Sewulan',
                    'Desa Sukosari', 'Desa Tileng'
                ],
                'Kecamatan Dolopo': [
                    'Desa Bader', 'Desa Blimbing', 'Desa Candimulyo', 'Desa Doho', 'Desa Dolopo',
                    'Desa Glonggong', 'Desa Ketawang', 'Desa Kradinan', 'Desa Lembah', 'Desa Suluk','Kelurahan Bngunsari', 'Kelurahan Milir'
                ],
                'Kecamatan Geger': [
                    'Desa Banaran', 'Desa Geger', 'Desa Jatisari', 'Desa Jogodayuh', 'Desa Kaibon',
                    'Desa Kertobanyon', 'Desa Kertosari', 'Desa Klorogan', 'Desa Kranggang', 'Desa Nglandung',
                    'Desa Pagotan', 'Desa Purworejo', 'Desa Putat', 'Desa Sambirejo', 'Desa Sangen',
                    'Desa Sareng', 'Desa Slambur', 'Desa Sumberejo', 'Desa Uteran'
                ],
                'Kecamatan Gemarang': [
                    'Desa Batok', 'Desa Durenan', 'Desa Gemarang', 'Desa Nampu', 'Desa Sebayi',
                    'Desa Tawangrejo', 'Desa Winong'
                ],
                'Kecamatan Jiwan': [
                    'Desa Bedoho', 'Desa Bibrik', 'Desa Bukur', 'Desa Jiwan', 'Desa Grobogan',
                    'Desa Kincangwetan', 'Desa Sukolilo', 'Desa Klagenserut', 'Desa Kwangsen', 'Desa Metesih',
                    'Desa Ngetrep', 'Desa Sambirejo', 'Desa Teguhan', 'Desa Wayut'
                ],
                'Kecamatan Kare': [
                    'Desa Bodag', 'Desa Bolo', 'Desa Cermo', 'Desa Kare', 'Desa Kepel',
                    'Desa Kuwiran', 'Desa Morang', 'Desa Randualas'
                ],
                'Kecamatan Kebonsari': [
                    'Desa Balerejo', 'Desa Bacem', 'Desa Kebonsari', 'Desa Kedondong', 'Desa Krandegan',
                    'Desa Mojorejo', 'Desa Palur', 'Desa Pucanganom', 'Desa Rejosari', 'Desa Sidorejo',
                    'Desa Singgahan', 'Desa Sukorejo', 'Desa Tambakmas', 'Desa Tanjungrejo'
                ],
                'Kecamatan Madiun': [
                    'Desa Bagi', 'Desa Banjarsari', 'Desa Betek', 'Desa Dempelan', 'Desa Dimong',
                    'Desa Gunungsari', 'Desa Sendangrejo', 'Desa Sirapan', 'Desa Sumberejo', 'Desa Tanjungrejo',
                    'Desa Tiron', 'Desa Tulungrejo', 'Kelurahan Nglames'
                ],
                'Kecamatan Mejayan': [
                    'Desa Blabakan', 'Desa Darmorejo', 'Desa Kaligunting', 'Desa Kaliabu', 'Desa Kebonagung',
                    'Desa Klecorejo', 'Desa Kuncen', 'Desa Mejayan', 'Desa Ngampel', 'Desa Sidodadi',
                    'Desa Wonorejo', 'Kelurahan Bangunsari', 'Kelurahan Krajan', 'Kelurahan Pandean'
                ],
                'Kecamatan Pilang Kenceng': [
                    'Desa Bulu', 'Desa Dawuhan', 'Desa Duren', 'Desa Gandul', 'Desa Kedungbanteng',
                    'Desa Kedungmaron', 'Desa Kenongorejo', 'Desa Kendungrejo', 'Desa Krebet', 'Desa Luworo',
                    'Desa Muneng', 'Desa Ngale', 'Desa Ngengor', 'Desa Pilangkenceng', 'Desa Pulerejo',
                    'Desa Purworejo', 'Desa Sumbergandu', 'Desa Wonoayu'
                ],
                'Kecamatan Saradan': [
                    'Desa Bajulan', 'Desa Bandungan', 'Desa Bongsopotro', 'Desa Bener', 'Desa Klangon',
                    'Desa Klumutan', 'Desa Ngepeh', 'Desa Pajaran', 'Desa Sambirejo', 'Desa Sidorejo',
                    'Desa Sugihwaras', 'Desa Sukorejo', 'Desa Sumberbendo', 'Desa Sumbersari', 'Desa Tulung'
                ],
                'Kecamatan Sawahan': [
                    'Desa Bakur', 'Desa Cabean', 'Desa Golan', 'Desa Kajang', 'Desa Kanung',
                    'Desa Klumpit', 'Desa Krokeh', 'Desa Lebak Ayu', 'Desa Pucangrejo', 'Desa Pule',
                    'Desa Rejosari', 'Desa Sawahan', 'Desa Sidomulyo'
                ],
                'Kecamatan Wonoasri': [
                    'Desa Banyukambang', 'Desa Bancong', 'Desa Buduran', 'Desa Jatirejo', 'Desa Klitik',
                    'Desa Ngadirejo', 'Desa Plumpungrejo', 'Desa Purwosari', 'Desa Sidomulyo', 'Desa Wonoasri'
                ],
                'Kecamatan Wungu': [
                    'Desa Bantengan', 'Desa Brumbun', 'Desa Karangrejo', 'Desa Kresek', 'Desa Mojopurno',
                    'Desa Mojorayung', 'Desa Nglambangan', 'Desa Nglanduk', 'Desa Pilangrejo', 'Desa Sidorejo',
                    'Desa Sobrah', 'Desa Tempursari', 'Kelurahan Munggut', 'Kelurahan Wungu'
                ]
            };
            kecamatanSelect.addEventListener('change', function() {
                const selectedKecamatan = this.value;
                kelurahanDesaSelect.innerHTML = '<option value="">Pilih Kelurahan/Desa</option>'; // Reset desa options
    
                if (kelurahanDesaData[selectedKecamatan]) {
                    kelurahanDesaData[selectedKecamatan].forEach(function(kelurahan) {
                        const option = document.createElement('option');
                        option.value = kelurahan;
                        option.textContent = kelurahan;
                        kelurahanDesaSelect.appendChild(option);
                    });
                }
            });
    
            // If there's an old value, trigger change event to load the correct kelurahan/desa
            if (kecamatanSelect.value) {
                kecamatanSelect.dispatchEvent(new Event('change'));
            }
        });
    </script> 

        <!-- RT dan RW -->
        <div class="grid grid-cols-2 gap-4">
            <!-- RT -->
            <div>
                <label for="rt" class="block text-sm font-medium text-gray-700">RT</label>
                <input type="text" name="rt" id="rt" placeholder="00" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('rt') border-red-500 @enderror" value="{{ old('rt') }}" required>
                @error('rt')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- RW -->
            <div>
                <label for="rw" class="block text-sm font-medium text-gray-700">RW</label>
                <input type="text" name="rw" id="rw" placeholder="00" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('rw') border-red-500 @enderror" value="{{ old('rw') }}" required>
                @error('rw')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
        <!-- Input Jalan/No -->
        <div class="mb-4">
            <label for="jalan_no" class="block text-sm font-medium text-gray-700">Jalan dan Nomor</label>
            <input type="text" name="jalan_no" id="jalan_no" value="{{ old('jalan_no', $catins->jalan_no ?? '') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('jalan_no') border-red-500 @enderror">
            @error('jalan_no')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Kode POS -->
        <div>
            <label for="kode_pos" class="block text-sm font-medium text-gray-700">Kode POS</label>
            <select name="kode_pos" id="kode_pos" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('kode_pos') border-red-500 @enderror" required>
                <option value="">Pilih Kode POS</option>
            </select>
            @error('kode_pos')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        

    <script>
        const kecamatanKodePos = {
            'Kecamatan Balerejo': ['63152'],
            'Kecamatan Dagangan': ['63172'],
            'Kecamatan Dolopo': ['63174'],
            'Kecamatan Geger': ['63171'],
            'Kecamatan Gemarang': ['63156'],
            'Kecamatan Jiwan': ['63161'],
            'Kecamatan Kare': ['63182'],
            'Kecamatan Kebonsari': ['63173'],
            'Kecamatan Madiun': ['63151'],
            'Kecamatan Mejayan': ['63112'],
            'Kecamatan Pilang Kenceng': ['63154'],
            'Kecamatan Saradan': ['63155'],
            'Kecamatan Sawahan': ['63162'],
            'Kecamatan Wonoasri': ['63157'],
            'Kecamatan Wungu': ['63181']
        };
    
        document.getElementById('kecamatan').addEventListener('change', function() {
            const kecamatanSelected = this.value;
            const kodePosSelect = document.getElementById('kode_pos');
            
            // Kosongkan opsi kode POS terlebih dahulu
            kodePosSelect.innerHTML = '<option value="">Pilih Kode POS</option>';
            
            if (kecamatanSelected && kecamatanKodePos[kecamatanSelected]) {
                kecamatanKodePos[kecamatanSelected].forEach(function(kodePos) {
                    const option = document.createElement('option');
                    option.value = kodePos;
                    option.textContent = kodePos;
                    kodePosSelect.appendChild(option);
                });
            }
        });
    </script>
        </div>

                <div>
                    <label for="berat_badan" class="block text-sm font-medium text-gray-700">Berat Badan</label>
                    <input type="number" step="0.1" name="berat_badan" id="berat_badan" value="{{ old('berat_badan') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('berat_badan') border-red-500 @enderror" required>
                    @error('berat_badan')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
    
                <div>
                    <label for="tinggi" class="block text-sm font-medium text-gray-700">Tinggi</label>
                    <input type="number" step="0.1" name="tinggi" id="tinggi" value="{{ old('tinggi') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('tinggi') border-red-500 @enderror" required>
                    @error('tinggi')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
    
                <div>
                    <label for="lila" class="block text-sm font-medium text-gray-700">LILA</label>
                    <input type="number" step="0.1" name="lila" id="lila" value="{{ old('lila') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('lila') border-red-500 @enderror" required>
                    @error('lila')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
    
                <div>
                    <label for="hb" class="block text-sm font-medium text-gray-700">HB</label>
                    <input type="number" step="0.1" name="hb" id="hb" value="{{ old('hb') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('hb') border-red-500 @enderror" required>
                    @error('hb')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="tekanan_darah" class="block text-sm font-medium text-gray-700">Tekanan Darah</label>
                    <input type="text" name="tekanan_darah" id="tekanan_darah" value="{{ old('tekanan_darah') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('tekanan_darah') border-red-500 @enderror" required>
                    @error('tekanan_darah')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
    
                <div>
                    <label for="golongan_darah" class="block text-sm font-medium text-gray-700">Golongan Darah</label>
                    <select name="golongan_darah" id="golongan_darah" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('golongan_darah') border-red-500 @enderror" required>
                        <option value="" disabled selected>Pilih Golongan Darah</option>
                        <option value="A" {{ old('golongan_darah') == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ old('golongan_darah') == 'B' ? 'selected' : '' }}>B</option>
                        <option value="AB" {{ old('golongan_darah') == 'AB' ? 'selected' : '' }}>AB</option>
                        <option value="O" {{ old('golongan_darah') == 'O' ? 'selected' : '' }}>O</option>
                    </select>
                    @error('golongan_darah')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                    
                <div>
                    <label for="merokok_terpapar" class="block text-sm font-medium text-gray-700">Merokok/Terpapar</label>
                    <select name="merokok_terpapar" id="merokok_terpapar" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('merokok_terpapar') border-red-500 @enderror" required>
                        <option value="" disabled selected>Pilih Status</option>
                        <option value="Merokok" {{ old('merokok_terpapar') == 'Merokok' ? 'selected' : '' }}>Merokok</option>
                        <option value="Terpapar Asap Rokok" {{ old('merokok_terpapar') == 'Terpapar Asap Rokok' ? 'selected' : '' }}>Terpapar Asap Rokok</option>
                        <option value="Tidak Merokok dan Tidak Terpapar" {{ old('merokok_terpapar') == 'Tidak Merokok dan Tidak Terpapar' ? 'selected' : '' }}>Tidak Merokok dan Tidak Terpapar</option>
                    </select>
                    @error('merokok_terpapar')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                    
                <div>
                    <label for="gizi" class="block text-sm font-medium text-gray-700">Gizi</label>
                    <select name="gizi" id="gizi" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('gizi') border-red-500 @enderror" required>
                        <option value="" disabled selected>Pilih Status Gizi</option>
                        <option value="Normal" {{ old('gizi') == 'Normal' ? 'selected' : '' }}>Normal</option>
                        <option value="Kurus" {{ old('gizi') == 'Kurus' ? 'selected' : '' }}>Kurus</option>
                        <option value="Gemuk" {{ old('gizi') == 'Gemuk' ? 'selected' : '' }}>Gemuk</option>
                        <option value="Gizi Buruk" {{ old('gizi') == 'Gizi Buruk' ? 'selected' : '' }}>Gizi Buruk</option>
                        <option value="Obesitas" {{ old('gizi') == 'Obesitas' ? 'selected' : '' }}>Obesitas</option>
                    </select>
                    @error('gizi')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                    
                <div>
                    <label for="kepesertaan_jkn" class="block text-sm font-medium text-gray-700">Kepesertaan JKN</label>
                    <select name="kepesertaan_jkn" id="kepesertaan_jkn" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('kepesertaan_jkn') border-red-500 @enderror" required>
                        <option value="" disabled selected>Pilih Kepesertaan JKN</option>
                        <option value="Peserta" {{ old('kepesertaan_jkn') == 'Peserta' ? 'selected' : '' }}>Peserta</option>
                        <option value="Bukan Peserta" {{ old('kepesertaan_jkn') == 'Bukan Peserta' ? 'selected' : '' }}>Bukan Peserta</option>
                    </select>
                    @error('kepesertaan_jkn')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>                
    
                <div>
                    <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                    <input type="text" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('pekerjaan') border-red-500 @enderror" required>
                    @error('pekerjaan')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

    
                <div>
                    <label for="pendidikan" class="block text-sm font-medium text-gray-700">Pendidikan</label>
                    <select name="pendidikan" id="pendidikan" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('pendidikan') border-red-500 @enderror" required>
                        <option value="" disabled selected>Pilih Tingkat Pendidikan</option>
                        <option value="Tidak Sekolah" {{ old('pendidikan') == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah</option>
                        <option value="SD" {{ old('pendidikan') == 'SD' ? 'selected' : '' }}>SD</option>
                        <option value="SMP" {{ old('pendidikan') == 'SMP' ? 'selected' : '' }}>SMP</option>
                        <option value="SMA" {{ old('pendidikan') == 'SMA' ? 'selected' : '' }}>SMA</option>
                        <option value="Diploma" {{ old('pendidikan') == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                        <option value="Sarjana" {{ old('pendidikan') == 'Sarjana' ? 'selected' : '' }}>Sarjana</option>
                        <option value="Pascasarjana" {{ old('pendidikan') == 'Pascasarjana' ? 'selected' : '' }}>Pascasarjana</option>
                    </select>
                    @error('pendidikan')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>                
                
                <div class="grid grid-cols-2 gap-4">
                    <!-- Intervensi 1 (Wajib Diisi) -->
                    <div>
                        <label for="intervensi1" class="block text-sm font-medium text-gray-700">1. Intervensi</label>
                        <select name="intervensi1" id="intervensi1" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Pilih Intervensi</option>
                            <option value="Obat Penambah Darah (Suplemen Zat Besi)">Obat Penambah Darah (Suplemen Zat Besi)</option>
                            <option value="Pemberian Makanan Tambahan">Pemberian Makanan Tambahan</option>
                            <option value="Penyuluhan Gizi dan Pola Makan Seimbang">Penyuluhan Gizi dan Pola Makan Seimbang</option>
                            <option value="Vaksinasi">Vaksinasi</option>
                            <option value="Pemeriksaan Kesehatan Berkala">Pemeriksaan Kesehatan Berkala</option>
                            <option value="Program Cuci Tangan dan Kebersihan">Program Cuci Tangan dan Kebersihan</option>
                            <option value="Kegiatan Fisik atau Olahraga Teratur">Kegiatan Fisik atau Olahraga Teratur</option>
                        </select>
                        @error('intervensi1')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                
                    <!-- Intervensi 2 (Opsional) -->
                    <div>
                        <label for="intervensi2" class="block text-sm font-medium text-gray-700">2. Intervensi</label>
                        <select name="intervensi2" id="intervensi2" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Pilih Intervensi (Opsional)</option>
                            <option value="Obat Penambah Darah (Suplemen Zat Besi)">Obat Penambah Darah (Suplemen Zat Besi)</option>
                            <option value="Pemberian Makanan Tambahan">Pemberian Makanan Tambahan</option>
                            <option value="Penyuluhan Gizi dan Pola Makan Seimbang">Penyuluhan Gizi dan Pola Makan Seimbang</option>
                            <option value="Vaksinasi">Vaksinasi</option>
                            <option value="Pemeriksaan Kesehatan Berkala">Pemeriksaan Kesehatan Berkala</option>
                            <option value="Program Cuci Tangan dan Kebersihan">Program Cuci Tangan dan Kebersihan</option>
                            <option value="Kegiatan Fisik atau Olahraga Teratur">Kegiatan Fisik atau Olahraga Teratur</option>
                        </select>
                        @error('intervensi2')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
    
                <div>
                    <label for="sumber_bantuan" class="block text-sm font-medium text-gray-700">Sumber Bantuan</label>
                    <input type="text" name="sumber_bantuan" id="sumber_bantuan" value="{{ old('sumber_bantuan') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('sumber_bantuan') border-red-500 @enderror">
                    @error('sumber_bantuan')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="intervensi_lainnya1" class="block text-sm font-medium text-gray-700">1. Intervensi Lainnya</label>
                        <input type="text" name="intervensi_lainnya1" id="intervensi_lainnya1" value="{{ old('intervensi_lainnya1') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('intervensi_lainnya1') border-red-500 @enderror">
                        @error('intervensi_lainnya1')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
    
                    <div>
                        <label for="intervensi_lainnya2" class="block text-sm font-medium text-gray-700">2. Intervensi Lainnya</label>
                        <input type="text" name="intervensi_lainnya2" id="intervensi_lainnya2" value="{{ old('intervensi_lainnya2') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('intervensi_lainnya2') border-red-500 @enderror">
                        @error('intervensi_lainnya2')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
    
                    <div class="mt-6 flex justify-center items-center w-full">
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Simpan
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 ml-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
