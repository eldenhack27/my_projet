<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../../index.php");
    exit();
}

include "../../config/connexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $current_password = $_POST['mot_de_passe'];
    $new_password = $_POST['mot_de_passenew'];
    $confirm_new_password = $_POST['mot_de_passenews'];

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT mot_de_passe FROM enseignant WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Debugging lines
            echo "Mot de passe actuel saisi : " . $current_password . "<br>";
            echo "Mot de passe haché dans la base de données : " . $result['mot_de_passe'] . "<br>";

            if (password_verify($current_password, $result['mot_de_passe'])) {
                echo "Le mot de passe actuel est correct.<br>"; // Debugging line
                if ($new_password === $confirm_new_password) {
                    $new_password_hashed = password_hash($new_password, PASSWORD_BCRYPT);
                    $sql_update = "UPDATE enseignant SET mot_de_passe = :new_password WHERE id = :id";
                    $stmt_update = $pdo->prepare($sql_update);
                    $stmt_update->bindParam(':new_password', $new_password_hashed, PDO::PARAM_STR);
                    $stmt_update->bindParam(':id', $id, PDO::PARAM_STR);
                    $stmt_update->execute();
                    echo "Mot de passe mis à jour avec succès.";
                    header("Location: enseignant_role.php?id=" . htmlspecialchars($id));
            exit();
                } else {
                    echo "Les nouveaux mots de passe ne correspondent pas.";
                }
            } else {
                echo "Le mot de passe actuel est incorrect.";
            }
        } else {
            echo "Utilisateur non trouvé.";
        }
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
} else {
    echo "Requête invalide.";
}
?>
