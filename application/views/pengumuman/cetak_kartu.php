<!DOCTYPE html>
<html>
<head>
    <title>Kartu Anggota</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .card {
            width: 450px;
            margin: 0 auto;
            padding: 25px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(90deg, #1a237e 0%, #3949ab 50%, #7986cb 100%);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 25px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #1a237e;
            display: flex;
            align-items: center;
        }

        .logo::before {
            content: "★";
            margin-right: 8px;
            color: #ffc107;
        }

        .photo-placeholder {
            width: 80px;
            height: 100px;
            background-color: #f5f5f5;
            border: 1px dashed #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #999;
            font-size: 12px;
            border-radius: 5px;
            overflow: hidden;
        }

        .photo-placeholder img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card h2 {
            text-align: center;
            color: #1a237e;
            margin: 10px 0 25px;
            font-size: 22px;
            position: relative;
        }

        .card h2::after {
            content: "";
            display: block;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #1a237e 0%, #3949ab 100%);
            margin: 8px auto 0;
            border-radius: 3px;
        }

        .info {
            line-height: 1.8;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .label {
            font-weight: 600;
            color: #555;
            display: inline-block;
            width: 140px;
        }

        .value {
            color: #333;
        }

        .id-section {
            background: #f8f9fa;
            padding: 12px;
            border-radius: 8px;
            margin-top: 20px;
            text-align: center;
            border: 1px solid #e0e0e0;
        }

        .id-number {
            font-size: 20px;
            font-weight: bold;
            color: #1a237e;
            letter-spacing: 1px;
        }

        .print-btn {
            text-align: center;
            margin-top: 25px;
        }

        .print-btn button {
            background: linear-gradient(to right, #1a237e, #3949ab);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 30px;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 8px rgba(26, 35, 126, 0.2);
        }

        .print-btn button:hover {
            background: linear-gradient(to right, #3949ab, #1a237e);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(26, 35, 126, 0.3);
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            font-size: 12px;
            color: #888;
            border-top: 1px solid #eee;
            padding-top: 15px;
        }

        .watermark {
            position: absolute;
            opacity: 0.05;
            font-size: 120px;
            font-weight: bold;
            color: #1a237e;
            transform: rotate(-30deg);
            z-index: 0;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-30deg);
            pointer-events: none;
        }

        @media print {
            body {
                background: white;
            }

            .card {
                box-shadow: none;
                border: 1px solid #ddd;
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 20px;
            }

            .print-btn {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="watermark">PEMANGKAT</div>
        
        <div class="card-header">
            <A class="logo">SAKA BHAYANGKARA</A>
            <div class="photo-placeholder">
               <img src="<?= base_url('gambar/polda.png') ?>" class="logo-img" alt="Logo Saka Bhayangkara">

            </div>
        </div>

        <h2>KARTU ANGGOTA</h2>
        
        <div class="info">
            <div><span class="label">Nama Lengkap:</span> <span class="value"><?= $anggota->nama ?></span></div>
            <div><span class="label">NIK:</span> <span class="value"><?= $anggota->nik ?></span></div>
            <div><span class="label">TTL:</span> <span class="value"><?= $anggota->ttl ?></span></div>
            <div><span class="label">Asal Sekolah:</span> <span class="value"><?= $anggota->asal_sekolah ?></span></div>
            <div><span class="label">No. HP:</span> <span class="value"><?= $anggota->no_hp ?></span></div>
        </div>

        <div class="id-section">
            <div style="font-size: 14px; color: #666; margin-bottom: 5px;">ID ANGGOTA</div>
            <div class="id-number"><?= str_pad($anggota->id_anggota, 4, '0', STR_PAD_LEFT) ?></div>

        </div>

        <div class="print-btn">
            <button onclick="window.print()">🖨️ Cetak Kartu</button>
        </div>

        <div class="footer">
            Dicetak oleh Sistem Pendaftaran | <?= date('d-m-Y H:i') ?>
        </div>
    </div>
</body>
</html>