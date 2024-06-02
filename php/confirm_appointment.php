<?php
session_start();
require 'db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'coach') {
    header("Location: ../pages/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $appointment_id = $_POST['appointment_id'];
    $client_id = $_POST['client_id'];
    $notes = $_POST['notes'];

    // Récupérer les informations du rendez-vous
    $query = "SELECT * FROM appointments WHERE appointment_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $appointment_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $appointment = $result->fetch_assoc();
    $stmt->close();

    if ($appointment) {
        // Insérer le rendez-vous dans la table consultations
        $query = "INSERT INTO consultations (client_id, coach_id, consultation_date, notes) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iiss", $client_id, $appointment['coach_id'], $appointment['appointment_date'], $notes);
        $stmt->execute();
        $stmt->close();

        // Supprimer le rendez-vous de la table appointments
        $query = "DELETE FROM appointments WHERE appointment_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $appointment_id);
        $stmt->execute();
        $stmt->close();

        header("Location: ../pages/votre_compte_pro.php");
    } else {
        echo "Erreur: Rendez-vous introuvable.";
    }
}
$conn->close();
?>
