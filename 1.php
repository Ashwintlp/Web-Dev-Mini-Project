<?php

    

    $connection = pg_connect( "host=ec2-23-22-156-110.compute-1.amazonaws.com port=5432 dbname=di7aeib8u6nea user=fsyucftmxyxvap password=f70cb55c9e989f35c4b931575b5f28b248be49091d6f143fe3ae3d48bc3f093f"
);

    if(!$connection)
    {
        die("Connection failed: ".pg_last_error());
    }

    session_start();
    $username=$_SESSION['user'];

    $query = "Select name from customer where username='$username';";
    $result = pg_query($connection,$sql);
    $name = pg_fetch_assoc($result);

    $closeConnection = pg_close($connection);
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cricket</title>
        <link rel="stylesheet" type="text/css" href="css/sportsstyle.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header>
            <div class="container">
                <div id="logo">
                    <img src="css/images/logo.jpg">
                </div>
                <nav>
                <img src="css/images/icon1.png">
                    <ul style="margin-top:-34px;margin-left:22px;">
                           
                            <li style="text-transform:uppercase;"><?php echo $name['Name']; ?></li>
                            <li><a href="#">Sign Out</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <section id="details">
            <div class="container">
                <form method="POST" action="kit.php">
                    <h2 id="heading" style="margin-left: 20em">CRICKET KIT</h2>
                     <div>
                        <label>Kit</label>
                        <select name="kit" style="width: 174px">
                            <option value="bat">Bat</option>
                            <option value="ball">Ball</option>
                            <option value="helmet">Helmet</option>
                            <option value="wicket">Wicket</option>
                            <option value="gloves">Gloves</option>
                            <option value="jersey">Jersey</option>
                        </select>
                    </div>
                    <br>
                     <div>
                        <label>Brand</label>
                        <select name="brand" style="width: 174px">
                            <option value="reebok">Reebok</option>
                            <option value="mrf">MRF</option>
                            <option value="nike">Nike</option>
                            <option value="spartan">Spartan</option>
                            <option value="adidas">Adidas</option>
                            <option value="puma">Puma</option>
                        </select>
                    </div>
                    <br>
                     <div>
                        <label>Size</label>
                        <select name="size" style="width: 174px">
                            <option value="kid">Kids</option>
                            <option value="adults">Adults</option>
                            <option value="experts">Experts</option>
                        </select>
                    </div>
                   <br>
                   <div>
                        <label>Price(rupees)</label>
                        <input type="number" name="price" id="price" readonly>
                   </div>
                   <br>
                   <div>
                    <button type="button" name="generate" onclick="myFunction()">Generate price</button>

                    <script>
                        function myFunction(){
                            document.getElementById("price").defaultValue = "1350";
                        }
                    </script>

                   </div>
                   <br>
                   <div>
                            <button name="submit">PURCHASE</button>   
                        <br><br>
                   </div>
                </form>
            </div>
        </section>
        <footer>
            AA Sports Company,Copyright &copy;2019
        </footer>
    </body>
</html>
