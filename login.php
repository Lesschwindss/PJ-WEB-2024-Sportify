<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Sportify</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="wrapper">
        <?php include '../php/header.php'; ?>
        <section class="section py-5">
            <div class="container">
                <h2 class="text-center">Connexion</h2>
                <div id="message" class="text-center"></div>
                <form id="loginForm" class="col-md-6 offset-md-3">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                </form>
                <div class="text-center mt-3">
                    <p>Vous n'avez pas de compte ?</p>
                    <a href="register_selection.php" class="btn btn-secondary">Créer votre compte</a>
                </div>
            </div>
        </section>
        <?php include '../php/footer.php'; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#loginForm').submit(function(event) {
                event.preventDefault();
                $.ajax({
                    url: '../php/login.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.status === 'success') {
                            $('#message').html('<p class="text-success">' + response.message + '</p>');
                            setTimeout(function() {
                                if (response.user_type === 'admin') {
                                    window.location.href = 'votre_compte_admin.php';
                                } else if (response.user_type === 'coach') {
                                    window.location.href = 'votre_compte_pro.php';
                                } else {
                                    window.location.href = 'votre_compte_utilisateur.php';
                                }
                            }, 1000);
                        } else {
                            $('#message').html('<p class="text-danger">' + response.message + '</p>');
                        }
                    }
                });
            });
        });
    </script>
        <script src="../js/submenu.js"></script>
</body>
</html>
