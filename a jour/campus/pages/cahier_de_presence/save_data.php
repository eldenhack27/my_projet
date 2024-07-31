<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../index.php");
    exit();
}

// Activer l'affichage des erreurs pour le débogage
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

// Vérifier que la méthode de requête est POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer le corps de la requête JSON
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    // Log des données reçues
    error_log("Received data: " . $json);

    // Vérifier que les données JSON sont valides
    if ($data === null) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid JSON data']);
        exit;
    }

    // Vérifier si les clés 'qrData' et 'cahierData' existent
    if (!isset($data['qrData']) || !isset($data['cahierData'])) {
        echo json_encode(['status' => 'error', 'message' => 'Missing qrData or cahierData']);
        exit;
    }

    // Récupérer les informations du QR code
    $qrData = $data['qrData'];
    $matricule_qr = $qrData['matricule'] ?? '';
    $nom_qr = $qrData['nom'] ?? '';
    $filiere_qr = $qrData['filiere'] ?? '';
    $niveau_qr = $qrData['niveau'] ?? '';

    // Récupérer les informations du cahier
    $cahierData = $data['cahierData'];
    $matricul = $cahierData['matricul'];
    $date = $cahierData['date'];
    $heure = $cahierData['heure'];
    $periode = $cahierData['periode'];
    $filiere = $cahierData['filiere'];
    $niveau = $cahierData['niveau'];
    $matiere = $cahierData['matiere'];
    $professeur = $cahierData['professeur'];
    $etat = 1; // État présent par défaut

    // Vérifier que toutes les données nécessaires sont présentes
    $required_fields = ['matricule', 'nom', 'matricul', 'date', 'heure', 'periode', 'filiere', 'niveau', 'matiere', 'professeur'];
    $missing_fields = [];
    foreach ($required_fields as $field) {
        if (empty($$field)) {
            $missing_fields[] = $field;
        }
    }

    if (!empty($missing_fields)) {
        echo json_encode(['status' => 'error', 'message' => 'Missing required data: ' . implode(', ', $missing_fields)]);
        exit;
    }

    // Insérer les données dans la base de données
    try {
        include "../../config/connexion.php";
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Vérifier si l'étudiant existe
        $sql_check = "SELECT COUNT(*) FROM etudiant WHERE matricule = :matricule_qr AND filiere = :filiere_qr AND niveau = :niveau_qr";
        $stmt_check = $pdo->prepare($sql_check);
        $stmt_check->bindParam(':matricule_qr', $matricule_qr);
        $stmt_check->bindParam(':filiere_qr', $filiere_qr);
        $stmt_check->bindParam(':niveau_qr', $niveau_qr);
        $stmt_check->execute();
        $student_exists = $stmt_check->fetchColumn();

        if ($student_exists) {
            // L'étudiant existe, insérer dans appel
            $sql_insert = "INSERT INTO appel (matricul, date, heure, periode, filiere, niveau, matiere, professeur, m_eleve, nom_eleve, etat)
                            VALUES (:matricul, :date, :heure, :periode, :filiere, :niveau, :matiere, :professeur, :m_eleve, :nom_eleve, :etat)";
            $stmt_insert = $pdo->prepare($sql_insert);
            $stmt_insert->bindParam(':matricul', $matricul);
            $stmt_insert->bindParam(':date', $date);
            $stmt_insert->bindParam(':heure', $heure);
            $stmt_insert->bindParam(':periode', $periode);
            $stmt_insert->bindParam(':filiere', $filiere);
            $stmt_insert->bindParam(':niveau', $niveau);
            $stmt_insert->bindParam(':matiere', $matiere);
            $stmt_insert->bindParam(':professeur', $professeur);
            $stmt_insert->bindParam(':m_eleve', $matricule_qr);
            $stmt_insert->bindParam(':nom_eleve', $nom_qr);
            $stmt_insert->bindParam(':etat', $etat);

            if ($stmt_insert->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Data received and saved successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to save data']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Cet étudiant ne participe pas à cette séance']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>