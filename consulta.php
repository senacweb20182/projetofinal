<?php include 'cabecalho.php' ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="jumbotron" align="center">
                    <p>Página Administrativa</p>
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
                    <legend>Consulta de Produto</legend>
                    <form action="busca.php" method="post">
                        <div class="form-group">
                            <label for="prod">Nome do produto</label>
                            <input type="text" class="form-control" 
                            name="prod" id="prod" required>
                        </div>
                       
                        <div>
                            <button type="submit" class="btn btn-info">Consultar</button>
                            <?php
                                if(isset($_SESSION['msg'])) { 
                                   
                                    if($_SESSION['msg']) {
                                        
                            ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Produto</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Quantidade</th>
                                        <th scope="col">Preço</th>
                                        <th scope="col">Custo</th>
                                        <th scope="col">Atualizar</th>
                                    <tr>
                                </thead>
                                <tbody>
                            <?php
                            for($i=0;$i<count($_SESSION['prod']);$i++){
                                ?>
                                <tr>
                                    <td><?=$_SESSION['prod'][$i][0]?></td>
                                    <td><?=$_SESSION['prod'][$i][1]?></td>
                                    <td><?=$_SESSION['prod'][$i][2]?></td>
                                    <td><?=$_SESSION['prod'][$i][3]?></td>
                                    <td><?=$_SESSION['prod'][$i][4]?></td>
                                    <td><?=$_SESSION['prod'][$i][5]?></td>
                                    <td><button type='submit' formnovalidate formmethod='post' formaction="buscaid.php?id=<?=$_SESSION['prod'][$i][0] ?>" class='btn'>Atualizar</button></td>
                                </tr>
                            <?php
                            }
                                } else {
                            ?>
                                </tbody>
                            </table>
                                <p class="pull-right text-danger">Produto não encontrado</p>
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