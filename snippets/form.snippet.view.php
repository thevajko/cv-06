<?php

/** @var Framework\Support\LinkGenerator $link */
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <form method="post" action="">
                <div class="mb-3">
                    <label for="picture" class="form-label">URL obrázku</label>
                    <input type="url" class="form-control" name="picture" id="picture">
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Text príspevku</label>
                    <textarea class="form-control" name="text" id="text"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Uložiť</button>
            </form>
        </div>
    </div>
</div>
