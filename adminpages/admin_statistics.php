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
			<li class="nav_bar"><a href="./adminpage.php">Administrare</a></li>
		</ul>
	</nav>
	
	<hr class="below">
	
	<main>
		<div class="grid-container-contact"> 
			<div class="center_item">
				<h2>Statistici - vizualizare/export</h2>
				
				<div class="middletext">
					Pentru categoria și formatul dorit, selectați opțiunea: vizualizare sau export propriu-zis al clasamentului produselor noastre.
				</div><br>

				<div class="below">

				<h3>Jucării</h3>
				<div class="middletext">
					<form method="post" action="export.php">
						<p>CSV:
						<input type="submit" name="download-csvt" value="Descarcă">
						</p>
					</form>
					
					<form method="post" action="export.php">
						<p>WebP:
						<input type="submit" name="view-webpt" value="Vizualizează">
						|
						<input type="submit" name="download-webpt" value="Descarcă">
						</p>
					</form>
					
					<form method="post" action="export.php">
						<p>PDF:
						<input type="submit" name="view-pdft" value="Vizualizează">
						|
						<input type="submit" name="download-pdft" value="Descarcă">
						</p>
					</form>
				</div>

				<h3>Boardgames</h3>
				<div class="middletext">
					<form method="post" action="export.php">
						<p>CSV:
						<input type="submit" name="download-csvb" value="Descarcă">
						</p>
					</form>
					
					<form method="post" action="export.php">
						<p>WebP:
						<input type="submit" name="view-webpb" value="Vizualizează">
						|
						<input type="submit" name="download-webpb" value="Descarcă">
						</p>
					</form>
					
					<form method="post" action="export.php">
						<p>PDF:
						<input type="submit" name="view-pdfb" value="Vizualizează">
						|
						<input type="submit" name="download-pdfb" value="Descarcă">
						</p>
					</form>
					<br>
				</div>
			</div>
		</div>
	</main>

	<footer>
	</footer>
	
  </body>
</html>