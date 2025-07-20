<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Pengumuman</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
   
   <style>
        :root {
            --blue: #1a237e;
            --dark: #0d1b3a;
            --gold: #ffc107;
            --light: #f5f5f5;
            --danger: #d32f2f;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light);
        }

        .content {
            margin-left: 280px;
            padding: 30px;
            margin-top: 70px;
        }

        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-top: 3px solid var(--blue);
        }

        .card-header {
            background: linear-gradient(135deg, var(--blue) 0%, var(--dark) 100%);
            color: white;
            font-weight: 600;
            padding: 15px 20px;
            border-radius: 8px 8px 0 0;
            border-bottom: 2px solid var(--gold);
        }

        .btn i {
            margin-right: 5px;
        }

        .btn-primary {
            background-color: var(--blue);
            border-color: var(--blue);
        }

        .btn-primary:hover {
            background-color: var(--dark);
            border-color: var(--dark);
        }

        .btn-warning {
            background-color: var(--gold);
            border-color: var(--gold);
            color: var(--dark);
        }

        .btn-danger {
            background-color: var(--danger);
            border-color: var(--danger);
        }

        table th {
            background-color: var(--blue);
            color: white;
            text-transform: uppercase;
            font-weight: 500;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(26, 35, 126, 0.05);
        }

        .badge {
            font-weight: 500;
            padding: 5px 10px;
        }
    </style>
</head>
<body>

<div class="content">
    <div class="card">
        <div class="card-header">
            <h5><i class="fas fa-bullhorn"></i> Data Pengumuman</h5>
        </div>
        <div class="card-body">

            <!-- Tombol Aksi -->
      <!-- Tombol Aksi Dropdown -->
<div class="mb-3 d-flex flex-wrap align-items-center">

    <!-- Tambah Pengumuman -->
    <a href="<?= base_url('pengumuman/tambah') ?>" class="btn btn-primary mr-2 mb-2">
        <i class="fas fa-plus-circle"></i> Tambah Pengumuman
    </a>

    <!-- Dropdown Cetak -->
    <div class="btn-group mr-2 mb-2">
        <button type="button" class="btn btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-print"></i> Cetak
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="<?= base_url('pengumuman/cetak') ?>">
                <i class="fas fa-print"></i> Semua
            </a>
            <a class="dropdown-item" href="<?= base_url('pengumuman/cetak?status=Lulus') ?>">
                <i class="fas fa-check-circle"></i> Lulus
            </a>
            <a class="dropdown-item" href="<?= base_url('pengumuman/cetak?status=Tidak Lulus') ?>">
                <i class="fas fa-times-circle"></i> Tidak Lulus
            </a>
        </div>
    </div>

    <!-- Dropdown Tampilkan -->
    <div class="btn-group mr-2 mb-2">
        <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-list"></i> Tampilkan
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="<?= base_url('pengumuman') ?>">
                <i class="fas fa-list"></i> Semua
            </a>
            <a class="dropdown-item" href="<?= base_url('pengumuman?status=Lulus') ?>">
                <i class="fas fa-check-circle"></i> Lulus
            </a>
            <a class="dropdown-item" href="<?= base_url('pengumuman?status=Tidak Lulus') ?>">
                <i class="fas fa-times-circle"></i> Tidak Lulus
            </a>
        </div>
    </div>

    <!-- Form Pencarian -->
    <form action="<?= base_url('pengumuman/search') ?>" method="GET" class="form-inline ml-auto">
        <input type="text" name="cari" class="form-control mr-2" placeholder="Cari judul..." value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>">
        <button type="submit" class="btn btn-outline-success">
            <i class="fas fa-search"></i> Cari
        </button>
    </form>
</div>


            <!-- Tabel -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th class="text-center" width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($pengumuman)) : ?>
                            <?php $no = 1; foreach ($pengumuman as $p) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $p->nama ?></td>
                                    <td><?= $p->judul ?></td>
                                    <td><?= word_limiter(strip_tags($p->isi), 15) ?></td>
                                    <td><?= date('d M Y', strtotime($p->tgl_pengumuman)) ?></td>
                                    <td>
                                        <span class="badge badge-<?= $p->status == 'Lulus' ? 'success' : 'secondary' ?>">
                                            <?= $p->status ?>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($p->status == 'Lulus') : ?>
                                            <a href="<?= base_url('pengumuman/cetak_kartu/' . $p->id_pengumuman) ?>" class="btn btn-info btn-sm mb-1" title="Cetak Kartu" target="_blank">
                                                <i class="fas fa-id-card"></i>
                                            </a>
                                        <?php endif ?>
                                        <a href="<?= base_url('pengumuman/edit/' . $p->id_pengumuman) ?>" class="btn btn-warning btn-sm mb-1" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('pengumuman/hapus/' . $p->id_pengumuman) ?>" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data pengumuman.</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>

            <!-- Total -->
            <div class="alert alert-info mt-3">
                <i class="fas fa-info-circle"></i> Total: <strong><?= isset($no) ? $no - 1 : 0 ?></strong> pengumuman.
            </div>

        </div>
    </div>
</div>

</body>
</html>
