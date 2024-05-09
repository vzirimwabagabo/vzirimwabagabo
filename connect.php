<?php
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Gender = $_POST['Gender'];
$EmailAddress = $_POST['EmailAddress'];
$Message = $_POST['Message'];
$Telephone = $_POST['Telephone'];
$AboutYou = $_POST['AboutYou'];
// Database connection
$conn = new mysqli('localhost', 'root', '', 'groupassignment');

if ($conn->connect_error) {
    die('Error connecting to database: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO contact ( firstname, lastname, gender, emailAddress, Message,telephone, aboutYou) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssis" , $FirstName, $LastName, $Gender, $EmailAddress, $Message, $Telephone, $AboutYou);
    $stmt->execute();
    echo "Registered successfully...";
    $stmt->close();
    $conn->close();
}
?>
