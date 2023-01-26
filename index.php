<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9513630920.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto 2</title>
</head>
<body>

<?php
    include 'config.php';
    $logo = Painel::selecionarTabela(['tb'=>'tb_admin.editar_menu']);
    $banner = Painel::selecionarTabela(['tb'=>'tb_admin.editar_banner']);
    $sobre = Painel::selecionarTabela(['tb'=>'tb_admin.editar_sobre']);
    $work = Painel::selecionarTudo('tb_admin.trabalho');

?>


<nav class="menu-desktop">

        <div class="logo">
            <h2><?php echo $logo['logo_text'] ?></h2>
        </div><!--logo-->
        <ul class="ul-menu-desktop">
            <li><a href="">Home</a></li>
            <li><a href="">Sobre</a></li>
            <li><a href="">Contato</a></li>
        </ul><!--ul-menu-desktop-->  
        <div class="menu-icon"><i class="fa-solid fa-bars icon"></i></div>
        <ul class="ul-menu-mobile">
            <li><a href="">Home</a></li>
            <li><a href="">Sobre</a></li>
            <li><a href="">Contato</a></li>
        </ul><!--ul-menu-mobile--> 

</nav><!--menu-desktop-->
<div class="clear"></div>

<section class="banner" style="background-image: url(<?php echo include_path_painel.'upload/'. $banner['imagem'] ?>);">
        <div class="bg-cover">
            <div class="container">
                <div class="content-banner">
                    <h2><?php echo $banner['titulo'] ?></h2>
                    <p><?php echo $banner['conteudo'] ?></p>
                    <div class="form-banner">
                        <form action="" class="banner">
                            <input type="email" name="email" id="" required placeholder="E-mail">
                            <input type="submit" value="Enviar">
                        </form><!--banner--> 
                    </div><!--form-banner--> 
                </div><!--content-banner--> 
            </div>
        </div><!--bg-cover--> 
</section><!--banner--> 

<section class="sobre">
    <div class="container">
        <div class="content-sobre-description">
            <p><?php echo $sobre['primeiro_texto'] ?></p>
        </div><!--content-sobre-description--> 
        <div class="content-sobre">
            <div class="box-1">    
                <div class="text-content-box-1">
                <h2><?php echo $sobre['segundo_texto'] ?></p>
                </div><!--text-content-box-1--> 
                <div class="box-1-img"><img class="box-1-img" src="<?php echo include_path_painel.'upload/'. $sobre['imagem_do_segundo_texto'] ?>" alt="">
            </div><!--box-1-img-->     
            </div><!--box-1--> 
            <div class="clear"></div>
            <div class="box-2">
                <div class="box-2-img" style="background-image: url(<?php echo include_path_painel.'upload/'. $sobre['imagem_banner'] ?>);">               
                </div><!--box-2-img--> 
                <div class="depoimento">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis similique incidunt quidem cumque nobis qui voluptatem repudiandae deserunt nisi id voluptatibus aspernatur ipsum placeat, labore consectetur, quae ipsam amet totam?</p>
                    <h3>Kennedy Gomes</h3>
                </div><!--depoimento--> 
            </div><!--box-2--> 
        </div><!--content-sobre-->
        
        
    </div>
</section><!--sobre--> 

<section class="servicos">
    <div class="container">
        <h3><?php echo $sobre['titulo_secao_trabalho'] ?></h3>
        <div class="icon-arrow"></div>
        <div class="section-servicos">
            <?php  
            $q = count($work);
            for ($i=0; $i < $q; $i++) { 

            ?>
            <div class="box-servicos">
                <div class="icon-servicos" style="<?php echo include_path_painel.'upload/'.$work[$i]['icon'] ?>"></div>
                <h3><?php echo $work[$i]['titulo'] ?></h3>
                <p><?php echo $work[$i]['conteudo'] ?></p>
                <button><a href="">Ver mais!</a></button>
            </div><!--box-servicos-->
            <?php 
            }
            ?>         
        </div><!--section-servicos--> 
    </div>
</section><!--servicos--> 

<section class="contato">
    <div class="container">
        <h2>Entre em contato!</h2>
        <form action="">
            <input type="text" name="Nome" id="" placeholder="Nome">
            <input type="email" name="email" id="" placeholder="Email">
            <textarea name="assunto" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="Enviar">
        </form>
    </div>
</section><!--contato--> 

<footer>
    <div class="container">
        <div class="content-footer"><h3>todos os direitos reservados</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente voluptate doloremque iste cupiditate saepe obcaecati ipsa ipsam veritatis impedit voluptatibus ex, perferendis, suscipit exercitationem nemo velit autem odit nihil aliquam?</p>
        </div><!--content-footer--> 
        
    </div>
</footer>


<script src="<?php echo include_path ?>js/jquery-3.6.0.min.js"></script>
<script src="<?php echo include_path ?>js/javascript.js"></script>

</body>
</html>