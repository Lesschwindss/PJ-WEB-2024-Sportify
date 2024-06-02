<?php
require 'db_connection.php';

$response = array("status" => "error", "message" => "Une erreur s'est produite. Veuillez réessayer.");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $specialty = $_POST['specialty'];

    $conn->begin_transaction();

    try {
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, user_type) VALUES (?, ?, ?, ?, 'coach')");
        $stmt->bind_param("ssss", $first_name, $last_name, $email, $password);
        $stmt->execute();
        $user_id = $stmt->insert_id;
        $stmt->close();

        $stmt = $conn->prepare("INSERT INTO coaches (user_id, specialty) VALUES (?, ?)");
        $stmt->bind_param("is", $user_id, $specialty);
        $stmt->execute();
        $stmt->close();

        $conn->commit();
        $response["status"] = "success";
        $response["message"] = "Inscription réussie. Vous pouvez maintenant vous connecter.";
    } catch (Exception $e) {
        $conn->rollback();
        $response["message"] = "Erreur: " . $e->getMessage();
    }

    $conn->close();
}

echo json_encode($response);
?>
