<?php
    session_start();
    include("../../../../padrao/header.php");
    include("../../../../padrao/conexao.php");
    include("../../../../padrao/nav-cliente.php");
    include("../select/pedido.php");
    include("../select/ultLinha.php");
?>

    <?php 
        $cabPedido = null;
        
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            
            if ($cabPedido !== $row['id_pedido']) {
                var_dump($cabPedido);
                
                
                if ($cabPedido !== null) {
                    var_dump($cabPedido);
                    
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
            var_dump($cabPedido);
            
            
                

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
                                
                                <tr>
                                    <td colspan='3' class='text-end'><strong>Total:</strong></td>
                                    <td><strong>R$<?=$row['total']?></strong></td>         
                                </tr>
                        <?php 
                            }
                            
                            $linha = $ultLinRes->fetchAll(PDO::FETCH_ASSOC);
                            $ult = end($linha);

                    //         if ($cabPedido !== null) {
                    //                             echo "<tr>";
                    //                                 echo "<td colspan='3' class='text-end'><strong>Total:</strong></td>";
                    //                                 echo "<td><strong>R$"  . "</strong></td>";            
                    //                             echo "</tr>";                                    
                    //                         echo "</tbody>";
                    //                     echo "</table>";
                    //                 echo "</div>";
                    //             echo "<div class='text-end mt-3'>";
                    //                 echo "<button class = 'btn btn-danger'>Cancelar Pedido</button>";
                    //                 echo "<button class = 'btn btn-success ms-2'>Confirmar Recebimento</button>";
                    //             echo "</div>";
                    //         echo "</div>";    
                    //     echo "</div>";
                    // echo "</div>";
                //}          
        
    include("../../../../padrao/footer.php");
?>