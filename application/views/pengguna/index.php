<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kelola Pengguna</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f4f6fc;
      margin: 0;
    }

    .content {
      margin-left: 250px;
      padding: 30px;
      margin-top: 30px;
    }

    .card-custom {
      border: none;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      background: #fff;
    }

    .card-header-custom {
      background-color: #202a58;
      color: white;
      padding: 15px 20px;
      font-weight: bold;
      border-radius: 8px 8px 0 0;
      border-bottom: 4px solid gold;
    }

    .btn-primary {
      background-color: #202a58;
      border: none;
    }

    .btn-primary:hover {
      background-color: #1a234a;
    }

    .table thead {
      background-color: #1c2c6b;
      color: white;
    }

    .table td, .table th {
      vertical-align: middle;
    }

    .badge-success {
      background-color: #28a745;
    }

    .badge-danger {
      background-color: #dc3545;
    }

    .btn-edit {
      background-color: #ffc107;
      color: #fff;
    }

    .btn-delete {
      background-color: #dc3545;
      color: #fff;
    }

    /* DARK MODE */
    body.dark-mode {
      background-color: #121212;
      color: white;
    }

    body.dark-mode .card-custom {
      background-color: #1e1e1e;
    }

    body.dark-mode .card-header-custom {
      background-color: #2d3a72;
    }

    body.dark-mode .table {
      color: white;
    }

    body.dark-mode .table thead {
      background-color: #34448c;
    }

    .toggle-dark {
      position: fixed;
      top: 10px;
      right: 10px;
      z-index: 1000;
    }

    .btn-navy {
  background-color: #202a58; /* navy / biru gelap */
  color: white;
  border: none;
}

.btn-navy:hover {
  background-color: #1a234a;
  color: white;
}

  </style>
</head>
<body>



<div class="content">
  <div class="card-custom">
    <div class="card-header-custom">
      Data Pengguna
    </div>
    <div class="card-body">
      <div class="d-flex justify-content-between mb-3 flex-wrap">
        <div>
          <a href="<?= base_url('pengguna/tambah'); ?>" class="btn btn-navy mb-2"><i class="fas fa-plus"></i> Tambah Pengguna</a>
          
        </div>
        <!-- <form action="<?= base_url('pengguna/search'); ?>" method="GET" class="form-inline mb-2">
          <input class="form-control mr-2" type="search" name="cari" placeholder="Cari pengguna..." value="<?= isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">
          <button class="btn btn-success" type="submit"><i class="fas fa-search"></i> Cari</button>
        </form> -->
      </div>

      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <!-- <th>ID User</th> -->
              <th>Nama</th>
              <th>Username</th>
              <th>Password</th>
              <th>Role ID</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($user as $u): ?>
            <tr>
              <td><?= $no++ ?></td>
              <!-- <td><?= $u->id_user ?></td> -->
              <td><?= $u->nama ?></td>
              <td><?= $u->username ?></td>
              <td><?= $u->password ?></td>
              <td><?= $u->role_id ?></td>
              <td>
                <!-- <a href="<?= base_url('pengguna/edit/'.$u->id_user); ?>" class="btn btn-sm btn-edit"><i class="fas fa-edit"></i></a> -->
                <a href="<?= base_url('pengguna/hapus/'.$u->id_user); ?>" class="btn btn-sm btn-delete" onclick="return confirm('Hapus pengguna ini?')"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <div class="alert alert-info mt-3">
        Total: <?= count($user); ?> pengguna.
      </div>
    </div>
  </div>
</div>

<script>

</script>

</body>
</html>
