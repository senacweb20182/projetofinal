<!DOCTYPE html>
<?php include 'cabecalho.php'; ?>
<html lang="pt">
    <head>
        <!-- Site meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>WEB TECNOLOGIA</title>
        <!-- CSS -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        
    <!--comeco do container-->
<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contatos</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-4 offset-md-0 mb-3">
            <div class="card">
                <div class="card-header bg-primary "><i class="fa fa-envelope"></i> CONTATO
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Entre com seu nome" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Digite o seu e-mail</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Entre com seu email" required>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="message">Deixe aqui seu comentário</label>
                            <textarea class="form-control" id="message" rows="6" required></textarea>
                        </div>
                        <div class="mx-auto">
                        <button type="submit" class="btn btn-warning text-right">Enviar</button></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4 offset-md-0">
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-uppercase"><i class="fa fa-home"></i> Endereço</div>
                <div class="card-body">
                    <p> Av. Mal. Floriano, 6 - Centro</p>
                    <p>Rio de Janeiro - RJ </p>
                    <p>CEP 20080-006</p>
                    <p>Email :webtecnologia@gmail.com.br</p>
                    <p>Tel.(21) 2518-2050</p>

                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4 offset-md-0">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3675.353978087623!2d-43.183550585034496!3d-22.900311085015076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x997f5c77db1225%3A0x8aec20d62db827d!2sSenac+Marechal+Floriano!5e0!3m2!1spt-BR!2sbr!4v1539952086633" width="100%" height="275" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
</div>
    


        <!-- JS -->
        <script src="//code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>

   

<?php include 'rodape.php'; ?>
