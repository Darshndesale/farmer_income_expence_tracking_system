// login for Land preparation

let land_prep = document.querySelector("#land");
let spray = document.querySelector("#spray");
let fertilizer = document.querySelector("#fertilizer");
let sowing = document.querySelector("#sowing");
let harvesting = document.querySelector("#harvesting");
let watering = document.querySelector("#watering");
let pestiside = document.querySelector("#pestiside");

// just testing
// console.log(document.querySelector("form>select"));
// let op = document.createElement("option");
// op.innerHTML = "Pavada";
// document.querySelector("form>select").append(op);
// op.setAttribute("value", `${op.innerText}`);

land_prep.addEventListener("click", (e) => {
  console.log("hi land");

  let form = document.querySelector("form");
  console.log(form);
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
    <label for="date">Date:</label>
    <input type="date" name="date" required><br>
    
    <input type="hidden" name="farm_id" value="<?php echo $_SESSION['farmID']; ?>">
    <input type="submit" value="Save Expense">`
});

// prepare loginc for the Fertilizer
spray.addEventListener("click", (e) => {
  let form = document.querySelector("form");
  form.innerHTML = `<label for="name">Spraying</label>
    <label for="name">Expense Name:</label>
    <select name="name" required>
        <option value="seeds">Labour</option>
        <option value="prepare">Pestiside</option>
        <option value="prepare">Herbiside</option>
        <option value="prepare">insectiside</option>
        <option value="othor"><button>Add Othor</button></option>
    </select><br>

    <label for="quantity">Quantity:</label>
    <input type="text" name="quantity" required><br>

    <label for="price">Price per Unit:</label>
    <input type="text" name="price" required><br>

    <label for="date">Date:</label>
    <input type="date" name="date" required><br>
    
    <input type="hidden" name="farm_id" value="{<?php echo $_SESSION['farmID']; }?>">
    <input type="submit" value="Save Expense">`
});



