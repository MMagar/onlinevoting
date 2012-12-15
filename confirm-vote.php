<?php
include '_header.php';
$candidateNumber = $_POST['candidate'];
if (!isset($candidateNumber)) {
  header("Location: candidate-selection.php");
  exit;
}

?>

<div class="container content">
  <div class="row">
    <div class="span10 offset1">
      <form action="cast-vote.php" method="POST">
        <fieldset>
          <legend>Confirmation</legend>
          <label>You are about to vote for candidate number <?php echo $candidateNumber;?>.<br>
            Are you sure?</label>
          <div class="form-actions">
            <input type="hidden" name="candidateNumber" value="<?php echo $candidateNumber;?>" />
            <button type="submit" class="btn btn-primary">Cast vote</button>
            <button type="button" class="btn">Cancel</button>
          </div>
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