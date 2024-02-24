<?php 
// the variables in the php is used for store the information  in memeory  

/* rules:
1> the varialbe declaration starts with the $ sign
2> The variable names in php is case sensitive
*/
// variable declaration
$name = "darshan desale";
$age = 18;
echo $name, "<br>"; // This is for next 
echo $age;

// ******************* Also we See about CONSTANTS ********************8
// constans sysntax : define("Value_of_pi",3.14)
// Also one that when we cange the value at line no 17 as any number this not Becuase we do not redifine value again
define("value_of_gravity",9.87);

echo "PI Value :" . value_of_gravity; 

// we can try that we can able to change the constant value lets try

?>
<?php
// value_of_gravity = 0.5;
?>
