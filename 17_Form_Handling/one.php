<?php
    // check that user submite there information
    $NameErrror = "";
    $EmailErrror = "";
    $genderErrror = "";
    $websiteErrror = "";

    $isEmailValid = false;
    $isNameValid = false;

    if(isset($_POST["submit"])) {
        // for name
        if(empty($_POST["name"])) {
            $NameErrror = "Requred name";
        } else {
            // yes in this field there is some Name here
            $validName = test_name($_POST["name"]);

            // check for validate Name
            if(!preg_match("/^[A-Za-z. ]*$/", $validName)) {
                $NameErrror = "only Letters and white Spaces are allowed";
            } else {
                $isNameValid = true;
            }
        }
        // for email
        if(empty($_POST["email"])) {
            $EmailErrror = "Requred email";
        } else {
            // yes in this field there is some Name here
            $validEmail = test_name($_POST["email"]);

            // check for validate Email
            if(!preg_match("/[A-Za-z0-9]{3,}@[A-Za-z]{3,}[.]{1,}[a-zA-Z]{3,}/", $validEmail)) {
                $EmailErrror = "invalid email format e.g xyz123@gmail.com";
            } else {
                $isEmailValid = true;
            }
        }
        // for gender
        if(empty($_POST["gender"])) {
            $genderErrror = "Requred gender";
        } else {
            // yes in this field there is some Name here
            $validgender = test_name($_POST["gender"]);
        }
        // for Website
        if(empty($_POST["website"])) {
            $websiteErrror = "website is Requred";
        } else {
            // yes in this field there is some Name here
            $validwebsite = test_name($_POST["website"]);
        }
    }

    // define attributes validate fun()
    function test_name($data) {
        // after validate name return it
        return $data;
    }

    // ********* Show the submited data *************
    // check that my all fields is fill with input
    // if(!empty($_POST["name"])  && !empty($_POST["email"]) && !empty($_POST["website"])) {
    //     if($isEmailValid == true && $isNameValid == true){
    //         echo "<h2>Your Submit Information</h2> <br>";
    //         echo "Name: {$_POST["name"]} <br>";
    //         echo "Email: {$_POST["email"]} <br>";
    //         echo "gender: {$_POST["gender"]} <br>";
    //         echo "Website: {$_POST["website"]} <br>";
    //         echo "Conmment: {$_POST["comment"]} <br>";
    //     } else {
    //         echo "Please fill your form again, Invalid Information";
    //     }
    // }
    // Note: After this validation this style the form using the css small bit jyada nahi
    // After I create the new file se this has 1> To send the data on the user email which has data write Then dekho
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form validation</title>
    <style>
        .info{
            height: 200px;
            width: 400px;
            border: none;
            overflow-y: scroll;
            background: red;
        }


    </style>
</head>
<body>
    <!-- create the form structure -->
<fieldset>
<legend>HTML FORM</legend>
<!-- // after click submite button it redirected to the child file line no :13 -->
<form action="one.php" method="POST">  
    <label for="name">name: </label><br>
    <input type="text" name="name">*<?php echo $NameErrror?><br>

    <label for="email">email: </label><br>
    <input type="email" name="email">*<?php echo $EmailErrror?><br>

    <label for="gender">gender: </label><br>
    <input type="radio" name="gender">Male
    <input type="radio" name="gender">femail *<?php echo $genderErrror?><br>

    <label for="website">website: </label><br>
    <input type="text" name="website">*<?php echo $websiteErrror?><br>

    <label for="comment">Comment</label><br>
    <textarea name="comment" id="" cols="25" rows="5"></textarea><br><br>
    <input type="submit" value="Submite Information!" name="submit">

</form>
</fieldset>
<div class="" id="temp">
        <?php
        if(!empty($_POST["name"])  && !empty($_POST["email"]) && !empty($_POST["website"])) {
            if($isEmailValid == true && $isNameValid == true){
                echo '<script>
                    document.getElementById("temp").setAttribute("class","info");
                </script>';
                echo "<h2>Your Submit Information</h2> <br>";
                echo "Name: {$_POST["name"]} <br>";
                echo "Email: {$_POST["email"]} <br>";
                echo "gender: {$_POST["gender"]} <br>";
                echo "Website: {$_POST["website"]} <br>";
                echo "Conmment: {$_POST["comment"]} <br>";

                // Send the email also
                $emailTo = "darshandesale18@gmail.com"; // this the the receiver addrease to we send our side
                $body = "A name of fork : ". $_POST["name"] . "Email : ". $_POST["email"] . "Gender : ". $_POST["gender"];
                $subject = "This is emal sends using php";
                $headers = "From : darshandesale18@gmail.com";

                if(mail($emailTo, $subject, $body, $headers)){
                    echo "Successfully send the mail !";
                } else {
                    echo "Mail not sent !";
                }
            } else {
                echo "Please fill your form again, Invalid Information";
            }
        }
        ?>
    </div>
</body>
</html>