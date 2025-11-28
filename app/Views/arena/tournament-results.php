<h1>🏆 RÉSULTATS DU TOURNOI 🏆</h1>

<div class="alert alert-success" role="alert">
    <strong>🎉 Le Tournoi est Terminé !</strong>
</div>

<!-- Champion -->
<div class="row mb-4">
    <div class="col-md-8 mx-auto">
        <div class="card border-success">
            <div class="card-header bg-success text-white text-center">
                <h3>👑 CHAMPION ULTIME 👑</h3>
            </div>
            <div class="card-body text-center">
                <h2 class="text-success"><?= htmlspecialchars($winner['name']) ?></h2>
                <p class="text-muted"><?= htmlspecialchars($winner['description']) ?></p>
                <p class="mt-3">
                    <span class="badge bg-success">🏅 CHAMPION</span>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Rondes -->
<div class="mt-5">
    <h3>📋 Déroulement du Tournoi</h3>
    
    <?php foreach ($results['rounds'] as $round) : ?>
        <div class="card mt-3">
            <div class="card-header bg-primary text-white">
                <h5>🎭 Ronde <?= $round['roundNumber'] ?> (<?= count($round['matches']) ?> match<?= count($round['matches']) > 1 ? 'es' : '' ?>)</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php foreach ($round['matches'] as $match) : ?>
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-5 text-center">
                                            <h6><?= htmlspecialchars($match['p1']['name']) ?></h6>
                                            <p class="text-muted small"><?= htmlspecialchars($match['p1']['description']) ?></p>
                                            <p><strong>Puissance: <?= $match['p1Power'] ?></strong></p>
                                            <?php if ($match['winner']['id'] === $match['p1']['id']) : ?>
                                                <span class="badge bg-success">✅ VAINQUEUR</span>
                                            <?php else : ?>
                                                <span class="badge bg-danger">❌ Éliminé</span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-2 text-center d-flex align-items-center justify-content-center">
                                            <strong>VS</strong>
                                        </div>
                                        <div class="col-md-5 text-center">
                                            <h6><?= htmlspecialchars($match['p2']['name']) ?></h6>
                                            <p class="text-muted small"><?= htmlspecialchars($match['p2']['description']) ?></p>
                                            <p><strong>Puissance: <?= $match['p2Power'] ?></strong></p>
                                            <?php if ($match['winner']['id'] === $match['p2']['id']) : ?>
                                                <span class="badge bg-success">✅ VAINQUEUR</span>
                                            <?php else : ?>
                                                <span class="badge bg-danger">❌ Éliminé</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="mt-4 text-center">
    <a href="/arena/tournament" class="btn btn-primary btn-lg">
        🔄 Relancer un Tournoi
    </a>
    <a href="/arena" class="btn btn-secondary btn-lg">
        ⬅️ Retour à l'Arène
    </a>
    <a href="/products" class="btn btn-secondary btn-lg">
        📚 Pokédex
    </a>
</div>
