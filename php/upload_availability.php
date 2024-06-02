<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'admin') {
    header("Location: login.php");
    exit();
}
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['availabilityFile']) && isset($_POST['user_id'])) {
    $targetDir = "../availabilities/";
    $fileName = basename($_FILES["availabilityFile"]["name"]);
    $targetFile = $targetDir . $fileName;
    $user_id = $_POST['user_id'];

    if (move_uploaded_file($_FILES["availabilityFile"]["tmp_name"], $targetFile)) {
        $query = "UPDATE coaches SET availabilities = ? WHERE user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $fileName, $user_id);
        
        if ($stmt->execute()) {
            echo "Le planning a été téléchargé avec succès.";
        } else {
            echo "Erreur lors de la mise à jour de la base de données.";
        }
    } else {
        echo "Erreur lors du téléchargement du fichier.";
    }
    header("Location: ../pages/votre_compte_admin.php");
    exit();
}
?>
