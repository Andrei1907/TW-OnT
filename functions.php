<?php

function isLoggedIn($con, $redirect) //sunt logat? redirectare daca e necesar
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
        return NULL;
    }

    if($redirect == 1)
    {
        header("Location: login.php");
        die;
    }
}

function genRand($length) //generare de user_id de lungime random: 4<->length (cu valori random)
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

    //redirectare catre login daca e necesar
    header("Location: ../login.php");
    die;
}

function getMostPopular($con) //cel mai popular produs - index
{
    $query = "SELECT * FROM (SELECT product_id,product_name, description, price, picture, discount, counter,1 AS product_table FROM boardgames 
            UNION
            SELECT product_id,product_name, description, price, picture, discount, counter,2 AS product_table FROM toys) total ORDER BY total.counter desc limit 5";
    $queryResult = mysqli_query($con, $query);

    $product_data = mysqli_fetch_assoc($queryResult);

    return $product_data;
}

function getRanking($con) //cele mai populare 5 produse - clasament
{
    $query = "SELECT * FROM (SELECT product_id,product_name, description, price, picture, discount, counter,1 AS product_table FROM boardgames 
    UNION
    SELECT product_id,product_name, description, price, picture, discount, counter,2 AS product_table FROM toys) total ORDER BY total.counter desc limit 5";
    $queryResult = mysqli_query($con, $query);

    if($product1 = mysqli_fetch_assoc($queryResult)){
    }
    else $product1=NULL;

    if($product2 = mysqli_fetch_assoc($queryResult)){
    }
    else $product2=NULL;

    if($product3 = mysqli_fetch_assoc($queryResult)){
    }
    else $product3=NULL;

    if($product4 = mysqli_fetch_assoc($queryResult)){
    }
    else $product4=NULL;

    if($product5 = mysqli_fetch_assoc($queryResult)){
    }
    else $product5=NULL;

    $product_array = array(
        1=>$product1 ,
        2=>$product2 ,
        3=>$product3 ,
        4=>$product4 ,
        5=>$product5 ,
    );
    return $product_array;
}

