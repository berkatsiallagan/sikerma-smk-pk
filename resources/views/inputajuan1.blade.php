<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sikerma Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="background-color: #212121" class="text-black font-sans">
  <div class="flex min-h-screen">
    <x-sidebar />

    <div class="flex flex-col flex-grow p-4 md:p-8 items-start text-left bg-gray-100">
      <h1 class="text-3xl md:text-5xl font-extrabold text-gray-800 mb-6">
        Pengajuan Kerjasama
      </h1>

      <main class="bg-white p-4 md:p-6 rounded-3xl w-full shadow-md">
        <!-- Form Section -->
        <form id="step1Form" method="POST" action="{{ route('save.step1') }}" class="space-y-6">
          @csrf
          <h2 class="text-xl md:text-2xl font-bold text-gray-800">Data Pemohon</h2>
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
            <!-- Nomor Pemohonan (auto generated) -->
            <div class="col-span-1">
              <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Pemohonan</label>
              <input type="text" name="no_permohonan" value="{{ old('no_permohonan', 'PMH1-PHM' . str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT)) }}" readonly 
                     class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed">
            </div>
            
            <!-- Tanggal Pengajuan (auto generated) -->
            <div class="col-span-1">
              <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pengajuan</label>
              <input type="date" name="tanggal_pengajuan" value="{{ date('Y-m-d') }}" readonly 
                     class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed">
            </div>
            
            <!-- Nama Pemohon -->
            <div class="col-span-1">
              <label for="namaPemohon" class="block text-sm font-medium text-gray-700 mb-1 required-field">Nama Pemohon</label>
              <input type="text" required id="namaPemohon" name="nama_pemohon" placeholder="Masukkan nama lengkap" value="{{ old('nama_pemohon') }}"
                     class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
            </div>
            
            <!-- No. HP -->
            <div class="col-span-1">
              <label for="noHpPemohon" class="block text-sm font-medium text-gray-700 mb-1 required-field">No. HP</label>
              <input type="tel" required id="noHpPemohon" name="no_hp" placeholder="0812-3456-7890" value="{{ old('no_hp') }}"
                     class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
            </div>
            
            <!-- Jurusan Pemohon (Checkbox) -->
            <div class="col-span-2">
              <label class="block text-sm font-medium text-gray-700 mb-2 required-field">Jurusan Pemohon</label>
              <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
                @foreach($jurusans as $jurusan)
                <div class="flex items-center">
                  <input id="jurusan-{{ $jurusan->id }}" name="jurusans[]" type="checkbox" value="{{ $jurusan->id }}" class="w-4 h-4 text-amber-600 border-gray-300 rounded focus:ring-amber-500"
                         {{ in_array($jurusan->id, old('jurusans', [])) ? 'checked' : '' }}>
                  <label for="jurusan-{{ $jurusan->id }}" class="ml-2 text-sm text-gray-700">{{ $jurusan->nama_jurusan }}</label>
                </div>
                @endforeach
              </div>
              <p id="jurusan-error" class="mt-1 text-sm text-red-600 hidden">Pilih minimal satu jurusan</p>
            </div>
          </div>
        
          <!-- Navigation Buttons -->
          <div class="flex flex-col-reverse sm:flex-row justify-end mt-8 gap-3">
            <button type="button" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 transition">
              <i class="fas fa-times mr-2"></i>Batal
            </button>
            <button type="submit" id="nextButton" class="px-6 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center">
              Selanjutnya <i class="fas fa-arrow-right ml-2"></i>
            </button>
          </div>
        </form>

        <hr class="border-t-2 border-gray-300 mt-6" />
      </main>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Form elements
      const form = document.getElementById('step1Form');
      const formElements = {
        namaPemohon: document.getElementById('namaPemohon'),
        noHpPemohon: document.getElementById('noHpPemohon'),
        jurusanCheckboxes: document.querySelectorAll('input[name="jurusans[]"]'),
        jurusanError: document.getElementById('jurusan-error'),
        nextButton: document.getElementById('nextButton')
      };

      // Validate form function
      function validateForm() {
        let isValid = true;
        
        // Validate text fields
        if (!formElements.namaPemohon.value.trim()) {
          isValid = false;
        }
        
        if (!formElements.noHpPemohon.value.trim()) {
          isValid = false;
        }
        
        // Validate at least one jurusan is selected
        let jurusanSelected = false;
        formElements.jurusanCheckboxes.forEach(checkbox => {
          if (checkbox.checked) jurusanSelected = true;
        });
        
        if (!jurusanSelected) {
          formElements.jurusanError.classList.remove('hidden');
          isValid = false;
        } else {
          formElements.jurusanError.classList.add('hidden');
        }
        
        // Update button state
        formElements.nextButton.disabled = !isValid;
      }

      // Add event listeners
      formElements.namaPemohon.addEventListener('input', validateForm);
      formElements.noHpPemohon.addEventListener('input', validateForm);
      formElements.jurusanCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', validateForm);
      });

      // Format phone number input
      formElements.noHpPemohon.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 12) value = value.substring(0, 12);
        
        // Format as 0812-3456-7890
        if (value.length > 4) {
          value = value.substring(0,4) + '-' + value.substring(4);
        }
        if (value.length > 9) {
          value = value.substring(0,9) + '-' + value.substring(9);
        }
        
        e.target.value = value;
      });
    });
  </script>
</body>
</html>