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

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $telephone = $_POST['telephone'];
        $dateofbirth = $_POST['dateofbirth'];
        $accreditation = $_POST['accreditation'];
        $email = $_POST['email'];
        $mot_de_passe = $_POST['mot_de_passe'];
         

        // Gestion du fichier image
        if (isset($_FILES['profil']) && $_FILES['profil']['error'] == 0) {
            $target_dir = "../../assets/uploads/";
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            $target_file = $target_dir . basename($_FILES["profil"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Vérifier si le fichier est une image réelle
            $check = getimagesize($_FILES["profil"]["tmp_name"]);
            if ($check !== false) {
                if (move_uploaded_file($_FILES["profil"]["tmp_name"], $target_file)) {
                    $sql = "INSERT INTO users (Nom, Prenom, dateofbirth, telephone, email, mot_de_passe, acreditation, profil) 
                            VALUES (:nom, :prenom, :dateofbirth, :telephone, :email, :mot_de_passe, :acreditation, :profil)";
                            $plain_password = $mot_de_passe;  // Assuming these are plain text passwords
                            $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':nom', $nom);
                    $stmt->bindParam(':prenom', $prenom);
                    $stmt->bindParam(':dateofbirth', $dateofbirth);
                    $stmt->bindParam(':telephone', $telephone);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':mot_de_passe', $hashed_password);
                    $stmt->bindParam(':acreditation', $accreditation);
                    $stmt->bindParam(':profil', $target_file);

                    if ($stmt->execute()) {
                        header("Location: utilisateur.php");
                        exit();
                    } else {
                        echo "Erreur lors de l'ajout de l'enseignant";
                    }
                } else {
                    echo "Erreur lors du déplacement de l'image téléchargée. Assurez-vous que le dossier 'uploads' existe et est accessible en écriture.";
                }
            } else {
                echo "Le fichier n'est pas une image.";
            }
        } else {
            echo "Erreur lors du téléchargement de l'image. Code d'erreur : " . $_FILES['image']['error'];
        }
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
}
?>


 