<?php
session_start();
require(dirname(__FILE__) . "../../dbconnect.php");

$stmt = $db->query('SELECT * FROM customers');
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>企業情報追加</title>
</head>
<body>
    
</body>
</html>