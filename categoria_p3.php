<?php include 'cabecalho.php'; ?>

<div class="container">
    <div class="row mt-4">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Categoria</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-uppercase"><i class="fa fa-list"></i> Categoria</div>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action"><a href="categoria_celular.php">Celular</a></li>
                    <li class="list-group-item list-group-item-action"><a href="categoria_tablet.php">Tablet</a></li>
                    <li class="list-group-item list-group-item-action"><a href="categoria_smartwatch.php">Smartwatch</a></li>
                </ul>
            </div>

            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-uppercase">Último produto</div>
                <div class="card-body">
                    <img class="img-fluid" src="https://dummyimage.com/400x400/55595c/fff" />
                    <h5 class="card-title">Product title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <p class="bloc_left_price">R$ 99.00</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <?php
                  #session_start();
                  if(!isset($_SESSION['prod'])) {
                    $_SESSION['prod'] = array(
                      "prod1" => array("", "", "", "", "", ""));
                  }

                  $listproduto = $_SESSION['prod'];

                  foreach ($listproduto as  $produto) {
                ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <img class="card-img-top" src="<?= "uploads" . DIRECTORY_SEPARATOR . $produto[2] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><a href="buscaidprod.php?id=<?=$produto[0] ?>" title="View Product"><?= $produto[1] ?></a></h4>
                            <p class="card-text"><?= $produto[7] ?></p>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block"><?= $produto[4] ?></p>
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-warning btn-block">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                  }
                ?>
                <div class="col-12">
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item active">
                                <a class="page-link" href="categoria_p2.php" tabindex="-1">Anterior</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="categoria.php">1<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="categoria_p2.php">2</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="categoria_p3.php">3</a>
                            </li>
                            <li class="page-item disabled">
                                <a class="page-link" href="#">Proxima</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include 'rodape.php';
