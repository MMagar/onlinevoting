<?php
if (!isset ($_SESSION)) {
  session_start();
}
if (isset($_POST['logout'])) {
  $_SESSION['loggedIn'] = false;
  session_destroy();
  addSuccessMessage("Logged out. Good bye!");
}

if (isset($_POST['logInAsCommitteeMember'])) {
  if ($_POST['logInAsCommitteeMember'] == "yes") {
    loginCommitteeMember($_POST['inputSocialSecNumber'], $_POST['inputPassword']);
  } else {
    loginVoter($_POST['inputSocialSecNumber']);
  }
}

function loginCommitteeMember($socialSecurityNumber, $password) {
  include '_database-connection.php';
  global $con;
  $static_salt = "random";
  $password = sha1($password.$static_salt);
  $query = "SELECT * FROM webapp.f_login_komisjoni_liige('$socialSecurityNumber', '$password')";
  $rs = pg_query($con, $query) or die("Cannot execute query: $query\n");

  if (pg_num_rows($rs) < 1) {
    addErrorMessage("Could not login <strong>$socialSecurityNumber</strong>");
  } else {
    $row = pg_fetch_row($rs);
    $_SESSION['loggedInCommitteeMember'] = true;
    successfulLogin($socialSecurityNumber, $row[2], $row[3]);
  }
}

function loginVoter($socialSecurityNumber) {
  include '_database-connection.php';
  global $con;
  $query = "Select eesnimi, perenimi from votingDb.Valija where valija_isikukood = ('" . $socialSecurityNumber . "')";
  $rs = pg_query($con, $query) or die("Cannot execute query: $query\n");

  if (pg_num_rows($rs) < 1) {
    addErrorMessage("Did not find user with social security number <strong>$socialSecurityNumber</strong>");
  } else {
    $row = pg_fetch_row($rs);
    $_SESSION['loggedInAsVoter'] = true;
    successfulLogin($socialSecurityNumber, $row[0], $row[1]);
  }
}

function successfulLogin($socialSecurityNumber, $firstName, $lastName) {
  $_SESSION['loggedIn'] = true;
  $_SESSION['inputSocialSecNumber'] = $socialSecurityNumber;
  $_SESSION['firstName'] = $firstName;
  $_SESSION['lastName'] = $lastName;
  addSuccessMessage("Logged in as $firstName $lastName.");
}

function isLoggedIn() {
  return isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true;
}

if (!isLoggedIn()) {
  ?>

<div id="loginModal" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="roleSelectionHeader">Voter</h3>
  </div>
  <div class="modal-body">
    <form id="loginForm" class="form-horizontal" method="POST" action="index.php">
      <div id="voterAuthView">
        <div class="control-group">
          <label class="control-label" for="inputSocialSecNumber">Social security number</label>

          <div class="controls">
            <input type="text" id="inputSocialSecNumber" name="inputSocialSecNumber"
                   placeholder="Social security number">
          </div>
        </div>
      </div>

      <div id="committeeAuthView" style="display: none;">
        <div class="control-group">
          <label class="control-label" for="inputPassword">Password</label>

          <div class="controls">
            <input type="password" id="inputPassword" name="inputPassword"
                   placeholder="Password">
            <input id="logInAsCommitteeMember" type="hidden" name="logInAsCommitteeMember" value="no">
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="modal-footer">
    <button class="btn pull-left" id="toggleRoleSelectionButton" onclick="toggleRoleSelection();" aria-hidden="true">
      Switch to committee member
    </button>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary" onclick="$('#loginForm').submit();">Sign in</button>
  </div>
</div>

<script type="text/javascript">
  function toggleRoleSelection() {
    if (isCommitteeAuthViewShown()) {
      $('#committeeAuthView').toggle();
      $('#logInAsCommitteeMember').val('no');
      $('#roleSelectionHeader').html('Voter');
      $('#toggleRoleSelectionButton').html('Switch to voting committee member');
    } else {
      $('#committeeAuthView').toggle();
      $('#logInAsCommitteeMember').val('yes');
      $('#roleSelectionHeader').html('Voting committee member');
      $('#toggleRoleSelectionButton').html('Switch to voter');
    }
  }

  function isCommitteeAuthViewShown() {
    return $('#committeeAuthView').css('display') != 'none';
  }
</script>
<?php
}
?>