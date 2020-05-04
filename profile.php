<?php require('includes/header.php'); ?>
<main class="profile-container">
      <aside>
        <h2>parameter</h2>
        <ul class="sidebar">
          <li class="sidebar-links"><a href="">Adresses</a></li>
          <li class="sidebar-links"><a href="">Historique</a></li>
          <li class="sidebar-links"><a href="">Profile</a></li>
          <li class="sidebar-links"><a href="">payment methods</a></li>
        </ul>
      </aside>
      <section class="profile-items">
        <?php 
        $selected = (int) $_SESSION['user_id'];

        var_dump($_SESSION['alert']);
        $profile = new Verifyuser();
         $user = $profile->selectuser($selected);
        
     
       
        ?>
        
        <form action="" method="post">
          <label for="username">username</label>
          <input type="text" value="<?php echo $user->getUsername(); ?>" name="username" id=""  <?php if($_SESSION['privilege'] !== "admin" ){ echo "disabled";} ?>>
       
          <input type="submit" value="save" name="save-username" <?php if($_SESSION['privilege'] !== "admin" ) { echo "disabled";} ?> >
        </form>

        <form action="" method="post">
          <label for="name">Name</label>
          <input type="text" value="<?php echo $user->getName(); ?>" name="name" id="">
          <label for="surname">Surname</label>
          <input type="text"  value="<?php echo $user->getSurname(); ?>"  name="surname" id="">

          <input type="submit" value="save" name="save-name">
        </form>

        <form action="" method="post">
          <label for="password">current password</label>
          <input type="password"  name="old-pass" id="">
          <label for="new-pass">new password</label>
          <input type="password"   name="new-pass" id="">
          <label for="re-pass">confirm new password</label>
          <input type="password"   name="re-pass" id="">

          <input type="submit" value="save" name="update-pass">
        </form>

        <form action="" method="post">
          <label for="email">current email</label>
          <input type="email" value="<?php echo $user->getEmail(); ?>"  name="old-email" id="">
          <label for="new-email">new email</label>
          <input type="email"   name="new-email" id="">
          <label for="re-email">confirm new email</label>
          <input type="email"   name="re-email" id="">

          <input type="submit" value="save" name="update-email">
        </form>

        
        
      </section>
      
    </main>
    <?php include("includes/footer.php"); ?>
