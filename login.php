<?php
session_start();

    include("connection.php");
    include("functions.php");

	$valid_entry = 0;

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
		$valid_entry = 0;

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

					if(!empty($_POST['remember_checkbox']))
					{
						//set the cookie
						$remember_checkbox = $_POST['remember_checkbox'];
						setcookie('email', $email, time()+3600*24*7);
						setcookie('password', $password, time()+3600*24*7);
						setcookie('checkbox', $remember_checkbox, time()+3600*24*7);
					}
					else {
						//unset the cookie
						setcookie('email', $email, 30);
						setcookie('password', $password, 30);
						setcookie('checkbox', $remember_checkbox, 30);
					}

                    header("Location: index.php");
                    die;
                }
				else
				{
					$valid_entry = 1;
				}
            }
			else if(mysqli_num_rows($queryResult) == 0)
			{
				$valid_entry = 1;
			}
        }
		else
		{
			$valid_entry = 2;
		}
    }

?>

<!DOCTYPE html>
<html lang="ro">
  <head>
    <meta charset="utf-8">
	<meta name="author1" content="Andrei Rosu">
	<meta name="author2" content="Anton Sfabu">
    <title>OnT - Logare</title>
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
					<?php if($valid_entry == 2) : ?>
						<p style="color: #e17a5f;">Vă rugăm să completați toate câmpurile!</p>
					<?php elseif($valid_entry == 1) : ?>
						<p style="color: #e17a5f;">Asocierea e-mail - parolă invalidă!</p>
					<?php endif;?>

					<form method="post">
						<label for="email">Adresă e-mail:</label>
						<input type="text" name="email" id="email" size="30" class="data" requiered value="<?php if(isset($_COOKIE['email'])){ echo $_COOKIE['email'];};?>"><br>
						<label for="pwd">Parola:</label>
						<input type="password" name="password" id="pwd" class="data" requiered value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password'];};?>"><br>
						<input type="checkbox" id="remember" name="remember_checkbox" <?php if(isset($_COOKIE['checkbox'])){ echo "checked";};?>>
						<label for="remember">Ține-mă minte</label><br>

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