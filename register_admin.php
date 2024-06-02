<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Administrateur - Sportify</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="wrapper">
        <?php include '../php/header.php'; ?>
        <section class="section py-5">
            <div class="container">
                <h2 class="text-center">Inscription Administrateur</h2>
                <div id="message" class="text-center"></div>
                <form id="registerForm" class="col-md-6 offset-md-3">
                    <div class="form-group">
                        <label for="first_name">Prénom</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Nom</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
                </form>
                <div class="text-center mt-4">
                    <a href="register_selection.php" class="btn btn-primary btn-lg mr-3">Retour au choix du compte</a>
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
            $('#registerForm').submit(function(event) {
                event.preventDefault();
                $.ajax({
                    url: '../php/register_admin.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#message').html('<p class="text-' + (response.status === 'success' ? 'success' : 'danger') + '">' + response.message + '</p>');
                        if (response.status === 'success') {
                            setTimeout(function() {
                                window.location.href = 'login.php';
                            }, 1000);
                        }
                    }
                });
            });
        });
    </script>
    <script src="../js/submenu.js"></script>
</body>
</html>
