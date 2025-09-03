<?php 
    session_start();
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

                $id_usuario = $conn -> lastInsertId();
                $_SESSION['id_usuario'] = $id_usuario;
               
                echo "<script>location.href='endereco.php';</script>";

            } else {
                echo "<script>alert('Não foi possível cadastrar');</script>";

                echo "<script>location.href='cadastro.php';</script>";
            }

            break;


        case 'endereco':
            
            $id_usuario = $_SESSION['id_usuario'];
            $endereco = $_POST["endereco"];
            $bairro = $_POST["bairro"];
            $cidade = $_POST["cidade"];
            $estado = $_POST["estado"];
            $complemento = $_POST["complemento"];
            $num_casa = $_POST["num_casa"];
            $cep = $_POST["cep"];

            $sql2 = "INSERT INTO endereco (
                `id_usuario`,
                `endereco`,
                `bairro`,
                `cidade`,
                `estado`,
                `complemento`,
                `num_casa`,
                `cep`
                )

                VALUES ( '{$id_usuario}',{$endereco}', '{$bairro}', '{$cidade}', '{$estado}', '{$complemento}', '{$num_casa}', '{$cep}')";

            $res2 = $conn->query($sql2);

            

            if ($res2==true) {
                echo "<script>alert('Cadastrado com sucesso');</script>";

                echo "<script>location.href='../index.php';</script>";
            } else {
                echo "<script>alert('Não foi possível cadastrar');</script>";

                echo "<script>location.href='php/cadastro.php';</script>";
            };
            break;


            case 'login': 
                $email = $_REQUEST["email"];
                $senha = $_REQUEST["senha"];

                $sql = "SELECT email, senha FROM usuario 
                        WHERE email = '{$email}'  AND senha = '{$senha}'";
                $res = $conn -> query($sql);


                if ($res == true) {
                    echo "<script>location.href='home.php';</script>";
                } else {
                    echo "<script>alert('Não foi possível entrar');</script>";
                    echo "<script>location.href='index.php';</script>";
                }; 


            
            break;
        
        default:
            
            echo "Deu errado";
            break;
    }
?>