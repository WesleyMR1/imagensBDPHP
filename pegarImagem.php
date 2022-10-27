<?php

$dsn = "mysql:dbname=dbSistemas;host=localhost";
$username = "root";
$password = "";


try {
    $pdo = new PDO($dsn, $username, $password);
  $pdo->exec("SET CHARACTER SET utf8");

} catch (PDOException $e) {
    die("Error: ".$e);
}

$sql = $pdo->prepare("Select * from pessoa;");
$sql->execute();




foreach($sql as $rows => $values) {
		
    echo "<img src='getImagem.php?PicNum=$values\">";
}

