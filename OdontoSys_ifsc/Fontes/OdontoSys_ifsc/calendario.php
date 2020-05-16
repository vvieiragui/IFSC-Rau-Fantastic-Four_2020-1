<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Diz ao navegador para responder à largura da tela -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OdontoSys | Agenda</title>
    <link rel="icon" href="dist/img/perfilOdonto-com-fundo.jpg">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="plugins/fullcalendar/main.min.css">
    <link rel="stylesheet" href="plugins/fullcalendar-daygrid/main.min.css">
    <link rel="stylesheet" href="plugins/fullcalendar-timegrid/main.min.css">
    <link rel="stylesheet" href="plugins/fullcalendar-bootstrap/main.min.css">
    <!-- style -->
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
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
          <img src="dist/img/perfilOdonto.png"
              alt="OdontoSys Logo"
              class="brand-image img-circle elevation-3"
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
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Agenda</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="index.php">Página Inicial</a></li>
                  <li class="breadcrumb-item active">Agenda</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3">
                <div class="sticky-top mb-3">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Eventos arrastáveis</h4>
                    </div>
                    <div class="card-body">
                      <!-- the events -->
                      <div id="external-events">
                        <div class="external-event bg-success">Intervalo</div>
                        <div class="external-event bg-warning">Consulta</div>
                        <div class="external-event bg-info">Compromisso pessoal</div>
                        <div class="external-event bg-primary">Procedimento</div>
                        <div class="external-event bg-danger">Reunião</div>
                        <div class="checkbox">
                          <label for="drop-remove">
                            <input type="checkbox" id="drop-remove">
                            Remover deste card após soltar
                          </label>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Criar evento</h3>
                    </div>
                    <div class="card-body">
                      <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                        <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                        <ul class="fc-color-picker" id="color-chooser">
                          <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                          <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                          <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                          <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                          <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                        </ul>
                      </div>
                      <!-- /btn-group -->
                      <div class="input-group">
                        <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                        <div class="input-group-append">
                          <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                        </div>
                        <!-- /btn-group -->
                      </div>
                      <!-- /input-group -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-9">
                <div class="card card-primary">
                  <div class="card-body p-0">
                    <!-- THE CALENDAR -->
                    <div id="calendar">


                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
          <b>Version</b> 0.0.1
        </div>
        <strong>Copyright &copy; 2019-2020 <a>OdontoSys</a>.</strong> All rights
        reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery UI -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

    <!-- fullCalendar 2.2.5 -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/fullcalendar/main.min.js"></script>
    <script src="plugins/fullcalendar-daygrid/main.min.js"></script>
    <script src="plugins/fullcalendar-timegrid/main.min.js"></script>
    <script src="plugins/fullcalendar-interaction/main.min.js"></script>
    <script src="plugins/fullcalendar-bootstrap/main.min.js"></script>
    <script src="plugins/fullcalendar/locales/pt-br.js"></script><!--Diretorio PT-BR-->

    <!-- Page specific script -->
    <script>
      $(function () {

        /* initialize the external events
        -----------------------------------------------------------------*/
        function ini_events(ele) {
          ele.each(function () {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // não precisa ter começo nem fim
            var eventObject = {
              title: $.trim($(this).text()) // use the element's text as the event title
            }

            //armazene o objeto de evento no elemento DOM para que possamos acessá-lo mais tarde
            $(this).data('eventObject', eventObject)

            // torna o evento arrastável usando a interface do usuário do jQuery
            $(this).draggable({
              zIndex        : 1070,
              revert        : true, //fará com que o evento volte ao seu
              revertDuration: 0  //posição original após o arrasto
            })

          })
        }

        ini_events($('#external-events div.external-event'))

        /*inicializa o calendário
        -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date()
        var d    = date.getDate(),
            m    = date.getMonth(),
            y    = date.getFullYear()

        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendarInteraction.Draggable;

        var containerEl = document.getElementById('external-events');
        var checkbox = document.getElementById('drop-remove');
        var calendarEl = document.getElementById('calendar');

        //inicializar os eventos externos 
        // -----------------------------------------------------------------

        new Draggable(containerEl, {
          itemSelector: '.external-event',
          eventData: function(eventEl) {
            console.log(eventEl);
            return {
              title: eventEl.innerText,
              backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
              borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
              textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
            };
          }
        });

        var calendar = new Calendar(calendarEl, {
          plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
          header    : {
            left  : 'prev,next today',
            center: 'title',
            right : 'dayGridMonth,timeGridWeek,timeGridDay'
          },
          //Eventos padrão aleatórios
          events    : [
            {
              title          : 'Evento o dia todo',
              start          : new Date(y, m, 1),
              backgroundColor: '#f56954', //red
              borderColor    : '#f56954', //red
              allDay         : true
            },
            {
              title          : 'Evento Longo',
              start          : new Date(y, m, d - 5),
              end            : new Date(y, m, d - 2),
              backgroundColor: '#f39c12', //yellow
              borderColor    : '#f39c12' //yellow
            },
            {
              title          : 'Encontro',
              start          : new Date(y, m, d, 10, 30),
              allDay         : false,
              backgroundColor: '#0073b7', //Blue
              borderColor    : '#0073b7' //Blue
            },
            {
              title          : 'Almoço',
              start          : new Date(y, m, d, 12, 0),
              end            : new Date(y, m, d, 14, 0),
              allDay         : false,
              backgroundColor: '#00c0ef', //Info (aqua)
              borderColor    : '#00c0ef' //Info (aqua)
            },
            {
              title          : 'Festa de Aniversário',
              start          : new Date(y, m, d + 1, 19, 0),
              end            : new Date(y, m, d + 1, 22, 30),
              allDay         : false,
              backgroundColor: '#00a65a', //Success (green)
              borderColor    : '#00a65a' //Success (green)
            },
            {
              title          : 'Link do Google',
              start          : new Date(y, m, 28),
              end            : new Date(y, m, 29),
              url            : 'http://google.com/',
              backgroundColor: '#3c8dbc', //Primary (light-blue)
              borderColor    : '#3c8dbc' //Primary (light-blue)
            }
          ],
          editable  : true,
          droppable : true, //isso permite que as coisas sejam colocadas no calendário!!!
          drop      : function(info) {
            // a caixa de seleção "remover após soltar" está marcada?
            if (checkbox.checked) {
            // Nesse caso, remova o elemento da lista "Eventos arrastáveis" 
              info.draggedEl.parentNode.removeChild(info.draggedEl);
            }
          }    
        });

        calendar.render();
        // $('#calendar').fullCalendar()

        /* ADICIONAR EVENTOS*/
        var currColor = '#3c8dbc' //Red by default
        //Color chooser button
        var colorChooser = $('#color-chooser-btn')
        $('#color-chooser > li > a').click(function (e) {
          e.preventDefault()
          //Save color
          currColor = $(this).css('color')
          //Add efeito de cor no botão
          $('#add-new-event').css({
            'background-color': currColor,
            'border-color'    : currColor
          })
        })
        $('#add-new-event').click(function (e) {
          e.preventDefault()
          //Obtenha valor e verifique se não é nulo
          var val = $('#new-event').val()
          if (val.length == 0) {
            return
          }

          //Create events
          var event = $('<div />')
          event.css({
            'background-color': currColor,
            'border-color'    : currColor,
            'color'           : '#fff'
          }).addClass('external-event')
          event.html(val)
          $('#external-events').prepend(event)

          //Adicionar funcionalidade arrastável
          ini_events(event)

          //Remover evento da entrada de texto
          $('#new-event').val('')
        })
      })
    </script>
  </body>
</html>
