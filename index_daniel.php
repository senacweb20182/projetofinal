//ARQUIVO DO RAFAEL PARA EXEMPLIFICAR UPLOAD DE IMAGENS

<?php include 'upload.php' ?>
<!doctype html>
<html lang="pt-br">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Luis Paulo Lessa">
  <meta name="description" content="Sistema Gramachinhos">
  <meta name="keywords" content="projeto, Gramachinhos, solidariedade, ong, peace, crianças">
  <meta name="robots" content="noindex, nofollow">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <style>
    body {
      background: #334d50;  /* fallback for old browsers */
      background: -webkit-linear-gradient(to bottom, #cbcaa5, #334d50);  /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to bottom, #cbcaa5, #334d50); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }

    html,
    body {
        height: 100%;
        color: white;
    }

    .custom-file-label::after  {
      content: "Buscar";
    }

    .responsive-btn {
      padding-right: 0;
      padding-left: 0;
    }
  </style>
  <title>Upload Imagem</title>
</head>
<body>
  <div class='container-fluid'>
    <figure class='col-sm-6 offset-sm-3 col-12'>
      <img src='https://logodownload.org/wp-content/uploads/2014/10/senac-logo-2.png' height='200' width='300' class='rounded mx-auto d-block' alt="Logo Senac Transparente">
    </figure>
    <fieldset class='container-fluid text-center' style='margin-top:5%'>
      <legend>Upload Imagem</legend>
      <form method="post" enctype="multipart/form-data">
        <div class='row'>
          <!-- Upload Image html -->
          <div id='fileUpload' class='col-10 offset-1 col-sm-4 offset-sm-4'>
            <div class="form-group">
              <figure>
                <label for="inputPhoto" class="sr-only">Foto</label>
                <img id="imgPhoto" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_166828ff326%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_166828ff326%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2274.4296875%22%20y%3D%22104.5%22%3E200x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" class="rounded mx-auto d-block" alt="Foto Gramachinho" width="200" height="200"><br>
                <div class="input-group mb-3">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" title="Selecione uma imagem para upload" id="inputPhoto" name="fileUpload" required>
                    <label class="custom-file-label text-left" for="inputPhoto">Escolha uma imagem..</label>
                  </div>
                </div>
              </figure>
            </div>
            <div class='col-12 col-sm-4 float-right responsive-btn'>
              <button type="submit" class="btn btn-dark btn-block">Gravar</button>
            </div>
          </div>
        </div>
      </form>
    </fieldset>
  </div>

  <?php
  		if($_SERVER['REQUEST_METHOD'] === 'POST') {

  			#$nome = $_POST | $_GET
  			$file = $_FILES['fileUpload']; // resgata um array

  			if($file['error']) {
  				//throw new Exception('Error: ' . $file['error']);
  				echo 'Erro ao carregar o arquivo';
  				exit;
  			} else {
            uploadImg($file);
        }
  		}
  	?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <script>
    function readURL(input) {

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#imgPhoto').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#inputPhoto").change(function() {
      readURL(this);
    });
  </script>
</body>
</html>
