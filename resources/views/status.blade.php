<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sikerma Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
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
      <th class="text-left px-6 py-3 font-semibold text-sm">No. Dokumen</th>
      <th class="text-left px-6 py-3 font-semibold text-sm">Nama Mitra</th>
      <th class="text-left px-6 py-3 font-semibold text-sm">Tahun</th>
      <th class="text-left px-6 py-3 font-semibold text-sm">Tanggal Mulai</th>
      <th class="text-left px-6 py-3 font-semibold text-sm">Tanggal Selesai</th>
      <th class="text-left px-6 py-3 font-semibold text-sm">Sisa Hari</th>
      <th class="text-left px-6 py-3 font-semibold text-sm">Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach($kerjasamas as $kerjasama)
    <tr class="bg-white hover:bg-yellow-50 transition-colors duration-300 cursor-pointer">
      <td class="px-6 py-4 text-sm border-b border-gray-200">{{ $kerjasama->dokumen->no_dokumen ?? '-' }}</td>
      <td class="px-6 py-4 text-sm border-b border-gray-200">{{ $kerjasama->mitra->nama_mitra ?? '-' }}</td>
      <td class="px-6 py-4 text-sm border-b border-gray-200">
        @if($kerjasama->dokumen && $kerjasama->dokumen->tanggal_mulai)
          {{ \Carbon\Carbon::parse($kerjasama->dokumen->tanggal_mulai)->format('Y') }}
        @else
          -
        @endif
      </td>
      <td class="px-6 py-4 text-sm border-b border-gray-200">{{ $kerjasama->dokumen->tanggal_mulai ?? '-' }}</td>
      <td class="px-6 py-4 text-sm border-b border-gray-200">{{ $kerjasama->dokumen->tanggal_selesai ?? '-' }}</td>
      <td class="px-6 py-4 text-sm border-b border-gray-200">
        @if($kerjasama->dokumen && $kerjasama->dokumen->tanggal_selesai)
          @php
            $sisaHari = \Carbon\Carbon::parse($kerjasama->dokumen->tanggal_selesai)->diffInDays(now());
            echo $sisaHari . ' hari';
          @endphp
        @else
          -
        @endif
      </td>
      <td class="px-6 py-4 text-sm border-b border-gray-200">
        <div class="flex flex-wrap gap-2">
          <button class="bg-{{ ($kerjasama->dokumen->status ?? '') == 'AKTIF' ? 'green' : 'red' }}-400 hover:bg-yellow-500 text-black font-semibold px-4 py-1 rounded-md transition">
            {{ $kerjasama->dokumen->status ?? '-' }}
          </button>
        </div>
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