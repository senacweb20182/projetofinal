<?php
include 'cabecalho.php';
if(isset($_SESSION['user'])){
  if($_SESSION['user']['permissao'] == "admin"){

    ?>
    <div class="cover-container bg-white text-center d-flex flex-column h-100 w-100 p-5 ml-auto mr-auto mt-1 mb-1">
      <div class="inner cover mx-auto" style="height: 19em">
        <hgroup class="mt-3 mb-3">
          <h1 class="cover-heading">Cadastro de Produto</h1>
          <h2 class="lead">Menu de acesso</h2>
        </hgroup>
        <div class="row">
          <div class="btn-group mr-1 mb-1">
            <button type="button" onclick="location.href='index.php'" class="btn btn-secondary btn-block">Página Inicial</button>
          </div>
          <div class="btn-group mr-1 mb-1">
            <button type="button" onclick="location.href='atualizar.php'" class="btn btn-secondary btn-block">Atualizar Dados</button>
          </div>
          <div class="btn-group mr-1 mb-1">
            <button type="button" onclick="location.href='logout.php'" class="btn btn-secondary btn-block">Log Out</button>
          </div>
        </div>
      </div>

      <section>
        <div class="container">
          <fieldset class="shadow-lg p-1 mb-5 rounded">
            <legend>Registro de Produto</legend>
            <form action="registra_prod.php" method="post" enctype='multipart/form-data'>
              <div class="float-left col-sm-6 col-12">
                <div class="col-xs-6">
                  <figure>
                    <img class="rounded mx-auto d-block" id='previewImg' alt="200x200" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1668cd44530%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1668cd44530%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2274.4296875%22%20y%3D%22104.5%22%3E200x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 200px; height:200px;">
                  </figure>
                </div>
                <div class="form-group col-xs-6">
                  <label class='src-only' for='id_fileUpload'>Foto do Produto</label>
                  <input type='file' class='form-control' name='fileUpload' id='id_fileUpload'>
                </div>
                <div class="form-group">
                  <label for="prod">Código de referência</label>
                  <input type="number" class="form-control"
                  name="cod_ref" id="cod_ref"  required>
                </div>
                <div class="form-group">
                  <label for="prod">Nome do produto</label>
                  <input type="text" class="form-control"
                  name="prod" id="prod"  required>
                </div>
                <div class="form-group col-xs-4">
                  <label for="cat">Categoria</label>
                  <input type="text" class="form-control"
                  name="cat" id="cat"  required>
                </div>
                <div class="form-group col-xs-4">
                  <label for="cat">Marca</label>
                  <input type="text" class="form-control"
                  name="marca" id="marca"  required>
                </div>
                <div class="form-group col-xs-4">
                  <label for="quant">Quantidade</label>
                  <input type="number" class="form-control"
                  name="quant" id="quant"  required>
                </div>
                <div class="form-group col-xs-4">
                  <label for="price">Preço</label>
                  <input type="number" class="form-control"
                  name="price" id="price"  required>
                </div>
              </div>
              <div class="float-right  col-sm-6 col-12">
                <div class="form-group">
                  <label for="desc">Descrição completa do produto</label></br>
                  <textarea id="desc" class="form-control" name="desc" rows="5" maxlength="300" cols="50"></textarea>
                </div>
                <div class="form-group">
                  <label for="rev">Descrição resumida do produto</label></br>
                  <textarea id="rev" name="rev" class="form-control" rows="5" maxlength="150" cols="50"></textarea>
                </div>
                <div class="form-group">
                  <label for="prod">Altura</label>
                  <input type="number" class="form-control"
                  name="alt" id="alt"  required>
                </div>
                <div class="form-group">
                  <label for="prod">largura</label>
                  <input type="number" class="form-control"
                  name="larg" id="larg"  required>
                </div>
                <div class="form-group">
                  <label for="prod">Comprimento</label>
                  <input type="number" class="form-control"
                  name="comp" id="comp"  required>
                </div>
                <div class="form-group">
                  <label for="prod">Diamêtro</label>
                  <input type="number" class="form-control"
                  name="diam" id="diam"  required>
                </div>
                <div class="form-group">
                  <label for="prod">Peso</label>
                  <input type="number" class="form-control"
                  name="peso" id="peso"  required>
                </div>
                <div class="btn-group col-md-3 btn-block" style="padding-left: 0; padding-right: 0">
                  <button type="submit" class="btn btn-info btn-lg btn-block">Salvar</button>
                </div>
                <div>

                  <?php
                  if(isset($_SESSION['msg'])) {
                    if($_SESSION['msg']) {

                      ?>
                      <p class="pull-right text-success">Dados gravados com sucesso</p>
                      <?php
                    } else {
                      ?>
                      <p class="pull-right text-danger">Erro ao gravar</p>
                      <?php
                    }
                  }
                  # removem a sessão
                  unset($_SESSION['msg']);
                  ?>

                  <?php   if(isset($_SESSION['cond_prod']['cadastro_existente'])){

                    if(!$_SESSION['cond_prod']['cadastro_existente']){
                      ?>
                      <div class="alert alert-danger" role="alert">
                        Esse item ja existe!
                      </div>
                      <?php
                    }
                    unset($_SESSION['cond_prod']['cadastro_existente']);
                  }
                  ?>

                </div>
              </div>
            </form>
          </fieldset>
        </div>
      </section>
    </div>
    <?php
  }
  else{?>
    <div class="alert alert-danger" role="alert">
      Acesso Restrito.
    </div><?php
  }
}
else{ ?>
  <div class="alert alert-danger" role="alert">
    Deve efetuar login antes de acessar.
  </div><?php
}
?>
<?php include 'rodape.php'; ?>
