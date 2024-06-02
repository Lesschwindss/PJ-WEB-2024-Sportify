<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rugby - Sportify</title>
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
                <h2 class="text-center">Rugby</h2>
                <p class="text-center">Apprenez tout sur le rugby et comment bien le pratiquer.</p>
                
                <div class="rugby-info my-4">
                    <h3>Présentation du Rugby</h3>
                    <img src="../img/sports/rugby1.jpg" alt="Rugby" class="limited-img mb-3">
                    <p>Le rugby est un sport collectif de contact où deux équipes de quinze joueurs s'affrontent pour marquer des points en amenant un ballon ovale derrière la ligne de but adverse. Les points peuvent être marqués de plusieurs façons, notamment par des essais, des transformations, des pénalités et des drops.</p>
                    <img src="../img/sports/rugby2.jpg" alt="Match de Rugby" class="limited-img mb-3">
                    <p>Le rugby est réputé pour son intensité physique et la stratégie complexe qu'il nécessite. Les joueurs doivent non seulement être forts et rapides, mais aussi avoir une excellente compréhension tactique du jeu.</p>
                </div>

                <div class="rules my-4">
                    <h3>Règles du Rugby</h3>
                    <ul>
                        <li>Le match se joue avec deux équipes de 15 joueurs chacune.</li>
                        <li>Le ballon doit être ovale et conforme aux normes de World Rugby.</li>
                        <li>Un essai est marqué lorsqu'un joueur pose le ballon derrière la ligne de but adverse.</li>
                        <li>Les transformations, pénalités et drops sont d'autres moyens de marquer des points.</li>
                        <li>Les plaquages doivent être faits en dessous de la ligne des épaules pour éviter les blessures.</li>
                        <li>Les mêlées et les touches sont des phases de jeu spécifiques avec leurs propres règles.</li>
                    </ul>
                    <img src="../img/sports/rugby3.jpg" alt="Plaquage en Rugby" class="limited-img mb-3">
                </div>

                <div class="tips my-4">
                    <h3>Conseils pour le Rugby</h3>
                    <ul>
                        <li>Améliorez votre condition physique pour être performant tout au long du match.</li>
                        <li>Travaillez vos techniques de plaquage et de passe.</li>
                        <li>Connaissez les règles et respectez-les pour éviter les fautes.</li>
                        <li>Développez votre force et votre endurance par un entraînement régulier.</li>
                        <li>Apprenez à lire le jeu et à anticiper les actions des adversaires.</li>
                    </ul>
                </div>

                <div class="equipment my-4">
                    <h3>Équipement nécessaire</h3>
                    <ul>
                        <li>Ballon de rugby</li>
                        <li>Chaussures à crampons</li>
                        <li>Maillot, short et chaussettes</li>
                        <li>Protège-dents et casque de rugby</li>
                    </ul>
                    <img src="../img/sports/rugby4.jpg" alt="Équipement de Rugby" class="limited-img mb-3">
                </div>

                <div class="coaches my-4">
                    <h3>Coachs de rugby</h3>
                    <div class="d-flex flex-wrap justify-content-center">
                        <?php include '../php/display_coaches.php'; display_coaches('Rugby'); ?>
                    </div>
                </div>
            </div>
        </section>

        <div class="marquee">
            <p>Pour votre santé, pratiquez une activité physique régulière</p>
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
