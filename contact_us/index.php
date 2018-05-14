<?php 

      if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
      {
        //Start Session
        require_once(__DIR__ . "\..\include\start_session.php");
      }
      else
      {
        //Start Session
        require_once(__DIR__ . "/../include/start_session.php");
      } 
?>
<html lang="en">
<head>
  <title>Phi Kappa Psi - About</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<style>
/* Set gray background color and 100% height */
  .content{
    height: 100%;
  }

  
  .sidenav {
    padding-top: 20px;
    background-color: #f1f1f1;
    height: 100%;
    min-height: 100%;
  }

  .tile{
    border: black solid 1px;
    height: 600px;
  }

  .desc{
    position: absolute;
    bottom: 0;
    width: 100%;
    text-align: center;
  }
/* On small screens, set height to 'auto' for sidenav and grid */
@media screen and (max-width: 767px) {
  .sidenav {
    height: auto;
    padding: 15px;
  }

  footer{
    display: none !important;
  }
}
</style>

<body>

<!-- ===================HEADER========================== -->
<?php require_once("../header/header.php"); ?>
<!-- ===================HEADER========================== -->
  
    <div class="container-fluid text-center">    
        <div class="row content">
    
          <div class="col-sm-2 sidenav">
            <!--
            -->
          </div>
    
          <div class="col-sm-8 text-center"> 
              <div class="col-sm-6 text-center tile">
                <h3>President</h3>
                <img style="margin-top: 50px;" src="AndrewOltmanns.jpg" height="300" width="300"><br>
                <div class="desc">
                  <h4>Andrew Oltmanns</h4>
                  <h5>Email: aoltmann@kent.edu</h5>
                </div>
              </div>

              <div class="col-sm-6 text-center tile">
                <h3>Recruitment Chair</h3>
                <img src="MattKing.jpg" height="400" width="300"><br>
                <div class="desc">
                  <h4>Matthew King</h4>
                  <h5>Email: mking67@kent.edu</h5>
                </div>
              </div>
          </div>

          <div class="col-sm-2 sidenav">
          
          <!--
          -->

          </div>
    
        </div>
    </div>


<!-- ===================FOOTER========================== -->
<?php include_once("../footer/footer.php");?>
<!-- ===================FOOTER========================== -->

</body>
</html>