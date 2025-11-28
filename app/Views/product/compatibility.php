<h1>🤝 Compatibilité - Best Friends 🤝</h1>

<div class="alert alert-info mb-4">
    <strong>💭 <?= htmlspecialchars($pokemon['name']) ?></strong> - Avec qui s'entend-il/elle le mieux ?
</div>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-center bg-light">
            <div class="card-body">
                <h5>⭐ <?= htmlspecialchars($pokemon['name']) ?></h5>
                <small class="text-muted">#<?= $pokemon['id'] ?></small>
                <p class="mt-2"><small><?= htmlspecialchars(substr($pokemon['description'], 0, 50)) ?>...</small></p>
            </div>
        </div>
    </div>
</div>

<h3>📊 Classement des Compatibilités</h3>

<?php if (!empty($compatibilities)) : ?>
    <div class="row">
        <?php foreach ($compatibilities as $index => $compat) : ?>
            <?php 
                $medalEmoji = match($index) {
                    0 => '🥇',
                    1 => '🥈',
                    2 => '🥉',
                    default => '⭐'
                };
                
                $scoreColor = match(true) {
                    $compat['score'] >= 85 => 'success',
                    $compat['score'] >= 70 => 'info',
                    $compat['score'] >= 55 => 'warning',
                    $compat['score'] >= 40 => 'danger',
                    default => 'dark'
                };
                
                $scoreIcon = match(true) {
                    $compat['score'] >= 85 => '❤️',
                    $compat['score'] >= 70 => '💚',
                    $compat['score'] >= 55 => '💛',
                    $compat['score'] >= 40 => '🧡',
                    default => '💔'
                };
            ?>
            <div class="col-md-6 mb-3">
                <div class="card border-3 border-<?= $scoreColor ?>">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <h5><?= $medalEmoji ?> <?= htmlspecialchars($compat['pokemon']['name']) ?></h5>
                                <small class="text-muted">#<?= $compat['pokemon']['id'] ?></small>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-<?= $scoreColor ?> p-2">
                                    <strong><?= $compat['score'] ?>%</strong>
                                </span>
                            </div>
                        </div>

                        <div class="progress mb-2" style="height: 8px;">
                            <div class="progress-bar bg-<?= $scoreColor ?>" role="progressbar" style="width: <?= $compat['score'] ?>%" aria-valuenow="<?= $compat['score'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <p class="mb-2">
                            <small class="text-muted"><?= htmlspecialchars(substr($compat['pokemon']['description'], 0, 60)) ?>...</small>
                        </p>

                        <div class="alert alert-sm mb-0" style="padding: 8px 12px; font-size: 0.95rem;">
                            <?= $scoreIcon ?> <?= $compat['message'] ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else : ?>
    <div class="alert alert-warning">
        ⚠️ Il n'y a pas d'autres Pokémon pour les comparaisons !
    </div>
<?php endif; ?>

<div class="mt-4">
    <a href="/products/show?id=<?= $pokemon['id'] ?>" class="btn btn-secondary">⬅️ Retour</a>
    <a href="/products" class="btn btn-secondary">📚 Pokédex</a>
</div>
