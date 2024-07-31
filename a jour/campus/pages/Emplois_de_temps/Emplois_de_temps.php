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
    <link rel="stylesheet" href="style_Emplois_de_temps.css">
</head>
<body>
  
    <?php
       include "../../config/aside.php" 
    ?>
    <script src="../script.js"></script>
    <script src="script_Emplois_de_temps.js"></script>

    <main>
      <article class="table-widget">
      <div class="caption">
        <button  style="margin-right: 5px;" class="add-attendance" > + Ajouter emplois de temps</button>
        <div class="filter">
          <label for="classe">Filiere</label>
          <select id="classe" required autocomplete="off">
              <option  value="">-- Sélectionner --</option>
              <option  value="GL">Genie Logiciel</option>
          </select>
      </div>
      <div class="filter">
          <label for="groupe">Niveau</label>
          <select id="groupe" required autocomplete="off">
            <option value="" class="input__field">-- Selectionner --</option>
            <option value="1" class="input__field">1</option>
            <option value="2" class="input__field">2 [ BTS / HND ]</option>
            <option value="3" class="input__field">3 [ LICENSE / BACHELOR ]</option>
            <option value="4" class="input__field">4 [ MASTER I ]</option>
            <option value="5" class="input__field">5 [ MASTER II ]</option>
          </select>
      </div>
        <button class="export-btn" type="button">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-export" width="24"
            height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
            stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
            <path d="M11.5 21h-4.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v5m-5 6h7m-3 -3l3 3l-3 3" />
          </svg>
          Export
        </button>
      </div>
      <br>
      <table>
        <thead>
          <tr>
            <th>
             [ JOURS / HEURES ]
            </th>
            <th>08H - 10H</th>
            <th>10H - 11H </th>
            <th>11H - 13H</th>
            <th>13H - 14H</th>
            <th>14H - 17H</th>
            <th>18H - 22H</th>
          </tr>
        </thead>
        <tbody id="team-member-rows">
          <!-- premiere ligne-->
          <tr>
            <td class="team-member-profile" style="background:var(--th-background); ">Lundi</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td style="background-color: rgb(230, 255, 255); color: black;">PAUSE</td>
            <td>-</td>
            <td>-</td>
          </tr>
          <tr>
            <td class="team-member-profile" style="background:var(--th-background); ">Mardi</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td style="background-color: rgb(230, 255, 255); color: black;">PAUSE</td>
            <td>-</td>
            <td>-</td>
          </tr>
          <tr>
            <td class="team-member-profile" style="background:var(--th-background); ">Mercredi</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td style="background-color: rgb(230, 255, 255); color: black;">PAUSE</td>
            <td>-</td>
            <td>-</td>
          </tr>
          <tr>
            <td class="team-member-profile" style="background:var(--th-background); ">Jeudi</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td style="background-color: rgb(230, 255, 255); color: black;">PAUSE</td>
            <td>-</td>
            <td>-</td>
          </tr>
          <tr>
            <td class="team-member-profile" style="background:var(--th-background); ">Vendredi</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td style="background-color: rgb(230, 255, 255); color: black;">PAUSE</td>
            <td>-</td>
            <td>-</td>
          </tr>
          <tr>
            <td class="team-member-profile" style="background:var(--th-background); ">Samedi</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td style="background-color: rgb(230, 255, 255); color: black;">PAUSE</td>
            <td>-</td>
            <td>-</td>
          </tr>
          <tr>
            <td class="team-member-profile" style="background:var(--th-background); ">Dimanche</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td style="background-color: azure; color: black;">PAUSE</td>
            <td>-</td>
            <td>-</td>
          </tr>
        </tbody>
      </table>
    </article>
      <!-- Ajoutez plus de contenu ici pour tester le défilement -->
    </main>
    <div class="notification">
      <div class="notification__body">
          <img
              src="../../assets/images/check-circle.svg"
              alt="Success"
              class="notification__icon"
          >
          Menu emplois de temps selectionne! &#128640; 
      </div>
      <div class="notification__progress"></div>
  </div>
</body>
</html>