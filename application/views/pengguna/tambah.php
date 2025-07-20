<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Pengguna</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fc;
      margin: 0;
    }

    .content {
      margin-left: 280px;
      padding: 30px;
      margin-top: 70px;
    }

    .card-custom {
      border: none;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      background: #fff;
    }

    .card-header-custom {
      background: linear-gradient(135deg,rgb(5, 1, 59),rgb(17, 5, 103));
      color: white;
      font-weight: 600;
      padding: 15px 20px;
      border-radius: 10px 10px 0 0;
      border-bottom: 4px solid gold;
    }

    .form-control:focus {
      border-color: #6c5ce7;
      box-shadow: 0 0 0 0.2rem rgba(108, 92, 231, 0.25);
    }

    .btn-primary {
      background-color: #202a58;
      border: none;
    }

    .btn-primary:hover {
      background-color: #1a234a;
    }

    @media (max-width: 768px) {
      .content {
        margin-left: 0;
      }
    }

    /* DARK MODE */
    body.dark-mode {
      background-color: #121212;
      color: white;
    }

    body.dark-mode .card-custom {
      background-color: #1e1e1e;
    }

    body.dark-mode .card-header-custom {
      background: linear-gradient(135deg, #2d3a72, #423cb8);
      color: white;
    }

    body.dark-mode .form-control {
      background-color: #2c2c2c;
      color: white;
      border-color: #555;
    }

    body.dark-mode .form-control:focus {
      background-color: #2c2c2c;
      color: white;
    }

    .toggle-dark {
      position: fixed;
      top: 10px;
      right: 10px;
      z-index: 1000;
    }
  </style>
</head>
<body>

<button class="btn btn-dark toggle-dark" onclick="toggleDarkMode()"><i class="fas fa-moon"></i> Mode Gelap</button>

<div class="content">
  <div class="card-custom">
    <div class="card-header-custom">
      Tambah Pengguna
    </div>
    <div class="card-body">
      <?= form_open('pengguna/tambah_aksi'); ?>

      <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" class="form-control <?= form_error('nama') ? 'is-invalid' : ''; ?>" 
               id="nama" name="nama" value="<?= set_value('nama'); ?>" required>
        <div class="invalid-feedback">
          <?= form_error('nama'); ?>
        </div>
      </div>

      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control <?= form_error('username') ? 'is-invalid' : ''; ?>" 
               id="username" name="username" value="<?= set_value('username'); ?>" required>
        <div class="invalid-feedback">
          <?= form_error('username'); ?>
        </div>
      </div>

      <div class="form-group">
        <label for="password">Kata Sandi</label>
        <input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : ''; ?>" 
               id="password" name="password" required>
        <div class="invalid-feedback">
          <?= form_error('password'); ?>
        </div>
      </div>

      <div class="form-group">
        <label for="role_id">Role</label>
        <select class="form-control <?= form_error('role_id') ? 'is-invalid' : ''; ?>" 
                id="role_id" name="role_id" required>
          <option value="">-- Pilih Role --</option>
          <option value="1" <?= set_value('role_id') == '1' ? 'selected' : ''; ?>>Admin</option>
          <option value="2" <?= set_value('role_id') == '2' ? 'selected' : ''; ?>>Calon anggota</option>
        </select>
        <div class="invalid-feedback">
          <?= form_error('role_id'); ?>
        </div>
      </div>

      <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
      <a href="<?= base_url('pengguna'); ?>" class="btn btn-secondary"><i class="fas fa-times"></i> Batal</a>

      <?= form_close(); ?>
    </div>
  </div>
</div>

<script>
  function toggleDarkMode() {
    document.body.classList.toggle("dark-mode");
    const isDark = document.body.classList.contains("dark-mode");
    localStorage.setItem('darkMode', isDark ? 'enabled' : 'disabled');
  }

  // Aktifkan dark mode jika tersimpan
  window.onload = function () {
    if (localStorage.getItem('darkMode') === 'enabled') {
      document.body.classList.add('dark-mode');
    }
  }
</script>

</body>
</html>
