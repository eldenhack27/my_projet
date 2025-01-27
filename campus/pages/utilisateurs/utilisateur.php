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
    <link rel="stylesheet" href="style_utilisateur.css">
</head>
<body>
    <aside>
        <div class="sidebar-top">

            <a href="#" class="logo__wrapper">
                <img src="../../assets/images/imelogos.png" alt="Logo" class="logo-small">
                <span class="hide">
                IME - SCHOOL
                </span>
            </a>
        </div>
        <div class="search__wrapper">
            <svg width="20" height="20" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                d="M9 9L13 13M5.66667 10.3333C3.08934 10.3333 1 8.244 1 5.66667C1 3.08934 3.08934 1 5.66667 1C8.244 1 10.3333 3.08934 10.3333 5.66667C10.3333 8.244 8.244 10.3333 5.66667 10.3333Z"
                stroke="#697089" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <input type="search" placeholder="Search for anything...">
        </div>
        <div class="user-info">
            <div class="sidebar__profile">
                <div class="avatar__wrapper">
                    <img class="avatar" src="../../assets/images/leevan.jpg" alt="Joe Doe Picture">
                <div class="online__status"></div>
            </div>
            <section class="avatar__name hide">
                <div class="user-name"><?php echo htmlspecialchars($_SESSION['user_name']); ?></div>
                <div class="email"><?php echo htmlspecialchars($_SESSION['user_email']); ?></div>
            </section>
            <a href="../login/logout.php"  class="logout">
                <svg type="button" onclick="confirmLogout()" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="24" height="24"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                    <path d="M9 12h12l-3 -3"></path>
                    <path d="M18 15l3 -3"></path>
                </svg>
            </a>
            <script>
                function confirmLogout() {
                    if (confirm("Êtes-vous sûr de vouloir vous déconnecter ?")) {
                        window.location.href = "../login/logout.php";  // Redirection vers logout.php si confirmation
                    }
                }
            </script>

        </div>
        <div class="sidebar-links">
            <ul class="menu">
            <li>
              <a href="../Etudiants/etudiant.php" title="Apprenants" class="tooltip" class="menu-button active" onclick="handleClick(this)">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <circle cx="9" cy="7" r="4" />
                  <path d="M17 11a3 3 0 1 0 -4 -4" />
                  <path d="M12 16v-1a3 3 0 0 0 -3 -3h-3a3 3 0 0 0 -3 3v1" />
                  <path d="M21 17v-1a3 3 0 0 0 -2.824 -2.995l-.176 -.005h-3a3 3 0 0 0 -3 3v1" />
                </svg>
                  <span class="link hide" style="margin-left:-1.5rem;">Etudiants</span>
                  <span class="tooltip__content">sector with manage students</span>
              </a>
          </li>
      
          
          <li>
            <a href="../Enseignants/enseignant.php" title="Professeurs" class="tooltip" class="menu-button" onclick="handleClick(this)">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-teacher" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="12" cy="7" r="4" />
                <path d="M4 19v-2a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v2" />
                <path d="M12 11v4" />
                <path d="M10 15h4" />
              </svg>
                <span class="link hide" style="margin-left:-1.5rem;">Enseignants</span>
                <span class="tooltip__content">sector with manage professors</span>
            </a>
          </li>
          <li>
            <a href="../Cahier_de_presence/cahier_de_presence.php" title="Presence" class="tooltip" class="menu-button" onclick="handleClick(this)">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M8 7a4 4 0 1 1 8 0m0 4v1a4 4 0 0 1 -4 4h-1" />
                <path d="M16 12h6" />
                <path d="M21 21l-18 -18" />
                <path d="M5 5v2m2 2h4m2 0h1" />
              </svg>
              <span class="link hide" style="margin-left:-1.5rem;">Cahier de presence</span>
            </a>
          </li>
          <li>
            <a href="../Bilan_de_presence/bilan_de_presence.php" title="Bilan" class="tooltip" class="menu-button" onclick="handleClick(this)">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <ellipse cx="12" cy="6" rx="8" ry="3" />
                <path d="M4 6v6a8 3 0 0 0 16 0v-6" />
                <path d="M4 12v6a8 3 0 0 0 16 0v-6" />
              </svg>
              <span class="link hide" style="margin-left:-1.5rem;">Bilan de presence</span>
            </a>
          </li>
          <li class="menu-button active">
            <a href="../utilisateurs/utilisateur.php" title="Users" class="tooltip" class="menu-button" onclick="handleClick(this)">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="12" cy="7" r="4" />
                <path d="M5.5 21h13a2 2 0 0 0 2 -2v-1a7 7 0 0 0 -7 -7h-3a7 7 0 0 0 -7 7v1a2 2 0 0 0 2 2" />
              </svg>
              <span class="link hide" style="margin-left:-1.5rem;">Admin</span>
            </a>
          </li>
            </ul>
        </div>
    </aside>
    <main>
        
    <div class="container">   
          <!-- Bouton pour ouvrir le modal -->
    <button id="openModalBtn" class="add-attendance">+ Ajouter Des utilisateurs</button>  
    <!-- Le Modal -->
    <div id="userModal" class="modal">
        <div class="modal-content">
            <span class="closeBtn">&times;</span>
            <h2 class="ajout">Ajout d'utilisateur </h2>
            <form id="userForm" method="post" action="create_user.php" enctype="multipart/form-data">
              <div class="input__wrapper">
                  <input type="text" id="nom" name="nom" class="input__field" placeholder="Nom étudiant" required autocomplete="off">
                  <label for="nom" class="input__label">Nom utilisateur :</label>
                  <svg class="input__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M3 21v-4a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v4" />
                      <circle cx="12" cy="7" r="4" />
                  </svg>
              </div>
              <div class="input__wrapper">
                  <input type="text" id="prenom" name="prenom" class="input__field" placeholder="Prénom étudiant" required autocomplete="off">
                  <label for="prenom" class="input__label">Prénom utilisateur :</label>
                  <svg class="input__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M3 21v-4a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v4" />
                      <circle cx="12" cy="7" r="4" />
                  </svg>              
              </div>
              <div class="input__wrapper">
                  <input type="text" id="telephone" name="telephone" class="input__field" placeholder="Téléphone étudiant" required autocomplete="off">
                  <label for="telephone" class="input__label">Téléphone utilisateur :</label>
                  <svg class="input__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M4 4h5l-1 5a11 11 0 0 0 7 7l5 -1v5a2 2 0 0 1 -2 2a16 16 0 0 1 -16 -16a2 2 0 0 1 2 -2"></path>
                  </svg>              
              </div>
              <div class="input__wrapper">
                  <input type="date" id="dateofbirth" name="dateofbirth" class="input__field" required autocomplete="off">
                  <label for="dateofbirth" class="input__label">Date d'anniversaire :</label> 
              </div>
              <div class="input__wrapper">
                  <select id="filiere" name="filiere" class="input__field" required autocomplete="off" style="height: auto;">
                      <option value="" class="input__field">-- Sélectionner --</option>
                      <option value="0" class="input__field">0</option>
                      <option value="1" class="input__field">1</option>
                      <option value="2" class="input__field">2</option>
                      <option value="3" class="input__field">3</option>
                      <!-- Autres options -->
                  </select>
                  <label for="filiere" class="input__label">Niveau d'accreditation :</label>
              </div>
              <div class="input__wrapper">
                <input type="email" id="email" name="email" class="input__field" placeholder="Your Email" required autocomplete="off">
                <label for="email" class="input__label">Email:</label>
                <svg class="input__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                    <path d="M16 12v1.5a2.5 2.5 0 0 0 5 0v-1.5a9 9 0 1 0 -5.5 8.28"></path>
                </svg>                     
              </div>
              <div class="input__wrapper">
                  <input id="password" name="mot_de_passe" type="password" class="input__field" placeholder="Your Password"
                   title="Minimum 6 characters at least 1 Alphabet and 1 Number"
                   pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" required autocomplete="off">
                  <label for="password" class="input__label">Mot de passe :</label>
                  <svg class="input__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                      stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z"></path>
                      <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
                      <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path>
                  </svg> 
              </div>
              <div class="input__wrapper">
                  <input type="file" id="profil" name="profil" accept="image/*" class="input__field">
                  <label for="profil" class="input__label">Importer une image de profil :</label>
              </div>
              <button type="submit" class="my-form__button">Créer</button>
          </form>
            </form>
        </div>
    </div>
    <script src="../script_utilisateur.js"></script>
    <script src="script_utilisateur.js"></script> 
            <div class="profile-wrapper">
                <div class="profile">
                    <div class="profile-image">
                        <img
                            src="../../assets/images/leevan.jpg"
                            alt="Profile"
                        >
                    </div>
                    <ul class="social-icons">
                        <li>
                            <a href="#instagram" title="Instagram">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                                     stroke-linecap="round" stroke-linejoin="round"
                                >
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#twitter" title="Twitter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                                     stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"
                                >
                                    <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 
                                            10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5
                                            4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"
                                    >
                                    </path>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#threads" title="Threads">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" 
                                     fill="none" stroke-linecap="round" stroke-linejoin="round"
                                >
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M19 7.5c-1.333 -3 -3.667 -4.5 -7 -4.5c-5 0 -8 2.5 -8 9s3.5 9 8 9s7 -3 7
                                            -5s-1 -5 -7 -5c-2.5 0 -3 1.25 -3 2.5c0 1.5 1 2.5 2.5 2.5c2.5 0 3.5 -1.5 
                                            3.5 -5s-2 -4 -3 -4s-1.833 .333 -2.5 1"
                                    >
                                    </path>
                                 </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#linkedin" title="Linkedin">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round"
                                >
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 
                                             2 0 0 1 -2 -2z">
                                    </path>
                                    <path d="M8 11l0 5"></path>
                                    <path d="M8 8l0 .01"></path>
                                    <path d="M12 16l0 -5"></path>
                                    <path d="M16 16v-3a2 2 0 0 0 -4 0"></path>
                                 </svg>
                            </a>
                        </li>
                    </ul>
                    <div class="profile-name">
                        <h2>
                          Nchedong Lekane    
                          <svg 
                              xmlns="http://www.w3.org/2000/svg" 
                              viewBox="0 0 24 24" 
                              width="24" 
                              height="24" 
                              fill="currentColor"
                          >
                              <path d="M3 17.25V21h3.75l11.086-11.086-3.75-3.75L3 17.25zm3-1.086L16.337 5.828l2.829 2.829L8.828 19H6v-2.828zM18.414 2.586c.78-.78 2.048-.78 2.828 0l1.172 1.172c.78.78.78 2.048 0 2.828L19.828 8.586l-2.828-2.828L18.414 2.586z"/>
                          </svg>

                          <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                width="24"
                                height="24"
                                fill="#FA7575"
                            >
                            <path d="M9 3v1H4v2h16V4h-5V3h-2v1H9V3H7v1H6v1H4V4H3v2h1v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V6h1V4h-1V3h-1v1h-2V3h-1v1h-2V3h-1v1h-2V3H9zm3 17c-1.1 0-2-.9-2-2h2v2zM9 9v8h2V9H9zm4 0v8h2V9h-2z" />
                          </svg>
                        </h2>
                        <div class="profile-bio">
                            niveau d'acréditation : <em>1</em><br>
                            Téléphone : <em>(+237)</em><em>655723288</em><br>
                            Email :<em>lekaneleevan2@gmail.com</em>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ajoutez plus de contenu ici pour tester le défilement -->
         <h1>Contenu Bilan de presence</h1>
        <p>Voici où le contenu principal sera affiché. Ajoutez du contenu supplémentaire pour tester le défilement.</p>
        <p>Fusce venenatis libero a tincidunt malesuada. Suspendisse potenti. Donec euismod, lorem in consequat tincidunt, nunc mauris egestas nisl, in tincidunt felis mi sit amet justo.</p>
    </main>
    <div class="notification">
      <div class="notification__body">
          <img
              src="../../assets/images/check-circle.svg"
              alt="Success"
              class="notification__icon"
          >
          Menu Utilisateur selectionne! &#128640; 
      </div>
      <div class="notification__progress"></div>
  </div>
</body>
</html>