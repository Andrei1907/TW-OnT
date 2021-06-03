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

    if(isset($_POST['download-csvb']) || isset($_POST['download-csvt']))
    {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');
        $output = fopen("php://output", "w");
        if(isset($_POST['download-csvb'])) //e boardgame
        {
            fputcsv($output, array('ID','Produs','Varsta','Tip','Jucatori','Pret','Vanzari'));
            $query = "select product_id, product_name, age, type, number_players, price, counter from boardgames order by counter desc";
        }
        else { //e jucarie
            fputcsv($output, array('ID','Produs','Varsta','Material','Culoare','Pret','Vanzari'));
            $query = "select product_id, product_name, age, material, color, price, counter from toys order by counter desc";
        }

        $queryResult = mysqli_query($con, $query);
        
        while($row = mysqli_fetch_assoc($queryResult))
        {
            fputcsv($output, $row);
        }

        fclose($output);
    }

    /*if(isset($_POST['download-pdfb']))
    {
        $query = "select product_id, product_name, age, type, number_players, price, counter from boardgames order by counter desc";
        $queryResult = mysqli_query($con, $query);

        while($row = mysqli_fetch_assoc($queryResult))
        {

        }
    }*/

?>