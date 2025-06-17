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
    DATA KERJASAMA
  </h1>

  <main class="bg-white p-6 rounded-3xl w-full">

    <table class="w-full border-separate border-spacing-0 rounded-lg overflow-hidden shadow-md" aria-label="Daftar Ajuan">
  <thead>
    <tr class="bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-400 text-black">
      <th class="text-left px-6 py-3 font-semibold text-sm">No</th>
      <th class="text-left px-6 py-3 font-semibold text-sm">Mitra</th>
      <th class="text-left px-6 py-3 font-semibold text-sm">Bidang Kerjasama</th>
      <th class="text-left px-6 py-3 font-semibold text-sm">Tanggal Mulai</th>
      <th class="text-left px-6 py-3 font-semibold text-sm">Tanggal Selesai</th>
      <th class="text-center px-6 py-3 font-semibold text-sm">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($kerjasamas as $kerjasama)
    <tr class="bg-white hover:bg-yellow-50 transition-colors duration-300 cursor-pointer">
      <td class="px-6 py-4 text-sm border-b border-gray-200">{{ $kerjasama->id_kerjasama ?? '-' }}</td>
      <td class="px-6 py-4 text-sm border-b border-gray-200">{{ $kerjasama->mitra->nama_mitra ?? '-' }}</td>
      @php
        $bidangList = $kerjasama->pemohon && $kerjasama->pemohon->bidangs
            ? $kerjasama->pemohon->bidangs->pluck('nama_bidang')->join(', ')
            : '';
      @endphp
      <td class="px-6 py-4 text-sm border-b border-gray-200">{{ $bidangList ?: '-' }}</td>
      <td class="px-6 py-4 text-sm border-b border-gray-200">
      @if($kerjasama->dokumen && $kerjasama->dokumen->tanggal_mulai)
        {{ \Carbon\Carbon::parse($kerjasama->dokumen->tanggal_mulai)->format('Y-m-d') }}
      @else
         -
      @endif
      </t>
      <td class="px-6 py-4 text-sm border-b border-gray-200">
       @if($kerjasama->dokumen && $kerjasama->dokumen->tanggal_selesai)
        {{ \Carbon\Carbon::parse($kerjasama->dokumen->tanggal_selesai)->format('Y-m-d') }}
       @else
         -
       @endif
      </td>
      <td class="px-6 py-4 text-sm border-b border-gray-200">
        <div x-data="{ open: false }" class="flex flex-col space-y-1">
          <button @click="open = true" class="bg-gray-400 hover:bg-yellow-500 text-white font-semibold px-4 py-1 rounded-md transition">
            Detail
          </button>

          <!-- Popup Detail -->
          <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div @click.away="open = false" class="bg-white p-6 rounded-lg shadow-lg w-full max-w-2xl">
              <h2 class="text-center font-bold mb-4">Detail Kerjasama</h2>

              
              <!-- Pemohon -->
              <div class="space-y-3 text-[16px] leading-relaxed">
              <div class="flex">
                <p class="w-1/3 font-semibold">No Kerjasama</p>
                <p>: {{ $kerjasama->pemohon->no_permohonan }}</p>
              </div>
              <div class="flex">
                <p class="w-1/3 font-semibold">Tanggal Pengajuan</p>
                <p>: {{ $kerjasama->ajuan->tanggal_ajuan }}</p>
              </div>
              <div class="flex">
                <p class="w-1/3 font-semibold">Nama Pemohon</p>
                <p>: {{ $kerjasama->pemohon->nama_pemohon }}</p>
              </div>
              <div class="flex">
                <p class="w-1/3 font-semibold">Nomor Telepon</p>
                <p>: {{ $kerjasama->pemohon->nomor_telp }}</p>
              </div>
              <div class="flex">
                <p class="w-1/3 font-semibold">Mitra</p>
                <p>: {{ $kerjasama->mitra->nama_mitra }}</p>
              </div>
              <div class="flex">
                <p class="w-1/3 font-semibold">Lingkup</p>
                <p>: {{ $kerjasama->mitra->lingkup }}</p>
              </div>
              <div class="flex">
                <p class="w-1/3 font-semibold">Email Mitra</p>
                <p>: {{ $kerjasama->mitra->email }}</p>
              </div>
              <div class="flex">
                <p class="w-1/3 font-semibold">Website</p>
                <p>: {{ $kerjasama->mitra->website }}</p>
              </div>
              <div class="flex">
                <p class="w-1/3 font-semibold">Bidang Kerjasama</p>
                <p>:
                  @if($kerjasama->pemohon && $kerjasama->pemohon->bidangs->isNotEmpty())
                    {{ $kerjasama->pemohon->bidangs->pluck('nama_bidang')->join(', ') }}
                  @else
                    -
                  @endif
                </p>
              </div>
              <div class="flex">
                <p class="w-1/3 font-semibold">Jenis Dokumen</p>
                <p>: {{ $kerjasama->jenis_kerjasama }}</p>
              </div>
              <div class="flex">
                <p class="w-1/3 font-semibold">Tanggal Mulai</p>
                <p>: {{ $kerjasama->dokumen->tanggal_mulai }}</p>
              </div>
              <div class="flex">
                <p class="w-1/3 font-semibold">Tanggal Selesai</p>
                <p>: {{ $kerjasama->dokumen->tanggal_selesai }}</p>
              </div>
          </div>

          <div class="flex justify-end space-x-2 mt-4">
            <form action="{{ route('kerjasama.destroy', $kerjasama->id_kerjasama) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
            @csrf
            @method('DELETE')
              <button type="submit" class="bg-red-400 text-white px-3 py-1 rounded text-sm">
                Hapus
              </button>
            </form>

            <button @click="open = false" class="bg-gray-400 text-white px-3 py-1 rounded text-sm">
              Tutup
            </button>
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