<!-- <?php
 $stafflevel=$_SESSION["stafflevel"];
 $staffname=$_SESSION["staffname"];

?> -->
    <style type="text/css">
      @import 'https://fonts.googleapis.com/css?family=Montserrat|Open+Sans';
      .navbar-brand {
        font-family: 'Tahoma';
        text-transform: uppercase
      }

      .navbar .nav {
        font-family: 'Tahoma';
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 1.2rem;
      }

      .navbar-inverse {
        background-color: #000000
      }

      /* NAVIGATION */

      nav ul li a,
      nav ul li a:after,
      nav ul li a:before {
        transition: all .5s;
      }
      nav ul li a:hover {
        color: #555;
      }

      /* SHIFT */
      nav.shift ul li a {
        position:relative;
        z-index: 1;
      }
      nav.shift ul li a:hover {
        color: #ffff;
      }
      nav.shift ul li a:after {
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        margin: auto;
        width: 100%;
        height: 1px;
        content: '.';
        color: transparent;
        background: #8797ff;
        visibility: none;
        opacity: 0;
        z-index: -1;
      }
      nav.shift ul li a:hover:after {
        opacity: 1;
        visibility: visible;
        height: 100%;
      }
      /* END */

      .dropdown-menu {
        background-color: #1d1f1d
      }

      .navbar-inverse {
        background-image: none;
      }

      .dropdown-menu>li>a:hover,
      .dropdown-menu>li>a:focus {
        background-image: none;
      }

      .navbar-inverse .navbar-brand {
        color: #ffffff
      }

      .navbar-inverse .navbar-brand:hover {
        color: #8797ff
      }

      .navbar-inverse .navbar-nav>li>a {
        color: #ffffff
      }

      .navbar-inverse .navbar-nav>li>a:hover,
      .navbar-inverse .navbar-nav>li>a:focus {
        color: #ffffff
      }

      .navbar-inverse .navbar-nav>.active>a,
      .navbar-inverse .navbar-nav>.open>a,
      .navbar-inverse .navbar-nav>.open>a:hover,
      .navbar-inverse .navbar-nav>.open>a:focus {
        color: #ffffff
      }

      .navbar-inverse .navbar-nav>.active>a:hover,
      .navbar-inverse .navbar-nav>.active>a:focus {
        color: #ffffff
      }

      .dropdown-menu>li>a {
        color: #ffffff
      }

      .dropdown-menu>li>a:hover,
      .dropdown-menu>li>a:focus {
        color: #ffffff
      }

      .navbar-inverse .navbar-nav>.dropdown>a .caret {
        border-top-color: #ffffff
      }

      .navbar-inverse .navbar-nav>.dropdown>a:hover .caret {
        border-top-color: #ffffff
      }

      .navbar-inverse .navbar-nav>.dropdown>a .caret {
        border-bottom-color: #000000
      }

      .navbar-inverse .navbar-nav>.dropdown>a:hover .caret {
        border-bottom-color: #ffffff
      }


      .dropdown {
        position: relative;
        display: inline-block;
      }
      .dropdown-menu {
        display: none;
        position: absolute;
        z-index: 1;
      }
      .dropdown:hover .dropdown-menu {
        display: block;
      }

</style>

<header class="navbar navbar-inverse bs-docs-nav" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="index.php" class="navbar-brand">Saleem Rugsville</a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse shift" role="navigation">
      <ul class="nav navbar-nav">
        <li><a href="products.php">Products</a></li>
            <li><a href="customers.php">Customers</a></li>
            <li><a href="staffs.php">Staffs</a></li>
            <li><a href="orders.php">Orders</a></li>
          </ul>

        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
          <a class="dropbtn"><?php echo "Welcome : " .$stafflevel.", ".$staffname ; ?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</header>
