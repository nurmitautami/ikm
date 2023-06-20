<div class="container-fluid">
                <div class="row">
                    <?php $cekbr = $this->db->get_where('tb_notifikasi',['noti_status' => 0])->num_rows();
                     ?>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $title; ?> (<?php echo $cekbr; ?>)</h4>
                                <div class="card-content">
                                    <?php foreach($notifikasi as $not): ?>
                                        <?php if($not['noti_status'] == 0) { ?>
                                            <a href="admin/notifikasi/baca/<?php echo $not['noti_id']; ?>"><div class="alert alert-warning alert-dismissible fade show">
                                        <button class="close"><span aria-hidden="true">&times;</span>
                                        </button> <strong><?php echo $not['noti_nama']; ?></strong> <?php echo $not['noti_ket']; ?></div></a>
                                        <?php }else { ?>
                                            <div class="alert alert-secondary alert-dismissible fade show">
                                        <button class="close"><span aria-hidden="true">&check;</span>
                                        </button> <strong><?php echo $not['noti_nama']; ?></strong> <?php echo $not['noti_ket']; ?></div>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>