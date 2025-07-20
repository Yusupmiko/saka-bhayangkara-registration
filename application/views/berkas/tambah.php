<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Berkas Anggota</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
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
        }
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            border-top: 3px solid var(--police-blue);
        }
        .card-header {
            background: linear-gradient(135deg, var(--police-blue), var(--police-dark));
            color: #fff;
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
            border: 1px solid #ccc;
            padding: 10px 15px;
        }
        .form-control:focus {
            border-color: var(--police-gold);
            box-shadow: 0 0 0 0.2rem rgba(255,193,7,0.25);
        }
        .btn-success {
            background-color: var(--police-success);
            border-color: var(--police-success);
            font-weight: 500;
        }
        .btn-success:hover {
            background-color: #2e7d32;
        }
        .btn-secondary {
            font-weight: 500;
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
            <h5><i class="fas fa-file-upload mr-2"></i> Tambah Berkas Anggota</h5>
        </div>
        <div class="card-body">
            <form action="<?= base_url('berkas/tambah_aksi'); ?>" method="post" enctype="multipart/form-data" autocomplete="off">


                <div class="form-group">
                    <label for="id_anggota"><i class="fas fa-id-badge mr-1"></i> Pilih Anggota</label>
                    <select name="id_anggota" id="id_anggota" class="form-control" required>
                        <option value="">-- Pilih Anggota --</option>
                        <?php
                        // Contoh loop dari data anggota
                        foreach ($anggota as $row) {
                            echo "<option value='{$row->id_anggota}'>{$row->nama} (ID: {$row->id_anggota})</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nama_berkas"><i class="fas fa-file-alt mr-1"></i> Nama Berkas</label>
                    <input type="text" name="nama_berkas" id="nama_berkas" class="form-control" required />
                </div>

                <div class="form-group">
                    <label for="unggah_berkas"><i class="fas fa-upload mr-1"></i> Unggah Berkas</label>
                    <input type="file" name="unggah_berkas" id="unggah_berkas" class="form-control-file" required accept=".jpg,.jpeg,.png,.pdf" />
                    <small class="form-text text-muted">Format file: JPG, PNG, PDF. Maksimal ukuran 2MB.</small>
                </div>

                <div class="form-group">
                    <label for="keterangan"><i class="fas fa-comment-alt mr-1"></i> Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" rows="3" placeholder="Isi keterangan jika perlu..."></textarea>
                </div>

                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save mr-1"></i> Simpan Berkas
                    </button>
                    <a href="<?= base_url('berkas'); ?>" class="btn btn-secondary ml-2">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>
