<?php
session_start();

	include("../connection.php");
	include("../functions.php");
	$admin = isAdmin($con);
    if($admin != 1)
    {            
		header("Location: ../index.php");
        die;
    }   
     


    if ( isset( $_GET['submit'] ) ) 
    {  $firstname = $_GET['firstname']; 
        $lastname = $_GET['lastname'];
         echo '<h3>Form GET Method</h3>'; 
         echo 'Your name is ' . $lastname . ' ' . $firstname; 
         exit;
    }

    if ( isset( $_GET['admin_action_select'] ) ) 
    {  
        $value = $_GET['value'];
         echo '<h3>Form GET Method</h3>'; 
         echo 'Your name is ' . $value ; 
         exit;
    }

?>


<!DOCTYPE html>
<html lang="ro">
  <head>
    <meta charset="utf-8">
	<meta name="author1" content="Andrei Rosu">
	<meta name="author2" content="Anton Sfabu">
    <title>OnT - Admin</title>
	<link rel="stylesheet" href="../style.css">
  </head>
  
  <body>
	<header>
		<h1>Online Toys</h1>
	</header>
	
	<hr class="above">
	
	<nav>
		<ul>
			<li class="nav_bar"><a href="../index.php">Acasă</a></li>
			<li class="nav_bar"><a href="../cos.php">Coșul meu</a></li>
			<li class="nav_bar"><a href="../jucarii.php">Jucării</a></li>
			<li class="nav_bar"><a href="../boardgames.php">Boardgames</a></li>
			<li class="nav_bar"><a href="../contact.php">Contact</a></li>

		</ul>
	</nav>
	
	<hr class="below">
	
	<main>


    <form method="get">
    <select name='admin_action' onchange='if(this.value != 0) { this.form.submit(); }'>
        
         <option value='0'>Alege</option>
         <option value='1'>Adaugă ofertă</option>
         <option value='2'>Actualizează produs</option>
         <option value='3'>Șterge produs</option>
         <option value='4'>Adaugă produs</option>
    </select>
    </form>

	<?php
    if(isset($_GET['admin_action']) ){
        $value = $_GET['admin_action'];
    
    switch($value){
        case "1":
            echo '<h3>CAZUL 1</h3>';
        break;
        case "2":
            echo '<h3>Cazul DOI</h3>';
        break;
        case "3":
            echo '<h3>Cazul TREI</h3>';
        break;
        case "4":
            echo '<h3>Cazul PETRU</h3>';
        break;
        default :
        echo "No page was selected";
        break;
      }
    }
    ?>
	</select>
	</main>

	<footer>
	</footer>
	
  </body>
</html>