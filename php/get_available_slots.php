<?php
include 'db_connection.php';

$coach_id = $_GET['coach_id'];
$slots = [];

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
    foreach ($availabilityXml->day as $day) {
        foreach ($day->time as $time) {
            $datetime = htmlspecialchars($day['name']) . ' ' . htmlspecialchars($time);
            if (!is_conflict($coach_id, $datetime)) {
                $slots[] = $datetime;
            }
        }
    }
}

// Fonction pour vérifier les conflits de rendez-vous
function is_conflict($coach_id, $datetime) {
    include 'db_connection.php';

    $sql = "SELECT COUNT(*) AS count FROM appointments WHERE coach_id = ? AND appointment_date = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $coach_id, $datetime);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $stmt->close();
    $conn->close();

    return $row['count'] > 0;
}

echo json_encode($slots);
?>
