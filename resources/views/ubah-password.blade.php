<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Ubah Password - Sikerma</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="background-color : #212121" class="text-black font-sans">
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
          <a href="#" class="flex items-center gap-3 px-6 py-3 font-bold text-sm text-black hover:bg-yellow-500 transition">
            <i class="fas fa-check-square w-5 text-center"></i> Data Pengajuan
          </a>
          <a href="#" class="flex items-center gap-3 px-6 py-3 font-bold text-sm text-black hover:bg-yellow-500 transition">
            <i class="fas fa-chart-bar w-5 text-center"></i> Status Kerjasama
          </a>
          <a href="#" class="flex items-center gap-3 px-6 py-3 font-bold text-sm text-black hover:bg-yellow-500 transition">
            <i class="fas fa-chart-bar w-5 text-center"></i> Kelola jurusan
          </a>
          <a href="pengajuan.html" class="flex items-center gap-3 px-6 py-3 font-bold text-sm text-black bg-yellow-500">
            <i class="fas fa-chart-bar w-5 text-center"></i> Arsip Kerjasama
          </a>
        </nav>
      </div>
      <div class="px-6 py-3 text-sm font-bold cursor-pointer">keluar</div>
    </div>

    <!-- Main Content -->
    <div class="flex flex-col flex-grow p-8 items-start text-left bg-gray-100">
      <h1 class="text-4xl font-extrabold text-gray-800 mb-6">
        Ubah Password
      </h1>

      <main class="bg-white p-6 rounded-3xl w-full">
<form class="space-y-4">
    <!-- Password Lama -->
          <div class="flex items-center gap-4">
            <label class="w-40 font-bold text-sm">Password Lama</label>
            <input type="password" name="current_password" placeholder="Masukkan password lama"
              class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600" required />
          </div>

          <!-- Password Baru -->
          <div class="flex items-center gap-4">
            <label class="w-40 font-bold text-sm">Password Baru</label>
            <input type="password" name="new_password" placeholder="Masukkan password baru"
              class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600" required />
          </div>

          <!-- Konfirmasi Password -->
          <div class="flex items-center gap-4">
            <label class="w-40 font-bold text-sm">Konfirmasi Password</label>
            <input type="password" name="new_password_confirmation" placeholder="Ulangi password baru"
              class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600" required />
          </div>

          <div class="flex justify-end mt-4">
            <button type="submit"
              class="px-6 py-2 bg-amber-600 text-white font-bold rounded-lg hover:bg-amber-700 transition">
              Simpan <i class="fas fa-save ml-2"></i>
            </button>
          </div>
</form>

        <hr class="border-t-4 border-black mt-6" />
      </main>
    </div>
  </div>
</body>
</html>