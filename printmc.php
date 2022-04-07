<?php

require_once __DIR__ . '/vendor/autoload.php';

$name = $_POST['name'];
$ic = $_POST['ic'];
$days = $_POST['days'];
$from = $_POST['from'];
$to = $_POST['to'];

$mpdf = new \Mpdf\Mpdf();
$mpdf -> setFont('Montserrat-Bold', 14);

// Create pdf
$data ='';

$data .= '<h1>Medical Certificate</h1>';
$data .= '<h2>To: ' . $name . '</h2>';
$data .= 'This is to certify that Mr/Ms <strong>' . $name . '</strong> with ';
$data .= 'IC/Passport No. <strong>' . $ic . '</strong>';
$data .= ' on <strong>' . $from . '</strong> has been advised ';
$data .= 'to stay off work/school for a period of <strong>' . $days . '</strong> day(s) starting ';
$data .= 'from <strong>' . $from . '</strong>';
$data .= ' to <strong>' . $to . '</strong><br/>';

$mpdf->WriteHTML($data);

// Output to browser
$mpdf->Output('mc.pdf', 'D');

header('Location: index.php');