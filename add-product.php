<?php require("includes/header.php"); ?>

<main class="add-form">


<form action="" method="post" enctype="multipart/form-data" >
        <label for="title">
          title
          <input type="text" name="name" id="" />
        </label>
        <label for="Category"
          >Category
          <select name="category" id="">
         <?php 
         $category = new Control();
         $category->getCategory(); 
         ?>

          </select>
        </label>
        <label for="description"
          >description </label>
          <textarea name="description" id="" cols="30" rows="10"></textarea>
       
        <label for="price"
          >price
          <input type="text" name="price" id="" />
        </label>
        <label for="image"
          >image
          <input type="file" name="image" id="" accept="image/*" />
        </label>
        <label for="quantity">quantity</label>
        <input type="number" name="quantity" id="" min="1">
        <label for="_actif">Actif</label>
        <input type="checkbox" name="_actif" id="">
        <input type="submit" name="add-product" value="valider" />
      </form>

</main>

<?php include("includes/footer.php"); ?>
