<?php 
    session_start();
    include("../padrao/conexao.php");

    switch ($_REQUEST["acao"]) {

        case 'cadastrar':
            
            switch($_REQUEST["entrada"]) {
                case 'usuario':
                    $nome_usuario = $_POST["nome_usuario"];
                    $email = $_POST["email"];
                    $senha = $_POST["senha"];
                    $telefone = $_POST["telefone"];
                    $cpf = $_POST["cpf"];
                    $dt_nascimento = $_POST["dt_nascimento"];
                    $tipo_usuario = $_POST["tipo_usuario"];
                    $status = $_POST["status"];

                    

                    if (!empty($nome_usuario) && !empty($email) && !empty($senha) && !empty($telefone) && !empty($cpf) && !empty($dt_nascimento) && !empty($status)){

                        $_SESSION["nome_usuario"] = $nome_usuario;
                        $_SESSION["email"] = $email;
                        $_SESSION["senha"] = $senha;
                        $_SESSION["telefone"] = $telefone;
                        $_SESSION["cpf"] = $cpf;
                        $_SESSION["dt_nascimento"] = $dt_nascimento;
                        $_SESSION["tipo_usuario"] = $tipo_usuario;
                        $_SESSION["status"] = $status; 

                        echo "<script>location.href='user/registro/endereco.php';</script>";
                    
                        

                    } else {
                        echo "<script>alert('Não foi possível cadastrar');</script>";

                        echo "<script>location.href='cadastro.php';</script>";
                    }; 
                break;
                

                case 'endereco': 
                    $endereco = $_POST["endereco"];
                    $bairro = $_POST["bairro"];
                    $cidade = $_POST["cidade"];
                    $estado = $_POST["estado"];
                    $complemento = $_POST["complemento"];
                    $num_casa = $_POST["num_casa"];
                    $cep = $_POST["cep"];


                    if (!empty($endereco) && !empty($bairro) && !empty($cidade) && !empty($estado) && !empty($num_casa) && !empty($cep)) {

                    $_SESSION["endereco"] = $endereco;
                    $_SESSION["bairro"] = $bairro;
                    $_SESSION["cidade"] = $cidade;
                    $_SESSION["estado"] = $estado;
                    $_SESSION["complemento"] = $complemento;
                    $_SESSION["num_casa"] = $num_casa;
                    $_SESSION["cep"] = $cep;  

                    echo "
                    <form id=\"form-registrar\" action=\"acoes.php\" method=\"POST\">  
                        <input type=\"hidden\" name=\"acao\" value=\"cadastrar\">
                        <input type=\"hidden\" name=\"entrada\" value=\"registrar\">
                    </form>
                    
                    <script>
                        document.getElementById('form-registrar').submit();
                    </script>";
                    
                    } else {
                        echo "<script>alert('Não foi possível cadastrar');</script>";

                        echo "<script>location.href='user/registro/endereco.php';</script>";
                    }; 
                break;

                case 'registrar':


                    $nome_usuario = $_SESSION["nome_usuario"];
                    $email = $_SESSION["email"];
                    $senha = $_SESSION["senha"];
                    $telefone = $_SESSION["telefone"];
                    $cpf = $_SESSION["cpf"];
                    $dt_nascimento = $_SESSION["dt_nascimento"];
                    $tipo_usuario = $_SESSION["tipo_usuario"];
                    $status = $_SESSION["status"];

                    $endereco = $_SESSION["endereco"];
                    $bairro = $_SESSION["bairro"];
                    $cidade = $_SESSION["cidade"];
                    $estado = $_SESSION["estado"];
                    $complemento = $_SESSION["complemento"];
                    $num_casa = $_SESSION["num_casa"];
                    $cep = $_SESSION["cep"];


                    if (!empty($endereco) && !empty($bairro) && !empty($cidade) && !empty($estado) && !empty($num_casa) && !empty($cep) && !empty($nome_usuario) && !empty($email) && !empty($senha) && !empty($telefone) && !empty($cpf) && !empty($dt_nascimento) && !empty($tipo_usuario) && !empty($status)) {
                        $sql = "INSERT INTO usuario (
                            `nome_usuario`,
                            `email`,
                            `senha`,
                            `telefone`,
                            `cpf`,
                            `dt_nascimento`,
                            `tipo_usuario`,
                            `status`)

                            VALUES ('{$nome_usuario}', '{$email}', '{$senha}', '{$telefone}', '{$cpf}', '{$dt_nascimento}', '{$tipo_usuario}', '{$status}')";

                        $res = $conn->query($sql);
                        $id_usuario = $conn-> lastInsertId();

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

                            VALUES ( '{$id_usuario}', '{$endereco}', '{$bairro}', '{$cidade}', '{$estado}', '{$complemento}', '{$num_casa}', '{$cep}')";

                        $res2 = $conn->query($sql2);
                        

                        if ($res==true && $res2==true) {
                            unset($_SESSION["nome_usuario"]);
                            unset($_SESSION["email"]);
                            unset($_SESSION["senha"]);
                            unset($_SESSION["telefone"]);
                            unset($_SESSION["cpf"]);
                            unset($_SESSION["dt_nascimento"]);
                            unset($_SESSION["status"]);

                            unset($_SESSION["endereco"]);
                            unset($_SESSION["bairro"]);
                            unset($_SESSION["cidade"]);
                            unset($_SESSION["estado"]);
                            unset($_SESSION["complemento"]);
                            unset($_SESSION["num_casa"]);
                            unset($_SESSION["cep"]);
                                                 
                            echo "<script>location.href='../index.php';</script>";

                            echo "<script>alert('Cadastrado com Sucesso');</script>";

                        } else {
                            echo "<script>alert('Não foi possível cadastrar');</script>";

                            echo "<script>location.href='cadastro.php';</script>";
                        }

                    } else {
                        echo "<script>alert('Não foi possível cadastrar');</script>";
                    }
                ; break;
            
        }



            case 'login': 

                if(!empty($_POST["email_login"]) && !empty($_POST["senha_login"])) {
                    $email_login = $_REQUEST["email_login"];
                    $senha_login = $_REQUEST["senha_login"];

                    $sql = "SELECT id_usuario ,email, senha, tipo_usuario FROM usuario 
                            WHERE email = '$email_login' AND senha = '$senha_login'";
                    $res = $conn -> query($sql);

                    $contRow = $res -> rowCount();

                    if ($contRow > 0) {
                        $tipoUser = $res -> fetchObject();
                        $tipo_usuario = $tipoUser -> tipo_usuario;

                        $id_user_login = $tipoUser -> id_usuario;

                        if ($tipo_usuario == 'Cliente') {
                            $_SESSION["email_login"] = $email_login;
                            echo "<script>location.href='home/home.php';</script>";

                            $_SESSION["id_user_login"] = $id_user_login;
                        } else {
                            $_SESSION["email_login"] = $email_login;
                            echo "<script>location.href='home/home-adm.php';</script>";

                            $_SESSION["id_user_login"] = $id_user_login;
                        }


                    } else {
                        

                        echo "<script>alert('Não foi possível entrar');</script>";
                        echo "<script>location.href='../index.php';</script>";
                    };

                } else {
                    echo "<script>alert('Não foi possível entrar');</script>";
                    echo "<script>location.href='../index.php';</script>";
                }
            break;
        
        default:
            
            echo "Deu errado";
            break;
    }
?>