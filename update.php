<!--Name: Avijeet Adhikari -->
<html>
<head>
<title> Update Instructor</title>
</head>
<body>
<?php
    $host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="DOCTORAL";
    $StudentId="";
    //Create connection
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
    if (mysqli_connect_error()){
        die('Connect Error ('. mysqli_connect_errno() .') '
            . mysqli_connect_error());
        
    }
    else
    {
            $StudentId=filter_input(INPUT_POST,'StudentId');
            $query="DELETE FROM SELFSUPPORT WHERE STUDENTId='$StudentId'";
            if($conn->query($query))
            {
                $query= "UPDATE INSTRUCTOR SET INSTRUCTOR.Type='NTT'
                WHERE INSTRUCTOR.Type='Adjunct'";
                if($conn->query($query))
                {
                    echo "Instructor type has been updated successfully.";
                }
            
            else
            {
                echo "Error: ".$query."
                ".$conn->error;
            }
            $conn->close();
        }
    }
