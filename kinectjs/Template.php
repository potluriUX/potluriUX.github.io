<?php
require_once './pword/PHPWord.php';

$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate($_POST['template']);
//$document->setValue('name', 'CCS Consulting Company');
//$document->setValue('name2', 'Spu');
$document->setValue('Value1', $_POST['d1']);
$document->setValue('Value2', $_POST['d2']);
$document->setValue('Value3', $_POST['d3']);
$document->setValue('Value4', $_POST['d4']);
$document->setValue('Value5', $_POST['d5']);
$document->setValue('Value6', $_POST['h1']);
$document->setValue('Value7', $_POST['h2']);
$document->setValue('Value8', $_POST['h3']);
$document->setValue('Value9', $_POST['h4']);
$document->setValue('Value10', $_POST['h5']);

$document->setValue('weekday', date('l'));
$document->setValue('time', date('H:i'));
$document->setValue('companyname2', $_POST['companyname']);
$document->setValue('companyname', $_POST['clientname']);
$document->setValue('yourname', $_POST['yourname']);
$sum=0;
    for($i=1;$i<=5;$i++){
        if($_POST['h'.$i ]){
    $st_end_hours=explode('-', $_POST['h'.$i ]);
    if($st_end_hours[0]>=7){
        
    }else{
       $st_end_hours[0]= $st_end_hours[0]+12;
    }
    
    if($st_end_hours[1]>=7){
        
    }else{
        $st_end_hours[1] =$st_end_hours[1]+12;
    }
    $diff = $st_end_hours[1]-$st_end_hours[0];
    $document->setValue('hours'.$i, $diff);
    //echo $diff;
    $sum = $sum+$diff;
        }else{
            $document->setValue('hours'.$i, '');
        }
}
//die;
//$document->setValue('hours1', '8');
//$document->setValue('hours2', '8');
//$document->setValue('hours3', '8');
//$document->setValue('hours4', '8');
//$document->setValue('hours5', '8');
$document->setValue('th', $sum);
$document->setValue('clientmanager', $_POST['managername']);
$document->setValue('date', date('Y/m/d'));



//$document->save('Solarsystem.docx');


$temp_file_uri = time();//tempnam('', 'xyz');
$document->save($temp_file_uri);

// Download the file:
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=myfile.docx');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Content-Length: ' . filesize($temp_file_uri));
flush();
readfile($temp_file_uri);

unlink($temp_file_uri); // deletes the temporary file
exit;
