<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musculation - Sportify</title>
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
                <h2 class="text-center">Musculation</h2>
                <p class="text-center">Découvrez les meilleures techniques et conseils pour optimiser vos séances de musculation.</p>
                
                <div class="musculation-info my-4">
                    <h3>Présentation de la Musculation</h3>
                    <img src="../img/sports/musculation1.jpg" alt="Musculation" class="limited-img mb-3">
                    <p>La musculation est une discipline sportive qui consiste à développer la force et la masse musculaire à travers des exercices de résistance. Pratiquée en salle de sport ou à domicile, elle utilise différents équipements tels que les haltères, les barres, les machines de musculation et le poids du corps. Les séances de musculation sont souvent structurées autour de différents groupes musculaires pour garantir un développement harmonieux du corps.</p>
                    <img src="../img/sports/musculation2.jpg" alt="Exercice de Musculation" class="limited-img mb-3">
                    <p>Pour maximiser les gains musculaires, il est important de suivre un programme d'entraînement adapté, de respecter les temps de repos et de veiller à une alimentation riche en protéines et équilibrée. La musculation contribue également à améliorer la posture, augmenter le métabolisme et renforcer les os.</p>
                </div>

                <div class="rules my-4">
                    <h3>Principes de la Musculation</h3>
                    <ul>
                        <li>Commencez chaque séance par un échauffement pour préparer vos muscles et éviter les blessures.</li>
                        <li>Alternez les groupes musculaires travaillés pour permettre une récupération optimale.</li>
                        <li>Adoptez une technique correcte pour chaque exercice afin d'optimiser les résultats et prévenir les blessures.</li>
                        <li>Augmentez progressivement les charges pour stimuler la croissance musculaire.</li>
                        <li>Respectez les temps de repos entre les séries et les séances pour favoriser la récupération.</li>
                    </ul>
                    <img src="../img/sports/musculation3.jpg" alt="Musculation en Salle" class="limited-img mb-3">
                </div>

                <div class="tips my-4">
                    <h3>Conseils pour la Musculation</h3>
                    <ul>
                        <li>Fixez-vous des objectifs réalistes et mesurables pour maintenir votre motivation.</li>
                        <li>Variez vos exercices et routines pour éviter la stagnation et continuer à progresser.</li>
                        <li>Concentrez-vous sur l'exécution des mouvements plutôt que sur la quantité de poids soulevée.</li>
                        <li>Intégrez des exercices de gainage pour renforcer votre tronc et améliorer votre stabilité.</li>
                        <li>Suivez une alimentation équilibrée et adaptée à vos besoins en fonction de vos objectifs.</li>
                    </ul>
                </div>

                <div class="equipment my-4">
                    <h3>Équipement nécessaire</h3>
                    <ul>
                        <li>Haltères et barres</li>
                        <li>Machines de musculation</li>
                        <li>Poids libres</li>
                        <li>Chaussures de sport stables</li>
                        <li>Vêtements de sport confortables</li>
                    </ul>
                    <img src="../img/sports/musculation4.jpg" alt="Équipement de Musculation" class="limited-img mb-3">
                </div>

                <div class="coaches my-4">
                    <h3>Coachs de musculation</h3>
                    <div class="d-flex flex-wrap justify-content-center">
                        <?php include '../php/display_coaches.php'; display_coaches('Musculation'); ?>
                    </div>
                </div>
            </div>
        </section>

        <div class="marquee">
            <p>Pour une bonne santé, pratiquez la musculation régulièrement et mangez équilibré</p>
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
