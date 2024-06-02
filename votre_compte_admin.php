<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'admin') {
    header("Location: login.php");
    exit();
}
require '../php/db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Compte (Admin) - Sportify</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="wrapper">
        <?php include '../php/header.php'; ?>
        <section class="section py-5">
            <div class="container">
                <h2 class="text-center">Votre Compte (Admin)</h2>
                <div class="account-info mb-4">
                    <h3>Informations Personnelles</h3>
                    <p>Nom: <?php echo htmlspecialchars($_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name']); ?></p>
                    <p>Email: <?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
                    <p>Type de compte: Admin</p>
                </div>
                <div class="admin-actions my-4">
                    <h3>Gestion des Coachs</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Photo</th>
                                <th>Consulter CV</th>
                                <th>Ajouter CV</th>
                                <th>Consulter Planning</th>
                                <th>Ajouter Planning</th>
                                <th>Ajouter Photo</th>
                                <th>Supprimer Coach</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT u.user_id, u.first_name, u.last_name, u.email, c.cv_url, c.availabilities, c.photos_de_profil 
                                      FROM users u
                                      JOIN coaches c ON u.user_id = c.user_id";
                            $result = $conn->query($query);

                            if ($result->num_rows > 0) {
                                while ($coach = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . htmlspecialchars($coach['first_name'] . ' ' . $coach['last_name']) . '</td>';
                                    echo '<td>' . htmlspecialchars($coach['email']) . '</td>';
                                    echo '<td><img src="../photos/' . htmlspecialchars($coach['photos_de_profil']) . '" width="50" height="50" alt="Photo de ' . htmlspecialchars($coach['first_name']) . '"></td>';
                                    echo '<td><a href="../cv/' . htmlspecialchars($coach['cv_url']) . '" target="_blank" class="btn btn-info btn-sm">Consulter CV</a></td>';
                                    echo '<td>';
                                    echo '<form action="../php/upload_cv.php" method="post" enctype="multipart/form-data" class="d-inline">';
                                    echo '<input type="hidden" name="user_id" value="' . htmlspecialchars($coach['user_id']) . '">';
                                    echo '<input type="file" name="cvFile" accept=".xml" required>';
                                    echo '<button type="submit" class="btn btn-warning btn-sm">Ajouter CV</button>';
                                    echo '</form>';
                                    echo '</td>';
                                    echo '<td><a href="../availabilities/' . htmlspecialchars($coach['availabilities']) . '" target="_blank" class="btn btn-info btn-sm">Consulter Planning</a></td>';
                                    echo '<td>';
                                    echo '<form action="../php/upload_availability.php" method="post" enctype="multipart/form-data" class="d-inline">';
                                    echo '<input type="hidden" name="user_id" value="' . htmlspecialchars($coach['user_id']) . '">';
                                    echo '<input type="file" name="availabilityFile" accept=".xml" required>';
                                    echo '<button type="submit" class="btn btn-warning btn-sm">Ajouter Planning</button>';
                                    echo '</form>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<form action="../php/upload_photo.php" method="post" enctype="multipart/form-data" class="d-inline">';
                                    echo '<input type="hidden" name="user_id" value="' . htmlspecialchars($coach['user_id']) . '">';
                                    echo '<input type="file" name="photoFile" accept="image/*" required>';
                                    echo '<button type="submit" class="btn btn-warning btn-sm">Ajouter Photo</button>';
                                    echo '</form>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<form action="../php/delete_coach.php" method="post" class="d-inline">';
                                    echo '<input type="hidden" name="user_id" value="' . htmlspecialchars($coach['user_id']) . '">';
                                    echo '<button type="submit" class="btn btn-danger btn-sm">Supprimer Coach</button>';
                                    echo '</form>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr><td colspan="9" class="text-center">Aucun coach disponible</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="text-center mt-4">
                        <a href="register_coach.php" class="btn btn-success btn-lg">Créer Coach</a>
                    </div>
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
