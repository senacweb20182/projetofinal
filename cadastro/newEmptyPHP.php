<form action="registra.php" method="post" enctype='multipart/form-data'>
                    <h4 class="mb-3">Cadastro de Cliente</h4>
                    <form class="needs-validation" novalidate>
                        
                        

                        
<div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" placeholder="00000-000" name="cep" id="cep" value="" size="10" maxlength="9" onblur="pesquisacep(this.value);" />
 
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Digite o bairro" >

                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Digite a cidade" >

                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="uf">UF</label>
                            <input type="text" class="form-control" id="uf" name="uf" placeholder="UF" size="2">
                        </div>

                    </div>

                        <div class="mb-3">
                            <label for="address">Endereço</label>
                            <input type="text" class="form-control" id="rua" name="rua" placeholder="Nome da Av., Rua, Etc.." >
                            <div class="invalid-feedback">
                                Favor insira o endereço.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="numero">Número</label>
                            <input type="text" class="form-control" id="numero" name="numero" placeholder="Digite o Número " >
                            <div class="invalid-feedback">
                                Favor insira o Número.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" id="comp" name="comp" placeholder="Digite o complemento (opcional)">                            
                        </div>

                        
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Salvar</button>
                    </form>