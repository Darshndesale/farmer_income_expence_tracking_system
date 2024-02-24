<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For each loop</title>
</head>
<body>
    <?php
    $numarr = array(1,2,3,4,5,77,665,3,);
    foreach($numarr as $num){
        echo $num, "<br>";
    }
    ?>
    <hr>

    <?php
    // it is usefull for key and value array
    $food = array("item_id"=> 101,"name"=>"pizza","region"=>"deobhane","drin_k"=>"water", "price"=>null);
    // apply for each loop and print key and valuue same time
    foreach($food as $key=>$value){
        // echo "($key) : ($value) <br>";
        // check that the price must be is numeric string
        if($key == "price"){
            if(is_numeric($value)){ // is_numeric is check that "value" is numeric or null or any thing But : "100" consider as numeric AND "oop" not consider
                echo "";
            } else {
                $value =  "Not deermine <br>";
            }
        }
        echo "($key) : ($value) <br>";
    }
    ?>
    <hr>
    <?php
        // This is for when user have fetch any variable display on screen then the variable with _ keyword not suitable for ui te=hen replace it has a space
        // check that the 
        foreach ($food as $key => $value) {
            $newKey = str_replace("_"," ",$key);
            echo "($newKey) : ($value) <br>";
        }
    ?>
     
     <!-- also for : is_null, is_bool, empty, is_numeric -->

</body>
</html>