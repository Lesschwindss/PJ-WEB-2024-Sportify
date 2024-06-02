<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness - Sportify</title>
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
                <h2 class="text-center">Fitness</h2>
                <p class="text-center">Tout ce que vous devez savoir pour pratiquer le fitness de manière efficace et sécurisée.</p>
                
                <div class="fitness-info my-4">
                    <h3>Présentation du Fitness</h3>
                    <img src="../img/sports/fitness1.jpg" alt="Fitness" class="limited-img mb-3">
                    <p>Le fitness regroupe un ensemble d'activités physiques visant à améliorer la condition physique, la santé et le bien-être. Il inclut des exercices de cardio, de musculation, de flexibilité et d'équilibre. Le fitness peut se pratiquer en salle de sport, à domicile ou en plein air, et s'adapte à tous les niveaux de forme physique et à tous les âges.</p>
                    <img src="../img/sports/fitness2.jpg" alt="Séance de Fitness" class="limited-img mb-3">
                    <p>Les séances de fitness sont souvent guidées par des coachs ou des instructeurs qui proposent des programmes variés et motivants. Les bienfaits du fitness incluent l'amélioration de la force musculaire, de l'endurance, de la souplesse, de la coordination et de la santé cardiovasculaire.</p>
                </div>

                <div class="rules my-4">
                    <h3>Principes du Fitness</h3>
                    <ul>
                        <li>Commencez chaque séance par un échauffement pour préparer vos muscles et éviter les blessures.</li>
                        <li>Alternez les types d'exercices pour travailler l'ensemble des groupes musculaires et éviter la monotonie.</li>
                        <li>Adoptez une technique correcte pour chaque exercice afin d'optimiser les résultats et prévenir les blessures.</li>
                        <li>Hydratez-vous bien avant, pendant et après les séances pour maintenir votre performance et éviter les crampes.</li>
                        <li>Écoutez votre corps et ajustez l'intensité des exercices en fonction de votre niveau et de votre forme du jour.</li>
                    </ul>
                    <img src="../img/sports/fitness3.jpg" alt="Exercice de Fitness" class="limited-img mb-3">
                </div>

                <div class="tips my-4">
                    <h3>Conseils pour le Fitness</h3>
                    <ul>
                        <li>Fixez-vous des objectifs réalistes et mesurables pour maintenir votre motivation.</li>
                        <li>Variez vos exercices et routines pour éviter la stagnation et continuer à progresser.</li>
                        <li>Concentrez-vous sur l'exécution des mouvements plutôt que sur la quantité de répétitions.</li>
                        <li>Intégrez des exercices de gainage pour renforcer votre tronc et améliorer votre stabilité.</li>
                        <li>Suivez une alimentation équilibrée et adaptée à vos besoins en fonction de vos objectifs.</li>
                    </ul>
                </div>

                <div class="equipment my-4">
                    <h3>Équipement nécessaire</h3>
                    <ul>
                        <li>Tapis de sol</li>
                        <li>Haltères et kettlebells</li>
                        <li>Corde à sauter</li>
                        <li>Élastiques de résistance</li>
                        <li>Chaussures de sport adaptées</li>
                    </ul>
                    <img src="../img/sports/fitness4.jpg" alt="Équipement de Fitness" class="limited-img mb-3">
                </div>

                <div class="coaches my-4">
                    <h3>Coachs de Fitness</h3>
                    <div class="d-flex flex-wrap justify-content-center">
                        <?php include '../php/display_coaches.php'; display_coaches('Fitness'); ?>
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
