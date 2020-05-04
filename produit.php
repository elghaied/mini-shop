<?php require('includes/header.php');

$connect = new Control();
$myArticle = $connect->getArticle($_GET['article']);
$myRating = $connect->getRating($_GET['article']);


echo $_SESSION['alert'];
?>


<main class="produit">
      <section class="tree">Home > printers > products > my product</section>

      <article class="produit-container">
        <section>
          <img src="<?php echo  "uploads/" . basename("{$myArticle->getImage()}"); ?>" alt="" />
        
        </section>
        <aside>
          <h2 class="product-title"><?php echo $myArticle->getName(); ?></h2>
          <span><?php if($myRating === null){ echo "0";} else{ echo $myRating->getScore(); } ?></span>
          <p>
          <?php echo $myArticle->getDescription(); ?>
          </p>

          <p>Price: <?php echo $myArticle->getPrice(); ?>$</p>
          <p>Shipping: 15$</p>
          
          <form action="" method="post">
            <input type="hidden" name="product_id" value="<?= $myArticle->getId(); ?> ">
            <input type="hidden" name="price" value="<?= $myArticle->getPrice(); ?> ">

            <input type="hidden" name="user_id" value="<?= $_SESSION['user_id']; ?> ">
            <p> Disponible : <?= $myArticle->getQuantity(); ?>
            </p>
            <input type="number" name="quantity" id="" min="1" max="<?= $myArticle->getQuantity(); ?>">
            <input type="submit" name="addToCart" class="ajouter" value="+ Ajouter">
          </form>
          
        </aside>
      </article>
      <section class="comment-section">
        <form action="" method="post">
          <label for="">Username</label>
          <input type="text" name="username" id="" />
          <label for="comment">Comment</label>
          <textarea name="comment" id="" cols="30" rows="10"></textarea>
          <input type="submit" value="envoyer" />
        </form>
        <h2>Comments</h2>

        <article class="comment">
          <p class="user-name">Lorem.</p>
          <p class="comment-content">Lorem ipsum dolor sit amet consectetur.</p>
        </article>
        <article class="comment">
          <p class="user-name">Dolorem.</p>
          <p class="comment-content">Sed labore sunt beatae amet qui.</p>
        </article>
        <article class="comment">
          <p class="user-name">Expedita?</p>
          <p class="comment-content">Ut impedit iure dicta nihil natus.</p>
        </article>
        <article class="comment">
          <p class="user-name">Unde.</p>
          <p class="comment-content">
            Veniam itaque labore aperiam sint laudantium.
          </p>
        </article>
        <article class="comment">
          <p class="user-name">Beatae?</p>
          <p class="comment-content">
            Architecto atque repudiandae ullam enim minima?
          </p>
        </article>
        <article class="comment">
          <p class="user-name">Iure!</p>
          <p class="comment-content">
            Hic nihil dignissimos at consectetur provident?
          </p>
        </article>
        <article class="comment">
          <p class="user-name">Deserunt!</p>
          <p class="comment-content">
            Tempore est recusandae laborum beatae iusto.
          </p>
        </article>
        <article class="comment">
          <p class="user-name">Temporibus.</p>
          <p class="comment-content">
            Iste architecto ullam est maxime distinctio.
          </p>
        </article>
        <article class="comment">
          <p class="user-name">Ipsa.</p>
          <p class="comment-content">
            Ut maxime impedit voluptates aut magnam?
          </p>
        </article>
        <article class="comment">
          <p class="user-name">Qui?</p>
          <p class="comment-content">
            Molestiae similique sequi quo molestias nemo.
          </p>
        </article>
      </section>
    </main>
    <?php include("includes/footer.php"); ?>

