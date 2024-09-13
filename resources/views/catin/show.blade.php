<x-app-layout>
    <div class="container mx-auto p-6">
        <!-- Tombol Back di sini -->
        <div class="mb-4">
            <div class="mb-4">
                <a href="{{ route('catin') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75L9.75 12m0 0L7.5 14.25M9.75 12L7.5 9.75M9.75 12l2.25 2.25m2.58 4.92 6.374-6.375a1.125 1.125 0 0 0 0-1.59L14.58 4.83a1.125 1.125 0 0 0-.795-.33H4.5a2.25 2.25 0 0 0-2.25 2.25v10.5a2.25 2.25 0 0 0 2.25 2.25h9.284c.298 0 .585-.119.795-.33z" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>
           
                <h1 class="text-4xl font-bold mb-6 text-center">Detail Data Catin</h1>
            
                <div class="bg-gray-50 px-6 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8">
                    <dt class="text-base font-semibold text-gray-700">Nama</dt>
                    <dd class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">{{ $catins->nama }}</dd>
                </div>
            
                <div class="bg-white px-6 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8">
                    <dt class="text-base font-semibold text-gray-700">NIK</dt>
                    <dd class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">{{ $catins->nik }}</dd>
                </div>
            
                <div class="bg-white px-6 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8">
                    <dt class="text-base font-semibold text-gray-700">Agama</dt>
                    <dd class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">{{ $catins->agama }}</dd>
                </div>
            
                <!-- Alamat Section -->
                <div class="bg-gray-50 px-6 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8">
                    <dt class="text-base font-semibold text-gray-700">Alamat</dt>
                    <dd class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">
            
                        <div class="flex mb-4 space-x-4">
                            <!-- Provinsi -->
                            <div class="flex-1">
                                <label for="provinsi" class="block text-base font-medium text-gray-700">Provinsi</label>
                                <input type="text" id="provinsi" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base @error('provinsi') border-red-500 @enderror" value="{{ $catins->provinsi }}" disabled>
                            </div>
                            
                            <!-- Kabupaten/Kota -->
                            <div class="flex-1">
                                <label for="kabupaten" class="block text-base font-medium text-gray-700">Kabupaten/Kota</label>
                                <input type="text" id="kabupaten" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base @error('kabupaten') border-red-500 @enderror" value="{{ $catins->kabupaten }}" disabled>
                            </div>
                        </div>

                        <div class="flex mb-4 space-x-4">
                         <!-- Kecamatan -->
                         <div class="flex-1">
                            <label for="kelurahan_desa" class="block text-base font-medium text-gray-700">Kecamatan</label>
                            <input type="text" id="kelurahan_desa" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base @error('kelurahan_desa') border-red-500 @enderror" value="{{ $catins->kecamatan }}" disabled>
                        </div>
            
                        <!-- Kelurahan/Desa -->
                        <div class="flex-1">
                            <label for="kelurahan_desa" class="block text-base font-medium text-gray-700">Kelurahan/Desa</label>
                            <input type="text" id="kelurahan_desa" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base @error('kelurahan_desa') border-red-500 @enderror" value="{{ $catins->kelurahan_desa }}" disabled>
                        </div>
                        </div>
            
                        <!-- RW -->
                        <div class="flex mb-4 space-x-4">
                        <div class="flex-1">
                            <label for="rw" class="block text-base font-medium text-gray-700">RW</label>
                            <input type="text" id="rw" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base @error('RW') border-red-500 @enderror" value="{{ $catins->rw }}" disabled>
                        </div>
            
                        <!-- RT -->
                        <div class="flex-1">
                            <label for="rt" class="block text-base font-medium text-gray-700">RT</label>
                            <input type="text" id="rt" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base @error('RT') border-red-500 @enderror" value="{{ $catins->rt }}" disabled>
                        </div>
                        </div>
            
                        <!-- Jalan dan Nomor -->
                        <div class="flex mb-4 space-x-4">
                        <div class="flex-1">
                            <label for="jalan_no" class="block text-base font-medium text-gray-700">Jalan dan Nomor</label>
                            <input type="text" id="jalan_no" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base @error('jalan_no') border-red-500 @enderror" value="{{ $catins->jalan_no }}" disabled>
                        </div>
            
                        <!-- Kode Pos -->
                        <div class="flex-1">
                            <label for="kode_pos" class="block text-base font-medium text-gray-700">Kode Pos</label>
                            <input type="text" id="kode_pos" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base @error('kode_pos') border-red-500 @enderror" value="{{ $catins->kode_pos }}" disabled>
                        </div>
                        </div>
            
                    </dd>
                </div>
            
                <div class="bg-white px-6 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8">
                    <dt class="text-base font-semibold text-gray-700">Tanggal Lahir</dt>
                    <dd class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">{{ $catins->tanggal_lahir->format('d M Y') }}</dd>
                </div>
            
                <div class="bg-gray-50 px-6 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8">
                    <dt class="text-base font-semibold text-gray-700">Berat Badan</dt>
                    <dd class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">{{ $catins->berat_badan }} kg</dd>
                </div>
            
                <div class="bg-white px-6 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8">
                    <dt class="text-base font-semibold text-gray-700">Tinggi</dt>
                    <dd class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">{{ $catins->tinggi }} cm</dd>
                </div>
            
                <div class="bg-gray-50 px-6 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8">
                    <dt class="text-base font-semibold text-gray-700">LILA</dt>
                    <dd class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">{{ $catins->lila }} cm</dd>
                </div>
            
                <div class="bg-white px-6 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8">
                    <dt class="text-base font-semibold text-gray-700">HB</dt>
                    <dd class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">{{ $catins->hb }} g/dL</dd>
                </div>
            
                <div class="bg-gray-50 px-6 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8">
                    <dt class="text-base font-semibold text-gray-700">Tekanan Darah</dt>
                    <dd class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">{{ $catins->tekanan_darah }}</dd>
                </div>
            
                <div class="bg-gray-50 px-6 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8">
                    <dt class="text-base font-semibold text-gray-700">Golongan Darah</dt>
                    <dd class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">{{ $catins->golongan_darah }}</dd>
                </div>
            
                <div class="bg-white px-6 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8">
                    <dt class="text-base font-semibold text-gray-700">Merokok/Terpapar</dt>
                    <dd class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">{{ $catins->merokok_terpapar }}</dd>
                </div>

                <div class="bg-white px-6 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8">
                        <dt class="text-base font-semibold text-gray-700">Gizi</dt>
                    <dd class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">{{ $catins->gizi }}</dd>
                </div>
                <div class="bg-gray-50 px-6 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8">
                    <dt class="text-base font-semibold text-gray-700">Kepesertaan JKN</dt>
                    <dd class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">{{ $catins->kepesertaan_jkn }}</dd>
                </div>
                <div class="bg-white px-6 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8">
                    <dt class="text-base font-semibold text-gray-700">Pekerjaan</dt>
                    <dd class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">{{ $catins->pekerjaan }}</dd>
                </div>
                <div class="bg-gray-50 px-6 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8">
                    <dt class="text-base font-semibold text-gray-700">Pendidikan</dt>
                    <dd class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">{{ $catins->pendidikan }}</dd>
                </div>
                <!-- Intervensi Section -->
                <div class="bg-white px-6 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8">
                <!-- Intervensi Title, aligned left and centered vertically -->
                    <dt class="text-base font-semibold text-gray-700 flex items-center">Intervensi</dt>
    
                    <dd class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">
                <div class="flex mb-4 space-x-4">
                <!-- Intervensi 1 -->
                <div class="flex-1">
                    <label for="intervensi1" class="block text-base font-medium text-gray-700">Intervensi 1</label>
                    <input type="text" id="intervensi1" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base" value="{{ $catins->intervensi1 ?? '-' }}" disabled>
                </div>
            
                <!-- Intervensi 2 -->
                <div class="flex-1">
                    <label for="intervensi2" class="block text-base font-medium text-gray-700">Intervensi 2</label>
                    <input type="text" id="intervensi2" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base" value="{{ $catins->intervensi2 ?? '-' }}" disabled>
                    </div>
                </div>
            </dd>
        </div>
            
                <div class="bg-gray-50 px-6 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8">
                    <dt class="text-base font-semibold text-gray-700">1. Intervensi Lainnya</dt>
                    <dd class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">{{ $catins->intervensi_lainnya1 ?? '-' }}</dd>
                </div>
                <div class="bg-gray-50 px-6 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8">
                    <dt class="text-base font-semibold text-gray-700">2. Intervensi Lainnya</dt>
                    <dd class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">{{ $catins->intervensi_lainnya2 ?? '-' }}</dd>
                </div>
                <div class="bg-white px-6 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-8">
                    <dt class="text-base font-semibold text-gray-700">Sumber Bantuan</dt>
                    <dd class="mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">{{ $catins->sumber_bantuan ?? '-' }}</dd>
                </div>
                <div class="mb-4 flex justify-end mt-8">
                    <div>
                    <a href="{{ route('catin') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75L9.75 12m0 0L7.5 14.25M9.75 12L7.5 9.75M9.75 12l2.25 2.25m2.58 4.92 6.374-6.375a1.125 1.125 0 0 0 0-1.59L14.58 4.83a1.125 1.125 0 0 0-.795-.33H4.5a2.25 2.25 0 0 0-2.25 2.25v10.5a2.25 2.25 0 0 0 2.25 2.25h9.284c.298 0 .585-.119.795-.33z" />
                        </svg>
                        Kembali
                    </a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
