<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Anggota Saka Bhayangkara</title>
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
            font-weight: 500;
            letter-spacing: 0.5px;
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
            min-height: 100px;
        }

        @media (max-width: 768px) {
            .content {
                margin-left: 0;
                padding: 20px;
            }
            
            .card {
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>

<div class="content">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0"><i class="fas fa-user-edit mr-2"></i>EDIT DATA ANGGOTA SAKA BHAYANGKARA</h5>
        </div>
        <div class="card-body">
            <form action="<?= base_url('registrasi_anggota/update'); ?>" method="post">
                <!-- Input tersembunyi untuk ID lama -->
                <input type="hidden" name="id_anggota_lama" value="<?= $anggota->id_anggota; ?>">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_anggota"><i class="fas fa-id-card mr-1"></i> ID Anggota</label>
                            <input type="number" class="form-control" id="id_anggota" name="id_anggota" value="<?= $anggota->id_anggota; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="nama"><i class="fas fa-user mr-1"></i> Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $anggota->nama; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="nik"><i class="fas fa-address-card mr-1"></i> NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" value="<?= $anggota->nik; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="ttl"><i class="fas fa-calendar-alt mr-1"></i> Tempat, Tanggal Lahir</label>
                            <input type="text" class="form-control" id="ttl" name="ttl" value="<?= $anggota->ttl; ?>" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="alamat"><i class="fas fa-map-marker-alt mr-1"></i> Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= $anggota->alamat; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="asal_sekolah"><i class="fas fa-school mr-1"></i> Asal Sekolah</label>
                            <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="<?= $anggota->asal_sekolah; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="no_hp"><i class="fas fa-phone mr-1"></i> Nomor HP</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $anggota->no_hp; ?>" required>
                        </div>
                    </div>
                </div>

                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save mr-1"></i> Update Data
                    </button>
                    <a href="<?= base_url('registrasi_anggota'); ?>" class="btn btn-secondary px-4 ml-2">
                        <i class="fas fa-times mr-1"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>