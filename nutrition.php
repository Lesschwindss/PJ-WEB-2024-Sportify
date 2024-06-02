<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutrition - Sportify</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                <h2 class="text-center">Alimentation et Nutrition</h2>
                <p class="text-center">Découvrez nos conseils et services en alimentation et nutrition pour optimiser votre performance sportive.</p>
                
                <div class="nutrition-info my-4">
                    <h3>Conseils de Musculation</h3>
                    <img src="../img/alimentation/musculation.png" alt="Musculation" class="limited-img mb-3">
                    <p>Adoptez une alimentation équilibrée pour améliorer vos performances sportives et votre santé globale. Nos experts en nutrition sont là pour vous guider. Voici quelques conseils pour une alimentation adaptée à la musculation :</p>
                    <ul>
                        <li>Augmentez votre apport en protéines pour soutenir la croissance musculaire.</li>
                        <li>Consommez des glucides complexes pour fournir de l'énergie à vos entraînements.</li>
                        <li>Ne négligez pas les graisses saines, essentielles pour la production d'hormones.</li>
                    </ul>
                </div>

                <div class="macro-info my-4">
                    <h3>Répartition des Macronutriments</h3>
                    <img src="../img/alimentation/macronutriments.png" alt="Macronutriments" class="limited-img mb-3">
                    <p>La répartition des macronutriments (protéines, lipides, glucides) est essentielle pour optimiser vos performances sportives. Voici quelques recommandations :</p>
                    <ul>
                        <li>Protéines : 1.6 à 2.2 g par kg de poids corporel par jour.</li>
                        <li>Glucides : 4 à 7 g par kg de poids corporel par jour.</li>
                        <li>Lipides : 0.5 à 1 g par kg de poids corporel par jour.</li>
                    </ul>
                </div>

                <div class="supplements-info my-4">
                    <h3>Compléments Alimentaires</h3>
                    <img src="../img/alimentation/complement.png" alt="Compléments Alimentaires" class="limited-img mb-3">
                    <p>Les compléments alimentaires peuvent aider à combler les carences nutritionnelles et améliorer vos performances. Voici quelques compléments recommandés :</p>
                    <ul>
                        <li>Protéine en poudre pour augmenter votre apport protéique.</li>
                        <li>Créatine pour améliorer la force et l'endurance.</li>
                        <li>Oméga-3 pour la santé cardiovasculaire et la réduction de l'inflammation.</li>
                    </ul>
                </div>

                <div class="quiz my-4">
                    <h3>Calculer votre IMC et vos Besoins Nutritionnels</h3>
                    <form id="imc-form" class="text-left">
                        <div class="form-group">
                            <label for="weight">Poids (kg)</label>
                            <input type="number" class="form-control" id="weight" required>
                        </div>
                        <div class="form-group">
                            <label for="height">Taille (cm)</label>
                            <input type="number" class="form-control" id="height" required>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="calculateIMC()">Calculer</button>
                    </form>
                    <p id="imc-result" class="mt-3"></p>
                </div>

                <div class="coaches my-4">
                    <h3>Nutritionnistes</h3>
                    <div class="d-flex flex-wrap justify-content-center">
                        <?php include '../php/display_coaches.php'; display_coaches('Nutrition'); ?>
                    </div>
                </div>

                <!-- Payment Button -->
                <div class="payment my-4">
                    <h3>Acheter des Compléments Alimentaires</h3>
                    <?php if (isset($_SESSION['user_id'])): ?>
                    <form id="orderForm" class="text-left" action="payment.php" method="GET">
                        <div class="form-group">
                            <label for="product">Produit</label>
                            <select class="form-control" id="product" name="product" required>
                                <option value="creatine">Créatine</option>
                                <option value="whey">Whey (1.2kg)</option>
                                <option value="trenbolone">Trenbolone</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Passer au paiement</button>
                    </form>
                    <?php else: ?>
                    <p class="text-danger">Veuillez vous connecter pour effectuer un achat.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <div class="marquee">
            <p>Pour votre santé, mangez 5 fruits et légumes par jour</p>
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
    <script src="../js/imc.js"></script>
</body>
</html>
