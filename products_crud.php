<?php
          if (isset($_SESSION['error'])) {
            echo "<p class='text-danger text-center'>{$_SESSION['error']}</p>";
            unset($_SESSION['error']);
          }
          ?>
          <?php

include_once 'database.php';

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$extention = ['jpg', 'jpeg','gif'];
function uploadPhoto($file, $id)
{
  global $extention;
  $target_dir = "products/";
  $imageFileType = strtolower(pathinfo(basename($file["name"]), PATHINFO_EXTENSION));
  
  $newfilename = "{$id}.{$imageFileType}";

  if ($file['error'] == 4)
    return 4;
    // Check if image file is a actual image or fake image
  if (!getimagesize($file['tmp_name']))
    return 0;
    // Check file size
  if ($file["size"] > 10000000)
    return 1;
    // Allow certain file formats
  if (!in_array($imageFileType, $extention))
    return 2;

  if (!move_uploaded_file($file["tmp_name"], $target_dir.$newfilename))
    return 3;

  return array('status' => 200, 'name' => $newfilename, 'ext' => $imageFileType);
}

//Create
if (isset($_POST['create'])) {
  if ($_SESSION['stafflevel'] == 'Admin')  {
    $uploadStatus = uploadPhoto($_FILES['fileToUpload'], $_POST['pid']);
    if (isset($uploadStatus['status'])) {
      try {

   $stmt = $conn->prepare("INSERT INTO tbl_products_a175171_pt2 (fld_product_num, fld_product, fld_product_name, fld_product_price, fld_product_type, fld_product_color, fld_product_stock, fld_product_description, fld_product_image) VALUES(:pid, :ptype, :name, :price, :type, :color, :stock, :description, :image)");

      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':ptype', $ptype, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_STR);
      $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->bindParam(':color', $color, PDO::PARAM_STR);
      $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
      $stmt->bindParam(':description', $description, PDO::PARAM_STR);
      $stmt->bindParam(':image', $uploadStatus['name']);

    $pid = $_POST['pid'];
    $ptype = $_POST['ptype'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $color = $_POST['color'];
    $stock = $_POST['stock'];
    $description =  $_POST['description'];

    $stmt->execute();
      }
      catch(PDOException $e){
        $_SESSION['error'] = "Error while Creating: " . $e->getMessage();
      }
    } else {
      if ($uploadStatus == 0)
        $_SESSION['error'] = "Please make sure the file uploaded is an image.";
      elseif ($uploadStatus == 1)
        $_SESSION['error'] = "Sorry, only file with below 10MB are allowed.";
      elseif ($uploadStatus == 2)
        $_SESSION['error'] = "Sorry, only ".join(", ",$extention)." files are allowed.";
      elseif ($uploadStatus == 3)
        $_SESSION['error'] = "Sorry, there was an error uploading your file.";
      elseif ($uploadStatus == 4)
        $_SESSION['error'] = 'Please upload an image.';
      elseif ($uploadStatus == 5)
        $_SESSION['error'] = 'File already exists. Please rename your file before upload.';
      else
        $_SESSION['error'] = "An unknown error has been occurred.";
    }
  } else {
    $_SESSION['error'] = "Sorry, but you don't have permission to create a new product.";
  }
  header("LOCATION: {$_SERVER['REQUEST_URI']}");
  exit();
}
// if (isset($_POST['create'])) {

// $target_dir = "products/";
//   $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//   $uploadOk = 1;
//   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//    // Check if image file is a actual image or fake image
//   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//   if($check !== false) {
//     $uploadOk = 1;
//   } else {
//       //echo "File is not an image.";
//     echo"<script>alert('File is not an image.');</script>";
//     $uploadOk = 0;
//   }
  
//   // Check if file already exists
//   if (file_exists($target_file)) {
//     //echo "Sorry, file already exists.";
//     echo"<script>alert('Sorry, file already exists.');</script>";
//     $existerror = "Sorry, file already exists.";
//     $uploadOk = 0;
//   }
  
//   // Check file size
//   if ($_FILES["fileToUpload"]["size"] > 10000000) {
//   //echo "Sorry, your file is too large.";
//     echo"<script>alert('Sorry, your file is too large.');</script>";
//     $sizeerror = "Sorry, your file is too large.";
//     $uploadOk = 0;
//   }

//   // Allow certain file formats
//   if($imageFileType != "png" && $imageFileType != "gif" && $imageFileType != "jpg") {
//     //echo "Sorry, only GIF files are allowed.";
//     echo"<script>alert('Sorry, only PNG, gif and jpg files are allowed.');</script>";
//     $typeerror = "Sorry, only PNG , gif and jpg files are allowed.";
//     $uploadOk = 0;
//   }
  
//   // Check if $uploadOk is set to 0 by an error
//   if ($uploadOk == 0) {
//     echo "<script>alert('Your file was not uploaded.');</script>";;
//   // if everything is ok, try to upload file
//   } else {
//     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//     }

  

//   try {

