<?php 
    $id = $_GET['id'];
    $info = MySql::connect()->prepare("SELECT * FROM `tb_admin.depoimentos` WHERE id=$id");
    $info->execute();
    $info = $info->fetch();
    echo $info['nome'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo include_path_painel ?>css/editar-home.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Depoimentos</title>
</head>
<body>
    
    <header>
        <h2>Bem vindo a pagina de <b>edição</b> de <b>Depoimentos</b>!</h2>
    </header>

    <div class="box-edit">
        <div class="title">
        <i class="fa-solid fa-pen"></i>
            <h3>Editar Depoimento</h3>
        </div>
        <div class="content">
            <form method="post" class="send-form">
                <label>Editar Nome</label>
                <input type="text" name="nome" value="<?php echo $info['nome'] ?>">
                <label>Editar Depoimento</label>
                <textarea name="depoimento"><?php echo $info['conteudo'] ?></textarea>
                <input type="submit" value="Enviar" class="send" name="send">
            </form>
        </div>
    </div>


    <?php  
        if(isset($_POST['send'])) {
            $var = Painel::atualizar(['tb'=>'tb_admin.depoimentos','nome'=>$_POST['nome'],'conteudo'=>$_POST['depoimento'],'id'=>$id],'send');
            if($var == true) {
                Painel::redirect(include_path_painel.'?sucesso');
            }else {
                Painel::warning('erro','Ocorreu um erro!Verifique os valores e tente novamente.');
            }
        }
    ?>
    
</body>
</html>