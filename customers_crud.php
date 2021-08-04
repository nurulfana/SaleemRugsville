<!--
Matric Number: A175171
Name: Nurul Farhanah binti Sallehuddin
-->
<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
 
  try {
 
    $stmt = $conn->prepare("INSERT INTO tbl_customers_a175171_pt2(fld_customer_num, fld_customer_name, fld_customer_gender, fld_customer_phonenum, fld_customer_address) VALUES(:cid, :cname, :cgender, :cphone, :caddress)");
   
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
    $stmt->bindParam(':cname', $cname, PDO::PARAM_STR);
    $stmt->bindParam(':cgender', $cgender, PDO::PARAM_STR);
    $stmt->bindParam(':cphone', $cphone, PDO::PARAM_STR);
    $stmt->bindParam(':caddress', $caddress, PDO::PARAM_STR);
       
    $cid = $_POST['cid'];
    $cname = $_POST['cname'];
    $cgender =  $_POST['cgender'];
    $cphone = $_POST['cphone'];
    $caddress = $_POST['caddress'];
       
    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Update
if (isset($_POST['update'])) {
   
  try {
 
    $stmt = $conn->prepare("UPDATE tbl_customers_a175171_pt2 SET fld_customer_num = :cid,
      fld_customer_name = :cname, fld_customer_gender = :cgender, fld_customer_phonenum = :cphone, fld_customer_address = :caddress
      WHERE fld_customer_num = :oldcid");
   
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
    $stmt->bindParam(':cname', $cname, PDO::PARAM_STR);
    $stmt->bindParam(':cgender', $cgender, PDO::PARAM_STR);
    $stmt->bindParam(':cphone', $cphone, PDO::PARAM_STR);
    $stmt->bindParam(':caddress', $caddress, PDO::PARAM_STR);
    $stmt->bindParam(':oldcid', $oldcid, PDO::PARAM_STR);
       
    $cid = $_POST['cid'];
    $cname = $_POST['cname'];
    $cgender =  $_POST['cgender'];
    $cphone = $_POST['cphone'];
    $caddress = $_POST['caddress'];
    $oldcid = $_POST['oldcid'];
       
    $stmt->execute();
 
    header("Location: customers.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
    $stmt = $conn->prepare("DELETE FROM tbl_customers_a175171_pt2 WHERE fld_customer_num = :cid");
   
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
       
    $cid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: customers.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
   
  try {
 
    $stmt = $conn->prepare("SELECT * FROM tbl_customers_a175171_pt2 WHERE fld_customer_num = :cid");
   
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
       
    $cid = $_GET['edit'];
     
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