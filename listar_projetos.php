<?php 
    session_start(); //Inicia sessão
    if(!isset($_SESSION['id'])){
        header("Location: login.php");  //Leva o usuário para tela de login caso não esteja logado
      }
    include_once 'headerDeb.php';
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