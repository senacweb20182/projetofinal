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
                    <li class="breadcrumb-item"><a href="categoria.php">Categoria</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sub-categoria</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
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
                          <div class="col">
                            <a href="carrinho.php?acao=add&id=<?=$last['id']?>" class="btn btn-warning btn-block">Adicionar ao carrinho</a>
                          </div>
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
                        <img class="card-img-top" src=<?="uploads".DIRECTORY_SEPARATOR."thumbnail".DIRECTORY_SEPARATOR.$produto['img'];?> alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><a href="buscaidprod.php?id=<?=$produto['id'] ?>" title="View Product"><?= $produto['nome'] ?></a></h4>
                            <p class="card-text"><?= $produto['descr'] ?></p>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block">R$ <?= $produto['preco'] ?></p>
                                </div>
                                <div class="col">
                                  <a href="carrinho.php?acao=add&id=<?=$produto['id']?>" class="btn btn-warning btn-block">Adicionar ao carrinho</a>
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
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include 'rodape.php';
