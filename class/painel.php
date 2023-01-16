<?php 

class Painel {
    public static function selecionarTabela($tb,$query,$i) {
        if($query != '') {
            $sql = MySql::connect()->prepare("SELECT $i FROM `$tb` $query");
            $sql->execute();
            return $sql->fetch();
        }else {
            $sql = MySql::connect()->prepare("SELECT * FROM `$tb`");
            $sql->execute();
            return $sql->fetch();
        }
    }

    //Inseri no banco de dados.
    public static function inserir($val,$tb,$query) {
        if($query != '') {
            $sql = MySql::connect()->prepare("INSERT $val IN TO `$tb` $query");
            $sql->execute();
        }else {
            $sql = MySql::connect()->prepare("INSERT INTO `$tb` (logo_text,logo_image) VALUES (?,?)");
            $sql->execute($val);
        }
    }

    public static function atualizar($val,$tb,$identifier) {
            $query = "UPDATE `$tb` SET ";
            $par = count($identifier) - 1;
            for ($i=0;$i<$par;$i++) {
                if($i<$par) {
                    $query .= $identifier[$i]." = ?,";
                }else if($i == $par) {
                    $query .= $identifier[$i]." = ?";
                }

            };
            $sql = MySql::connect()->prepare($query);
            echo $query;
            $sql->execute($val);
    }
    
}

?>