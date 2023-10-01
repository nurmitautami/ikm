<!-- admin/lap_hasil_survei.php -->
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

                        <button type="submit" class="btn btn-primary" name="action" value="print">Print</button>
                    <?php echo form_close(); ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
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
                                            <td class="text-center"><?php echo $i; ?></td>
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
                </div>
            </div>
        </div>
    </div>
</div>
