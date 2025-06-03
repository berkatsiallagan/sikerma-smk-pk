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
    input nama mitra
  </h1>

  <main class="bg-white p-6 rounded-3xl w-full">
<form class="space-y-4">

    <!-- Nama Mitra -->
    <div class="flex items-center gap-4">
      <label class="w-40 font-bold text-sm">Nama Mitra</label>
      <input type="text" placeholder="Masukkan nama mitra" class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600" />
    </div>

  </form>

<div class="flex justify-end mt-4">
  <a href="/arsip" class="px-6 py-2 bg-amber-600 text-white font-bold rounded-lg hover:bg-amber-700 transition">
    Next <i class="fas fa-arrow-right ml-2"></i>
  </a>
</div>


    <hr class="border-t-4 border-black mt-6" />
  </main>
</div>

</body>
</html>