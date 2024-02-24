<!-- Make the connection; -->
<?php

?>

<?php
    if(isset($_POST['submit']))
    {
      // receive all data
      $name = $_POST['submit'];
      $email = $_POST['email'];
      $phone = $_POST['phoneNumber'];
      $bestTime = $_POST['bestTime'];
      
      // The month and year are not to be khali
      if(!empty($_POST['s1']) && !empty($_POST['s2']) && !empty($_POST['s3']))
      {
        $d = $_POST['s1'];
        $m = $_POST['s2'];
        $y = $_POST['s3'];

        $dat = $d."-".$m."-".$y;
        // echo "<h1>$date</h1>";
      }

      // after that we give the Budget
      $budget = $_POST['budget'];

      // after that we give the checkbox option and continate this
     // Becuse this is array we put the value and iterate
      
      $lag_name = "";
        foreach ($_POST['arr'] as $lag) {
          $lag_name .= $lag.",";
        }
        echo "<h1>{$lag_name}</h1>";

      
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 50%;
      margin: 50px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input, select {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>PHP Form</h2>
    <form action="index.php" name="form1" method="post" enctype="multipart/form-data">

      <!-- Personal Information -->
      <label for="fullName">Full Name:</label>
      <input type="text" id="fullName" name="fullName">

      <label for="email">Email:</label>
      <input type="email" id="email" name="email">

      <!-- <label for="password">Password:</label>
      <input type="password" id="password" name="password"> -->

      <label for="phoneNumber">Phone Number:</label>
      <input type="tel" id="phoneNumber" name="phoneNumber">

      <!-- Radio Buttons -->
      <label>Best Time to Call:</label>
      <label><input type="radio" name="bestTime" value="morning"> Morning</label>
      <label><input type="radio" name="bestTime" value="afternoon"> Afternoon</label>
      <label><input type="radio" name="bestTime" value="evening"> Evening</label>

      <!-- Budget -->
      <label for="budget">Budget:</label>
      <select id="budget" name="budget">
        <option>--Select One--</option>
        <option value="100-500">$100-$500</option>
        <option value="100-500">$100-$500</option>
        <option value="100-500">$100-$500</option>
      </select>

      <!-- Table -->
      <table>
        <tr>
          <td><label><input type="checkbox" name="arr[]" value="php"> PHP</label></td>
          <td><label><input type="checkbox" name="arr[]" value="python"> Python</label></td>
        </tr>
        <tr>
          <td><label><input type="checkbox" name="arr[]" value="javascript"> JavaScript</label></td>
          <td><label><input type="checkbox" name="arr[]" value="java"> Java</label></td>
        </tr>
        <tr>
          <!-- // IMP At the time to send data of checkbox : means there is multiple inputes checkBox then we use array -->
          <td><label><input type="checkbox" name="arr[]" value="csharp"> C#</label></td>
          <td><label><input type="checkbox" name="arr[]" value="ruby"> Ruby</label></td>
        </tr>
      </table>

      <!-- Date of Birth But we create this using ranges to USE PHP code loop to display ranges-->
      <!-- It is for day -->
      <select name="s1">
        <?php
          $date = range(1,30);
          // loop lagayenge
          foreach ($date as $i){ 

        ?>
        <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
          }
        ?>
      </select>
      <!-- It is for month -->
      <select name="s2">
        <?php
          $month = range(1,12);
          // loop lagayenge
          foreach ($month as $i){ 

        ?>
        <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
          }
        ?>
      </select>
      <!-- It is for Year -->
      <select name="s3">
        <?php
          $Y = range(1800,2020);
          // loop lagayenge
          foreach ($Y as $i){ 

        ?>
        <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
          }
        ?>
      </select>
      
      <!-- Submit Button -->
      <button type="submit">Submit</button>
      <?php
        // $lag_name = "";
        // foreach ($_POST['arr'] as $lag) {
        //   $lag_name .= $lag.",";
        // }
        // echo "<h1>{$lag_name}</h1>";
      ?>  
    </form>
  </div>

</body>
</html>