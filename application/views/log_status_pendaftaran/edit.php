<!-- edit.php untuk log_status_pendaftaran -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Log Status Pendaftaran</title>
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
        }

        .btn-primary {
            background-color: var(--police-blue);
            border-color: var(--police-blue);
        }

        .btn-primary:hover {
            background-color: var(--police-dark);
        }

        textarea.form-control {
            min-height: 100px;
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
            <h5 class="mb-0"><i class="fas fa-edit mr-2"></i>EDIT LOG STATUS PENDAFTARAN</h5>
        </div>
        <div class="card-body">
            <form action="<?= base_url('log_status_pendaftaran/update'); ?>" method="post">
                <input type="hidden" name="id_log" value="<?= $log->id_log; ?>">

                <div class="form-group">
                    <label for="id_anggota"><i class="fas fa-id-card mr-1"></i> Nama Anggota</label>
                    <select class="form-control" id="id_anggota" name="id_anggota" required>
                        <option value="">-- Pilih Anggota --</option>
                        <?php foreach ($anggota as $a): ?>
                            <option value="<?= $a->id_anggota ?>" <?= ($a->id_anggota == $log->id_anggota) ? 'selected' : '' ?>>
                                <?= $a->nama ?> (<?= $a->id_anggota ?>)
                            </option>
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
                    <label for="keterangan"><i class="fas fa-sticky-note mr-1"></i> Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan"><?= $log->keterangan; ?></textarea>
                </div>

                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save mr-1"></i> Update
                    </button>
                    <a href="<?= base_url('log_status_pendaftaran'); ?>" class="btn btn-secondary px-4 ml-2">
                        <i class="fas fa-times mr-1"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
