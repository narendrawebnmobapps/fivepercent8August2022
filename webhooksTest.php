<?php 
/*$json = file_get_contents('php://input');

if(empty($json))
{
	$file = fopen("newfileweb.txt","r");
	echo fgets($file);
	fclose($file);
}
else
{
	$myfile = fopen("newfileweb.txt", "w") or die("Unable to open file!");
	$txt = "John Doe\n";
	fwrite($myfile, $json);
}*/

$data['success'] = true;
echo json_encode($data);


?>