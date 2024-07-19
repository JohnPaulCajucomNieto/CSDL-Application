<?php
require_once 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" href="../logo/hawak kamay scholarship.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@800&family=Arimo&family=Barlow:wght@500&family=Bebas+Neue&family=Dancing+Script&family=Lobster&family=Montserrat:wght@100;400&family=Quicksand:wght@300&family=Roboto:wght@300&family=Tilt+Warp&family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/about.css">
</head>
<style>
    th{
        font-size:13px;
        
    }
    td{
        font-size:13px;
        
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


<div class="main-header">
        <div class="logo">
            <img style="width:110px; height:110px;" src="../logo/HK.png">
        </div>
        <div>
            <a href="../php/table-admin.php" style="text-decoration: underline; color: rgb(24, 47, 126); margin-right:190px;">BACK</a>
        </div>
        <div style="margin-right:50px;" class="title-head">
            <span style="margin-left:-1px;">ADMIN DASHBOARD</span>
            <i class="fas fa-sign-out-alt" style="margin-left: 10px; cursor: pointer;" onclick="logout()"></i>
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Search by student firstname or lastname" onkeyup="searchTable()" style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; width: 250px; font-size: 13px;">
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

$query = "SELECT * FROM login_data WHERE stat IN ('Accepted', 'Declined')";
$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) > 0) {
    echo '<table class="styled-table" style="width:80%; text-align:center; margin-left: 150px;">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>FIRSTNAME</th>';
    echo '<th>LASTNAME</th>';
    echo '<th>STATUS</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['fname'] . '</td>';
        echo '<td>' . $row['lname'] . '</td>';
        echo '<td>' . $row['stat'] . '</td>';
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
       function searchTable() {
        var input, filter, table, tr, td, i, txtValue, found;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementsByClassName("styled-table")[0];
        tr = table.getElementsByTagName("tr");
        found = false; 
        
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    found = true; 
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

       
        if (!found) {
            var noResultRow = document.createElement("tr");
            var noResultCell = document.createElement("td");
            noResultCell.setAttribute("colspan", "3"); 
            noResultCell.textContent = "No result found";
            noResultRow.appendChild(noResultCell);
            table.appendChild(noResultRow);
        }
    }
    </script>
    <script>
        function logout() {
            window.location.href = '../php/logins.php';
            alert('Logout Successful!');
        }
    </script>
</body>
</html>