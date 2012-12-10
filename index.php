<html>
  <head>
    <title>Select role</title>
  </head>
  <body>
    <p>
      <a href="/votingCommitteeMember.php">Voting committee member</a>
    </p>
    <p>
      <a href="/voter.php">Voter</a> <br>
<?php

        $host = "hektor3.ttu.ee";
        $user = "t073819";
        $pass = "Ab123c";
        $db = "t073819";
        $con = pg_connect("host=$host dbname=$db user=$user password=$pass");

        $query="Select * from valija";
        $rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
        while ($row = pg_fetch_row($rs)) {
            echo "$row[0] $row[1] $row[2]<br>";
        }

        pg_close($con);

?>
    </p>
  </body>
</html>