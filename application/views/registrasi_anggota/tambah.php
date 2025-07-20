<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota Saka Bhayangkara</title>
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

        textarea.form-control {
            min-height: 100px;
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

        .btn i {
            margin-right: 8px;
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
            <h5 class="mb-0"><i class="fas fa-user-plus mr-2"></i>FORM PENDAFTARAN ANGGOTA SAKA BHAYANGKARA</h5>
        </div>
        <div class="card-body">
            <form action="<?= base_url('registrasi_anggota/tambah_aksi'); ?>" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_anggota"><i class="fas fa-id-card mr-1"></i> ID Anggota</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                </div>
                                <input type="text" class="form-control" id="id_anggota" name="id_anggota" required pattern="\d{1,4}" maxlength="4" placeholder="Contoh: 0001">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nama"><i class="fas fa-user mr-1"></i> Nama Lengkap</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                </div>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nik"><i class="fas fa-address-card mr-1"></i> NIK</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
                                </div>
                                <input type="text" class="form-control" id="nik" name="nik" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ttl"><i class="fas fa-calendar-alt mr-1"></i> Tempat, Tanggal Lahir</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                                </div>
                                <input type="text" class="form-control" id="ttl" name="ttl" placeholder="Contoh: Singkawang, 01 Januari 2008" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="asal_sekolah"><i class="fas fa-school mr-1"></i> Asal Sekolah</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                </div>
                                <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="no_hp"><i class="fas fa-phone mr-1"></i> Nomor HP</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="alamat"><i class="fas fa-map-marker-alt mr-1"></i> Alamat Lengkap</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                </div>

                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save mr-1"></i> Simpan Data
                    </button>
                    <a href="<?= base_url('registrasi_anggota'); ?>" class="btn btn-secondary ml-2">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>