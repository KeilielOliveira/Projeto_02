<?php 

class Painel {
    //Seleciona itens da tabela especificada.
    public static function selecionarTabela($arr) {
        $tb = $arr['tb'];
        $sql = MySql::connect()->prepare("SELECT * FROM `$tb`");
        $sql->execute();
        $return = $sql->fetch();
        return $return;
    }

    public static function warning($tipo,$msg) {

        if($tipo == 'erro') {
            echo '<div class="warning err"/>'.$msg.'<i class="fa-solid close fa-xmark"></i></div>';
        }else if($tipo == 'sucesso') {
            echo '<div class="warning sucess"/>'.$msg.'<i class="fa-solid close fa-xmark"></i></div>';
        }

    }

    //Redireciona para uma pagina.
    public static function redirect($url) {
        echo '<script>location.hred="'.$url.'"</script>' ;
        die();
    }

    //Inseri no banco de dados.
    public static function inserir($arr,$excep) {
        $tb = $arr['tb'];
        $return = true;
        $query = "INSERT INTO `$tb` VALUES (null";
        foreach ($arr as $key => $value) {
            if($key == $excep || $key == 'tb') {
                continue;
            }
            if($value == '') {
                $return = false;
                break;
            }
            $query.= ",?" ;
            $val[] = $value;
        }
        $query.= ") ";
        if($return == true) {
            $sql = MySql::connect()->prepare($query);
            $sql->execute($val);
        }
        return $return;
    }

    public static function atualizar($arr,$excep) {
        $return = true;
        $verifi = false;
        $tb = $arr['tb'];
        $query = "UPDATE `$tb` SET ";
        foreach ($arr as $key => $value) {
            if($key == 'tb' || $key == 'id' || $key == $excep) {
                continue;
            }
            if($value == '') {
                $return = false;
                break;
            }
            if($verifi == false) {
                $verifi = true;
                $query.="$key=?";
            }else {
                $query.=",$key=?";
            }
            $par[] = $value;
        }
        if($return == true) {
            $par[] = $arr['id'];
            $sql = MySql::connect()->prepare($query."WHERE id=?");
            $sql->execute($par);
        }
        return $return;
    }

    
    public static function login() {
        return isset($_SESSION['logado']) ? true : false;
    }
}

?>