//     $stmt = $conn->prepare("INSERT INTO tbl_products_a175171_pt2 (fld_product_num, fld_product, fld_product_name, fld_product_price, fld_product_type, fld_product_color, fld_product_stock, fld_product_description, fld_product_image) VALUES(:pid, :ptype, :name, :price, :type, :color, :stock, :description, :image)");

//     $image = $_FILES["fileToUpload"]["name"];

//       $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
//       $stmt->bindParam(':ptype', $ptype, PDO::PARAM_STR);
//       $stmt->bindParam(':name', $name, PDO::PARAM_STR);
//       $stmt->bindParam(':price', $price, PDO::PARAM_STR);
//       $stmt->bindParam(':type', $type, PDO::PARAM_STR);
//       $stmt->bindParam(':color', $color, PDO::PARAM_STR);
//       $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
//       $stmt->bindParam(':description', $description, PDO::PARAM_STR);
//       $stmt->bindParam(':image', $image, PDO::PARAM_STR);

//     $pid = $_POST['pid'];
//     $ptype = $_POST['ptype'];
//     $name = $_POST['name'];
//     $price = $_POST['price'];
//     $type = $_POST['type'];
//     $color = $_POST['color'];
//     $stock = $_POST['stock'];
//     $description =  $_POST['description'];

//     $stmt->execute();
//   }
//   catch(PDOException $e)
//   {
//     echo "<script>alert(Error: " . $e->getMessage() .") </script>";
//   }  


//   }
// }

//Update

if (isset($_POST['update'])) {
  if ($_SESSION['stafflevel'] == 'Admin')  {
    try {
    $stmt = $conn->prepare("UPDATE tbl_products_a175171_pt2 SET fld_product_num = :pid, fld_product = :ptype,
        fld_product_name = :name, fld_product_price = :price, fld_product_type = :type, fld_product_color = :color, fld_product_stock = :stock, fld_product_description = :description
      WHERE fld_product_num = :oldpid");

      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':ptype', $ptype, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_STR);
      $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->bindParam(':color', $color, PDO::PARAM_STR);
      $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
      $stmt->bindParam(':description', $description, PDO::PARAM_STR);
      $stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);

    $pid = $_POST['pid'];
    $ptype = $_POST['ptype'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $color = $_POST['color'];
    $stock = $_POST['stock'];
    $description =  $_POST['description'];
    $oldpid = $_POST['oldpid'];

    $stmt->execute();

    // header("Location: products.php");

      $flag  = uploadPhoto($_FILES['fileToUpload'], $_POST['pid']);

      if (isset($flag['status'])){
        $stmt = $conn->prepare("UPDATE tbl_products_a175171_pt2 SET fld_product_image = :image WHERE fld_product_num = :pid LIMIT 1");
        $stmt->bindParam(':image', $flag['name']);
        $stmt->bindParam(':pid', $pid);
        $stmt->execute();
        //kt product.php line 138
        if(pathinfo(basename($_POST['filename']), PATHINFO_EXTENSION)!=$flag['ext'])
          unlink("products/{$_POST['filename']}");
      } elseif ($flag != 4) {
        if ($flag == 0)
          $_SESSION['error'] = "Please make sure the file uploaded is an image.";
        elseif ($flag == 1)
          $_SESSION['error'] = "Sorry, only file with below 10MB are allowed.";
        elseif ($flag == 2)
          $_SESSION['error'] = "Sorry, only ".join(", ",$extention)." files are allowed.";
        elseif ($flag == 3)
          $_SESSION['error'] = "Sorry, there was an error uploading your file.";
        else
          $_SESSION['error'] = "An unknown error has been occurred.";
      }
      clearstatcache();//saja sebab kadang2 tk clear cache
    }
    catch(Exception $e){
      $_SESSION['error'] = "Error while Updating: " . $e->getMessage();
    }
  }
  else {
    $_SESSION['error'] = "Sorry, but you don't have permission to update this product.";
    header("LOCATION: {$_SERVER['PHP_SELF']}");
    exit();
  }

  if (isset($_SESSION['error']))
    header("LOCATION: {$_SERVER['REQUEST_URI']}");
  else
    header("Location: {$_SERVER['PHP_SELF']}");
  exit();
}
// if (isset($_POST['update'])) {

//   $target_dir = "products/";
//   $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//   $uploadOk = 1;
//   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//   if($check !== false) {
//     $uploadOk = 1;
//   } else {
//     echo "File is not an image.";
//     $uploadOk = 0;
//   }
  
//   // Check if file already exists
//   if(file_exists($target_file)){
//    $existerror = "Sorry, file already exists.";
//    $uploadOk = 0;
//  }

//   // Check file size
//  if($_FILES["fileToUpload"]["size"] > 10000000){
//   echo"<script>alert('Sorry, your file is too large.');</script>";
//   $uploadOk = 0;
// }

//   // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//   echo "<script>alert('Your file was not uploaded.');</script>";
//   // if file is not okay
//   try {
//     $stmt = $conn->prepare("UPDATE tbl_products_a175171_pt2 SET fld_product_num = :pid, fld_product = :ptype,
//         fld_product_name = :name, fld_product_price = :price, fld_product_type = :type, fld_product_color = :color, fld_product_stock = :stock, fld_product_description = :description
//       WHERE fld_product_num = :oldpid");

