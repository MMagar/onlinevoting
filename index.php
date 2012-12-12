<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Online voting</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Le styles -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/bootstrap-responsive.css" rel="stylesheet">
  <link href="css/bootstrap-example.css" rel="stylesheet">
  <link href="css/online-voting-design.css" rel="stylesheet">


  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="ico/favicon.png">
</head>

<body>

<?php
include '_nav-bar.php';
?>

<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide">
  <div class="carousel-inner">
    <div class="item active">
      <img src="img/examples/slide-01.jpg" alt="">

      <div class="container">
        <div class="carousel-caption">
          <h1>Online voting.</h1>

          <p class="lead">Reliable democracy for lazy citizens.</p>
          <a class="btn btn-large btn-primary" href="#">Vote now</a>
        </div>
      </div>
    </div>
    <div class="item">
      <img src="img/examples/slide-02.jpg" alt="">

      <div class="container">
        <div class="carousel-caption">
          <h1>Information about the election.</h1>

          <p class="lead">View candidates, parties and jurisdictions</p>
          <a class="btn btn-large btn-primary" href="#">More info</a>
        </div>
      </div>
    </div>
    <div class="item">
      <img src="img/examples/slide-03.jpg" alt="">

      <div class="container">
        <div class="carousel-caption">
          <h1>Offline voting options.</h1>

          <p class="lead">View locations of nearest booths.</p>
          <a class="btn btn-large btn-primary" href="#">Booth map</a>
        </div>
      </div>
    </div>
  </div>
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>
<!-- /.carousel -->


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

  <!-- Three columns of text below the carousel -->
  <div class="row">
    <div class="span4">

      <h2>Fast</h2>

      <p>It takes just a few minutes. Digital voting will authenticate you using quickly using ID-card and register your
        vote with a few clicks.</p>

      <p><a class="btn" href="#">View demonstration &raquo;</a></p>
    </div>
    <!-- /.span4 -->
    <div class="span4">

      <h2>From anywhere</h2>

      <p>You can cast your vote from anywhere in the world. All you need is internet access and an ID-card reader. No
        need to leave your home or office just so you could tick one tiny box.</p>

      <p><a class="btn" href="#">View details &raquo;</a></p>
    </div>
    <!-- /.span4 -->
    <div class="span4">

      <h2>Secure</h2>

      <p>Votes are of national importance and basis of democracy. Anonymity of the voters must be guaranteed and not a
        single counting error can be allowed.</p>

      <p><a class="btn" href="#">More about security &raquo;</a></p>
    </div>
    <!-- /.span4 -->
  </div>
  <!-- /.row -->


  <!-- START THE FEATURETTES -->

  <hr class="featurette-divider">

  <div class="featurette">
    <img class="featurette-image pull-right" src="img/examples/estonia1.jpg">

    <h2 class="featurette-heading">Online voting has already been used several times. <span class="muted">Estonians have cast their votes online for several elections.</span>
    </h2>

    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper.
      Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
  </div>

  <hr class="featurette-divider">

  <div class="featurette">
    <img class="featurette-image pull-left" src="img/examples/old1.jpg">

    <h2 class="featurette-heading">Citizens are happy. <span
      class="muted">Elderly man gets an online voting tattoo.</span></h2>

    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper.
      Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
  </div>

  <hr class="featurette-divider">

  <div class="featurette">
    <img class="featurette-image pull-right" src="img/examples/old1.jpg">

    <h2 class="featurette-heading">And lastly, this one. <span class="muted">Checkmate.</span></h2>

    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper.
      Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
  </div>

  <hr class="featurette-divider">

  <!-- /END THE FEATURETTES -->


  <?php
  include '_footer.php';
  ?>

</div>
<!-- /.container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap-transition.js"></script>
<script src="js/bootstrap-alert.js"></script>
<script src="js/bootstrap-modal.js"></script>
<script src="js/bootstrap-dropdown.js"></script>
<script src="js/bootstrap-scrollspy.js"></script>
<script src="js/bootstrap-tab.js"></script>
<script src="js/bootstrap-tooltip.js"></script>
<script src="js/bootstrap-popover.js"></script>
<script src="js/bootstrap-button.js"></script>
<script src="js/bootstrap-collapse.js"></script>
<script src="js/bootstrap-carousel.js"></script>
<script src="js/bootstrap-typeahead.js"></script>
<script>
  !function ($) {
    $(function () {
      $('#myCarousel').carousel()
    })
  }(window.jQuery)
</script>
</body>
</html>
