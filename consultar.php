<?php include 'cabecalho.php' ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="jumbotron" align="center">
                    <p>Página de Cadastro de produtos</p>
                </div>
            </div>
            <section>
        <div class="container">
            <div class="row col-xs-6 col-xs-offset-3">
                <fieldset>
                    <legend>consulta de Produto</legend>
                    <form action="consulta.php" method="post">
                        <div class="form-group">
                            <label for="prod">Nome do produto</label>
                            <input type="text" class="form-control" 
                            name="prod" id="prod" required>
                        </div>
                        
                        <div>
                            <button type="submit" name="consulta" class="btn btn-info">consultar</button>
                            <?php
                                if(isset($_SESSION['msg'])) { 
                                    if($_SESSION['msg']) {
                                       echo $prod;
                                       echo "1 2 3"; 
                                       vardump($result);
                            
                                    } else {
                                        
                                        
                            ?>
                            <p class="pull-right text-danger">Erro ao buscar</p>
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