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
        $rs = pg_query($con, $query, $parametersArray)
          or die("Cannot execute query: $query\n With parameters: $parametersArray[0] and $parametersArray[1]");
        $row = pg_fetch_row($rs);
        $result = ($row[0] == 't');
        echo "result " . $result . " row" . $row[0];
        ?>
      </fieldset>
      </form>

    </div>
  </div>


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

</body>
</html>