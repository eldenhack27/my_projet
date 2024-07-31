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

    $sql = "SELECT * FROM enseignant WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $enseignant = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$enseignant) {
        echo "Enseignant non trouvé";
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
    <meta charset="utf-8">
    <title>Campus school</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style_profil.css">
    <script>
        function openModal() {
            document.getElementById("myModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }

        window.onclick = function(event) {
            var modal = document.getElementById("myModal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        function openTableModal() {
            document.getElementById("tableModal").style.display = "block";
        }

        function closeTableModal() {
            document.getElementById("tableModal").style.display = "none";
        }

        window.onclick = function(event) {
            var modal = document.getElementById("tableModal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        function confirmDelete(id) {
            if (confirm("Êtes-vous sûr de vouloir supprimer cet enseignant ?")) {
                window.location.href = "supprimer.php?id=" + id;
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('openWindowButton').onclick = function () {
                document.getElementById('newWindow').classList.remove('hidden');
            };

            document.getElementById('closeWindowButton').onclick = function () {
                document.getElementById('newWindow').classList.add('hidden');
            };
        });
    </script>
</head>
<body>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 style="color:#CBD1D8"><?php echo htmlspecialchars($enseignant['nom']);?> <?php echo htmlspecialchars( $enseignant['prenom']); ?></h2>
            <form method="post" action="modifier_enseignant.php" enctype="multipart/form-data">
                <input type="hidden" name="matricul" value="<?php echo htmlspecialchars($enseignant['matricul']); ?>">
                <div>
                    <img src="<?php echo htmlspecialchars($enseignant['image']); ?>" alt="Profile Picture" class="profile-pic">
                    <input type="file" id="image" name="image" accept="image/*">
                </div>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($enseignant['id']); ?>">
                <div>
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($enseignant['nom']); ?>" required>
                </div>
                <div>
                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($enseignant['prenom']); ?>" required>
                </div>
                <div>
                    <label for="date_nais">Date de naissance :</label>
                    <input type="date" id="date_nais" name="date_nais" value="<?php echo htmlspecialchars($enseignant['date_nais']); ?>" required>
                </div>
                <div>
                    <label for="telephone">Téléphone :</label>
                    <input type="text" id="telephone" name="telephone" value="<?php echo htmlspecialchars($enseignant['telephone']); ?>" required>
                </div>
                <div>
                    <label for="email">Email :</label>
                    <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($enseignant['email']); ?>" required>
                </div>
                <div>
                    <label for="bureau">Bureau :</label>
                    <select id="bureau" name="bureau" autocomplete="off" style="height: auto;">
                        <option><?php echo htmlspecialchars($enseignant['bureau']); ?></option>
                        <option value="1er">1er étage</option>
                        <option value="2e">2e étage</option>
                        <option value="3e">3e étage</option>
                        <option value="4e">4e étage</option>
                        <option value="5e">5e étage</option>
                    </select>
                </div>
                <div>
                    <label for="departement">Département :</label>
                    <select id="departement" name="departement" autocomplete="off" style="height: auto;">
                        <option><?php echo htmlspecialchars($enseignant['departement']); ?></option>
                        <option value="informatique">Informatique </option>
                        <option value="gestion et finance">Gestion et finance</option>
                        <option value="Logistique et transport">Logistique et transport</option>
                    </select>
                </div>
                <div>
                    <label for="discipline">Discipline :</label>
                    <select id="discipline" name="discipline" autocomplete="off" style="height: auto;">
                        <option><?php echo htmlspecialchars($enseignant['discipline']); ?></option>
                        <option value="Algorithme et complexite" >Algorithme et complexite</option>
                        <option value="Gestion de carriere professionnelle" >Gestion de carriere professionnelle</option>
                        <option value="Reseau d'entreprise">Reseau d'entreprise</option>
                        <option value="Securite informatique">Securite informatique</option>
                        <option value="Gestion de la carriere">Gestion de la carriere</option>
                        <option value="Entrepreneuriat">Entrepreneuriat</option>
                        <option value="Projet tutore">Projet tutore</option>
                        <option value="Intelligence artificielle">Intelligence artificielle</option>
                        <option value="XML et WEB services">XML et WEB services</option>
                        <option value="Dev d'app Mobile">Dev d'app Mobile</option>
                        <option value="Programmation en C" >Programmation en C</option>
                        <option value="Pro distribuee en java">Pro distribuee en java</option>
                        <option value="Pro evenementielle">Pro evenementielle</option>
                        <option value="business intelligence">business intelligence</option>
                        <option value="Outils bureautique">Outils bureautique</option>
                        <option value="Merise I">Merise I</option>
                        <option value="Merise II">Merise II</option>
                        <option value="Architecture des ordinateurs">Architecture des ordinateurs</option>
                        <option value="Environnement micro-ordi">Environnement micro-ordi</option>
                        <option value="Algebre lineaire">Algebre lineaire</option>
                        <option value="Analyse mathematique">Analyse mathematique</option>
                        <option value="Algorithme de base">Algorithme de base</option>
                        <option value="Infographie">Infographie</option>
                      <!-- Autres options -->
                    </select>
                </div>
                <button class="button" type="submit">Enregistrer les modifications</button>
            </form>
        </div>
    </div>



    
    <div id="tableModal" class="modal">
        <div class="modal-content">
        <span class="close" onclick="closeTableModal()">&times;</span>
        <h2>Séances de cours de [ <span><?php echo htmlspecialchars($enseignant['nom']); ?> <?php echo htmlspecialchars($enseignant['prenom']); ?></span> ]</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Matricule</th>
                        <th>Matiere</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Durée</th>
                        <th>Filiere</th>
                        <th>Niveau</th>
                    </tr>
                </thead>
                <tbody>
                <?php            
                        include "../../config/connexion.php";   
                        try {
                            $pdo = new PDO($dsn, $username, $password);
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $discipline = $enseignant['discipline'];
                            $sql = "SELECT * FROM seance WHERE matiere = :discipline" ;
                            
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(':discipline', $discipline, PDO::PARAM_STR);
                            
                            $stmt->execute();
                            $counter = 1;
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                              echo "<tr>";
                              echo "<td>" . $counter++ . "</td>";
                              echo "<td>" . htmlspecialchars($row['matricul']) . "</td>";
                              echo "<td>" . htmlspecialchars($row['matiere']) . "</td>";
                              echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                              echo "<td>" . htmlspecialchars($row['heure']) . "</td>";
                              echo "<td>" . htmlspecialchars($row['periode']) . " Heures</td>";
                              echo "<td>" . htmlspecialchars($row['filiere']) . "</td>";
                              echo "<td>" . htmlspecialchars($row['niveau']) . "</td>";
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
    </div>

    <main>

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
        <div class="container">
            <div class="profile-header">
                <img src="<?php echo htmlspecialchars($enseignant['image']); ?>" alt="Profile Picture" class="profile-pic">
                <div class="profile-info">
                    <h1><?php echo htmlspecialchars($enseignant['nom'] . ' ' . $enseignant['prenom']); ?></h1>
                    <p>Date de naissance : <?php echo htmlspecialchars($enseignant['date_nais']); ?></p>
                    <p>(Matricule: <?php echo htmlspecialchars($enseignant['matricul']); ?>)</p>
                    <div class="profile-actions">
                        <button id="openWindowButton" style="background-color: rgb(48, 87, 164);">Changer de mot de passe</button>
                        <div id="newWindow" class="hidden">
                        <span id="closeWindowButton" class="close" >&times;</span>
                            <img src="<?php echo htmlspecialchars($enseignant['image']); ?>" alt="Profile Picture" class="profile-pic">
                            
                            <h1 style="color: rgb(13, 28, 28);"><?php echo htmlspecialchars($enseignant['nom'] . ' ' . $enseignant['prenom']); ?></h1>
                            <form action="change_mdp.php" method="post" style="margin-top: 1rem; margin-bottom: 1rem;">
                                <div class="input__wrapper">
                                    <input id="current-password" name="mot_de_passe" type="password" class="input__field" placeholder="Votre mot de passe actuel" required autocomplete="off">
                                    <label for="current-password" class="input__label">Mot de passe actuel</label>
                                </div>
                                <div class="input__wrapper">
                                    <input id="new-password" name="mot_de_passenew" type="password" class="input__field" placeholder="Nouveau mot de passe" required autocomplete="off">
                                    <label for="new-password" class="input__label">Nouveau mot de passe</label>
                                </div>
                                <div class="input__wrapper">
                                    <input id="confirm-new-password" name="mot_de_passenews" type="password" class="input__field" placeholder="Confirmer le nouveau mot de passe" required autocomplete="off">
                                    <label for="confirm-new-password" class="input__label">Confirmer le mot de passe</label>
                                </div>
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($enseignant['id']); ?>">
                                <input type="submit" value="Valider" class="my-form__button">
                            </form>
                            
                        </div>
                        <script src="script_profil.js"></script>
                        <button onclick="openModal()">Modifier</button>
                        <button onclick="openTableModal()">Séances de cours</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-details">
            <p>Âge : <?php
                $dateOfBirth = new DateTime($enseignant['date_nais']);
                $today = new DateTime();
                $age = $today->diff($dateOfBirth)->y;
                echo $age . ' ans';
            ?></p>
            <p>Telephone : (+237) <?php echo htmlspecialchars($enseignant['telephone']); ?></p>
            <p><?php echo htmlspecialchars($enseignant['email']); ?></p>
            <p>Bureau : <?php echo htmlspecialchars($enseignant['bureau']); ?> étage</p>
            <p>Date de naissance : <?php echo htmlspecialchars($enseignant['date_nais']); ?></p>
            <p>Département : <?php echo htmlspecialchars($enseignant['departement']); ?></p>
            <p>Discipline : <?php echo htmlspecialchars($enseignant['discipline']); ?></p>
        </div>
        <div class="notification">
            <div class="notification__body">
                <img src="../../assets/images/check-circle.svg" alt="Success" class="notification__icon">
                Menu Profil enseignant sélectionné! &#128640;
            </div>
            <div class="notification__progress"></div>
        </div>
    </main>
</body>
</html>
