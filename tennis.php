<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tennis - Sportify</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
    <style>
        .fc-disabled-day {
            background-color: #f5f5f5;
            pointer-events: none;
        }
        .fc-available-day {
            background-color: #e0e0e0;
        }
        .fc-selected-day {
            background-color: #007bff !important;
            color: white !important;
        }
        /* Coach card styles */
        .coach-card {
            max-width: 350px;
            margin: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            background-color: #fff;
            position: relative;
        }

        .coach-card:hover {
            transform: scale(1.05);
        }

        .coach-card .img-container {
            width: 100%;
            padding-top: 100%; /* 1:1 Aspect Ratio */
            position: relative;
        }

        .coach-card img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensure the image covers the area without distortion */
        }

        .coach-card .card-body {
            padding: 20px;
            text-align: center;
        }

        .coach-card .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }

        .coach-card .card-text {
            font-size: 1rem;
            color: #666;
            margin-bottom: 20px;
        }

        .coach-card .btn {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <?php include '../php/header.php'; ?>

        <section class="section py-5">
            <div class="container">
                <h2 class="text-center">Tennis</h2>
                <p class="text-center">Découvrez les règles et techniques pour jouer au tennis.</p>
                
                <!-- Présentation du Tennis -->
                <div class="tennis-info my-4">
                    <h3>Présentation du Tennis</h3>
                    <img src="../img/sports/tenis1.jpg" alt="Tennis" class="limited-img mb-3">
                    <p>Le tennis est un sport de raquette qui se joue en simple (un contre un) ou en double (deux contre deux). Les joueurs utilisent une raquette pour frapper une balle au-dessus d'un filet, avec l'objectif de faire rebondir la balle dans le court de l'adversaire sans qu'il puisse la retourner. Le tennis est un sport populaire à travers le monde, connu pour ses grands tournois comme Wimbledon, l'US Open, Roland-Garros et l'Open d'Australie.</p>
                    <img src="../img/sports/tenis2.jpg" alt="Match de Tennis" class="limited-img mb-3">
                    <p>Le tennis se joue sur différentes surfaces : terre battue, gazon, dur et synthétique, chacune affectant le style et la stratégie de jeu. La maîtrise des coups, de la stratégie et de l'endurance physique est essentielle pour exceller dans ce sport.</p>
                </div>

                <!-- Règles du Tennis -->
                <div class="rules my-4">
                    <h3>Règles du Tennis</h3>
                    <ul>
                        <li>Le match se joue en sets, le premier joueur à gagner 6 jeux avec au moins deux jeux d'avance remporte le set.</li>
                        <li>Un jeu se compose de points comptés 15, 30, 40, et jeu.</li>
                        <li>Le service alterne entre les joueurs à chaque jeu, et les serveurs doivent servir derrière la ligne de fond.</li>
                        <li>La balle doit rebondir dans le carré de service adverse pour être considérée comme valide.</li>
                        <li>Les fautes de pied, doubles fautes et let sont des termes clés à connaître.</li>
                    </ul>
                    <img src="../img/sports/tenis3.jpg" alt="Serveur au Tennis" class="limited-img mb-3">
                </div>

                <!-- Conseils pour le Tennis -->
                <div class="tips my-4">
                    <h3>Conseils pour le Tennis</h3>
                    <ul>
                        <li>Améliorez votre service pour gagner des points rapidement.</li>
                        <li>Travaillez votre condition physique pour résister aux longs échanges.</li>
                        <li>Pratiquez différents coups : coup droit, revers, volée, et smash.</li>
                        <li>Apprenez à lire les mouvements de votre adversaire et à anticiper ses coups.</li>
                        <li>Regardez des matchs professionnels pour observer et apprendre des stratégies de jeu.</li>
                    </ul>
                </div>

                <!-- Équipement nécessaire -->
                <div class="equipment my-4">
                    <h3>Équipement nécessaire</h3>
                    <ul>
                        <li>Raquette de tennis</li>
                        <li>Balles de tennis</li>
                        <li>Chaussures adaptées au type de surface</li>
                        <li>Vêtements de sport confortables</li>
                        <li>Poignets et bandeaux pour absorber la sueur</li>
                    </ul>
                    <img src="../img/sports/tenis4.jpg" alt="Équipement de Tennis" class="limited-img mb-3">
                </div>

                <!-- Coachs de Tennis -->
                <div class="coaches my-4">
                    <h3>Coachs de Tennis</h3>
                    <div class="d-flex flex-wrap justify-content-center">
                        <?php include '../php/display_coaches.php'; display_coaches('Tennis'); ?>
                    </div>
                </div>
            </div>
        </section>

        <div class="marquee">
            <p>Pour une bonne santé, pratiquez une activité physique régulière et mangez équilibré</p>
        </div>

        <?php include '../php/footer.php'; ?>

        <!-- Modal pour la prise de rendez-vous -->
        <div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="appointmentModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="appointmentModalLabel">Prendre un rendez-vous</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php
                        session_start();
                        if (isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'client') {
                            echo '<form id="appointmentForm">';
                            echo '<input type="hidden" id="coachId" name="coach_id">';
                            echo '<div class="form-group">';
                            echo '<label for="coachName">Coach</label>';
                            echo '<input type="text" class="form-control" id="coachName" name="coach_name" readonly>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="appointmentDay">Jour</label>';
                            echo '<div id="calendar"></div>';
                            echo '<input type="hidden" id="appointmentDate" name="appointment_date">';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="appointmentTime">Créneau</label>';
                            echo '<select class="form-control" id="appointmentTime" name="appointment_time" required>';
                            echo '</select>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="appointmentAddress">Adresse</label>';
                            echo '<input type="text" class="form-control" id="appointmentAddress" name="appointment_address" required>';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="documentRequested">Document Requis</label>';
                            echo '<input type="text" class="form-control" id="documentRequested" name="document_requested">';
                            echo '</div>';
                            echo '<div class="form-group">';
                            echo '<label for="digicode">Digicode</label>';
                            echo '<input type="text" class="form-control" id="digicode" name="digicode">';
                            echo '</div>';
                            echo '<button type="submit" class="btn btn-primary">Valider</button>';
                            echo '</form>';
                        } else {
                            echo '<p class="text-center text-danger">Veuillez vous connecter avec un compte client pour prendre un rendez-vous.</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/submenu.js"></script>
    <script src="../js/appointment.js"></script>
</body>
</html>
