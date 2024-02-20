<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Records</title>
    <style>
        table{
            width: 70%;
            margin: auto;
            font-family: Arial, Helvetica, sans-serif;
        }
        table, tr, th, td{
            border: 1px solid #d4d4d4;
            border-collapse: collapse;
            padding: 12px;
        }
        th, td{
            text-align: left;
            vertical-align: top;
        }
        tr:nth-child(even){
            background-color: #e7e9eb;
        }
    </style>
<body>

<?php
    //storing database details in variables.
    //change this with your own values.
    $hostname = "10.0.2.247";
    $username = "iwan";
    $password = "XXX";
    $dbname = "F1";

    //creating connection to database
    $con = mysqli_connect($hostname, $username, $password, $dbname);
    //checking if connection is working or not
    if(!$con)
    {
        die("<p><center>Connection failed! <br></center></p>" . mysqli_connect_error());
    }
    else
    {
        echo "<p><center>Successfully Connected! <br></center></p>";
    }

    //Output Form Entries from the Database
    $sql = "SELECT First_Name, Last_Name FROM drivers";
    //fire query
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0)
    {
       echo '<table> <tr> <th> First Name </th> <th> Last Name </th> </tr>';
       while($row = mysqli_fetch_assoc($result)){
         // to output mysql data in HTML table format
           echo '<tr > <td>' . $row["First_Name"] . '</td>
           <td>' . $row["Last_Name"] . '</td>';
       }
       echo '</table>';
    }
    else
    {
        echo "0 results";
    }
    // closing connection
    mysqli_close($con);

?>
</body>
</html>
