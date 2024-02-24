<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- // we can move to the current file to next file using the links -->
    <?php
        $NAME = "Darsh sai";
        $position = "Poistion ki value";
    ?>
            <!-- we play with "Curr File <-> 03_URL_SG" check out that also -->
    <a href="03_URL_SG.php?Name=<?php echo $NAME; ?>">Click Here 1</a><br>

    <!-- // Output : In url Darsh%20& The browser it encoded the URL in Itself
    // Also one thing that In last lecture How we see Under the " $_POST" we also see "$_GET" kya he isme dusri file me -->

    <a href="03_URL_SG.php?Name=<?php echo $NAME; ?>&position=<?php echo urlencode($position); ?>">Click Here 2</a>
    

    // Kya sikhne ko mila : 1> ki php syntax corners me check karo 2> Ki url me jo bhi corresponding name he vahi dalo 3> $_GEt me kya vlaue a rahi he vo dekho $> Anbiguity resolve karne ke liye urlencode is helps in case of complex url or path
</body>
</html>