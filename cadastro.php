<?php 
     
    include 'cabecalho.php';
    
?>
    <section>
        <div class="container">
            <div class="row">
                <div class="jumbotron" align="center">
                    <p>Página Index</p>
                    <nav class="navbar-light bg-light ">
                    <a class="navbar-brand" href='cadastro.php'>Cadastro</a>
                    <a class="navbar-brand" href='consulta.php'>Busca e Atualização</a>
                </nav>
                </div>
                
            </div>
            <section>
        <div class="container">
            <div class="row col-xs-6 col-xs-offset-3">
                <fieldset>
                    <legend>Registro de Produto</legend>
                    <form action="registra.php" method="post" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label for="prod">Nome do produto</label>
                            <input type="text" class="form-control" 
                            name="prod" id="prod"  required>
                        </div>
                        <div class="form-group col-xs-6">
                        <label class='src-only' for='id_fileUpload'>Arquivo</label>
						<input type='file' class='form-control' name='fileUpload' id='id_fileUpload'>
                        </div>
                        <div class="col-xs-6">
			                <figure>
				                <img class="img-thumbnail" id='previewImg' alt="200x200" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1668cd44530%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1668cd44530%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2274.4296875%22%20y%3D%22104.5%22%3E200x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 200px; height:200px;">
			                </figure>
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
                        <div class="form-group col-xs-4">
                            <label for="custo">custo do produto</label>
                            <input type="number" class="form-control" 
                            name="custo" id="price"  required>
                        </div><br><br>
                        <br><br><div class="form-group">
                            <label for="desc">Descrição completa do produto</label></br>
                            <textarea id="desc" name="desc" rows="5" maxlength="300" cols="50"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="rev">Descrição resumida do produto</label></br>
                            <textarea id="rev" name="rev" rows="5" maxlength="150" cols="50"></textarea>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-info">Salvar</button>
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
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </section>
        </div>
    </section>
<?php include 'rodape.php' ?>