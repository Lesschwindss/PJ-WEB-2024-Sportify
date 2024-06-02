<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveaux Clients - Sportify</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="wrapper">
        <?php include '../php/header.php'; ?>

        <section class="section py-5">
            <div class="container">
                <h2 class="text-center">Bienvenue à nos Nouveaux Clients</h2>
                <p class="text-center">Découvrez nos différentes formules d'abonnement et commencez votre parcours sportif avec nous.</p>

                <div class="subscription-options my-4">
                    <h3>Formules d'Abonnement</h3>
                    <ul>
                        <li>Formule Découverte : Accès illimité pendant 1 mois pour 29.99€.</li>
                        <li>Formule Classique : Abonnement annuel pour 299.99€, avec accès à toutes les activités.</li>
                        <li>Formule Premium : Abonnement annuel pour 499.99€, incluant un coaching personnalisé.</li>
                    </ul>
                </div>

                <div class="registration-info my-4">
                    <h3>Comment s'inscrire</h3>
                    <p>Pour vous inscrire, créez un compte sur notre site et choisissez la formule qui vous convient le mieux. Vous recevrez un email de confirmation avec les détails de votre abonnement.</p>
                </div>
            </div>
        </section>

        <div class="marquee">
            <p>Rejoignez-nous et commencez votre transformation aujourd'hui !</p>
        </div>

        <?php include '../php/footer.php'; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/submenu.js"></script>
</body>
</html>
