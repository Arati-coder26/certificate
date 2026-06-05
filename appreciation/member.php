<?php
     
     require '../approve/fpdf182/fpdf.php';
        $pdf = new FPDF('L','mm','A4');
        /*$pdf = new FPDF('L','mm',array(145,190));*/
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->setTextColor(252, 3, 3);
        
        $pdf->Image('images/Certificate-For-10- finalists.jpg',-2,0,300);
        $pdf->Ln(10);
        $pdf->setLeftMargin(10);
        $pdf->setTextColor(0, 0, 0);

        
        $pdf->Ln(47);
        $pdf->setLeftMargin(190);
        $pdf->AddFont('OpenSans','','OpenSans-ExtraBoldItalic.php');
        $pdf->SetFont('OpenSans','',18);
        $pdf->SetFont('','');
        $pdf->setTextColor(2, 2, 2);
        $pdf->setLeftMargin(50);
        $con = new PDO("mysql:host=localhost;dbname=samadhan","root","");
        if(isset($_GET['em_id']))
        {
            $id = $_GET['em_id'];
        }

        $query ="SELECT * FROM appreciation WHERE id='$id'";
        $result = $con->prepare($query);
        $result->execute();
        if($result->rowCount()!=0)
        {
                        
            while($employe = $result->fetch())
            {
              
              $pdf->Cell(25,40,$employe['member_name'],0,0,'C');

            }

        }
        else{
            
            echo "Not Found Record";
        }
        
        $pdf->Ln(23);
        $pdf->SetFont('Arial','',15);
        $pdf->setLeftMargin(10);
        $pdf->setTextColor(2, 2, 2);
        $query ="SELECT * FROM appreciation WHERE id='$id'";
        $result = $con->prepare($query);
        $result->execute();
        if($result->rowCount()!=0)
        {
                        
            while($employe = $result->fetch())
            {
              
              $pdf->Cell(0,10,$employe['organisation'],0,1,'C');

            }

        }
        else{
            
            echo "Not Found Record";
        }

      

     $pdf->Ln();
          if(isset($_GET['em_id']))
           
            {
                $pdf->output("Samadhan-certificate of appreciation.pdf","F");

              header("Content-type: application/pdf");
                header("Content-disposition: attachment; filename = Samadhan-certificate of appreciation.pdf");

                readfile("Samadhan-certificate of appreciation.pdf");
               

         }

$pdf->Output();

?>