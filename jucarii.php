<?php
session_start();
	$_SESSION;
	include("connection.php");
	include("functions.php");
	reset_page_numberB();
	reset_selected_queryB();
	$page_content = 1;
	if(isset($_SESSION['$page_numberT']))
	{
		$page_number = $_SESSION['$page_numberT'];
	}
	else{
		$page_number = 1;
	}
	if(!isset($_SESSION['$selected_queryT']))
	{
		$_SESSION['$selected_queryT'] = 1;
	}
	if(1){
		reset_page_numberT();
		$selected_query = make_query(2);
		if($selected_query != NULL)
			$_SESSION['$selected_queryT'] = $selected_query;
		$product_array = set_6_products(6,($page_number-1)*6,2,1,$con, $_SESSION['$selected_queryT']);
	}
	if(isset($_POST['previous_button'])){
		$page_number = $page_number - 1;
		if($page_number <= 0)
			$page_number = 1;
		$product_array = set_6_products(6,($page_number-1)*6,2,1,$con, $_SESSION['$selected_queryT']);
		$_SESSION['$page_numberT'] = $page_number;
	}
	if(isset($_POST['next_button'])){
		$page_number = $page_number + 1;
		$product_array = set_6_products(6,($page_number-1)*6,2,1,$con, $_SESSION['$selected_queryT']);
		if($product_array == NULL)
			$page_number = $page_number - 1;
		$product_array = set_6_products(6,($page_number-1)*6,2,1,$con, $_SESSION['$selected_queryT']);
		$_SESSION['$page_numberT'] = $page_number;
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
    <title>OnT - Jucării</title>
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
			<li class="nav_bar"><a href="#">Jucării</a></li>
			<li class="nav_bar"><a href="./boardgames.php">Boardgames</a></li>
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
					<p class="middletext">Categorie de vârstă</p>
					<div class="checkbox_block">
						<input type="checkbox" id="age_small" name="age_small" value="value">
						<label for="age_small">sugari</label><br>
						<input type="checkbox" id="age_child" name="age_child" value="value">
						<label for="age_child">copii</label><br>
						<input type="checkbox" id="age_teen" name="age_teen" value="value">
						<label for="age_teen">adolescenți</label><br>
					</div>
					<p class="middletext">Material</p>
					<div class="checkbox_block">
						<input type="checkbox" id="material_metal" name="material_metal" value="value">
						<label for="material_metal">metal</label><br>
						<input type="checkbox" id="material_plastic" name="material_plastic" value="value">
						<label for="material_plastic">plastic</label><br>
						<input type="checkbox" id="material_plus" name="material_plus" value="value">
						<label for="material_plus">pluș</label><br>
						<input type="checkbox" id="material_lemn" name="material_lemn" value="value">
						<label for="material_lemn">lemn</label><br>
					</div>
					<p class="middletext">Culoare</p>
					<div class="checkbox_block">
						<input type="checkbox" id="cul_rosu" name="cul_rosu" value="value">
						<label for="cul_rosu">roșu</label><br>
						<input type="checkbox" id="cul_albastru" name="cul_albastru" value="value">
						<label for="cul_albastru">albastru</label><br>
						<input type="checkbox" id="cul_verde" name="cul_verde" value="value">
						<label for="cul_verde">verde</label><br>
						<input type="checkbox" id="cul_galben" name="cul_galben" value="value">
						<label for="cul_galben">galben</label><br>
						<input type="checkbox" id="cul_roz" name="cul_roz" value="value">
						<label for="cul_roz">roz</label><br>
						<input type="checkbox" id="cul_portocaliu" name="cul_portocaliu" value="value">
						<label for="cul_portocaliu">portocaliu</label><br>
					</div>
					<input type="submit" value="Filtrează" class="send-bttn">
					</form></td>
				</div>
			</div>		
			<div class="lista_produse">
			
				<div class="produs1">
					<div class="mini_produs" >

						<div class="container_image_text">
							<?php if($page_content != 1) : 
								  elseif($product_array[1]!=0) :?>
							<a href="./item.php?table=toys&id=<?php echo $product_array[1]['product_id']; ?>"><img src="Poze/Products/<?php echo nvl($product_array[1]['picture'],"Basic.jpg"); ?>" alt="Item" class="item_pic"></a>
							<p class="button_left"><?php echo $product_array[1]['price']*((100-$product_array[1]['discount'])/100); ?> RON</p>
							<button type="submit" id="adaugare_cos1" class="button_right" value='1'>Adaugă în coș</button>
							<a href="./item.php?table=toys&id=<?php echo $product_array[1]['product_id']; ?>"><p class="middletext"><?php echo $product_array[1]['product_name']; ?></p></a>
							<?php endif;?>
						</div>
						
					</div>
				</div>
				<div class="produs2">
					<div class="mini_produs" >
	
						<div class="container_image_text">
							<?php if($page_content != 1) : 
								  elseif($product_array[2]!=0) :?>
							<a href="./item.php?table=toys&id=<?php echo $product_array[2]['product_id']; ?>"><img src="Poze/Products/<?php echo nvl($product_array[2]['picture'],"Basic.jpg"); ?>" alt="Item" class="item_pic"></a>
							<p class="button_left"><?php echo $product_array[2]['price']*((100-$product_array[2]['discount'])/100); ?> RON</p>
							<button type="submit" id="adaugare_cos2" class="button_right" value='2'>Adaugă în coș</button>
							<a href="./item.php?table=toys&id=<?php echo $product_array[2]['product_id']; ?>"><p class="middletext"><?php echo $product_array[2]['product_name']; ?></p></a>
							<?php endif;?>
						</div>
					
					</div>
				</div>
				<div class="produs3">
					<div class="mini_produs" >
						
						<div class="container_image_text">
							<?php if($page_content != 1) : 
								  elseif($product_array[3]!=0) :?>
							<a href="./item.php?table=toys&id=<?php echo $product_array[3]['product_id']; ?>"><img src="Poze/Products/<?php echo nvl($product_array[3]['picture'],"Basic.jpg"); ?>" alt="Item" class="item_pic"></a>
							<p class="button_left"><?php echo $product_array[3]['price']*((100-$product_array[3]['discount'])/100); ?> RON</p>
							<button type="submit" id="adaugare_cos3" class="button_right" value='3'>Adaugă în coș</button>
							<a href="./item.php?table=toys&id=<?php echo $product_array[3]['product_id']; ?>"><p class="middletext"><?php echo $product_array[3]['product_name']; ?></p></a>
							<?php endif;?>
						</div>
					
					</div>
				</div>
				<div class="produs4">
					<div class="mini_produs" >
						
						<div id="product" class="container_image_text">
							<?php if($page_content != 1) : 
								  elseif($product_array[4]!=0) :?>
							<a href="./item.php?table=toys&id=<?php echo $product_array[4]['product_id']; ?>"><img src="Poze/Products/<?php echo nvl($product_array[4]['picture'],"Basic.jpg"); ?>" alt="Item" class="item_pic"></a>
							<p class="button_left"><?php echo $product_array[4]['price']*((100-$product_array[4]['discount'])/100); ?> RON</p>
							<button type="submit" id="adaugare_cos4" class="button_right" value='4'>Adaugă în coș</button>
							<a href="./item.php?table=toys&id=<?php echo $product_array[4]['product_id']; ?>"><p class="middletext"><?php echo $product_array[4]['product_name']; ?></p></a>
							<?php endif;?>
						</div>
					
					</div>
				</div>
				<div class="produs5">
					<div class="mini_produs" >

						<div class="container_image_text">
							<?php if($page_content != 1) : 
								  elseif($product_array[5]!=0) :?>
							<a href="./item.php?table=toys&id=<?php echo $product_array[5]['product_id']; ?>"><img src="Poze/Products/<?php echo nvl($product_array[5]['picture'],"Basic.jpg"); ?>" alt="Item" class="item_pic"></a>
							<p class="button_left"><?php echo $product_array[5]['price']*((100-$product_array[5]['discount'])/100); ?> RON</p>
							<button type="submit" id="adaugare_cos5" class="button_right" value='5'>Adaugă în coș</button>
							<a href="./item.php?table=toys&id=<?php echo $product_array[5]['product_id']; ?>"><p class="middletext"><?php echo $product_array[5]['product_name']; ?></p></a>
							<?php endif;?>
						</div>
					
					</div>
				</div>
				<div class="produs6">
					<div class="mini_produs" >
					
						<div class="container_image_text">
							<?php if($page_content != 1) : 
								  elseif($product_array[6]!=0) :?>
							<a href="./item.php?table=toys&id=<?php echo $product_array[6]['product_id']; ?>"><img src="Poze/Products/<?php echo nvl($product_array[6]['picture'],"Basic.jpg"); ?>" alt="Item" class="item_pic"></a>
							<p class="button_left"><?php echo $product_array[6]['price']*((100-$product_array[6]['discount'])/100); ?> RON</p>
							<button type="submit" id="adaugare_cos6" class="button_right" value='6'>Adaugă în coș</button>
							<a href="./item.php?table=toys&id=<?php echo $product_array[6]['product_id']; ?>"><p class="middletext"><?php echo $product_array[6]['product_name']; ?></p></a>
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
	

	<script>
        document.getElementById("adaugare_cos1").addEventListener('click', loadProduct);
		document.getElementById("adaugare_cos2").addEventListener('click', loadProduct);
		document.getElementById("adaugare_cos3").addEventListener('click', loadProduct);
		document.getElementById("adaugare_cos4").addEventListener('click', loadProduct);
		document.getElementById("adaugare_cos5").addEventListener('click', loadProduct);
		document.getElementById("adaugare_cos6").addEventListener('click', loadProduct);
		
		function loadProduct(){

			var product_number = (this).value;

			var product1_id = <?php echo nvl($product_array[1]['product_id'],0)?>;
			var product2_id = <?php echo nvl($product_array[2]['product_id'],0)?>;
			var product3_id = <?php echo nvl($product_array[3]['product_id'],0)?>;
			var product4_id = <?php echo nvl($product_array[4]['product_id'],0)?>;
			var product5_id = <?php echo nvl($product_array[5]['product_id'],0)?>;
			var product6_id = <?php echo nvl($product_array[6]['product_id'],0)?>;

			var data = 'product1_id='+product1_id+'&product2_id='+product2_id+'&product3_id='+product3_id+'&product4_id='+product4_id+'&product5_id='+product5_id+'&product6_id='+product6_id+'&product_number='+product_number+'&product_table=2'; 
			var xhr = new XMLHttpRequest();

			xhr.open("POST", "ajax.php");
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhr.send(data);
			console.log(data);
		}
    </script>
  </body>
</html>