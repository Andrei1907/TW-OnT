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

    $request_id = $_GET['id'];

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $query = "DELETE FROM contact WHERE request_id='$request_id'";
        $run = mysqli_query($con,$query) or die(mysqli_error($con));

        if($run){
            header("Location: ./admin_users.php?admin_action=2");
        }
        else echo "Acțiune nereușită!";
    }

?>



<!DOCTYPE html>
<html lang="ro">
  <head>
    <meta charset="utf-8">
	<meta name="author1" content="Andrei Rosu">
	<meta name="author2" content="Anton Sfabu">
    <title>OnT - Contact</title>
	<link rel="stylesheet" href="../style.css">
  </head>
  
  <body>
	<header>
		<h1>Online Toys</h1>
	</header>
	
	<hr class="above">
	
	<nav>
		<ul>
			<li class="nav_bar"><a href="./index.php">Acasă</a></li>
			<li class="nav_bar"><a href="./cos.php">Coșul meu</a></li>
			<li class="nav_bar"><a href="./jucarii.php">Jucării</a></li>
			<li class="nav_bar"><a href="./boardgames.php">Boardgames</a></li>
			<li class="nav_bar"><a href="#">Contact</a></li>

		</ul>
	</nav>
	
	<hr class="below">
	
	<main>
		<div class="grid-container-contact"> 
			<div class="center_item">
				<h2>Răspunde notificării</h2>
				<div class="middletext">
					
                    <?php
                        $query = "select * from contact where request_id='$request_id' limit 1";
						$queryResult = mysqli_query($con, $query);
						while($notif = mysqli_fetch_assoc($queryResult))
						{
							echo("<p><strong>Notificare</strong>: " . $notif['type'] . "</p>");
							echo("<p>Date personale emițător:
									<ul> <li> Nume: " . $notif['l_name'] . "</li>
									<li> Prenume: " . $notif['f_name'] . "</li>
									<li> Adresă e-mail: " . $notif['email'] . "</li></ul></p>");
							echo("<p>Text: &quot;" . $notif['text'] . "&quot;</p>");
                        }
					?>

					<form method="post">
						<label for="fname"><strong>Răspuns:</strong></label><br>
						<textarea id="msg" name="text" class="msg" cols="100" rows="20" value=""></textarea><br>

						<input type="submit" name="" value="Trimite" class="send-bttn">
					</form>
				</div>
			</div>
		</div>
	</main>

	<footer>
	</footer>
	
  </body>
</html>