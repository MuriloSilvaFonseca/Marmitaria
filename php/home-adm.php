<?php 
    include("../../padrao/header.php");

    session_start();
    
    if (!isset($_SESSION["email_login"]) == true  && !isset($_SESSION["senha_login"]) == true && !isset($_SESSION["tipo_usuario"]) == true) {
        unset($_SESSION["email_login"]);
        unset($_SESSION["senha_login"]);
        echo "<script>location.href='../index.php';</script>";
    }

    include("../../padrao/nav.php");
?>

<h1>ADM</h1>

<?php 
    include("../../padrao/footer.php");
?>