<?php 
    session_start(); //Inicia sessão
    if(!isset($_SESSION['id'])){
        header("Location: login.php");  //Leva o usuário para tela de login caso não esteja logado
      }
    include_once 'headerDeb.php';
    include_once 'includes/dbh.inc.php';
?>

<div class="container" style="margin-top:40px">
    <h3>Lista de Projetos</h3>
    <br>
    <table class="table">
        <thead>
         <tr>
            <th scope="col">Proposta</th>
            <th scope="col">Cliente</th>
            <th scope="col">Data Inicio</th>
            <th scope="col">Data Fim</th>
            <th scope="col">Ação</th>
         </tr>
            <?php
                $sql = 'SELECT p.proposta, p.data_inicio, p.data_termino, c.nome_cliente FROM clientes c
                RIGHT JOIN projeto p ON p.Clientes_idClientes=c.idClientes ORDER BY p.data_inicio ASC;';
                $result = mysqli_query($conn, $sql);
            // Faz um loop pela tabela e escreve ela na tela
                while($row = mysqli_fetch_array($result)){
                    $proposta = $row['proposta'];
                    $cliente = $row['nome_cliente'];
                    $data_inicio = $row['data_inicio'];
                    $data_termino = $row['data_termino'];
            ?>
            
            <td><?php echo $proposta ?></td>
            <td><?php echo $cliente ?></td>
            <td><?php echo $data_inicio ?></td>
            <td><?php echo $data_termino ?></td>
          </tr>
            <?php } ?>

         </thead>
         <tbody>
             <tr>
                 <td><a class="btn btn-info btn-sm" href="#" role="button" > Editar</a></td>
             </tr>
         </tbody>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
</body>

</html>