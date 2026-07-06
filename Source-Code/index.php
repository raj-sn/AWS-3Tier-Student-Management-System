<?php
$servername = "";
$username   = "admin";
$password   = "";
$dbname     = "studentdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert new student if form submitted
if (isset($_POST['submit'])) {
    $name       = $_POST['name'];
    $department = $_POST['department'];

    $sql = "INSERT INTO students (name, department) VALUES ('$name', '$department')";
    $conn->query($sql);
}

// Fetch all students
$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
</head>
<body>

    <h1>Student Management System</h1>

    <form method="POST">
        Name:
        <input type="text" name="name" required>
        <br><br>

        Department:
        <input type="text" name="department" required>
        <br><br>

        <input type="submit" name="submit" value="Add Student">
    </form>

    <br><br>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Department</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['department']; ?></td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>
