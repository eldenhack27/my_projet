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
                  <select id="filiere" name="accreditation" class="input__field" required autocomplete="off" style="height: auto;">
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