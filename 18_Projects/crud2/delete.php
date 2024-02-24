<?php
  // step 1 : To create or setup database
  // gpt to brint to php my admin
  // Coose the column name and size
  // and save
  // Done

  // Step 2:
  // To Inser the data of eployee form to database
  // To write the connecting the database in "database file"

  // step 3 : add the data base file at the top
?>

<?php
  //step 3
  require_once("db.php");

  // To update the record correspoding to the ID
  $search = $_GET["id"];

  if(isset($_POST["submit"]))
  {
      $ename = $_POST["name"];
      $ssn = $_POST["SSN"];
      $dept = $_POST["Dept"];
      $salary = $_POST["salary"];
      $address = $_POST["add"];

          // We can this data to our database table
          $connectiodb;
          // Write the query for delete the data of employe using there id
          $sql = "DELETE FROM emp_record WHERE id='$search'";

          // to create the sql query for d/b
          $stmt = $connectiodb->query($sql);
        
          // check that when it execute then print message it has succsessfuly execute
          if($stmt)
          {
            // to send the succsess message to our view page using the mention under the ?id="Update succsesfuly"
            echo '<script>window.open("view.php?id=delete succsesfuly","_self")</script>';
          } 

      /*
          Avoid mistakes
          1> The column name in the query should be same as the DB column name
          2> suggest of Itself that The name of inpute field should be same as db_col
          3> Read the error or ask " To Chat Gpt This error also solve by GPT"
          4> also apply the validations for this same
      */
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update the employee record</title>
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

    textarea{
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
    }

    /* // alerts */
    .red{
      color: red;
    }

    .succes{
      color: green;
    }
  </style>
</head>
<body>
    <!-- // Write php here for showing the data at the database in our form -->
    <?php
        $connectiodb;
        $sql = "SELECT * FROM emp_record WHERE id=$search";
        $stmt = $connectiodb->query($sql);
        while ($dataRow=$stmt->fetch()) {
            $id = $dataRow["id"];
            $name = $dataRow["ename"];
            $ssn = $dataRow["ssn"];
            $dept = $dataRow["dept"];
            $salary = $dataRow["salary"];
            $address = $dataRow["address"];
        }

    ?>
  <div class="container">
    <h2>PHP Form</h2>
    <form action="delete.php?id=<?php echo $search ?>" name="form1" method="post" enctype="multipart/form-data">

      <!-- Personal Information -->
      <label for="name">Full Name:</label>
      <input type="text" name="name" value="<?php echo $name; ?>">

      <label for="SSN">Social Security Number:</label>
      <input type="text" name="SSN" value="<?php echo $ssn; ?>">

      <!-- <label for="password">Password:</label>
      <input type="password" id="password" name="password"> -->

      <label for="Department">Department:</label>
      <input type="text" name="Dept" value="<?php echo $dept; ?>">

      <label for="salary">Salay:</label>
      <input type="text" name="salary" value="<?php echo $salary; ?>">

      <label for="add">Home Addrase:</label>
      <textarea name="add" cols="30" rows="10"><?php echo $address; ?></textarea>

      <br><button type="submit" name="submit">Delete Record</button>

</body>
</html>