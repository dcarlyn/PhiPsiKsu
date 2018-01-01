<?php
  
  if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
  {
    //Start Session
    require_once(__DIR__ . "\..\include\start_session.php");

    //change path for linux you will have to use / instead of \\
    require_once(__DIR__ . "\..\include\database-connect.php");
  }
  else
  {
    //Start Session
    require_once(__DIR__ . "/../include/start_session.php");

    //change path for linux you will have to use / instead of \\
    require_once(__DIR__ . "/../include/database-connect.php");
  }

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    //POST variables;
    $service_date = $_POST["service_date"];
    $org_name = $_POST["org_name"];
    $org_type = $_POST["org_type"];
    $org_type_other = $_POST["org_type_other"];
    $service_type = $_POST["service_type"];
    $service_type_other = $_POST["service_type_other"];
    $hours = $_POST["hours"];
    $member_reflection = $_POST["member_reflection"];

    $service_date_err = $org_name_err = $org_type_err = $org_type_other_err = $service_type_err = $service_type_other_err = $hours_err = $member_reflection_err = "";
    $is_err = false;

    //Query
    $stmt = $conn->prepare("SELECT * FROM members WHERE username = ?");
    $stmt->bind_param("s", $_SESSION["username"]);
    $result = $conn->query($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0)
    {

      //Check Values
      if($service_date == "")
      {
        $is_err = true;
        $service_date_err = "Please Enter A Service Date";
      }

      if($org_name == "")
      {
        $is_err = true;
        $org_name_err = "Please Enter An Organization Name";
      }

      if($org_type == "")
      {
        $is_err = true;
        $org_type_err = "Please Enter An Organization Type";
      }

      if($org_type == "Other" && $org_type_other == "")
      {
        $is_err = true;
        $org_type_other_err = "Please Enter An Organization Type";
      }

      if($service_type == "")
      {
        $is_err = true;
        $service_type_err = "Please Enter A Service Type";
      }

      if($service_type == "Other" && $service_type_other == "")
      {
        $is_err = true;
        $service_type_other_err = "Please Enter A Service Type";
      }

      if($hours == "" || $hours <= 0)
      {
        $is_err = true;
        $service_date_err = "Please Enter Amount Of Hours Serviced";
      }

      if($member_reflection == "")
      {
        $is_err = true;
        $member_reflection_err = "Please Type A Reflection On The Service";
      }


      //Submit Service Hours
      if(!$is_err)
      {

        //INSERT INTO service_submissions
        $stmt = $conn->prepare("INSERT INTO service_submissions (user_id, service_date, org_name, org_type, org_type_other, service_type, service_type_other, hours, member_reflection) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssssds", $_SESSION["uid"], $service_date, $org_name, $org_type, $org_type_other, $service_type, $service_type_other, $hours, $member_reflection);
        $stmt->execute();
        echo $conn->error;


        //POST variables;
        $service_date = $_POST["service_date"] = "";
        $org_name = $_POST["org_name"] = "";
        $org_type = $_POST["org_type"] = "";
        $org_type_other = $_POST["org_type_other"] = "";
        $service_type = $_POST["service_type"] = "";
        $service_type_other = $_POST["service_type_other"] = "";
        $hours = $_POST["hours"] = "";
        $member_reflection = $_POST["member_reflection"] = "";
      }

      $stmt->close();

    } 
    else 
    {
      $stmt->close();
      $conn->close();
      //Go Home
      header('Location: ../login/login.php');
    }

  }

  $conn->close();

?>

