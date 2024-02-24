<?php
// Syntax : new PDO(Layer) ('mysql:host=HostName(localhost);dbname=Data_Base_Name,defualt Username & Password ('root', 'empty') )
// specialy store the : Data source Network
    $DSN = 'mysql:host=localhost;dbname=farmer';
    $connectiodb = new PDO($DSN,'root','');
?>
<?php
    $DSN2 = 'mysql:host=localhost;dbname=farmer';
    $connectionDb = new PDO($DSN2,'root','');
?>