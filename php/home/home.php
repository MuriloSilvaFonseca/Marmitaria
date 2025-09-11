<?php 
    include('../../padrao/header.php');

    session_start();
    if (!isset($_SESSION["email_login"]) == true  && !isset($_SESSION["senha_login"]) == true ) {
        unset($_SESSION["email_login"]);
        unset($_SESSION["senha_login"]);
        echo "<script>location.href='../index.php';</script>";
    } else {

    }
    include("../../padrao/nav.php");

?>
    <h1>Cliente</h1>

<?php 
    include('../../padrao/footer.php')
?>