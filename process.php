<?php
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submitValue = $_POST['submit'];
    $id = $_POST['id'];
    $number = $_POST["number"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $state = $_POST["state"];
    $age = $_POST["age"];
    if ($submitValue == 'Insert') {
        $sql = "INSERT INTO Student (Stud_No, Stud_Name, Stud_Phone, Stud_State, Stud_Age) VALUES ('$number', '$name', '$phone', '$state', '$age')";
        echo ($conn->query($sql)) ? "Inserted successfully<br><br>" : "Error: " . $conn->error;
    } 
    elseif ($submitValue == 'Update' && isset($_POST['id'])) {
        $sql = "UPDATE Student SET Stud_No='$number', Stud_Name='$name', Stud_Phone='$phone', Stud_State='$state', Stud_Age='$age' WHERE id=$id";
        echo ($conn->query($sql)) ? "Record updated successfully<br><br>" : "Error updating record: " . $conn->error;
    }
}

if (isset($_GET["action"]) && $_GET["action"] == "delete") {
    $id = $_GET["id"];
    $delete = "DELETE FROM Student WHERE Id = $id";
    if ($conn->query($delete) === true) {
        echo "Deleted Successfully<br>";
    } else {
        echo "Error deleting record: ";
    }
}

$retrieve = "SELECT * FROM Student";
$result = $conn->query($retrieve);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["Id"] . "<br>";
        echo "Student Number: " . $row["Stud_No"] . "<br>";
        echo "Student Name: " . $row["Stud_Name"] . "<br>";
        echo "Phone: " . $row["Stud_Phone"] . "<br>";
        echo "State: " . $row["Stud_State"] . "<br>";
        echo "Age: " . $row["Stud_Age"] . "<br>";
        echo "<a href='?action=delete&id={$row["Id"]}'>Delete</a><br>";
        echo "<a href='index.html'>Update</a><br><br>";
    }
}
?>

