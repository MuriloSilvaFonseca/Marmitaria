<?php 
    include("../padrao/conexao.php");



    switch ($_REQUEST["acao"]) {

        case 'cadastrar':
            $nome = $_POST["nome_usuario"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            $telefone = $_POST["telefone"];
            $cpf = $_POST["cpf"];
            $dt_nascimento = $_POST["dt_nascimento"];
            $status = $_POST["status"];


            $sql = "INSERT INTO usuario (
                `nome_usuario`,
                `email`,
                `senha`,
                `telefone`,
                `cpf`,
                `dt_nascimento`,
                `tipo_usuario`,
                `status`)

                VALUES ('{$nome}', '{$email}', '{$senha}', '{$telefone}', '{$cpf}', '{$dt_nascimento}', default, '{$status}')";

            $res = $conn->query($sql);

            if ($res==true) {
                echo "<script>alert('Cadastrado com sucesso');</script>";

                echo "<script>location.href='../index.php';</script>";
            } else {
                echo "<script>alert('Não foi possível cadastrar');</script>";

                echo "<script>location.href='php/cadastro.php';</script>";
            }

            break;
        
        default:
            
            echo "Deu errado";

            break;
    }
?>