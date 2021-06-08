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
				<h2>Gestionare utilizatori</h2>
				<div class="middletext">
					
					<form method="get"><p>Selectați acțiunea
						<select name='admin_action' onchange='if(this.value != 0) { this.form.submit(); }'>

							<option value='0'>Alege...</option>
							<option value='1'>Modifică date utilizator</option>
							<option value='2'>Vizualizează notificări utilizatori</option>
					
						</select></p>
					</form>

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
					  	<p>Actualizați datele utilizatorului:</p>
						<form action="admin_functions.php" method="post" enctype="multipart/form-data">
						<label for="id">ID-ul utilizatorului:</label>
						<input type="text" id="id" name="id" class="data"><br>

						<label for="f_name">Prenume:</label>
						<input type="text" id="f_name" name="f_name" class="data"><br>

						<label for="l_name">Nume:</label>
						<input type="text" id="l_name" name="l_name" class="data"><br>

						<label for="email">Adresă de e-mail:</label>
						<input type="text" id="email" name="email" class="data"><br>

						<input type="submit" name="update_user" class="send-bttn">
					</form>
					<?php
       				 break;
        			 case "2":
						{
							$query = "select * from contact";
							$queryResult = mysqli_query($con, $query);

							echo("<ul>");
							while($notif = mysqli_fetch_assoc($queryResult))
							{
								echo("<li>");
								echo("<p><strong>Notificare</strong>: " . $notif['type'] . "</p>");
								echo("<p>Date personale emițător:
										<ul> <li> Nume: " . $notif['l_name'] . "</li>
										<li> Prenume: " . $notif['f_name'] . "</li>
										<li> Adresă e-mail: " . $notif['email'] . "</li></ul></p>");
								echo("<p>Text: &quot;" . $notif['text'] . "&quot;</p>");
								?>
								
								<a href="./request.php?id=<?php echo $notif['request_id']; ?>" class="middlelink">Răspunde</a><br>
								
								<?php
							}
							echo("</ul>");
						}
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