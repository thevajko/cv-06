<?php

/** @var \App\Models\Post $post */
/** @var Framework\Support\LinkGenerator $link */

?>

<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-12 d-flex justify-content-end">
            <a href="<?= $link->url('Post.add') ?>" class="btn btn-success">Pridať príspevok</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <?php  foreach ($posts as $post) : ?>
        <div class="col-3 d-flex gap-4 flex-column">
            <div class="border post d-flex flex-column">
                <div>
                    <img src="<?= $post->getPicture() ?>" class="img-fluid" alt="Obrázok príspevku">
                </div>
                <div class="m-2">
                    <?= $post->getText() ?>
                </div>
                <div class="m-2 d-flex gap-2 justify-content-end">
                    <a href="<?= $link->url('Post.edit', ['id' => $post->getId()]) ?>" class="btn btn-primary">Upraviť</a>
                    <form method="post" action="<?= $link->url('Post.delete', ['id' => $post->getId()]) ?>" style="display:inline;" onsubmit="return confirm('Naozaj chcete zmazať tento príspevok?');">
                        <button type="submit" class="btn btn-danger">Zmazať</button>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>