<?php

?>

<html>
<head>
    <link rel="stylesheet" href="css/editar-home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9513630920.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <header>
        <h2>Bem vindo a pagina de <b>edição</b> da home!</h2>
    </header>


    <div class="box-edit">
        <div class="title">
            <i class="fa-solid fa-pen"></i>
            <h3>Editar Header</h3>
        </div>
        <div class="content">
            <form class="send-form" method="post">
                <label>Logomarca</label>
                <input type="text" name="logo_text" placeholder="Logomarca em forma de Texto...">
                <input type="file" name="logo_image">
                <input type="hidden" name="logo_image_default" value="logomarca_image">
                <br>
                <br>
                <h3>Itens do menu</h3>
                <br>
                <div class="item">
                    <p>Name</p>
                    <p>link</p>
                    <a href=""><i class="fa-solid fa-pen">  Editar</i></a>
                    <a href=""><i class="fa-regular fa-trash-can">  Excluir</i></a>
                </div>
                <input type="submit" value="Enviar" class="send" name="send_1">
            </form> 
        </div>
    </div>

    <div class="box-edit">
        <div class="title">
            <i class="fa-solid fa-pen"></i>
            <h3>Editar Banner</h3>
        </div>
        <div class="content">
            <form class="send-form" method="post">
                <label>Imagem do banner</label>
                <input type="file" name="banner_image">
                <label>Titulo da chamada</label>
                <input type="text" name="title_banner">
                <label>Conteudo da chamada</label>
                <input type="text" name="content_banner">
                <input type="submit" value="Enviar" class="send" name="send_2">
            </form>
        </div>
        
    </div>

    <div class="box-edit">
        <div class="title">
            <i class="fa-solid fa-pen"></i>
            <h3>Editar Sobre</h3>
        </div>
        <div class="content">
            <form class="send-form" method="post">
                <label>Texto inicial do sobre</label>
                <textarea name="first_text_sobre"></textarea>
                <label>Texto é imagem do sobre</label>
                <textarea name="second_text_sobre"></textarea>
                <input type="file" name="first_image_sobre">
                <label>Banner do sobre</label>
                <input type="file" name="image_banner_sobre">

            <br>
            <br>
            <h3>Depoimentos</h3>
            <br>
            <div class="item">
                <p>Content</p>
                <p>name</p>
                <a href=""><i class="fa-solid fa-pen">  Editar</i></a>
                <a href=""><i class="fa-regular fa-trash-can">  Excluir</i></a>
            </div>
            <br>
            <br>

            <label>Titulo da seçao trabalho</label>
            <input type="text" name="title_work">

            <br>
            <br>
            <h3>Serviços</h3>
            <br>
            <div class="item">
                <p>Title</p>
                <p>Content</p>
                <a href=""><i class="fa-solid fa-pen">  Editar</i></a>
                <a href=""><i class="fa-regular fa-trash-can">  Excluir</i></a>
            </div>
            <input type="submit" class="send" value="Enviar" name="send_3">
            </form>         
        </div>
    </div>

    <script src="<?php echo include_path_painel ?>script/jquery.js"></script>
</body>
</html>

<?php 

if(isset($_POST['send_1'])) {
    $info = Painel::selecionarTabela(['tb'=>'tb_admin.editar_menu','nome'=>'','condition'=>'']);
    if($info == '') {
        $val = [];
        if($_POST['logo_image'] == '') {
            $_POST['logo_image'] = $_POST['logo_image_default'];
        }
        $arr = ['tb'=>'tb_admin.editar_menu','logo_text'=>$_POST['logo_text'],'logo_image'=>$_POST['logo_image']];
        if(Painel::inserir($arr,'send_1')) {
            Painel::warning('sucesso','Valores inseridos com sucesso!');
        }else {
            Painel::warning('erro','Algo deu errado!Verifique os valores e tente novamente');
        }
    }else {

        if($_POST['logo_image'] == '') {
            $_POST['logo_image'] = $_POST['logo_image_default'];
        }
        $arr = ['tb'=>'tb_admin.editar_menu','logo_text'=>$_POST['logo_text'],'logo_image'=>$_POST['logo_image'],'id'=>'1'];
        if(Painel::atualizar($arr,'send_1')) {
            Painel::warning('sucesso','Tabela atualizada com sucesso!');
        }
    }
}else if(isset($_POST['send_2'])) {
    $info = Painel::selecionarTabela(['tb'=>'tb_admin.editar_banner','nome'=>'','condition'=>'']);
    if($info == '') {
        if($_POST['banner_image'] == '') {
            $_POST['banner_image'] = 'image_default';
        }
        $arr = ['titulo'=>$_POST['title_banner'],'conteudo'=>$_POST['content_banner'],'imagem'=>$_POST['banner_image'],'tb'=>'tb_admin.editar_banner'];
        if(Painel::inserir($arr,'send_2')) {
            Painel::warning('sucesso','Valores inseridos com sucesso!');
        }else {
            Painel::warning('erro','Algo deu errado!Verifique os valores e tente novamente.');
        }
    }else {
        if($_POST['banner_image'] == '') {
            $_POST['banner_image'] = 'image_default';
        }
        $arr = ['titulo'=>$_POST['title_banner'],'conteudo'=>$_POST['content_banner'],'imagem'=>$_POST['banner_image'],'tb'=>'tb_admin.editar_banner','id'=>'1'];
        if(Painel::atualizar($arr,'send_2')) {
            Painel::warning('sucesso','Tabela atualizada com sucesso!');
        }else {
            Painel::warning('erro','Algo deu errado!Verifique os valores e tente novamente.');
        }
    }
}else if(isset($_POST['send_3'])) {
    $info = Painel::selecionarTabela(['tb'=>'tb_admin.editar_sobre','nome'=>'','condition'=>'']);
    if($info == '') {
        if($_POST['first_image_sobre'] == '') {
            $_POST['first_image_sobre'] = 'image_default';
        }
        if($_POST['image_banner_sobre'] == '') {
            $_POST['image_banner_sobre'] = 'image_default';
        }
        $arr = ['primeiro_texto'=>$_POST['first_text_sobre']
        ,'segundo_texto'=>$_POST['second_text_sobre']
        ,'imagem_do_segundo_texto'=>$_POST['first_image_sobre']
        ,'imagem_banner'=>$_POST['image_banner_sobre']
        ,'titulo_secao_trabalho'=>$_POST['title_work']
        ,'tb'=>'tb_admin.editar_sobre'];
        if(Painel::inserir($arr,'send_3')) {
            Painel::warning('sucesso','Valores inseridos com sucesso!');
        }else {
            Painel::warning('erro','Algo deu errado!Verifique os valores e tente novamente.');
        }
    }else {
        if($_POST['first_image_sobre'] == '') {
            $_POST['first_image_sobre'] = 'image_default';
        }
        if($_POST['image_banner_sobre'] == '') {
            $_POST['image_banner_sobre'] = 'image_default';
        }
        $arr = ['primeiro_texto'=>$_POST['first_text_sobre']
        ,'segundo_texto'=>$_POST['second_text_sobre']
        ,'imagem_do_segundo_texto'=>$_POST['first_image_sobre']
        ,'imagem_banner'=>$_POST['image_banner_sobre']
        ,'titulo_secao_trabalho'=>$_POST['title_work']
        ,'tb'=>'tb_admin.editar_sobre'
        ,'id'=>'1'];
        if(Painel::atualizar($arr,'send_3')) {
            Painel::warning('sucesso','Tabela atualizada com sucesso!');
        }else {
            Painel::warning('erro','Algo deu errado!Verifique os valores e tente novamente.');
        }
    }
}
?>