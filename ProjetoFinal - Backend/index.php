<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Upload de arquivo com PHP</title>
  </head>
  <body>
    <div class='container col-6 offset-3'>
		<div class='row'>
			<fieldset>
				<!-- https://www.w3schools.com/tags/att_form_enctype.asp -->
				<form action='#'	 method='post' enctype='multipart/form-data'>
					<legend>Formulário de Upload</legend>
					<div class='form-group'>
						<label class='src-only' for='id_fileUpload'>Arquivo</label>
						<input type='file' class='form-control' name='fileUpload' id='id_fileUpload'>
					</div>
					<div>
						<button type='submit' class='btn btn-warning'>Upload</button>
					</div>
				</form>
			</fieldset>
		</div>
		<div class='row' style='margin-top: 3%'>
			<figure>
				<img class="img-thumbnail" id='previewImg' alt="200x200" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1668cd44530%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1668cd44530%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2274.4296875%22%20y%3D%22104.5%22%3E200x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 200px; height: 200px;">
			</figure>
		</div>
	</div>
	
	<?php
		if($_SERVER['REQUEST_METHOD'] === 'POST') {
			
			#$nome = $_POST | $_GET
			$file = $_FILES['fileUpload']; // resgata um array
			
			if($file['error']) {
				//throw new Exception('Error: ' . $file['error']);
				echo 'Erro ao carregar o arquivo';
				exit;
			}
			
			$dirUploads = 'uploads';
			
			if(!is_dir($dirUploads)) {
				mkdir($dirUploads);
			}
			
			// http://php.net/manual/pt_BR/function.move-uploaded-file.php
			#move_uploaded_file(filename, destination) // essa função retorna um booleano
			if(move_uploaded_file($file['tmp_name'], $dirUploads . DIRECTORY_SEPARATOR . $file['name'])) {
				echo 'Arquivo enviado com sucesso.';
			} else {
				//throw new Exception('Falha ao efetuar o upload.');
				echo 'Erro ao efetuar o upload';
				exit;
			}
		}
	?>
			

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script>
		function readURL(input) {

		  if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
			  $('#previewImg').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		  }
		}

		$("#id_fileUpload").change(function() {
		  readURL(this);
		});
	</script>

  </body>
</html>