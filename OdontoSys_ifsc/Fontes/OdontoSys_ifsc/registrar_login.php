<!DOCTYPE html>
<html lang="pt">
<head>
  <?php 
    session_start();
    require 'init.php';
  ?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>OdontoSys | Registrar usuários</title>
  <link rel="icon" href="dist/img/perfilOdonto-com-fundo.jpg">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <script type="text/javascript">
			function validar_registrar_login(){
				var nome_registro = registrar_login.nome_registro.value;
				var email_registro = registrar_login.email_registro.value;
				var senha = registrar_login.senha.value;
				
				if(nome_registro == ""){
					alert("*Campo nome é obrigatorio");
					registrar_login.nome_registro.focus();
					return false;
				}if(email_registro == ""){
					alert("*Campo email é obrigatorio");
					registrar_login.email_registro.focus();
					return false;
				}if(senha == ""){
					alert("*Campo senha é obrigatorio");
					registrar_login.senha.focus();
					return false;
				}
			}
		</script>
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
                  <p>Usuário</p>
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
      <img src="dist/img/perfilOdonto.png" alt="OdontoSys Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
            <a href="registrar_usuario.php" class="nav-link">
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
        </div>
        <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
      <form action="add_registro.php" name="registrar_login" method="POST">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 mt-3">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Registro de Login</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="form-group">
                    <div class="input-group mb3">
                      <input type="text" class="form-control" id="nome_registro" name="nome_registro" placeholder="Nome completo">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <input type="email_registro" class="form-control" id="email_registro" name="email_registro" placeholder="Email">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-envelope"></span>
                        </div>
                      </div>
                    </div>
                    <div class="input-group mb-3">
                      <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer" style="margin-left: 80%;">
                    <button type="submit" value="Cadastrar" class="btn btn-primary" onclick="return validar_registrar_login()">Registrar</button>
                  </div>  
                </div>  
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- /.Fim Formulario -->
    </section>
  </div>

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
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
</body>
</html>
