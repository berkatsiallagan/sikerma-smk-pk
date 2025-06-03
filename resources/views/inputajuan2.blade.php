<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sikerma Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="background-color : #212121" class="text-black font-sans">
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <x-sidebar />

    <div class="flex flex-col flex-grow p-8 items-start text-left bg-gray-100">
      <h1 class="text-5xl font-extrabold text-gray-800 mb-6">
        input 2
      </h1>

      <main class="bg-white p-6 rounded-3xl w-full">
        <form id="kerjasamaForm" method="POST" action="{{ route('save.step2') }}" class="space-y-4">
          @csrf
          <!-- Nama Mitra -->
          <div class="flex items-center gap-4">
            <label class="w-40 font-bold text-sm">Nama Mitra*</label>
            <input type="text" name="nama_mitra" placeholder="Masukkan nama mitra" required 
                   value="{{ old('nama_mitra', session('form_data.nama_mitra') }}"
                   class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600" />
          </div>

          <!-- Negara -->
          <div class="flex items-center gap-4">
            <label class="w-40 font-bold text-sm">Negara*</label>
            <select required name="negara" class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600">
              <option value="" disabled selected>Pilih Negara</option>
              <option value="Dalam Negeri" {{ old('negara', session('form_data.negara')) == 'Dalam Negeri' ? 'selected' : '' }}>Dalam Negeri</option>
              <option value="Luar Negeri" {{ old('negara', session('form_data.negara')) == 'Luar Negeri' ? 'selected' : '' }}>Luar Negeri</option>
            </select>
          </div>

          <!-- Website Institusi -->
          <div class="flex items-center gap-4">
            <label class="w-40 font-bold text-sm">Website Institusi</label>
            <input type="url" name="website" placeholder="https://contohwebsite.com" 
                   value="{{ old('website', session('form_data.website')) }}"
                   class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600" />
          </div>

          <!-- Email -->
          <div class="flex items-center gap-4">
            <label class="w-40 font-bold text-sm">Email*</label>
            <input type="email" name="email" placeholder="email@domain.com" required 
                   value="{{ old('email', session('form_data.email')) }}"
                   class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600" />
          </div>

          <!-- Jenis Kerjasama -->
          <div class="flex items-center gap-4">
            <label class="w-40 font-bold text-sm">Jenis Kerjasama*</label>
            <select required name="jenis_kerjasama" class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600">
              <option value="" disabled selected>Pilih Jenis Kerjasama</option>
              <option value="Memorandum of Understanding (MoU)" {{ old('jenis_kerjasama', session('form_data.jenis_kerjasama')) == 'Memorandum of Understanding (MoU)' ? 'selected' : '' }}>Memorandum of Understanding (MoU)</option>
              <option value="Memorandum of Agreement (MoA)" {{ old('jenis_kerjasama', session('form_data.jenis_kerjasama')) == 'Memorandum of Agreement (MoA)' ? 'selected' : '' }}>Memorandum of Agreement (MoA)</option>
            </select>
          </div>

          <div class="flex justify-between mt-6">
            <button type="button" onclick="window.location.href='/inputajuan1'" class="px-6 py-2 bg-gray-300 text-black font-bold rounded-lg hover:bg-gray-400 transition">
              <i class="fas fa-arrow-left mr-2"></i> Kembali
            </button>
            <button id="nextButton" type="submit" class="px-6 py-2 bg-amber-600 text-white font-bold rounded-lg hover:bg-amber-700 transition disabled:opacity-50">
              Selanjutnya <i class="fas fa-arrow-right ml-2"></i>
            </button>
          </div>
        </form>

        <hr class="border-t-4 border-black mt-6" />
      </main>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.getElementById('kerjasamaForm');
      const nextButton = document.getElementById('nextButton');
      
      // Form validation on input
      form.addEventListener('input', function() {
        const requiredInputs = form.querySelectorAll('[required]');
        let isValid = true;
        
        requiredInputs.forEach(input => {
          if (!input.value.trim()) {
            isValid = false;
          }
        });
        
        nextButton.disabled = !isValid;
      });
    });
  </script>
</body>
</html>