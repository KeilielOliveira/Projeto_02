<?php 
    include '../config.php';
?>

<?php 
if(isset($_SESSION['logado'])) {
    if($_SESSION['logado'] == true) {
        include 'main.php';
    }
}else {
    include 'login.php';
}


?>