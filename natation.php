<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Natation - Sportify</title>
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
                <h2 class="text-center">Natation</h2>
                <p class="text-center">Découvrez les différentes nages et techniques pour bien nager.</p>
                
                <div class="natation-info my-4">
                    <h3>Présentation de la Natation</h3>
                    <img src="../img/sports/natation1.jpg" alt="Natation" class="limited-img mb-3">
                    <p>La natation est un sport aquatique qui consiste à se déplacer dans l'eau en utilisant des mouvements spécifiques. Elle se pratique dans des piscines, en eau libre ou en mer, et inclut plusieurs styles de nage : le crawl, la brasse, le dos crawlé et le papillon. La natation est un excellent exercice pour améliorer la condition physique, la coordination et la souplesse.</p>
                    <img src="../img/sports/natation2.jpg" alt="Compétition de Natation" class="limited-img mb-3">
                    <p>Les compétitions de natation se déroulent sur différentes distances, allant de 50 mètres à 1500 mètres. Les relais et les épreuves de nage synchronisée sont aussi des disciplines populaires. Pour les nageurs, une bonne technique de respiration et de mouvement est essentielle pour maximiser l'efficacité et la vitesse dans l'eau.</p>
                </div>

                <div class="rules my-4">
                    <h3>Règles de la Natation</h3>
                    <ul>
                        <li>Les courses se déroulent dans des piscines de 25 ou 50 mètres.</li>
                        <li>Les nageurs doivent toucher le mur à chaque virage et à l'arrivée.</li>
                        <li>Les styles de nage doivent être respectés tout au long de la course.</li>
                        <li>Les fausses départs sont pénalisées et peuvent entraîner une disqualification.</li>
                        <li>Les relais nécessitent une coordination parfaite entre les nageurs pour réussir les passages de relais.</li>
                    </ul>
                    <img src="../img/sports/natation3.jpg" alt="Style de Nage" class="limited-img mb-3">
                </div>

                <div class="tips my-4">
                    <h3>Conseils pour la Natation</h3>
                    <ul>
                        <li>Travaillez votre technique de nage pour améliorer votre efficacité.</li>
                        <li>Pratiquez des exercices de respiration pour mieux gérer votre souffle.</li>
                        <li>Améliorez votre condition physique avec des entraînements en dehors de l'eau.</li>
                        <li>Utilisez des équipements comme les palmes et les planches pour varier les exercices.</li>
                        <li>Hydratez-vous bien avant, pendant et après l'entraînement.</li>
                    </ul>
                </div>

                <div class="equipment my-4">
                    <h3>Équipement nécessaire</h3>
                    <ul>
                        <li>Maillot de bain</li>
                        <li>Bonnet de bain</li>
                        <li>Lunettes de natation</li>
                        <li>Serviette</li>
                        <li>Palmes, planche et pull buoy (optionnels)</li>
                    </ul>
                    <img src="../img/sports/natation4.jpg" alt="Équipement de Natation" class="limited-img mb-3">
                </div>

                <div class="coaches my-4">
                    <h3>Coachs de natation</h3>
                    <div class="d-flex flex-wrap justify-content-center">
                        <?php include '../php/display_coaches.php'; display_coaches('Natation'); ?>
                    </div>
                </div>
            </div>
        </section>

        <div class="marquee">
            <p>Pour votre bien-être, nagez régulièrement et suivez une alimentation équilibrée</p>
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
