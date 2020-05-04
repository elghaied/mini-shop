<?php require('includes/header.php'); ?>
<main class="panier-container">
      <aside>
        <h2>parameter</h2>
        <ul class="sidebar">
          <li class="sidebar-links"><a href="">Adresses</a></li>
          <li class="sidebar-links"><a href="">Historique</a></li>
          <li class="sidebar-links"><a href="">email</a></li>
          <li class="sidebar-links"><a href="">mots-de-passe</a></li>
          <li class="sidebar-links"><a href="">payment methods</a></li>
        </ul>
      </aside>
      <section class="panier-items">
        <?php 
        $mypanier = new Cartmanager();
        $mypanier->showcart($_SESSION['user_id']);


        ?>
      </section>
      <aside>

      <?php
      $mypanier->getOrder($_SESSION['user_id']);
       ?>
  

        <a href="">Payer</a>
      </aside>
    </main>
    <?php include("includes/footer.php"); ?>
