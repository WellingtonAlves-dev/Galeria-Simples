<?php
include "Config.php";

class Catalogo {
    private $pdo;

    public function __construct($host, $user, $pass, $dbname) {
        $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    }

    public function getItems() {
        $stmt = $this->pdo->prepare("SELECT * FROM items ORDER BY ID DESC"); //Se caso queira que a mais velha fique no topo mude de DESC para ASC
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function insertItem($titulo, $desc, $pic) {
        if($this->validarImg($pic['tmp_name'])) {
            $target_dir = DEFAULT_URL.'img/';
            $new_nome = date('YmDHis').$pic['name'];
            $target = $target_dir.$new_nome;
            $targetU = "../../img/".$new_nome;
            move_uploaded_file($pic['tmp_name'], $targetU);

            $stmt = $this->pdo->prepare("INSERT INTO items(title, description, pic) VALUES (?, ?, ?)");
            $stmt->bindParam(1, $titulo);
            $stmt->bindParam(2, $desc);
            $stmt->bindParam(3, $target);
            $stmt->execute();
            return true;
        }
        else {
            return false;
        }
    }

    public function validarImg($img_path) {
        return exif_imagetype($img_path) == IMAGETYPE_JPEG || exif_imagetype($img_path) == IMAGETYPE_PNG ||
        exif_imagetype($img_path) == IMAGETYPE_BMP || exif_imagetype($img_path) == IMAGETYPE_GIF ||
        exif_imagetype($img_path) == IMAGETYPE_WEBP;
    }

}
?>