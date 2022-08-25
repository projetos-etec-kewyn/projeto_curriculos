<?php
use Dompdf\Dompdf;

require_once "../dompdf/autoload.inc.php";

$dompdf = new Dompdf();

$dompdf->loadHtml('
    <h1>Oi</h1>
');
$dompdf->render();
$dompdf->stream(
    "relatorio.pdf",
    array(
        "Attachment"=>false
    )
);

?> 