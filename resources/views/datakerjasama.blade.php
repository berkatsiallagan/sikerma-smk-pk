<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Data Kerjasana</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="https://unpkg.com/alpinejs" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body style="background-color : #212121" class="text-black font-sans">
  <div class="flex min-h-screen">

    <x-sidebar />

    <div class="flex flex-col flex-grow p-8 items-start text-left bg-gray-100">
      <h1 class="text-5xl font-extrabold text-gray-800 mb-6">
        DATA KERJASAMA
      </h1>

      <main class="bg-white p-6 rounded-3xl w-full">

        <!-- Search Bar -->
        <div class="flex justify-end mb-4">
          <form action="{{ route('data-kerjasama') }}" method="GET" class="flex items-center space-x-2">
            <input
              type="text"
              name="search"
              placeholder="Cari Mitra..."
              value="{{ request('search') }}"
              class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400" />
            <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold px-4 py-2 rounded-lg transition">
              <i class="fa fa-search"></i>
            </button>
          </form>
        </div>

        <table class="w-full border-separate border-spacing-0 rounded-lg overflow-hidden shadow-md" aria-label="Daftar Kerjasama">
        <thead>
          <tr class="bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-400 text-black">
            <th class="w-[70px] text-center font-semibold text-sm">No Dokumen</th>
            <th class="w-[170px] text-left px-4 py-3 font-semibold text-sm">Mitra</th>
            <th class="w-[150px] text-left px-4 py-3 font-semibold text-sm">Jurusan</th>
            <th class="w-[150px] text-left px-4 py-3 font-semibold text-sm">Bidang Kerjasama</th>
            <th class="w-[40px] text-left px-4 py-3 font-semibold text-sm">Pemohon</th>
            <th class="w-[70px] text-center px-4 py-3 font-semibold text-sm">Aksi</th>
          </tr>
        </thead>
          <tbody>
            @foreach($kerjasamas as $kerjasama)
            <tr class="bg-white">
              <td class="text-center mr-2 text-sm border-b border-gray-200">
              {{ $kerjasama->pemohon->no_permohonan ?? '-' }}
              </td>
              <td class="px-4 py-4 text-sm border-b border-gray-200">{{ $kerjasama->mitra->nama_mitra ?? '-' }}</td>
              @php
              $jurusanList = $kerjasama->pemohon && $kerjasama->pemohon->jurusans
              ? $kerjasama->pemohon->jurusans->pluck('nama_jurusan')->join(', ')
              : '';
              @endphp
              <td class="px-4 py-4 text-sm border-b border-gray-200">{{ $jurusanList ?: '-' }}</td>
              @php
              $bidangList = $kerjasama->pemohon && $kerjasama->pemohon->bidangs
              ? $kerjasama->pemohon->bidangs->pluck('nama_bidang')->join(', ')
              : '';
              @endphp
              <td class="px-4 py-4 text-sm border-b border-gray-200">{{ $bidangList ?: '-' }}</td>
              <td class="px-4 py-4 text-sm border-b border-gray-200">{{ $kerjasama->ajuan->pengguna->nama_lengkap ?? '-' }}</td>
              <td class="px-4 py-4 text-sm border-b border-gray-200">
                <div x-data="{ openDetail: false, openEdit: false }" class="flex justify-center">
                  <div class="flex flex-wrap gap-2">
                    <button @click="openEdit = true" class="bg-yellow-600 hover:bg-yellow-400 text-white rounded-md p-2 transition-colors">
                      <i class="fas fa-edit"></i>
                    </button>  
                    <button @click="openDetail = true" class="bg-blue-600 hover:bg-blue-400 text-white rounded-md p-2 transition-colors">
                      <i class="fas fa-list"></i>
                    </button>
                  </div>

                  <!-- Popup Detail -->
                  <div x-show="openDetail" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
                    <div @click.away="openDetail = false" class="bg-white rounded-xl shadow-2xl w-full max-w-3xl max-h-[90vh] overflow-y-auto">
                      <!-- Modal Header -->
                      <div class="sticky top-0 bg-white border-b p-6 flex justify-between items-center">
                        <h2 class="text-2xl font-bold text-gray-800">Detail Kerjasama</h2>
                        <button @click="openDetail = false" class="text-gray-500 hover:text-gray-700">
                          <i class="fas fa-times text-xl"></i>
                        </button>
                      </div>
                      
                      <!-- Modal Content -->
                      <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-4">
                          <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="font-semibold text-lg text-yellow-600 mb-3 border-b pb-2">Informasi Kerjasama</h3>
                            <div class="space-y-3">
                              <div>
                                <p class="text-sm font-medium text-gray-500">No Dokumen</p>
                                <p class="font-semibold">{{ $kerjasama->pemohon->no_permohonan ?? '-' }}</p>
                              </div>
                              <div>
                                <p class="text-sm font-medium text-gray-500">Jenis Dokumen</p>
                                <p class="font-semibold">{{ $kerjasama->jenis_kerjasama ?? '-' }}</p>
                              </div>
                              <div>
                                <p class="text-sm font-medium text-gray-500">Tanggal Pengajuan</p>
                                <p class="font-semibold">
                                  @if($kerjasama->ajuan->tanggal_ajuan ?? false)
                                    {{ \Carbon\Carbon::parse($kerjasama->ajuan->tanggal_ajuan)->format('d-M-Y') }}
                                  @else
                                    -
                                  @endif
                                </p>
                              </div>
                              <div>
                              <p class="text-sm font-medium text-gray-500">Masa Berlaku</p>
                              <p class="font-semibold">
                                @if($kerjasama->dokumen->tanggal_mulai ?? false)
                                  {{ \Carbon\Carbon::parse($kerjasama->dokumen->tanggal_mulai)->format('d-M-Y') }} 
                                  <span class="mx-2">s/d</span> 
                                  {{ \Carbon\Carbon::parse($kerjasama->dokumen->tanggal_selesai)->format('d-M-Y') }}
                                @else
                                  -
                                @endif
                              </p>
                            </div>
                            </div>
                          </div>

                          <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="font-semibold text-lg text-yellow-600 mb-3 border-b pb-2">Bidang Kerjasama</h3>
                            <div class="space-y-3">
                              <div>
                                <p class="text-sm font-medium text-gray-500">Jurusan Terkait</p>
                                <p class="font-semibold">
                                  @if($kerjasama->pemohon && $kerjasama->pemohon->jurusans->isNotEmpty())
                                    {{ $kerjasama->pemohon->jurusans->pluck('nama_jurusan')->join(', ') }}
                                  @else
                                    -
                                  @endif
                                </p>
                              </div>
                              <div>
                                <p class="text-sm font-medium text-gray-500">Bidang Kerjasama</p>
                                <p class="font-semibold">
                                  @if($kerjasama->pemohon && $kerjasama->pemohon->bidangs->isNotEmpty())
                                    {{ $kerjasama->pemohon->bidangs->pluck('nama_bidang')->join(', ') }}
                                  @else
                                    -
                                  @endif
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-4">
                          <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="font-semibold text-lg text-yellow-600 mb-3 border-b pb-2">Informasi Pemohon</h3>
                            <div class="space-y-3">
                              <div>
                                <p class="text-sm font-medium text-gray-500">Nama Pemohon</p>
                                <p class="font-semibold">{{ $kerjasama->pemohon->nama_pemohon ?? $kerjasama->ajuan->pengguna->nama_lengkap ?? '-' }}</p>
                              </div>
                              <div>
                                <p class="text-sm font-medium text-gray-500">Nomor Telepon</p>
                                <p class="font-semibold">{{ $kerjasama->pemohon->nomor_telp ?? '-' }}</p>
                              </div>
                            </div>
                          </div>

                          <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="font-semibold text-lg text-yellow-600 mb-3 border-b pb-2">Informasi Mitra</h3>
                            <div class="space-y-3">
                              <div>
                                <p class="text-sm font-medium text-gray-500">Nama Mitra</p>
                                <p class="font-semibold">{{ $kerjasama->mitra->nama_mitra ?? '-' }}</p>
                              </div>
                              <div>
                                <p class="text-sm font-medium text-gray-500">Lingkup</p>
                                <p class="font-semibold">{{ $kerjasama->mitra->lingkup ?? '-' }}</p>
                              </div>
                              <div>
                                <p class="text-sm font-medium text-gray-500">Email</p>
                                <p class="font-semibold">{{ $kerjasama->mitra->email ?? '-' }}</p>
                              </div>
                              <div>
                                <p class="text-sm font-medium text-gray-500">Website</p>
                                <p class="font-semibold">
                                  @if($kerjasama->mitra->website ?? false)
                                    <a href="{{ $kerjasama->mitra->website }}" target="_blank" class="text-blue-600 hover:underline">
                                      {{ $kerjasama->mitra->website }}
                                    </a>
                                  @else
                                    -
                                  @endif
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Modal Footer -->
                      <div class="sticky bottom-0 bg-white border-t p-4 flex justify-end space-x-3">
                        <form action="{{ route('kerjasama.destroy', $kerjasama->id_kerjasama) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition">
                            <i class="fas fa-trash-alt mr-2"></i> Hapus
                          </button>
                        </form>
                        <button @click="openDetail = false" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition">
                          <i class="fas fa-times mr-2"></i> Tutup
                        </button>
                      </div>
                    </div>
                  </div>

                  <!-- Popup Edit -->
                  <div x-show="openEdit" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
                    <div @click.away="openEdit = false" class="bg-white rounded-xl shadow-2xl w-full max-w-3xl max-h-[90vh] overflow-y-auto">
                      <!-- Modal Header -->
                      <div class="sticky top-0 bg-white border-b p-6 flex justify-between items-center">
                        <h2 class="text-2xl font-bold text-gray-800">Edit Kerjasama</h2>
                        <button @click="openEdit = false" class="text-gray-500 hover:text-gray-700">
                          <i class="fas fa-times text-xl"></i>
                        </button>
                      </div>
                      
                      <!-- Modal Content -->
                      <!-- <form action="{{ route('kerjasama.update', $kerjasama->id_kerjasama) }}" method="POST" class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6"> -->
                      <form action="" method="POST" class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        @csrf
                        @method('PUT')
                        
                        <!-- Left Column -->
                        <div class="space-y-4">
                          <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="font-semibold text-lg text-yellow-600 mb-3 border-b pb-2">Informasi Kerjasama</h3>
                            <div class="space-y-3">
                              <div>
                                <label class="text-sm font-medium text-gray-500">No Dokumen</label>
                                <input type="text" name="no_permohonan" value="{{ $kerjasama->pemohon->no_permohonan ?? '' }}" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-gray-100 cursor-not-allowed" readonly>
                              </div>
                              <div>
                                <label class="text-sm font-medium text-gray-500">Jenis Dokumen</label>
                                <select name="jenis_kerjasama" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                  <option value="MOU" {{ $kerjasama->jenis_kerjasama == 'MOU' ? 'selected' : '' }}>MOU</option>
                                  <option value="MOA" {{ $kerjasama->jenis_kerjasama == 'MOA' ? 'selected' : '' }}>MOA</option>
                                </select>
                              </div>
                              <div>
                                <label class="text-sm font-medium text-gray-500">Tanggal Pengajuan</label>
                                <input type="date" name="tanggal_ajuan" 
                                  value="{{ $kerjasama->ajuan->tanggal_ajuan ?? '' }}" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-gray-100 cursor-not-allowed" readonly>
                              </div>
                              <div class="grid grid-cols-2 gap-2">
                                <div>
                                  <label class="text-sm font-medium text-gray-500">Tanggal Mulai</label>
                                  <input type="date" name="tanggal_mulai" 
                                    value="{{ $kerjasama->dokumen->tanggal_mulai ?? '' }}" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                </div>
                                <div>
                                  <label class="text-sm font-medium text-gray-500">Tanggal Selesai</label>
                                  <input type="date" name="tanggal_selesai" 
                                    value="{{ $kerjasama->dokumen->tanggal_selesai ?? '' }}" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="font-semibold text-lg text-yellow-600 mb-3 border-b pb-2">Bidang Kerjasama</h3>
                            <div class="space-y-3">
                              <div>
                                <label class="text-sm font-medium text-gray-500">Jurusan Terkait</label>
                                <select name="jurusans[]" multiple class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                  @foreach($allJurusans as $jurusan)
                                    <option value="{{ $jurusan->id_jurusan }}" 
                                      {{ $kerjasama->pemohon && $kerjasama->pemohon->jurusans->contains($jurusan->id_jurusan) ? 'selected' : '' }}>
                                      {{ $jurusan->nama_jurusan }}
                                    </option>
                                  @endforeach
                                </select>
                              </div>
                              <div>
                                <label class="text-sm font-medium text-gray-500">Bidang Kerjasama</label>
                                <select name="bidangs[]" multiple class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                  @foreach($allBidangs as $bidang)
                                    <option value="{{ $bidang->id_bidang }}" 
                                      {{ $kerjasama->pemohon && $kerjasama->pemohon->bidangs->contains($bidang->id_bidang) ? 'selected' : '' }}>
                                      {{ $bidang->nama_bidang }}
                                    </option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-4">
                          <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="font-semibold text-lg text-yellow-600 mb-3 border-b pb-2">Informasi Pemohon</h3>
                            <div class="space-y-3">
                              <div>
                                <label class="text-sm font-medium text-gray-500">Nama Pemohon</label>
                                <input type="text" name="nama_pemohon" 
                                  value="{{ $kerjasama->pemohon->nama_pemohon ?? $kerjasama->ajuan->pengguna->nama_lengkap ?? '' }}" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400">
                              </div>
                              <div>
                                <label class="text-sm font-medium text-gray-500">Nomor Telepon</label>
                                <input type="text" name="nomor_telp" 
                                  value="{{ $kerjasama->pemohon->nomor_telp ?? '' }}" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400">
                              </div>
                            </div>
                          </div>

                          <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="font-semibold text-lg text-yellow-600 mb-3 border-b pb-2">Informasi Mitra</h3>
                            <div class="space-y-3">
                              <div>
                                <label class="text-sm font-medium text-gray-500">Nama Mitra</label>
                                <input type="text" name="nama_mitra" 
                                  value="{{ $kerjasama->mitra->nama_mitra ?? '' }}" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400">
                              </div>
                              <div>
                                <label class="text-sm font-medium text-gray-500">Lingkup</label>
                                <select name="lingkup" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                  <option value="Nasional" {{ ($kerjasama->mitra->lingkup ?? '') == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                                  <option value="Internasional" {{ ($kerjasama->mitra->lingkup ?? '') == 'Internasional' ? 'selected' : '' }}>Internasional</option>
                                </select>
                              </div>
                              <div>
                                <label class="text-sm font-medium text-gray-500">Email</label>
                                <input type="email" name="email" 
                                  value="{{ $kerjasama->mitra->email ?? '' }}" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400">
                              </div>
                              <div>
                                <label class="text-sm font-medium text-gray-500">Website</label>
                                <input type="url" name="website" 
                                  value="{{ $kerjasama->mitra->website ?? '' }}" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400">
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="sticky bottom-0 bg-white border-t p-4 flex justify-end space-x-3 col-span-full">
                          <button type="button" @click="openEdit = false" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition">
                            <i class="fas fa-times mr-2"></i> Batal
                          </button>
                          <button type="submit" class="flex items-center px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white rounded-lg transition">
                            <i class="fas fa-save mr-2"></i> Simpan Perubahan
                          </button>
                        </div>
                      </form>
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