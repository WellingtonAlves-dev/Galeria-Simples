<?php
require_once("../Model/Catalogo.php");
require_once("../Model/Config.php");

$catalogo = new Catalogo(HOST, USER, PASS, DBNAME);

$titulo = $_POST['titulo'];
$desc = $_POST['desc'];
$pic = $_FILES['pic'];
if($catalogo->insertItem($titulo, $desc, $pic)) {
    header("Location: ../../index.php");
}
else {
    echo "Envie um arquivo de imagem valido!";
}

?>