<?php
session_start();

    include("connection.php");
    include("functions.php");
	reset_page_numberB();
	reset_page_numberT();
	reset_selected_queryB();
	reset_selected_queryT();
	$valid_entry = 0;

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
		$valid_entry = 0;

        //something was posted
        $l_name = $_POST['l_name'];
        $f_name = $_POST['f_name'];
        $email = $_POST['email'];
        $text = $_POST['text'];
		$type = $_POST['reason'];
		switch($type)
		{
			case "1": $type = "Nu reușesc să-mi creez un cont"; break;
			case "2": $type = "Mi-am uitat parola"; break;
			case "3": $type = "Nu știu unde e comanda mea"; break;
			case "4": $type = "Aprecieri"; break;
			case "5": $type = "Recomandări"; break;
		}

        //other checks necessary before adding data into database
        if(strpbrk($l_name, '1234567890') == TRUE || strpbrk($f_name, '1234567890') == TRUE)
		{
			$valid_entry = 1; //numele si/sau prenumele invalide
		}
		else if(strpbrk($email, '@') == FALSE)
		{
			$valid_entry = 2;
		}
		else if(!empty($l_name) && !empty($f_name) && !empty($email) && !empty($text))
        {
			try{
				$pdo = new PDO($dsn, $dbuser, $dbpass, $opt);
				$statement = $pdo->prepare("insert into contact (f_name,l_name,email,text,type) values (?,?,?,?,?)");
				$statement->execute(array($_POST['f_name'], $_POST['l_name'], $_POST['email'], $_POST['text'], $type));
			}
			catch(PDOException $e) {
				echo "Eroare: " . $e->getMessage();
				exit;
			}

            header("Location: index.php");
            die;
        }
		else
		{
			$valid_entry = 3;
		}
    }

?>



<!DOCTYPE html>
<html lang="ro">
  <head>
    <meta charset="utf-8">
	<meta name="author1" content="Andrei Rosu">
	<meta name="author2" content="Anton Sfabu">
    <title>OnT - Contact</title>
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
				<h2>Caută-ne la nevoie!</h2>
				<div class="middletext">
					<label>Din ce motiv doriți să ne contactați? (Alegeți un motiv din listă)</label>
					<form method="post">
						<select name="reason" id="reason">
							<optgroup label="Am o problemă">
								<option value='1'>Nu reușesc să-mi creez un cont</option>
								<option value='2'>Mi-am uitat parola</option>
								<option value='3'>Nu știu unde e comanda mea</option>
							</optgroup>
							<optgroup label="Feedback">
								<option value='4'>Aprecieri</option>
								<option value='5'>Recomandări</option>
							</optgroup>
						</select>
				</div>
				
				<div class="middletext">
					<p>Avem nevoie de câteva date din partea dumneavoastră:</p>

					<?php if($valid_entry == 3) : ?>
						<p style="color: #e17a5f;">Vă rugăm să completați toate câmpurile!</p>
					<?php elseif($valid_entry == 2) : ?>
						<p style="color: #e17a5f;">Introduceți o adresă de e-mail validă!</p>
					<?php elseif($valid_entry == 1) : ?>
						<p style="color: #e17a5f;">Introduceți nume și prenume valide!</p>
					<?php endif;?>

						<label for="lname">Nume:</label>
						<input type="text" id="lname" name="l_name" class="data"><br>
						<label for="fname">Prenume:</label>
						<input type="text" id="fname" name="f_name" class="data"><br>
						<label for="email">Adresă e-mail:</label>
						<input type="text" id="email" name="email" size="30" class="data"><br>
						
						<label for="fname"><strong>Mesaj:</strong></label><br>
						<textarea id="msg" name="text" class="msg" cols="100" rows="20" value=""></textarea><br>

						<input type="submit" value="Trimite" class="send-bttn">
					</form>
				</div>
			</div>
		</div>
	</main>

	<footer>
	</footer>
	
  </body>
</html>