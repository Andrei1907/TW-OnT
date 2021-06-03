<?php
session_start();
	$_SESSION;
	include("connection.php");
	include("functions.php");
	reset_page_numberT();
	reset_selected_queryT();
	$page_content = 1;
	if(isset($_SESSION['$page_numberB']))
	{
		$page_number = $_SESSION['$page_numberB'];
	}
	else{
		$page_number = 1;
	}
	if(!isset($_SESSION['$selected_queryB']))
	{
		$_SESSION['$selected_queryB'] = 1;
	}
	if(1){
		reset_page_numberB();
		$selected_query = make_query(1);
		if($selected_query != NULL)
			$_SESSION['$selected_queryB'] = $selected_query;
		$product_array = set_6_products(6,($page_number-1)*6,1,1,$con, $_SESSION['$selected_queryB']);
	}
	if(isset($_POST['previous_button'])){
		$page_number = $page_number - 1;
		if($page_number <= 0)
			$page_number = 1;
		$product_array = set_6_products(6,($page_number-1)*6,1,1,$con,$_SESSION['$selected_queryB']);
		$_SESSION['$page_numberB'] = $page_number;
	}
	if(isset($_POST['next_button'])){
		$page_number = $page_number + 1;
		$product_array = set_6_products(6,($page_number-1)*6,1,1,$con,$_SESSION['$selected_queryB']);
		if($product_array == NULL)
			$page_number = $page_number - 1;
		$product_array = set_6_products(6,($page_number-1)*6,1,1,$con,$_SESSION['$selected_queryB']);
		$_SESSION['$page_numberB'] = $page_number;
	}
	if($product_array == NULL)
		$page_content=0;

?>

