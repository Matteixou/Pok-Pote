<h1>🏟️ ARÈNE POKÉMON</h1>

<div class="alert alert-warning" role="alert">
    <strong>⚡ Bienvenue dans l'Arène !</strong> Sélectionnez deux Pokémon pour les faire combattre.
</div>

<?php if (!empty($products) && count($products) >= 2) : ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h5>🔴 POKÉMON 1</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="/arena/battle" id="battleForm">
                        <label for="pokemon1" class="form-label"><strong>Choisissez le 1er Pokémon</strong></label>
                        <select class="form-control" id="pokemon1" name="pokemon1" required onchange="updatePokemonInfo('pokemon1')">
                            <option value="">-- Sélectionner --</option>
                            <?php foreach ($products as $product) : ?>
                                <option value="<?= $product['id'] ?>"><?= htmlspecialchars($product['name']) ?> (#<?= $product['id'] ?>) - <?= $product['price'] ?> CP</option>
                            <?php endforeach; ?>
                        </select>
                        <div id="info1" class="mt-3 p-2 bg-light rounded" style="display:none;">
                            <strong id="name1"></strong><br>
                            <small id="desc1"></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-danger text-white text-center">
                    <h5>🔵 POKÉMON 2</h5>
                </div>
                <div class="card-body">
                    <label for="pokemon2" class="form-label"><strong>Choisissez le 2nd Pokémon</strong></label>
                    <select class="form-control" id="pokemon2" name="pokemon2" form="battleForm" required onchange="updatePokemonInfo('pokemon2')">
                        <option value="">-- Sélectionner --</option>
                        <?php foreach ($products as $product) : ?>
                            <option value="<?= $product['id'] ?>"><?= htmlspecialchars($product['name']) ?> (#<?= $product['id'] ?>) - <?= $product['price'] ?> CP</option>
                        <?php endforeach; ?>
                    </select>
                    <div id="info2" class="mt-3 p-2 bg-light rounded" style="display:none;">
                        <strong id="name2"></strong><br>
                        <small id="desc2"></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 text-center">
        <button type="submit" form="battleForm" class="btn btn-primary btn-lg">
            ⚡ COMBATTRE ! ⚡
        </button>
        <a href="/arena/tournament" class="btn btn-warning btn-lg">
            🏆 MODE TOURNOI 🏆
        </a>
        <a href="/products" class="btn btn-secondary btn-lg">
            ❌ Retour au Pokédex
        </a>
    </div>

    <script>
        const pokemonsData = <?= json_encode($products) ?>;

        function updatePokemonInfo(fieldName) {
            const selectId = fieldName === 'pokemon1' ? 'pokemon1' : 'pokemon2';
            const infoId = fieldName === 'pokemon1' ? 'info1' : 'info2';
            const nameId = fieldName === 'pokemon1' ? 'name1' : 'name2';
            const descId = fieldName === 'pokemon1' ? 'desc1' : 'desc2';

            const pokemonId = document.getElementById(selectId).value;
            const pokemon = pokemonsData.find(p => p.id == pokemonId);

            if (pokemon) {
                document.getElementById(nameId).textContent = pokemon.name + ' (CP: ' + pokemon.price + ')';
                document.getElementById(descId).textContent = pokemon.description;
                document.getElementById(infoId).style.display = 'block';
            } else {
                document.getElementById(infoId).style.display = 'none';
            }
        }
    </script>

<?php elseif (count($products) < 2) : ?>
    <div class="alert alert-danger" role="alert">
        <strong>❌ Pas assez de Pokémon !</strong>
        <p>Vous devez avoir au moins 2 Pokémon pour faire un combat. <a href="/products/create">Capturez-en d'abord !</a></p>
    </div>
<?php else : ?>
    <div class="alert alert-info" role="alert">
        <strong>📭 Aucun Pokémon !</strong>
        <p>Vous n'avez pas encore capturé de Pokémon. <a href="/products">Allez au Pokédex !</a></p>
    </div>
<?php endif; ?>
