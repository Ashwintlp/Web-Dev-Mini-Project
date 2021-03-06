<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Delete Employee Details</title>
    <link rel="stylesheet" type="text/css" href="css/deleteemployeestyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <ul>
                        <li><a href="addemployee.php">Add New Employee</a></li>
                        <li><a href="updateemployee.html">Update Employee</a></li>
                        <li class="active"><a href="deleteemployee.html">Delete Employee</a></li>
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
            <h2 id="heading">Delete Employee Details</h2>
            <form action="deleteemployee.php" method="POST">
                <div>
                    <label>Enter Employee ID to delete</label>
                    <input type="text" name="empid">
                </div>
                <br>         
                <div>
                <input type="submit" name="delete" value="Delete">
                </div>
                <br>
            </form>
    </section>
</body>
</html>

<?php

    $empid = filter_input(INPUT_POST,'empid');


    if (!empty($empid))
    {
           
    $connection = pg_connect( "host=ec2-23-22-156-110.compute-1.amazonaws.com port=5432 dbname=di7aeib8u6nea user=fsyucftmxyxvap password=f70cb55c9e989f35c4b931575b5f28b248be49091d6f143fe3ae3d48bc3f093f"
);
            if(!$connection)
            {
                die("Connection failed: ".pg_last_error());
            }

            $sql="select * from employee where employeeId='".$empid."'";
            $primary = pg_query($connection,$sql);
            $rows = pg_num_rows($primary);
            if($rows == 0){
                echo "<script>alert('There is no such ID!!!');</script>";
                die();
            }

            $deleteRecordQuery = "delete from employee where employeeid='$empid'";
            if(pg_query($connection,$deleteRecordQuery))
            {
                echo "<script>alert('Record deleted successfully');</script>";
            }
            else
            {
                echo "<script>alert('There is no Employee Id to delete');</script>";
            }

            $closeConnection = pg_close($connection);
    }
    else
    {
        echo "<script>alert('Enter Employee Id to delete!!!');</script>";
    }
?>
