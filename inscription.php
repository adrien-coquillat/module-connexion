<?php


if (isset($_POST['submit'])) {
    $db = mysqli_connect('localhost', 'root', '', 'moduleconnexion');
    $identifiant = mysqli_real_escape_string($db, htmlspecialchars($_POST['identifiant'])); //on sécurise le login
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['motdepasse']));
    $cpassword = mysqli_real_escape_string($db, htmlspecialchars($_POST['cmotdepasse']));

    $sql = "SELECT id FROM `utilisateurs` WHERE login='$identifiant'";
    $query = mysqli_query($db, $sql);
    $result = mysqli_fetch_all($query);
    $compteur = count($result);
    if ($compteur == 0) {
        if (strlen($identifiant) >= 3) {
            if (strlen($prenom) >= 2 && strlen($nom) >= 2) {
                if (strlen($password) >= 6) {
                    if ($password === $cpassword) {
                        $password = password_hash($password, PASSWORD_BCRYPT);
                        $sql = "INSERT INTO `utilisateurs`(`login`, `prenom`, `nom`, `password`) VALUES ('$identifiant','$prenom','$nom','$password')";
                        $query = mysqli_query($db, $sql);
                        header("location: connexion.php");
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




?>

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
    <?php include 'header.php' ?>
    <?php
    if (isset($msg)) {
        echo "<div class='error'>" . $msg . "</div>";
    }
    ?>
    <div class="cadre">

        <form method="post" action="">
            <div class="sous-cadre">
                <div class="ligne">
                    <label for="identifiant"> Login :</label>
                    <input type="text" id="identifiant" name="identifiant" placeholder="Ex: Jean13">
                </div>
                <div class="ligne">
                    <label for="Prenom"> Prenom :</label>
                    <input type="text" id="Prenom" name="prenom" placeholder="Ex: Jean">
                </div>
                <div class="ligne">
                    <label for="Nom"> Nom :</label>
                    <input type="text" id="Nom" name="nom" placeholder="Ex: Yves">
                </div>
                <div class="ligne">
                    <label for="motdepass"> mot de passe :</label>
                    <input type="password" id="motdepasse" name="motdepasse" placeholder="*******">
                </div>
                <div class="ligne">
                    <label for="cmotdepasse"> Confirmation mot de passe :</label>
                    <input type="password" id="cmotdepasse" name="cmotdepasse" placeholder="*******">
                </div>
            </div>

            <input type="submit" value="Inscription" id="submit" name="submit">
        </form>

    </div>




    <?php include 'footer.php' ?>
</body>

</html>