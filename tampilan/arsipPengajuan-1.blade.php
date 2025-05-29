<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sikerma Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="background-color : #212121"
  class="text-black font-sans">
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <div class="w-60 bg-amber-600 flex flex-col justify-between">
      <div>
        <div class="bg-[#4a1a05] text-white font-bold text-sm px-6 py-4 select-none flex items-center justify-center gap-2">
          <img src="Sekaju.png" alt="Logo Sikerma" class="w-8 h-8" />
          SIKERMA
        </div>
        <div class="bg-yellow-500 px-6 py-4 flex items-center gap-3">
          <div class="w-8 h-8 border-2 border-black rounded-full flex items-center justify-center text-black bg-white text-lg shrink-0">
            <i class="fas fa-user"></i>
          </div>
          <div class="flex flex-col text-xs leading-tight">
            <strong class="text-sm font-bold">Nama Pengguna</strong>
            <span class="text-[#3a2a0a]">Jurusan Informatika</span>
          </div>
        </div>
        <nav class="mt-2">
          <a href="dashboard.html" class="flex items-center gap-3 px-6 py-3 font-bold text-sm text-black hover:bg-yellow-500 transition">
            <i class="fas fa-tachometer-alt w-5 text-center"></i> Dashboard
          </a>
          <a href="#" class="flex items-center gap-3 px-6 py-3 font-bold text-sm text-black bg-yellow-500">
            <i class="fas fa-check-square w-5 text-center"></i> Data Pengajuan
          </a>
          <a href="#" class="flex items-center gap-3 px-6 py-3 font-bold text-sm text-black hover:bg-yellow-500 transition">
            <i class="fas fa-chart-bar w-5 text-center"></i> Status Kerjasama
          </a>
          <a href="#" class="flex items-center gap-3 px-6 py-3 font-bold text-sm text-black hover:bg-yellow-500 transition">
            <i class="fas fa-chart-bar w-5 text-center"></i> Kelola jurusan
          </a>
          <a href="pengajuan.html" class="flex items-center gap-3 px-6 py-3 font-bold text-sm text-black hover:bg-yellow-500 transition">
            <i class="fas fa-chart-bar w-5 text-center"></i> Arsip Kerjasama
          </a>
        </nav>
      </div>
      <div class="px-6 py-3 text-sm font-bold cursor-pointer">keluar</div>
    </div>

    <div class="flex flex-col flex-grow p-8 items-start text-left bg-gray-100">
      <h1 class="text-5xl font-extrabold text-gray-800 mb-6">
        Pengajuan
      </h1>

      <main class="bg-white p-6 rounded-3xl w-full">
        <!-- Form Section -->
        <div class="space-y-6">
          <h2 class="text-2xl font-bold text-gray-800">Data Pemohon</h2>
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nomor Pemohonan (auto generated) -->
            <div class="col-span-1">
              <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Pemohonan</label>
              <input type="text" value="PMH1-PHM0001" readonly 
                     class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed">
            </div>
            
            <!-- Tanggal Pengajuan (auto generated) -->
            <div class="col-span-1">
              <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pengajuan</label>
              <input type="date" value="<?php echo date('Y-m-d'); ?>" readonly 
                     class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed">
            </div>
            
            <!-- Nama Pemohon -->
            <div class="col-span-1">
              <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pemohon*</label>
              <input type="text" required 
                     class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
            </div>
            
            <!-- NIDN/NIP -->
            <div class="col-span-1">
              <label class="block text-sm font-medium text-gray-700 mb-1">NIDN/NIP*</label>
              <input type="text" required 
                     class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
            </div>
            
            <!-- Email -->
            <div class="col-span-1">
              <label class="block text-sm font-medium text-gray-700 mb-1">Email*</label>
              <input type="email" required 
                     class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
            </div>
            
            <!-- No. HP -->
            <div class="col-span-1">
              <label class="block text-sm font-medium text-gray-700 mb-1">No. HP*</label>
              <input type="tel" required 
                     class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
            </div>
            
            <!-- Jurusan Pemohon (Checkbox) -->
            <div class="col-span-2">
              <label class="block text-sm font-medium text-gray-700 mb-2">Jurusan Pemohon*</label>
              <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                <div class="flex items-center">
                  <input id="jurusan-1" type="checkbox" class="w-4 h-4 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                  <label for="jurusan-1" class="ml-2 text-sm text-gray-700">Informatika</label>
                </div>
                <div class="flex items-center">
                  <input id="jurusan-2" type="checkbox" class="w-4 h-4 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                  <label for="jurusan-2" class="ml-2 text-sm text-gray-700">Sipil</label>
                </div>
                <div class="flex items-center">
                  <input id="jurusan-3" type="checkbox" class="w-4 h-4 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                  <label for="jurusan-3" class="ml-2 text-sm text-gray-700">Elektro</label>
                </div>
                <div class="flex items-center">
                  <input id="jurusan-4" type="checkbox" class="w-4 h-4 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                  <label for="jurusan-4" class="ml-2 text-sm text-gray-700">Mesin</label>
                </div>
                <div class="flex items-center">
                  <input id="jurusan-5" type="checkbox" class="w-4 h-4 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                  <label for="jurusan-5" class="ml-2 text-sm text-gray-700">Arsitektur</label>
                </div>
                <div class="flex items-center">
                  <input id="jurusan-6" type="checkbox" class="w-4 h-4 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                  <label for="jurusan-6" class="ml-2 text-sm text-gray-700">Industri</label>
                </div>
                <div class="flex items-center">
                  <input id="jurusan-7" type="checkbox" class="w-4 h-4 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                  <label for="jurusan-7" class="ml-2 text-sm text-gray-700">Sistem Informasi</label>
                </div>
                <div class="flex items-center">
                  <input id="jurusan-8" type="checkbox" class="w-4 h-4 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                  <label for="jurusan-8" class="ml-2 text-sm text-gray-700">Teknik Kimia</label>
                </div>
              </div>
            </div>
            
            <!-- Tujuan Kerjasama -->
            <div class="col-span-2">
              <label class="block text-sm font-medium text-gray-700 mb-1">Tujuan Kerjasama*</label>
              <textarea rows="3" required 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500"></textarea>
            </div>
          </div>
        </div>
        
        <!-- Navigation Buttons -->
        <div class="flex justify-end mt-8 space-x-4">
          <button type="button" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 transition">
            Batal
          </button>
          <button type="button" class="px-6 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition">
            Selanjutnya <i class="fas fa-arrow-right ml-2"></i>
          </button>
        </div>

        <hr class="border-t-4 border-black mt-6" />
      </main>
    </div>
  </div>

  <script>
    // Auto-generate application number (example)
    document.addEventListener('DOMContentLoaded', function() {
      // In a real application, you would fetch the last number from a database
      const lastNumber = 1; // This would come from your backend
      const formattedNumber = `PMH1-PHM${String(lastNumber).padStart(4, '0')}`;
      document.querySelector('input[value="PMH1-PHM0001"]').value = formattedNumber;
    });
  </script>
</body>
</html>