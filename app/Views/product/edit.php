<h1>✏️ Entraîner Pokémon</h1>

<div class="row justify-content-center">
    <div class="col-md-6">
        <form method="post" action="/products/update" class="needs-validation">
            <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">

            <div class="mb-3">
                <label for="name" class="form-label">🔥 Nom du Pokémon</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">💬 Type / Description</label>
                <textarea class="form-control" id="description" name="description" rows="4"><?= htmlspecialchars($product['description']) ?></textarea>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">💾 Enregistrer</button>
                <a href="/products" class="btn btn-secondary">❌ Annuler</a>
            </div>
        </form>
    </div>
</div>