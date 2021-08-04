<?php
include_once 'database.php';

try{

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



if (isset($_POST['login'])) {

	if(empty($_POST["staffemail"]) || empty($_POST["staffpassword"])){
		$e = '<label>Fill All</label>';
	}else{
		$stmt = $conn->prepare("SELECT * FROM tbl_staffs_a175171_pt2 WHERE fld_staff_email = :staffemail AND fld_staff_password = :staffpassword");

		$stmt->bindParam(':staffemail', $staffemail, PDO::PARAM_STR);
		$stmt->bindParam(':staffpassword', $staffpassword, PDO::PARAM_STR);
		$staffemail = $_POST['staffemail'];
		$staffpassword = $_POST['staffpassword'];
		$stmt->execute();
		$count = $stmt->rowCount();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if($count > 0){
			session_start();
			 $_SESSION["login"]=true;
			 $_SESSION["stafflevel"] = $result['fld_staff_level'];
			 $_SESSION["staffname"]=$result['fld_staff_name'];
			header("location:index.php");

		}else{
			
			echo "<script>
			alert('wrong email or password');
			window.location.href='login.php';
			</script>";
		}
	}
}
}
	catch(PDOException $e)
	{
	echo "Error: " . $e->getMessage();
	}


?>

 