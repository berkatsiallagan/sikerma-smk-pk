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
      <th class="text-left px-6 py-3 font-semibold text-sm">Jurusan</th>
      <th class="text-left px-6 py-3 font-semibold text-sm">Tahun</th>
      <th class="text-left px-6 py-3 font-semibold text-sm">Jenis</th>
      <th class="text-left px-6 py-3 font-semibold text-sm">Sisa Hari</th>
      <th class="text-left px-6 py-3 font-semibold text-sm">Status</th>
        <th class="text-left px-6 py-3 font-semibold text-sm">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($kerjasamas as $kerjasama)
    <tr class="bg-white hover:bg-yellow-50 transition-colors duration-300 cursor-pointer">
      <td class="px-6 py-4 text-sm border-b border-gray-200">{{ $kerjasama->id_kerjasama ?? '-' }}</td>
      <td class="px-6 py-4 text-sm border-b border-gray-200">{{ $kerjasama->mitra->nama_mitra ?? '-' }}</td>
      <td class="px-6 py-4 text-sm border-b border-gray-200">{{ $kerjasama->pemohon->jurusan->nama_jurusan ?? '-' }}</td>
      <td class="px-6 py-4 text-sm border-b border-gray-200">
        @if($kerjasama->dokumen && $kerjasama->dokumen->tanggal_mulai)
          {{ \Carbon\Carbon::parse($kerjasama->dokumen->tanggal_mulai)->format('Y') }}
        @else
          -
        @endif
      </td>
      @php
      $singkatan = [
        'Memorandum of Understanding (MoU)' => 'MoU',
        'Memorandum of Agreement (MoA)' => 'MoA',
      ];
      @endphp
      <td class="px-6 py-4 text-sm border-b border-gray-200">{{ $singkatan[$kerjasama->jenis_kerjasama] ?? $kerjasama->jenis_kerjasama ?? '-' }}</t>
      <td class="px-6 py-4 text-sm border-b border-gray-200">
       @if($kerjasama->dokumen && $kerjasama->dokumen->tanggal_selesai)
        @php
          $sisaHari = intval(\Carbon\Carbon::parse($kerjasama->dokumen->tanggal_selesai)->diffInDays(now()));
        @endphp
        {{ $sisaHari }} hari
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
      <td class="p-2 text-left">
        <div x-data="{ open: false }" class="flex flex-col space-y-1">
          <button @click="open = true" class="bg-gray-400 text-white px-1 py-0.5 rounded text-xs">
            Detail
          </button>

          <form action="{{ route('kerjasama.destroy', $kerjasama->id_kerjasama) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="flex flex-col space-y-1">
          @csrf
          @method('DELETE')
          <button type="submit" class="bg-red-400 text-white px-1 py-0.5 rounded text-xs">
            Hapus
          </button>
          </form>

          <!-- Popup Detail -->
          <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div @click.away="open = false" class="bg-white p-6 rounded-lg shadow-lg w-full max-w-2xl">
              <h2 class="text-center font-bold mb-4">Detail Kerjasama</h2>

              <!-- Pemohon -->
              <p><strong>No Pengajuan:</strong> {{ $kerjasama->pemohon->no_permohonan }}</p>
              <p><strong>Tanggal Pengajuan:</strong> {{ $kerjasama->ajuan->tanggal_ajuan }}</p>
              <p><strong>Nama Pengaju:</strong> {{ $kerjasama->pemohon->nama_pemohon }}</p>
              <p><strong>Nomor Telepon:</strong> {{ $kerjasama->pemohon->nomor_telp }}</p>

              <!-- Mitra -->
              <p><strong>Nama Mitra:</strong> {{ $kerjasama->mitra->nama_mitra }}</p>
              <p><strong>Lingkup:</strong> {{ $kerjasama->mitra->lingkup }}</p>
              <p><strong>Email Mitra:</strong> {{ $kerjasama->mitra->email }}</p>
              <p><strong>Website:</strong> {{ $kerjasama->mitra->website }}</p>

              <!-- Kerjasama -->
              <p><strong>Jenis Dokumen:</strong> {{ $kerjasama->jenis_kerjasama }}</p>

              <!-- Dokumen -->
              <p><strong>Tanggal Mulai:</strong> {{ $kerjasama->dokumen->tanggal_mulai }}</p>
              <p><strong>Tanggal Selesai:</strong> {{ $kerjasama->dokumen->tanggal_selesai }}</p>

              <div class="text-right mt-4">
                <button @click="open = false" class="bg-red-500 text-white px-4 py-2 rounded">Tutup</button>
              </div>
            </div>
          </div>
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