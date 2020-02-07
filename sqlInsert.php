<?php
$servername = "localhost";
$username = "user";
$password = "password";
$dbname = "school";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name="bob";
$gradeLevel=12;
$age=9;
//inserts the information to the table from the variables
$sql = "INSERT INTO students( name, gradeLevel,age) VALUE('$name','$gradeLevel','$age') ";
//holds the result of the query
$result = $conn->query($sql);
// for objects use->
if ($result->num_rows > 0) {
    // output data of each row
   //fetch_assoc is an array that stores thing
    while($row = $result->fetch_assoc()) {
        echo "name: " . $row["name"]. " - gradeLevel: " . $row["gradeLevel"]. "age " . $row["age"]. "<br><br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
