<?php
    include './backend/conexao.php';
    include './backend/valicao.php';
    include './recursos/cabecalho.php';
    $destino = "./backend/pontoFocal/inserir.php";

    //caso eu esteja alterado algum registro
    //se for diferente de vazio, se tiver id na URL
    if(!empty($_GET['id'])){
      $id = $_GET['id'];
      $sql = "SELECT * FROM ponto_focal WHERE id='$id'";
      //executa sql
      $dados = mysqli_query($conexao, $sql);
      $pontoFocais = mysqli_fetch_assoc($dados);
      $destino = "./backend/pontoFocal/alterar.php";
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
            <input readonly name="id" type="text" autofocus value="<?php echo isset($pontoFocais) ? $pontoFocais['id']: "" ?>" class="form-control">
          </div>

            <div class="mb-3">
            <label class="form-label"> nome </label>
            <input name="nome" type="text" value="<?php echo isset($pontoFocais) ? $pontoFocais['nome']: "" ?>" class="form-control">
          </div>   

          <div class="mb-3">
            <label class="form-label"> Tipo </label>
            <select class="form-select" name="tipo"> 
            <option value="Privada"> Privada </option>
            <option value="Pública"> Pública </option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label"> razão social </label>
            <input name="razao_social" type="text" value="<?php echo isset($pontoFocais) ? $pontoFocais['razao_social']: "" ?>" class="form-control ">
          </div>

          <div class="mb-3">
            <label class="form-label"> cnpj_cpf </label>
            <input name="cnpj_cpf" type="text" value="<?php echo isset($pontoFocais) ? $pontoFocais['cnpj_cpf']: "" ?>" class="form-control cnpj">
          </div>

          <div class="mb-3">
            <label class="form-label"> endereco </label>
            <input name="endereco" type="text" value="<?php echo isset($pontoFocais) ? $pontoFocais['endereco']: "" ?>" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label"> telefone </label>
            <input name="telefone" type="text" value="<?php echo isset($pontoFocais) ? $pontoFocais['telefone']: "" ?>" class="form-control phone_with_ddd">
          </div>

          <div class="mb-3">
            <label class="form-label"> celular </label>
            <input name="celular" type="text" value="<?php echo isset($pontoFocais) ? $pontoFocais['celular']: "" ?>" class="form-control phone_with_ddd">
          </div>

          <div class="mb-3">
            <label class="form-label"> email </label>
            <input name="email" type="text" value="<?php echo isset($pontoFocais) ? $pontoFocais['email']: "" ?>" class="form-control">
          </div>

          <div class="mb-3"> 
            <label> cidade </label>
            <select name="cidade" class="form-select" required> 
              <option> Selecione uma cidade </option>
              <?php 
              $sql = "SELECT * FROM cidade ORDER BY nome";
              $resultado = mysqli_query($conexao, $sql);
              $cidadeSelecionada = isset ($pontoFocais) ? $pontoFocais ['id_cidade_fk']: '';

              while ($reg = mysqli_fetch_assoc($resultado)){
                $selecao = ($reg['id'] == $cidadeSelecionada) ? 'selected' : '';
                echo "<option value='{$reg['id']}' $selecao> {$reg['nome']} </option>";
              }
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
              <th scope="col">Tipo</th>
              <th scope="col">CNPJ</th>
              <th scope="col">Celular</th>
              <th scope="col">Email</th>
              <th scope="col">Cidades</th>
              <th scope="col">Opções</th>
            </tr>
          </thead>
          <tbody>

          <?php
            $sql = "SELECT * FROM ponto_focal";
            // executa o comando
            $dados = mysqli_query($conexao, $sql);
            // percorrer todos os resgistros do banco
            while($coluna = mysqli_fetch_assoc($dados)){ 
          ?>
            <tr>
              <th scope="row"> <?php echo $coluna['id'] ?></th>
              <td> <?php echo $coluna['nome'] ?></td>
              <td> <?php echo $coluna['tipo'] ?></td>
              <td> <?php echo $coluna['cnpj_cpf'] ?></td>
              <td> <?php echo $coluna['celular'] ?></td>
              <td> <?php echo $coluna['email'] ?></td>
              <?php
                $sql = "SELECT * FROM cidade WHERE id=".$coluna['id_cidade_fk'];  
                $resultado = mysqli_query($conexao, $sql);
                $cidade = mysqli_fetch_assoc($resultado);
              ?>
              <td> <?php echo $cidade['nome'] ?></td>
              <td> 
               <a href="./pontoFocal.php?id=<?= $coluna['id'] ?>"><i class="fa-solid fa-pen-to-square me-2" style="color: #1e33bcff;"></i></a>
               <a href="<?php echo " ./backend/pontoFocal/excluir.php?id=".$coluna['id'] ?>" onclick="return confirm('Deseja realmente excluir?')"> <i class="fa-solid fa-trash" style="color: #ff0000;"></i> </a>
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