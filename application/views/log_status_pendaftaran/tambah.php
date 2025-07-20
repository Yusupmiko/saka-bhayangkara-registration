<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Log Status Pendaftaran</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --police-blue: #1a237e;
            --police-dark: #0d1b3a;
            --police-gold: #ffc107;
            --police-light: #f5f5f5;
            --police-success: #388e3c;
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

        .form-group label {
            font-weight: 500;
            color: var(--police-dark);
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 4px;
            border: 1px solid #ddd;
            padding: 10px 15px;
        }

        .form-control:focus {
            border-color: var(--police-gold);
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
        }

        .btn-success {
            background-color: var(--police-success);
            border-color: var(--police-success);
            font-weight: 500;
            letter-spacing: 0.5px;
            padding: 10px 25px;
        }

        .btn-success:hover {
            background-color: #2e7d32;
            border-color: #2e7d32;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            font-weight: 500;
            letter-spacing: 0.5px;
            padding: 10px 25px;
        }

        .input-group-text {
            background-color: var(--police-gold);
            color: var(--police-dark);
            font-weight: bold;
            border: none;
        }

        @media (max-width: 768px) {
            .content {
                margin-left: 0;
                padding: 20px;
            }

            .card {
                margin-top: 20px;
            }

            .btn {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>

<div class="content">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0"><i class="fas fa-tasks mr-2"></i>FORM LOG STATUS PENDAFTARAN</h5>
        </div>
        <div class="card-body">
            <form action="<?= base_url('log_status_pendaftaran/tambah_aksi'); ?>" method="post">
             <!-- id_log tidak perlu ditampilkan karena auto_increment -->


   <div class="form-group">
    <label for="id_anggota"><i class="fas fa-user mr-1"></i> Nama Anggota</label>
    <select class="form-control" id="id_anggota" name="id_anggota" required>
        <option value="">-- Pilih Anggota --</option>
        <?php foreach ($anggota as $a): ?>
            <option value="<?= $a->id_anggota ?>"><?= $a->nama ?> (id: <?= $a->id_anggota ?>)</option>
        <?php endforeach; ?>
    </select>
</div>



               <div class="form-group">
    <label for="status"><i class="fas fa-info-circle mr-1"></i> Status</label>
    <select class="form-control" id="status" name="status" required>
        <option value="">-- Pilih Status --</option>
        <?php foreach ($status_options as $status): ?>
            <option value="<?= $status ?>"><?= $status ?></option>
        <?php endforeach; ?>
    </select>
</div>


                <div class="form-group">
                    <label for="tanggal_status"><i class="fas fa-calendar-alt mr-1"></i> Tanggal Status</label>
                    <input type="date" class="form-control" id="tanggal_status" name="tanggal_status" required>
                </div>
<div class="form-group">
                    <label for="keterangan"><i class="fas fa-info-circle mr-1"></i> keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                </div>
                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save mr-1"></i> Simpan Data
                    </button>
                    <a href="<?= base_url('log_status_pendaftaran'); ?>" class="btn btn-secondary ml-2">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
