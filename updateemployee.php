<?php

  
    $connection = pg_connect( "host=ec2-23-22-156-110.compute-1.amazonaws.com port=5432 dbname=di7aeib8u6nea user=fsyucftmxyxvap password=f70cb55c9e989f35c4b931575b5f28b248be49091d6f143fe3ae3d48bc3f093f"
);
    if(!$connection)
    {
        die("Connection failed: ".pg_last_error());
    }

    $empid = filter_input(INPUT_POST,'empid');

    $query = "select * from employee where employeeId='$empid'";
    $primary = pg_query($connection,$query);
    $rows = pg_num_rows($primary);
    if($rows == 0){
        echo "<script>alert('There is no such ID!!!');</script>";
        die();
    }
    $result = pg_query($connection,$query);
?>
<html>
<head>
            <meta charset="utf-8">
            <title>Update Employee Details</title>
            <link rel="stylesheet" type="text/css" href="css/updateemployee.css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header>
            <div class="container">
                <nav>
                    <ul>
                            <li><a href="addemployee.php">Add New Employee</a></li>
                            <li class="active"><a href="updateemployee.html">Update Employee</a></li>
                            <li><a href="deleteemployee.html">Delete Employee</a></li>
                            <li>View
                            <ul>
                                <li><a href="employeedetails.php">View All Employees</a></li>
                                <li><a href="customerdetails.php">View All Customers</a></li>
                                <li><a href="departmentfilter.php">View All Departments</a></li>
                                <li><a href="filter.php">Filter Customers</a></li>
                            </ul>
                            </li>
                            <li><a href="homepage.html">Log Out</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    <section id="details">
    <table align="center" border="1px" style="width: 10px; line-height:40px;">
            <tr>
                <th colspan="7"><h2>Update Employee <?php echo $empid ?> Details</h2></th>
            </tr>
            <tr style="width: 50px;">
                    <th>EmployeeId</th>
                    <th>Name</th>
                    <th>Department No.</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Address</th>
                    <th>Salary</th>
            </tr>
    
    <?php
    while($rows = pg_fetch_assoc($result))
    {
    ?>
    <form method="Post" action="update1.php">
    <tr>
        <td><input type="number" value="<?php echo $rows['employeeid'] ?>" name="empid"></td>
        <td><input type="text" value="<?php echo $rows['name'] ?>" name="nam"></td>
        <td><input type="text" value="<?php echo $rows['departmentno'] ?>" name="dep"></td>
        <td><input type="text" value="<?php echo $rows['gender'] ?>" name="gen"></td>
        <td><input type="text" value="<?php echo $rows['dob'] ?>" name="dob"></td>
        <td><input type="text" value="<?php echo $rows['address'] ?>" name="add"></td>
        <td><input type="number" value="<?php echo $rows['salary'] ?>" name="sal"></td>  
    </tr>
        <input id="update" type="submit" name="submit" value="update">
    </form>
    <?php
    }

    ?>
    </section>
    </body>
</body>
<html>
