<html>
<body>
<?php
$conn = new mysqli('localhost','root','');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
mysqli_select_db($conn,"sample_db");
 

$sql="INSERT INTO sample_table_t (username, email, dob, age, gender, phone, pin, blood, symp) VALUES ('$_POST[username]','$_POST[email]','$_POST[dob]','$_POST[age]','$_POST[gender]','$_POST[phone]','$_POST[pin]','$_POST[blood]','$_POST[symp]')";
 if ($conn->query($sql) === TRUE) {
    echo "\n<br>New record created and validated successfully";
} else {
    echo "\nError: " . $sql . "<br>" . $conn->error;
}
 
$sql1="select * from pincode where pin like '%$search%'";

        $res=$conn->query($sql1);

        while($row=$res->fetch_assoc()){
            echo "<br>You can visit your nearest hospital for furthur details.This data will be sent to that hospital once checked.";
            echo '<br><br>Hospital Name    :  '.$row["hos_name"];
            echo '<br><br>Hospital Address :  '.$row["address"];
            echo '<br><br>Hospital Number  :  '.$row["numb"];
        }

mysqli_close($conn);
?>
</body>
</html>