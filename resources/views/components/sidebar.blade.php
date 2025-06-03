<div class="w-60 bg-amber-600 flex flex-col justify-between">
  <div>
    <div class="bg-[#4a1a05] text-white font-bold text-sm px-6 py-4 select-none flex items-center justify-center gap-2">
      <img src="Sekaju.png" alt="Logo Sikerma" class="w-8 h-8" />
      SIKERMA
    </div>
    <div class="bg-yellow-500 px-6 py-4 flex items-center gap-3">
      <div class="w-8 h-8 border-2 border-black rounded-full flex items-center justify-center text-black bg-white text-lg shrink-0">
        <i class="fas fa-user"></i>
      </div>
      <div class="flex flex-col text-xs leading-tight">
        <strong class="text-sm font-bold">Nama Pengguna</strong>
        <span class="text-[#3a2a0a]">Jurusan Informatika</span>
      </div>
    </div>
    <nav class="mt-2">
      <a href="/dashboard" class="flex items-center gap-3 px-6 py-3 font-bold text-sm text-black hover:bg-yellow-500 transition">
        <i class="fas fa-tachometer-alt w-5 text-center"></i> Dashboard
      </a>
      <a href="/datapengajuan" class="flex items-center gap-3 px-6 py-3 font-bold text-sm text-black hover:bg-yellow-500 transition">
        <i class="fas fa-check-square w-5 text-center"></i> Data Pengajuan
      </a>
      <a href="/inputajuan1" class="flex items-center gap-3 px-6 py-3 font-bold text-sm text-black hover:bg-yellow-500 transition">
        <i class="fas fa-check-square w-5 text-center"></i> Tambah Pengajuan
      </a>
      <a href="/status" class="flex items-center gap-3 px-6 py-3 font-bold text-sm text-black hover:bg-yellow-500 transition">
        <i class="fas fa-chart-bar w-5 text-center"></i> Status Kerjasama
      </a>
        <a href="#" class="flex items-center gap-3 px-6 py-3 font-bold text-sm text-black hover:bg-yellow-500 transition">
            <i class="fas fa-chart-bar w-5 text-center"></i> Kelola Jurusan
        </a>
      <a href="/arsipPengajuan" class="flex items-center gap-3 px-6 py-3 font-bold text-sm text-black hover:bg-yellow-500 transition">
        <i class="fas fa-archive w-5 text-center"></i> Arsip Dokumen
      </a>

    </nav>
  </div>
  <!-- Logout button -->
  <div class="p-6">
    <form id="logoutForm" action="{{ route('logout') }}" method="GET">
      <button type="button" onclick="confirmLogout()"
        class="flex items-center gap-3 px-4 py-2 bg-[#4a1a05] text-white rounded hover:bg-red-800 transition text-sm font-bold justify-center w-full">
        <i class="fas fa-sign-out-alt"></i> Keluar
      </button>
    </form>
  </div>
</div>

<!-- SweetAlert2 script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function confirmLogout() {
    Swal.fire({
      title: 'Yakin ingin keluar?',
      text: "Anda akan keluar dari sesi administrator.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#aaa',
      confirmButtonText: 'Ya, Keluar',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('logoutForm').submit();
      }
    });
  }
</script>