<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Espace Administrateur</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="adminlte/css/skins/skin-blue.min.css">
    @yield('css')
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>EA</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Espace Admin</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="{{ url('/logout') }}"> Se déconnecter </a>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
         <img src="adminlte/img/avatar04.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$name?></p>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Recherche...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><center><b>MENU</b></center></li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="#"> <span>Base des utilisateurs</span></a></li>
        <li><a href="#"> <span>Messages reçus</span></a></li>
        <li><a href="#"> <span>Historique des dons</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Messages reçus

        <small>Onglet "Contactez-nous"</small>
      </h1>
      <table class ="table table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nom</th>
          <th scope="col">Email</th>
          <th scope="col">Téléphone</th>
          <th scope="col">Message</th>
        </tr>
      </thead>
        @foreach ($msg_user as $msg_user)
          <tr>
            <td>{{ $msg_user->name }}</td> 
            <td>{{ $msg_user->email }}</td> 
            <td>{{ $msg_user->tel }}</td> 
            <td>{{ $msg_user->message }}</td>
          </tr>
        @endforeach
      </table>
    </section>

    <section class="content-header">
      <h1>
        Messages reçus des utilisateurs
      </h1>
      <table class ="table table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nom</th>
          <th scope="col">Email</th>
          <th scope="col">Téléphone</th>
          <th scope="col">Message</th>
          <th scope="col">Action</th>

        </tr>
      </thead>
        @foreach ($contacts as $contacts)
          <tr>
            <td>{{ $contacts->name }}</td> 
            <td>{{ $contacts->email }}</td> 
            <td>{{ $contacts->tel }}</td> 
            <td>{{ $contacts->message }}</td>
            <td>
              <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="{{action('MessageController@index')}}">Répondre</a>
              <input type="hidden" id="idUser" value="{{ $contacts->id_user }}">
            </td>
          </tr>
        @endforeach
      </table>
    </section>
  
    
    <!-- Main content -->
    <section class="content container-fluid">
      @yield('main')
<!--<canvas id="myChart"></canvas> -->
    <h1> Tableau de bord </h1>
    <canvas width="690" height="200" class="chartjs-render-monitor" id="myChart" style="width: 552px; height: 160px; display: block;"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script>
        new Chart(document.getElementById("myChart"), {
            type: 'bar',
            data: {
              labels: ["Nombre d'utilisateurs", "Nombre de contacts"],
              datasets: [
                {
                  label: "Nombre d'intéraction",
                  backgroundColor: ["#3e95cd", "#8e5ea2"],
                  data: [<?=json_encode($nb_users);?>,<?=json_encode($nb_contacts);?>]
                }
              ]
            },
            options: {
              legend: { display: false },
              title: {
                display: true,
                text: "Nombre d'intéraction"
              }
            }
        });
    </script>
    </section>
    <!-- /.content -->

        <center><a href="https://www.sandbox.paypal.com/myaccount/home" target="_blank"><button type="submit" class="btn btn-primary" style="width:40%; height:100px; font-size: 35px; background-color: #58D3F7; color: black; font-family: Montserrat">Historique des dons</button></a></center>

  </div>
  <!-- /.content-wrapper -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- AdminLTE App -->
<script src="adminlte/js/adminlte.min.js"></script>
@yield('js')
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->


</body>
</html>