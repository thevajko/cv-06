<?php
/** @var \App\Models\Post[] $posts */
/** @var Framework\Support\LinkGenerator $link */
?>

<div class="container-fluid">
    <!-- Add button for creating new post -->
    <div class="d-flex justify-content-end mb-3">
        <a href="<?= $link->url('post.add') ?>" class="btn btn-success">Pridať príspevok</a>
    </div>
    <div class="row justify-content-center">
        <?php foreach ($posts as $post): ?>
        <div class="col-3 d-flex gap-4 flex-column">
            <div class="border post d-flex flex-column">
                <div>
                    <img src="<?= $post->getPicture() ?>" class="img-fluid" alt="<?= htmlspecialchars(substr($post->getText(), 0, 80), ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="m-2">
                    <?= $post->getText() ?>
                </div>
                <div class="m-2 d-flex gap-2 justify-content-end">
                    <a href="<?= $link->url('post.edit', ['id' => $post->getId()]) ?>" class="btn btn-primary">Upraviť</a>
                    <a href="<?= $link->url('post.delete', ['id' => $post->getId()]) ?>"  class="btn btn-danger">Zmazať</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</div>