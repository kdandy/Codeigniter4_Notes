<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>
<div id="app">
    <!-- kontent-->
    <section class="section">
        <div class="container mt-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img class="img-fluid" src="../assets/img/logo.login.png" width="500" height="500">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Login</h4>
                        </div>

                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <div class="alert alert-warning alert-dismissible show fade" style="margin: 0 1.5rem 1.75rem;">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    <?= session()->getFlashData('error'); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('sukses')) : ?>
                            <div class="alert alert-success alert-dismissible show fade" style="margin-bottom:1.75rem;">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    <?= session()->getFlashData('sukses'); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="card-body">
                            <form method="POST" action="<?= base_url('login/process'); ?>" class="needs-validation" novalidate="">
                                <div class="form-group">
                                    <label for="username">username</label>
                                    <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill in your username
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" name='login' tabindex="4">
                                        Login
                                    </button>
                                </div>
                            </form>
                            <div class="text-center fs-6">
                                Don't have an account? <a href="/register">Sign up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>