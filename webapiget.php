<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT categoryId, category FROM categories";
$result = $conn->query($sql);

$resultStr="[";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $resultStr.="{\"id\":".$row["categoryId"].",\"value\":\"".$row['category']."\"},";
    }
    $resultStr=substr($resultStr,0,strlen($resultStr)-1)."]";
    echo $resultStr;
} else {
    echo "0 results";
}
$conn->close();
?>