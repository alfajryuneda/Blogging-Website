<?php 
    $db = new PDO('mysql:host=localhost;dbname=uas_pemweb', 'root', '');

    class myPDF extends FPDF{
        function header(){
            // $this->Ln(25);
            $this->Image('export/pdf/logo5.png', 10,10, 30);
            $this->SetFont('Arial', 'B', 26);
            $this->Cell(276, 30, 'Tabel Postingan Blog', 0, 0 ,'C');
            $this->Cell(276, 10,'Street Address of Employee', 0, 0, 'C');
            $this->Ln(20);
        }
        function footer(){
            $this->SetY(-15);
            $this->SetFont('Arial', '', 8);
            $this->Cell(0,10, 'Page '.$this->PageNo().'/{nb}', 0, 0, 'C');
        }
        function headerTable(){
            $this->Ln(30);
            $this->SetFont('Times', 'B', 12);
            $this->Cell(20, 10, 'Id', 1, 0, 'C');
            $this->Cell(80, 10, 'Judul', 1, 0, 'C');
            $this->Cell(30, 10, 'Kategori', 1, 0, 'C');
            $this->Cell(60, 10, 'Tanggal', 1, 0, 'C');
            $this->Cell(20, 10, 'View', 1, 0, 'C');
            $this->Ln();
        }
        function viewTable($db){
            // $this->SetFont('Times', 12);
            $stmt = $db->query('SELECT * FROM post');
            while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {
                $this->Cell(20,10, $data->id,1,0,'C');
                $this->Cell(80,10, $data->judul,1,0,'C');
                $this->Cell(30,10, $data->kat,1,0,'C');
                $this->Cell(60,10, $data->tanggal,1,0,'C');
                $this->Cell(20,10, $data->view,1,0,'C');
                $this->Ln();
            }
        }
    }

    $pdf = new myPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L', 'A4', 0);
    $pdf->SetLeftMargin(45);
    $pdf->headerTable();
    $pdf->viewTable($db);
    $pdf->Output();
?>