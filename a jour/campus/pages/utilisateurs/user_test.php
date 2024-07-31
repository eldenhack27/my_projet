<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="create_user.php" method="post" enctype="multipart/form-data">
        <label for="nom"></label>
        <input type="text" id="nom" name="nom" class="input__field" placeholder="Nom étudiant" required autocomplete="off">
        <br> 
        <label for="prenom">prenom</label>
        <input type="text" id="prenom" name="prenom" class="input__field" placeholder="Prénom étudiant" required autocomplete="off">
        <br>
        <label for="telephone"></label>
        <input type="text" id="telephone" name="telephone" class="input__field" placeholder="Téléphone étudiant" required autocomplete="off">
        <br>
        <label for="dateofbirth">dateofbirth</label>
        <input type="date" id="dateofbirth" name="dateofbirth" class="input__field" required autocomplete="off">
        <br>
        <label for="accreditation">accreditation</label>
        <select id="filiere" name="accreditation" class="input__field" required autocomplete="off" style="height: auto;">
            <option value="" class="input__field">-- Sélectionner --</option>
            <option value="0" class="input__field">0</option>
            <option value="1" class="input__field">1</option>
            <option value="2" class="input__field">2</option>
            <option value="3" class="input__field">3</option>
            <!-- Autres options -->
        </select>
        <br>
        <label for="email">email</label>
        <input type="email" id="email" name="email" class="input__field" placeholder="Your Email" required autocomplete="off">
        <br>
        <label for="mot_de_passe">mot_de_passe</label>
        <input id="password" name="mot_de_passe" type="password" class="input__field" placeholder="Your Password"
                   title="Minimum 6 characters at least 1 Alphabet and 1 Number"
                   pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" required autocomplete="off">
        <br>
        <label for="profil">profil</label>
        <input type="file" id="profil" name="profil" accept="image/*" class="input__field">
        <br><br>
        <button type="submit" class="my-form__button">Créer</button>
    </form>
</body>
</html>