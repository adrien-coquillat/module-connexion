<?php
session_start();
if (isset($_GET['disconnect'])) {
    session_destroy();
    header('Location: index.php');
}
?>
<header>
    <link rel='stylesheet' href='style.css'>
    <div class='header'>
        <img class="imageheader" src="images/logo-vape2.png">
        <a href='index.php'>
            <p class='textheader'>ACCUEIL</p>
        </a>

        <?php
        if (isset($_SESSION['isconnected']) && $_SESSION['isconnected'] || isset($_SESSION['admin'])) {
        ?>
        <?php if($_SESSION['identifiant']=="admin"){?>
            <a class="textheader" href='admin.php'>
        <?php }else{ ?>
            <a class="textheader" href='profil.php'> <?php } ?>
                <?php echo '⚙️'. $_SESSION['identifiant']; ?>
            </a>
            <a class="textheader" href="?disconnect">DECONNEXION</a>
        <?php
        } else { ?>
            <a href='connexion.php'>
                <p class='textheader'>CONNEXION</p>
            </a>
            <a href='inscription.php'>
                <p class='textheader'>INSCRIPTION</p>
            </a>
        <?php } ?>


    </div>
</header>