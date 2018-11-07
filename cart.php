<?php include 'cabecalho.php';


include_once 'buscaidprod.php';
include_once 'carrinho.php';

?>


<div class="container mb-4 mt-5">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th colspan="2" scope="col">Produto</th>
                            <th scope="col">Preço Unitário</th>
                            <th scope="col" class="text-center">Quantidade</th>
                            <th scope="col" class="text-right">Preço Total</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                        if (count($_SESSION['carrinho']) == 0) {
                            echo '<tr>
                                    <td colspan="5">Não há produtos no carrinho!</td>
                                 </tr>';
                        } else {
                        $total = 0;
                        foreach ($_SESSION['carrinho'] as $id => $qtd) {

                        $ln = buscarId($id);
                        $foto = $ln['img'];
                        $nome = $ln['nome'];
                        $preco = 'R$ ' . number_format($ln['preco'], 2, ',', '.');
                        $sub = 'R$ ' . number_format($ln['preco'] * $qtd, 2, ',', '.');

                        $total += $ln['preco'] * $qtd;
                      ?>
                      <tr class="text-center">
                          <td colspan="2"><?= $nome ?></td>
                          <td><?= $preco ?></td>
                          <td><input style="width: 50px;" type="number" min="0" name="prod['<?= $id ?>']" value="<?= $qtd ?>"></td>
                          <td class="text-right"><?= $sub ?></td>
                          <td class="text-right" colspan="2"><a href="carrinho.php?acao=del&id=1" class="buttoncabe"><i class="fa fa-times"> Remover</i></a></td>
                      </tr>
                      <tr>
                          <td colspan="6">Sub-Total</td>
                          <td class="text-right">255,90 €</td>
                      </tr>
                      <tr>
                          <td colspan="6">Shipping</td>
                          <td class="text-right">6,90 €</td>
                      </tr>
                      <tr>
                          <td colspan="6"><strong>Total</strong></td>
                          <td class="text-right"><strong>346,90 €</strong></td>
                      </tr>
                    <?php
                          }
                        }?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <button class="btn btn-block btn-light">Continuar comprando</button>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <button class="btn btn-block btn-warning ">Finalizar o pedido</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'rodape.php';
