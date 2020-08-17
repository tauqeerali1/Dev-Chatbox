<?php
$hello = $_POST['term'];
$conn = mysqli_connect("localhost","root","9636463361","userregistration");
$sql = "SELECT User from userregistration WHERE User LIKE '".$hello."%'";
$result = mysqli_query($conn, $sql);
$rows = array();
while($row = mysqli_fetch_array($result)){
  $rows[]=$row['User'];
}
echo json_encode(
  array(
    'result' => $rows
        )
     );
?>