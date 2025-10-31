<?php /** @var array $errors */ ?>
<div class="container mt-5">
    <h2>Pridať nový post</h2>
    <form method="post">
        <div class="mb-3">
            <label for="text" class="form-label">Text</label>
            <textarea class="form-control" id="text" name="text" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="picture" class="form-label">Obrázok (URL)</label>
            <input type="text" class="form-control" id="picture" name="picture" placeholder="URL obrázka" required>
        </div>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary">Pridať</button>
        <a href="?c=Post&a=index" class="btn btn-secondary">Späť</a>
    </form>
</div>

