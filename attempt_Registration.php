<?php

if (isset($_POST["username"])){
    $username = $_POST["username"];
}

if (isset($_POST["password"])){
    $password = $_POST["password"];
}

$host = "#";
$user = "#";
$pass = "#";
$database = "#";

$connection  = mysqli_connect($host, $user, $pass, $database)
or die ("Error is " . $mysqli_error ($connection));

$query_check = "select * from User where Username=\"$username\"";

$results = $connection->query ($query_check);

if (!$results) {
    echo "<p>" . mysql_error() . "</p>";
}

$num_results = mysqli_num_rows ($results);

if ($num_results != 0) {
    echo "<p>That username already exists</p>";
    echo "<a href = \"example_login.html\">login</a>";
    exit;
}

$query = "insert into User (Username, Password) values (\"$username\"
    , \"$password\")";

$ret = $connection->query ($query);


if (!$ret) {
    echo "<p>Failed registration: " . mysqli_error($connection) . "</p>";
}

echo "<p>Registration successful</p>";
echo "<a href = \"example_login.html\">login</a>";


?>