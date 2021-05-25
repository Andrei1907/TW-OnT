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
    //add_discount_toy
    if(isset($_POST['add_discount_toy'])){
        if(!empty($_POST['product_id']) && !empty($_POST['discount'])){

            $product_id=$_POST['product_id'];
            $discount=$_POST['discount'];

            $query = "UPDATE toys SET discount=$discount WHERE product_id = $product_id";
            $run = mysqli_query($con,$query) or die(mysqli_error());

            if($run){
                echo "Ofertă adăugată cu succes!";
            }
            else
                echo "Nu s-a reușit efectuarea acțiunii! :(";
        }
        else{
            echo "Completați toate spațiile";
        }
    }
    //update_toy
    if(isset($_POST['update_toy'])){
        if(!empty($_POST['product_id'])){
            
            $product_id=$_POST['product_id'];
            $fill=0;
            $query = "UPDATE toys SET ";
            if(!empty($_POST['product_name'])){
                $product_name=$_POST['product_name'];
                $query .= "product_name = $product_name ";
                $fill=1;
            }

            if(!empty($_POST['age'])){
                $age=$_POST['age'];
                if($fill==0){
                $query .= "age = '$age' ";}
                else $query .= ",age = '$age' ";
                $fill=1;
            }

            if(!empty($_POST['material'])){
                $material=$_POST['material'];
                if($fill==0){
                    $query .= "material = '$material' ";}
                else $query .= ",material = '$material' ";
                $fill=1;
            }

            if(!empty($_POST['color'])){ 
                $color=$_POST['color'];
                if($fill==0){
                    $query .= "color = '$color' ";}
                else $query .= ",color = '$color' ";
                $fill=1;
            }

            if(!empty($_POST['price'])){
                $price=$_POST['price'];
                if($fill==0){
                    $query .= "price = '$price' ";}
                else $query .= ",price = '$price' ";
                $fill=1;
            }

            if(!empty($_POST['description'])){
                $description=$_POST['description'];
                if($fill==0){
                    $query .= "description = '$description' ";}
                else $query .= ",description = '$description' ";
                $fill=1;
            }

            //$picture=$_FILE['picture']['tmp_name'];

            $query .= "WHERE product_id = $product_id";
            if($fill!=0){
                $run = mysqli_query($con,$query) or die(mysqli_error($con));

                if($run){
                    echo "Produs modificat cu succes!";
                }
                else
                 echo "Nu s-a reușit efectuarea acțiunii! :(";
            }
            else 
             echo "Completați măcar 1 spațiu, în afară de cel destinat ID-ului produsului!";
        }
        else{
            echo "Completați spațiul produs_id";
        }
    }
    //delete_toy
    if(isset($_POST['delete_toy'])){
        if(!empty($_POST['product_id'])){
            
            $product_id=$_POST['product_id'];

            $query = "DELETE FROM toys WHERE product_id=$product_id";
            $run = mysqli_query($con,$query) or die(mysqli_error($con));

            if($run){
                echo "Produs șters cu succes!";
            }
            else
                echo "Nu s-a reușit efectuarea acțiunii! :(";
        }
        else{
            echo "Completați toate spațiile";
        }
    }
    //add_new_toy
    if(isset($_POST['add_new_toy'])){
        if(!empty($_POST['product_id']) && !empty($_POST['product_name']) && !empty($_POST['age']) && !empty($_POST['material']) && !empty($_POST['color']) && !empty($_POST['price']) && !empty($_POST['description'])){
            
            $product_id=$_POST['product_id'];
            $product_name=$_POST['product_name'];
            $age=$_POST['age'];
            $material=$_POST['material'];
            $color=$_POST['color'];
            $price=$_POST['price'];
            $description=$_POST['description'];
            //$picture=$_FILE['picture']['tmp_name'];

            $query = "INSERT INTO toys (product_id, product_name, age, material, color, price, description, picture, discount, counter) VALUES ('$product_id','$product_name','$age','$material','$color','$price','$description','0', '0', '0')";
            $run = mysqli_query($con,$query) or die(mysqli_error($con));

            if($run){
                echo "Produs adăugat cu succes!";
            }
            else
                echo "Nu s-a reușit efectuarea acțiunii! :(";
        }
        else{
            echo "Completați toate spațiile";
        }
    }

        //add_discount_toy
    if(isset($_POST['add_discount_toy'])){
        if(!empty($_POST['product_id']) && !empty($_POST['discount'])){

            $product_id=$_POST['product_id'];
            $discount=$_POST['discount'];

            $query = "UPDATE toys SET discount=$discount WHERE product_id = $product_id";
            $run = mysqli_query($conn,$query) or die(mysqli_error());

            if($run){
                echo "Ofertă adăugată cu succes!";
            }
            else
                echo "Nu s-a reușit efectuarea acțiunii! :(";
        }
        else{
            echo "Completați toate spațiile";
        }
    }
    //update_toy
    if(isset($_POST['update_toy'])){
        if(!empty($_POST['product_id'])){
            
            $product_id=$_POST['product_id'];
            $fill=0;
            $query = "UPDATE toys SET ";
            if(!empty($_POST['product_name'])){
                $product_name=$_POST['product_name'];
                $query .= "product_name = $product_name ";
                $fill=1;
            }

            if(!empty($_POST['age'])){
                $age=$_POST['age'];
                if($fill==0){
                $query .= "age = '$age' ";}
                else $query .= ",age = '$age' ";
                $fill=1;
            }

            if(!empty($_POST['material'])){
                $material=$_POST['material'];
                if($fill==0){
                    $query .= "material = '$material' ";}
                else $query .= ",material = '$material' ";
                $fill=1;
            }

            if(!empty($_POST['color'])){ 
                $color=$_POST['color'];
                if($fill==0){
                    $query .= "color = '$color' ";}
                else $query .= ",color = '$color' ";
                $fill=1;
            }

            if(!empty($_POST['price'])){
                $price=$_POST['price'];
                if($fill==0){
                    $query .= "price = '$price' ";}
                else $query .= ",price = '$price' ";
                $fill=1;
            }

            if(!empty($_POST['description'])){
                $description=$_POST['description'];
                if($fill==0){
                    $query .= "description = '$description' ";}
                else $query .= ",description = '$description' ";
                $fill=1;
            }

            //$picture=$_FILE['picture']['tmp_name'];

            $query .= "WHERE product_id = $product_id";
            if($fill!=0){
                $run = mysqli_query($con,$query) or die(mysqli_error($con));

                if($run){
                    echo "Produs modificat cu succes!";
                }
                else
                 echo "Nu s-a reușit efectuarea acțiunii! :(";
            }
            else 
             echo "Completați măcar 1 spațiu, în afară de cel destinat ID-ului produsului!";
        }
        else{
            echo "Completați spațiul produs_id";
        }
    }
    //delete_toy
    if(isset($_POST['delete_toy'])){
        if(!empty($_POST['product_id'])){
            
            $product_id=$_POST['product_id'];

            $query = "DELETE FROM toys WHERE product_id=$product_id";
            $run = mysqli_query($con,$query) or die(mysqli_error($con));

            if($run){
                echo "Produs șters cu succes!";
            }
            else
                echo "Nu s-a reușit efectuarea acțiunii! :(";
        }
        else{
            echo "Completați toate spațiile";
        }
    }
    //add_new_toy
    if(isset($_POST['add_new_toy'])){
        if(!empty($_POST['product_id']) && !empty($_POST['product_name']) && !empty($_POST['age']) && !empty($_POST['material']) && !empty($_POST['color']) && !empty($_POST['price']) && !empty($_POST['description'])){
            
            $product_id=$_POST['product_id'];
            $product_name=$_POST['product_name'];
            $age=$_POST['age'];
            $material=$_POST['material'];
            $color=$_POST['color'];
            $price=$_POST['price'];
            $description=$_POST['description'];
            //$picture=$_FILE['picture']['tmp_name'];

            $query = "INSERT INTO toys (product_id, product_name, age, material, color, price, description, picture, discount, counter) VALUES ('$product_id','$product_name','$age','$material','$color','$price','$description','0', '0', '0')";
            $run = mysqli_query($con,$query) or die(mysqli_error($con));

            if($run){
                echo "Produs adăugat cu succes!";
            }
            else
                echo "Nu s-a reușit efectuarea acțiunii! :(";
        }
        else{
            echo "Completați toate spațiile";
        }
    }

    //add_discount_boardgames
    if(isset($_POST['add_discount_boardgames'])){
        if(!empty($_POST['product_id']) && !empty($_POST['discount'])){

            $product_id=$_POST['product_id'];
            $discount=$_POST['discount'];

            $query = "UPDATE boardgames SET discount=$discount WHERE product_id = $product_id";
            $run = mysqli_query($con,$query) or die(mysqli_error());

            if($run){
                echo "Ofertă adăugată cu succes!";
            }
            else
                echo "Nu s-a reușit efectuarea acțiunii! :(";
        }
        else{
            echo "Completați toate spațiile";
        }
    }
    //update_boardgames
    if(isset($_POST['update_boardgames'])){
        if(!empty($_POST['product_id'])){
            
            $product_id=$_POST['product_id'];
            $fill=0;
            $query = "UPDATE boardgames SET ";
            if(!empty($_POST['product_name'])){
                $product_name=$_POST['product_name'];
                $query .= "product_name = $product_name ";
                $fill=1;
            }

            if(!empty($_POST['age'])){
                $age=$_POST['age'];
                if($fill==0){
                $query .= "age = '$age' ";}
                else $query .= ",age = '$age' ";
                $fill=1;
            }

            if(!empty($_POST['type'])){
                $type=$_POST['type'];
                if($fill==0){
                    $query .= "type = '$type' ";}
                else $query .= ",type = '$type' ";
                $fill=1;
            }

            if(!empty($_POST['number_players'])){ 
                $number_players=$_POST['number_players'];
                if($fill==0){
                    $query .= "number_players = '$number_players' ";}
                else $query .= ",number_players = '$number_players' ";
                $fill=1;
            }

            if(!empty($_POST['price'])){
                $price=$_POST['price'];
                if($fill==0){
                    $query .= "price = '$price' ";}
                else $query .= ",price = '$price' ";
                $fill=1;
            }

            if(!empty($_POST['description'])){
                $description=$_POST['description'];
                if($fill==0){
                    $query .= "description = '$description' ";}
                else $query .= ",description = '$description' ";
                $fill=1;
            }

            //$picture=$_FILE['picture']['tmp_name'];

            $query .= "WHERE product_id = $product_id";
            if($fill!=0){
                $run = mysqli_query($con,$query) or die(mysqli_error($con));

                if($run){
                    echo "Produs modificat cu succes!";
                }
                else
                 echo "Nu s-a reușit efectuarea acțiunii! :(";
            }
            else 
             echo "Completați măcar 1 spațiu, în afară de cel destinat ID-ului produsului!";
        }
        else{
            echo "Completați spațiul produs_id";
        }
    }
    //delete_boardgames
    if(isset($_POST['delete_boardgames'])){
        if(!empty($_POST['product_id'])){
            
            $product_id=$_POST['product_id'];

            $query = "DELETE FROM boardgames WHERE product_id=$product_id";
            $run = mysqli_query($con,$query) or die(mysqli_error($con));

            if($run){
                echo "Produs șters cu succes!";
            }
            else
                echo "Nu s-a reușit efectuarea acțiunii! :(";
        }
        else{
            echo "Completați toate spațiile";
        }
    }
    //add_new_boardgames
    if(isset($_POST['add_new_boardgames'])){
        if(!empty($_POST['product_id']) && !empty($_POST['product_name']) && !empty($_POST['age']) && !empty($_POST['type']) && !empty($_POST['number_players']) && !empty($_POST['price']) && !empty($_POST['description'])){
            
            $product_id=$_POST['product_id'];
            $product_name=$_POST['product_name'];
            $age=$_POST['age'];
            $type=$_POST['type'];
            $number_players=$_POST['number_players'];
            $price=$_POST['price'];
            $description=$_POST['description'];
            //$picture=$_FILE['picture']['tmp_name'];

            $query = "INSERT INTO boardgames (product_id, product_name, age, type, number_players, price, description, picture, discount, counter) VALUES ('$product_id','$product_name','$age','$type','$number_players','$price','$description','0', '0', '0')";
            $run = mysqli_query($con,$query) or die(mysqli_error($con));

            if($run){
                echo "Produs adăugat cu succes!";
            }
            else
                echo "Nu s-a reușit efectuarea acțiunii! :(";
        }
        else{
            echo "Completați toate spațiile";
        }
    }
?>