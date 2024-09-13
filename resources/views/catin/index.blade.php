<x-app-layout>
    <div class="py-12">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Sukses!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Header -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-8">
            <h1 class="text-4xl font-extrabold text-gray-800 tracking-wide leading-tight text-center">
                DATA CALON PENGANTIN
            </h1>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Form Filter -->
                    <form method="GET" action="{{ route('catin') }}">
                        <div class="flex flex-wrap items-end space-x-4 mb-4">
                            <!-- Kolom Pencarian dengan Lebar yang Dibatasi -->
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
                            </div>
                        </div>
                    </form>
                    <!-- Konten Utama -->
                    <div class="w-full">
                        <div class="overflow-x-auto">
                            <table class="min-w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">No</th>
                                        <th class="py-3 px-6 text-center">Nama</th>
                                        <th class="py-3 px-6 text-center">NIK</th>
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
                                            <td class="py-3 px-6 text-center">{{ $catin->nik }}</td>
                                            <td class="py-3 px-6 text-center">{{ $catin->kelurahan_desa }} {{ $catin->jalan_no }} {{ $catin->kecamatan }} </td>
                                            <td class="py-3 px-6 text-center">{{ $catin->created_at->format('d-m-Y') }}</td>
                                            <td class="py-3 px-6 text-center">{{ $catin->updated_at->format('d-m-Y') }}</td>
                                            <td class="py-3 px-6 text-center">
                                                <div class="flex flex-col space-y-2">
                                                    @if (auth()->user()->role === 'admin' || auth()->user()->id == $catin->user_id)
                                                        <a href="{{ route('catin.show', $catin->id) }}" class="inline-flex items-center justify-center gap-2 px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-700 text">
                                                            Show
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z" />
                                                                <path fill-rule="evenodd" d="M1.38 8.28a.87.87 0 0 1 0-.566 7.003 7.003 0 0 1 13.238.006.87.87 0 0 1 0 .566A7.003 7.003 0 0 1 1.379 8.28ZM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" clip-rule="evenodd" />
                                                              </svg>
                                                        </a>
                                                        <a href="{{ route('catin.edit', $catin->id) }}" class="inline-flex items-center justify-center gap-2 px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-700">
                                                            Edit
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" className="size-6" class="w-4">
                                                                <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                                                              </svg>
                                                              
                                                        </a>
                                                        <a href="{{ route('catin.delete', $catin->id) }}" 
                                                            onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?');" 
                                                            class="inline-flex items-center justify-center gap-2 px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-700">
                                                             Hapus
                                                             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" className="size-5" class="w-5">
                                                                 <path fillRule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clipRule="evenodd" />
                                                             </svg>
                                                         </a>
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
    </div>
</x-app-layout>


  
  