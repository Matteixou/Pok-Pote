<h1>🏆 MODE TOURNOI 🏆</h1>

<div class="alert alert-info" role="alert">
    <strong>⚔️ Bienvenue au Grand Tournoi Pokémon !</strong> Tous les Pokémon du Pokédex vont s'affronter dans des matchs éliminatoires jusqu'à déterminer le Champion Ultime !
</div>

<?php if (!empty($products) && count($products) >= 2) : ?>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card bg-light">
                <div class="card-header bg-warning text-dark text-center">
                    <h4>📊 Participants au Tournoi</h4>
                </div>
                <div class="card-body">
                    <p class="text-center"><strong><?= count($products) ?> Pokémon</strong> vont s'affronter</p>
                    
                    <div class="list-group">
                        <?php foreach ($products as $product) : ?>
                            <div class="list-group-item">
                                <h5><?= htmlspecialchars($product['name']) ?></h5>
                                <small class="text-muted"><?= htmlspecialchars($product['description']) ?></small>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="mt-4 text-center">
                        <form method="post" action="/arena/tournament/run">
                            <button type="submit" class="btn btn-warning btn-lg">
                                ⚡ LANCER LE TOURNOI ⚡
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="alert alert-danger" role="alert">
        ❌ Vous devez capturer au moins 2 Pokémon pour lancer un tournoi !
    </div>
<?php endif; ?>

<div class="mt-4 text-center">
    <a href="/arena" class="btn btn-secondary btn-lg">
        ⬅️ Retour à l'Arène
    </a>
    <a href="/products" class="btn btn-secondary btn-lg">
        📚 Pokédex
    </a>
</div>
