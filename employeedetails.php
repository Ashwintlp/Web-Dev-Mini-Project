<?php

  
    $connection = pg_connect( "host=ec2-23-22-156-110.compute-1.amazonaws.com port=5432 dbname=di7aeib8u6nea user=fsyucftmxyxvap password=f70cb55c9e989f35c4b931575b5f28b248be49091d6f143fe3ae3d48bc3f093f"
);

    if(!$connection)
    {
        die("Connection failed: ".pg_last_error());
    }


    $query = "select * from employee";
    $result = pg_query($connection,$query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Employee Details</title>
    <link rel="stylesheet" type="text/css" href="css/employeedetailsstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <ul>
                        <li><a href="addemployee.php">Add New Employee</a></li>
                        <li><a href="updateemployee.html">Update Employee</a></li>
                        <li><a href="deleteemployee.html">Delete Employee</a></li>
                        <li>View
                        <ul>
                            <li class="active"><a href="employeedetails.php">View All Employees</a></li>
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
    <table align="center" border="1px" style="width: 1340px; line-height:40px;">
            <tr>
                <th colspan="7"><h2>Employee Details</h2></th>
            </tr>
            <tr style="width: 500px;">
                    <th>Employee Id</th>
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
    <tr align="center">
        <td><?php echo $rows['employeeid'] ?></td>
        <td><?php echo $rows['name'] ?></td>
        <td><?php echo $rows['departmentno'] ?></td>
        <td><?php echo $rows['gender'] ?></td>
        <td><?php echo $rows['dob'] ?></td>
        <td><?php echo $rows['address'] ?></td>
        <td><?php echo $rows['salary'] ?></td>
    </tr>
    <?php
    }
    ?>
    </section>

</body>
</html>



