<?php 
    session_start(); //Inicia sessão
    if(!isset($_SESSION['id'])){
      header("Location: login.php");  //Leva o usuário para tela de login caso não esteja logado
    }
    include_once 'headerDeb.php';
?>
</head>
<a href="index.php"><img src="./img/logo1.png"></a>
<div class="container-projeto" style="margin-top:100px">
    <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> Adicionar Projeto</h5>
              <p class="card-text"> Opção para adicionar novos projetos</p>
              <a href="adicionar_projeto.php" class="btn btn-info"> Cadastrar Projeto</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> Listar Projeto</h5>
              <p class="card-text"> Opção para listar, editar e excluir projetos</p>
              <a href="listar_projetos.php" class="btn btn-info"> Projetos</a>
            </div>
          </div>
        </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Cadastrar Clientes</h5>
                <p class="card-text"> Opção para cadastro de novos clientes</p>
                <form action="includes/addclient.inc.php" method="POST">
                  <button type="submit" name="submit" class="btn btn-info">Cadastrar clientes</button>
                  <input type="text" id="floatingInputUsername" name="cliente" placeholder="Nome do cliente" class="form-control">
                </form>
              </div>
            </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> Listar Clientes</h5>
              <p class="card-text"> Opção para listar, editar e excluir clientes</p>
              <a href="#" class="btn btn-info">Clientes</a>
            </div>
          </div>
      </div>
    
      </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
</body>

</html>