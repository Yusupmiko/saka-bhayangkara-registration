<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal Seleksi</title>
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
            <h5 class="mb-0"><i class="fas fa-calendar-check mr-2"></i>FORM TAMBAH JADWAL SELEKSI</h5>
        </div>
        <div class="card-body">
            <form action="<?= base_url('jadwal_seleksi/tambah_aksi'); ?>" method="post">

                <div class="form-group">
                    <label for="nama_kegiatan"><i class="fas fa-tasks mr-1"></i> Nama Kegiatan</label>
                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
                </div>

                <div class="form-group">
                    <label for="lokasi"><i class="fas fa-map-marker-alt mr-1"></i> Lokasi</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                </div>

               <div class="form-group">
    <label for="tanggal_kegiatan"><i class="fas fa-calendar-day mr-1"></i> Tanggal Kegiatan</label>
    <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" required>
</div>


          

                <div class="form-group">
                    <label for="keterangan"><i class="fas fa-info-circle mr-1"></i> Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan">
                </div>

                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save mr-1"></i> Simpan Data
                    </button>
                    <a href="<?= base_url('jadwal_seleksi'); ?>" class="btn btn-secondary ml-2">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
