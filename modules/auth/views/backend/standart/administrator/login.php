<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SiRiri | Login</title>
    <link rel="icon" href="<?= BASE_URL ?>/asset/img/icon/logosekneg.png" type="image/x-icon" />

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/asset/vendor/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/asset/vendor/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/asset/vendor/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">

        <div class="login-logo">
            <img src="<?= BASE_URL ?>/asset/img/icon/logosekneg.png" width="250" />
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">RFID Inventory System</p>
                <p style="text-align: center;">
                    <a style="color: red;">
                        <?php if ($this->session->flashdata('error')) { ?>
                            <?php echo $this->session->flashdata('error'); ?>
                        <?php $this->session->unset_userdata('error');
                        } ?>

                        <?php if (isset($error) and !empty($error)) : ?>
                            <div class="callout callout-error">
                                <h4><?= cclang('error'); ?>!</h4>
                                <p><?= $error; ?></p>
                            </div>
                        <?php endif; ?>
                    </a>
                </p>

                <form action="" method="post" name='form_login' id='form_login'>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="username" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->

                        <!-- /.col -->
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>

                </form>
                <p class="mb-0 mt-1">
                    <a href="<?= admin_site_url('/register'); ?>" class="text-center">Don't have an account yet?</a>
                </p>

                <!-- <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div> -->
                <!-- /.social-auth-links -->


            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <b>v1.0.0</b>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= BASE_URL ?>/asset/vendor/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= BASE_URL ?>/asset/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= BASE_URL ?>/asset/vendor/dist/js/adminlte.min.js"></script>

</body>

</html>