<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Barangay Database System</title>
    <link rel="icon" href="icon.png" type="png">
    <link rel="stylesheet" href="all.min.css">
        <link rel="stylesheet" href="fontawesome.min.css">
        <link rel="stylesheet" href="fonts.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://kit.fontawesome.com/0d25aa5264.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script src="display-flex-div.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>                  
 
 
</head>

<style>
     
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');


*{
        margin: 0;
        padding: 0;
    }

    body,html{
        width:100%;
        height:100%;
        font-family: 'Poppins', sans-serif;
        font-size: 20px;
        background:#2779E7;
    }
    
    .main{
        min-height:100vh;
        display:flex;
        align-items:center;
        justify-content:center;
    }

    .container{
        margin:20px auto;
        height:auto;   
        width:50%;
        background:whitesmoke;
        padding:20px;
    }

    .details{
        font-size:15px;
        margin:0 0 10px 10px;
    }
    
    .details-div{
        margin-top:50px;
    }

    a{
        text-decoration:none;
        color:black;
    }
    
    a:hover{
        text-decoration:underline;
    }
    
  
   
</style>

<body>
    <div class="main">
        <div class="container">
            <p style="font-size:25px;margin:20px 0 0 10px;"><b>Please contact this person for more information</b></p>
            <div class="details-div">
            <p class="details"><b><i class="fas fa-user" style="margin-right:10px"></i>Name:</b><i> Marlou C. Antenero</i></p>
            <p class="details"><b><i class="fas fa-phone" style="margin-right:10px"></i>Mobile Number:</b><i> 09755472273</i></p>
            <p class="details"><b><i class="fas fa-envelope" style="margin-right:10px"></i>Email Address:</b><i> marlou.03022000@gmail.com</i></p>
            <p class="details"><b><i class="fab fa-facebook" style="margin-right:10px"></i>Facebook Page:</b><i> <a style="font-size:13px" href="https://www.facebook.com/marlou.antenero.18/">https://www.facebook.com/marlou.antenero.18/ </a></i></p>
            <a href="login.php" class="back" ><p class="details" style="margin-top:220px;"><b>Back to login page</b></p></a>
            </div>
        </div>
    </div>
    
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>  

       
</html>