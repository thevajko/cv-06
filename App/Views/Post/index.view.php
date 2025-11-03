<?php
/** @var array $posts */
/** @var Framework\Support\LinkGenerator $link */
?>
<div class="container">
    <h1>Príspevky</h1>
    <?php if (empty($posts)) : ?>
        <p>Žiadne príspevky.</p>
    <?php else: ?>
        <div class="row">
            <?php foreach ($posts as $post) : ?>
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-3 d-flex gap-4 flex-column mb-3">
                            <div class="border post d-flex flex-column">
                                <?php if ($post->getPicture()) : ?>
                                    <div>
                                        <img src="<?= htmlspecialchars($post->getPicture()) ?>" class="img-fluid" alt="Post picture">
                                    </div>
                                <?php endif; ?>
                                <div class="m-2">
                                    <?= nl2br(htmlspecialchars($post->getText())) ?>
                                </div>
                                <div class="m-2 d-flex gap-2 justify-content-end">
                                    <a href="<?= $link->url(['post.edit', $post->getId()]) ?>" class="btn btn-primary">Upraviť</a>
                                    <a href="<?= $link->url(['post.delete', $post->getId()]) ?>"  class="btn btn-danger">Zmazať</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

