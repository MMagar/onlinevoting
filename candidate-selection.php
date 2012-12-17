<?php include '_header.php' ?>
<div class="container content">
  <table class="table table-condensed">
    <thead>
    <tr>
      <th>Candidate number</th>
      <th>Name</th>
      <th>Party</th>
      <th></th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (isLoggedIn()) {
      $voterIdCode = $_SESSION['inputSocialSecNumber'];
    } else {
      addInfoMessage('No logged in user, using test data of 39007180099');
      $voterIdCode = '39007180099';
    }

    $query = "Select * from f_valitavad_kandidaadid('" . $voterIdCode . "')";
    $rs = pg_query($con, $query) or die("Cannot execute query: $query\n");

    while ($row = pg_fetch_row($rs)) {
      echo "<tr> <td>$row[0]</td> <td>$row[1] $row[2]</td> <td>$row[3]</td> <td><form action='confirm-vote.php' method='POST' style='margin: 0 0 0px;'>
                  <input type='hidden' name='candidate' value='" . $row[0] . "' />
                  <input type='submit' name='submit' class='btn btn-success' value='Vote'/>
                </form></td>";
    }

    ?>
    </tbody>
  </table>
  <?php include '_footer.php'; ?>
</div>
