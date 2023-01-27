<?php 
$url = $_SERVER["REQUEST_URI"];
$page = explode('?',$url);
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="<?php echo include_path_painel ?>css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9513630920.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle</title>
</head>
<body>
<div class="flex">
    <section class="controller">
        <div class="header-top">
            <h2>Painel</h2>
        </div>
        <div class="options">
            <div class="op-sec">
                <h2>Home</h2>
                <ul>
                    <li><a href="<?php echo include_path_painel?>?page=editar-home">Editar Home</a></li>
                </ul>
                <a href="?loggout">loggout</a>
            </div><!--op-sec--> 
        </div><!--options--> 
    </section>

    <header class="header-painel">
        <i class="fa-solid fa-bars icon"></i>
        <p>contato.sac@gmail.com</p>
    </header>
    <div class="clear"></div>
    <div class="page">
        <?php
        if(isset($_GET['page'])) {
            include "pages/".$_GET['page'].".php";
        }else {
            include 'pages/home.php';
        }
        ?>
   </div>
</div><!--Display flex--> 
    
</body>
</html>

<?php 

if(isset($_GET['loggout'])) {
    session_destroy();
    die();
}


?>