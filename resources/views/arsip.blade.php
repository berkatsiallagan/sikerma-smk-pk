<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sikerma Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex text-black font-sans">
  <div class="flex min-h-screen bg-gray-300">

  <x-sidebar />

    <main class="flex-1 p-6 bg-gray-100">
        @yield('content')
    </main>
  </div>

<div class="flex flex-col flex-grow p-8 items-start text-left bg-gray-100">
  <h1 class="text-5xl font-extrabold text-gray-800 mb-6">
    input 2
  </h1>

  <main class="bg-white p-6 rounded-3xl w-full">
<form class="space-y-4">

    <!-- Nama Mitra -->
    <div class="flex items-center gap-4">
      <label class="w-40 font-bold text-sm">Nama Mitra</label>
      <input type="text" placeholder="Masukkan nama mitra" class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600" />
    </div>

    <!-- Kategori Mitra -->
    <div class="flex items-center gap-4">
      <label class="w-40 font-bold text-sm">Kategori Mitra</label>
      <input type="text" placeholder="Misal: Industri, Pemerintah, dll" class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600" />
    </div>

    <!-- Negara -->
    <div class="flex items-center gap-4">
      <label class="w-40 font-bold text-sm">Negara</label>
      <input type="text" placeholder="Contoh: Indonesia" class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600" />
    </div>

    <!-- Website Institusi -->
    <div class="flex items-center gap-4">
      <label class="w-40 font-bold text-sm">Website Institusi</label>
      <input type="url" placeholder="https://contohwebsite.com" class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600" />
    </div>

    <!-- Nama PIC -->
    <div class="flex items-center gap-4">
      <label class="w-40 font-bold text-sm">Nama PIC</label>
      <input type="text" placeholder="Nama penanggung jawab" class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600" />
    </div>

    <!-- Jabatan -->
    <div class="flex items-center gap-4">
      <label class="w-40 font-bold text-sm">Jabatan</label>
      <input type="text" placeholder="Jabatan PIC" class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600" />
    </div>

    <!-- No HP / WA -->
    <div class="flex items-center gap-4">
      <label class="w-40 font-bold text-sm">No HP / WA</label>
      <input type="tel" placeholder="08XXXXXXXXXX" class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600" />
    </div>

    <!-- Email -->
    <div class="flex items-center gap-4">
      <label class="w-40 font-bold text-sm">Email</label>
      <input type="email" placeholder="email@domain.com" class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600" />
    </div>

    <!-- Jenis Kerjasama -->
    <div class="flex items-start gap-4">
      <label class="w-40 font-bold text-sm pt-2">Jenis Kerjasama</label>
      <textarea rows="4" placeholder="Tuliskan jenis kerjasama yang dilakukan" class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600"></textarea>
    </div>

  </form>

  <div class="flex justify-between mt-6">
    <a href="namamitra" class="px-6 py-2 bg-gray-300 text-black font-bold rounded-lg hover:bg-gray-400 transition">
      <i class="fas fa-arrow-left mr-2"></i> Back
    </a>
    <a href="inputajuan3" class="px-6 py-2 bg-amber-600 text-white font-bold rounded-lg hover:bg-amber-700 transition">
      Next <i class="fas fa-arrow-right ml-2"></i>
    </a>
  </div>

    <hr class="border-t-4 border-black mt-6" />
  </main>
</div>


</body>
</html>