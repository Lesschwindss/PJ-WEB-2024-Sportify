<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Sportify</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="wrapper">
        <?php include '../php/header.php'; ?>
        <section class="section py-5">
            <div class="container">
                <h2 class="text-center">Inscription</h2>
                <div class="text-center mt-4">
                    <a href="register_client.php" class="btn btn-primary btn-lg mr-3">Compte Personnel</a>
                    <a href="register_coach.php" class="btn btn-secondary btn-lg">Compte Professionnel</a>
                    <?php
                    require '../php/db_connection.php';

                    $adminExistsQuery = "SELECT COUNT(*) as admin_count FROM users WHERE user_type = 'admin'";
                    $result = $conn->query($adminExistsQuery);
                    $row = $result->fetch_assoc();

                    if ($row['admin_count'] == 0) {
                        echo '<a href="register_admin.php" class="btn btn-danger btn-lg mt-3">Compte Administrateur</a>';
                    } else {
                        echo '<button class="btn btn-danger btn-lg mt-3" disabled>Compte Administrateur (déjà existant)</button>';
                    }
                    ?>
                </div>
            </div>
        </section>
        <?php include '../php/footer.php'; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/submenu.js"></script>
</body>
</html>
