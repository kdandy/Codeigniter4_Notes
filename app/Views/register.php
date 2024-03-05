<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>
<div id="app">
    <section class="section">
        <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-12 col-lg-9 col-xl-7">
                        <div class="card shadow-2-strong card-primary" style="border-radius: 15px;">
                            <div class="card-body p-4 p-md-5">
                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>

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

                                <form action="<?= base_url(); ?>/register/process" method="POST">
                                    <div class="row">
                                        <div class="col-md-12 mb-4 d-flex align-items-center">
                                            <div class="form-outline datepicker w-100">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" name="username" class="form-control form-control-lg" id="username" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-4 d-flex align-items-center">
                                            <div class="form-outline datepicker w-100">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control form-control-lg" id="password" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-4 d-flex align-items-center">
                                            <div class="form-outline datepicker w-100">
                                                <label for="password_conf" class="form-label">Password</label>
                                                <input type="password" name="password_conf" class="form-control form-control-lg" id="password_conf" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label" for="fullname">Fullname</label>
                                                <input type="text" id="fullname" name="fullname" class="form-control form-control-lg" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 d-md-block" style="margin-bottom:1.75rem;">
                                        <a class="btn btn-warning" href="/">
                                            <i class="fas fa-arrow-left"></i> Kembali </a>
                                        <input class="btn btn-primary" type="submit" value="Submit" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</div>
<?= $this->endSection(); ?>