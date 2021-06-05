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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  
  <body>
	<header>
		<h1>Online Toys</h1>
	</header>
	
	<hr class="above">
	
	<nav>
		<ul>
			<li class="nav_bar"><a href="../index.php">Acasă</a></li>
			<li class="nav_bar"><a href="./adminpage.php">Administrare</a></li>
		</ul>
	</nav>
	
	<hr class="below">
	
	<main>
		<div class="grid-container-contact"> 
			<div class="center_item">
				<h2>Configurare produse: Boardgames</h2>
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
                        <div id="product_list"> </div>

						<label for="discount">Oferta (în %):</label>
						<input type="text" id="discount" name="discount" class="data"><br>
						<input type="submit" name="add_discount_boardgames" class="send-bttn">
					</form>
					<?php
       				 break;
        			 case "2":
					?>
						<p>Actualizați produsul:</p>
						<form action="admin_functions.php" method="post" enctype="multipart/form-data">
						<label for="product_id">ID-ul produsului:</label>
						<input type="text" id="product_id" name="product_id" class="data"><br>
                        <div id="product_list"> </div>

						<label for="product_name">Nume produs nou:</label>
						<input type="text" id="product_name" name="product_name" class="data"><br>

						<label for="age">Categoria de vârstă:</label>
						<select name='age'>
							<option value="0">Alege...</option>
        					<option value="1">6+</option>
         					<option value="2">10+</option>
         					<option value="3">14+</option>
         					<option value="4">18+</option>
						</select><br>

						<label for="type">Tipul:</label>
						<input type="text" id="type" name="type" class="data"><br>

						<label for="number_players">Numarul de jucători:</label>
						<input type="text" id="number_players" name="number_players" class="data"><br>
						
						<label for="price">Prețul nou:</label>
						<input type="text" id="price" name="price" class="data"><br>

						<label for="description">Descriere nouă:</label>
						<input type="text" id="description" name="description" class="data"><br>

						<label for="picture">Poza nouă:</label>
						<input type="file" id="picture" name="picture" class="data"><br>

						<input type="submit" name="update_boardgames" class="send-bttn">
					</form>
					<?php
       				 break;
       				 case "3":
       			    ?>
					   	<p>Ștergeți produsul:</p>
						<form action="admin_functions.php" method="post">

						<label for="product_id">ID-ul produsului:</label>
						<input type="text" id="product_id" name="product_id" class="data"><br>
                        <div id="product_list"> </div>

						<input type="submit" name="delete_boardgames" class="send-bttn">
					</form>
					<?php
       				 break;
       				 case "4":
					?>
						<p>Adăugați produsul:</p>
					 	<form action="admin_functions.php" method="post" enctype="multipart/form-data">
							 
						<label for="product_id_add">ID-ul produsului:</label>
						<input type="text" id="product_id_add" name="product_id_add" class="data">
                        <label for="product_id_add" id="response"></label><br>
           

						<label for="product_name">Nume produs:</label>
						<input type="text" id="product_name" name="product_name" class="data"><br>
						
						<label for="age">Categoria de vârstă:</label>
						<select name='age'>
							<option value="0">Alege...</option>
        					<option value="1">6+</option>
         					<option value="2">10+</option>
         					<option value="3">14+</option>
         					<option value="4">18+</option>
						</select><br>

						<label for="type">Tipul:</label>
						<input type="text" id="type" name="type" class="data"><br>

						<label for="number_players">Numarul de jucători:</label>
						<input type="text" id="number_players" name="number_players" class="data"><br>

						<label for="price">Prețul:</label>
						<input type="text" id="price" name="price" class="data"><br>

						<label for="description">Descriere:</label>
						<input type="text" id="description" name="description" class="data"><br>

						<label for="picture">Selectați o imagine:</label>
						<input type="file" id="picture" name="picture" class="data"><br>

						<input type="submit" name="add_new_boardgames" class="send-bttn">
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

<script>
$(document).ready(function(){
    $('#product_id').keyup(function(){
        var query = $(this).val();
        if(query !='')
        {
            $.ajax({
                url:"admin_functions.php",
                method:"POST",
                data:{query:query,table:1},
                success:function(data)
                {
                    $('#product_list').fadeIn();
                    $('#product_list').html(data);
                }
            })
        }
    })
    ,
    $('#product_id_add').keyup(function(){
        var query_add = $(this).val();
        if(query_add !='')
        {
            $.ajax({
                url:"admin_functions.php",
                method:"POST",
                data:{query_add:query_add,table:1},
                success:function(data)
                {
                    $('#response').fadeIn();
                    $('#response').html(data);
                }
            })
        }
    })
})
</script>