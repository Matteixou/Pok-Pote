<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($title) ? htmlspecialchars($title) : 'POKEPOTE' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
        
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #FFD700 0%, #FF6B6B 50%, #4ECDC4 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            pointer-events: none;
            z-index: -1;
        }

        .navbar {
            background: linear-gradient(90deg, #FF0000 0%, #FFFF00 50%, #0000FF 100%) !important;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            border-bottom: 4px solid #333;
        }

        .navbar-brand {
            font-family: 'Press Start 2P', cursive;
            font-weight: 700;
            color: white !important;
            font-size: 1.3rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            letter-spacing: 2px;
        }

        .nav-link {
            color: white !important;
            font-weight: 700;
            margin: 0 10px;
            transition: all 0.3s ease;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
            font-size: 1.1rem;
        }

        .nav-link:hover {
            transform: scale(1.1);
            filter: drop-shadow(0 0 8px rgba(255, 255, 255, 0.8));
        }

        .nav-link.active {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            padding: 5px 15px;
        }

        main {
            margin-top: 40px;
            margin-bottom: 40px;
            position: relative;
            z-index: 1;
        }

        .container-main {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 50px rgba(0,0,0,0.3);
            border: 4px solid #333;
            position: relative;
        }

        .container-main::before {
            content: '';
            position: absolute;
            top: -8px;
            left: 20px;
            width: 16px;
            height: 16px;
            background: #FF0000;
            border-radius: 50%;
            box-shadow: 30px 0 0 #FFD700, 60px 0 0 #0000FF;
        }

        h1 {
            color: #FF0000;
            font-family: 'Press Start 2P', cursive;
            font-weight: 700;
            margin-bottom: 30px;
            text-shadow: 3px 3px 0px #FFD700, 6px 6px 0px #0000FF;
            letter-spacing: 2px;
            border-bottom: 4px solid #333;
            padding-bottom: 15px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
            border: 3px solid #333;
            border-radius: 15px;
            padding: 12px 25px;
            font-weight: 700;
            color: #333;
            transition: all 0.3s ease;
            box-shadow: 0 5px 0px #333;
            text-shadow: 1px 1px 0px rgba(255, 255, 255, 0.5);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 0px #333;
            background: linear-gradient(135deg, #FFA500 0%, #FFD700 100%);
            color: #333;
        }

        .btn-primary:active {
            transform: translateY(-1px);
            box-shadow: 0 3px 0px #333;
        }

        .btn-secondary {
            background: #888;
            border: 3px solid #333;
            color: white;
            font-weight: 700;
            border-radius: 15px;
            box-shadow: 0 5px 0px #333;
        }

        .btn-secondary:hover {
            background: #666;
            transform: translateY(-3px);
            box-shadow: 0 8px 0px #333;
            color: white;
        }

        .btn-warning {
            background: #FF6B6B !important;
            border: 3px solid #333 !important;
            color: white !important;
            font-weight: 700;
            border-radius: 15px;
            box-shadow: 0 5px 0px #333;
        }

        .btn-warning:hover {
            background: #FF5252 !important;
            transform: translateY(-3px);
            box-shadow: 0 8px 0px #333;
        }

        .btn-danger {
            background: #FF0000 !important;
            border: 3px solid #333 !important;
            color: white !important;
            font-weight: 700;
            border-radius: 15px;
            box-shadow: 0 5px 0px #333;
        }

        .btn-danger:hover {
            background: #CC0000 !important;
            transform: translateY(-3px);
            box-shadow: 0 8px 0px #333;
        }

        .btn-info {
            background: #0000FF !important;
            border: 3px solid #333 !important;
            color: white !important;
            font-weight: 700;
            border-radius: 15px;
            box-shadow: 0 5px 0px #333;
        }

        .btn-info:hover {
            background: #0000CC !important;
            transform: translateY(-3px);
            box-shadow: 0 8px 0px #333;
        }

        .btn-sm {
            border-radius: 10px;
            padding: 6px 12px;
            font-size: 0.85rem;
            box-shadow: 0 3px 0px #333;
        }

        .btn-sm:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 0px #333;
        }

        table {
            border-collapse: collapse;
            border: 3px solid #333;
        }

        table thead {
            background: linear-gradient(90deg, #FF0000 0%, #FFFF00 50%, #0000FF 100%);
            color: white;
            font-weight: 700;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }

        table thead th {
            border: 2px solid #333;
            padding: 15px;
        }

        table tbody td {
            border: 2px solid #ddd;
            padding: 12px;
        }

        table tbody tr {
            transition: all 0.2s ease;
        }

        table tbody tr:hover {
            background: #FFE4B5;
            transform: scale(1.01);
            box-shadow: inset 0 0 10px rgba(255, 215, 0, 0.3);
        }

        table tbody tr:nth-child(odd) {
            background: #FFFACD;
        }

        .form-control, .form-control:focus {
            border: 3px solid #333 !important;
            border-radius: 12px;
            box-shadow: 0 4px 0px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .form-control:focus {
            border-color: #FFD700 !important;
            box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25), 0 4px 0px rgba(0,0,0,0.1);
        }

        .form-label {
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
            font-size: 1.05rem;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        .alert {
            border: 3px solid #333;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .alert-info {
            background: linear-gradient(135deg, #4ECDC4 0%, #44A5BF 100%);
            color: white;
            border-color: #333;
        }

        .alert-heading {
            font-family: 'Press Start 2P', cursive;
            font-size: 1.2rem;
        }

        .card {
            border: 4px solid #333 !important;
            border-radius: 15px;
            background: linear-gradient(135deg, #FFFACD 0%, #FFE4B5 100%);
        }

        .card-title {
            color: #FF0000;
            font-family: 'Press Start 2P', cursive;
            font-size: 1.5rem;
            text-shadow: 2px 2px 0px #FFD700;
        }

        .text-success {
            color: #00AA00 !important;
            font-weight: 700;
            font-size: 1.3rem;
            text-shadow: 1px 1px 0px rgba(0,0,0,0.1);
        }

        footer {
            text-align: center;
            color: white;
            padding: 30px;
            margin-top: 40px;
            font-weight: 700;
            font-size: 1.1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .pokemon-ball {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: linear-gradient(to bottom, #FF0000 50%, white 50%);
            border: 2px solid #333;
            position: relative;
            margin: 0 5px;
        }

        .pokemon-ball::after {
            content: '';
            position: absolute;
            width: 8px;
            height: 8px;
            background: #333;
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <span class="pokemon-ball"></span> POKÉ-MVC
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">🏠 Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/products">⚡ Pokémon</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/arena">🏟️ Arène</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container-fluid">
            <div class="container-main">
                <?= $content ?>
            </div>
        </div>
    </main>

    <footer>
        <p><span class="pokemon-ball"></span> © 2025 Poké-MVC | Gotta catch 'em all! <span class="pokemon-ball"></span></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Supprimer tous les Pokémon capturés quand la page se ferme
        window.addEventListener('beforeunload', function() {
            // Envoyer une requête pour supprimer tous les produits
            navigator.sendBeacon('/products/deleteAll', new FormData());
        });
    </script>
</body>
</html>

