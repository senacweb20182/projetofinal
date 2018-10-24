<?php include 'cabecalho.php'; ?>

        <!--container-->
        <section class="jumbotron text-center" style="margin-bottom: 1">
            <div class="container">
                <h1 class="jumbotron-heading">WEB TECNOLOGIA</h1>
                <p class="lead text-white mb-3">Os melhores celulares e tecnologia, com os menores preços</p>
            </div>
        </section>
        <!--pesquisa-->
        <div class="container">
            <div class="row">
                <div class="col">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>


                        <!--imgem do carosel-->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="img/tablet.gif" alt="First slide">

                            </div>
                            <!--imgem do carosel-->
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/banner.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/20180426205257_126.jpg" alt="Third slide">
                            </div>
                        </div>

                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <!--
                <div class="col-12 col-md-3">
                    <div class="card">
                        <div class="card-header bg-success text-white text-uppercase">
                            <i class="fa fa-heart"></i> Produtos Tops
                        </div>
                        <img class="img-fluid border-0" src="https://dummyimage.com/600x400/55595c/fff" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title text-center"><a href="product.html" title="View Product">SmartWatch Samsung</a></h4>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block">R$ 1.550,00</p>
                                </div>
                                <div class="col">
                                    <a href="product.html" class="btn btn-success btn-block">Vizualizar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                -->
            </div>
        </div>


        <div class="container mt-3">
            <div class="row">
                <div class="col-sm">
                    <div class="card">
                        <div class="card-header bg-primary text-white text-uppercase">
                            <i class="fa fa-star"></i> PRODUTOS EM OFERTAS
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="card">
                                        <img class="card-img-top" src="img/a5galaxy1.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="product.php" title="View Product">Product title</a></h4>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="btn btn-danger btn-block">R$ 1.800,00 $</p>
                                                </div>
                                                <div class="col">
                                                    <a href="cart.html" class="btn btn-success btn-block">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="card">
                                        <img class="card-img-top" src="img/s8dual1.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="product.html" title="View Product">Product title</a></h4>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="btn btn-danger btn-block">R$ 2.350,00 $</p>
                                                </div>
                                                <div class="col">
                                                    <a href="cart.html" class="btn btn-success btn-block">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="card">
                                        <img class="card-img-top" src="img/s9preto1.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="product.html" title="View Product">Product title</a></h4>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="btn btn-danger btn-block">99.00 $</p>
                                                </div>
                                                <div class="col">
                                                    <a href="cart.html" class="btn btn-success btn-block">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="card">
                                        <img class="card-img-top" src="img/ace1.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="product.html" title="View Product">Product title</a></h4>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="btn btn-danger btn-block">99.00 $</p>
                                                </div>
                                                <div class="col">
                                                    <a href="cart.html" class="btn btn-success btn-block">Adcionar ao Carrinho</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container mt-3 mb-4">
            <div class="row">
                <div class="col-sm">
                    <div class="card">
                        <div class="card-header bg-primary text-white text-uppercase">
                            <i class="fa fa-trophy"></i> Best products
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="card">
                                        <img class="card-img-top" src="https://dummyimage.com/600x400/55595c/fff" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="product.html" title="View Product">Product title</a></h4>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="btn btn-danger btn-block">99.00 $</p>
                                                </div>
                                                <div class="col">
                                                    <a href="cart.html" class="btn btn-success btn-block">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="card">
                                        <img class="card-img-top" src="https://dummyimage.com/600x400/55595c/fff" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="product.html" title="View Product">Product title</a></h4>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="btn btn-danger btn-block">99.00 $</p>
                                                </div>
                                                <div class="col">
                                                    <a href="cart.html" class="btn btn-success btn-block">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="card">
                                        <img class="card-img-top" src="https://dummyimage.com/600x400/55595c/fff" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="product.html" title="View Product">Product title</a></h4>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="btn btn-danger btn-block">99.00 $</p>
                                                </div>
                                                <div class="col">
                                                    <a href="cart.html" class="btn btn-success btn-block">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="card">
                                        <img class="card-img-top" src="https://dummyimage.com/600x400/55595c/fff" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"><a href="product.html" title="View Product">Product title</a></h4>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="btn btn-danger btn-block">99.00 $</p>
                                                </div>
                                                <div class="col">
                                                    <a href="cart.html" class="btn btn-success btn-block">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


 
<?php include 'rodape.php';