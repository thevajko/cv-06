<?php

/** @var array $data */
/** @var \App\Models\Post $post */
/** @var \App\Core\LinkGenerator $link */
?>

<div class="container-fluid">
    <div class="row justify-content-center">

        <?php foreach ($data["posts"] as $post): ?>
            <div class="col-3 d-flex gap-4  flex-column mb-4">
                <div class="border post d-flex flex-column">
                    <div>
                        <?php
                            $pictureUrl = $post->getPicture();
                            if (!preg_match("#^https+://#", $pictureUrl)) {
                                $pictureUrl = \App\Helpers\FileStorage::UPLOAD_DIR . '/' . $pictureUrl;
                            }
                        ?>
                        <img src="<?= htmlentities($pictureUrl) ?>" class="img-fluid">
                    </div>
                    <div class="m-2">
                        <?= nl2br(htmlentities($post->getText())) ?>
                    </div>
                    <div class="m-2 align-self-end">
                        <a class="btn btn-sm btn-success" href="<?= $link->url("post.edit", ["id" => $post->getId()]) ?>">
                            Edit
                        </a>
                        <a class="btn btn-sm btn-danger" href="<?= $link->url("post.delete", ["id" => $post->getId()]) ?>">
                            Delete
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
