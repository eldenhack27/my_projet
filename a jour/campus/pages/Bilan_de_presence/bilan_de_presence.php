<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Campus school</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style_bilan_de_presence.css">
</head>
<body>
    <?php
       include "../../config/aside.php"
    ?>
    <script src="../script.js"></script>
    <main>
        
        <!-- Ajoutez plus de contenu ici pour tester le défilement -->
        <p>&copy; 2024 (IME) INSTITUT SUPERIEUR DE MANAGEMENT ET DE L'ENTREPRENEURIAT. Tous droits réservés. | <a href="https://www.ime-school.com/">Contactez-nous</a></p>
    </main>
    <div class="notification">
      <div class="notification__body">
          <img
              src="../../assets/images/check-circle.svg"
              alt="Success"
              class="notification__icon"
          >
          Menu Bilan de presence selectionne! &#128640; 
      </div>
      <div class="notification__progress"></div>
  </div>
</body>
</html>