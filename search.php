<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche - Sportify</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="wrapper">
        <?php include '../php/header.php'; ?>
        <section class="section py-5">
            <div class="container">
                <h2 class="text-center">Recherche</h2>
                <!-- Formulaire de recherche -->
                <form id="search-form">
                    <div class="form-group">
                        <input type="text" class="form-control" id="query" name="query" placeholder="Rechercher par nom, prénom ou spécialité">
                    </div>
                    <button type="submit" class="btn btn-primary">Rechercher</button>
                </form>
                
                <!-- Résultats de recherche -->
                <div class="search-results mt-4" id="search-results"></div>
            </div>
        </section>
        <?php include '../php/footer.php'; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/submenu.js"></script>
    <script>
        $(document).ready(function() {
            $('#search-form').on('submit', function(e) {
                e.preventDefault();
                var query = $('#query').val();
                $.ajax({
                    url: '../php/search.php',
                    type: 'GET',
                    data: { query: query },
                    success: function(data) {
                        $('#search-results').html(data);
                    },
                    error: function() {
                        $('#search-results').html('<p class="text-center">Une erreur est survenue. Veuillez réessayer.</p>');
                    }
                });
            });
        });
    </script>
</body>
</html>
