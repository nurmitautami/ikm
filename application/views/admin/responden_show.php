<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $title; ?></h4>
                                <a href="admin/responden/print/<?php echo $this->uri->segment(4); ?>" target="_blank" class="btn mb-3 btn-primary">Print</a>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Nama</th>
                                            <td><?php echo $respoid['respo_nama']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Lembaga/Instansi</th>
                                            <td><?php echo $respoid['respo_lembaga']; ?></td>
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
                                </div>
                                <h4 class="card-title">Detail Kuesioner</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kuesioner</th>
                                                <th>Jawaban</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($respokue as $rpk): ?>
                                                <tr>
                                                    <td><?php echo $i; ?>.</td>
                                                    <td><?php echo $rpk['kuesioner_judul']; ?></td>
                                                    <td><?php echo $rpk['jawab_jenis']; ?></td>
                                                </tr>   
                                            <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <!-- <tr>
                                            <th colspan="2">Rata-rata</th>
                                            <?php $cekcl1 = $this->db->get_where('tb_hasil',['hasil_user' => $respoid['respo_lembaga'], 'hasil_jawaban' => 1])->num_rows();?>
                                            <?php $cekcl2 = $this->db->get_where('tb_hasil',['hasil_user' => $respoid['respo_lembaga'], 'hasil_jawaban' => 2])->num_rows();?>
                                            <?php $cekcl3 = $this->db->get_where('tb_hasil',['hasil_user' => $respoid['respo_lembaga'], 'hasil_jawaban' => 3])->num_rows();?>
                                            <?php $cekcl4 = $this->db->get_where('tb_hasil',['hasil_user' => $respoid['respo_lembaga'], 'hasil_jawaban' => 4])->num_rows();?>
                                            <?php $nilai = array($cekcl1,$cekcl2,$cekcl3,$cekcl4); ?>
                                            <th><?php echo max($nilai); ?></th>
                                        </tr> -->
                                    </table>
                                </div>
                   <!-- ... (existing code) ... -->
<!-- Calculate total and satisfaction level -->
<?php
    $cekcl1 = $this->db->get_where('tb_hasil',['hasil_user' => $respoid['respo_lembaga'], 'hasil_jawaban' => 1])->num_rows();
    $cekcl2 = $this->db->get_where('tb_hasil',['hasil_user' => $respoid['respo_lembaga'], 'hasil_jawaban' => 2])->num_rows();
    $cekcl3 = $this->db->get_where('tb_hasil',['hasil_user' => $respoid['respo_lembaga'], 'hasil_jawaban' => 3])->num_rows();
    $cekcl4 = $this->db->get_where('tb_hasil',['hasil_user' => $respoid['respo_lembaga'], 'hasil_jawaban' => 4])->num_rows();
    $totalResponses = $cekcl1 + $cekcl2 + $cekcl3 + $cekcl4;
    $satisfactionLevel = array('Sangat  Puas' => $cekcl1, 'Puas' => $cekcl2, 'Cukup Puas' => $cekcl3, 'Tidak Puas' => $cekcl4);
    $maxSatisfactionLevel = max($satisfactionLevel);
?>

<div class="mt-4">
    <h4 class="card-title">Detail Jawaban</h4>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Jawaban</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($satisfactionLevel as $level => $count): ?>
                    <tr>
                        <td><?php echo $level; ?></td>
                        <td><?php echo $count; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Total Tanggapan :</th>
                    <td><?php echo $totalResponses; ?></td>
                </tr>
                <tr>
                    <th>Hasil Tanggapan :</th>
                    <td><?php echo array_search($maxSatisfactionLevel, $satisfactionLevel); ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
