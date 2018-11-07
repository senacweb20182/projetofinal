<!DOCTYPE html>
    <?php include 'cabecalho.php';

    if(isset($_SESSION['id'])) {
        $prod = $_SESSION['id'];


    } else {
        $_SESSION['msg'] = false;
        header:("Location: index.php");
    }

     ?>

<div class="container">
    <div class="row">

        <!-- Image -->
        <div class="col-12 col-lg-6">
            <div class="card bg-light mb-3 pb-1">
                <div class="card-body">
                  <a href="" data-toggle="modal" data-target="#productModal">

                      <img id="product_photo" data-zoom-image="uploads\<?=$prod['img']?>" width="800" height="800" class="img-fluid" src="uploads\img\<?=$prod['img']?>" />

                  </a>
                </div>
            </div>
        </div>

        <!-- Add to cart -->
        <div class="col-12 col-lg-6 add_to_cart_block">
            <div class="card bg-light mb-3 pb-4">
                <div class="card-body">
                  <p class="product"><?= $prod['nome']?></p>

                    <form method="post" action="carrinho.php?acao=add">
                        <div class="form-group box">
                            <label for="colors" class='float-left'>Preço: </label>
                            <div class='float-right'>
                              <p class="price"><?= '&nbsp;R$' . number_format($prod['preco'], 2, ',', '.') ?></p>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                          <label>Quantity :</label>
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <button type="submit" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                      <i class="fa fa-minus"></i>
                                  </button>
                              </div>
                              <input type="text" class="form-control"  id="quantity" name="quantity" min="1" max="100" value="1">
                              <div class="input-group-append">
                                  <button type="submit" formaction="carrinho.php?acao=atu" formmethod="post" name="id" value="<?=$prod['id_produto'] ?>" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                      <i class="fa fa-plus"></i>
                                  </button>
                              </div>
                          </div>
                      </div>
                          <button type="submit" formaction="carrinho.php?acao=add" formmethod="post" name="id" value="<?=$prod['id_produto'] ?>" class="btn btn-success btn-lg btn-block text-uppercase">
                          <i class="fa fa-shopping-cart"></i> Adicionar ao Carrinho
                      </button>
                  </form>
                    <div class="product_rassurance">
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-truck fa-2x"></i><br/>Rápida Entrega</li>
                            <li class="list-inline-item"><i class="fa fa-credit-card fa-2x"></i><br/>Compra garantida</li>
                            <li class="list-inline-item"><i class="fa fa-phone fa-2x"></i><br/>+55 (21) 2518-2050</li>
                        </ul>
                    </div>
                    <div class="reviews_product p-3 mb-2 ">
                        3 reviews
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        (4/5)
                        <a class="pull-right" href="#reviews">View all reviews</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Description -->
        <div class="col-12">
            <div class="card border-light mb-3">
                <div class="card-header bg-primary text-uppercase"><i class="fa fa-align-justify"></i> Descrição</div>
                <div class="card-body">
                    <p class="card-text">
                        <?= $prod['descr'] ?>
                      </p>
                </div>
            </div>
        </div>

        <!-- Reviews -->
        <div class="col-12 " id="reviews">
            <div class="card border-light mb-3">
                <div class="card-header bg-primary text-uppercase"><i class="fa fa-comment"></i> Comentarios</div>
                <div class="card-body">
                    <div class="review">
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        <meta itemprop="datePublished" content="01-01-2016">January 01, 2018

                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        by Paul Smith
                        <p class="blockquote">
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        </p>
                        <hr>
                    </div>
                    <div class="review">
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        <meta itemprop="datePublished" content="01-01-2016">January 01, 2018

                        <span class="fa fa-star" aria-hidden="true"></span>
                        <span class="fa fa-star" aria-hidden="true"></span>
                        <span class="fa fa-star" aria-hidden="true"></span>
                        <span class="fa fa-star" aria-hidden="true"></span>
                        <span class="fa fa-star" aria-hidden="true"></span>
                        by Paul Smith
                        <p class="blockquote">
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        </p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'rodape.php'; ?>

<script src="//code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/jquery.elevateZoom-3.0.8.min.js" type="text/javascript"></script>
<script type="text/javascript">
    //Plus & Minus for Quantity product
    $(document).ready(function(){
        var quantity = 1;

        $('.quantity-right-plus').click(function(e){
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());
            $('#quantity').val(quantity + 1);
        });

        $('.quantity-left-minus').click(function(e){
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());
            if(quantity > 1){
                $('#quantity').val(quantity - 1);
            }
        });

    });
</script>
<script>
    $("#product_photo").elevateZoom({
        zoomType : "inner",
        cursor: "crosshair"
    });
</script>
