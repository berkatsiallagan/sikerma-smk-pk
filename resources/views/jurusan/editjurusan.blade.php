<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tambah Jurusan</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex text-black font-sans">
  <div class="flex min-h-screen bg-gray-300">

    <!-- Sidebar -->
    <x-sidebar />

<main class="flex-1 p-6 bg-gray-100">
    @yield('content')
</main>
</div>

  <div class="flex flex-col flex-grow p-8 items-start text-left bg-gray-100">
  <h3 class="text-4xl font-semibold text-gray-800 mb-6">Edit Jurusan</h3>

  <main class="bg-white p-6 rounded-3xl w-full">
  <form action="/kelola-jurusan/{{ $jurusan->id_jurusan }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-2">
              <label for="id_jurusan" class="block text-sm font-medium text-gray-700 mb-1 required-field">No.</label>
              <input type="text" required id="id_jurusan" name="id_jurusan" placeholder="Masukkan no. jurusan" value="{{ $jurusan->id_jurusan }}"
                     class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
            </div>
            <div class="mb-2">
              <label for="nama_jurusan" class="block text-sm font-medium text-gray-700 mb-1 required-field">No.</label>
              <input type="text" required id="nama_jurusan" name="nama_jurusan" placeholder="Masukkan no. jurusan" value="{{ $jurusan->nama_jurusan }}"
                     class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                
            </div>
            <button class="px-6 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition">Update</button>
            <a href="/kelola-jurusan" class="px-6 py-2 bg-gray-300 text-black font-bold rounded-lg hover:bg-gray-400 transition">Batal</a>
        </form>
    </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </div>

</body>
</html>
