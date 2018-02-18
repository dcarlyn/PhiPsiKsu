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
                                                        
        $stmt = $conn->prepare("SELECT members.first_name, members.last_name, service_submissions.org_name, service_submissions.service_date, service_submissions.hours FROM service_submissions INNER JOIN members ON members.id = service_submissions.user_id ORDER BY service_submissions.service_date DESC");

        $stmt->bind_param("i", $_SESSION["uid"]);
        $stmt->execute();

        $result = $stmt->get_result();
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

  .other-row{
    background-color: grey;
  }

  tr, td{
    padding: 5px;
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

            <h1>Service Submissions</h1>
            <?php
              if($result->num_rows > 0)
              {

            ?>
              <table>
              <tr>
                <th class="col-sm-2 text-center">Name</th>
                <th class="col-sm-2 text-center">Date</th>
                <th class="col-sm-2 text-center">Organization Name</th>
                <th class="col-sm-2 text-center">Hours</th>
              </tr>

              <?php
                $i = 0;
                while($row = $result->fetch_assoc())
                {
                  $i = $i + 1;
                  ?>

                  <tr class="<?php echo ($i % 2 == 0 ? 'other-row' : '' ); ?>">
                    <td class ="col-sm-2 text-center"><?php echo $row["first_name"] . " " . $row["last_name"]; ?></td>
                    <td class="col-sm-2 text-center"><?php echo $row["service_date"];?></td>
                    <td class="col-sm-2 text-center"><?php echo $row["org_name"];?></td>
                    <td class="col-sm-2 text-center"><?php echo $row["hours"];?></td>
                  </tr>

                  <?php
                }
              ?>

              </table>
            <?php 
              }
              else
              {
                echo "No Results";
              }
            ?>

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