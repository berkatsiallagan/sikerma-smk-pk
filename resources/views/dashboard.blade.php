<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sikerma Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Chart.js for diagrams -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="flex text-black font-sans">
  <div class="flex min-h-screen bg-gray-300">

    <x-sidebar />

    <main class="flex-1 p-6 bg-gray-100">
      @if(session('success'))
      <div id="success-message" data-message="{{ session('success') }}" style="display:none;"></div>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          var successMessage = document.getElementById('success-message').dataset.message;
          Swal.fire({
            icon: 'success',
            title: 'Login Berhasil',
            text: successMessage,
            showConfirmButton: false,
            timer: 2000, // otomatis hilang dalam 2 detik
            timerProgressBar: false
          });
        });
      </script>
      @endif
      @yield('content')
    </main>
  </div>

  <div class="flex flex-col flex-grow p-8 items-start text-left bg-gray-100">
    <h1 class="text-5xl font-extrabold text-gray-800 mb-6">
      DASHBOARD
    </h1>

    <!-- Stats Cards Row -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full mb-8">
      <!-- Total Dokumen Card -->
      <div class="bg-white p-6 rounded-2xl shadow-md flex items-center">
        <div class="bg-amber-100 p-4 rounded-full mr-4">
          <i class="fas fa-file-contract text-amber-600 text-2xl"></i>
        </div>
        <div>
          <p class="text-gray-500 text-sm">Total Dokumen</p>
          <h3 class="text-2xl font-bold">124</h3>
          <p class="text-green-500 text-xs mt-1"><i class="fas fa-arrow-up"></i> 12% dari bulan lalu</p>
        </div>
      </div>
      
      <!-- Total Perusahaan Card -->
      <div class="bg-white p-6 rounded-2xl shadow-md flex items-center">
        <div class="bg-blue-100 p-4 rounded-full mr-4">
          <i class="fas fa-building text-blue-600 text-2xl"></i>
        </div>
        <div>
          <p class="text-gray-500 text-sm">Total Perusahaan</p>
          <h3 class="text-2xl font-bold">87</h3>
          <p class="text-green-500 text-xs mt-1"><i class="fas fa-arrow-up"></i> 5% dari bulan lalu</p>
        </div>
      </div>
      
      <!-- Dokumen Akan Habis Card -->
      <div class="bg-white p-6 rounded-2xl shadow-md flex items-center">
        <div class="bg-red-100 p-4 rounded-full mr-4">
          <i class="fas fa-exclamation-triangle text-red-600 text-2xl"></i>
        </div>
        <div>
          <p class="text-gray-500 text-sm">Dokumen Akan Habis</p>
          <h3 class="text-2xl font-bold">8</h3>
          <p class="text-red-500 text-xs mt-1"><i class="fas fa-arrow-up"></i> 2 dokumen bulan ini</p>
        </div>
      </div>
    </div>

    <!-- Chart Section -->
    <div class="bg-white p-6 rounded-2xl shadow-md w-full mb-8">
      <h2 class="text-xl font-bold text-gray-800 mb-4">Statistik Kerjasama</h2>
      <div class="h-80">
        <canvas id="agreementChart"></canvas>
      </div>
    </div>

    <!-- Recent Agreements Table -->
    <div class="bg-white p-6 rounded-2xl shadow-md w-full">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-800">Kerjasama Terkini 6 Bulan Terakhir</h2>
      </div>
      
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Perusahaan</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Kerjasama</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Mulai</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Berakhir</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">PT. Teknologi Maju</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">MoU</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15 Jan 2023</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15 Jan 2025</td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
              </td>
            </tr>
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">CV. Solusi Digital</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">MoA</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1 Mar 2023</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1 Mar 2024</td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Akan Habis</span>
              </td>
            </tr>
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">PT. Bangun Nusantara</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">MoU</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10 Sep 2022</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10 Sep 2023</td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Kadaluarsa</span>
              </td>
            </tr>
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">4</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">PT. Data Analytics</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">MoA</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">5 Mei 2023</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">5 Mei 2026</td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
              </td>
            </tr>
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">5</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">PT. Inovasi Teknologi</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">MoU</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">20 Jun 2023</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">20 Jun 2025</td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    // Initialize the chart
    document.addEventListener('DOMContentLoaded', function() {
      const ctx = document.getElementById('agreementChart').getContext('2d');
      
      const agreementChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['MoU', 'MoA'],
          datasets: [{
            label: 'Jumlah Kerjasama',
            data: [78, 46],
            backgroundColor: [
              'rgba(75, 192, 192, 0.7)',
              'rgba(255, 99, 132, 0.7)'
            ],
            borderColor: [
              'rgba(75, 192, 192, 1)',
              'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                stepSize: 10
              }
            }
          },
          plugins: {
            legend: {
              display: false
            },
            tooltip: {
              callbacks: {
                label: function(context) {
                    return `${context.dataset.label}: ${context.raw}`;
                }
              }
            }
          }
        }
      });
    });
  </script>
</body>

</html>