<?php
function display_coaches($specialty) {
    include 'db_connection.php';

    $query = "SELECT u.user_id, u.first_name, u.last_name, c.specialty, c.cv_url, c.availabilities, c.photos_de_profil 
              FROM coaches c
              JOIN users u ON c.user_id = u.user_id
              WHERE c.specialty = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $specialty);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($coach = $result->fetch_assoc()) {
            $photo_path = '../photos/' . htmlspecialchars($coach['photos_de_profil']);
            echo '<div class="coach-card">';
            echo '<div class="img-container">';
            echo '<img src="' . $photo_path . '" alt="Photo de ' . htmlspecialchars($coach['first_name']) . ' ' . htmlspecialchars($coach['last_name']) . '">';
            echo '</div>';
            echo '<div class="card-body">';
            echo '<h4 class="card-title">' . htmlspecialchars($coach['first_name'] . ' ' . $coach['last_name']) . '</h4>';
            echo '<p class="card-text">Spécialité: ' . htmlspecialchars($coach['specialty']) . '</p>';
            echo '<a href="../cv/' . htmlspecialchars($coach['cv_url']) . '" target="_blank" class="btn btn-info btn-sm">Voir le CV</a>';

            // Lire et afficher les disponibilités à partir du fichier XML
            $availabilityFile = '../availabilities/' . htmlspecialchars($coach['availabilities']);
            if (file_exists($availabilityFile)) {
                $availabilityXml = simplexml_load_file($availabilityFile);
                echo '<h5>Disponibilités :</h5>';
                echo '<ul class="list-unstyled">';
                foreach ($availabilityXml->day as $day) {
                    echo '<li>' . htmlspecialchars($day['name']) . ': ';
                    $times = [];
                    foreach ($day->time as $time) {
                        $datetime = htmlspecialchars($day['name']) . ' ' . htmlspecialchars($time);
                        if (!is_conflict($coach['user_id'], $datetime)) {
                            $times[] = htmlspecialchars($time);
                        }
                    }
                    echo implode(', ', $times);
                    echo '</li>';
                }
                echo '</ul>';
            } else {
                echo '<p>Impossible de charger le planning.</p>';
            }

            // Bouton pour prendre un rendez-vous
            echo '<button class="btn btn-primary mt-2" data-toggle="modal" data-target="#appointmentModal" data-coach-id="' . $coach['user_id'] . '" data-coach-name="' . htmlspecialchars($coach['first_name'] . ' ' . $coach['last_name']) . '">Prendre un rendez-vous</button>';

            echo '</div>'; // Close card-body
            echo '</div>'; // Close coach-card
        }
    } else {
        echo '<p>Aucun coach de ' . htmlspecialchars($specialty) . ' disponible pour le moment.</p>';
    }

    $stmt->close();
    $conn->close();
}

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
?>
