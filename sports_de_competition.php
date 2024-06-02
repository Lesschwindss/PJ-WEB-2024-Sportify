<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports de compétition</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="wrapper">
        <?php include '../php/header.php'; ?>

        <section class="section">
            <div class="container">
                <h2 class="text-center">Sports de Compétition</h2>
                <p>
                    Bienvenue dans la section des sports de compétition de Sportify. Découvrez nos différentes activités de compétition et trouvez des informations détaillées en cliquant sur les pages spécifiques. Vous pourrez également prendre rendez-vous avec nos entraîneurs professionnels.
                </p>
                <div class="text-center mt-4">
                    <a href="basketball.php" class="btn btn-primary btn-lg btn-custom">Basketball</a>
                    <a href="football.php" class="btn btn-primary btn-lg btn-custom">Football</a>
                    <a href="rugby.php" class="btn btn-primary btn-lg btn-custom">Rugby</a>
                    <a href="tennis.php" class="btn btn-primary btn-lg btn-custom">Tennis</a>
                    <a href="natation.php" class="btn btn-primary btn-lg btn-custom">Natation</a>
                    <a href="plongeon.php" class="btn btn-primary btn-lg btn-custom">Plongeon</a>
                </div>
            </div>
        </section>

        <div class="marquee">
            <p>Sports de compétition - Sports de compétition - Sports de compétition - Sports de compétition - Sports de compétition -</p>
        </div>

        <?php include '../php/footer.php'; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/submenu.js"></script>
</body>
</html>
