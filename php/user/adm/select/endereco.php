<?php 
    session_start();

        if (isset($_REQUEST['id_user'])) {
            $id_user = $_REQUEST['id_user'];
            $sql = "SELECT * FROM endereco WHERE id_usuario='$id_user'";
            $res = $conn -> query($sql); 
            $linha = $res -> fetch(PDO::FETCH_ASSOC);

            if ($res != true) {
                echo "<script>alert('Não foi possível exibir o endereço');</script>";
                echo "<script>location.href='user/adm/listagem-clientes.php';</script>";
            }

            } else if ($id_user_endereco = $_SESSION['id_usuario_endereco']) {

                $sql = "SELECT * FROM endereco WHERE id_usuario='$id_user_endereco'";
                $res = $conn -> query($sql); 
                $linha = $res -> fetch(PDO::FETCH_ASSOC);

                if ($res == true) {
                    $id_user = $_SESSION['id_usuario_endereco'];
                    unset($_SESSION["id_usuario_endereco"]);
                } else {
                    echo "<script>alert('Não foi possível exibir o endereço');</script>";
                    echo "<script>location.href='user/adm/listagem-clientes.php';</script>";
                }

            } else {
                echo "<script>alert('Não foi possível exibir o endereço');</script>";
                echo "<script>location.href='user/adm/listagem-clientes.php';</script>";
            }
            

            
?>
