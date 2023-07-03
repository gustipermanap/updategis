<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Landing Page GIS Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Architects+Daughter|Roboto&subset=latin,devanagari'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="./include/css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<body class="welcome">
  <span id="splash-overlay" class="splash"></span>
  <span id="welcome" class="z-depth-4"></span>

  <header class="navbar-fixed">
    <nav class="row deep-purple darken-3">
      <div class="col s12">
        <ul class="right">
          <li class="right">
           
          </li>
          <li class="right">
            <!-- <a href="" target="_blank" class="fa fa-github-square fa-2x waves-effect waves-light"><span class="icon-text"></span></a>-->
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <main class="valign-wrapper">
    <span class="container grey-text text-lighten-1 ">

      <p class="flow-text">Welcome to</p>
      <h1 class="title grey-text text-lighten-3">Update GIS Dashboard</h1>

      <blockquote class="flow-text">A place to update your Data GIS </blockquote>

       <div class="center-align">
        <!-- Dropdown Trigger -->
        <a class="btn dropdown-button" href="login.php" data-activates="exams">Login</a>
      </div>

    </span>
  </main>

  <div class="fixed-action-btn">
    <a href="https://wa.me/6281283010305" class="modal-trigger btn btn-large btn-floating amber waves-effect waves-light">
      <i class="large material-icons">message</i>
    </a>
  </div>

  <div id="message" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Contact</h4>
      <p>coming soon...</p>
    </div>
    <div class="modal-footer">
      <a href="" class="modal-action modal-close waves-effect btn-flat">close</a>
    </div>
  </div>

  <footer class="page-footer deep-purple darken-3">
    <div class="footer-copyright deep-purple darken-4">
      <div class="container">
        <time datetime="{{ site.time | date: '%Y' }}">&copy; 2022 Achmad Muchlis</time>
      </div>
    </div>
  </footer>
</body>
<!-- partial -->
	<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js'></script>
	<script  src="./include/js/script.js"></script>

</body>
</html>
