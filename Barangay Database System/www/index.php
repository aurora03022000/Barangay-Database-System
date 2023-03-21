<!DOCTYPE html>
<html>
    <head>
    <link href="css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/0d25aa5264.js" crossorigin="anonymous"></script>
    </head>
    <style>
      *{
        margin:0;
        padding:0;
      }

      body{
        background:#40AEDE;
      }
    </style>
    <body>

    <div style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);text-align:center">
    <h1 style="color:white;margin-bottom:30px"><i class="fas fa-database" style="margin-right:10px"></i>Barangay Database System</h1>
    <div class="text-center">
    <div class="spinner-border text-primary" style="width: 8rem; height: 8rem;" role="status">
    </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <script>

setTimeout(function(){
window.location.href='login.php';
   },1500); //delay is in milliseconds 

    </script>
    </body>
</html>