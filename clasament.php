<?php
session_start();
	$_SESSION;
	include("connection.php");
	include("functions.php");

	$ranking = getRanking($con);
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
    <title>OnT - Clasament</title>
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
		<div class="grid-container_clasament"> 
		
			<div class="produs_top">
				<p>#1</p>
				<div class="mini_produs">
				<?php 
					if($ranking[1]['product_table'] == 1)
						$table="boardgames";
					else
						$table="toys";?>
				<div class="container_image_text">
					<a href="./item.php?table=<?php echo $table;?>&id=<?php echo $ranking[1]['product_id']; ?>?>"><img src="Poze/Products/<?php echo nvl($ranking[1]['picture'],"Basic.jpg"); ?>" alt="Item" class="item_pic"></a>
					<a href="./item.php?table=<?php echo $table;?>&id=<?php echo $ranking[1]['product_id']; ?>"><p class="middletext"><?php echo $ranking[1]['product_name']; ?></p></a>
					<p class="button_left"><?php echo $ranking[1]['price']*((100-$ranking[1]['discount'])/100); ?> RON</p>
					<button type="submit" id="adaugare_cos1" class="button_right" value='1'>Adaugă în coș</button>
				</div>
				
				</div>
			</div>
			
			<div class="lista_produse">
				<div class="produs_top2">
					<p class="paragraph_top">#2</p>
					<div class="mini_produs" >
					<?php 
					if($ranking[2]['product_table'] == 1)
						$table="boardgames";
					else
						$table="toys";?>
						<div class="container_image_text">
							<a href="./item.php?table=<?php echo $table;?>&id=<?php echo $ranking[2]['product_id']; ?>"><img src="Poze/Products/<?php echo nvl($ranking[2]['picture'],"Basic.jpg"); ?>" alt="Item" class="item_pic"></a>
							<a href="./item.php?table=<?php echo $table;?>&id=<?php echo $ranking[2]['product_id']; ?>"><p class="middletext"><?php echo $ranking[2]['product_name']; ?></p></a>
							<p class="button_left"><?php echo $ranking[2]['price']*((100-$ranking[2]['discount'])/100); ?> RON</p>
							<button type="submit" id="adaugare_cos2" class="button_right" value='2'>Adaugă în coș</button>
						</div>
						
					</div>
				</div>
				<div class="produs_top3">
					<p class="paragraph_top">#3</p>
					<div class="mini_produs" >
					<?php 
					if($ranking[3]['product_table'] == 1)
						$table="boardgames";
					else
						$table="toys";?>
						<div class="container_image_text">
							<a href="./item.php?table=<?php echo $table;?>&id=<?php echo $ranking[3]['product_id']; ?>"><img src="Poze/Products/<?php echo nvl($ranking[3]['picture'],"Basic.jpg"); ?>" alt="Item" class="item_pic"></a>
							<a href="./item.php?table=<?php echo $table;?>&id=<?php echo $ranking[3]['product_id']; ?>"><p class="middletext"><?php echo $ranking[3]['product_name']; ?></p></a>
							<p class="button_left"><?php echo $ranking[3]['price']*((100-$ranking[3]['discount'])/100); ?> RON</p>
							<button type="submit" id="adaugare_cos3" class="button_right" value='3'>Adaugă în coș</button>
						</div>
					
					</div>
				</div>
				<div class="produs_top4">
					<p class="paragraph_top">#4</p>
					<div class="mini_produs" >
					<?php 
					if($ranking[4]['product_table'] == 1)
						$table="boardgames";
					else
						$table="toys";?>
						<div class="container_image_text">
							<a href="./item.php?table=<?php echo $table;?>&id=<?php echo $ranking[4]['product_id']; ?>"><img src="Poze/Products/<?php echo nvl($ranking[4]['picture'],"Basic.jpg"); ?>" alt="Item" class="item_pic"></a>
							<a href="./item.php?table=<?php echo $table;?>&id=<?php echo $ranking[4]['product_id']; ?>"><p class="middletext"><?php echo $ranking[4]['product_name']; ?></p></a>
							<p class="button_left"><?php echo $ranking[4]['price']*((100-$ranking[4]['discount'])/100); ?> RON</p>
							<button type="submit" id="adaugare_cos4" class="button_right" value='4'>Adaugă în coș</button>
						</div>
					
					</div>
				</div>
				<div class="produs_top5">
					<p class="paragraph_top">#5</p>
					<div class="mini_produs" >
					<?php 
					if($ranking[5]['product_table'] == 1)
						$table="boardgames";
					else
						$table="toys";?>
						<div class="container_image_text">
							<a href="./item.php?table=<?php echo $table;?>&id=<?php echo $ranking[5]['product_id']; ?>"><img src="Poze/Products/<?php echo nvl($ranking[5]['picture'],"Basic.jpg"); ?>" alt="Item" class="item_pic"></a>
							<a href="./item.php?table=<?php echo $table;?>&id=<?php echo $ranking[5]['product_id']; ?>"><p class="middletext"><?php echo $ranking[5]['product_name']; ?></p></a>
							<p class="button_left"><?php echo $ranking[5]['price']*((100-$ranking[5]['discount'])/100); ?> RON</p>
							<button type="submit" id="adaugare_cos5" class="button_right" value='5'>Adaugă în coș</button>
						</div>
					
					</div>
				</div>
			</div>
		</div>

		<div class="grid-container-contact">
			<div class="rss">
				<div class="middletext">
					<p>Flux de date disponibil în format RSS:
					<a href="./rss.xml"><img src="Poze/RSS_LOGO.png" width=1% height=1%></a>
					</p>
				</div>
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

		
		function loadProduct(){

			var product_number = (this).value;
			var product1_id = <?php echo nvl($ranking[1]['product_id'],0)?>;
			var product2_id = <?php echo nvl($ranking[2]['product_id'],0)?>;
			var product3_id = <?php echo nvl($ranking[3]['product_id'],0)?>;
			var product4_id = <?php echo nvl($ranking[4]['product_id'],0)?>;
			var product5_id = <?php echo nvl($ranking[5]['product_id'],0)?>;

			var product_table1 = <?php echo nvl($ranking[1]['product_table'],0)?>;
			var product_table2 = <?php echo nvl($ranking[2]['product_table'],0)?>;
			var product_table3 = <?php echo nvl($ranking[3]['product_table'],0)?>;
			var product_table4 = <?php echo nvl($ranking[4]['product_table'],0)?>;
			var product_table5 = <?php echo nvl($ranking[5]['product_table'],0)?>;


			var data = 'product1_id='+product1_id+'&product2_id='+product2_id+'&product3_id='+product3_id+'&product4_id='+product4_id+'&product5_id='+product5_id+'&product_number='+product_number+'&product_table=1'+'&product_table1='+product_table1+'&product_table2='+product_table2+'&product_table3='+product_table3+'&product_table4='+product_table4+'&product_table5='+product_table5; 
			var xhr = new XMLHttpRequest();

			xhr.open("POST", "ajax.php");
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhr.send(data);
			console.log(data);
		}
    </script>
  </body>
</html>

<?php
$str = "<?xml version='1.0' encoding='UTF-8' ?>" ;
$str.= "<rss version='2.0'>";
    $str.= "<channel>";
    $str.="<title> Clasament RSS </title>" ;
    $str.= "<description> Cloud RSS </description>" ;
    $str.= "<language> ro </language>" ;
    $str.= "<link>./clasament.php</link>" ;

    $i=1;
    foreach($ranking as $item)
    {
        if($i<6){

        
        $str.= "<item>";

            $str.= "<title>".$i.".".$item["product_name"]."</title>" ;
            $str.= "<description>".htmlspecialchars($item["description"]) ."</description>" ;
            $str.= "<link>http://localhost/OnT/TW-OnT/clasament.php?product_id=".$item["product_id"]."</link>" ;


        $str.= "</item>" ;
        $i+=1;
        }
    }
$str.= "</channel>";
$str.= "</rss>";
file_put_contents("rss.xml", $str);
?>