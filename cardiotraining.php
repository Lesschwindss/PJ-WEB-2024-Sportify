<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardio-training - Sportify</title>
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
                <h2 class="text-center">Cardio-training</h2>
                <p class="text-center">Découvrez les bienfaits du cardio-training et comment intégrer cette pratique dans votre routine de fitness.</p>
                
                <div class="cardio-info my-4">
                    <h3>Présentation du Cardio-training</h3>
                    <img src="../img/sports/cardio1.jpg" alt="Cardio-training" class="limited-img mb-3">
                    <p>Le cardio-training regroupe des exercices visant à améliorer l'endurance cardiovasculaire. Cette pratique inclut des activités comme la course à pied, le vélo, la natation, le rameur, et des cours collectifs comme l'aérobic et le spinning. Le cardio-training est essentiel pour maintenir une bonne santé cardiaque, perdre du poids et améliorer sa condition physique globale.</p>
                    <img src="../img/sports/cardio2.jpg" alt="Exercice de Cardio-training" class="limited-img mb-3">
                    <p>Les séances de cardio-training peuvent être variées en termes d'intensité et de durée pour s'adapter à tous les niveaux de forme physique. L'objectif est d'augmenter le rythme cardiaque de manière soutenue afin de renforcer le cœur et les poumons, tout en brûlant des calories.</p>
                </div>

                <div class="rules my-4">
                    <h3>Principes du Cardio-training</h3>
                    <ul>
                        <li>Commencez chaque séance par un échauffement pour préparer votre corps à l'effort.</li>
                        <li>Variez les exercices et les intensités pour éviter la monotonie et travailler différents groupes musculaires.</li>
                        <li>Hydratez-vous bien avant, pendant et après les séances pour maintenir votre performance et éviter les crampes.</li>
                        <li>Adaptez l'intensité des exercices à votre niveau de forme physique et augmentez progressivement la difficulté.</li>
                        <li>Terminez chaque séance par une phase de récupération et des étirements pour prévenir les courbatures.</li>
                    </ul>
                    <img src="../img/sports/cardio3.jpg" alt="Exercice de Cardio-training" class="limited-img mb-3">
                </div>

                <div class="tips my-4">
                    <h3>Conseils pour le Cardio-training</h3>
                    <ul>
                        <li>Fixez-vous des objectifs réalistes et mesurables pour maintenir votre motivation.</li>
                        <li>Utilisez un moniteur de fréquence cardiaque pour suivre votre effort et rester dans la zone cible.</li>
                        <li>Intégrez des intervalles à haute intensité pour maximiser la combustion des calories.</li>
                        <li>Choisissez des activités que vous aimez pour rendre l'entraînement plus agréable.</li>
                        <li>Assurez-vous de porter des chaussures de sport adaptées pour prévenir les blessures.</li>
                    </ul>
                </div>

                <div class="equipment my-4">
                    <h3>Équipement nécessaire</h3>
                    <ul>
                        <li>Chaussures de sport adaptées</li>
                        <li>Vêtements de sport confortables</li>
                        <li>Moniteur de fréquence cardiaque (optionnel)</li>
                        <li>Bouteille d'eau</li>
                        <li>Serviette</li>
                    </ul>
                    <img src="../img/sports/cardio4.jpg" alt="Équipement de Cardio-training" class="limited-img mb-3">
                </div>

                <div class="coaches my-4">
                    <h3>Coachs de cardio-training</h3>
                    <div class="d-flex flex-wrap justify-content-center">
                        <?php include '../php/display_coaches.php'; display_coaches('Cardio-Training'); ?>
                    </div>
                </div>
            </div>
        </section>

        <div class="marquee">
            <p>Pour votre santé, bougez régulièrement et hydratez-vous</p>
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
