<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../index.php");
    exit();
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "../../config/connexion.php";

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $matricul = $_POST['matricul'];
        $date = $_POST['date'];
        $heure = $_POST['heure'];
        $periode = $_POST['periode'];
        $filiere = $_POST['filiere'];
        $niveau = $_POST['niveau'];
        $matiere = $_POST['matiere'];

        $sql = "INSERT INTO seance (matricul, date, heure, periode, filiere, niveau, matiere) VALUES (:matricul, :date, :heure, :periode, :filiere, :niveau, :matiere)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':matricul', $matricul);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':heure', $heure);
        $stmt->bindParam(':periode', $periode);
        $stmt->bindParam(':filiere', $filiere);
        $stmt->bindParam(':niveau', $niveau);
        $stmt->bindParam(':matiere', $matiere);

        if ($stmt->execute()) {
            echo "Enregistrement réussi.";
            header("Location: cahier_de_presence.php");
        } else {
            echo "Erreur lors de l'enregistrement.";
        }
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
}
?>
