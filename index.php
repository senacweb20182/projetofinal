<?php   include 'cabecalho.php';
        include 'crud.php'         ?>

<?php

$produtos = produto_index();
$len = count($produtos);
$indices = range(0,($len)-1);
shuffle($indices);
$i = 0;
?>

        <!--comeco do carrosel-->
        <div class="container">
            <div class="row">
                <div class="col">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>


                        <!--imgem do carosel-->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="img/banner_1_1.jpg" alt="First slide">

                            </div>
                            <!--imgem do carosel-->
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/Banner_2.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/banner_3.jpg" alt="Third slide">
                            </div>
                        </div>

                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>


        <div class="container mt-3">
            <div class="row">
                <div class="col-sm">
                    <div class="card">
                        <div class="card-header bg-primary text-uppercase">
                            <i class="fa fa-star"></i> PRODUTOS EM OFERTAS
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="card">
                                        <?php $prod = $produtos[$indices[$i++]];
                                            $src = "uploads".DIRECTORY_SEPARATOR."thumbnail".DIRECTORY_SEPARATOR.$prod['img'];
                                        ?>
                                        <img class="card-img-top" src='<?= $src ?>' alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="buscaidprod.php?id=<?=$prod['id'] ?>" title="View Product"><?= substr($prod['nome'], 0, 17);?></a></h4>
                                            <p class="card-text"><?= mb_strimwidth($prod['descr'], 0, 43, " ...");?></p>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="btn btn-light btn-block"><?= "R$ ".number_format($prod['preco'], 2, ',', '.')?></p>
                                                </div>
                                                <div class="col">
                                                  <a href="carrinho.php?acao=add&id=<?=$prod['id']?>" class="btn btn-warning btn-block">Adicionar ao carrinho</a>
                                                </div>
                                                <?php
                                                if(isset($_SESSION['user'])){
                                                    if($_SESSION['user']['permissao'] == "admin"){
                                                ?>
                                                        <div class="col">
                                                            <a href='<?="atualizar_prod.php?prodid=".$prod['id']?>' class="btn mt-1 btn-warning btn-block">Editar</a>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="card">
                                        <?php $prod = $produtos[$indices[$i++]];
                                            $src = "uploads".DIRECTORY_SEPARATOR."thumbnail".DIRECTORY_SEPARATOR.$prod['img'];
                                        ?>
                                        <img class="card-img-top" src='<?= $src ?>' alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="buscaidprod.php?id=<?=$prod['id'] ?>" title="View Product"><?= substr($prod['nome'], 0, 17);?></a></h4>
                                            <p class="card-text"><?= mb_strimwidth($prod['descr'], 0, 43, " ...");?></p>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="btn btn-light btn-block"><?= "R$ ".number_format($prod['preco'], 2, ',', '.')?></p>
                                                </div>
                                                <div class="col">
                                                  <a href="carrinho.php?acao=add&id=<?=$prod['id']?>" class="btn btn-warning btn-block">Adicionar ao carrinho</a>
                                                </div>
                                                <?php
                                                if(isset($_SESSION['user'])){
                                                    if($_SESSION['user']['permissao'] == "admin"){
                                                ?>
                                                        <div class="col">
                                                            <a href='<?="atualizar_prod.php?prodid=".$prod['id']?>' class="btn mt-1 btn-warning btn-block">Editar</a>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="card">
                                        <?php $prod = $produtos[$indices[$i++]];
                                            $src = "uploads".DIRECTORY_SEPARATOR."thumbnail".DIRECTORY_SEPARATOR.$prod['img'];
                                        ?>
                                        <img class="card-img-top" src='<?= $src ?>' alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="buscaidprod.php?id=<?=$prod['id'] ?>" title="View Product"><?= substr($prod['nome'], 0, 17);?></a></h4>
                                            <p class="card-text"><?= mb_strimwidth($prod['descr'], 0, 43, " ...");?></p>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="btn btn-light btn-block"><?= "R$ ".number_format($prod['preco'], 2, ',', '.')?></p>
                                                </div>
                                                <div class="col">
                                                  <a href="carrinho.php?acao=add&id=<?=$prod['id']?>" class="btn btn-warning btn-block">Adicionar ao carrinho</a>
                                                </div>
                                                <?php
                                                if(isset($_SESSION['user'])){
                                                    if($_SESSION['user']['permissao'] == "admin"){
                                                ?>
                                                        <div class="col">
                                                            <a href='<?="atualizar_prod.php?prodid=".$prod['id']?>' class="btn mt-1 btn-warning btn-block">Editar</a>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="card">
                                        <?php $prod = $produtos[$indices[$i++]];
                                            $src = "uploads".DIRECTORY_SEPARATOR."thumbnail".DIRECTORY_SEPARATOR.$prod['img'];
                                        ?>
                                        <img class="card-img-top" src='<?= $src ?>' alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="buscaidprod.php?id=<?=$prod['id'] ?>" title="View Product"><?= substr($prod['nome'], 0, 17);?></a></h4>
                                            <p class="card-text"><?= mb_strimwidth($prod['descr'], 0, 43, " ...");?></p>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="btn btn-light btn-block"><?= "R$ ".number_format($prod['preco'], 2, ',', '.')?></p>
                                                </div>
                                                <div class="col">
                                                  <a href="carrinho.php?acao=add&id=<?=$prod['id']?>" class="btn btn-warning btn-block">Adicionar ao carrinho</a>
                                                </div>
                                                <?php
                                                if(isset($_SESSION['user'])){
                                                    if($_SESSION['user']['permissao'] == "admin"){
                                                ?>
                                                        <div class="col">
                                                            <a href='<?="atualizar_prod.php?prodid=".$prod['id']?>' class="btn mt-1 btn-warning btn-block">Editar</a>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container mt-3 mb-4">
            <div class="row">
                <div class="col-sm">
                    <div class="card">
                        <div class="card-header bg-primary  text-uppercase">
                            <i class="fa fa-trophy"></i> Melhores produtos
                        </div>
                        <div class="card-body">
                            <div class="row">
                            <div class="col-sm">
                                    <div class="card">
                                        <?php $prod = $produtos[$indices[$i++]];
                                            $src = "uploads".DIRECTORY_SEPARATOR."thumbnail".DIRECTORY_SEPARATOR.$prod['img'];
                                        ?>
                                        <img class="card-img-top" src='<?= $src ?>' alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="buscaidprod.php?id=<?=$prod['id'] ?>" title="View Product"><?= substr($prod['nome'], 0, 17);?></a></h4>
                                            <p class="card-text"><?= mb_strimwidth($prod['descr'], 0, 43, " ...");?></p>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="btn btn-light btn-block"><?= "R$ ".number_format($prod['preco'], 2, ',', '.')?></p>
                                                </div>
                                                <div class="col">
                                                  <a href="carrinho.php?acao=add&id=<?=$prod['id']?>" class="btn btn-warning btn-block">Adicionar ao carrinho</a>
                                                </div>
                                                <?php
                                                if(isset($_SESSION['user'])){
                                                    if($_SESSION['user']['permissao'] == "admin"){
                                                ?>
                                                        <div class="col">
                                                            <a href='<?="atualizar_prod.php?prodid=".$prod['id']?>' class="btn mt-1 btn-warning btn-block">Editar</a>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="card">
                                        <?php $prod = $produtos[$indices[$i++]];
                                            $src = "uploads".DIRECTORY_SEPARATOR."thumbnail".DIRECTORY_SEPARATOR.$prod['img'];
                                        ?>
                                        <img class="card-img-top" src='<?= $src ?>' alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="buscaidprod.php?id=<?=$prod['id'] ?>" title="View Product"><?= substr($prod['nome'], 0, 17);?></a></h4>
                                            <p class="card-text"><?= mb_strimwidth($prod['descr'], 0, 43, " ...");?></p>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="btn btn-light btn-block"><?= "R$ ".number_format($prod['preco'], 2, ',', '.')?></p>
                                                </div>
                                                <div class="col">
                                                  <a href="carrinho.php?acao=add&id=<?=$prod['id']?>" class="btn btn-warning btn-block">Adicionar ao carrinho</a>
                                                </div>
                                                <?php
                                                if(isset($_SESSION['user'])){
                                                    if($_SESSION['user']['permissao'] == "admin"){
                                                ?>
                                                        <div class="col">
                                                            <a href='<?="atualizar_prod.php?prodid=".$prod['id']?>' class="btn mt-1 btn-warning btn-block">Editar</a>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="card">
                                        <?php $prod = $produtos[$indices[$i++]];
                                            $src = "uploads".DIRECTORY_SEPARATOR."thumbnail".DIRECTORY_SEPARATOR.$prod['img'];
                                        ?>
                                        <img class="card-img-top" src='<?= $src ?>' alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="buscaidprod.php?id=<?=$prod['id'] ?>" title="View Product"><?= substr($prod['nome'], 0, 17);?></a></h4>
                                            <p class="card-text"><?= mb_strimwidth($prod['descr'], 0, 43, " ...");?></p>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="btn btn-light btn-block"><?= "R$ ".number_format($prod['preco'], 2, ',', '.')?></p>
                                                </div>
                                                <div class="col">
                                                  <a href="carrinho.php?acao=add&id=<?=$prod['id']?>" class="btn btn-warning btn-block">Adicionar ao carrinho</a>
                                                </div>
                                                <?php
                                                if(isset($_SESSION['user'])){
                                                    if($_SESSION['user']['permissao'] == "admin"){
                                                ?>
                                                        <div class="col">
                                                            <a href='<?="atualizar_prod.php?prodid=".$prod['id']?>' class="btn mt-1 btn-warning btn-block">Editar</a>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="card">
                                        <?php $prod = $produtos[$indices[$i++]];
                                            $src = "uploads".DIRECTORY_SEPARATOR."thumbnail".DIRECTORY_SEPARATOR.$prod['img'];
                                        ?>
                                        <img class="card-img-top" src='<?= $src ?>' alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="buscaidprod.php?id=<?=$prod['id'] ?>" title="View Product"><?= substr($prod['nome'], 0, 17);?></a></h4>
                                            <p class="card-text"><?= mb_strimwidth($prod['descr'], 0, 43, " ...");?></p>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="btn btn-light btn-block"><?= "R$ ".number_format($prod['preco'], 2, ',', '.')?></p>
                                                </div>
                                                <div class="col">
                                                  <a href="carrinho.php?acao=add&id=<?=$prod['id']?>" class="btn btn-warning btn-block">Adicionar ao carrinho</a>
                                                </div>
                                                <?php
                                                if(isset($_SESSION['user'])){
                                                    if($_SESSION['user']['permissao'] == "admin"){
                                                ?>
                                                        <div class="col">
                                                            <a href='<?="atualizar_prod.php?prodid=".$prod['id']?>' class="btn mt-1 btn-warning btn-block">Editar</a>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



<?php include 'rodape.php';
