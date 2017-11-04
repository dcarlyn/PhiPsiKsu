<!DOCTYPE html>
<html lang="en">
<head>
  <title>Phi Kappa Psi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="users.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<!-- ===================HEADER========================== -->
<?php include_once("header/header.php"); ?>
<!-- ===================HEADER========================== -->

<style>
/* Set gray background color and 100% height */
.sidenav {
  padding-top: 20px;
  background-color: #f1f1f1;
  height: 100%;
}
    
    .service_link{
        background-color: darkgreen;
        text-align: center;
        border: 2px solid darkred;
        margin-bottom: 10px;
    }

/* On small screens, set height to 'auto' for sidenav and grid */
@media screen and (max-width: 767px) {
  .sidenav {
    height: auto;
    padding: 15px;
  }
}
</style>
  
<div class="container-fluid text-center">    
  <div class="row content">

    <div class="col-sm-2 sidenav">
    <!--
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    -->
    </div>

    <div class="col-sm-8 text-left"> 
      <h1>Welcome</h1>
      <p>Hello! Currently, our site is undergoing construction. Thank you for your patience. If you are a member, and you need to submit your service hours, the link is down below!</p>
      <hr>
      <h3>Test Header</h3>
      <p>Test Text</p>
        <a style="text-decoration: none; color: blue" href="https://docs.google.com/a/kent.edu/forms/d/e/1FAIpQLSfb4VgFts0a8bNOKWGHPvNOmqyvhaELsNwaFw8TpKwIIZz0HQ/viewform"><div class="service_link"><h2>Service Hours Submission</h2></div></a>
    </div>

    <div class="col-sm-2 sidenav">
      <!--
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
      -->
    </div>
    
  </div>
</div>


<!-- ===================FOOTER========================== -->
<?php include_once("footer/footer.php");?>
<!-- ===================FOOTER========================== -->

</body>
</html>