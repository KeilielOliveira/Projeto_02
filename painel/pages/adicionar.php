<?php 
    $nome = $_GET['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo include_path_painel ?>css/editar-home.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar</title>
</head>
<body>

<?php  
    if($nome == 'depoimento') {
?>
    <header>
        <h2>Bem vindo a pagina de <b>edição</b> de <b><?php echo $nome ?><b/></h2>
    </header>
        <div class="box-edit">
            <div class="title">
                <i class="fa-solid fa-list"></i>
                <h3>Adicionar Depoimento</h3>
            </div>
            <div class="content">
                <form class="send-form" method="post">
                    <label>Nome</label>
                    <input type="text" name="nome">
                    <label>Conteudo</label>
                    <textarea name="conteudo"></textarea>
                    <input type="hidden" name="tb" value="tb_admin.depoimentos">
                    <input type="submit" value="Enviar" name="send" class="send">
                </form>
            </div>
        </div>
<?php  
    }else if($nome == 'trabalho') {
?>

    <header>
        <h2>Bem vindo a pagina de <b>edição</b> de <b><?php echo $nome ?><b/></h2>
    </header>
        <div class="box-edit">
            <div class="title">
                <i class="fa-solid fa-list"></i>
                <h3>Adicionar Trabalho</h3>
            </div>
            <div class="content">
                <form class="send-form" method="post" enctype="multipart/form-data">
                    <label>Icone</label>
                    <input type="file" name="icon">
                    <label>Titulo</label>
                    <input type="text" name="titulo">
                    <label>Conteudo</label>
                    <textarea name="conteudo"></textarea>
                    <label>Link</label>
                    <input type="text" name="link">
                    <input type="hidden" name="tb" value="tb_admin.trabalho">
                    <input type="submit" value="Enviar" name="send" class="send">
                </form>
            </div>
        </div>

<?php  
    }
?>
    
</body>
</html>

<?php 

if(isset($_POST['send']))
    $val = [];
    if($nome == 'depoimento') {
        $val = @['tb'=>$_POST['tb'],'nome'=>$_POST['nome'],'conteudo'=>$_POST['conteudo']];
    }else if($nome == 'trabalho') {
        $img = @Files::uploadFile($_FILES['icon']);
        $val = @['tb'=>$_POST['tb'],'icon'=>$img,'titulo'=>$_POST['titulo'],'conteudo'=>$_POST['conteudo'],'link'=>$_POST['link']];
    }
    if(Painel::inserir($val,'send')) {
        Painel::redirect(include_path_painel.'?sucesso');
    }
?>