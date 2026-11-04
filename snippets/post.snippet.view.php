<?php

/** @var \App\Models\Post $post */
/** @var Framework\Support\LinkGenerator $link */
?>

<div class="container-fluid">
    <div class="row g-4 justify-content-center">
        <div class="col-auto mw-100">
            <div class="card post h-100">
                <img src="https://picsum.photos/id/1018/800/600.jpg" class="card-img-top" alt="">
                <div class="card-body">
                    <p class="card-text">Toto je text obrázku</p>
                </div>
                <div class="card-footer d-flex gap-2 justify-content-end">
                    <a href="" class="btn btn-primary">Upraviť</a>
                    <form method="post" action="">
                        <button type="submit" class="btn btn-danger">Zmazať</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
