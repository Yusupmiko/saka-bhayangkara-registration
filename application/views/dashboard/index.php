<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    .card-box {
      color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .bg-registrasi { background-color: #4e73df; }
    .bg-jenis { background-color: #f6c23e; }
    .bg-tarif { background-color: rgb(139, 202, 14); }
    .bg-otobus { background-color: rgb(7, 62, 84); }
    .icon-box { font-size: 30px; opacity: 0.7; }
    .card {
      border-radius: 10px;
      padding: 15px;
      color: white;
      transition: 0.3s;
    }
    .card:hover {
      transform: scale(1.03);
    }
    .shadow {
      box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.15);
    }
  </style>
</head>

<body>

<?php include 'header.php'; ?>

<div class="container mt-5">
  <h2 class="mb-4">Selamat Datang di Dashboard</h2>

  <div class="row mt-3">
    <!-- Info Cards -->
    <div class="col-md-3">
      <div class="card text-white bg-primary shadow">
        <div class="card-body">
          Pendaftar Hari Ini
          <h4 class="mt-2"><?= $pendaftar_hari_ini ?></h4>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card text-white bg-success shadow">
        <div class="card-body">
          Pendaftar Bulan Ini
          <h4 class="mt-2"><?= $pendaftar_bulan_ini ?></h4>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card text-white bg-info shadow">
        <div class="card-body">
          Lolos Administrasi
          <h4 class="mt-2"><?= $lolos_administrasi ?></h4>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card text-white bg-danger shadow">
        <div class="card-body">
          Tidak Lolos Administrasi
          <h4 class="mt-2"><?= $tidak_lolos ?></h4>
        </div>
      </div>
    </div>

    <div class="col-md-3 mt-3">
      <div class="card text-white bg-warning shadow">
        <div class="card-body">
          Lolos Seleksi
          <h4 class="mt-2"><?= $jumlah_lulus ?></h4>
        </div>
      </div>
    </div>

    <div class="col-md-3 mt-3">
      <div class="card text-white bg-primary shadow">
        <div class="card-body">
          Tidak Lolos Seleksi
          <h4 class="mt-2"><?= $jumlah_tidak_lulus ?></h4>
        </div>
      </div>
    </div>
  </div>

<div class="row mt-4">
  <div class="col-md-6">
    <div class="card shadow">
      <div class="card-header bg-success text-white">
        Grafik Seleksi Administrasi
      </div>
      <div class="card-body">
        <canvas id="grafikSeleksiAdmin" style="max-height: 300px;"></canvas>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card shadow">
      <div class="card-header bg-success text-white">
        Grafik Seleksi Akhir
      </div>
      <div class="card-body">
        <canvas id="grafikSeleksiAkhir" style="max-height: 300px;"></canvas>
      </div>
    </div>
  </div>
</div>


</div>

<?php include 'footer.php'; ?>

<script>
  const ctxAdmin = document.getElementById('grafikSeleksiAdmin').getContext('2d');
  const chartAdmin = new Chart(ctxAdmin, {
      type: 'pie',
      data: {
          labels: ['Lolos Administrasi', 'Tidak Lolos'],
          datasets: [{
              label: 'Seleksi Administrasi',
              data: [<?= $lolos_administrasi ?>, <?= $tidak_lolos ?>],
              backgroundColor: ['#007bff', '#fd7e14'] // biru & oranye
          }]
      },
      options: {
          responsive: true,
          plugins: {
              legend: { position: 'bottom' },
              title: {
                  display: true,
                  text: 'Distribusi Seleksi Administrasi'
              }
          }
      }
  });

  const ctxAkhir = document.getElementById('grafikSeleksiAkhir').getContext('2d');
  const chartAkhir = new Chart(ctxAkhir, {
      type: 'pie',
      data: {
          labels: ['Lulus Seleksi', 'Tidak Lulus'],
          datasets: [{
              label: 'Seleksi Akhir',
              data: [<?= $jumlah_lulus ?>, <?= $jumlah_tidak_lulus ?>],
              backgroundColor: ['#28a745', '#dc3545'] // hijau & merah
          }]
      },
      options: {
          responsive: true,
          plugins: {
              legend: { position: 'bottom' },
              title: {
                  display: true,
                  text: 'Distribusi Seleksi Akhir'
              }
          }
      }
  });
</script>


</body>
</html>
