<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mylogins";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL TO CREATE TABLE
$sql = 'CREATE TABLE login_data (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(30) NOT NULL,
    lname VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    birthday DATE NOT NULL,
    phone VARCHAR(15) NOT NULL,
    age INT NOT NULL,
    facebook_link VARCHAR(100) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    status VARCHAR(20) NOT NULL,
    course VARCHAR(50) NOT NULL,
    campus VARCHAR(50) NOT NULL,
    address VARCHAR(50),
    last_school_attended VARCHAR(50) NOT NULL,
    mother_fname VARCHAR(30),
    mother_lname VARCHAR(30),
    mother_occupation VARCHAR(30),
    mother_income VARCHAR(30),
    father_fname VARCHAR(30),
    father_lname VARCHAR(30),
    father_occupation VARCHAR(30),
    father_income VARCHAR(30)
)';

if ($conn->query($sql) === TRUE) {
    echo "TABLE login_data CREATED SUCCESSFULLY";
} else {
    echo "ERROR CREATING TABLE: " . $conn->error;
}

$conn->close();
?>
