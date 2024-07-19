<?php
require_once 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" href="../logo/hawak kamay scholarship.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@800&family=Arimo&family=Barlow:wght@500&family=Bebas+Neue&family=Dancing+Script&family=Lobster&family=Montserrat:wght@100;400&family=Quicksand:wght@300&family=Roboto:wght@300&family=Tilt+Warp&family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/about.css">
</head>
<style>
    th{
        font-size:10px;
        
    }
    td{
        font-size:12px;
        
    }
    button{
        border:none;
        color:white;
        padding:5px;
    }
   
     .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            margin-top: 20px;
            background-color: white;
            margin-top:150px;
        
          
        }

        .styled-table th,
        .styled-table td {
            padding: 8px;
            border: 1px solid black;
            
        }

        .styled-table th {
            background-color: 
            rgb(24, 47, 126);
            color:white;
        }


        @media screen and (max-width: 600px) {
            .styled-table {
                border: 0;
            }

            .styled-table thead {
                display: none;
            }

            .styled-table tbody,
            .styled-table tr,
            .styled-table td {
                display: block;
                width: 100%;
            }

            .styled-table tr {
                margin-bottom: 10px;
            }

            .styled-table td {
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            .styled-table td:last-child {
                border-bottom: 0;
            }
        }
</style>
   
    
<body>
    <div class="main-header p-0">
        <div class="logo">
        <img style="width:110px; height:110px;" src="../logo/HK.png">
        </div>
        <div style="position: relative; right: 160px;">
    <a href="../php/admin-dashbord.php" style="text-decoration: underline; color: rgb(24, 47, 126);">DASHBOARD</a>
    </div>
        <div style="position: relative; right: 50px;" class="title-head">
       ADMIN
       <i class="fas fa-sign-out-alt" style="margin-left: 10px; cursor: pointer;" onclick="logout()"></i>
    </div>
    
</div>
    </div>
    
    
    <div class="main-container">
        <div class="box1">
            <p class="p1">
                <div class="learnmore-btn">
                    <a class="navi3" href="../php/apply.php"></a>
                </div>
            </p>
        </div>


        <?php

$query = "SELECT * FROM login_data WHERE stat = ''";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<table class="styled-table" style="width:80%; text-align:center; margin-left: 80px;">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>FIRSTNAME</th>';
    echo '<th>LASTNAME</th>';
    echo '<th>EMAIL</th>';
    echo '<th>BIRTHDAY</th>';
    echo '<th>PHONE NUMBER</th>';
    echo '<th>AGE</th>';
    echo '<th>FACEBOOK LINK</th>';
    echo '<th>GENDER</th>';
    echo '<th>COURSE</th>'; 
    echo '<th>CIVIL STATUS</th>';
    echo '<th>CAMPUS</th>';
    echo '<th>COMPLETE ADDRESS</th>';
    echo '<th>LAST SCHOOL ATTEND</th>';
    echo '<th>MOTHER FIRSTNAME</th>';
    echo '<th>MOTHER LASTNAME</th>';
    echo '<th>MOTHER OCCUPATION</th>';
    echo '<th>MOTHER INCOME MONTHLY</th>';
    echo '<th>FATHER FIRSTNAME</th>';
    echo '<th>FATHER LASTNAME</th>';
    echo '<th>FATHER OCCUPATION</th>';
    echo '<th>FATHER INCOME MONTHLY</th>';
    echo '<th>ACTION</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['fname'] . '</td>';
        echo '<td>' . $row['lname'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['birthday'] . '</td>';
        echo '<td>' . $row['phone'] . '</td>';
        echo '<td>' . $row['age'] . '</td>';
        echo '<td>' . $row['facebook_link'] . '</td>';
        echo '<td>' . $row['gender'] . '</td>';
        echo '<td>' . $row['stat'] . '</td>';
        echo '<td>' . $row['course'] . '</td>';
        echo '<td>' . $row['campus'] . '</td>';
        echo '<td>' . $row['address'] . '</td>';
        echo '<td>' . $row['last_school_attended'] . '</td>';
        echo '<td>' . $row['mother_fname'] . '</td>';
        echo '<td>' . $row['mother_lname'] . '</td>';
        echo '<td>' . $row['mother_occupation'] . '</td>';
        echo '<td>' . $row['mother_income'] . '</td>';
        echo '<td>' . $row['father_fname'] . '</td>';
        echo '<td>' . $row['father_lname'] . '</td>';
        echo '<td>' . $row['father_occupation'] . '</td>';
        echo '<td>' . $row['father_income'] . '</td>';     
        echo '<td>';
        
        echo '<button style="background-color: rgb(39, 155, 39);" onclick="window.location.href=\'accept.php?id=' . $row['id'] . '\'">ACCEPT</button>&nbsp; &nbsp;';
        echo '<button style="background-color: rgb(190, 28, 28);" onclick="window.location.href=\'decline.php?id=' . $row['id'] . '\'">DECLINE</button>';

        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo 'No records found';
}

$conn->close();
?>

    <script>
        function logout() {
            window.location.href = '../php/logins.php';
            alert('Logout Successful!');
        }
    </script>
</body>
</html>