<?php

// Paramètres de connexion

$serverName = 'localhost';
$username = 'root';
$password = '';
$dataBase = 'todo-list';

// Établir la connexion

$connexion = mysqli_connect(
      $serverName,
      $username,
      $password,
      $dataBase
);

// Vérifier la connexion

if (!$connexion) {
      die("Échec de la connexion : " . mysqli_connect_error());
} else {
      echo '<script>console.log("Connexion réussie à la base de données. GG ma gueule");</script>';
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=0, initial-scale=1.0">
      <title>AOI TODO LIST</title>
      <link rel="stylesheet" href="style.css">
      <link rel="shortcut icon" href="img/reader-outline.svg" type="image/x-icon">
</head>

<body>

      <h1>To-do list</h1>
      <div>
            <!-- Insérez ici l'affichage de la todo list -->
            <form action="" method="">
                  <fieldset>
                        <?php
                        $showTaskSQL = "SELECT * FROM taches ORDER BY id_task DESC";
                        $showTask = mysqli_query($connexion, $showTaskSQL);

                        if (!$showTask) {
                              echo "Erreuur, on a ch*é dans la colle" . mysqli_error($connexion);
                        } else {
                              echo "<ul>";
                              foreach ($showTask as $item) {
                                    echo '<li><input type="checkbox">' . $item['name_task'] . '<span class="infoTask"> ' . $item['date_task'] .  '</span></li>';
                              };
                              echo "</ul>";
                        }
                        ?>
                        <button type="submit">Valider les tâches accomplies</button>
                  </fieldset>
            </form>

      </div>
      <!-- Ici, le formulaire text area pour écrire dans la base -->

      <form action="" method="">
            <label for="newTask">Nouvelle tâche :</label>
            <textarea name="newTask" id="newTask" cols="30" rows="1" placeholder="Arroser les plantes, préparer la cuisine.."></textarea>
            <div>
                  <input type="submit">
                  <input type="reset">
            </div>
      </form>
      <?php
      // Fermer la connexion

      mysqli_close($connexion);
      ?>


</body>

</html>