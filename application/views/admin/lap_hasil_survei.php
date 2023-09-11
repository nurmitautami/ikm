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

                    <button type="submit" class="btn btn-primary">Print</button>
                    <?php echo form_close(); ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
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
                </div>
            </div>
        </div>
    </div>
</div>
