<html>
<body>
<?php

$conn = new mysqli('localhost','root',''); 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 
mysqli_select_db($conn,"sample_db");
$search = $_POST['pin'];
$sql="INSERT INTO sample_table (username, email, dob, age, gender, phone, pin, blood, symp, q1, q2, q3, q4, q5, q6) VALUES ('$_POST[username]','$_POST[email]','$_POST[dob]','$_POST[age]','$_POST[gender]','$_POST[phone]','$_POST[pin]','$_POST[blood]','$_POST[symp]','$_POST[q1]','$_POST[q2]','$_POST[q3]','$_POST[q4]','$_POST[q5]','$_POST[q6]')";
 if ($conn->query($sql) === TRUE) {
    echo "\n<br>New record created and validated successfully<br><br>";
} else {
    echo "\nError: " . $sql . "<br>" . $conn->error;
}
mysqli_select_db($conn,"sample_db");
$sql1="select * from pincode where pin like '%$search%'";

        $res=$conn->query($sql1);
        while($row=$res->fetch_assoc()){
            echo "<br>You can visit your nearest hospital for furthur details.This data will be sent to that hospital once checked.<br><br>";
            echo '<br><br><b>Hospital Name    :  </b>'.$row["hos_name"];
            echo '<br><br><b>Hospital Address :  </b>'.$row["address"];
            echo '<br><br><b>Hospital Number  :  </b>'.$row["numb"];
        }


$arr = array( "a"=>"ABCD1234F", "b"=>"FHDG3836U", "c"=>"TSUD7363N", "d"=>"NEVE7612R" ); 
$key = array_rand($arr); 
echo"<br><i><b>Want to earn rewards? Feeling Lucky? Copy the code given below and use it in the Rewards column to find out!</b></i><br><br><br>";
echo "<b>$arr[$key]"; 
   
mysqli_close($conn);
?>
</body>
</html>