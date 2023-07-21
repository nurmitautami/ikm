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
<div style="overflow-x:auto;">
<table>
        <thead>
                                 <tr>
                                    <th>No</th>
                                    <th>Tgl</th>
                                    <th>Nama</th>
                                    <th>Lembaga</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Usia</th>
                                    <th>Pekerjaan</th>
                                    <th>Pendidikan</th>
                                    <th>Detail Jawaban</th>
                                    <th>Hasil</th>
                                </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach($responden as $resp): ?>
                <tr>
                                    <td><?php echo $i; ?>.</td>
                                    <td><?php echo date('d/m/Y', strtotime($resp['respo_created'])); ?></td>
                                    <td><?php echo $resp['respo_nama']; ?></td>
                                    <td><?php echo $resp['respo_lembaga']; ?></td>
                                    <td><?php echo $resp['respo_jk']; ?></td>
                                    <td><?php echo $resp['respo_usia']; ?> Tahun</td>
                                    <td><?php echo $resp['respo_pekerjaan']; ?></td>
                                    <td><?php echo $resp['respo_pendidikan']; ?></td>
                                    <td>
                                        <div id="detailTable-<?php echo $i; ?>">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Jawaban</th>
                                                            <th>Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            $ceklisja = $this->db->get('tb_jawaban')->result_array();
                                                            $totalJumlah = 0;
                                                            foreach($ceklisja as $index => $jwb): 
                                                                $cekcl1 = $this->db->get_where('tb_hasil', ['hasil_user' => $resp['respo_lembaga'], 'hasil_jawaban' => $jwb['jawab_id']])->num_rows();
                                                                $totalJumlah += $cekcl1;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $index + 1; ?></td>
                                                            <td><?php echo $jwb['jawab_jenis']; ?></td>
                                                            <td><?php echo $cekcl1; ?></td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                        <tr>
                                                            <td colspan="2"><strong>Total:</strong></td>
                                                            <td><?php echo $totalJumlah; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                            // Calculate satisfaction level
                                            $satisfactionLevel = array('Sangat Puas' => 0, 'Puas' => 0, 'Cukup Puas' => 0, 'Tidak Puas' => 0);
                                            $cekcl1 = $this->db->get_where('tb_hasil', ['hasil_user' => $resp['respo_lembaga'], 'hasil_jawaban' => 1])->num_rows();
                                            $cekcl2 = $this->db->get_where('tb_hasil', ['hasil_user' => $resp['respo_lembaga'], 'hasil_jawaban' => 2])->num_rows();
                                            $cekcl3 = $this->db->get_where('tb_hasil', ['hasil_user' => $resp['respo_lembaga'], 'hasil_jawaban' => 3])->num_rows();
                                            $cekcl4 = $this->db->get_where('tb_hasil', ['hasil_user' => $resp['respo_lembaga'], 'hasil_jawaban' => 4])->num_rows();

                                            $satisfactionLevel['Sangat Puas'] += $cekcl1;
                                            $satisfactionLevel['Puas'] += $cekcl2;
                                            $satisfactionLevel['Cukup Puas'] += $cekcl3;
                                            $satisfactionLevel['Tidak Puas'] += $cekcl4;
                                            
                                            // Get the maximum satisfaction level
                                            $maxSatisfactionLevel = max($satisfactionLevel);
                                            $overallSatisfaction = array_search($maxSatisfactionLevel, $satisfactionLevel);
                                            echo $overallSatisfaction;
                                        ?>
                                    </td>
                                </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <script>
    function printCetak() {
      window.print();
    }
</script>
</body>
</html>
