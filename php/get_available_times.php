<?php
include 'db_connection.php';

$coach_id = $_GET['coach_id'];
$day = $_GET['day'];
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
    foreach ($availabilityXml->day as $availableDay) {
        if (htmlspecialchars($availableDay['name']) == $day) {
            foreach ($availableDay->time as $timeRange) {
                $times = explode('-', htmlspecialchars($timeRange));
                $start = strtotime($times[0]);
                $end = strtotime($times[1]);

                // Générer des créneaux horaires de 1 heure
                while ($start < $end) {
                    $slotStart = date('H:i', $start);
                    $slotEnd = date('H:i', strtotime('+1 hour', $start));
                    if (strtotime($slotEnd) <= $end) {
                        $slots[] = $slotStart . '-' . $slotEnd;
                    }
                    $start = strtotime($slotEnd);
                }
            }
        }
    }
}

echo json_encode($slots);
?>
