<?php

$dsn = "mysql:dbname=dbSistemas;host=localhost";
$username = "root";
$password = "";
$imagem = $_FILES['imagem'];



if ($imagem != null) {
    
    $nomeFinal = time().'.jpg';

    if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
        
        
        $tamanhoImg = filesize($nomeFinal);

        $mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));

        try {
            $pdo = new PDO($dsn, $username, $password);
          $pdo->exec("SET CHARACTER SET utf8");
     
        } catch (PDOException $e) {
            die("Error: ".$e);
        }

        $sql = $pdo->prepare("Insert into pessoa (PES_IMG) VALUES (:mysqlImg)");

        $sql->bindParam(':mysqlImg', $mysqlImg);
        $sql->execute();

        unlink($nomeFinal);


    }else {
        echo("Upload nao feito!");
    }



}