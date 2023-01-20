<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/login.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<div class="container">
    <form method="post">
        <h3>Formulario de Login</h3>
        <label>Úsuario</label>
        <input type="text" name="user" >
        <label>Senha</label>
        <input type="password" name="pass" >
        <input type="submit" value="Enviar" name="send">
    </form>
</div>
</body>
</html>

<?php 

if(isset($_POST['send'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $sql = MySql::connect()->prepare("SELECT * FROM `tb_admin.users` WHERE user=? AND password=?");
    $sql->execute([$user,$pass]);
    if($sql->rowCount() == 1) {
        $_SESSION['logado'] = true;
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
        header("Location: ".include_path_painel);
        die();
    }
}

?>