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
                    <img src="<?= $post->getPicture() ?>" class="img-fluid">
                </div>
                <div class="m-2">
                    <?= $post->getText() ?>
                </div>
                <div class="m-2 d-flex gap-2 justify-content-end">
                    <a href="" class="btn btn-primary">Upraviť</a>
                    <a href=""  class="btn btn-danger">Zmazať</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>