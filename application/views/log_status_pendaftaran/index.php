<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Status Pendaftaran</title>
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
        }

        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-top: 3px solid var(--police-blue);
        }

        .card:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            border-top: 3px solid var(--police-gold);
        }

        .card-header {
            background: linear-gradient(135deg, var(--police-blue), var(--police-dark));
            color: white;
            font-weight: 600;
            padding: 15px 20px;
            border-radius: 8px 8px 0 0;
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

        .btn-danger {
            background-color: var(--police-danger);
            border-color: var(--police-danger);
        }

        table th {
            background-color: var(--police-blue);
            color: white;
            text-transform: uppercase;
            font-weight: 500;
        }

        table td {
            vertical-align: middle !important;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(26, 35, 126, 0.05);
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
            }
        }
    </style>
</head>
<body>

<div class="content">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0"><i class="fas fa-clipboard-list mr-2"></i>Log Status Pendaftaran Anggota</h5>
        </div>
        <div class="card-body">
              <div class="d-flex justify-content-between mb-4">
                <div>
                    <a href="<?= base_url('log_status_pendaftaran/tambah'); ?>" class="btn btn-primary">
                        <i class="fas fa-user-plus"></i> Tambah Log
                    </a>
                    <a href="<?= base_url('log_status_pendaftaran/cetak'); ?>" class="btn btn-outline-success ml-2">
                        <i class="fas fa-print"></i> Cetak Log
                    </a>
                </div>
                <form action="<?= base_url('log_status_pendaftaran/search'); ?>" method="GET" class="form-inline">
                    <input class="form-control mr-2" type="search" name="cari" placeholder="Cari Log..." value="<?= isset($_GET['cari']) ? $_GET['cari'] : ''; ?>" style="width: 250px;">
                    <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i> Cari</button>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <!-- <th>ID Log</th> -->
                            <th>Nama Anggota</th>
                            <th>Status</th>
                            <th>Waktu Update</th>
                            <th>Keterangan</th>
                            <th width="120" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($log_status as $log): ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <!-- <td><?= $log->id_log ?></td> -->
                            <td><?= $log->nama ?></td>
                            <td>
                                <?php if ($log->status == 'Diterima'): ?>
                                    <span class="badge badge-success"><?= $log->status ?></span>
                                <?php elseif ($log->status == 'Ditolak'): ?>
                                    <span class="badge badge-danger"><?= $log->status ?></span>
                                <?php else: ?>
                                    <span class="badge badge-secondary"><?= $log->status ?></span>
                                <?php endif; ?>
                            </td>
                            <td><?= date('d M Y H:i', strtotime($log->waktu_update)) ?></td>
                            <td><?= $log->keterangan ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('log_status_pendaftaran/edit/'.$log->id_log); ?>" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('log_status_pendaftaran/hapus/'.$log->id_log); ?>" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus data log ini?');">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="alert alert-info mt-4" style="background-color: rgba(26, 35, 126, 0.1); border-left: 4px solid var(--police-blue); color: var(--police-dark);">
                <i class="fas fa-info-circle mr-2"></i> <strong>Informasi:</strong> Total <?= $no - 1 ?> log status pendaftaran tercatat.
            </div>
        </div>
    </div>
</div>

</body>
</html>
