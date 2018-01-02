<?php 

      if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
      {
        //Start Session
        require_once(__DIR__ . "\..\include\start_session.php");
        //Database Connection
        require_once(__DIR__ . "\..\include\database-connect.php");
      }
      else
      {
        //Start Session
        require_once(__DIR__ . "/../include/start_session.php");
        //Database Connection
        require_once(__DIR__ . "/../include/database-connect.php");
      }

      //Getting Personal Data
      //Query
        $hours = 0.00;
        $total_hours = 0.00;
                                                        
        $stmt = $conn->prepare("SELECT * FROM members WHERE id = ?");

        $stmt->bind_param("i", $_SESSION["uid"]);
        $stmt->execute();

        $result = $stmt->get_result();
                                                        
        if($result->num_rows > 0)
        {
                $personal_data = $result->fetch_assoc();
        }

        $stmt->close();

        $stmt = $conn->prepare("SELECT SUM(hours) AS Total_Hours FROM service_submissions WHERE user_id = ?");

        $stmt->bind_param("i", $_SESSION["uid"]);
        $stmt->execute();

        $result = $stmt->get_result();
                                                        
        if($result->num_rows > 0)
        {
                $row = $result->fetch_assoc();
                $hours = $row["Total_Hours"];
        }
        else
        {
                $hours = 0.00;
        }

        $stmt->close();

        $stmt = $conn->prepare("SELECT SUM(hours) AS Total_Hours FROM service_submissions");
        $stmt->execute();

        $result = $stmt->get_result();
                                                        
        if($result->num_rows > 0)
        {
                $row = $result->fetch_assoc();
                $total_hours = $row["Total_Hours"];
        }
        else
        {
                $total_hours = 0.00;
        }

        $stmt->close();
        $conn->close();

?>

<html lang="en">
<head>
  <title>Phi Kappa Psi - Members Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<style>
/* Set gray background color and 100% height */
  .content{
    height: 100%;
  }

  .main-content{
    background-color: white;
  }

  .all-content{
    background-color: #f1f1f1;
  }
  
  .sidenav {
    padding-top: 20px;
    background-color: #f1f1f1;
    height: 100%;
    min-height: 100%;
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
<?php require_once(__DIR__ . "/../header/header.php"); ?>
<!-- ===================HEADER========================== -->
  
    <div class="container-fluid text-center all-content">    
        <div class="row content">
    
          <div class="col-sm-2 sidenav">
            <!--
              <p><a href="#">Link</a></p>
              <p><a href="#">Link</a></p>
              <p><a href="#">Link</a></p>
            -->
          </div>
    
          <div class="col-sm-8 text-center main-content">

                <h1 class="primary-font">Member Dashboard</h1>
                <div class = "col-sm-12 container-fluid">
                        <img src="https://pbs.twimg.com/profile_images/879718783908294657/46CEEU-s.jpg" height="200" width="200">
                </div>

                <div class="col-sm-12 container-fluid">
                        <h1>Total Chapter Service Hours (Spring 2018)</h1>
                        <h3><?php echo ($total_hours ? $total_hours : 0.00); ?></h3>
                </div>

                <div class ="container-fluid col-sm-12">

                        <div class="col-sm-4 container-fluid text-center participation tile">

                                <div class="inner-tile">

                                <!--
                                        <div class="container-fluid participation-title">

                                                <h1>Participation</h1>

                                        </div>
                                -->

                                        <div class="container-fluid participation-service">
                                                <h1>Service Hours</h1>
                                                <h2><a href = "service_log.php"><?php echo ($hours ? $hours : 0.00); ?></a></h2>


                                        </div>

                                        <!--
                                        <div class="container-fluid participation-philanthropy">

                                                <h1>Philanthropy Events</h1>

                                                <h2>3</h2>

                                        </div>
                                        -->

                                </div>

                        </div>

                        <div class="col-sm-4 container-fluid text-center profile tile">

                                <div class="inner-tile">

                                        <div class="container-fluid profile-title">

                                                <h1>Profile</h1>

                                        </div>

                                        <div class="container-fluid profile-info">

                                                <h3>Name: <?php echo $personal_data["first_name"] . " " . $personal_data["last_name"]; ?></h3>

                                                <h3>Email: <?php echo $personal_data["email"]; ?></h3>

                                                <h3>Birthday: <?php echo $personal_data["birthday"]; ?></h3>

                                                <!--

                                                <h3>Class: Alpha</h3>

                                                <h3>Position(s): SG, External Philanthropy Chair</h3>

                                                -->

                                        </div>

                                        <!--
                                        <div class="container-fluid profile-edit">

                                                <h3><a>Edit Profile</a></h3>

                                        </div>
                                        -->

                                </div>

                        </div>

                        <div class="col-sm-4 container-fluid text-center action-items tile">

                                <div class="inner-tile">

                                        <div class="container-fluid action-items-title">

                                                <h1>Action Items</h1>

                                        </div>

                                        <div class="container-fluid action-items-links">

                                                <h3><a href="service_submission.php">Submit Service Hours</a></h3>
                                                <h3><a href="logout.php">Logout</a></h3>

                                                <!--

                                                <h3><a>Submit Philanthropy Attendance</a></h3>

                                                <h3><a>Personal Messages</a></h3>

                                                <h3><a>Announcements</a></h3>

                                                -->

                                        </div>

                                </div>

                        </div>

                </div>

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
<?php include_once("../footer/footer.php");?>
<!-- ===================FOOTER========================== -->

</body>
</html>
