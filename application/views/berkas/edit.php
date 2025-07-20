<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Data Berkas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <style>
        /* ... (style sama seperti sebelumnya, biar ringkas saya skip) ... */
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
            <h5 class="mb-0"><i class="fas fa-edit mr-2"></i>Edit Data Berkas</h5>
        </div>
        <div class="card-body">
            <form action="<?= base_url('berkas/update'); ?>" method="post" enctype="multipart/form-data">
                <!-- Hidden input ID lama untuk reference -->
         <!-- ID Berkas untuk identifikasi (jangan diedit oleh user) -->
<input type="hidden" name="id_berkas" value="<?= $berkas->id_berkas; ?>">


                <!-- Dropdown anggota -->
                <div class="form-group">
                    <label for="id_anggota"><i class="fas fa-user-tag mr-1"></i> Anggota</label>
                    <select name="id_anggota" id="id_anggota" class="form-control" required>
                        <option value="">-- Pilih Anggota --</option>
                        <?php foreach ($anggota as $a): ?>
                            <option value="<?= $a->id_anggota ?>" <?= $a->id_anggota == $berkas->id_anggota ? 'selected' : '' ?>>
                                <?= htmlspecialchars($a->nama ?? 'ID: ' . $a->id_anggota) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nama_berkas"><i class="fas fa-file-alt mr-1"></i> Nama Berkas</label>
                    <input type="text" class="form-control" name="nama_berkas" id="nama_berkas" value="<?= htmlspecialchars($berkas->nama_berkas); ?>" required>
                </div>

                <div class="form-group">
                    <label for="unggah_berkas"><i class="fas fa-upload mr-1"></i> Ganti Berkas (opsional)</label>
                    <input type="file" class="form-control" name="unggah_berkas" id="unggah_berkas" accept=".jpg,.jpeg,.png,.pdf" />
                    <small class="form-text text-muted">Berkas saat ini: <strong><?= htmlspecialchars($berkas->unggah_berkas); ?></strong></small>
                </div>

                <div class="form-group">
                    <label for="keterangan"><i class="fas fa-info-circle mr-1"></i> Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" id="keterangan" value="<?= htmlspecialchars($berkas->keterangan); ?>" required>
                </div>

                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save mr-1"></i> Simpan Perubahan
                    </button>
                    <a href="<?= base_url('berkas'); ?>" class="btn btn-secondary px-4 ml-2">
                        <i class="fas fa-times mr-1"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
