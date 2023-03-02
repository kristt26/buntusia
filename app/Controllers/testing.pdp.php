<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?=base_url()?>/logo.png" rel="icon">
    <title><?=$title?></title>
    <link href="<?=base_url()?>/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>/template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>/template/css/ruang-admin.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('/template/css/responsive.bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/template/css/responsive.jqueryui.min.css') ?>">
    <link href="<?=base_url()?>/template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?=base_url()?>/template/vendor/sweetalert/sweetalert2.min.css" rel="stylesheet">
    <link href="<?=base_url()?>/template/vendor/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
    <script src="<?=base_url()?>/template/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>/template/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?=base_url()?>/template/vendor/select2/dist/js/select2.min.js"></script>
    <script src="<?=base_url()?>/template/vendor/chart.js/Chart.min.js"></script>
    <!-- Page level custom scripts -->

    <script src="<?=base_url()?>/template/vendor/sweetalert/sweetalert2.min.js"></script>
    <script src="<?=base_url()?>/template/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>/template/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url()?>/template/vendor/datatables/dataTables.responsive.min.js"></script>
    <script src="<?=base_url()?>/template/vendor/ckeditor/ckeditor.js"></script>
    <style type="text/css">
    .dt-body-center {
        text-align: center;
    }

    .dt-body-right {
        text-align: right;
    }

    #clockdiv {
        color: #fff;
        display: inline-block;
        font-weight: 100;
        text-align: center;
        font-size: 20px;
    }

    #clockdiv>div {
        padding: 7px;
        border-radius: 3px;
        background: #00BF96;
        display: inline-block;
    }

    #clockdiv div>span {
        padding: 10px;
        border-radius: 3px;
        background: #00816A;
        display: inline-block;
    }

    .smalltext {
        padding-top: 5px;
        font-size: 14px;
    }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#"
                style="background: #F4D03F !important;">
                <div class="sidebar-brand-icon" style="font-size: 14px; font-weight: normal;">
                    <img src="<?=base_url()?>/logo.png"> &nbsp;&nbsp; Layanan Internet
                </div>
                <!-- <div class="sidebar-brand-text mx-5">Layanan Internet</div> -->
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <?php if(session()->get('level') == 'admin' || session()->get('level') == 'kepala' || session()->get('level') == 'pegawai'){ ?>
                <a class="nav-link" href="<?=base_url('pegawai')?>">
                    <?php } else if(session()->get('level') == 'dosen'){ ?>
                    <a class="nav-link" href="<?=base_url('dosen')?>">
                        <?php } else { ?>
                        <a class="nav-link" href="<?=base_url('mahasiswa')?>">
                            <?php } ?>
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Features
            </div>
            <?php if(session()->get('level') == 'admin'){ ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
                    aria-expanded="true" aria-controls="collapseBootstrap">
                    <i class="far fa-fw fa-user"></i>
                    <span>Pengguna</span>
                </a>
                <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?=base_url('pegawai/pegawai')?>">Pegawai</a>
                        <a class="collapse-item" href="<?=base_url('pegawai/dosen')?>">Dosen</a>
                        <a class="collapse-item" href="<?=base_url('pegawai/mahasiswa')?>">Mahasiswa</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm3"
                    aria-expanded="true" aria-controls="collapseForm3">
                    <i class="fa fa-check-square"></i>
                    <span>Verifikasi Pengguna</span>
                </a>
                <div id="collapseForm3" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?=base_url('pegawai/pegawai_ver')?>">Pegawai</a>
                        <a class="collapse-item" href="<?=base_url('pegawai/dosen_ver')?>">Dosen</a>
                        <a class="collapse-item" href="<?=base_url('pegawai/mahasiswa_ver')?>">Mahasiswa</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm"
                    aria-expanded="true" aria-controls="collapseForm">
                    <i class="fa fa-database"></i>
                    <span>Master</span>
                </a>
                <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?=base_url('pegawai/unit')?>">Unit</a>
                        <a class="collapse-item" href="<?=base_url('pegawai/fakultas')?>">Fakultas</a>
                        <a class="collapse-item" href="<?=base_url('pegawai/prodi')?>">Prodi</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fa fa-wifi"></i>
                    <span>Bandwidth</span>
                </a>
                <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?=base_url('pegawai/bandwidth')?>">Manajemen Bandwidth</a>
                        <a class="collapse-item" href="<?=base_url('pegawai/monitoring')?>">Monitoring Pengguna</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('pegawai/pengajuan')?>">
                    <i class="fa fa-check-square"></i>
                    <span>Verifikasi Layanan</span>
                </a>
            </li>
            <?php } ?>
            <?php if(session()->get('level') == 'kepala'){ ?>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('pegawai/laporan')?>">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Laporan</span>
                </a>
            </li>
            <?php } ?>
            <?php if(session()->get('level') == 'dosen'){ ?>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('dosen/layanan')?>">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Pengajuan Layanan</span>
                </a>
            </li>
            <?php } ?>

            <?php if(session()->get('level') == 'pegawai'){ ?>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('pegawai/layanan')?>">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Pengajuan Layanan</span>
                </a>
            </li>
            <?php } ?>

            <?php if(session()->get('level') == 'mahasiswa'){ ?>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('mahasiswa/layanan')?>">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Pengajuan Layanan</span>
                </a>
            </li>
            <?php } ?>

            <hr class="sidebar-divider">
            <div class="version" id="version-ruangadmin"></div>
        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top"
                    style="background: #D4AC0D !important;">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="sidebar-brand-icon">
                        <!-- <img src="<?=base_url()?>/logo.png" style="height: 35px;"> -->
                    </div>
                    <!-- <div class="mx-3" style="color: #fff;">Layanan Internet</div> -->

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="<?=base_url()?>/template/img/boy.png"
                                    style="max-width: 60px">
                                <span
                                    class="ml-2 d-none d-lg-inline text-white small"><?=session()->get('nama')?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <?php if(session()->get('level') == 'admin' || session()->get('level') == 'kepala' || session()->get('level') == 'pegawai'){ ?>
                                <a class="dropdown-item" href="<?=base_url('pegawai/profile')?>">
                                    <?php } else if(session()->get('level') == 'dosen'){ ?>
                                    <a class="dropdown-item" href="<?=base_url('dosen/profile')?>">
                                        <?php } else { ?>
                                        <a class="dropdown-item" href="<?=base_url('mahasiswa/profile')?>">
                                            <?php } ?>
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Profile
                                        </a>
                                        <?php if(session()->get('level') == 'admin' || session()->get('level') == 'kepala' || session()->get('level') == 'pegawai'){ ?>
                                        <a class="dropdown-item" href="<?=base_url('pegawai/password_edit')?>">
                                            <?php } else if(session()->get('level') == 'dosen'){ ?>
                                            <a class="dropdown-item" href="<?=base_url('dosen/password_edit')?>">
                                                <?php } else { ?>
                                                <a class="dropdown-item"
                                                    href="<?=base_url('mahasiswa/password_edit')?>">
                                                    <?php } ?>
                                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                                    Update Password
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item logout" href="#">
                                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                    Logout
                                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- Topbar -->
                <?= $this->renderSection('content') ?>

            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>copyright &copy; 2021 - developed by
                            <b><a href="https://project.biz.id/" target="_blank">Project ID</a></b>
                        </span>
                    </div>
                </div>
            </footer>
            <!-- Footer -->
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="<?=base_url()?>/template/js/ruang-admin.min.js"></script>
    <script type="text/javascript">
    var level = "<?=session()->get('level')?>";
    document.querySelector(".logout").addEventListener('click', function() {
        Swal.fire({
            title: "",
            text: "Anda yakin akan keluar dari aplikasi ?",
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Tutup",
            cancelButtonClass: "btn-light",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Ya",
        }).then((res) => {
            if (res.value) {
                if (level == 'admin' || level == 'kepala' || level == 'pegawai') {
                    window.location.href = "<?php echo base_url('pegawai/logout');?>";
                } else if (level == 'dosen') {
                    window.location.href = "<?php echo base_url('dosen/logout');?>";
                } else {
                    window.location.href = "<?php echo base_url('mahasiswa/logout');?>";
                }
            } else if (res.dismiss == 'cancel') {
                console.log('cancel');
            }
        });
    });
    </script>
    <script type="text/javascript">
    var success = "<?= session()->getFlashdata('success')?>";
    var errors = "<?= session()->getFlashdata('errors')?>";
    if (success != '') {
        Swal.fire({
            title: "",
            text: success,
            type: "success",
            confirmButtonColor: "btn-primary",
            confirmButtonText: "Ok"
        });
    }
    if (errors != '') {
        Swal.fire({
            title: "",
            text: errors,
            type: "error",
            confirmButtonColor: "#326abc",
            confirmButtonText: "Ok"
        });
    }
    </script>

</body>

</html>