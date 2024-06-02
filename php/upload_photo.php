<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'admin') {
    header("Location: login.php");
    exit();
}
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['photoFile']) && isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    
    // Récupérer les informations du coach
    $query = "SELECT first_name, last_name FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($first_name, $last_name);
    $stmt->fetch();
    $stmt->close();

    $targetDir = "../photos/";
    $fileExtension = pathinfo($_FILES["photoFile"]["name"], PATHINFO_EXTENSION);
    $fileName = "photo_" . $first_name . "_" . $last_name . "." . $fileExtension; // Nom de fichier sans timestamp
    $targetFile = $targetDir . $fileName;

    // Vérifiez si l'extension de fichier est une image valide
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
        echo "Erreur: Les fichiers doivent être de type JPG, JPEG, PNG ou GIF.";
        exit();
    }

    if (move_uploaded_file($_FILES["photoFile"]["tmp_name"], $targetFile)) {
        // Mettre à jour le lien de la photo dans la base de données
        $query = "UPDATE coaches SET photos_de_profil = ? WHERE user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $fileName, $user_id);

        if ($stmt->execute()) {
            echo "La photo a été téléchargée avec succès.";
        } else {
            echo "Erreur lors de la mise à jour de la base de données.";
        }
        $stmt->close();
    } else {
        echo "Erreur lors du téléchargement du fichier.";
    }
    header("Location: ../pages/votre_compte_admin.php");
    exit();
}
?>
