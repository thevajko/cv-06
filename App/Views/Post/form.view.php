<?php
// ...existing code...
if (isset($errors) && !empty($errors)) : ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errors as $error) : ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<form method="post" action="<?= $link->url('Post.save') ?>">
    <!-- ...existing form fields... -->
</form>
<?php
// ...existing code...
?>
