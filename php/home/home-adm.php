<?php 
    include('../../padrao/header.php');

    session_start();
    
    if ((!isset($_SESSION["email_login"]) == true) and (!isset($_SESSION["senha_login"]) == true) and (!isset($_SESSION["tipo_usuario"]) == true)) {
        unset($_SESSION["email_login"]);
        unset($_SESSION["senha_login"]);
        unset($_SESSION["tipo_usuario"]);
        echo "<script>location.href='../index.php';</script>";
    }
    $logado = $_SESSION["email_login"];
    $userHome = $_SESSION["tipo_usuario"];
    $logadosenha = $_SESSION["senha_login"];
    include("../../padrao/nav.php");
?>

<h1>ADM</h1>

<?php 
    include('../../padrao/footer.php')
    
?>