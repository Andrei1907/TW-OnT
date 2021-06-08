<?php
session_start();

    include("connection.php");
    include("functions.php");

	$valid_entry = 0;

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
		$valid_entry = 0;

        //something was posted
        $l_name = $_POST['l_name'];
        $f_name = $_POST['f_name'];
        $email = $_POST['email'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];

		//is there an account with this email already in our database?
		try{
			$pdo = new PDO($dsn, $dbuser, $dbpass, $opt);
			$statement = $pdo->prepare("select * from users where email = ? limit 1");
			$statement->execute(array($_POST['email']));
		}
		catch(PDOException $e) {
			echo "Eroare: " . $e->getMessage();
			exit;
		}

		if($statement && $statement->rowCount() > 0)
		{
			$valid_entry = 4;
		}
        //other checks necessary before adding data into database
        else if(strpbrk($l_name, '1234567890') == TRUE || strpbrk($f_name, '1234567890') == TRUE)
		{
			$valid_entry = 1;
		}
		else if(strpbrk($email, '@') == FALSE)
		{
			$valid_entry = 2;
		}
		else if($password1 != $password2)
		{
			$valid_entry = 3;
		}
		else if(!empty($l_name) && !empty($f_name) && !empty($email) && !empty($password1) && !empty($password2))
        {
            $user_id = genRand(20);
			$pass = md5($password1);

			try{
				$pdo = new PDO($dsn, $dbuser, $dbpass, $opt);
				$statement = $pdo->prepare("insert into users (user_id,f_name,l_name,email,password) values (?,?,?,?,?)");
				$statement->execute(array($user_id, $_POST['f_name'], $_POST['l_name'], $_POST['email'], $pass));
			}
			catch(PDOException $e) {
				echo "Eroare: " . $e->getMessage();
				exit;
			}

            header("Location: login.php");
            die;
        }
		else
		{
			$valid_entry = 5;
		}
    }

?>



<!DOCTYPE html>
<html lang="ro">
  <head>
    <meta charset="utf-8">
	<meta name="author1" content="Andrei Rosu">
	<meta name="author2" content="Anton Sfabu">
    <title>OnT - Creare cont</title>
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
			<li class="nav_bar"><a href="./contact.php">Contact</a></li>

		</ul>
	</nav>
	
	<hr class="below">
	
	<main>
		<div class="grid-container-contact"> 
			<div class="center_item">
				<h2>Hai să facem un cont personal!</h2>
				<div class="middletext" style="margin-bottom:50px;">
					<p>Nu durează mult. Vă rugăm să completați câmpurile următoare cu datele necesare.</p>

					<div class="warning">
						<?php if($valid_entry == 5) : ?>
							<p>Vă rugăm să completați toate câmpurile!</p>
						<?php elseif($valid_entry == 4) : ?>
							<p>Există deja un cont asociat cu această adresă de e-mail!</p>
						<?php elseif($valid_entry == 1) : ?>
							<p>Introduceți nume și prenume valide!</p>
						<?php elseif($valid_entry == 2) : ?>
							<p>Introduceți o adresă de e-mail validă!</p>
						<?php elseif($valid_entry == 3) : ?>
							<p>Introduceți aceeași parolă de două ori!</p>
						<?php endif;?>
					</div>

					<form method="post">
						<label>Nume:</label>
						<input type="text" name="l_name" id="fname" class="data"><br>
						<label>Prenume:</label>
						<input type="text" name="f_name" id="lname" class="data"><br>
						<label>Adresă e-mail:</label>
						<input type="text" name="email" id="email" size="30" class="data"><br>
						<label>Parola:</label>
						<input type="password" name="password1" class="data"><br>
                        <label>Parola (din nou):</label>
						<input type="password" name="password2" class="data"><br>

						<input type="submit" value="Creează contul" class="send-bttn">
					</form>
				</div>
			</div>
		</div>
	</main>

	<footer>
	</footer>
	
  </body>
</html>