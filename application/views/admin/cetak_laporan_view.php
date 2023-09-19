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

tr:nth-child(even) {background-color: #f2f2f2;}
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
                                    <th>No</th>
                                    <th>Indeks Judul</th>
                                    <th>Sangat Puas</th>
                                    <th>Puas</th>
                                    <th>Cukup Puas</th>
                                    <th>Tidak Puas</th>
                                </tr>
        </thead>
        <tbody>
                                <?php if (!empty($grafik_data)): ?>
                                    <?php $i = 1; ?>
                                    <?php $dataPerJudul = array(); ?>
                                    <?php $totalSangatPuas = 0; ?>
                                    <?php $totalPuas = 0; ?>
                                    <?php $totalCukupPuas = 0; ?>
                                    <?php $totalTidakPuas = 0; ?>

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
                                                );
                                            }

                                            $dataPerJudul[$indeksJudul][$jawabJenis] = $total;

                                            // Menghitung total kepuasan
                                            $totalSangatPuas += ($jawabJenis === 'Sangat Puas') ? $total : 0;
                                            $totalPuas += ($jawabJenis === 'Puas') ? $total : 0;
                                            $totalCukupPuas += ($jawabJenis === 'Cukup Puas') ? $total : 0;
                                            $totalTidakPuas += ($jawabJenis === 'Tidak Puas') ? $total : 0;
                                        ?>
                                    <?php endforeach; ?>

                                    <?php foreach ($dataPerJudul as $indeksJudul => $dataJudul): ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $indeksJudul; ?></td>
                                            <td><?php echo $dataJudul['Sangat Puas']; ?></td>
                                            <td><?php echo $dataJudul['Puas']; ?></td>
                                            <td><?php echo $dataJudul['Cukup Puas']; ?></td>
                                            <td><?php echo $dataJudul['Tidak Puas']; ?></td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>

                                    <!-- Tambahkan baris total kepuasan -->
                                    <tr>
                                        <td colspan="2"><strong>Total Kepuasan</strong></td>
                                        <td><strong><?php echo $totalSangatPuas; ?></strong></td>
                                        <td><strong><?php echo $totalPuas; ?></strong></td>
                                        <td><strong><?php echo $totalCukupPuas; ?></strong></td>
                                        <td><strong><?php echo $totalTidakPuas; ?></strong></td>
                                    </tr>

                                <?php else: ?>
                                    <tr>
                                        <td colspan="6">No data available.</td>
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
