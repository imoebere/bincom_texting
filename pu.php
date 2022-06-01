
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--### UNICONS CSS ###-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
    <!-- Main CSS -->
    <link href="style.css" rel="stylesheet">
    <title>BINCOM TEXT</title>
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar sticky-top navbar-expand-lg bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.php"> 
                    <span class="badge  bg-success">BINCOM TEXT</span>
                </a>
            </div>
        </nav>
    </div>
<div class="container-fluid">
    <div class="row">
        <?php
        include 'connect.php'; 
        ?>
        
        <div class="col-md-3 col-lg-3">
            <ul class="nav flex-column">
                    <div class="input-group mb-3">
                       Dashboard
                    </div>
                
                    <li class="nav-item dropdown">
                        <a class="w-50 btn btn-lg btn-outline-success dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Manage Account
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="w-100 btn btn-lg dropdown-item" href="pu.php">View Individual Polling Unit</a></li>
                            <li><a class="w-100 btn btn-lg dropdown-item" href="Summed_total.php">Summed Total of a Particular Polling Unit</a></li>
                        </ul>
                    </li>
                </ul>
        </div>
        <div class="col-md-9 col-lg-9">
        <form method="post" enctype="multipart/form-data" class="p-4  border rounded-3 bg-light">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>ENTER POLLING UNIT ID:</strong></span>
                    <input type="number" class="form-control" required name="pu_id" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <button type="submit" class="w-100 btn btn-lg btn-success" name="Submit">Submit</button>
                </div>
                <div class="input-group mb-3">
                    <button type="reset" class="w-100 btn btn-lg btn-outline-success">Reset</button>
                </div>
                <?php 
                    if(isset($_POST['Submit'])){
                        $pu_id = trim($_POST['pu_id']);
                        $select = "SELECT * FROM polling_unit Where polling_unit_id='$pu_id'";
                        $query=mysqli_query($conn,$select);
                        $row_num = mysqli_num_rows($query);
                        while ($row=mysqli_fetch_assoc($query)){
                            $uniqueid = $row ['uniqueid'];
                            $ward_id = $row ['ward_id'];
                            $polling_unit_id = $row ['polling_unit_id'];
                            $lga_id = $row ['lga_id'];
                            $uniquewardid = $row ['uniquewardid'];
                            $polling_unit_number = $row ['polling_unit_number'];
                            $polling_unit_name = $row['polling_unit_name'];
                            $polling_unit_description = $row ['polling_unit_description'];
                            $lat = $row['lat'];
                            $long = $row ['long'];
                            $entered_by_user = $row['entered_by_user'];
                            $date_entered = $row['date_entered'];
                            $user_ip_address = $row['user_ip_address'];
                        }
                        
                        ?>
                   
            
            </form>   
                    <table border="1" width="500px" height="auto">
                        <tr>
                            <th>Unique ID:</th>
                            <td><?php echo $uniqueid; ?></td>
                        </tr>
                        <tr>
                            <th>WARD ID:</th>
                            <td><?php echo $ward_id; ?></td>
                        </tr>
                        <tr>
                            <th>POLLING UNIT ID:</th>
                            <td><?php echo $polling_unit_id; ?></td>
                        </tr>
                        <tr>
                            <th>LGA ID</th>
                            <td><?php echo $lga_id; ?></td>
                        </tr>
                        <tr>
                            <th>UNIQUE WARD ID:</th>
                            <td><?php echo $uniquewardid; ?></td>
                        </tr>
                        <tr>
                            <th>POLLING UNIT NUMBER:</th>
                            <td><?php echo $polling_unit_number; ?></td>
                        </tr>
                        <tr>
                            <th>POLLING UNIT NAME:</th>
                            <td><?php echo $polling_unit_name; ?></td>
                        </tr>
                        <tr>
                            <th>POLLING UNIT DESCRIPTION:</th>
                            <td><?php echo $polling_unit_description; ?></td>
                        </tr>
                        <tr>
                            <th>LAT:</th>
                            <td><?php echo $lat; ?></td>
                        </tr>
                        <tr>
                            <th>LONG:</th>
                            <td><?php echo $long; ?></td>
                        </tr>
                        <tr>
                            <th>ENTERED BY USER:</th>
                            <td><?php echo $entered_by_user; ?></td>
                        </tr>

                        <tr>
                            <th>DATE ENTERED:</th>
                            <td><?php echo $date_entered; ?></td>
                            
                        </tr>
                        <tr>
                            <th>USER IP ADDRESS:</th>
                            <td><?php echo $user_ip_address; } ?></td>
                        </tr>
                            
                    </table>

        </div>
    </div>
</div>




<!-- Bootstrap Javascript -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</body>
</html>