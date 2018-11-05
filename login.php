<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php include 'cabecalho.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	  <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center mt-5">
            <div class="card" >
			<div class="card-header" >
				<h3>Login</h3>
				<div class="d-flex justify-content-end social_icon">
                                    <span><a href="#"><i class="fab fa-facebook-square"></i></a></span>
					<span><a href="#"><i class="fab fa-google-plus-square"></i></a></span>
					<span><a href="#"><i class="fab fa-twitter-square"></i></a></span>
				</div>
			</div>
			<div class="card-body">
				<form action="arq_login.php" method="POST">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input name="login" id="id_login" type="text" class="form-control" placeholder="username">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input name="senha" id="id_senha" type="password" class="form-control" placeholder="password">
					</div>
					<div class="row align-items-center remember ml-3">
						<input type="checkbox"> Lembre-me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<?php if(isset($_SESSION['login_error'])){
					if($_SESSION['login_error']){ ?>
					<div class="alert alert-warning" role="alert">
							Senha ou Login Inválidos.
					</div>
					<?php }
					unset($_SESSION['login_error']);
				}?>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
                                    <p> Já tem uma conta?</p>

                                    <p><a href="cadastro.php">Criar conta</a></p>

				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Esqueceu sua senha? </a>
				</div>
			</div>
		</div>
	</div>

        <div class="mb-5"> </div>
</div>
</body>
</html>
<?php include 'rodape.php';