<?php
$candidateNumber = $_POST['candidateNumber'];
if (!isset($candidateNumber)) {
  header("Location: candidate-selection.php");
  exit;
}
include '_header.php';
?>

<div class="container content">
  <div class="row">
    <div class="span10 offset1">
      <fieldset>
        <legend>Registering vote...</legend>
        <label>Your vote is being registered. Please wait...</label>
        <?php
        $socSecurityNumber = $_SESSION['inputSocialSecNumber'];
        $query = "SELECT webapp.f_haaleta('$socSecurityNumber', '$candidateNumber')";
        $rs = pg_query($con, $query);
        $result = pg_fetch_result($rs, 0, 0);
        if ($result === 't') {
          addSuccessMessage("Vote successfully registered!");
          echo "Vote registered!";
        } else {
          addErrorMessage("Could not register your vote!");
          echo "Could not register vote!";
        }
        ?>
      </fieldset>
    </div>
  </div>
  <br />
  <?php include '_footer.php'; ?>
</div>

