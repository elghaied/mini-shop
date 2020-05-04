<?php require('includes/header.php'); ?>
    <!-- main body -->

    <header>
      <h1>Vinci Printing</h1>
      <p>make your ideas into shape</p>
    </header>

    <!-- last updates -->
    <h2 class="title">latest</h2>
    <div class="updates-container">
      <section>
        <h2>printers</h2>
        <?php 
          $royann = new Control();
          $royann->getTopTopics("printer");
          ?>

      </section>
      <div class="liner"></div>
      <section>
        <h2>supplies</h2>
       
        <?php 
          $royann = new Control();
          $royann->getTopTopics("wire");
          ?>

      </section>
    </div>
    <!-- icon -->
    <h2 class="title">Icons</h2>

    <ul class="icon-container">
      <li class="icon">
        <a href="http://">
          <img src="assets/img/printer.png" alt="printer" />
          <h3>3d printers</h3>
        </a>
      </li>
      <li class="icon">
        <a href="http://">
          <img src="assets/img/wire.png" alt="wire" />
          <h3>wire</h3>
        </a>
      </li>
      <li class="icon">
        <a href="http://">
          <img src="assets/img/concrete.png" alt="supplies" />
          <h3>supplies</h3>
        </a>
      </li>
    </ul>
    <!-- 3d modeling -->
    <section class="model">
      <img src="assets/img/model.png" alt="modeling" />
      <h2>3d modeling</h2>
    </section>
<?php include("includes/footer.php"); ?>
