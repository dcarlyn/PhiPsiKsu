<?php
    /* Root Address */
    $root_address = $_SERVER['SERVER_NAME'];
    //add "/public_html/ at the end while in production"
    //Include bootstrap
    require_once(__DIR__ . "/../include/include-bootstrap.php");
?>

<style>
/* Remove the navbar's default margin-bottom and rounded borders */ 
.navbar {
  margin-bottom: 0;
  border-radius: 0;
}

.navbar-inverse{
  
}

.active{
  background-color: #00703d;
}
    
.logo {
      
}

html, body{
  height: 100%;
}

</style>

<nav class="navbar navbar-inverse">

  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="logo" href="#"><img src ="http://www.phikappapsi.com/content/images/common/nLogo.png" height="50px" width="75px"></a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">

      <ul id="menu-items" class="nav navbar-nav">
        <li><?php echo "<a href='https://" . $root_address . "/'>Home</a>";?></li>
        <li><?php echo "<a href='https://" . $root_address . "/about/'>About</a>";?></li>
        <li><?php echo "<a href='https://" . $root_address . "/contact_us/'>Contact Us</a>";?></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo 'https://' . $root_address . '/login/login.php'; ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>

    </div>

  </div>

</nav>
