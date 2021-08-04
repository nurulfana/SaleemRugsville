<!--
Matric Number: A175171
Name: Nurul Farhanah binti Sallehuddin
-->
<?php
session_start();
if(!$_SESSION["login"]){
   header("location:login.php");
   die;
}
$stafflevel=$_SESSION["stafflevel"];
if ($stafflevel == 'Normal Staff'){
  header("location:index.php");
  die;
}
?>
<?php
  include_once 'staffs_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Saleem Rugsvile System : Staffs</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Oswald);
    th {
      background-color: #8797ff;
      color: white;
    }
    h2 {
      display: inline;
      letter-spacing: 0.3rem;
      font-weight: 500;
      font-family: 'Oswald', sans-serif;
      text-transform: uppercase;
    }
  </style>
</head>
<body>
  <font face="Tahoma">
    <?php include_once 'nav_bar.php'; ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
        <div class="page-header">
          <h2>Create New Staff</h2>
        </div>
        <div class="container col-md-12" style="border-radius: 10px; box-shadow: 0px 0px 6px;">
          <br>
        <form action="staffs.php" method="post" class="form-horizontal">
          <div class="form-group">
            <label for="staffid" class="col-sm-3 control-label">Staff ID</label>
            <div class="col-sm-9">
              <input name="sid" type="text" class="form-control" id="staffid" placeholder="ST0X | eg: ST09 " value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_num']; ?>" required>
            </div>
          </div>

       <div class="form-group">
            <label for="staffname" class="col-sm-3 control-label">Staff Name</label>
            <div class="col-sm-9">
              <input name="sname" type="text" class="form-control" id="staffname" placeholder="Staff Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_name']; ?>" required />
            </div>
      </div>

      <div class="form-group">
            <label for="staffgender" class="col-sm-3 control-label">Gender</label>
            <div class="col-sm-9">
              <div class="radio">
                <label>
                  <input name="sgender" type="radio" id="staffgender" value="Male" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_gender']=="Male") echo "checked"; ?> required> Male
                </label>
              </div>
              <div class="radio">
                <label>
                  <input name="sgender" type="radio" id="staffgender" value="Female" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_gender']=="Female") echo "checked"; ?> required> Female
                </label>
              </div>
            </div>
      </div>

      <div class="form-group">
            <label for="phone" class="col-sm-3 control-label">Phone Number</label>
            <div class="col-sm-9">
              <input name="phone" type="tel" class="form-control" id="phone" pattern="\+60\d{2}-\d{7}" placeholder="+60##-#######" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_phoneno']; ?>" required />
            </div>
      </div>

      <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email Address</label>
            <div class="col-sm-9">
              <input name="email" type="text" class="form-control" id="email" placeholder="xxx@gmail.com" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_email']; ?>" required />
            </div>
      </div>

      <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Password</label>
            <div class="col-sm-9">
              <input name="password" type="text" class="form-control" id="email" placeholder="Password" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_password']; ?>" required />
            </div>
      </div>

      <div class="form-group">
            <label for="stafflevel" class="col-sm-3 control-label">User Level</label>
            <div class="col-sm-9">
            <select name="slevel" class="form-control" id="stafflevel" required>
              <option value="">Please select</option>
              <option value="Normal Staff" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_level']=="Normal Staff") echo "selected"; ?>>Normal Staff</option>
              <option value="Admin" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_level']=="Admin") echo "selected"; ?>>Admin</option>
            </select>
            </div>
      </div>
      
      <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <?php if (isset($_GET['edit'])) { ?>
                <input type="hidden" name="oldsid" value="<?php echo $editrow['fld_staff_num']; ?>">
                <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
              <?php } else { ?>
                <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
              <?php } ?>
              <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
            </div>
      </div>
      </div>
        </form>
      </div>
    </div>

    </hr>

    <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <div class="page-header">
          <br>
          <h2>Staff List</h2>
        </div>
        <table class="table table-striped table-bordered">
          <tr>
            <th><center>Staff ID</center></th>
            <th><center>Staff Name</center></th>
            <th><center>Gender</center></th>
            <th><center>Phone Number</center></th>
            <th><center>Email</center></th>
            <th><center>Password</center></th>
            <th><center>Level</center></th>
            <th></th>
          </tr>
          <?php
          // Read
          $per_page = 5;
          if (isset($_GET["page"]))
            $page = $_GET["page"];
          else
            $page = 1;
          $start_from = ($page-1) * $per_page;
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("select * from tbl_staffs_a175171_pt2 LIMIT {$start_from}, {$per_page}");
            $stmt->execute();
            $result = $stmt->fetchAll();
          }
          catch(PDOException $e){
            echo "Error: " . $e->getMessage();
          }
          foreach($result as $readrow) {
            ?>   
            <tr>
              <td><?php echo $readrow['fld_staff_num']; ?></td>
              <td><?php echo $readrow['fld_staff_name']; ?></td>
              <td><?php echo $readrow['fld_staff_gender']; ?></td>
              <td><?php echo $readrow['fld_staff_phoneno']; ?></td>
              <td><?php echo $readrow['fld_staff_email']; ?></td>
              <td><?php echo $readrow['fld_staff_password']; ?></td>
              <td><?php echo $readrow['fld_staff_level']; ?></td>
              <td>
                <a href="staffs.php?edit=<?php echo $readrow['fld_staff_num']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
                <a href="staffs.php?delete=<?php echo $readrow['fld_staff_num']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
              </td>
            </tr>
          <?php } ?>

        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <nav>
          <ul class="pagination">
            <?php
            try {
              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a175171_pt2");
              $stmt->execute();
              $result = $stmt->fetchAll();
              $total_records = count($result);
            }
            catch(PDOException $e){
              echo "Error: " . $e->getMessage();
            }
            $total_pages = ceil($total_records / $per_page);
            ?>
            <?php if ($page==1) { ?>
              <li class="disabled"><span aria-hidden="true">«</span></li>
            <?php } else { ?>
              <li><a href="staffs.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
              <?php
            }
            for ($i=1; $i<=$total_pages; $i++)
              if ($i == $page)
                echo "<li class=\"active\"><a href=\"staffs.php?page=$i\">$i</a></li>";
              else
                echo "<li><a href=\"staffs.php?page=$i\">$i</a></li>";
              ?>
              <?php if ($page==$total_pages) { ?>
                <li class="disabled"><span aria-hidden="true">»</span></li>
              <?php } else { ?>
                <li><a href="staffs.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
              <?php } ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>