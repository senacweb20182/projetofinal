<!-- Footer -->
<footer class="text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-4 col-xl-3">
                <h5>Central de Atendimento</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <p class="mb-0">
                    Central de Atendimento 
                </p> 
                <p class="mb-0">
                    Rio de Janeiro
                </p> 
                <p class="mb-0">
                    (11) 3065-7200 / 0800-754-4000
                </p> 
                <p class="mb-0">
                    Horário de atendimento das 8h às 20h, de segunda a sábado (exceto feriados)
                </p>
            </div>

            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto">
                <h5>Serviços</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><a href="">Assistencia Técnica</a></li>
                    <li><a href="">Garantia Estendida</a></li>
                    <li><a href="">Progama de afiliados</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
                <h5>Institucional</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><a href="">Política de venda</a></li>
                    <li><a href="">Relações com investidores</a></li>
                    <li><a href="">Eventos</a></li>
                </ul>
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3">
                <h5>Contato</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><i class="fa fa-home mr-2"></i> Web Tecnologia</li>
                    <li><i class="fa fa-envelope mr-2"></i> webtecnologia@gmail.com.br</li>
                    <li><i class="fa fa-phone mr-2"></i> (21) 2518-2050</li>
                    <li><i class="fa fa-print mr-2"></i> (21) 2618-2656</li>
                </ul>
            </div>
            <div class="col-12 copyright mt-3">
                <p class="float-left">
                    <a href="#"></a>
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- JS -->
<script src="//code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Bootstrap core JavaScript
 ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/holder.min.js"></script>
<script src="js/cep.js"></script>
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
<script>
    $('#show_password').hover(function (e) {
        e.preventDefault();
        if ($("#senha" && "#senhaValidar").attr("type") == "password") {
            $("#senha").attr("type", "text");
            $("#senhaValidar").attr("type", "text");
            $('#show_password').attr("class", 'fa fa-eye');

        } else {
            $("#senha").attr("type", "password");
            $("#senhaValidar").attr("type", "password");
            $('#show_password').attr("class", 'fa fa-eye-slash');
        }
    });
</script>
<?php
if (isset($_SESSION['span'])) {
    ?>
    <script>
        $(document).ready(function () {
            $("#spanM").removeClass("d-none");
            $("#spanM").addClass("d-block");
        });
    </script>
    <?php
    unset($_SESSION['span']);
}
?>  
</body>
</html>

