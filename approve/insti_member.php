<?php
     
     require 'fpdf182/fpdf.php';
        $pdf = new FPDF('L','mm','A5');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->setTextColor(252, 3, 3);
        
        $pdf->Image('header_background.jpg',0,0,210);
        $pdf->Ln(10);
        
        $pdf->setLeftMargin(30);
        $pdf->setTextColor(0, 0, 0);

       
        // table rows
        $pdf->Ln(20);
        $pdf->SetFont('Arial','',25);
        $pdf->SetFont('','');
        $pdf->setTextColor(0,51,102);
        $pdf->setLeftMargin(85);
        $con = new PDO("mysql:host=localhost;dbname=icfhe_certificate","root","");
        if(isset($_GET['em_id']))
        {
            $id = $_GET['em_id'];
        }

        $query ="SELECT * FROM institutional_member WHERE id='$id'";
        $result = $con->prepare($query);
        $result->execute();
        if($result->rowCount()!=0)
        {
                        
            while($employe = $result->fetch())
            {
              
              $pdf->Cell(40,70,$employe['organisation_name'],0,0,'C');
            }

        }
        else{
            
            echo "Not Found Record";
        }
        
        $pdf->Ln(40);
        $pdf->SetFont('Arial','',12);
        $pdf->setLeftMargin(30);
        $pdf->setTextColor(97, 97, 97);
        $pdf->Cell(10);
        $pdf->Cell(20,20,'Member of IC InnovatorClub ',0,1,'C');
   
        $pdf->Ln(3);
        $pdf->SetFont('Arial','',14);
        $pdf->setTextColor(0, 0, 0);
        $pdf->Image('images/signature.jpg',150,97,'40');
        
        $pdf->Ln(12);
        $pdf->Cell(5);
        $pdf->setLeftMargin(0);

        $query ="SELECT * FROM institutional_member WHERE id='$id'";
        $result = $con->prepare($query);
        $result->execute();
        if($result->rowCount()!=0)
        {
                        
            while($employe = $result->fetch())
            {
              
              $pdf->Cell(10,10,$employe['issue_date'],0,0,'C');
            }

        }
        else{
            
            echo "Not Found Record";
        }
        $pdf->setRightMargin(27);
        $pdf->Cell(0,10,'V K Singh',0,1,'R');
        $pdf->SetFont('Arial','',10);
        $pdf->setTextColor(97, 97, 97);
        $pdf->setRightMargin(10);
        $pdf->Cell(0,1,'Managing Director of InnovatioCuris ',0,1,'R');

      
      $pdf->Ln();
          if(isset($_GET['em_id']))
           
            {
                $pdf->output("Ic-InnovatorClub-Membership-Certificate.pdf","F");

              header("Content-type: application/pdf");
                header("Content-disposition: attachment; filename = Ic-InnovatorClub-Membership-Certificate.pdf");

                readfile("Ic-InnovatorClub-Membership-Certificate.pdf");
               // unlink("Ic-InnovatorClub-Membership-Certificate.pdf");

            }



$pdf->Output();

?>