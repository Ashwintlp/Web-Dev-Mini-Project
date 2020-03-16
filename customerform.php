<?php
    session_start();

   
    $connection = pg_connect( "host=ec2-23-22-156-110.compute-1.amazonaws.com port=5432 dbname=di7aeib8u6nea user=fsyucftmxyxvap password=f70cb55c9e989f35c4b931575b5f28b248be49091d6f143fe3ae3d48bc3f093f"
);

    if(!$connection)
    {
        die("Connection failed: ".pg_last_error());
    }

    session_start();
    $username = filter_input(INPUT_POST,'username');
    $name = filter_input(INPUT_POST,'name');
    $gender = filter_input(INPUT_POST,'gender');
    $age = filter_input(INPUT_POST,'age');
    $doorno = filter_input(INPUT_POST,'doorno');
    $street = filter_input(INPUT_POST,'street');
    $city = filter_input(INPUT_POST,'city');
    $email = filter_input(INPUT_POST,'email');
    $mobile = filter_input(INPUT_POST,'mobile');
    
    $_SESSION['user']=$username;
    
    $insertRecordQuery = "INSERT into customer (username, name, gender, age, doorno, street, city, email, mobile) 
    values ('$username', '$name', '$gender','$age', '$doorno', '$street', '$city', '$email','$mobile');";
    $result = pg_query($connection,$insertRecordQuery);
     
    if($result)
    {
        
         header("location:sportsdep.php");
        
    }        
    else{
        echo "<script>alert('Username is already taken!!!');</script>";
        header("location:customerform.html");
        
    }
       
    $closeConnection = pg_close($connection);
?>
