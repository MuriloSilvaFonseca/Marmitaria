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

<h1>ADM</h1>

<?php 
    include('../../padrao/footer.php')
    
?>