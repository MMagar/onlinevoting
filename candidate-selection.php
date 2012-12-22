<?php
include '_header.php';

if (isLoggedIn()) {
  $voterIdCode = $_SESSION['inputSocialSecNumber'];
} else {
  addInfoMessage('No logged in user, using test data of 39007180099');
  $voterIdCode = '39007180099';
}

function getCurrentVoterStatusMessage() {
  if (hasVoterPaperVoted()) {
    return "You have cast a paper vote. You are unable to cast e-votes.";
  } else if (hasVoterVotedOnline()) {
    return "You have not voted e-voted yet. Select a candidate to vote for from the table below.";
  } else {
    return "Your e-vote is registered. But you are still free to change it and pick a different candidate.";
  }
}

function hasVoterPaperVoted() {
  global $con;
  global $voterIdCode;
  $query = "SELECT on_tavahaaletanud FROM votingDb.Valija WHERE valija_isikukood = '$voterIdCode'";
  $rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
  $result = pg_fetch_result($rs, 0, 0);
  return $result == 't';
}

function hasVoterVotedOnline() {
  global $con;
  global $voterIdCode;
  $query = "SELECT * FROM votingDb.Haal WHERE valija_isikukood = '$voterIdCode'";
  $rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
  return pg_num_rows($rs) > 0;
}
?>
<div class="container content">
  <?php
  echo getCurrentVoterStatusMessage()
  ?>

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
    $query = "Select * from webapp.f_valitavad_kandidaadid('" . $voterIdCode . "')";
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
