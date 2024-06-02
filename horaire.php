<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horaire - Sportify</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="wrapper">
        <?php include '../php/header.php'; ?>

        <section class="section py-5">
            <div class="container">
                <h2 class="text-center">Horaire de la Gym</h2>
                <p class="text-center">Consultez les horaires de la salle de sport OMNES pour planifier vos séances d'entraînement.</p>
                <p id="open-status" class="text-center font-weight-bold"></p>
                <div class="schedule-info my-4">
                    <h3>Horaires d'Ouverture</h3>
                    <p id="open-status" class="text-center font-weight-bold"></p>
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Jour</th>
                                <th>Heures d'Ouverture</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Lundi</td>
                                <td>6:00 - 22:00</td>
                            </tr>
                            <tr>
                                <td>Mardi</td>
                                <td>6:00 - 22:00</td>
                            </tr>
                            <tr>
                                <td>Mercredi</td>
                                <td>6:00 - 22:00</td>
                            </tr>
                            <tr>
                                <td>Jeudi</td>
                                <td>6:00 - 22:00</td>
                            </tr>
                            <tr>
                                <td>Vendredi</td>
                                <td>6:00 - 22:00</td>
                            </tr>
                            <tr>
                                <td>Samedi</td>
                                <td>8:00 - 20:00</td>
                            </tr>
                            <tr>
                                <td>Dimanche</td>
                                <td>8:00 - 20:00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <div class="marquee">
            <p>Pour votre santé, mangez 5 fruits et légumes par jour</p>
        </div>

        <?php include '../php/footer.php'; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/submenu.js"></script>
    <script src="../js/isopen.js"></script>
   
</body>
</html>