<!DOCTYPE html>
<html lang="ro">
  <head>
    <meta charset="utf-8">
	<meta name="author1" content="Andrei Rosu">
	<meta name="author2" content="Anton Sfabu">
    <title>OnT - Boardgames</title>
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
			<li class="nav_bar"><a href="#">Boardgames</a></li>
			<li class="nav_bar"><a href="./contact.php">Contact</a></li>

		</ul>
	</nav>
	
	<hr class="below">
	
	<main>
		<div class="grid-container_produse"> 
			
			<div class="search">
				<h2>Opțiuni</h2>
				
				<div class="scroll_checkbox">
				<td id = filter><form name="filter" method="POST" enctype="multipart/form-data">
					<p class="middletext">Vârstă</p>
					<div class="checkbox_block">
						<input type="checkbox" id="age6" name="age6">
						<label for="age6">peste 6 ani</label><br>
						<input type="checkbox" id="age10" name="age10">
						<label for="age10">peste 10 ani</label><br>
						<input type="checkbox" id="age14" name="age14">
						<label for="age14">peste 14 ani</label><br>
						<input type="checkbox" id="age18" name="age18">
						<label for="age18">peste 18 ani</label><br>
					</div>
					<p class="middletext">Tip</p>
					<div class="checkbox_block">
						<input type="checkbox" id="gen_strategy" name="gen_strategy" value="value">
						<label for="gen_strategy">strategie</label><br>
						<input type="checkbox" id="gen_luck" name="gen_luck" value="value">
						<label for="gen_luck">noroc</label><br>
						<input type="checkbox" id="gen_coop" name="gen_coop" value="value">
						<label for="gen_coop">cooperare</label><br>
						<input type="checkbox" id="gen_cards" name="gen_cards" value="value">
						<label for="gen_cards">joc de carți</label><br>
						<input type="checkbox" id="gen_war" name="gen_war" value="value">
						<label for="gen_war">joc de război</label><br>
					</div>
					<p class="middletext">Număr de jucători</p>
					<div class="checkbox_block">
						<input type="checkbox" id="number_players_2" name="number_players_2" value="value">
						<label for="number_players_2">1-2 jucători</label><br>
						<input type="checkbox" id="number_players_4" name="number_players_4" value="value">
						<label for="number_players_4">2-4 jucători</label><br>
						<input type="checkbox" id="number_players_6" name="number_players_6" value="value">
						<label for="number_players_6">2-6 jucători</label><br>
						<input type="checkbox" id="number_players_10" name="number_players_10" value="value">
						<label for="number_players_10">2-10 jucători</label><br>
					</div>
					<input type="submit" class="send-bttn">
				</form></td>
				</div>
			
			</div>		
			
			<div class="lista_produse">
			
				<div class="produs1">
					<div class="mini_produs" >

						<div class="container_image_text">
							<?php if($page_content != 1) : 
								  elseif($product_array[1]!=0) :?>
							<a href="item.html"><img src="Poze/Products/<?php echo nvl($product_array[1]['picture'],"Basic.jpg"); ?>" alt="Item" class="item_pic"></a>
							<p class="button_left"><?php echo $product_array[1]['price']*((100-$product_array[1]['discount'])/100); ?> RON</p>
							<a href="#"><p class="button_right">Adaugă în coș</p></a>
							<a href="item.html"><p class="middletext"><?php echo $product_array[1]['product_name']; ?></p></a>
							<?php endif;?>
						</div>
						
					</div>
				</div>
				<div class="produs2">
					<div class="mini_produs" >
	
						<div class="container_image_text">
							<?php if($page_content != 1) : 
								  elseif($product_array[2]!=0) :?>
							<a href="item.html"><img src="Poze/Products/<?php echo nvl($product_array[2]['picture'],"Basic.jpg"); ?>" alt="Item" class="item_pic"></a>
							<p class="button_left"><?php echo $product_array[2]['price']*((100-$product_array[2]['discount'])/100); ?> RON</p>
							<a href="#"><p class="button_right">Adaugă în coș</p></a>
							<a href="item.html"><p class="middletext"><?php echo $product_array[2]['product_name']; ?></p></a>
							<?php endif;?>
						</div>
					
					</div>
				</div>
				<div class="produs3">
					<div class="mini_produs" >
						
						<div class="container_image_text">
							<?php if($page_content != 1) : 
								  elseif($product_array[3]!=0) :?>
							<a href="item.html"><img src="Poze/Products/<?php echo nvl($product_array[3]['picture'],"Basic.jpg"); ?>" alt="Item" class="item_pic"></a>
							<p class="button_left"><?php echo $product_array[3]['price']*((100-$product_array[3]['discount'])/100); ?> RON</p>
							<a href="#"><p class="button_right">Adaugă în coș</p></a>
							<a href="item.html"><p class="middletext"><?php echo $product_array[3]['product_name']; ?></p></a>
							<?php endif;?>
						</div>
					
					</div>
				</div>
				<div class="produs4">
					<div class="mini_produs" >
						
						<div id="product" class="container_image_text">
							<?php if($page_content != 1) : 
								  elseif($product_array[4]!=0) :?>
							<a href="item.html"><img src="Poze/Products/<?php echo nvl($product_array[4]['picture'],"Basic.jpg"); ?>" alt="Item" class="item_pic"></a>
							<p class="button_left"><?php echo $product_array[4]['price']*((100-$product_array[4]['discount'])/100); ?> RON</p>
							<a href="#"><p class="button_right">Adaugă în coș</p></a>
							<a href="item.html"><p class="middletext"><?php echo $product_array[4]['product_name']; ?></p></a>
							<?php endif;?>
						</div>
					
					</div>
				</div>
				<div class="produs5">
					<div class="mini_produs" >

						<div class="container_image_text">
							<?php if($page_content != 1) : 
								  elseif($product_array[5]!=0) :?>
							<a href="item.html"><img src="Poze/Products/<?php echo nvl($product_array[5]['picture'],"Basic.jpg"); ?>" alt="Item" class="item_pic"></a>
							<p class="button_left"><?php echo $product_array[5]['price']*((100-$product_array[5]['discount'])/100); ?> RON</p>
							<a href="#"><p class="button_right">Adaugă în coș</p></a>
							<a href="item.html"><p class="middletext"><?php echo $product_array[5]['product_name']; ?></p></a>
							<?php endif;?>
						</div>
					
					</div>
				</div>
				<div class="produs6">
					<div class="mini_produs" >
					
						<div class="container_image_text">
							<?php if($page_content != 1) : 
								  elseif($product_array[6]!=0) :?>
							<a href="item.html"><img src="Poze/Products/<?php echo nvl($product_array[6]['picture'],"Basic.jpg"); ?>" alt="Item" class="item_pic"></a>
							<p class="button_left"><?php echo $product_array[6]['price']*((100-$product_array[6]['discount'])/100); ?> RON</p>
							<a href="#"><p class="button_right">Adaugă în coș</p></a>
							<a href="item.html"><p class="middletext"><?php echo $product_array[6]['product_name']; ?></p></a>
							<?php endif;?>
						</div>
					
					</div>
				</div>
				
			</div>
			
			<div class="container_previous_button">
				<div><td id = previous_button><form name="previous_button" method="POST" ><input type='hidden' name='previous_button' value='1' /><input type="submit" value="<"></form></td></div>
			</div>
			<div class="container_next_button">
				<div><td id = next_button><form name="next_button" method="POST" ><input type='hidden' name='next_button' value='1' /><input type="submit" value=">"></form></td></div>
			</div>
			
		</div>
	</main>
	<footer>
	</footer>
	
  </body>
</html>