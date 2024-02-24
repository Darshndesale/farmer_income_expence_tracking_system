<?php
echo "My name is darshan desale <br>";
echo "My age is 18 <br>";

// How to concatinated the String using . oprator
$first_name = "darshan";
$last_name = "desale";
echo $first_name . " " . $last_name, "<br>";

// Diffrence between the ' single cot ' && " multi cot " with e.x
echo "$first_name <br>"; // In this cotation we write any variable $sign this give me the value
echo '$last_name <br>'; // In this cotation we write anything it returns the value as same 

// one more thing to accese the value or differetiate the variable from othor
echo "${first_name} it is <br>";

// ************************* Anothor  way to concatinate the string .= *****************
$ph1 = "The student who late ";
$ph2 = "in the class who sit at last it is rock";
$combine = $ph1;
$combine .= $ph2;

echo "original string is : ${combine} <br>";
// out put : original string is : The student who late in the class who sit at last it is rock


// ****************** String functins (uppercase,lowwercase,ad char) ****************
// Task : covert the $cobine string To upper , lowwer , first, words
echo " ********************* This are the  string functions ************************ <br>";
echo ucfirst($combine), "<br>";
echo ucwords($combine), "<br>";
echo strtolower($combine), "<br>";
echo strtoupper($combine), "<br>";
echo "This gives the sub string  : ",substr($combine,5,10), "<hr>";
echo "This gives the position of string starts  : ",strpos($combine,"late"), "<hr>";
echo "This gives full string starts with char in argu  : ",strchr($combine,"r"), "<hr>";
echo "This gives the length of string  : ",strlen($combine), "<hr>";
// also search more using .oprator



?>