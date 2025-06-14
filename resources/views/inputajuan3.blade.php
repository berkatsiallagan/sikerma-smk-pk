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
      <div class="bg-white p-12 rounded-none shadow-2xl w-full max-w-7xl">
        <h1 class="text-3xl font-bold text-left mb-10">Upload Draft PKS</h1>

        <form method="POST" action="{{ route('save.step3') }}" enctype="multipart/form-data" class="space-y-8">
          @csrf
          <div>
            <label for="catatan" class="block text-gray-700 font-semibold mb-2">Catatan</label>
            <textarea id="catatan" name="catatan" rows="5" class="w-full border border-gray-300 rounded-lg p-4 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('catatan', session('form_data.catatan')) }}</textarea>
          </div>

          <div>
            <label for="file" class="block text-gray-700 font-semibold mb-2">Upload Draft PKS</label>
            <input type="file" id="file" name="dokumen" class="block w-full text-gray-700 border border-gray-300 rounded-lg px-6 py-2 file:mr-6 file:py-2 file:px-6 file:rounded-lg file:border-0 file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer" />
            @error('dokumen')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div class="flex justify-between mt-6">
            <button type="button" onclick="window.location.href='/inputajuan2'" class="px-6 py-2 bg-gray-300 text-black font-bold rounded-lg hover:bg-gray-400 transition">
              <i class="fas fa-arrow-left mr-2"></i> Kembali
            </button>
            <button type="submit" class="px-6 py-2 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 transition">
              Selesai <i class="fas fa-check ml-2"></i>
            </button>
          </div>

          <div class="text-sm text-gray-700 mt-8 space-y-1">
            <p>* Pengajuan MoU Cukup Mengisi Data Pemohon dan Data Mitra</p>
            <p>* Pengajuan PKS Mengisi Data Pemohon, Data Mitra dan melampirkan draft</p>
            <p>* <a href="#" class="text-blue-600 hover:underline">Download Template PKS</a></p>
          </div>
        </form>
      </div>
    </main>
  </div>
</body>
</html>