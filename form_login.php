<?php
    require_once 'cabecalho.php';
?>

<section>
        <div class="container">
            <div class="row">
                <div class="jumbotron" align="center">
                    <p>Login</p>          
                </div>
            </div>
            <section>
        <div class="container">
            <div class="row col-xs-6 col-xs-offset-3">
                <fieldset>
                    <legend>Login</legend>
                    <form action="login.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="col-xs-6"
                            <label for="login">Usuario</label>
                            <input type="text" class="form-control" 
                            name="login" id="id_login" required>
                            </div>
                            <div class="col-xs-6">
                            <label for="login">Senha</label>
                            <input type="password" class="form-control" 
                            name="senha" id="id_senha" required>
                        </div>
                        <?php
                        if(isset($_SESSION['fail'])){
                            if($_SESSION['fail']){
                                echo "nome ou senha incorretos.";
                            }
                            unset($_SESSION['fail']);
                        }
                        ?>
                        <div>
                            <button type="submit" class="btn btn-info">Login</button>
                            
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </section>
        </div>
    </section>
<?php include 'rodape.php' ?>