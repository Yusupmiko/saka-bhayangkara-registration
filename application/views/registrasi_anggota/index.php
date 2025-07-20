<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota Saka Bhayangkara</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --police-blue: #1a237e;
            --police-dark: #0d1b3a;
            --police-gold: #ffc107;
            --police-light: #f5f5f5;
            --police-danger: #d32f2f;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--police-light);
            margin: 0;
        }

        .content {
            margin-left: 280px;
            padding: 30px;
            margin-top: 70px;
            transition: all 0.3s ease;
        }

        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-top: 3px solid var(--police-blue);
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            border-top: 3px solid var(--police-gold);
        }

        .card-header {
            background: linear-gradient(135deg, var(--police-blue) 0%, var(--police-dark) 100%);
            color: white;
            font-weight: 600;
            padding: 15px 20px;
            border-radius: 8px 8px 0 0;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 2px solid var(--police-gold);
        }

        .btn i {
            margin-right: 5px;
        }

        .btn-primary {
            background-color: var(--police-blue);
            border-color: var(--police-blue);
        }

        .btn-primary:hover {
            background-color: var(--police-dark);
            border-color: var(--police-dark);
        }

        .btn-outline-success {
            color: var(--police-blue);
            border-color: var(--police-blue);
        }

        .btn-outline-success:hover {
            background-color: var(--police-blue);
            border-color: var(--police-blue);
        }

        .btn-warning {
            background-color: var(--police-gold);
            border-color: var(--police-gold);
            color: var(--police-dark);
        }

        .btn-danger {
            background-color: var(--police-danger);
            border-color: var(--police-danger);
        }

        table th {
            background-color: var(--police-blue);
            color: white;
            text-transform: uppercase;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        table td {
            vertical-align: middle !important;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(26, 35, 126, 0.05);
        }

        .form-control:focus {
            border-color: var(--police-gold);
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
        }

        .badge-police {
            background-color: var(--police-gold);
            color: var(--police-dark);
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .content {
                margin-left: 0;
                padding: 15px;
            }
            
            .d-flex {
                flex-direction: column;
            }
            
            .form-inline {
                margin-top: 15px;
                width: 100%;
            }
            
            .form-control {
                width: 100% !important;
                margin-right: 0 !important;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>

<div class="content">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0"><i class="fas fa-users mr-2"></i>DATA ANGGOTA SAKA BHAYANGKARA</h5>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between mb-4">
                <div>
                    <a href="<?= base_url('registrasi_anggota/tambah'); ?>" class="btn btn-primary">
                        <i class="fas fa-user-plus"></i> Tambah Anggota
                    </a>
                 <?php if ($this->session->userdata('role_id') == 1): ?>
    <a href="<?= base_url('registrasi_anggota/cetak'); ?>" class="btn btn-outline-success ml-2">
        <i class="fas fa-print"></i> Cetak Laporan
    </a>
<?php endif; ?>

                </div>
                <form action="<?= base_url('registrasi_anggota/search'); ?>" method="GET" class="form-inline">
                    <input class="form-control mr-2" type="search" name="cari" placeholder="Cari anggota..." value="<?= isset($_GET['cari']) ? $_GET['cari'] : ''; ?>" style="width: 250px;">
                    <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i> Cari</button>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                             <th>ID Anggota</th>
                            <th>Nama Calon anggota</th>
                            <th>NIK</th>
                            <th>TTL</th>
                            <th>Alamat</th>
                            <th>Asal Sekolah</th>
                            <th>No HP</th>
                            <th width="120" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($anggota as $anggota): ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                          <td><?= str_pad($anggota->id_anggota, 4, '0', STR_PAD_LEFT) ?></td>

                            <td><?= $anggota->nama ?></td>
                            <td><?= $anggota->nik ?></td>
                            <td><?= $anggota->ttl ?></td>
                            <td><?= $anggota->alamat ?></td>
                            <td><?= $anggota->asal_sekolah ?></td>
                            <td><?= $anggota->no_hp ?></td>
<td class="text-center">
    <?php if ($this->session->userdata('role_id') == 1): ?>
        <a href="<?= base_url('registrasi_anggota/edit/'.$anggota->id_anggota); ?>" class="btn btn-warning btn-sm" title="Edit">
            <i class="fas fa-edit"></i>
        </a>
        <a href="<?= base_url('registrasi_anggota/hapus/'.$anggota->id_anggota); ?>" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus data anggota ini?');">
            <i class="fas fa-trash-alt"></i>
        </a>
    <?php else: ?>
        <span class="text-muted">-</span>
    <?php endif; ?>
</td>

                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            <div class="alert alert-info mt-4" style="background-color: rgba(26, 35, 126, 0.1); border-left: 4px solid var(--police-blue); color: var(--police-dark);">
                <i class="fas fa-info-circle mr-2"></i> <strong>Informasi:</strong> Total <?= $no-1 ?> anggota Saka Bhayangkara terdaftar dalam sistem.
            </div>
        </div>
    </div>
</div>

</body>
</html>