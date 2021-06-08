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

    //export date CSV
    if(isset($_POST['download-csvb']) || isset($_POST['download-csvt']) || isset($_POST['download-csvu']))
    {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');
        $output = fopen("php://output", "w");

        if(isset($_POST['download-csvb'])) //boardgames
        {
            fputcsv($output, array('ID','Produs','Varsta','Tip','Jucatori','Pret','Vanzari'));
            $query = "select product_id, product_name, age, type, number_players, price, counter from boardgames order by counter desc";
        }
        else if(isset($_POST['download-csvb'])) //jucarii
        {
            fputcsv($output, array('ID','Produs','Varsta','Material','Culoare','Pret','Vanzari'));
            $query = "select product_id, product_name, age, material, color, price, counter from toys order by counter desc";
        }
        else { //utilizatori
            fputcsv($output, array('ID','Nume','Prenume','Email','Data creare cont'));
            $query = "select id, l_name, f_name, email, date from users order by date";
        }

        $queryResult = mysqli_query($con, $query);
        
        while($row = mysqli_fetch_assoc($queryResult))
        {
            fputcsv($output, $row);
        }

        fclose($output);
    }

    if(isset($_POST['view-pdfb']) || isset($_POST['download-pdfb']) || isset($_POST['view-pdft']) || isset($_POST['download-pdft']) || isset($_POST['view-pdfu']) || isset($_POST['download-pdfu']))
    {
        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('arial','b','12');

        if(!(isset($_POST['view-pdfu']) || isset($_POST['download-pdfu']))) //boardgames sau jucarii - template similar
        {
            $pdf->Write(5,'Clasament produse dupa numarul de vanzari');
            $pdf->Ln(10);
    
            if(isset($_POST['view-pdfb']) || isset($_POST['download-pdfb']))
            {
                $pdf->SetTitle('Statistici - boardgames');
                $pdf->cell('15','10','ID','1','0','C');
                $pdf->cell('35','10','Produs','1','0','C');
                $pdf->cell('20','10','Varsta','1','0','C');
                $pdf->cell('40','10','Tip','1','0','C');
                $pdf->cell('30','10','Jucatori','1','0','C');
                $pdf->cell('25','10','Pret','1','0','C');
                $pdf->cell('30','10','Vanzari','1','1','C');
            }
            else {
                $pdf->SetTitle('Statistici - jucarii');
                $pdf->cell('15','10','ID','1','0','C');
                $pdf->cell('35','10','Produs','1','0','C');
                $pdf->cell('20','10','Varsta','1','0','C');
                $pdf->cell('35','10','Material','1','0','C');
                $pdf->cell('30','10','Culoare','1','0','C');
                $pdf->cell('25','10','Pret','1','0','C');
                $pdf->cell('30','10','Vanzari','1','1','C');
            }
        }
        else { //utilizatori - alt template de date
            $pdf->Write(5,'Lista utilizatori dupa data crearii contului');
            $pdf->Ln(10);

            $pdf->SetTitle('Statistici - utilizatori');
            $pdf->cell('15','10','ID','1','0','C');
            $pdf->cell('30','10','Nume','1','0','C');
            $pdf->cell('35','10','Prenume','1','0','C');
            $pdf->cell('55','10','Adresa email','1','0','C');
            $pdf->cell('40','10','Data creare cont','1','1','C');
        }
        
        if(isset($_POST['view-pdfb']) || isset($_POST['download-pdfb'])) //date boardgames
        {
            $query = "select product_id, product_name, age, type, number_players, price, counter from boardgames order by counter desc";
        }
        else if(isset($_POST['view-pdft']) || isset($_POST['download-pdft'])) //date jucarii
        {
            $query = "select product_id, product_name, age, material, color, price, counter from toys order by counter desc";
        }
        else { //date utilizatori
            $query = "select id, l_name, f_name, email, date from users order by date";
        }
        
        $queryResult = mysqli_query($con, $query);

        $pdf->SetFont('arial','','10');
        while($row = mysqli_fetch_assoc($queryResult))
        {
            if(isset($_POST['view-pdfb']) || isset($_POST['download-pdfb']))
            {
                $pdf->cell('15','10',$row['product_id'],'1','0','C');
                $pdf->cell('35','10',$row['product_name'],'1','0','C');
                $pdf->cell('20','10',$row['age'],'1','0','C');
                $pdf->cell('40','10',$row['type'],'1','0','C');
                $pdf->cell('30','10',$row['number_players'],'1','0','C');
                $pdf->cell('25','10',$row['price'],'1','0','C');
                $pdf->cell('30','10',$row['counter'],'1','1','C');
            }
            else if(isset($_POST['view-pdft']) || isset($_POST['download-pdft']))
            {
                $pdf->cell('15','10',$row['product_id'],'1','0','C');
                $pdf->cell('35','10',$row['product_name'],'1','0','C');
                $pdf->cell('20','10',$row['age'],'1','0','C');
                $pdf->cell('35','10',$row['material'],'1','0','C');
                $pdf->cell('30','10',$row['color'],'1','0','C');
                $pdf->cell('25','10',$row['price'],'1','0','C');
                $pdf->cell('30','10',$row['counter'],'1','1','C');
            }
            else {
                $pdf->cell('15','10',$row['id'],'1','0','C');
                $pdf->cell('30','10',$row['l_name'],'1','0','C');
                $pdf->cell('35','10',$row['f_name'],'1','0','C');
                $pdf->cell('55','10',$row['email'],'1','0','C');
                $pdf->cell('40','10',$row['date'],'1','1','C');
            }
        }

        if(isset($_POST['view-pdfb']) || isset($_POST['view-pdft']) || isset($_POST['view-pdfu']))
        {
            $pdf->Output();
        }
        else {
            $pdf->Output('D','','');
        }

    }

?>