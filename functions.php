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

function getMostPopular($con)
{
    $query = "select * from boardgames order by counter desc limit 1";
    $queryResult = mysqli_query($con, $query);

    $product_data = mysqli_fetch_assoc($queryResult);
    $boardgame = $product_data;
    $max = $product_data['counter'];

    $query = "select * from toys order by counter desc limit 1";
    $queryResult = mysqli_query($con, $query);

    $product_data = mysqli_fetch_assoc($queryResult);
    if($product_data['counter'] > $max)
    {
        return $product_data;
    }
    else {
        return $boardgame;
    }

}

function getRanking($con)
{
    $query = "select * from boardgames order by counter desc limit 5";
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

    if($product6 = mysqli_fetch_assoc($queryResult)){
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

?>