<?php  
if(isset($_GET['acao'])) {
    Painel::deleteItemTable('tb_admin.trabalho',$_GET['id']);
    Painel::redirect(include_path_painel.'pages/'.$_GET['page']);
}
?>

<?php
    $info_banner = Painel::selecionarTabela(['tb'=>'tb_admin.editar_banner']);
    $info_sobre = Painel::selecionarTabela(['tb'=>'tb_admin.editar_sobre']);
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
            <form class="send-form" method="post" enctype="multipart/form-data">
                <label>Imagem do banner</label>
                <input type="file" name="image">
                <input type="hidden" name="last_image" value="<?php echo $info_banner['imagem'] ?>">
                <label>Titulo da chamada</label>
                <input type="text" name="title_banner" value="<?php echo $info_banner['titulo'] ?>">
                <label>Conteudo da chamada</label>
                <input type="text" name="content_banner" value="<?php echo $info_banner['conteudo'] ?>">
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
            <form class="send-form" method="post" enctype="multipart/form-data">
                <label>Texto inicial do sobre</label>
                <textarea name="first_text_sobre"><?php echo $info_sobre['primeiro_texto'] ?></textarea>
                <label>Texto é imagem do sobre</label>
                <textarea name="second_text_sobre"><?php echo $info_sobre['segundo_texto'] ?></textarea>
                <input type="file" name="first_image_sobre">
                <input type="hidden" name="last_first_image" value="<?php echo $info_sobre['imagem_do_segundo_texto'] ?>">
                <label>Banner do sobre</label>
                <input type="file" name="image_banner_sobre">
                <input type="hidden" name="last_banner_image" value="<?php echo $info_sobre['imagem_banner'] ?>">

            <br>
            <br>
            <h3>Depoimentos</h3>
            <br>
            <?php 
            $depoimentos = Painel::selecionarTudo('tb_admin.depoimentos');
            $q = count($depoimentos);
            for ($i=0; $i < $q; $i++) { 
            ?>
            <div class="item">
                <p><?php echo $depoimentos[$i]['nome'] ?></p>
                <p><?php echo substr($depoimentos[$i]['conteudo'],0,20) ?></p>
                <a href="?page=editar-depoimento&&id=<?php echo $depoimentos[$i]['id'] ?>"><i class="fa-solid fa-pen">  Editar</i></a>
                <a href=""><i class="fa-regular fa-trash-can">  Excluir</i></a>
            </div>
            <?php 
            }
            ?>
            <input class="send" page="depoimento" type="button" value="Adicionar">
            <br>
            <br>

            <label>Titulo da seçao trabalho</label>
            <input type="text" name="title_work" value="<?php echo $info_sobre['titulo_secao_trabalho'] ?>">

            <br>
            <br>
            <h3>Serviços</h3>
            <br>
            <?php  
                $work = Painel::selecionarTudo('tb_admin.trabalho');
                $q = count($work);
                for ($i=0; $i < $q; $i++) { 
            ?>
            <div class="item">
                <p><?php echo $work[$i]['titulo'] ?></p>
                <p><?php echo substr($work[$i]['conteudo'],0,20) ?></p>
                <a href="?page=editar-trabalho&&id=<?php echo $work[$i]['id'] ?>"><i class="fa-solid fa-pen">  Editar</i></a>
                <a href="?page=<?php echo $_GET['page'] ?>&&acao=delete&&id=<?php echo $work[$i]['id'] ?>"><i class="fa-regular fa-trash-can">  Excluir</i></a>
            </div>
            <?php  
                }
            ?>
            <input class="send" type="button" page="trabalho" value="Adicionar">
            <br>
            <br>
            <input type="submit" class="send" value="Enviar" name="send_3">
            </form>         
        </div>
    </div>

    <script src="<?php echo include_path_painel ?>script/jquery.js"></script>
    <script>
        $(
            $('form input[type="button"]').click(function() {
                var attr = $(this).attr('page');
                location.href = "?page=adicionar&&name="+attr;
            })
        )
    </script>
</body>
</html>

