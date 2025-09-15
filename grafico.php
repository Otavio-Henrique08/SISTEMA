<?php
    include './backend/conexao.php';
    include './backend/valicao.php';
    include './recursos/cabecalho.php';
    $destino = "./backend/regiao/inserir.php";
//carrega are_nome e total_vendas agupado pelos nomes das areas
    $sql ="
    SELECT a.nome AS area_nome, COUNT(*) AS total_vendas
    FROM venda v INNER JOIN area a 
    ON a.id = v.id_area_fk 
    WHERE MONTH(v.data) = MONTH(CURDATE())
    GROUP BY a.nome
    ";
    $resultado = mysqli_query($conexao, $sql);

    // vamos criar duas listas
    $legendas = [];
    $valores = [];

    //carregar valores nas listas
    while($dados = mysqli_fetch_assoc($resultado)){
      $legendas[] = $dados['area_nome'];
      $valores[] = $dados['total_vendas'];
    }
    
?>

<body>
  <?php include './recursos/menuSuperior.php' ?>
  <div class="container-fluid">

    <div class="row">

      <div class="col-2 menu">
        <?php include './recursos/menuLateral.php' ?>
      </div>
      <div class="col">
      <div class="row"> 
        <div class="col">1</div>
        <div class="col">2</div>
        <div class="col">3</div>
        <div class="col">4</div>
      </div>
      <div class="row">
        <div class="col">
          <div>
              <canvas id="myChart"></canvas>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
              const ctx = document.getElementById('myChart');

              new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: <?=json_encode($legendas)?>,
                  datasets: [{
                    label: '# of Votes',
                    data: <?=json_encode($valores)?>,
                    borderWidth: 1
                  }]
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                }
              });
            </script>
        </div>
      </div>
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