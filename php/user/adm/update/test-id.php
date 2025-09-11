<?php 
    session_start();
    include("../../../../padrao/conexao.php");

    $id_usuario = $_REQUEST['id_user_editar'];
    

    $_SESSION['id-usuario'] = $id_usuario;
            
        if (isset($id_usuario)) {
            $sql = "SELECT nome_usuario, email, telefone, cpf, dt_nascimento, status FROM usuario WHERE id_usuario = '$id_usuario'";

            $res = $conn -> query($sql);

            $preenche = $res -> fetch(PDO::FETCH_ASSOC);
        }
?>