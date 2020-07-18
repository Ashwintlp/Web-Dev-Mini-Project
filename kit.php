<?php


    $connection = pg_connect( "host=ec2-23-22-156-110.compute-1.amazonaws.com port=5432 dbname=di7aeib8u6nea user=fsyucftmxyxvap password=f70cb55c9e989f35c4b931575b5f28b248be49091d6f143fe3ae3d48bc3f093f"
);

    if(!$connection)
    {
        die("Connection failed: ".pg_last_error());
    }

    session_start();

    $username=$_SESSION['user'];
    $department=$_SESSION['dep'];

    $query = "Select name from customer where username='$username';";
    $result = pg_query($connection,$query);
    $name = pg_fetch_assoc($result);


    $kit = filter_input(INPUT_POST,'kit');
    $brand = filter_input(INPUT_POST,'brand');
    $size = filter_input(INPUT_POST,'size');
    $price = filter_input(INPUT_POST,'price');


       

        $insertRecordQuery = "INSERT into kitt (username, departmentno, kit, brand, size, price) 
        values ('$username', '$department','$kit', '$brand', '$size', '$price');";
        $result2 = pg_query($connection,$insertRecordQuery);

        if($result2){
            $query = "INSERT into buys(username,departmentno) values ('$username','$department');";
            $result1 = pg_query($connection,$query);
            echo "<script>alert('Kit purchased sucessfully')</script>";
            ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Thank You!!</title>
        <link rel="stylesheet" type="text/css" href="css/customerformstyle.css">
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
                    <ul style="margin-top:-33px;margin-left:22px;">
                           
                            <li style="text-transform:uppercase;"><?php echo $name['name']; ?></li>
                            <li><a href="customerlogin.php">Sign Out</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <section>
            <p style="text-align:center;font-size:20px;">Thank You <?php echo $name['name']; ?> for purchasing Kit from our company.The kit will be shipped to your address within 2 days.</p>
            <br>
            <p style="text-align:center;font-size:20px;">Want to purchase kit again?<br> Click here <a href="sportsdep.php">Purchase again</a></p>
        </section>
</body>
</html>
<?php

        }
        else{
            echo "<script>alert('Some problem in server.Please retry..!!')</script>";
            ?>
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="utf-8">
                    <title>Oops!!</title>
                    <link rel="stylesheet" type="text/css" href="css/customerformstyle.css">
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
                                <ul style="margin-top:-33px;margin-left:22px;">
                                       
                                        <li style="text-transform:uppercase;"><?php echo $name['name']; ?></li>
                                        <li><a href="history.php">Purchase History </a></li>
                                        <li><a href="customerlogin.php">Sign Out</a></li>
                                </ul>
                            </nav>
                        </div>
                    </header>
                    <section>
                        <p style="text-align:center;font-size:20px;color:red;">Sorry <?php echo $name['name']; ?> some error occured while purchasing kit.
                        Please make sure you have generated price.</p>
                        <p style="text-align:center;font-size:20px;">Want to purchase kit again?<br> Click here <a href="sportsdep.php">Purchase again</a></p>
                        <br>
                        
                    </section>
            </body>
            </html>
            <?php
            
        }

     

    $closeConnection = pg_close($connection);

    
?>


