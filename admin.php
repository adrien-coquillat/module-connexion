<!DOCTYPE html>
<html lang="fr">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="style.css">
</head>

<body id="admin">
<?php include ('header.php'); ?>
<?php

if(isset($_SESSION['admin']) && $_SESSION['admin']==true){
    $db = mysqli_connect('localhost', 'root', '', 'moduleconnexion');

    $sql = "SELECT * FROM `utilisateurs`";
    $query = mysqli_query($db, $sql);
    $resultall = mysqli_fetch_all($query);
    echo "<table>";
    foreach($resultall as $key=>$values){
        echo "<tr>";
        foreach($values as $key=>$value){
            echo "<td>".$value."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}else{
    header("Location: index.php");
}

?>


<?php include 'footer.php' ?>
</body>

</html>