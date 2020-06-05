<!--Name: Avijeet Adhikari -->

<html>
<head>
<title> Update Instructor</title>
</head>
<body>
<table>
    <tr>
        <th>StudentId </th>
        <th>FName </th>
        <th>Lname </th>
        <th>StSem</th>
        <th>StYear </th>
        <th>Supervisor </th>
        <th>MId </th>
        <th>PassDate </th>
</tr>
<tr>
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
    $MId="";
    $PassDate="";
    //Create connection
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
    if (mysqli_connect_error()){
        die('Connect Error ('. mysqli_connect_errno() .') '
            . mysqli_connect_error());
        
    }
    else
    {
        $StudentId=filter_input(INPUT_POST,'StudentId');
        $FName =filter_input(INPUT_POST,'FName');
        $Lname=filter_input(INPUT_POST,'Lname');
        $StSem=filter_input(INPUT_POST,'StSem');
        $StYear=filter_input(INPUT_POST,'StYear');
        $Supervisor=filter_input(INPUT_POST,'Supervisor');
        $MId=filter_input(INPUT_POST,'MId');
        $PassDate=filter_input(INPUT_POST,'PassDate');
        
       
        $result=$conn->query ('SELECT PHDSTUDENT.StudentId,PHDSTUDENT.FName,PHDSTUDENT.Lname,PHDSTUDENT.StSem,PHDSTUDENT.StYear,PHDSTUDENT.Supervisor,MILESTONEPASSED.MId,MILESTONEPASSED.PassDate FROM PHDSTUDENT LEFT JOIN MILESTONEPASSED ON PHDSTUDENT.StudentId=MILESTONEPASSED.StudentId');
        while ($row =$result->fetch_assoc())
        {
            ?>
            <tr>
                <td><?php echo $row['StudentId']; ?></td>
                <td><?php echo $row['FName']; ?></td>
                <td><?php echo $row['Lname']; ?></td>
                <td><?php echo $row['StSem']; ?></td>
                <td><?php echo $row['StYear']; ?></td>
                <td><?php echo $row['Supervisor']; ?></td>
                <td><?php echo $row['MId']; ?></td>
                <td><?php echo $row['PassDate']; ?></td>
                </tr>

                <?php
            }
         $conn->close();
    }
    ?>
</tr>
</table>




    

