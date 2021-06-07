<?php
session_start();
	$_SESSION;
	include("connection.php");
	include("functions.php");

	$ranking = getRanking($con);
	
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
			<li class="rss"><a href="./rss.xml"><img src="Poze/RSS_LOGO.png" width=1% height=1%></a></li>
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
				
				<div class="container_image_text">
					<a href="item.html"><img src="Poze/Products/<?php echo nvl($ranking[1]['picture'],"Basic.jpg"); ?>" alt="Item" class="item_pic"></a>
					<a href="item.html"><p class="middletext"><?php echo $ranking[1]['product_name']; ?></p></a>
					<p class="button_left"><?php echo $ranking[1]['price']*((100-$ranking[1]['discount'])/100); ?> RON</p>
					<a href="#"><p class="button_right">Adaugă în coș</p></a>
				</div>
				
				</div>
			</div>
			
			<div class="lista_produse">
				<div class="produs_top2">
					<p class="paragraph_top">#2</p>
					<div class="mini_produs" >
					
						<div class="container_image_text">
							<a href="item.html"><img src="Poze/Products/<?php echo nvl($ranking[2]['picture'],"Basic.jpg"); ?>" alt="Item" class="item_pic"></a>
							<a href="item.html"><p class="middletext"><?php echo $ranking[2]['product_name']; ?></p></a>
							<p class="button_left"><?php echo $ranking[2]['price']*((100-$ranking[2]['discount'])/100); ?> RON</p>
							<a href="#"><p class="button_right">Adaugă</p></a>
						</div>
						
					</div>
				</div>
				<div class="produs_top3">
					<p class="paragraph_top">#3</p>
					<div class="mini_produs" >
					
						<div class="container_image_text">
							<a href="item.html"><img src="Poze/Products/<?php echo nvl($ranking[3]['picture'],"Basic.jpg"); ?>" alt="Item" class="item_pic"></a>
							<a href="item.html"><p class="middletext"><?php echo $ranking[3]['product_name']; ?></p></a>
							<p class="button_left"><?php echo $ranking[3]['price']*((100-$ranking[3]['discount'])/100); ?> RON</p>
							<a href="#"><p class="button_right">Adaugă</p></a>
						</div>
					
					</div>
				</div>
				<div class="produs_top4">
					<p class="paragraph_top">#4</p>
					<div class="mini_produs" >
					
						<div class="container_image_text">
							<a href="item.html"><img src="Poze/Products/<?php echo nvl($ranking[4]['picture'],"Basic.jpg"); ?>" alt="Item" class="item_pic"></a>
							<a href="item.html"><p class="middletext"><?php echo $ranking[4]['product_name']; ?></p></a>
							<p class="button_left"><?php echo $ranking[4]['price']*((100-$ranking[4]['discount'])/100); ?> RON</p>
							<a href="#"><p class="button_right">Adaugă</p></a>
						</div>
					
					</div>
				</div>
				<div class="produs_top5">
					<p class="paragraph_top">#5</p>
					<div class="mini_produs" >
					
						<div class="container_image_text">
							<a href="item.html"><img src="Poze/Products/<?php echo nvl($ranking[5]['picture'],"Basic.jpg"); ?>" alt="Item" class="item_pic"></a>
							<a href="item.html"><p class="middletext"><?php echo $ranking[5]['product_name']; ?></p></a>
							<p class="button_left"><?php echo $ranking[5]['price']*((100-$ranking[5]['discount'])/100); ?> RON</p>
							<a href="#"><p class="button_right">Adaugă</p></a>
						</div>
					
					</div>
				</div>
			</div>
		</div>
	</main>
	
	<footer>
	</footer>
	
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