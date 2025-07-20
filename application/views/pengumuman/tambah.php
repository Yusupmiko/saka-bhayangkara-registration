<!-- File: views/pengumuman/tambah.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengumuman</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --blue: #1a237e;
            --dark: #0d1b3a;
            --gold: #ffc107;
            --light: #f5f5f5;
            --success: #388e3c;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light);
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
            border-top: 3px solid var(--blue);
        }

        .card-header {
            background: linear-gradient(135deg, var(--blue) 0%, var(--dark) 100%);
            color: white;
            font-weight: 600;
            padding: 15px 20px;
            border-radius: 8px 8px 0 0;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 2px solid var(--gold);
        }

        .form-group label {
            font-weight: 500;
            color: var(--dark);
        }

        .form-control {
            border-radius: 4px;
            border: 1px solid #ddd;
            padding: 10px 15px;
        }

        .form-control:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
        }

        .btn-success {
            background-color: var(--success);
            border-color: var(--success);
            font-weight: 500;
            padding: 10px 25px;
        }

        .btn-success:hover {
            background-color: #2e7d32;
        }

        .btn-secondary {
            font-weight: 500;
            padding: 10px 25px;
        }

        .btn i {
            margin-right: 8px;
        }
    </style>
</head>
<body>

<div class="content">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0"><i class="fas fa-bullhorn mr-2"></i>Form Tambah Pengumuman</h5>
        </div>
        <div class="card-body">
            <form action="<?= base_url('pengumuman/tambah_aksi'); ?>" method="post">

                <!-- Nama Peserta Dropdown -->
                <div class="form-group">
                  <label for="id_anggota">Nama Peserta</label>
<select name="id_anggota" class="form-control" required>
    <option value="">-- Pilih Nama --</option>
    <?php foreach($peserta_diterima as $peserta): ?>
        <option value="<?= $peserta->id_anggota ?>"><?= $peserta->nama ?></option>
    <?php endforeach; ?>
</select>

                </div>

                <!-- Judul -->
                <div class="form-group">
                    <label for="judul"><i class="fas fa-heading mr-1"></i> Judul Pengumuman</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>

                <!-- Isi -->
                <div class="form-group">
                    <label for="isi"><i class="fas fa-align-left mr-1"></i> Isi Pengumuman</label>
                    <textarea class="form-control" id="isi" name="isi" rows="5" required></textarea>
                </div>

                <!-- Tanggal -->
                <div class="form-group">
                    <label for="tgl_pengumuman"><i class="fas fa-calendar-alt mr-1"></i> Tanggal Pengumuman</label>
                    <input type="date" class="form-control" id="tgl_pengumuman" name="tgl_pengumuman" required>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="status"><i class="fas fa-check-circle mr-1"></i> Status Kelulusan</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Lulus">Lulus</option>
                        <option value="Tidak Lulus">Tidak Lulus</option>
                    </select>
                </div>

                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan Pengumuman
                    </button>
                    <a href="<?= base_url('pengumuman'); ?>" class="btn btn-secondary ml-2">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Auto-set judul saat peserta dipilih
    document.getElementById('peserta').addEventListener('change', function () {
        let nama = this.value;
        if(nama) {
            document.getElementById('judul').value = 'Pengumuman Kelulusan: ' + nama;
        } else {
            document.getElementById('judul').value = '';
        }
    });
</script>

</body>
</html>
