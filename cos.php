<?php
session_start();

    $_SESSION;

    include("connection.php");
    include("functions.php");

    $user_data = isLoggedInRedirect($con);
	reset_page_numberB();
	reset_page_numberT();
	reset_selected_queryB();
	reset_selected_queryT();
	$total_price = 0;
	$total_discount = 0;

	$factura = getShoppingCartValue($con,$user_data['id']);
	if($factura != NULL){
		$total_price = $factura[1];
		$total_discount = $factura[2];
	}
	$total =  $total_price-$total_discount;
	if(isset($_POST['address']))
	{
		delete_all_products($con,$user_data['id']);
	}
	if(isset($_POST['button_delete']))
    {
        delete_all_products_cart($con,$user_data['id']);
    }
?>

<!DOCTYPE html>
<html lang="ro">
  <head>
    <meta charset="utf-8">
	<meta name="author1" content="Andrei Rosu">
	<meta name="author2" content="Anton Sfabu">
    <title>OnT - Coșul meu</title>
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
			<li class="nav_bar"><a href="#">Coșul meu</a></li>
			<li class="nav_bar"><a href="./jucarii.php">Jucării</a></li>
			<li class="nav_bar"><a href="./boardgames.php">Boardgames</a></li>
			<li class="nav_bar"><a href="./contact.php">Contact</a></li>

		</ul>
	</nav>
	
	<hr class="below">
	
	<main>
		<div class="grid-container_cos"> 
		
			
			
			<div class="lista_produse">

				<?php
					$query = "SELECT shopping_cart.product_id, boardgames.product_name, price, discount, shopping_cart.sales, picture, shopping_cart.product_table  FROM shopping_cart JOIN boardgames ON boardgames.product_id=shopping_cart.product_id 
					WHERE shopping_cart.id=".$user_data['id']." AND shopping_cart.product_table=1
				UNION
					SELECT shopping_cart.product_id, toys.product_name, price, discount, shopping_cart.sales, picture, shopping_cart.product_table  FROM shopping_cart JOIN toys ON toys.product_id=shopping_cart.product_id 
					WHERE shopping_cart.id=".$user_data['id']." AND shopping_cart.product_table=2 
				ORDER BY price desc";
					$queryResult = mysqli_query($con, $query);
					if($queryResult && mysqli_num_rows($queryResult) > 0){
						$i=0;
						$max = mysqli_num_rows($queryResult);
						while($item = mysqli_fetch_assoc($queryResult)){
							if(!empty($item)){
								$i+=1;
								if($item['product_table'] == 1)
									$table="boardgames";
    							else
									$table="toys";
								$data=
								'<div class="produs_cos">
								<div class="mini_produs" >
									<div class="container_image_text">
										<a href="./item.php?table='.$table.'&id=' . $item['product_id'].'"><img src="Poze/Products/'.nvl($item['picture'],"Basic.jpg"). '" alt="Item" class="item_pic"></a>
										<p class="button_left">'. $item['price']*((100-$item['discount'])/100) . 'RON</p>
										<p class="button_right">Bucati:'.$item['sales'].'</p>
										<a href="./item.php?table='.$table.'&id=' . $item['product_id'] . '"><p class="middletext">' . $item['product_name'] .'</p></a>
									</div>
								</div>
								</div>';
								
								echo $data;
							}
					
						}
						echo '<br style="clear:both" /><br style="clear:both" /><br style="clear:both" />
						<div ><button type="submit" id="delete_cart" class="button_right" value="10">Golește coșul!</button> </div>';
					}
					else echo '<div class="middletext"><p>Nu aveți nimic în coșul dumneavoastră de cumpărături :( </p></div>' ;?>
					
				
			</div>
			
			<div class="date_livrare">
				
				<div class="middletext">
				
					<p>Avem nevoie de câteva detalii pentru comanda dumneavoastră:</p>
					<form name="send_command" method="POST" enctype="multipart/form-data">
					
						<label for="address">Adresa de livrare:</label>
						<input type="text" id="address" name="address" class="data"><br>
						<label for="details">Mai multe detalii adresă (opțional)</label>
						<input type="text" id="details" name="details" size="30" class="data"><br>
						<label for="phone_number">Număr de telefon:</label>
						<input type="text" id="phone_number" name="phone_number" class="data"><br>
						
						<label for="payment_method">Cum doriți să achitați?</label>
						<select name="payment_method" id="payment_method">
							<option>Online card</option>
							<option>Ramburs cash</option>
							<option>Ramburs card</option>
							<option>Crypto</option>
						</select>
						<p>Cheltuieli totale: <?php echo $total_price?></p>
						<p>Ai salvat: <?php echo $total_discount?></p>
						<label for="send_command"><strong>Total: <?php echo $total?></strong></label>
						<input id="send_command" type="submit" value="Trimite comanda" class="send-bttn">
					</form>
					
				</div>
			</div>
			
			<div class="container_previous_button">
				<div></div>
			</div>
			<div class="container_next_button">
				<div></div>
			</div>
			
		</div>
	</main>
	<footer>
		<p></p>
	</footer>
	
	<script>
        document.getElementById("delete_cart").addEventListener('click', deleteCart);

		
		function deleteCart(){

			var button_delete = (this).value;

			var data = 'button_delete='+button_delete; 
			var xhr = new XMLHttpRequest();

			xhr.open("POST", "cos.php");
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhr.send(data);
			console.log(data);
			location.reload();
		}
    </script>

  </body>
</html>