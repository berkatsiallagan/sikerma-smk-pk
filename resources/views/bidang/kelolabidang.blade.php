<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Kelola Bidang</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="flex text-black font-sans">
  <div class="flex min-h-screen bg-gray-300">

    <x-sidebar />

    <main class="flex-1 p-6 bg-gray-100">
        @yield('content')
    </main>
  </div>

  <div class="flex flex-col flex-grow pl-60 min-h-screen pr-10 items-start text-left bg-gray-100">
    <h1 class="text-5xl font-extrabold text-gray-800 mb-6">
      DAFTAR BIDANG
    </h1>

    <main class="bg-white p-6 rounded-3xl w-full flex justify-end flex-wrap">
      <a href="{{ url('/kelola-bidang/create') }}" class="bg-green-600 hover:bg-green-400 text-white font-semibold px-5 py-3 rounded-md transition">
        <i class="fas fa-plus-circle"></i>
        Tambah Bidang
      </a>

      <table class="mt-4 w-full border-separate border-spacing-0 rounded-lg overflow-hidden shadow-md text-base" aria-label="Daftar Bidang">
        <thead>
          <tr class="bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-400 text-black">
            <th class="text-left px-5 py-3 font-semibold text-nowrap">No.</th>
            <th class="text-left px-5 py-3 font-semibold text-nowrap">Nama Bidang</th>
            <th class="text-left px-5 py-3 font-semibold text-nowrap w-[150px]">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($bidang as $bdg)
            <tr class="bg-white hover:bg-yellow-50 transition-colors duration-300">
              <td class="px-5 py-3 border-b border-gray-200 text-nowrap">{{ $loop->iteration }}</td>
              <td class="px-5 py-3 border-b border-gray-200 text-nowrap">{{ $bdg->nama_bidang }}</td>
              <td class="px-5 py-3 border-b border-gray-200 text-nowrap">
                <div class="flex gap-2">
                  <a href="/kelola-bidang/{{ $bdg->id_bidang }}/edit" class="bg-yellow-600 hover:bg-yellow-400 text-white px-4 py-1 rounded-md text-base"><i class="fas fa-edit"></i></a>
                  <form action="/kelola-bidang/{{ $bdg->id_bidang }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-600 hover:bg-red-400 text-white px-4 py-1 rounded-md text-base"><i class="fas fa-trash"></i></button>
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

  @if (session('success'))
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil!',
      text: "{{ session('success') }}",
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'OK'
    });
  </script>
  @endif

</body>
</html> 