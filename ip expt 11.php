<!DOCTYPE html>
<html>
<head>
<title>php db</title>
</head>
<body>
<h2>Application form</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<label>name:</label>
<input type="text" name="name"><br><br>
<label>email:</label>
<input type="textl" name="email"><br><br>
<input type="submit" name="submit" value="Register">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name = $_POST['name'];
$email = $_POST['email'];
// Validate input
if (empty($name) || empty($email)) {
echo "All fields are required.";
}  else {
// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "job";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
// Insert data into table
$sql = "INSERT INTO job application (name, email) VALUES ('$name', '$email')";
if ($conn->query($sql) === TRUE) {
echo "information successfully inserted.";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
}
?>
</body>
</html>