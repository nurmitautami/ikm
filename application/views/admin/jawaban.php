<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $title; ?></h4>
                                <?php if($this->session->flashdata('flash')): ?>
                                    <div id="notification" class="alert alert-success"><strong><i class="fa fa-check-circle"></i></strong> <?php echo $this->session->flashdata('flash'); ?></div>
                                <?php endif; ?>
                                <script>
                                    // Menghilangkan notifikasi setelah beberapa waktu
                                    setTimeout(function() {
                                        var notification = document.getElementById('notification');
                                        if (notification) {
                                            notification.style.display = 'none';
                                        }
                                    }, 5000);
                                </script>
                                <?php if($this->session->flashdata('error')): ?>
                                    <div class="alert alert-danger"><strong><i class="fa fa-times-circle"></i></strong> <?php echo $this->session->flashdata('error'); ?></div>
                                <?php endif; ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jenis</th>
                                                <th>Emoji</th>
                                                <th>Warna Teks</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($jawab as $jwb): ?>
                                            <tr>
                                                <td><?php echo $i; ?>.</td>
                                                <td><?php echo $jwb['jawab_jenis']; ?></td>
                                                <td><?php echo $jwb['jawab_emoji']; ?></td>
                                                <td><?php echo $jwb['jawab_type_text']; ?></td>
                                                <td>
                                                    <a href="admin/jawaban/edit/<?php echo $jwb['jawab_id']; ?>" class="btn mb-1 btn-info"><i class="fa fa-pencil"></i></a>
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
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        