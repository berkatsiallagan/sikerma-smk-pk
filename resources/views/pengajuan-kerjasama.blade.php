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
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
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
    .step-indicator.completed {
      background-color: #10b981;
      color: white;
    }
    .progress-line.completed {
      background-color: #10b981;
    }
    /* custom transition utility */
    @layer utilities {
      .transition-all-linear {
        transition: all 0.35s linear;
      }
    }
  </style>
</head>
<body style="background-color: #212121" class="text-black font-sans">
  <div class="flex min-h-screen">

    <x-sidebar />

    <div class="ml-60 flex-grow p-4 md:p-8 bg-gray-100 min-h-screen">
      <h1 class="text-3xl md:text-5xl font-extrabold text-gray-800 mb-6">
        Pengajuan Kerjasama
      </h1>

      @if(session('success'))
        <div class="mb-6 w-full p-4 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
      @endif
      @if($errors->any()))
        <div class="mb-6 w-full p-4 bg-red-100 text-red-800 rounded">
          <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif



      <main class="bg-white p-4 md:p-6 rounded-3xl w-full max-w-6xl mx-auto shadow-md">
        <form id="kerjasamaForm" method="POST" action="{{ route('pengajuan-kerjasama.store') }}" enctype="multipart/form-data" class="space-y-6">
          @csrf

      <!-- Progress Bar -->
      <div class="relative flex items-center justify-between w-full mb-8 px-4">
        <!-- Step 1 -->
        <div class="flex flex-col items-center z-10">
          <div id="progress-step1" class="progress-step w-12 h-12 md:w-16 md:h-16 rounded-full bg-gray-300 flex items-center justify-center text-lg font-bold text-gray-800">
            1
          </div>
          <div class="mt-2 text-sm font-medium text-gray-800">Data Pemohon</div>
        </div>
        <div id="progress-line1" class="progress-line flex-1 h-1 bg-gray-300 mx-2"></div>

        <!-- Step 2 -->
        <div class="flex flex-col items-center z-10">
          <div id="progress-step2" class="progress-step w-12 h-12 md:w-16 md:h-16 rounded-full bg-gray-300 flex items-center justify-center text-lg font-bold text-gray-800">
            2
          </div>
          <div class="mt-2 text-sm font-medium text-gray-800">Data Mitra</div>
        </div>
        <div id="progress-line2" class="progress-line flex-1 h-1 bg-gray-300 mx-2"></div>

        <!-- Step 3 -->
        <div class="flex flex-col items-center z-10">
          <div id="progress-step3" class="progress-step w-12 h-12 md:w-16 md:h-16 rounded-full bg-gray-300 flex items-center justify-center text-lg font-bold text-gray-800">
            3
          </div>
          <div class="mt-2 text-sm font-medium text-gray-800">Upload Dokumen</div>
        </div>
      </div>

          <!-- Step 1: Data Pemohon -->
          <div class="form-section current" id="step1">
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">Data Pemohon</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
              <!-- Nomor Pemohonan -->
              <div class="col-span-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Permohonan</label>
                <input type="text" name="no_permohonan" value="{{ $newNumber }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed" readonly>
              </div>
              
              <!-- Tanggal Pengajuan -->
              <div class="col-span-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pengajuan</label>
                <input type="date" name="tanggal_ajuan" value="{{ date('Y-m-d') }}" readonly 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed">
              </div>
              
              <!-- Nama Pemohon -->
              <div class="col-span-1">
                <label class="block text-sm font-medium text-gray-700 mb-1 required-field">Nama Pemohon</label>
                <input type="text" required name="nama_pemohon"
                       data-parsley-pattern="^[a-zA-Z\s]+$"
                       data-parsley-pattern-message="Nama pemohon hanya boleh berisi huruf dan spasi"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-amber-500">
              </div>
              
              <!-- No. HP -->
              <div class="col-span-1">
                <label class="block text-sm font-medium text-gray-700 mb-1 required-field">No. HP</label>
                <input type="tel" required name="nomor_telp"
                       minlength="12" data-parsley-minlength="12"
                       data-parsley-minlength-message="Nomor HP minimal 10 digit"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-amber-500">
              </div>
              
              <!-- Jurusan Pemohon -->
              <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2 required-field">Jurusan Pemohon</label>
                <div class="w-full flex flex-wrap mb-2">
                  @foreach($jurusans as $jurusan)
                    @php $jid = 'jurusan'.$jurusan->id_jurusan; @endphp
                    <div class="m-3">
                      <input type="checkbox" name="jurusans[]" id="{{ $jid }}" value="{{ $jurusan->id_jurusan }}" class="hidden peer" {{ in_array($jurusan->id_jurusan, old('jurusans', [])) ? 'checked' : '' }} />
                      <label for="{{ $jid }}" class="px-4 py-2 text-sm font-semibold border border-gray-300 rounded-full cursor-pointer transition-colors peer-checked:text-amber-600 peer-checked:border-amber-500 peer-checked:bg-amber-50">
                        {{ $jurusan->nama_jurusan }}
                      </label>
                    </div>
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
                <select name="nama_mitra" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-amber-500">
                  <option value="" disabled selected>Pilih Mitra</option>
                  @foreach($mitras as $mitra)
                    <option value="{{ $mitra->nama_mitra }}" {{ old('nama_mitra') == $mitra->nama_mitra ? 'selected' : '' }}>{{ $mitra->nama_mitra }}</option>
                  @endforeach
                </select>
              </div>
              
              <!-- Negara -->
              <div class="col-span-1">
                <label class="block text-sm font-medium text-gray-700 mb-1 required-field">Negara</label>
                <div class="relative dropdown-container">
                  <button type="button" id="dropdownButton" class="w-full flex justify-between items-center px-4 py-2 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                    <span id="dropdownButtonText">Pilih Negara</span>
                    <span class="material-icons text-lg transition-transform duration-300">arrow_drop_down</span>
                  </button>
                  <ul id="dropdownList" class="absolute hidden w-full mt-1 bg-white z-50 rounded-lg shadow-[0_4px_12px_rgba(0,0,0,0.1)] text-sm">
                    <li data-value="Nasional" class="py-2 px-4 hover:bg-black hover:text-white cursor-pointer rounded-t-lg">Nasional</li>
                    <li data-value="Internasional" class="py-2 px-4 hover:bg-black hover:text-white cursor-pointer rounded-b-lg">Internasional</li>
                  </ul>
                </div>
                <input type="hidden" name="lingkup" id="lingkupInput" required>
              </div>
              
              <!-- Jenis Kerjasama -->
              <div class="col-span-1">
                <label class="block text-sm font-medium text-gray-700 mb-1 required-field">Jenis Kerjasama</label>
                <div class="relative dropdown-container">
                  <button type="button" id="jenisDropdownButton" class="w-full flex justify-between items-center px-4 py-2 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                    <span id="jenisDropdownButtonText">Pilih Jenis</span>
                    <span class="material-icons text-lg transition-transform duration-300">arrow_drop_down</span>
                  </button>
                  <ul id="jenisDropdownList" class="absolute hidden w-full mt-1 bg-white z-50 rounded-lg shadow-[0_4px_12px_rgba(0,0,0,0.1)] text-sm">
                    <li data-value="Memorandum of Understanding (MoU)" class="py-2 px-4 hover:bg-black hover:text-white cursor-pointer rounded-t-lg">Memorandum of Understanding (MoU)</li>
                    <li data-value="Memorandum of Agreement (MoA)" class="py-2 px-4 hover:bg-black hover:text-white cursor-pointer rounded-b-lg">Memorandum of Agreement (MoA)</li>
                  </ul>
                </div>
                <input type="hidden" name="jenis_kerjasama" id="jenisKerjasamaInput" required>
              </div>
              
              <!-- Bidang Pemohon -->
              <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2 required-field">Bidang Pemohon</label>
                <div class="w-full flex flex-wrap mb-2">
                  @foreach($bidangs as $bidang)
                    @php $bid = 'bidang'.$bidang->id_bidang; @endphp
                    <div class="m-3">
                      <input type="checkbox" name="bidangs[]" id="{{ $bid }}" value="{{ $bidang->id_bidang }}" class="hidden peer" {{ in_array($bidang->id_bidang, old('bidangs', [])) ? 'checked' : '' }} />
                      <label for="{{ $bid }}" class="px-4 py-2 text-sm font-semibold border border-gray-300 rounded-full cursor-pointer transition-colors peer-checked:text-amber-600 peer-checked:border-amber-500 peer-checked:bg-amber-50">
                        {{ $bidang->nama_bidang }}
                      </label>
                    </div>
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
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-amber-500">
              </div>
              
              <!-- Tanggal Selesai -->
              <div class="col-span-1">
                <label class="block text-sm font-medium text-gray-700 mb-1 required-field">Tanggal Selesai</label>
                <input type="date" required name="tanggal_selesai" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-amber-500">
              </div>
              
              <!-- Catatan -->
              <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Catatan</label>
                <textarea name="catatan" rows="3" 
                       maxlength="255"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-amber-500"></textarea>
              </div>
              
              <!-- Draft PKS -->
              <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1 required-field">Draft PKS</label>
                <input type="file" required name="dokumen" id="dokumenFile" class="hidden" accept=".pdf,.doc,.docx">
                <label for="dokumenFile" id="dokumenLabel" class="inline-block text-center w-auto py-2 px-6 border-2 border-amber-400 rounded-full uppercase font-semibold text-sm text-amber-400 transition-all-linear hover:scale-105 cursor-pointer">Select file</label>
                <p class="text-sm text-gray-600 mt-1">Format file: PDF, DOC, DOCX (max 2MB)</p>
                <p id="dokumen-size-error" class="text-red-500 text-sm mt-1 hidden">Ukuran file maksimal 2 MB.</p>
              </div>
            </div>
          </div>

          <!-- Navigation Buttons -->
          <div class="flex mt-8 items-center gap-4">
            <button type="button" class="previous px-6 py-2 bg-gray-300 text-black font-bold rounded-lg hover:bg-gray-400 transition">
              <i class="fas fa-arrow-left mr-2"></i> Kembali
            </button>
            <button type="button" class="next ml-auto px-6 py-2 bg-amber-600 text-white font-bold rounded-lg hover:bg-amber-700 transition">
              Selanjutnya <i class="fas fa-arrow-right ml-2"></i>
            </button>
            <button type="submit" class="submit ml-auto px-6 py-2 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 transition hidden">
              Selesai <i class="fas fa-check ml-2"></i>
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
      
      function updateProgressBar(step) {
        // Reset all progress steps
        $('.progress-step').removeClass('active completed');
        $('.progress-line').removeClass('completed');
        
        // Update progress based on current step
        if (step >= 0) {
          $('#progress-step1').addClass('active');
        }
        if (step >= 1) {
          $('#progress-step1').removeClass('active').addClass('completed');
          $('#progress-line1').addClass('completed');
          $('#progress-step2').addClass('active');
        }
        if (step >= 2) {
          $('#progress-step2').removeClass('active').addClass('completed');
          $('#progress-line2').addClass('completed');
          $('#progress-step3').addClass('active');
        }
      }
      
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
        
        // Update progress bar
        updateProgressBar(index);
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
      
      // Custom dropdown for Negara (lingkup)
      $('#dropdownButton').on('click', function(e) {
        e.stopPropagation();
        $('#dropdownList').toggleClass('hidden');
      });

      $('#dropdownList li').on('click', function(e) {
        const value = $(this).data('value');
        const text = $(this).text();
        $('#dropdownButtonText').text(text);
        $('#lingkupInput').val(value);
        $('#dropdownList').addClass('hidden');
      });

      // Custom dropdown for Jenis Kerjasama
      $('#jenisDropdownButton').on('click', function(e) {
        e.stopPropagation();
        $('#jenisDropdownList').toggleClass('hidden');
      });

      $('#jenisDropdownList li').on('click', function(e) {
        const value = $(this).data('value');
        const text = $(this).text();
        $('#jenisDropdownButtonText').text(text);
        $('#jenisKerjasamaInput').val(value);
        $('#jenisDropdownList').addClass('hidden');
      });

      // Hide dropdowns when mouse leaves their list
      $('#dropdownList').on('mouseleave', function() { $(this).addClass('hidden'); });
      $('#jenisDropdownList').on('mouseleave', function() { $(this).addClass('hidden'); });
      
      // Close dropdowns when clicking outside
      $(document).on('click', function() {
        $('#dropdownList, #jenisDropdownList, #tipeDropdownList').addClass('hidden');
      });
      
      // Initialize form validation
      $('#kerjasamaForm').parsley();
      
      // Set up validation groups
      $sections.each(function(index, section) {
        $(section).find(':input').attr('data-parsley-group', 'block-' + index);
      });
      
      // Start at first step
      navigateTo(0);

      const dokumenInput = document.getElementById('dokumenFile');
      const dokumenError = document.getElementById('dokumen-size-error');
      const dokumenLabel = document.getElementById('dokumenLabel');

      dokumenInput.addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file && file.size > 2 * 1024 * 1024) { // 2 MB
          dokumenError.classList.remove('hidden');
          e.target.value = '';
          dokumenLabel.textContent = 'Select file';
          dokumenLabel.classList.remove('bg-amber-400', 'text-black');
          dokumenLabel.classList.add('text-amber-400');
        } else {
          dokumenError.classList.add('hidden');
          if (file) {
            dokumenLabel.textContent = file.name;
            dokumenLabel.classList.add('text-black');
            dokumenLabel.classList.remove('text-amber-400', 'bg-amber-400');
          }
        }
      });
    });
  </script>
</body>
</html>
