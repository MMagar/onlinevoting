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
        $query = "SELECT * FROM f_haaleta($1, $2)";
        $parametersArray = array($_SESSION['inputSocialSecNumber'], $candidateNumber);
        $rs = pg_query_params($con, $query, $parametersArray)
          or die("Cannot execute query: $query\n With parameters: $parametersArray[0] and $parametersArray[1]");
        $row = pg_fetch_row($rs);
        $result = ($row[0] == 't');
        echo "result " . $result . " row" . $row[0];
        ?>
      </fieldset>

    </div>
  </div>
</div>
<?php include '_footer.php'; ?>

