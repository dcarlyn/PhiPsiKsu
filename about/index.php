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
                Commit 2
            -->
          </div>
    
          <div class="col-sm-8 text-center main-content"> 
              <h2>
                Where We've Been &amp Who We Are Today
              </h2>
              <p>One hundred and sixty-five years ago, William Henry Letterman and Charles Page Thomas Moore, two students at Jefferson College in foothills of Western Pennsylvania, were nursing and watching over their stricken friends during an epidemic of typhoid fever at the college. Through the long night vigils, the two decided that they should establish a group that was founded upon the great joy they received from selflessly helping others.</p>

              <p>On February 19, 1852, the two invited friends to join them for a meeting. They wanted to discuss creating a brotherhood based on the Great Joy Of Serving Others. As was common during the Pennsylvania winter, travel was impossible in the winter night. Letterman and Moore met alone and became the first members of Phi Kappa Psi.</p>

              <p>That Spring the fraternity began to grow and flourish at Jefferson College, gradually expanding to include other upperclassmen. All idealists, the initial members of Phi Kappa Psi sought to create a new kind of fraternity, one that would supplement the university's goal of improving students' intellect by cultivating its members' humanity. They believed that unless driven by a proper love for and service to mankind, an educated man is too apt to shrink from the human race, a waste of his talents. The original members wanted the ideals behind Phi Kappa Psi to spread and thus founded Phi Kappa Psi as a national fraternity with intent to spread across the nation.</p>

              <h3>Our Vision</h3>
              <p>Shared experiences allow us to succeed in our careers and relationships.</p>

              <h3>Our Mission</h3>
              <p>The Phi Kappa Psi Fraternity engages men of integrity, further develops their intellect and enhances community involvement. With a legacy built on acceptance and trust, each brother realizes his highest potential through a lifelong experience of service and excellence.</p>

              <h3>Our Creed</h3>
              <p>Written by John Henry Frizzell Amherst 1898 and Kent Christopher Owen Indiana '58, this document has come to represent all that it means to be a Phi Kappa Psi gentleman. How we act, who we are and how we should live...</p>

              <p>I believe that Phi Kappa Psi is a brotherhood of honorable men, courteous and cultured, who pledge throughout their lives to be generous, compassionate, and loyal comrades;</p>

              <p> I believe that I am honor bound to strive manfully for intellectual, moral, and spiritual excellence; to help and forgive my Brothers; to discharge promptly all just debts; to give aid and sympathy to all who are less fortunate;</p>

              <p>I believe that I am honor bound to strengthen my character and deepen my integrity; to counsel and guide my Brothers who stray from their obligations; to respect and emulate my Brothers who practice moderation in their manners and morals; to be ever mindful that loyalty to my Fraternity should not weaken loyalty to my college, but rather increase devotion to it, to my country, and to my God;</p>

              <p>I believe that to all I meet, wherever I go, I represent not only Phi Kappa Psi, but indeed the spirit of all fraternities; thus I must ever conduct myself so as to bring respect and honor not to myself alone, but also to my Fraternity;</p>

              <p>To the fulfillment of these beliefs, of these ideals, in the noble perfection of Phi Kappa Psi, I pledge my life and my sacred honor.</p>

              <h1>From the Phi Kappa Psi National <a href="https://www.phikappapsi.com">Website</a></h1>
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
