<!-- admin/lap_hasil_survei.php -->
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 5px;
        }

        th {
            background-color: #4CAF50;
            font-weight: bold;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border: 1px solid grey;
        }

        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            border: 1px solid black;
        }

        .responsive {
            width: 100%;
            height: auto;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body onload="printCetak()">
<h2 style="text-align: center;"><?php echo $title; ?></h2>
<h2 style="text-align: center;">Biro Perencanaan dan Hubungan Masyarakat</h2>
<h2 style="text-align: center;">Universitas Lampung</h2>

<div style="overflow-x:auto;">
    <table>
        <thead>
        <tr>
                                <th class="text-center" rowspan="2">No</th>
                                <th class="text-center" rowspan="2">Indeks Judul</th>
                                <th class="text-center" colspan="2">Sangat Puas</th>
                                <th class="text-center" colspan="2">Puas</th>
                                <th class="text-center" colspan="2">Cukup Puas</th>
                                <th class="text-center" colspan="2">Tidak Puas</th>
                                <th class="text-center" rowspan="2">Total</th>
                            </tr>
                            <tr>
                                <th class="text-center">∑</th>
                                <th class="text-center">%</th>
                                <th class="text-center">∑</th>
                                <th class="text-center">%</th>
                                <th class="text-center">∑</th>
                                <th class="text-center">%</th>
                                <th class="text-center">∑</th>
                                <th class="text-center">%</th>
                            </tr>
        </thead>
        <tbody>
        <?php if (!empty($grafik_data)): ?>
            <?php $i = 1; ?>
            <?php $dataPerJudul = array(); ?>

            <?php foreach ($grafik_data as $data): ?>
                <?php
                $indeksJudul = $data->indeks_judul;
                $jawabJenis = $data->jawab_jenis;
                $total = intval($data->total);

                if (!isset($dataPerJudul[$indeksJudul])) {
                    $dataPerJudul[$indeksJudul] = array(
                        'indeks_judul' => $indeksJudul,
                        'Sangat Puas' => 0,
                        'Puas' => 0,
                        'Cukup Puas' => 0,
                        'Tidak Puas' => 0,
                        'Total' => 0,
                    );
                }

                $dataPerJudul[$indeksJudul][$jawabJenis] = $total;

                // Calculate the total respondents for this index
                $dataPerJudul[$indeksJudul]['Total'] += $total;
                ?>
            <?php endforeach; ?>

            <?php foreach ($dataPerJudul as $indeksJudul => $dataJudul): ?>
                <tr>
                
                <td><?php echo $i; ?></td>
                                            <td><?php echo $indeksJudul; ?></td>
                                            <td class="text-center"><?php echo $dataJudul['Sangat Puas']; ?></td>
                                            <td class="text-center"><?php echo round(($dataJudul['Sangat Puas'] / $dataJudul['Total']) * 100) . "%"; ?></td>
                                            <td class="text-center"><?php echo $dataJudul['Puas']; ?></td>
                                            <td class="text-center"><?php echo round(($dataJudul['Puas'] / $dataJudul['Total']) * 100) . "%"; ?></td>
                                            <td class="text-center"><?php echo $dataJudul['Cukup Puas']; ?></td>
                                            <td class="text-center"><?php echo round(($dataJudul['Cukup Puas'] / $dataJudul['Total']) * 100) . "%"; ?></td>
                                            <td class="text-center"><?php echo $dataJudul['Tidak Puas']; ?></td>
                                            <td class="text-center"><?php echo round(($dataJudul['Tidak Puas'] / $dataJudul['Total']) * 100) . "%"; ?></td>
                                            <td class="text-center"><?php echo $dataJudul['Total']; ?></td>
                                        </tr>
                <?php $i++; ?>
            <?php endforeach; ?>

        <?php else: ?>
            <tr>
                <td colspan="11">No data available.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<script>
    function printCetak() {
        window.print();
    }
</script>
<!-- Sign -->
<div style="margin-top: 10px;">
    <table style="width: 100%;border: none;">
        <tr style="border: none;">
            <td style="width: 70%; text-align: center; border: none;"></td>
            <td style="width: 30%; text-align: center; border: none;">
                <p style="margin-bottom: 10px;">Bandar Lampung, <?php echo date('d F Y'); ?></p>
                <p style="margin-bottom: 100px;">Penanggung Jawab       </p>
                <p style="margin-bottom: 10px;">(........................................)</p>
                <p style="margin-bottom: 10px;">NIK. </p>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