<?php 
if(isset($_POST['send_1'])) {
    $info = Painel::selecionarTabela(['tb'=>'tb_admin.editar_menu']);
    if($info == '') {
        $val = [];
        if($_POST['logo_image'] == '') {
            $_POST['logo_image'] = $_POST['logo_image_default'];
        }
        $arr = ['tb'=>'tb_admin.editar_menu','logo_text'=>$_POST['logo_text'],'logo_image'=>$_POST['logo_image']];
        if(Painel::inserir($arr,'send_1')) {
            Painel::redirect(include_path_painel);
        }else {
            Painel::warning('erro','Algo deu errado!Verifique os valores e tente novamente');
        }
    }else {

        if($_POST['logo_image'] == '') {
            $_POST['logo_image'] = $_POST['logo_image_default'];
        }
        $arr = ['tb'=>'tb_admin.editar_menu','logo_text'=>$_POST['logo_text'],'logo_image'=>$_POST['logo_image'],'id'=>'1'];
        if(Painel::atualizar($arr,'send_1')) {
            Painel::redirect(include_path_painel.'?sucesso');
        }
    }
}else if(isset($_POST['send_2'])) {
    if(@$_FILES['name'] != '') {
        $img = $_POST['last_image'];
    }else {
        $img = $_FILES['image'];
        $img = Files::uploadFile($img);
    }
    $last_image = $_POST['last_image'];
    $info = Painel::selecionarTabela(['tb'=>'tb_admin.editar_banner']);
    if($info == '') {
        $arr = ['titulo'=>$_POST['title_banner'],'conteudo'=>$_POST['content_banner'],'imagem'=>$img,'tb'=>'tb_admin.editar_banner'];
        if(Painel::inserir($arr,'send_2')) {
            Painel::redirect(include_path_painel.'?sucesso');
        }else {
            Painel::warning('erro','Algo deu errado!Verifique os valores e tente novamente.');
        }
    }else {
        $arr = ['titulo'=>$_POST['title_banner'],'conteudo'=>$_POST['content_banner'],'imagem'=>$img,'tb'=>'tb_admin.editar_banner','id'=>'1'];
        if(Painel::atualizar($arr,'send_2')) {
            Files::deleteFile($last_image);
            Painel::redirect(include_path_painel.'?sucesso');
        }else {
            Painel::warning('erro','Algo deu errado!Verifique os valores e tente novamente.');
        }
    }
}else if(isset($_POST['send_3'])) {
    $img_1 = @$_FILES['first_image_sobre'];
    $img_2 = @$_FILES['image_banner_sobre'];
    if($img_1['name'] == '') {
        $img_1 = $_POST['last_first_image'];
    }else {
        $img_1 = Files::uploadFile($img_1);
    }
    if($img_2['name'] == '') {
        $img_2 = $_POST['last_banner_image'];
    }else {
        $img_2 = Files::uploadFile($img_2);
    }
    $info = Painel::selecionarTabela(['tb'=>'tb_admin.editar_sobre']);
    if($info == '') {
        $arr = ['primeiro_texto'=>$_POST['first_text_sobre']
        ,'segundo_texto'=>$_POST['second_text_sobre']
        ,'imagem_do_segundo_texto'=>$img_1
        ,'imagem_banner'=>$img_2
        ,'titulo_secao_trabalho'=>$_POST['title_work']
        ,'tb'=>'tb_admin.editar_sobre'];
        if(Painel::inserir($arr,'send_3')) {
            Painel::redirect(include_path_painel.'?sucesso');
        }else {
            Painel::warning('erro','Algo deu errado!Verifique os valores e tente novamente.');
        }
    }else {
        $last_img1 = $_POST['last_first_image'];
        $last_img2 = $_POST['last_banner_image'];
        $arr = ['primeiro_texto'=>$_POST['first_text_sobre']
        ,'segundo_texto'=>$_POST['second_text_sobre']
        ,'imagem_do_segundo_texto'=>$img_1
        ,'imagem_banner'=>$img_2
        ,'titulo_secao_trabalho'=>$_POST['title_work']
        ,'tb'=>'tb_admin.editar_sobre'
        ,'id'=>'1'];
        if(Painel::atualizar($arr,'send_3')) {
            Files::deleteFile([$last_img1,$last_img2]);
            Painel::redirect(include_path_painel.'?sucesso');
        }else {
            Painel::warning('erro','Algo deu errado!Verifique os valores e tente novamente.');
        }
    }
}
?>