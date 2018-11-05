<?php include 'cabecalho.php';


require_once 'buscaidprod.php';
require_once 'carrinho.php';

?>


<div class="container mb-4 mt-5">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col">Available</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                      <form action="carrinho.php?acao=atu" method="post">
                          <tbody>
                              <?php
                              
                              if (count($_SESSION['carrinho']) == 0) {
                                  echo '<tr>
                                          <td>Não há produtos no carrinho!</td>
                                       </tr>';
                              } else {
                                  $total = 0;


                                  foreach ($_SESSION['carrinho'] as $id => $qtd) {

                                      $ln = buscarId($id);

                                      $foto = $ln['foto'];
                                      $nome = $ln['produto'];
                                      $preco = number_format($ln['preco'], 2, ',', '.');
                                      $sub = number_format($ln['preco'] * $qtd, 2, ',', '.');

                                      $total += $ln['preco'] * $qtd;
                                      ?>
                                      <tr>
                                          <td><?= $foto ?></td>
                                          <td><?= $nome ?></td>
                                          <td><?= $preco ?></td>
                                          <td><?= $sub ?></td>
                                          <td><input style="width: 50px;" type="number" min="0" name="prod['<?= $id ?>']" value="<?= $qtd ?>"></td>
                                          <td><a href="carrinho.php?acao=del&id=<?= $id ?>" class="buttoncabe"><i class="fa fa-times"> Remover</i></a></td>
                                      </tr>
                                  <?php
                                  }
                                  $total = number_format($total, 2, ',', '.');
                                  ?>
                                  <tr>
                                      <td colspan="5"><i class="pull-right">R$: <?= $total ?></i></td>
                                  </tr>
              <?php } ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right">255,90 €</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Shipping</td>
                            <td class="text-right">6,90 €</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>346,90 €</strong></td>
                        </tr>
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
