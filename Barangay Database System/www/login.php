<?php 
    session_start();
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
        <link rel="stylesheet" href="poppins-font.css">
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <script src="https://kit.fontawesome.com/0d25aa5264.js" crossorigin="anonymous"></script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
</style>
        <?php 

        
        
        if(isset($_POST['logout'])){
            $_SESSION['guest']=false;
            $_SESSION['userbarangay']="Guest";
            $_SESSION['email']="Guest";
            $_SESSION['number']="Guest";
            ?>
            <style>
            .error-div1[data-error] .error-div2::after{
                   content:"• Logged out Successfully";
                   display: inline-block;
                   padding-right: 3px;
                   margin-bottom:30px;
                   font-size:17px;
                   color:green;
                   text-align:center;
               }
            </style>
            
        <?php
        }


        if(isset($_POST['submit'])){
            
        
        $username=$_POST['username'];
        $password=$_POST['password'];

        $select1="SELECT * FROM `table3` WHERE username='$username' and password='$password' LIMIT 1";
        $select2="SELECT * FROM `table3` WHERE username='$username' or password='$password'";
        $select3="SELECT * FROM `table3`";

        $result1=mysqli_query($conn,$select1);
        $count1=mysqli_num_rows($result1);

        while($row=mysqli_fetch_array($result1)){
            $_SESSION['userbarangay']=$row['barangay'];
            $_SESSION['email']=$row['email'];
            $_SESSION['number']=$row['number'];
        }

        $result2=mysqli_query($conn,$select2);
        $count2=mysqli_num_rows($result2);

        $result3=mysqli_query($conn,$select3);
        $count3=mysqli_num_rows($result3);

        


        if($count1>0){
            if(!empty($_POST['remember'])){
                setcookie ("username", $_POST['username'],time()+ (10 * 365 * 24 * 60 * 60));
                setcookie ("password", $_POST['password'],time()+ (10 * 365 * 24 * 60 * 60));
            }
    
            //if checkbox is not checked
            if(empty($_POST['remember'])){
                if(isset($_COOKIE['username'])){
                    setcookie("username","");
                }
    
                if(isset($_COOKIE['password'])){
                    setcookie("password","");
                }
            }
         //home
           $_SESSION['guest']=false;
           $_SESSION['user']=true;
           echo "<script>window.location.href='home.php'</script>";
            
        }

        else if($count2>0){
            while($row=mysqli_fetch_array($result2)){
                if($row['username']==$username && $row['password']!=$password){
                    ?>
                   <style>
                   .input-div[data-error] .password{
                   border:1px solid red;  
                   background:#FCE9E9; 
                   }   
       
    
                   .error-div1[data-error] .error-div2::after{
                       content:"• Incorrect Password";
                       display: inline-block;
                       padding-right: 3px;
                       margin-bottom:30px;
                       font-size:17px;
                       color:red;
                   }
               </style>
    
                <?php
                }

                else{
                    ?>
                    
                    
                   <style>
                   .input-div[data-error] .username{
                   border:1px solid red;
                   background:#FCE9E9;   
                   }
     
                   .error-div1[data-error] .error-div2::after{
                       content:"• Username is not registered";
                       display: inline-block;
                       padding-right: 3px;
                       margin-bottom:30px;
                       font-size:17px;
                       color:red;
                   }
               </style>
    
    
                <?php
                }
            }
        }

        else{
            ?>
            <style>
             .input-div[data-error] .username{
            border:1px solid red;
            background:#FCE9E9;   
            }
    
            .input-div[data-error] .password{
            border:1px solid red;  
            background:#FCE9E9; 
            }
                 
    
            .error-div1[data-error] .error-div2::after{
                content:"• Incorrect Username and Password";
             font-size:17px;
             margin-bottom:33px;
             display:inline-block;
             color:red;
            }
        </style>
         <?php
        }
        
    }

 
    
    


?>
        <style>
            body, html{
                outline:none;
                margin:0;
                padding: 0;
                min-width: 1300px;
                min-height:100vh;
                background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.2)),url('pattern.jpg') ;
                font-family:'Poppins', sans-serif;
            }

            header{
                display:flex;
                align-items:center;
                height:100px;
                padding-left:50px;
                font-weight:bold;
                font-size:20px;
                color:white;
                background:#40AEDE;
            }

            .container{
                width:450px;
                margin:0 auto;
                min-width:450px;
            }

            #belowheader{
                min-height:70vh;
                padding-top:50px;
                padding-bottom:40px;
            }

            .username, .password{
                border:1px solid #40AEDE;
                outline:none;
            }
            


        </style>
    </head>

    <body>
        <div class="main">
            
            <header><i class="fas fa-database" style="margin-right:10px;font-size:40px"></i>Barangay Database System</header>

<div id="belowheader">           
            <div class="container">
            
             <div class="form" >
                 <div style="border:2px solid #40AEDE;border-radius:15px;background:white;box-shadow:0px 0px 10px 2px black;">
                     <div class="title" style="display:flex;justify-content:center;align-items:center;background:#40AEDE;padding:10px 10px;border-radius:10px 10px 0 0">
                        <span><img src="download.png" style="width:100px;margin-right:10px" ></span><p style="font-size:20px;color:white;letter-spacing:3px">Barangay San Isidro</p>
                     </div>

                     <div class="input-container" style="padding:40px 20px 20px 20px;">
                        

                        <div class="error-div1" data-error="" style="text-align:center;">
                            <div class="error-div2"></div>
                        </div>

                        <div class="input-fields" >
                        <form action="" method="POST">
                            <div data-error="" class="input-div" style="text-align:center">
                                <input type="text" class="username-input input username" style="border-radius:5px;margin-bottom:5px;width:300px;height:40px;font-size:15px;padding-left:10px;text-align:center;" id="username" name="username" placeholder="Username"  required="" oninvalid="this.setCustomValidity('Username cannot be empty!')" oninput="setCustomValidity('')" value="<?php if(isset($_COOKIE['username'])){ echo $_COOKIE['username']; } ?>"/><br/>
                            </div>

                            <div data-error="" class="input-div" style="text-align:center">
                                <input type="password" class="password-input input password" style="border-radius:5px;width:300px;height:40px;font-size:15px;padding-left:10px;text-align:center;" id="password" name="password" placeholder="Password" required="" oninvalid="this.setCustomValidity('Password cannot be empty!')" oninput="setCustomValidity('')" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password']; } ?>"/><br/>    
                            </div>

                            <div style="padding-left:45px;margin-top:10px;">
                            <input type="checkbox" class="checkbox" name="remember"><span style="margin-left:5px">Remember me</span><br/>
                            </div>
                            
                            <div style="text-align:center">
                            <input type="submit" style="margin-top:30px;background:#40AEDE;color:white;border:1px solid #40AEDE;border-radius:5px;cursor:pointer;font-size:15px;font-weight:bold;letter-spacing:2px;width:250px;height:40px;text-align:center;" name="submit" class="button" value="Login" >
                            </div>
                         
                        </form>
                    </div>
                        
                        </div>  

                    </div>
             </div>

            </div>
            
            <!--
            <footer>

            </footer>
            -->
        </div>
        </div>
    </body>
    <script>
    document.querySelectorAll('.input-div[data-error] .username').forEach(inpEl => {
        inpEl.addEventListener('input',() => inpEl.parentElement.removeAttribute('data-error'));
    });
    document.querySelectorAll('.input-div[data-error] .password').forEach(inpEl => {
        inpEl.addEventListener('input',() => inpEl.parentElement.removeAttribute('data-error'));
    });
</script>
    
</html>
