<?php
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $l_name = $_POST['l_name'];
        $f_name = $_POST['f_name'];
        $email = $_POST['email'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];

        //checks necessary to add data into database (like pass1==pass2, first name and last name contain no digits, etc)
        if(!empty($l_name) && !empty($f_name) && !empty($email) && !empty($password1) && !empty($password2))
        {
            $user_id = genRand(20);
            $query = "insert into users (user_id,f_name,l_name,email,password) values ('$user_id','$f_name','$l_name','$email','$password1')";

            mysqli_query($con, $query);
            
            header("Location: login.php");
            die;
        }
        else{
            //a message to warn the user about invalid info
            echo "Nu-i bun";
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