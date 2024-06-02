<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'coach') {
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
    <title>Votre Compte (Coach) - Sportify</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="wrapper">
        <?php include '../php/header.php'; ?>
        <section class="section py-5">
            <div class="container">
                <h2 class="text-center">Votre Compte (Coach)</h2>
                <div class="account-info mb-4">
                    <h3>Informations Personnelles</h3>
                    <p>Nom: <?php echo htmlspecialchars($_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name']); ?></p>
                    <p>Email: <?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
                    <p>Type de compte: Coach</p>
                </div>
                <div class="coach-actions my-4">
                    <h3>Vos Rendez-vous à venir</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date et Heure</th>
                                <th>Client</th>
                                <th>Adresse</th>
                                <th>Document Requis</th>
                                <th>Digicode</th>
                                <th>Statut</th>
                                <th>Action</th>
                                <th>Chat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $user_id = $_SESSION['user_id'];
                            $current_date = date('Y-m-d H:i:s');
                            $query = "SELECT a.appointment_id, a.appointment_date, a.address, a.document_requested, a.digicode, a.status, u.first_name, u.last_name, a.client_id
                                      FROM appointments a
                                      JOIN users u ON a.client_id = u.user_id
                                      JOIN coaches c ON a.coach_id = c.coach_id
                                      WHERE c.user_id = ? AND a.appointment_date >= ?
                                      ORDER BY a.appointment_date ASC";
                            $stmt = $conn->prepare($query);
                            $stmt->bind_param("is", $user_id, $current_date);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                while ($appointment = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . htmlspecialchars($appointment['appointment_date']) . '</td>';
                                    echo '<td>' . htmlspecialchars($appointment['first_name'] . ' ' . $appointment['last_name']) . '</td>';
                                    echo '<td>' . htmlspecialchars($appointment['address']) . '</td>';
                                    echo '<td>' . htmlspecialchars($appointment['document_requested']) . '</td>';
                                    echo '<td>' . htmlspecialchars($appointment['digicode']) . '</td>';
                                    echo '<td>' . htmlspecialchars($appointment['status']) . '</td>';
                                    echo '<td>';
                                    echo '<form action="../php/confirm_appointment.php" method="post" class="d-inline">';
                                    echo '<input type="hidden" name="appointment_id" value="' . htmlspecialchars($appointment['appointment_id']) . '">';
                                    echo '<input type="hidden" name="client_id" value="' . htmlspecialchars($appointment['client_id']) . '">';
                                    echo '<textarea name="notes" class="form-control mb-2" placeholder="Notes"></textarea>';
                                    echo '<button type="submit" class="btn btn-success btn-sm">Confirmer Fin RDV</button>';
                                    echo '</form>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<a href="../pages/chat.php" class="btn btn-primary btn-sm">Rejoindre le chat</a>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr><td colspan="8" class="text-center">Aucun rendez-vous à venir</td></tr>';
                            }
                            $stmt->close();
                            ?>
                        </tbody>
                    </table>
                    <h3>Vos Consultations Passées</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date et Heure</th>
                                <th>Client</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT c.consultation_date, c.notes, u.first_name, u.last_name
                                      FROM consultations c
                                      JOIN users u ON c.client_id = u.user_id
                                      JOIN coaches co ON c.coach_id = co.coach_id
                                      WHERE co.user_id = ?
                                      ORDER BY c.consultation_date DESC";
                            $stmt = $conn->prepare($query);
                            $stmt->bind_param("i", $user_id);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                while ($consultation = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . htmlspecialchars($consultation['consultation_date']) . '</td>';
                                    echo '<td>' . htmlspecialchars($consultation['first_name'] . ' ' . $consultation['last_name']) . '</td>';
                                    echo '<td>' . htmlspecialchars($consultation['notes']) . '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr><td colspan="3" class="text-center">Aucune consultation passée</td></tr>';
                            }
                            $stmt->close();
                            ?>
                        </tbody>
                    </table>
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
