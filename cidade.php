<?php
    include './backend/conexao.php';
    include './backend/valicao.php';
    include './recursos/cabecalho.php';
    $destino = "./backend/cidade/inserir.php";

    //caso eu esteja alterado algum registro
    //se for diferente de vazio, se tiver id na URL
    if(!empty($_GET['id'])){
      $id = $_GET['id'];
      $sql = "SELECT * FROM cidade WHERE id='$id'";
      //executa sql
      $dados = mysqli_query($conexao, $sql);
      $cidades = mysqli_fetch_assoc($dados);
      $destino = "./backend/cidade/alterar.php";
    }
?>

<body>
  <?php include './recursos/menuSuperior.php' ?>

  <div class="container-fluid">


    <div class="row">

      <div class="col-2 ">
        <?php include './recursos/menuLateral.php' ?>
      </div>

      <div class="col-3">
        <h1> Cadastro </h1>

        <form action="<?= $destino ?>" method="post">
          <div class="mb-3">

            <div class="mb-3">
            <label class="form-label"> id </label>
            <input readonly name="id" type="text" autofocus value="<?php echo isset($cidades) ? $cidades['id']: "" ?>" class="form-control">
          </div>

            <div class="mb-3">
            <label class="form-label"> nome </label>
            <input name="nome" type="text" value="<?php echo isset($cidades) ? $cidades['nome']: "" ?>" class="form-control">
          </div>   

          <div class="mb-3">
            <label class="form-label"> cep </label>
            <input name="cep" type="text" value="<?php echo isset($cidades) ? $cidades['cep']: "" ?>" class="form-control cep">
          </div>

          <div class="mb-3">
            <label class="form-label"> estado </label>
            <input name="estado" type="text" value="<?php echo isset($cidades) ? $cidades['estado']: "" ?>" class="form-control">
          </div>

          <div class="mb-3"> 
            <label> Região </label>
            <select name="regiao" class="form-select" required> 
              <option> Selecione uma região </option>
              <?php 
              $sql = "SELECT * FROM regiao ORDER BY nome";
              $resultado = mysqli_query($conexao, $sql);
              ?>
            </select>
          </div>

          </div>

          <button type="submit" class="btn btn-primary"> Salvar </button>
        </form>
        
      </div>

      <div class="col-7">
        <h1> Listagem </h1>

        <table id="tabela" class="table table-striped table-bordered">
          <thead class="table-primary">
            <tr>
              <th scope="col">id</th>
              <th scope="col">Nome</th>
              <th scope="col">Cep</th>
              <th scope="col">Estado</th>
              <th scope="col">Região</th>
              <th scope="col">Opções</th>
            </tr>
          </thead>
          <tbody>

          <?php
            $sql = "SELECT * FROM cidade";
            // executa o comando
            $dados = mysqli_query($conexao, $sql);
            // percorrer todos os resgistros do banco
            while($coluna = mysqli_fetch_assoc($dados)){ 
          ?>
            <tr>
              <th scope="row"> <?php echo $coluna['id'] ?></th>
              <td> <?php echo $coluna['nome'] ?></td>
              <td> <?php echo $coluna['cep'] ?></td>
              <td> <?php echo $coluna['estado'] ?></td>
              <td> <?php echo $coluna['id_regiao_fk'] ?></td>
              
              <td> 
               <a href="./cidade.php?id=<?= $coluna['id'] ?>"><i class="fa-solid fa-pen-to-square me-2" style="color: #1e33bcff;"></i></a>
               <a href="<?php echo " ./backend/cidade/excluir.php?id=".$coluna['id'] ?>" onclick="return confirm('Deseja realmente excluir?')"> <i class="fa-solid fa-trash" style="color: #ff0000;"></i> </a>
              </td>              
            </tr>
            <?php } ?>
          </tbody>
        </table>

      </div>

    </div>

  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="script.js"></script>

</body>

</html>