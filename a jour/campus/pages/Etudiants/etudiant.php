<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../index.php");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style_etudiant.css">
    
    <body>
    <?php
       include "../../config/aside.php" 
    ?>
    <main>
      
        <div class="container">
            <!--add-stdent-btn-->
          <button id="openModalBtn" class="add-attendance" >+ Ajouter Des étudiants</button>
          <!--Modal d'inscription d'etudiant-->
          <div id="myModal" class="modal">
            <div class="modal-content">
            <span class="close">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <line x1="20" y1="8" x2="8" y2="20" />
                      <line x1="8" y1="8" x2="20" y2="20" />
                  </svg>
              </span>
            <form class="my-form" method="post" action="create.php" enctype="multipart/form-data">
              
              <div class="login-welcome-row">
                  <a href="#" title="Logo">
                      <img style="border-radius: 50%;" src="../../assets/images/imelogos.png" alt="Logo" class="logo">
                  </a>
                  <h2>&#x1F393;Inscription&#127891;</h2>
              </div>
              <div class="input__wrapper">
                  <span id="identifiant">
                      <input type="text" id="matricule" name="matricule" class="input__field" placeholder="Matricule" required autocomplete="off">
                  </span>
                   
              </div>
              <div class="input__wrapper">
                  <input type="text" id="nom" name="nom" class="input__field" placeholder="Nom étudiant" required autocomplete="off">
                  <label for="nom" class="input__label">Nom étudiant :</label>
                  <svg class="input__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M3 21v-4a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v4" />
                      <circle cx="12" cy="7" r="4" />
                  </svg>
              </div>
              <div class="input__wrapper">
                  <input type="text" id="prenom" name="prenom" class="input__field" placeholder="Prénom étudiant" required autocomplete="off">
                  <label for="prenom" class="input__label">Prénom étudiant :</label>
                  <svg class="input__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M3 21v-4a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v4" />
                      <circle cx="12" cy="7" r="4" />
                  </svg>              
              </div>
              <div class="input__wrapper">
                  <input type="text" id="telephone" name="telephone" class="input__field" placeholder="Téléphone étudiant" required autocomplete="off">
                  <label for="telephone" class="input__label">Téléphone étudiant :</label>
                  <svg class="input__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M4 4h5l-1 5a11 11 0 0 0 7 7l5 -1v5a2 2 0 0 1 -2 2a16 16 0 0 1 -16 -16a2 2 0 0 1 2 -2"></path>
                  </svg>              
              </div>
              <div class="input__wrapper">
                  <input type="email" id="email" name="email" class="input__field" placeholder="email étudiant" required autocomplete="on">
                  <label for="email" class="input__label">email étudiant :</label>
                  <svg class="input__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M3 21v-4a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v4" />
                      <circle cx="12" cy="7" r="4" />
                  </svg>              
              </div>
              <div class="input__wrapper">
                  <input type="number" id="HA" name="HA" class="input__field" placeholder="Heures d'absences" autocomplete="off" value="00">
                  <label for="HA" class="input__label">Heures d'absences :</label>
                  <svg class="input__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M12 7v-3m-4 5h8m-8 4h8m-4 -3v5" />
                      <line x1="3" y1="3" x2="21" y2="21" />
                  </svg>                         
              </div>
              <div class="input__wrapper">
                  <input type="date" id="dateofbirth" name="dateofbirth" class="input__field" autocomplete="off">
                  <label for="dateofbirth" class="input__label">Date d'anniversaire :</label> 
              </div>
              <div class="input__wrapper">
                  <select id="filiere" name="filiere" class="input__field" required autocomplete="off" style="height: auto;">
                      <option value="" class="input__field">--</option>
                      <option value="GL">GL</option>
                      <option value="RS">RS</option>
                      <option value="MSI">MSI</option>
                      <option value="DAD">DAD</option>
                      <!-- Autres options -->
                  </select>
                  <label for="filiere" class="input__label">Filière étudiant :</label>
              </div>
              <div class="input__wrapper">
                  <select id="niveau" name="niveau" class="input__field" required autocomplete="off" style="height: auto;">
                      <option value="" class="input__field">--</option>
                      <option value="1" class="input__field">1</option>
                      <option value="2" class="input__field">2 [ BTS / HND ]</option>
                      <option value="3" class="input__field">3 [ LICENCE / BACHELOR ]</option>
                      <option value="4" class="input__field">4 [ MASTER I ]</option>
                      <option value="5" class="input__field">5 [ MASTER II ]</option>
                      <!-- Autres options -->
                  </select>   
                  <label for="niveau" class="input__label">Niveau étudiant :</label> 
              </div>
              <div class="input__wrapper">
                  <input type="file" id="profil" name="profil" accept="image/*" class="input__field" required>
                  <label for="profil" class="input__label">Importer une image de profil :</label>
              </div>
              <button type="submit" class="my-form__button">Créer</button>
          </form>


            </div>
          </div>
        <script src="script_etudiant.js"></script>
        <script src="../script.js"></script>
        <div class="class-selection">
          <form action="" method="post">
            <label for="class-select" style="font-family: Arial sans-serif; font-weight: bold; text-transform: uppercase;">Filiere</label>
            <select id="class-select" name="filiere">
                <option value="">ALL</option>
                <option value="GL">GL</option>
                <option value="RS">RS</option>
                <option value="MSI">MSI</option>
                <option value="DAD">DAD</option>
                <!-- Other options -->
            </select>
            <label for="class-select" style="font-family: Arial sans-serif; font-weight: bold; text-transform: uppercase;">Niveau</label>
            <select id="class-select" name="niveau">
                <option value="">ALL</option>
                <option value="1">1</option>
                <option value="2">2 [ BTS / HND ]</option>
                <option value="3">3 [ LICENSE / BACHELOR ]</option>
                <option value="4">4 [ MASTER I ]</option>
                <option value="5">5 [ MASTER II ]</option>
                <!-- Other options -->
            </select>
            <input type="submit" value="Rechercher" class="my-form__button">
          </form>
        </div>
        <div class="tab-menu">
          <button style="border-right: 3px solid; border-color: #d9e9f9;"  id="allStudentsBtn" class="tab-button active" data-tab="all-students">Tous les étudiants</button>
          <button style="border-right: 3px solid; border-color: #d9e9f9;"  id="absentStudentsBtn" class="tab-button" data-tab="ps-fra">Tous les étudiants ayant des absences</button>
          <button style="border-right: 3px solid; border-color: #d9e9f9;"  id="presentStudentsBtn" class="tab-button" data-tab="ps-arabe">Tous les étudiants toujours présents</button>
	      </div>
        <script>
          document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.tab-button');

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            buttons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
        });
    });
});

        </script>
            <div id="allStudentsContent">
              <!-- Contenu pour tous les étudiants -->
              <table class="students-table">
                <thead>
                    <tr style="border: 1px solid #DDD;">
                        <th><U>N°</U></th>
                        <th>Profil</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Filière</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                  include "../../config/connexion.php";
                  try {
                      $pdo = new PDO($dsn, $username, $password);
                      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                      // Récupérer les valeurs de filière et niveau depuis le formulaire
                      $filiere = isset($_POST['filiere']) ? $_POST['filiere'] : '';
                      $niveau = isset($_POST['niveau']) ? $_POST['niveau'] : '';

                      // Construire la requête SQL avec les conditions appropriées
                      $sql = "SELECT matricule, Nom, Prenom, dateofbirth, telephone, filiere, niveau, id_qr, profil FROM etudiant WHERE 1";

                      if (!empty($filiere)) {
                          $sql .= " AND filiere = :filiere";
                      }
                      if (!empty($niveau)) {
                          $sql .= " AND niveau = :niveau";
                      }

                      $stmt = $pdo->prepare($sql);

                      if (!empty($filiere)) {
                          $stmt->bindParam(':filiere', $filiere, PDO::PARAM_STR);
                      }
                      if (!empty($niveau)) {
                          $stmt->bindParam(':niveau', $niveau, PDO::PARAM_INT);
                      }

                      $stmt->execute();
                      $counter = 1;

                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          
                      ?>
                    <tr style="border-bottom: 3px solid; border-right: 3px solid; border-left: 3px solid; border-color: #6b6fd2;">
                        <td><?php echo $counter++;?></td>
                        <td>
                          <div class="sidebar__profile">
                            <div class="avatar__wrapper">
                            <?php echo "<img class='avatar' src='{$row['profil']}' >";?>
                            <div class="online__status"></div>
                          </div>
                        </td>
                        <td><?php echo  htmlspecialchars($row['Nom']) ;?></td>
                        <td><?php echo  htmlspecialchars($row['Prenom']) ;?></td>
                        <td><?php echo  htmlspecialchars($row['filiere']) ;?></td>
                        <td>
                          <?php echo "<a href='profil.php?id=" . htmlspecialchars($row['matricule']) . "'><svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M12 4.5C7.5 4.5 3.737 7.252 2 12c1.737 4.748 5.5 7.5 10 7.5s8.263-2.752 10-7.5c-1.737-4.748-5.5-7.5-10-7.5zm0 13c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5zm0-8.5c-1.93 0-3.5 1.57-3.5 3.5s1.57 3.5 3.5 3.5 3.5-1.57 3.5-3.5-1.57-3.5-3.5-3.5z' fill='currentColor'/></svg></a>"; ?>
                        </td>
                        <?php
                        }

                      } catch (PDOException $e) {
                          echo "Erreur : " . $e->getMessage();
                      }
                      ?>
                    </tr>
                </tbody>
            </table>
          </div>
          <div id="absentStudentsContent" style="display:none;">
              <!-- Contenu pour les étudiants ayant des absences -->
              <table class="students-table">
                <thead>
                    <tr style="border: 1px solid #DDD;">
                        <th><U>N°</U></th>
                        <th>Profil</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Heures</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                  include "../../config/connexion.php";
                  try {
                      $pdo = new PDO($dsn, $username, $password);
                      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                      // Récupérer les valeurs de filière et niveau depuis le formulaire
                      $filiere = isset($_POST['filiere']) ? $_POST['filiere'] : '';
                      $niveau = isset($_POST['niveau']) ? $_POST['niveau'] : '';

                      // Construire la requête SQL avec les conditions appropriées
                      $sql = "SELECT etudiant.matricule, etudiant.Nom, etudiant.Prenom, etudiant.dateofbirth, etudiant.telephone, etudiant.filiere, etudiant.niveau, etudiant.id_qr, etudiant.profil, appel.m_eleve, appel.periode FROM etudiant JOIN appel ON etudiant.matricule=appel.m_eleve WHERE 1 AND appel.periode >= 1";

                      if (!empty($filiere)) {
                          $sql .= " AND etudiant.filiere = :filiere";
                      }
                      if (!empty($niveau)) {
                          $sql .= " AND etudiant.niveau = :niveau";
                      }

                      $stmt = $pdo->prepare($sql);

                      if (!empty($filiere)) {
                          $stmt->bindParam(':filiere', $filiere, PDO::PARAM_STR);
                      }
                      if (!empty($niveau)) {
                          $stmt->bindParam(':niveau', $niveau, PDO::PARAM_INT);
                      }

                      $stmt->execute();
                      $counter = 1;

                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          
                      ?>
                    <tr style="border-bottom: 3px solid; border-right: 3px solid; border-left: 3px solid; border-color: #6b6fd2;">
                        <td><?php echo $counter++;?></td>
                        <td>
                          <div class="sidebar__profile">
                            <div class="avatar__wrapper">
                            <?php echo "<img class='avatar' src='{$row['etudiant.profil']}' >";?>
                            <div class="online__status"></div>
                          </div>
                        </td>
                        <td><?php echo  htmlspecialchars($row['etudiant.Nom']) ;?></td>
                        <td><?php echo  htmlspecialchars($row['etudiant.Prenom']) ;?></td>
                        <td><?php echo  htmlspecialchars($row['appel.periode']) ;?> Heures</td>
                        <td>
                          <?php echo "<a href='profil.php?id=" . htmlspecialchars($row['etudiant.matricule']) . "'><svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M12 4.5C7.5 4.5 3.737 7.252 2 12c1.737 4.748 5.5 7.5 10 7.5s8.263-2.752 10-7.5c-1.737-4.748-5.5-7.5-10-7.5zm0 13c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5zm0-8.5c-1.93 0-3.5 1.57-3.5 3.5s1.57 3.5 3.5 3.5 3.5-1.57 3.5-3.5-1.57-3.5-3.5-3.5z' fill='currentColor'/></svg></a>"; ?>
                        </td>
                        <?php
                        }

                      } catch (PDOException $e) {
                          echo "Erreur : " . $e->getMessage();
                      }
                      ?>
                    </tr>
                </tbody>
            </table>
          </div>
          <div id="presentStudentsContent" style="display:none;">
              <!-- Contenu pour les étudiants toujours présents -->
              <table class="students-table">
                <thead>
                    <tr style="border: 1px solid #DDD;">
                        <th><U>N°</U></th>
                        <th>Profil</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Heures</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                  include "../../config/connexion.php";
                  try {
                      $pdo = new PDO($dsn, $username, $password);
                      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                      // Récupérer les valeurs de filière et niveau depuis le formulaire
                      $filiere = isset($_POST['filiere']) ? $_POST['filiere'] : '';
                      $niveau = isset($_POST['niveau']) ? $_POST['niveau'] : '';

                      // Construire la requête SQL avec les conditions appropriées
                      $sql = "SELECT etudiant.matricule, etudiant.Nom, etudiant.Prenom, etudiant.dateofbirth, etudiant.telephone, etudiant.filiere, etudiant.niveau, etudiant.id_qr, etudiant.profil, appel.m_eleve, appel.periode FROM etudiant JOIN appel ON etudiant.matricule=appel.m_eleve WHERE 1 AND appel.periode < 1";

                      if (!empty($filiere)) {
                          $sql .= " AND etudiant.filiere = :filiere";
                      }
                      if (!empty($niveau)) {
                          $sql .= " AND etudiant.niveau = :niveau";
                      }

                      $stmt = $pdo->prepare($sql);

                      if (!empty($filiere)) {
                          $stmt->bindParam(':filiere', $filiere, PDO::PARAM_STR);
                      }
                      if (!empty($niveau)) {
                          $stmt->bindParam(':niveau', $niveau, PDO::PARAM_INT);
                      }

                      $stmt->execute();
                      $counter = 1;

                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          
                      ?>
                    <tr style="border-bottom: 3px solid; border-right: 3px solid; border-left: 3px solid; border-color: #6b6fd2;">
                        <td><?php echo $counter++;?></td>
                        <td>
                          <div class="sidebar__profile">
                            <div class="avatar__wrapper">
                            <?php echo "<img class='avatar' src='{$row['etudiant.profil']}' >";?>
                            <div class="online__status"></div>
                          </div>
                        </td>
                        <td><?php echo  htmlspecialchars($row['etudiant.Nom']) ;?></td>
                        <td><?php echo  htmlspecialchars($row['etudiant.Prenom']) ;?></td>
                        <td><?php echo  htmlspecialchars($row['appel.periode']) ;?> Heure</td>
                        <td>
                          <?php echo "<a href='profil.php?id=" . htmlspecialchars($row['etudiant.matricule']) . "'><svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M12 4.5C7.5 4.5 3.737 7.252 2 12c1.737 4.748 5.5 7.5 10 7.5s8.263-2.752 10-7.5c-1.737-4.748-5.5-7.5-10-7.5zm0 13c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5zm0-8.5c-1.93 0-3.5 1.57-3.5 3.5s1.57 3.5 3.5 3.5 3.5-1.57 3.5-3.5-1.57-3.5-3.5-3.5z' fill='currentColor'/></svg></a>"; ?>
                        </td>
                        <?php
                        }

                      } catch (PDOException $e) {
                          echo "Erreur : " . $e->getMessage();
                      }
                      ?>
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
        
        
      
    </div>
    <p>&copy; 2024 (IME) INSTITUT SUPERIEUR DE MANAGEMENT ET DE L'ENTREPRENEURIAT. Tous droits réservés. | <a href="https://www.ime-school.com/">Contactez-nous</a></p>
    </main>
    
    <div class="notification">
      <div class="notification__body">
          <img
              src="../../assets/images/check-circle.svg"
              alt="Success"
              class="notification__icon"
          >
          Menu etudiants selectionne! &#128640; 
      </div>
      <div class="notification__progress"></div>
  </div>
</body>
</html>