<?php
    session_start();
    
    include("../../../../padrao/conexao.php");

    $id_usuario = $_REQUEST['id_usuario'];

    $_SESSION['id_usuario_endereco'] = $id_usuario;
            
        if (isset($id_usuario)) {
            $sql = "SELECT endereco , bairro, cidade, estado, complemento, num_casa, cep FROM endereco WHERE id_usuario = '$id_usuario'";

            $res = $conn -> query($sql);

            $preenche = $res -> fetch(PDO::FETCH_ASSOC);
        }
?>