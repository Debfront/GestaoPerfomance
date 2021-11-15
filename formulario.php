<?php 
  session_start(); //Inicia sessão
  if(!isset($_SESSION['id'])){
    header("Location: login.php");  //Leva o usuário para tela de login caso não esteja logado
  }

  include_once 'headerDeb.php';

  if(isset($_GET['error'])){
      if($_GET['error'] == 'missinginput'){
          echo '<p>You need to fill all the inputs!</p>';
      }
      elseif($_GET['error'] == 'failedtosaveform'){
          echo '<p>An error occurred while trying to save the form</p>';
      }
  }

  require_once 'includes/dbh.inc.php';
?>

<!-- na tela formulario, os projetos serão referentes aos clientes selecionados -->
<!-- fazer um botão de editar q muda para salvar e deletar na tela listar_projetos -->
<body>
  <figure>
    <a href="index.php"><img src="./img/logo1.png" alt="logo empresa" width="400" /></a>
   </figure>

  <div class="container" id="tamanhoContainer">
    <h4>Formulário de Atividades</h4>
    <form action="includes/formulario.inc.php" method="POST">
        <div class="form-group">
          <label> Cliente</label>
        <!-- Importar os dados da tabela de clientes, se o ID do usuário for o mesmo ID da FK da tabela de clientes-->
          <select class="form-control" name="cliente" required="required">
          <?php
              echo '<option disabled selected value> ----- </option>';

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
          <label> Selecione o Projeto</label>
          <select class="form-control" name="projeto" required="required">   
            <?php
              echo '<option disabled selected value> ----- </option>';

              $sql = 'SELECT * FROM `projeto` WHERE Usuarios_idUsuarios = ' . $_SESSION['id'];
              $result = mysqli_query($conn, $sql);
            // Faz um loop pela tabela e escreve ela na tela
              while($row = mysqli_fetch_array($result)){
                echo '<option value=' . $row['idProjeto'] . '>' . $row['proposta'] . '</option>';
              }
            ?>
          </select>
        </div>
      <div class="form-group">
        <label for=""> Equipe</label>
        <input name="equipe" type="text" class="form-control" placeholder=" Insira os nomes dos integrantes"  required="required"/>
      </div>
      <div class="form-group">
        <label for="">Data</label>
        <input name="date" type="date" class="form-control" required="required"/>
      </div>

      <div class="form-group">
        <label> Selecione a Infra Estrutura</label>

        <select class="form-control" name="infra-estrutura" required="required">   
          <?php
            echo '<option disabled selected value> ----- </option>';

            $sql = 'SELECT * FROM `infraestrutura`;';
            $result = mysqli_query($conn, $sql);
          // Faz um loop pela tabela e escreve ela na tela
            while($row = mysqli_fetch_array($result)){
              echo '<option value=' . $row['idinfraEstrutura'] . '>' . $row['desc_infraEstrutura'] . '</option>';
            }
          ?>
        </select>
        
        <div class="form-group">
          <label>Quantidade</label>
          <input name="infra-estrutura-num" type="number" class="form-control" placeholder=" Insira a quantidade produzida" required="required"/>
        </div>
      </div>

      <div class="form-group">
        <label>Selecione o Cabeamento</label>

        <select class="form-control" name="cabeamento" required="required">
          <?php
            echo '<option disabled selected value> ----- </option>';

            $sql = 'SELECT * FROM `cabeamento`;';
            $result = mysqli_query($conn, $sql);
          // Faz um loop pela tabela e escreve ela na tela
            while($row = mysqli_fetch_array($result)){
              echo '<option value=' . $row['idCabeamento'] . '>' . $row['desc_cabeamento'] . '</option>';
            }
          ?>
        </select>

      </div>
        <div class="form-group">
          <label>Quantidade</label>
          <input name="cabeamento-num" type="number" class="form-control" placeholder=" Insira a quantidade produzida" required="required"/>
        </div>

      <div class="form-group">
        <label>Selecione a Conectorização</label>

        <select class="form-control" name="conectorizacao" required="required">
        <?php
            echo '<option disabled selected value> ----- </option>';

            $sql = 'SELECT * FROM `conector`;';
            $result = mysqli_query($conn, $sql);
          // Faz um loop pela tabela e escreve ela na tela
            while($row = mysqli_fetch_array($result)){
              echo '<option value=' . $row['idConector'] . '>' . $row['desc_conector'] . '</option>';
            }
        ?>
        </select>
      </div>
        <div class="form-group">
          <label> Quantidade</label>
          <input name="conectorizacao-num" type="number" class="form-control" placeholder=" Insira a quantidade produzida" required="required"/>
        </div>

      <div class="form-group">
        <label> Tempo de conclusão (minutos)</label>
        <input name="tempo-conclusao" type="number" class="form-control" placeholder=" Insira o tempo" required="required"/>
      </div>
      <div class="form-group">
        <label>Observações (não obrigatório)</label>
        <input name="obs" type="text" class="form-control" placeholder=" Insira as observações" />
      </div>
      <div style="text-align: right">
        <button type="submit" name="submit" id="botão" class="btn btn-sm">
          Nova atividade
        </button>
        <button type="button" class="btn btn-info btn-sm" onclick="location.href='index.php'">Voltar</button>
      </div>
    </form>
  </div>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>