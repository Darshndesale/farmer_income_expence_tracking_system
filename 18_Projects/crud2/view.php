<?php
  /*
    1> To fetch the data is put into the tables format
    2> 
  */
?>

<?php
  //step 3
  require_once("db.php");

  // we store the succsess message of update page $_get method through
  // direct in h2 line 26
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Viwe The Employee Details Form</title>
  <style>
    .search {
      width: 25%;
      background: green;
      margin: auto;
      border-radius: 20px;
      height: 100px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
    }
  </style>
</head>

<body>

  <!-- To create the search bar for providing searching functionality -->
  <div class="search">
    <form action="view.php" method="POST">
      <input type="text" name="ssn" placeholder="Enter ename or SSN">
      <br>
      <button type="search" name="search">search</button>
    </form>
  </div>
  <!-- Writing php code for the search query -->
  <table width="1000" border="5" align="center">
    <caption>View Employee Record</caption>
    <tr>
      <th>id</th>
      <th>Name</th>
      <th>SSN</th>
      <th>Department</th>
      <th>Salary</th>
      <th>Address</th>
    </tr>
    <?php
    if(isset($_POST['search']))
    {
        $input = $_POST['ssn'];
        $sql = "SELECT * FROM emp_record WHERE ename=:input OR ssn=:input";
        $stmt = $connectiodb->prepare($sql);
        $stmt->bindValue(':input',$input); // This is for just Injection free
        $stmt->execute();

        while($dataRow=$stmt->fetch()) // to fetch the row using the stmt to store the row in $dataRow variable
                {
                    // to store exact the variables like name,SSN etc
                    $id = $dataRow["id"];
                    $name = $dataRow["ename"];
                    $ssn = $dataRow["ssn"];
                    $dept = $dataRow["dept"];
                    $salary = $dataRow["salary"];
                    $address = $dataRow["address"];

                    // to show this data using the tr tag
            ?>
    <tr>
      <td>
        <?php echo $id; ?>
      </td>
      <td>
        <?php echo $name; ?>
      </td>
      <td>
        <?php echo $ssn; ?>
      </td>
      <td>
        <?php echo $dept; ?>
      </td>
      <td>
        <?php echo $salary; ?>
      </td>
      <td>
        <?php echo $address; ?>
      </td>
      <!-- // to add 2 anchor tag here for delete and update -->
    </tr>
    <?php } ?>
  </table>
    <?php } ?>

    <!-- // we add some message that when we update the infor  from update page to redirect to this current page this shows update message -->
    <!-- When we give to accese this id without updation It will give error Then we PUT before That @ -->
    <h2 class="succes">
      <?php echo @$_GET["id"]; ?>
    </h2>
    <table width="1000" border="5" align="center">
      <caption>View Employee Record</caption>
      <tr>
        <th>id</th>
        <th>Name</th>
        <th>SSN</th>
        <th>Department</th>
        <th>Salary</th>
        <th>Address</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>

      <!-- // To show the record in the form of table row -->
      <?php
            // same as previous to add DB connection
            $connectiodb;
            // write the Sql query to fetch data from table
            $sql = "SELECT * FROM emp_record";
            // to create the query with corresponding to database
            $stmt = $connectiodb->query($sql);

            // to fetch the data from the database using the while loop to fetch the data in the Easch rows by iterating
                while($dataRow=$stmt->fetch()) // to fetch the row using the stmt to store the row in $dataRow variable
                {
                    // to store exact the variables like name,SSN etc
                    $id = $dataRow["id"];
                    $name = $dataRow["ename"];
                    $ssn = $dataRow["ssn"];
                    $dept = $dataRow["dept"];
                    $salary = $dataRow["salary"];
                    $address = $dataRow["address"];

                    // to show this data using the tr tag
            ?>
      <tr>
        <td>
          <?php echo $id; ?>
        </td>
        <td>
          <?php echo $name; ?>
        </td>
        <td>
          <?php echo $ssn; ?>
        </td>
        <td>
          <?php echo $dept; ?>
        </td>
        <td>
          <?php echo $salary; ?>
        </td>
        <td>
          <?php echo $address; ?>
        </td>
        <!-- // to add 2 anchor tag here for delete and update -->

        <!-- // To update the record using the Search parameter ID -->
        <td><a href="update.php?id=<?php echo $id; ?>">UPDATE</a></td>
        <td><a href="delete.php?id=<?php echo $id; ?>">DELETE</a></td>
      </tr>
      <?php } ?>
    </table>
</body>

</html>