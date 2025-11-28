<h1>🔍 Pokédex - Infos Détaillées</h1>

<div class="row">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h2 class="card-title">⭐ <?= htmlspecialchars($product['name']) ?></h2>
                
                <div class="row mt-4">
                    <div class="col-md-4">
                        <p class="text-muted">🎯 Numéro Pokédex</p>
                        <h5>#<?= htmlspecialchars($product['id']) ?></h5>
                    </div>
                    <div class="col-md-4">
                        <p class="text-muted">⚡ Points de Combat</p>
                        <h5 class="text-success"><?= htmlspecialchars($product['price']) ?> CP</h5>
                    </div>
                    <div class="col-md-4">
                        <p class="text-muted">🎮 Niveau</p>
                        <h5>Lvl <?= (int)($product['price'] / 10) ?></h5>
                    </div>
                </div>

                <hr>

                <div class="mt-4">
                    <p class="text-muted">💬 Type / Description</p>
                    <p class="lead"><?= nl2br(htmlspecialchars($product['description'])) ?></p>
                </div>
            </div>
        </div>

        <div class="mt-4 d-flex gap-2">
            <a href="/products/edit?id=<?= $product['id'] ?>" class="btn btn-warning">✏️ Entraîner</a>
            <a href="/products/compatibility?id=<?= $product['id'] ?>" class="btn btn-info">🤝 Best Friends</a>
            <a href="/products" class="btn btn-secondary">⬅️ Retour</a>
        </div>
    </div>
</div>