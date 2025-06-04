<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Kelola Jurusan</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Tambahkan SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
      DAFTAR JURUSAN
    </h1>

    <main class="bg-white p-6 rounded-3xl w-full">
      <a href="{{ url('/kelola-jurusan/create') }}" class="bg-yellow-500 hover:bg-yellow-300 text-black font-semibold px-5 py-3 rounded-md transition">Tambah Jurusan</a>

      <table class="mt-4 w-full border-separate border-spacing-0 rounded-lg overflow-hidden shadow-md" aria-label="Daftar Jurusan">
        <thead>
          <tr class="bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-400 text-black">
            <th class="text-left px-6 py-3 font-semibold text-sm">No.</th>
            <th class="text-left px-6 py-3 font-semibold text-sm">Nama Jurusan</th>
            <th class="text-left px-6 py-3 font-semibold text-sm">Aksi</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($jurusan as $jrsn)
          <tr class="bg-white hover:bg-yellow-50 transition-colors duration-300 cursor-pointer">
            <td class="px-6 py-4 text-sm border-b border-gray-200">{{ $jrsn->id_jurusan }}</td>
            <td class="px-6 py-4 text-sm border-b border-gray-200">{{ $jrsn->nama_jurusan }}</td>
            <td class="px-6 py-4 text-sm border-b border-gray-200">
              <div class="flex flex-wrap gap-2">
                <a href="/kelola-jurusan/{{ $jrsn->id_jurusan }}/edit" class="bg-yellow-400 hover:bg-yellow-500 text-grey font-semibold px-4 py-1 rounded-md transition">Edit</a>
                <form action="/kelola-jurusan/{{ $jrsn->id_jurusan }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                  @csrf
                  @method('DELETE')
                  <button class="bg-red-800 hover:bg-red-800 text-white font-semibold px-4 py-1 rounded-md transition">Hapus</button>
                </form>
              </div>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>

      <hr class="border-t-4 border-black mt-6" />
    </main>
  </div>

  <!-- Tampilkan SweetAlert jika ada session sukses -->
  @if (session('success'))
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil!',
      text: '{{ session('success') }}',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'OK'
    });
  </script>
  @endif

</body>
</html>