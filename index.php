<!DOCTYPE html>
<html>
    <head>
	<title>ATN Shop</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style type="text/css">
            body {
                    background-color: gray;
                    font-family: "Lato", sans-serif
            }
        </style>
    </head>
    <body>
    <?php
    require_once './functions.php';
    $query = "SELECT iId, iName, iDescription, iPrice, iStatus, iSize, iImage FROM Item ";
    $result = queryMysql($query);
    $error = $msg = "";
    if (!$result){
        $error = "Couldn't load data, please try again.";
    }
    $query1 = "SELECT cId, cName, cDescription from Catalogue";
    $result1 = queryMysql($query1);
    $error1 = $msg1 = "";
    if (!$result1){
        $error1 = "Couldn't load data, please try again.";
    }
    $querylo = "SELECT cId, cName, cDescription from Catalogue";
    $resultlo = queryMysql($querylo);
    $errorlo = $msglo = "";
    if (!$resultlo){
      $errorlo = "Couldn't load data, please try again.";
    }
    ?>
        <div class="w3-top">
            <div class="w3-bar w3-black w3-card">
                <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
                    <div class="w3-tag w3-large w3-brown w3-left">ATN Shop</div>
                    <a href="#" class="w3-bar-item w3-button ">Home</a>
                    <div class="w3-dropdown-hover">
                        <a href="#menu" class="w3-button">Menu</a>
                            <div class="w3-dropdown-content ">
                            <?php
                            while ($rowc = mysqli_fetch_array($result1)) {
                                $Name = $rowc[1];
                                echo "<div class = 'w3-button w3-bar-item'>";
                                echo "<a href='#$Name'>$Name</a></div>";
                            }
                            ?>
                </a>
                            </div>
                    </div>
                <a href="#about" class="w3-bar-item w3-button w3-hide-small">About</a>
                <a href="#contact" class="w3-bar-item w3-button w3-hide-small">Contact</a>
                <a href='./login.php' class= "w3-bar-item w3-button w3-hide-small w3-right" >Admin</a>
            <div class="w3-dropdown-hover w3-hide-small"></div>
            </div>
        </div>
        <div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
          <a href="#menu" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Menu</a>
          <a href="#about" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">About</a>
          <a href="#contact" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Contact</a>
        </div>
        <!-- picture home-->
        <div class="w3-content" style="max-width:2000px;margin-top:46px">
            <div class="mySlides w3-display-container w3-center">
                <img src="onepiece.jpg" alt="onepiecephoto" style="width:60%">
                <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                </div>
            </div>
            <div class="mySlides w3-display-container w3-center">
                <img src="pikachu.jpg" alt="pikachu photo" style="width:50%">
                <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                </div>
            </div>
            <div class="mySlides w3-display-container w3-center">
                <img src="naruto.jpg" alt="naruto photo" style="width:50%">
                <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                </div>
            </div>
        </div>
        <!--Slideshow-->
        <script>
            var myIndex = 0;
            carousel();

            function carousel() {
                var i;
                var x = document.getElementsByClassName("mySlides");
                for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
                }
                myIndex++;
                    if (myIndex > x.length) {myIndex = 1}    
                        x[myIndex-1].style.display = "block";  
                        setTimeout(carousel, 2000); // Change image every 2 seconds
            }

            function loadDes(id, name)
            {
                var des = document.getElementById(id).innerHTML;
                document.getElementById("itemDes").innerHTML = des;
                document.getElementById("itemName").innerHTML = name;
                document.getElementById("1detail").style.display = 'block';
            }
        </script>
        <!--Home-->       
                <div class="w3-black" id="menu">
                    <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
                        <h2 class="w3-wide w3-center">Menu</h2>
        <?php
            while ($rowlo = mysqli_fetch_array($resultlo)) {
                echo"<tr>";
                $Name = $rowlo[1];
                $cDescription = $rowlo[2];
                echo "<div id='$Name'></div>";
                echo "<div class='w3-container w3-content w3-padding-64' style='max-width:800px'></div>";
                echo "<h2 class=\"w3-wide\" >$Name</a></h2>";
                echo "<p>$cDescription</p>";
                
                $query = "SELECT * FROM Item WHERE catalogueId = ".$rowlo[0];
                $result = queryMysql($query);
                if ($result){
                    echo "<table>";
                    echo "<tr>";
                    $cnt = 0;
                    while ($item = mysqli_fetch_array($result)) {
                        $cnt++;
                        echo "<td>";
                        echo "<div width='228px' height='300px'>";
                        $iId = $item['iId'];
                        $iName = $item['iName'];
                        $iDescription = $item['iDescription'];
                        $iPrice = $item['iPrice'];
                        $iStatus = $item['iStatus'];
                        $iSize = $item['iSize'];
                        $iImage = $item['iImage'];             

                        echo "<div style='display:none' id='itemDes$iId'>";
                        echo "<table>";        
                        echo "<tr><td><image src='./images/item/$iImage'/ style='width:100%'></td>";
                        echo "<td>";
                        echo "<h3 class='w3-opacity'>Price: $iPrice$</h3>";
                        echo "<div style='height: 350px'>$iDescription</div>";
                        echo "</td></tr></table></div>";
                        echo "<div class=\"w3-row-padding w3-padding-32\" style=\"margin:0 -16px\">";
                        echo "<div class=\"w3-margin\">";
                        echo "<img src='./images/item/" . $iImage . "' width='250px' height='250px' class='w3-hover-opacity'>";
                        echo "<div class='w3-container w3-white'>";
                        echo "<div class = \"w3-center\">";
                        echo "<p><b>$iName</b></p>";
                        echo "<div w3-opacity>Price: $iPrice$</div>";
                        echo "<br>";
                        echo "<br>";
                        echo "<button class=\"w3-button w3-black w3-margin-bottom\" onclick=\"document.getElementById('buyModal').style.display='block'\">Buy Tickets</button>";
                        echo "<button class=\"w3-button w3-black w3-margin-bottom\" onclick=\"loadDes('itemDes$iId', '$iName')\">View</button>";
                        echo "<br>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</td>";
                        if($cnt % 3 == 0)
                        {
                            echo "</tr><tr>";
                        }                  
                    }
                    echo "</tr>";
                    echo "</table>";
                }
            }
        ?>
                    </div>
                </div>
            </div>
        </div>
               
        <div id="buyModal" class="w3-modal">
        <div class="w3-modal-content w3-animate-top w3-card-4">
            <header class="w3-container w3-black w3-center w3-padding-32"> 
            <span onclick="document.getElementById('buyModal').style.display='none'" class="w3-button w3-black w3-xlarge w3-display-topright">×</span>
            <h2 class="w3-wide"><i class="fa fa-suitcase w3-margin-right w3-black"></i>Buy</h2>
            </header>
        <div class="w3-container">
        <p><label><i class="fa fa-shopping-cart"></i>Figure</label></p>
        <input class="w3-input w3-border" type="text" placeholder="How many?">
        <p><label><i class="fa fa-user"></i> Send To</label></p>
        <input class="w3-input w3-border" type="text" placeholder="Enter email">
        <button class="w3-button w3-block w3-black w3-padding-16 w3-section w3-right">PAY <i class="fa fa-check"></i></button>
        <button class="w3-button w3-red w3-section" onclick="document.getElementById('buyModal').style.display='none'">Close <i class="fa fa-remove"></i></button>
        </div>
            </div>
        </div>
