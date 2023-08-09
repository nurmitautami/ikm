<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $title; ?></h4>
                                <?php if($this->session->flashdata('flash')): ?>
                                    <div class="alert alert-success"><strong><i class="fa fa-check-circle"></i></strong> <?php echo $this->session->flashdata('flash'); ?></div>
                                <?php endif; ?>
                                <?php if($this->session->flashdata('error')): ?>
                                    <div class="alert alert-danger"><strong><i class="fa fa-times-circle"></i></strong> <?php echo $this->session->flashdata('error'); ?></div>
                                <?php endif; ?>
                                <div class="basic-form">
                                    <form action="" method="post">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Nama</label>
                                                <input type="text" class="form-control input-default" name="nama" value="<?php echo $me['admin_nama']; ?>" autofocus>
                                                <small class="text-danger"><?php echo form_error('nama'); ?></small>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                                <input type="text" class="form-control input-default" name="email" value="<?php echo $me['admin_email']; ?>">
                                                <small class="text-danger"><?php echo form_error('email'); ?></small>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Password</label>
                                                <input type="password" class="form-control input-default" name="password">
                                                <small class="text-danger"><?php echo form_error('password'); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn mb-1 btn-success">Simpan</button>
                                        </div>
                                    </form>
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
        