<?php
include 'db_connection.php';

$coach_id = $_GET['coach_id'];
$days = [];

// Charger les disponibilités du coach à partir du fichier XML
$query = "SELECT availabilities FROM coaches WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $coach_id);
$stmt->execute();
$stmt->bind_result($availabilitiesFile);
$stmt->fetch();
$stmt->close();

$availabilityFile = '../availabilities/' . htmlspecialchars($availabilitiesFile);
if (file_exists($availabilityFile)) {
    $availabilityXml = simplexml_load_file($availabilityFile);
    foreach ($availabilityXml->day as $availableDay) {
        $days[] = htmlspecialchars($availableDay['name']);
    }
}

echo json_encode($days);
?>
