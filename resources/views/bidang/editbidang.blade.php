<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Bidang</title>
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

  <div class="flex flex-col flex-grow pl-60 min-h-screen pr-10 items-start text-left bg-gray-100">
    <h3 class="text-4xl font-semibold text-gray-800 mb-6">Edit Bidang</h3>

    <main class="bg-white p-6 rounded-3xl w-full">
      <form action="/kelola-bidang/{{ $bidang->id_bidang }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-2">
          <label for="id_bidang" class="block text-sm font-medium text-gray-700 mb-1 required-field">No.</label>
          <input type="text" required id="id_bidang" name="id_bidang" value="{{ old('id_bidang', $bidang->id_bidang) }}"
                 class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
        </div>
        <div class="mb-2">
          <label for="nama_bidang" class="block text-sm font-medium text-gray-700 mb-1 required-field">Nama Bidang</label>
          <input type="text" required id="nama_bidang" name="nama_bidang" value="{{ old('nama_bidang', $bidang->nama_bidang) }}"
                 class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
        </div>
        <button class="px-6 py-2 bg-yellow-600 text-white font-bold rounded-lg hover:bg-yellow-700 transition">Update</button>
        <a href="/kelola-bidang" class="px-6 py-2 bg-gray-300 text-black font-bold rounded-lg hover:bg-gray-400 transition">Kembali</a>
      </form>
    </main>
  </div>
</body>
</html> 