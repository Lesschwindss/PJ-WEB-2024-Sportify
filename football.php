<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football - Sportify</title>
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
                <h2 class="text-center">Football</h2>
                <p class="text-center">Tout ce que vous devez savoir pour pratiquer le football de manière efficace et sécurisée.</p>
                
                <div class="football-info my-4">
                    <h3>Présentation du Football</h3>
                    <img src="../img/sports/football1.jpg" alt="Football" class="limited-img mb-3">
                    <p>Le football est un sport collectif où deux équipes de onze joueurs s'affrontent pour marquer des buts en envoyant un ballon dans les filets adverses. Ce sport est le plus populaire au monde et se joue sur un terrain rectangulaire avec un but à chaque extrémité. Les joueurs utilisent principalement leurs pieds pour contrôler, passer et tirer le ballon, bien que d'autres parties du corps soient également utilisées à l'exception des mains et des bras.</p>
                    <img src="../img/sports/football2.jpg" alt="Match de Football" class="limited-img mb-3">
                    <p>Le jeu se compose de deux mi-temps de 45 minutes, séparées par une pause de 15 minutes. L'équipe qui marque le plus de buts à la fin du match remporte la victoire. En cas d'égalité, différentes règles peuvent s'appliquer en fonction de la compétition, telles que les prolongations ou les tirs au but.</p>
                </div>

                <div class="rules my-4">
                    <h3>Règles du Football</h3>
                    <ul>
                        <li>Le match se joue avec deux équipes de 11 joueurs chacune, dont un gardien de but.</li>
                        <li>Le ballon doit être rond et conforme aux normes de la FIFA.</li>
                        <li>Un but est marqué lorsque le ballon franchit entièrement la ligne de but entre les poteaux et sous la barre transversale.</li>
                        <li>Le hors-jeu est sifflé lorsqu'un joueur reçoit une passe en étant plus proche de la ligne de but adverse que le ballon et l'avant-dernier défenseur.</li>
                        <li>Les fautes graves et comportements antisportifs sont sanctionnés par des cartons jaunes et rouges.</li>
                    </ul>
                    <img src="../img/sports/football3.jpg" alt="Arbitre montrant un carton" class="limited-img mb-3">
                </div>

                <div class="tips my-4">
                    <h3>Conseils pour le Football</h3>
                    <ul>
                        <li>Travaillez votre technique de dribble et de passe.</li>
                        <li>Améliorez votre condition physique pour couvrir plus de terrain.</li>
                        <li>Entraînez-vous à tirer avec précision et puissance.</li>
                        <li>Communiquez constamment avec vos coéquipiers sur le terrain.</li>
                        <li>Analysez les matchs professionnels pour apprendre des meilleurs.</li>
                    </ul>
                </div>

                <div class="equipment my-4">
                    <h3>Équipement nécessaire</h3>
                    <ul>
                        <li>Ballon de football</li>
                        <li>Chaussures de football</li>
                        <li>Maillot, short et chaussettes</li>
                        <li>Protège-tibias</li>
                        <li>Gants de gardien de but (pour les gardiens)</li>
                    </ul>
                    <img src="../img/sports/football4.jpg" alt="Équipement de Football" class="limited-img mb-3">
                </div>

                <div class="coaches my-4">
                    <h3>Coachs de Football</h3>
                    <div class="d-flex flex-wrap justify-content-center">
                        <?php include '../php/display_coaches.php'; display_coaches('Football'); ?>
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
