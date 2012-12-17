<?php
include '_header.php';
$voterSocialSecurityNr = $_POST['voterSocialSecurityNr'];

function registerOfflineVote($socialSecurityNr) {
  global $con;
  $query = "SELECT f_registreeri_tavahaaletus('$socialSecurityNr')";
  $rs = pg_query($con, $query);
  if($rs==false) {
    echo "error: ".pg_last_error($con)."<br/>";
  }
}
?>

<div class="container content">
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
  <br />
  <?php include '_footer.php'; ?>
</div>
