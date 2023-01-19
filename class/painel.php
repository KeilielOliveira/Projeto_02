<?php 

class Painel {
    //Seleciona itens da tabela especificada.
    public static function selecionarTabela($arr) {
        $name = $arr['nome'];
        $tb = $arr['tb'];
        $condition = $arr['condition'];
        $query = "SELECT ";
        if($name == '') {
            $query.="* ";
        }
        $query.= " FROM `$tb` ";
        if($condition != '') {
            $query.= "WHERE $condition";
        }
        $sql = MySql::connect()->prepare($query);
        $sql->execute();
        $return = $sql->fetch();
        return $return;
    }

    public static function warning($arr) {
        $msg = $arr['msg'];
        if($arr['tipo'] == 'erro') {
            echo '<div class="warning err"/>'.$msg.'<i class="fa-solid close fa-xmark"></i></div>';
        }else if($arr['tipo'] == 'sucesso') {
            echo '<div class="warning sucess"/>'.$msg.'<i class="fa-solid close fa-xmark"></i></div>';
        }
    }

    //Redireciona para uma pagina.
    public static function redirect($url) {
        echo '
        <script>
        $(".close").click(()=> {
            location.hred="'.$url.'"
        })
        </script>' ;
        die();
    }

    //Inseri no banco de dados.
    public static function inserir($arr,$excep) {
        $tb = $arr['tb'];
        $return = true;
        $val = $arr['val'];
        $query = "INSERT INTO `$tb` VALUES (null";
        foreach ($val as $key => $value) {
            if($key == $excep) {
                continue;
            }
            if($value == '') {
                $return = false;
                break;
            }
            $query.= ",?" ;
        }
        $query.= ") ";
        if($return == true) {
            $sql = MySql::connect()->prepare($query);
            $sql->execute($val);
        }
        return $return;
    }

    public static function atualizar($arr) {
        $return = true;
        $verifi = false;
        $tb = $arr['tb'];
        $query = "UPDATE `tb` SET ";
        foreach ($arr as $key => $value) {
            if($key == 'tb' || $key == 'id' || $key == 'send') {
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
            $par = $value;
        }
        if($return == true) {
            $par[] = $arr['id'];
            echo $query;
            $sql = MySql::connect()->prepare($query."WHERE id=?");
            $sql->execute($par);
        }
        return $return;
    }
}

?>