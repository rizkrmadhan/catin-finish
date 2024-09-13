<x-app-layout>
    <div class="py-12">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Sukses!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Header -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center mb-8">
            <h1 class="text-4xl font-extrabold text-gray-800 tracking-wide leading-tight">
                CETAK LAPORAN DATA CALON PENGANTIN
            </h1>
        </div>
        
        <!-- Form Filter -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <!-- Form Filter -->
                    @if (auth()->user()->role === 'admin')
                        <form method="GET" action="{{ route('laporan.laporan') }}" class="mb-4">
                        <div class="flex flex-wrap -mx-2">
                     <!-- Search Field -->
                    <div class="w-full md:w-1/4 px-2 mb-4">
                        <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                        <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Cari Nama, NIK, Agama, Alamat, dll..." class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <!-- Filter Intervensi -->
                    <div class="w-full md:w-1/4 px-2 mb-4">
                        <label for="intervensi" class="block text-sm font-medium text-gray-700">Filter Intervensi</label>
                            <select name="intervensi" id="intervensi" class="form-select w-full mt-1 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                        <option value="">Semua</option>
                        @foreach($listIntervensi as $intervensi)
                        <option value="{{ $intervensi }}" {{ request('intervensi') == $intervensi ? 'selected' : '' }}>
                        {{ $intervensi }}
                    </option>
                @endforeach
            </select>
        </div>

                    <!-- Tanggal Min -->
                    <div class="w-full md:w-1/4 px-2 mb-4">
                        <label for="tanggal_min" class="block text-sm font-medium text-gray-700">Tanggal Min</label>
                        <input type="date" name="tanggal_min" id="tanggal_min" value="{{ request('tanggal_min') }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                    <!-- Tanggal Max -->
                    <div class="w-full md:w-1/4 px-2 mb-4">
                        <label for="tanggal_max" class="block text-sm font-medium text-gray-700">Tanggal Max</label>
                        <input type="date" name="tanggal_max" id="tanggal_max" value="{{ request('tanggal_max') }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                @endif
                                @if (auth()->user()->role === 'user')
                                <form method="GET" action="{{ route('catin') }}">
                                    <div class="flex flex-wrap items-end space-x-4 mb-4">
                                <div class="w-full md:flex-1 min-w-[200px] max-w-md">
                                    <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                                    <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Cari Nama, NIK, Agama, Alamat, dll..." class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                <div class="w-full md:w-auto">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded w-full md:w-auto inline-flex items-center justify-center gap-2">
                                        Cari
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-5">
                                            <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                @endif
                            </div>

                        <!-- Tombol Filter dan Export ke Excel -->
                        <div class="container mx-auto p-4">
                        @if (auth()->user()->role === 'admin')
                        <div class="flex justify-end mb-4 space-x-2">
                            <!-- Tombol Filter -->
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-700">
                                Filter
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 ml-2">
                                    <path d="M18.75 12.75h1.5a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5ZM12 6a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 12 6ZM12 18a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 12 18ZM3.75 6.75h1.5a.75.75 0 1 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5ZM5.25 18.75h-1.5a.75.75 0 0 1 0-1.5h1.5a.75.75 0 0 1 0 1.5ZM3 12a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 3 12ZM9 3.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM12.75 12a2.25 2.25 0 1 1 4.5 0 2.25 2.25 0 0 1-4.5 0ZM9 15.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" />
                                </svg>
                            </button>
                        </form>

                        @if (auth()->user()->role === 'admin')
                        <!-- Tombol Cetak Semua ke PDF -->
                        <form method="GET" action="{{ route('laporan.cetakSemua') }}">
                            <input type="hidden" name="search" value="{{ request('search') }}">
                            <input type="hidden" name="tanggal_min" value="{{ request('tanggal_min') }}">
                            <input type="hidden" name="tanggal_max" value="{{ request('tanggal_max') }}">
                            <input type="hidden" name="intervensi" value="{{ request('intervensi') }}">
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-700">
                                Cetak ke PDF
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 ml-2">
                                    <path fillRule="evenodd" d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 0 0 3 3h.27l-.155 1.705A1.875 1.875 0 0 0 7.232 22.5h9.536a1.875 1.875 0 0 0 1.867-2.045l-.155-1.705h.27a3 3 0 0 0 3-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0 0 18 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM16.5 6.205v-2.83A.375.375 0 0 0 16.125 3h-8.25a.375.375 0 0 0-.375.375v2.83a49.353 49.353 0 0 1 9 0Zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 0 1-.374.409H7.232a.375.375 0 0 1-.374-.409l.526-5.784a.373.373 0 0 1 .333-.337 41.741 41.741 0 0 1 8.566 0Zm.967-3.97a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H18a.75.75 0 0 1-.75-.75V10.5ZM15 9.75a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V10.5a.75.75 0 0 0-.75-.75H15Z" clipRule="evenodd" />
                                  </svg>
                            </button>
                        </form>
                    @endif

                        <!-- Tombol Export ke Excel -->
                        <form method="GET" action="{{ route('laporan.export') }}">
                            <input type="hidden" name="search" value="{{ request('search') }}">
                            <input type="hidden" name="tanggal_min" value="{{ request('tanggal_min') }}">
                            <input type="hidden" name="tanggal_max" value="{{ request('tanggal_max') }}">
                            <input type="hidden" name="intervensi" value="{{ request('intervensi') }}">
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-700">
                                Cetak ke Excel
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 ml-2">
                                    <path fillRule="evenodd" d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 0 0 3 3h.27l-.155 1.705A1.875 1.875 0 0 0 7.232 22.5h9.536a1.875 1.875 0 0 0 1.867-2.045l-.155-1.705h.27a3 3 0 0 0 3-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0 0 18 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM16.5 6.205v-2.83A.375.375 0 0 0 16.125 3h-8.25a.375.375 0 0 0-.375.375v2.83a49.353 49.353 0 0 1 9 0Zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 0 1-.374.409H7.232a.375.375 0 0 1-.374-.409l.526-5.784a.373.373 0 0 1 .333-.337 41.741 41.741 0 0 1 8.566 0Zm.967-3.97a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H18a.75.75 0 0 1-.75-.75V10.5ZM15 9.75a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V10.5a.75.75 0 0 0-.75-.75H15Z" clipRule="evenodd" />
                                  </svg>
                            </button>
                        </form>
                        @endif
                    </div>

                    <!-- Tabel Laporan dengan Satu Header -->
                    <div class="overflow-x-auto">
                        <div class="min-w-screen bg-white shadow-md rounded-lg overflow-x-auto">
                            <table class="min-w-full table-auto border-separate border-spacing-2">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">No</th>
                                        <th class="py-3 px-6 text-center">Nama</th>
                                        <th class="py-3 px-6 text-center">Intervensi</th>
                                        <th class="py-3 px-6 text-center">Alamat</th>
                                        <th class="py-3 px-6 text-center">Tanggal Dibuat</th>
                                        <th class="py-3 px-6 text-center">Tanggal Diupdate</th>
                                        <th class="py-3 px-6 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                    @foreach($catins as $catin)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left">{{ $loop->iteration }}</td>
                                        <td class="py-3 px-6 text-center">{{ $catin->nama }}</td>
                                        <td class="py-3 px-6 text-center">
                                            {{ $catin->intervensi1 }}
                                            @if($catin->intervensi2)
                                                dan 
                                                {{ $catin->intervensi2 }}
                                            @endif
                                        </td>
                                        <td class="py-3 px-6 text-center">{{ $catin->kelurahan_desa }} {{ $catin->kecamatan }}</td>
                                        <td class="py-3 px-6 text-center">{{ $catin->created_at->format('d-m-Y') }}</td>
                                        <td class="py-3 px-6 text-center">{{ $catin->updated_at->format('d-m-Y') }}</td>
                                        <td class="py-3 px-6 text-center">
                                            @if (auth()->user()->role === 'admin' || auth()->user()->id == $catin->user_id)
                                                <a href="{{ route('laporan.cetak', $catin->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-700" target="_blank">
                                                    PDF
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5">
                                                        <path fillRule="evenodd" d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 0 0 3 3h.27l-.155 1.705A1.875 1.875 0 0 0 7.232 22.5h9.536a1.875 1.875 0 0 0 1.867-2.045l-.155-1.705h.27a3 3 0 0 0 3-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0 0 18 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM16.5 6.205v-2.83A.375.375 0 0 0 16.125 3h-8.25a.375.375 0 0 0-.375.375v2.83a49.353 49.353 0 0 1 9 0Zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 0 1-.374.409H7.232a.375.375 0 0 1-.374-.409l.526-5.784a.373.373 0 0 1 .333-.337 41.741 41.741 0 0 1 8.566 0Zm.967-3.97a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H18a.75.75 0 0 1-.75-.75V10.5ZM15 9.75a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V10.5a.75.75 0 0 0-.75-.75H15Z" clipRule="evenodd" />
                                                      </svg>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>


