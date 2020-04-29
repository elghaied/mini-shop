<?php require('includes/header.php');

?>

<!-- main body  -->
    <main class="product-container">
      <aside class="search-sidebar">
        <form action="" method="post">
          <label for="">Catogrize</label>
          <select name="cat" multiple>
            <option value="MakerBot">MakerBot Replicator </option>
            <option value="Ultimaker">Ultimaker 2 Extended</option>
            <option value="Monoprice">Monoprice Select Mini</option>
            <option value="XYZprinting" selected
              >XYZprinting Da Vinci 1.0</option
            >
          </select>
          <label for="price">Price</label>
          <input type="range" name="price" id="" min="0" max="2000" />
          <label for="rating">Rating</label>
          <label for="onestar">*****</label>
          <input type="radio" name="onestar" id="" />
          <label for="twostars">*****</label>
          <input type="radio" name="twostars" id="" />
          <label for="threestars">*****</label>
          <input type="radio" name="threestars" id="" />
          <label for="fourstars">*****</label>
          <input type="radio" name="fourstars" id="" />
          <label for="fivestars">*****</label>

          <input type="radio" name="fivestars" id="" />

          <input type="submit" value="valider" />
        </form>
      </aside>
      <section class="prod-container">
        <article class="promo">
          <h2 class="title">PROMO</h2>
        </article>
        <h2 class="mini-title">All Products</h2>
        <section class="all-products">
        
         <?php  $db = new Bdd(); 
          $royann = new Control($db->bdd);
          $royann->getRayon($_SESSION['royan']);
          ?>
        </section>
      </section>
    </main>
    <?php/* include("includes/footer.php");*/ ?>

  </body>
</html>
