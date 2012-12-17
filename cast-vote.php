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
        include "_database-connection.php";
        $socSecurityNumber = $_SESSION['inputSocialSecNumber'];
        $query = "SELECT f_haaleta('$socSecurityNumber', '$candidateNumber')";
        $rs = pg_query($con, $query);
        $result = pg_fetch_result($rs, 0, 0);
        if ($result === 't') {
          echo "Vote registered!";
        } else {
          echo "Could not register vote!";
        }
        pg_close($con);
        ?>
      </fieldset>

    </div>
  </div>
</div>
<?php include '_footer.php'; ?>

