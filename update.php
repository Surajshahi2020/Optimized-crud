<?php
include 'index.html';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connection.php';
    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $number = $_POST["number"];
	$name = $_POST["name"];
	$phone = $_POST["phone"];
	$state = $_POST["state"];
	$age = $_POST["age"];
        $sql = "UPDATE Student SET Stud_No='$number', Stud_Name='$name', Stud_Phone='$phone', Stud_State='$state', Stud_Age='$age' WHERE id=$id";
	if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header("Location: process.php");
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    $conn->close();
}
?>
