<?php
	session_start();

	include("connection.php");
	include("functions.php");
	reset_page_numberB();
	reset_page_numberT();
	reset_selected_queryB();
	reset_selected_queryT();
	$table = $_GET['table'];
	if($table == 'boardgames')
		$table_value = 1;
	else $table_value = 2;
	$product_id = $_GET['id'];

	$query = "select * from $table where product_id='$product_id' limit 1";
	$queryResult = mysqli_query($con, $query);

	if($queryResult && mysqli_num_rows($queryResult) > 0)
        $product_data = mysqli_fetch_assoc($queryResult);
?>

<!DOCTYPE html>
<html lang="ro">
  <head>
    <meta charset="utf-8">
	<meta name="author1" content="Andrei Rosu">
	<meta name="author2" content="Anton Sfabu">
    <title>OnT - <?php echo $product_data['product_name']; ?></title>
	<link rel="stylesheet" href="./style.css">
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
		<div class="grid-container-item"> 
		
			<div class="only_left_item">
				<div class="container_image_text">
				<img src="Poze/Products/<?php echo nvl($product_data['picture'],"Basic.jpg"); ?>" alt="Item" class="item_pic">
					<p class="button_left"><?php echo $product_data['price']*((100-$product_data['discount'])/100); ?> RON</p>
					<button type="submit" id="adaugare_cos" class="button_right" value='1'>Adaugă în coș</button>
				</div>
			</div>
			
			<div class="only_right_item">
				<h2 id="prod_name"><?php echo $product_data['product_name']; ?></h2>
				<hr class="between">
					<div class="middletext">
						<ul id="taglist">
							<?php if($table == 'boardgames') :

								$types = $product_data['type'];
								$pieces = explode(",", $types);
								foreach($pieces as $i)
									echo "<li class='category1'>$i</li>";
								?>
								<li class="category2"><?php echo $product_data['age']; ?> ani</li>
								<li class="category3"><?php echo $product_data['number_players']; ?> jucători</li>
							<?php else : ?>
								
								<li class="category1"><?php echo $product_data['age']; ?></li>
								<?php 
								$colors = $product_data['color'];
								$pieces = explode(",", $colors);
								foreach($pieces as $i)
									echo "<li class='category2'>$i</li>";
								?>
								
								<li class="category3"><?php echo $product_data['material']; ?></li>
							<?php endif; ?>
						</ul>
					</div>
				<hr class="between">
				<div class="item_description">
					<div class="middletext">
						<?php echo $product_data['description']; ?>
					</div>
				</div>
			</div>
			
		</div>
	</main>
	<footer>
	</footer>
	
	<script>
        document.getElementById("adaugare_cos").addEventListener('click', loadProduct);
		
		function loadProduct(){

			var product_number = (this).value;
			var product_table = <?php echo $table_value;?>;
			var product1_id = <?php echo nvl($product_data['product_id'],0);?>;

			var data = 'product1_id='+product1_id+'&product_number='+product_number+'&product_table='+product_table; 
			console.log(data);
			var xhr = new XMLHttpRequest();

			xhr.open("POST", "ajax.php");
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhr.send(data);
			console.log(data);
		}
    </script>

  </body>
</html>