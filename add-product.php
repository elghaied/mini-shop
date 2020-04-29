<?php require("includes/header.php"); ?>

<main class="add-form">


<form action="" method="post" enctype="multipart/form-data" >
        <label for="title">
          title
          <input type="text" name="title" id="" />
        </label>
        <label for="Category"
          >Category
          <select name="Category" id="">
            <option value="Category1">Category1</option>
            <option value="Category1">Category1</option>
            <option value="Category3">Category3</option>
            <option value="Category4">Category4</option>
            <option value="Category5">Category5</option>
          </select>
        </label>
        <label for="content"
          >content </label>
          <textarea name="" id="" cols="30" rows="10"></textarea>
       
        <label for="price"
          >price
          <input type="text" name="price" id="" />
        </label>
        <label for="image"
          >image
          <input type="file" name="image" id="" accept="image/*" />
        </label>
        <input type="submit" value="valider" />
      </form>

</main>