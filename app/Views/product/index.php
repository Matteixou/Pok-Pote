<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>⚡ POKÉPOTE</h1>
    <a href="/products/create" class="btn btn-primary">➕ Capturer un Pokémon</a>
</div>

<?php if (!empty($products)) : ?>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#NumeroDex</th>
                    <th>Nom Pokémon</th>
                    <th>Type</th>
                    <th>Pouvoir</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><strong>#<?= htmlspecialchars($product['id']) ?></strong></td>
                        <td><strong>⭐ <?= htmlspecialchars($product['name']) ?></strong></td>
                        <td><?= htmlspecialchars(substr($product['description'], 0, 30)) ?>...</td>
                        <td><strong>⚡ <?= number_format($product['price'], 0) ?> CP</strong></td>
                        <td class="text-center">
                            <a href="/products/show?id=<?= $product['id'] ?>" class="btn btn-sm btn-info">👁️ Infos</a>
                            <a href="/products/compatibility?id=<?= $product['id'] ?>" class="btn btn-sm btn-success">🤝 Friends</a>
                            <a href="/products/edit?id=<?= $product['id'] ?>" class="btn btn-sm btn-warning">✏️ Éditer</a>
                            <form method="post" action="/products/delete" style="display:inline">
                                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Relâcher ce Pokémon ?')">🗑️ Relâcher</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else : ?>
    <div class="alert alert-info" role="alert">
        <h4 class="alert-heading">📭 Pokédex Vide</h4>
        <p>Aucun Pokémon capturé pour le moment. Allez-y, <a href="/products/create" class="alert-link">capturez votre premier Pokémon</a> !</p>
    </div>
<?php endif; ?>
