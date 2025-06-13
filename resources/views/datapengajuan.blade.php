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
    DATA PENGAJUAN
  </h1>

 

    <table class="w-full border-separate border-spacing-0 rounded-lg overflow-hidden shadow-md" aria-label="Daftar Ajuan">
  <thead>
    <tr class="bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-400 text-black">
      <th class="text-left px-6 py-3 font-semibold text-sm">ID Ajuan</th>
      <th class="text-left px-6 py-3 font-semibold text-sm">NIP</th>
      <th class="text-left px-6 py-3 font-semibold text-sm">Nama Mitra</th>
      <th class="text-left px-6 py-3 font-semibold text-sm">Tanggal Ajuan</th>
      <th class="text-left px-6 py-3 font-semibold text-sm">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <tr class="bg-white hover:bg-yellow-50 transition-colors duration-300 cursor-pointer">
      <td class="px-6 py-4 text-sm border-b border-gray-200">AJ001</td>
      <td class="px-6 py-4 text-sm border-b border-gray-200">1987654321</td>
      <td class="px-6 py-4 text-sm border-b border-gray-200">PT. Maju Jaya</td>
      <td class="px-6 py-4 text-sm border-b border-gray-200">2024-06-01</td>
      <td class="px-6 py-4 text-sm border-b border-gray-200">
        <div class="flex flex-wrap gap-2">
          <button class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold px-4 py-1 rounded-md transition">
            Detail
          </button>
          <button class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold px-4 py-1 rounded-md transition">
            Edit
          </button>
          <button class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-1 rounded-md transition">
            Hapus
          </button>
        </div>
      </td>
    </tr>
  </tbody>
</table>


    <hr class="border-t-4 border-black mt-6" />
  </main>
</div>


</body>
</html>