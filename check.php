<html>
<body>
<?php

$conn = new mysqli('localhost','root',''); 
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 
 
mysqli_select_db($conn,"sample_db");
$search = $_POST['code'];
$arr = array( "a"=>"ABCD1234F", "b"=>"FHDG3836U", "c"=>"TSUD7363N", "d"=>"NEVE7612R" ); 
$key = array_rand($arr); 
if($arr[$key]==$search)
{
  echo "YOU HAVE WON!<br><br>Your Aadhar number has been noted and you will get 20% discount on any next Medical aids(<b>T and C apply</b>)";
  $sql="INSERT INTO rewards (adhar, code, earn) VALUES ('$_POST[adhar]','$_POST[code]','Yes')";
  if ($conn->query($sql) === TRUE) 
  {
    echo "\n<br>Data entered successfully<br><br>";
  }
}
elseif($arr[$key]!=$search)
{
  echo "<b><i>Sorry! Better luck next time</i></b>";
  $sql="INSERT INTO rewards (adhar, code, earn) VALUES ('$_POST[adhar]','$_POST[code]','No')";
  if ($conn->query($sql) === TRUE) 
  {
    echo "\n<br>Data entered successfully<br><br>";
  }

}
mysqli_close($conn);
?>
</body>
</html>