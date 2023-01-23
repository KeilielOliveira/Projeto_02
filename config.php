<?php 

session_start();


date_default_timezone_set('America/Sao_Paulo');

spl_autoload_register(function ($class) {
    include 'class/'.$class.'.php';
});

define("include_path","http://localhost/GitHub/Projeto_02/");
define("include_path_painel",include_path."painel/");
define("base_dir_painel",__DIR__.'/painel/');

define("HOST",'localhost');
define("DB",'projeto_02');
define("USER",'root');
define("PASS",'');

?>