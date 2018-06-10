<footer class="site-footer">
  <div class="contenedor clearfix">
    <div class="footer-informacion">
      <h3>Sobre <span>BCN Taxi Tour</span></h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget tempor libero. Praesent ut ullamcorper nisl. Morbi fringilla volutpat felis in mattis. Donec egestas augue risus, in mollis dui dictum eget.</p>
    </div>
    <div class="ultimos-tweets">
      <h3>Últimos <span>tweets</span></h3>
      <ul>
        <li>ojhdfk jhdswfhwio edh onoiwdhfoi nuoifgh nwofh uowh hweofghn jlkhusdoih fjklshdfin jwhf jlnbdoefh ljndsif hwlkjef whfh</li>
        <li>ojhdfk jhdswfhwio edh onoiwdhfoi nuoifgh nwofh uowh hweofghn jlkhusdoih fjklshdfin jwhf jlnbdoefh ljndsif hwlkjef whfh</li>
        <li>ojhdfk jhdswfhwio edh onoiwdhfoi nuoifgh nwofh uowh hweofghn jlkhusdoih fjklshdfin jwhf jlnbdoefh ljndsif hwlkjef whfh</li>
      </ul>
    </div>
    <div class="menu">
      <h3>Redes <span>sociales</span></h3>
      <nav class="redes-sociales">
        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
      </nav>
    </div>
  </div>
  <p class="copyright">Todos los derechos reservados - BCN Taxi Tour 2018</p>
</footer>



<script src="js/vendor/modernizr-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.lettering.js"></script>
<script src="js/jquery.waypoints.min.js"></script>

<?php //para qeu cargue uno u otro y no haya conflictos
$archivo = basename($_SERVER['PHP_SELF']);//esto devuelve el nombre del archivo actual
$pagina = str_replace(".php", "", $archivo);//quitamos el .php para comparar debajo (un poco redundante pero facilita
if($pagina == 'taxis' || $pagina == 'index'){
  echo '<script src="js/jquery.colorbox-min.js"></script>';
} else if($pagina == 'ruta') {
  echo '<script src="js/lightbox.js"></script>';
}
?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDN4YMqg5TctNBSJfJJju41wNryzL_8Cs&callback=initMap"
        async defer></script>


<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
  window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
  ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>
