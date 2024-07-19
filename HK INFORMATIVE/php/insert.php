<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mylogins"; // Use your database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $birthday = mysqli_real_escape_string($conn, $_POST["birthday"]);
    $phone = mysqli_real_escape_string($conn, $_POST["no"]);
    $age = mysqli_real_escape_string($conn, $_POST["age"]);
    $facebook_link = mysqli_real_escape_string($conn, $_POST["facebook_link"]); // Updated variable name
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $status = mysqli_real_escape_string($conn, $_POST["status"]);
    $course = mysqli_real_escape_string($conn, $_POST["course"]);
    $campus = mysqli_real_escape_string($conn, $_POST["campus"]);
    $address = mysqli_real_escape_string($conn, $_POST["add"]);
    $school = mysqli_real_escape_string($conn, $_POST["school"]);
    $mother_fname = mysqli_real_escape_string($conn, $_POST["mother_fname"]);
    $mother_lname = mysqli_real_escape_string($conn, $_POST["mother_lname"]);
    $mother_occupation = mysqli_real_escape_string($conn, $_POST["mother_occupation"]);
    $mother_income = mysqli_real_escape_string($conn, $_POST["mother_income"]);
    $father_fname = mysqli_real_escape_string($conn, $_POST["father_fname"]);
    $father_lname = mysqli_real_escape_string($conn, $_POST["father_lname"]);
    $father_occupation = mysqli_real_escape_string($conn, $_POST["father_occupation"]);
    $father_income = mysqli_real_escape_string($conn, $_POST["father_income"]);

    if (empty($fname) || empty($lname) || empty($email)) {
        die("Invalid data. Please fill in all required fields.");
    }

    $query = "INSERT INTO login_data (fname, lname, email, birthday, phone, age, facebook_link, gender, status, course, campus, address, school, mother_fname, mother_lname, mother_occupation, mother_income, father_fname, father_lname, father_occupation, father_income) VALUES ('$fname', '$lname', '$email', '$birthday', '$phone', '$age', '$facebook_link', '$gender', '$status', '$course', '$campus', '$address', '$school', '$mother_fname', '$mother_lname', '$mother_occupation', '$mother_income', '$father_fname', '$father_lname', '$father_occupation', '$father_income')";

    if ($conn->query($query) === TRUE) {
        echo "Application submitted successfully!";
        header("Location: home.php"); 
        exit(); 
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

$conn->close();
?>
