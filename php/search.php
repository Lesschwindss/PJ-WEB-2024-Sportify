<?php
include 'db_connection.php';

$query = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';

$sql = "SELECT users.first_name, users.last_name, users.email, coaches.specialty 
        FROM users 
        JOIN coaches ON users.user_id = coaches.user_id 
        WHERE users.first_name LIKE '%$query%' 
        OR users.last_name LIKE '%$query%' 
        OR coaches.specialty LIKE '%$query%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="table table-bordered">';
    echo '<thead><tr><th>Prénom</th><th>Nom</th><th>Email</th><th>Spécialité</th></tr></thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['first_name']) . '</td>';
        echo '<td>' . htmlspecialchars($row['last_name']) . '</td>';
        echo '<td>' . htmlspecialchars($row['email']) . '</td>';
        echo '<td>' . htmlspecialchars($row['specialty']) . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo '<p class="text-center">Aucun résultat trouvé.</p>';
}

$conn->close();
?>
