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

<div class="flex flex-col flex-grow pl-80 min-h-screen pr-20 items-start text-left bg-gray-100">
  <h1 class="text-5xl font-extrabold text-gray-800 mb-6">
    STATUS KERJASAMA
  </h1>

  <main class="bg-white p-6 rounded-3xl w-full">

  <div class="mb-4 flex justify-end">
  <form method="GET" action="{{ route('kerjasama') }}" class="flex items-center gap-2">
    <input type="text" name="search" value="{{ request('search') }}"
      placeholder="Cari nama mitra..." class="px-4 py-2 border border-gray-300 rounded-md w-64 text-sm">
    <button type="submit"
      class="bg-yellow-400 text-black font-semibold px-4 py-2 rounded-md text-sm font-medium">
      <i class="fas fa-search"></i>
    </button>
  </form>
</div>

@if($kerjasamas->isEmpty() && request('search'))
  <div 
    x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 3000)"
    x-show="show"
    x-transition
    class="fixed top-4 right-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md shadow-lg z-50"
    role="alert">
    <span class="block sm:inline">Data dengan nama mitra <strong>"{{ request('search') }}"</strong> tidak ditemukan!.</span>
  </div>
@endif

    <table class="w-full border-separate border-spacing-0 rounded-lg overflow-hidden shadow-md" aria-label="Daftar Ajuan">
  <thead>
    <tr class="bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-400 text-black">
      <th class="w-[50px] text-left px-6 py-3 font-semibold text-sm">No Dokumen</th>
      <th class="w-[200px] text-left px-6 py-3 font-semibold text-sm">Nama Mitra</th>
      <th class="w-[200px] text-left px-6 py-3 font-semibold text-sm">Catatan</th>
      <th class="w-[150px] text-left px-6 py-3 font-semibold text-sm">Sisa Hari</th>
      <th class="w-[150px] text-center px-6 py-3 font-semibold text-sm">Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach($kerjasamas as $kerjasama)
    <tr class="bg-white hover:bg-yellow-50 transition-colors duration-300 pointer-events-none">
      <td class="text-center mr-2 text-sm border-b border-gray-200">
        {{ $kerjasama->pemohon->no_permohonan ?? '-' }}
      </td>
      <td class="px-6 py-4 text-sm border-b border-gray-200">{{ $kerjasama->mitra->nama_mitra ?? '-' }}</td>
      <td class="px-6 py-4 text-sm border-b border-gray-200">{{ $kerjasama->dokumen->catatan ?? '-' }}</td>
      <td class="px-6 py-4 text-sm border-b border-gray-200">
       @if($kerjasama->dokumen && $kerjasama->dokumen->tanggal_selesai)
        @php
          $tanggalSelesai = \Carbon\Carbon::parse($kerjasama->dokumen->tanggal_selesai);
          $sisaHari = now()->diffInDays($tanggalSelesai, false);
        @endphp
        @if($sisaHari > 0)
          {{ (int) $sisaHari }} hari
        @else
          Selesai
        @endif
       @else
         -
       @endif
      </td>
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
    </tr>
    @endforeach
  </tbody>
</table>

    <hr class="border-t-4 border-black mt-6" />
  </main>
</div>

</body>
</html>