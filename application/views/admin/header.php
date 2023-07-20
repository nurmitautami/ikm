<?php 
$menu        = strtolower($this->uri->segment(1));
$sub_menu    = strtolower($this->uri->segment(2));
$sub_menu3   = strtolower($this->uri->segment(3));
 ?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <base href="<?php echo base_url(); ?>"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo $title; ?> - Aplikasi Indeks Kepuasan Masyarakat</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/x-icon" href="assets/images/logo-unila.png" />
    <!-- Custom Stylesheet -->
    <link href="assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
    <?php 
        function waktu_lalu($timestamp) {
    $selisih = time() - strtotime($timestamp) ;
    $detik = $selisih ;
    $menit = round($selisih / 60 );
    $jam = round($selisih / 3600 );
    $hari = round($selisih / 86400 );
    $minggu = round($selisih / 604800 );
    $bulan = round($selisih / 2419200 );
    $tahun = round($selisih / 29030400 );
    if ($detik <= 60) {
        $waktu = $detik.' detik yang lalu';
    } else if ($menit <= 60) {
        $waktu = $menit.' menit yang lalu';
    } else if ($jam <= 24) {
        $waktu = $jam.' jam yang lalu';
    } else if ($hari <= 7) {
        $waktu = $hari.' hari yang lalu';
    } else if ($minggu <= 4) {
        $waktu = $minggu.' minggu yang lalu';
    } else if ($bulan <= 12) {
        $waktu = $bulan.' bulan yang lalu';
    } else {
        $waktu = $tahun.' tahun yang lalu';
    }
    return $waktu;
}
         ?>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <style>
        .brand-title img {
        width: 205px; /* Ubah ukuran gambar sesuai kebutuhan */
        height: auto; /* Sesuaikan tinggi gambar agar tetap proporsional */
        position: absolute;
        top: 15px; /* Ubah posisi vertikal gambar */
        left: 20px; /* Ubah posisi horizontal gambar */
        }
        </style> 




        <div class="nav-header">
            <div class="brand-logo">
                <a href="admin/dashboard">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chevron-compact-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671z"/>
                </svg>
                    <span class="logo-compact"><img src="assets/images/logo-compact.png" alt=""></span>
                    <span class="brand-title mb-10">
                        <img src="assets/images/bphm.png" alt="">
                    </span>
                </a>
            </div>
        </div>

        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                            <?php $cekmsg = $this->db->get_where('tb_krisar',['krisar_status' => 0])->num_rows();
                             ?>
                                <i class="mdi mdi-email-outline"></i>
                                <?php if($cekmsg == 0) { ?>
                                <?php }else { ?>
                                    <span class="badge gradient-1 badge-pill badge-primary"><?php echo $cekmsg; ?></span>
                                <?php } ?>
                            </a>
                            <div class="drop-down  dropdown-menu">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class=""><?php echo $cekmsg; ?> New Messages</span>  
                                    <a href="admin/kritik-saran">Lihat Semua</a>  
                                    
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <?php foreach($pesanbelum as $psb): ?>
                                        <li class="notification-unread">
                                            <a href="admin/kritik-saran/baca/<?php echo $psb['krisar_id']; ?>">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-user"></i></span>
                                                <div class="notification-content">
                                                    <div class="notification-heading"><?php echo $psb['krisar_nama']; ?></div>
                                                    <div class="notification-timestamp"><?php echo waktu_lalu($psb['krisar_created']); ?></div>
                                                    <div class="notification-text"><?php echo word_limiter($psb['krisar_isi'],6); ?></div>
                                                </div>
                                            </a>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                            <?php $ceknoti = $this->db->get_where('tb_notifikasi',['noti_status' => 0])->num_rows();
                             ?>
                                <i class="mdi mdi-bell-outline"></i>
                                <?php if($ceknoti == 0) { ?>
                                <?php }else { ?>
                                    <span class="badge badge-pill gradient-2 badge-primary"><?php echo $ceknoti; ?></span>
                                <?php } ?>
                            </a>
                            <div class="drop-down  dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class=""><?php echo $ceknoti; ?> New Notifications</span>  
                                    <a href="admin/notifikasi">Lihat Semua</a>  
                                    
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <?php if($notifbelum) { ?>
                                            <?php foreach($notifbelum as $nfb): ?>
                                            <li>
                                                <a href="admin/notifikasi/baca/<?php echo $nfb['noti_id']; ?>">
                                                    <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-user"></i></span>
                                                    <div class="notification-content">
                                                        <h6 class="notification-heading"><?php echo $nfb['noti_nama']; ?></h6>
                                                        <span class="notification-text"><?php echo $nfb['noti_ket']; ?></span> 
                                                    </div>
                                                </a>
                                            </li>
                                            <?php endforeach; ?>
                                        <?php }else { ?>
                                            <li><i>Tidak ada notifikasi</i></li>
                                        <?php } ?>
                                    </ul>
                                    
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="assets/images/user/<?php echo $me['admin_foto']; ?>" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile   dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="admin/profil"><i class="icon-user"></i> <span>Profil</span></a>
                                        </li>
                                        <li>
                                            <a href="admin/password"><i class="icon-lock"></i> <span>Password</span></a>
                                        </li>
                                        <li><a href="admin/logout"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Menu</li>
                    <li>
                        <a href="admin/dashboard">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin/indeks">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Indeks</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin/kuesioner">
                            <i class="icon-grid menu-icon"></i><span class="nav-text">Kuesioner</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin/jawaban">
                            <i class="icon-note menu-icon"></i><span class="nav-text">Jawaban</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin/responden">
                            <i class="icon-user menu-icon"></i><span class="nav-text">Responden</span>
                        </a>
                    </li>
                    <li>
                    <a href="admin/lap_hasil_survei">
                            <i class="fa fa-file-text-o"></i><span class="nav-text">Hasil Survei</span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-doc menu-icon"></i><span class="nav-text">Laporan</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="admin/laporan/responden">Responden</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="admin/kritik-saran">
                            <i class="icon-envelope menu-icon"></i><span class="nav-text">Kritik & Saran</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->