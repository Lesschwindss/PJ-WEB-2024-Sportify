<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportify</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand text-white" href="../pages/index.php">
        <img src="../img/logo.png" alt="Sportify Logo" style="height: 60px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link text-white" href="../pages/index.php">Accueil</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tout Parcourir
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Activités sportives</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="activites_sportives.php">Activités sportives</a></li>
                            <li><a class="dropdown-item" href="musculation.php">Musculation</a></li>
                            <li><a class="dropdown-item" href="fitness.php">Fitness</a></li>
                            <li><a class="dropdown-item" href="biking.php">Biking</a></li>
                            <li><a class="dropdown-item" href="cardiotraining.php">Cardio-Training</a></li>
                            <li><a class="dropdown-item" href="cours_collectifs.php">Cours Collectifs</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Les Sports de compétition</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="sports_de_competition.php">Les sports de compétition</a></li>
                            <li><a class="dropdown-item" href="basketball.php">Basketball</a></li>
                            <li><a class="dropdown-item" href="football.php">Football</a></li>
                            <li><a class="dropdown-item" href="rugby.php">Rugby</a></li>
                            <li><a class="dropdown-item" href="tennis.php">Tennis</a></li>
                            <li><a class="dropdown-item" href="natation.php">Natation</a></li>
                            <li><a class="dropdown-item" href="plongeon.php">Plongeon</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Salle de sport Omnes</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="salle_de_sport_omnes.php">Salle de sport Omnes</a></li>
                            <li><a class="dropdown-item" href="personnel.php">Personnels de la salle de sport</a></li>
                            <li><a class="dropdown-item" href="horaire.php">Horaire de la gym</a></li>
                            <li><a class="dropdown-item" href="regles.php">Règles sur l’utilisation des machines</a></li>
                            <li><a class="dropdown-item" href="nouveaux_clients.php">Nouveaux clients</a></li>
                            <li><a class="dropdown-item" href="nutrition.php">Alimentation et nutrition</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="../pages/search.php">Recherche</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="../pages/login.php">Votre Compte</a></li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['user_id'])): ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../php/logout.php">Déconnexion</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../pages/login.php">Connexion</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
</body>
</html>
