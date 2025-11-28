<?php
$stats = [
    'pokemons' => count($products ?? []),
    'battles' => mt_rand(50, 500),
    'wins' => mt_rand(20, 300),
];
?>

<div style="text-align: center; margin-bottom: 40px;">
    <div style="font-size: 4rem; margin-bottom: 20px; animation: bounce 2s infinite;">
        🎮 POKÉDEX 🎮
    </div>
</div>

<style>
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    .pokeball {
        display: inline-block;
        animation: spin 3s linear infinite;
        font-size: 3rem;
    }
    
    .card-feature {
        background: linear-gradient(135deg, rgba(255,255,255,0.9) 0%, rgba(240,240,240,0.9) 100%);
        border: 3px solid #333;
        border-radius: 15px;
        padding: 25px;
        margin: 15px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .card-feature:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.3);
    }
    
    .feature-icon {
        font-size: 3rem;
        margin-bottom: 15px;
    }
    
    .feature-title {
        font-size: 1.4rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }
    
    .feature-desc {
        color: #666;
        font-size: 0.95rem;
    }
    
    .stat-box {
        background: linear-gradient(135deg, #FFD700 0%, #FF6B6B 50%, #4ECDC4 100%);
        color: white;
        padding: 20px;
        border-radius: 10px;
        margin: 10px;
        text-align: center;
        min-width: 150px;
        box-shadow: 0 8px 15px rgba(0,0,0,0.2);
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: bold;
        display: block;
    }
    
    .stat-label {
        font-size: 0.9rem;
        margin-top: 5px;
    }
    
    .hero-section {
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.8) 0%, rgba(255, 215, 0, 0.8) 50%, rgba(78, 205, 196, 0.8) 100%);
        padding: 40px;
        border-radius: 15px;
        margin-bottom: 40px;
        border: 4px solid #333;
        text-align: center;
        color: white;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }
    
    .hero-title {
        font-size: 3rem;
        font-weight: bold;
        margin-bottom: 15px;
        letter-spacing: 2px;
    }
    
    .hero-subtitle {
        font-size: 1.3rem;
        margin-bottom: 20px;
    }
    
    .btn-hero {
        display: inline-block;
        background: white;
        color: #FF6B6B;
        padding: 15px 40px;
        border-radius: 50px;
        margin: 10px;
        font-weight: bold;
        font-size: 1.1rem;
        text-decoration: none;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        transition: all 0.3s ease;
        border: 3px solid white;
    }
    
    .btn-hero:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(0,0,0,0.4);
        color: #333;
    }
</style>

<div class="hero-section">
    <div class="hero-title">⚡ BIENVENUE AU MONDE POKÉMON ⚡</div>
    <div class="hero-subtitle">Capturez, entraînez et battez vos Pokémon favoris !</div>
    <div style="margin-top: 30px;">
        <a href="/products" class="btn-hero">📚 Consulter le Pokédex</a>
        <a href="/products/create" class="btn-hero">🎯 Capturer un Pokémon</a>
        <a href="/arena" class="btn-hero">⚔️ Aller à l'Arène</a>
    </div>
</div>

<!-- Statistiques -->
<div style="text-align: center; margin-bottom: 40px;">
    <h2 style="font-size: 2rem; margin-bottom: 20px; color: #333;">📊 VOS STATISTIQUES</h2>
    <div style="display: flex; justify-content: center; flex-wrap: wrap;">
        <div class="stat-box">
            <span class="stat-number"><?= $stats['pokemons'] ?></span>
            <span class="stat-label">Pokémon Capturés</span>
        </div>
        <div class="stat-box">
            <span class="stat-number"><?= $stats['battles'] ?></span>
            <span class="stat-label">Combats Menés</span>
        </div>
        <div class="stat-box">
            <span class="stat-number"><?= $stats['wins'] ?></span>
            <span class="stat-label">Victoires</span>
        </div>
    </div>
</div>

<!-- Fonctionnalités -->
<h2 style="text-align: center; font-size: 2rem; margin: 40px 0 30px; color: #333;">🎮 LES FONCTIONNALITÉS</h2>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; margin-bottom: 40px;">
    
    <div class="card-feature">
        <div class="feature-icon">📚</div>
        <div class="feature-title">Pokédex Complet</div>
        <div class="feature-desc">Consultez tous vos Pokémon capturés avec leurs détails, types et pouvoirs.</div>
    </div>
    
    <div class="card-feature">
        <div class="feature-icon">🎯</div>
        <div class="feature-title">Capture Pokémon</div>
        <div class="feature-desc">Capturez de nouveaux Pokémon et entraînez-les pour améliorer vos équipes.</div>
    </div>
    
    <div class="card-feature">
        <div class="feature-icon">⚔️</div>
        <div class="feature-title">Arène de Combat</div>
        <div class="feature-desc">Faites combattre deux Pokémon et découvrez qui en émergera vainqueur !</div>
    </div>
    
    <div class="card-feature">
        <div class="feature-icon">🏆</div>
        <div class="feature-title">Mode Tournoi</div>
        <div class="feature-desc">Lancez un tournoi épique avec tous vos Pokémon pour élire le champion !</div>
    </div>
    
    <div class="card-feature">
        <div class="feature-icon">🤝</div>
        <div class="feature-title">Best Friends</div>
        <div class="feature-desc">Découvrez les compatibilités entre vos Pokémon avec des descriptions amusantes.</div>
    </div>
    
    <div class="card-feature">
        <div class="feature-icon">💪</div>
        <div class="feature-title">Entraînement</div>
        <div class="feature-desc">Modifiez et entraînez vos Pokémon pour les rendre plus puissants !</div>
    </div>
    
</div>

<!-- CTA Final -->
<div style="background: linear-gradient(135deg, #FFD700 0%, #FF6B6B 100%); padding: 40px; border-radius: 15px; text-align: center; border: 4px solid #333; margin-bottom: 30px;">
    <div style="font-size: 2rem; font-weight: bold; color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.5); margin-bottom: 20px;">
        Prêt à commencer votre aventure ? 🚀
    </div>
    <a href="/products/create" class="btn-hero">🎯 Capturer Votre Premier Pokémon Maintenant !</a>
</div>