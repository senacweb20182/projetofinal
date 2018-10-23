<?php 
     
    include 'cabecalho.php';
    if(isset($_SESSION['prod'])) {
        $prod = $_SESSION['prod'];
        
    } else {
        $_SESSION['msg'] = false;
        header:("Location: consulta.php");        
    }
    ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="jumbotron" align="center">
                    <p>Página Index
                                          
                </div>
            </div>
            <section>
        <div class="container">
            <div class="row col-xs-6 col-xs-offset-3">
                <fieldset>
                    <legend>Atualização de Produto</legend>
                    <form action="update.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="col-xs-2"
                            <label for="id">ID</label>
                            <input type="number" class="form-control" 
                            name="id" id="quant" value="<?= $prod['id'] ?>" required>
                            </div>
                            <div class="col-xs-10">
                            <label for="prod">Nome do produto</label>
                            <input type="text" class="form-control" 
                            name="prod" id="prod" value="<?= $prod['produto'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto do produto</label>
                            <input type="text" class="form-control" 
                            namw="foto" id="foto" value="<?= $prod['foto'] ?>" required>
                        </div>
                        <div class="form-group col-xs-4">
                            <label for="quant">Quantidade</label>
                            <input type="number" class="form-control" 
                            name="quant" id="quant" value="<?= $prod['quantidade'] ?>" required>
                        </div>
                        <div class="form-group col-xs-4">
                            <label for="price">Preço</label>
                            <input type="number" class="form-control" 
                            name="price" id="price" value="<?= $prod['preço'] ?>" required>
                        </div>
                        <div class="form-group col-xs-4">
                            <label for="custo">custo do produto</label>
                            <input type="number" class="form-control" 
                            name="custo" id="price" value="<?= $prod['custo'] ?>" required>
                        </div><br><br>
                        <br><br><div class="form-group">
                            <label for="desc">Descrição completa do produto</label></br>
                            <textarea id="desc" name="desc" rows="5" maxlength="300" cols="50"><?= $prod['descrição'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="rev">Descrição resumida do produto</label></br>
                            <textarea id="rev" name="rev" rows="5" maxlength="150" cols="50"><?= $prod['review'] ?></textarea>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-info">Atualizar</button>
                            
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </section>
        </div>
    </section>
<?php include 'rodape.php' ?>