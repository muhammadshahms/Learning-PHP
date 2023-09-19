<?php 

// isset returns true  if variable is declared
$username="";
// if (isset($username)) {
//     echo "username is set";
// }
// else {
//     echo "username is not set";
// }


// empty() returns true if variable is not declared
if(empty($username)) {
    echo "username is not empty";
}
else {
    echo "username is empty";
}
?>