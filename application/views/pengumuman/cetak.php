


<!DOCTYPE html>
<html>
<head>
    <title>Cetak Pengumuman</title>
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

        @media print {
            body * {
                visibility: hidden;
            }
            .print-container, .print-container * {
                visibility: visible;
            }
            .print-container {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                padding: 20px;
            }
            .no-print, .no-print * {
                display: none !important;
            }
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
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table thead th {
            background-color: var(--police-blue) !important;
            color: white !important;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
            padding: 12px 8px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table tbody td {
            padding: 10px 8px;
            border: 1px solid #ddd;
        }

        table tbody tr:nth-child(even) {
            background-color: rgba(26, 35, 126, 0.05);
        }

        .footer-print {
            margin-top: 30px;
            text-align: right;
            font-style: italic;
            color: var(--police-dark);
        }

        .btn-print {
            background-color: var(--police-blue);
            color: white;
            border: none;
            padding: 10px 25px;
            font-weight: 500;
            letter-spacing: 0.5px;
            margin-top: 20px;
        }

        .btn-print:hover {
            background-color: var(--police-dark);
        }
    </style>
</head>
<body>
    <div class="container print-container">
        <div class="header-print">
            <h1>Data Pengumuman</h1>
            <p>Dicetak pada: <?= date('d/m/Y H:i:s'); ?></p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Peserta</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach ($pengumuman as $p): ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $p->nama ?? '-' ?></td>
                    <td><?= $p->judul; ?></td>
                    <td><?= $p->isi; ?></td>
                    <td><?= date('d/m/Y', strtotime($p->tgl_pengumuman)); ?></td>
                    <td><?= $p->status; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

     
    </div>

    <div class="text-center no-print mt-4">
        <button onclick="window.print()" class="btn btn-primary">
            <i class="fas fa-print mr-2"></i> Cetak Pengumuman
        </button>
    </div>
</body>
</html>
