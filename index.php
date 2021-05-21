<?php
session_start();

    $_SESSION;

    include("connection.php");
    include("functions.php");

    $user_data = isLoggedIn($con);

?>

<!DOCTYPE html>
<html lang="ro">
  <head>
    <meta charset="utf-8">
	<meta name="author1" content="Andrei Rosu">
	<meta name="author2" content="Anton Sfabu">
    <title>OnT - Acasă</title>
	<link rel="stylesheet" href="style.css">
  </head>
  
  <body>
	<header>
		<h1>Online Toys</h1>
	</header>
	
	<hr class="above">
	
	<nav>
		<ul>
			<li class="nav_bar"><a href="#">Acasă</a></li>
			<li class="nav_bar"><a href="./clasament.php">Clasament</a></li>
			<li class="nav_bar"><a href="./cos.php">Coșul meu</a></li>
			<li class="nav_bar"><a href="./contact.php">Contact</a></li>
			<li class="nav_bar"><a href="./report.php">Raport</a></li>

		</ul>
	</nav>
	
	<hr class="below">
	
	<main>
		<div class="grid-container-index"> 
		
			<div class="left_item_top">
				<h3>Articolul favorit</h3>
				<div class="container_image_text">
					<a href="item.php"><img src="Poze/index/carcassonne.jpg" alt="Item" class="item_pic"></a>
					<a href="#"><p class="button_right">Adaugă în coș</p></a>
				</div>
			</div>
			
			<div class="left_item_bottom">
				<h3>Abonează-te!</h3>
				<p class="middletext">Introdu-ți adresa de e-mail aici pentru newsletter:</p>
				<form>
					<input type="text" id="email" name="email" size="25"><br>
					
					<input type="submit" value="Trimite" class="send-bttn">
				</form>
			</div>
		
			<div class="center_left_item">
				<div class="container_image_text">
					<!--<img src="Poze/index/jucarii.png" alt="Jucarii" width=100% height=100%>-->
					<a href="jucarii.php"><p class="center_text_index">JUCĂRII</p></a>
				</div>
			</div>
		
			<div class="center_right_item">
				<div class="container_image_text">
					<!--<img src="Poze/index/boardgames_index.jpg" alt="Jocuri" width=100% height=100%;>-->
					<a href="boardgames.php"><p class="center_text_index">BOARDGAMES</p></a>
				</div>
			</div>
			
			<div class="right_item">
				<p class="middletext">Ești gata să îți mărești colecția de jocuri și jucării?<br>Începe cumpărăturile acum!</p>
				<hr class="below">
				<a class="text_button" href="./login.php">Loghează-te!</a>
				<p class="middletext">Nu ai un cont?</p>
				<a class="text_button" href="./create.php">Creează-ți unul acum!</a>
                <hr class="below">
				<p class="middletext">Bună, <?php echo $user_data['f_name'];?>!</p>
                <a class="text_button" href="./logout.php">Deloghează-te!</a>
			</div>
			
		</div>
	</main>
	<footer>
	</footer>
	
  </body>
</html>