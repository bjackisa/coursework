<?php
$input = [
    " Full Name" => $_POST["fullname"],
        "Age" => $_POST["birthdate"],
        "Password *********" ,
        "Confirm Password**********",
    "Region" => $_POST["region"],
    "Email" => $_POST["email"],
    
];
 foreach($input as $key => $value){
     echo "$key: $value <br>";
 }






?>