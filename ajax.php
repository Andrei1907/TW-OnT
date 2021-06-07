<?php
session_start();

	include("./connection.php");
	include("./functions.php");

    $user_data = isLoggedIn($con);
    $logged = 1;
    if($user_data == NULL)
        $logged = 0;

    
    if(isset($_POST['product_number'])){
        $nr = $_POST['product_number'];
        $product_table = $_POST['product_table'];
        if($nr == 1) {$product_id =$_POST['product1_id'];}
        elseif($nr == 2) {$product_id =$_POST['product2_id'];}
        elseif($nr == 3) {$product_id =$_POST['product3_id'];}
        elseif($nr == 4) {$product_id =$_POST['product4_id'];}
        elseif($nr == 5) {$product_id =$_POST['product5_id'];}
        else {$product_id =$_POST['product6_id'];}

        if($logged == 1)
        {
            $user_id = $user_data['id'];
            $query_add_button = "SELECT sales FROM shopping_cart WHERE id=".$user_id." AND product_id=".$product_id." AND product_table=".$product_table;
            $queryResult = mysqli_query($con, $query_add_button);
            if($queryResult && mysqli_num_rows($queryResult) > 0)
            {
                $command_data = mysqli_fetch_assoc($queryResult);
                $counter = $command_data['sales']+1;
                $query = "UPDATE shopping_cart SET sales=".$counter." WHERE id=".$user_id." AND product_id=".$product_id." AND product_table=".$product_table;
                $queryR = mysqli_query($con, $query);
            }
            else{
                $query ="INSERT INTO shopping_cart (id, product_id, sales, product_table) VALUES ('$user_id','$product_id','1','$product_table')";
                $queryR = mysqli_query($con, $query);
            }
            
        }       
         
    }

?>