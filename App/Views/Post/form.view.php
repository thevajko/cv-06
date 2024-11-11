<?php

/** @var  \App\Core\LinkGenerator $link */
/** @var array $data */
?>
<div class="col-10 d-flex gap-4  flex-column">
    <form method="post" action="<?= $link->url('post.save', ['id' => @$data['post']?->getId()]) ?>"
    <label for="inputGroupFile02" class="form-label">Súbor obrázka</label>
    <div class="input-group mb-3 has-validation">
        <input type="text" class="form-control" name="picture" id="inputGroupFile02" required value="<?= @$data['post']?->getPicture() ?>">
        <!--                    <input type="file" class="form-control " name="picture" id="inputGroupFile02">-->
    </div>
    <label for="post-text" class="form-label">Text príspevku</label>
    <div class="input-group has-validation mb-3 ">
        <textarea class="form-control" aria-label="With textarea" name="text" id="post-text" required><?= @$data['post']?->getText() ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Uložiť</button>
    </form>
</div>
</div>
