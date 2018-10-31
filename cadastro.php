<?php include 'cabecalho.php'; ?>
<?php
if (isset($_SESSION['valorcli'])) {
    $registro = $_SESSION['valorcli'];
} else {
    $registro = array("nome" => "",
        "email" => "",
        "login" => "",
        "senha" => "",
        "data_nasc" => "",
        "cpf" => "",
        "ddd" => "",
        "celular" => "",
    );
}
?>
<body class="bg-light">
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="?" alt="" width="72" height="72">
            <h2>cc</h2>
            <p class="lead">?</p>
        </div>
        <div class="row">
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
                <!--Código promocional-->
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
                <form action="registra.php" method="post" enctype='multipart/form-data' class="needs-validation" novalidate>
                    <h4 class="mb-3">Cadastro de Cliente</h4>
                    <div class="row">
                        <div class="col-md-7 mb-3">
                            <label for="nome">Nome Completo</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="" value=<?= $registro['nome'] ?> >
                            <div class="invalid-feedback">                                     
                                Nome válido é obrigatório.
                            </div>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="" value=<?= $registro['email'] ?> >
                            <div class="invalid-feedback">                                     
                                E-mail válido é obrigatório.
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
                                <input type="text" class="form-control" id="login" name="login" placeholder="Digite o Login" value=<?= $registro['login'] ?> >
                                <div class="invalid-feedback" style="width: 100%;">
                                    Nome de usuário obrigatório.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="senha">Senha </label>
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a senha" value="">

                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="senhaValidar">Senha Validar </label>
                            <input type="password" class="form-control" id="senhaValidar" name="senhaValidar" placeholder="Digite a senha" value="">
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-4 mb-3">
                            <label>Data de Nascimento</label>
                            <input type="date" id="data_nasc" name="data_nasc" value="" class="form-control ">                                
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cpf">CPF</label>
                            <input id="cpf" class="form-control" maxlength="14" name="cpf" value="" type="text" placeholder="000.000.000-00" value=<?= $registro['cpf'] ?> >
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="ddd">DDD</label>
                            <input id="ddd" class="form-control" minlength="2" maxlength="2" name="ddd" value="21" type="tel" placeholder="21" value=<?= $registro['ddd'] ?>>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="celular">Celular</label>
                            <input id="celular" class="form-control" minlength="9" maxlength="10" name="celular" value="9000-00000" type="tel" placeholder="9000-00000" value=<?= $registro['celular'] ?> >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" placeholder="00000-000" name="cep" id="cep" value="" size="10" maxlength="9" onblur="pesquisacep(this.value);" />
                            <div class="invalid-feedback">
                                Favor insira o CEP.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" placeholder="Digite o bairro" name="bairro" id="bairro" value="" size="10" maxlength="40" />
                            <div class="invalid-feedback">
                                Favor insira o Bairro.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" placeholder="Digite a cidade" name="cidade" id="cidade" value="" size="10" maxlength="40" />
                            <div class="invalid-feedback">
                                Favor insira a Cidade.
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="uf">UF</label>
                            <input type="text" class="form-control" id="uf" name="uf" placeholder="UF" size="2">
                            <div class="invalid-feedback">
                                Favor insira o Estado.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-12">
                            <label for="rua">Logradouro</label>
                            <input type="text" class="form-control" placeholder="Nome da Av., Rua, Etc.." name="rua" id="rua" value="" size="10" maxlength="60" />
                            <div class="invalid-feedback">
                                Favor insira o Logradouro.
                            </div>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="numero">Número</label>
                            <input type="text" class="form-control" id="numero" name="numero" placeholder="Digite o Número " >
                            <div class="invalid-feedback">
                                Favor insira o Número.
                            </div>
                        </div>
                        <div class="mb-3 col-9">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Digite o complemento (opcional)">
                            <div class="invalid-feedback">
                                Favor insira o Complemento.
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">

                    <?php
                    if (isset($_SESSION['cond_cli'])) {
                        if (!$_SESSION['cond_cli']['nome'])
                            echo "<p class='text-danger'>nome invalido!</p>";
                        if (!$_SESSION['cond_cli']['email'])
                            echo "<p class='text-danger'>email invalido!</p>";
                        if (!$_SESSION['cond_cli']['login'])
                            echo "<p class='text-danger'>login invalido!</p>";
                        if (!$_SESSION['cond_cli']['senha'])
                            echo "<p class='text-danger'>senha invalida!</p>";
                        if (!$_SESSION['cond_cli']['data_nasc'])
                            echo "<p class='text-danger'>data de nascimento invalida!</p>";
                        if (!$_SESSION['cond_cli']['ddd'])
                            echo "<p class='text-danger'>ddd invalido!</p>";
                        if (!$_SESSION['cond_cli']['celular'])
                            echo "<p class='text-danger'>numero de telefone invalido!</p>";
                        if (!$_SESSION['cond_cli']['cpf'])
                            echo "<p class='text-danger'>cpf invalido!</p>";
                        unset($_SESSION['cond_cli']);
                    }
                    ?>
                    <div class="form-group">
                        <button class="col-sm-3 col-12 float-right btn btn-primary btn-lg" type="submit">Salvar</button>
                        <button class="col-sm-3 col-12 float-left btn btn-info btn-lg" type="reset">Limpar</button>
                    </div>
                    <?php
                    if (isset($_SESSION['msg'])) {
                        if ($_SESSION['msg']) {
                            ?>
                            <p class="pull-right text-success">Dados gravados com sucesso</p>
                            <?php
                        } else {
                            ?>
                            <p class="pull-right text-danger">Erro ao gravar</p>
                            <?php
                        }
                         # removem a sessão
                    unset($_SESSION['msg']);
                    }                   
                    ?>
                </form>
            </div>
        </div>
        <?php
        unset($_SESSION['valorcli']);
        unset($_SESSION['cond_cli']);
        ?>
    </div> 
    <br>
    <?php include 'rodape.php'; ?>


