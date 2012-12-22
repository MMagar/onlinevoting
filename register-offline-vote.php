<?php
include '_header.php';
$voterSocialSecurityNr = $_POST['voterSocialSecurityNr'];

function registerOfflineVote($socialSecurityNr) {
  global $con;
  global $voterSocialSecurityNr;
  $query = "SELECT webapp.f_registreeri_tavahaaletus('$socialSecurityNr')";
  $rs = pg_query($con, $query);
  if ($rs == false) {
    addErrorMessage("<br/>" . pg_last_error($con));
  } else {
    addSuccessMessage("User $voterSocialSecurityNr registered as offline voter.");
  }
}

?>

<div class="container content">
  <div class="row">
    <div class="span12">
      List of people who have voted online in your voting station. <br />
      <table class="table table-condensed">
        <thead>
         <tr>
           <th>Social security number</th>
         </tr>
        </thead>
        <tbody>
          <?php
          $query = "Select * from webapp.f_vaata_haaletanuid('" . $_SESSION['inputSocialSecNumber'] . "')";
          $rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
          while ($row = pg_fetch_row($rs)) {
            echo "<tr> <td>$row[0]</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <br/>
  <br/>
  <br/>
  <div class="row">
    <div class="span12">
      <form action="register-offline-vote.php" method="POST">
        <fieldset>
          <legend>Registering offline vote</legend>
          <label>Enter social security number of voter to disable his/her online voting</label>
          <input type="text" name="voterSocialSecurityNr"/>

          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Register offline vote</button>
          </div>
          <?php
          if (isset($voterSocialSecurityNr)) {
            registerOfflineVote($voterSocialSecurityNr);
          }
          ?>
        </fieldset>
    </div>
  </div>
  <br/>
  <?php include '_footer.php'; ?>
</div>
