<?php

/** @var \App\Models\Post $post */
/** @var Framework\Support\LinkGenerator $link */

?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <?php /** @var Post[] $posts */
        foreach ($posts as $post) : ?>
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