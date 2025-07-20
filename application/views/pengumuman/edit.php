<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengumuman</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            border-top: 3px solid var(--police-gold);
        }

        .card-header {
            background: linear-gradient(135deg, var(--police-blue) 0%, var(--police-dark) 100%);
            color: white;
            font-weight: 600;
            padding: 15px 20px;
            border-radius: 8px 8px 0 0;
            border-bottom: 2px solid var(--police-gold);
        }

        .form-group label {
            font-weight: 500;
            color: var(--police-dark);
        }

        .form-control {
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            border-color: var(--police-gold);
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
        }

        .btn-primary {
            background-color: var(--police-blue);
            border-color: var(--police-blue);
        }

        .btn-primary:hover {
            background-color: var(--police-dark);
            border-color: var(--police-dark);
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        textarea.form-control {
            min-height: 120px;
        }

        @media (max-width: 768px) {
            .content {
                margin-left: 0;
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="content">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0"><i class="fas fa-bullhorn mr-2"></i>Edit Pengumuman</h5>
        </div>
        <div class="card-body">
            <form action="<?= base_url('pengumuman/update'); ?>" method="post">
                <input type="hidden" name="id_pengumuman_lama" value="<?= $pengumuman->id_pengumuman; ?>">

            <input type="hidden" name="id_pengumuman" value="<?= $pengumuman->id_pengumuman; ?>">


                <div class="form-group">
                    <label for="nama"><i class="fas fa-user mr-1"></i> Nama Peserta</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $pengumuman->nama; ?>" required>
                </div>

                <div class="form-group">
                    <label for="judul"><i class="fas fa-heading mr-1"></i> Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?= $pengumuman->judul; ?>" required>
                </div>

                <div class="form-group">
                    <label for="isi"><i class="fas fa-align-left mr-1"></i> Isi</label>
                    <textarea class="form-control" id="isi" name="isi" rows="5" required><?= $pengumuman->isi; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="tgl_pengumuman"><i class="fas fa-calendar-alt mr-1"></i> Tanggal</label>
                    <input type="date" class="form-control" id="tgl_pengumuman" name="tgl_pengumuman" value="<?= $pengumuman->tgl_pengumuman; ?>" required>
                </div>

                <div class="form-group">
                    <label for="status"><i class="fas fa-flag mr-1"></i> Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Lulus" <?= $pengumuman->status == 'Lulus' ? 'selected' : '' ?>>Lulus</option>
                        <option value="Tidak Lulus" <?= $pengumuman->status == 'Tidak Lulus' ? 'selected' : '' ?>>Tidak Lulus</option>
                    </select>
                </div>

                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save mr-1"></i> Update
                    </button>
                    <a href="<?= base_url('pengumuman'); ?>" class="btn btn-secondary px-4 ml-2">
                        <i class="fas fa-times mr-1"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
