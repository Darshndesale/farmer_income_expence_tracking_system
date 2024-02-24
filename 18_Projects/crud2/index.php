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

  if(isset($_POST["submit"]))
  {
      $ename = $_POST["name"];
      $ssn = $_POST["SSN"];
      $dept = $_POST["Dept"];
      $salary = $_POST["salary"];
      $address = $_POST["add"];

      if(!empty($ename) && !empty($ssn))
      {
          // We can this data to our database table
          $connectiodb;
          // create the SQL query
          $sql = "INSERT INTO emp_record(ename,ssn,dept,salary,address)
          VALUES(:nameE,:ssN,:DeptD,:Salary,:Address)";

          /* Learn about the SQL injection : Becuse our form data is we create as the SQL injection FREE
              - SQL injection it is security perspective 
              - To anyone bad one can touch you web structure
          */

          // How to prevent from Sql Injection
          // startfrom the "LINE NO ": 33 values pasun Tya nantar 42

          // The means : When we have -> then it menas this is object calls the method prepare
          $stmt = $connectiodb->prepare($sql);
          // Bind all the values using the bind method by calling $stmt obj 
          // To free the injection free the value
          $stmt->bindValue(':nameE',$ename);
          $stmt->bindValue(':ssN',$ssn);
          $stmt->bindValue(':DeptD',$dept);
          $stmt->bindValue(':Salary',$salary);
          $stmt->bindValue(':Address',$address);

          // Execute the query on database by execute()
          $Execute = $stmt->execute();

          // check that when it execute then print message it has succsessfuly execute
          if($Execute)
          {
            echo '<h2 class="succes"> Record of Employe is added successfuly..</h2>';
          } 
      } else {
        echo '<p class="red">Please atleast add name and socia security name</p>';
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
  <div class="container">
    <h2>PHP Form</h2>
    <form action="index.php" name="form1" method="post" enctype="multipart/form-data">

      <!-- Personal Information -->
      <label for="name">Full Name:</label>
      <input type="text" name="name">

      <label for="SSN">Social Security Number:</label>
      <input type="text" name="SSN">

      <!-- <label for="password">Password:</label>
      <input type="password" id="password" name="password"> -->

      <label for="Department">Department:</label>
      <input type="text" name="Dept">

      <label for="salary">Salay:</label>
      <input type="text" name="salary">

      <label for="add">Home Addrase:</label>
      <textarea name="add" cols="30" rows="10"></textarea>

      <br><button type="submit" name="submit">Submit Record</button>

</body>
</html>