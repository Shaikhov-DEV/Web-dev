<?php
include("checks.php");
require('tfpdf/tfpdf.php');
require_once 'connect.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к БД";
}

    $pdf = new tFPDF();
    $pdf->AddFont('PDFFont','','cour.ttf');
    $pdf->SetFont('PDFFont','',12);
    $pdf->AddPage();

    $pdf->Cell(60);
    $pdf->Cell(80,10,'Операционные системы',1,0,'C');
    $pdf->Ln(20);

    $pdf->SetFillColor(200,200,200);
    $pdf->SetFontSize(6);

    $header = array("п/п","Название","Тип","Разрядность","Разработчик","Ключ","Дата приобретения","Дата окончания","URL магазина");
    $w = array(6,20,15,25,20,30,20,20,45);
    $h = 20;
    for ($c = 0; $c < 9; $c++){
        $pdf->Cell($w[$c],$h,$header[$c],'LRTB','0','',true);
    }
    $pdf->Ln();

    // Запрос на выборку сведений о пользователях
    $result = $mysqli->query("SELECT
        os.os_name as os_name,
        os.os_type as os_type,
        os.os_bit as os_bit,
        os.os_dev as os_dev,
        kl.key_name,
        kl.key_date,
        kl.key_date_end,
        stores.stores_url as url
        FROM kl
        LEFT JOIN os ON kl.id_os=os.id_os
        LEFT JOIN stores ON kl.id_stores=stores.id_stores"
    );

    if ($result){
        $counter = 1;
        // Для каждой строки из запроса
        while ($row = $result->fetch_row()){
            $pdf->Cell($w[0],$h,$counter,'LRBT','0','C',true);
            $pdf->Cell($w[1],$h,$row[0],'LRB');

            for ($c = 2; $c < 9; $c++){
                if ($c==6 || $c==7){
                    $row[$c-1] = date('d-m-Y', strtotime($row[$c-1]));
                }
                $pdf->Cell($w[$c],$h,$row[$c-1],'RB');
            }
            $pdf->Ln();
            $counter++;
        }
    }

    $pdf->Output("I",'os.pdf',true);
?>