<?php
header("Content-type: text/plain");
echo("Attempting git pull from github...\n");
system("git pull 2>&1"); //2>$1 causes stderr to get redirected to stdout so errors don’t get lost in the call to system()
echo "\nEnd.\n";