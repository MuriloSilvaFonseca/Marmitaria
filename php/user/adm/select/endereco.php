<?php 
            $id_user = $_REQUEST["id_user"];

            if (isset($id_user)) {
                $sql = "SELECT * FROM endereco WHERE id_usuario='$id_user'";
                $res = $conn -> query($sql); 
                $linha = $res -> fetch(PDO::FETCH_ASSOC);

            } else {
                echo "<script>alert('Não foi possível exibir o endereço');</script>";
                echo "<script>location.href='user/adm/listagem-clientes.php';</script>";
            }
?>
