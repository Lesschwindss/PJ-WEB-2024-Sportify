<?php
session_start();
require 'db_connection.php';

header('Content-Type: application/json');

$response = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Vérifier si un administrateur existe déjà
    $adminCheckQuery = "SELECT COUNT(*) as admin_count FROM users WHERE user_type = 'admin'";
    $result = $conn->query($adminCheckQuery);
    $row = $result->fetch_assoc();

    if ($row['admin_count'] > 0) {
        $response['status'] = 'error';
        $response['message'] = 'Un administrateur existe déjà.';
    } else {
        $query = "INSERT INTO users (first_name, last_name, email, password, user_type) VALUES (?, ?, ?, ?, 'admin')";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssss", $first_name, $last_name, $email, $password);

        if ($stmt->execute()) {
            $_SESSION['user_id'] = $conn->insert_id;
            $_SESSION['user_first_name'] = $first_name;
            $_SESSION['user_last_name'] = $last_name;
            $_SESSION['user_email'] = $email;
            $_SESSION['user_type'] = 'admin';
            $response['status'] = 'success';
            $response['message'] = 'Inscription réussie.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Erreur lors de la création du compte.';
        }
    }

    echo json_encode($response);
}
?>
