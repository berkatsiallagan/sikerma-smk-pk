<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Monitoring</title>
    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/fontawesome/css/all.min.css">
    <style>
      * {
        box-sizing: border-box;
      }
      body {
        margin: 0;
        font-family: 'Roboto', sans-serif;
        background: #fff;
        color: #000;
      }
  .container {
    display: flex;
    min-height: 100vh;
  }
  aside {
    width: 240px;
    background-color: #d6861a;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
  .top-aside {
    flex-grow: 1;
  }
  .header {
    background-color: #4a1f00;
    color: #fff;
    font-weight: 700;
    font-family: 'Roboto Slab', serif;
    font-size: 18px;
    padding: 16px 20px;
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .header img {
    width: 32px;
    height: 32px;
  }
  .user-info {
    background-color: #c98f2a;
    padding: 20px 20px 24px 20px;
    color: #000;
  }
  .user-icon {
    font-size: 48px;
    margin-bottom: 8px;
  }
  .user-name {
    font-weight: 700;
    font-size: 16px;
    margin-bottom: 4px;
  }
  .user-role {
    font-size: 12px;
    font-family: 'Roboto Slab', serif;
  }
  nav {
    margin-top: 8px;
  }
  nav a {
    display: flex;
    align-items: center;
    gap: 12px;
    font-weight: 700;
    font-family: 'Roboto Slab', serif;
    font-size: 14px;
    color: #000;
    text-decoration: none;
    padding: 12px 20px;
    background-color: #d6861a;
    transition: background-color 0.3s ease;
  }
  nav a:hover {
    background-color: #c98f2a;
  }
  nav a.active {
    background-color: #c98f2a;
  }
  .nav-icon {
    font-size: 18px;
  }
  .bottom-aside {
    padding: 16px 20px;
    font-weight: 700;
    font-family: 'Roboto Slab', serif;
    font-size: 14px;
    color: #222;
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
  }
  .bottom-aside .fa-arrow-left {
    font-size: 16px;
  }
  main {
    flex-grow: 1;
    padding: 40px 30px;
    overflow-x: auto;
  }
  table {
    border-collapse: collapse;
    width: 100%;
    max-width: 900px;
  }
  thead tr {
    background-color: #d6d6d6;
  }
  thead th {
    font-family: 'Roboto Slab', serif;
    font-weight: 700;
    font-size: 14px;
    padding: 10px 12px;
    border: 1px solid #999;
    text-align: left;
  }
  tbody td {
    font-family: 'Roboto', sans-serif;
    font-weight: 400;
    font-size: 13px;
    padding: 10px 12px;
    border: 1px solid #999;
  }
  @media (max-width: 600px) {
    aside {
      width: 100%;
      flex-direction: row;
      padding: 8px 0;
      overflow-x: auto;
    }
    .header {
      flex: 0 0 auto;
      padding: 8px 12px;
      font-size: 14px;
    }
    .user-info {
      display: none;
    }
    nav {
      display: flex;
      flex-wrap: nowrap;
      margin-top: 0;
    }
    nav a {
      padding: 8px 12px;
      font-size: 12px;
      white-space: nowrap;
    }
    .bottom-aside {
      display: none;
    }
    main {
      padding: 20px 15px;
    }
    table {
      font-size: 11px;
      max-width: 100%;
    }
    thead th, tbody td {
      padding: 6px 8px;
    }
  }
    </style>
</head>
<body>
    <div class="container">
    <aside>
    <div class="top-aside">
     <div class="sidebar">
      <img alt="Yellow shield logo with text SIKERMA" height="32" src="/assets/img/logo-skaju.png" width="32"/>
      SIKERMA
     </div>
     <div class="user-info">
      <div class="user-icon">
       <i class="fas fa-user"></i>
      </div>
      <div class="user-name">
       Nama Pengguna
      </div>
      <div class="user-role">
       Jurusan Informatika
      </div>
     </div>
     <nav>
      <a aria-current="false" class="nav-link" href="#">
       <i class="fas fa-tachometer-alt nav-icon">
       </i>
       Dashboard
      </a>
      <a aria-current="true" class="nav-link" href="#">
       <i class="fas fa-check-circle nav-icon">
       </i>
       Pengajuan
      </a>
      <a aria-current="false" class="nav-link active" href="#">
       <i class="fas fa-chart-bar nav-icon">
       </i>
       Monitoring
      </a>
     </nav>
    </div>
    <div class="bottom-aside">
     <i class="fas fa-arrow-left">
     </i>
     Keluar
    </div>
   </aside>
    <div class="content">
    <div class="container mt-4">
        <table class="table table-bordered mt-3">
    <thead class="table-dark">
        <tr>
            <th>No. Dokumen</th>
            <th>Nama Mitra</th>
            <th>Tahun</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Sisa hari</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($monitoring as $item)
            <tr>
                <td>{{ $item->no_kerja_sama }}</td>
                <td>{{ $item->pengajuan->nama_mitra ?? "-" }}</td>
                <td>{{ $item->pengajuan->tanggal_ajuan ?? "-" }}</td>
                <td>{{ $item->tanggal_mulai }}</td>
                <td>{{ $item->tanggal_selesai }}</td>
                <td>{{ $item->sisa_hari ?? "-" }}</td>
                <td>{{ $item->status }}</td>
            </tr>
        @endforeach
    </tbody>
        </table>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
