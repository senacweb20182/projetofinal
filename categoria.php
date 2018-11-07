<?php   include 'cabecalho.php';
        include 'crud.php'       ?>

<?php
    $listtotal = produto_index();
    if(isset($_GET['cat'])){
        $listproduto = produto_index_cat($_GET['cat']);
    }
    else{
        $listproduto = $listtotal;
    }

    if(isset($_GET['pag'])){
        $pag = $_GET['pag']-1;
    }
    else{
        $pag = 0;
    }
    $prod_pag = 6;

    $len = count($listtotal);
    $len_atual = count($listproduto);
    $pags = ceil($len_atual/$prod_pag);
    $last = $listtotal[$len-1];
    $arrayCat = getCategoria();
?>

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
                <?php
                    foreach($arrayCat as $cat){?>
                    <li class="list-group-item list-group-item-action"><a href='categoria.php?cat=<?=$cat?>'><?=$cat?></a></li>
                    <?php } ?>
                    <li class="list-group-item list-group-item-action"><a href='categoria.php'>Todos</a></li>
                </ul>
            </div>

            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-uppercase">Último produto</div>
                <div class="card-body">
                    <img class="img-fluid" src="<?= "uploads" . DIRECTORY_SEPARATOR . $last['img'] ?>"/>
                    <h5 class="card-title"><?= $last['nome']?></h5>
                    <p class="card-text"><?= $last['descr']?></p>
                    <p class="bloc_left_price"><?= 'R$ ' . number_format($last['preco'], 2, ',', '.') ?></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <?php
                  for ($i = $pag*$prod_pag; $i<(($pag+1)*$prod_pag); $i++) {
                      if(isset($listproduto[$i])){
                ?>
                <div class="col-12 col-md-6 col-lg-4" style="margin-bottom: 2%">
                    <div class="card">
                        <img class="card-img-top" src='<?= "uploads" . DIRECTORY_SEPARATOR . "thumbnail" . DIRECTORY_SEPARATOR . $listproduto[$i]['img'] ?>' alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><a href="buscaidprod.php?id=<?=$listproduto[$i]['id'] ?>" title="View Product"><?= $listproduto[$i]['nome'] ?></a></h4>
                            <p class="card-text"><?= $listproduto[$i]['descr'] ?></p>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block"><?= 'R$ ' . number_format($listproduto[$i]['preco'], 2, ',', '.') ?></p>
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-warning btn-block">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                  }}
                ?>
                <div class="col-12">
                    <nav aria-label="...">
                        <ul class="pagination">
                        <?php if($pag != 0){
                                    if(isset($_GET['cat'])){
                                        $link = "categoria.php?pag=$pag&cat=".$_GET['cat'];
                                    }
                                    else{
                                        $link = "categoria.php?pag=$pag";
                                    } ?>
                            <li class="page-item">
                                <a class="page-link" href='<?="categoria.php?pag=$pag"?>'>Anterior</a>
                            </li>
                        <?php }
                                for($i = 1; $i <= $pags; $i++){
                                    if(isset($_GET['cat'])){
                                        $link = "categoria.php?pag=$i&cat=".$_GET['cat'];
                                    }
                                    else{
                                        $link = "categoria.php?pag=$i";
                                    }
                                    if($i == $pag+1){
                        ?>
                            <li class="page-item active">
                                <a class="page-link" href='<?=$link?>'><?=$i?><span class="sr-only">(current)</span></a>
                            </li>
                                <?php
                                }
                                else{ ?>
                            <li class="page-item inactive">
                                <a class="page-link" href='<?="categoria.php?pag=$i"?>'><?=$i?><span class="sr-only">(current)</span></a>
                            </li>

                        <?php    }
                                 } 
                                if($pag+1 < $pags){
                                $prox_pag = $pag+2;
                                    if(isset($_GET['cat'])){
                                        $link = "categoria.php?pag=$prox_pag&cat=".$_GET['cat'];
                                    }
                                    else{
                                        $link = "categoria.php?pag=$prox_pag";
                                    }  ?>
                            <li class="page-item">
                                <a class="page-link" href='<?="categoria.php?pag=$prox_pag"?>'>Proxima</a>
                            </li>
                            <?php }?>
                        
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include 'rodape.php';
