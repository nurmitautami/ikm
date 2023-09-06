<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $title; ?></h4>
                    <?php echo form_open('admin/cetak_laporan', array('method' => 'POST')); ?>
                    <div class="form-group">
                            <label for="start_date">Start Date:</label>
                            <input type="date" class="form-control" name="start_date" required>
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date:</label>
                            <input type="date" class="form-control" name="end_date" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Print</button>
                    <?php echo form_close(); ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
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
                </div>
            </div>
        </div>
    </div>
</div>
