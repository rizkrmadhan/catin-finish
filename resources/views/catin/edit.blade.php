<x-app-layout>
    <div class="container mx-auto p-6">
        <!-- Tombol Back di sini -->
        <div class="mb-4">
            <a href="{{ route('catin') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Back
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 ml-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75L9.75 12m0 0L7.5 14.25M9.75 12L7.5 9.75M9.75 12l2.25 2.25m2.58 4.92 6.374-6.375a1.125 1.125 0 0 0 0-1.59L14.58 4.83a1.125 1.125 0 0 0-.795-.33H4.5a2.25 2.25 0 0 0-2.25 2.25v10.5a2.25 2.25 0 0 0 2.25 2.25h9.284c.298 0 .585-.119.795-.33z" />
                </svg>
            </a>
        </div>
        <h1 class="text-4xl font-bold mb-4 text-center">Edit Data Catin</h1>
        
        <!-- Form Edit Data Catin -->
        <form action="{{ route('catin.update', $catins->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Input Nama -->
            <div class="grid grid-cols-2 gap-4 mt-4"> 
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" value="{{ $catins->nama }}" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Input NIK -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">NIK</label>
                <input type="text" name="nik" value="{{ $catins->nik }}" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            </div>

            <!-- Input Agama -->
            <div class="grid grid-cols-2 gap-4 mt-4"> 
            <div>
                <label for="agama" class="block text-sm font-medium text-gray-700">Agama</label>
                <select name="agama" id="agama" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="" disabled>Pilih Agama</option>
                    <option value="Islam" {{ $catins->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                    <option value="Kristen" {{ $catins->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="Katolik" {{ $catins->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                    <option value="Hindu" {{ $catins->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Buddha" {{ $catins->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                    <option value="Konghucu" {{ $catins->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                </select>
            </div>

             <!-- Input Tanggal Lahir -->
             <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="{{ \Carbon\Carbon::parse($catins->tanggal_lahir)->format('Y-m-d') }}" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            </div>
            

            <div class="grid grid-cols-2 gap-4 mt-2">    
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
            
            <div class="grid grid-cols-2 gap-4 mt-4"> 
                    <!-- Kecamatan -->
                    <div>
                        <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                        <select name="kecamatan" id="kecamatan" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('kecamatan') border-red-500 @enderror" required>
                            <option value="">Pilih Kecamatan</option>
                            @foreach(['Kecamatan Balerejo', 'Kecamatan Dagangan','Kecamatan Dolopo', 'Kecamatan Geger', 
                            'Kecamatan Gemarang', 'Kecamatan Jiwan', 'Kecamatan Kare', 'Kecamatan Kebonsari', 
                            'Kecamatan Madiun', 'Kecamatan Mejayan', 'Kecamatan Pilang Kenceng', 'Kecamatan Saradan', 
                            'Kecamatan Sawahan', 'Kecamatan Wonoasri', 'Kecamatan Wungu'] as $kecamatan)
                               <option value="{{ $kecamatan }}" {{ old('kecamatan', $catins->kecamatan) == $kecamatan ? 'selected' : '' }}>{{ $kecamatan }}</option>
                            @endforeach
                        </select>
                        @error('kecamatan')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kelurahan/Desa -->
                        <div>
                           <label for="kelurahan_desa" class="block text-sm font-medium text-gray-700">Kelurahan/Desa</label>
                           <select name="kelurahan_desa" id="kelurahan_desa" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                <option value="" disabled selected>Pilih Kelurahan/Desa</option>
                            </select>
                        </div>
                    </div>

             <div class="grid grid-cols-2 gap-4 mt-4"> 
             <!-- Input Jalan/No -->
             <div class="mb-4">
                <label for="jalan_no" class="block text-sm font-medium text-gray-700">Jalan dan Nomor</label>
                <input type="text" name="jalan_no" id="jalan_no" value="{{ old('jalan_no', $catins->jalan_no ?? '') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('jalan_no') border-red-500 @enderror">
                @error('jalan_no')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
                    <!-- Kode POS -->
                    <div class="mb-4">
                        <label for="kode_pos" class="block text-sm font-medium text-gray-700">Kode POS</label>
                        <select name="kode_pos" id="kode_pos" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('kode_pos') border-red-500 @enderror" required>
                            @foreach(['63152', '63172', '63174', '63171', '63156', '63161', '63182', '63173', '63151', '63153', '63154', '63155', '63162', '63157', '63181'] as $kode_pos)
                                <option value="{{ $kode_pos }}" {{ old('kode_pos', $catins->kode_pos) == $kode_pos ? 'selected' : '' }}>{{ $kode_pos }}</option>
                            @endforeach
                        </select>
                        @error('kode_pos')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    </div>
            
                     
                          <!-- Input RT -->
                    <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="rt" class="block text-sm font-medium text-gray-700">Rt</label>
                        <input type="text" name="rt" id="rt" value="{{ old('rt', $catins->rt ?? '') }}" placeholder="00" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('rt') border-red-500 @enderror">
                        @error('rt')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                     <!-- Input RW -->
                   <div class="mb-4">
                        <label for="rw" class="block text-sm font-medium text-gray-700">Rw</label>
                        <input type="text" name="rw" id="rw" value="{{ old('rw', $catins->rw ?? '') }}" placeholder="00" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('rw') border-red-500 @enderror">
                        @error('rw')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    </div>
                  
                    
                    <script>
        // List desa untuk masing-masing kecamatan
        const desaList = {
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
                'Desa Glonggong', 'Desa Ketawang', 'Desa Kradinan', 'Desa Lembah', 'Desa Suluk', 
                'Kelurahan Bangunsari', 'Kelurahan Milir'
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
                     // Ambil elemen HTML
                    const kecamatanSelect = document.getElementById('kecamatan');
                    const kelurahanDesaSelect = document.getElementById('kelurahan_desa');
    
                     // Fungsi untuk mengisi dropdown kelurahan/desa
                    function populateKelurahanDesa(kecamatan) {
                        kelurahanDesaSelect.innerHTML = '<option value="" disabled selected>Pilih Kelurahan/Desa</option>';
                     if (desaList[kecamatan]) {
                                desaList[kecamatan].forEach(function(desa) {
                                const option = document.createElement('option');
                                option.value = desa;
                                option.textContent = desa;
                                kelurahanDesaSelect.appendChild(option);
                            });
                        }
                    }
    
                    // Ketika kecamatan berubah
                     kecamatanSelect.addEventListener('change', function() {
                     populateKelurahanDesa(this.value);
                            });
    
                    // Set dropdown kelurahan/desa sesuai dengan nilai awal
                     window.addEventListener('load', function() {
                     const initialKecamatan = kecamatanSelect.value || '{{ old('kecamatan', $catins->kecamatan) }}';
                     populateKelurahanDesa(initialKecamatan);
              
                    // Set kelurahan/desa yang sudah terpilih sebelumnya
                     const initialKelurahanDesa = '{{ old('kelurahan_desa', $catins->kelurahan_desa) }}';
                     kelurahanDesaSelect.value = initialKelurahanDesa;
               });
                </script>
                

            <!-- Input Berat Badan -->
            <div class="grid grid-cols-2 gap-4 mt-4"> 
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Berat Badan (kg)</label>
                <input type="number" step="0.1" name="berat_badan" value="{{ $catins->berat_badan }}" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Input Tinggi Badan -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Tinggi Badan (cm)</label>
                <input type="number" name="tinggi" value="{{ $catins->tinggi }}" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            </div>

            <!-- Input LILA -->
            <div class="grid grid-cols-2 gap-4 mt-4"> 
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">LILA (cm)</label>
                <input type="number" step="0.1" name="lila" value="{{ $catins->lila }}" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Input HB -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">HB (g/dL)</label>
                <input type="number" step="0.1" name="hb" value="{{ $catins->hb }}" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            </div>

            <!-- Input Tekanan Darah -->
            <div class="grid grid-cols-2 gap-4 mt-4"> 
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Tekanan Darah</label>
                <input type="text" name="tekanan_darah" value="{{ $catins->tekanan_darah }}" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Input Golongan Darah -->
            <div class="mb-4">
                <label for="golongan_darah" class="block text-sm font-medium text-gray-700">Golongan Darah</label>
                <select name="golongan_darah" id="golongan_darah" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="" disabled>Pilih Golongan Darah</option>
                    <option value="A" {{ $catins->golongan_darah == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ $catins->golongan_darah == 'B' ? 'selected' : '' }}>B</option>
                    <option value="AB" {{ $catins->golongan_darah == 'AB' ? 'selected' : '' }}>AB</option>
                    <option value="O" {{ $catins->golongan_darah == 'O' ? 'selected' : '' }}>O</option>
                </select>
            </div>
            </div>

            <!-- Input Merokok Terpapar -->
            <div class="grid grid-cols-2 gap-4 mt-4"> 
            <div class="mb-4">
                <label for="merokok_terpapar" class="block text-sm font-medium text-gray-700">Merokok/Terpapar</label>
                <select name="merokok_terpapar" id="merokok_terpapar" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="" disabled>Pilih Status</option>
                    <option value="Merokok" {{ $catins->merokok_terpapar == 'Merokok' ? 'selected' : '' }}>Merokok</option>
                    <option value="Terpapar Asap Rokok" {{ $catins->merokok_terpapar == 'Terpapar Asap Rokok' ? 'selected' : '' }}>Terpapar Asap Rokok</option>
                    <option value="Tidak Merokok dan Tidak Terpapar" {{ $catins->merokok_terpapar == 'Tidak Merokok dan Tidak Terpapar' ? 'selected' : '' }}>Tidak Merokok dan Tidak Terpapar</option>
                </select>
            </div>

            <!-- Input Gizi -->
            <div class="mb-4">
                <label for="gizi" class="block text-sm font-medium text-gray-700">Gizi</label>
                <select name="gizi" id="gizi" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('gizi') border-red-500 @enderror" required>
                    <option value="" disabled selected>Pilih Status Gizi</option>
                    <option value="Normal" {{ old('gizi', $catins->gizi) == 'Normal' ? 'selected' : '' }}>Normal</option>
                    <option value="Kurus" {{ old('gizi', $catins->gizi) == 'Kurus' ? 'selected' : '' }}>Kurus</option>
                    <option value="Gemuk" {{ old('gizi', $catins->gizi) == 'Gemuk' ? 'selected' : '' }}>Gemuk</option>
                    <option value="Gizi Buruk" {{ old('gizi', $catins->gizi) == 'Gizi Buruk' ? 'selected' : '' }}>Gizi Buruk</option>
                    <option value="Obesitas" {{ old('gizi', $catins->gizi) == 'Obesitas' ? 'selected' : '' }}>Obesitas</option>
                </select>
            </div>
            </div>

            <!-- Input Kepesertaan JKN -->
            <div class="grid grid-cols-2 gap-4 mt-4"> 
            <div class="mb-4">
                <label for="kepesertaan_jkn" class="block text-sm font-medium text-gray-700">Kepesertaan JKN</label>
                <select name="kepesertaan_jkn" id="kepesertaan_jkn" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('kepesertaan_jkn') border-red-500 @enderror" required>
                    <option value="" disabled selected>Pilih Kepesertaan JKN</option>
                    <option value="Peserta" {{ old('kepesertaan_jkn', $catins->kepesertaan_jkn) == 'Peserta' ? 'selected' : '' }}>Peserta</option>
                    <option value="Bukan Peserta" {{ old('kepesertaan_jkn', $catins->kepesertaan_jkn) == 'Bukan Peserta' ? 'selected' : '' }}>Bukan Peserta</option>
                </select>
            </div>

            <!-- Input Pekerjaan -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                <input type="text" name="pekerjaan" value="{{ $catins->pekerjaan }}" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            </div>

            <!-- Input Pendidikan -->
            <div class="grid grid-cols-2 gap-4 mt-4"> 
            <div class="mb-4">
                <label for="pendidikan" class="block text-sm font-medium text-gray-700">Pendidikan</label>
                <select name="pendidikan" id="pendidikan" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('pendidikan') border-red-500 @enderror" required>
                    <option value="" disabled selected>Pilih Tingkat Pendidikan</option>
                    <option value="Tidak Sekolah" {{ old('pendidikan', $catins->pendidikan) == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah</option>
                    <option value="SD" {{ old('pendidikan', $catins->pendidikan) == 'SD' ? 'selected' : '' }}>SD</option>
                    <option value="SMP" {{ old('pendidikan', $catins->pendidikan) == 'SMP' ? 'selected' : '' }}>SMP</option>
                    <option value="SMA" {{ old('pendidikan', $catins->pendidikan) == 'SMA' ? 'selected' : '' }}>SMA</option>
                    <option value="Diploma" {{ old('pendidikan', $catins->pendidikan) == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                    <option value="Sarjana" {{ old('pendidikan', $catins->pendidikan) == 'Sarjana' ? 'selected' : '' }}>Sarjana</option>
                    <option value="Pascasarjana" {{ old('pendidikan', $catins->pendidikan) == 'Pascasarjana' ? 'selected' : '' }}>Pascasarjana</option>
                </select>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <!-- Intervensi 1 (Wajib Diisi) -->
                <div>
                    <label for="intervensi1" class="block text-sm font-medium text-gray-700">1. Intervensi</label>
                    <select name="intervensi1" id="intervensi1" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Pilih Intervensi</option>
                        <option value="Obat Penambah Darah (Suplemen Zat Besi)" {{ old('intervensi1', $catins->intervensi1) == 'Obat Penambah Darah (Suplemen Zat Besi)' ? 'selected' : '' }}>Obat Penambah Darah (Suplemen Zat Besi)</option>
                        <option value="Pemberian Makanan Tambahan" {{ old('intervensi1', $catins->intervensi1) == 'Pemberian Makanan Tambahan' ? 'selected' : '' }}>Pemberian Makanan Tambahan</option>
                        <option value="Penyuluhan Gizi dan Pola Makan Seimbang" {{ old('intervensi1', $catins->intervensi1) == 'Penyuluhan Gizi dan Pola Makan Seimbang' ? 'selected' : '' }}>Penyuluhan Gizi dan Pola Makan Seimbang</option>
                        <option value="Vaksinasi" {{ old('intervensi1', $catins->intervensi1) == 'Vaksinasi' ? 'selected' : '' }}>Vaksinasi</option>
                        <option value="Pemeriksaan Kesehatan Berkala" {{ old('intervensi1', $catins->intervensi1) == 'Pemeriksaan Kesehatan Berkala' ? 'selected' : '' }}>Pemeriksaan Kesehatan Berkala</option>
                        <option value="Program Cuci Tangan dan Kebersihan" {{ old('intervensi1', $catins->intervensi1) == 'Program Cuci Tangan dan Kebersihan' ? 'selected' : '' }}>Program Cuci Tangan dan Kebersihan</option>
                        <option value="Kegiatan Fisik atau Olahraga Teratur" {{ old('intervensi1', $catins->intervensi1) == 'Kegiatan Fisik atau Olahraga Teratur' ? 'selected' : '' }}>Kegiatan Fisik atau Olahraga Teratur</option>
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
                        <option value="Obat Penambah Darah (Suplemen Zat Besi)" {{ old('intervensi2', $catins->intervensi2) == 'Obat Penambah Darah (Suplemen Zat Besi)' ? 'selected' : '' }}>Obat Penambah Darah (Suplemen Zat Besi)</option>
                        <option value="Pemberian Makanan Tambahan" {{ old('intervensi2', $catins->intervensi2) == 'Pemberian Makanan Tambahan' ? 'selected' : '' }}>Pemberian Makanan Tambahan</option>
                        <option value="Penyuluhan Gizi dan Pola Makan Seimbang" {{ old('intervensi2', $catins->intervensi2) == 'Penyuluhan Gizi dan Pola Makan Seimbang' ? 'selected' : '' }}>Penyuluhan Gizi dan Pola Makan Seimbang</option>
                        <option value="Vaksinasi" {{ old('intervensi2', $catins->intervensi2) == 'Vaksinasi' ? 'selected' : '' }}>Vaksinasi</option>
                        <option value="Pemeriksaan Kesehatan Berkala" {{ old('intervensi2', $catins->intervensi2) == 'Pemeriksaan Kesehatan Berkala' ? 'selected' : '' }}>Pemeriksaan Kesehatan Berkala</option>
                        <option value="Program Cuci Tangan dan Kebersihan" {{ old('intervensi2', $catins->intervensi2) == 'Program Cuci Tangan dan Kebersihan' ? 'selected' : '' }}>Program Cuci Tangan dan Kebersihan</option>
                        <option value="Kegiatan Fisik atau Olahraga Teratur" {{ old('intervensi2', $catins->intervensi2) == 'Kegiatan Fisik atau Olahraga Teratur' ? 'selected' : '' }}>Kegiatan Fisik atau Olahraga Teratur</option>
                    </select>
                    @error('intervensi2')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Input Sumber Bantuan -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Sumber Bantuan</label>
                <input type="text" name="sumber_bantuan" value="{{ $catins->sumber_bantuan }}" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

             <!-- Input Intervensi Lainnya -->
             <div class="grid grid-cols-2 gap-4"> 
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">1. Intervensi Lainnya</label>
                    <input type="text" name="intervensi_lainnya1" value="{{ $catins->intervensi_lainnya1 }}" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">2. Intervensi Lainnya</label>
                        <input type="text" name="intervensi_lainnya2" value="{{ $catins->intervensi_lainnya2 }}" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>
            </div>

            <!-- Tombol Submit -->
            <div class="mt-5 flex justify-center">
                <button type="submit" class="inline-flex items-center py-3 px-5 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update Data
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="ml-2 h-5 w-5">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
