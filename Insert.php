<!--Name: Avijeet Adhikari-->

<html>
<head>
<title> Insert PHDStudent</title>
</head>
<body>
<?php
    $host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="DOCTORAL";
    $StudentId="";
    $FName="";
    $Lname="";
    $StSem="";
    $StYear="";
    $Supervisor="";
    //Create connection
  $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
    if (mysqli_connect_error()){
        die('Connect Error ('. mysqli_connect_errno() .') '
            . mysqli_connect_error());
        
    }
    else
    {
        if(isset($_POST['I']))
        {
            $StudentId=filter_input(INPUT_POST,'StudentId');
            $FName =filter_input(INPUT_POST,'FName');
            $Lname=filter_input(INPUT_POST,'Lname');
            $StSem=filter_input(INPUT_POST,'StSem');
            $StYear=filter_input(INPUT_POST,'StYear');
            $Supervisor=filter_input(INPUT_POST,'Supervisor');
        
            $query="INSERT INTO PHDSTUDENT (StudentId,FName,Lname,StSem,StYear,Supervisor) VALUES ('$StudentId','$FName','$Lname','$StSem','$StYear','$Supervisor')";
        if($conn->query($query))
        {
                $query= "INSERT INTO SELFSUPPORT (StudentId) VALUES ('$StudentId')";
            if($conn->query($query))
            {
                echo "New record is inserted successfully";
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
    <input type="text" name="FName" placeholder="FName" value="<?php echo $FName;?>"><br><br>
    <input type="text" name="Lname" placeholder="Lname" value="<?php echo $Lname;?>"><br><br>
    <input type="text" name="StSem" placeholder="StSem" value="<?php echo $StSem;?>"><br><br>
    <input type="number" name="StYear" placeholder="StYear" value="<?php echo $StYear;?>"><br><br>
    <input type="text" name="Supervisor" placeholder="Supervisor" value="<?php echo $Supervisor;?>"> <br><br>
<div>
    <input type="submit" name="I" Value="INSERT">
</div>
</form>
</body>
</html>