function make_query($table)
{
    $fill = 0;

    if($table == 1){
        $query = "SELECT * FROM boardgames ";
        $varsta = 0;
        $tip = 0;
        $numar_de_jucatori = 0;
        //varsta
        if(!empty($_POST['age6'])){
            $query .= "WHERE (age = '6+' ";
            $fill = 1;
            $varsta = 1;
        }

        if(!empty($_POST['age10'])){
            if($fill == 0){
                $query .= "WHERE ( age = '10+' ";
                $fill = 1;
                $varsta = 1;
            }
            else{
                $query .= "OR age = '10+' ";
                $fill = 1;
                $varsta = 1;
            }

        }
        if(!empty($_POST['age14'])){
            if($fill == 0){
                $query .= "WHERE (age = '14+' ";
                $fill = 1;
                $varsta = 1;
            }
            else{
                $query .= "OR age = '14+' ";
                $fill = 1;
                $varsta = 1;
            }

        }
        if(!empty($_POST['age18'])){
            if($fill == 0){
                $query .= "WHERE (age = '18+' ";
                $fill = 1;
                $varsta = 1;
            }
            else{
                $query .= "OR age = '18+' ";
                $fill = 1;
                $varsta = 1;
            }

        }
        if($varsta == 1)
            $query .= ") ";
        //tipul
        if(!empty($_POST['gen_strategy'])){
            if($fill == 0){
                $query .= "WHERE ( type LIKE '%strategie%' ";
                $fill = 1;
                $tip = 1;
            }
            else{
                $query .= "AND ( type LIKE '%strategie%' ";
                $fill = 1;
                $tip = 1;
            }

        }
        if(!empty($_POST['gen_luck'])){
            if($fill == 0){
                $query .= "WHERE ( type LIKE '%noroc%' ";
                $fill = 1;
                $tip = 1;
            }
            else if($varsta == 1 && $tip == 0){
                $query .= "AND ( type LIKE '%noroc%' ";
                $fill = 1;
                $tip = 1;
            }
            else{
                $query .= "OR  type LIKE '%noroc%' ";
                $fill = 1;
                $tip = 1;
            }

        }
        if(!empty($_POST['gen_coop'])){
            if($fill == 0){
                $query .= "WHERE ( type LIKE '%cooperare%' ";
                $fill = 1;
                $tip = 1;
            }
            else if($varsta == 1 && $tip == 0){
                $query .= "AND ( type LIKE '%cooperare%' ";
                $fill = 1;
                $tip = 1;
            }
            else{
                $query .= "OR  type LIKE '%cooperare%' ";
                $fill = 1;
                $tip = 1;
            }

        }
        if(!empty($_POST['gen_cards'])){
            if($fill == 0){
                $query .= "WHERE ( type LIKE '%carti%' ";
                $fill = 1;
                $tip = 1;
            }
            else if($varsta == 1 && $tip == 0){
                $query .= "AND ( type LIKE '%carti%' ";
                $fill = 1;
                $tip = 1;
            }
            else{
                $query .= "OR  type LIKE '%carti%' ";
                $fill = 1;
                $tip = 1;
            }

        }
        if(!empty($_POST['gen_war'])){
            if($fill == 0){
                $query .= "WHERE ( type LIKE '%razboi%' ";
                $fill = 1;
                $tip = 1;
            }
            else if($varsta == 1 && $tip == 0){
                $query .= "AND ( type LIKE '%razboi%' ";
                $fill = 1;
                $tip = 1;
            }
            else{
                $query .= "OR  type LIKE '%razboi%' ";
                $fill = 1;
                $tip = 1;
            }

        }
        if($tip == 1)
            $query .= ") ";
        //numarul de jucatori
        if(!empty($_POST['number_players_2'])){
            if($fill == 0){
                $query .= "WHERE ( number_players LIKE '%1-2%' ";
                $fill = 1;
                $numar_de_jucatori = 1;
            }
            else if(($varsta == 1 || $tip == 1) && $numar_de_jucatori == 0){
                $query .= "AND ( number_players LIKE '%1-2%' ";
                $fill = 1;
                $numar_de_jucatori = 1;
            }
            else{
                $query .= "OR  number_players LIKE '%1-2%' ";
                $fill = 1;
                $numar_de_jucatori = 1;
            }

        }
        if(!empty($_POST['number_players_4'])){
            if($fill == 0){
                $query .= "WHERE ( number_players LIKE '%2-4%' ";
                $fill = 1;
                $numar_de_jucatori = 1;
            }
            else if(($varsta == 1 || $tip == 1) && $numar_de_jucatori == 0){
                $query .= "AND ( number_players LIKE '%2-4%' ";
                $fill = 1;
                $numar_de_jucatori = 1;
            }
            else{
                $query .= "OR  number_players LIKE '%2-4%' ";
                $fill = 1;
                $numar_de_jucatori = 1;
            }

        }
        if(!empty($_POST['number_players_6'])){
            if($fill == 0){
                $query .= "WHERE ( number_players LIKE '%2-6%' ";
                $fill = 1;
                $numar_de_jucatori = 1;
            }
            else if(($varsta == 1 || $tip == 1) && $numar_de_jucatori == 0){
                $query .= "AND ( number_players LIKE '%2-6%' ";
                $fill = 1;
                $numar_de_jucatori = 1;
            }
            else{
                $query .= "OR  number_players LIKE '%2-6%' ";
                $fill = 1;
                $numar_de_jucatori = 1;
            }

        }
        if(!empty($_POST['number_players_10'])){
            if($fill == 0){
                $query .= "WHERE ( number_players LIKE '%2-10%' ";
                $fill = 1;
                $numar_de_jucatori = 1;
            }
            else if(($varsta == 1 || $tip == 1) && $numar_de_jucatori == 0){
                $query .= "AND ( number_players LIKE '%2-10%' ";
                $fill = 1;
                $numar_de_jucatori = 1;
            }
            else{
                $query .= "OR  number_players LIKE '%2-10%' ";
                $fill = 1;
                $numar_de_jucatori = 1;
            }

        }
        if($numar_de_jucatori == 1)
            $query .= ") ";

        if($fill == 0)
            return NULL;
        else return $query;
    }
    elseif ($table==2){
        $query = "SELECT * FROM toys ";
        $varsta = 0;
        $material = 0;
        $culoare = 0;
        //varsta
        if(!empty($_POST['age_small'])){
            $query .= "WHERE (age = 'sugari' ";
            $fill = 1;
            $varsta = 1;
        }

        if(!empty($_POST['age_child'])){
            if($fill == 0){
                $query .= "WHERE ( age = 'copii' ";
                $fill = 1;
                $varsta = 1;
            }
            else{
                $query .= "OR age = 'copii' ";
                $fill = 1;
                $varsta = 1;
            }

        }
        if(!empty($_POST['age_teen'])){
            if($fill == 0){
                $query .= "WHERE (age = 'adolescenti' ";
                $fill = 1;
                $varsta = 1;
            }
            else{
                $query .= "OR age = 'adolescenți' ";
                $fill = 1;
                $varsta = 1;
            }

        }
        if($varsta == 1)
            $query .= ") ";
        //material
        if(!empty($_POST['material_metal'])){
            if($fill == 0){
                $query .= "WHERE ( material LIKE '%metal%' ";
                $fill = 1;
                $material = 1;
            }
            else{
                $query .= "AND ( material LIKE '%metal%' ";
                $fill = 1;
                $material = 1;
            }

        }
        if(!empty($_POST['material_plastic'])){
            if($fill == 0){
                $query .= "WHERE ( material LIKE '%plastic%' ";
                $fill = 1;
                $material = 1;
            }
            else if($varsta == 1 && $material == 0){
                $query .= "AND ( material LIKE '%plastic%' ";
                $fill = 1;
                $material = 1;
            }
            else{
                $query .= "OR  material LIKE '%plastic%' ";
                $fill = 1;
                $material = 1;
            }

        }
        if(!empty($_POST['material_plus'])){
            if($fill == 0){
                $query .= "WHERE ( material LIKE '%plus%' ";
                $fill = 1;
                $material = 1;
            }
            else if($varsta == 1 && $material == 0){
                $query .= "AND ( material LIKE '%plus%' ";
                $fill = 1;
                $material = 1;
            }
            else{
                $query .= "OR  material LIKE '%plus%' ";
                $fill = 1;
                $material = 1;
            }

        }
        if(!empty($_POST['material_lemn'])){
            if($fill == 0){
                $query .= "WHERE ( material LIKE '%lemn%' ";
                $fill = 1;
                $material = 1;
            }
            else if($varsta == 1 && $material == 0){
                $query .= "AND ( material LIKE '%lemn%' ";
                $fill = 1;
                $material = 1;
            }
            else{
                $query .= "OR  material LIKE '%lemn%' ";
                $fill = 1;
                $material = 1;
            }

        }
        if($material == 1)
            $query .= ") ";
        //culoare
        if(!empty($_POST['cul_rosu'])){
            if($fill == 0){
                $query .= "WHERE ( color LIKE '%rosu%' ";
                $fill = 1;
                $culoare = 1;
            }
            else if(($varsta == 1 || $material == 1) && $culoare == 0){
                $query .= "AND ( color LIKE '%rosu%' ";
                $fill = 1;
                $culoare = 1;
            }
            else{
                $query .= "OR  color LIKE '%rosu%' ";
                $fill = 1;
                $culoare = 1;
            }

        }
        if(!empty($_POST['cul_albastru'])){
            if($fill == 0){
                $query .= "WHERE ( color LIKE '%albastru%' ";
                $fill = 1;
                $culoare = 1;
            }
            else if(($varsta == 1 || $material == 1) && $culoare == 0){
                $query .= "AND ( color LIKE '%albastru%' ";
                $fill = 1;
                $culoare = 1;
            }
            else{
                $query .= "OR  color LIKE '%albastru%' ";
                $fill = 1;
                $culoare = 1;
            }

        }
        if(!empty($_POST['cul_verde'])){
            if($fill == 0){
                $query .= "WHERE ( color LIKE '%verde%' ";
                $fill = 1;
                $culoare = 1;
            }
            else if(($varsta == 1 || $material == 1) && $culoare == 0){
                $query .= "AND ( color LIKE '%verde%' ";
                $fill = 1;
                $culoare = 1;
            }
            else{
                $query .= "OR  color LIKE '%verde%' ";
                $fill = 1;
                $culoare = 1;
            }

        }
        if(!empty($_POST['cul_galben'])){
            if($fill == 0){
                $query .= "WHERE ( color LIKE '%galben%' ";
                $fill = 1;
                $culoare = 1;
            }
            else if(($varsta == 1 || $material == 1) && $culoare == 0){
                $query .= "AND ( color LIKE '%galben%' ";
                $fill = 1;
                $culoare = 1;
            }
            else{
                $query .= "OR  color LIKE '%galben%' ";
                $fill = 1;
                $culoare = 1;
            }

        }
        if(!empty($_POST['cul_roz'])){
            if($fill == 0){
                $query .= "WHERE ( color LIKE '%roz%' ";
                $fill = 1;
                $culoare = 1;
            }
            else if(($varsta == 1 || $material == 1) && $culoare == 0){
                $query .= "AND ( color LIKE '%roz%' ";
                $fill = 1;
                $culoare = 1;
            }
            else{
                $query .= "OR  color LIKE '%roz%' ";
                $fill = 1;
                $culoare = 1;
            }

        }
        if(!empty($_POST['cul_portocaliu'])){
            if($fill == 0){
                $query .= "WHERE ( color LIKE '%portocaliu%' ";
                $fill = 1;
                $culoare = 1;
            }
            else if(($varsta == 1 || $material == 1) && $culoare == 0){
                $query .= "AND ( color LIKE '%portocaliu%' ";
                $fill = 1;
                $culoare = 1;
            }
            else{
                $query .= "OR  color LIKE '%portocaliu%' ";
                $fill = 1;
                $culoare = 1;
            }

        }
        if($culoare == 1)
            $query .= ") ";

        if($fill == 0)
            return NULL;
        else return $query;  
    }
    else
    return NULL;
}

