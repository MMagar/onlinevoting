<?php
if (!isset ($_SESSION)) {
  session_start();
}
if (isset($_POST['logout'])) {
  session_destroy();
  addSuccessMessage("Logged out. Good bye!");
}

if (isset($_POST['inputSocialSecNumber'])) {
  $voterIdCode = $_POST['inputSocialSecNumber'];
  $query = "Select eesnimi, perenimi from Valija where valija_isikukood = ('" . $voterIdCode . "')";
  $rs = pg_query($con, $query) or die("Cannot execute query: $query\n");

  if (pg_num_rows($rs) < 1) {
    addErrorMessage("Did not find user with social security number <strong>$voterIdCode</strong>");
  } else {
    $row = pg_fetch_row($rs);
    $_SESSION['loggedIn'] = true;
    $_SESSION['inputSocialSecNumber'] = $_POST['inputSocialSecNumber'];
    $_SESSION['firstName'] = $row[0];
    $_SESSION['lastName'] = $row[1];
    addSuccessMessage("Logged in as " . $_SESSION['firstName'] . " " . $_SESSION['lastName'] . ".");
  }
}

function isLoggedIn() {
  return isset($_SESSION['loggedIn']);
}

?>
<div id="loginModal" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Login</h3>
  </div>
  <div class="modal-body">
    <form id="loginForm" class="form-horizontal" method="POST" action="index.php">
      <div class="control-group">
        <label class="control-label" for="inputSocialSecNumber">Social security number</label>

        <div class="controls">
          <input type="text" id="inputSocialSecNumber" name="inputSocialSecNumber" placeholder="Social security number">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputPassword">Password</label>

        <div class="controls">
          <input type="password" id="inputPassword" placeholder="Password">
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <label class="checkbox">
            <input type="checkbox"> Remember me
          </label>
        </div>
      </div>
    </form>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary" onclick="$('#loginForm').submit();">Sign in</button>
  </div>
</div>