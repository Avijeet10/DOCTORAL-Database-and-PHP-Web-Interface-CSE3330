
<!--Name: Avijeet Adhikari -->
<html>
<head>
<title> DELETE PHDStudent</title>
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
        if(isset($_POST['DELETE']))
        {
            $StudentId=filter_input(INPUT_POST,'StudentId');
            $query="DELETE FROM SELFSUPPORT WHERE STUDENTId='$StudentId'";
        if($conn->query($query))
        {
            $query= "DELETE FROM PHDSTUDENT WHERE STUDENTId='$StudentId'";
            if($conn->query($query))
            {
                echo "Student is deleted successfully";
            }
            else
            {
                echo "Error: ".$query."
                ".$conn->error;
            }
        }
       
        else
        {
            echo "Error: ".$query."
            ".$conn->error;
        }
            $conn->close();
        }
        
    }

    ?>
    
    <html>
    <head>
    <title>Insert PHDStudent </title>
    </head>
    <body>
    <form action="" method="post">
    <input type="text" name="StudentId" placeholder="StudentId" value="<?php echo $StudentId;?>"> <br><br>
<div>
    <input type="submit" name="DELETE" Value="DELETE">
</div>
</form>
</body>
</html>
