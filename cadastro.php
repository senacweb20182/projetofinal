<?php include 'cabecalho.php' ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="jumbotron" align="center">
                    <p>Página Index</p>
                </div>
            </div>
            <section>
        <div class="container">
            <div class="row col-xs-6 col-xs-offset-3">
                <fieldset>
                    <legend>Registro de Produto</legend>
                    <form action="registra.php" method="post">
                        <div class="form-group">
                            <label for="prod">Nome do produto</label>
                            <input type="text" class="form-control" 
                            name="prod" id="prod" required>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto do produto</label>
                            <input type="text" class="form-control" 
                            namw="foto" id="foto" required>
                        </div>
                        <div class="form-group col-xs-4">
                            <label for="quant">Quantidade</label>
                            <input type="number" class="form-control" 
                            name="quant" id="quant" required>
                        </div>
                        <div class="form-group col-xs-4">
                            <label for="price">Preço</label>
                            <input type="number" class="form-control" 
                            name="price" id="price" required>
                        </div>
                        <div class="form-group col-xs-4">
                            <label for="custo">custo do produto</label>
                            <input type="number" class="form-control" 
                            name="custo" id="price" required>
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