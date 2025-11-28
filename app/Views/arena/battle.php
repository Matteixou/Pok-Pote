<h1>🏆 RÉSULTAT DU COMBAT 🏆</h1>

<div class="row mt-4">
    <div class="col-md-6 text-center">
        <div class="card <?= $result['winner'] === 1 ? 'border-success' : 'border-danger' ?>">
            <div class="card-header <?= $result['winner'] === 1 ? 'bg-success' : 'bg-secondary' ?> text-white">
                <h4><?= htmlspecialchars($pokemon1['name']) ?></h4>
            </div>
            <div class="card-body">
                <p><strong>CP Combat:</strong> <?= $result['p1CP'] ?>/100</p>
                <p><strong>Puissance:</strong> <?= $result['p1Power'] ?></p>
                <?php if ($result['winner'] === 1) : ?>
                    <h2 class="text-success">🎉 VICTOIRE 🎉</h2>
                <?php else : ?>
                    <h2 class="text-danger">😢 DÉFAITE 😢</h2>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="col-md-6 text-center">
        <div class="card <?= $result['winner'] === 2 ? 'border-success' : 'border-danger' ?>">
            <div class="card-header <?= $result['winner'] === 2 ? 'bg-success' : 'bg-secondary' ?> text-white">
                <h4><?= htmlspecialchars($pokemon2['name']) ?></h4>
            </div>
            <div class="card-body">
                <p><strong>CP Combat:</strong> <?= $result['p2CP'] ?>/100</p>
                <p><strong>Puissance:</strong> <?= $result['p2Power'] ?></p>
                <?php if ($result['winner'] === 2) : ?>
                    <h2 class="text-success">🎉 VICTOIRE 🎉</h2>
                <?php else : ?>
                    <h2 class="text-danger">😢 DÉFAITE 😢</h2>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="mt-4 p-4 bg-dark text-white rounded" style="min-height: 300px;">
    <h3>📝 Journal du Combat</h3>
    <hr>
    <pre style="color: #00FF00; font-family: 'Courier New', monospace; white-space: pre-wrap; word-wrap: break-word;">
<?= htmlspecialchars($result['battleLog']) ?>
    </pre>
</div>

<div class="mt-4 text-center">
    <a href="/arena" class="btn btn-primary btn-lg">⚡ Nouveau Combat ⚡</a>
    <a href="/products" class="btn btn-secondary btn-lg">📚 Pokédex</a>
</div>
