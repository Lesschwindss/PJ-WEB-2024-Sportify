<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportify: Consultation Sportive</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <?php
    // Redirection automatique le jour de la Saint-Valentin
    $today = date('m-d');
    if ($today == '02-14') {
        header('Location: valentine_index.php');
        exit();
    }
    ?>
    <style>
        .carousel-container {
            max-width: 800px;
            margin: 0 auto;
        }
        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            padding: 10px;
        }
        .carousel-caption h5, .carousel-caption p, .carousel-caption ul {
            color: white;
        }
        .event-section {
            display: none;
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .event-section.active {
            display: block;
        }
        .event-section h5, .event-section p, .event-section ul {
            color: #333;
        }
        .carousel-item img {
            max-height: 500px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <?php include '../php/header.php'; ?>

        <section class="section py-5 text-center">
            <div class="container">
                <h2>Bienvenue à Sportify</h2>
                <p>Votre plateforme de consultation sportive.</p>
                <div class="event-of-the-week my-4">
                    <h3>Évènement de la semaine</h3>
                     <!-- Bulletin Sportif de la Semaine -->
                <div id="bulletinSportifCarousel" class="carousel-container my-4">
                    <div id="event1" class="event-section active">
                        <h5>Football</h5>
                        <p><strong>Paris Saint-Germain vs. Olympique de Marseille</strong></p>
                        <p>Date: Samedi 8 Juin | Heure: 21h00 | Lieu: Parc des Princes</p>
                        <p>Résultat: PSG 3-1 OM</p>
                        <p><strong>Highlights:</strong></p>
                        <ul>
                            <li>Mbappé a marqué un doublé.</li>
                            <li>Neymar a délivré deux passes décisives.</li>
                            <li>Marseille a réduit l'écart en fin de match grâce à Payet.</li>
                        </ul>
                    </div>

                    <div id="event2" class="event-section">
                        <h5>Basket-ball</h5>
                        <p><strong>NBA Finals: Golden State Warriors vs. Boston Celtics</strong></p>
                        <p>Date: Jeudi 6 Juin | Heure: 20h00 (ET) | Lieu: Chase Center</p>
                        <p>Résultat: Warriors 112-99 Celtics</p>
                        <p><strong>Highlights:</strong></p>
                        <ul>
                            <li>Stephen Curry a marqué 35 points.</li>
                            <li>Draymond Green a réalisé un triple-double.</li>
                            <li>Jayson Tatum a été le meilleur marqueur des Celtics avec 28 points.</li>
                        </ul>
                    </div>

                    <div id="event3" class="event-section">
                        <h5>MMA</h5>
                        <p><strong>UFC Fight Night: Conor McGregor vs. Dustin Poirier</strong></p>
                        <p>Date: Samedi 8 Juin | Heure: 22h00 (ET) | Lieu: T-Mobile Arena, Las Vegas</p>
                        <p>Résultat: Poirier a gagné par KO au 3ème round</p>
                        <p><strong>Highlights:</strong></p>
                        <ul>
                            <li>Combat intense avec des échanges équilibrés jusqu'au KO.</li>
                            <li>Poirier a dominé le 2ème round avec ses coups de pied au corps.</li>
                            <li>McGregor a été mis au sol à la fin du 3ème round.</li>
                        </ul>
                    </div>

                    <div id="event4" class="event-section">
                        <h5>Tennis</h5>
                        <p><strong>Roland-Garros: Finale Hommes - Rafael Nadal vs. Novak Djokovic</strong></p>
                        <p>Date: Dimanche 9 Juin | Heure: 15h00 | Lieu: Court Philippe-Chatrier</p>
                        <p>Résultat: Nadal a gagné en 4 sets (6-4, 3-6, 6-3, 7-5)</p>
                        <p><strong>Highlights:</strong></p>
                        <ul>
                            <li>Nadal a remporté son 14ème titre à Roland-Garros.</li>
                            <li>Match très disputé avec des échanges spectaculaires.</li>
                            <li>Djokovic a montré une grande résilience, mais Nadal était trop fort sur terre battue.</li>
                        </ul>
                    </div>
                </div>
                </div>
                <div class="my-4">
                    <h3>Rencontrez notre personnel d'experts qualifiés pour répondre à tous vos besoins sportifs !</h3>
                </div>

              

                <!-- Carousel des Personnels -->
                <div id="carouselExampleIndicators" class="carousel slide carousel-container my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php
                        require '../php/db_connection.php';

                        $query = "SELECT u.first_name, u.last_name, c.specialty FROM coaches c JOIN users u ON c.user_id = u.user_id";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            $i = 0;
                            while ($row = $result->fetch_assoc()) {
                                $active = ($i == 0) ? 'active' : '';
                                echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '" class="' . $active . '"></li>';
                                $i++;
                            }
                        }
                        ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php
                        $result->data_seek(0); // Reset result pointer to the first row
                        $i = 0;
                        while ($row = $result->fetch_assoc()) {
                            $fileName = 'photo_' . $row['first_name'] . '_' . $row['last_name'] . '.png'; // Assuming jpg format, adjust if necessary
                            $active = ($i == 0) ? 'active' : '';
                            echo '<div class="carousel-item ' . $active . '">';
                            echo '<img src="../photos/' . $fileName . '" class="d-block w-100" alt="' . $row['first_name'] . ' ' . $row['last_name'] . '">';
                            echo '<div class="carousel-caption d-none d-md-block">';
                            echo '<h5>' . $row['first_name'] . ' ' . $row['last_name'] . '</h5>';
                            echo '<a href="../pages/' . getSpecialtyPage($row['specialty']) . '" class="btn btn-primary">Voir le coach</a>';
                            echo '</div>';
                            echo '</div>';
                            $i++;
                        }

                        function getSpecialtyPage($specialty) {
                            $pages = [
                                'Musculation' => 'musculation.php',
                                'Fitness' => 'fitness.php',
                                'Biking' => 'biking.php',
                                'Cardio-Training' => 'cardiotraining.php',
                                'Cours Collectifs' => 'cours_collectifs.php',
                                'Basketball' => 'basketball.php',
                                'Football' => 'football.php',
                                'Rugby' => 'rugby.php',
                                'Tennis' => 'tennis.php',
                                'Natation' => 'natation.php',
                                'Plongeon' => 'plongeon.php',
                                'Personnel' => 'personnel.php',
                                'nutrition' => 'nutrition.php',
                                // Add other specialties and their corresponding pages here
                            ];
                            return $pages[$specialty] ?? 'index.php'; // si la spécialité n'est pas trouvée renvoie à l'index
                        }
                        ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </section>

        <div class="marquee">
            <p>Bienvenue sur sportify - Bienvenue sur sportify - Bienvenue sur sportify - Bienvenue sur sportify - Bienvenue sur sportify - Bienvenue sur sportify - Bienvenue sur sportify - Bienvenue sur sportify</p>
        </div>

        <?php include '../php/footer.php'; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/submenu.js"></script>
    <script>
        $(document).ready(function() {
            let currentEvent = 0;
            const events = $('.event-section');
            const totalEvents = events.length;

            function showNextEvent() {
                events.eq(currentEvent).removeClass('active');
                currentEvent = (currentEvent + 1) % totalEvents;
                events.eq(currentEvent).addClass('active');
            }

            setInterval(showNextEvent, 15000); // Change event every 15 seconds
        });
    </script>
</body>
</html>
