<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saka Bhayangkara</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a237e; /* Biru tua polisi */
            --secondary-color: #f5f5f5;
            --accent-color: #ffc107; /* Kuning emas */
            --dark-color: #0d47a1; /* Biru lebih gelap */
            --light-color: #ffffff;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
            --police-blue: #1a237e;
            --police-gold: #ffc107;
            --police-dark: #0d1b3a;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--secondary-color);
            color: #333;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        .header {
            width: 100%;
            background: linear-gradient(135deg, var(--police-dark) 0%, var(--police-blue) 100%);
            color: var(--light-color);
            padding: 15px 30px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: var(--shadow);
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid var(--police-gold);
        }

        .header h1 {
            font-weight: 700;
            font-size: 1.5rem;
            margin: 0;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .user-info {
            display: flex;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 5px 15px;
            border-radius: 20px;
            border: 1px solid var(--police-gold);
        }

        .user-info span {
            font-weight: 500;
            color: var(--police-gold);
        }

        .sidebar {
            width: 280px;
            height: 100vh;
            position: fixed;
            background: linear-gradient(180deg, var(--police-dark) 0%, var(--police-blue) 100%);
            top: 70px;
            left: 0;
            overflow-y: auto;
            transition: var(--transition);
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            z-index: 999;
            border-right: 3px solid var(--police-gold);
        }

        .sidebar-header {
            text-align: center;
            padding: 30px 20px;
            border-bottom: 1px solid rgba(255, 213, 79, 0.3);
        }

        .sidebar-header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--police-gold);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 15px;
            background-color: white;
        }

        .sidebar-header h4 {
            color: var(--light-color);
            font-weight: 600;
            margin: 10px 0 5px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .sidebar-header p {
            color: var(--police-gold);
            font-size: 0.8rem;
            font-weight: 500;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .sidebar-menu a {
            color: rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
            padding: 12px 25px;
            text-decoration: none;
            transition: var(--transition);
            font-weight: 500;
            border-left: 3px solid transparent;
            margin: 5px 10px;
            border-radius: 4px;
        }

        .sidebar-menu a i {
            margin-right: 12px;
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
            color: var(--police-gold);
        }

        .sidebar-menu a:hover {
            background: rgba(255, 213, 79, 0.1);
            color: var(--light-color);
            border-left: 3px solid var(--police-gold);
            transform: translateX(5px);
        }

        .sidebar-menu a.active {
            background: rgba(255, 213, 79, 0.2);
            color: var(--light-color);
            border-left: 3px solid var(--police-gold);
            font-weight: 600;
        }

        .content {
            margin-left: 280px;
            padding: 30px;
            margin-top: 70px;
            transition: var(--transition);
            background-color: var(--secondary-color);
        }

        .card {
            border: none;
            border-radius: 8px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
            transition: var(--transition);
            border-top: 3px solid var(--police-blue);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            border-top: 3px solid var(--police-gold);
        }

        .card-header {
            background: linear-gradient(135deg, var(--police-blue) 0%, var(--police-dark) 100%);
            color: white;
            border-radius: 8px 8px 0 0 !important;
            padding: 15px 20px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 2px solid var(--police-gold);
        }

        .logout-btn {
            background: rgba(231, 76, 60, 0.1);
            color: rgba(255, 255, 255, 0.8);
            border: none;
            padding: 12px 25px;
            width: calc(100% - 20px);
            margin: 0 10px;
            text-align: left;
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
            border-left: 3px solid transparent;
            border-radius: 4px;
        }

        .logout-btn:hover {
            background: rgba(231, 76, 60, 0.3);
            color: #ff5252;
            border-left: 3px solid #ff5252;
            transform: translateX(5px);
        }

        .logout-btn i {
            margin-right: 12px;
            color: #ff5252;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .content {
                margin-left: 0;
            }

            .header h1 {
                font-size: 1.2rem;
            }
        }

        /* Tambahan untuk tema polisi */
        .badge-police {
            background-color: var(--police-gold);
            color: var(--police-dark);
            font-weight: bold;
        }
        
        .btn-police {
            background-color: var(--police-blue);
            color: white;
            border: 1px solid var(--police-gold);
        }
        
        .btn-police:hover {
            background-color: var(--police-dark);
            color: var(--police-gold);
        }




        body.dark-mode {
  background-color: #121212;
  color: #ffffff;
}

body.dark-mode .card,
body.dark-mode .btn,
body.dark-mode .alert,
body.dark-mode .table {
  background-color: #1e1e1e;
  color: #ffffff;
  border-color: #333;
}

body.dark-mode .btn-primary {
  background-color: #0d6efd;
}

body.dark-mode .btn-danger {
  background-color: #dc3545;
}

body.dark-mode .btn-success {
  background-color: #198754;
}

body.dark-mode .btn-warning {
  background-color: #ffc107;
  color: #000;
}









:root {
            --primary-color: #1a237e;
            --secondary-color: #f5f5f5;
            --accent-color: #ffc107;
            --dark-color: #0d47a1;
            --light-color: #ffffff;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
            --police-blue: #1a237e;
            --police-gold: #ffc107;
            --police-dark: #0d1b3a;
        }

        /* [Previous CSS remains the same until the toolbar section] */

        /* Enhanced Toolbar Styles */
        .quick-toolbar {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 8px 0;
            background: linear-gradient(135deg, var(--police-dark) 0%, var(--police-blue) 100%);
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border-bottom: 3px solid var(--police-gold);
            margin-left: auto;
        }

        .nav-btn {
            position: relative;
            margin: 0 6px;
            padding: 8px 15px;
            font-size: 0.85rem;
            font-weight: 600;
            border-radius: 6px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
            border: none;
            display: flex;
            align-items: center;
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.1);
            transform: translateY(0);
            z-index: 1;
        }

        .nav-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            z-index: -1;
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.4s ease;
        }

        .nav-btn:hover::before {
            transform: scaleX(1);
            transform-origin: left;
        }

        .nav-btn i {
            margin-right: 8px;
            transition: all 0.3s ease;
        }

        .nav-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .nav-btn:active {
            transform: translateY(1px);
        }

        .btn-register {
            background: linear-gradient(135deg, #4a6fdc 0%, #1a56db 100%);
            color: white;
        }

        .btn-register:hover {
            background: linear-gradient(135deg, #1a56db 0%, #0d47a1 100%);
        }

        .btn-selection {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
        }

        .btn-selection:hover {
            background: linear-gradient(135deg, #c0392b 0%, #a93226 100%);
        }

        .btn-schedule {
            background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
            color: white;
        }

        .btn-schedule:hover {
            background: linear-gradient(135deg, #27ae60 0%, #219653 100%);
        }

        .btn-announcement {
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
            color: white;
        }

        .btn-announcement:hover {
            background: linear-gradient(135deg, #e67e22 0%, #d35400 100%);
        }

        .btn-darkmode {
            background: linear-gradient(135deg, #34495e 0%, #2c3e50 100%);
            color: white;
            border: 1px solid var(--police-gold);
        }

        .btn-darkmode:hover {
            background: linear-gradient(135deg, #2c3e50 0%, #1a252f 100%);
        }

        /* Pulse animation for important buttons */
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        /* Bounce animation for icons */
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        .bounce-icon {
            animation: bounce 1.5s infinite;
        }

        /* [Rest of your existing CSS remains the same] */
    </style>
</head>
<body>
  <div class="header">
    <h1><i class="fas fa-shield-alt mr-2"></i> SAKA  BHAYANGKARA</h1>
    <div class="user-info">
<!-- Enhanced Quick Toolbar -->
            <div class="quick-toolbar">
                <a href="<?= base_url('registrasi_anggota') ?>" class="nav-btn btn-register pulse">
                    <i class="fas fa-file-alt bounce-icon"></i> Form Registrasi
                </a>
                <a href="<?= base_url('seleksi') ?>" class="nav-btn btn-selection">
                    <i class="fas fa-clipboard-check"></i> Seleksi
                </a>
                <a href="<?= base_url('jadwal_seleksi') ?>" class="nav-btn btn-schedule">
                    <i class="fas fa-calendar-day bounce-icon"></i> Jadwal
                </a>
                <a href="<?= base_url('pengumuman') ?>" class="nav-btn btn-announcement">
                    <i class="fas fa-bullhorn"></i> Pengumuman
                </a>
                <button id="darkModeToggle" class="nav-btn btn-darkmode">
                    <i class="fas fa-moon"></i> Mode Gelap
                </button>

</div>



        <!-- <span>
            <i class="fas fa-user-circle mr-2"></i>
            <?php 
            $role_id = $this->session->userdata('role_id');
            if ($role_id == 1) {
                echo "ADMINISTRATOR";
            } elseif ($role_id == 2) {
                echo "PETUGAS ";
            }
            ?>
            
        </span> -->
    </div>
</div>

    <div class="sidebar">
        <div class="sidebar-header">
            <img src="<?php echo base_url('/gambar/polda.png'); ?>" alt="Logo Polisi">
            <h4> SAKA  BHAYANGKARA</h4>
            <p>Polsek Pemangkat</p>
        </div>

        <div class="sidebar-menu">
            <?php if ($this->session->userdata('role_id') == 1): ?>
            <a href="<?php echo base_url('dashboard'); ?>" class="active">
    <i class="fas fa-home"></i>
    Dashboard
</a>

<a href="<?php echo base_url('registrasi_anggota/index'); ?>">
    <i class="fas fa-user-plus"></i>
    Form Registrasi
</a>

<a href="<?php echo base_url('berkas/index'); ?>">
    <i class="fas fa-folder-open"></i>
    Berkas Anggota
</a>

<a href="<?php echo base_url('log_status_pendaftaran/index'); ?>">
    <i class="fas fa-history"></i>
    Log Pendaftaran
</a>

<a href="<?php echo base_url('seleksi/index'); ?>">
    <i class="fas fa-check-circle"></i>
    Lolos Administrasi
</a>

<a href="<?php echo base_url('jadwal_seleksi/index'); ?>">
    <i class="fas fa-calendar-alt"></i>
    Jadwal Seleksi
</a>

<a href="<?php echo base_url('pengumuman/index'); ?>">
    <i class="fas fa-bullhorn"></i>
    Pengumuman
</a>

<a href="<?php echo base_url('pengguna/index'); ?>">
    <i class="fas fa-user"></i>
    Kelola User
</a>


            <?php elseif ($this->session->userdata('role_id') == 2): ?>
                <a href="<?php echo base_url('registrasi_anggota/index'); ?>">
    <i class="fas fa-user-plus"></i>
    Form Registrasi
</a>

<a href="<?php echo base_url('berkas/index'); ?>">
    <i class="fas fa-folder-open"></i>
    Berkas Anggota
</a>
                <!-- <a href="<?php echo base_url('tarif/index'); ?>">
                    <i class="fas fa-money-bill-wave"></i>
                    Tarif
                </a>
                <a href="<?php echo base_url('transaksi/index'); ?>">
                    <i class="fas fa-exchange-alt"></i>
                    Transaksi
                </a> -->
            <?php endif; ?>

            <div style="margin-top: 20px;">
                <button class="logout-btn" onclick="window.location.href='<?php echo base_url('auth/logout'); ?>'">
                    <i class="fas fa-sign-out-alt"></i>
                    LOGOUT
                </button>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="fas fa-database mr-2"></i>PENGELOLAAN DATA  SAKA  BHAYANGKARA</h5>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-info">
                                <strong><i class="fas fa-info-circle mr-2"></i>PENDAFTARAN ANGGOTA SAKA  BHAYANGKARA  POLISI SEKTOR  PEMANGKAT</strong><br>
                                Silakan pilih menu di sidebar untuk mulai bekerja.
                            </div>
                            <div class="text-center mt-4">
                                <img src="<?php echo base_url('/gambar/polda.png'); ?>" alt="Logo Polisi" style="max-width: 200px; opacity: 0.7;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript untuk menangani perubahan status aktif menu
        document.querySelectorAll('.sidebar-menu a').forEach(function(menuItem) {
            if(menuItem.href === window.location.href) {
                document.querySelectorAll('.sidebar-menu a').forEach(function(item) {
                    item.classList.remove('active');
                });
                menuItem.classList.add('active');
            }
            
            menuItem.addEventListener('click', function() {
                document.querySelectorAll('.sidebar-menu a').forEach(function(item) {
                    item.classList.remove('active');
                });
                this.classList.add('active');
            });
        });


 const toggleButton = document.getElementById('darkModeToggle');
  const body = document.body;

  // Cek preferensi sebelumnya saat halaman dimuat
  if (localStorage.getItem('darkMode') === 'enabled') {
    body.classList.add('dark-mode');
    toggleButton.innerHTML = '☀️ Mode Terang';
  }

  // Toggle fungsi mode gelap
  toggleButton.addEventListener('click', () => {
    body.classList.toggle('dark-mode');

    // Simpan status ke localStorage
    if (body.classList.contains('dark-mode')) {
      localStorage.setItem('darkMode', 'enabled');
      toggleButton.innerHTML = '☀️ Mode Terang';
    } else {
      localStorage.setItem('darkMode', 'disabled');
      toggleButton.innerHTML = '🌙 Mode Gelap';
    }
  });


   
        // Enhanced hover effects with JavaScript
        document.querySelectorAll('.nav-btn').forEach(button => {
            button.addEventListener('mouseenter', function() {
                const icon = this.querySelector('i');
                if (icon) {
                    icon.style.transform = 'rotate(10deg) scale(1.2)';
                }
            });
            
            button.addEventListener('mouseleave', function() {
                const icon = this.querySelector('i');
                if (icon) {
                    icon.style.transform = '';
                }
            });
        });

        // Add ripple effect to buttons
        document.querySelectorAll('.nav-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                const x = e.clientX - e.target.getBoundingClientRect().left;
                const y = e.clientY - e.target.getBoundingClientRect().top;
                
                const ripple = document.createElement('span');
                ripple.className = 'ripple-effect';
                ripple.style.left = `${x}px`;
                ripple.style.top = `${y}px`;
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // [Rest of your JavaScript remains the same]
   

            // Add interactive effects
    document.querySelectorAll('.nav-item').forEach(item => {
        item.addEventListener('mouseenter', function() {
            const icon = this.querySelector('.nav-icon i');
            if (icon) {
                icon.style.transform = 'rotate(5deg) scale(1.1)';
            }
        });
        
        item.addEventListener('mouseleave', function() {
            const icon = this.querySelector('.nav-icon i');
            if (icon) {
                icon.style.transform = '';
            }
        });
        
        // Add click effect
        item.addEventListener('click', function() {
            // Remove active class from all items
            document.querySelectorAll('.nav-item').forEach(navItem => {
                navItem.classList.remove('active');
            });
            // Add active class to clicked item
            this.classList.add('active');
        });
    });

    </script>
</body>
</html>








<style>
    /* Enhanced Sidebar Menu Styles */
    .sidebar-menu {
        padding: 15px 0;
    }
    
    .nav-item {
        display: flex;
        align-items: center;
        color: rgba(255, 255, 255, 0.8);
        padding: 12px 15px;
        margin: 5px 10px;
        border-radius: 6px;
        text-decoration: none;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.05);
        border-left: 3px solid transparent;
        position: relative;
        overflow: hidden;
    }
    
    .nav-item:hover {
        background: rgba(255, 213, 79, 0.15);
        transform: translateX(5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .nav-item.active {
        background: linear-gradient(90deg, rgba(255, 213, 79, 0.2) 0%, rgba(255, 213, 79, 0.1) 100%);
        border-left: 3px solid var(--police-gold);
        color: white;
    }
    
    .nav-item.active .nav-icon i {
        color: var(--police-gold);
        transform: scale(1.1);
    }
    
    .nav-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        margin-right: 15px;
        transition: all 0.3s ease;
    }
    
    .nav-icon i {
        font-size: 1.1rem;
        color: var(--police-gold);
        transition: all 0.3s ease;
    }
    
    .nav-text {
        flex: 1;
    }
    
    .nav-text span {
        display: block;
        font-weight: 500;
        font-size: 0.95rem;
    }
    
    .nav-text small {
        display: block;
        font-size: 0.75rem;
        opacity: 0.7;
        margin-top: 2px;
    }
    
    .nav-arrow {
        opacity: 0;
        transform: translateX(-5px);
        transition: all 0.3s ease;
        color: rgba(255, 255, 255, 0.5);
    }
    
    .nav-item:hover .nav-arrow {
        opacity: 1;
        transform: translateX(0);
    }
    
    .nav-badge .badge {
        font-size: 0.6rem;
        padding: 3px 6px;
        font-weight: 600;
    }
    
    /* Animation Effects */
    @keyframes navItemFadeIn {
        from { opacity: 0; transform: translateX(-20px); }
        to { opacity: 1; transform: translateX(0); }
    }
    
    .nav-item {
        animation: navItemFadeIn 0.4s ease forwards;
        opacity: 0;
    }
    
    .nav-item:nth-child(1) { animation-delay: 0.1s; }
    .nav-item:nth-child(2) { animation-delay: 0.2s; }
    .nav-item:nth-child(3) { animation-delay: 0.3s; }
    .nav-item:nth-child(4) { animation-delay: 0.4s; }
    .nav-item:nth-child(5) { animation-delay: 0.5s; }
    .nav-item:nth-child(6) { animation-delay: 0.6s; }
    .nav-item:nth-child(7) { animation-delay: 0.7s; }
    .nav-item:nth-child(8) { animation-delay: 0.8s; }
    
    /* Hover Effect */
    .nav-item::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, rgba(255, 213, 79, 0.1) 0%, transparent 100%);
        transform: translateX(-100%);
        transition: transform 0.4s ease;
    }
    
    .nav-item:hover::after {
        transform: translateX(0);
    }
</style>

<script>

</script>