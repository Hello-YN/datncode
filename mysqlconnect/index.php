<?php
$servername = "localhost";
$username = "root";
$password = "password123";
$dbname = "my_database";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error);
} else {
    error_log("Database connected successfully.");
}
$sql = "SELECT name, email FROM users";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>First Website</title>
</head>
<body>
    <h1>User Data</h1>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p>Name: " . $row["name"]. " - Email: " . $row["email"]. "</p>";
        }
    } else {
        echo "No data found";
    }
    $conn->close();
    ?>
</body>
</html>
