<?php
session_start();
require 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $appointment_id = $_POST['appointment_id'];
    
    $query = "UPDATE appointments SET status = 'cancelled' WHERE appointment_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $appointment_id);
    if ($stmt->execute()) {
        header("Location: ../pages/votre_compte_utilisateur.php");
    } else {
        echo "Erreur lors de l'annulation du rendez-vous.";
    }
    $stmt->close();
}
$conn->close();
?>
