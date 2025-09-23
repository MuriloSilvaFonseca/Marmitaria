<?php
    session_start();
    include("../../../../padrao/header.php");
    include("../../../../padrao/conexao.php");
    include("../../../../padrao/nav-cliente.php");
    //include("../select/pedido.php");

    $id_usuario = 22;

    $sql = "SELECT 
                p.id_pedido,
                p.tipo_pag,
                p.entrega,
                p.status,
                p.data_pedido,
                p.total,
                prd.nome_produto,
                pp.qtd_prod,
                pp.valor_uni
            FROM pedido p

            INNER JOIN produto_pedido pp 
                ON p.id_pedido = pp.id_pedido
            INNER JOIN produto prd 
                ON pp.id_produto = prd.id_produto

            WHERE p.id_usuario = '$id_usuario'
            ORDER BY p.id_pedido DESC";

    $res = $conn->query($sql);

    // $cabPedido = null;

    // while ($row = $res->fetch(PDO::FETCH_ASSOC)) {

    //     if ($cabPedido !== $row['id_pedido']) {
    //         if ($cabPedido !== null) {
    //             echo "<hr>";
    //         }
    //         $cabPedido = $row['id_pedido'];

    //         echo "<h3>Pedido #" . $row['id_pedido'] . "</h3>";
    //         echo "Data: " . $row['data_pedido'] . "<br>";
    //         echo "Pagamento: " . $row['tipo_pag'] . "<br>";
    //         echo "Entrega: " . $row['entrega'] . "<br>";
    //         echo "Status: " . $row['status'] . "<br><br>";
    //         echo "<b>Itens:</b><br>";
    //     }

    //     echo "- " . $row['nome_produto'] .
    //         " (Qtd: " . $row['qtd_prod'] .
    //         ", Valor: R$ " . number_format($row['valor_uni'], 2, ',', '.') . ")<br>";
    // }
    ?>

    
    <?php 
        $row = $res->fetch(PDO::FETCH_ASSOC);

        $cabPedido = null;

        while ($row) {
            if ($cabPedido !== $row['id_pedido']) {
                if ($cabPedido !== null) {
                                                    echo "<tr>";
                                                        echo "<td colspan='3' class='text-end'><strong>Total:</strong></td>";
                                                        echo "<td><strong>R$" . $row['total'] . "</strong></td>";            
                                                    echo "</tr>";
                                                echo "</tbody>";
                                            echo "</table>";
                                        echo "</div>";
                                        echo "<div class='text-end mt-3'>";
                                            echo "<button class = 'btn btn-danger'>Cancelar Pedido</button>";
                                            echo "<button class = 'btn btn-success ms-2'>Confirmar Recebimento</button>";
                                        echo "</div>";
                                    echo "</div>";    
                                echo "</div>";
                            echo "</div>";

                }

            $cabPedido = $row['id_pedido'];

    ?>
        <div class="container my-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Detalhes do Pedido <?=$row['id_pedido']?></h5>
                    <small>Status: <span class="badge bg-warning"> <?=$row['status']?> </span></small>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Tipo de Pagamento:</strong> <?=$row['tipo_pag']?>
                        </div>
                        <div class="col-md-4">
                            <strong>Forma de Entrega:</strong> <?=$row['entrega']?>
                        </div>
                        <div class="col-md-4">
                            <strong>Data do Pedido:</strong> <?=$row['data_pedido']?>
                        </div>
                    </div>

                <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Valor Unitário</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>

                    <?php 
                        }
                    ?>
                            <tbody>
                                <tr>
                                    <td><?=$row['nome_produto']?></td>
                                    <td><?=$row['qtd_prod']?></td>
                                    <td>R$ <?=number_format($row['valor_uni'], 2, ',', '.')?></td>
                                    <td><?= number_format( $subtot = $row['valor_uni'] * $row['qtd_prod'], 2, ',', '.') ?></td>
                                </tr>        
                        <?php 
                            }
                            $ult = end($row);
                            if ($cabPedido !== null) {
                                                    echo "<tr>";
                                                        echo "<td colspan='3' class='text-end'><strong>Total:</strong></td>";
                                                        echo "<td><strong>R$" . $row['total'] . "</strong></td>";            
                                                    echo "</tr>";                                    
                                                echo "</tbody>";
                                            echo "</table>";
                                        echo "</div>";
                                        echo "<div class='text-end mt-3'>";
                                            echo "<button class = 'btn btn-danger'>Cancelar Pedido</button>";
                                            echo "<button class = 'btn btn-success ms-2'>Confirmar Recebimento</button>";
                                        echo "</div>";
                                    echo "</div>";    
                                echo "</div>";
                            echo "</div>";

                }
                            
                        ?>
                    

                                

                    
               
    


<?php
    include("../../../../padrao/footer.php");
?>