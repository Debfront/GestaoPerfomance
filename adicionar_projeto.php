<?php 
  session_start(); //Inicia sessão
  if(!isset($_SESSION['id'])){
    header("Location: login.php");  //Leva o usuário para tela de login caso não esteja logado
  }
  include_once 'headerDeb.php';
?>

<body>
  <img src="./img/logo1.png">

    <div class="container" id="tamanhoContainer">
        <h4>Adicionar Projeto</h4>
   
        <form>
          <div class="form-group">
            <label for="">Proposta</label>
            <input type="text" class="form-control" placeholder=" Insira as informações"/>
          </div>
          <div class="form-group">
            <label for=""> Cliente</label>
            <input type="text" class="form-control" placeholder=" Insira o nome do cliente" />
          </div>
          <div class="form-group">
            <label for="">Data Inicio</label>
            <input type="date" class="form-control" />
          </div>
          <div class="form-group">
            <label for="">Data Fim</label>
            <input type="date" class="form-control" />
          </div>
    
          <div style="text-align: right">
            <button type="button" id="botão" class="btn btn-sm">
              Novo Projeto
            </button>
            <button type="button" class="btn btn-info btn-sm">Voltar</button>
          </div>
        
        </form>
      </div>
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>
</html>