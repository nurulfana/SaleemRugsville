<?php
session_start();
$stafflevel=$_SESSION["stafflevel"];
if(!$_SESSION["login"]){
   header("location:login.php");
   die;
}
if ($stafflevel == 'Admin'){
  header("location:index.php");
  die;
}
?>

<?php
  include_once 'customers_crud.php';
?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Saleem Rugsville : Customers</title>
  <!-- Bootstrap -->
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
      background-color:#8797ff;
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

  <?php $stafflevel=$_SESSION["stafflevel"];
  //echo "<script>alert($stafflevel);</script>";
  if ($stafflevel == 'Admin') {
    include 'nav_bar.php';
  }elseif ($stafflevel =='Normal Staff') {
    include 'nav_bar2.php';
  } ?>
 

    <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Customer List</h2>
      </div>
      <table class="table table-striped table-bordered">
      <tr>
          <th><center>Customer ID</center></th>
          <th><center>Customer Name</center><center></th>
          <th><center>Gender</center></th>
          <th><center>Phone Number</center></th>
          <th><center>Customer Address</center></th>
        
      </tr>
      <?php
      // Read
      $per_page = 3;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_customers_a175171_pt2 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>
      <tr>
        <td><?php echo $readrow['fld_customer_num']; ?></td>
        <td><?php echo $readrow['fld_customer_name']; ?></td>
        <td><?php echo $readrow['fld_customer_gender']; ?></td>
        <td><?php echo $readrow['fld_customer_phonenum']; ?></td>
        <td><?php echo $readrow['fld_customer_address']; ?></td>
      </tr>
      <?php
      }
      $conn = null;
      ?>
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
            $stmt = $conn->prepare("SELECT * FROM tbl_customers_a175171_pt2");
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
            <li><a href="customers2.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"customers_staff.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"customers2.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="customers2.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    
</body>
</html>