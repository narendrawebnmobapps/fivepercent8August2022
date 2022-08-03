<?php
header('Access-Control-Allow-Origin: *');
$array = array(
				'name'=>'Avdhesh',
				'agw'=>30,
				'Sex'=>'Male'
				);
echo json_encode($array);

