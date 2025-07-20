<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jadwal Seleksi</title>
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

        .btn-primary:hover {
            background-color: var(--police-dark);
        }

        .btn-outline-success:hover {
            background-color: var(--police-gold);
            color: #000;
        }

        table th {
            background-color: var(--police-blue);
            color: white;
            font-weight: 500;
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
        <div class="card-header">
            <h5 class="mb-0"><i class="fas fa-calendar-alt mr-2"></i>Data Jadwal Seleksi</h5>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between mb-4">
                <div>
                    <a href="<?= base_url('jadwal_seleksi/tambah'); ?>" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Tambah Jadwal
                    </a>
                    <a href="<?= base_url('jadwal_seleksi/cetak'); ?>" class="btn btn-outline-success ml-2">
                        <i class="fas fa-print"></i> Cetak Jadwal
                    </a>
                </div>
                <form action="<?= base_url('jadwal_seleksi/search'); ?>" method="GET" class="form-inline">
                    <input class="form-control mr-2" type="search" name="cari" placeholder="Cari kegiatan..." value="<?= isset($_GET['cari']) ? $_GET['cari'] : ''; ?>" style="width: 250px;">
                    <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i> Cari</button>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <!-- <th>ID Jadwal</th> -->
                            <th>Nama Kegiatan</th>
                            <th>Tanggal</th>
                            <th>Lokasi</th>
                            <th>Keterangan</th>
                            <th width="120" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($jadwal as $j): ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <!-- <td><?= $j->id_jadwal ?></td> -->
                            <td><?= $j->nama_kegiatan ?></td>
                            <td><?= date('d M Y', strtotime($j->tanggal_kegiatan)) ?></td>
                            <td><?= $j->lokasi ?></td>
                            <td><?= $j->keterangan ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('jadwal_seleksi/edit/'.$j->id_jadwal); ?>" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('jadwal_seleksi/hapus/'.$j->id_jadwal); ?>" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?');">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="alert alert-info mt-4" style="background-color: rgba(26, 35, 126, 0.1); border-left: 4px solid var(--police-blue); color: var(--police-dark);">
                <i class="fas fa-info-circle mr-2"></i> Total <strong><?= $no - 1 ?></strong> jadwal seleksi tercatat.
            </div>
        </div>
    </div>
</div>

</body>
</html>
