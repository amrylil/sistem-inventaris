<div class="card shadow-sm mb-3">
    <div class="card-header bg-white fw-bold">
        <?php echo $title ?? 'Judul Card'?>
    </div>
    <div class="card-body">
        <p class="card-text">
            <?php echo $slot ?? 'Isi konten card...'?>
        </p>
        <?php if (isset($action)): ?>
            <a href="<?php echo $action['url']?>" class="btn btn-primary btn-sm">
                <?php echo $action['text']?>
            </a>
        <?php endif; ?>
    </div>
</div>