<h1>SQL Injection Demo</h1>
<form method="GET" action="index.php">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username">
    <input type="submit" value="Search">
</form>
<?php
$servername = "db";
$username = "readonlyuser";
$password = "readonlypassword";
$dbname = "testdb";

// 接続を作成
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続をチェック
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, username, email FROM users WHERE username = '" . $_GET['username'] . "'";

echo $sql;
echo '<br />';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["username"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
