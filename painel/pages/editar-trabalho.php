<?php 
$id = $_GET['id'];

$info = MySql::connect()->prepare("SELECT * FROM `tb_admin.trabalho` WHERE id=$id");
$info->execute();
$info = $info->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo include_path_painel ?>css/editar-home.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Trabalho</title>
</head>
<body>
    
    <header>
        <h2>Bem vindo a pagina de <b>edição</b> de <b>Trabalhos</b>!</h2>
    </header>

    <div class="box-edit">
        <div class="title">
        <i class="fa-solid fa-pen"></i>
            <h3>Editar Trabalho</h3>
        </div>
        <div class="content">
            <form method="post" class="send-form" enctype="multipart/form-data">
                <label>Editar Icone</label>
                <input type="file" name="icon">
                <input type="hidden" name="last_icon" value="<?php $info['icon'] ?>">
                <label>Editar Titulo</label>
                <input type="text" name="titulo" value="<?php echo $info['titulo'] ?>">
                <label>Editar COnteudo</label>
                <textarea name="conteudo"><?php echo $info['conteudo'] ?></textarea>
                <label>Editar Link</label>
                <input type="text" name="link" value="<?php echo $info['link'] ?>">
                <input type="submit" value="Enviar" class="send" name="send">
            </form>
        </div>
    </div>


    <?php  
        if(isset($_POST['send'])) {
            $img = $_FILES['icon'];
            if($img['name'] == '') {
                $img = $_POST['last_icon'];
            }else {
                $img = Files::uploadFile($img);
            }
            $var = Painel::atualizar(['tb'=>'tb_admin.trabalho','titulo'=>$_POST['titulo'],'icon'=>$img,'conteudo'=>$_POST['conteudo'],'link'=>$_POST['link'],'id'=>$id],'send');
            if($var == true) {
                Files::deleteFile($_POST['last_icon']);
                Painel::redirect(include_path_painel.'?sucesso');
            }else {
                Painel::warning('erro','Ocorreu um erro!Verifique os valores e tente novamente.');
            }
        }
    ?>

</body>
</html>