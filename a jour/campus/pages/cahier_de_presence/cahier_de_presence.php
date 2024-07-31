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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style_cahier_de_presence.css">
    <style>
        /* Modal styles */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php
       include "../../config/aside.php" 
    ?>
    <script src="../script.js"></script>
    <script src="script_cahier_de_presence.js"></script>

    <main>
    <div class="container">
        
        <div class="controls">
          <button onclick="openModal()">Créer une séance de cours</button>
        </div>

        <!-- Modal pour Faire une nouvelle sceance de cours -->
        <div id="myModal" class="modal">
            <div class="modal-content">
            <span class="close" onclick="closeTableModal()">&times;</span>
                <h2>nouvelle sceance de cours</h2>
                <br><br>
                <form id="cahierAppelForm" method="post" action="create.php">
                    <label for="matricul">Identifiant de la seance:</label>
                    <input type="text" id="matricul" name="matricul" required><br><br>

                    <label for="groupe">Niveau d'étude :</label>
                    <select id="groupe"  name="niveau" required autocomplete="off">
                      <option value="" class="input__field">--</option>
                      <?php
                      include "../../config/connexion.php";

                      try {
                          $pdo = new PDO($dsn, $username, $password);
                          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                          $stmt = $pdo->query("SELECT DISTINCT niveau FROM etudiant ORDER BY niveau ASC ");
                          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                              echo '<option value="' . $row['niveau'] . '">' . $row['niveau'] . '</option>';
                          }
                      } catch (PDOException $e) {
                          echo 'Erreur : ' . $e->getMessage();
                      }
                      ?>
                    </select><br><br>

                    <label for="classe">Filiere concernée :</label>
                    <select id="classe"  name="filiere" required autocomplete="off">
                    <option value="" class="input__field">--</option>
                    <?php
                      include "../../config/connexion.php";

                      try {
                          $pdo = new PDO($dsn, $username, $password);
                          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                          $stmt = $pdo->query("SELECT DISTINCT filiere FROM etudiant");
                          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                              echo '<option value="' . $row['filiere'] . '">' . $row['filiere'] . '</option>';
                          }
                      } catch (PDOException $e) {
                          echo 'Erreur : ' . $e->getMessage();
                      }
                      ?>
                    </select><br><br>

                    <label for="heure">Heure de début :</label>
                    <input type="time" id="heure" name="heure" required><br><br>

                    <label for="periode">Heure de début :</label>
                    <input type="number" id="periode" name="periode" required><br><br>
                    
                    <label for="date">Date de la séance :</label>
                    <input type="date" id="date" name="date" required><br><br>
                    
                    <label for="matiere">Discipline :</label>
                    <select id="classe" name="matiere" required>
                    <option  value="">--</option>
                      <?php
                      include "../../config/connexion.php";

                      try {
                          $pdo = new PDO($dsn, $username, $password);
                          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                          $stmt = $pdo->query("SELECT * FROM enseignant");
                          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                              echo '<option value="' . $row['discipline'] . '">' . $row['discipline'] . '</option>';
                          }
                      } catch (PDOException $e) {
                          echo 'Erreur : ' . $e->getMessage();
                      }
                      ?>
                    </select>
                      <br><br>
                    
                    <input type="submit" value="Enregistrer">
                </form>
            </div>
        </div>
        <script>
            var span = document.getElementsByClassName("close")[0];
            function openModal() {
                document.getElementById("myModal").style.display = "block";
                genererEtAfficherIdentifiant(); // Appelle la fonction pour générer et afficher l'identifiant
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

            function genererEtAfficherIdentifiant() {
                var prefixe = "CA";
                var surfixe = "APP";
                var identifiant = prefixe + genererIdentifiant() + surfixe;
                document.getElementById("matricul").value = identifiant;
            }

            function genererIdentifiant() {
                return Math.random().toString(36).substr(2, 4); // Génère une chaîne aléatoire de 4 caractères
            }
        </script>


        <!-- la partie de recherche -->

        <form action="" method="post" >
          <div class="filters">
          
            <div class="filter">
                <label  for="date">Date</label>
                <input class="input__field" type="date" id="date" autocomplete="off">
            </div>
             
            <div class="filter">
                <label for="classe">Filiere</label>
                <select id="classe" name="filiere"  autocomplete="off">
                    <option  value="">ALL</option>
                    <option value="GL">GL</option>
                    <option value="RS">RS</option>
                    <option value="MSI">MSI</option>
                    <option value="DAD">DAD</option>
                    <!-- Autres options -->
                </select>
            </div>
            <div class="filter">
                <label for="groupe">Niveau </label>
                <select id="groupe" name="niveau" autocomplete="off">
                  <option value="" class="input__field">ALL</option>
                  <option value="1" class="input__field">1</option>
                  <option value="2" class="input__field">2 [ BTS / HND ]</option>
                  <option value="3" class="input__field">3 [ LICENSE / BACHELOR ]</option>
                  <option value="4" class="input__field">4 [ MASTER I ]</option>
                  <option value="5" class="input__field">5 [ MASTER II ]</option>
                </select>
            </div>
             
            <button style="background-color: rgb(122, 132, 243); color: azure; border: none;" type="submit">Voir</button>
          </div>
        </form>
        
        <div class="stats">
            <div class="stat">
                <h2><span class="number">0</span></h2>
                <span class="label">En retard</span>
            </div>
            <div class="stat">
                <h2><span class="number">0</span></h2>
                <span class="label">Absence injustifiée</span>
            </div>
            <div class="stat">
                <h2><span class="number">0</span></h2>
                <span class="label">Absence justifiée</span>
            </div>
        </div>
        
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Matricule</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Periode</th>
                        <th>filiere</th>
                        <th>Niveau</th>
                        <th>Matiere</th>
                        <th>Professeur</th>
                        <th>Appel</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                  include "../../config/connexion.php";

                  try {
                      $pdo = new PDO($dsn, $username, $password);
                      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                      // Récupérer les valeurs de filière et niveau depuis le formulaire
                      $date = isset($_POST['date']) ? $_POST['date'] : '';
                      $filiere = isset($_POST['filiere']) ? $_POST['filiere'] : '';
                      $niveau = isset($_POST['niveau']) ? $_POST['niveau'] : '';

                      // Construire la requête SQL avec les conditions appropriées
                      $sql = "SELECT seance.id, seance.matricul, seance.date, seance.heure, seance.periode, seance.filiere, seance.niveau, seance.matiere, enseignant.discipline, enseignant.nom FROM seance, enseignant  WHERE 1 AND seance.matiere=enseignant.discipline";

                      if (!empty($date)) {
                          $sql .= " AND date = :date";
                      }
                      if (!empty($filiere)) {
                          $sql .= " AND filiere = :filiere";
                      }
                      if (!empty($niveau)) {
                          $sql .= " AND niveau = :niveau";
                      }

                      $stmt = $pdo->prepare($sql);

                      if (!empty($date)) {
                          $stmt->bindParam(':date', $date, PDO::PARAM_STR);
                      }
                      if (!empty($filiere)) {
                          $stmt->bindParam(':filiere', $filiere, PDO::PARAM_STR);
                      }
                      if (!empty($niveau)) {
                          $stmt->bindParam(':niveau', $niveau, PDO::PARAM_INT);
                      }

                      $stmt->execute();
                      $counter = 1;

                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          echo "<tr>";
                          echo "<td>" . $counter++ . "</td>";
                          echo "<td>" . htmlspecialchars($row['matricul']) . "</td>";
                          echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                          echo "<td>" . htmlspecialchars($row['heure']) . "</td>";
                          echo "<td>0" . htmlspecialchars($row['periode']) . " Heures</td>";
                          echo "<td>" . htmlspecialchars($row['filiere']) . "</td>";
                          echo "<td>" . htmlspecialchars($row['niveau']) . "</td>";
                          echo "<td>" . htmlspecialchars($row['matiere']) . "</td>";
                          echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
                          echo "<td><a href='appel.php?id=" . htmlspecialchars($row['id']) . "'><svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M12 4.5C7.5 4.5 3.737 7.252 2 12c1.737 4.748 5.5 7.5 10 7.5s8.263-2.752 10-7.5c-1.737-4.748-5.5-7.5-10-7.5zm0 13c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5zm0-8.5c-1.93 0-3.5 1.57-3.5 3.5s1.57 3.5 3.5 3.5 3.5-1.57 3.5-3.5-1.57-3.5-3.5-3.5z' fill='currentColor'/></svg></a></td>";
                          echo "</tr>";
                      }

                  } catch (PDOException $e) {
                      echo "Erreur : " . $e->getMessage();
                  }
                  ?>
                    
                </tbody>
            </table>
        </div>
    </div>
        <!-- Ajoutez plus de contenu ici pour tester le défilement -->
        <p style="margin-top: 1rem;">&copy; 2024 (IME) INSTITUT SUPERIEUR DE MANAGEMENT ET DE L'ENTREPRENEURIAT. Tous droits réservés. | <a href="https://www.ime-school.com/">Contactez-nous</a></p>
    </main>
    <div class="notification">
      <div class="notification__body">
          <img
              src="../../assets/images/reussite.pngmi"
              alt="Success"
              class="notification__icon"
          >
          Menu cahier de presence selectionne! &#128640; 
      </div>
      <div class="notification__progress"></div>
  </div>
</body>
</html>