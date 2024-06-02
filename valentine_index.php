<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportify: Saint-Valentin</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/valentine.css"> <!-- Nouveau style pour la Saint-Valentin -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="valentine-theme">
    <div class="wrapper">
        <?php include '../php/header.php'; ?>

        <section class="section py-5 text-center">
            <div class="container">
                <h2>Joyeuse Saint-Valentin de Sportify</h2>
                <p>Fêtez l'amour et le sport avec nous!</p>
                <div class="video-container my-4">
                    <video autoplay loop playsinline>
                        <source src="../media/valentine.mp4" type="video/mp4">
                        Votre navigateur ne supporte pas les vidéos HTML5.
                    </video>
                </div>
                <div class="event-of-the-week my-4">
                    <h3>Événement spécial de la Saint-Valentin</h3>
                    <p>Un match de rugby entre Omnes Education vs. Visiteurs, une rencontre avec le coach et joueurs de tennis, etc.</p>
                </div>
                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../img/valentine1.jpg" class="d-block w-100" alt="Valentine 1">
                        </div>
                        <div class="carousel-item">
                            <img src="../img/valentine2.jpg" class="d-block w-100" alt="Valentine 2">
                        </div>
                        <div class="carousel-item">
                            <img src="../img/valentine3.jpg" class="d-block w-100" alt="Valentine 3">
                        </div>
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
            <p>Joyeuse Saint-Valentin - Joyeuse Saint-Valentin - Joyeuse Saint-Valentin - Joyeuse Saint-Valentin - Joyeuse Saint-Valentin - Joyeuse Saint-Valentin - Joyeuse Saint-Valentin - Joyeuse Saint-Valentin</p>
        </div>

        <?php include '../php/footer.php'; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/submenu.js"></script>
</body>
</html>
