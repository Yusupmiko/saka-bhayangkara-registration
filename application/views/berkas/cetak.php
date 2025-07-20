<!DOCTYPE html>
<html>
<head>
    <title>Cetak Data Berkas Anggota Saka Bhayangkara</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* (Style sama seperti sebelumnya, boleh kamu pakai ulang) */
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
            vertical-align: middle;
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

        .img-berkas {
            max-width: 100px;
            max-height: 100px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div class="container print-container">
        <div class="header-print">
            <h1> Berkas Anggota Saka Bhayangkara</h1>
            <p>Saka Bhayangkara - <?= date('d F Y'); ?></p>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="40">No</th>
                    <th>Nama Anggota</th>
                    <th>Nama Berkas</th>
                    <th>File Berkas</th>
                    <th>Keterangan</th>
                    <th>Tanggal Upload</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach($berkas as $b): 
                ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= htmlspecialchars($b->nama); ?></td>
                    <td><?= htmlspecialchars($b->nama_berkas); ?></td>
                    <td class="text-center">
                        <?php if(in_array(pathinfo($b->unggah_berkas, PATHINFO_EXTENSION), ['jpg','jpeg','png'])): ?>
                            <img src="<?= base_url('uploads/berkas/'.$b->unggah_berkas); ?>" alt="Berkas" class="img-berkas" />
                        <?php else: ?>
                            <a href="<?= base_url('uploads/berkas/'.$b->unggah_berkas); ?>" target="_blank">Lihat File</a>
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($b->keterangan); ?></td>
                    <td><?= date('d-m-Y H:i', strtotime($b->created_at)); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="footer-print">
            <p>Dicetak pada: <?= date('d/m/Y H:i:s'); ?></p>
        </div>

        <div class="text-center no-print mt-4">
            <button onclick="window.print()" class="btn btn-print">
                <i class="fas fa-print mr-2"></i>Cetak Laporan
            </button>
        </div>
    </div>
</body>
</html>
