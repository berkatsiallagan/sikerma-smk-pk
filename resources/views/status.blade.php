<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sikerma Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="https://unpkg.com/alpinejs" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="background-color : #212121"
  class="text-black font-sans">
  <div class="flex min-h-screen">

   <x-sidebar />

<div class="flex flex-col flex-grow p-8 items-start text-left bg-gray-100">
  <h1 class="text-5xl font-extrabold text-gray-800 mb-6">
    STATUS KERJASAMA
  </h1>

  <main class="bg-white p-6 rounded-3xl w-full">

    <table class="w-full border-separate border-spacing-0 rounded-lg overflow-hidden shadow-md" aria-label="Daftar Ajuan">
  <thead>
    <tr class="bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-400 text-black">
      <th class="text-left px-6 py-3 font-semibold text-sm">No</th>
      <th class="text-left px-6 py-3 font-semibold text-sm">Nama Mitra</th>
      <th class="text-left px-6 py-3 font-semibold text-sm">Sisa Hari</th>
      <th class="text-left px-6 py-3 font-semibold text-sm">Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach($kerjasamas as $kerjasama)
    <tr class="bg-white hover:bg-yellow-50 transition-colors duration-300 pointer-events-none">
      <td class="px-6 py-4 text-sm border-b border-gray-200">{{ $kerjasama->id_kerjasama ?? '-' }}</td>
      <td class="px-6 py-4 text-sm border-b border-gray-200">{{ $kerjasama->mitra->nama_mitra ?? '-' }}</td>
      <td class="px-6 py-4 text-sm border-b border-gray-200">
       @if($kerjasama->dokumen && $kerjasama->dokumen->tanggal_selesai)
        @php
          $tanggalSelesai = \Carbon\Carbon::parse($kerjasama->dokumen->tanggal_selesai);
          $sisaHariSigned = now()->diffInDays($tanggalSelesai, false);
        @endphp
        @if($sisaHariSigned > 0)
          {{ (int) $sisaHariSigned }} hari
        @else
          Selesai {{ $tanggalSelesai->format('Y-m-d') }}
        @endif
       @else
         -
       @endif
      </td>
      @php
          $status = strtolower($kerjasama->dokumen->status ?? '-');
          $tanggalSelesai = $kerjasama->dokumen->tanggal_selesai ?? null;
          $isSelesai = $tanggalSelesai ? now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($tanggalSelesai)) : false;

          // kalo lewat tanggal selesai berarti tidak aktif
          $finalStatus = $isSelesai ? 'tidak aktif' : $status;

          // warna button ny
          $warna = $finalStatus === 'aktif' ? 'green' : 'red';
      @endphp
      <td class="px-6 py-4 text-sm border-b border-gray-200">
          <div class="flex justify-center">
              <button class="bg-{{ $warna }}-600 hover:bg-yellow-500 text-white font-semibold px-4 py-1 rounded-md transition">
                  {{ $finalStatus }}
              </button>
          </div>
      </td>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

    <hr class="border-t-4 border-black mt-6" />
  </main>
</div>

</body>
</html>