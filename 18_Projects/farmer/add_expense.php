
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style5.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Form</title>
    <style>
   body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 20px;
}

h2 {
    color: #333;
    margin-bottom: 20px;
}

form {
    width: 50vw;
    height: 500px;
    margin: auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    overflow-y: scroll;
    overflow-x: hidden;
}

label {
    display: block;
    margin-bottom: 10px;
}

input, select {
    width: 50vw;
    padding: 8px;
    margin-top: 5px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

img {
    max-width: 50%;
    max-height: 35px;
    margin-bottom: 10px;
}

input[type="submit"] {
    background-color: #4caf50;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}


.methods{
    display: flex;
    justify-content: space-evenly;
    flex-wrap: wrap;
}

a{
    color: black;
    font-style: none;
    text-decoration: none;
    text-align: center;
}

.lg{
    display: flex;
    flex-direction: column;
    align-items: center;
}

.two_col{
    display: flex;
}

#col > input{
    width: 25vw;
}
#col > select{
    width: 25vw;
}


    </style>
</head>
<body>
<!-- <script>
         function goBack() {
            window.history.back();
         }
        
         function redirectToLogin() {
            window.location.href = "login.php";
         }
</script> -->
    <div class="container">
        <div class="dashboard">
            <h1>Dashboard</h1>
            <nav>
                <ul>
                <li><a href="add_income.php">Add Income</a></li>
                    <li><a href="add_expense.php?farmId=<?php echo $farmID; ?>">Add Expense</a></li>
                    <li><a href="view_expenses.php">View Expense</a></li>
                    <li><a href="view_income.php">View Income</a></li>
                    <li><a href="reports.php">Reports</a></li>
                </ul>
            </nav>
        </div>
       
        <div class="right-column">
        <h1>Enter Expense Details</h1><hr/>
        <a class="back-btn" onclick="goBack()">Back</a>
        <div class="methods">
        <div class="lg">
            <img src="assets/soil.webp" alt="">
            <!-- <label for="fertilizer"><a href="expence.php?id=land preparation" id="land">Land Preparation</a></label> -->
            <label for="fertilizer"><a href="#" id="land">Land Preparation</a></label>
        </div>
        <div class="lg">
            <img src="assets/spraying.jpg" alt="">
            <!-- <label for="fertilizer"><a href="expence.php?id=spraying">spraying</a></label> -->
            <label for="fertilizer"><a href="#" id="spray">spraying</a></label>
        </div>
        <div class="lg">
            <img src="assets/fertilizer.jpg" alt="">
            <label for="fertilizer"><a href="#" id="fertilizer">fertilizer</a></label>
        </div>
        <div class="lg">
            <img src="assets/sowing.jpg" alt="">
            <label for="fertilizer"><a href="#" id="sowing">sowing</a></label>
        </div>
        <div class="lg">
            <img src="assets/harvesting.png" alt="">
            <label for="fertilizer"><a href="#" id="harvesting">harvesting</a></label>
        </div>
        <div class="lg">
            <img src="assets/watering.png" alt="">
            <label for="fertilizer"><a href="#" id="watering">watering</a></label>
        </div>
        <div class="lg">
            <img src="assets/pestiside.jpg" alt="">
            <label for="fertilizer"><a href="#" id="pestiside">pestiside</a></label>
        </div>
        
    </div>
    <br>
        <div class="content">

            <form action="save_expense.php" method="post">
                <label for="name">Land Preparation</label>
                <label for="name">Expense Name:</label>
                <select name="name" required>
                    <option value="seeds">Tractor</option>
                    <option value="prepare">Laber</option>
                    <option value="othor"><button>Add Othor</button></option>
                </select><br>
                    
                <label for="quantity">Quantity:</label>
                <input type="text" name="quantity" required><br>

                <label for="price">Price per Unit:</label>
                <input type="text" name="price" required><br>

                <label for="date">Date:</label>
                <input type="date" name="date" required><br>
                
                <input type="hidden" name="farm_id" value="">
                <input type="submit" value="Save Expense">
            </form>
            <!-- <script src="js/script2.js"></script> -->
        </div>
    </div>
    <button class="logout-btn" onclick="redirectToLogin()">Logout</button>
    
    <?php
    echo '<script>
        // login for Land preparation

        let land_prep = document.querySelector("#land");
        let spray = document.querySelector("#spray");
        let fertilizer = document.querySelector("#fertilizer");
        let sowing = document.querySelector("#sowing");
        let harvesting = document.querySelector("#harvesting");
        let watering = document.querySelector("#watering");
        let pestiside = document.querySelector("#pestiside");


        land_prep.addEventListener("click", (e) => {
            let form = document.querySelector("form");
            form.innerHTML = `<label for="name">Land Preparation</label>
                <label for="name">Expense Name:</label>
                <select name="name" required>
                    <option value="seeds">Tractor</option>
                    <option value="prepare">Laber</option>
                    <option value="othor"><button>Add Othor</button></option>
                </select><br>
                    
                <label for="quantity">Quantity:</label>
                <input type="text" name="quantity" required><br>

                <label for="price">Price per Unit:</label>
                <input type="text" name="price" required><br>

                <label for="date">Date:</label>
                <input type="date" name="date" required><br>
                
                <input type="hidden" name="farm_id" value="">
                <input type="submit" value="Save Expense">`
        });

        // prepare loginc for the Fertilizer
        spray.addEventListener("click", (e) => {
        let form = document.querySelector("form");
        form.innerHTML = `<label for="name">Spraying</label>
            <label for="name">Expense Name:</label>
            <select name="name" id="options"required>
                <option value="Labour">Labour</option>
                <option value="Tractor">Tractor</option>
                <option value="Pestiside">Pestiside</option>
                <option value="Herbiside">Herbiside</option>
                <option value="insectiside">insectiside</option>
                <option value="othor"><button>Add Othor</button></option>
            </select><br>

            <label for="p/h/i">Name of pestiside/herbi../insecti..:</label>
            <input type="text" name="p/h/i" required><br>

            <div class="two_col"> 
                <div id="col">
                    <label for="quantity">Quantity:</label>
                    <input type="text" name="quantity" required><br>
                </div>
                <div id="col">
                    <label for="name">Unit</label>
                    <select name="unit" required>
                        <option value="mililiter">mililiter</option>
                        <option value="liter">liter</option>
                        <option value="gram">gram</option>
                        <option value="kg">kg</option>
                    </select><br>
                </div>
            </div>

            <label for="price">Price per Unit:</label>
            <input type="text" name="price" required><br>

            <label for="date">Date:</label>
            <input type="date" name="date" required><br>
            
            <input type="hidden" name="farm_id" value="">
            <input type="submit" value="Save Expense">`
        });

        fertilizer.addEventListener("click", (e) => {
        let form = document.querySelector("form");
        form.innerHTML = `<label for="name">Fertilizer</label>
            <label for="name">Expense Name:</label>
            <select name="name" id="options"required>
                <option value="Labour">Labour</option>
                <option value="Tractor">Tractor</option>
                <option value="Fertilizer">Fertilizer</option>
                <option value="othor"><button>Add Othor</button></option>
            </select><br>

            <label for="fertilizer_name">Name of Fertilizer:</label>
            <input type="text" name="fertilizer_name" required><br>

            <div class="two_col"> 
                <div id="col">
                    <label for="quantity">Quantity:</label>
                    <input type="text" name="quantity" required><br>
                </div>
                <div id="col">
                    <label for="name">Unit(KG)</label>
                    <select name="unit" required>
                        <option value="kg">kg</option>
                    </select><br>
                </div>
            </div>

            <label for="price">Price per Unit:</label>
            <input type="text" name="price" required><br>

            <label for="date">Date:</label>
            <input type="date" name="date" required><br>
            
            <input type="hidden" name="farm_id" value="">
            <input type="submit" value="Save Expense">`
        });

        sowing.addEventListener("click", (e) => {
        let form = document.querySelector("form");
        form.innerHTML = `<label for="name">Sowing</label>
            <label for="name">Expense Name:</label>
            <select name="name" id="options"required>
            <option value="seed">seed</option>
                <option value="Labour">Labour</option>
                <option value="Tractor">Tractor</option>
                <option value="othor"><button>Add Othor</button></option>
            </select><br>

            <label for="seed_name">Name of seed:</label>
            <input type="text" name="seed_name" required><br>

            <div class="two_col"> 
                <div id="col">
                    <label for="quantity">Quantity:</label>
                    <input type="text" name="quantity" required><br>
                </div>
                <div id="col">
                    <label for="name">Unit</label>
                    <select name="unit" required>
                        <option value="kg">kg</option>
                        <option value="gram">gram</option>
                        <option value="pack">pack</option>
                    </select><br>
                </div>
            </div>

            <label for="price">Price per Unit:</label>
            <input type="text" name="price" required><br>

            <label for="date">Date:</label>
            <input type="date" name="date" required><br>
            
            <input type="hidden" name="farm_id" value="">
            <input type="submit" value="Save Expense">`
        });

        harvesting.addEventListener("click", (e) => {
        let form = document.querySelector("form");
        form.innerHTML = `<label for="name">Harvesting</label>
            <label for="name">Expense Name:</label>
            <select name="name" id="options"required>
                <option value="Labour">Labour</option>
                <option value="Tractor">Tractor</option>
                <option value="Transport">Transport</option>
                <option value="othor"><button>Add Othor</button></option>
            </select><br>

            <label for="price">Price per Unit:</label>
            <input type="text" name="price" required><br>

            <label for="date">Date:</label>
            <input type="date" name="date" required><br>
            
            <input type="hidden" name="farm_id" value="">
            <input type="submit" value="Save Expense">`
        });

        watering.addEventListener("click", (e) => {
        let form = document.querySelector("form");
        form.innerHTML = `<label for="name">Watering</label>
            <label for="name">Expense Name:</label>
            <select name="name" id="options"required>
                <option value="Labour">Labour</option>
                <option value="Tractor">Tractor</option>
                <option value="Transport">Transport</option>
                <option value="othor"><button>Add Othor</button></option>
            </select><br>

            <label for="price">Price per Unit:</label>
            <input type="text" name="price" required><br>

            <label for="date">Date:</label>
            <input type="date" name="date" required><br>
            
            <input type="hidden" name="farm_id" value="">
            <input type="submit" value="Save Expense">`
        });
    </script>';
    ?>
</body>

</html>


