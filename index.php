<?php 
    session_start(); //Inicia sessão

    include_once 'headerDeb.php';
?>

<body>
  <figure>
    <img src="./img/logo1.png" alt="logo empresa" width="400" />
    <img src="./img/logo2.png" alt="logo titulo" width="400" />
  </figure>

  <nav>
    <ul>
      <li><a href="formulario.php"> Formulários</a></li>
      <li><a href="relatorios.php"> Relatórios</a></li>
      <li><a href="graficos.php"> Gráficos</a></li>
      <li><a href="card.php">Projeto</a></li>
      <!-- Testa se o usuário está logado, se estiver fornece o botão sair, se não, os botões de login e registro -->
        <?php
          if(isset($_SESSION['id'])){
              echo '<li><a href="includes/logout.inc.php">Sair</a></li>';
          }else{
              echo '<li><a href="login.php">Login</a></li>';
              echo '<li><a href="cadastro.php">Registrar</a></li>';
          }
      ?>
    </ul>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>