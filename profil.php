

<!DOCTYPE html>
<html lang="fr">
<!-- - Une page d’accueil qui présente votre site (index.php) -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include ('header.php'); 


  if (isset($_POST['submit'])) {
      $db = mysqli_connect('localhost', 'root', '', 'moduleconnexion');
      $newidentifiant = mysqli_real_escape_string($db, htmlspecialchars($_POST['identifiant'])); //on sécurise le login
      $newprenom = $_POST['prenom'];
      $newnom = $_POST['nom'];
      $pseudo = $_SESSION['identifiant'];
      $newpassword = mysqli_real_escape_string($db, htmlspecialchars($_POST['motdepasse']));
      $newcpassword = mysqli_real_escape_string($db, htmlspecialchars($_POST['cmotdepasse']));

      $sql = "SELECT id FROM `utilisateurs` WHERE login='$newidentifiant'";
      $query = mysqli_query($db, $sql);
      $result = mysqli_fetch_all($query);
      $compteur = count($result);
      if ($compteur == 0) {
          if (strlen($newidentifiant) >= 3) {
              if (strlen($newprenom) >= 2 && strlen($newnom) >= 2) {
                  if (strlen($newpassword) >= 6) {
                      if ($newpassword === $newcpassword) {
                          $newpassword = password_hash($newpassword, PASSWORD_BCRYPT);
                          $sql = "UPDATE `utilisateurs` SET `login`='$newidentifiant', `prenom`='$newprenom', `nom`='$newnom', `password`='$newpassword' WHERE `login`='$pseudo'";
                          $query = mysqli_query($db, $sql);
                          $_SESSION['identifiant'] = $newidentifiant;

                         header("location: index.php");
                      } else {
                          $msg = "les mots de  passes ne correspondent pas";
                      }
                  } else {
                      $msg = "6 caractères minimum pour le mot de passe";
                  }
              } else {
                  $msg = "2 caractères minimum pour le nom et prenom";
              }
          } else {
              $msg = "3 caractères minimum pour le login";
          }
      } else {
          $msg = "Login non disponible";
      }
  }





    if (isset($msg)) {
        echo "<div class='error'>" . $msg . "</div>";
    }
    ?>
    <div class="cadre">

        <form method="post" action="">
            <div class="sous-cadre">
                <div class="ligne">
                    <label for="identifiant">Nouveau Login :</label>
                    <input type="text" id="identifiant" name="identifiant" placeholder="Ex: Jean13">
                </div>
                <div class="ligne">
                    <label for="Prenom">Nouveau Prenom :</label>
                    <input type="text" id="Prenom" name="prenom" placeholder="Ex: Jean">
                </div>
                <div class="ligne">
                    <label for="Nom">Nouveau Nom :</label>
                    <input type="text" id="Nom" name="nom" placeholder="Ex: Yves">
                </div>
                <div class="ligne">
                    <label for="motdepass">Nouveau mot de passe :</label>
                    <input type="password" id="motdepasse" name="motdepasse" placeholder="*******">
                </div>
                <div class="ligne">
                    <label for="cmotdepasse"> Confirmation mot de passe :</label>
                    <input type="password" id="cmotdepasse" name="cmotdepasse" placeholder="*******">
                </div>
            </div>

            <input type="submit" value="MODIFIER" id="submit" name="submit">
        </form>

    </div>


    


    <?php include 'footer.php' ?>
</body>

</html>