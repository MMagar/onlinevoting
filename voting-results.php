<?php
include '_header.php';
?>
<div class="container content">
  <table class="table table-condensed">
    <thead>
    <tr>
      <th>Votes</th>
      <th>Name</th>
      <th>Candidate nr</th>
      <th>Party</th>
    </tr>
    </thead>
    <tbody>
    <?php
    include '_database-connection.php';

    $voterIdCode = '39007180099';
    $query = "Select * from v_haaletustulemused";
    $rs = pg_query($con, $query) or die("Cannot execute query: $query\n");

    while ($row = pg_fetch_row($rs)) {
      echo "<tr> <td>$row[0]</td> <td>$row[1] $row[2]</td> <td>$row[3]</td> <td>$row[4]</td>";
    }

    pg_close($con);
    ?>
    </tbody>
  </table>

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
