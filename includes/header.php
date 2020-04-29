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
        <li class="nav-link"><a href=<?php echo "'" . basename("/produit").PHP_EOL . "'"; ?>>Supplies</a></li>
        <li class="nav-link"><a href=<?php echo "'" . basename("/panier").PHP_EOL . "'"; ?>>Contact</a></li>
      </ul>
      <a class="panier" href="">Panier</a>
    </nav>