<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'client') {
    echo json_encode(['error' => 'Unauthorized']);
    exit();
}

$client_id = $_SESSION['user_id'];
$coach_user_id = $_POST['coach_id']; // Ceci est le user_id du coach
$appointment_date = $_POST['appointment_date'];
$appointment_time = $_POST['appointment_time'];
$appointment_address = $_POST['appointment_address'];
$document_requested = $_POST['document_requested'];
$digicode = $_POST['digicode'];
$status = 'confirmed';

$appointment_datetime = $appointment_date . ' ' . explode('-', $appointment_time)[0];

// Récupérer le coach_id correspondant au user_id du coach
$coach_query = "SELECT coach_id FROM coaches WHERE user_id = ?";
$coach_stmt = $conn->prepare($coach_query);
$coach_stmt->bind_param("i", $coach_user_id);
$coach_stmt->execute();
$coach_stmt->bind_result($coach_id);
$coach_stmt->fetch();
$coach_stmt->close();

if (!$coach_id) {
    echo json_encode(['error' => 'Invalid coach ID']);
    exit();
}

$sql = "INSERT INTO appointments (client_id, coach_id, appointment_date, address, document_requested, digicode, status) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    echo json_encode(['error' => 'Failed to prepare statement', 'details' => $conn->error]);
    exit();
}

$stmt->bind_param("iisssss", $client_id, $coach_id, $appointment_datetime, $appointment_address, $document_requested, $digicode, $status);

if ($stmt->execute()) {
    echo json_encode(['success' => 'Appointment made successfully']);
} else {
    echo json_encode(['error' => 'Failed to make appointment', 'details' => $stmt->error]);
}

$stmt->close();
$conn->close();
?>
