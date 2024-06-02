<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basketball - Sportify</title>
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
                <h2 class="text-center">Basketball</h2>
                <p class="text-center">Découvrez les techniques, règles et équipements nécessaires pour pratiquer le basketball.</p>
                
                <div class="basketball-info my-4">
                    <h3>Présentation du Basketball</h3>
                    <img src="../img/sports/basketball.jpg" alt="Basketball" class="limited-img mb-3">
                    <p>Le basketball est un sport collectif qui oppose deux équipes de cinq joueurs sur un terrain rectangulaire. L'objectif est de marquer des points en lançant le ballon dans le panier adverse, situé à une hauteur de 3,05 mètres. Le basketball combine des compétences techniques, physiques et stratégiques, et est pratiqué à tous les niveaux, des cours d'école aux ligues professionnelles comme la NBA.</p>
                    <img src="../img/sports/basketball2.jpg" alt="Compétition de Basketball" class="limited-img mb-3">
                    <p>Les compétitions de basketball sont connues pour leur intensité et leur rapidité. Les joueurs doivent faire preuve d'agilité, de précision et de travail d'équipe pour réussir. Les matchs se déroulent en quatre quart-temps, chaque équipe essayant de marquer le plus de points possible avant la fin du temps réglementaire.</p>
                </div>

                <div class="rules my-4">
                    <h3>Règles du Basketball</h3>
                    <ul>
                        <li>Un match de basketball se joue en quatre quart-temps de 10 minutes (12 minutes en NBA).</li>
                        <li>L'équipe avec le plus de points à la fin du temps réglementaire gagne le match.</li>
                        <li>Chaque panier marqué vaut 2 points, sauf les tirs au-delà de la ligne des 3 points qui en valent 3.</li>
                        <li>Les lancers francs, obtenus suite à des fautes, valent 1 point chacun.</li>
                        <li>Les fautes personnelles, techniques et flagrantes peuvent entraîner des lancers francs pour l'équipe adverse.</li>
                        <li>Les joueurs doivent dribbler en avançant avec le ballon et respecter les règles de temps, comme les 24 secondes pour tenter un tir.</li>
                    </ul>
                </div>

                <div class="tips my-4">
                    <h3>Conseils pour le Basketball</h3>
                    <ul>
                        <li>Entraînez-vous régulièrement au dribble et au tir pour améliorer votre technique.</li>
                        <li>Travaillez votre condition physique pour maintenir un haut niveau d'énergie tout au long du match.</li>
                        <li>Apprenez les stratégies de jeu et développez une bonne communication avec vos coéquipiers.</li>
                        <li>Regardez des matchs professionnels pour observer et apprendre des techniques des meilleurs joueurs.</li>
                        <li>Participez à des jeux et des exercices de défense pour améliorer votre agilité et votre réactivité.</li>
                    </ul>
                </div>

                <div class="equipment my-4">
                    <h3>Équipement nécessaire</h3>
                    <ul>
                        <li>Ballon de basketball</li>
                        <li>Chaussures de basketball avec un bon maintien de la cheville</li>
                        <li>Tenue de sport adaptée (maillot, short)</li>
                        <li>Protège-dents (optionnel)</li>
                        <li>Accessoires comme les genouillères ou les coudières pour prévenir les blessures</li>
                    </ul>
                    <img src="../img/sports/basketball4.jpg" alt="Équipement de Basketball" class="img-fluid mb-3">
                </div>

                <div class="coaches my-4">
                    <h3>Coachs de Basketball</h3>
                    <div class="d-flex flex-wrap justify-content-center">
                        <?php include '../php/display_coaches.php'; display_coaches('Basketball'); ?>
                    </div>
                </div>
            </div>
        </section>

        <div class="marquee">
            <p>Pour exceller en basketball, pratiquez régulièrement et adoptez une alimentation équilibrée</p>
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
