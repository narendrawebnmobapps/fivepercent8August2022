<?php
$dbhost = 'localhost';
$dbusername = 'websiwvj_fiveper';
$dbpassword = 'CVO9(Gymz}mv';
$dbname = 'websiwvj_fivepercent';
$db = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>