<?php
session_start();

    require_once '../FPDF/fpdf.php';
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

    if(isset($_POST['view-pdfb']) || isset($_POST['download-pdfb']) || isset($_POST['view-pdft']) || isset($_POST['download-pdft']))
    {
        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('arial','b','12');
        if(isset($_POST['view-pdfb']) || isset($_POST['download-pdfb']))
        {
            $pdf->cell('15','10','ID','1','0','C');
            $pdf->cell('45','10','Produs','1','0','C');
            $pdf->cell('25','10','Varsta','1','0','C');
            $pdf->cell('25','10','Tip','1','0','C');
            $pdf->cell('30','10','Jucatori','1','0','C');
            $pdf->cell('25','10','Pret','1','0','C');
            $pdf->cell('30','10','Vanzari','1','1','C');
        }
        else {
            $pdf->cell('15','10','ID','1','0','C');
            $pdf->cell('45','10','Produs','1','0','C');
            $pdf->cell('25','10','Varsta','1','0','C');
            $pdf->cell('25','10','Tip','1','0','C');
            $pdf->cell('30','10','Material','1','0','C');
            $pdf->cell('25','10','Culoare','1','0','C');
            $pdf->cell('30','10','Vanzari','1','1','C');
        }

        if(isset($_POST['view-pdfb']) || isset($_POST['download-pdfb']))
        {
            $query = "select product_id, product_name, age, type, number_players, price, counter from boardgames order by counter desc";
        }
        else {
            $query = "select product_id, product_name, age, material, color, price, counter from toys order by counter desc";
        }
        
        $queryResult = mysqli_query($con, $query);

        $pdf->SetFont('arial','','10');
        while($row = mysqli_fetch_assoc($queryResult))
        {
            if(isset($_POST['view-pdfb']) || isset($_POST['download-pdfb']))
            {
                $pdf->cell('15','10',$row['product_id'],'1','0','C');
                $pdf->cell('45','10',$row['product_name'],'1','0','C');
                $pdf->cell('25','10',$row['age'],'1','0','C');
                $pdf->cell('25','10',$row['type'],'1','0','C');
                $pdf->cell('30','10',$row['number_players'],'1','0','C');
                $pdf->cell('25','10',$row['price'],'1','0','C');
                $pdf->cell('30','10',$row['counter'],'1','1','C');
            }
            else {
                $pdf->cell('15','10',$row['product_id'],'1','0','C');
                $pdf->cell('45','10',$row['product_name'],'1','0','C');
                $pdf->cell('25','10',$row['age'],'1','0','C');
                $pdf->cell('25','10',$row['material'],'1','0','C');
                $pdf->cell('30','10',$row['color'],'1','0','C');
                $pdf->cell('25','10',$row['price'],'1','0','C');
                $pdf->cell('30','10',$row['counter'],'1','1','C');
            }
        }

        if(isset($_POST['view-pdfb']) || isset($_POST['view-pdft']))
        {
            $pdf->Output();
        }
        else {
            $pdf->Output('D','','');
        }

    }

?>