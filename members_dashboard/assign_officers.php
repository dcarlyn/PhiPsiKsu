<?php 

      if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
      {
        //Start Session
        require_once(__DIR__ . "\..\include\start_session.php");
        //Database Connection
        require_once(__DIR__ . "\..\include\database-connect.php");
        //Assign Officer Function
        require_once(__DIR__ . "\..\include\assign_leadership.php");
      }
      else
      {
        //Start Session
        require_once(__DIR__ . "/../include/start_session.php");
        //Database Connection
        require_once(__DIR__ . "/../include/database-connect.php");
        //Assign Officer Function
        require_once(__DIR__ . "/../include/assign_leadership.php");
      }

      if($_SERVER["REQUEST_METHOD"] == "POST")
      {
        //Submit here

        //Get Term
        $assigning_term = $_POST['term'];
        //Cycle through officers
        $stmt = $conn->prepare("SELECT * FROM officer_positions");
        $stmt->execute();
        $results = $stmt->get_result();
        $stmt->close();

        if($results->num_rows > 0)
        {
          while($row = $results->fetch_assoc())
          {
            //Get Member id
            $new_officer = $_POST[str_replace(' ', '_', $row['title'])]; //Replace spaces with _
            //Assign Officer
            if(assign_position($conn, $new_officer, $row['id'], $assigning_term))
            {
              echo "Successfully Assigned Officers";
            }
            else
            {
              echo "Failed To Assign Officers";
            }


          }
        }
        else
        {
          echo "No Officers Returned";
        }

      }

      //Query
                                                        
        $stmt = $conn->prepare("SELECT * FROM officer_positions");
        $stmt->execute();
        $officer_results = $stmt->get_result();
        $stmt->close();

        $stmt = $conn->prepare("SELECT * FROM members WHERE is_active = 1");
        $stmt->execute();
        $member_results = $stmt->get_result();
        $stmt->close();

        $stmt = $conn->prepare("SELECT * FROM terms");
        $stmt->execute();
        $term_results = $stmt->get_result();
        $stmt->close();

        $conn->close();
?>

<html lang="en">
<head>
  <title>Phi Kappa Psi - Assign Officers</title>
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
    
          <div class="col-sm-8 text-left main-content">

            <!-- CONTENT START -->
      
              <h1>Assign Officers</h1>

              <div>
                <form action="assign_officers.php" method="post">

                  <?php

                    if ($officer_results->num_rows > 0) {

                      while($officer_row = $officer_results->fetch_assoc()) {
                        //END PHP
                        ?>

                        <div class="col-sm-12 text-left">
                          <label class = "col-sm-4"><?php echo $officer_row['title']; ?>: </label>
                          <select class = "col-sm-4" name = "<?php echo str_replace(' ', '_', $officer_row['title']); ?>" type="text">

                            <?php
                              if($member_results->num_rows > 0)
                              {
                                mysqli_data_seek($member_results, 0); //Resets back to beginning of list
                                while($member_row = $member_results->fetch_assoc())
                                {

                                  //END PHP
                                  ?>

                                  <option value = "<?php echo $member_row['id']; ?>"><?php echo $member_row['first_name'] . " " . $member_row['last_name']; ?></option>

                                  <?php
                                  //BEGIN PHP

                                }
                              }
                              else
                              {
                                echo "No Members Returned";
                              }
                            ?>

                          </select>
                          <p class = "error">ERROR MESSAGE</p>
                        </div>

                        <?php
                        //BEGIN PHP

                      }

                    } else {
                      echo "No Officers Returned";
                    }

                  ?>

                  <div class="col-sm-12 text-left">
                    <label class = "col-sm-4">Term: </label>
                    <select class = "col-sm-4" name = "term" type="text">
                      <?php

                        if($term_results->num_rows > 0)
                        {
                            while($term_row = $term_results->fetch_assoc())
                            {
                              //PHP END
                              ?>
                                <option value = "<?php echo $term_row['id']; ?>"><?php echo $term_row['semester'] . " " . $term_row['year']; ?></option>
                              <?php
                              //PHP BEGIN

                            }
                        }
                        else
                        {
                          echo "No Terms Returned";
                        }

                      ?>
                      
                    </select>
                    <p class = "error">ERROR MESSAGE</p>
                  </div>

                  <div class = "col-sm-12 text-left">
                    <button>Submit</button>
                  </div>
                </form>
              </div>

              <div class = "error">
                Failed To Assign Officers
              </div>

              <div class = "success">
                Officers Assigned
              </div>

      <!-- CONTENT END -->

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
