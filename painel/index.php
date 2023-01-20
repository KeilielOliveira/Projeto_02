<?php 
    include '../config.php';
?>

<?php 
if(Painel::login() == true) {
    include 'main.php';
}else {
    include 'login.php';
}
?>