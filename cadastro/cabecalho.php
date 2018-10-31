<?php
session_start();
?>
<!DOCTYPE html>
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
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="form-validation.css" rel="stylesheet">
    </head>
    <body>
        <!--container-->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.html">WEB TECNOLOGIA</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category.html">Categoria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="product.html">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category.html">Cadastro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="product.html">Carrinho</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contato</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.html"><i class="fas fa-user"></i></a>
                        </li>
                    </ul>

                    <form class="form-inline my-2 my-lg-0">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Pesquisar...">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-secondary btn-number">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <a class="btn btn-success btn-sm ml-3" href="cart.html">
                            <i class="fa fa-shopping-cart"></i> Carrinho
                            <span class="badge badge-light">0</span>
                        </a>
                    </form>
                </div>
            </div>
        </nav>