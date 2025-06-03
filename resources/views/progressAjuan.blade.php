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
    Progress Ajuan
  </h1>
  <main class="bg-white p-6 rounded-3xl w-full">

  <div class="relative flex items-center justify-between max-w-5xl mx-auto px-6 py-10">

  <!-- Step 1 -->
  <div class="flex flex-col items-center">
    <div class="w-16 h-16 rounded-full bg-gray-300 flex items-center justify-center text-lg font-bold text-gray-800">
      1
    </div>
    <div class="mt-2 text-sm font-medium text-gray-800">Pengajuan Mitra</div>
  </div>
  <div class="flex-1 h-1 bg-gray-300 mx-2"></div>

  <!-- Step 2 -->
  <div class="flex flex-col items-center">
    <div class="w-16 h-16 rounded-full bg-gray-300 flex items-center justify-center text-lg font-bold text-gray-800">
      2
    </div>
    <div class="mt-2 text-sm font-medium text-gray-800">Download Dokumen</div>
  </div>
  <div class="flex-1 h-1 bg-gray-300 mx-2"></div>

  <!-- Step 3 -->
  <div class="flex flex-col items-center">
    <div class="w-16 h-16 rounded-full bg-gray-300 flex items-center justify-center text-lg font-bold text-gray-800">
      3
    </div>
    <div class="mt-2 text-sm font-medium text-gray-800">Upload Dokumen</div>
  </div>
  <div class="flex-1 h-1 bg-gray-300 mx-2"></div>

  <!-- Step 4 -->
  <div class="flex flex-col items-center">
    <div class="w-16 h-16 rounded-full bg-gray-300 flex items-center justify-center text-lg font-bold text-gray-800">
      4
    </div>
    <div class="mt-2 text-sm font-medium text-gray-800">Selesai.</div>
  </div>
</div>

    <hr class="border-t-4 border-black mt-6" />
  </main>
</div>


</body>
</html>