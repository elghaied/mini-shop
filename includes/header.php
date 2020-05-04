<?php require("ini.php") ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Autocation37</title>
    <link rel="stylesheet" href="assets/styles/style.css" />
  </head>
  <body>
    <nav>
      <img src="" alt="logo here" />
      <ul class="link-container">
        <li class="nav-link"><a href=<?php echo "'" . basename("/index").PHP_EOL . "'"; ?> >Acceil</a></li>
        <li class="nav-link"><a href=<?php echo "'" . basename("/rayon")."?royan=printer".PHP_EOL . "'"; ?>>3D printer</a></li>
        <li class="nav-link"><a href=<?php echo "'" . basename("/rayon")."?royan=wire".PHP_EOL . "'"; ?>>Supplies</a></li>
        <li class="nav-link"><a href=<?php echo "'" . basename("/panier").PHP_EOL . "'"; ?>>Contact</a></li>
      </ul>

      <?php
    if(isset($_SESSION['username']) && $_SESSION['username']!== ""){
       
        echo "<p class='logged'>Bienvenue  <a class='user' href=" . "'" . basename("/profile")."?user=". $_SESSION['user_id'] . PHP_EOL . "' >" . $_SESSION['username'] . "(<span class='". $_SESSION['privilege'] . "'>". $_SESSION['privilege'] . "</span>) </a>" . "</p>" ;
        echo '<a href="deconnect.php" class="disconnect">Déconnecter</a>';
        
    }else {
      echo '<a class="panier" href="' . basename("/login") . PHP_EOL . '">login</a>';
    }

    ?>
      
      <a class="panier" href="<?=  basename("/panier") ; ?>">Panier</a>
    </nav>