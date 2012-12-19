<?php
session_start();

function addActiveClassIfElementActive($menuItemName) {
  if (isMenuActive($menuItemName))
    echo 'class="active"';
}

function isMenuActive($menuItemName) {
  if (currentPageName() == 'index.php' && $menuItemName == 'Home')
    return true;
  else if (currentPageName() == 'candidate-selection.php' && $menuItemName == 'Vote')
    return true;
  else if (currentPageName() == 'voting-results.php' && $menuItemName == 'Results')
    return true;
  else
    return false;
}

function currentPageName() {
  return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
}

function displayExistingErrors() {
  if (isset($_SESSION['errors'])) {
    echo $_SESSION['errors'];
    unset($_SESSION['errors']);
  }
}

?>

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
        <a class="brand" href="index.php">Online voting</a>
        <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
        <div class="nav-collapse collapse navbar-inverse-collapse">
          <ul class="nav">
            <li <?php addActiveClassIfElementActive('Home') ?>><a href="index.php">Home</a></li>
            <?php
              if (isset($_SESSION['loggedInAsVoter'])) {
                echo  "<li "; addActiveClassIfElementActive('Vote'); echo "><a href='candidate-selection.php'>Vote</a></li>";
              }
            ?>
            <?php
            if (isset($_SESSION['loggedInCommitteeMember'])) {
              echo  "<li "; addActiveClassIfElementActive('Register paper vote'); echo "><a href='register-offline-vote.php'>Register paper vote</a></li>";
            }
            ?>
            <li <?php addActiveClassIfElementActive('Results') ?>><a href="voting-results.php">Results</a></li>
          </ul>
          <ul class="nav pull-right">
            <li>
              <?php
              if (isset($_SESSION['loggedIn'])) {
                ?>
                <form id="logoutForm" action="index.php" method="POST" style="margin: 0 0 0px;">
                  <?php echo "Logged in as {$_SESSION['firstName']} {$_SESSION['lastName']}"; ?>
                  <input type="hidden" name="logout" value="true"/>
                  <input type="submit" name="logout" class="btn btn-success" value="Logout"/>
                </form>
                <?php
              } else {
                displayExistingErrors();
                ?>
                <button type="button" id="loginButton" class="btn btn-success" data-toggle="modal" data-target="#loginModal">Login
                </button>
                <?php
              }
              ?>
            </li>
          </ul>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container -->
</div><!-- /.navbar-wrapper -->