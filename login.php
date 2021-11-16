<?php 
    session_start(); //Inicia sessão
    if(isset($_SESSION['id'])){
        header("Location: index.php");  //Leva o usuário para tela home caso esteja logado
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Projeto Univesp</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" ref="stylesheet"> 
	<link href="estilo/style.css" rel="stylesheet"/> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<meta name="Keywords" content="palavras-chave,do,meu,site">
	<meta name="description" content="Descrição do meu site"> 
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"/>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<meta charset="utf-8"/> 
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
          <div class="card-img-left d-none d-md-flex">
            <!-- Background image for card set in CSS! -->
            <a href="index.php"><img src="img/UNIVESP.png"/></a>
          </div>
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5"><i class="fas fa-lock fa-4x" ></i></h5>
            <form action="includes/login.inc.php" method="POST">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInputUsername" placeholder="myemail" required autofocus name="email">
                <label for="floatingInputUsername"><i style="margin-right:15px;" class="fas fa-user"></i> Email</label> 
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="pwd" placeholder="mypassword" name="senha">
                <label for="floatingInputEmail"><i style="margin-right:20px;" class="fas fa-lock"></i>Senha</label>
              </div>                
              <div class="d-grid mb-2">
                <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit" name="submit">Logar</button>
              </div>
              <a class="d-block text-center mt-2 small" href="cadastro.php">Ainda não possui uma conta? Cadastre-se</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<?php
    if(isset($_GET['error'])){
        if($_GET['error'] == 'missinginput'){
            echo '<p>You need to fill all the inputs!</p>';
        }
        elseif($_GET['error'] == 'emaildoesntexist'){
            echo '<p>Email doesn\'t exist</p>';
        }
        elseif($_GET['error'] == 'wrongemail'){
            echo "<p>Email doesnt exist</p>";
        }
        elseif($_GET['error'] == 'stmtfailed'){
            echo '<p>Internal error, please try again</p>';
        }
        elseif($_GET['error'] == 'loginerror'){
            echo '<p>Internal error, please try again</p>';
        }
        elseif($_GET['error'] == 'wrongpwd'){
            echo '<p>Wrong password</p>';
        }
    }
?>