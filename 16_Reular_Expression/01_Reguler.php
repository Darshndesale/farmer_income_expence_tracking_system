<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reguler expresions</title>
</head>
<body>
    <?php
        // What is Regular Expression : A method of specifying a search string using a number of special characters that can precisely match a substring
        // hamari bhasha me : e.x if you specifying the String and This expressions validate the substrings like : darshan@123.com This is not valid form email
        /*
            -Enclose in Literals such as /
            => like Email validation : for smalll case if you have need to check the user data using the if statements
            => / ^[A-Za-z0-9._%-]+@[A-Za-z0-9./%-]+ / only at the end

            Quantifiers :
                - Match zero or more of previous   * => can be one item
                - Match one or more of previous     + => items picked
                - Match onw or Zero of previous     ?
                - Match exactly number of previous  {4} {min,max} {3}

            - Match start of line => ^ it check start of name leter that my name is darsh then it check the d
            - Match end of line  => $ smajh rahe ho last char or name
            - Match and single char => .
        
            * Special charecters visite the web  LINK :=> php.net/manual/en/reference.pcre
            => But use this special char at the finish with \.
                

            Note : The regular expression is one of the most important for devloper protect thre website from hakers
            
        */
    ?>
</body>
</html>