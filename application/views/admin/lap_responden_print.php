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
    <tr>
      <th>No</th>
      <th>Tgl</th>
      <th>Nama</th>
      <th>NOPOL</th>
      <th>Jenis Kelamin</th>
      <th>Usia</th>
      <th>Pekerjaan</th>
      <th>Pendidikan</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach($responden as $resp): ?>
    <tr>
        <td><?php echo $i; ?>.</td>
        <td><?php echo date('d/m/Y', strtotime($resp['respo_created'])); ?></td>
        <td><?php echo $resp['respo_nama']; ?></td>
        <td><?php echo $resp['respo_nopol']; ?></td>
        <td><?php echo $resp['respo_jk']; ?></td>
        <td><?php echo $resp['respo_usia']; ?> Tahun</td>
        <td><?php echo $resp['respo_pekerjaan']; ?></td>
        <td><?php echo $resp['respo_pendidikan']; ?></td>
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
