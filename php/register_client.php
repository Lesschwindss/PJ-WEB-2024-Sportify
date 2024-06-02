<?php
session_start();
require 'db_connection.php';

header('Content-Type: application/json');

$response = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validation des champs obligatoires
    if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['address_line1']) || empty($_POST['city']) || empty($_POST['postal_code']) || empty($_POST['country']) || empty($_POST['phone_number'])) {
        $response['status'] = 'error';
        $response['message'] = 'Tous les champs obligatoires doivent être remplis.';
        echo json_encode($response);
        exit();
    }

    // Préparation des données
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $user_type = 'client';
    $address_line1 = $_POST['address_line1'];
    $address_line2 = !empty($_POST['address_line2']) ? $_POST['address_line2'] : null;
    $city = $_POST['city'];
    $postal_code = $_POST['postal_code'];
    $country = $_POST['country'];
    $phone_number = $_POST['phone_number'];
    $student_card = !empty($_POST['student_card']) ? $_POST['student_card'] : null;

    // Insertion dans la table `users`
    $query = "INSERT INTO users (first_name, last_name, email, password, user_type, address_line1, address_line2, city, postal_code, country, phone_number, student_card) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        $response['status'] = 'error';
        $response['message'] = 'Erreur de préparation de la requête: ' . $conn->error;
        echo json_encode($response);
        exit();
    }
    $stmt->bind_param("ssssssssssss", $first_name, $last_name, $email, $password, $user_type, $address_line1, $address_line2, $city, $postal_code, $country, $phone_number, $student_card);

    if ($stmt->execute()) {
        $_SESSION['user_id'] = $conn->insert_id;
        $_SESSION['user_first_name'] = $first_name;
        $_SESSION['user_last_name'] = $last_name;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_type'] = $user_type;
        $response['status'] = 'success';
        $response['message'] = 'Inscription réussie.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Erreur lors de la création du compte: ' . $stmt->error;
    }

    $stmt->close();
    echo json_encode($response);
}
?>
