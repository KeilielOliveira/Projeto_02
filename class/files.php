<?php 

class Files {

    public static function uploadFile($file) {
        $formatoDaImagem = explode('.',$file['name']) ;
        $nomeImagem = uniqid().'.'.$formatoDaImagem[count($formatoDaImagem) - 1]  ;
        if(move_uploaded_file($file['tmp_name'],base_dir_painel.'upload/'.$nomeImagem )) {
            return $nomeImagem;
        }else {
            return false;
        }
    }


    public static function deleteFile($file) {
        @unlink('upload/'.$file);
    }

}

?>