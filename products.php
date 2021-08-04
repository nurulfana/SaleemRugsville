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
  include_once 'products_crud.php';
?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Saleem Rugsville : Products </title>
  
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css"></style>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>
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
<?php $stafflevel=$_SESSION["stafflevel"];
    //echo "<script>alert($userlevel);</script>";
  if ($stafflevel == 'Admin') {
    include 'nav_bar.php';
  }elseif ($stafflevel =='Normal Staff') {
    include 'nav_bar2.php';
  } ?>
<font face="Tahoma"><div class="container-fluid">
  <div class="row">
     <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 .bg-light">
      <div class="page-header">

        <h2>Create A Product</h2>
      </div>
    <div class="container col-md-12" style="border-radius: 10px; box-shadow: 0px 0px 6px;">
    <form action="products.php" method="post" class="form-horizontal" enctype="multipart/form-data">
      <div class="form-group">
        <br>
        <label for="productid" class="col-sm-3 control-label">Product ID</label>
          <div class="col-sm-9">
     <input name="pid" type="text" class="form-control" id="pid" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_num']; ?>" required>
          </div>
    </div>

    <div class="form-group">
          <label for="product" class="col-sm-3 control-label">Product</label>
          <div class="col-sm-9">
          <div class="radio">
            <label>
              <input name="ptype" type="radio" id="product" value="Carpets&Rugs" <?php if(isset($_GET['edit'])) if($editrow['fld_product']=="Carpets&Rugs") echo "checked"; ?> required> Carpets&Rugs
            </label>
          </div>
          <div class="radio">
            <label>
              <input name="ptype" type="radio" id="product" value="Curtains" <?php if(isset($_GET['edit'])) if($editrow['fld_product']=="Curtains") echo "checked"; ?>> Curtains
            </label>
            </div>
          </div>
      </div>

      <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
    <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>" required>
   </div>
 </div>

      <div class="form-group">
          <label for="productprice" class="col-sm-3 control-label">Price</label>
          <div class="col-sm-9">
      <input name="price" type="number" class="form-control" id="productprice" placeholder="Product Price" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>" min="0.0" step="0.01" required>

   </div>
 </div>

      <div class="form-group">
          <label for="producttype" class="col-sm-3 control-label">Type</label>
          <div class="col-sm-9">
      <select name="type" class="form-control" id="producttype" required>
        <option value="">Please select</option>
        <option value="Dhurrie" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Dhurrie") echo "selected"; ?>>Dhurrie</option>
         <option value="Shaggy" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Shaggy") echo "selected"; ?>>Shaggy</option>
         <option value="Silk" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Silk") echo "selected"; ?>>Silk</option>
         <option value="Modern" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Modern") echo "selected"; ?>>Modern</option>
         <option value="Persian" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Persian") echo "selected"; ?>>Persian</option>
         <option value="Hook" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Hook") echo "selected"; ?>>Hook</option>
         <option value="Eyelet" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Eyelet") echo "selected"; ?>>Eyelet</option>
         <option value="Tab Top" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Tab Top") echo "selected"; ?>>Tab Top</option>
         <option value="Grommet" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Grommet") echo "selected"; ?>>Grommet</option>
      </select> 
      </div>
        </div>

       <div class="form-group">
          <label for="productcolor" class="col-sm-3 control-label">Color</label>
          <div class="col-sm-9">
      <select name="color" class="form-control" id="productcolor" required>
        <option value="">Please select</option>
        <option value="Black&Gray" <?php if(isset($_GET['edit'])) if($editrow['fld_product_color']=="Black&Gray") echo "selected"; ?>>Black&Gray</option>
         <option value="Brown" <?php if(isset($_GET['edit'])) if($editrow['fld_product_color']=="Brown") echo "selected"; ?>>Brown</option>
         <option value="Brown&Tan&Ivory" <?php if(isset($_GET['edit'])) if($editrow['fld_product_color']=="Brown&Tan&Ivory") echo "selected"; ?>>Brown&Tan&Ivory</option>
         <option value="Gray" <?php if(isset($_GET['edit'])) if($editrow['fld_product_color']=="Gray") echo "selected"; ?>>Gray</option>
         <option value="Green" <?php if(isset($_GET['edit'])) if($editrow['fld_product_color']=="Green") echo "selected"; ?>>Green</option>
         <option value="Multi" <?php if(isset($_GET['edit'])) if($editrow['fld_product_color']=="Multi") echo "selected"; ?>>Multi</option>
         <option value="Orange" <?php if(isset($_GET['edit'])) if($editrow['fld_product_color']=="Orange") echo "selected"; ?>>Orange</option>
         <option value="Pink&Purple" <?php if(isset($_GET['edit'])) if($editrow['fld_product_color']=="Pink&Purple") echo "selected"; ?>>Pink&Purple</option>
         <option value="Red&Rust" <?php if(isset($_GET['edit'])) if($editrow['fld_product_color']=="Red&Rust") echo "selected"; ?>>Red&Rust</option>
         <option value="Tan&Ivory" <?php if(isset($_GET['edit'])) if($editrow['fld_product_color']=="Tan&Ivory") echo "selected"; ?>>Tan&Ivory</option>
         <option value="Yellow&Gold" <?php if(isset($_GET['edit'])) if($editrow['fld_product_color']=="Yellow&Gold") echo "selected"; ?>>Yellow&Gold</option>
         <option value="White" <?php if(isset($_GET['edit'])) if($editrow['fld_product_color']=="White") echo "selected"; ?>>White</option>
      </select> 
       </div>
        </div> 

        <div class="form-group">
          <label for="productstock" class="col-sm-3 control-label">Stock</label>
          <div class="col-sm-9">
      <input name="stock" type="number" class="form-control" id="productstock" placeholder="Product Stock" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_stock']; ?>"  min="0" required>
      </div>
        </div>

          <div class="form-group">
          <label for="productdescription" class="col-sm-3 control-label">Description</label>
          <div class="col-sm-9">
      <input name="description" type="text" class="form-control" id="productdescription" placeholder="Product Description" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_description']; ?>" required>

    </div>
  </div>
  <div class="form-group">
  <label for="productimage" class="col-sm-3 control-label">Image</label>
       <div class="col-sm-9" >
          <div class="thumbnail dark-1">
            <img src="products/<?php echo(isset($_GET['edit']) ? $editrow['fld_product_image'] : '') ?>"
            onerror="this.onerror=null;this.src='products/nophoto.jpg';" id="productPhoto"
            alt="Product Image" style="width: 180px;">
            <div class="caption text-center">
              <h4 id="productImageTitle" style="word-break: break-all;">Product Image</h4>
              <p>
                <label class="btn btn-primary">
                  <input type="file" accept="image/*" name="fileToUpload" id="inputImage"
                  onchange="loadFile(event);"/>
                  <input type="hidden" name="filename" value="<?php echo $editrow['fld_product_image']; ?>">
                  <span class="glyphicon glyphicon-cloud" aria-hidden="true"></span> Browse
                </label>
              </p>
            </div>
          </div>
        </div>
        </div>
    <div class="form-group">
       <div class="col-sm-offset-3 col-sm-9">
      <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_num']; ?>">
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
<br><br>
  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Product List</h2>
      </div>
      <table class="table table-striped table-bordered"> 
       <ul><a href="search.php">Jump to Search Product Form</a></ul>
      <tr>
        <th><center>Product ID</center></th>
        <th><center>Product</center></th>
        <th><center>Name</center></th>
        <th><center>Price</center></th>
        <th><center>Type</center></th>
        <th><center>Color</center></th>
        <th><center>Stock</center></th>
        <th><center>Description</center></th>
        <th><center>Image</center></th>
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
          $stmt = $conn->prepare("select * from tbl_products_a175171_pt2 LIMIT $start_from, $per_page");

        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>   
      <tr>
        <td><?php echo $readrow['fld_product_num']; ?></td>
        <td><?php echo $readrow['fld_product']; ?></td>
        <td><?php echo $readrow['fld_product_name']; ?></td>
        <td><?php echo $readrow['fld_product_price']; ?></td>
        <td><?php echo $readrow['fld_product_type']; ?></td>
        <td><?php echo $readrow['fld_product_color']; ?></td>
        <td><?php echo $readrow['fld_product_stock']; ?></td>
        <td><?php echo $readrow['fld_product_description']; ?></td>
        <td><?php echo $readrow['fld_product_image']; ?></td>
        <td>
          <a href="products_details.php?pid=<?php echo $readrow['fld_product_num']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
          <a href="products.php?edit=<?php echo $readrow['fld_product_num']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="products.php?delete=<?php echo $readrow['fld_product_num']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>

        </td>
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
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a175171_pt2");
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
            <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"products.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  </div>
    </div>
  </font>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- <script src="js/bootstrap.min.js"></script>  -->
  <script type="application/javascript">
  var loadFile = function (event) {
    var reader = new FileReader();
    reader.onload = function () {
      var output = document.getElementById('productPhoto');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
    document.getElementById('productImageTitle').innerText = event.target.files[0]['name'];
  };
</script>
<style>
  input[type="file"] {
      display: none;
    }
  </style>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js%22%3E"></script> -->
</body>
</html>