<!--view--> 
        <div id="1detail" class="w3-modal">
            <div class="w3-modal-content w3-animate-top w3-card-4">
                <header class="w3-container w3-gray w3-center"> 
                    <span onclick="document.getElementById('1detail').style.display='none'" 
                    class="w3-button w3-teal w3-large w3-display-topright w3-gray">×</span>
                    <h2 class="w3-wide"><i class="w3-margin-right" id="itemName"></i></h2>
                </header>
                    <div class="w3-half w3-left"></div>
                    <div class="w3-container" style="color:black" id="itemDes"></div>
            </div>
        </div>
            <!-- orderdetail-->
        <div id="orderdetail" class="w3-modal">
            <div class="w3-modal-content w3-animate-top w3-card">
                <header class="w3-container w3-gray w3-center"> 
                  <span onclick="document.getElementById('orderdetail').style.display='none'" 
                  class="w3-button w3-teal w3-large w3-display-topright w3-gray">×</span>
                  <h2 class="w3-wide"><i class=" w3-margin-right"></i> Order </h2>
                </header>
                <div class="w3-container">
                    <p style="color: black">Sort</p>
                        <input class="w3-input w3-border" type="text" placeholder="Sort?">
                    <p style="color: black">Sent To</p>
                        <input class="w3-input w3-border" type="text" placeholder="Enter Address">
                        <button class="w3-button w3-block w3-gray w3-padding-16 w3-section w3-right">PAY <i class="fa fa-check"></i></button>
                </div>
            </div>
        </div>
        </div>
        <!--about-->
        <div class="w3-gray" id="about">
            <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="about">
                <h2 class="w3-wide w3-center">About</h2>
                <br>
                <div class="w3-col m6 w3-padding-large w3-hide-small">
                    <img src="Minato.jpg" class="w3-round w3-image w3-opacity-min" alt="coffee beans" width="302" height="218">
                </div>
                <p>WHAT IS FIGURE?</p>
                    <p>Figure is a model, a statue, any 3D product that reproduces a character in a movie, story, game, or drawing.</p>
                    <p>Usually figure bears the shape of a human, sometimes a beast, a god, a goblin, a monster or even an alien creature ... any character thought of by the artist, sculpted into 3D called the figure.</p>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="w3-col m6 w3-padding-large w3-hide-small">
                    <img src="kiritoasuna.jpg" class="w3-round w3-image w3-opacity-min" alt="coffee cup" width="302" height="218">
                </div>
                <p>WHAT IS JAPAN FIGURE?</p>
                    <p>These are figures created by Japanese artists, illustrating, creating and finishing in Japan.</p>
                    <p>Because of being born in Japan, it is obvious that the Japan figure has Japanese culture, from Anime, Manga, Game, Light novel, J-pop to Virtual Singer and so on.</p>
                    <p>With Japanese technology and a strictly supervised production process, the figure products are very well-executed, sharp details, vivid colors, precise expressions like the original character have satisfied many fans. fans all over the world. So even though "Made in China" is still Japanese.</p>
                <br>
            </div>
        </div>
        <!-- contact -->
       <div class="w3-black" id="contact">
            <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
                <h2 class="w3-wide w3-center">Contact</h2>
                    <div class="w3-row w3-padding-32">
                    <div class="w3-col m6 w3-large w3-margin-bottom">
                        <i class="fa fa-map-marker" style="width:30px"></i>Ha Noi, Vietnam<br>
                        <i class="fa fa-phone" style="width:30px"></i> Phone: +84751561621<br>
                        <i class="fa fa-envelope" style="width:30px"> </i> Email: atnshop@gmail.com<br>
                    </div>
                    <div class="w3-col m6">
                    <form action="/action_page.php" target="_blank">
                        <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                            <div class="w3-half">
                                <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
                            </div>
                            <div class="w3-half">
                                <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
                            </div>
                        </div>
                    <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message">
                    <button class="w3-button w3-white w3-section w3-right" type="submit">SEND</button>
                    </form>
                    </div>
                    </div>
            </div>
      </div>
      <footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-hide-small">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <div class="copyright_text copyright_col w3-center">Copyright © 2018 The ATN Shop. All rights reserved.</div>
    </body>
</html>