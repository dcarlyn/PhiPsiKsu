<html lang="en">
<head>
  <title>Phi Kappa Psi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<style>
/* Set gray background color and 100% height */
  .phi-kappa-psi-header-text{
      font-family: "Times New Roman", Times, serif;
      font-size: 96px;
  }

  .welcome-text{

  }

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

<body>

<!-- ===================HEADER========================== -->
<?php require_once("header/header.php"); ?>
<!-- ===================HEADER========================== -->
  
    <div class="container-fluid text-center">    
        <div class="row content">
    
          <div class="col-sm-2 sidenav">
            <!--
              <p><a href="#">Link</a></p>
              <p><a href="#">Link</a></p>
              <p><a href="#">Link</a></p>
            -->
          </div>
    
          <div class="col-sm-8 text-center"> 
              <h1 class = "col-sm-12 phi-kappa-psi-header-text">ΦΚΨ</h1>
              <p class = "welcome-text">Welcome to the soon to be Ohio Kappa chapter! We are a social fraternity at Kent State University that strives to turn good men into great men. We pride ourselves on the great joy of serving other through our constant philanthropic and service efforts year round. If you are interested in joining, or simply want more information, please contact our president <a href="mailto: aoltmann@kent.edu">Andrew Oltmanns</a>.</p>
              <hr>
              <h3>Current Brothers</h3>
              <p>If you are a current Brother, and you would like to submit your service hours, please click the button below!</p>
                <a style="text-decoration: none; color: darkred" href="https://docs.google.com/a/kent.edu/forms/d/e/1FAIpQLSfb4VgFts0a8bNOKWGHPvNOmqyvhaELsNwaFw8TpKwIIZz0HQ/viewform"><div class="service_link"><h2>Service Hours Submission</h2></div></a>
          </div>

          <div class="col-sm-2 sidenav">
          
          <!--
              <div class="well">
              </div>
              <div class="well">
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