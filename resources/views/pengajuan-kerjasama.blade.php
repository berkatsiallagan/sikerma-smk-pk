<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Pengajuan Kerjasama</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
  <style>
    .form-section {
      display: none;
    }
    .form-section.current {
      display: block;
    }
    .parsley-errors-list {
      color: red;
    }
    .step-indicator {
      transition: all 0.3s ease;
    }
    .step-indicator.active {
      background-color: #d97706;
      color: white;
    }
    .required-field:after {
      content: " *";
      color: red;
    }
  </style>
</head>
<body style="background-color: #212121" class="text-black font-sans">
  <div class="flex min-h-screen">

    <x-sidebar />

    <div class="flex flex-col flex-grow p-4 md:p-8 items-start text-left bg-gray-100">
      <h1 class="text-3xl md:text-5xl font-extrabold text-gray-800 mb-6">
        Pengajuan Kerjasama
      </h1>

      @if(session('success'))
        <div class="mb-6 w-full p-4 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
      @endif
      @if($errors->any())
        <div class="mb-6 w-full p-4 bg-red-100 text-red-800 rounded">
          <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <main class="bg-white p-4 md:p-6 rounded-3xl w-full shadow-md">
        <!-- Step Indicators -->
        <div class="flex justify-between mb-8">
          <div class="step-indicator step0 text-center px-4 py-2 rounded-lg border border-gray-300 w-1/3 mx-1 active">
            <i class="fas fa-user mr-2"></i>Data Pemohon
          </div>
          <div class="step-indicator step1 text-center px-4 py-2 rounded-lg border border-gray-300 w-1/3 mx-1">
            <i class="fas fa-handshake mr-2"></i>Data Mitra
          </div>
          <div class="step-indicator step2 text-center px-4 py-2 rounded-lg border border-gray-300 w-1/3 mx-1">
            <i class="fas fa-file-upload mr-2"></i>Upload Dokumen
          </div>
        </div>

        <form id="kerjasamaForm" method="POST" action="{{ route('pengajuan-kerjasama.store') }}" enctype="multipart/form-data" class="space-y-6">
          @csrf

          <!-- Step 1: Data Pemohon -->
          <div class="form-section current" id="step1">
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">Data Pemohon</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
              <!-- Nomor Pemohonan -->
              <div class="col-span-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Dokumen</label>
                <input type="text" name="no_permohonan" value="{{ $newNumber }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed" readonly>
              </div>
              
              <!-- Tanggal Pengajuan -->
              <div class="col-span-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pengajuan</label>
                <!-- Tampilan format d-M-Y (hanya teks) -->
                <div class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100">
                  {{ now()->format('d-M-Y') }}
                </div>
                <!-- Input asli (tersembunyi, format Y-m-d) -->
                <input type="hidden" name="tanggal_ajuan" value="{{ now()->format('Y-m-d') }}">
              </div>
              
              <!-- Nama Pemohon -->
              <div class="col-span-1">
                <label class="block text-sm font-medium text-gray-700 mb-1 required-field">Nama Pemohon</label>
                <input type="text" required name="nama_pemohon" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
              </div>
              
              <!-- No. HP -->
              <div class="col-span-1">
                <label class="block text-sm font-medium text-gray-700 mb-1 required-field">No. HP</label>
                <input type="tel" required name="nomor_telp" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
              </div>
              
              <!-- Jurusan Pemohon -->
              <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2 required-field">Jurusan Pemohon</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
                  @foreach($jurusans as $jurusan)
                    <label class="flex items-center">
                      <input name="jurusans[]" type="checkbox" value="{{ $jurusan->id_jurusan }}" 
                            {{ in_array($jurusan->id_jurusan, old('jurusans', [])) ? 'checked' : '' }}
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                      <span class="ml-2">{{ $jurusan->nama_jurusan }}</span>
                    </label>
                  @endforeach
                </div>
                @error('jurusans')
                  <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p id="jurusan-error" class="mt-1 text-sm text-red-600 hidden">Pilih minimal satu jurusan</p>
              </div>
            </div>
          </div>

          <!-- Step 2: Data Mitra -->
          <div class="form-section" id="step2">
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">Data Mitra</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
              <!-- Nama Mitra -->
              <div class="col-span-1">
                <label class="block text-sm font-medium text-gray-700 mb-1 required-field">Nama Mitra</label>
                <input type="text" required name="nama_mitra" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
              </div>
              
              <!-- Negara -->
              <div class="col-span-1">
                <label class="block text-sm font-medium text-gray-700 mb-1 required-field">Negara</label>
                <select name="lingkup" required 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                  <option value="">Pilih Negara</option>
                  <option value="Nasional">Nasional</option>
                  <option value="Internasional">Internasional</option>
                </select>
              </div>
              
              <!-- Website -->
              <div class="col-span-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Website</label>
                <input type="url" name="website" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
              </div>
              
              <!-- Email -->
              <div class="col-span-1">
                <label class="block text-sm font-medium text-gray-700 mb-1 required-field">Email</label>
                <input type="email" required name="email" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
              </div>
              
              <!-- Jenis Kerjasama -->
              <div class="col-span-1">
                <label class="block text-sm font-medium text-gray-700 mb-1 required-field">Jenis Kerjasama</label>
                <select name="jenis_kerjasama" required 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                  <option value="">Pilih Jenis</option>
                  <option value="Memorandum of Understanding (MoU)">MoU</option>
                  <option value="Memorandum of Agreement (MoA)">MoA</option>
                </select>
              </div>
              
              <!-- Bidang Pemohon -->
              <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2 required-field">Bidang Pemohon</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
                  @foreach($bidangs as $bidang)
                    <label class="flex items-center">
                      <input name="bidangs[]" type="checkbox" value="{{ $bidang->id_bidang }}" 
                            {{ in_array($bidang->id_bidang, old('bidangs', [])) ? 'checked' : '' }}
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                      <span class="ml-2">{{ $bidang->nama_bidang }}</span>
                    </label>
                  @endforeach
                </div>
                @error('bidangs')
                  <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p id="bidang-error" class="mt-1 text-sm text-red-600 hidden">Pilih minimal satu bidang</p>
              </div>
            </div>
          </div>

          <!-- Step 3: Upload Dokumen -->
          <div class="form-section" id="step3">
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">Upload Dokumen</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
              <!-- Tanggal Mulai -->
              <div class="col-span-1">
                <label class="block text-sm font-medium text-gray-700 mb-1 required-field">Tanggal Mulai</label>
                <input type="date" required name="tanggal_mulai" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
              </div>
              
              <!-- Tanggal Selesai -->
              <div class="col-span-1">
                <label class="block text-sm font-medium text-gray-700 mb-1 required-field">Tanggal Selesai</label>
                <input type="date" required name="tanggal_selesai" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
              </div>
              
              <!-- Catatan -->
              <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Catatan</label>
                <textarea name="catatan" rows="3" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500"></textarea>
              </div>
              
              <!-- Draft PKS -->
              <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1 required-field">Draft PKS</label>
                <input type="file" required name="dokumen" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                <p class="text-sm text-gray-600 mt-1">Format file: PDF, DOC, DOCX (max 2MB)</p>
              </div>
            </div>
          </div>

          <!-- Navigation Buttons -->
          <div class="flex justify-between mt-8">
            <button type="button" class="previous px-6 py-2 bg-gray-300 text-black font-bold rounded-lg hover:bg-gray-400 transition">
              <i class="fas fa-arrow-left mr-2"></i> Kembali
            </button>
            <button type="button" class="next px-6 py-2 bg-amber-600 text-white font-bold rounded-lg hover:bg-amber-700 transition">
              Selanjutnya <i class="fas fa-arrow-right ml-2"></i>
            </button>
            <button type="submit" class="submit px-6 py-2 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 transition hidden">
              Selesai <i class="fas fa-check ml-2"></i>
            </button>
            <button type="button" class="cancel px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 transition">
              <i class="fas fa-times mr-2"></i>Batal
            </button>
          </div>
        </form>
      </main>
    </div>
  </div>

  <script>
    $(function() {
      var $sections = $('.form-section');
      var currentStep = 0;
      var form = $('#kerjasamaForm').parsley();
      
      function navigateTo(index) {
        // Validate before proceeding to next step
        if (index > currentStep) {
          if (!form.validate({ group: 'block-' + currentStep })) {
            return;
          }
        }
        
        // Update current step
        currentStep = index;
        $sections.removeClass('current').eq(index).addClass('current');
        
        // Update navigation buttons
        $('.previous').toggle(index > 0);
        $('.next').toggle(index < $sections.length - 1);
        $('.submit').toggle(index === $sections.length - 1);
        
        // Update step indicators
        $('.step-indicator').removeClass('active');
        $('.step-indicator.step' + index).addClass('active');
      }
      
      // Phone number formatting
      $('input[name="nomor_telp"]').on('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 12) value = value.substring(0, 12);
        
        if (value.length > 4) {
          value = value.substring(0,4) + '-' + value.substring(4);
        }
        if (value.length > 9) {
          value = value.substring(0,9) + '-' + value.substring(9);
        }
        
        e.target.value = value;
      });
      
      // Jurusan checkbox validation
      $('input[name="jurusans[]"]').on('change', function() {
        const checked = $('input[name="jurusans[]"]:checked').length > 0;
        $('#jurusan-error').toggleClass('hidden', checked);
      });
      
      // Bidang checkbox validation
      $('input[name="bidangs[]"]').on('change', function() {
        const checked = $('input[name="bidangs[]"]:checked').length > 0;
        $('#bidang-error').toggleClass('hidden', checked);
      });
      
      // Navigation buttons
      $('.next').click(function() {
        navigateTo(currentStep + 1);
      });
      
      $('.previous').click(function() {
        navigateTo(currentStep - 1);
      });
      
      $('.cancel').click(function() {
        if (confirm('Apakah Anda yakin ingin membatalkan pengajuan?')) {
          window.location.href = '/dashboard';
        }
      });
      
      // Initialize form validation
      $('#kerjasamaForm').parsley();
      
      // Set up validation groups
      $sections.each(function(index, section) {
        $(section).find(':input').attr('data-parsley-group', 'block-' + index);
      });
      
      // Start at first step
      navigateTo(0);
    });
  </script>
</body>
</html>