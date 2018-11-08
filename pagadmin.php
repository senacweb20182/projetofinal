<?php
    include 'cabecalho.php'; 
    if(isset($_SESSION['user'])){
?>

<div class="cover-container shadow-sm bg-white rounded d-flex h-50 p-5 ml-auto mr-auto mt-5 mb-5 flex-column">
      

      <div class="inner cover">
        <h1 class="cover-heading mt-5">Bem-Vindo <?=ucfirst($_SESSION['user']['nome'])?></h1>
        <p class="lead">Escolha uma das opções abaixo para ter acesso</p>
        <p class="lead">
          	<a href="index.php" class="btn btn-sm btn-warning">Página inicial</a><br>
            <a href="atualizar.php" class="btn btn-sm btn-warning">Atualizar Dados</a><br>
            <?php if($_SESSION['user']['permissao'] == "admin"){ ?>
            <a href="cadastro_prod.php" class="btn btn-sm btn-warning">Cadastro de produto</a><br> <?php }?>
			      
            <a href="logout.php" class="btn btn-sm btn-warning">Log Out</a><br>
		      	
        </p>
      </div>
      


</div>

<?php include 'rodape.php';
}
else{
  header("Location: login.php");
}
?>


