<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'coach') {
    echo json_encode(['error' => 'Unauthorized']);
    exit();
}

$user_id = $_SESSION['user_id'];
$current_date = date('Y-m-d H:i:s');

try {
    // Rendez-vous à venir
    $query = "SELECT a.appointment_id, a.appointment_date, a.address, a.document_requested, a.digicode, u.first_name, u.last_name
              FROM appointments a
              JOIN users u ON a.client_id = u.user_id
              WHERE a.coach_id = ? AND a.appointment_date >= ?
              ORDER BY a.appointment_date ASC";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        throw new Exception("Failed to prepare statement: " . $conn->error);
    }
    $stmt->bind_param("is", $user_id, $current_date);
    $stmt->execute();
    $result = $stmt->get_result();
    $upcoming_appointments = [];
    while ($row = $result->fetch_assoc()) {
        $upcoming_appointments[] = $row;
    }
    $stmt->close();

    // Rendez-vous passés
    $query = "SELECT a.appointment_id, a.appointment_date, a.address, a.document_requested, a.digicode, u.first_name, u.last_name
              FROM appointments a
              JOIN users u ON a.client_id = u.user_id
              WHERE a.coach_id = ? AND a.appointment_date < ?
              ORDER BY a.appointment_date DESC";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        throw new Exception("Failed to prepare statement: " . $conn->error);
    }
    $stmt->bind_param("is", $user_id, $current_date);
    $stmt->execute();
    $result = $stmt->get_result();
    $past_appointments = [];
    while ($row = $result->fetch_assoc()) {
        $past_appointments[] = $row;
    }
    $stmt->close();

    $response = [
        'upcoming_appointments' => $upcoming_appointments,
        'past_appointments' => $past_appointments
    ];

    echo json_encode($response);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
