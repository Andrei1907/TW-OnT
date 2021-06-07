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
        ?>
        <a href="./admin_toys.php"><p class="center_text_index">ÎNAPOI</p></a>
        <?php
    }

    //update_toy
    if(isset($_POST['update_toy'])){
        if(!empty($_POST['product_id'])){
            
            $product_id=$_POST['product_id'];
            $fill=0;
            $query = "UPDATE toys SET ";
            if(!empty($_POST['product_name'])){
                $product_name=$_POST['product_name'];
                $query .= "product_name = '$product_name' ";
                $fill=1;
            }

            if(!empty($_POST['age']) && $_POST['age']!=0){
                $age_value=$_POST['age'];
                switch($age_value){
                    case "1":
                        $age="Sugari";
                        break;
                    case "2":
                        $age="Copii";
                        break;
                    case "3":
                        $age="Adolescenti";
                        break;
                }
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

            if(!empty($_FILES['picture']) && !empty($_FILES['picture']['size'])){
                $file=$_FILES['picture'];
                $picture = upload_image($file);
                if($fill==0){
                    $query .= "picture = '$picture' ";}
                else $query .= ",picture = '$picture' ";
                $fill=1;
            }

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
        ?>
        <a href="./admin_toys.php"><p class="center_text_index">ÎNAPOI</p></a>
        <?php
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
        ?>
        <a href="./admin_toys.php"><p class="center_text_index">ÎNAPOI</p></a>
        <?php
    }

    //add_new_toy
    if(isset($_POST['add_new_toy'])){
        if(!empty($_POST['product_id']) && !empty($_POST['product_name']) && !empty($_POST['age']) && !empty($_POST['material']) && !empty($_POST['color']) && !empty($_POST['price']) && !empty($_POST['description']) && !empty($_FILES['picture']) && $_POST['age']!=0){
            
            $product_id=$_POST['product_id'];
            $product_name=$_POST['product_name'];
            $age_value=$_POST['age'];
            $material=$_POST['material'];
            $color=$_POST['color'];
            $price=$_POST['price'];
            $description=$_POST['description'];
            $file=$_FILES['picture'];

            switch($age_value){
                case "1":
                    $age="Sugari";
                    break;
                case "2":
                    $age="Copii";
                    break;
                case "3":
                    $age="Adolescenti";
                    break;
            }

            $picture = upload_image($file);
            if($picture != NULL){
                $query = "INSERT INTO toys (product_id, product_name, age, material, color, price, description, picture, discount, counter) VALUES ('$product_id','$product_name','$age','$material','$color','$price','$description','0', '0', '0')";
                $run = mysqli_query($con,$query) or die(mysqli_error($con));

                if($run){
                    echo "Produs adăugat cu succes!";
                }
                else
                    echo "Nu s-a reușit efectuarea acțiunii! :(";
            }
             else echo "Nu s-a reușit încărcarea imaginii!";
        }
        else{
            echo "Completați toate spațiile";
        }
        ?>
        <a href="./admin_toys.php"><p class="center_text_index">ÎNAPOI</p></a>
        <?php
    }

    //add_discount_boardgames
    if(isset($_POST['add_discount_boardgames'])){
        if(!empty($_POST['product_id']) && (!empty($_POST['discount']) || $_POST['discount']==0)){

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
        ?>
        <a href="./admin_boardgames.php"><p class="center_text_index">ÎNAPOI</p></a>
        <?php
    }

    //update_boardgames
    if(isset($_POST['update_boardgames'])){
        if(!empty($_POST['product_id'])){
            
            $product_id=$_POST['product_id'];
            $fill=0;
            $query = "UPDATE boardgames SET ";
            if(!empty($_POST['product_name'])){
                $product_name=$_POST['product_name'];
                $query .= "product_name = '$product_name' ";
                $fill=1;
            }

            if(!empty($_POST['age'] && $_POST['age']!=0)){
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

            if(!empty($_FILES['picture']) && !empty($_FILES['picture']['size'])){
                $file=$_FILES['picture'];
                $picture = upload_image($file);
                if($fill==0){
                    $query .= "picture = '$picture' ";}
                else $query .= ",picture = '$picture' ";
                $fill=1;
            }

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
        ?>
        <a href="./admin_boardgames.php"><p class="center_text_index">ÎNAPOI</p></a>
        <?php
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
        ?>
        <a href="./admin_boardgames.php"><p class="center_text_index">ÎNAPOI</p></a>
        <?php
    }
    //add_new_boardgames
    if(isset($_POST['add_new_boardgames'])){
        if(!empty($_POST['product_id_add']) && !empty($_POST['product_name']) && !empty($_POST['age']) && !empty($_POST['type']) && !empty($_POST['number_players']) && !empty($_POST['price']) && !empty($_POST['description']) && !empty($_FILES['picture']) && $_POST['age']!=0){
            
            $product_id = $_POST['product_id_add'];
            $product_name = $_POST['product_name'];
            $age_value = $_POST['age'];
            $type = $_POST['type'];
            $number_players = $_POST['number_players'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $file=$_FILES['picture'];

            switch($age_value){
                case "1":
                    $age="6+";
                    break;
                case "2":
                    $age="10+";
                    break;
                case "3":
                    $age="14+";
                    break;
                case "4":
                    $age="18+";
                    break;  
            }
            $picture = upload_image($file);
            if($picture != NULL){
                $query = "INSERT INTO boardgames (product_id, product_name, age, type, number_players, price, description, picture, discount, counter) VALUES ('$product_id','$product_name','$age','$type','$number_players','$price','$description','$picture', '0', '0')";
                 $run = mysqli_query($con,$query) or die(mysqli_error($con));

                if($run){
                    echo "Produs adăugat cu succes!";
                }
                else
                    echo "Nu s-a reușit efectuarea acțiunii!";
            }
            else echo "Nu s-a reușit încărcarea imaginii!";
        }
        else{
            echo "Completați toate spațiile";
        }
        ?>
        <a href="./admin_boardgames.php"><p class="center_text_index">ÎNAPOI</p></a>
        <?php
    }

    

    function upload_image($file)
    { 
        if(!empty($file['name']) && !empty($file['tmp_name']) && !empty($file['size'])){
        
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExtension = explode('.', $fileName); //explode desparte stringul in functie de caracterul despartitor, o sa fie util la materiale/culori in BD
        $fileActualExtension = strtolower(end($fileExtension));

        $allowedTypes = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExtension, $allowedTypes)){
            if($fileError === 0) {
                if($fileSize < 16000000){ //aprox 2MB
                    $fileNewName = uniqid('',true).".".$fileActualExtension;
                    $fileDestination = '../Poze/Products/'.$fileNewName;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    return $fileNewName;
                }
                else{
                    echo "Imaginea este prea mare!";
                    return NULL;
                } 
            } 
            else{
                echo "Eroare la încărcare!";
                return NULL;
            } 
        }
        else {
            echo "Nu poți încărca fișiere de acest tip!";
            return NULL;
        }
        }
        else{
            echo "Empty! ";
        }
    }

    //update user
    if(isset($_POST['update_user'])){
        if(!empty($_POST['id']))
        {
            $id = $_POST['id'];
            $fill = 0;

            $query = "UPDATE users SET ";
            if(!empty($_POST['f_name'])){
                $f_name = $_POST['f_name'];
                $query .= "f_name = '$f_name' ";
                $fill = 1;
            }

            if(!empty($_POST['l_name'])){
                $l_name = $_POST['l_name'];
                if($fill == 0)
                {
                    $query .= "l_name = '$l_name' ";
                }
                else $query .= ",l_name = '$l_name' ";
                $fill = 1;
            }

            if(!empty($_POST['email'])){
                $email = $_POST['email'];
                if($fill == 0)
                {
                    $query .= "email = '$email' ";
                }
                else $query .= ",email = '$email' ";
                $fill = 1;
            }

            $query .= "WHERE id = $id";
            if($fill!=0){
                $run = mysqli_query($con,$query) or die(mysqli_error($con));

                if($run){
                    echo "Date utilizator modificate cu succes!";
                }
                else
                 echo "Nu s-a reușit efectuarea acțiunii! :(";
            }
            else 
             echo "Completați măcar 1 spațiu, în afară de cel destinat ID-ului utilizatorului!";
        }
        else {
            echo "Completați spațiul id";
        }
        ?>
        <a href="./admin_boardgames.php"><p class="center_text_index">ÎNAPOI</p></a>
        <?php
    }

    if(isset($_POST["query"]) && isset($_POST["table"]))
    {
        $product_list = '';

        if($_POST["table"]==1)
            $query = "SELECT product_id, product_name FROM boardgames WHERE product_id LIKE '%".$_POST["query"]."%'";
        else 
            $query = "SELECT product_id, product_name FROM toys WHERE product_id LIKE '%".$_POST["query"]."%'";
        
        $result = mysqli_query($con, $query);
        $product_list = '<ul>';
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                $product_list .= '<li>'.$row["product_id"].'-'.$row["product_name"].'</li>';
            }
        }
        else
        {
            $product_list .= '<li>Produs negăsit</li>';
        }
        $product_list .= '</ul>';
        echo $product_list;
    }

    if(isset($_POST["query_add"]) && isset($_POST["table"]))
    {
        $product_list = '';
        
        if($_POST["table"]==1)
            $query = "SELECT product_id FROM boardgames WHERE product_id = '".$_POST["query_add"]."'";
        else 
            $query = "SELECT product_id FROM toys WHERE product_id = '".$_POST["query_add"]."'";
        
        $result = mysqli_query($con, $query);
        $response='';
        if(mysqli_num_rows($result) == 0)
        {
            $response .= 'ID valid';
        }
        else
        {
            $response .= 'ID-ul acesta exista deja!';
        }
        
        echo $response;
    }

?>