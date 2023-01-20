<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<form method="post">
    <input type="text" name="user" id="">
    <input type="password" name="pass" id="">
    <input type="submit" value="Enviar" name="send">
</form>
    
</body>
</html>

<?php 

if(isset($_POST['send'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $info = Painel::selecionarTabela(['tb'=>'tb_admin.users','nome'=>'','condition'=>'']);
    if($user == $info['user']) {
        if($pass = $info['password']) {
            $_SESSION['login'] = true;
        }else {
            echo 'usuario ou senha incorretos!';
        }
    }else {
        echo 'usuario ou senha incorretos!';
    }
}

?>