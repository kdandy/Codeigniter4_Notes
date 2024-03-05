<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div style="margin:auto;">
            <div class="section-header">
                <h1>ALLTAN NOTES</h1>
            </div>
        </div>

        <div class="section-body">
            <a href="/notes/create" class="btn btn-icon icon-left btn-primary" style="margin-bottom:1.75rem;">Tambah Notes +</a>

            <?php if (session()->getFlashData('success')) : ?>
                <div class="alert alert-success alert-dismissible show fade" style="margin-bottom:1.75rem;">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        <?= session()->getFlashData('success'); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($notes) : ?>
                <div class="row g-4">
                    <?php foreach ($notes as $n) : ?>
                        <div class="col-1 col-md-4 mb-3">
                            <div class="card card-primary h-100">
                                <div class="card-header">
                                    <h4>
                                        <?php if ($n['title']) : ?>
                                            <?= $n['title']; ?>
                                        <?php else : ?>
                                            Notes Title is Empty
                                        <?php endif; ?>
                                    </h4>
                                    <div class="card-header-action">
                                        <a href="/notes/<?= $n['id']; ?>" class="btn btn-primary">
                                            View Detail
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p style="margin-bottom:0;">
                                        <?php if ($n['body']) : ?>
                                            <?= (str_word_count($n['body']) > 60 ? substr($n['body'], 0, 100) . "..." : $n['body']) ?>
                                        <?php else : ?>
                                            Notes Body is Empty
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <div class="alert alert-warning">
                    Notes is Empty, Please Create Notes
                </div>
            <?php endif; ?>
        </div>
</div>
<?= $this->endSection(); ?>