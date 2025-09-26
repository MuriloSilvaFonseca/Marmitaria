<?php 
    session_start();

    include('../../padrao/header.php');

    
    
    if (isset($_SESSION["email_login"])) {
        
    } else {
        echo "<script>location.href='../../index.php';</script>";
        exit;
    }

    $logado = $_SESSION["email_login"];
       
    include("../../padrao/nav.php");
    
?>


<?php 
    include('../../padrao/footer.php')
    
?>