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

    <!--tableau -->
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">

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
    <a href="home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>EP</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Espace Parrain</b></span>
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
          <p>
            {{{ isset(Auth::user()->name) ? Auth::user()->surname : Auth::user()->email }}}
          </p>
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
      <ul class="sidebar-menu" id="onglets">
        <li><a href="home"><center><b>MENU</b></center></a></li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="enfants"> <span>Enfants suivis</span></a></li>
        <li><a href="param"> <span>Paramètres</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div><br><br></div>
      <center>
        <button type="submit" class="btn btn-primary" data-toggle = "modal" data-target = "#myModal" style="width:40%; height:100px; font-size: 35px; background-color: #fed136; color: black; font-family: Montserrat">Parrainer un enfant</button>
      </center>

<!-- Modal -->
<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               <center><b>Merci de votre intérêt !! :)</b></center>
            </h4>
         </div>
         
         <div class = "modal-body">
            Veuillez nous contacter au 0606060606 ou via notre adresse mail xxx@yyy.com.
         </div>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               Fermer
            </button>
         </div>
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->





    <div><br></div>
    <!-- Main content -->
     <section class="content container-fluid">

      <center>
        <div class="wrap-table100">
          <div class="table">

            <div class="row header">
              <div class="cell">
                Photo
              </div>
              <div class="cell">
                Prénom
              </div>
              <div class="cell">
                Âge
              </div>
              <div class="cell">
                Maladie
              </div>
            </div>

            <div class="row">
              <div class="cell" data-title="Full Name">
                <img src="img/map-image.jpg">
              </div>
              <div class="cell" data-title="Age">
                31
              </div>
              <div class="cell" data-title="Job Title">
                iOS Developer
              </div>
              <div class="cell" data-title="Location">
                Washington
              </div>
            </div>

            <div class="row">
              <div class="cell" data-title="Full Name">
                Joseph Smith
              </div>
              <div class="cell" data-title="Age">
                27
              </div>
              <div class="cell" data-title="Job Title">
                Project Manager
              </div>
              <div class="cell" data-title="Location">
                Somerville, MA
              </div>
            </div>

            <div class="row">
              <div class="cell" data-title="Full Name">
                Justin Black
              </div>
              <div class="cell" data-title="Age">
                26
              </div>
              <div class="cell" data-title="Job Title">
                Front-End Developer
              </div>
              <div class="cell" data-title="Location">
                Los Angeles
              </div>
            </div>

            <div class="row">
              <div class="cell" data-title="Full Name">
                Sean Guzman
              </div>
              <div class="cell" data-title="Age">
                25
              </div>
              <div class="cell" data-title="Job Title">
                Web Designer
              </div>
              <div class="cell" data-title="Location">
                San Francisco
              </div>
            </div>

            <div class="row">
              <div class="cell" data-title="Full Name">
                Keith Carter
              </div>
              <div class="cell" data-title="Age">
                20
              </div>
              <div class="cell" data-title="Job Title">
                Graphic Designer
              </div>
              <div class="cell" data-title="Location">
                New York, NY
              </div>
            </div>

            <div class="row">
              <div class="cell" data-title="Full Name">
                Austin Medina
              </div>
              <div class="cell" data-title="Age">
                32
              </div>
              <div class="cell" data-title="Job Title">
                Photographer
              </div>
              <div class="cell" data-title="Location">
                New York
              </div>
            </div>

            <div class="row">
              <div class="cell" data-title="Full Name">
                Vincent Williamson
              </div>
              <div class="cell" data-title="Age">
                31
              </div>
              <div class="cell" data-title="Job Title">
                iOS Developer
              </div>
              <div class="cell" data-title="Location">
                Washington
              </div>
            </div>

            <div class="row">
              <div class="cell" data-title="Full Name">
                Joseph Smith
              </div>
              <div class="cell" data-title="Age">
                27
              </div>
              <div class="cell" data-title="Job Title">
                Project Manager
              </div>
              <div class="cell" data-title="Location">
                Somerville, MA
              </div>
            </div>

          </div>
      </div>

  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>
    </section>
    <!-- /.content -->


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