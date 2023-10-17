<?php 
$f="hello";
echo "<h1 style='color:red'> hey</h1> <br> $f";

$input = "Hello world!";
echo $input . "<br>";

echo str_replace("world", "Dolly", $input);



// $input1 = "Hello world!";
// $input2=1237123571258;
// $input3=2313.4;
// print(var_dump(is_float($input3)));


$obtained_marks = 200;
$total_marks = 400;
$percentage = ($obtained_marks/$total_marks)*100;

if($percentage >= 80){
    echo "$percentage A grade";
}
elseif($percentage >= 60){
    echo "$percentage B grade";
}
elseif($percentage >= 50){
    echo "$percentage c grade";
}
else{
    echo "$percentage fail";
}
// ternary operator

// $marks=30;
// $result= ($marks>=40) ? "pass" : "Fail";
// print $result;

$google = array("car"=>"civic","air"=>"aeroplane","boat"=>"titanic");
// print_r($google["boat"])
foreach($google as $key => $value){
    echo $key . $value . "<br>";
}
?>