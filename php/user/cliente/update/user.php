<?php 
    session_start();
    include("../../../../padrao/conexao.php");

    $id_usuario = $_SESSION['id_user_login'];

    $nome_usuario = $_REQUEST['nome_usuario'];
    $telefone = $_REQUEST['telefone'];
    $cpf = $_REQUEST['cpf'];
    $email = $_REQUEST['email'];
    $dt_nascimento = $_REQUEST['dt_nascimento'];
    $senha = $_REQUEST['senha'];

    if (!empty($nome_usuario) && !empty($telefone) && !empty($cpf) && !empty($email) && !empty($dt_nascimento) && !empty($senha)) {
        $sql = "UPDATE usuario SET nome_usuario = '$nome_usuario', telefone='$telefone', cpf = '$cpf', email = '$email', dt_nascimento = '$dt_nascimento', senha = '$senha' WHERE id_usuario = '$id_usuario' ";

        $res = $conn -> query($sql);

        if($res == true) {
            echo "<script>alert('Editado com Sucesso')</script>";
            echo "<script>location.href='../perfil/Vperfil.php'</script>";
        } else {
            echo "<script>alert('Não foi possível editar')</script>";
            echo "<script>location.href='../perfil/Vperfil.php'</script>";
        }
    } else {
        echo "<script>alert('Não foi possível editar')</script>";
        echo "<script>location.href='../perfil/Vperfil.php'</script>";
    }
?>