<?php
session_start();

    $_SESSION;

    include("connection.php");
    include("functions.php");

    $user_data = isLoggedInRedirect($con);

?>

<!DOCTYPE html>
<html lang="ro">
  <head>
    <meta charset="utf-8">
	<meta name="author1" content="Andrei Rosu">
	<meta name="author2" content="Anton Sfabu">
    <title>OnT - Coșul meu</title>
	<link rel="stylesheet" href="style.css">
  </head>
  
  <body>
	<header>
		<h1>Online Toys</h1>
	</header>
	
	<hr class="above">
	
	<nav>
		<ul>
			<li class="nav_bar"><a href="./index.php">Acasă</a></li> 
			<li class="nav_bar"><a href="#">Coșul meu</a></li>
			<li class="nav_bar"><a href="./jucarii.php">Jucării</a></li>
			<li class="nav_bar"><a href="./boardgames.php">Boardgames</a></li>
			<li class="nav_bar"><a href="./contact.php">Contact</a></li>

		</ul>
	</nav>
	
	<hr class="below">
	
	<main>
		<div class="grid-container_cos"> 
		
			
			
			<div class="lista_produse">
			
				<div class="produs_cos1">
					<div class="mini_produs" >
					
						<div class="container_image_text">
							<a href="item.html"><img src="Poze/index/carcassonne.jpg" alt="Item" class="item_pic"></a>
							<p class="button_left">150,00 RON</p>
							<a href="#"><p class="button_right">Scoate</p></a>
							<a href="item.html"><p class="middletext">Carcassonne</p></a>
						</div>
						
					</div>
				</div>
				<div class="produs_cos2">
					<div class="mini_produs" >
					
						<div class="container_image_text">
							<a href="item.html"><img src="Poze/index/carcassonne.jpg" alt="Item" class="item_pic"></a>
							<p class="button_left">150,00 RON</p>
							<a href="#"><p class="button_right">Scoate</p></a>
							<a href="item.html"><p class="middletext">Carcassonne</p></a>
						</div>
					
					</div>
				</div>
				<div class="produs_cos3">
					<div class="mini_produs" >
					
						<div class="container_image_text">
							<a href="item.html"><img src="Poze/index/carcassonne.jpg" alt="Item" class="item_pic"></a>
							<p class="button_left">150,00 RON</p>
							<a href="#"><p class="button_right">Scoate</p></a>
							<a href="item.html"><p class="middletext">Carcassonne</p></a>
						</div>
					
					</div>
				</div>
				
			</div>
			
			<div class="date_livrare">
				<div class="middletext">
				
					<p>Avem nevoie de câteva detalii pentru comanda dumneavoastră:</p>
					<form>
					
						<label for="address">Adresa de livrare:</label>
						<input type="text" id="address" name="address" class="data"><br>
						<label for="details">Mai multe detalii adresă (opțional)</label>
						<input type="text" id="details" name="details" size="30" class="data"><br>
						<label for="phone_number">Număr de telefon:</label>
						<input type="text" id="phone_number" name="phone_number" class="data"><br>
						
						<label for="payment_method">Cum doriți să achitați?</label>
						<select name="payment_method" id="payment_method">
							<option>Online card</option>
							<option>Ramburs cash</option>
							<option>Ramburs card</option>
							<option>Crypto</option>
						</select>
						<input type="submit" value="Trimite comanda" class="send-bttn">
					</form>
					<p><strong>Total:</strong></p>
				</div>
			</div>
			
			<div class="container_previous_button">
				<div></div>
			</div>
			<div class="container_next_button">
				<div></div>
			</div>
			
		</div>
	</main>
	<footer>
		<p></p>
	</footer>
	
  </body>
</html>