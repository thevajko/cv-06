<?php

/** @var \App\Models\Post $post */
/** @var Framework\Support\LinkGenerator $link */
?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-3 d-flex gap-4 flex-column mb-3">
            <div class="border post d-flex flex-column">
                <?php if (!empty($post->getPicture())) : ?>
                    <div>
                        <img src="<?= htmlspecialchars($post->getPicture()) ?>" class="img-fluid" alt="Post picture">
                    </div>
                <?php endif; ?>
                <div class="m-2">
                    <?= nl2br(htmlspecialchars($post->getText())) ?>
                </div>
                <div class="m-2 d-flex gap-2 justify-content-end">
                    <a href="<?= $link->url('post.edit', ['id' => $post->getId()]) ?>" class="btn btn-primary">Upraviť</a>
                    <a href="<?= $link->url('post.delete', ['id' => $post->getId()]) ?>"  class="btn btn-danger" onclick="return confirm('Naozaj zmazať tento príspevok?')">Zmazať</a>
                </div>
            </div>
        </div>
    </div>
</div>