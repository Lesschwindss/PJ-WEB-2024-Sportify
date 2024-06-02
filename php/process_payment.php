<?php
session_start();
require 'db_connection.php';

header('Content-Type: application/json');

$response = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['user_id'])) {
        $response['status'] = 'error';
        $response['message'] = 'Vous devez être connecté pour effectuer un paiement.';
        echo json_encode($response);
        exit();
    }

    $client_id = $_SESSION['user_id'];

    // Récupérer les informations de paiement
    $product = $_POST['product'];
    $amount = floatval($_POST['amount']);
    $promo_code = $_POST['promo_code'];
    $payment_method = $_POST['payment_method'];
    $card_number = $_POST['card_number'];
    $card_holder_name = $_POST['card_holder_name'];
    $card_expiry_date = $_POST['card_expiry_date'];
    $card_security_code = $_POST['card_security_code'];

    // Calculer le montant final après application du code promo
    $discount = 0;
    if ($promo_code == 'NUTRI15') {
        $discount = 0.15 * $amount;
    }
    $final_amount = $amount - $discount;

    // Insérer les détails de paiement dans la base de données
    $sql = "INSERT INTO payments (client_id, amount, payment_date, payment_method, card_number, card_holder_name, card_expiry_date, card_security_code) VALUES (?, ?, NOW(), ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        $response['status'] = 'error';
        $response['message'] = 'Erreur de préparation de la requête: ' . $conn->error;
        echo json_encode($response);
        exit();
    }

    // Lier les paramètres
    $stmt->bind_param("idssssss", $client_id, $final_amount, $payment_method, $card_number, $card_holder_name, $card_expiry_date, $card_security_code);
    $exec = $stmt->execute();
    
    if ($exec) {
        $response['status'] = 'success';
        $response['message'] = 'Paiement accepté !';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Le paiement a échoué. Veuillez réessayer.';
    }

    $stmt->close();
    echo json_encode($response);
    $conn->close();
}
?>
