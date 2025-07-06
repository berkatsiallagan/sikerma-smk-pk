<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Arsip Dokumen</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/alpinejs" defer></script>
</head>
<body class="font-sans text-black" style="background-color: #212121">
  <div class="flex min-h-screen">
    <x-sidebar />

    <div class="flex flex-col flex-grow pl-80 min-h-screen pr-10 bg-gray-100 items-start text-left">
      <h1 class="text-5xl font-extrabold text-gray-800 mb-6">ARSIP DOKUMEN</h1>

      <main class="bg-white p-6 rounded-3xl w-full">
        <!-- Search Bar -->
        <div class="flex justify-end mb-4">
          <form action="{{ route('arsip-dokumen') }}" method="GET" class="flex items-center space-x-2">
            <input 
              type="text" 
              name="search" 
              placeholder="Cari Mitra..." 
              value="{{ request('search') }}"
              class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400"
            />
            <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold px-4 py-2 rounded-lg transition">
              <i class="fa fa-search"></i>
            </button>
          </form>
        </div>

        <!-- Tabel Arsip -->
        <table class="w-full border-separate border-spacing-0 rounded-lg overflow-hidden shadow-md" aria-label="Daftar Ajuan">
          <thead>
            <tr class="bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-400 text-black">
              <th class="w-[5px] text-left px-6 py-3 font-semibold text-sm">No</th>
              <th class="text-left px-6 py-3 font-semibold text-sm">Mitra</th>
              <th class="text-center px-6 py-3 font-semibold text-sm">Tanggal Mulai</th>
              <th class="text-center px-6 py-3 font-semibold text-sm">Sisa Hari</th>
              <th class="text-center px-6 py-3 font-semibold text-sm">Status</th>
              <th class="text-center px-6 py-3 font-semibold text-sm">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($kerjasamas as $kerjasama)
              <tr class="bg-white">
                <td class="text-center px-6 py-4 text-sm border-b border-gray-200">
                  {{ $loop->iteration }}
                </td>

                <td class="text-left px-6 py-4 text-sm border-b border-gray-200">
                  {{ $kerjasama->mitra->nama_mitra ?? '-' }}
                </td>

                <td class="text-center px-6 py-4 text-sm border-b border-gray-200">
                  @if($kerjasama->dokumen && $kerjasama->dokumen->tanggal_mulai)
                    {{ \Carbon\Carbon::parse($kerjasama->dokumen->tanggal_mulai)->format('Y-m-d') }}
                  @else
                    -
                  @endif
                </td>

                <!-- Kolom Sisa Hari -->
                <td class="text-center px-6 py-4 text-sm border-b border-gray-200">
                  @if($kerjasama->dokumen && $kerjasama->dokumen->tanggal_selesai)
                    @php
                      $status = strtolower($kerjasama->dokumen->status ?? '-');
                      
                      if ($status === 'tidak aktif') {
                          echo 'Tidak Aktif';
                      } elseif ($status === 'kadaluarsa') {
                          echo 'Selesai';
                      } else {
                          $tanggalSelesai = \Carbon\Carbon::parse($kerjasama->dokumen->tanggal_selesai);
                          $sisaHari = now()->diffInDays($tanggalSelesai, false);
                          echo $sisaHari > 0 ? (int)$sisaHari.' hari' : 'Selesai';
                      }
                    @endphp
                  @else
                    -
                  @endif
                </td>

                <!-- Kolom Status -->
                @php
                  $tanggalSelesai = $kerjasama->dokumen->tanggal_selesai ?? null;
                  $sisaHari = $tanggalSelesai ? now()->diffInDays(\Carbon\Carbon::parse($tanggalSelesai), false) : null;
          
                  if ($sisaHari === null) {
                    $statusText = '-';
                    $color = 'gray';
                  } elseif ($sisaHari > 30) {
                    $statusText = 'Aktif';
                    $color = 'green';
                  } elseif ($sisaHari > 0) {
                    $statusText = 'Akan Berakhir';
                    $color = 'yellow';
                  } elseif ($sisaHari > 0) {
                    $statusText = 'Tidak Aktif';
                    $color = 'red';
                  } else {
                    $statusText = 'Kadaluarsa';
                    $color = 'blue';
                  }
                @endphp
                <td class="px-6 py-4 text-sm border-b border-gray-200">
                  <div class="flex justify-center">
                    <button class="bg-{{ $color }}-600 hover:bg-{{ $color }}-500 text-white font-semibold px-4 py-1 rounded-md transition">
                      {{ $statusText }}
                    </button>
                  </div>
                </td>

                <td class="text-center px-6 py-4 text-sm border-b border-gray-200">
                  @if($kerjasama->dokumen)
                    <a href="{{ route('dokumen.download', $kerjasama->dokumen->id_dokumen) }}" 
                       class="bg-blue-600 hover:bg-blue-400 text-white font-semibold px-4 py-1 rounded-md transition inline-flex items-center justify-center"
                       title="Download Dokumen">
                      <i class="fa-solid fa-download"></i>
                    </a>
                  @else
                    -
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <hr class="border-t-4 border-black mt-6" />
      </main>
    </div>
  </div>
</body>
</html>