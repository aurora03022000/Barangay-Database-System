<?php session_start(); 
      include_once("include.php");        
error_reporting(0);
ini_set('display_errors', 0);

if($_SESSION['user']==false && $_SESSION['guest']==false){
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
    

    <title>Barangay Database System</title>
    <link rel="icon" href="icon.png" type="png">
        <link rel="stylesheet" href="fonts.css">
        <link rel="stylesheet" href="all.min.css">
        <link rel="stylesheet" href="fontawesome.min.css">
        <link rel="stylesheet" href="dancing-font.css">
        <link rel="stylesheet" href="poppins-font.css">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <script src="https://kit.fontawesome.com/0d25aa5264.js" crossorigin="anonymous"></script>

        <script src="display-flex-div.js"></script>
        <script src="footer-bottom.js"> </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script src="animation-scroll.js"></script>

        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Kaisei+Opti&display=swap');

                 /* MAIN/PARENTS */
     *{
        margin: 0;
        padding: 0;
        outline:none;
    }

    body,html{
        min-width:1000px;
        height:100%;
        font-family: 'Poppins', sans-serif;
        font-size: 30px;
    }

    .main{
        min-height: 100%;
    }

    .mycontainer{
        width: 100%;
        min-height: 100%;
        display:flex;
    }
    /*-------*/

    /* Hamburger Button*/


    .btn-div{
        visibility: hidden;
        position: absolute;
        z-index: 2;
    }

    .btnwrapper{
        cursor:pointer;
        position: fixed;
        top:20px;
        left: 20px;
        margin-bottom: 50px;
    }

    .hamburger-btn{
        width:40px;
        height:20px;
        position: relative;
    }

    .line{
        position: absolute;
        height:5px;
        width:80%;
        background:orange;
        border-radius:8px;
        transition:all cubic-bezier(0.26, 0.1, 0.27, 1.55) 0.35s;
    }

    .top{
        top:0%;
    }

    .mid{
        top:49%;
    }

    .bot{
        top:98%;
    }

    .icon.close .top{
        transform:rotate(45deg);
        top:48%;
    }

    .icon.close .mid, .icon.close .bot{
        transform:rotate(-45deg);
        top:48%;
    }

    /**/

    /* LEFT DIV ELEMENTS */
    .leftdiv1{
        min-width: 300px;
        background:#40AEDE;
        position: relative;
    }

    .leftdiv1 .navbarcontainer1{
        position: sticky;
        top:0;
        padding-bottom: 50px;
        color:white;
    }

    .navbarcontainer1 .title{
        font-size: 2rem;
        padding: 20px 0 20px 20px;
        width:80%;
    }

    .menu-ul{
        margin-top: 30px;
    }

    .menu-ul .menu-li{
        margin-left:-60px;
        padding-left:20px;
        padding-top:17px;
        padding-bottom:17px;
        font-size: 0.7rem;
        cursor: pointer;
    }

    .menu-ul .menu-li:hover{
        background: rgba(0,0,0,0.5);
        border-left: 2px solid white;
    }

    
    .logout{
        background:none;
        border:none;
        color:white;
        font-family: 'Poppins', sans-serif;
        font-size:0.7rem;
        cursor: pointer;
        height:auto;
        margin-top:65px;
        width:100%;
        text-align:left;
        padding:20px 0px 20px 20px;
    }

    .logout:hover{
        background:rgba(0,0,0,0.5);
        border-left:2px solid white;
    }

    .login{
        background:none;
        border:none;
        color:white;
        padding-left:30px;
        font-family: 'Poppins', sans-serif;
        font-size:0.7rem;
        cursor: pointer;
    }


    /*------*/




    /* RIGHT DIV ELEMENTS */
    .rightdiv{
        min-width:700px;
        background-image: url('pattern.jpg');
        z-index: 1;
    }

    header{
        position: relative;
        width: 100%;
        height:900px;
    }

    .header-items-container{
        color: white;
        position: absolute;
        width: 100%;
        text-align: center;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }

    .header-items-container img{
        width:90%;
        max-width: 200px;
    }
    

    .header-items-container h1{
        font-family: 'Dancing Script', cursive;
        font-size: 80px; 
        width: 90%;
        margin: auto;
        max-width: 600px;       
    }

    .header-items-container p{
        width: 90%;
        margin: auto;   
        max-width: 500px;
        font-size: 30px;
        margin-top: 40px;          
    }

    .header-items-container button{
        margin-top: 80px;
        width:90%;
        max-width: 300px;
        padding:15px 0 15px 0;
        color:white;
        background-color: #40AEDE;
        border: 1px solid #40AEDE;
        font-size: 17px;
        cursor: pointer;
    }

    .section1updates{
        text-align: center;
        margin: 100px auto;
        width: 90%;
    }

    .section1{
        text-align: center;
        margin: 100px auto;
        width: 90%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .section1 p{
        margin-top: 20px;
        font-size: 0.6rem;
    }

    .section2{
        width: 90%;
        margin:100px auto;
    }

    .section2div{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .section2 img{
        width:90%;
        max-width: 400px;
    }

    .section2 p{
        font-size: 0.6rem;
    }

    .section3{
        width: 90%;
        margin:0 auto;
    }

    .section3div{
        text-align:center;
    }

    .section3 img{
        width:90%;
        max-width:600px;
        height:300px;
    }

    .section3 p{
        font-size: 0.6rem;
    }

    .article1{
        text-align: center;
        width: 90%;
        margin: 100px auto;
    }

    .article1 h2{
        font-size: 1rem;
    }

    .article1 p{
        margin-top: 20px;
        font-size: 0.6rem;
    }

    .logos{
        text-align: center;
        width: 90%;
        margin: 50px auto;
    }

    .logos img{
        width:130px;
        padding: 10px;
    }

    .learnmoreMap{
        text-decoration:none;
        color:#40AEDE;
    }

    .learnmoreMap:hover{
        text-decoration:underline;
        color:#40AEDE;
    }

    .learnmoreGraph1{
        text-decoration:none;
        color:#40AEDE;
    }

    .learnmoreGraph1:hover{
        text-decoration:underline;
        color:#40AEDE;
    }

    .learnmoreAbout{
        text-decoration:none;
        color:#40AEDE;
    }

    .learnmoreAbout:hover{
        text-decoration:underline;
        color:#40AEDE;
    }
    /*-----*/


    /* FOOTER */
    footer{
        min-width:1350px;
    }
   
    /*-----*/
    .logouthover{
        
        margin-top:70px;
        padding:15px 0 15px 0;
        cursor:pointer;
    }
    .logouthover:hover{
        background: rgba(0,0,0,0.5);
        border-left: 2px solid white;
    }

    .loginhover{
        margin-top:70px;
        padding:20px 0 20px 0;
        cursor:pointer;
    }
    .loginhover:hover{
        background: rgba(0,0,0,0.5);
        border-left: 2px solid white;
    }
    
    
            </style>
    </head>

    <body>
        <!-- Main -->
        <div class="main">

            <!-- container -->
            <div class="mycontainer" id="mycontainer">

                <!-- hamburger button -->    
                <div class="btn-div" id="btn-div">
                    <div class="btnwrapper" id="btnwrapper">
                        <div class="hamburger-btn icon">
                            <span class="line top"></span>
                            <span class="line mid"></span>
                            <span class="line bot"></span>
                        </div>
                    </div>
                </div>
                <!-- hamburger button --> 
                
                
                <!-- Left divison -->        
                <div class="leftdiv1" id="leftdiv1">
                <div class="navbarcontainer1">
                    <nav>
                        <div class="title"><i class="fas fa-database" style="margin-right:10px;font-size:50px"></i>BDS</div>
                        <div>
                            <ul class="menu-ul">
                                <a style="color:white;text-decoration:none;" href="home.php"><li class="menu-li"><i class="fas fa-home" style="margin-right:10px;"></i> Home</li></a>
                                <a style="color:white;text-decoration:none" href="enter.php"><li class="menu-li"><i class="fas fa-sign-in-alt" style="margin-right:10px;"></i>Enter Data</li></a>
                                <a style="color:white;text-decoration:none" href="search.php"><li class="menu-li"><i class="fas fa-search" style="margin-right:10px;"></i>Search Data</li></a>
                            </ul>
                        </div>
                        <form action="login.php" method="POST">
                            <button class="logout" id="logout" name="logout" ><i class="fas fa-sign-out-alt" style="font-size:23px;margin-right:10px"></i>Logout</button>
                        </form>                    
                    </nav>
                </div>
            </div>
                <!-- Left divison -->        


                <!-- Right Division -->        
                <div class="rightdiv" id="rightdiv">
            
                    <!-- Header -->        
                    <header style="background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('barangaybg.jpg');background-size:auto;color:white">
                            
                            <div class="logodiv" style="display:flex;align-items:center;justify-content:center">
                                <img src="download.png" style="margin-top:40px;"/>
                                <span style="text-align:center;margin-top:60px;margin-left:10px;font-size:40px;letter-spacing:7px;font-family: 'Times New Roman', serif;text-transform:uppercase">Koronadal City </br> Barangay San Isidro</span>
                            </div>
                            
                    </header>
                    <!-- Header -->
                    
                    <div class="boxes" style="box-shadow:0px 0px 10px 2px black;border:2px solid white;background:#223EA4;color:white;text-align:center;justify-content:center;margin:0 auto;margin-top:-80px;width:300px;height:300px;text-align:center;position:relative;display:flex">
                        <img src='kapitan.png' style="height:250px;width:200px;margin-top:-70px"/>
                        <div style="padding:200px 20px 10px 20px;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:100%"> <h3 style="font-size:25px">Barangay Captain</h3>
                        <div style="height:1px;background:white;margin-bottom:20px"></div>
                        <p style="font-size:13px">PB. LLOYD D. GABUTIN</p>
                        </div>
                        
                    </div>
                    

                    <!-- Section 2 -->  
                    <section class="section2"> 
                    <div class="section2div" style="margin-top:20px">
                        <img style="border: 1px solid black;margin-right:15px" src="map.png">
                        <p><span style="font-size:30px;">Location</span> </br></br>San Isidro is situated at approximately 6.4693, 124.8482, in the island 
                            of Mindanao. Elevation at these coordinates is estimated at 84.6 meters or 277.6 feet above mean sea level.
                            <br/><br/>
                            <a  target="_blank" class="learnmoreMap" href="https://www.philatlas.com/mindanao/r12/south-cotabato/koronadal/san-isidro.html">Learn More<i class="fas fa-arrow-right"></i></a>
                        </p>
                    </div>
                    </section>
                    <!-- Section 2 -->

                    <!-- Section 3 -->  
                    <section class="section3"> 
                    <div class="section3div" style="margin-top:20px">
                        <p><span style="font-size:30px;">Historical population</span> </br></br>The population of San Isidro grew from 2,539 in 1990 to 8,421 in 2020, 
                        an increase of 5,882 people over the course of 30 years. The latest census figures in 2020 denote a positive growth rate of 
                        3.36%, or an increase of 1,223 people, from the previous population of 7,198 in 2015.
                            <a  target="_blank" class="learnmoreGraph1" href="https://www.philatlas.com/mindanao/r12/south-cotabato/koronadal/san-isidro.html">Learn More<i class="fas fa-arrow-right"></i></a>
                        </p>
                        <img style="border: 1px solid black;margin-right:15px;margin-top:-20px" src="graph1.png">
                    </div>
                    </section>
                    <!-- Section 3 -->
                    
                    
                    <!-- Article -->        
                    <article class="article1" >
                        <h2>About</h2>
                        <p>San Isidro is a barangay in the city of Koronadal, in the province of South Cotabato. Its population as determined by the 2020
                             Census was 8,421. This represented 4.31% of the total population of Koronadal.
                            <br/><br/>
                            <a target="_blank" class="learnmoreAbout" href="https://www.philatlas.com/mindanao/r12/south-cotabato/koronadal/san-isidro.html">Learn More <i class="fas fa-arrow-right"></i></a>
                        </p>
                    </article>
                    <!-- Article -->
                    
                    <div style="background:black;height:1px;width:90%;margin:0 auto;margin-top:30px"></div>

                    <!-- Section 1 -->        
                    <h1 style="font-size:30px;margin-top:40px;text-align:center;">Updates</h1>
                    <div class="updateSections" style="margin:0 auto;display:flex;text-align:center;justify-content:center;align-items:center;width:500px;margin-top:-70px">
                    <section class="section1updates" style="padding:10px;color:white;background:rgba(0,0,0,0.7);border:1px solid black;box-shadow:0px 0px 10px 2px black;">
                        <img src="update1.jpg" style="width:100%;height:300px"></br>
                        <span style="font-size:12px;font-family: 'Poppins', sans-serif;margin-left:10px"><span style="font-size:20px">ATTENTION</span></br> Barangay SAN ISIDRO nga may mga BATA ,HINABLOS or APO nga ga edad 12-17 years old mag 
                            umpisa na ang pagpamakuna sa ila. Mag lakat lang sa PARISH GYM ga umpisa alas 8 sang aga. 
                            Kung willing kamo pabakunahan ang inyo mga anak paki dala ang mga naka lista nga documents sa 
                            baba (Isa lang dal on nyo)</span>
                    </section>
                    </div>
                    <!-- Section 1 -->
                  
                    <div style="background:black;height:1px;width:90%;margin:0 auto;margin-top:-20px"></div>

            
                    <!-- Logo Div -->        
                    <div class="logos">
                        <img src="1.png"><img src="4.png"><img src="download.png"/>
                    </div>
                    <!-- Logo div -->        

                </div>
                <!-- Right Divison -->
                
            </div>
            <!-- Container -->
            

            <!-- footer -->        
            <footer class="bg-dark " style="color:white;min-width:1000px" >
  <!-- Grid container -->
  <div class="p-4" style="text-align:center">
    <!--Grid row-->
    <div class="" style="display:flex;text-align:center;justify-content:center;">
      <!--Grid column-->
      <div  style="font-size:15px;width:100%;">
        <h5 style="font-size:15px">Social Media</h5>

        <ul class="list-unstyled mb-0">
          <li>
            <a href="www.facebook.com/marlou.antenero.18" style="text-decoration:none" class="text-light"><i class="fab fa-facebook-f" style="margin-right:5px"></i>marlou.antenero.18</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div  style="font-size:15px;width:100%;">
        <h5 style="font-size:15px">Email Address</h5>

        <ul class="list-unstyled mb-0" style="text-align:center;">
          <li>
            <a href="#!" style="text-decoration:none" class="text-light"><i class="fas fa-envelope-square" style="margin-right:5px"></i>marlou.03022000@gmail.com</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->

      <div style="font-size:15px;width:100%;">
        <h5 style="font-size:15px">Mobile Number</h5>

        <ul class="list-unstyled mb-0" style="text-align:center;">
          <li>
          <i class="fas fa-phone" style="margin-right:5px"></i>09755472273
          </li>
        </ul>
      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="font-size:15px;background-color: rgba(0, 0, 0, 0.2);">
    <span>© 2021 Copyright: Marlou Castro Antenero</span>
  </div>
  <!-- Copyright -->
</footer>
            <!-- footer -->    
        
        </div>
        <!--Main-->

        <script src="hamburger-btn-toggle.js"></script>
        <script src="button-click.js"></script>
    

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    </body> 
</html>