<?php 
    include("padrao/conexao.php");

    switch ($_REQUEST["acao"]) {

        case 'cadastrar':
            
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            $telefone = $_POST["telefone"];
            $cpf = $_POST["cpf"];
            $dt_nascimento = $_POST["dt_nascimento"];
            $status = $_POST["status"];


            $sql = "INSERT INTO usuario VALUES ('{$nome}', '{$email}', '{$senha}', '{$telefone}', '{$cpf}', '{$dt_nascimento}', default, '{$status}')";
            
            $res = $conn->query($sql);

            if ($res==true) {
                echo "<script>alert('Cadastrado com sucesso');</script>";

                echo "<script>location.href='?page=listar';</script>";
            } else {
                echo "<script>alert('Não foi possível cadastrar');</script>";

                echo "<script>location.href='?page=listar';</script>";
            }

            break;
        
        default:
            
            break;
    }

    $sql = 'INSERT INTO'
?>