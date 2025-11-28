<h1>🎮 Capturer un Pokémon</h1>

<div class="row justify-content-center">
    <div class="col-md-6">
        <form method="post" action="/products/store" class="needs-validation">
            <div class="mb-3">
                <label for="name" class="form-label">🔥 Nom du Pokémon</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Ex: Pikachu" required>
                <small class="form-text text-muted">Donnez un nom unique à votre Pokémon</small>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">💬 Type / Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Ex: Type Électrique, Pokémon avec des pouvoirs électriques..."></textarea>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">🎯 Capturer !</button>
                <a href="/products" class="btn btn-secondary">❌ Retour</a>
            </div>
        </form>
    </div>
</div>