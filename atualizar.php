<?php
include 'cabecalho.php';
include 'crud.php';
if(isset($_SESSION['user'])){
    $registro = buscaUsuario($_SESSION['user']['id']);

?>
<body class="bg-light">
    <div class="container">
        <div class="py-5 text-center">
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
                <div class="alert alert-danger d-none" role="alert" id="spanM">
                    Senhas não são iguais!
                </div>
                <form action="atualiza_arq.php" method="post" enctype='multipart/form-data' class="needs-validation" novalidate>

                    <h4 class="mb-3">Cadastro de Cliente</h4>
                    <div class="row">
                        <div class="col-md-7 mb-3">
                            <label for="nome">Nome Completo</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="" value='<?= $registro['nome'] ?>' >
                            <div class="invalid-feedback">                                     
                                Nome válido é obrigatório.
                            </div>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="" value='<?= $registro['email'] ?>' >
                            <div class="invalid-feedback">                                     
                                E-mail válido é obrigatório.
                            </div>
                        </div>
                    </div>

                    <div class="row"> 
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="col-md-4 mb-3">
                                    <label for="username">Nome de usuário</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="login" name="login" placeholder="Digite o Login" value='<?= $registro['login'] ?>' >
                                        <div class="invalid-feedback" style="width: 100%;">
                                            Nome de usuário obrigatório.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="senha">Senha (8 ou mais caracteres)</label>
                                    <div class="input-group">                                        
                                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a senha" value='<?=$registro['senha']?>' minlength=8>                                        
                                    </div>
                                    <div id="senhaBarra" class="progress" style="display: none;">
                                        <div id="senhaForca" class="progress-bar bg-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="senhaValidar">Confirmar Senha</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="senhaValidar" name="senhaValidar" placeholder="Digite a senha" value='<?=$registro['senha']?>' minlength=8>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fa fa-eye-slash" type="button" id="show_password" name="show_password"  aria-hidden="true" ></i></span>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row"> 
                        <div class="col-md-4 mb-3">
                            <label>Data de Nascimento</label>
                            <input type="date" id="data_nasc" name="data_nasc" value='<?= $registro['data_nasc'] ?>' class="form-control ">                                
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cpf">CPF</label>
                            <input id="cpf" class="form-control" maxlength="14" name="cpf" type="text" placeholder="000.000.000-00" value='<?= $registro['cpf'] ?>' >
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="ddd">DDD</label>
                            <input id="ddd" class="form-control" minlength="2" maxlength="2" name="ddd"  type="tel" placeholder="00" value='<?= substr($registro['celular'], 0, 2) ?>'>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="celular">Celular</label>
                            <input id="celular" class="form-control" minlength="9" maxlength="10" name="celular"  type="tel" placeholder="90000-0000" value='<?= substr($registro['celular'], 2) ?>' >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" placeholder="00000-000" name="cep" id="cep" value='<?= $registro['cep'] ?>' size="10" maxlength="9" onblur="pesquisacep(this.value);" />
                            <div class="invalid-feedback">
                                Favor insira o CEP.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" placeholder="Digite o bairro" name="bairro" id="bairro" value='<?=$registro['bairro']?>' size="10" maxlength="40" />
                            <div class="invalid-feedback">
                                Favor insira o Bairro.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" placeholder="Digite a cidade" name="cidade" id="cidade" value=<?= getCidadeUf($registro['cod_cidade'])['cidade']?> size="10" maxlength="40" />
                            <div class="invalid-feedback">
                                Favor insira a Cidade.
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="uf">UF</label>
                            <input type="text" class="form-control" id="uf" name="uf" placeholder="UF" size="2" value = <?= getCidadeUf($registro['cod_cidade'])['uf']?>>
                            <div class="invalid-feedback">
                                Favor insira o Estado.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-12">
                            <label for="rua">Logradouro</label>
                            <input type="text" class="form-control" placeholder="Nome da Av., Rua, Etc.." name="rua" id="rua" value='<?= $registro['rua'] ?>' size="10" maxlength="60" />
                            <div class="invalid-feedback">
                                Favor insira o Logradouro.
                            </div>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="numero">Número</label>
                            <input type="text" class="form-control" id="numero" name="numero" value='<?= $registro['numero'] ?>' placeholder="Digite o Número " >
                            <div class="invalid-feedback">
                                Favor insira o Número.
                            </div>
                        </div>
                        <div class="mb-3 col-9">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Digite o complemento (opcional)" value='<?= $registro['comp'] ?>'>
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
                        if (!$_SESSION['cond_cli']['cep'])
                            echo "<p class='text-danger'>cep não existente</p>";
                        if (!$_SESSION['cond_cli']['bairro'])
                            echo "<p class='text-danger'>bairro invalido!</p>";
                        if (!$_SESSION['cond_cli']['uf'])
                            echo "<p class='text-danger'>unidade federativa e/ou cidade não existem!</p>";
                        if (!$_SESSION['cond_cli']['rua'])
                            echo "<p class='text-danger'>rua invalida!</p>";
                        if (!$_SESSION['cond_cli']['numero'])
                            echo "<p class='text-danger'>campo numero aceita apenas digitos!</p>";
                        if (!$_SESSION['cond_cli']['complemento'])
                            echo "<p class='text-danger'>caracteres não aceitos no campo complemeto!</p>";
                        if (isset($_SESSION['cond_cli']['cadastro_existente'])) {
                            echo "<p class='text-danger'>usuario já cadastrado!</p>";
                        }
                        if (!$_SESSION['cond_cli']['dpassword'])
                            echo "<p class='text-danger'>confirmação de senha invalida!</p>";
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
                            <p class="pull-right text-success">Dados gravados no banco com sucesso</p>
                            <?php
                        } else {
                            ?>
                            <p class="pull-right text-danger">Erro ao gravar no banco de dados</p>
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
        unset($_SESSION['cond_cli']);
        ?>
    </div> 
    <br>
    <?php
    }
    else{
        header("Location: pagadmin.php");
    }
    include 'rodape.php';
    ?> 

    <script>


        //Necessita do bootstrap e jquery
        //forca da senha
        $(function () {
            $('#senha').keyup(function (e) {
                var senha = $(this).val();
                if (senha == '') {
                    $('#senhaBarra').hide();
                } else {
                    var fSenha = forcaSenha(senha);
                    var texto = "";
                    $('#senhaForca').css('width', fSenha + '%');
                    $('#senhaForca').removeClass();
                    $('#senhaForca').addClass('progress-bar');
                    if (fSenha <= 40) {
                        texto = 'Fraca';
                        $('#senhaForca').addClass('bg-danger');
                    }

                    if (fSenha > 40 && fSenha <= 70) {
                        texto = 'Senha Média';
                    }

                    if (fSenha > 70 && fSenha <= 90) {
                        texto = 'Senha Boa';
                        $('#senhaForca').addClass('bg-info');
                    }

                    if (fSenha > 90) {
                        texto = 'Senha Muito boa';
                        $('#senhaForca').addClass('bg-success');
                    }

                    $('#senhaForca').text(texto);

                    $('#senhaBarra').show();
                }
            });
        });

        function forcaSenha(senha) {
            var forca = 0;
            var regLetrasMa = /[A-Z]/;
            var regLetrasMi = /[a-z]/;
            var regNumero = /[0-9]/;
            var regEspecial = /[!@#$%&*?]/;
            var tam = false;
            var tamM = false;
            var letrasMa = false;
            var letrasMi = false;
            var numero = false;
            var especial = false;
//    console.clear();
//    console.log('senha: '+senha);

            if (senha.length >= 6)
                tam = true;
            if (senha.length >= 10)
                tamM = true;
            if (regLetrasMa.exec(senha))
                letrasMa = true;
            if (regLetrasMi.exec(senha))
                letrasMi = true;
            if (regNumero.exec(senha))
                numero = true;
            if (regEspecial.exec(senha))
                especial = true;
            if (tam)
                forca += 10;
            if (tamM)
                forca += 10;
            if (letrasMa)
                forca += 10;
            if (letrasMi)
                forca += 10;
            if (letrasMa && letrasMi)
                forca += 20;
            if (numero)
                forca += 20;
            if (especial)
                forca += 20;
//    console.log('força: '+forca);

            return forca;
        }

    </script>