<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dsn = 'mysql:host=localhost;dbname=campus_school';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Sanitize et valider l'email
        $matricul = filter_var($_POST['matricul'], FILTER_SANITIZE_EMAIL);
        $mot_de_passe = $_POST['mot_de_passe'];

        // if (filter_var($matricul, FILTER_VALIDATE_EMAIL) === false) {
        //     echo "Adresse email invalide.";
        //     exit();
        // }

        // Debugging: Afficher l'email et le mot de passe reçus
        echo "matricul: " . htmlspecialchars($matricul) . "<br>";
        echo "Mot de passe: " . htmlspecialchars($mot_de_passe) . "<br>";

        // Vérification du matricule et du mot de passe
        $sql = "SELECT * FROM enseignant WHERE matricul = :matricul";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':matricul', $matricul, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Debugging: Afficher les données de l'utilisateur récupérées
        if ($user) {
            echo "Utilisateur trouvé : <pre>" . print_r($user, true) . "</pre><br>";
        } else {
            echo "Aucun utilisateur trouvé avec cet email.<br>";
        }

        if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
            // Démarrer la session et stocker des informations supplémentaires
            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['matricul'] = $user['matricul']; 
            $_SESSION['nom'] = $user['nom']; 
            $_SESSION['prenom'] = $user['prenom']; 
            $_SESSION['date_nais'] = $user['date_nais']; 
            $_SESSION['telephone'] = $user['telephone'];
            $_SESSION['email'] = $user['email']; 
            $_SESSION['bureau'] = $user['bureau'];
            $_SESSION['departement'] = $user['departement']; // Assurez-vous que la colonne 'nom' existe dans votre table 'users'
            $_SESSION['discipline'] = $user['discipline'];
            $_SESSION['image'] = $user['image'];
            $_SESSION['mot_de_passe'] = $user['mot_de_passe'];
            header("Location: ../Enseignant_role/enseignant_role.php");
            
            exit();
        } else {
            echo "matricul ou mot de passe incorrect.";
        }
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
}
?>
