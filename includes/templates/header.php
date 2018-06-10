<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">

  <?php //para qeu cargue uno u otro y no haya conflictos
  $archivo = basename($_SERVER['PHP_SELF']);//esto devuelve el nombre del archivo actual
  $pagina = str_replace(".php", "", $archivo);//quitamos el .php para comparar debajo (un poco redundante pero facilita
  if($pagina == 'taxis' || $pagina == 'index'){
    echo '<link rel="stylesheet" href="css/colorbox.css">';
  } else if($pagina == 'ruta') {
    echo '<link rel="stylesheet" href="css/lightbox.css">';
  }
  ?>

  <!--<link rel="stylesheet" href="css/lightbox.css">
  <link rel="stylesheet" href="css/colorbox.css">-->

  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet"><!--traigo algunas fuentes de google fonts-->

</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <header class="site-header">
    <div class="hero">
      <div class="contenido-header">
        <nav class="redes-sociales">
          <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </nav>
        <div class="informacion-ruta">
          <div class="clearfix">
            <p class="fecha"><i class="fa fa-calendar" aria-hidden="true"></i> 10-12 Dic</p>
            <p class="ciudad"><i class="fa fa-map-marker" aria-hidden="true"></i> Barcelona, CAT</p>
          </div>
          <h1 class="nombre-sitio">BCN Taxi Tour</h1>
          <p class="slogan">La mejor ruta de <span> Barcelona</span></p>
        </div> <!--.informacion-ruta-->
      </div>
    </div><!--.hero-->
  </header>

  <div class="barra"> <!--barra de menú debajo-->
    <div class="contenedor clearfix">
      <div class="logo">
        <a href="index.php">
          <img src="img/logo.svg" alt="logo BCN taxi tour"><!-- cambiar -->
        </a>
      </div>
      <div class="menu-movil">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <nav class="navegacion-principal clearfix">
        <a href="ruta.php">Ruta/evento</a><!-- cambiar -->
        <a href="calendario.php">Calendario</a>
        <a href="taxis.php">Taxistas/taxis</a>
        <a href="registro.php">Reservas</a>
      </nav>
    </div>
  </div><!--.barra de menú debajo-->
