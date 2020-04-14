<!DOCTYPE html>
<html lang="pt">
<head>
  <?php 
    require 'init.php';

    // abre a conexão
    $PDO = db_connect();
      
    $sql_count = "SELECT COUNT(*) AS total FROM usuario ORDER BY nome ASC";
    
    // SQL para selecionar os registros
    $sql = "SELECT id_usuario, nome, email FROM usuario ORDER BY nome ASC";
    
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

  <title>OdontoSys | Prontuários</title>
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
        <a href="index.phtml" class="nav-link">Página Inicial</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="suporteTecnico.html" class="nav-link">Contato Suporte</a>
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
    <a href="index.phtml" class="brand-link">
      <img src="dist/img/perfilOdonto.png" alt="OdontoSys Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">OdontoSys</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Cadastro de Usuários
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="cadastroDentista.php" class="nav-link active">
                  <i class="fas fa-user-md"></i>
                  <p>Cadastro de Dentista</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="cadastroFuncionario.html" class="nav-link active">
                  <i class="fas fa-user-nurse"></i>
                  <p>Cadastro de Funcionário</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="cadastroPaciente.html" class="nav-link active">
                  <i class="fas fa-user-injured"></i>
                  <p>Cadastro de Paciente</p>
                </a>
              </li>
            </ul>
            <li class="nav-header">Agenda | Prontuário</li>
            <li class="nav-item">
              <a href="calendar.html" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Agenda
                  <span class="badge badge-info right"></span><!--Notificação -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="prontuario.php" class="nav-link">
                <i class="nav-icon fas fa-folder-open"></i>
                <p>
                  Prontuário
                </p>
              </a>
            </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1 class="m-0 text-dark"><b>Prontuário Teste</b></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Inicio formulario -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Dentistas Cadastrados</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    
                        <p>Total de usuários cadastrados: <?php echo $total ?></p>
                        <?php if ($total > 0): ?>
            
                        <table width="100%" border="1">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($usuario = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                                <tr>
                                    <td><?php echo $usuario['nome']?></td>
                                    <td><?php echo $usuario['email']?></td>
                                    <td>
                                        <a href="cadastroDentistaEdit.php?id_usuario=<?php echo $usuario['id_usuario'] ?>">Editar</a>
                                        <a href="delete.php?id_usuario=<?php echo $usuario['id_usuario'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
            
                        <?php else: ?>
            
                        <p>Nenhum usuário registrado</p>
            
                        <?php endif; ?>
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
