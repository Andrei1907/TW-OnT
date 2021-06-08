<?php
session_start();

    $_SESSION;

    include("connection.php");
    include("functions.php");

    $user_data = isLoggedIn($con);

	$popular = getMostPopular($con);

	if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $email = $_POST['email'];

		if(!empty($email) && strpbrk($email, '@') == TRUE)
        {
			try{
				$pdo = new PDO($dsn, $dbuser, $dbpass, $opt);
				$statement = $pdo->prepare("INSERT INTO newsletter (email) VALUES (?)");
				$statement->execute(array($_POST['email']));
			}
			catch(PDOException $e) {
				echo "Eroare: " . $e->getMessage();
				exit;
			}

			header("Location: ./index.php");
        }
    }
	reset_page_numberB();
	reset_page_numberT();
	reset_selected_queryB();
	reset_selected_queryT();
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
					<?php 
					if($popular['product_table'] == 1)
						$table="boardgames";
					else
						$table="toys";?>
					<a href="./item.php?table=<?php echo $table;?>&id=<?php echo $popular['product_id']; ?>"><img src="Poze/Products/<?php echo nvl($popular['picture'],"Basic.jpg"); ?>" alt="Item" class="item_pic"></a>
				</div>
			</div>
			
			<div class="left_item_bottom">
				<h3>Abonează-te!</h3>
				<p class="middletext">Introdu-ți adresa de e-mail aici pentru newsletter:</p>
				<form method="post">
					<input type="text" id="email" name="email" size="25"><br>
					
					<input type="submit" name="newsletter" value="Trimite" class="send-bttn" onclick="addNewsletter($con)">
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

				<?php if(!isset($_SESSION['user_id'])) : ?>
				<a class="text_button" href="./login.php">Loghează-te!</a>
				<p class="middletext">Nu ai un cont?</p>
				<a class="text_button" href="./create.php">Creează-ți unul acum!</a>

				<?php elseif($user_data['admin'] == 1) : ?>
				<p class="middletext">Bună, admin <?php echo $user_data['f_name'];?>!</p>
				<a class="text_button" href="./logout.php">Deloghează-te!</a>
				<a class="text_button" href="./adminpages/adminpage.php">Administrare</a>

				<?php else : ?>
				<p class="middletext">Bună, <?php echo $user_data['f_name'];?>!</p>
				<a class="text_button" href="./logout.php">Deloghează-te!</a>
				<?php endif;?>
			</div>
			
		</div>
	</main>
	<footer>
	</footer>
	
  </body>
</html>
