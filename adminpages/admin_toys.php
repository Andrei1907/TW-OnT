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
	<div class="grid-container_adminpage"> 
			
			<div class="admin_left_top">
				<div class="button_admin_toys">
					<div class="container_image_text">
						
					<p>Modifică la categoria jucării</p>
					<a href="admin_toys.php"><p class="center_text_index">JUCĂRII</p></a>
					
				</div>
				</div>

			</div>

			<div class="admin_left_bottom">
				<div class="button_admin_boardgames">
				<div class="container_image_text">
					
					<p>Modifică la categoria boardgames</p>
					<a href="admin_boardgames.php"><p class="center_text_index">BOARDGAMES</p></a>

				</div>
				</div>

			</div>

			<div class="admin_right_top">
				<div class="button_admin_user">
				<div class="container_image_text">
					
					<p>Configureaza utilizatori</p>
					<a href="admin_users.php"><p class="center_text_index">USERI</p></a>

				</div>
				</div>

			</div>

			<div class="admin_right_bottom">
				<div class="button_admin_statistics">
				<div class="container_image_text">

					<p>Vezi statistici</p>
					<a href="admin_statistics.php"><p class="center_text_index">STATISTICI</p></a>
				
				</div>
				</div>

			</div>
			

			
			
		</div>
	</main>

	<footer>
	</footer>
	
  </body>
</html>