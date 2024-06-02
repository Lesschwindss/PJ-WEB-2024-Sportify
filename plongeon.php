<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plongeon - Sportify</title>
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
                <h2 class="text-center">Plongeon</h2>
                <p class="text-center">Découvrez les techniques et astuces pour pratiquer le plongeon.</p>
                
                <div class="plongeon-info my-4">
                    <h3>Présentation du Plongeon</h3>
                    <img src="../img/sports/plongeon1.jpg" alt="Plongeon" class="limited-img mb-3">
                    <p>Le plongeon est un sport aquatique où les athlètes sautent dans l'eau depuis une plateforme ou un tremplin tout en exécutant des figures acrobatiques. C'est une discipline olympique qui requiert une grande précision, de la coordination et un sens aigu de l'équilibre. Les plongeons peuvent être effectués depuis différentes hauteurs, avec des compétitions qui incluent des tremplins de 1 mètre, 3 mètres, et des plateformes de 5, 7.5 et 10 mètres.</p>
                    <img src="../img/sports/plongeon2.jpg" alt="Compétition de Plongeon" class="limited-img mb-3">
                    <p>Les juges évaluent les plongeons sur la base de critères tels que la difficulté, l'exécution et l'entrée dans l'eau. Les athlètes doivent combiner puissance, grâce et technique pour réussir leurs figures tout en minimisant les éclaboussures à l'entrée dans l'eau.</p>
                </div>

                <div class="rules my-4">
                    <h3>Règles du Plongeon</h3>
                    <ul>
                        <li>Les plongeurs doivent exécuter une série de plongeons préétablis, chacun ayant un degré de difficulté.</li>
                        <li>Les juges attribuent des notes basées sur la qualité de l'exécution, de 0 à 10.</li>
                        <li>Les notes des juges sont multipliées par le degré de difficulté pour obtenir le score final.</li>
                        <li>Les fausses départs ou les erreurs d'exécution peuvent entraîner des pénalités ou des disqualifications.</li>
                        <li>Les plongeons doivent être effectués dans un ordre spécifique, et les plongeurs doivent signaler tout changement à l'avance.</li>
                    </ul>
                    <img src="../img/sports/plongeon3.jpg" alt="Plongeur" class="limited-img mb-3">
                </div>

                <div class="tips my-4">
                    <h3>Conseils pour le Plongeon</h3>
                    <ul>
                        <li>Travaillez votre souplesse et votre force pour améliorer vos figures.</li>
                        <li>Pratiquez des sauts et des figures simples avant de passer à des plongeons plus complexes.</li>
                        <li>Utilisez des trampolines et des mats pour améliorer votre technique en toute sécurité.</li>
                        <li>Concentrez-vous sur l'entrée dans l'eau pour minimiser les éclaboussures et améliorer vos scores.</li>
                        <li>Regardez des compétitions de plongeon pour observer les techniques des athlètes professionnels.</li>
                    </ul>
                </div>

                <div class="equipment my-4">
                    <h3>Équipement nécessaire</h3>
                    <ul>
                        <li>Maillot de bain ajusté</li>
                        <li>Bonnet de bain (optionnel)</li>
                        <li>Serviette</li>
                        <li>Accès à un tremplin ou à une plateforme de plongeon</li>
                    </ul>
                </div>

                <div class="coaches my-4">
                    <h3>Coachs de plongeon</h3>
                    <div class="d-flex flex-wrap justify-content-center">
                        <?php include '../php/display_coaches.php'; display_coaches('Plongeon'); ?>
                    </div>
                </div>
            </div>
        </section>

        <div class="marquee">
            <p>Pour rester en forme, pratiquez le plongeon régulièrement et mangez sainement</p>
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
