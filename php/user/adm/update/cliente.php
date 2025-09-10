<?php 
    include("../../../../padrao/conexao.php");
    $id_usuario = $_REQUEST['id_user_editar'];
    var_dump($id_usuario);
    exit;
    if (isset($id_usuario)) {
        switch ($_REQUEST['acao']) {
            case 'test-id':
                $id_usuario = $_REQUEST['id_user'];

                $sql = "SELECT nome_usuario, email, telefone, cpf, dt_nascimento, status FROM usuario WHERE id_usuario = '$id_usuario'";

                $res = $conn -> query($sql);

                $preenche = $res -> fetch(PDO::FETCH_ASSOC);
            break;

            case 'editar': 
                $nome_usuario = $_REQUEST["nome_usuario"];
                $email = $_REQUEST["email"];
                $telefone = $_REQUEST["telefone"];
                $cpf = $_REQUEST["cpf"];
                $dt_nascimento = $_REQUEST["dt_nascimento"];

                $sql = "UPDATE usuario SET '$nome_usuario', '$email', '$telefone', '$cpf', '$dt_nascimento', WHERE id_usuario = '$id_usuario'";

                $res = $conn -> query($sql);

                if ($res == true) {
                    echo "<script>alert('Editado com sucesso');</script>";

                    echo "<script>location.href='../listagem-clientes';</script>";
                } else {
                    echo "alert('Não foi possível Editar')";

                    echo "<script>location.href='../editar';</script>";
                }
                
            break;
        }

    }
?>