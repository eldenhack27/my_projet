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

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT seance.id, seance.matricul, seance.date, seance.heure, seance.periode, seance.filiere, seance.niveau, seance.matiere, enseignant.discipline, enseignant.nom, enseignant.prenom FROM seance, enseignant  WHERE 1 AND seance.matiere=enseignant.discipline AND seance.id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $cahier = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$cahier) {
            echo "cahier non trouvé";
            exit();
        }
    } else {
        echo "id non fourni";
        exit();
    }
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus school</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style_appel.css">
</head>
<body>
  
    <script src="../script.js"></script>
    <script type="module" src="script_cahier_de_presence.js"></script>

     <!-- Modal des absences -->
     <div id="absenceModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Les absences</h2>
            <p>Votre contenu ici...</p>
        </div>
    </div>

    <!-- Modal des participants -->
    <div id="verifyModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>particants au cours</h2>
            <br><br>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>matricule</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>filiere</th>
                            <th>niveau</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        try {
                            $pdo = new PDO($dsn, $username, $password);
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $filiere = $cahier['filiere'];
                            $niveau = $cahier['niveau'];
                            $sql = "SELECT * FROM etudiant WHERE filiere = :filiere AND niveau = :niveau ORDER BY Nom ASC" ;
                            
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(':filiere', $filiere, PDO::PARAM_STR);
                            $stmt->bindParam(':niveau', $niveau, PDO::PARAM_STR);
                            
                            $stmt->execute();
                            $counter = 1;
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>
                                        <td>" . $counter++ . "</td>
                                        <td>" . htmlspecialchars($row["matricule"]) . "</td>
                                        <td>" . htmlspecialchars($row["Nom"]) . "</td>
                                        <td>" . htmlspecialchars($row["Prenom"]) . "</td>
                                        <td>" . htmlspecialchars($row["filiere"]) . "</td>
                                        <td>" . htmlspecialchars($row["niveau"]) . "</td>
                                    </tr>";
                            }
                            echo "</table>";

                        } catch (PDOException $e) {
                            echo 'Erreur : ' . $e->getMessage();
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal du scanner -->
    <div id="attendanceModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Scanner QR Code</h2>
            <div class="container">
                <video id="preview" width="80%" height="100%"></video>
                <button id="start-button">Démarrer le scan</button>
                <div id="result"></div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.js"></script>
            <script src="scanner.js"></script>
        </div>
    </div>

    <main>
    <a href="enseignant_role.php" style="position: fixed;">
                    <svg width="60" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 19l-7-7 7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
            </a>
    <div class="container">
        <!-- place des bouton -->
        <div class="controls">
            
            <button id="openAttendanceModalBtn">Faire l'appel</button>
            <button id="openVerifyModalBtn">Participants à la séance</button>
            <button id="openAbsenceModalBtn">Absents à la séance</button>
        </div>
        <!-- detail part 1 -->
        <div class="filters">
            <div class="filter">
                <label  for="date-debut">identifiant :</label>
                 <span style="color: rgb(171, 88, 20); font-size: x-small;"><?php echo htmlspecialchars($cahier['matricul']); ?></span>
            </div>
            <div class="filter">
                <label  for="date-debut">Discipline :</label>
                <span style="color: rgb(171, 88, 20); font-size: x-small;"><?php echo htmlspecialchars($cahier['matiere']); ?></span>
            </div>
            <div class="filter">
                <label  for="date-debut">Filiere :</label>
                <span style="color: rgb(171, 88, 20); font-size: x-small;"><?php echo htmlspecialchars($cahier['filiere']); ?></span>
            </div>
            <div class="filter">
                <label  for="date-debut">Niveau :</label>
                <span style="color: rgb(171, 88, 20); font-size: x-small;"><?php echo htmlspecialchars($cahier['niveau']); ?></span>
            </div>
        </div>
        <!-- detail part 2 -->
        <div class="filters">
            <div class="filter">
                <label  for="date-debut">Date :</label>
                <span style="color: rgb(171, 88, 20); font-size: x-small;"><?php echo htmlspecialchars($cahier['date']); ?></span>
            </div>
            <div class="filter">
                <label  for="date-debut">Heure :</label>
                <span style="color: rgb(171, 88, 20); font-size: x-small;"><?php echo htmlspecialchars($cahier['heure']); ?></span>
            </div>
            <div class="filter">
                <label  for="date-debut">Durée :</label>
                <span style="color: rgb(171, 88, 20); font-size: x-small;"><?php echo htmlspecialchars($cahier['periode']); ?> Heure(s)</span>
            </div>
            
            <div class="filter">
                <label  for="date-debut">Professeur :</label>
                <span style="color: rgb(171, 88, 20); font-size: x-small;"><?php echo htmlspecialchars($cahier['nom']); ?><span style="margin-left: 0.5rem;"><?php echo htmlspecialchars($cahier['prenom']); ?></span></span>
            </div>   
        </div>
        <!-- statistique -->
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

        <!-- les import au scanner -->

        <input type="hidden" id="cahier_matricul" value="<?php echo htmlspecialchars($cahier['matricul']); ?>">
        <input type="hidden" id="cahier_professeur" value="<?php echo htmlspecialchars($cahier['nom']); ?><?php echo htmlspecialchars($cahier['prenom']); ?>">
        <input type="hidden" id="cahier_date" value="<?php echo htmlspecialchars($cahier['date']); ?>">
        <input type="hidden" id="cahier_heure" value="<?php echo htmlspecialchars($cahier['heure']); ?>">
        <input type="hidden" id="cahier_periode" value="<?php echo htmlspecialchars($cahier['periode']); ?>">
        <input type="hidden" id="cahier_filiere" value="<?php echo htmlspecialchars($cahier['filiere']); ?>">
        <input type="hidden" id="cahier_niveau" value="<?php echo htmlspecialchars($cahier['niveau']); ?>">
        <input type="hidden" id="cahier_matiere" value="<?php echo htmlspecialchars($cahier['matiere']); ?>">


        <!-- liste des presents -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Matricule</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Periode</th>
                        <th>Filiere</th>
                        <th>Niveau</th>
                        <th>Matiere</th>
                        <th>Professeur</th>
                        <th>M Etudiant</th>
                        <th>Nom etudiant</th>
                        <th>Etat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try {
                            $sql = "SELECT * FROM appel";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();

                            $counter = 1;
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>
                                        <td>" . $counter++ . "</td>
                                        <td>" . htmlspecialchars($row["matricul"]) . "</td>
                                        <td>" . htmlspecialchars($row["date"]) . "</td>
                                        <td>" . htmlspecialchars($row["heure"]) . "</td>
                                        <td>" . htmlspecialchars($row["periode"]) . "</td>
                                        <td>" . htmlspecialchars($row["filiere"]) . "</td>
                                        <td>" . htmlspecialchars($row["niveau"]) . "</td>
                                        <td>" . htmlspecialchars($row["matiere"]) . "</td>
                                        <td>" . htmlspecialchars($row["professeur"]) . "</td>
                                        <td>" . htmlspecialchars($row["m_eleve"]) . "</td>
                                        <td>" . htmlspecialchars($row["nom_eleve"]) . "</td>
                                        <td>" . htmlspecialchars($row["etat"]) . "</td>
                                    </tr>";
                            }
                        } catch (PDOException $e) {
                            echo 'Erreur : ' . $e->getMessage();
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </main>
    <div class="notification">
      <div class="notification__body">
          <img src="../../assets/images/check-circle.svg" alt="Success" class="notification__icon">
          Menu cahier de presence selectionne! &#128640; 
      </div>
      <div class="notification__progress"></div>
  </div>
   

</body>
</html>
