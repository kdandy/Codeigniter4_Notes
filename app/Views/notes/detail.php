<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div style="margin:auto;">
            <div class="section-header">
                <h1>DETAIL NOTES</h1>
            </div>
        </div>

        <div class="section-body">
            <div class="d-grid gap-2 d-md-block" style="margin-bottom:1.75rem;">
                <a class="btn btn-primary" href="/notes"><i class="fas fa-arrow-left"></i> Kembali</a>
                <a class=" btn btn-success" href="/notes/edit/<?= $notes['id']; ?>"><i class="fas fa-edit"></i> Edit</a>

                <form action="/notes/<?= $notes['id']; ?>" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Delete this note?')"><i class="fas fa-trash"></i> Hapus</button>
                </form>
            </div>

            <div class="card card-primary h-100">
                <div class="card-header">
                    <h4>
                        <?php if ($notes['title']) : ?>
                            <?= $notes['title']; ?>
                        <?php else : ?>
                            Notes Title is Empty
                        <?php endif; ?>
                    </h4>
                </div>
                <div class="card-body">
                    <p style="margin-bottom:0;">
                        <?php if ($notes['body']) : ?>
                            <?= $notes['body']; ?>
                        <?php else : ?>
                            Notes Body is Empty
                        <?php endif; ?>
                    </p>
                </div>
            </div>
        </div>
</div>
<?= $this->endSection(); ?>