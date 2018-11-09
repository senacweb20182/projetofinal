<?php
include 'cabecalho.php';
if(isset($_SESSION['user'])){
  ?>
  <div class="cover-container bg-white text-center d-flex flex-column h-100 w-100 p-5 ml-auto mr-auto mt-1 mb-1" style="height: 25.8em">
    <div class="inner cover mx-auto">
      <hgroup class="mt-5 mb-3">
        <h1 class="cover-heading">Bem-Vindo <?=ucfirst($_SESSION['user']['nome'])?></h1>
        <h2 class="lead">Escolha uma das opções abaixo para ter acesso</h2>
      </hgroup>
      <div class="row">
        <div class="btn-group mr-1">
          <button type="button" onclick="location.href='index.php'" class="btn btn-secondary btn-block">Página Inicial</button>
        </div>
        <div class="btn-group mr-1">
          <button type="button" onclick="location.href='atualizar.php'" class="btn btn-secondary btn-block">Atualizar Dados</button>
        </div>
        <?php if($_SESSION['user']['permissao'] == "admin"){ ?>
          <div class="btn-group mr-1">
            <button type="button" onclick="location.href='cadastro_prod.php'" class="btn btn-secondary btn-block">Cadastro de produto</button>
          </div>
        <?php }?>
        <div class="btn-group mr-1">
          <button type="button" onclick="location.href='logout.php'" class="btn btn-secondary btn-block">Log Out</button>
        </div>
      </div>
    </div>
  </div>
  <?php include 'rodape.php';
}
else{
  header("Location: login.php");
}
?>
