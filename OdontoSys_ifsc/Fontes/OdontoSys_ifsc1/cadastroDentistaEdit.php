
<!DOCTYPE html>
<html lang="pt">
<head>
    <?php 
        require 'init.php';

        //pega o id da url
        $id_usuario = isset($_GET['id_usuario']) ? (int) $_GET['id_usuario'] : null;

        //valida o id
        if(empty($id_usuario)){
            echo "ID para alteração não definido";
            exit;
        }

        //busca os dados do usuário a ser editado
        $PDO = db_connect();
        $sql = "SELECT nome, cpf, cro, dNasc, email, cep, uf, cidade, bairro, rua, numero, complemento, contato1, contato2, observacao  FROM usuario WHERE id_usuario = :id_usuario";
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    
        $stmt->execute();
    
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // se o método fetch() não retornar um array, significa que o ID não corresponde a um usuário válido
        if (!is_array($usuario))
        {
            echo "Nenhum usuário encontrado";
            exit;
        }
    ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>OdontoSys | Cadastro Dentista</title>
  <link rel="icon" href="dist/img/perfilOdonto-com-fundo.jpg">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <script>
    function getDadosPorCEP(cep){
      let url = 'https://viacep.com.br/ws/'+cep+'/json/unicode/'

      let xmlHTTP = new XMLHttpRequest()
      xmlHTTP.open('GET', url)

      xmlHTTP.onreadystatechange = () =>{
        if(xmlHTTP.readyState == 4 && xmlHTTP.status == 200){
          let dadosJSONText = xmlHTTP.responseText
          let dadosJSONObj = JSON.parse(dadosJSONText)
          
          document.getElementById('endereco').value = dadosJSONObj.logradouro
          document.getElementById('bairro').value = dadosJSONObj.bairro
          document.getElementById('cidade').value = dadosJSONObj.localidade
          document.getElementById('uf').value = dadosJSONObj.uf
        }
      }
      xmlHTTP.send()
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
                <a href="cadastroDentista.html" class="nav-link active">
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
              <a href="#" class="nav-link">
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
            <h1 class="m-0 text-dark"><b>Cadastro de Usuários - Dentista</b></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Inicio formulario -->
    <section class="content">
        <form action="add.php" method="post">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                    <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Dados Pessoais</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- inicio form -->
                            <form role="form">
                            <div class="card-body">
                                <div class="form-group">
                                <label for="nome">Nome Completo</label>
                                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $usuario['nome'] ?>">
                                </div>
                                <div class="form-group">  
                                    <label for="cpf">CPF</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" value="<?php echo $usuario['cpf'] ?>">
                                </div>
                                <div class="form-group">  
                                <label for="cro">CRO</label>
                                <input type="text" class="form-control" id="cro" name="cro" value="<?php echo $usuario['cro'] ?>">
                                </div>
                                <div class="form-group">  
                                    <label for="dNasc">Data de Nascimento</label>
                                    <input type="date" class="form-control" id="dNasc" name="dNasc" value="<?php echo $usuario['dNasc'] ?>">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            </form><!-- fim form -->
                    </div>

                        <div class="card card-primary container">
                        <div class="card-header">
                            <h3 class="card-title">Endereço</h3>
                        </div>
                        <form role="form">
                            <div class="card-body">
                            <div class="form-group">
                                <label for="cep">CEP</label>
                                <input type="text" class="form-control" id="cep" name="cep" placeholder="00000-000"  onblur="getDadosPorCEP(this.value)" value="<?php echo $usuario['cep'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" readonly id="uf" name="uf" value="<?php echo $usuario['uf'] ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="cidade">Cidade</label>
                                <input type="text" class="form-control" readonly id="cidade" name="cidade" value="<?php echo $usuario['cidade'] ?>">
                            </div> 
                            <div class="form-group">
                                <label for="bairro">Bairro</label>
                                <input type="text" class="form-control" readonly id="bairro" name="bairro" value="<?php echo $usuario['bairro'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="endereco">Rua</label>
                                <input type="text" class="form-control" readonly id="rua" name="rua" value="<?php echo $usuario['rua'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="numeroCasa">Número</label>
                                <input type="text" class="form-control" id="numero" name="numero" value="<?php echo $usuario['numero'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="complemento">Complemento</label>
                                <input type="text" class="form-control" id="complemento" name="complemento" value="<?php echo $usuario['complemento'] ?>">
                            </div>
                            </div>
                        </form>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                            <h3 class="card-title">Contato</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- inicio form -->
                            <form role="form">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="contato1" name="contato1" placeholder="(00)00000-0000" value="<?php echo $usuario['contato1'] ?>">
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="contato2" name="contato2" placeholder="(00)00000-0000" value="<?php echo $usuario['contato2'] ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group">  
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $usuario['email'] ?>" placeholder="exemplo@exemplo.com.br">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form><!-- fim form -->
                        </div>
                        
                        <!-- Inicio observações - textArea -->
                        <div class="card card-primary">
                            <div class="card-header">
                            <h3 class="card-title">
                                Observação</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pad">
                            <div class="mb-3">
                                <input class="text" id="observacao" name="observacao" placeholder="Observações" value="<?php echo $usuario['observacao'] ?>"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></input>
                            </div>
                            <p class="text-sm mb-0">
                                Documente as informações necessárias sobre o cadastro.
                            </p>
                            </div> 
                        </div>
                        <!--fim observações-->
                        
                        <div class="card-footer" style="margin-left: 80%;">
                          <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
                          <input type="submit" value="Alterar" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- /.Fim Formulario -->
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

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!--Summernote-->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
</body>
</html>
