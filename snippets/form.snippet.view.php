<?php

/** @var Framework\Support\LinkGenerator $link */
/** @var array $formErrors */
/** @var \App\Models\Post $post */
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-10 d-flex gap-4 flex-column">
            <form method="post" action="" enctype="multipart/form-data">
                <label for="picture" class="form-label fw-bold">Súbor obrázka</label>
                <div class="input-group mb-3 has-validation">
                    <input type="file" class="form-control " name="picture" id="picture">
                </div>
                <label for="text" class="form-label fw-bold">Text príspevku</label>
                <div class="input-group has-validation mb-3">
                    <textarea class="form-control" aria-label="With textarea" name="text" id="text"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Uložiť</button>
            </form>
        </div>
    </div>
</div>