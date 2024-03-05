<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div style="margin:auto;">
            <div class="section-header">
                <h1>CREATE NOTES</h1>
            </div>
        </div>

        <div class="section-body">
            <div class="d-grid gap-2 d-md-block" style="margin-bottom:1.75rem;">
                <a class="btn btn-primary" href="/notes"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <form action="/notes/save" method="POST">
                                <?= csrf_field(); ?>
                                <div class="form-group row mb-4 mt-4">
                                    <label for="title" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="title" id="title">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="body" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="summernote w-100" name="body" id="body"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Publish</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?= $this->endSection(); ?>