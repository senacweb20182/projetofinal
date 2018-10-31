<?php include 'cabecalho.php'; ?>
<!doctype html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">

        <title>Cadastro de Cliente</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="form-validation.css" rel="stylesheet">
    </head>

    <body class="bg-light">

        <div class="container">
                     
            <div class="row mt-5">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Seu carrinho</span>
                        <span class="badge badge-secondary badge-pill">quantidade no carrinho</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">1º Produto</h6>
                                <small class="text-muted">Descrição breve</small>
                            </div>
                            <span class="text-muted">R$</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0">Código promocional</h6>
                                <small>CÓDIGO DE EXEMPLO</small>
                            </div>
                            <span class="text-success">-$5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (R$)</span>
                            <strong>?</strong>
                        </li>
                    </ul>

                    <form class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Código promocional">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">Resgatar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Cadastro de Cliente</h4>
                    <form class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="firstName">Nome Completo</label>
                                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                                <div class="invalid-feedback">                                     
                                    Nome válido é obrigatório.
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-4 mb-3">
                                <label for="username">Nome de usuário</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                    <input type="text" class="form-control" id="login" placeholder="Digite o Login" required>
                                    <div class="invalid-feedback" style="width: 100%;">
                                        Nome de usuário obrigatório.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="senha">Senha </label>
                                <input type="senha" class="form-control" id="senha" placeholder="Digite a senha" required>

                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="senhaValidar">Senha Validar </label>
                                <input type="senhaValidar" class="form-control" id="senhaValidar" placeholder="Digite a senha" required>
                            </div>
                        </div>

                        <div class="row"> 
                            <div class="col-md-4 mb-3">
                                <label>Data de Nascimento</label>
                                <input type="date" id="data" name="data" value="" class="form-control">                                
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="cpf">CPF</label>
                                <input id="cpf" class="form-control" maxlength="14" name="cpf" value="" type="text" placeholder="000.000.000-00" quired="required">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="telefone">Telefone</label>
                                <input id="telefone" class="form-control" maxlength="13" name="telefone" value="" type="text" placeholder="00-00000-0000" quired="required">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address">Endereço</label>
                            <input type="text" class="form-control" id="endereco" placeholder="Nome da Av., Rua, Etc.." required>
                            <div class="invalid-feedback">
                                Favor insira o endereço.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="numero">Número</label>
                            <input type="text" class="form-control" id="numero" placeholder="Digite o Número " required>
                            <div class="invalid-feedback">
                                Favor insira o Número.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" id="complemento" placeholder="Digite o complemento (opcional)">                            
                        </div>

                        <div class="row">                           
                            <div class="col-md-3 mb-3">
                                <label for="bairro">Bairro</label>
                                <input type="text" class="form-control" id="numero" placeholder="Digite o bairro" required>
                                <div class="invalid-feedback">
                                    Favor insira o Bairro.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="cidade">Cidade</label>
                                <select class="custom-select d-block w-100" id="state" required>
                                    <option value="">Escolher...</option>
                                    <option>Rio de Janeiro</option>
                                </select>
                                <div class="invalid-feedback">
                                    Selecione um Cidade.
                                </div>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="uf">UF</label>
                                <select class="custom-select d-block w-100" id="state" required>
                                    <option value="">Escolher...</option>
                                    <option>RJ</option>
                                </select>
                                <div class="invalid-feedback">
                                    Selecione um Cidade.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">CEP</label>
                                <input type="text" class="form-control" id="zip" placeholder="00000-000"maxlength="9" required>
                                <div class="invalid-feedback">
                                    CEP obrigatório.
                                </div>
                            </div>
                        </div>
                        <hr class="mb-2">
                        <button class="btn btn-warning mb-4" type="submit">Salvar</button>
                    </form>
                </div>
            </div>

           
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/holder.min.js"></script>
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function () {
                'use strict';

                window.addEventListener('load', function () {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');

                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function (form) {
                        form.addEventListener('submit', function (event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
    </body>
</html>
<?php include 'rodape.php'; ?>