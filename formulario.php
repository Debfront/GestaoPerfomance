<?php 
  session_start(); //Inicia sessão
  if(!isset($_SESSION['id'])){
    header("Location: login.php");  //Leva o usuário para tela de login caso não esteja logado
  }

  include_once 'headerDeb.php';
?>

<body>
  <figure>
    <img src="./img/logo1.png" alt="logo empresa" width="400" />
   </figure>

  <div class="container" id="tamanhoContainer">
    <h4>Formulário</h4>
    <form action="includes/formulario.inc.php" method="POST">
        <div class="form-group">
          <label> Cliente</label>
          <select class="form-control">
            <option>----</option>
            <option>Elgin VS001305 </option>
            <option>Hosp São Francisco MA010735</option>
            <option>Toniato Paulinia MA010821</option>
            <option>Toniato Dourados MA010824</option>
            <option>Fini VS001397</option>
            <option>Panasonic RP00101</option>
            </select>
            </div>
      <div class="form-group">
        <label for=""> Equipe</label>
        <input type="text" class="form-control" placeholder=" Insira os nomes dos integrantes" />
      </div>
      <div class="form-group">
        <label for="">Data</label>
        <input type="date" class="form-control" />
      </div>

      <div class="form-group">
        <label> Selecione a Infra Estrutura</label>
        <select class="form-control">   
          <option> ----- </option>
          <option> Infra eletroduto fixado em parede, teto ou estrutura metalica com escada </option>
          <option> Infra eletroduto fixado em parede, teto ou estrutura metalica com Plataforma</option>
          <option>Infra eletroduto suspensa (grampo C) com escada</option>
          <option>Infra eletroduto suspensa (grampo C) com plataforma</option>
          <option> Infra eletroduto suspensa (outros suportes) com escada</option>
          <option>Infra eletroduto suspensa (outros suportes) com plataforma</option>
          <option> Infra Eletrocalha ou perfilado fixado com suporte em parede com escada </option>
          <option>Infra Eletrocalha ou perfilado suspensa (grampo C) com escada</option>
          <option>Infra Eletrocalha ou perfilado suspensa (grampo C) com plataforma </option>
          <option>Infra Eletrocalha ou perfilado suspensa (grampo C) com plataforma </option>
          <option> Infra Eletrocalha ou perfilado suspensa (grampo C) com plataforma</option>
        </select>
        <div class="form-group">
          <label for=""> Quantidade</label>
          <input type="number" class="form-control" placeholder=" Insira a quantidade produzida" />
        </div>
      </div>

      <div class="form-group">
        <label>Selecione o Cabeamento</label>
        <select class="form-control">
          <option> ----- </option>
          <option>Cabo de rede em Eletroduto / canaletas com escada</option>
          <option> Cabo de rede em Eletroduto / canaletas com plataforma</option>
          <option>Cabo de rede em Eletroduto / canaletas Subterrâneo</option>
          <option> Fibra / Cabo telefônico em eletrocalha e perfilado com escada </option>
          <option> Fibra / Cabo telefônico em eletrocalha e perfilado com plataforma </option>
          <option>Cabo eletrico em Eletroduto / canaletas com escada</option>
          <option>Cabo eletrico em Eletroduto / canaletas com plataforma</option>
          <option>Cabo eletrico em Eletroduto / canaletas Subterrâneo</option>
        </select>
        <div class="form-group">
          <label for=""> Quantidade</label>
          <input type="number" class="form-control" placeholder=" Insira a quantidade produzida" />
        </div>
      </div>

      <div class="form-group">
        <label>Selecione a Conectorização</label>
        <select class="form-control">
          <option> ----- </option>
          <option>RJ-45 Piso ou escada Plataforma</option>
          <option>Jack Piso ou escada plataforma</option>
          <option>Tomada</option>
          <option>Interruptor</option>
          <option>Disjuntor</option>
          <option>Luminária</option>
          <option>Fusão em DIO de gaveta Piso Escada Plataforma</option>
          <option>Fusão em DIO de bandeja Piso Escada Plataforma</option>
          <option>Fusão em terminador Piso Escada Plataforma</option>
          <option>Montagem de patch panel (pontos) Piso Escada Plataform</option>
          <option>Montagem de Voice panel (portas) Piso Escada Plataforma</option>
        </select>
        <div class="form-group">
          <label for=""> Quantidade</label>
          <input type="number" class="form-control" placeholder=" Insira a quantidade produzida" />
        </div>
      </div>
      <div class="form-group">
        <label for=""> Tempo de conclusão (minutos)</label>
        <input type="number" class="form-control" placeholder=" Insira o tempo" />
      </div>
      <div class="form-group">
        <label for="">Observações</label>
        <input type="text" class="form-control" placeholder=" Insira as observações" />
      </div>
      <div style="text-align: right">
        <button type="button" id="botão" class="btn btn-sm">
          Nova atividade
        </button>
        <button type="button" class="btn btn-info btn-sm">Voltar</button>
      </div>
    </form>
  </div>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>