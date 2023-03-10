<!DOCTYPE html>
<html lang="en" ng-app="apps" ng-controller="indexController">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?=base_url()?>/logo.png" rel="icon">
    <title>CV. BUNTUSIA</title>
    <link href="<?=base_url()?>/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>/template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>/template/css/ruang-admin.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('/template/css/responsive.bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('/template/css/responsive.jqueryui.min.css')?>">
    <link href="<?=base_url()?>/template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?=base_url()?>/template/vendor/sweetalert/sweetalert2.min.css" rel="stylesheet">
    <link href="<?=base_url()?>/template/vendor/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>/template/vendor/datatables/btn.css" rel="stylesheet">
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
    <script src="<?=base_url()?>/template/vendor/datatables/btn.js"></script>
    <script src="<?=base_url()?>/template/vendor/datatables/print.js"></script>
    <script src="<?=base_url()?>/template/vendor/ckeditor/ckeditor.js"></script>
    <script src="<?=base_url()?>/template/vendor/moment/min/moment.min.js"></script>
    <script src="<?=base_url()?>/template/vendor/moment/moment-precise-range.js"></script>
    <!-- <script src="<?=base_url()?>/template/vendor/moment-range/dist/moment-range.js"></script> -->
    <script src="<?=base_url()?>/assets/backend/libs/angular/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-sanitize/1.8.2/angular-sanitize.min.js"
        integrity="sha512-JkCv2gG5E746DSy2JQlYUJUcw9mT0vyre2KxE2ZuDjNfqG90Bi7GhcHUjLQ2VIAF1QVsY5JMwA1+bjjU5Omabw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?=base_url()?>/assets/backend/js/apps.js"></script>
    <script src="<?=base_url()?>/assets/backend/js/services/helper.services.js"></script>
    <script src="<?=base_url()?>/assets/backend/js/services/auth.services.js"></script>
    <script src="<?=base_url()?>/assets/backend/js/services/admin.services.js"></script>
    <script src="<?=base_url()?>/assets/backend/js/services/message.services.js"></script>
    <script src="<?=base_url()?>/assets/backend/js/controllers/admin.controllers.js"></script>
    <script src="<?=base_url()?>/assets/backend/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="<?=base_url()?>/assets/backend/libs/swangular/swangular.js"></script>
    <script src="<?=base_url()?>/assets/backend/libs/angular-datatables/dist/angular-datatables.min.js"></script>
    <script src="<?=base_url()?>/assets/backend/libs/angular-locale_id-id.js"></script>
    <script src="<?=base_url()?>/assets/backend/libs/input-mask/angular-input-masks-standalone.min.js"></script>
    <script src="<?=base_url()?>/assets/backend/libs/jquery.PrintArea.js"></script>
    <script src="<?=base_url()?>/assets/backend/libs/angular-base64-upload/dist/angular-base64-upload.min.js"></script>
    <script src="<?=base_url()?>/assets/backend/libs/loading/dist/loadingoverlay.min.js"></script>
    <script src="<?=base_url()?>/assets/backend/libs/calendar/main.min.js"></script>
    <script src="<?=base_url()?>/assets/backend/libs/calendar/locales-all.min.js"></script>
    <script
        src="<?=base_url()?>/assets/backend/libs/angularjs-currency-input-mask/dist/angularjs-currency-input-mask.min.js">
    </script>

    <script src="<?=base_url()?>/assets/backend/libs/jquery.PrintArea.js"></script>
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon" style="font-weight: normal;font-size: 14px;">
                    <img
                        src="https://img.icons8.com/external-kiranshastry-lineal-color-kiranshastry/64/000000/external-building-business-and-management-kiranshastry-lineal-color-kiranshastry-6.png">
                    Monitoring Proyek
                </div>
                <!-- <div class="sidebar-brand-text mx-5" style="font-size: 14px; font-weight: normal;"></div> -->
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="<?=base_url('home')?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Menu
            </div>
            <?php if (session()->get('level') == 'Administrator') {?>

            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('admin/proyek')?>">
                    <i class="fa fa-building"></i>
                    <span>Proyek</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('admin/laporan')?>">
                    <i class="fa fa-file"></i>
                    <span>Laporan</span>
                </a>
            </li>
            <?php }?>
            <!-- Pengawas -->
            <?php if (session()->get('level') == 'Pengawas') {?>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('pengawas/proyek')?>">
                    <i class="fa fa-building"></i>
                    <span>Proyek</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('pengawas/monitoring')?>">
                    <i class="fa fa-folder-open"></i>
                    <span>Monitoring</span>
                </a>
            </li>
            <?php }?>
            <!-- Manajer -->
            <?php if (session()->get('level') == 'Manajer') {?>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('manajer/pegawai')?>">
                    <i class="fa fa-users"></i>
                    <span>Daftar Pegawai</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('manajer/pengguna')?>">
                    <i class="fa fa-user"></i>
                    <span>Pengguna</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('manajer/proyek')?>">
                    <i class="fa fa-building"></i>
                    <span>Proyek</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('manajer/laporan')?>">
                    <i class="fa fa-file"></i>
                    <span>Laporan</span>
                </a>
            </li>
            <?php }?>
            <hr class="sidebar-divider">
            <div class="version" id="version-ruangadmin"></div>
        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
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


                                <a class="dropdown-item logout" href="#">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- Topbar -->
                <?=$this->renderSection('content')?>

            </div>
            <!-- Footer -->
            <footer class="sticky-footer" style="background-color: #00617e; color: white; padding: 1rem 0 !important;">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>copyright &copy; 2021 - developed by
                            <b><a href="https://project.biz.id/" target="_blank"
                                    style="color: #ff6666 !important">Octagon Cendrawasih
                                    Solution
                                </a></b>
                        </span>
                    </div>
                </div>
            </footer>
            <!-- Footer -->
        </div>
    </div>

    <!-- Scroll to top -->
    <a class=" scroll-to-top rounded" href="#page-top">
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

                window.location.href = "<?php echo base_url('logout'); ?>";

            } else if (res.dismiss == 'cancel') {
                console.log('cancel');
            }
        });
    });
    </script>
    <script type="text/javascript">
    var success = "<?=session()->getFlashdata('success')?>";
    var errors = "<?=session()->getFlashdata('errors')?>";
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