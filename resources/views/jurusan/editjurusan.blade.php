<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Jurusan</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex text-black font-sans">
  <div class="flex min-h-screen bg-gray-300">

    <main class="flex-1 p-6 bg-gray-100">
        @yield('content')
    </main>
  </div>

  <div class="flex flex-col flex-grow p-8 items-start text-left bg-gray-100">
  <h3 class="text-4xl font-semibold text-gray-800 mb-6">Edit Jurusan</h3>

  <main class="bg-white p-6 rounded-3xl w-full">
  <form action="/kelolajurusan/{{ $jurusan->id_jurusan }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label for="id_jurusan" class="form-label">No.</label>
                <input type="text" name="id_jurusan" id="id_jurusan" value="{{ $jurusan->id_jurusan }}" class="form-control" required>
            </div>
            <div class="mb-2">
                <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
                <input type="text" name="nama_jurusan" id="nama_jurusan" value="{{ $jurusan->nama_jurusan }}" class="form-control" required>
            </div>
            <button class="btn btn-primary">Update</button>
            <a href="/kelolajurusan" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </div>

</body>
</html>
