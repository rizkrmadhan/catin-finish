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
            
            <!-- Card Section -->
            <div class="bg-blue-100 bg-opacity-75 p-6 rounded-lg shadow-lg mb-8">
                <h1 class="text-4xl font-bold mb-4 text-center">Dashboard Admin</h1>
                <p class="text-gray-900 mb-6 text-center">Halaman ini digunakan oleh Admin untuk mengelola data calon pengantin (catin).</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <!-- Card 1 -->
                    <div class="bg-blue-800 p-6 rounded-lg shadow-md text-center">
                        <h3 class="text-white text-xl font-bold mb-2">Total Data Catin</h3>
                        <p class="text-white text-4xl font-bold">{{ $totalCatin }}</p>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-blue-800 p-6 rounded-lg shadow-md text-center">
                        <h3 class="text-white text-xl font-bold mb-2">Total User</h3>
                        <p class="text-white text-4xl font-bold">{{ $totalUser }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Graph Section -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-center text-xl font-bold mb-4">Grafik Data</h3>
                <div class="relative">
                    <!-- Replace with your charting library code, e.g., Chart.js -->
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('myChart').getContext('2d');

        var kecamatan = @json(array_keys($catinByKecamatan));
        var total = @json(array_values($catinByKecamatan));

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: kecamatan,
                datasets: [{
                    label: 'Jumlah Data Catin per Kecamatan',
                    data: total,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: false,  // Tidak dimulai dari 0
                        min: 0,  // Mulai dari angka 1
                        ticks: {
                            stepSize: 1,  // Hanya tampilkan angka bulat (1, 2, 3, dst.)
                            callback: function(value, index, values) {
                                if (value % 1 === 0) {
                                    return value; // Tampilkan hanya angka bulat
                                }
                            }
                        }
                    }
                }
            }
        });
    });
</script>
    </script>
</x-app-layout>

