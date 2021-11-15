<?php 
  session_start(); //Inicia sessão
  if(!isset($_SESSION['id'])){
    header("Location: login.php");  //Leva o usuário para tela de login caso não esteja logado
  }
  include_once 'headerDeb.php';
  include_once 'includes/dbh.inc.php';

  if(isset($_GET['error'])){
    if($_GET['error'] == 'missinginput'){
        echo '<p>You need to fill all the inputs!</p>';
    }
    elseif($_GET['error'] == 'failedtosaveform'){
        echo '<p>An error occurred while trying to save the form</p>';
    }
}
?>

<body>
  <a href="index.php"><img src="./img/logo1.png"></a>

    <div class="container" id="tamanhoContainer">
        <h4>Adicionar Projeto</h4>
   
        <form action="includes/projeto.inc.php" method="POST">
          <div class="form-group">
            <label for="">Proposta</label>
            <input name="proposta" type="text" class="form-control" placeholder=" Insira as informações"/>
          </div>
          <div class="form-group">
            <label for=""> Cliente</label>
            <select class="form-control" name="cliente">   
            <?php
              echo '<option> ----- </option>';

              $sql = 'SELECT * FROM `clientes` WHERE Usuarios_idUsuarios = ' . $_SESSION['id'];
              $result = mysqli_query($conn, $sql);
            // Faz um loop pela tabela e escreve ela na tela
              while($row = mysqli_fetch_array($result)){
                echo '<option value=' . $row['idClientes'] . '>' . $row['nome_cliente'] . '</option>';
              }
            ?>
          </select>
          </div>
          <div class="form-group">
            <label for="">Data Inicio</label>
            <input name="data-inicio" type="date" class="form-control" />
          </div>
          <div class="form-group">
            <label for="">Data Fim</label>
            <input name="data-fim" type="date" class="form-control" />
          </div>
    
          <div style="text-align: right">
            <button name="submit" type="submit" id="botão" class="btn btn-sm">
              Novo Projeto
            </button>
            <button type="button" class="btn btn-info btn-sm" onclick="location.href='card.php'">
              Voltar
            </button>
          </div>
        
        </form>
      </div>
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>
</html>