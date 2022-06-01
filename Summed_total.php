
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
        <?php
      $select = "SELECT lga_id FROM lga";
      $query=mysqli_query($conn,$select);
      $row_num = mysqli_num_rows($query);
      while ($row=mysqli_fetch_array($query)){
            $lga_id[]= $row ['lga_id'];
      }
      ?>
        <div class="col-md-9 col-lg-9">
        <form method="post" enctype="multipart/form-data" class="p-4  border rounded-3 bg-light">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>LGA ID:</strong></span>
                    <select class="form-select" name="LgaId" required id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <?php for($i=0; $i<$row_num; $i++){ ?>
                        <option value="<?php echo $lga_id[$i];?>"><?php echo $lga_id[$i]; }?></option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <button type="submit" class="w-100 btn btn-lg btn-success" name="Submit">Submit</button>
                </div>
                <div class="input-group mb-3">
                    <button type="reset" class="w-100 btn btn-lg btn-outline-success">Reset</button>
                </div>
                <?php 
                    if(isset($_POST['Submit'])){
                        $LgaId = trim($_POST['LgaId']);
                        $select = "SELECT * FROM polling_unit Where lga_id='$LgaId'";
                        $query=mysqli_query($conn,$select);
                        $row_num = mysqli_num_rows($query);
                       
                       // echo $row_num;
                        
                        ?>
                   
            
            </form>   
                    <table border="1" width="500px" height="auto">
                        <tr>
                            <th>TOTAL NUMBER OF POLLING UNIT IN A PARTICULAR LGA:</th>
                            <td><?php echo $row_num; }?></td>
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