<html>
  <head>
    <title>Phi Kappa Psi - Service Submission</title>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <style>
    /* Set gray background color and 100% height */
    .sidenav {
        padding-top: 20px;
        background-color: #f1f1f1;
        height: 100%;
    }

    .error{
      color: red;
    }

    .success{
      color: darkgreen;
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

    <!-- Change \\ to / in linux -->
    <!-- ================== HEADER ======================== -->
    <?php require_once(__DIR__ . "/../header/header.php"); ?>
    <!-- ================================================== -->
  
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
              <h1>Service Submission</h1>

              <div>
                <form action="service_submission.php" method="post">
                  <div class="col-sm-12 text-left">
                    <label class = "col-sm-4">Date: </label>
                    <input class = "col-sm-4" name = "service_date" type="date" value = "<?php echo $service_date; ?>" />
                    <p class = "error"><?php echo $service_date_err; ?></p>
                  </div>

                  <div class="col-sm-12 text-left">
                    <label class = "col-sm-4">Organization Name: </label>
                    <input class = "col-sm-4" name = "org_name" type="text" value = "<?php echo $org_name; ?>" />
                    <p class = "error"><?php echo $org_name_err; ?></p>
                  </div>

                  <div class="col-sm-12 text-left">
                    <label class = "col-sm-4">Organization Type: </label>
                    <select class = "col-sm-4" name = "org_type" type="text" value = "<?php echo $org_type; ?>" >
                      <option value = "">Select item...</option>
                      <option value = "Animals/Animal Rights">Animals/Animal Rights</option>
                      <option value = "Children & Youth Services">Children &amp Youth Services</option>
                      <option value = "College Campus Organization">College Campus Organization</option>
                      <option value = "Developmentally/Physically Challenged">Developmentally/Physically Challenged</option>
                      <option value = "Environment">Environment</option>
                      <option value = "Food & Hunger">Food &amp Hunger</option>
                      <option value = "Inter/National Community">Inter/National Community</option>
                      <option value = "Local Community">Local Community</option>
                      <option value = "Medicine">Medicine</option>
                      <option value = "Other">Other</option>
                      <option value = "Phi Psi Brother & Family">Phi Psi Brother &amp Family</option>
                      <option value = "Senior Citizens">Senior Citizens</option>
                    </select>
                    <p class = "error"><?php echo $org_type_err; ?></p>
                  </div>

                  <div class="col-sm-12 text-left">
                    <label class = "col-sm-4">Organization Type Other: </label>
                    <input class = "col-sm-4" name = "org_type_other" type="text" value = "<?php echo $org_type_other; ?>" />
                    <p class = "error"><?php echo $org_type_other_err; ?></p>
                  </div>

                  <div class="col-sm-12 text-left">
                    <label class = "col-sm-4">Service Type: </label>
                    <select class = "col-sm-4" name = "service_type" type="text" value = "<?php echo $service_type; ?>" >
                      <option value = "">Select item...</option>
                      <option value = "Advocacy Efforts/Civic Engagement">Advocacy Efforts/Civic Engagement</option>
                      <option value = "Coaching &amp Mentoring">Coaching &amp Mentoring</option>
                      <option value = "Donated Blood">Donated Blood</option>
                      <option value = "Mental Health Counseling">Mental Health Counseling</option>
                      <option value = "Ministry/Spiritual Contributions">Ministry/Spiritual Contributions</option>
                      <option value = "Other">Other</option>
                      <option value = "Participation">Participation</option>
                      <option value = "Physical Labor">Physical Labor</option>
                      <option value = "Quality Time">Quality Time</option>
                      <option value = "Teaching/Facilitating/Tutoring">Teaching/Facilitating/Tutoring</option>                   
                    </select>
                    <p class = "error"><?php echo $service_type_err; ?></p>
                  </div>

                  <div class="col-sm-12 text-left">
                    <label class = "col-sm-4">Service Type Other: </label>
                    <input class = "col-sm-4" name = "service_type_other" type="text" value = "<?php echo $service_type_other; ?>" />
                    <p class = "error"><?php echo $service_type_other_err; ?></p>
                  </div>

                  <div class="col-sm-12 text-left">
                    <label class = "col-sm-4">Hours Serviced: </label>
                    <input class = "col-sm-4" name = "hours" type="number" min="0" max="50" step=".5" value = "<?php if($hours != "") echo $hours; else echo 0; ?>" />
                    <p class = "error"><?php echo $hours_err; ?></p>
                  </div>

                  <div class="col-sm-12 text-left">
                    <label class = "col-sm-4">Service Reflection: </label>
                    <textarea rows = "5" class = "col-sm-4" name = "member_reflection" type="text" value = "<?php echo $member_reflection; ?>" ></textarea>
                    <p class = "error"><?php echo $member_reflection_err; ?></p>
                  </div>

                  <div class = "col-sm-12 text-left">
                    <button>Submit</button>
                  </div>
                </form>
              </div>

              <div class = "error">
                <?php
                  if($is_err)
                  {
                    echo "Service Submission Failed";
                  }
                ?>
              </div>

              <div class = "success">
                <?php
                  if(!$is_err && $_SERVER["REQUEST_METHOD"] == "POST")
                  {
                    echo "Service Submission Successful";
                  }
                ?>
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


    <!-- Change \\ to / in linux -->
    <!-- ===================FOOTER========================== -->
    <?php require_once(__DIR__ . "/../footer//footer.php");?>
    <!-- ===================FOOTER========================== -->
  </body>

</html>
