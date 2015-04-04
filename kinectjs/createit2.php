<?php
header('Content-Disposition: inline');
header('Content-type: image/png');
//echo $_POST['form_dataurl'];
$data = $_POST['form_dataurl'];
list($type, $data) = explode(';', $data);
list(, $data)      = explode(',', $data);
$data = base64_decode($data);

echo $data;
