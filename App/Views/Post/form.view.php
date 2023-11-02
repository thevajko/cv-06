<?php

/** @var  \App\Core\LinkGenerator $link */
/** @var array $data */
/** @var array $errors */
/** @var \App\Models\Post $post */

$post = $data["post"];
$errors = $data["errors"];
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 d-flex gap-4  flex-column">
            <?php if ($post->getId() != null): ?>
                <h1>Editácia príspevku</h1>
            <?php else: ?>
                <h1>Pridanie nového príspevku</h1>
            <?php endif; ?>

            <?php foreach ($errors as $error): ?>
                <div class="alert alert-danger m-1">
                    <?= $error ?>
                </div>
            <?php endforeach; ?>

            <form method="post" enctype="multipart/form-data">
                <label for="inputGroupFile02" class="form-label">Súbor obrázka</label>
                <div class="input-group mb-3 has-validation">
<!--                    <input type="text" class="form-control" name="picture" id="inputGroupFile02" value="--><?php //= $post->getPicture() ?><!--">-->
                    <input type="file" class="form-control " name="picture" id="inputGroupFile02">
                </div>
                <label for="post-text" class="form-label">Text príspevku</label>
                <div class="input-group has-validation mb-3 ">
                    <textarea class="form-control" aria-label="With textarea" name="text" id="post-text"><?= $post->getText() ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Uložiť</button>
            </form>
        </div>
    </div>
</div>