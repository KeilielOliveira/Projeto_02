<!DOCTYPE html>
<html lang="pt_Br">
<head>
    <link rel="stylesheet" href="<?php echo include_path_painel ?>css/editar-home.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home do Painel</title>
</head>
<body>
<?php 
if(isset($_GET['sucesso'])) {
    Painel::warning('sucesso','Operação finalizada com sucesso!');
}
?>
</body>
</html>