function interogate_product_boardgames($rows_number,$offset,$order_by,$table,$con,$selected_queryB){
    if($selected_queryB == 1){
        if($table == 1){
            if($order_by == 1){
                $query = "SELECT * FROM boardgames LIMIT $rows_number OFFSET $offset";   
                $queryResult = mysqli_query($con, $query);
                return $queryResult;
            }
         return NULL;
        }
        return NULL;
    }
    else {
        if($order_by == 1){
            $query = $selected_queryB."LIMIT $rows_number OFFSET $offset";
            $queryResult = mysqli_query($con, $query);
            return $queryResult;
        }
    }
}
function interogate_product_toys($rows_number,$offset,$order_by,$table,$con,$selected_queryT){
    if($selected_queryT == 1){
        if($table == 2){
            if($order_by == 1){
                $query = "SELECT * FROM toys LIMIT $rows_number OFFSET $offset";   
                $queryResult = mysqli_query($con, $query);
                return $queryResult;
            }
         return NULL;
        }
        return NULL;
    }
    else {
        if($order_by == 1){
            $query = $selected_queryT."LIMIT $rows_number OFFSET $offset";
            $queryResult = mysqli_query($con, $query);
            return $queryResult;
        }
    }
}
function set_6_products($rows_number,$offset,$table,$order_by,$con,$selected_query){
        if($offset >= 0){
            if($table==1)
                $products = interogate_product_boardgames(6,$offset,1,$table,$con,$selected_query);
            else if($table==2)
                $products = interogate_product_toys(6,$offset,1,$table,$con,$selected_query);
            if($products == false){
                $product_array = array(
                    1=>0 ,
                    2=>0 ,
                    3=>0 ,
                    4=>0 ,
                    5=>0 ,
                    6=>0 ,
                );
                return $product_array;
            }
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
    if ($var!=NULL AND $var!=0) 
        return $var;
    return $default;
}

function reset_page_numberB(){
    if(isset($_SESSION['$page_numberB']))
    {
        unset($_SESSION['$page_numberB']);
    }
}

function reset_page_numberT(){
	if(isset($_SESSION['$page_numberT']))
    {
        unset($_SESSION['$page_numberT']);
    }
}
function reset_selected_queryB(){
    if(isset($_SESSION['$selected_queryB']))
    {
        unset($_SESSION['$selected_queryB']);
    }
}
function reset_selected_queryT(){
    if(isset($_SESSION['$selected_queryT']))
    {
        unset($_SESSION['$selected_queryT']);
    }
}

//interogare cos pentru pret si discount
function getShoppingCartValue($con,$user_id){
    $query = "SELECT shopping_cart.product_id, boardgames.product_name, price, discount, shopping_cart.sales  FROM shopping_cart JOIN boardgames ON boardgames.product_id=shopping_cart.product_id 
        WHERE shopping_cart.id=".$user_id." AND shopping_cart.product_table=1
    UNION
        SELECT shopping_cart.product_id, toys.product_name, price, discount, shopping_cart.sales  FROM shopping_cart JOIN toys ON toys.product_id=shopping_cart.product_id 
        WHERE shopping_cart.id=".$user_id." AND shopping_cart.product_table=2 
    ORDER BY price desc";
    $queryResult = mysqli_query($con, $query);
    $total_price = 0;
    $total_discount = 0;
    if($queryResult && mysqli_num_rows($queryResult) > 0)
    {
        while($item = mysqli_fetch_assoc($queryResult)){
            if(!empty($item)){
                if($item['price'] != NULL){
                $total_price += $item['price'] * $item['sales'];
                $total_discount +=$item['price'] *$item['discount']/100* $item['sales'];
                }
            }
        }
        $data = array(
            1 => $total_price ,
            2 => $total_discount ,
            3 => $user_id
        );
        return $data;
    }
    else{
        return NULL;
    }

}
function delete_all_products($con,$user_id){
    $query = "SELECT * FROM shopping_cart WHERE id=".$user_id;
    $queryResult = mysqli_query($con, $query);
    if($queryResult && mysqli_num_rows($queryResult) > 0)
    {
        while($item = mysqli_fetch_assoc($queryResult)){
            if(!empty($item)){
                if($item['product_table'] == 1){
                    $update_query = "UPDATE boardgames SET counter=counter+".$item['sales']." WHERE product_id = ".$item['product_id'];
                }
                else $update_query = "UPDATE toys SET counter=counter+".$item['sales']." WHERE product_id = ".$item['product_id'];
                $update_queryResult = mysqli_query($con, $update_query);
            }
        }
        $delete_query = "DELETE FROM shopping_cart WHERE id=".$user_id;
        $delete_queryResult = mysqli_query($con, $delete_query);    
    }

}
function delete_all_products_cart($con,$user_id){
    $delete_query = "DELETE FROM shopping_cart WHERE id=".$user_id;
    $delete_queryResult = mysqli_query($con, $delete_query);    
}

?>