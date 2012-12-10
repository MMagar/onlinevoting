<!-- NAVBAR
================================================== -->
<div class="navbar-wrapper">
  <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
  <div class="container">

    <div class="navbar navbar-inverse">
      <div class="navbar-inner">
        <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="#">Online voting</a>
        <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
        <div class="nav-collapse collapse">
          <ul class="nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#vote">Vote</a></li>
            <li><a href="#about">Results</a></li>
            <!-- Read about Bootstrap dropdowns at http://twitter.github.com/bootstrap/javascript.html#dropdowns -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Info <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Current election</a></li>
                <li><a href="#">Candidates</a></li>
                <li><a href="#">Political parties</a></li>
                <li class="divider"></li>
                <li class="nav-header">Offline voting</li>
                <li><a href="#">Nearest booths</a></li>
                <li><a href="#">How to vote offline</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
      <!-- /.navbar-inner -->
    </div>
    <!-- /.navbar -->

  </div>
  <!-- /.container -->
</div><!-- /.navbar-wrapper -->