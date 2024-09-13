<x-app-layout>
    <style>
       .background-image {
           background-image: url('/images/dashboard.png');
           background-size: cover;
           background-position: center;
           min-height: 100vh; /* Menjaga agar latar belakang menutupi seluruh tinggi viewport */
           
       } 
    </style>

    <div class="background-image py-12">
        <div class="bg-gradient-to-r from-500 to-transparent">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 shadow-transparent">
            <div class="bg-blue-100 bg-opacity-75 p-6 rounded-lg shadow-lg">
                <h1 class="text-4xl font-bold mb-4 text-center">Dashboard User</h1>
                <p class="text-gray-700 mb-6 text-center font-semibold">Halaman ini digunakan oleh User untuk melihat data pribadi calon pengantin (catin).</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Status Data Catin -->
                    <div class="bg-blue-800 p-4 rounded-lg shadow-lg text-center flex flex-col justify-center items-center h-full">
                        <h2 class="text-white text-xl font-semibold">Status Data Catin</h2>
                        <p class="text-white text-3xl font-bold">{{ $statusCatin }}</p>
                    </div>                    

                    <!-- Aktivitas Terkini -->
                    <div class="bg-blue-800 p-4 rounded-lg shadow-lg">
                        <h2 class="text-white text-xl font-semibold text-center">Aktivitas Terkini</h2>
                        <ul class="list-disc list-inside text-white text-center">
                            <li>Anda Login pada {{ $lastLoginAt }} WIB</li>
                            @if(count($catinSubmittedAt) > 0)
                                @php
                                    // Array untuk nama urutan dalam Bahasa Indonesia
                                    $orderNames = ['pertama', 'kedua', 'ketiga', 'keempat', 'kelima', 'keenam', 'ketujuh', 'kedelapan', 'kesembilan', 'kesepuluh'];
                                @endphp
                                @foreach($catinSubmittedAt as $index => $submittedAt)
                                    <li>Data catin {{ $orderNames[$index] ?? 'ke-'.($index + 1) }} anda ter-submit pada {{ $submittedAt }} WIB</li>
                                @endforeach
                            @else
                                <li>Data catin anda belum disubmit</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main class="grid min-h-full place-items-center px-6 py-24 sm:py-32 lg:px-8">
        <div class="text-center bg-white bg-opacity-75 p-6 rounded-lg">
            <p class="text-base font-semibold text-indigo-600"></p>
            <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">Selamat Datang di Pendataan Calon Pengantin</h1>
            <p class="mt-6 text-base leading-7 text-gray-900">Pemenuhan gizi remaja, khususnya sejak usia 12 tahun atau pelajar setingkat Sekolah Menengah Pertama (SMP), sangat penting untuk memastikan pertumbuhan dan perkembangan yang optimal. Pada masa remaja, terjadi peningkatan kebutuhan gizi seiring dengan pesatnya pertumbuhan fisik, perkembangan kognitif, dan emosional. Asupan nutrisi yang cukup dan seimbang dapat membantu remaja mencapai potensi pertumbuhan maksimal, mencegah berbagai masalah kesehatan seperti anemia, obesitas, dan kekurangan zat gizi lainnya. Remaja yang menerima asupan gizi yang tepat cenderung memiliki kondisi kesehatan yang lebih baik, kemampuan belajar yang lebih optimal, serta kesiapan fisik dan mental yang lebih matang dalam menghadapi masa dewasa. Pentingnya pemantauan gizi sejak usia remaja juga berkaitan dengan kesehatan reproduksi di masa depan, termasuk dalam persiapan menuju pernikahan.</p>
            <p class="mt-6 text-base leading-7 text-gray-900">Pernikahan merupakan salah satu fase penting dalam kehidupan seseorang. Oleh karena itu, calon pengantin (catin) memerlukan perhatian khusus dalam hal kesehatan fisik dan mental. Salah satu langkah penting dalam memastikan kesiapan calon pengantin adalah dengan mendokumentasikan data terkait kesehatan dan administrasi kependudukan mereka secara sistematis. Dalam konteks ini, sebuah sistem berbasis web sangat dibutuhkan untuk mendukung pengelolaan data calon pengantin dengan efektif dan efisien. Sistem ini tidak hanya berfungsi sebagai sarana penyimpanan data, tetapi juga sebagai alat untuk memantau kondisi kesehatan, status gizi, serta informasi lain yang relevan dengan persiapan pernikahan. Dengan adanya sistem ini, dinas terkait dapat memberikan intervensi yang tepat waktu jika ditemukan masalah kesehatan atau ketidaksiapan calon pengantin dalam menghadapi pernikahan. Data yang dikumpulkan, seperti NIK, alamat, usia, status gizi, serta riwayat kesehatan, dapat menjadi dasar penting bagi pemerintah dalam upaya meningkatkan kesejahteraan keluarga melalui perencanaan kesehatan reproduksi yang lebih baik.</p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="/catin/create" class="inline-flex items-center rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                        <path fillRule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clipRule="evenodd" />
                    </svg>
                    Buat Data Catin
                </a> 
            </div>
        </div>
    </main>
</x-app-layout>
