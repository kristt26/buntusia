<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/logo.png" />
    <title>CV. BUNTUSIA | LOGIN</title>
    <link href="<?php echo base_url(); ?>/template/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/login/css/app.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/template/vendor/fontawesome-free/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body style="background-color: #e7e7e7;">
    <main class=" d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-12 col-md-9 col-lg-4 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4" style="color:black">
                            <h1 class="h2">MONITORING PROYEK <br>CV. BUNTUSIA</h1>
                            <p></p>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <div class="text-center">
                                        <img src="<?php echo base_url(); ?>/assets/img/logo.png" alt="Charles Hall"
                                            class="img-fluid rounded-circle" style="height: 70px;">
                                    </div>
                                    <?php if (session()->getFlashdata('errors') != '') {?>
                                    <div class="alert alert-danger alert-dismissible"
                                        style="margin-top: 5px;margin-bottom: -10px;">
                                        <p style="line-height: 17px;margin-bottom: 0px;font-size: 15px;">
                                            <?=session()->getFlashdata('errors')?></p>
                                    </div>
                                    <?php }?>
                                    <br>
                                    <form action="<?php echo base_url('login/check'); ?>" method="post"
                                        class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                                                </div>
                                                <input type="text" name="username" class="form-control"
                                                    placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="margin-top: -10px;">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-key"></i></div>
                                                </div>
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="Password">
                                            </div>
                                        </div>
                                        <!-- <div style="text-align: left;margin-top: -15px;">
											<a href="<?=base_url('login/forgot_password')?>" style="width: 100%;"><small>Lupa Password</small></a>
										</div> -->
                                        <div style="text-align: center;margin-top: 17px;margin-bottom: -20px;">
                                            <button type="submit" class="btn btn-lg btn-primary" style="width: 100%;"><i
                                                    class="fa fa-sign-in-alt"></i> Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>