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
  /*background-color: #4CAF50;*/
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
  <h4>Detail Responden</h4>
  <table>
    <tr>
        <th>Nama</th>
        <td><?php echo $respoid['respo_nama']; ?></td>
    </tr>
    <tr>
        <th>NOPOL</th>
        <td><?php echo $respoid['respo_nopol']; ?></td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td><?php echo $respoid['respo_jk']; ?></td>
    </tr>
    <tr>
        <th>Usia</th>
        <td><?php echo $respoid['respo_usia']; ?> tahun</td>
    </tr>
    <tr>
        <th>Pendidikan</th>
        <td><?php echo $respoid['respo_pendidikan']; ?></td>
    </tr>
    <tr>
        <th>Pekerjaan</th>
        <td><?php echo $respoid['respo_pekerjaan']; ?></td>
    </tr>
  </table>
  <h4>Detail Kuesioner</h4>
  <table>
    <tr>
      <th>No</th>
      <th>Kuesioner</th>
      <th>Jawaban</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach($respokue as $rpk): ?>
        <tr>
            <td><?php echo $i; ?>.</td>
            <td><?php echo $rpk['kuesioner_judul']; ?></td>
            <td><?php echo $rpk['jawab_jenis']; ?></td>
        </tr>   
    <?php $i++; ?>
    <?php endforeach; ?>
  </table>
  <h4>Detail Jawaban</h4>
  <?php $ceklisja = $this->db->get('tb_jawaban')->result_array(); ?>
  <table>
    <tr>
        <th>No</th>
        <th>Jawaban</th>
        <th>Jumlah</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach($ceklisja as $jwb): ?>
<?php $cekcl1 = $this->db->get_where('tb_hasil',['hasil_user' => $respoid['respo_nopol'], 'hasil_jawaban' => $jwb['jawab_id']])->num_rows();?>
        <tr>
            <td><?php echo $i; ?>.</td>
            <td><?php echo $jwb['jawab_jenis']; ?></td>
            <td><?php echo $cekcl1; ?></td>
        </tr>   
    <?php $i++; ?>
    <?php endforeach; ?>
  </table>
</div>
<script>
    function printCetak() {
      window.print();
    }
</script>
</body>
</html>
