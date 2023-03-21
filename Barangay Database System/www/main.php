<?php session_start(); 
error_reporting(0);
ini_set('display_errors', 0);
    include_once("include.php");        

?>
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
        font-size: 30px;
        background:#2779E7;
    }
    
    .main{
        min-height:100vh;
        display:flex;
        align-items:center;
        justify-content:center;
    }

    .container{
    }

    h1{
        font-size:45px;
        color:white;
    }

    form{
        margin-top:20px;
        text-align:center;
    }

    form button{
        width:300px;
        height:50px;
        font-weight:bold;
        font-size:15px;
        cursor:pointer;
        border:1px solid;
    }

    form button:hover{
        border:1px solid black;
        background:#2779E7;
        color:white;
    }

   
</style>

<body>
    <div class="main">
        <div class="container">
            
            <form action="" method="POST">
            <h1 data-aos="slide-right" style="margin-bottom:20px;">BARANGAY DATABASE SYSTEM</h1>
                <button style="margin-bottom:20px;" name="guest"><i class="fas fa-user" style="margin-right:10px;"></i>Continue as Guest</button>
                <button style="margin-bottom:20px;" name="user"><i class="fas fa-users-cog" style="margin-right:10px;"></i>Login as User</button>
            <form>

            <?php 

                if(isset($_POST['guest'])){
                    $_SESSION['user']=false;
                    $_SESSION['guest']=true;
                    $_SESSION['userbarangay']="Guest";
                    $_SESSION['email']="Guest";
                    $_SESSION['number']="Guest";
                    echo "<script>window.location.href='home.php'</script>";

                }

                if(isset($_POST['user'])){
                    echo "<script>window.location.href='login.php'</script>";

                }
            ?>
        </div>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>  

       
</html>