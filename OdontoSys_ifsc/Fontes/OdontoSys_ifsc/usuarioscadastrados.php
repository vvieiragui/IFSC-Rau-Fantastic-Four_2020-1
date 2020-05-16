<!DOCTYPE html>
<html lang="pt">
<head>
  <?php 
    require 'init.php';

    // abre a conexão
    $PDO = db_connect();
      
    $sql_count = "SELECT COUNT(*) AS total FROM usuario ORDER BY nome ASC";
    
    // SQL para selecionar os registros
    $sql = "SELECT id, nome, telefone, email FROM usuario ORDER BY nome ASC";
    
    // conta o total de registros
    $stmt_count = $PDO->prepare($sql_count);
    $stmt_count->execute();
    $total = $stmt_count->fetchColumn();
    
    // seleciona os registros
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
  ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>OdontoSys | Usuários Cadastrados</title>
  <link rel="icon" href="dist/img/perfilOdonto-com-fundo.jpg">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Página Inicial</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="suportetecnico.php" class="nav-link">Contato Suporte</a>
      </li>
    </ul> 

    <!-- Link usuario lado direito-->
    <ul class="navbar-nav ml-auto">
      <!-- Dropdown Menu -->
      <li class="nav-item dropdown">
        <div class="user-panel d-flex">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <ul class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <p>
                    Usuário
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="login.php" class="nav-link active">
                      <i class="fas fa-sign-out-alt nav-icon"></i>
                      <p>Sair</p>
                    </a>
                  </li>
                </ul>
            </ul>              
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Logo -->
      <a href="index.php" class="brand-link">
        <img src="dist/img/perfilOdonto.png" alt="OdontoSys Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">OdontoSys</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->   
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="calendario.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>Agenda
                <span class="badge badge-info right"></span><!--Notificação -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="registrar_login.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
                <p>Registrar usuários</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="usuarioscadastrados.php" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>Usuários cadastrados</p>
            </a>
          </li>
        <!-- /.sidebar-menu -->
        </ul>
      </div>
      <!-- /.sidebar -->
    </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="col-md-7 mb-3 mt-1">  
      <div class="input-group input-group-lg ">
        <div class="input-group-prepend ">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            Cadastrar novo usuário
          </button>
          <ul class="dropdown-menu">
            <li class="dropdown-item"><a href="cadastrodentista.php">Cadastro Dentista</a></li>
            <li class="dropdown-item"><a href="cadastrofuncionario.php">Cadastro Funcionario</a></li>
            <li class="dropdown-item"><a href="cadastropaciente.php">Cadastro Paciente</a></li>
          </ul>
        </div>
        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" name="search" type="search" placeholder="Pesquisar" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" name="search" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
      <!-- /btn-group -->
    </div>
    <!-- Inicio formulario -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Usuarios cadastrados</h3>
              </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <p>Total de usuários cadastrados: <?php echo $total ?></p>
                        <?php if ($total > 0): ?>
            
                        <div class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr class="table table-bordered">
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Telefone</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php while ($usuario = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                                <tr>
                                    <td><?php echo $usuario['nome']?></td>
                                    <td><?php echo $usuario['email']?></td>
                                    <td><?php echo $usuario['telefone']?></td>
                                    <td><th scope="col">
                                        <a href="cadastrodentistaedit.php?id=<?php echo $usuario['id'] ?>"><i class="far fa-edit"  style = "font-size:25px"></i></a></th>
                                        <th scope="col">
                                        <a href="delete.php?id=<?php echo $usuario['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');"><i class="fas fa-trash-alt" style = "font-size:25px"></i></a></th>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                          </table>
                        <table>
                          <tbody>
                        <?php else: ?>
                        <p>Nenhum usuário registrado</p>
                        <?php endif; ?>
                        <!--Função pesquisar -->
                        <?php 
                          $search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);
                          if($search){
                            $nome = filter_input(INPUT_POST, 'nome',  FILTER_SANITIZE_STRING);
                            $sql = "SELECT * FROM usuario WHERE nome LIKE '%$nome%'";
                          while($usuario = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo "ID: " . $usuario['id'] . "<br>";
                            echo "Nome: " . $usuario['nome'] . "<br>";
                            echo "E-mail: " . $usuario['email'] . "<br>";
                          }
                        }
                        ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
          </div>
        </div>         
    </section>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 0.0.1
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019-2020 <a>OdontoSys</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
</body>
</html>
