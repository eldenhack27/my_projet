<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dsn = 'mysql:host=localhost;dbname=campus_school';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // initialise et valider l'entrée utilisateur
        $matricule = filter_var($_POST['matricule'], FILTER_SANITIZE_STRING);
        $mot_de_passe = $_POST['mot_de_passe'];

        // Debugging: Afficher le matricule et le mot de passe reçus
        echo "matricule: " . htmlspecialchars($matricule) . "<br>";
        echo "Mot de passe: " . htmlspecialchars($mot_de_passe) . "<br>";

        // Vérification de l'email et du mot de passe
        $sql = "SELECT * FROM etudiant WHERE matricule = :matricule";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':matricule', $matricule, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Debugging: Afficher les données de l'utilisateur récupérées
        if ($user) {
            echo "Utilisateur trouvé : <pre>" . print_r($user, true) . "</pre><br>";
        } else {
            echo "Aucun utilisateur trouvé avec ce matricule.<br>";
        }

        if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
            // Démarrer la session et stocker des informations supplémentaires
            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['matricule'] = $user['matricule'];
            $_SESSION['Nom'] = $user['Nom']; 
            $_SESSION['Prenom'] = $user['Prenom']; 
            $_SESSION['dateofbirth'] = $user['dateofbirth']; 
            $_SESSION['telephone'] = $user['telephone']; 
            $_SESSION['email'] = $user['email'];
            $_SESSION['filiere'] = $user['filiere']; 
            $_SESSION['niveau'] = $user['niveau'];
            $_SESSION['id_qr'] = $user['id_qr']; // Assurez-vous que la colonne 'nom' existe dans votre table 'users'
            $_SESSION['profil'] = $user['profil'];
            $_SESSION['mot_de_passe'] = $user['mot_de_passe'];
            header("Location: ../Etudiant_role/etudiant_role.php");
            
            exit();
        } else {
            echo "Matricule ou mot de passe incorrect.";
        }
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
}
?>
