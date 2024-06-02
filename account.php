<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../php/db_connection.php';

// Récupérer le type de l'utilisateur pour la redirection
$user_id = $_SESSION['user_id'];
$query = "SELECT user_type FROM users WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Redirection en fonction du type de l'utilisateur
if ($user) {
    switch ($user['user_type']) {
        case 'admin':
            header("Location: admin_account.php");
            break;
        case 'pro':
            header("Location: pro_account.php");
            break;
        case 'utilisateur':
            header("Location: user_account.php");
            break;
        default:
            // Par défaut, on peut rester sur la même page ou rediriger vers une page d'erreur
            header("Location: unknown_account_type.php");
            break;
    }
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Compte - Sportify</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="wrapper">
        <?php include '../php/header.php'; ?>
        <section class="section py-5">
            <div class="container">
                <h2 class="text-center">Votre Compte</h2>
                <?php
                $user_id = $_SESSION['user_id'];
                $query = "SELECT first_name, last_name, email, user_type FROM users WHERE user_id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $user = $result->fetch_assoc();

                $appointments_query = "SELECT a.appointment_id, a.appointment_date, a.address, a.document_requested, a.digicode, u.first_name, u.last_name
                                       FROM appointments a
                                       JOIN users u ON a.coach_id = u.user_id
                                       WHERE a.client_id = ?";
                $appointments_stmt = $conn->prepare($appointments_query);
                $appointments_stmt->bind_param("i", $user_id);
                $appointments_stmt->execute();
                $appointments_result = $appointments_stmt->get_result();
                ?>
                <div class="account-info">
                    <h3>Informations Personnelles</h3>
                    <p>Nom: <?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></p>
                    <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
                    <p>Type de compte: <?php echo htmlspecialchars($user['user_type']); ?></p>
                </div>

                <div class="appointments-info my-4">
                    <h3>Vos Rendez-vous</h3>
                    <?php if ($appointments_result->num_rows > 0): ?>
                        <ul>
                            <?php while ($appointment = $appointments_result->fetch_assoc()): ?>
                                <li>
                                    <strong>Coach:</strong> <?php echo htmlspecialchars($appointment['first_name'] . ' ' . $appointment['last_name']); ?><br>
                                    <strong>Date et Heure:</strong> <?php echo htmlspecialchars($appointment['appointment_date']); ?><br>
                                    <strong>Adresse:</strong> <?php echo htmlspecialchars($appointment['address']); ?><br>
                                    <strong>Document Requis:</strong> <?php echo htmlspecialchars($appointment['document_requested']); ?><br>
                                    <strong>Digicode:</strong> <?php echo htmlspecialchars($appointment['digicode']); ?><br>
                                    <form action="../php/cancel_appointment.php" method="post">
                                        <input type="hidden" name="appointment_id" value="<?php echo $appointment['appointment_id']; ?>">
                                        <button type="submit" class="btn btn-danger">Annuler le RDV</button>
                                    </form>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php else: ?>
                        <p>Vous n'avez aucun rendez-vous à venir.</p>
                    <?php endif; ?>
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
