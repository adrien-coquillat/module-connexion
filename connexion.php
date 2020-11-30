<?php
if (isset($_POST['submit'])) {
    $identifiant = $_POST['identifiant'];
    $password = $_POST['motdepasse'];
    $db = mysqli_connect('localhost', 'root', '', 'moduleconnexion');

    $sql = "SELECT id FROM `utilisateurs` WHERE login = 'admin'";
    $query = mysqli_query($db, $sql);
    $resultidadmin = mysqli_fetch_array($query);
    $idadmin = $resultidadmin[0];
    $sql = "SELECT password FROM `utilisateurs` WHERE login = 'admin'";
    $query = mysqli_query($db, $sql);
    $resultmdpadmin = mysqli_fetch_array($query);

    if ($identifiant == 'admin') {
        if ($password == 'admin') {
            session_start();
            $_SESSION['adminconnect'] = true;
            $_SESSION['admin'] = $identifiant;
            $_SESSION['identifiant'] = $identifiant;
            header("Location:admin.php");
        }
    } else {
        $sql = "SELECT id FROM `utilisateurs` WHERE login = '$identifiant'";
        $query = mysqli_query($db, $sql);
        $resultid = mysqli_fetch_all($query);
        $compteur = count($resultid);
        $sql = " SELECT PASSWORD FROM `utilisateurs` WHERE login='$identifiant'";
        $query = mysqli_query($db, $sql);
        $resultmdp = mysqli_fetch_array($query);
        $cryptedpass = $resultmdp[0];
        if ($compteur == 1) {
            if (password_verify($password, $cryptedpass)) {
                echo 'salut';
                session_start();
                $_SESSION['identifiant'] = $identifiant;
                $_SESSION['isconnected'] = true;
                header('Location: index.php');
            } else {
                $msg = 'mot de passe incorrect';
                $_SESSION['isconnected'] = false;
            }
        } else {
            $msg = 'identifiant incorrect';
        }
    }
}


?>

<!DOCTYPE html>
<html lang="fr">


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
    <div class="cadre2">
        <form method="post" action="">
            <div class="sous-cadre">
                <div class="ligne">
                    <label for="identifiant"> Login :</label>
                    <input type="text" id="identifiant" name="identifiant" placeholder="Ex: Jean13">
                </div>
                <div class="ligne">
                    <label for="motdepass"> mot de passe :</label>
                    <input type="password" id="motdepasse" name="motdepasse" placeholder="*******">
                </div>
            </div>
            <input type="submit" value="Connexion" id="connect" name="submit">
        </form>
    </div>

    <?php include 'footer.php' ?>
</body>

</html>