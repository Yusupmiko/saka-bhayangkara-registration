<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Jadwal Seleksi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        :root {
            --police-blue: #1a237e;
            --police-dark: #0d1b3a;
            --police-gold: #ffc107;
            --police-light: #f5f5f5;
        }

        body {
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .print-area {
            padding: 30px;
        }

        .header-print {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid var(--police-gold);
            padding-bottom: 15px;
        }

        .header-print h1 {
            color: var(--police-blue);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .header-print p {
            color: var(--police-dark);
            font-weight: 500;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
        }

        table thead th {
            background-color: var(--police-blue) !important;
            color: white !important;
            text-transform: uppercase;
            font-weight: 600;
            text-align: center;
            padding: 10px;
            border: 1px solid #ddd;
        }

        table tbody td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        table tbody tr:nth-child(even) {
            background-color: rgba(26, 35, 126, 0.05);
        }

        .signature {
            margin-top: 60px;
            text-align: right;
        }

        .signature p {
            margin: 0;
        }

        .signature .name-line {
            margin-top: 60px;
            font-weight: bold;
            text-decoration: underline;
        }

        .btn-print {
            background-color: var(--police-blue);
            color: white;
            border: none;
            padding: 10px 25px;
            font-weight: 500;
            letter-spacing: 0.5px;
            margin-top: 30px;
        }

        .btn-print:hover {
            background-color: var(--police-dark);
        }

        @media print {
            body * {
                visibility: hidden;
            }

            .print-area, .print-area * {
                visibility: visible;
            }

            .print-area {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                padding: 20px;
            }

            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body>
    <div class="container print-area">
        <div class="header-print">
            <h1>Jadwal Seleksi</h1>
            <p>Saka Bhayangkara</p>
            <p><?= date('d F Y'); ?></p>
        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="50">No</th>
                    <th>Nama Kegiatan</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($jadwal as $j): ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $j->nama_kegiatan; ?></td>
                    <td><?= date('d M Y', strtotime($j->tanggal_kegiatan)); ?></td>
                    <td><?= $j->lokasi; ?></td>
                    <td><?= $j->keterangan; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="signature">
            <p>Mengetahui,</p>
            <p><strong>Ketua Saka Bhayangkara</strong></p>
            <p class="name-line">_____________________</p>
        </div>

        <div class="text-center no-print">
            <button onclick="window.print()" class="btn btn-print">
                <i class="fas fa-print mr-2"></i> Cetak
            </button>
        </div>
    </div>
</body>
</html>
