  <?php
      if(isset($_SESSION['mensagem'])){
        echo"<script>
          var notyf = new Notyf({
          duration: 3000,
          position: {
            x: 'right',
            y: 'top',
          },
      });
          notyf.success(' ".$_SESSION['mensagem']." ');
       </script>";
       unset($_SESSION['mensagem']);
      }
    ?>

  <nav class="navbar navbar-expand-lg bg-secondary navbar-dark navegacao">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"> <i class="fa-solid fa-handshake"></i> R.I.C.S</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Opções
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>

        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" />
          <button class="btn btn-outline-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          <a href="./backend/sair.php" class="btn btn-outline-light ms-2"> <i class="fa-solid fa-right-from-bracket"></i> </a>
      </div>
      </form>
    </div>
    </div>
  </nav>