//       $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
//       $stmt->bindParam(':ptype', $ptype, PDO::PARAM_STR);
//       $stmt->bindParam(':name', $name, PDO::PARAM_STR);
//       $stmt->bindParam(':price', $price, PDO::PARAM_STR);
//       $stmt->bindParam(':type', $type, PDO::PARAM_STR);
//       $stmt->bindParam(':color', $color, PDO::PARAM_STR);
//       $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
//       $stmt->bindParam(':description', $description, PDO::PARAM_STR);
//       $stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);

//     $pid = $_POST['pid'];
//     $ptype = $_POST['ptype'];
//     $name = $_POST['name'];
//     $price = $_POST['price'];
//     $type = $_POST['type'];
//     $color = $_POST['color'];
//     $stock = $_POST['stock'];
//     $description =  $_POST['description'];
//     $oldpid = $_POST['oldpid'];

//     $stmt->execute();

//     header("Location: products.php");
//   }
//   catch(PDOException $e)
//   {
//     echo "Error: " . $e->getMessage();
//   }
// }
// else {
//   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

//     // Put your SQL UPDATE here
//     include "database.php";

//     try {
//       $stmt = $conn->prepare("UPDATE tbl_products_a175171_pt2 SET fld_product_num = :pid, fld_product = :ptype,
//         fld_product_name = :name, fld_product_price = :price, fld_product_type = :type, fld_product_color = :color, fld_product_stock = :stock, fld_product_description = :description ,fld_product_image = :image
//         WHERE fld_product_num = :oldpid");

//       $image = $_FILES["fileToUpload"]["name"];

//       $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
//       $stmt->bindParam(':ptype', $ptype, PDO::PARAM_STR);
//       $stmt->bindParam(':name', $name, PDO::PARAM_STR);
//       $stmt->bindParam(':price', $price, PDO::PARAM_STR);
//       $stmt->bindParam(':type', $type, PDO::PARAM_STR);
//       $stmt->bindParam(':color', $color, PDO::PARAM_STR);
//       $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
//       $stmt->bindParam(':description', $description, PDO::PARAM_STR);
//       $stmt->bindParam(':image', $image, PDO::PARAM_STR);
//       $stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);

//       $pid = $_POST['pid'];
//       $ptype = $_POST['ptype'];
//       $name = $_POST['name'];
//       $price = $_POST['price'];
//       $type = $_POST['type'];
//       $color = $_POST['color'];
//       $stock = $_POST['stock'];
//       $description =  $_POST['description'];
//       $oldpid = $_POST['oldpid'];


//       header("Location: products.php");
//     }
//     catch(PDOException $e)
//     {
//       echo "Error: " . $e->getMessage();
//     }
//   }
// }
// }

//Delete
if (isset($_GET['delete'])) {
  if ($_SESSION['stafflevel'] == 'Admin')  {
    try {
      $pid = $_GET['delete'];
      $query = $conn->query("SELECT fld_product_image FROM tbl_products_a175171_pt2 WHERE fld_product_num = '{$pid}' LIMIT 1")->fetch(PDO::FETCH_ASSOC);
      if (isset($query['fld_product_image'])) {
      // Delete Query
        $stmt = $conn->prepare("DELETE FROM tbl_products_a175171_pt2 WHERE fld_product_num = :pid");
        $stmt->bindParam(':pid', $pid);
        $stmt->execute();
      // Delete Image
        unlink("products/{$query['fld_product_image']}");
      }
    }
    catch(PDOException $e)
    {
      $_SESSION['error'] = "Error while Deleting: " . $e->getMessage();
    }
  } else {
    $_SESSION['error'] = "Sorry, but you don't have permission to delete this product.";
  }
  header("LOCATION: {$_SERVER['PHP_SELF']}");
  exit();
}
// if (isset($_GET['delete'])) {

//   try {

//     $stmt = $conn->prepare("DELETE FROM tbl_products_a175171_pt2 WHERE fld_product_num = :productid");

//     $stmt->bindParam(':productid', $productid, PDO::PARAM_STR);

//     $productid = $_GET['delete'];

//     //$image_file = $conn->prepare("SELECT fld_product_image FROM tbl_products_a175171_pt2 WHERE fld_product_num = :productid") ;
//     $path = "products/" . $productid . ".png" ;
//     unlink($path) ;
//     $stmt->execute();

//     header("Location: products.php?deletesuccess");
//   }

//   catch(PDOException $e)
//   {
//     echo "Error: " . $e->getMessage();
//   }
// }

//Edit
if (isset($_GET['edit'])) {

  try {

    $stmt = $conn->prepare("SELECT * FROM tbl_products_a175171_pt2 WHERE fld_product_num = :productid");

    $stmt->bindParam(':productid', $pid, PDO::PARAM_STR);

    $pid = $_GET['edit'];

    $stmt->execute();

    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
  }

  catch(PDOException $e)
  {
    echo "Error: " . $e->getMessage();
  }
}

$conn = null;
?>