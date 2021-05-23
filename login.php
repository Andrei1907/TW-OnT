<?php
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($email) && !empty($password))
        {
            //read from the database - does the user exist?
			$pass = md5($password);

            $query = "select * from users where email = '$email' limit 1";

            $queryResult = mysqli_query($con, $query);
            if($queryResult && mysqli_num_rows($queryResult) > 0)
            {
                $user_data = mysqli_fetch_assoc($queryResult);
                if($user_data['password'] === $pass)
                {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }   
            }

            echo "Nu-i bun";
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
			<li class="nav_bar"><a href="./index.php">Home</a></li>
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
				<h2>Ești gata de cumpărături?</h2>
				<div class="middletext_login">
					<form method="post">
						<label for="email">Adresă e-mail:</label>
						<input type="text" name="email" id="email" size="30" class="data"><br>
						<label for="pwd">Parola:</label>
						<input type="password" name="password"  id="pwd"class="data"><br>
                        <input type="checkbox" id="admin" name="admin" value="value">
						<label for="email">Admin</label><br>
						<input type="checkbox" id="remember" name="remember" value="value">
						<label for="email">Ține-mă minte</label><br>

						<input type="submit" value="Loghează-te" class="send-bttn">
					</form>
				</div>
			</div>
		</div>
	</main>

	<footer>
	</footer>
	
  </body>
</html>