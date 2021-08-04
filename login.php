<!--
Matric Number: A175171
Name: Nurul Farhanah binti Sallehuddin
-->

<?php
 //session_start();
include ('login1.php');
if(isset($_SESSION['login_user'])){
  header("location: index.php");
  }

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Saleem Rugsville : Login</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      html {
        height: 100%;
      }
      body {
        background: 
        -webkit-linear-gradient(rgba(135, 60, 255, 0.4), rgba(135, 60, 255, 0.0) 80%),
        -webkit-linear-gradient(-45deg, rgba(120, 155, 255, 0.9) 25%, rgba(255, 160, 65, 0.9) 75%);
      }
      
      .jumbotron {
        text-align: center;
        width: 30rem;
        border-radius: 0.5rem;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        position: absolute;
        margin: 4rem auto;
        background-color: #fff;
        padding: 2rem;
      }

      /*.container .glyphicon-home {
        font-size: 10rem;
        margin-top: 3rem;
        color: #ff4b58;
      }
*/
      input {
        width: 100%;
        margin-bottom: 1.4rem;
        padding: 1rem;
        background-color: #ecf2f4;
        border-radius: 0.2rem;
        border: none;
      }

      h2 {
        margin-bottom: 3rem;
        font-weight: bold;
        color: #ababab;
      }

      .btn {
        border-radius: 0.2rem;
      }

      .btn .glyphicon {
        font-size: 3rem;
        color: #fff;
      }

      .full-width {
        background-color: #8eb5e2;
        width: 100%;
        -webkit-border-top-right-radius: 0;
        -webkit-border-bottom-right-radius: 0;
        -moz-border-radius-topright: 0;
        -moz-border-radius-bottomright: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
      }

      .full-width1 {
        background-color: #8ee2b4;
        width: 100%;
        -webkit-border-top-right-radius: 0;
        -webkit-border-bottom-right-radius: 0;
        -moz-border-radius-topright: 0;
        -moz-border-radius-bottomright: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
      }

      .box {
        position: absolute;
        bottom: 0;
        left: 0;
        margin-bottom: 3rem;
        margin-left: 3rem;
        margin-right: 3rem;
      }
/* Solid border */
hr.solid {
  border-top: 2px solid #bbb;
}
    </style>
</head>
<body>
  <div class="phat_tri"></div>
<div class="phat_tri bottom"></div>
<div class="m_phat_tri"></div>
<div class="m_phat_tri right"></div>

<div class="long_square_top"></div>
<div class="long_square_top right"></div>

<div class="long_square_bottom"></div>
<div class="long_square_bottom right"></div>
  <script>
    function myFunction() {
      alert('Demo Accounts : \n\nADMIN \nEmail Address: masura@gmail.com \nPassword:123 \n\nNORMAL STAFF\nEmail Address: fana@gmail.com \nPassword:123 ')
    }
  </script>

  <div class="container-fluid">
  <div class="container jumbotron">
    <br><br>
    <img src="saleemm.png" width="100%" height='auto'>
    <br><br>
    <hr>
    <h2>login</h2>
    <form action="login1.php" method="post" class="form-horizontal">
    <div class="form-group">
        <input name="staffemail" type="text" placeholder="Email Address" required>
        <input name="staffpassword" type="password" placeholder="Password"required>
      <button type="submit" name="login" title='Login' class="btn btn-default full-width1"><span class="glyphicon glyphicon-ok"></span></button>
      
    </div>
    <div class="form-group">
        <button type="button" name="demo" title='Demo Accounts To Try' onclick="myFunction()" class="btn btn-default full-width"><span class="glyphicon glyphicon-info-sign"></span></button>
      </div>

    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-9">
        <input type="hidden" name="oldsid" value="<?php echo $editrow['fld_staff_num']; ?>">
      </div>
    </div>
  </div>
  </div>
</div>
 </form>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
