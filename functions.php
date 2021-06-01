<?php

function isLoggedIn($con)
{
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        $queryResult = mysqli_query($con, $query);
        
        if($queryResult && mysqli_num_rows($queryResult) > 0)
        {
            $user_data = mysqli_fetch_assoc($queryResult);
            return $user_data;
        }
    }
}

function isLoggedInRedirect($con)
{
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        $queryResult = mysqli_query($con, $query);
        
        if($queryResult && mysqli_num_rows($queryResult) > 0)
        {
            $user_data = mysqli_fetch_assoc($queryResult);
            return $user_data;
        }
    }

    //redirect to login if necessary on certain pages
    header("Location: login.php");
    die;
}

function genRand($length)
{
    $text = "";
    if($length < 5)
    {
        $length = 5;
    }

    $new_length = rand(4, $length);

    for ($i = 0; $i < $new_length ; $i++) {
        $text .= rand(0, 9);
    }

    return $text;
}

function isAdmin($con)
{
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        $queryResult = mysqli_query($con, $query);
        
        if($queryResult && mysqli_num_rows($queryResult) > 0)
        {
            $user_data = mysqli_fetch_assoc($queryResult);
            return $user_data['admin'];
        }
    }

    //redirect to login if necessary on certain pages
    header("Location: ../login.php");
    die;
}

function interogate_product_boardgames($rows_number,$offset,$order_by,$table,$con)
{
    if($table === 1){
        if($order_by === 1){
            $query = "SELECT * FROM boardgames LIMIT $rows_number OFFSET $offset";   
            $queryResult = mysqli_query($con, $query);
            return $queryResult;
        }
        return NULL;
    }
    return NULL;
}

function set_6_products($rows_number,$offset,$order_by,$con)
{
        if($offset >= 0){
            $products = interogate_product_boardgames(6,$offset,1,1,$con);
		    $number_of_rows = mysqli_num_rows($products);
		    if($number_of_rows > 0 ){
			    if($product1 = mysqli_fetch_assoc($products)){
			    }
			    else $product1=NULL;
			
			    if($product2 = mysqli_fetch_assoc($products)){
			    }
			    else $product2=NULL;

			    if($product3 = mysqli_fetch_assoc($products)){
			    }
			    else $product3=NULL;

			    if($product4 = mysqli_fetch_assoc($products)){
			    }
			    else $product4=NULL;

			    if($product5 = mysqli_fetch_assoc($products)){
			    }
			    else $product5=NULL;

			    if($product6 = mysqli_fetch_assoc($products)){
			    }
			    else $product6=NULL;
			
                $product_array = array(
                    1=>$product1 ,
                    2=>$product2 ,
                    3=>$product3 ,
                    4=>$product4 ,
                    5=>$product5 ,
                    6=>$product6 ,
                );
                return $product_array;
		    }
            else return NULL;
        }
        else return NULL;
}

function nvl(&$var, $default)
{
    if ($var!=NULL) 
        return $var;
    return $default;
}
?>