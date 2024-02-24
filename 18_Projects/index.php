<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
      * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }

      body {
        background-color: rgb(109, 187, 161);
      }

      .outerContainer{
        height: 400vh;
        width: 60vw;
        margin: auto;
      }

      /* design navbar */
      nav{
        height: 50px;
        width: 100%;
        border: 2px solid black;
        background: #767676;
      }

      ul{
        /* defult is 18px */
        height: 50px; 
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
      }
      ul li{
        list-style: none;
        color: black;
        font-size: 20px;
        font-weight: 700;
      }

      /* design container */
      .container{
        height: 100%;
        width: 100%;
        background: #959595;
        display: flex;
        /* justify-content: space-evenly; */
      }

      .content{
        height: 95%;
        width: 70%;
        background: #ffffff;
        overflow-y: scroll;
      }

      .sidebar{
        height: 50%;
        background: #ff7d7d;
        width: 30%;
        display: flex;
        flex-direction: column;
        /* justify-content: space-between; */
        justify-content: space-evenly;
        color: white;
      }

      .sidebar ul{
        /* background: #ffb9b9; */
        height: 250px;
        display: flex;
        align-items: flex-start;
        flex-direction: column;
      }

      .sidebar ul li{
        color: white;
      }

      /* design the card */
      .card{
        background: #292828;
        height: 35%;
        text-align: center;
        display: flex;
        flex-direction: column;
        gap: 10px;
        width: 95%;
        margin: auto;
      }
      
      .card img{
        height: 135px;
        width: 100%;
        background: #563a3a;
      }
      .line{
        height: 2px;
        width: 100%;
        color: #535353;
      }
    </style>
  </head>
  <body>
    <!-- crate the navbar -->
    <div class="outerContainer">
      <nav>
          <ul>
            <a href="index.php"><li>Home</li></a>
            <a href="index.php?Pagename=about"><li>About</li></a>
            <a href="index.php?Pagename=contact"><li>Contact Us</li></a>
          </ul>
      </nav>

      <!-- 2 dives 1 for content and 2nd for sidebar -->
      <div class="container">
        <div class="content">
          <?php
          print_r($_GET);
            if(!empty($_GET['Pagename'])){ // this check is forwhen we click Hamare pass search query me value to chahiye ki konsa page he aisa
              $PagesDirectry = 'DynamicWebPage'; // this give the bind kelel ahe ya folder madhe index.php, about.php, contact.php 
              $PageFolder = scandir($PagesDirectry,0); // This gives the file under the folder
              print_r($PageFolder);
              $Pagename = $_GET['Pagename']; // this is array  
              echo $Pagename;

              // step2> We don't requers the . and .. directory path's Then remove
              unset($PageFolder[0],$PageFolder[1]);
              print_r($PageFolder); // [0] and [1] is remove

              // step 3> check that apna array file present is match with Pagename or not
              if(in_array($Pagename.'.inc.php',$PageFolder)){
                include($PagesDirectry.'/'.$Pagename.'.inc.php'); // then incluse this file content to show
                
              } // if there is wrong page name is enter to shoe the messeage as You are in wrong path

              // The value of $pagename is bhetail when we click on any Anchor tag then it redirected to the .this page which has Present in ( $_GET => (?search_Query))
              // *** IMP : The error of file is does no fetch from directory becuse i store thee index.php file and 2 othor in 1 folder But this create the seperatly Samjhe....
            }

            // step 2 : accese the page content to show
            // this is in if scope from 126 line no
          ?>
        </div>
        <div class="sidebar">
          <h3>Latest Movie Links</h3>
          <ul>
            <li>Action movie</li>
            <li>Horor movie</li>
            <li>Drama movie</li>
            <li>Comedy movie</li>
          </ul>
         <div class="card">
              <h3>Today's Top Moview</h3>
              <div class="line"></div>
              <img src="abc" alt="" />
              <p class="line"></p>
              <h3>V for Vandetta</h3>
              <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint
                totam, obcaecati tempore dolorum beatae quaerat non facilis
                voluptatum eos ex. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam ipsam sed, velit placeat unde atque fuga animi reiciendis perspiciatis reprehenderit doloribus obcaecati amet sint dolores, eaque harum! Facere, incidunt iste!
              </p>
            </div>
        </div>
      </div>
    </div>
  </body>
</html>
