<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Mitra</title>
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
    <h3 class="text-4xl font-semibold text-gray-800 mb-6">Edit Mitra</h3>

    <main class="bg-white p-6 rounded-3xl w-full">
      <form action="/kelola-mitra/{{ $mitra->id_mitra }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-2">
          <label for="id_mitra" class="block text-sm font-medium text-gray-700 mb-1 required-field">No.</label>
          <input type="text" required id="id_mitra" name="id_mitra" value="{{ $mitra->id_mitra }}"
                 class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
        </div>
        <div class="mb-2">
          <label for="nama_mitra" class="block text-sm font-medium text-gray-700 mb-1 required-field">Nama Mitra</label>
          <input type="text" required id="nama_mitra" name="nama_mitra" value="{{ $mitra->nama_mitra }}"
                 class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
        </div>
        <div class="mb-2">
          <label for="lingkup" class="block text-sm font-medium text-gray-700 mb-1 required-field">Lingkup</label>
          <select id="lingkup" name="lingkup" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
            <option value="Nasional" {{ $mitra->lingkup=='Nasional' ? 'selected' : '' }}>Nasional</option>
            <option value="Internasional" {{ $mitra->lingkup=='Internasional' ? 'selected' : '' }}>Internasional</option>
          </select>
        </div>
        <div class="mb-2">
          <label for="website" class="block text-sm font-medium text-gray-700 mb-1 required-field">Website</label>
          <input type="url" required id="website" name="website" value="{{ $mitra->website }}"
                 class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
        </div>
        <div class="mb-2">
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1 required-field">Email</label>
          <input type="email" required id="email" name="email" value="{{ $mitra->email }}"
                 class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
        </div>
        <button class="px-6 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition">Update</button>
        <a href="/kelola-mitra" class="px-6 py-2 bg-gray-300 text-black font-bold rounded-lg hover:bg-gray-400 transition">Batal</a>
      </form>
    </main>
  </div>
</body>
</html> 