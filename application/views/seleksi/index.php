<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Peserta Seleksi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        :root {
            --police-blue: #1a237e;
            --police-dark: #0d1b3a;
            --police-gold: #ffc107;
            --police-light: #f5f5f5;
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
        .card-header {
            background: linear-gradient(135deg, var(--police-blue), var(--police-dark));
            color: white;
            font-weight: 600;
            padding: 15px 20px;
            border-radius: 8px 8px 0 0;
            border-bottom: 2px solid var(--police-gold);
        }
        .btn-primary {
            background-color: var(--police-blue);
            border-color: var(--police-blue);
        }
        table th {
            background-color: var(--police-blue);
            color: white;
        }
        .badge-success {
            background-color: #28a745;
        }
        .table-hover tbody tr:hover {
            background-color: rgba(26, 35, 126, 0.05);
        }
        @media (max-width: 768px) {
            .content {
                margin-left: 0;
                padding: 15px;
            }
        }
    </style>
</head>
<body>

<div class="content">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-users"></i> Peserta Lolos Administrasi</h5>
          <a href="<?= base_url('seleksi/cetak'); ?>" class="btn btn-success">
    <i class="fas fa-print"></i> Cetak
</a>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>TTL</th>
                            <th>Asal Sekolah</th>
                            <th>No. HP</th>
                            <th>Status</th>
                            <th>Waktu Diterima</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($peserta as $row): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row->nama ?></td>
                            <td><?= $row->nik ?></td>
                            <td><?= $row->ttl ?></td>
                            <td><?= $row->asal_sekolah ?></td>
                            <td><?= $row->no_hp ?></td>
                            <td><span class="badge badge-success"><?= $row->status ?></span></td>
                            <td><?= date('d M Y H:i', strtotime($row->waktu_update)) ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="alert alert-info mt-4">
                <i class="fas fa-info-circle"></i> Total <?= $no - 1 ?> peserta lolos administrasi.
            </div>
        </div>
    </div>
</div>

</body>
</html>
