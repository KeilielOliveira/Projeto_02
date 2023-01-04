<?php 

class Painel {
    public static function selecionarTabela($tb,$tipo,$i) {
        if($tipo == 'tudo' || $tipo == '*' || $tipo == 'all') {
            $sql = MySql::connect()->prepare("SELECT * FROM `$tb`");
            $sql->execute();
            return $sql->fetchAll();
        }else if($tipo == '') {
            $sql = MySql::connect()->prepare("SELECT `$i` FROM `$tb`");
            $sql->execute();
            return $sql->fecth();
        }
    }
}

?>