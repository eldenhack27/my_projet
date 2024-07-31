<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../../index.php");
    exit();
}

include "../../config/connexion.php";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Utiliser l'ID stocké dans la session
    $id = $_SESSION['id'];

    $sql = "SELECT * FROM etudiant WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$etudiant) {
        echo "etudiant non trouvé";
        exit();
    }
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus school</title>
    <link rel="stylesheet" href="style_profile.css">
</head>
<script>
    function openModal() {
        document.getElementById("myModal").style.display = "block";
    }

    function closeModal() {
        document.getElementById("myModal").style.display = "none";
    }

    // Fermer le modal si l'utilisateur clique en dehors
    window.onclick = function(event) {
        var modal = document.getElementById("myModal");
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function confirmDelete(matricule) {
    if (confirm("Êtes-vous sûr de vouloir supprimer cet étudiant ?")) {
        window.location.href = "supprimer.php?id=" + matricule;
    }
}
</script>

<body>

 

<a href="logout.php" style="position: fixed; margin-left: 1rem; color: white; margin-top: 1rem;">
                <svg type="button" onclick="confirmLogout()" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="24" height="24"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                    <path d="M9 12h12l-3 -3"></path>
                    <path d="M18 15l3 -3"></path>
                </svg>
</a>
<script src="script_profile.js"></script>
    <div class="container">
        <div class="profile-header">
            <img src="<?php echo htmlspecialchars($etudiant['profil']); ?>" alt="Profile Picture" class="profile-pic">
            
            <div class="profile-info">
                <h1><?php echo htmlspecialchars($etudiant['Nom'] . ' ' . $etudiant['Prenom']); ?></h1>
                <p>Date de naissance: <?php echo htmlspecialchars($etudiant['dateofbirth']); ?></p>
                <p>(identifiant: <?php echo htmlspecialchars($etudiant['matricule']); ?>)</p>
                 
            </div>
        </div>
        <div class="profile-details">
            <p>Filière: <?php echo htmlspecialchars($etudiant['filiere']); ?></p>
            <p>Niveau: <?php echo htmlspecialchars($etudiant['niveau']); ?></p>
            <p>Telephone: (+237) <?php echo htmlspecialchars($etudiant['telephone']); ?></p>
            <p>Âge: <?php 
                $dateOfBirth = new DateTime($etudiant['dateofbirth']);
                $today = new DateTime();
                $age = $today->diff($dateOfBirth)->y;
                echo $age . ' ans';
            ?></p>
            <p>QR Code :</p>
            <img src="<?php echo htmlspecialchars($etudiant['id_qr']); ?>" alt="Profile Picture" width="20" height="20" style="margin-top:15px">
        </div>
        
        <div class="attendance">
            <div class="attendance-card">
                <h3>0</h3>
                <p>En retard avec mot d'excuse</p>
            </div>
            <div class="attendance-card">
                <h3>0</h3>
                <p>En retard</p>
            </div>
            <div class="attendance-card">
                <h3>0</h3>
                <p>Absence injustifiée</p>
            </div>
            <div class="attendance-card">
                <h3>0</h3>
                <p>Absence justifiée</p>
            </div>
        </div>
    </div>

    <div class="notification">
      <div class="notification__body">
          <img
              src="../../assets/images/check-circle.svg"
              alt="Success"
              class="notification__icon"
          >
          Profil Etudiant! &#128640; 
      </div>
      <div class="notification__progress"></div>
  </div>
</body>
</html>
