<?php
session_start();

	include("../connection.php");
	include("../functions.php");
	$admin = isAdmin($con);
    if($admin != 1)
    {            
		header("Location: ../index.php");
        die;
    }   
     

?>


<!DOCTYPE html>
<html lang="ro">
  <head>
    <meta charset="utf-8">
	<meta name="author1" content="Andrei Rosu">
	<meta name="author2" content="Anton Sfabu">
    <title>OnT - Admin</title>
	<link rel="stylesheet" href="../style.css">
  </head>
  
  <body>
	<header>
		<h1>Online Toys</h1>
	</header>
	
	<hr class="above">
	
	<nav>
		<ul>
			<li class="nav_bar"><a href="../index.php">Acasă</a></li>
			<li class="nav_bar"><a href="../cos.php">Coșul meu</a></li>
			<li class="nav_bar"><a href="../jucarii.php">Jucării</a></li>
			<li class="nav_bar"><a href="../boardgames.php">Boardgames</a></li>
			<li class="nav_bar"><a href="../contact.php">Contact</a></li>

		</ul>
	</nav>
	
	<hr class="below">
	
	<main>
		<div class="grid-container-contact"> 
			<div class="center_item">
				<h2>Configurare produse: Jucării</h2>
				<div class="middletext">
					
					<form method="get"><p>Selectați acțiunea
					<select name='admin_action' onchange='if(this.value != 0) { this.form.submit(); }'>

						<option value='0'>Alege...</option>
        				<option value='1'>Adaugă ofertă</option>
         				<option value='2'>Actualizează produs</option>
         				<option value='3'>Șterge produs</option>
         				<option value='4'>Adaugă produs</option>
				
					</select></p></form>
					

				</div>
				
				<div class="middletext">
					<?php 
   					 if(isset($_GET['admin_action']) ){
       				 $value = $_GET['admin_action'];
					?>
					<?php
    				switch($value){
       				 case "1":
          			?>
					  	<p>Adăugați oferta:</p>
						<form action="admin_functions.php" method="post">

						<label for="product_id">ID-ul produsului:</label>
						<input type="text" id="product_id" name="product_id" class="data"><br>
						<label for="discount">Oferta (în %):</label>
						<input type="text" id="discount" name="discount" class="data"><br>
						<input type="submit" name="add_discount_toy" class="send-bttn">
					</form>
					<?php
       				 break;
        			 case "2":
					?>
						<p>Actualizați produsul:</p>
						<form action="admin_functions.php" method="post">
						<label for="product_id">ID-ul produsului:</label>
						<input type="text" id="product_id" name="product_id" class="data"><br>

						<label for="product_name">Nume produs nou:</label>
						<input type="text" id="product_name" name="product_name" class="data"><br>

						<label for="age">Categoria de vârstă:</label>
						<input type="text" id="age" name="age" class="data"><br>

						<label for="material">Materialul:</label>
						<input type="text" id="material" name="material" class="data"><br>

						<label for="color">Culoarea:</label>
						<input type="text" id="color" name="color" class="data"><br>
						
						<label for="price">Prețul nou:</label>
						<input type="text" id="price" name="price" class="data"><br>

						<label for="description">Descriere nouă:</label>
						<input type="text" id="description" name="description" class="data"><br>

						<label for="picture">Poza nouă:</label>
						<input type="file" id="picture" name="picture" class="data"><br>

						<input type="submit" name="update_toy" class="send-bttn">
					</form>
					<?php
       				 break;
       				 case "3":
       			    ?>
					   	<p>Ștergeți produsul:</p>
						<form action="admin_functions.php" method="post">

						<label for="product_id">ID-ul produsului:</label>
						<input type="text" id="product_id" name="product_id" class="data"><br>

						<input type="submit" name="delete_toy" class="send-bttn">
					</form>
					<?php
       				 break;
       				 case "4":
					?>
						<p>Adăugați produsul:</p>
					 	<form action="admin_functions.php" method="post">
							 
						<label for="product_id">ID-ul produsului:</label>
						<input type="text" id="product_id" name="product_id" class="data"><br>

						<label for="product_name">Nume produs:</label>
						<input type="text" id="product_name" name="product_name" class="data"><br>

						<label for="age">Categoria de vârstă:</label>
						<input type="text" id="age" name="age" class="data"><br>

						<label for="material">Materialul:</label>
						<input type="text" id="material" name="material" class="data"><br>

						<label for="color">Culoarea:</label>
						<input type="text" id="color" name="color" class="data"><br>

						<label for="price">Prețul:</label>
						<input type="text" id="price" name="price" class="data"><br>

						<label for="description">Descriere:</label>
						<input type="text" id="description" name="description" class="data"><br>

						<label for="picture">Selectați o imagine::</label>
						<input type="file" id="picture" name="picture" class="data"><br>

						<input type="submit" name="add_new_toy" class="send-bttn">
					</form> 
					<?php
       				 break;
      				}} ?>
				
				</div>
			</div>
		</div>
	</main>

	<footer>
	</footer>
	
  </body>
</html>