<?php
    /* Root Address */
    $root_address = $_SERVER['SERVER_NAME'] . "/public_html/";
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

      <ul class="nav navbar-nav">
        <li class="active"><?php echo "<a href='https://" . $root_address . "'>Home</a>";?></li>
        <li><?php echo "<a href='https://" . $root_address . "about/'>About</a>";?></li>
        <li><?php echo "<a href='https://" . $root_address . "contact_us/'>Contact Us</a>";?></li>
        <li><?php echo "<a href='https://" . $root_address . "current_members/'>Current Members</a>";?></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>

    </div>

  </div>

</nav>