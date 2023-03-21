<?php 
error_reporting(0);
ini_set('display_errors', 0);
session_start();


    include_once("include.php");        

?>
<!DOCTYPE html>
<html>

<head>
<title>Barangay Database System</title>
    <link rel="icon" href="icon.png" type="png">
    <link rel="stylesheet" href="all.min.css">
    <link rel="stylesheet" href="fonts.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="fontawesome.min.css">
<script src="display-flex-div.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>                  
<script src="https://kit.fontawesome.com/0d25aa5264.js" crossorigin="anonymous"></script>

<?php 
        if($_SESSION['user']==false && $_SESSION['guest']==false){
            echo "<script>window.location.href='login.php'</script>";
        }    
        
                else if(isset($_POST['pass'])){

                    $select="SELECT * FROM `table1`";
                    $result=mysqli_query($conn,$select);
                    
                    while($rowid=mysqli_fetch_array($result)){
                        $count=$rowid['id'];
                    }

                    $count = $count + 1;

                    $id=$count;
                    $barangay=$_SESSION['userbarangay'];
                    $purok=$_POST['purok'];
                    $famnum=$_POST['famnum'];

                    if($famnum==""){
                        $famnum=0;
                    }
                    $mothertongue=$_POST['mothertongue'];
                    $housetype=$_POST['housetype'];
                    $santoilet=$_POST['santoilet'];
                    $immunization=$_POST['immunization'];
                    $wra=$_POST['wra'];
                    $garbdisposal=$_POST['garbdisposal'];
                    $watersource=$_POST['watersource'];
                    $familyplan=$_POST['familyplan'];
                    $bground=$_POST['bground'];
                    $livestat=$_POST['livestat'];
                    $animals=$_POST['animals'];
                    $blinddrain=$_POST['blinddrain'];
                    $communication=$_POST['communication'];
                    $homestat=$_POST['homestat'];
                    $energysource=$_POST['energysource'];
                    $dwtwbd=$_POST['dwtwbd'];
                    $vulstat=$_POST['vulstat'];
                    $agrifacil=$_POST['agrifacil'];
                    $osoi=$_POST['osoi'];
                    $housestat=$_POST['housestat'];
                    $transportation=$_POST['transportation'];

                    $maininfo="INSERT INTO `table1` (`id`,`barangay`,`purok`,`famnum`,`mothertongue`,`housetype`,`santoilet`,`immunization`,`wra`,`garbdisposal`,`watersource`,`familyplan`,`bground`,`livestat`,`animals`,`blinddrain`,`communication`,`homestat`,`energysource`,`dwtwbd`,`vulstat`,`agrifacil`,`osoi`,`housestat`,`transportation`) VALUES ('$id','$barangay','$purok','$famnum','$mothertongue','$housetype','$santoilet','$immunization','$wra','$garbdisposal','$watersource','$familyplan','$bground','$livestat','$animals','$blinddrain','$communication','$homestat','$energysource','$dwtwbd','$vulstat','$agrifacil','$osoi','$housestat','$transportation')";
                    $maininforesult=mysqli_query($conn,$maininfo);

                    $hfname=$_POST['hfname'];
                    $hmname=$_POST['hmname'];
                    $hlname=$_POST['hlname'];
                    $hdependency=$_POST['hdependency'];
                    $htribe=$_POST['htribe'];
                    $hsex=$_POST['hsex'];
                    $hbdate=$_POST['hbdate'];
                    $hage=$_POST['hage'];
                    $hreligion=$_POST['hreligion'];
                    $heducation=$_POST['heducation'];
                    $hoccupation=$_POST['hoccupation'];
                    $hpwd=$_POST['hpwd'];
                    $hip=$_POST['hip'];
                    $hphilhealth=$_POST['hphilhealth'];
                    $hbreastfeed=$_POST['hbreastfeed'];
                    $hntp=$_POST['hntp'];
                    $hsmooking=$_POST['hsmooking'];
                    $hfourps=$_POST['hfourps'];

                    if($hfname=="" && $hmname=="" && $hlname==""){
                        $memberinfo="INSERT INTO `table2` (`mainid`,`fullname`,`fname`,`mname`,`lname`,`horm`,`dependency`,`tribe`,`sex`,`bdate`,`age`,`religion`,`education`,`occupation`,`relation`,`pwd`,`ip`,`philhealth`,`breastfeed`,`ntp`,`smooking`,`fourps`) VALUES ('$id','No Information Given','$hfname','$hmname','$hlname','Head','$hdependency','$htribe','$hsex','$hbdate','$hage','$hreligion','$heducation','$hoccupation','Head','$hpwd','$hip','$hphilhealth','$hbreastfeed','$hntp','$hsmooking','$hfourps')";
                        $memberinforesult=mysqli_query($conn,$memberinfo);
                    }

                    else{
                        $memberinfo="INSERT INTO `table2` (`mainid`,`fullname`,`fname`,`mname`,`lname`,`horm`,`dependency`,`tribe`,`sex`,`bdate`,`age`,`religion`,`education`,`occupation`,`relation`,`pwd`,`ip`,`philhealth`,`breastfeed`,`ntp`,`smooking`,`fourps`) VALUES ('$id','$hfname $hmname $hlname','$hfname','$hmname','$hlname','Head','$hdependency','$htribe','$hsex','$hbdate','$hage','$hreligion','$heducation','$hoccupation','Head','$hpwd','$hip','$hphilhealth','$hbreastfeed','$hntp','$hsmooking','$hfourps')";
                        $memberinforesult=mysqli_query($conn,$memberinfo);
                    }

                    for($i=0;$i<$famnum;$i++){
                       

                        $fname=$_POST['fname'.$i];
                        $mname=$_POST['mname'.$i];
                        $lname=$_POST['lname'.$i];
                        $dependency=$_POST['dependency'.$i];
                        $tribe=$_POST['tribe'.$i];
                        $sex=$_POST['sex'.$i];
                        $bdate=$_POST['bdate'.$i];
                        $age=$_POST['age'.$i];
                        $religion=$_POST['religion'.$i];
                        $education=$_POST['education'.$i];
                        $occupation=$_POST['occupation'.$i];
                        $relation=$_POST['relation'.$i];
                        $pwd=$_POST['pwd'.$i];
                        $ip=$_POST['ip'.$i];
                        $philhealth=$_POST['philhealth'.$i];
                        $breastfeed=$_POST['breastfeed'.$i];
                        $ntp=$_POST['ntp'.$i];
                        $smooking=$_POST['smooking'.$i];
                        $fourps=$_POST['fourps'.$i];

                        if($fname=="" && $mname=="" && $lname==""){
                            $memberinfo1="INSERT INTO `table2` (`mainid`,`fullname`,`fname`,`mname`,`lname`,`horm`,`dependency`,`tribe`,`sex`,`bdate`,`age`,`religion`,`education`,`occupation`,`relation`,`pwd`,`ip`,`philhealth`,`breastfeed`,`ntp`,`smooking`,`fourps`) VALUES ('$id','No Information Given','$fname','$mname','$lname','Member','$dependency','$tribe','$sex','$bdate','$age','$religion','$education','$occupation','$relation','$pwd','$ip','$philhealth','$breastfeed','$ntp','$smooking','$fourps')";
                            $memberinforesult1=mysqli_query($conn,$memberinfo1);
                        }

                        else{
                            $memberinfo1="INSERT INTO `table2` (`mainid`,`fullname`,`fname`,`mname`,`lname`,`horm`,`dependency`,`tribe`,`sex`,`bdate`,`age`,`religion`,`education`,`occupation`,`relation`,`pwd`,`ip`,`philhealth`,`breastfeed`,`ntp`,`smooking`,`fourps`) VALUES ('$id','$fname $mname $lname','$fname','$mname','$lname','Member','$dependency','$tribe','$sex','$bdate','$age','$religion','$education','$occupation','$relation','$pwd','$ip','$philhealth','$breastfeed','$ntp','$smooking','$fourps')";
                            $memberinforesult1=mysqli_query($conn,$memberinfo1);
                        }
  
                    }

                    

                    $searchfarmingid="SELECT * FROM `table1` WHERE id='$id'";
                    $searchresult=mysqli_query($conn,$searchfarmingid);
                    $hiddenfarm=$_POST['hiddenfarm'];
                    while($rowsearch=mysqli_fetch_array($searchresult)){
                        for($z=0;$z<$hiddenfarm;$z++){
                            $product=$_POST['product'.$z];

                            $productinfo="INSERT INTO `table4` (`farmingid`,`product`) VALUES ('$rowsearch[farmingid]','$product')";
                            $productinsert=mysqli_query($conn,$productinfo);
                        }
                    }
                 if($maininforesult){

                    if($hfname=="" && $hmname=="" && $hlname==""){
                        ?> <script> alert("Data Entered Successfully, But No Information Given") </script> <?php
                    }

                    else{
                        ?> <script> alert("Data Entered Successfully") </script> <?php
                    }
                 
                }
                
                }
                ?>
</head>

<style>
       
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');


*{
        margin: 0;
        padding: 0;
        outline:none;
    }

    body,html{
        min-width:1300px;
        height:100%;
        font-family: 'Poppins', sans-serif;
        font-size: 30px;
    }

    .main{
        min-height: 100%;
    }

    .container{
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

    .btn-wrapper{
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
    .leftdiv{
        width: 18%;
        background:#40AEDE;
        position: relative;
        min-height:100vh;
    }

    .leftdiv .navbar-container{
        position: sticky;
        top:0;
        padding-bottom: 50px;
        color:white;
    }

    .navbar-container .title{
        font-size: 2rem;
        padding: 20px 0 20px 20px;
        width:80%;
    }

    ul{
        margin-top: 50px;
    }

    ul li{
        padding:20px 0 20px 20px;
        font-size: 0.7rem;
        cursor: pointer;
    }

    ul li:hover{
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
        margin-top:100px;
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
        font-family: 'Poppins', sans-serif;
        margin-left:30px;
        font-size:0.7rem;
        cursor: pointer;
    }


    /*------*/




    /* RIGHT DIV ELEMENTS */

    
    .rightdiv{
        width:1200px;
        background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.2)),url('pattern.jpg') ;
        z-index: 1;
    }
    
    

    .form-container{
        margin:20px;
    }

    .divinfo input, #demo input, #product-div input{
        outline:none;
        border:1px solid black;
        font-size:15px;
    }   

    input{
        outline:none;
    }

    .rightdiv-container{
        width:950px;
        margin:20px auto;
        
    }

    #demo{
        max-height:400px;
        overflow:auto;
        margin-bottom:10px;
        padding:10px;
    }

    .product-input{
        margin-right:15px;
        margin-bottom:5px;

    }

    #pass{
        cursor:pointer;
        outline:none;
        border:2px solid #40AEDE;
        font-weight:bold;
        font-size:15px;
        color:white;
        background:#40AEDE;
        margin:0 auto;
        margin-bottom:30px;
    }

    #pass:hover{
        background:green;
        color:white;
        border:2px solid #40AEDE;
    }
    
    
    /*-----*/

    .logouthover{
        margin-top:70px;
        padding:10px 0 18px 15px;
        cursor:pointer;
        background:orange;
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

    label{
        font-size:15px;
        font-family: 'Raleway', sans-serif;
        font-style:italic;
        margin-right:20px;
        
    }

    .background-info-div{
        display:block;
        float:left; 
        margin-bottom:20px; 
        margin-right:10px;
    }

    .background-info-label{
        display:block;
        transform:translateY(0.3em);
    }

    
    
</style>

<body>

    <div class="main">
        <div class="container" id="container">
                <!-- hamburger button -->    
                <div class="btn-div" id="btn-div">
                    <div class="btn-wrapper" id="btn-wrapper">
                        <div class="hamburger-btn icon">
                            <span class="line top"></span>
                            <span class="line mid"></span>
                            <span class="line bot"></span>
                        </div>
                    </div>
                </div>
                <!-- hamburger button -->

                <!-- Left divison -->        
                <div class="leftdiv" id="leftdiv">
                    <div class="navbar-container">
                        <nav>
                            <div class="title"><i class="fas fa-database" style="margin-right:10px;font-size:50px"></i>BDS</div>
                            <div>
                                <ul>
                                    <a style="color:white;text-decoration:none" href="home.php"><li><i class="fas fa-home" style="margin-right:10px;"></i>Home</li></a>
                                    <a style="color:white;text-decoration:none" href="enter.php"><li><i class="fas fa-sign-in-alt" style="margin-right:10px;"></i>Enter Data</li></a>
                                    <a style="color:white;text-decoration:none" href="search.php"><li id="searchdatabtn"><i class="fas fa-search" style="margin-right:10px;"></i>Search Data</li></a>
                                </ul>
                            </div>
                            
                            <form action="login.php" method="POST">
                            <button class="logout" id="logout" name="logout" ><i class="fas fa-sign-out-alt" style="font-size:23px;margin-right:10px"></i>Logout</button>
                            </form>
                        </nav>
                    </div>
                </div>
                <!-- Left divison -->  

                <div class="rightdiv" id="rightdiv">
                <div class="rightdiv-container" style="box-shadow:0px 0px 10px 2px black;color:black;background:white;border-radius:0px;border-bottom:20px solid #40AEDE;border-right:2px solid #40AEDE;border-left:2px solid #40AEDE">
                <div style="background:#40AEDE;color:white;text-align:center;padding:20px 0px;">
                <p style="letter-spacing:2px;font-family: 'Raleway', sans-serif;font-size:35px;width:100%;">Family Information Form <i class="fas fa-book-open"> </i> </p>
                <p style="font-size:15px;margin-top:20px">Please fill up or provide the information needed in the form, Thank you !</p>
                </div>
                <form name="form1" style="padding:20px;" class="form1" method="POST" action="">
                    
                    <div class="divinfo">
                    <input type="hidden" name="id" id="id" /></br>
                    <!--<label>Household Number:</label>
                    <input type="number" name="hhnum" id="hhnum1" placeholder="Household Number"  /></br></br></br></br>
                    -->
                    <p style="font-size:20px;font-family: 'Raleway', sans-serif;margin-bottom:20px;margin-top:10px"><b>Head Information</b></p>
                    <p style="font-size:17px;font-family: 'Raleway', sans-serif;"><b>Name</b></p>
                    
                    <div style="display:block;float:left;margin-right:10px;">
                    <label style="display:block;transform:translateY(0.3em);margin-bottom:7px;margin-top:10px">First Name: </label><input type="text" style="width:240px;height:38px;padding-left:10px;border-radius:5px;" class="headinput" name="hfname" id="hfname" placeholder="" />
                    </div>

                    <div style="display:block;float:left;margin-right:10px;">
                    <label style="display:block;transform:translateY(0.3em);margin-bottom:7px;margin-top:10px">Middle Name: </label><input type="text" style="width:240px;height:38px;padding-left:10px;border-radius:5px;" class="headinput" name="hmname" id="hmname" placeholder="" />
                    </div>

                    <div style="display:block;float:left;margin-right:10px;">
                    <label style="display:block;transform:translateY(0.3em);margin-bottom:7px;margin-top:10px">Last Name: </label><input type="text" style="width:240px;height:38px;padding-left:10px;border-radius:5px;" class="headinput" name="hlname" id="hlname" placeholder="" />
                    </div>

                    <br style="clear:both;"/>
                    
                    <input type="hidden" name="hdependency" id="hdependency"/></br>
                    <p style="font-size:17px;font-family: 'Raleway', sans-serif;margin-top:30px;margin-bottom:10px;"><b>Other Informations</b></p>

                    <div class="background-info-div">
                    <label class="background-info-label">Dependency</label>
                    <select id="selectdependency" onclick="dependency()" style="border-radius:5px;padding-left:10px;font-size:15px;cursor:pointer;border:1px solid black;width:250px;height:40px;margin-top:10px;">
                        <option value="" id="dependency1"></option>
                        <option value="Dependent" id="dependency3">Dependent</option>
                        <option value="Independent" id="dependency2">Independent</option>
                    </select>
                    </div>
                    <script>
                        function dependency(){
                            var getselectdependency=document.getElementById("selectdependency").value;

                                if(getselectdependency==""){
                                    var getdependency=document.getElementById("dependency1").value;
                                    var gethdependency=document.getElementById("hdependency");

                                    gethdependency.setAttribute("value",getdependency);
                                }

                                if(getselectdependency=="Independent"){
                                    var getdependency=document.getElementById("dependency2").value;
                                    var gethdependency=document.getElementById("hdependency");

                                    gethdependency.setAttribute("value",getdependency);
                                }

                                if(getselectdependency=="Dependent"){
                                    var getdependency=document.getElementById("dependency3").value;
                                    var gethdependency=document.getElementById("hdependency");

                                    gethdependency.setAttribute("value",getdependency);
                                }
                        }
                    </script>

                    <input type="hidden" name="htribe" id="htribe"/>                    
                    <div class="background-info-div">
                    <label class="background-info-label">Tribe</label>
                    <select id="selecttribe" onclick="tribe()" style="border-radius:5px;padding-left:10px;font-size:15px;cursor:pointer;border:1px solid black;width:250px;height:40px;margin-top:10px;">
                        <option id="tribe1" value=""></option>
                        <option id="tribe2" value="Aeta">Aeta</option>
                        <option id="tribe3" value="Ati">Ati</option>
                        <option id="tribe4" value="Blaan">Blaan</option>
                        <option id="tribe5" value="Badjao">Badjao</option>
                        <option id="tribe6" value="Bagobo">Bagobo</option>
                        <option id="tribe7" value="Bikolano">Bikolano</option>
                        <option id="tribe8" value="Cebuano">Cebuano</option>
                        <option id="tribe9" value="Igorot">Igorot</option>
                        <option id="tribe10" value="Ilonggo">Ilonggo</option>
                        <option id="tribe11" value="Ilokano">Ilokano</option>
                        <option id="tribe12" value="Ivatan">Ivatan</option>
                        <option id="tribe13" value="Kapampangan">Kapampangan</option>
                        <option id="tribe14" value="Mangyan">Mangyan</option>
                        <option id="tribe15" value="Maranao">Maranao</option>
                        <option id="tribe16" value="Suludnon">Suludnon</option>
                        <option id="tribe17" value="Tboli">Tboli</option>
                        <option id="tribe18" value="Tagalog">Tagalog</option>
                        <option id="tribe19" value="Tausog">Tausog</option>
                        <option id="tribe20" value="Waray">Waray</option>
                        <option id="tribe21" value="Yakan">Yakan</option>
                    </select>
                    </div>
                    <script>
                        function tribe(){
                            var getselecttribe=document.getElementById("selecttribe").value;

                                if(getselecttribe==""){
                                    var gettribe=document.getElementById("tribe1").value;
                                    var gethtribe=document.getElementById("htribe");

                                    gethtribe.setAttribute("value",gettribe);
                                }

                                if(getselecttribe=="Aeta"){
                                    var gettribe=document.getElementById("tribe2").value;
                                    var gethtribe=document.getElementById("htribe");

                                    gethtribe.setAttribute("value",gettribe);
                                }

                                if(getselecttribe=="Ati"){
                                    var gettribe=document.getElementById("tribe3").value;
                                    var gethtribe=document.getElementById("htribe");

                                    gethtribe.setAttribute("value",gettribe);
                                }

                                if(getselecttribe=="Blaan"){
                                    var gettribe=document.getElementById("tribe4").value;
                                    var gethtribe=document.getElementById("htribe");

                                    gethtribe.setAttribute("value",gettribe);
                                }

                                if(getselecttribe=="Badjao"){
                                    var gettribe=document.getElementById("tribe5").value;
                                    var gethtribe=document.getElementById("htribe");

                                    gethtribe.setAttribute("value",gettribe);
                                }

                                if(getselecttribe=="Bagobo"){
                                    var gettribe=document.getElementById("tribe6").value;
                                    var gethtribe=document.getElementById("htribe");

                                    gethtribe.setAttribute("value",gettribe);
                                }

                                if(getselecttribe=="Bikolano"){
                                    var gettribe=document.getElementById("tribe7").value;
                                    var gethtribe=document.getElementById("htribe");

                                    gethtribe.setAttribute("value",gettribe);
                                }

                                if(getselecttribe=="Cebuano"){
                                    var gettribe=document.getElementById("tribe8").value;
                                    var gethtribe=document.getElementById("htribe");

                                    gethtribe.setAttribute("value",gettribe);
                                }

                                if(getselecttribe=="Igorot"){
                                    var gettribe=document.getElementById("tribe9").value;
                                    var gethtribe=document.getElementById("htribe");

                                    gethtribe.setAttribute("value",gettribe);
                                }

                                if(getselecttribe=="Ilonggo"){
                                    var gettribe=document.getElementById("tribe10").value;
                                    var gethtribe=document.getElementById("htribe");

                                    gethtribe.setAttribute("value",gettribe);
                                }

                                if(getselecttribe=="Ilokano"){
                                    var gettribe=document.getElementById("tribe11").value;
                                    var gethtribe=document.getElementById("htribe");

                                    gethtribe.setAttribute("value",gettribe);
                                }

                                if(getselecttribe=="Ivatan"){
                                    var gettribe=document.getElementById("tribe12").value;
                                    var gethtribe=document.getElementById("htribe");

                                    gethtribe.setAttribute("value",gettribe);
                                }

                                if(getselecttribe=="Kapampangan"){
                                    var gettribe=document.getElementById("tribe13").value;
                                    var gethtribe=document.getElementById("htribe");

                                    gethtribe.setAttribute("value",gettribe);
                                }

                                if(getselecttribe=="Mangyan"){
                                    var gettribe=document.getElementById("tribe14").value;
                                    var gethtribe=document.getElementById("htribe");

                                    gethtribe.setAttribute("value",gettribe);
                                }

                                if(getselecttribe=="Maranao"){
                                    var gettribe=document.getElementById("tribe15").value;
                                    var gethtribe=document.getElementById("htribe");

                                    gethtribe.setAttribute("value",gettribe);
                                }

                                if(getselecttribe=="Suludnon"){
                                    var gettribe=document.getElementById("tribe16").value;
                                    var gethtribe=document.getElementById("htribe");

                                    gethtribe.setAttribute("value",gettribe);
                                }

                                if(getselecttribe=="Tboli"){
                                    var gettribe=document.getElementById("tribe17").value;
                                    var gethtribe=document.getElementById("htribe");

                                    gethtribe.setAttribute("value",gettribe);
                                }

                                if(getselecttribe=="Tagalog"){
                                    var gettribe=document.getElementById("tribe18").value;
                                    var gethtribe=document.getElementById("htribe");

                                    gethtribe.setAttribute("value",gettribe);
                                }

                                if(getselecttribe=="Tausog"){
                                    var gettribe=document.getElementById("tribe19").value;
                                    var gethtribe=document.getElementById("htribe");

                                    gethtribe.setAttribute("value",gettribe);
                                }

                                if(getselecttribe=="Waray"){
                                    var gettribe=document.getElementById("tribe20").value;
                                    var gethtribe=document.getElementById("htribe");

                                    gethtribe.setAttribute("value",gettribe);
                                }

                                if(getselecttribe=="Yakan"){
                                    var gettribe=document.getElementById("tribe21").value;
                                    var gethtribe=document.getElementById("htribe");

                                    gethtribe.setAttribute("value",gettribe);
                                }
                        }
                    </script>


                    <input  type="hidden" name="hsex" id="hsex"/>                    
                    <div class="background-info-div">
                    <label class="background-info-label">Sex</label>
                    <select id="selectsex" onclick="sex()" style="border-radius:5px;padding-left:10px;font-size:15px;cursor:pointer;border:1px solid black;width:250px;height:40px;margin-top:10px;">
                        <option id="gender1" value=""></option>
                        <option id="gender2" value="Male">Male</option>
                        <option id="gender3" value="Female">Female</option>
                    </select>
                    </div>
                    <script>
                        function sex(){
                            var getselectsex=document.getElementById("selectsex").value;

                                if(getselectsex==""){
                                    var getsex=document.getElementById("gender1").value;
                                    var gethsex=document.getElementById("hsex");

                                    gethsex.setAttribute("value",getsex);
                                }

                                if(getselectsex=="Male"){
                                    var getsex=document.getElementById("gender2").value;
                                    var gethsex=document.getElementById("hsex");

                                    gethsex.setAttribute("value",getsex);
                                }

                                if(getselectsex=="Female"){
                                    var getsex=document.getElementById("gender3").value;
                                    var gethsex=document.getElementById("hsex");

                                    gethsex.setAttribute("value",getsex);
                                }
                        }
                    </script>

                    <div class="background-info-div">
                    <label class="background-info-label">Birth Date</label>
                    <input type="date" name="hbdate" id="hbdate"  style="border-radius:5px;padding-left:10px;font-size:15px;cursor:pointer;width:240px;height:38px;margin-top:10px"/>
                    </div>

                    <div style="display:block;float:left;">
                    <label style="display:block;transform:translateY(0.3em);margin-bottom:8px;padding-left:10px">Age</label> 
                    <input placeholder="" style="width:240px;height:38px;padding-left:10px;border-radius:5px;margin-right:10px;" class="headinput" type="number" name="hage" style="width:250px;margin-bottom:10px" id="hage" />
                    </div>

                    <div class="background-info-div">
                    <label class="background-info-label">Religion</label>
                    <input type="hidden" name="hreligion" id="hreligion" />
                    <select id="selectreligion" onclick="religion()" style="border-radius:5px;padding-left:10px;font-size:15px;cursor:pointer;border:1px solid black;width:250px;height:40px;margin-top:10px;">
                        <option id="religion1" value=""></option>
                        <option id="religion2" value="Aglipay">Aglipay</option>
                        <option id="religion3" value="Alliance">Alliance</option>
                        <option id="religion4" value="Baptist">Baptist</option>
                        <option id="religion5" value="Born Again">Born Again</option>
                        <option id="religion6" value="Christian">Christian</option>
                        <option id="religion7" value="Epescopal">Epescopal</option>
                        <option id="religion8" value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                        <option id="religion9" value="Islam">Islam</option>
                        <option id="religion10" value="Jehovahs Witness">Jehovahs Witness</option>
                        <option id="religion11" value="Pentecost">Pentecost</option>
                        <option id="religion12" value="Protestant">Protestant</option>
                        <option id="religion13" value="Roman Catholic">Roman Catholic</option>
                        <option id="religion14" value="Seventh Day Adventist">Seventh Day Adventist</option>
                    </select>
                    </div>
                    <script>
                        function religion(){
                            var getselectreligion=document.getElementById("selectreligion").value;

                                if(getselectreligion==""){
                                    var getreligion=document.getElementById("religion1").value;
                                    var gethreligion=document.getElementById("hreligion");

                                    gethreligion.setAttribute("value",getreligion);
                                }

                                if(getselectreligion=="Aglipay"){
                                    var getreligion=document.getElementById("religion2").value;
                                    var gethreligion=document.getElementById("hreligion");

                                    gethreligion.setAttribute("value",getreligion);
                                }

                                if(getselectreligion=="Alliance"){
                                    var getreligion=document.getElementById("religion3").value;
                                    var gethreligion=document.getElementById("hreligion");

                                    gethreligion.setAttribute("value",getreligion);
                                }

                                if(getselectreligion=="Baptist"){
                                    var getreligion=document.getElementById("religion4").value;
                                    var gethreligion=document.getElementById("hreligion");

                                    gethreligion.setAttribute("value",getreligion);
                                }

                                if(getselectreligion=="Born Again"){
                                    var getreligion=document.getElementById("religion5").value;
                                    var gethreligion=document.getElementById("hreligion");

                                    gethreligion.setAttribute("value",getreligion);
                                }

                                if(getselectreligion=="Christian"){
                                    var getreligion=document.getElementById("religion6").value;
                                    var gethreligion=document.getElementById("hreligion");

                                    gethreligion.setAttribute("value",getreligion);
                                }

                                if(getselectreligion=="Epescopal"){
                                    var getreligion=document.getElementById("religion7").value;
                                    var gethreligion=document.getElementById("hreligion");

                                    gethreligion.setAttribute("value",getreligion);
                                }

                                if(getselectreligion=="Iglesia ni Cristo"){
                                    var getreligion=document.getElementById("religion8").value;
                                    var gethreligion=document.getElementById("hreligion");

                                    gethreligion.setAttribute("value",getreligion);
                                }

                                if(getselectreligion=="Islam"){
                                    var getreligion=document.getElementById("religion9").value;
                                    var gethreligion=document.getElementById("hreligion");

                                    gethreligion.setAttribute("value",getreligion);
                                }

                                if(getselectreligion=="Jehovahs Witness"){
                                    var getreligion=document.getElementById("religion10").value;
                                    var gethreligion=document.getElementById("hreligion");

                                    gethreligion.setAttribute("value",getreligion);
                                }

                                if(getselectreligion=="Pentecost"){
                                    var getreligion=document.getElementById("religion11").value;
                                    var gethreligion=document.getElementById("hreligion");

                                    gethreligion.setAttribute("value",getreligion);
                                }

                                if(getselectreligion=="Protestant"){
                                    var getreligion=document.getElementById("religion12").value;
                                    var gethreligion=document.getElementById("hreligion");

                                    gethreligion.setAttribute("value",getreligion);
                                }

                                if(getselectreligion=="Roman Catholic"){
                                    var getreligion=document.getElementById("religion13").value;
                                    var gethreligion=document.getElementById("hreligion");

                                    gethreligion.setAttribute("value",getreligion);
                                }

                                if(getselectreligion=="Seventh Day Adventist"){
                                    var getreligion=document.getElementById("religion14").value;
                                    var gethreligion=document.getElementById("hreligion");

                                    gethreligion.setAttribute("value",getreligion);
                                }
                        }
                    </script>
                    
                    <div class="background-info-div">
                    <label class="background-info-label">Education (Highest)</label>
                    <input type="hidden" name="heducation" id="heducation" />
                    <select id="selecteducation" onclick="education()"  style="border-radius:5px;padding-left:10px;font-size:15px;cursor:pointer;border:1px solid black;width:250px;height:40px;margin-top:10px;">
                        <option id="education1" value=""></option>
                        <option id="education2" value="Not Attended">Not Attended</option>
                        <option id="education3" value="ALS">ALS</option>
                        <option id="education4" value="Vocational">Vocational</option>
                        <option id="education5" value="Kinder Garten">Kinder Garten</option>
                        <option id="education6" value="Elementary Level">Elementary Level</option>
                        <option id="education7" value="Elementary Graduate">Elementary Graduate</option>
                        <option id="education8" value="High School Level">High School Level</option>
                        <option id="education9" value="High School Graduate">High School Graduate</option>
                        <option id="education10" value="Senior High School Level">Senior High School Level</option>
                        <option id="education11" value="Senior High School Graduate">Senior High School Graduate</option>
                        <option id="education12" value="College Level">College Level</option>
                        <option id="education13" value="College Graduate">College Graduate</option>
                    </select>
                    </div>
                    <script>
                        function education(){
                            var getselecteducation=document.getElementById("selecteducation").value;

                                if(getselecteducation==""){
                                    var geteducation=document.getElementById("education1").value;
                                    var getheducation=document.getElementById("heducation");

                                    getheducation.setAttribute("value",geteducation);
                                }
                                

                                if(getselecteducation=="Not Attended"){
                                    var geteducation=document.getElementById("education2").value;
                                    var getheducation=document.getElementById("heducation");

                                    getheducation.setAttribute("value",geteducation);
                                }

                                
                                if(getselecteducation=="ALS"){
                                    var geteducation=document.getElementById("education3").value;
                                    var getheducation=document.getElementById("heducation");

                                    getheducation.setAttribute("value",geteducation);
                                }

                                
                                if(getselecteducation=="Vocational"){
                                    var geteducation=document.getElementById("education4").value;
                                    var getheducation=document.getElementById("heducation");

                                    getheducation.setAttribute("value",geteducation);
                                }


                                if(getselecteducation=="Kinder Garten"){
                                    var geteducation=document.getElementById("education5").value;
                                    var getheducation=document.getElementById("heducation");

                                    getheducation.setAttribute("value",geteducation);
                                }


                                if(getselecteducation=="Elementary Level"){
                                    var geteducation=document.getElementById("education6").value;
                                    var getheducation=document.getElementById("heducation");

                                    getheducation.setAttribute("value",geteducation);
                                }

                                if(getselecteducation=="Elementary Graduate"){
                                    var geteducation=document.getElementById("education7").value;
                                    var getheducation=document.getElementById("heducation");

                                    getheducation.setAttribute("value",geteducation);
                                }

                                if(getselecteducation=="High School Level"){
                                    var geteducation=document.getElementById("education8").value;
                                    var getheducation=document.getElementById("heducation");

                                    getheducation.setAttribute("value",geteducation);
                                }

                                if(getselecteducation=="High School Graduate"){
                                    var geteducation=document.getElementById("education9").value;
                                    var getheducation=document.getElementById("heducation");

                                    getheducation.setAttribute("value",geteducation);
                                }

                                if(getselecteducation=="Senior High School Level"){
                                    var geteducation=document.getElementById("education10").value;
                                    var getheducation=document.getElementById("heducation");

                                    getheducation.setAttribute("value",geteducation);
                                }

                                if(getselecteducation=="Senior High School Graduate"){
                                    var geteducation=document.getElementById("education11").value;
                                    var getheducation=document.getElementById("heducation");

                                    getheducation.setAttribute("value",geteducation);
                                }

                                if(getselecteducation=="College Level"){
                                    var geteducation=document.getElementById("education12").value;
                                    var getheducation=document.getElementById("heducation");

                                    getheducation.setAttribute("value",geteducation);
                                }

                                if(getselecteducation=="College Graduate"){
                                    var geteducation=document.getElementById("education13").value;
                                    var getheducation=document.getElementById("heducation");

                                    getheducation.setAttribute("value",geteducation);
                                }

                        }
                    </script>

                    <div class="background-info-div">
                    <label class="background-info-label">Occupation</label>
                    <input placeholder="" class="headinput" style="border-radius:5px;padding-left:10px;font-size:15px;width:240px;height:38px;margin-top:10px" type="text" name="hoccupation" id="hoccupation" />
                    </div>
                    
                    <br style="clear:both;" />

                    <p style="font-size:17px;font-family: 'Raleway', sans-serif;margin-top:40px;float:left"><b>Other Status</b></p>

                    <br style="clear:both;" />

                    <div class="background-info-div">
                    <label class="background-info-label">PWD</label>
                    <input type="hidden" name="hpwd" id="hpwd" />
                    <select id="selectpwd" onclick="pwd()" style="border-radius:5px;padding-left:10px;font-size:15px;cursor:pointer;border:1px solid black;width:250px;height:40px;margin-top:10px;">
                        <option id="pwd1" value=""></option>
                        <option id="pwd3" value="Yes">Yes</option>
                        <option id="pwd2" value="No">No</option>
                        <option id="pwd4" value="N/A">N/A</option>
                    </select></br>
                    </div>
                    <script>
                        function pwd(){
                            var getselectpwd=document.getElementById("selectpwd").value;

                                if(getselectpwd==""){
                                    var getpwd=document.getElementById("pwd1").value;
                                    var gethpwd=document.getElementById("hpwd");

                                    gethpwd.setAttribute("value",getpwd);
                                }

                                if(getselectpwd=="No"){
                                    var getpwd=document.getElementById("pwd2").value;
                                    var gethpwd=document.getElementById("hpwd");

                                    gethpwd.setAttribute("value",getpwd);
                                }

                                if(getselectpwd=="Yes"){
                                    var getpwd=document.getElementById("pwd3").value;
                                    var gethpwd=document.getElementById("hpwd");

                                    gethpwd.setAttribute("value",getpwd);
                                }

                                if(getselectpwd=="N/A"){
                                    var getpwd=document.getElementById("pwd4").value;
                                    var gethpwd=document.getElementById("hpwd");

                                    gethpwd.setAttribute("value",getpwd);
                                }
                        }
                    </script>

                    <div class="background-info-div">
                    <label class="background-info-label">IP: </label>
                    <input type="hidden" name="hip" id="hip" />
                    <select id="selectip" onclick="ip()"  style="border-radius:5px;padding-left:10px;font-size:15px;cursor:pointer;border:1px solid black;width:250px;height:40px;margin-top:10px;">
                        <option id="ip1" value=""></option>
                        <option id="ip3" value="Yes">Yes</option>
                        <option id="ip2" value="No">No</option>
                        <option id="ip4" value="N/A">N/A</option>
                    </select>
                    </div>
                    <script>
                        function ip(){
                            var getselectip=document.getElementById("selectip").value;

                                if(getselectip==""){
                                    var getip=document.getElementById("ip1").value;
                                    var gethip=document.getElementById("hip");

                                    gethip.setAttribute("value",getip);
                                }

                                if(getselectip=="No"){
                                    var getip=document.getElementById("ip2").value;
                                    var gethip=document.getElementById("hip");

                                    gethip.setAttribute("value",getip);
                                }

                                if(getselectip=="Yes"){
                                    var getip=document.getElementById("ip3").value;
                                    var gethip=document.getElementById("hip");

                                    gethip.setAttribute("value",getip);
                                }

                                if(getselectip=="N/A"){
                                    var getip=document.getElementById("ip4").value;
                                    var gethip=document.getElementById("hip");

                                    gethip.setAttribute("value",getip);
                                }
                        }
                    </script>

                    <div class="background-info-div">
                    <label class="background-info-label">Philhealth: </label>
                    <input type="hidden" name="hphilhealth" id="hphilhealth" />
                    <select id="selectphilhealth" onclick="philhealth()" style="border-radius:5px;padding-left:10px;font-size:15px;cursor:pointer;border:1px solid black;width:250px;height:40px;margin-top:10px;">
                        <option id="philhealth1" value=""></option>
                        <option id="philhealth3" value="Yes">Yes</option>
                        <option id="philhealth2" value="No">No</option>
                        <option id="philhealth4" value="N/A">N/A</option>
                    </select>
                    </div>
                    <script>
                        function philhealth(){
                            var getselectphilhealth=document.getElementById("selectphilhealth").value;

                                if(getselectphilhealth==""){
                                    var getphilhealth=document.getElementById("philhealth1").value;
                                    var gethphilhealth=document.getElementById("hphilhealth");

                                    gethphilhealth.setAttribute("value",getphilhealth);
                                }

                                if(getselectphilhealth=="No"){
                                    var getphilhealth=document.getElementById("philhealth2").value;
                                    var gethphilhealth=document.getElementById("hphilhealth");

                                    gethphilhealth.setAttribute("value",getphilhealth);
                                }

                                if(getselectphilhealth=="Yes"){
                                    var getphilhealth=document.getElementById("philhealth3").value;
                                    var gethphilhealth=document.getElementById("hphilhealth");

                                    gethphilhealth.setAttribute("value",getphilhealth);
                                }

                                if(getselectphilhealth=="N/A"){
                                    var getphilhealth=document.getElementById("philhealth4").value;
                                    var gethphilhealth=document.getElementById("hphilhealth");

                                    gethphilhealth.setAttribute("value",getphilhealth);
                                }
                        }
                    </script>

                    <div class="background-info-div">
                    <label class="background-info-label">Breast Feeding: </label>
                    <input type="hidden" name="hbreastfeed" id="hbreastfeed" />
                    <select id="selectbreastfeed" onclick="breastfeed()" style="border-radius:5px;padding-left:10px;font-size:15px;cursor:pointer;border:1px solid black;width:250px;height:40px;margin-top:10px;">
                        <option id="breastfeed1" value=""></option>
                        <option id="breastfeed3" value="Yes">Yes</option>
                        <option id="breastfeed2" value="No">No</option>
                        <option id="breastfeed4" value="N/A">N/A</option>
                    </select>
                    </div>
                    <script>
                        function breastfeed(){
                            var getselectbreastfeed=document.getElementById("selectbreastfeed").value;

                                if(getselectbreastfeed==""){
                                    var getbreastfeed=document.getElementById("breastfeed1").value;
                                    var gethbreastfeed=document.getElementById("hbreastfeed");

                                    gethbreastfeed.setAttribute("value",getbreastfeed);
                                }

                                if(getselectbreastfeed=="No"){
                                    var getbreastfeed=document.getElementById("breastfeed2").value;
                                    var gethbreastfeed=document.getElementById("hbreastfeed");

                                    gethbreastfeed.setAttribute("value",getbreastfeed);
                                }

                                if(getselectbreastfeed=="Yes"){
                                    var getbreastfeed=document.getElementById("breastfeed3").value;
                                    var gethbreastfeed=document.getElementById("hbreastfeed");

                                    gethbreastfeed.setAttribute("value",getbreastfeed);
                                }

                                if(getselectbreastfeed=="N/A"){
                                    var getbreastfeed=document.getElementById("breastfeed4").value;
                                    var gethbreastfeed=document.getElementById("hbreastfeed");

                                    gethbreastfeed.setAttribute("value",getbreastfeed);
                                }
                        }
                    </script>

                    <div class="background-info-div">
                    <label class="background-info-label">NTP: </label>
                    <input type="hidden" name="hntp" id="hntp" />
                    <select id="selectntp" onclick="ntp()" style="border-radius:5px;padding-left:10px;font-size:15px;cursor:pointer;border:1px solid black;width:250px;height:40px;margin-top:10px;">
                        <option id="ntp1" value=""></option>
                        <option id="ntp3" value="Yes">Yes</option>
                        <option id="ntp2" value="No">No</option>
                        <option id="ntp4" value="N/A">N/A</option>
                    </select>
                    </div>
                    <script>
                        function ntp(){
                            var getselectntp=document.getElementById("selectntp").value;

                                if(getselectntp==""){
                                    var getntp=document.getElementById("ntp1").value;
                                    var gethntp=document.getElementById("hntp");

                                    gethntp.setAttribute("value",getntp);
                                }

                                if(getselectntp=="No"){
                                    var getntp=document.getElementById("ntp2").value;
                                    var gethntp=document.getElementById("hntp");

                                    gethntp.setAttribute("value",getntp);
                                }

                                if(getselectntp=="Yes"){
                                    var getntp=document.getElementById("ntp3").value;
                                    var gethntp=document.getElementById("hntp");

                                    gethntp.setAttribute("value",getntp);
                                }

                                if(getselectntp=="N/A"){
                                    var getntp=document.getElementById("ntp4").value;
                                    var gethntp=document.getElementById("hntp");

                                    gethntp.setAttribute("value",getntp);
                                }
                        }
                    </script>

                    <div class="background-info-div">
                    <label class="background-info-label">Smooking: </label>
                    <input type="hidden" name="hsmooking" id="hsmooking" />
                    <select id="selectsmooking" onclick="smooking()" style="border-radius:5px;padding-left:10px;font-size:15px;cursor:pointer;border:1px solid black;width:250px;height:40px;margin-top:10px;">
                        <option id="smooking1" value=""></option>
                        <option id="smooking3" value="Yes">Yes</option>
                        <option id="smooking2" value="No">No</option>
                        <option id="smooking4" value="N/A">N/A</option>
                    </select>
                    </div>
                    <script>
                        function smooking(){
                            var getselectsmooking=document.getElementById("selectsmooking").value;

                                if(getselectsmooking==""){
                                    var getsmooking=document.getElementById("smooking1").value;
                                    var gethsmooking=document.getElementById("hsmooking");

                                    gethsmooking.setAttribute("value",getsmooking);
                                }

                                if(getselectsmooking=="No"){
                                    var getsmooking=document.getElementById("smooking2").value;
                                    var gethsmooking=document.getElementById("hsmooking");

                                    gethsmooking.setAttribute("value",getsmooking);
                                }

                                if(getselectsmooking=="Yes"){
                                    var getsmooking=document.getElementById("smooking3").value;
                                    var gethsmooking=document.getElementById("hsmooking");

                                    gethsmooking.setAttribute("value",getsmooking);
                                }

                                if(getselectsmooking=="N/A"){
                                    var getsmooking=document.getElementById("smooking4").value;
                                    var gethsmooking=document.getElementById("hsmooking");

                                    gethsmooking.setAttribute("value",getsmooking);
                                }
                        }
                    </script>


                    <div class="background-info-div">
                    <label class="background-info-label">4Ps: </label>
                    <input type="hidden" name="hfourps" id="hfourps" />
                    <select id="selectfourps" onclick="fourps()" style="border-radius:5px;padding-left:10px;font-size:15px;cursor:pointer;border:1px solid black;width:250px;height:40px;margin-top:10px;">
                        <option id="fourps1" value=""></option>
                        <option id="fourps3" value="Yes">Yes</option>
                        <option id="fourps2" value="No">No</option>
                        <option id="fourps4" value="N/A">N/A</option>
                    </select>
                    </div>
                    <script>
                        function fourps(){
                            var getselectfourps=document.getElementById("selectfourps").value;

                                if(getselectfourps==""){
                                    var getfourps=document.getElementById("fourps1").value;
                                    var gethfourps=document.getElementById("hfourps");

                                    gethfourps.setAttribute("value",getfourps);
                                }

                                if(getselectfourps=="No"){
                                    var getfourps=document.getElementById("fourps2").value;
                                    var gethfourps=document.getElementById("hfourps");

                                    gethfourps.setAttribute("value",getfourps);
                                }

                                if(getselectfourps=="Yes"){
                                    var getfourps=document.getElementById("fourps3").value;
                                    var gethfourps=document.getElementById("hfourps");

                                    gethfourps.setAttribute("value",getfourps);
                                }

                                if(getselectfourps=="N/A"){
                                    var getfourps=document.getElementById("fourps4").value;
                                    var gethfourps=document.getElementById("hfourps");

                                    gethfourps.setAttribute("value",getfourps);
                                }
                        }
                    </script>

                    

                    <br style="clear:both;"/>
                    <div style="height:1px;background:black;width:100%;margin-top:70px"></div></br>

                    <p style="font-size:20px;font-family: 'Raleway', sans-serif;margin-bottom:10px"><b>Address</b></p>

                    <div class="background-info-div">
                    <label class="background-info-label">Purok: </label>
                    <input type="hidden" name="purok" id="purok" />
                    <select id="selectpurok" onclick="purokfunc()" style="border-radius:5px;padding-left:10px;font-size:15px;cursor:pointer;border:1px solid black;width:250px;height:40px;margin-top:10px;">
                        <option id="purok1" value=""></option>
                        <option id="purok2" value="Bagong Lipunan">Bagong Lipunan</option>
                        <option id="purok3" value="Diaz">Diaz</option>
                        <option id="purok4" value="Felipe">Felipe</option>
                        <option id="purok5" value="Lot A">Lot A</option>
                        <option id="purok6" value="Lot B">Lot B</option>
                        <option id="purok7" value="Lot C">Lot C</option>
                        <option id="purok8" value="Lot D">Lot D</option>
                        <option id="purok9" value="Lower Acub">Lower Acub</option>
                        <option id="puroK10" value="Mabinuligon">Mabinuligon</option>
                        <option id="purok11" value="Mabuhay">Mabuhay</option>
                        <option id="purok12" value="Maligaya">Maligaya</option>
                        <option id="purok13" value="Malipayon">Malipayon</option>
                        <option id="purok14" value="Montefrio 1">Montefrio 1</option>
                        <option id="purok15" value="Montefrio 2">Montefrio 2</option>
                        <option id="purok16" value="Upper Acub">Upper Acub</option>
                        
                    </select>
                    </div>
                    <script>
                        function purokfunc(){
                            var getselectpurok=document.getElementById("selectpurok").value;

                                if(getselectpurok==""){
                                    var getpurok=document.getElementById("purok1").value;
                                    var gethpurok=document.getElementById("purok");

                                    gethpurok.setAttribute("value",getpurok);
                                }

                                if(getselectpurok=="Bagong Lipunan"){
                                    var getpurok=document.getElementById("purok2").value;
                                    var gethpurok=document.getElementById("purok");

                                    gethpurok.setAttribute("value",getpurok);
                                }

                                if(getselectpurok=="Diaz"){
                                    var getpurok=document.getElementById("purok3").value;
                                    var gethpurok=document.getElementById("purok");

                                    gethpurok.setAttribute("value",getpurok);
                                }

                                if(getselectpurok=="Felipe"){
                                    var getpurok=document.getElementById("purok4").value;
                                    var gethpurok=document.getElementById("purok");

                                    gethpurok.setAttribute("value",getpurok);
                                }

                                if(getselectpurok=="Lot A"){
                                    var getpurok=document.getElementById("purok5").value;
                                    var gethpurok=document.getElementById("purok");

                                    gethpurok.setAttribute("value",getpurok);
                                }

                                if(getselectpurok=="Lot B"){
                                    var getpurok=document.getElementById("purok6").value;
                                    var gethpurok=document.getElementById("purok");

                                    gethpurok.setAttribute("value",getpurok);
                                }

                                if(getselectpurok=="Lot C"){
                                    var getpurok=document.getElementById("purok7").value;
                                    var gethpurok=document.getElementById("purok");

                                    gethpurok.setAttribute("value",getpurok);
                                }

                                if(getselectpurok=="Lot D"){
                                    var getpurok=document.getElementById("purok8").value;
                                    var gethpurok=document.getElementById("purok");

                                    gethpurok.setAttribute("value",getpurok);
                                }

                                if(getselectpurok=="Lower Acub"){
                                    var getpurok=document.getElementById("purok9").value;
                                    var gethpurok=document.getElementById("purok");

                                    gethpurok.setAttribute("value",getpurok);
                                }

                                if(getselectpurok=="Mabinuligon"){
                                    var getpurok=document.getElementById("purok10").value;
                                    var gethpurok=document.getElementById("purok");

                                    gethpurok.setAttribute("value",getpurok);
                                }

                                if(getselectpurok=="Mabuhay"){
                                    var getpurok=document.getElementById("purok11").value;
                                    var gethpurok=document.getElementById("purok");

                                    gethpurok.setAttribute("value",getpurok);
                                }

                                if(getselectpurok=="Maligaya"){
                                    var getpurok=document.getElementById("purok12").value;
                                    var gethpurok=document.getElementById("purok");

                                    gethpurok.setAttribute("value",getpurok);
                                }

                                if(getselectpurok=="Malipayon"){
                                    var getpurok=document.getElementById("purok13").value;
                                    var gethpurok=document.getElementById("purok");

                                    gethpurok.setAttribute("value",getpurok);
                                }

                                if(getselectpurok=="Montefrio 1"){
                                    var getpurok=document.getElementById("purok14").value;
                                    var gethpurok=document.getElementById("purok");

                                    gethpurok.setAttribute("value",getpurok);
                                }

                                if(getselectpurok=="Montefrio 2"){
                                    var getpurok=document.getElementById("purok15").value;
                                    var gethpurok=document.getElementById("purok");

                                    gethpurok.setAttribute("value",getpurok);
                                }

                                if(getselectpurok=="Upper Acub"){
                                    var getpurok=document.getElementById("purok16").value;
                                    var gethpurok=document.getElementById("purok");

                                    gethpurok.setAttribute("value",getpurok);
                                }
                        }
                    </script>
                    <div class="background-info-div">
                    <label class="background-info-label">Barangay</label>
                    <input type="text" value="<?php echo $_SESSION['userbarangay'] ?>" disabled="true" style="border-radius:5px;padding-left:10px;font-size:15px;cursor:pointer;width:240px;height:38px;margin-top:10px" name="barangay" list="barangaylist" id="barangay" placeholder=""/>
                    </div>
                    
                    <br style="clear:both" />
                    <div style="background:black;height:1px;margin-top:50px;margin-bottom:50px"></div>
                    <p style="font-size:20px;font-family: 'Raleway', sans-serif;margin-bottom:10px"><b>Family Members</b></p>

                    <div id="purokdatalist"></div>

                    <input style="border-radius:5px;padding-left:10px;font-size:15px;width:250px;height:38px;margin-top:10px" type="number" name="famnum" oninput="add()" id="famnum" placeholder="Add New Family Member"/></br>
                    </div>
                    </br>
                    <div style="margin-bottom:20px;margin-left:0px;padding:20px;width:95%;" id="demo">
                    </div>
                    <div style="background:black;height:1px;margin-top:10px;margin-bottom:50px"></div>

                    <div class="divinfo">
                    <p style="font-size:20px;font-family: 'Raleway', sans-serif;margin-bottom:10px;"><b>Background Informations</b></p>
                    
                    <div class="background-info-div">
                    <label class="background-info-label">Mother Tongue</label>
                    <select name="mothertongue" id="selectmothertongue" style="border-radius:5px;padding-left:10px;font-size:15px;cursor:pointer;border:1px solid black;width:250px;height:40px;margin-top:10px;">
                        <option id="mothertongue1" value=""></option>
                        <option id="mothertongue2" value="Arabic">Arabic</option>
                        <option id="mothertongue3" value="Bikolano">Bikolano</option>
                        <option id="mothertongue4" value="Cebuano">Cebuano</option>
                        <option id="mothertongue5" value="Hiligaynon">Hiligaynon</option>
                        <option id="mothertongue6" value="Ilocano">Ilocano</option>
                        <option id="mothertongue7" value="Kapampangan">Kapampangan</option>
                        <option id="mothertongue8" value="Karaya">Karaya</option>
                        <option id="mothertongue9" value="Pangasinan">Pangasinan</option>
                        <option id="mothertongue10" value="Tagalog">Tagalog</option>
                        <option id="mothertongue11" value="Waray">Waray</option>
                        <option id="mothertongue12" value="Foreign">Foreign</option>
                    </select>
                    </div>
                    <script>
                            var getselectmothertongue=document.getElementById("selectmothertongue").value;

                                if(getselectmothertongue==""){
                                    var getmothertonguelist1=document.getElementById("mothertongue1");
                                    var getmothertonguelist2=document.getElementById("mothertongue2");
                                    var getmothertonguelist3=document.getElementById("mothertongue3");
                                    var getmothertonguelist4=document.getElementById("mothertongue4");
                                    var getmothertonguelist5=document.getElementById("mothertongue5");
                                    var getmothertonguelist6=document.getElementById("mothertongue6");
                                    var getmothertonguelist7=document.getElementById("mothertongue7");
                                    var getmothertonguelist8=document.getElementById("mothertongue8");
                                    var getmothertonguelist9=document.getElementById("mothertongue9");
                                    var getmothertonguelist10=document.getElementById("mothertongue10");
                                    var getmothertonguelist11=document.getElementById("mothertongue11");
                                    var getmothertonguelist12=document.getElementById("mothertongue12");

                                    getmothertonguelist1.setAttribute("selected","");
                                    getmothertonguelist2.removeAttribute("selected","");
                                    getmothertonguelist3.removeAttribute("selected","");
                                    getmothertonguelist4.removeAttribute("selected","");
                                    getmothertonguelist5.removeAttribute("selected","");
                                    getmothertonguelist6.removeAttribute("selected","");
                                    getmothertonguelist7.removeAttribute("selected","");
                                    getmothertonguelist8.removeAttribute("selected","");
                                    getmothertonguelist9.removeAttribute("selected","");
                                    getmothertonguelist10.removeAttribute("selected","");
                                    getmothertonguelist11.removeAttribute("selected","");
                                    getmothertonguelist12.removeAttribute("selected","");
                                }

                                if(getselectmothertongue=="Arabic"){
                                    var getmothertonguelist1=document.getElementById("mothertongue1");
                                    var getmothertonguelist2=document.getElementById("mothertongue2");
                                    var getmothertonguelist3=document.getElementById("mothertongue3");
                                    var getmothertonguelist4=document.getElementById("mothertongue4");
                                    var getmothertonguelist5=document.getElementById("mothertongue5");
                                    var getmothertonguelist6=document.getElementById("mothertongue6");
                                    var getmothertonguelist7=document.getElementById("mothertongue7");
                                    var getmothertonguelist8=document.getElementById("mothertongue8");
                                    var getmothertonguelist9=document.getElementById("mothertongue9");
                                    var getmothertonguelist10=document.getElementById("mothertongue10");
                                    var getmothertonguelist11=document.getElementById("mothertongue11");
                                    var getmothertonguelist12=document.getElementById("mothertongue12");

                                    getmothertonguelist1.removeAttribute("selected","");
                                    getmothertonguelist2.setAttribute("selected","");
                                    getmothertonguelist3.removeAttribute("selected","");
                                    getmothertonguelist4.removeAttribute("selected","");
                                    getmothertonguelist5.removeAttribute("selected","");
                                    getmothertonguelist6.removeAttribute("selected","");
                                    getmothertonguelist7.removeAttribute("selected","");
                                    getmothertonguelist8.removeAttribute("selected","");
                                    getmothertonguelist9.removeAttribute("selected","");
                                    getmothertonguelist10.removeAttribute("selected","");
                                    getmothertonguelist11.removeAttribute("selected","");
                                    getmothertonguelist12.removeAttribute("selected","");
                                }

                                if(getselectmothertongue=="Bikolano"){
                                    var getmothertonguelist1=document.getElementById("mothertongue1");
                                    var getmothertonguelist2=document.getElementById("mothertongue2");
                                    var getmothertonguelist3=document.getElementById("mothertongue3");
                                    var getmothertonguelist4=document.getElementById("mothertongue4");
                                    var getmothertonguelist5=document.getElementById("mothertongue5");
                                    var getmothertonguelist6=document.getElementById("mothertongue6");
                                    var getmothertonguelist7=document.getElementById("mothertongue7");
                                    var getmothertonguelist8=document.getElementById("mothertongue8");
                                    var getmothertonguelist9=document.getElementById("mothertongue9");
                                    var getmothertonguelist10=document.getElementById("mothertongue10");
                                    var getmothertonguelist11=document.getElementById("mothertongue11");
                                    var getmothertonguelist12=document.getElementById("mothertongue12");

                                    getmothertonguelist1.removeAttribute("selected","");
                                    getmothertonguelist2.removeAttribute("selected","");
                                    getmothertonguelist3.setAttribute("selected","");
                                    getmothertonguelist4.removeAttribute("selected","");
                                    getmothertonguelist5.removeAttribute("selected","");
                                    getmothertonguelist6.removeAttribute("selected","");
                                    getmothertonguelist7.removeAttribute("selected","");
                                    getmothertonguelist8.removeAttribute("selected","");
                                    getmothertonguelist9.removeAttribute("selected","");
                                    getmothertonguelist10.removeAttribute("selected","");
                                    getmothertonguelist11.removeAttribute("selected","");
                                    getmothertonguelist12.removeAttribute("selected","");
                                }

                                if(getselectmothertongue=="Cebuano"){
                                    var getmothertonguelist1=document.getElementById("mothertongue1");
                                    var getmothertonguelist2=document.getElementById("mothertongue2");
                                    var getmothertonguelist3=document.getElementById("mothertongue3");
                                    var getmothertonguelist4=document.getElementById("mothertongue4");
                                    var getmothertonguelist5=document.getElementById("mothertongue5");
                                    var getmothertonguelist6=document.getElementById("mothertongue6");
                                    var getmothertonguelist7=document.getElementById("mothertongue7");
                                    var getmothertonguelist8=document.getElementById("mothertongue8");
                                    var getmothertonguelist9=document.getElementById("mothertongue9");
                                    var getmothertonguelist10=document.getElementById("mothertongue10");
                                    var getmothertonguelist11=document.getElementById("mothertongue11");
                                    var getmothertonguelist12=document.getElementById("mothertongue12");

                                    getmothertonguelist1.removeAttribute("selected","");
                                    getmothertonguelist2.removeAttribute("selected","");
                                    getmothertonguelist3.removeAttribute("selected","");
                                    getmothertonguelist4.setAttribute("selected","");
                                    getmothertonguelist5.removeAttribute("selected","");
                                    getmothertonguelist6.removeAttribute("selected","");
                                    getmothertonguelist7.removeAttribute("selected","");
                                    getmothertonguelist8.removeAttribute("selected","");
                                    getmothertonguelist9.removeAttribute("selected","");
                                    getmothertonguelist10.removeAttribute("selected","");
                                    getmothertonguelist11.removeAttribute("selected","");
                                    getmothertonguelist12.removeAttribute("selected","");
                                }

                                if(getselectmothertongue=="Hiligaynon"){
                                    var getmothertonguelist1=document.getElementById("mothertongue1");
                                    var getmothertonguelist2=document.getElementById("mothertongue2");
                                    var getmothertonguelist3=document.getElementById("mothertongue3");
                                    var getmothertonguelist4=document.getElementById("mothertongue4");
                                    var getmothertonguelist5=document.getElementById("mothertongue5");
                                    var getmothertonguelist6=document.getElementById("mothertongue6");
                                    var getmothertonguelist7=document.getElementById("mothertongue7");
                                    var getmothertonguelist8=document.getElementById("mothertongue8");
                                    var getmothertonguelist9=document.getElementById("mothertongue9");
                                    var getmothertonguelist10=document.getElementById("mothertongue10");
                                    var getmothertonguelist11=document.getElementById("mothertongue11");
                                    var getmothertonguelist12=document.getElementById("mothertongue12");

                                    getmothertonguelist1.removeAttribute("selected","");
                                    getmothertonguelist2.removeAttribute("selected","");
                                    getmothertonguelist3.removeAttribute("selected","");
                                    getmothertonguelist4.removeAttribute("selected","");
                                    getmothertonguelist5.setAttribute("selected","");
                                    getmothertonguelist6.removeAttribute("selected","");
                                    getmothertonguelist7.removeAttribute("selected","");
                                    getmothertonguelist8.removeAttribute("selected","");
                                    getmothertonguelist9.removeAttribute("selected","");
                                    getmothertonguelist10.removeAttribute("selected","");
                                    getmothertonguelist11.removeAttribute("selected","");
                                    getmothertonguelist12.removeAttribute("selected","");
                                }

                                if(getselectmothertongue=="Ilocano"){
                                    var getmothertonguelist1=document.getElementById("mothertongue1");
                                    var getmothertonguelist2=document.getElementById("mothertongue2");
                                    var getmothertonguelist3=document.getElementById("mothertongue3");
                                    var getmothertonguelist4=document.getElementById("mothertongue4");
                                    var getmothertonguelist5=document.getElementById("mothertongue5");
                                    var getmothertonguelist6=document.getElementById("mothertongue6");
                                    var getmothertonguelist7=document.getElementById("mothertongue7");
                                    var getmothertonguelist8=document.getElementById("mothertongue8");
                                    var getmothertonguelist9=document.getElementById("mothertongue9");
                                    var getmothertonguelist10=document.getElementById("mothertongue10");
                                    var getmothertonguelist11=document.getElementById("mothertongue11");
                                    var getmothertonguelist12=document.getElementById("mothertongue12");

                                    getmothertonguelist1.removeAttribute("selected","");
                                    getmothertonguelist2.removeAttribute("selected","");
                                    getmothertonguelist3.removeAttribute("selected","");
                                    getmothertonguelist4.removeAttribute("selected","");
                                    getmothertonguelist5.removeAttribute("selected","");
                                    getmothertonguelist6.setAttribute("selected","");
                                    getmothertonguelist7.removeAttribute("selected","");
                                    getmothertonguelist8.removeAttribute("selected","");
                                    getmothertonguelist9.removeAttribute("selected","");
                                    getmothertonguelist10.removeAttribute("selected","");
                                    getmothertonguelist11.removeAttribute("selected","");
                                    getmothertonguelist12.removeAttribute("selected","");
                                }

                                if(getselectmothertongue=="Kapampangan"){
                                    var getmothertonguelist1=document.getElementById("mothertongue1");
                                    var getmothertonguelist2=document.getElementById("mothertongue2");
                                    var getmothertonguelist3=document.getElementById("mothertongue3");
                                    var getmothertonguelist4=document.getElementById("mothertongue4");
                                    var getmothertonguelist5=document.getElementById("mothertongue5");
                                    var getmothertonguelist6=document.getElementById("mothertongue6");
                                    var getmothertonguelist7=document.getElementById("mothertongue7");
                                    var getmothertonguelist8=document.getElementById("mothertongue8");
                                    var getmothertonguelist9=document.getElementById("mothertongue9");
                                    var getmothertonguelist10=document.getElementById("mothertongue10");
                                    var getmothertonguelist11=document.getElementById("mothertongue11");
                                    var getmothertonguelist12=document.getElementById("mothertongue12");

                                    getmothertonguelist1.removeAttribute("selected","");
                                    getmothertonguelist2.removeAttribute("selected","");
                                    getmothertonguelist3.removeAttribute("selected","");
                                    getmothertonguelist4.removeAttribute("selected","");
                                    getmothertonguelist5.removeAttribute("selected","");
                                    getmothertonguelist6.removeAttribute("selected","");
                                    getmothertonguelist7.setAttribute("selected","");
                                    getmothertonguelist8.removeAttribute("selected","");
                                    getmothertonguelist9.removeAttribute("selected","");
                                    getmothertonguelist10.removeAttribute("selected","");
                                    getmothertonguelist11.removeAttribute("selected","");
                                    getmothertonguelist12.removeAttribute("selected","");
                                }

                                if(getselectmothertongue=="Karaya"){
                                    var getmothertonguelist1=document.getElementById("mothertongue1");
                                    var getmothertonguelist2=document.getElementById("mothertongue2");
                                    var getmothertonguelist3=document.getElementById("mothertongue3");
                                    var getmothertonguelist4=document.getElementById("mothertongue4");
                                    var getmothertonguelist5=document.getElementById("mothertongue5");
                                    var getmothertonguelist6=document.getElementById("mothertongue6");
                                    var getmothertonguelist7=document.getElementById("mothertongue7");
                                    var getmothertonguelist8=document.getElementById("mothertongue8");
                                    var getmothertonguelist9=document.getElementById("mothertongue9");
                                    var getmothertonguelist10=document.getElementById("mothertongue10");
                                    var getmothertonguelist11=document.getElementById("mothertongue11");
                                    var getmothertonguelist12=document.getElementById("mothertongue12");

                                    getmothertonguelist1.removeAttribute("selected","");
                                    getmothertonguelist2.removeAttribute("selected","");
                                    getmothertonguelist3.removeAttribute("selected","");
                                    getmothertonguelist4.removeAttribute("selected","");
                                    getmothertonguelist5.removeAttribute("selected","");
                                    getmothertonguelist6.removeAttribute("selected","");
                                    getmothertonguelist7.removeAttribute("selected","");
                                    getmothertonguelist8.setAttribute("selected","");
                                    getmothertonguelist9.removeAttribute("selected","");
                                    getmothertonguelist10.removeAttribute("selected","");
                                    getmothertonguelist11.removeAttribute("selected","");
                                    getmothertonguelist12.removeAttribute("selected","");
                                }

                                if(getselectmothertongue=="Pangasinan"){
                                    var getmothertonguelist1=document.getElementById("mothertongue1");
                                    var getmothertonguelist2=document.getElementById("mothertongue2");
                                    var getmothertonguelist3=document.getElementById("mothertongue3");
                                    var getmothertonguelist4=document.getElementById("mothertongue4");
                                    var getmothertonguelist5=document.getElementById("mothertongue5");
                                    var getmothertonguelist6=document.getElementById("mothertongue6");
                                    var getmothertonguelist7=document.getElementById("mothertongue7");
                                    var getmothertonguelist8=document.getElementById("mothertongue8");
                                    var getmothertonguelist9=document.getElementById("mothertongue9");
                                    var getmothertonguelist10=document.getElementById("mothertongue10");
                                    var getmothertonguelist11=document.getElementById("mothertongue11");
                                    var getmothertonguelist12=document.getElementById("mothertongue12");

                                    getmothertonguelist1.removeAttribute("selected","");
                                    getmothertonguelist2.removeAttribute("selected","");
                                    getmothertonguelist3.removeAttribute("selected","");
                                    getmothertonguelist4.removeAttribute("selected","");
                                    getmothertonguelist5.removeAttribute("selected","");
                                    getmothertonguelist6.removeAttribute("selected","");
                                    getmothertonguelist7.removeAttribute("selected","");
                                    getmothertonguelist8.removeAttribute("selected","");
                                    getmothertonguelist9.setAttribute("selected","");
                                    getmothertonguelist10.removeAttribute("selected","");
                                    getmothertonguelist11.removeAttribute("selected","");
                                    getmothertonguelist12.removeAttribute("selected","");
                                }

                                if(getselectmothertongue=="Tagalog"){
                                    var getmothertonguelist1=document.getElementById("mothertongue1");
                                    var getmothertonguelist2=document.getElementById("mothertongue2");
                                    var getmothertonguelist3=document.getElementById("mothertongue3");
                                    var getmothertonguelist4=document.getElementById("mothertongue4");
                                    var getmothertonguelist5=document.getElementById("mothertongue5");
                                    var getmothertonguelist6=document.getElementById("mothertongue6");
                                    var getmothertonguelist7=document.getElementById("mothertongue7");
                                    var getmothertonguelist8=document.getElementById("mothertongue8");
                                    var getmothertonguelist9=document.getElementById("mothertongue9");
                                    var getmothertonguelist10=document.getElementById("mothertongue10");
                                    var getmothertonguelist11=document.getElementById("mothertongue11");
                                    var getmothertonguelist12=document.getElementById("mothertongue12");

                                    getmothertonguelist1.removeAttribute("selected","");
                                    getmothertonguelist2.removeAttribute("selected","");
                                    getmothertonguelist3.removeAttribute("selected","");
                                    getmothertonguelist4.removeAttribute("selected","");
                                    getmothertonguelist5.removeAttribute("selected","");
                                    getmothertonguelist6.removeAttribute("selected","");
                                    getmothertonguelist7.removeAttribute("selected","");
                                    getmothertonguelist8.removeAttribute("selected","");
                                    getmothertonguelist9.removeAttribute("selected","");
                                    getmothertonguelist10.setAttribute("selected","");
                                    getmothertonguelist11.removeAttribute("selected","");
                                    getmothertonguelist12.removeAttribute("selected","");
                                }

                                if(getselectmothertongue=="Waray"){
                                    var getmothertonguelist1=document.getElementById("mothertongue1");
                                    var getmothertonguelist2=document.getElementById("mothertongue2");
                                    var getmothertonguelist3=document.getElementById("mothertongue3");
                                    var getmothertonguelist4=document.getElementById("mothertongue4");
                                    var getmothertonguelist5=document.getElementById("mothertongue5");
                                    var getmothertonguelist6=document.getElementById("mothertongue6");
                                    var getmothertonguelist7=document.getElementById("mothertongue7");
                                    var getmothertonguelist8=document.getElementById("mothertongue8");
                                    var getmothertonguelist9=document.getElementById("mothertongue9");
                                    var getmothertonguelist10=document.getElementById("mothertongue10");
                                    var getmothertonguelist11=document.getElementById("mothertongue11");
                                    var getmothertonguelist12=document.getElementById("mothertongue12");

                                    getmothertonguelist1.removeAttribute("selected","");
                                    getmothertonguelist2.removeAttribute("selected","");
                                    getmothertonguelist3.removeAttribute("selected","");
                                    getmothertonguelist4.removeAttribute("selected","");
                                    getmothertonguelist5.removeAttribute("selected","");
                                    getmothertonguelist6.removeAttribute("selected","");
                                    getmothertonguelist7.removeAttribute("selected","");
                                    getmothertonguelist8.removeAttribute("selected","");
                                    getmothertonguelist9.removeAttribute("selected","");
                                    getmothertonguelist10.removeAttribute("selected","");
                                    getmothertonguelist11.setAttribute("selected","");
                                    getmothertonguelist12.removeAttribute("selected","");
                                }

                                if(getselectmothertongue=="Foreign"){
                                    var getmothertonguelist1=document.getElementById("mothertongue1");
                                    var getmothertonguelist2=document.getElementById("mothertongue2");
                                    var getmothertonguelist3=document.getElementById("mothertongue3");
                                    var getmothertonguelist4=document.getElementById("mothertongue4");
                                    var getmothertonguelist5=document.getElementById("mothertongue5");
                                    var getmothertonguelist6=document.getElementById("mothertongue6");
                                    var getmothertonguelist7=document.getElementById("mothertongue7");
                                    var getmothertonguelist8=document.getElementById("mothertongue8");
                                    var getmothertonguelist9=document.getElementById("mothertongue9");
                                    var getmothertonguelist10=document.getElementById("mothertongue10");
                                    var getmothertonguelist11=document.getElementById("mothertongue11");
                                    var getmothertonguelist12=document.getElementById("mothertongue12");

                                    getmothertonguelist1.removeAttribute("selected","");
                                    getmothertonguelist2.removeAttribute("selected","");
                                    getmothertonguelist3.removeAttribute("selected","");
                                    getmothertonguelist4.removeAttribute("selected","");
                                    getmothertonguelist5.removeAttribute("selected","");
                                    getmothertonguelist6.removeAttribute("selected","");
                                    getmothertonguelist7.removeAttribute("selected","");
                                    getmothertonguelist8.removeAttribute("selected","");
                                    getmothertonguelist9.removeAttribute("selected","");
                                    getmothertonguelist10.removeAttribute("selected","");
                                    getmothertonguelist11.removeAttribute("selected","");
                                    getmothertonguelist12.setAttribute("selected","");
                                }
                    </script>

                    <div class="background-info-div">
                    <label class="background-info-label">House Type</label><input type="text" name="housetype" id="housetype" list="housetypelist" placeholder="" style="border-radius:5px;padding-left:10px;font-size:15px;width:240px;height:38px;margin-top:10px"/>
                    </div>

                    <div class="background-info-div">
                    <label class="background-info-label">Sanitary Toilet</label>
                    <select name="santoilet" id="selectsantoilet" style="border-radius:5px;padding-left:10px;font-size:15px;cursor:pointer;border:1px solid black;width:250px;height:40px;margin-top:10px;">
                        <option id="santoilet1" value=""></option>
                        <option id="santoilet2" value="Water sealed, sewer septic tank">Water sealed, sewer septic tank</option>
                        <option id="santoilet3" value="Closed pit">Closed pit</option>
                        <option id="santoilet4" value="Open pit">Open pit</option>
                    </select>
                    </div>
                    <script>
                            var getselectsantoilet=document.getElementById("selectsantoilet").value;

                                if(getselectsantoilet==""){
                                    var getsantoiletlist1=document.getElementById("santoilet1");
                                    var getsantoiletlist2=document.getElementById("santoilet2");
                                    var getsantoiletlist3=document.getElementById("santoilet3");
                                    var getsantoiletlist4=document.getElementById("santoilet4");

                                    getsantoiletlist1.setAttribute("selected","");
                                    getsantoiletlist2.removeAttribute("selected","");
                                    getsantoiletlist3.removeAttribute("selected","");
                                    getsantoiletlist4.removeAttribute("selected","");
                                }

                                if(getselectsantoilet=="Water sealed, sewer septic tank"){
                                    var getsantoiletlist1=document.getElementById("santoilet1");
                                    var getsantoiletlist2=document.getElementById("santoilet2");
                                    var getsantoiletlist3=document.getElementById("santoilet3");
                                    var getsantoiletlist4=document.getElementById("santoilet4");

                                    getsantoiletlist1.removeAttribute("selected","");
                                    getsantoiletlist2.setAttribute("selected","");
                                    getsantoiletlist3.removeAttribute("selected","");
                                    getsantoiletlist4.removeAttribute("selected","");
                                }

                                if(getselectsantoilet=="Closed pit"){
                                    var getsantoiletlist1=document.getElementById("santoilet1");
                                    var getsantoiletlist2=document.getElementById("santoilet2");
                                    var getsantoiletlist3=document.getElementById("santoilet3");
                                    var getsantoiletlist4=document.getElementById("santoilet4");

                                    getsantoiletlist1.removeAttribute("selected","");
                                    getsantoiletlist2.removeAttribute("selected","");
                                    getsantoiletlist3.setAttribute("selected","");
                                    getsantoiletlist4.removeAttribute("selected","");
                                }

                                if(getselectsantoilet=="Open pit"){
                                    var getsantoiletlist1=document.getElementById("santoilet1");
                                    var getsantoiletlist2=document.getElementById("santoilet2");
                                    var getsantoiletlist3=document.getElementById("santoilet3");
                                    var getsantoiletlist4=document.getElementById("santoilet4");

                                    getsantoiletlist1.removeAttribute("selected","");
                                    getsantoiletlist2.removeAttribute("selected","");
                                    getsantoiletlist3.removeAttribute("selected","");
                                    getsantoiletlist4.setAttribute("selected","");
                                }

                    </script>
                    
                    <div class="background-info-div">
                    <label class="background-info-label">Immunization</label>
                    <select name="immunization" id="selectimmunization" style="border-radius:5px;padding-left:10px;font-size:15px;cursor:pointer;border:1px solid black;width:250px;height:40px;margin-top:10px;">
                        <option id="immunization1" value=""></option>
                        <option id="immunization2" value="Yes">Yes</option>
                        <option id="immunization3" value="No">No</option>
                        <option id="immunization4" value="N/A">N/A</option>
                    </select>
                    </div>
                    <script>
                            var getselectimmunization=document.getElementById("selectimmunization").value;

                                if(getselectimmunization==""){
                                    var getimmunizationlist1=document.getElementById("immunization1");
                                    var getimmunizationlist2=document.getElementById("immunization2");
                                    var getimmunizationlist3=document.getElementById("immunization3");
                                    var getimmunizationlist4=document.getElementById("immunization4");

                                    getimmunizationlist1.setAttribute("selected","");
                                    getimmunizationlist2.removeAttribute("selected","");
                                    getimmunizationlist3.removeAttribute("selected","");
                                    getimmunizationlist4.removeAttribute("selected","");
                                }

                                if(getselectimmunization=="Yes"){
                                    var getimmunizationlist1=document.getElementById("immunization1");
                                    var getimmunizationlist2=document.getElementById("immunization2");
                                    var getimmunizationlist3=document.getElementById("immunization3");
                                    var getimmunizationlist4=document.getElementById("immunization4");

                                    getimmunizationlist1.removeAttribute("selected","");
                                    getimmunizationlist2.setAttribute("selected","");
                                    getimmunizationlist3.removeAttribute("selected","");
                                    getimmunizationlist4.removeAttribute("selected","");
                                }

                                if(getselectimmunization=="No"){
                                    var getimmunizationlist1=document.getElementById("immunization1");
                                    var getimmunizationlist2=document.getElementById("immunization2");
                                    var getimmunizationlist3=document.getElementById("immunization3");
                                    var getimmunizationlist4=document.getElementById("immunization4");

                                    getimmunizationlist1.removeAttribute("selected","");
                                    getimmunizationlist2.removeAttribute("selected","");
                                    getimmunizationlist3.setAttribute("selected","");
                                    getimmunizationlist4.removeAttribute("selected","");
                                }

                                if(getselectimmunization=="N/A"){
                                    var getimmunizationlist1=document.getElementById("immunization1");
                                    var getimmunizationlist2=document.getElementById("immunization2");
                                    var getimmunizationlist3=document.getElementById("immunization3");
                                    var getimmunizationlist4=document.getElementById("immunization4");

                                    getimmunizationlist1.removeAttribute("selected","");
                                    getimmunizationlist2.removeAttribute("selected","");
                                    getimmunizationlist3.removeAttribute("selected","");
                                    getimmunizationlist4.setAttribute("selected","");
                                }

                    </script>

                    <div class="background-info-div">
                    <label class="background-info-label">WRA</label>
                    <select name="wra" id="selectwra" style="border-radius:5px;padding-left:10px;font-size:15px;cursor:pointer;border:1px solid black;width:250px;height:40px;margin-top:10px;">
                        <option id="wra1" value=""></option>
                        <option id="wra2" value="Yes">Yes</option>
                        <option id="wra3" value="No">No</option>
                        <option id="wra4" value="N/A">N/A</option>
                    </select>
                    </div>

                    <script>
                            var getselectwra=document.getElementById("selectwra").value;

                                if(getselectwra==""){
                                    var getwralist1=document.getElementById("wra1");
                                    var getwralist2=document.getElementById("wra2");
                                    var getwralist3=document.getElementById("wra3");
                                    var getwralist4=document.getElementById("wra4");

                                    getwralist1.setAttribute("selected","");
                                    getwralist2.removeAttribute("selected","");
                                    getwralist3.removeAttribute("selected","");
                                    getwralist4.removeAttribute("selected","");
                                }

                                if(getselectwra=="Yes"){
                                    var getwralist1=document.getElementById("wra1");
                                    var getwralist2=document.getElementById("wra2");
                                    var getwralist3=document.getElementById("wra3");
                                    var getwralist4=document.getElementById("wra4");

                                    getwralist1.removeAttribute("selected","");
                                    getwralist2.setAttribute("selected","");
                                    getwralist3.removeAttribute("selected","");
                                    getwralist4.removeAttribute("selected","");
                                }

                                if(getselectwra=="No"){
                                    var getwralist1=document.getElementById("wra1");
                                    var getwralist2=document.getElementById("wra2");
                                    var getwralist3=document.getElementById("wra3");
                                    var getwralist4=document.getElementById("wra4");

                                    getwralist1.removeAttribute("selected","");
                                    getwralist2.removeAttribute("selected","");
                                    getwralist3.setAttribute("selected","");
                                    getwralist4.removeAttribute("selected","");
                                }

                                if(getselectwra=="N/A"){
                                    var getwralist1=document.getElementById("wra1");
                                    var getwralist2=document.getElementById("wra2");
                                    var getwralist3=document.getElementById("wra3");
                                    var getwralist4=document.getElementById("wra4");

                                    getwralist1.removeAttribute("selected","");
                                    getwralist2.removeAttribute("selected","");
                                    getwralist3.removeAttribute("selected","");
                                    getwralist4.setAttribute("selected","");
                                }

                    </script>

                    <div class="background-info-div">
                    <label class="background-info-label">Garbage Disposal</label><input type="text" name="garbdisposal" id="garbdisposal" placeholder="" style="border-radius:5px;padding-left:10px;font-size:15px;width:240px;height:38px;margin-top:10px"/>
                    </div>
                    
                    <div class="background-info-div">
                    <label class="background-info-label">Water Source</label><input type="text" name="watersource" id="watersource" placeholder="" style="border-radius:5px;padding-left:10px;font-size:15px;width:240px;height:38px;margin-top:10px"/>
                    </div>
                    
                    <div class="background-info-div">
                    <label class="background-info-label">Family Planning</label>
                    <select name="familyplan" id="selectfamilyplan" style="border-radius:5px;padding-left:10px;font-size:15px;cursor:pointer;border:1px solid black;width:250px;height:40px;margin-top:10px;">
                        <option id="familyplan1" value=""></option>
                        <option id="familyplan2" value="Yes">Yes</option>
                        <option id="familyplan3" value="No">No</option>
                        <option id="familyplan4" value="N/A">N/A</option>
                    </select>
                    </div>
                    <script>
                            var getselectfamilyplan=document.getElementById("selectfamilyplan").value;

                                if(getselectfamilyplan==""){
                                    var getfamilyplanlist1=document.getElementById("familyplan1");
                                    var getfamilyplanlist2=document.getElementById("familyplan2");
                                    var getfamilyplanlist3=document.getElementById("familyplan3");
                                    var getfamilyplanlist4=document.getElementById("familyplan4");

                                    getfamilyplanlist1.setAttribute("selected","");
                                    getfamilyplanlist2.removeAttribute("selected","");
                                    getfamilyplanlist3.removeAttribute("selected","");
                                    getfamilyplanlist4.removeAttribute("selected","");
                                }

                                if(getselectfamilyplan=="Yes"){
                                    var getfamilyplanlist1=document.getElementById("familyplan1");
                                    var getfamilyplanlist2=document.getElementById("familyplan2");
                                    var getfamilyplanlist3=document.getElementById("familyplan3");
                                    var getfamilyplanlist4=document.getElementById("familyplan4");

                                    getfamilyplanlist1.removeAttribute("selected","");
                                    getfamilyplanlist2.setAttribute("selected","");
                                    getfamilyplanlist3.removeAttribute("selected","");
                                    getfamilyplanlist4.removeAttribute("selected","");
                                }

                                if(getselectfamilyplan=="No"){
                                    var getfamilyplanlist1=document.getElementById("familyplan1");
                                    var getfamilyplanlist2=document.getElementById("familyplan2");
                                    var getfamilyplanlist3=document.getElementById("familyplan3");
                                    var getfamilyplanlist4=document.getElementById("familyplan4");

                                    getfamilyplanlist1.removeAttribute("selected","");
                                    getfamilyplanlist2.removeAttribute("selected","");
                                    getfamilyplanlist3.setAttribute("selected","");
                                    getfamilyplanlist4.removeAttribute("selected","");
                                }

                                if(getselectfamilyplan=="N/A"){
                                    var getfamilyplanlist1=document.getElementById("familyplan1");
                                    var getfamilyplanlist2=document.getElementById("familyplan2");
                                    var getfamilyplanlist3=document.getElementById("familyplan3");
                                    var getfamilyplanlist4=document.getElementById("familyplan4");

                                    getfamilyplanlist1.removeAttribute("selected","");
                                    getfamilyplanlist2.removeAttribute("selected","");
                                    getfamilyplanlist3.removeAttribute("selected","");
                                    getfamilyplanlist4.setAttribute("selected","");
                                }

                    </script>

                    <div class="background-info-div">
                    <label class="background-info-label">Background Gardening</label>
                    <select name="bground" id="selectbground" style="border-radius:5px;padding-left:10px;font-size:15px;cursor:pointer;border:1px solid black;width:250px;height:40px;margin-top:10px;">
                        <option id="bground1" value=""></option>
                        <option id="bground2" value="Yes">Yes</option>
                        <option id="bground3" value="No">No</option>
                        <option id="bground4" value="N/A">N/A</option>
                    </select>
                    </div>
                    
                    <script>
                            var getselectbground=document.getElementById("selectbground").value;

                                if(getselectbground==""){
                                    var getbgroundlist1=document.getElementById("bground1");
                                    var getbgroundlist2=document.getElementById("bground2");
                                    var getbgroundlist3=document.getElementById("bground3");
                                    var getbgroundlist4=document.getElementById("bground4");

                                    getbgroundlist1.setAttribute("selected","");
                                    getbgroundlist2.removeAttribute("selected","");
                                    getbgroundlist3.removeAttribute("selected","");
                                    getbgroundlist4.removeAttribute("selected","");
                                }

                                if(getselectbground=="Yes"){
                                    var getbgroundlist1=document.getElementById("bground1");
                                    var getbgroundlist2=document.getElementById("bground2");
                                    var getbgroundlist3=document.getElementById("bground3");
                                    var getbgroundlist4=document.getElementById("bground4");

                                    getbgroundlist1.removeAttribute("selected","");
                                    getbgroundlist2.setAttribute("selected","");
                                    getbgroundlist3.removeAttribute("selected","");
                                    getbgroundlist4.removeAttribute("selected","");
                                }

                                if(getselectbground=="No"){
                                    var getbgroundlist1=document.getElementById("bground1");
                                    var getbgroundlist2=document.getElementById("bground2");
                                    var getbgroundlist3=document.getElementById("bground3");
                                    var getbgroundlist4=document.getElementById("bground4");

                                    getbgroundlist1.removeAttribute("selected","");
                                    getbgroundlist2.removeAttribute("selected","");
                                    getbgroundlist3.setAttribute("selected","");
                                    getbgroundlist4.removeAttribute("selected","");
                                }

                                if(getselectbground=="N/A"){
                                    var getbgroundlist1=document.getElementById("bground1");
                                    var getbgroundlist2=document.getElementById("bground2");
                                    var getbgroundlist3=document.getElementById("bground3");
                                    var getbgroundlist4=document.getElementById("bground4");

                                    getbgroundlist1.removeAttribute("selected","");
                                    getbgroundlist2.removeAttribute("selected","");
                                    getbgroundlist3.removeAttribute("selected","");
                                    getbgroundlist4.setAttribute("selected","");
                                }
                    </script>

                    <div class="background-info-div">
                    <label class="background-info-label">Livelihood Status</label><input type="text" name="livestat" id="livestat" placeholder="" style="padding-left:10px;font-size:15px;width:240px;height:38px;margin-top:10px;border-radius:5px;"/>
                    </div>

                    <div class="background-info-div">
                    <label class="background-info-label">Animals/Pet</label>
                    <select name="animals" id="selectanimals" style="border-radius:5px;padding-left:10px;font-size:15px;cursor:pointer;border:1px solid black;width:250px;height:40px;margin-top:10px;">
                        <option id="animals1" value=""></option>
                        <option id="animals2" value="Yes">Yes</option>
                        <option id="animals3" value="No">No</option>
                        <option id="animals4" value="N/A">N/A</option>
                    </select>
                    </div>
                    <script>
                            var getselectanimals=document.getElementById("selectanimals").value;

                                if(getselectanimals==""){
                                    var getanimalslist1=document.getElementById("animals1");
                                    var getanimalslist2=document.getElementById("animals2");
                                    var getanimalslist3=document.getElementById("animals3");
                                    var getanimalslist4=document.getElementById("animals4");

                                    getanimalslist1.setAttribute("selected","");
                                    getanimalslist2.removeAttribute("selected","");
                                    getanimalslist3.removeAttribute("selected","");
                                    getanimalslist4.removeAttribute("selected","");
                                }

                                if(getselectanimals=="Yes"){
                                    var getanimalslist1=document.getElementById("animals1");
                                    var getanimalslist2=document.getElementById("animals2");
                                    var getanimalslist3=document.getElementById("animals3");
                                    var getanimalslist4=document.getElementById("animals4");

                                    getanimalslist1.removeAttribute("selected","");
                                    getanimalslist2.setAttribute("selected","");
                                    getanimalslist3.removeAttribute("selected","");
                                    getanimalslist4.removeAttribute("selected","");
                                }

                                if(getselectanimals=="No"){
                                    var getanimalslist1=document.getElementById("animals1");
                                    var getanimalslist2=document.getElementById("animals2");
                                    var getanimalslist3=document.getElementById("animals3");
                                    var getanimalslist4=document.getElementById("animals4");

                                    getanimalslist1.removeAttribute("selected","");
                                    getanimalslist2.removeAttribute("selected","");
                                    getanimalslist3.setAttribute("selected","");
                                    getanimalslist4.removeAttribute("selected","");
                                }

                                if(getselectanimals=="N/A"){
                                    var getanimalslist1=document.getElementById("animals1");
                                    var getanimalslist2=document.getElementById("animals2");
                                    var getanimalslist3=document.getElementById("animals3");
                                    var getanimalslist4=document.getElementById("animals4");

                                    getanimalslist1.removeAttribute("selected","");
                                    getanimalslist2.removeAttribute("selected","");
                                    getanimalslist3.removeAttribute("selected","");
                                    getanimalslist4.setAttribute("selected","");
                                }
                    </script>

                    <div class="background-info-div">
                    <label class="background-info-label">Blind Drainage</label><input type="text" name="blinddrain" id="blinddrain" placeholder="" style="padding-left:10px;font-size:15px;width:240px;height:38px;margin-top:10px;border-radius:5px;"/>
                    </div>
                    
                    <div class="background-info-div">
                    <label class="background-info-label">Communication</label><input type="text" name="communication" id="communication" placeholder="" style="padding-left:10px;font-size:15px;width:240px;height:38px;margin-top:10px;border-radius:5px;"/>
                    </div>
                    
                    <div class="background-info-div">
                    <label class="background-info-label">Home Lot Status</label><input type="text" name="homestat" list="homelotlist" id="homestat" placeholder="" style="padding-left:10px;font-size:15px;width:240px;height:38px;margin-top:10px;border-radius:5px;"/>
                    </div>

                    <div class="background-info-div">
                    <label class="background-info-label">Energy Source</label><input type="text" name="energysource" id="energysource" placeholder="" style="padding-left:10px;font-size:15px;width:240px;height:38px;margin-top:10px;border-radius:5px;"/>
                    </div>

                    <div class="background-info-div">
                    <label class="background-info-label">Direct Waste To Water Bodies</label>
                    <select name="dwtwbd" id="selectdwtwbd" style="border-radius:5px;padding-left:10px;font-size:15px;cursor:pointer;border:1px solid black;width:250px;height:40px;margin-top:10px;">
                        <option id="dwtwbd1" value=""></option>
                        <option id="dwtwbd2" value="Yes">Yes</option>
                        <option id="dwtwbd3" value="No">No</option>
                        <option id="dwtwbd4" value="N/A">N/A</option>
                    </select>
                    </div>
                    <script>
                            var getselectdwtwbd=document.getElementById("selectdwtwbd").value;

                                if(getselectdwtwbd==""){
                                    var getdwtwbdlist1=document.getElementById("dwtwbd1");
                                    var getdwtwbdlist2=document.getElementById("dwtwbd2");
                                    var getdwtwbdlist3=document.getElementById("dwtwbd3");
                                    var getdwtwbdlist4=document.getElementById("dwtwbd4");

                                    getdwtwbdlist1.setAttribute("selected","");
                                    getdwtwbdlist2.removeAttribute("selected","");
                                    getdwtwbdlist3.removeAttribute("selected","");
                                    getdwtwbdlist4.removeAttribute("selected","");
                                }

                                if(getselectdwtwbd=="Yes"){
                                    var getdwtwbdlist1=document.getElementById("dwtwbd1");
                                    var getdwtwbdlist2=document.getElementById("dwtwbd2");
                                    var getdwtwbdlist3=document.getElementById("dwtwbd3");
                                    var getdwtwbdlist4=document.getElementById("dwtwbd4");

                                    getdwtwbdlist1.removeAttribute("selected","");
                                    getdwtwbdlist2.setAttribute("selected","");
                                    getdwtwbdlist3.removeAttribute("selected","");
                                    getdwtwbdlist4.removeAttribute("selected","");
                                }

                                if(getselectdwtwbd=="No"){
                                    var getdwtwbdlist1=document.getElementById("dwtwbd1");
                                    var getdwtwbdlist2=document.getElementById("dwtwbd2");
                                    var getdwtwbdlist3=document.getElementById("dwtwbd3");
                                    var getdwtwbdlist4=document.getElementById("dwtwbd4");

                                    getdwtwbdlist1.removeAttribute("selected","");
                                    getdwtwbdlist2.removeAttribute("selected","");
                                    getdwtwbdlist3.setAttribute("selected","");
                                    getdwtwbdlist4.removeAttribute("selected","");
                                }

                                if(getselectdwtwbd=="N/A"){
                                    var getdwtwbdlist1=document.getElementById("dwtwbd1");
                                    var getdwtwbdlist2=document.getElementById("dwtwbd2");
                                    var getdwtwbdlist3=document.getElementById("dwtwbd3");
                                    var getdwtwbdlist4=document.getElementById("dwtwbd4");

                                    getdwtwbdlist1.removeAttribute("selected","");
                                    getdwtwbdlist2.removeAttribute("selected","");
                                    getdwtwbdlist3.removeAttribute("selected","");
                                    getdwtwbdlist4.setAttribute("selected","");
                                }
                    </script>

                    <div class="background-info-div">
                    <label class="background-info-label">Vulnerable Status</label><input type="text" name="vulstat" id="vulstat" placeholder="" style="padding-left:10px;font-size:15px;width:240px;height:38px;margin-top:10px;border-radius:5px;"/>
                    </div>

                    <div class="background-info-div">
                    <label class="background-info-label">Agricultural Facility</label>
                    <select name="agrifacil" id="selectagrifacil" style="border-radius:5px;padding-left:10px;font-size:15px;cursor:pointer;border:1px solid black;width:250px;height:40px;margin-top:10px;">
                        <option id="agrifacil1" value=""></option>
                        <option id="agrifacil2" value="Yes">Yes</option>
                        <option id="agrifacil3" value="No">No</option>
                        <option id="agrifacil4" value="N/A">N/A</option>
                    </select>
                    </div>
                    <script>
                            var getselectagrifacil=document.getElementById("selectagrifacil").value;

                                if(getselectagrifacil==""){
                                    var getagrifacillist1=document.getElementById("agrifacil1");
                                    var getagrifacillist2=document.getElementById("agrifacil2");
                                    var getagrifacillist3=document.getElementById("agrifacil3");
                                    var getagrifacillist4=document.getElementById("agrifacil4");

                                    getagrifacillist1.setAttribute("selected","");
                                    getagrifacillist2.removeAttribute("selected","");
                                    getagrifacillist3.removeAttribute("selected","");
                                    getagrifacillist4.removeAttribute("selected","");
                                }

                                if(getselectagrifacil=="Yes"){
                                    var getagrifacillist1=document.getElementById("agrifacil1");
                                    var getagrifacillist2=document.getElementById("agrifacil2");
                                    var getagrifacillist3=document.getElementById("agrifacil3");
                                    var getagrifacillist4=document.getElementById("agrifacil4");

                                    getagrifacillist1.removeAttribute("selected","");
                                    getagrifacillist2.setAttribute("selected","");
                                    getagrifacillist3.removeAttribute("selected","");
                                    getagrifacillist4.removeAttribute("selected","");
                                }

                                if(getselectagrifacil=="No"){
                                    var getagrifacillist1=document.getElementById("agrifacil1");
                                    var getagrifacillist2=document.getElementById("agrifacil2");
                                    var getagrifacillist3=document.getElementById("agrifacil3");
                                    var getagrifacillist4=document.getElementById("agrifacil4");

                                    getagrifacillist1.removeAttribute("selected","");
                                    getagrifacillist2.removeAttribute("selected","");
                                    getagrifacillist3.setAttribute("selected","");
                                    getagrifacillist4.removeAttribute("selected","");
                                }

                                if(getselectagrifacil=="N/A"){
                                    var getagrifacillist1=document.getElementById("agrifacil1");
                                    var getagrifacillist2=document.getElementById("agrifacil2");
                                    var getagrifacillist3=document.getElementById("agrifacil3");
                                    var getagrifacillist4=document.getElementById("agrifacil4");

                                    getagrifacillist1.removeAttribute("selected","");
                                    getagrifacillist2.removeAttribute("selected","");
                                    getagrifacillist3.removeAttribute("selected","");
                                    getagrifacillist4.setAttribute("selected","");
                                }
                    </script>

                    <div class="background-info-div">
                    <label class="background-info-label">Other Source of Income</label><input type="text" name="osoi" id="osoi" placeholder="" style="padding-left:10px;font-size:15px;width:240px;height:38px;margin-top:10px;border-radius:5px;"/>
                    </div> 

                    <div class="background-info-div">
                    <label class="background-info-label">House Status</label>
                    <select name="housestat" id="selecthousestat" style="border-radius:5px;padding-left:10px;font-size:15px;cursor:pointer;border:1px solid black;width:250px;height:40px;margin-top:10px;">
                        <option id="housestat1" value=""></option>
                        <option id="housestat2" value="Own">Own</option>
                        <option id="housestat3" value="Not Own / Living For Free">Not Own / Living For Free</option>
                        <option id="housestat4" value="Rent">Rent</option>
                    </select>
                    </div>
                    <script>
                            var getselecthousestat=document.getElementById("selecthousestat").value;

                                if(getselecthousestat==""){
                                    var gethousestatlist1=document.getElementById("housestat1");
                                    var gethousestatlist2=document.getElementById("housestat2");
                                    var gethousestatlist3=document.getElementById("housestat3");
                                    var gethousestatlist4=document.getElementById("housestat4");

                                    gethousestatlist1.setAttribute("selected","");
                                    gethousestatlist2.removeAttribute("selected","");
                                    gethousestatlist3.removeAttribute("selected","");
                                    gethousestatlist4.removeAttribute("selected","");
                                }

                                if(getselecthousestat=="Own"){
                                    var gethousestatlist1=document.getElementById("housestat1");
                                    var gethousestatlist2=document.getElementById("housestat2");
                                    var gethousestatlist3=document.getElementById("housestat3");
                                    var gethousestatlist4=document.getElementById("housestat4");

                                    gethousestatlist1.removeAttribute("selected","");
                                    gethousestatlist2.setAttribute("selected","");
                                    gethousestatlist3.removeAttribute("selected","");
                                    gethousestatlist4.removeAttribute("selected","");
                                }

                                if(getselecthousestat=="Not Own / Living For Free"){
                                    var gethousestatlist1=document.getElementById("housestat1");
                                    var gethousestatlist2=document.getElementById("housestat2");
                                    var gethousestatlist3=document.getElementById("housestat3");
                                    var gethousestatlist4=document.getElementById("housestat4");

                                    gethousestatlist1.removeAttribute("selected","");
                                    gethousestatlist2.removeAttribute("selected","");
                                    gethousestatlist3.setAttribute("selected","");
                                    gethousestatlist4.removeAttribute("selected","");
                                }

                                if(getselecthousestat=="Rent"){
                                    var gethousestatlist1=document.getElementById("housestat1");
                                    var gethousestatlist2=document.getElementById("housestat2");
                                    var gethousestatlist3=document.getElementById("housestat3");
                                    var gethousestatlist4=document.getElementById("housestat4");

                                    gethousestatlist1.removeAttribute("selected","");
                                    gethousestatlist2.removeAttribute("selected","");
                                    gethousestatlist3.removeAttribute("selected","");
                                    gethousestatlist4.setAttribute("selected","");
                                }
                    </script>
 
                    <div class="background-info-div">
                    <label class="background-info-label">Transportation</label><input type="text" name="transportation" id="transportation" placeholder="" style="padding-left:10px;font-size:15px;width:240px;height:38px;margin-top:10px;border-radius:5px;"/></br>
                    </div>
                    
                    <br style="clear:both" />
                    <div style="background:black;height:1px;margin-top:50px;margin-bottom:50px"></div>
                    <p style="font-size:20px;font-family: 'Raleway', sans-serif;margin-bottom:10px"><b>Farming Products</b></p>
                    <input type="number" placeholder="How Many Products?" style="border-radius:5px;padding-left:10px;font-size:15px;width:250px;height:38px;margin-top:10px" id="productmuch" oninput="product()" />
                    <input type="hidden" name="hiddenfarm" id="hiddenfarm" style="margin-bottom:20px"/>
                    </div>
                    

                    
                    <div style="margin-top:20px" id="product-div">

                    </div></br>
                    
                

                    <center><input type="submit" class="btn-submit" value="Submit Data" name="pass" style="margin-top:40px;border-radius:5px;width:250px;height:40px" id="pass" /></center>

                </form>
   
                </div>
                </div>
            
        </div>
    </div> 
      
    <script>
    
var c=0;
var a=0;
var z=0;
var n=0;
var repeater=0;
var repeatercopy=0;
var increment=0;
var incrementcopy=0;
var stopper=0;
var ifinal=0;
var repeaterloop=0;
var icopy=0;
var famnumcopy=0;

function add(){
    var border=document.getElementById("demo");
    var famnum=document.getElementById("famnum").value;
   

    if(famnum=="" || famnum=="0"){
        border.style.background="none";    
        border.style.boxShadow="none";     
        border.style.border="none"; 
    }

    else{
        border.style.border="1px solid white"; 
        border.style.background="#40AEDE";    
        border.style.color="white";      
        border.style.boxShadow="0px 0px 10px 2px black";      
    }
    

    var famnumdiv=document.getElementById("demo");
    var d=famnum;
    var productposition=document.getElementById("product-btn");
    var newdiv=document.createElement("div");
    newdiv.setAttribute("id","newdiv"+a);
    famnumdiv.appendChild(newdiv);
    var calldiv=document.getElementById("newdiv"+a);

    var myvar=famnum;

    <?php
     $myPhpVar= "<script>document.writeln(myvar);</script>";
    ?>

    if(famnum!=""){
     
    for(var i=0;i<famnum;i++){

        var fname=document.createElement("input");
        var mname=document.createElement("input");
        var lname=document.createElement("input");
        var dependency=document.createElement("input");
        var tribe=document.createElement("input");
        var sex=document.createElement("input");
        var bdate=document.createElement("input");
        var age=document.createElement("input");
        var religion=document.createElement("input");
        var education=document.createElement("input");
        var occupation=document.createElement("input");
        var relation=document.createElement("input");
        var pwd=document.createElement("input");
        var ip=document.createElement("input");
        var philhealth=document.createElement("input");
        var breastfeed=document.createElement("input");
        var ntp=document.createElement("input");
        var smooking=document.createElement("input");
        var fourps=document.createElement("input");
        var label=document.createElement("label");
        var p1=document.createElement("p");
        var p2=document.createElement("p");
        var p3=document.createElement("p");
        var p4=document.createElement("p");
        var linediv=document.createElement("div");

        fname.setAttribute("placeholder","");
        fname.setAttribute("id","fname"+increment);
        fname.setAttribute("name","fname"+i);
        fname.style.width="240px";
        fname.style.height="38px";
        fname.style.paddingLeft="10px";
        fname.style.borderRadius="5px";
        lname.setAttribute("placeholder","");
        lname.style.width="240px";
        lname.style.height="38px";
        lname.style.paddingLeft="10px";
        lname.style.borderRadius="5px";
        lname.setAttribute("id","lname"+increment);
        lname.setAttribute("name","lname"+i);
        mname.setAttribute("placeholder","");
        mname.setAttribute("id","mname"+increment);
        mname.setAttribute("name","mname"+i);
        mname.style.width="240px";
        mname.style.height="38px";
        mname.style.paddingLeft="10px";
        mname.style.borderRadius="5px";
        tribe.setAttribute("class","member-input");
        tribe.setAttribute("id","tribe");
        tribe.setAttribute("placeholder","");
        tribe.setAttribute("name","tribe"+i);
        tribe.setAttribute("list","tribelist");
        
        p1.innerHTML="<b>Member Information</b>";
        p2.innerHTML="<b>Name</b>";
        p3.innerHTML="<b>Other Informations</b>";
        p4.innerHTML="<b>Other Status</b>";
        p1.style.fontSize="20px";
        p2.style.marginTop="20px";
        p1.style.fontFamily="'Raleway', sans-serif";
        p2.style.fontFamily="'Raleway', sans-serif";
        p2.style.fontSize="17px";
        p3.style.marginTop="40px";
        p3.style.marginBottom="10px";
        p3.style.fontFamily="'Raleway', sans-serif";
        p3.style.fontSize="17px";
        p4.style.marginTop="40px";
        p4.style.fontFamily="'Raleway', sans-serif";
        p4.style.fontSize="17px";

        bdate.setAttribute("id","bdate");
        bdate.setAttribute("type","date");
        bdate.setAttribute("name","bdate"+i);
        bdate.style.width="240px";
        bdate.style.height="38px";
        bdate.style.paddingLeft="10px";
        bdate.style.borderRadius="5px";
        
        age.setAttribute("type","number");
        age.setAttribute("id","age");
        age.setAttribute("name","age"+i);
        age.setAttribute("placeholder","");
        age.style.width="240px";
        age.style.height="38px";
        age.style.paddingLeft="10px";
        age.style.borderRadius="5px";

        occupation.setAttribute("id","occupation");
        occupation.setAttribute("name","occupation"+i);
        occupation.setAttribute("placeholder","");
        occupation.style.width="240px";
        occupation.style.height="38px";
        occupation.style.paddingLeft="10px";
        occupation.style.borderRadius="5px";

        var linebreak=document.createElement("br"); 
        var linebreak1=document.createElement("br"); 
        var linebreak2=document.createElement("br"); 
        var linebreak3=document.createElement("br"); 
        var linebreak4=document.createElement("br"); 
        var linebreak5=document.createElement("br"); 

        calldiv.appendChild(p1);
        calldiv.appendChild(p2);

        //fname
        var fnamediv=document.createElement("div");
        fnamediv.setAttribute("id","fnamediv"+increment);
        fnamediv.style.display="block";
        fnamediv.style.float="left";
        fnamediv.style.marginRight="10px";
        calldiv.appendChild(fnamediv);
        var callfnamediv=document.getElementById("fnamediv"+increment);

        var fnamelabel=document.createElement("label");
        fnamelabel.innerHTML="First Name";
        fnamelabel.style.display="block";
        fnamelabel.style.transform="translateY(0.3em)";
        fnamelabel.style.marginBottom="7px";
        fnamelabel.style.marginTop="10px";
        fnamelabel.setAttribute("id","fnamelabel"+increment);
        callfnamediv.appendChild(fnamelabel);
        callfnamediv.appendChild(fname);
        //

        //mname
        var mnamediv=document.createElement("div");
        mnamediv.setAttribute("id","mnamediv"+increment);
        mnamediv.style.display="block";
        mnamediv.style.float="left";
        mnamediv.style.marginRight="10px";
        calldiv.appendChild(mnamediv);
        var callmnamediv=document.getElementById("mnamediv"+increment);

        var mnamelabel=document.createElement("label");
        mnamelabel.innerHTML="Middle Name";
        mnamelabel.style.display="block";
        mnamelabel.style.transform="translateY(0.3em)";
        mnamelabel.style.marginBottom="7px";
        mnamelabel.style.marginTop="10px";
        mnamelabel.setAttribute("id","mnamelabel"+increment);
        callmnamediv.appendChild(mnamelabel);
        callmnamediv.appendChild(mname);
        //

        //lname
        var lnamediv=document.createElement("div");
        lnamediv.setAttribute("id","lnamediv"+increment);
        lnamediv.style.display="block";
        lnamediv.style.float="left";
        lnamediv.style.marginRight="10px";
        calldiv.appendChild(lnamediv);
        var calllnamediv=document.getElementById("lnamediv"+increment);

        var lnamelabel=document.createElement("label");
        lnamelabel.innerHTML="Last Name";
        lnamelabel.style.display="block";
        lnamelabel.style.transform="translateY(0.3em)";
        lnamelabel.style.marginBottom="7px";
        lnamelabel.style.marginTop="10px";
        lnamelabel.setAttribute("id","lnamelabel"+increment);
        calllnamediv.appendChild(lnamelabel);
        calllnamediv.appendChild(lname);
        //

        var createbr=document.createElement("br");
        createbr.style.clear="both";
        calldiv.appendChild(createbr);

        calldiv.appendChild(p3);
        
        var dependencydiv=document.createElement("div");
        dependencydiv.setAttribute("class","background-info-div");
        dependencydiv.setAttribute("id","dependencydiv"+increment);
        calldiv.appendChild(dependencydiv);
        var calldependencydiv=document.getElementById("dependencydiv"+increment);

        var dependencyselect=document.createElement("select");
        var dependencylabel=document.createElement("label");
        dependencylabel.innerHTML="Dependency";
        dependencylabel.setAttribute("class","background-info-label");
        dependencylabel.setAttribute("id","dependencylabel"+increment);

        dependencyselect.setAttribute("id","dependencyselect"+increment);
        dependencyselect.setAttribute("name","dependency"+i);

        calldependencydiv.appendChild(dependencylabel);
        calldependencydiv.appendChild(dependencyselect);

        var calldependencyselect=document.getElementById("dependencyselect"+increment);
        var dependencyoption1=document.createElement("option");
        var dependencyoption2=document.createElement("option");
        var dependencyoption3=document.createElement("option");
        
        calldependencyselect.style.borderRadius="5px";
        calldependencyselect.style.paddingLeft="10px";
        calldependencyselect.style.fontSize="15px";
        calldependencyselect.style.width="250px";
        calldependencyselect.style.height="40px";
        calldependencyselect.style.cursor="pointer";
        calldependencyselect.style.marginTop="10px";
        calldependencyselect.style.border="1px solid black";

        dependencyoption1.setAttribute("id","dependencylist1"+increment);
        dependencyoption2.setAttribute("id","dependencylist2"+increment);
        dependencyoption3.setAttribute("id","dependencylist3"+increment);

        dependencyoption1.setAttribute("value","");
        dependencyoption2.setAttribute("value","Independent");
        dependencyoption3.setAttribute("value","Dependent");

        dependencyoption1.innerHTML="";
        dependencyoption3.innerHTML="Dependent";
        dependencyoption2.innerHTML="Independent";

        calldependencyselect.appendChild(dependencyoption1);
        calldependencyselect.appendChild(dependencyoption3); 
        calldependencyselect.appendChild(dependencyoption2);

        
        //tribe
        var tribediv=document.createElement("div");
        tribediv.setAttribute("class","background-info-div");
        tribediv.setAttribute("id","tribediv"+increment);
        calldiv.appendChild(tribediv);
        var calltribediv=document.getElementById("tribediv"+increment);

        var tribeselect=document.createElement("select");
        var tribelabel=document.createElement("label");
        tribelabel.innerHTML="Tribe";
        tribelabel.setAttribute("class","background-info-label");
        tribelabel.setAttribute("id","tribelabel"+increment);

        tribeselect.setAttribute("id","tribeselect"+increment);
        tribeselect.setAttribute("name","tribe"+i);

        calltribediv.appendChild(tribelabel);
        calltribediv.appendChild(tribeselect);

        var calltribeselect=document.getElementById("tribeselect"+increment);
        var tribeoption1=document.createElement("option");
        var tribeoption2=document.createElement("option");
        var tribeoption3=document.createElement("option");
        var tribeoption4=document.createElement("option");
        var tribeoption5=document.createElement("option");
        var tribeoption6=document.createElement("option");
        var tribeoption7=document.createElement("option");
        var tribeoption8=document.createElement("option");
        var tribeoption9=document.createElement("option");
        var tribeoption10=document.createElement("option");
        var tribeoption11=document.createElement("option");
        var tribeoption12=document.createElement("option");
        var tribeoption13=document.createElement("option");
        var tribeoption14=document.createElement("option");
        var tribeoption15=document.createElement("option");
        var tribeoption16=document.createElement("option");
        var tribeoption17=document.createElement("option");
        var tribeoption18=document.createElement("option");
        var tribeoption19=document.createElement("option");
        var tribeoption20=document.createElement("option");
        var tribeoption21=document.createElement("option");
        
        calltribeselect.style.borderRadius="5px";
        calltribeselect.style.paddingLeft="10px";
        calltribeselect.style.fontSize="15px";
        calltribeselect.style.width="250px";
        calltribeselect.style.height="40px";
        calltribeselect.style.cursor="pointer";
        calltribeselect.style.marginTop="10px";
        calltribeselect.style.border="1px solid black";

        tribeoption1.setAttribute("id","tribelist1"+increment);
        tribeoption2.setAttribute("id","tribelist2"+increment);
        tribeoption3.setAttribute("id","tribelist3"+increment);
        tribeoption4.setAttribute("id","tribelist4"+increment);
        tribeoption5.setAttribute("id","tribelist5"+increment);
        tribeoption6.setAttribute("id","tribelist6"+increment);
        tribeoption7.setAttribute("id","tribelist7"+increment);
        tribeoption8.setAttribute("id","tribelist8"+increment);
        tribeoption9.setAttribute("id","tribelist9"+increment);
        tribeoption10.setAttribute("id","tribelist10"+increment);
        tribeoption11.setAttribute("id","tribelist11"+increment);
        tribeoption12.setAttribute("id","tribelist12"+increment);
        tribeoption13.setAttribute("id","tribelist13"+increment);
        tribeoption14.setAttribute("id","tribelist14"+increment);
        tribeoption15.setAttribute("id","tribelist15"+increment);
        tribeoption16.setAttribute("id","tribelist16"+increment);
        tribeoption17.setAttribute("id","tribelist17"+increment);
        tribeoption18.setAttribute("id","tribelist18"+increment);
        tribeoption19.setAttribute("id","tribelist19"+increment);
        tribeoption20.setAttribute("id","tribelist20"+increment);
        tribeoption21.setAttribute("id","tribelist21"+increment);

        tribeoption1.setAttribute("value","");
        tribeoption2.setAttribute("value","Aeta");
        tribeoption3.setAttribute("value","Ati");
        tribeoption4.setAttribute("value","Blaan");
        tribeoption5.setAttribute("value","Badjao");
        tribeoption6.setAttribute("value","Bagobo");
        tribeoption7.setAttribute("value","Bikolano");
        tribeoption8.setAttribute("value","Cebuano");
        tribeoption9.setAttribute("value","Igorot");
        tribeoption10.setAttribute("value","Ilonggo");
        tribeoption11.setAttribute("value","Ilokano");
        tribeoption12.setAttribute("value","Ivatan");
        tribeoption13.setAttribute("value","Kapampangan");
        tribeoption14.setAttribute("value","Mangyan");
        tribeoption15.setAttribute("value","Maranao");
        tribeoption16.setAttribute("value","Suludnon");
        tribeoption17.setAttribute("value","Tboli");
        tribeoption18.setAttribute("value","Tagalog");
        tribeoption19.setAttribute("value","Tausog");
        tribeoption20.setAttribute("value","Waray");
        tribeoption21.setAttribute("value","Yakan");

        tribeoption1.innerHTML="";
        tribeoption2.innerHTML="Aeta";
        tribeoption3.innerHTML="Ati";
        tribeoption4.innerHTML="Blaan";
        tribeoption5.innerHTML="Badjao";
        tribeoption6.innerHTML="Bagobo";
        tribeoption7.innerHTML="Bikolano";
        tribeoption8.innerHTML="Cebuano";
        tribeoption9.innerHTML="Igorot";
        tribeoption10.innerHTML="Ilonggo";
        tribeoption11.innerHTML="Ilokano";
        tribeoption12.innerHTML="Ivatan";
        tribeoption13.innerHTML="Kapampangan";
        tribeoption14.innerHTML="Mangyan";
        tribeoption15.innerHTML="Maranao";
        tribeoption16.innerHTML="Suludnon";
        tribeoption17.innerHTML="Tboli";
        tribeoption18.innerHTML="Tagalog";
        tribeoption19.innerHTML="Tausog";
        tribeoption20.innerHTML="Waray";
        tribeoption21.innerHTML="Yakan";

        calltribeselect.appendChild(tribeoption1);
        calltribeselect.appendChild(tribeoption2); 
        calltribeselect.appendChild(tribeoption3);
        calltribeselect.appendChild(tribeoption4);
        calltribeselect.appendChild(tribeoption5); 
        calltribeselect.appendChild(tribeoption6);
        calltribeselect.appendChild(tribeoption7);
        calltribeselect.appendChild(tribeoption8); 
        calltribeselect.appendChild(tribeoption9);
        calltribeselect.appendChild(tribeoption10);
        calltribeselect.appendChild(tribeoption11); 
        calltribeselect.appendChild(tribeoption12);
        calltribeselect.appendChild(tribeoption13);
        calltribeselect.appendChild(tribeoption14); 
        calltribeselect.appendChild(tribeoption15);
        calltribeselect.appendChild(tribeoption16);
        calltribeselect.appendChild(tribeoption17); 
        calltribeselect.appendChild(tribeoption18);
        calltribeselect.appendChild(tribeoption19);
        calltribeselect.appendChild(tribeoption20); 
        calltribeselect.appendChild(tribeoption21);
        //

        //sex
        var sexdiv=document.createElement("div");
        sexdiv.setAttribute("class","background-info-div");
        sexdiv.setAttribute("id","sexdiv"+increment);
        calldiv.appendChild(sexdiv);
        var callsexdiv=document.getElementById("sexdiv"+increment);

        var sexselect=document.createElement("select");
        var sexlabel=document.createElement("label");
        sexlabel.innerHTML="Sex";
        sexlabel.setAttribute("class","background-info-label");
        sexlabel.setAttribute("id","sexlabel"+increment);

        sexselect.setAttribute("id","sexselect"+increment);
        sexselect.setAttribute("name","sex"+i);

        callsexdiv.appendChild(sexlabel);
        callsexdiv.appendChild(sexselect);

        var callsexselect=document.getElementById("sexselect"+increment);
        var sexoption1=document.createElement("option");
        var sexoption2=document.createElement("option");
        var sexoption3=document.createElement("option");
        
        callsexselect.style.borderRadius="5px";
        callsexselect.style.paddingLeft="10px";
        callsexselect.style.fontSize="15px";
        callsexselect.style.width="250px";
        callsexselect.style.height="40px";
        callsexselect.style.cursor="pointer";
        callsexselect.style.marginTop="10px";
        callsexselect.style.border="1px solid black";

        sexoption1.setAttribute("id","sexlist1"+increment);
        sexoption2.setAttribute("id","sexlist2"+increment);
        sexoption3.setAttribute("id","sexlist3"+increment);

        sexoption1.setAttribute("value","");
        sexoption2.setAttribute("value","Male");
        sexoption3.setAttribute("value","Female");

        sexoption1.innerHTML="";
        sexoption3.innerHTML="Male";
        sexoption2.innerHTML="Female";

        callsexselect.appendChild(sexoption1);
        callsexselect.appendChild(sexoption3); 
        callsexselect.appendChild(sexoption2);
        //

        //bdate
        var bdatediv=document.createElement("div");
        bdatediv.setAttribute("id","bdatediv"+increment);
        bdatediv.style.display="block";
        bdatediv.style.float="left";
        bdatediv.style.marginRight="10px";
        calldiv.appendChild(bdatediv);
        var callbdatediv=document.getElementById("bdatediv"+increment);

        var bdatelabel=document.createElement("label");
        bdatelabel.innerHTML="Birth Date";
        bdatelabel.style.display="block";
        bdatelabel.style.transform="translateY(0.3em)";
        bdatelabel.style.marginBottom="7px";
        bdatelabel.setAttribute("id","bdatelabel"+increment);
        callbdatediv.appendChild(bdatelabel);
        callbdatediv.appendChild(bdate);
        //

        //age
        var agediv=document.createElement("div");
        agediv.setAttribute("id","agediv"+increment);
        agediv.style.display="block";
        agediv.style.float="left";
        agediv.style.marginRight="10px";
        calldiv.appendChild(agediv);
        var callagediv=document.getElementById("agediv"+increment);

        var agelabel=document.createElement("label");
        agelabel.innerHTML="Age";
        agelabel.style.display="block";
        agelabel.style.transform="translateY(0.3em)";
        agelabel.style.marginBottom="7px";
        agelabel.setAttribute("id","agelabel"+increment);
        callagediv.appendChild(agelabel);
        callagediv.appendChild(age);
        //

        //religion
        var religiondiv=document.createElement("div");
        religiondiv.setAttribute("class","background-info-div");
        religiondiv.setAttribute("id","religiondiv"+increment);
        calldiv.appendChild(religiondiv);
        var callreligiondiv=document.getElementById("religiondiv"+increment);

        var religionselect=document.createElement("select");
        var religionlabel=document.createElement("label");
        religionlabel.innerHTML="Religion";
        religionlabel.style.marginBottom="8px";
        religionlabel.setAttribute("class","background-info-label");
        religionlabel.setAttribute("id","religionlabel"+increment);

        religionselect.setAttribute("id","religionselect"+increment);
        religionselect.setAttribute("name","religion"+i);

        callreligiondiv.appendChild(religionlabel);
        callreligiondiv.appendChild(religionselect);

        var callreligionselect=document.getElementById("religionselect"+increment);
        var religionoption1=document.createElement("option");
        var religionoption2=document.createElement("option");
        var religionoption3=document.createElement("option");
        var religionoption4=document.createElement("option");
        var religionoption5=document.createElement("option");
        var religionoption6=document.createElement("option");
        var religionoption7=document.createElement("option");
        var religionoption8=document.createElement("option");
        var religionoption9=document.createElement("option");
        var religionoption10=document.createElement("option");
        var religionoption11=document.createElement("option");
        var religionoption12=document.createElement("option");
        var religionoption13=document.createElement("option");
        var religionoption14=document.createElement("option");

        callreligionselect.style.borderRadius="5px";
        callreligionselect.style.paddingLeft="10px";
        callreligionselect.style.fontSize="15px";
        callreligionselect.style.width="250px";
        callreligionselect.style.height="40px";
        callreligionselect.style.cursor="pointer";
        callreligionselect.style.border="1px solid black";

        religionoption1.setAttribute("id","religionlist1"+increment);
        religionoption2.setAttribute("id","religionlist2"+increment);
        religionoption3.setAttribute("id","religionlist3"+increment);
        religionoption4.setAttribute("id","religionlist4"+increment);
        religionoption5.setAttribute("id","religionlist5"+increment);
        religionoption6.setAttribute("id","religionlist6"+increment);
        religionoption7.setAttribute("id","religionlist7"+increment);
        religionoption8.setAttribute("id","religionlist8"+increment);
        religionoption9.setAttribute("id","religionlist9"+increment);
        religionoption10.setAttribute("id","religionlist10"+increment);
        religionoption11.setAttribute("id","religionlist11"+increment);
        religionoption12.setAttribute("id","religionlist12"+increment);
        religionoption13.setAttribute("id","religionlist13"+increment);
        religionoption14.setAttribute("id","religionlist14"+increment);

        religionoption1.setAttribute("value","");
        religionoption2.setAttribute("value","Aglipay");
        religionoption3.setAttribute("value","Alliance");
        religionoption4.setAttribute("value","Baptist");
        religionoption5.setAttribute("value","Born Again");
        religionoption6.setAttribute("value","Christian");
        religionoption7.setAttribute("value","Epescopal");
        religionoption8.setAttribute("value","Iglesia ni Cristo");
        religionoption9.setAttribute("value","Islam");
        religionoption10.setAttribute("value","Jehovahs Witness");
        religionoption11.setAttribute("value","Pentecost");
        religionoption12.setAttribute("value","Protestant");
        religionoption13.setAttribute("value","Roman Catholic");
        religionoption14.setAttribute("value","Seventh Day Adventist");

        religionoption1.innerHTML="";
        religionoption2.innerHTML="Aglipay";
        religionoption3.innerHTML="Alliance";
        religionoption4.innerHTML="Baptist";
        religionoption5.innerHTML="Born Again";
        religionoption6.innerHTML="Christian";
        religionoption7.innerHTML="Epescopal";
        religionoption8.innerHTML="Iglesia ni Cristo";
        religionoption9.innerHTML="Islam";
        religionoption10.innerHTML="Jehovahs Witness";
        religionoption11.innerHTML="Pentecost";
        religionoption12.innerHTML="Protestant";
        religionoption13.innerHTML="Roman Catholic";
        religionoption14.innerHTML="Seventh Day Adventist";

        callreligionselect.appendChild(religionoption1);
        callreligionselect.appendChild(religionoption2); 
        callreligionselect.appendChild(religionoption3);
        callreligionselect.appendChild(religionoption4);
        callreligionselect.appendChild(religionoption5); 
        callreligionselect.appendChild(religionoption6);
        callreligionselect.appendChild(religionoption7);
        callreligionselect.appendChild(religionoption8); 
        callreligionselect.appendChild(religionoption9);
        callreligionselect.appendChild(religionoption10);
        callreligionselect.appendChild(religionoption11); 
        callreligionselect.appendChild(religionoption12); 
        callreligionselect.appendChild(religionoption13); 
        callreligionselect.appendChild(religionoption14); 
        //

        //education
        var educationdiv=document.createElement("div");
        educationdiv.setAttribute("class","background-info-div");
        educationdiv.setAttribute("id","educationdiv"+increment);
        calldiv.appendChild(educationdiv);
        var calleducationdiv=document.getElementById("educationdiv"+increment);

        var educationselect=document.createElement("select");
        var educationlabel=document.createElement("label");
        educationlabel.innerHTML="Education (Highest)";
        educationlabel.style.marginBottom="8px";
        educationlabel.setAttribute("class","background-info-label");
        educationlabel.setAttribute("id","educationlabel"+increment);

        educationselect.setAttribute("id","educationselect"+increment);
        educationselect.setAttribute("name","education"+i);

        calleducationdiv.appendChild(educationlabel);
        calleducationdiv.appendChild(educationselect);

        var calleducationselect=document.getElementById("educationselect"+increment);
        var educationoption1=document.createElement("option");
        var educationoption2=document.createElement("option");
        var educationoption3=document.createElement("option");
        var educationoption4=document.createElement("option");
        var educationoption5=document.createElement("option");
        var educationoption6=document.createElement("option");
        var educationoption7=document.createElement("option");
        var educationoption8=document.createElement("option");
        var educationoption9=document.createElement("option");
        var educationoption10=document.createElement("option");
        var educationoption11=document.createElement("option");
        var educationoption12=document.createElement("option");
        var educationoption13=document.createElement("option");

        calleducationselect.style.borderRadius="5px";
        calleducationselect.style.paddingLeft="10px";
        calleducationselect.style.fontSize="15px";
        calleducationselect.style.width="250px";
        calleducationselect.style.height="40px";
        calleducationselect.style.cursor="pointer";
        calleducationselect.style.border="1px solid black";

        educationoption1.setAttribute("id","educationlist1"+increment);
        educationoption2.setAttribute("id","educationlist2"+increment);
        educationoption3.setAttribute("id","educationlist3"+increment);
        educationoption4.setAttribute("id","educationlist4"+increment);
        educationoption5.setAttribute("id","educationlist5"+increment);
        educationoption6.setAttribute("id","educationlist6"+increment);
        educationoption7.setAttribute("id","educationlist7"+increment);
        educationoption8.setAttribute("id","educationlist8"+increment);
        educationoption9.setAttribute("id","educationlist9"+increment);
        educationoption10.setAttribute("id","educationlist10"+increment);
        educationoption11.setAttribute("id","educationlist11"+increment);
        educationoption12.setAttribute("id","educationlist12"+increment);
        educationoption13.setAttribute("id","educationlist13"+increment);

        educationoption1.setAttribute("value","");
        educationoption2.setAttribute("value","Not Attended");
        educationoption3.setAttribute("value","ALS");
        educationoption4.setAttribute("value","Vocational");
        educationoption5.setAttribute("value","Kinder Garten");
        educationoption6.setAttribute("value","Elementary Level");
        educationoption7.setAttribute("value","Elementary Graduate");
        educationoption8.setAttribute("value","High School Level");
        educationoption9.setAttribute("value","High School Graduate");
        educationoption10.setAttribute("value","Senior High School Level");
        educationoption11.setAttribute("value","Senior High School Graduate");
        educationoption12.setAttribute("value","College Level");
        educationoption13.setAttribute("value","College Graduate");

        educationoption1.innerHTML="";
        educationoption2.innerHTML="Not Attended";
        educationoption3.innerHTML="ALS";
        educationoption4.innerHTML="Vocational";
        educationoption5.innerHTML="Kinder Garten";
        educationoption6.innerHTML="Elementary Level";
        educationoption7.innerHTML="Elementary Graduate";
        educationoption8.innerHTML="High School Level";
        educationoption9.innerHTML="High School Graduate";
        educationoption10.innerHTML="Senior High School Level";
        educationoption11.innerHTML="Senior High School Graduate";
        educationoption12.innerHTML="College Level";
        educationoption13.innerHTML="College Graduate";

        calleducationselect.appendChild(educationoption1);
        calleducationselect.appendChild(educationoption2); 
        calleducationselect.appendChild(educationoption3);
        calleducationselect.appendChild(educationoption4);
        calleducationselect.appendChild(educationoption5); 
        calleducationselect.appendChild(educationoption6);
        calleducationselect.appendChild(educationoption7);
        calleducationselect.appendChild(educationoption8); 
        calleducationselect.appendChild(educationoption9);
        calleducationselect.appendChild(educationoption10);
        calleducationselect.appendChild(educationoption11);
        calleducationselect.appendChild(educationoption12);
        calleducationselect.appendChild(educationoption13);
        //


        //occupation
        var occupationdiv=document.createElement("div");
        occupationdiv.setAttribute("id","occupationdiv"+increment);
        occupationdiv.style.display="block";
        occupationdiv.style.float="left";
        occupationdiv.style.marginRight="10px";
        calldiv.appendChild(occupationdiv);
        var calloccupationdiv=document.getElementById("occupationdiv"+increment);

        var occupationlabel=document.createElement("label");
        occupationlabel.innerHTML="Occupation";
        occupationlabel.style.display="block";
        occupationlabel.style.transform="translateY(0.3em)";
        occupationlabel.style.marginBottom="8px";
        occupationlabel.setAttribute("id","occupationlabel"+increment);
        calloccupationdiv.appendChild(occupationlabel);
        calloccupationdiv.appendChild(occupation);
        //

        //relation
        var relationdiv=document.createElement("div");
        relationdiv.setAttribute("class","background-info-div");
        relationdiv.setAttribute("id","relationdiv"+increment);
        calldiv.appendChild(relationdiv);
        var callrelationdiv=document.getElementById("relationdiv"+increment);

        var relationselect=document.createElement("select");
        var relationlabel=document.createElement("label");
        relationlabel.innerHTML="Relation to Head of the Family";
        relationlabel.setAttribute("class","background-info-label");
        relationlabel.style.marginBottom="8px";
        relationlabel.setAttribute("id","relationlabel"+increment);

        relationselect.setAttribute("id","relationselect"+increment);
        relationselect.setAttribute("name","relation"+i);

        callrelationdiv.appendChild(relationlabel);
        callrelationdiv.appendChild(relationselect);

        var callrelationselect=document.getElementById("relationselect"+increment);
        var relationoption1=document.createElement("option");
        var relationoption2=document.createElement("option");
        var relationoption3=document.createElement("option");
        var relationoption4=document.createElement("option");
        var relationoption5=document.createElement("option");
        var relationoption6=document.createElement("option");
        var relationoption7=document.createElement("option");
        var relationoption8=document.createElement("option");
        var relationoption9=document.createElement("option");
        var relationoption10=document.createElement("option");
        var relationoption11=document.createElement("option");
        var relationoption12=document.createElement("option");
        var relationoption13=document.createElement("option");
        var relationoption14=document.createElement("option");
        var relationoption15=document.createElement("option");
        var relationoption16=document.createElement("option");
        var relationoption17=document.createElement("option");
        var relationoption18=document.createElement("option");
        var relationoption19=document.createElement("option");
        var relationoption20=document.createElement("option");
        var relationoption21=document.createElement("option");
        var relationoption22=document.createElement("option");
        var relationoption23=document.createElement("option");
        var relationoption24=document.createElement("option");

        callrelationselect.style.borderRadius="5px";
        callrelationselect.style.paddingLeft="10px";
        callrelationselect.style.fontSize="15px";
        callrelationselect.style.width="250px";
        callrelationselect.style.height="40px";
        callrelationselect.style.cursor="pointer";
        callrelationselect.style.border="1px solid black";

        relationoption1.setAttribute("id","relationlist1"+increment);
        relationoption2.setAttribute("id","relationlist2"+increment);
        relationoption3.setAttribute("id","relationlist3"+increment);
        relationoption4.setAttribute("id","relationlist4"+increment);
        relationoption5.setAttribute("id","relationlist5"+increment);
        relationoption6.setAttribute("id","relationlist6"+increment);
        relationoption7.setAttribute("id","relationlist7"+increment);
        relationoption8.setAttribute("id","relationlist8"+increment);
        relationoption9.setAttribute("id","relationlist9"+increment);
        relationoption10.setAttribute("id","relationlist10"+increment);
        relationoption11.setAttribute("id","relationlist11"+increment);
        relationoption12.setAttribute("id","relationlist12"+increment);
        relationoption13.setAttribute("id","relationlist13"+increment);
        relationoption14.setAttribute("id","relationlist14"+increment);
        relationoption15.setAttribute("id","relationlist15"+increment);
        relationoption16.setAttribute("id","relationlist16"+increment);
        relationoption17.setAttribute("id","relationlist17"+increment);
        relationoption18.setAttribute("id","relationlist18"+increment);
        relationoption19.setAttribute("id","relationlist19"+increment);
        relationoption20.setAttribute("id","relationlist20"+increment);
        relationoption21.setAttribute("id","relationlist21"+increment);
        relationoption22.setAttribute("id","relationlist22"+increment);
        relationoption23.setAttribute("id","relationlist23"+increment);
        relationoption24.setAttribute("id","relationlist24"+increment);

        relationoption1.setAttribute("value","");
        relationoption2.setAttribute("value","Ancle");
        relationoption3.setAttribute("value","Aunt");
        relationoption4.setAttribute("value","Brother");
        relationoption5.setAttribute("value","Cousin");
        relationoption6.setAttribute("value","Daughter");
        relationoption7.setAttribute("value","Father");
        relationoption8.setAttribute("value","Grand Daughter");
        relationoption9.setAttribute("value","Grand Father");
        relationoption10.setAttribute("value","Grand Mother");
        relationoption11.setAttribute("value","Grand Son");
        relationoption12.setAttribute("value","Mother");
        relationoption13.setAttribute("value","Nephew");
        relationoption14.setAttribute("value","Niece");
        relationoption15.setAttribute("value","Sister");
        relationoption16.setAttribute("value","Son");
        relationoption17.setAttribute("value","Wife");
        relationoption18.setAttribute("value","Others");
        relationoption19.setAttribute("value","Father in Law");
        relationoption20.setAttribute("value","Mother in Law");
        relationoption21.setAttribute("value","Brother in Law");
        relationoption22.setAttribute("value","Sister in Law");
        relationoption23.setAttribute("value","Step Son");
        relationoption24.setAttribute("value","Step Daughter");

        relationoption1.innerHTML="";
        relationoption2.innerHTML="Ancle";
        relationoption3.innerHTML="Aunt";
        relationoption4.innerHTML="Brother";
        relationoption5.innerHTML="Cousin";
        relationoption6.innerHTML="Daughter";
        relationoption7.innerHTML="Father";
        relationoption8.innerHTML="Grand Daughter";
        relationoption9.innerHTML="Grand Father";
        relationoption10.innerHTML="Grand Mother";
        relationoption11.innerHTML="Grand Son";
        relationoption12.innerHTML="Mother";
        relationoption13.innerHTML="Nephew";
        relationoption14.innerHTML="Niece";
        relationoption15.innerHTML="Sister";
        relationoption16.innerHTML="Son";
        relationoption17.innerHTML="Wife";
        relationoption18.innerHTML="Others";
        relationoption19.innerHTML="Father in Law";
        relationoption20.innerHTML="Mother in Law";
        relationoption21.innerHTML="Brother in Law";
        relationoption22.innerHTML="Sister in Law";
        relationoption23.innerHTML="Step Son";
        relationoption24.innerHTML="Step Daughter";

        callrelationselect.appendChild(relationoption1);
        callrelationselect.appendChild(relationoption2); 
        callrelationselect.appendChild(relationoption3);
        callrelationselect.appendChild(relationoption4);
        callrelationselect.appendChild(relationoption21); 
        callrelationselect.appendChild(relationoption5); 
        callrelationselect.appendChild(relationoption6);
        callrelationselect.appendChild(relationoption7);
        callrelationselect.appendChild(relationoption19); 
        callrelationselect.appendChild(relationoption8);
        callrelationselect.appendChild(relationoption9);
        callrelationselect.appendChild(relationoption10);
        callrelationselect.appendChild(relationoption11);
        callrelationselect.appendChild(relationoption12); 
        callrelationselect.appendChild(relationoption13);
        callrelationselect.appendChild(relationoption20);
        callrelationselect.appendChild(relationoption14);
        callrelationselect.appendChild(relationoption15);
        callrelationselect.appendChild(relationoption22);
        callrelationselect.appendChild(relationoption16);
        callrelationselect.appendChild(relationoption24);
        callrelationselect.appendChild(relationoption23);
        callrelationselect.appendChild(relationoption17); 
        callrelationselect.appendChild(relationoption18);
        //

        var createbr1=document.createElement("br");
        createbr1.style.clear="both";
        calldiv.appendChild(createbr1);

        calldiv.appendChild(p4);

        var pwddiv=document.createElement("div");
        pwddiv.style.display="block";
        pwddiv.style.float="left";
        pwddiv.style.marginRight="10px";
        pwddiv.style.marginTop="10px";
        pwddiv.setAttribute("id","pwddiv"+increment);
        calldiv.appendChild(pwddiv);
        var callpwddiv=document.getElementById("pwddiv"+increment);

        var pwdselect=document.createElement("select");
        var pwdlabel=document.createElement("label");
        pwdlabel.innerHTML="PWD";
        pwdlabel.style.display="block";
        pwdlabel.style.transform="translateY(0.3em)";
        pwdlabel.style.marginBottom="8px";
        pwdlabel.style.paddingLeft="10px";
        pwdlabel.setAttribute("id","pwdlabel"+increment);

        pwdselect.setAttribute("id","pwdselect"+increment);
        pwdselect.setAttribute("name","pwd"+i);

        callpwddiv.appendChild(pwdlabel);

        var callpwdlabel=document.getElementById("pwdlabel"+increment);

        callpwddiv.appendChild(pwdselect);

        var callpwdselect=document.getElementById("pwdselect"+increment);
        var pwdoption1=document.createElement("option");
        var pwdoption2=document.createElement("option");
        var pwdoption3=document.createElement("option");
        var pwdoption4=document.createElement("option");

        pwdselect.style.fontSize="15px";
        pwdselect.style.outline="none";
        pwdselect.style.border="1px solid black";
        pwdselect.style.borderRadius="5px";
        pwdselect.style.width="250px";
        pwdselect.style.height="40px";
        pwdselect.style.cursor="pointer";
        pwdselect.style.paddingLeft="20px";

        pwdoption1.setAttribute("id","pwdlist1"+increment);
        pwdoption2.setAttribute("id","pwdlist2"+increment);
        pwdoption3.setAttribute("id","pwdlist3"+increment);
        pwdoption4.setAttribute("id","pwdlist4"+increment);

        pwdoption1.setAttribute("value","");
        pwdoption2.setAttribute("value","N/A");
        pwdoption3.setAttribute("value","Yes");
        pwdoption4.setAttribute("value","No");

        pwdoption1.innerHTML="";
        pwdoption2.innerHTML="N/A";
        pwdoption3.innerHTML="Yes";
        pwdoption4.innerHTML="No";

        callpwdselect.appendChild(pwdoption1);
        callpwdselect.appendChild(pwdoption3); 
        callpwdselect.appendChild(pwdoption4); 
        callpwdselect.appendChild(pwdoption2);

        var ipdiv=document.createElement("div");
        ipdiv.style.display="block";
        ipdiv.style.float="left";
        ipdiv.style.marginRight="10px";
        ipdiv.style.marginTop="10px";
        ipdiv.setAttribute("id","ipdiv"+increment);
        calldiv.appendChild(ipdiv);
        var callipdiv=document.getElementById("ipdiv"+increment);

        var ipselect=document.createElement("select");
        var iplabel=document.createElement("label");
        iplabel.innerHTML="IP";
        iplabel.style.display="block";
        iplabel.style.transform="translateY(0.3em)";
        iplabel.style.marginBottom="8px";
        iplabel.style.paddingLeft="10px";
        iplabel.setAttribute("id","iplabel"+increment);

        ipselect.setAttribute("id","ipselect"+increment);
        ipselect.setAttribute("name","ip"+i);

        callipdiv.appendChild(iplabel);

        var calliplabel=document.getElementById("iplabel"+increment);

        callipdiv.appendChild(ipselect);

        var callipselect=document.getElementById("ipselect"+increment);
        var ipoption1=document.createElement("option");
        var ipoption2=document.createElement("option");
        var ipoption3=document.createElement("option");
        var ipoption4=document.createElement("option");

        ipselect.style.fontSize="15px";
        ipselect.style.outline="none";
        ipselect.style.border="1px solid black";
        ipselect.style.borderRadius="5px";
        ipselect.style.width="250px";
        ipselect.style.height="40px";
        ipselect.style.cursor="pointer";
        ipselect.style.paddingLeft="20px";

        ipoption1.setAttribute("id","iplist1"+increment);
        ipoption2.setAttribute("id","iplist2"+increment);
        ipoption3.setAttribute("id","iplist3"+increment);
        ipoption4.setAttribute("id","iplist4"+increment);

        ipoption1.setAttribute("value","");
        ipoption2.setAttribute("value","N/A");
        ipoption3.setAttribute("value","Yes");
        ipoption4.setAttribute("value","No");

        ipoption1.innerHTML="";
        ipoption2.innerHTML="N/A";
        ipoption3.innerHTML="Yes";
        ipoption4.innerHTML="No";

        callipselect.appendChild(ipoption1);
        callipselect.appendChild(ipoption3); 
        callipselect.appendChild(ipoption4); 
        callipselect.appendChild(ipoption2);

        var philhealthdiv=document.createElement("div");
        philhealthdiv.style.display="block";
        philhealthdiv.style.float="left";
        philhealthdiv.style.marginRight="10px";
        philhealthdiv.style.marginTop="10px";
        philhealthdiv.setAttribute("id","philhealthdiv"+increment);
        calldiv.appendChild(philhealthdiv);
        var callphilhealthdiv=document.getElementById("philhealthdiv"+increment);

        var philhealthselect=document.createElement("select");
        var philhealthlabel=document.createElement("label");
        philhealthlabel.innerHTML="Philhealth";
        philhealthlabel.style.display="block";
        philhealthlabel.style.transform="translateY(0.3em)";
        philhealthlabel.style.marginBottom="8px";
        philhealthlabel.style.paddingLeft="10px";
        philhealthlabel.setAttribute("id","philhealthlabel"+increment);

        philhealthselect.setAttribute("id","philhealthselect"+increment);
        philhealthselect.setAttribute("name","philhealth"+i);

        callphilhealthdiv.appendChild(philhealthlabel);

        var callphilhealthlabel=document.getElementById("philhealthlabel"+increment);

        callphilhealthdiv.appendChild(philhealthselect);

        var callphilhealthselect=document.getElementById("philhealthselect"+increment);
        var philhealthoption1=document.createElement("option");
        var philhealthoption2=document.createElement("option");
        var philhealthoption3=document.createElement("option");
        var philhealthoption4=document.createElement("option");

        philhealthselect.style.fontSize="15px";
        philhealthselect.style.outline="none";
        philhealthselect.style.border="1px solid black";
        philhealthselect.style.borderRadius="5px";
        philhealthselect.style.width="250px";
        philhealthselect.style.cursor="pointer";
        philhealthselect.style.height="40px";
        philhealthselect.style.paddingLeft="20px";

        philhealthoption1.setAttribute("id","philhealthlist1"+increment);
        philhealthoption2.setAttribute("id","philhealthlist2"+increment);
        philhealthoption3.setAttribute("id","philhealthlist3"+increment);
        philhealthoption4.setAttribute("id","philhealthlist4"+increment);

        philhealthoption1.setAttribute("value","");
        philhealthoption2.setAttribute("value","N/A");
        philhealthoption3.setAttribute("value","Yes");
        philhealthoption4.setAttribute("value","No");

        philhealthoption1.innerHTML="";
        philhealthoption2.innerHTML="N/A";
        philhealthoption3.innerHTML="Yes";
        philhealthoption4.innerHTML="No";

        callphilhealthselect.appendChild(philhealthoption1);
        callphilhealthselect.appendChild(philhealthoption3); 
        callphilhealthselect.appendChild(philhealthoption4); 
        callphilhealthselect.appendChild(philhealthoption2);


        var breastfeeddiv=document.createElement("div");
        breastfeeddiv.style.display="block";
        breastfeeddiv.style.float="left";
        breastfeeddiv.style.marginRight="10px";
        breastfeeddiv.style.marginTop="10px";
        breastfeeddiv.setAttribute("id","breastfeeddiv"+increment);
        calldiv.appendChild(breastfeeddiv);
        var callbreastfeeddiv=document.getElementById("breastfeeddiv"+increment);

        var breastfeedselect=document.createElement("select");
        var breastfeedlabel=document.createElement("label");
        breastfeedlabel.innerHTML="Breast Feeding";
        breastfeedlabel.style.display="block";
        breastfeedlabel.style.transform="translateY(0.3em)";
        breastfeedlabel.style.marginBottom="8px";
        breastfeedlabel.style.paddingLeft="10px";
        breastfeedlabel.setAttribute("id","breastfeedlabel"+increment);

        breastfeedselect.setAttribute("id","breastfeedselect"+increment);
        breastfeedselect.setAttribute("name","breastfeed"+i);

        callbreastfeeddiv.appendChild(breastfeedlabel);

        var callbreastfeedlabel=document.getElementById("breastfeedlabel"+increment);

        callbreastfeeddiv.appendChild(breastfeedselect);

        var callbreastfeedselect=document.getElementById("breastfeedselect"+increment);
        var breastfeedoption1=document.createElement("option");
        var breastfeedoption2=document.createElement("option");
        var breastfeedoption3=document.createElement("option");
        var breastfeedoption4=document.createElement("option");

        breastfeedselect.style.fontSize="15px";
        breastfeedselect.style.outline="none";
        breastfeedselect.style.border="1px solid black";
        breastfeedselect.style.borderRadius="5px";
        breastfeedselect.style.width="250px";
        breastfeedselect.style.height="40px";
        breastfeedselect.style.cursor="pointer";
        breastfeedselect.style.paddingLeft="20px";

        breastfeedoption1.setAttribute("id","breastfeedlist1"+increment);
        breastfeedoption2.setAttribute("id","breastfeedlist2"+increment);
        breastfeedoption3.setAttribute("id","breastfeedlist3"+increment);
        breastfeedoption4.setAttribute("id","breastfeedlist4"+increment);

        breastfeedoption1.setAttribute("value","");
        breastfeedoption2.setAttribute("value","N/A");
        breastfeedoption3.setAttribute("value","Yes");
        breastfeedoption4.setAttribute("value","No");

        breastfeedoption1.innerHTML="";
        breastfeedoption2.innerHTML="N/A";
        breastfeedoption3.innerHTML="Yes";
        breastfeedoption4.innerHTML="No";

        callbreastfeedselect.appendChild(breastfeedoption1);
        callbreastfeedselect.appendChild(breastfeedoption3); 
        callbreastfeedselect.appendChild(breastfeedoption4); 
        callbreastfeedselect.appendChild(breastfeedoption2);

        
        var ntpdiv=document.createElement("div");
        ntpdiv.style.display="block";
        ntpdiv.style.float="left";
        ntpdiv.style.marginRight="10px";
        ntpdiv.style.marginTop="10px";
        ntpdiv.setAttribute("id","ntpdiv"+increment);
        calldiv.appendChild(ntpdiv);
        var callntpdiv=document.getElementById("ntpdiv"+increment);

        var ntpselect=document.createElement("select");
        var ntplabel=document.createElement("label");
        ntplabel.innerHTML="NTP";
        ntplabel.style.display="block";
        ntplabel.style.transform="translateY(0.3em)";
        ntplabel.style.marginBottom="8px";
        ntplabel.style.paddingLeft="10px";
        ntplabel.setAttribute("id","ntplabel"+increment);

        ntpselect.setAttribute("id","ntpselect"+increment);
        ntpselect.setAttribute("name","ntp"+i);

        callntpdiv.appendChild(ntplabel);

        var callntplabel=document.getElementById("ntplabel"+increment);

        callntpdiv.appendChild(ntpselect);

        var callntpselect=document.getElementById("ntpselect"+increment);
        var ntpoption1=document.createElement("option");
        var ntpoption2=document.createElement("option");
        var ntpoption3=document.createElement("option");
        var ntpoption4=document.createElement("option");

        ntpselect.style.fontSize="15px";
        ntpselect.style.outline="none";
        ntpselect.style.cursor="pointer";
        ntpselect.style.border="1px solid black";
        ntpselect.style.borderRadius="5px";
        ntpselect.style.width="250px";
        ntpselect.style.height="40px";
        ntpselect.style.paddingLeft="20px";

        ntpoption1.setAttribute("id","ntplist1"+increment);
        ntpoption2.setAttribute("id","ntplist2"+increment);
        ntpoption3.setAttribute("id","ntplist3"+increment);
        ntpoption4.setAttribute("id","ntplist4"+increment);

        ntpoption1.setAttribute("value","");
        ntpoption2.setAttribute("value","N/A");
        ntpoption3.setAttribute("value","Yes");
        ntpoption4.setAttribute("value","No");

        ntpoption1.innerHTML="";
        ntpoption2.innerHTML="N/A";
        ntpoption3.innerHTML="Yes";
        ntpoption4.innerHTML="No";

        callntpselect.appendChild(ntpoption1);
        callntpselect.appendChild(ntpoption3); 
        callntpselect.appendChild(ntpoption4); 
        callntpselect.appendChild(ntpoption2);

        
        var smookingdiv=document.createElement("div");
        smookingdiv.style.display="block";
        smookingdiv.style.float="left";
        smookingdiv.style.marginRight="10px";
        smookingdiv.style.marginTop="10px";
        smookingdiv.setAttribute("id","smookingdiv"+increment);
        calldiv.appendChild(smookingdiv);
        var callsmookingdiv=document.getElementById("smookingdiv"+increment);

        var smookingselect=document.createElement("select");
        var smookinglabel=document.createElement("label");
        smookinglabel.innerHTML="Smooking";
        smookinglabel.style.display="block";
        smookinglabel.style.transform="translateY(0.3em)";
        smookinglabel.style.marginBottom="8px";
        smookinglabel.style.paddingLeft="10px";
        smookinglabel.setAttribute("id","smookinglabel"+increment);

        smookingselect.setAttribute("id","smookingselect"+increment);
        smookingselect.setAttribute("name","smooking"+i);

        callsmookingdiv.appendChild(smookinglabel);

        var callsmookinglabel=document.getElementById("smookinglabel"+increment);

        callsmookingdiv.appendChild(smookingselect);

        var callsmookingselect=document.getElementById("smookingselect"+increment);
        var smookingoption1=document.createElement("option");
        var smookingoption2=document.createElement("option");
        var smookingoption3=document.createElement("option");
        var smookingoption4=document.createElement("option");

        smookingselect.style.fontSize="15px";
        smookingselect.style.cursor="pointer";
        smookingselect.style.outline="none";
        smookingselect.style.border="1px solid black";
        smookingselect.style.borderRadius="5px";
        smookingselect.style.width="250px";
        smookingselect.style.height="40px";
        smookingselect.style.paddingLeft="20px";

        smookingoption1.setAttribute("id","smookinglist1"+increment);
        smookingoption2.setAttribute("id","smookinglist2"+increment);
        smookingoption3.setAttribute("id","smookinglist3"+increment);
        smookingoption4.setAttribute("id","smookinglist4"+increment);

        smookingoption1.setAttribute("value","");
        smookingoption2.setAttribute("value","N/A");
        smookingoption3.setAttribute("value","Yes");
        smookingoption4.setAttribute("value","No");

        smookingoption1.innerHTML="";
        smookingoption2.innerHTML="N/A";
        smookingoption3.innerHTML="Yes";
        smookingoption4.innerHTML="No";

        callsmookingselect.appendChild(smookingoption1);
        callsmookingselect.appendChild(smookingoption3); 
        callsmookingselect.appendChild(smookingoption4); 
        callsmookingselect.appendChild(smookingoption2);


        var fourpsdiv=document.createElement("div");
        fourpsdiv.style.display="block";
        fourpsdiv.style.float="left";
        fourpsdiv.style.marginRight="10px";
        fourpsdiv.style.marginTop="10px";
        fourpsdiv.setAttribute("id","fourpsdiv"+increment);
        calldiv.appendChild(fourpsdiv);
        var callfourpsdiv=document.getElementById("fourpsdiv"+increment);

        var fourpsselect=document.createElement("select");
        var fourpslabel=document.createElement("label");
        fourpslabel.innerHTML="4Ps";
        fourpslabel.style.display="block";
        fourpslabel.style.transform="translateY(0.3em)";
        fourpslabel.style.marginBottom="8px";
        fourpslabel.style.paddingLeft="10px";
        fourpslabel.setAttribute("id","fourpslabel"+increment);

        fourpsselect.setAttribute("id","fourpsselect"+increment);
        fourpsselect.setAttribute("name","fourps"+i);

        callfourpsdiv.appendChild(fourpslabel);

        var callfourpslabel=document.getElementById("fourpslabel"+increment);

        callfourpsdiv.appendChild(fourpsselect);

        var callfourpsselect=document.getElementById("fourpsselect"+increment);
        var fourpsoption1=document.createElement("option");
        var fourpsoption2=document.createElement("option");
        var fourpsoption3=document.createElement("option");
        var fourpsoption4=document.createElement("option");

        fourpsselect.style.fontSize="15px";
        fourpsselect.style.cursor="pointer";
        fourpsselect.style.outline="none";
        fourpsselect.style.border="1px solid black";
        fourpsselect.style.borderRadius="5px";
        fourpsselect.style.width="250px";
        fourpsselect.style.height="40px";
        fourpsselect.style.paddingLeft="20px";

        fourpsoption1.setAttribute("id","fourpslist1"+increment);
        fourpsoption2.setAttribute("id","fourpslist2"+increment);
        fourpsoption3.setAttribute("id","fourpslist3"+increment);
        fourpsoption4.setAttribute("id","fourpslist4"+increment);

        fourpsoption1.setAttribute("value","");
        fourpsoption2.setAttribute("value","N/A");
        fourpsoption3.setAttribute("value","Yes");
        fourpsoption4.setAttribute("value","No");

        fourpsoption1.innerHTML="";
        fourpsoption2.innerHTML="N/A";
        fourpsoption3.innerHTML="Yes";
        fourpsoption4.innerHTML="No";

        callfourpsselect.appendChild(fourpsoption1);
        callfourpsselect.appendChild(fourpsoption3); 
        callfourpsselect.appendChild(fourpsoption4); 
        callfourpsselect.appendChild(fourpsoption2);


        calldiv.appendChild(linebreak);
        calldiv.appendChild(linebreak1);
        
        var createbr2=document.createElement("br");
        createbr2.style.clear="both";
        calldiv.appendChild(createbr2);
        
        increment++;
        repeater++;
        repeatercopy=repeater;
        incrementcopy=increment;
        repeaterloop=incrementcopy-repeatercopy;

        famnumcopy=famnum-1;

        if(famnum>1 && i==icopy && i!=famnumcopy){
        linediv.style.height="1px";
        linediv.style.marginTop="50px";
        linediv.style.marginBottom="80px";
        linediv.style.background="white";
        calldiv.appendChild(linediv);
        icopy=icopy+1;
        }
    }
    

    for(var optionloop=repeaterloop;optionloop<incrementcopy;optionloop++){
        
        //dependency-------------------
        var getdependencyselect=document.getElementById("dependencyselect"+optionloop);
        
        if(getdependencyselect==""){
            var getdependencylist1=document.getElementById("dependencylist1"+optionloop);
            var getdependencylist2=document.getElementById("dependencylist2"+optionloop);
            var getdependencylist3=document.getElementById("dependencylist3"+optionloop);

            getdependencylist1.setAttribute("selected","");
            getdependencylist2.removeAttribute("selected","");
            getdependencylist3.removeAttribute("selected","");
        }

        if(getdependencyselect=="Independent"){
            var getdependencylist1=document.getElementById("dependencylist1"+optionloop);
            var getdependencylist2=document.getElementById("dependencylist2"+optionloop);
            var getdependencylist3=document.getElementById("dependencylist3"+optionloop);

            getdependencylist1.removeAttribute("selected","");
            getdependencylist2.setAttribute("selected","");
            getdependencylist3.removeAttribute("selected","");
        }

        if(getdependencyselect=="Dependent"){
            var getdependencylist1=document.getElementById("dependencylist1"+optionloop);
            var getdependencylist2=document.getElementById("dependencylist2"+optionloop);
            var getdependencylist3=document.getElementById("dependencylist3"+optionloop);

            getdependencylist1.removeAttribute("selected","");
            getdependencylist2.removeAttribute("selected","");
            getdependencylist3.setAttribute("selected","");
        }
        //----------------------


        //sex-------------------
        var getsexselect=document.getElementById("sexselect"+optionloop);
        
        if(getsexselect==""){
            var getsexlist1=document.getElementById("sexlist1"+optionloop);
            var getsexlist2=document.getElementById("sexlist2"+optionloop);
            var getsexlist3=document.getElementById("sexlist3"+optionloop);

            getsexlist1.setAttribute("selected","");
            getsexlist2.removeAttribute("selected","");
            getsexlist3.removeAttribute("selected","");
        }

        if(getsexselect=="Male"){
            var getsexlist1=document.getElementById("sexlist1"+optionloop);
            var getsexlist2=document.getElementById("sexlist2"+optionloop);
            var getsexlist3=document.getElementById("sexlist3"+optionloop);

            getsexlist1.removeAttribute("selected","");
            getsexlist2.setAttribute("selected","");
            getsexlist3.removeAttribute("selected","");
        }

        if(getsexselect=="Female"){
            var getsexlist1=document.getElementById("sexlist1"+optionloop);
            var getsexlist2=document.getElementById("sexlist2"+optionloop);
            var getsexlist3=document.getElementById("sexlist3"+optionloop);

            getsexlist1.removeAttribute("selected","");
            getsexlist2.removeAttribute("selected","");
            getsexlist3.setAttribute("selected","");
        }
        //----------------------



        //religion-------------------
        var getreligionselect=document.getElementById("religionselect"+optionloop);
        
        if(getreligionselect==""){
            var getreligionlist1=document.getElementById("religionlist1"+optionloop);
            var getreligionlist2=document.getElementById("religionlist2"+optionloop);
            var getreligionlist3=document.getElementById("religionlist3"+optionloop);
            var getreligionlist4=document.getElementById("religionlist4"+optionloop);
            var getreligionlist5=document.getElementById("religionlist5"+optionloop);
            var getreligionlist6=document.getElementById("religionlist6"+optionloop);
            var getreligionlist7=document.getElementById("religionlist7"+optionloop);
            var getreligionlist8=document.getElementById("religionlist8"+optionloop);
            var getreligionlist9=document.getElementById("religionlist9"+optionloop);
            var getreligionlist10=document.getElementById("religionlist10"+optionloop);
            var getreligionlist11=document.getElementById("religionlist11"+optionloop);
            var getreligionlist12=document.getElementById("religionlist12"+optionloop);
            var getreligionlist13=document.getElementById("religionlist13"+optionloop);
            var getreligionlist14=document.getElementById("religionlist14"+optionloop);

            getreligionlist1.setAttribute("selected","");
            getreligionlist2.removeAttribute("selected","");
            getreligionlist3.removeAttribute("selected","");
            getreligionlist4.removeAttribute("selected","");
            getreligionlist5.removeAttribute("selected","");
            getreligionlist6.removeAttribute("selected","");
            getreligionlist7.removeAttribute("selected","");
            getreligionlist8.removeAttribute("selected","");
            getreligionlist9.removeAttribute("selected","");
            getreligionlist10.removeAttribute("selected","");
            getreligionlist11.removeAttribute("selected","");
            getreligionlist12.removeAttribute("selected","");
            getreligionlist13.removeAttribute("selected","");
            getreligionlist14.removeAttribute("selected","");
        }

        if(getreligionselect=="Aglipay"){
            var getreligionlist1=document.getElementById("religionlist1"+optionloop);
            var getreligionlist2=document.getElementById("religionlist2"+optionloop);
            var getreligionlist3=document.getElementById("religionlist3"+optionloop);
            var getreligionlist4=document.getElementById("religionlist4"+optionloop);
            var getreligionlist5=document.getElementById("religionlist5"+optionloop);
            var getreligionlist6=document.getElementById("religionlist6"+optionloop);
            var getreligionlist7=document.getElementById("religionlist7"+optionloop);
            var getreligionlist8=document.getElementById("religionlist8"+optionloop);
            var getreligionlist9=document.getElementById("religionlist9"+optionloop);
            var getreligionlist10=document.getElementById("religionlist10"+optionloop);
            var getreligionlist11=document.getElementById("religionlist11"+optionloop);
            var getreligionlist12=document.getElementById("religionlist12"+optionloop);
            var getreligionlist13=document.getElementById("religionlist13"+optionloop);
            var getreligionlist14=document.getElementById("religionlist14"+optionloop);

            getreligionlist1.removeAttribute("selected","");
            getreligionlist2.setAttribute("selected","");
            getreligionlist3.removeAttribute("selected","");
            getreligionlist4.removeAttribute("selected","");
            getreligionlist5.removeAttribute("selected","");
            getreligionlist6.removeAttribute("selected","");
            getreligionlist7.removeAttribute("selected","");
            getreligionlist8.removeAttribute("selected","");
            getreligionlist9.removeAttribute("selected","");
            getreligionlist10.removeAttribute("selected","");
            getreligionlist11.removeAttribute("selected","");
            getreligionlist12.removeAttribute("selected","");
            getreligionlist13.removeAttribute("selected","");
            getreligionlist14.removeAttribute("selected","");
        }

        if(getreligionselect=="Alliance"){
            var getreligionlist1=document.getElementById("religionlist1"+optionloop);
            var getreligionlist2=document.getElementById("religionlist2"+optionloop);
            var getreligionlist3=document.getElementById("religionlist3"+optionloop);
            var getreligionlist4=document.getElementById("religionlist4"+optionloop);
            var getreligionlist5=document.getElementById("religionlist5"+optionloop);
            var getreligionlist6=document.getElementById("religionlist6"+optionloop);
            var getreligionlist7=document.getElementById("religionlist7"+optionloop);
            var getreligionlist8=document.getElementById("religionlist8"+optionloop);
            var getreligionlist9=document.getElementById("religionlist9"+optionloop);
            var getreligionlist10=document.getElementById("religionlist10"+optionloop);
            var getreligionlist11=document.getElementById("religionlist11"+optionloop);
            var getreligionlist12=document.getElementById("religionlist12"+optionloop);
            var getreligionlist13=document.getElementById("religionlist13"+optionloop);
            var getreligionlist14=document.getElementById("religionlist14"+optionloop);

            getreligionlist1.removeAttribute("selected","");
            getreligionlist2.removeAttribute("selected","");
            getreligionlist3.setAttribute("selected","");
            getreligionlist4.removeAttribute("selected","");
            getreligionlist5.removeAttribute("selected","");
            getreligionlist6.removeAttribute("selected","");
            getreligionlist7.removeAttribute("selected","");
            getreligionlist8.removeAttribute("selected","");
            getreligionlist9.removeAttribute("selected","");
            getreligionlist10.removeAttribute("selected","");
            getreligionlist11.removeAttribute("selected","");
            getreligionlist12.removeAttribute("selected","");
            getreligionlist13.removeAttribute("selected","");
            getreligionlist14.removeAttribute("selected","");
        }

        if(getreligionselect=="Baptist"){
            var getreligionlist1=document.getElementById("religionlist1"+optionloop);
            var getreligionlist2=document.getElementById("religionlist2"+optionloop);
            var getreligionlist3=document.getElementById("religionlist3"+optionloop);
            var getreligionlist4=document.getElementById("religionlist4"+optionloop);
            var getreligionlist5=document.getElementById("religionlist5"+optionloop);
            var getreligionlist6=document.getElementById("religionlist6"+optionloop);
            var getreligionlist7=document.getElementById("religionlist7"+optionloop);
            var getreligionlist8=document.getElementById("religionlist8"+optionloop);
            var getreligionlist9=document.getElementById("religionlist9"+optionloop);
            var getreligionlist10=document.getElementById("religionlist10"+optionloop);
            var getreligionlist11=document.getElementById("religionlist11"+optionloop);
            var getreligionlist12=document.getElementById("religionlist12"+optionloop);
            var getreligionlist13=document.getElementById("religionlist13"+optionloop);
            var getreligionlist14=document.getElementById("religionlist14"+optionloop);

            getreligionlist1.removeAttribute("selected","");
            getreligionlist2.removeAttribute("selected","");
            getreligionlist3.removeAttribute("selected","");
            getreligionlist4.setAttribute("selected","");
            getreligionlist5.removeAttribute("selected","");
            getreligionlist6.removeAttribute("selected","");
            getreligionlist7.removeAttribute("selected","");
            getreligionlist8.removeAttribute("selected","");
            getreligionlist9.removeAttribute("selected","");
            getreligionlist10.removeAttribute("selected","");
            getreligionlist11.removeAttribute("selected","");
            getreligionlist12.removeAttribute("selected","");
            getreligionlist13.removeAttribute("selected","");
            getreligionlist14.removeAttribute("selected","");
        }

        if(getreligionselect=="Born Again"){
            var getreligionlist1=document.getElementById("religionlist1"+optionloop);
            var getreligionlist2=document.getElementById("religionlist2"+optionloop);
            var getreligionlist3=document.getElementById("religionlist3"+optionloop);
            var getreligionlist4=document.getElementById("religionlist4"+optionloop);
            var getreligionlist5=document.getElementById("religionlist5"+optionloop);
            var getreligionlist6=document.getElementById("religionlist6"+optionloop);
            var getreligionlist7=document.getElementById("religionlist7"+optionloop);
            var getreligionlist8=document.getElementById("religionlist8"+optionloop);
            var getreligionlist9=document.getElementById("religionlist9"+optionloop);
            var getreligionlist10=document.getElementById("religionlist10"+optionloop);
            var getreligionlist11=document.getElementById("religionlist11"+optionloop);
            var getreligionlist12=document.getElementById("religionlist12"+optionloop);
            var getreligionlist13=document.getElementById("religionlist13"+optionloop);
            var getreligionlist14=document.getElementById("religionlist14"+optionloop);

            getreligionlist1.removeAttribute("selected","");
            getreligionlist2.removeAttribute("selected","");
            getreligionlist3.removeAttribute("selected","");
            getreligionlist4.removeAttribute("selected","");
            getreligionlist5.setAttribute("selected","");
            getreligionlist6.removeAttribute("selected","");
            getreligionlist7.removeAttribute("selected","");
            getreligionlist8.removeAttribute("selected","");
            getreligionlist9.removeAttribute("selected","");
            getreligionlist10.removeAttribute("selected","");
            getreligionlist11.removeAttribute("selected","");
            getreligionlist12.removeAttribute("selected","");
            getreligionlist13.removeAttribute("selected","");
            getreligionlist14.removeAttribute("selected","");
        }

        if(getreligionselect=="Christian"){
            var getreligionlist1=document.getElementById("religionlist1"+optionloop);
            var getreligionlist2=document.getElementById("religionlist2"+optionloop);
            var getreligionlist3=document.getElementById("religionlist3"+optionloop);
            var getreligionlist4=document.getElementById("religionlist4"+optionloop);
            var getreligionlist5=document.getElementById("religionlist5"+optionloop);
            var getreligionlist6=document.getElementById("religionlist6"+optionloop);
            var getreligionlist7=document.getElementById("religionlist7"+optionloop);
            var getreligionlist8=document.getElementById("religionlist8"+optionloop);
            var getreligionlist9=document.getElementById("religionlist9"+optionloop);
            var getreligionlist10=document.getElementById("religionlist10"+optionloop);
            var getreligionlist11=document.getElementById("religionlist11"+optionloop);
            var getreligionlist12=document.getElementById("religionlist12"+optionloop);
            var getreligionlist13=document.getElementById("religionlist13"+optionloop);
            var getreligionlist14=document.getElementById("religionlist14"+optionloop);

            getreligionlist1.removeAttribute("selected","");
            getreligionlist2.removeAttribute("selected","");
            getreligionlist3.removeAttribute("selected","");
            getreligionlist4.removeAttribute("selected","");
            getreligionlist5.removeAttribute("selected","");
            getreligionlist6.setAttribute("selected","");
            getreligionlist7.removeAttribute("selected","");
            getreligionlist8.removeAttribute("selected","");
            getreligionlist9.removeAttribute("selected","");
            getreligionlist10.removeAttribute("selected","");
            getreligionlist11.removeAttribute("selected","");
            getreligionlist12.removeAttribute("selected","");
            getreligionlist13.removeAttribute("selected","");
            getreligionlist14.removeAttribute("selected","");
        }

        if(getreligionselect=="Epescopal"){
            var getreligionlist1=document.getElementById("religionlist1"+optionloop);
            var getreligionlist2=document.getElementById("religionlist2"+optionloop);
            var getreligionlist3=document.getElementById("religionlist3"+optionloop);
            var getreligionlist4=document.getElementById("religionlist4"+optionloop);
            var getreligionlist5=document.getElementById("religionlist5"+optionloop);
            var getreligionlist6=document.getElementById("religionlist6"+optionloop);
            var getreligionlist7=document.getElementById("religionlist7"+optionloop);
            var getreligionlist8=document.getElementById("religionlist8"+optionloop);
            var getreligionlist9=document.getElementById("religionlist9"+optionloop);
            var getreligionlist10=document.getElementById("religionlist10"+optionloop);
            var getreligionlist11=document.getElementById("religionlist11"+optionloop);
            var getreligionlist12=document.getElementById("religionlist12"+optionloop);
            var getreligionlist13=document.getElementById("religionlist13"+optionloop);
            var getreligionlist14=document.getElementById("religionlist14"+optionloop);

            getreligionlist1.removeAttribute("selected","");
            getreligionlist2.removeAttribute("selected","");
            getreligionlist3.removeAttribute("selected","");
            getreligionlist4.removeAttribute("selected","");
            getreligionlist5.removeAttribute("selected","");
            getreligionlist6.removeAttribute("selected","");
            getreligionlist7.setAttribute("selected","");
            getreligionlist8.removeAttribute("selected","");
            getreligionlist9.removeAttribute("selected","");
            getreligionlist10.removeAttribute("selected","");
            getreligionlist11.removeAttribute("selected","");
            getreligionlist12.removeAttribute("selected","");
            getreligionlist13.removeAttribute("selected","");
            getreligionlist14.removeAttribute("selected","");
        }

        if(getreligionselect=="Iglesia ni Cristo"){
            var getreligionlist1=document.getElementById("religionlist1"+optionloop);
            var getreligionlist2=document.getElementById("religionlist2"+optionloop);
            var getreligionlist3=document.getElementById("religionlist3"+optionloop);
            var getreligionlist4=document.getElementById("religionlist4"+optionloop);
            var getreligionlist5=document.getElementById("religionlist5"+optionloop);
            var getreligionlist6=document.getElementById("religionlist6"+optionloop);
            var getreligionlist7=document.getElementById("religionlist7"+optionloop);
            var getreligionlist8=document.getElementById("religionlist8"+optionloop);
            var getreligionlist9=document.getElementById("religionlist9"+optionloop);
            var getreligionlist10=document.getElementById("religionlist10"+optionloop);
            var getreligionlist11=document.getElementById("religionlist11"+optionloop);
            var getreligionlist12=document.getElementById("religionlist12"+optionloop);
            var getreligionlist13=document.getElementById("religionlist13"+optionloop);
            var getreligionlist14=document.getElementById("religionlist14"+optionloop);

            getreligionlist1.removeAttribute("selected","");
            getreligionlist2.removeAttribute("selected","");
            getreligionlist3.removeAttribute("selected","");
            getreligionlist4.removeAttribute("selected","");
            getreligionlist5.removeAttribute("selected","");
            getreligionlist6.removeAttribute("selected","");
            getreligionlist7.removeAttribute("selected","");
            getreligionlist8.setAttribute("selected","");
            getreligionlist9.removeAttribute("selected","");
            getreligionlist10.removeAttribute("selected","");
            getreligionlist11.removeAttribute("selected","");
            getreligionlist12.removeAttribute("selected","");
            getreligionlist13.removeAttribute("selected","");
            getreligionlist14.removeAttribute("selected","");
        }

        if(getreligionselect=="Islam"){
            var getreligionlist1=document.getElementById("religionlist1"+optionloop);
            var getreligionlist2=document.getElementById("religionlist2"+optionloop);
            var getreligionlist3=document.getElementById("religionlist3"+optionloop);
            var getreligionlist4=document.getElementById("religionlist4"+optionloop);
            var getreligionlist5=document.getElementById("religionlist5"+optionloop);
            var getreligionlist6=document.getElementById("religionlist6"+optionloop);
            var getreligionlist7=document.getElementById("religionlist7"+optionloop);
            var getreligionlist8=document.getElementById("religionlist8"+optionloop);
            var getreligionlist9=document.getElementById("religionlist9"+optionloop);
            var getreligionlist10=document.getElementById("religionlist10"+optionloop);
            var getreligionlist11=document.getElementById("religionlist11"+optionloop);
            var getreligionlist12=document.getElementById("religionlist12"+optionloop);
            var getreligionlist13=document.getElementById("religionlist13"+optionloop);
            var getreligionlist14=document.getElementById("religionlist14"+optionloop);

            getreligionlist1.removeAttribute("selected","");
            getreligionlist2.removeAttribute("selected","");
            getreligionlist3.removeAttribute("selected","");
            getreligionlist4.removeAttribute("selected","");
            getreligionlist5.removeAttribute("selected","");
            getreligionlist6.removeAttribute("selected","");
            getreligionlist7.removeAttribute("selected","");
            getreligionlist8.removeAttribute("selected","");
            getreligionlist9.setAttribute("selected","");
            getreligionlist10.removeAttribute("selected","");
            getreligionlist11.removeAttribute("selected","");
            getreligionlist12.removeAttribute("selected","");
            getreligionlist13.removeAttribute("selected","");
            getreligionlist14.removeAttribute("selected","");
        }

        if(getreligionselect=="Jehovahs Witness"){
            var getreligionlist1=document.getElementById("religionlist1"+optionloop);
            var getreligionlist2=document.getElementById("religionlist2"+optionloop);
            var getreligionlist3=document.getElementById("religionlist3"+optionloop);
            var getreligionlist4=document.getElementById("religionlist4"+optionloop);
            var getreligionlist5=document.getElementById("religionlist5"+optionloop);
            var getreligionlist6=document.getElementById("religionlist6"+optionloop);
            var getreligionlist7=document.getElementById("religionlist7"+optionloop);
            var getreligionlist8=document.getElementById("religionlist8"+optionloop);
            var getreligionlist9=document.getElementById("religionlist9"+optionloop);
            var getreligionlist10=document.getElementById("religionlist10"+optionloop);
            var getreligionlist11=document.getElementById("religionlist11"+optionloop);
            var getreligionlist12=document.getElementById("religionlist12"+optionloop);
            var getreligionlist13=document.getElementById("religionlist13"+optionloop);
            var getreligionlist14=document.getElementById("religionlist14"+optionloop);

            getreligionlist1.removeAttribute("selected","");
            getreligionlist2.removeAttribute("selected","");
            getreligionlist3.removeAttribute("selected","");
            getreligionlist4.removeAttribute("selected","");
            getreligionlist5.removeAttribute("selected","");
            getreligionlist6.removeAttribute("selected","");
            getreligionlist7.removeAttribute("selected","");
            getreligionlist8.removeAttribute("selected","");
            getreligionlist9.removeAttribute("selected","");
            getreligionlist10.setAttribute("selected","");
            getreligionlist11.removeAttribute("selected","");
            getreligionlist12.removeAttribute("selected","");
            getreligionlist13.removeAttribute("selected","");
            getreligionlist14.removeAttribute("selected","");
        }

        if(getreligionselect=="Pentecost"){
            var getreligionlist1=document.getElementById("religionlist1"+optionloop);
            var getreligionlist2=document.getElementById("religionlist2"+optionloop);
            var getreligionlist3=document.getElementById("religionlist3"+optionloop);
            var getreligionlist4=document.getElementById("religionlist4"+optionloop);
            var getreligionlist5=document.getElementById("religionlist5"+optionloop);
            var getreligionlist6=document.getElementById("religionlist6"+optionloop);
            var getreligionlist7=document.getElementById("religionlist7"+optionloop);
            var getreligionlist8=document.getElementById("religionlist8"+optionloop);
            var getreligionlist9=document.getElementById("religionlist9"+optionloop);
            var getreligionlist10=document.getElementById("religionlist10"+optionloop);
            var getreligionlist11=document.getElementById("religionlist11"+optionloop);
            var getreligionlist12=document.getElementById("religionlist12"+optionloop);
            var getreligionlist13=document.getElementById("religionlist13"+optionloop);
            var getreligionlist14=document.getElementById("religionlist14"+optionloop);

            getreligionlist1.removeAttribute("selected","");
            getreligionlist2.removeAttribute("selected","");
            getreligionlist3.removeAttribute("selected","");
            getreligionlist4.removeAttribute("selected","");
            getreligionlist5.removeAttribute("selected","");
            getreligionlist6.removeAttribute("selected","");
            getreligionlist7.removeAttribute("selected","");
            getreligionlist8.removeAttribute("selected","");
            getreligionlist9.removeAttribute("selected","");
            getreligionlist10.removeAttribute("selected","");
            getreligionlist11.setAttribute("selected","");
            getreligionlist12.removeAttribute("selected","");
            getreligionlist13.removeAttribute("selected","");
            getreligionlist14.removeAttribute("selected","");
        }

        if(getreligionselect=="Protestant"){
            var getreligionlist1=document.getElementById("religionlist1"+optionloop);
            var getreligionlist2=document.getElementById("religionlist2"+optionloop);
            var getreligionlist3=document.getElementById("religionlist3"+optionloop);
            var getreligionlist4=document.getElementById("religionlist4"+optionloop);
            var getreligionlist5=document.getElementById("religionlist5"+optionloop);
            var getreligionlist6=document.getElementById("religionlist6"+optionloop);
            var getreligionlist7=document.getElementById("religionlist7"+optionloop);
            var getreligionlist8=document.getElementById("religionlist8"+optionloop);
            var getreligionlist9=document.getElementById("religionlist9"+optionloop);
            var getreligionlist10=document.getElementById("religionlist10"+optionloop);
            var getreligionlist11=document.getElementById("religionlist11"+optionloop);
            var getreligionlist12=document.getElementById("religionlist12"+optionloop);
            var getreligionlist13=document.getElementById("religionlist13"+optionloop);
            var getreligionlist14=document.getElementById("religionlist14"+optionloop);

            getreligionlist1.removeAttribute("selected","");
            getreligionlist2.removeAttribute("selected","");
            getreligionlist3.removeAttribute("selected","");
            getreligionlist4.removeAttribute("selected","");
            getreligionlist5.removeAttribute("selected","");
            getreligionlist6.removeAttribute("selected","");
            getreligionlist7.removeAttribute("selected","");
            getreligionlist8.removeAttribute("selected","");
            getreligionlist9.removeAttribute("selected","");
            getreligionlist10.removeAttribute("selected","");
            getreligionlist11.removeAttribute("selected","");
            getreligionlist12.setAttribute("selected","");
            getreligionlist13.removeAttribute("selected","");
            getreligionlist14.removeAttribute("selected","");
        }

        if(getreligionselect=="Roman Catholic"){
            var getreligionlist1=document.getElementById("religionlist1"+optionloop);
            var getreligionlist2=document.getElementById("religionlist2"+optionloop);
            var getreligionlist3=document.getElementById("religionlist3"+optionloop);
            var getreligionlist4=document.getElementById("religionlist4"+optionloop);
            var getreligionlist5=document.getElementById("religionlist5"+optionloop);
            var getreligionlist6=document.getElementById("religionlist6"+optionloop);
            var getreligionlist7=document.getElementById("religionlist7"+optionloop);
            var getreligionlist8=document.getElementById("religionlist8"+optionloop);
            var getreligionlist9=document.getElementById("religionlist9"+optionloop);
            var getreligionlist10=document.getElementById("religionlist10"+optionloop);
            var getreligionlist11=document.getElementById("religionlist11"+optionloop);
            var getreligionlist12=document.getElementById("religionlist12"+optionloop);
            var getreligionlist13=document.getElementById("religionlist13"+optionloop);
            var getreligionlist14=document.getElementById("religionlist14"+optionloop);

            getreligionlist1.removeAttribute("selected","");
            getreligionlist2.removeAttribute("selected","");
            getreligionlist3.removeAttribute("selected","");
            getreligionlist4.removeAttribute("selected","");
            getreligionlist5.removeAttribute("selected","");
            getreligionlist6.removeAttribute("selected","");
            getreligionlist7.removeAttribute("selected","");
            getreligionlist8.removeAttribute("selected","");
            getreligionlist9.removeAttribute("selected","");
            getreligionlist10.removeAttribute("selected","");
            getreligionlist11.removeAttribute("selected","");
            getreligionlist12.removeAttribute("selected","");
            getreligionlist13.setAttribute("selected","");
            getreligionlist14.removeAttribute("selected","");
        }


        if(getreligionselect=="Seventh Day Adventist"){
            var getreligionlist1=document.getElementById("religionlist1"+optionloop);
            var getreligionlist2=document.getElementById("religionlist2"+optionloop);
            var getreligionlist3=document.getElementById("religionlist3"+optionloop);
            var getreligionlist4=document.getElementById("religionlist4"+optionloop);
            var getreligionlist5=document.getElementById("religionlist5"+optionloop);
            var getreligionlist6=document.getElementById("religionlist6"+optionloop);
            var getreligionlist7=document.getElementById("religionlist7"+optionloop);
            var getreligionlist8=document.getElementById("religionlist8"+optionloop);
            var getreligionlist9=document.getElementById("religionlist9"+optionloop);
            var getreligionlist10=document.getElementById("religionlist10"+optionloop);
            var getreligionlist11=document.getElementById("religionlist11"+optionloop);
            var getreligionlist12=document.getElementById("religionlist12"+optionloop);
            var getreligionlist13=document.getElementById("religionlist13"+optionloop);
            var getreligionlist14=document.getElementById("religionlist14"+optionloop);

            getreligionlist1.removeAttribute("selected","");
            getreligionlist2.removeAttribute("selected","");
            getreligionlist3.removeAttribute("selected","");
            getreligionlist4.removeAttribute("selected","");
            getreligionlist5.removeAttribute("selected","");
            getreligionlist6.removeAttribute("selected","");
            getreligionlist7.removeAttribute("selected","");
            getreligionlist8.removeAttribute("selected","");
            getreligionlist9.removeAttribute("selected","");
            getreligionlist10.removeAttribute("selected","");
            getreligionlist11.removeAttribute("selected","");
            getreligionlist12.removeAttribute("selected","");
            getreligionlist13.removeAttribute("selected","");
            getreligionlist14.setAttribute("selected","");
        }
        //----------------------

        //Education-------------------
        var geteducationselect=document.getElementById("educationselect"+optionloop);
        
        if(geteducationselect==""){
            var geteducationlist1=document.getElementById("educationlist1"+optionloop);
            var geteducationlist2=document.getElementById("educationlist2"+optionloop);
            var geteducationlist3=document.getElementById("educationlist3"+optionloop);
            var geteducationlist4=document.getElementById("educationlist4"+optionloop);
            var geteducationlist5=document.getElementById("educationlist5"+optionloop);
            var geteducationlist6=document.getElementById("educationlist6"+optionloop);
            var geteducationlist7=document.getElementById("educationlist7"+optionloop);
            var geteducationlist8=document.getElementById("educationlist8"+optionloop);
            var geteducationlist9=document.getElementById("educationlist9"+optionloop);
            var geteducationlist10=document.getElementById("educationlist10"+optionloop);
            var geteducationlist11=document.getElementById("educationlist11"+optionloop);
            var geteducationlist12=document.getElementById("educationlist12"+optionloop);
            var geteducationlist13=document.getElementById("educationlist13"+optionloop);

            geteducationlist1.setAttribute("selected","");
            geteducationlist2.removeAttribute("selected","");
            geteducationlist3.removeAttribute("selected","");
            geteducationlist4.removeAttribute("selected","");
            geteducationlist5.removeAttribute("selected","");
            geteducationlist6.removeAttribute("selected","");
            geteducationlist7.removeAttribute("selected","");
            geteducationlist8.removeAttribute("selected","");
            geteducationlist9.removeAttribute("selected","");
            geteducationlist10.removeAttribute("selected","");
            geteducationlist11.removeAttribute("selected","");
            geteducationlist12.removeAttribute("selected","");
            geteducationlist13.removeAttribute("selected","");
        }

        if(geteducationselect=="Not Attended"){
            var geteducationlist1=document.getElementById("educationlist1"+optionloop);
            var geteducationlist2=document.getElementById("educationlist2"+optionloop);
            var geteducationlist3=document.getElementById("educationlist3"+optionloop);
            var geteducationlist4=document.getElementById("educationlist4"+optionloop);
            var geteducationlist5=document.getElementById("educationlist5"+optionloop);
            var geteducationlist6=document.getElementById("educationlist6"+optionloop);
            var geteducationlist7=document.getElementById("educationlist7"+optionloop);
            var geteducationlist8=document.getElementById("educationlist8"+optionloop);
            var geteducationlist9=document.getElementById("educationlist9"+optionloop);
            var geteducationlist10=document.getElementById("educationlist10"+optionloop);
            var geteducationlist11=document.getElementById("educationlist11"+optionloop);
            var geteducationlist12=document.getElementById("educationlist12"+optionloop);
            var geteducationlist13=document.getElementById("educationlist13"+optionloop);

            geteducationlist1.removeAttribute("selected","");
            geteducationlist2.setAttribute("selected","");
            geteducationlist3.removeAttribute("selected","");
            geteducationlist4.removeAttribute("selected","");
            geteducationlist5.removeAttribute("selected","");
            geteducationlist6.removeAttribute("selected","");
            geteducationlist7.removeAttribute("selected","");
            geteducationlist8.removeAttribute("selected","");
            geteducationlist9.removeAttribute("selected","");
            geteducationlist10.removeAttribute("selected","");
            geteducationlist11.removeAttribute("selected","");
            geteducationlist12.removeAttribute("selected","");
            geteducationlist13.removeAttribute("selected","");
        }

        if(geteducationselect=="ALS"){
            var geteducationlist1=document.getElementById("educationlist1"+optionloop);
            var geteducationlist2=document.getElementById("educationlist2"+optionloop);
            var geteducationlist3=document.getElementById("educationlist3"+optionloop);
            var geteducationlist4=document.getElementById("educationlist4"+optionloop);
            var geteducationlist5=document.getElementById("educationlist5"+optionloop);
            var geteducationlist6=document.getElementById("educationlist6"+optionloop);
            var geteducationlist7=document.getElementById("educationlist7"+optionloop);
            var geteducationlist8=document.getElementById("educationlist8"+optionloop);
            var geteducationlist9=document.getElementById("educationlist9"+optionloop);
            var geteducationlist10=document.getElementById("educationlist10"+optionloop);
            var geteducationlist11=document.getElementById("educationlist11"+optionloop);
            var geteducationlist12=document.getElementById("educationlist12"+optionloop);
            var geteducationlist13=document.getElementById("educationlist13"+optionloop);

            geteducationlist1.removeAttribute("selected","");
            geteducationlist2.removeAttribute("selected","");
            geteducationlist3.setAttribute("selected","");
            geteducationlist4.removeAttribute("selected","");
            geteducationlist5.removeAttribute("selected","");
            geteducationlist6.removeAttribute("selected","");
            geteducationlist7.removeAttribute("selected","");
            geteducationlist8.removeAttribute("selected","");
            geteducationlist9.removeAttribute("selected","");
            geteducationlist10.removeAttribute("selected","");
            geteducationlist11.removeAttribute("selected","");
            geteducationlist12.removeAttribute("selected","");
            geteducationlist13.removeAttribute("selected","");
        }

        if(geteducationselect=="Vocational"){
            var geteducationlist1=document.getElementById("educationlist1"+optionloop);
            var geteducationlist2=document.getElementById("educationlist2"+optionloop);
            var geteducationlist3=document.getElementById("educationlist3"+optionloop);
            var geteducationlist4=document.getElementById("educationlist4"+optionloop);
            var geteducationlist5=document.getElementById("educationlist5"+optionloop);
            var geteducationlist6=document.getElementById("educationlist6"+optionloop);
            var geteducationlist7=document.getElementById("educationlist7"+optionloop);
            var geteducationlist8=document.getElementById("educationlist8"+optionloop);
            var geteducationlist9=document.getElementById("educationlist9"+optionloop);
            var geteducationlist10=document.getElementById("educationlist10"+optionloop);
            var geteducationlist11=document.getElementById("educationlist11"+optionloop);
            var geteducationlist12=document.getElementById("educationlist12"+optionloop);
            var geteducationlist13=document.getElementById("educationlist13"+optionloop);

            geteducationlist1.removeAttribute("selected","");
            geteducationlist2.removeAttribute("selected","");
            geteducationlist3.removeAttribute("selected","");
            geteducationlist4.setAttribute("selected","");
            geteducationlist5.removeAttribute("selected","");
            geteducationlist6.removeAttribute("selected","");
            geteducationlist7.removeAttribute("selected","");
            geteducationlist8.removeAttribute("selected","");
            geteducationlist9.removeAttribute("selected","");
            geteducationlist10.removeAttribute("selected","");
            geteducationlist11.removeAttribute("selected","");
            geteducationlist12.removeAttribute("selected","");
            geteducationlist13.removeAttribute("selected","");
        }

        if(geteducationselect=="Kinder Garten"){
            var geteducationlist1=document.getElementById("educationlist1"+optionloop);
            var geteducationlist2=document.getElementById("educationlist2"+optionloop);
            var geteducationlist3=document.getElementById("educationlist3"+optionloop);
            var geteducationlist4=document.getElementById("educationlist4"+optionloop);
            var geteducationlist5=document.getElementById("educationlist5"+optionloop);
            var geteducationlist6=document.getElementById("educationlist6"+optionloop);
            var geteducationlist7=document.getElementById("educationlist7"+optionloop);
            var geteducationlist8=document.getElementById("educationlist8"+optionloop);
            var geteducationlist9=document.getElementById("educationlist9"+optionloop);
            var geteducationlist10=document.getElementById("educationlist10"+optionloop);
            var geteducationlist11=document.getElementById("educationlist11"+optionloop);
            var geteducationlist12=document.getElementById("educationlist12"+optionloop);
            var geteducationlist13=document.getElementById("educationlist13"+optionloop);

            geteducationlist1.removeAttribute("selected","");
            geteducationlist2.removeAttribute("selected","");
            geteducationlist3.removeAttribute("selected","");
            geteducationlist4.removeAttribute("selected","");
            geteducationlist5.setAttribute("selected","");
            geteducationlist6.removeAttribute("selected","");
            geteducationlist7.removeAttribute("selected","");
            geteducationlist8.removeAttribute("selected","");
            geteducationlist9.removeAttribute("selected","");
            geteducationlist10.removeAttribute("selected","");
            geteducationlist11.removeAttribute("selected","");
            geteducationlist12.removeAttribute("selected","");
            geteducationlist13.removeAttribute("selected","");
        }

        if(geteducationselect=="Elementary Level"){
            var geteducationlist1=document.getElementById("educationlist1"+optionloop);
            var geteducationlist2=document.getElementById("educationlist2"+optionloop);
            var geteducationlist3=document.getElementById("educationlist3"+optionloop);
            var geteducationlist4=document.getElementById("educationlist4"+optionloop);
            var geteducationlist5=document.getElementById("educationlist5"+optionloop);
            var geteducationlist6=document.getElementById("educationlist6"+optionloop);
            var geteducationlist7=document.getElementById("educationlist7"+optionloop);
            var geteducationlist8=document.getElementById("educationlist8"+optionloop);
            var geteducationlist9=document.getElementById("educationlist9"+optionloop);
            var geteducationlist10=document.getElementById("educationlist10"+optionloop);
            var geteducationlist11=document.getElementById("educationlist11"+optionloop);
            var geteducationlist12=document.getElementById("educationlist12"+optionloop);
            var geteducationlist13=document.getElementById("educationlist13"+optionloop);

            geteducationlist1.removeAttribute("selected","");
            geteducationlist2.removeAttribute("selected","");
            geteducationlist3.removeAttribute("selected","");
            geteducationlist4.removeAttribute("selected","");
            geteducationlist5.removeAttribute("selected","");
            geteducationlist6.setAttribute("selected","");
            geteducationlist7.removeAttribute("selected","");
            geteducationlist8.removeAttribute("selected","");
            geteducationlist9.removeAttribute("selected","");
            geteducationlist10.removeAttribute("selected","");
            geteducationlist11.removeAttribute("selected","");
            geteducationlist12.removeAttribute("selected","");
            geteducationlist13.removeAttribute("selected","");
        }

        if(geteducationselect=="Elementary Graduate"){
            var geteducationlist1=document.getElementById("educationlist1"+optionloop);
            var geteducationlist2=document.getElementById("educationlist2"+optionloop);
            var geteducationlist3=document.getElementById("educationlist3"+optionloop);
            var geteducationlist4=document.getElementById("educationlist4"+optionloop);
            var geteducationlist5=document.getElementById("educationlist5"+optionloop);
            var geteducationlist6=document.getElementById("educationlist6"+optionloop);
            var geteducationlist7=document.getElementById("educationlist7"+optionloop);
            var geteducationlist8=document.getElementById("educationlist8"+optionloop);
            var geteducationlist9=document.getElementById("educationlist9"+optionloop);
            var geteducationlist10=document.getElementById("educationlist10"+optionloop);
            var geteducationlist11=document.getElementById("educationlist11"+optionloop);
            var geteducationlist12=document.getElementById("educationlist12"+optionloop);
            var geteducationlist13=document.getElementById("educationlist13"+optionloop);

            geteducationlist1.removeAttribute("selected","");
            geteducationlist2.removeAttribute("selected","");
            geteducationlist3.removeAttribute("selected","");
            geteducationlist4.removeAttribute("selected","");
            geteducationlist5.removeAttribute("selected","");
            geteducationlist6.removeAttribute("selected","");
            geteducationlist7.setAttribute("selected","");
            geteducationlist8.removeAttribute("selected","");
            geteducationlist9.removeAttribute("selected","");
            geteducationlist10.removeAttribute("selected","");
            geteducationlist11.removeAttribute("selected","");
            geteducationlist12.removeAttribute("selected","");
            geteducationlist13.removeAttribute("selected","");
        }

        if(geteducationselect=="High School Level"){
            var geteducationlist1=document.getElementById("educationlist1"+optionloop);
            var geteducationlist2=document.getElementById("educationlist2"+optionloop);
            var geteducationlist3=document.getElementById("educationlist3"+optionloop);
            var geteducationlist4=document.getElementById("educationlist4"+optionloop);
            var geteducationlist5=document.getElementById("educationlist5"+optionloop);
            var geteducationlist6=document.getElementById("educationlist6"+optionloop);
            var geteducationlist7=document.getElementById("educationlist7"+optionloop);
            var geteducationlist8=document.getElementById("educationlist8"+optionloop);
            var geteducationlist9=document.getElementById("educationlist9"+optionloop);
            var geteducationlist10=document.getElementById("educationlist10"+optionloop);
            var geteducationlist11=document.getElementById("educationlist11"+optionloop);
            var geteducationlist12=document.getElementById("educationlist12"+optionloop);
            var geteducationlist13=document.getElementById("educationlist13"+optionloop);

            geteducationlist1.removeAttribute("selected","");
            geteducationlist2.removeAttribute("selected","");
            geteducationlist3.removeAttribute("selected","");
            geteducationlist4.removeAttribute("selected","");
            geteducationlist5.removeAttribute("selected","");
            geteducationlist6.removeAttribute("selected","");
            geteducationlist7.removeAttribute("selected","");
            geteducationlist8.setAttribute("selected","");
            geteducationlist9.removeAttribute("selected","");
            geteducationlist10.removeAttribute("selected","");
            geteducationlist11.removeAttribute("selected","");
            geteducationlist12.removeAttribute("selected","");
            geteducationlist13.removeAttribute("selected","");
        }

        if(geteducationselect=="High School Graduate"){
            var geteducationlist1=document.getElementById("educationlist1"+optionloop);
            var geteducationlist2=document.getElementById("educationlist2"+optionloop);
            var geteducationlist3=document.getElementById("educationlist3"+optionloop);
            var geteducationlist4=document.getElementById("educationlist4"+optionloop);
            var geteducationlist5=document.getElementById("educationlist5"+optionloop);
            var geteducationlist6=document.getElementById("educationlist6"+optionloop);
            var geteducationlist7=document.getElementById("educationlist7"+optionloop);
            var geteducationlist8=document.getElementById("educationlist8"+optionloop);
            var geteducationlist9=document.getElementById("educationlist9"+optionloop);
            var geteducationlist10=document.getElementById("educationlist10"+optionloop);
            var geteducationlist11=document.getElementById("educationlist11"+optionloop);
            var geteducationlist12=document.getElementById("educationlist12"+optionloop);
            var geteducationlist13=document.getElementById("educationlist13"+optionloop);

            geteducationlist1.removeAttribute("selected","");
            geteducationlist2.removeAttribute("selected","");
            geteducationlist3.removeAttribute("selected","");
            geteducationlist4.removeAttribute("selected","");
            geteducationlist5.removeAttribute("selected","");
            geteducationlist6.removeAttribute("selected","");
            geteducationlist7.removeAttribute("selected","");
            geteducationlist8.removeAttribute("selected","");
            geteducationlist9.setAttribute("selected","");
            geteducationlist10.removeAttribute("selected","");
            geteducationlist11.removeAttribute("selected","");
            geteducationlist12.removeAttribute("selected","");
            geteducationlist13.removeAttribute("selected","");
        }

        if(geteducationselect=="Senior High School Level"){
            var geteducationlist1=document.getElementById("educationlist1"+optionloop);
            var geteducationlist2=document.getElementById("educationlist2"+optionloop);
            var geteducationlist3=document.getElementById("educationlist3"+optionloop);
            var geteducationlist4=document.getElementById("educationlist4"+optionloop);
            var geteducationlist5=document.getElementById("educationlist5"+optionloop);
            var geteducationlist6=document.getElementById("educationlist6"+optionloop);
            var geteducationlist7=document.getElementById("educationlist7"+optionloop);
            var geteducationlist8=document.getElementById("educationlist8"+optionloop);
            var geteducationlist9=document.getElementById("educationlist9"+optionloop);
            var geteducationlist10=document.getElementById("educationlist10"+optionloop);
            var geteducationlist11=document.getElementById("educationlist11"+optionloop);
            var geteducationlist12=document.getElementById("educationlist12"+optionloop);
            var geteducationlist13=document.getElementById("educationlist13"+optionloop);

            geteducationlist1.removeAttribute("selected","");
            geteducationlist2.removeAttribute("selected","");
            geteducationlist3.removeAttribute("selected","");
            geteducationlist4.removeAttribute("selected","");
            geteducationlist5.removeAttribute("selected","");
            geteducationlist6.removeAttribute("selected","");
            geteducationlist7.removeAttribute("selected","");
            geteducationlist8.removeAttribute("selected","");
            geteducationlist9.removeAttribute("selected","");
            geteducationlist10.setAttribute("selected","");
            geteducationlist11.removeAttribute("selected","");
            geteducationlist12.removeAttribute("selected","");
            geteducationlist13.removeAttribute("selected","");
        }

        if(geteducationselect=="Senior High School Graduate"){
            var geteducationlist1=document.getElementById("educationlist1"+optionloop);
            var geteducationlist2=document.getElementById("educationlist2"+optionloop);
            var geteducationlist3=document.getElementById("educationlist3"+optionloop);
            var geteducationlist4=document.getElementById("educationlist4"+optionloop);
            var geteducationlist5=document.getElementById("educationlist5"+optionloop);
            var geteducationlist6=document.getElementById("educationlist6"+optionloop);
            var geteducationlist7=document.getElementById("educationlist7"+optionloop);
            var geteducationlist8=document.getElementById("educationlist8"+optionloop);
            var geteducationlist9=document.getElementById("educationlist9"+optionloop);
            var geteducationlist10=document.getElementById("educationlist10"+optionloop);
            var geteducationlist11=document.getElementById("educationlist11"+optionloop);
            var geteducationlist12=document.getElementById("educationlist12"+optionloop);
            var geteducationlist13=document.getElementById("educationlist13"+optionloop);

            geteducationlist1.removeAttribute("selected","");
            geteducationlist2.removeAttribute("selected","");
            geteducationlist3.removeAttribute("selected","");
            geteducationlist4.removeAttribute("selected","");
            geteducationlist5.removeAttribute("selected","");
            geteducationlist6.removeAttribute("selected","");
            geteducationlist7.removeAttribute("selected","");
            geteducationlist8.removeAttribute("selected","");
            geteducationlist9.removeAttribute("selected","");
            geteducationlist10.removeAttribute("selected","");
            geteducationlist11.setAttribute("selected","");
            geteducationlist12.removeAttribute("selected","");
            geteducationlist13.removeAttribute("selected","");
        }

        if(geteducationselect=="College Level"){
            var geteducationlist1=document.getElementById("educationlist1"+optionloop);
            var geteducationlist2=document.getElementById("educationlist2"+optionloop);
            var geteducationlist3=document.getElementById("educationlist3"+optionloop);
            var geteducationlist4=document.getElementById("educationlist4"+optionloop);
            var geteducationlist5=document.getElementById("educationlist5"+optionloop);
            var geteducationlist6=document.getElementById("educationlist6"+optionloop);
            var geteducationlist7=document.getElementById("educationlist7"+optionloop);
            var geteducationlist8=document.getElementById("educationlist8"+optionloop);
            var geteducationlist9=document.getElementById("educationlist9"+optionloop);
            var geteducationlist10=document.getElementById("educationlist10"+optionloop);
            var geteducationlist11=document.getElementById("educationlist11"+optionloop);
            var geteducationlist12=document.getElementById("educationlist12"+optionloop);
            var geteducationlist13=document.getElementById("educationlist13"+optionloop);

            geteducationlist1.removeAttribute("selected","");
            geteducationlist2.removeAttribute("selected","");
            geteducationlist3.removeAttribute("selected","");
            geteducationlist4.removeAttribute("selected","");
            geteducationlist5.removeAttribute("selected","");
            geteducationlist6.removeAttribute("selected","");
            geteducationlist7.removeAttribute("selected","");
            geteducationlist8.removeAttribute("selected","");
            geteducationlist9.removeAttribute("selected","");
            geteducationlist10.removeAttribute("selected","");
            geteducationlist11.removeAttribute("selected","");
            geteducationlist12.setAttribute("selected","");
            geteducationlist13.removeAttribute("selected","");
        }

        if(geteducationselect=="College Graduate"){
            var geteducationlist1=document.getElementById("educationlist1"+optionloop);
            var geteducationlist2=document.getElementById("educationlist2"+optionloop);
            var geteducationlist3=document.getElementById("educationlist3"+optionloop);
            var geteducationlist4=document.getElementById("educationlist4"+optionloop);
            var geteducationlist5=document.getElementById("educationlist5"+optionloop);
            var geteducationlist6=document.getElementById("educationlist6"+optionloop);
            var geteducationlist7=document.getElementById("educationlist7"+optionloop);
            var geteducationlist8=document.getElementById("educationlist8"+optionloop);
            var geteducationlist9=document.getElementById("educationlist9"+optionloop);
            var geteducationlist10=document.getElementById("educationlist10"+optionloop);
            var geteducationlist11=document.getElementById("educationlist11"+optionloop);
            var geteducationlist12=document.getElementById("educationlist12"+optionloop);
            var geteducationlist13=document.getElementById("educationlist13"+optionloop);

            geteducationlist1.removeAttribute("selected","");
            geteducationlist2.removeAttribute("selected","");
            geteducationlist3.removeAttribute("selected","");
            geteducationlist4.removeAttribute("selected","");
            geteducationlist5.removeAttribute("selected","");
            geteducationlist6.removeAttribute("selected","");
            geteducationlist7.removeAttribute("selected","");
            geteducationlist8.removeAttribute("selected","");
            geteducationlist9.removeAttribute("selected","");
            geteducationlist10.removeAttribute("selected","");
            geteducationlist11.removeAttribute("selected","");
            geteducationlist12.removeAttribute("selected","");
            geteducationlist13.setAttribute("selected","");
        }
        //----------------------


        //relation-------------------
        var getrelationselect=document.getElementById("relationselect"+optionloop);    

        if(getrelationselect==""){
            var getrelationlist1=document.getElementById("relationlist1"+optionloop);
            var getrelationlist2=document.getElementById("relationlist2"+optionloop);
            var getrelationlist3=document.getElementById("relationlist3"+optionloop);
            var getrelationlist4=document.getElementById("relationlist4"+optionloop);
            var getrelationlist5=document.getElementById("relationlist5"+optionloop);
            var getrelationlist6=document.getElementById("relationlist6"+optionloop);
            var getrelationlist7=document.getElementById("relationlist7"+optionloop);
            var getrelationlist8=document.getElementById("relationlist8"+optionloop);
            var getrelationlist9=document.getElementById("relationlist9"+optionloop);
            var getrelationlist10=document.getElementById("relationlist10"+optionloop);
            var getrelationlist11=document.getElementById("relationlist11"+optionloop);
            var getrelationlist12=document.getElementById("relationlist12"+optionloop);
            var getrelationlist13=document.getElementById("relationlist13"+optionloop);
            var getrelationlist14=document.getElementById("relationlist14"+optionloop);
            var getrelationlist15=document.getElementById("relationlist15"+optionloop);
            var getrelationlist16=document.getElementById("relationlist16"+optionloop);
            var getrelationlist17=document.getElementById("relationlist17"+optionloop);
            var getrelationlist18=document.getElementById("relationlist18"+optionloop);
            var getrelationlist19=document.getElementById("relationlist19"+optionloop);
            var getrelationlist20=document.getElementById("relationlist20"+optionloop);
            var getrelationlist21=document.getElementById("relationlist21"+optionloop);
            var getrelationlist22=document.getElementById("relationlist22"+optionloop);
            var getrelationlist23=document.getElementById("relationlist23"+optionloop);
            var getrelationlist24=document.getElementById("relationlist24"+optionloop);

            getrelationlist1.setAttribute("selected","");
            getrelationlist2.removeAttribute("selected","");
            getrelationlist3.removeAttribute("selected","");
            getrelationlist4.removeAttribute("selected","");
            getrelationlist5.removeAttribute("selected","");
            getrelationlist6.removeAttribute("selected","");
            getrelationlist7.removeAttribute("selected","");
            getrelationlist8.removeAttribute("selected","");
            getrelationlist9.removeAttribute("selected","");
            getrelationlist10.removeAttribute("selected","");
            getrelationlist11.removeAttribute("selected","");
            getrelationlist12.removeAttribute("selected","");
            getrelationlist13.removeAttribute("selected","");
            getrelationlist14.removeAttribute("selected","");
            getrelationlist15.removeAttribute("selected","");
            getrelationlist16.removeAttribute("selected","");
            getrelationlist17.removeAttribute("selected","");
            getrelationlist18.removeAttribute("selected","");
            getrelationlist19.removeAttribute("selected","");
            getrelationlist20.removeAttribute("selected","");
            getrelationlist21.removeAttribute("selected","");
            getrelationlist22.removeAttribute("selected","");
            getrelationlist23.removeAttribute("selected","");
            getrelationlist24.removeAttribute("selected","");
        }

        if(getrelationselect=="Ancle"){
            var getrelationlist1=document.getElementById("relationlist1"+optionloop);
            var getrelationlist2=document.getElementById("relationlist2"+optionloop);
            var getrelationlist3=document.getElementById("relationlist3"+optionloop);
            var getrelationlist4=document.getElementById("relationlist4"+optionloop);
            var getrelationlist5=document.getElementById("relationlist5"+optionloop);
            var getrelationlist6=document.getElementById("relationlist6"+optionloop);
            var getrelationlist7=document.getElementById("relationlist7"+optionloop);
            var getrelationlist8=document.getElementById("relationlist8"+optionloop);
            var getrelationlist9=document.getElementById("relationlist9"+optionloop);
            var getrelationlist10=document.getElementById("relationlist10"+optionloop);
            var getrelationlist11=document.getElementById("relationlist11"+optionloop);
            var getrelationlist12=document.getElementById("relationlist12"+optionloop);
            var getrelationlist13=document.getElementById("relationlist13"+optionloop);
            var getrelationlist14=document.getElementById("relationlist14"+optionloop);
            var getrelationlist15=document.getElementById("relationlist15"+optionloop);
            var getrelationlist16=document.getElementById("relationlist16"+optionloop);
            var getrelationlist17=document.getElementById("relationlist17"+optionloop);
            var getrelationlist18=document.getElementById("relationlist18"+optionloop);
            var getrelationlist19=document.getElementById("relationlist19"+optionloop);
            var getrelationlist20=document.getElementById("relationlist20"+optionloop);
            var getrelationlist21=document.getElementById("relationlist21"+optionloop);
            var getrelationlist22=document.getElementById("relationlist22"+optionloop);
            var getrelationlist23=document.getElementById("relationlist23"+optionloop);
            var getrelationlist24=document.getElementById("relationlist24"+optionloop);

            getrelationlist1.removeAttribute("selected","");
            getrelationlist2.setAttribute("selected","");
            getrelationlist3.removeAttribute("selected","");
            getrelationlist4.removeAttribute("selected","");
            getrelationlist5.removeAttribute("selected","");
            getrelationlist6.removeAttribute("selected","");
            getrelationlist7.removeAttribute("selected","");
            getrelationlist8.removeAttribute("selected","");
            getrelationlist9.removeAttribute("selected","");
            getrelationlist10.removeAttribute("selected","");
            getrelationlist11.removeAttribute("selected","");
            getrelationlist12.removeAttribute("selected","");
            getrelationlist13.removeAttribute("selected","");
            getrelationlist14.removeAttribute("selected","");
            getrelationlist15.removeAttribute("selected","");
            getrelationlist16.removeAttribute("selected","");
            getrelationlist17.removeAttribute("selected","");
            getrelationlist18.removeAttribute("selected","");
            getrelationlist19.removeAttribute("selected","");
            getrelationlist20.removeAttribute("selected","");
            getrelationlist21.removeAttribute("selected","");
            getrelationlist22.removeAttribute("selected","");
            getrelationlist23.removeAttribute("selected","");
            getrelationlist24.removeAttribute("selected","");
        }

        if(getrelationselect=="Aunt"){
            var getrelationlist1=document.getElementById("relationlist1"+optionloop);
            var getrelationlist2=document.getElementById("relationlist2"+optionloop);
            var getrelationlist3=document.getElementById("relationlist3"+optionloop);
            var getrelationlist4=document.getElementById("relationlist4"+optionloop);
            var getrelationlist5=document.getElementById("relationlist5"+optionloop);
            var getrelationlist6=document.getElementById("relationlist6"+optionloop);
            var getrelationlist7=document.getElementById("relationlist7"+optionloop);
            var getrelationlist8=document.getElementById("relationlist8"+optionloop);
            var getrelationlist9=document.getElementById("relationlist9"+optionloop);
            var getrelationlist10=document.getElementById("relationlist10"+optionloop);
            var getrelationlist11=document.getElementById("relationlist11"+optionloop);
            var getrelationlist12=document.getElementById("relationlist12"+optionloop);
            var getrelationlist13=document.getElementById("relationlist13"+optionloop);
            var getrelationlist14=document.getElementById("relationlist14"+optionloop);
            var getrelationlist15=document.getElementById("relationlist15"+optionloop);
            var getrelationlist16=document.getElementById("relationlist16"+optionloop);
            var getrelationlist17=document.getElementById("relationlist17"+optionloop);
            var getrelationlist18=document.getElementById("relationlist18"+optionloop);
            var getrelationlist19=document.getElementById("relationlist19"+optionloop);
            var getrelationlist20=document.getElementById("relationlist20"+optionloop);
            var getrelationlist21=document.getElementById("relationlist21"+optionloop);
            var getrelationlist22=document.getElementById("relationlist22"+optionloop);
            var getrelationlist23=document.getElementById("relationlist23"+optionloop);
            var getrelationlist24=document.getElementById("relationlist24"+optionloop);

            getrelationlist1.removeAttribute("selected","");
            getrelationlist2.removeAttribute("selected","");
            getrelationlist3.setAttribute("selected","");
            getrelationlist4.removeAttribute("selected","");
            getrelationlist5.removeAttribute("selected","");
            getrelationlist6.removeAttribute("selected","");
            getrelationlist7.removeAttribute("selected","");
            getrelationlist8.removeAttribute("selected","");
            getrelationlist9.removeAttribute("selected","");
            getrelationlist10.removeAttribute("selected","");
            getrelationlist11.removeAttribute("selected","");
            getrelationlist12.removeAttribute("selected","");
            getrelationlist13.removeAttribute("selected","");
            getrelationlist14.removeAttribute("selected","");
            getrelationlist15.removeAttribute("selected","");
            getrelationlist16.removeAttribute("selected","");
            getrelationlist17.removeAttribute("selected","");
            getrelationlist18.removeAttribute("selected","");
            getrelationlist19.removeAttribute("selected","");
            getrelationlist20.removeAttribute("selected","");
            getrelationlist21.removeAttribute("selected","");
            getrelationlist22.removeAttribute("selected","");
            getrelationlist23.removeAttribute("selected","");
            getrelationlist24.removeAttribute("selected","");
        }

        if(getrelationselect=="Brother"){
            var getrelationlist1=document.getElementById("relationlist1"+optionloop);
            var getrelationlist2=document.getElementById("relationlist2"+optionloop);
            var getrelationlist3=document.getElementById("relationlist3"+optionloop);
            var getrelationlist4=document.getElementById("relationlist4"+optionloop);
            var getrelationlist5=document.getElementById("relationlist5"+optionloop);
            var getrelationlist6=document.getElementById("relationlist6"+optionloop);
            var getrelationlist7=document.getElementById("relationlist7"+optionloop);
            var getrelationlist8=document.getElementById("relationlist8"+optionloop);
            var getrelationlist9=document.getElementById("relationlist9"+optionloop);
            var getrelationlist10=document.getElementById("relationlist10"+optionloop);
            var getrelationlist11=document.getElementById("relationlist11"+optionloop);
            var getrelationlist12=document.getElementById("relationlist12"+optionloop);
            var getrelationlist13=document.getElementById("relationlist13"+optionloop);
            var getrelationlist14=document.getElementById("relationlist14"+optionloop);
            var getrelationlist15=document.getElementById("relationlist15"+optionloop);
            var getrelationlist16=document.getElementById("relationlist16"+optionloop);
            var getrelationlist17=document.getElementById("relationlist17"+optionloop);
            var getrelationlist18=document.getElementById("relationlist18"+optionloop);
            var getrelationlist19=document.getElementById("relationlist19"+optionloop);
            var getrelationlist20=document.getElementById("relationlist20"+optionloop);
            var getrelationlist21=document.getElementById("relationlist21"+optionloop);
            var getrelationlist22=document.getElementById("relationlist22"+optionloop);
            var getrelationlist23=document.getElementById("relationlist23"+optionloop);
            var getrelationlist24=document.getElementById("relationlist24"+optionloop);

            getrelationlist1.removeAttribute("selected","");
            getrelationlist2.removeAttribute("selected","");
            getrelationlist3.removeAttribute("selected","");
            getrelationlist4.setAttribute("selected","");
            getrelationlist5.removeAttribute("selected","");
            getrelationlist6.removeAttribute("selected","");
            getrelationlist7.removeAttribute("selected","");
            getrelationlist8.removeAttribute("selected","");
            getrelationlist9.removeAttribute("selected","");
            getrelationlist10.removeAttribute("selected","");
            getrelationlist11.removeAttribute("selected","");
            getrelationlist12.removeAttribute("selected","");
            getrelationlist13.removeAttribute("selected","");
            getrelationlist14.removeAttribute("selected","");
            getrelationlist15.removeAttribute("selected","");
            getrelationlist16.removeAttribute("selected","");
            getrelationlist17.removeAttribute("selected","");
            getrelationlist18.removeAttribute("selected","");
            getrelationlist19.removeAttribute("selected","");
            getrelationlist20.removeAttribute("selected","");
            getrelationlist21.removeAttribute("selected","");
            getrelationlist22.removeAttribute("selected","");
            getrelationlist23.removeAttribute("selected","");
            getrelationlist24.removeAttribute("selected","");
        }

        if(getrelationselect=="Cousin"){
            var getrelationlist1=document.getElementById("relationlist1"+optionloop);
            var getrelationlist2=document.getElementById("relationlist2"+optionloop);
            var getrelationlist3=document.getElementById("relationlist3"+optionloop);
            var getrelationlist4=document.getElementById("relationlist4"+optionloop);
            var getrelationlist5=document.getElementById("relationlist5"+optionloop);
            var getrelationlist6=document.getElementById("relationlist6"+optionloop);
            var getrelationlist7=document.getElementById("relationlist7"+optionloop);
            var getrelationlist8=document.getElementById("relationlist8"+optionloop);
            var getrelationlist9=document.getElementById("relationlist9"+optionloop);
            var getrelationlist10=document.getElementById("relationlist10"+optionloop);
            var getrelationlist11=document.getElementById("relationlist11"+optionloop);
            var getrelationlist12=document.getElementById("relationlist12"+optionloop);
            var getrelationlist13=document.getElementById("relationlist13"+optionloop);
            var getrelationlist14=document.getElementById("relationlist14"+optionloop);
            var getrelationlist15=document.getElementById("relationlist15"+optionloop);
            var getrelationlist16=document.getElementById("relationlist16"+optionloop);
            var getrelationlist17=document.getElementById("relationlist17"+optionloop);
            var getrelationlist18=document.getElementById("relationlist18"+optionloop);
            var getrelationlist19=document.getElementById("relationlist19"+optionloop);
            var getrelationlist20=document.getElementById("relationlist20"+optionloop);
            var getrelationlist21=document.getElementById("relationlist21"+optionloop);
            var getrelationlist22=document.getElementById("relationlist22"+optionloop);
            var getrelationlist23=document.getElementById("relationlist23"+optionloop);
            var getrelationlist24=document.getElementById("relationlist24"+optionloop);

            getrelationlist1.removeAttribute("selected","");
            getrelationlist2.removeAttribute("selected","");
            getrelationlist3.removeAttribute("selected","");
            getrelationlist4.removeAttribute("selected","");
            getrelationlist5.setAttribute("selected","");
            getrelationlist6.removeAttribute("selected","");
            getrelationlist7.removeAttribute("selected","");
            getrelationlist8.removeAttribute("selected","");
            getrelationlist9.removeAttribute("selected","");
            getrelationlist10.removeAttribute("selected","");
            getrelationlist11.removeAttribute("selected","");
            getrelationlist12.removeAttribute("selected","");
            getrelationlist13.removeAttribute("selected","");
            getrelationlist14.removeAttribute("selected","");
            getrelationlist15.removeAttribute("selected","");
            getrelationlist16.removeAttribute("selected","");
            getrelationlist17.removeAttribute("selected","");
            getrelationlist18.removeAttribute("selected","");
            getrelationlist19.removeAttribute("selected","");
            getrelationlist20.removeAttribute("selected","");
            getrelationlist21.removeAttribute("selected","");
            getrelationlist22.removeAttribute("selected","");
            getrelationlist23.removeAttribute("selected","");
            getrelationlist24.removeAttribute("selected","");
        }

        if(getrelationselect=="Daughter"){
            var getrelationlist1=document.getElementById("relationlist1"+optionloop);
            var getrelationlist2=document.getElementById("relationlist2"+optionloop);
            var getrelationlist3=document.getElementById("relationlist3"+optionloop);
            var getrelationlist4=document.getElementById("relationlist4"+optionloop);
            var getrelationlist5=document.getElementById("relationlist5"+optionloop);
            var getrelationlist6=document.getElementById("relationlist6"+optionloop);
            var getrelationlist7=document.getElementById("relationlist7"+optionloop);
            var getrelationlist8=document.getElementById("relationlist8"+optionloop);
            var getrelationlist9=document.getElementById("relationlist9"+optionloop);
            var getrelationlist10=document.getElementById("relationlist10"+optionloop);
            var getrelationlist11=document.getElementById("relationlist11"+optionloop);
            var getrelationlist12=document.getElementById("relationlist12"+optionloop);
            var getrelationlist13=document.getElementById("relationlist13"+optionloop);
            var getrelationlist14=document.getElementById("relationlist14"+optionloop);
            var getrelationlist15=document.getElementById("relationlist15"+optionloop);
            var getrelationlist16=document.getElementById("relationlist16"+optionloop);
            var getrelationlist17=document.getElementById("relationlist17"+optionloop);
            var getrelationlist18=document.getElementById("relationlist18"+optionloop);
            var getrelationlist19=document.getElementById("relationlist19"+optionloop);
            var getrelationlist20=document.getElementById("relationlist20"+optionloop);
            var getrelationlist21=document.getElementById("relationlist21"+optionloop);
            var getrelationlist22=document.getElementById("relationlist22"+optionloop);
            var getrelationlist23=document.getElementById("relationlist23"+optionloop);
            var getrelationlist24=document.getElementById("relationlist24"+optionloop);

            getrelationlist1.removeAttribute("selected","");
            getrelationlist2.removeAttribute("selected","");
            getrelationlist3.removeAttribute("selected","");
            getrelationlist4.removeAttribute("selected","");
            getrelationlist5.removeAttribute("selected","");
            getrelationlist6.setAttribute("selected","");
            getrelationlist7.removeAttribute("selected","");
            getrelationlist8.removeAttribute("selected","");
            getrelationlist9.removeAttribute("selected","");
            getrelationlist10.removeAttribute("selected","");
            getrelationlist11.removeAttribute("selected","");
            getrelationlist12.removeAttribute("selected","");
            getrelationlist13.removeAttribute("selected","");
            getrelationlist14.removeAttribute("selected","");
            getrelationlist15.removeAttribute("selected","");
            getrelationlist16.removeAttribute("selected","");
            getrelationlist17.removeAttribute("selected","");
            getrelationlist18.removeAttribute("selected","");
            getrelationlist19.removeAttribute("selected","");
            getrelationlist20.removeAttribute("selected","");
            getrelationlist21.removeAttribute("selected","");
            getrelationlist22.removeAttribute("selected","");
            getrelationlist23.removeAttribute("selected","");
            getrelationlist24.removeAttribute("selected","");
        }

        if(getrelationselect=="Father"){
            var getrelationlist1=document.getElementById("relationlist1"+optionloop);
            var getrelationlist2=document.getElementById("relationlist2"+optionloop);
            var getrelationlist3=document.getElementById("relationlist3"+optionloop);
            var getrelationlist4=document.getElementById("relationlist4"+optionloop);
            var getrelationlist5=document.getElementById("relationlist5"+optionloop);
            var getrelationlist6=document.getElementById("relationlist6"+optionloop);
            var getrelationlist7=document.getElementById("relationlist7"+optionloop);
            var getrelationlist8=document.getElementById("relationlist8"+optionloop);
            var getrelationlist9=document.getElementById("relationlist9"+optionloop);
            var getrelationlist10=document.getElementById("relationlist10"+optionloop);
            var getrelationlist11=document.getElementById("relationlist11"+optionloop);
            var getrelationlist12=document.getElementById("relationlist12"+optionloop);
            var getrelationlist13=document.getElementById("relationlist13"+optionloop);
            var getrelationlist14=document.getElementById("relationlist14"+optionloop);
            var getrelationlist15=document.getElementById("relationlist15"+optionloop);
            var getrelationlist16=document.getElementById("relationlist16"+optionloop);
            var getrelationlist17=document.getElementById("relationlist17"+optionloop);
            var getrelationlist18=document.getElementById("relationlist18"+optionloop);
            var getrelationlist19=document.getElementById("relationlist19"+optionloop);
            var getrelationlist20=document.getElementById("relationlist20"+optionloop);
            var getrelationlist21=document.getElementById("relationlist21"+optionloop);
            var getrelationlist22=document.getElementById("relationlist22"+optionloop);
            var getrelationlist23=document.getElementById("relationlist23"+optionloop);
            var getrelationlist24=document.getElementById("relationlist24"+optionloop);

            getrelationlist1.removeAttribute("selected","");
            getrelationlist2.removeAttribute("selected","");
            getrelationlist3.removeAttribute("selected","");
            getrelationlist4.removeAttribute("selected","");
            getrelationlist5.removeAttribute("selected","");
            getrelationlist6.removeAttribute("selected","");
            getrelationlist7.setAttribute("selected","");
            getrelationlist8.removeAttribute("selected","");
            getrelationlist9.removeAttribute("selected","");
            getrelationlist10.removeAttribute("selected","");
            getrelationlist11.removeAttribute("selected","");
            getrelationlist12.removeAttribute("selected","");
            getrelationlist13.removeAttribute("selected","");
            getrelationlist14.removeAttribute("selected","");
            getrelationlist15.removeAttribute("selected","");
            getrelationlist16.removeAttribute("selected","");
            getrelationlist17.removeAttribute("selected","");
            getrelationlist18.removeAttribute("selected","");
            getrelationlist19.removeAttribute("selected","");
            getrelationlist20.removeAttribute("selected","");
            getrelationlist21.removeAttribute("selected","");
            getrelationlist22.removeAttribute("selected","");
            getrelationlist23.removeAttribute("selected","");
            getrelationlist24.removeAttribute("selected","");
        }

        if(getrelationselect=="Grand Daughter"){
            var getrelationlist1=document.getElementById("relationlist1"+optionloop);
            var getrelationlist2=document.getElementById("relationlist2"+optionloop);
            var getrelationlist3=document.getElementById("relationlist3"+optionloop);
            var getrelationlist4=document.getElementById("relationlist4"+optionloop);
            var getrelationlist5=document.getElementById("relationlist5"+optionloop);
            var getrelationlist6=document.getElementById("relationlist6"+optionloop);
            var getrelationlist7=document.getElementById("relationlist7"+optionloop);
            var getrelationlist8=document.getElementById("relationlist8"+optionloop);
            var getrelationlist9=document.getElementById("relationlist9"+optionloop);
            var getrelationlist10=document.getElementById("relationlist10"+optionloop);
            var getrelationlist11=document.getElementById("relationlist11"+optionloop);
            var getrelationlist12=document.getElementById("relationlist12"+optionloop);
            var getrelationlist13=document.getElementById("relationlist13"+optionloop);
            var getrelationlist14=document.getElementById("relationlist14"+optionloop);
            var getrelationlist15=document.getElementById("relationlist15"+optionloop);
            var getrelationlist16=document.getElementById("relationlist16"+optionloop);
            var getrelationlist17=document.getElementById("relationlist17"+optionloop);
            var getrelationlist18=document.getElementById("relationlist18"+optionloop);
            var getrelationlist19=document.getElementById("relationlist19"+optionloop);
            var getrelationlist20=document.getElementById("relationlist20"+optionloop);
            var getrelationlist21=document.getElementById("relationlist21"+optionloop);
            var getrelationlist22=document.getElementById("relationlist22"+optionloop);
            var getrelationlist23=document.getElementById("relationlist23"+optionloop);
            var getrelationlist24=document.getElementById("relationlist24"+optionloop);

            getrelationlist1.removeAttribute("selected","");
            getrelationlist2.removeAttribute("selected","");
            getrelationlist3.removeAttribute("selected","");
            getrelationlist4.removeAttribute("selected","");
            getrelationlist5.removeAttribute("selected","");
            getrelationlist6.removeAttribute("selected","");
            getrelationlist7.removeAttribute("selected","");
            getrelationlist8.setAttribute("selected","");
            getrelationlist9.removeAttribute("selected","");
            getrelationlist10.removeAttribute("selected","");
            getrelationlist11.removeAttribute("selected","");
            getrelationlist12.removeAttribute("selected","");
            getrelationlist13.removeAttribute("selected","");
            getrelationlist14.removeAttribute("selected","");
            getrelationlist15.removeAttribute("selected","");
            getrelationlist16.removeAttribute("selected","");
            getrelationlist17.removeAttribute("selected","");
            getrelationlist18.removeAttribute("selected","");
            getrelationlist19.removeAttribute("selected","");
            getrelationlist20.removeAttribute("selected","");
            getrelationlist21.removeAttribute("selected","");
            getrelationlist22.removeAttribute("selected","");
            getrelationlist23.removeAttribute("selected","");
            getrelationlist24.removeAttribute("selected","");
        }

        if(getrelationselect=="Grand Father"){
            var getrelationlist1=document.getElementById("relationlist1"+optionloop);
            var getrelationlist2=document.getElementById("relationlist2"+optionloop);
            var getrelationlist3=document.getElementById("relationlist3"+optionloop);
            var getrelationlist4=document.getElementById("relationlist4"+optionloop);
            var getrelationlist5=document.getElementById("relationlist5"+optionloop);
            var getrelationlist6=document.getElementById("relationlist6"+optionloop);
            var getrelationlist7=document.getElementById("relationlist7"+optionloop);
            var getrelationlist8=document.getElementById("relationlist8"+optionloop);
            var getrelationlist9=document.getElementById("relationlist9"+optionloop);
            var getrelationlist10=document.getElementById("relationlist10"+optionloop);
            var getrelationlist11=document.getElementById("relationlist11"+optionloop);
            var getrelationlist12=document.getElementById("relationlist12"+optionloop);
            var getrelationlist13=document.getElementById("relationlist13"+optionloop);
            var getrelationlist14=document.getElementById("relationlist14"+optionloop);
            var getrelationlist15=document.getElementById("relationlist15"+optionloop);
            var getrelationlist16=document.getElementById("relationlist16"+optionloop);
            var getrelationlist17=document.getElementById("relationlist17"+optionloop);
            var getrelationlist18=document.getElementById("relationlist18"+optionloop);
            var getrelationlist19=document.getElementById("relationlist19"+optionloop);
            var getrelationlist20=document.getElementById("relationlist20"+optionloop);
            var getrelationlist21=document.getElementById("relationlist21"+optionloop);
            var getrelationlist22=document.getElementById("relationlist22"+optionloop);
            var getrelationlist23=document.getElementById("relationlist23"+optionloop);
            var getrelationlist24=document.getElementById("relationlist24"+optionloop);

            getrelationlist1.removeAttribute("selected","");
            getrelationlist2.removeAttribute("selected","");
            getrelationlist3.removeAttribute("selected","");
            getrelationlist4.removeAttribute("selected","");
            getrelationlist5.removeAttribute("selected","");
            getrelationlist6.removeAttribute("selected","");
            getrelationlist7.removeAttribute("selected","");
            getrelationlist8.removeAttribute("selected","");
            getrelationlist9.setAttribute("selected","");
            getrelationlist10.removeAttribute("selected","");
            getrelationlist11.removeAttribute("selected","");
            getrelationlist12.removeAttribute("selected","");
            getrelationlist13.removeAttribute("selected","");
            getrelationlist14.removeAttribute("selected","");
            getrelationlist15.removeAttribute("selected","");
            getrelationlist16.removeAttribute("selected","");
            getrelationlist17.removeAttribute("selected","");
            getrelationlist18.removeAttribute("selected","");
            getrelationlist19.removeAttribute("selected","");
            getrelationlist20.removeAttribute("selected","");
            getrelationlist21.removeAttribute("selected","");
            getrelationlist22.removeAttribute("selected","");
            getrelationlist23.removeAttribute("selected","");
            getrelationlist24.removeAttribute("selected","");
        }

        if(getrelationselect=="Grand Mother"){
            var getrelationlist1=document.getElementById("relationlist1"+optionloop);
            var getrelationlist2=document.getElementById("relationlist2"+optionloop);
            var getrelationlist3=document.getElementById("relationlist3"+optionloop);
            var getrelationlist4=document.getElementById("relationlist4"+optionloop);
            var getrelationlist5=document.getElementById("relationlist5"+optionloop);
            var getrelationlist6=document.getElementById("relationlist6"+optionloop);
            var getrelationlist7=document.getElementById("relationlist7"+optionloop);
            var getrelationlist8=document.getElementById("relationlist8"+optionloop);
            var getrelationlist9=document.getElementById("relationlist9"+optionloop);
            var getrelationlist10=document.getElementById("relationlist10"+optionloop);
            var getrelationlist11=document.getElementById("relationlist11"+optionloop);
            var getrelationlist12=document.getElementById("relationlist12"+optionloop);
            var getrelationlist13=document.getElementById("relationlist13"+optionloop);
            var getrelationlist14=document.getElementById("relationlist14"+optionloop);
            var getrelationlist15=document.getElementById("relationlist15"+optionloop);
            var getrelationlist16=document.getElementById("relationlist16"+optionloop);
            var getrelationlist17=document.getElementById("relationlist17"+optionloop);
            var getrelationlist18=document.getElementById("relationlist18"+optionloop);
            var getrelationlist19=document.getElementById("relationlist19"+optionloop);
            var getrelationlist20=document.getElementById("relationlist20"+optionloop);
            var getrelationlist21=document.getElementById("relationlist21"+optionloop);
            var getrelationlist22=document.getElementById("relationlist22"+optionloop);
            var getrelationlist23=document.getElementById("relationlist23"+optionloop);
            var getrelationlist24=document.getElementById("relationlist24"+optionloop);

            getrelationlist1.removeAttribute("selected","");
            getrelationlist2.removeAttribute("selected","");
            getrelationlist3.removeAttribute("selected","");
            getrelationlist4.removeAttribute("selected","");
            getrelationlist5.removeAttribute("selected","");
            getrelationlist6.removeAttribute("selected","");
            getrelationlist7.removeAttribute("selected","");
            getrelationlist8.removeAttribute("selected","");
            getrelationlist9.removeAttribute("selected","");
            getrelationlist10.setAttribute("selected","");
            getrelationlist11.removeAttribute("selected","");
            getrelationlist12.removeAttribute("selected","");
            getrelationlist13.removeAttribute("selected","");
            getrelationlist14.removeAttribute("selected","");
            getrelationlist15.removeAttribute("selected","");
            getrelationlist16.removeAttribute("selected","");
            getrelationlist17.removeAttribute("selected","");
            getrelationlist18.removeAttribute("selected","");
            getrelationlist19.removeAttribute("selected","");
            getrelationlist20.removeAttribute("selected","");
            getrelationlist21.removeAttribute("selected","");
            getrelationlist22.removeAttribute("selected","");
            getrelationlist23.removeAttribute("selected","");
            getrelationlist24.removeAttribute("selected","");
        }

        if(getrelationselect=="Grand Son"){
            var getrelationlist1=document.getElementById("relationlist1"+optionloop);
            var getrelationlist2=document.getElementById("relationlist2"+optionloop);
            var getrelationlist3=document.getElementById("relationlist3"+optionloop);
            var getrelationlist4=document.getElementById("relationlist4"+optionloop);
            var getrelationlist5=document.getElementById("relationlist5"+optionloop);
            var getrelationlist6=document.getElementById("relationlist6"+optionloop);
            var getrelationlist7=document.getElementById("relationlist7"+optionloop);
            var getrelationlist8=document.getElementById("relationlist8"+optionloop);
            var getrelationlist9=document.getElementById("relationlist9"+optionloop);
            var getrelationlist10=document.getElementById("relationlist10"+optionloop);
            var getrelationlist11=document.getElementById("relationlist11"+optionloop);
            var getrelationlist12=document.getElementById("relationlist12"+optionloop);
            var getrelationlist13=document.getElementById("relationlist13"+optionloop);
            var getrelationlist14=document.getElementById("relationlist14"+optionloop);
            var getrelationlist15=document.getElementById("relationlist15"+optionloop);
            var getrelationlist16=document.getElementById("relationlist16"+optionloop);
            var getrelationlist17=document.getElementById("relationlist17"+optionloop);
            var getrelationlist18=document.getElementById("relationlist18"+optionloop);
            var getrelationlist19=document.getElementById("relationlist19"+optionloop);
            var getrelationlist20=document.getElementById("relationlist20"+optionloop);
            var getrelationlist21=document.getElementById("relationlist21"+optionloop);
            var getrelationlist22=document.getElementById("relationlist22"+optionloop);
            var getrelationlist23=document.getElementById("relationlist23"+optionloop);
            var getrelationlist24=document.getElementById("relationlist24"+optionloop);

            getrelationlist1.removeAttribute("selected","");
            getrelationlist2.removeAttribute("selected","");
            getrelationlist3.removeAttribute("selected","");
            getrelationlist4.removeAttribute("selected","");
            getrelationlist5.removeAttribute("selected","");
            getrelationlist6.removeAttribute("selected","");
            getrelationlist7.removeAttribute("selected","");
            getrelationlist8.removeAttribute("selected","");
            getrelationlist9.removeAttribute("selected","");
            getrelationlist10.removeAttribute("selected","");
            getrelationlist11.setAttribute("selected","");
            getrelationlist12.removeAttribute("selected","");
            getrelationlist13.removeAttribute("selected","");
            getrelationlist14.removeAttribute("selected","");
            getrelationlist15.removeAttribute("selected","");
            getrelationlist16.removeAttribute("selected","");
            getrelationlist17.removeAttribute("selected","");
            getrelationlist18.removeAttribute("selected","");
            getrelationlist19.removeAttribute("selected","");
            getrelationlist20.removeAttribute("selected","");
            getrelationlist21.removeAttribute("selected","");
            getrelationlist22.removeAttribute("selected","");
            getrelationlist23.removeAttribute("selected","");
            getrelationlist24.removeAttribute("selected","");
        }

        if(getrelationselect=="Mother"){
            var getrelationlist1=document.getElementById("relationlist1"+optionloop);
            var getrelationlist2=document.getElementById("relationlist2"+optionloop);
            var getrelationlist3=document.getElementById("relationlist3"+optionloop);
            var getrelationlist4=document.getElementById("relationlist4"+optionloop);
            var getrelationlist5=document.getElementById("relationlist5"+optionloop);
            var getrelationlist6=document.getElementById("relationlist6"+optionloop);
            var getrelationlist7=document.getElementById("relationlist7"+optionloop);
            var getrelationlist8=document.getElementById("relationlist8"+optionloop);
            var getrelationlist9=document.getElementById("relationlist9"+optionloop);
            var getrelationlist10=document.getElementById("relationlist10"+optionloop);
            var getrelationlist11=document.getElementById("relationlist11"+optionloop);
            var getrelationlist12=document.getElementById("relationlist12"+optionloop);
            var getrelationlist13=document.getElementById("relationlist13"+optionloop);
            var getrelationlist14=document.getElementById("relationlist14"+optionloop);
            var getrelationlist15=document.getElementById("relationlist15"+optionloop);
            var getrelationlist16=document.getElementById("relationlist16"+optionloop);
            var getrelationlist17=document.getElementById("relationlist17"+optionloop);
            var getrelationlist18=document.getElementById("relationlist18"+optionloop);
            var getrelationlist19=document.getElementById("relationlist19"+optionloop);
            var getrelationlist20=document.getElementById("relationlist20"+optionloop);
            var getrelationlist21=document.getElementById("relationlist21"+optionloop);
            var getrelationlist22=document.getElementById("relationlist22"+optionloop);
            var getrelationlist23=document.getElementById("relationlist23"+optionloop);
            var getrelationlist24=document.getElementById("relationlist24"+optionloop);

            getrelationlist1.removeAttribute("selected","");
            getrelationlist2.removeAttribute("selected","");
            getrelationlist3.removeAttribute("selected","");
            getrelationlist4.removeAttribute("selected","");
            getrelationlist5.removeAttribute("selected","");
            getrelationlist6.removeAttribute("selected","");
            getrelationlist7.removeAttribute("selected","");
            getrelationlist8.removeAttribute("selected","");
            getrelationlist9.removeAttribute("selected","");
            getrelationlist10.removeAttribute("selected","");
            getrelationlist11.removeAttribute("selected","");
            getrelationlist12.setAttribute("selected","");
            getrelationlist13.removeAttribute("selected","");
            getrelationlist14.removeAttribute("selected","");
            getrelationlist15.removeAttribute("selected","");
            getrelationlist16.removeAttribute("selected","");
            getrelationlist17.removeAttribute("selected","");
            getrelationlist18.removeAttribute("selected","");
            getrelationlist19.removeAttribute("selected","");
            getrelationlist20.removeAttribute("selected","");
            getrelationlist21.removeAttribute("selected","");
            getrelationlist22.removeAttribute("selected","");
            getrelationlist23.removeAttribute("selected","");
            getrelationlist24.removeAttribute("selected","");
        }

        if(getrelationselect=="Nephew"){
            var getrelationlist1=document.getElementById("relationlist1"+optionloop);
            var getrelationlist2=document.getElementById("relationlist2"+optionloop);
            var getrelationlist3=document.getElementById("relationlist3"+optionloop);
            var getrelationlist4=document.getElementById("relationlist4"+optionloop);
            var getrelationlist5=document.getElementById("relationlist5"+optionloop);
            var getrelationlist6=document.getElementById("relationlist6"+optionloop);
            var getrelationlist7=document.getElementById("relationlist7"+optionloop);
            var getrelationlist8=document.getElementById("relationlist8"+optionloop);
            var getrelationlist9=document.getElementById("relationlist9"+optionloop);
            var getrelationlist10=document.getElementById("relationlist10"+optionloop);
            var getrelationlist11=document.getElementById("relationlist11"+optionloop);
            var getrelationlist12=document.getElementById("relationlist12"+optionloop);
            var getrelationlist13=document.getElementById("relationlist13"+optionloop);
            var getrelationlist14=document.getElementById("relationlist14"+optionloop);
            var getrelationlist15=document.getElementById("relationlist15"+optionloop);
            var getrelationlist16=document.getElementById("relationlist16"+optionloop);
            var getrelationlist17=document.getElementById("relationlist17"+optionloop);
            var getrelationlist18=document.getElementById("relationlist18"+optionloop);
            var getrelationlist19=document.getElementById("relationlist19"+optionloop);
            var getrelationlist20=document.getElementById("relationlist20"+optionloop);
            var getrelationlist21=document.getElementById("relationlist21"+optionloop);
            var getrelationlist22=document.getElementById("relationlist22"+optionloop);
            var getrelationlist23=document.getElementById("relationlist23"+optionloop);
            var getrelationlist24=document.getElementById("relationlist24"+optionloop);

            getrelationlist1.removeAttribute("selected","");
            getrelationlist2.removeAttribute("selected","");
            getrelationlist3.removeAttribute("selected","");
            getrelationlist4.removeAttribute("selected","");
            getrelationlist5.removeAttribute("selected","");
            getrelationlist6.removeAttribute("selected","");
            getrelationlist7.removeAttribute("selected","");
            getrelationlist8.removeAttribute("selected","");
            getrelationlist9.removeAttribute("selected","");
            getrelationlist10.removeAttribute("selected","");
            getrelationlist11.removeAttribute("selected","");
            getrelationlist12.removeAttribute("selected","");
            getrelationlist13.setAttribute("selected","");
            getrelationlist14.removeAttribute("selected","");
            getrelationlist15.removeAttribute("selected","");
            getrelationlist16.removeAttribute("selected","");
            getrelationlist17.removeAttribute("selected","");
            getrelationlist18.removeAttribute("selected","");
            getrelationlist19.removeAttribute("selected","");
            getrelationlist20.removeAttribute("selected","");
            getrelationlist21.removeAttribute("selected","");
            getrelationlist22.removeAttribute("selected","");
            getrelationlist23.removeAttribute("selected","");
            getrelationlist24.removeAttribute("selected","");
        }

        if(getrelationselect=="Niece"){
            var getrelationlist1=document.getElementById("relationlist1"+optionloop);
            var getrelationlist2=document.getElementById("relationlist2"+optionloop);
            var getrelationlist3=document.getElementById("relationlist3"+optionloop);
            var getrelationlist4=document.getElementById("relationlist4"+optionloop);
            var getrelationlist5=document.getElementById("relationlist5"+optionloop);
            var getrelationlist6=document.getElementById("relationlist6"+optionloop);
            var getrelationlist7=document.getElementById("relationlist7"+optionloop);
            var getrelationlist8=document.getElementById("relationlist8"+optionloop);
            var getrelationlist9=document.getElementById("relationlist9"+optionloop);
            var getrelationlist10=document.getElementById("relationlist10"+optionloop);
            var getrelationlist11=document.getElementById("relationlist11"+optionloop);
            var getrelationlist12=document.getElementById("relationlist12"+optionloop);
            var getrelationlist13=document.getElementById("relationlist13"+optionloop);
            var getrelationlist14=document.getElementById("relationlist14"+optionloop);
            var getrelationlist15=document.getElementById("relationlist15"+optionloop);
            var getrelationlist16=document.getElementById("relationlist16"+optionloop);
            var getrelationlist17=document.getElementById("relationlist17"+optionloop);
            var getrelationlist18=document.getElementById("relationlist18"+optionloop);
            var getrelationlist19=document.getElementById("relationlist19"+optionloop);
            var getrelationlist20=document.getElementById("relationlist20"+optionloop);
            var getrelationlist21=document.getElementById("relationlist21"+optionloop);
            var getrelationlist22=document.getElementById("relationlist22"+optionloop);
            var getrelationlist23=document.getElementById("relationlist23"+optionloop);
            var getrelationlist24=document.getElementById("relationlist24"+optionloop);

            getrelationlist1.removeAttribute("selected","");
            getrelationlist2.removeAttribute("selected","");
            getrelationlist3.removeAttribute("selected","");
            getrelationlist4.removeAttribute("selected","");
            getrelationlist5.removeAttribute("selected","");
            getrelationlist6.removeAttribute("selected","");
            getrelationlist7.removeAttribute("selected","");
            getrelationlist8.removeAttribute("selected","");
            getrelationlist9.removeAttribute("selected","");
            getrelationlist10.removeAttribute("selected","");
            getrelationlist11.removeAttribute("selected","");
            getrelationlist12.removeAttribute("selected","");
            getrelationlist13.removeAttribute("selected","");
            getrelationlist14.setAttribute("selected","");
            getrelationlist15.removeAttribute("selected","");
            getrelationlist16.removeAttribute("selected","");
            getrelationlist17.removeAttribute("selected","");
            getrelationlist18.removeAttribute("selected","");
            getrelationlist19.removeAttribute("selected","");
            getrelationlist20.removeAttribute("selected","");
            getrelationlist21.removeAttribute("selected","");
            getrelationlist22.removeAttribute("selected","");
            getrelationlist23.removeAttribute("selected","");
            getrelationlist24.removeAttribute("selected","");
        }

        if(getrelationselect=="Sister"){
            var getrelationlist1=document.getElementById("relationlist1"+optionloop);
            var getrelationlist2=document.getElementById("relationlist2"+optionloop);
            var getrelationlist3=document.getElementById("relationlist3"+optionloop);
            var getrelationlist4=document.getElementById("relationlist4"+optionloop);
            var getrelationlist5=document.getElementById("relationlist5"+optionloop);
            var getrelationlist6=document.getElementById("relationlist6"+optionloop);
            var getrelationlist7=document.getElementById("relationlist7"+optionloop);
            var getrelationlist8=document.getElementById("relationlist8"+optionloop);
            var getrelationlist9=document.getElementById("relationlist9"+optionloop);
            var getrelationlist10=document.getElementById("relationlist10"+optionloop);
            var getrelationlist11=document.getElementById("relationlist11"+optionloop);
            var getrelationlist12=document.getElementById("relationlist12"+optionloop);
            var getrelationlist13=document.getElementById("relationlist13"+optionloop);
            var getrelationlist14=document.getElementById("relationlist14"+optionloop);
            var getrelationlist15=document.getElementById("relationlist15"+optionloop);
            var getrelationlist16=document.getElementById("relationlist16"+optionloop);
            var getrelationlist17=document.getElementById("relationlist17"+optionloop);
            var getrelationlist18=document.getElementById("relationlist18"+optionloop);
            var getrelationlist19=document.getElementById("relationlist19"+optionloop);
            var getrelationlist20=document.getElementById("relationlist20"+optionloop);
            var getrelationlist21=document.getElementById("relationlist21"+optionloop);
            var getrelationlist22=document.getElementById("relationlist22"+optionloop);
            var getrelationlist23=document.getElementById("relationlist23"+optionloop);
            var getrelationlist24=document.getElementById("relationlist24"+optionloop);

            getrelationlist1.removeAttribute("selected","");
            getrelationlist2.removeAttribute("selected","");
            getrelationlist3.removeAttribute("selected","");
            getrelationlist4.removeAttribute("selected","");
            getrelationlist5.removeAttribute("selected","");
            getrelationlist6.removeAttribute("selected","");
            getrelationlist7.removeAttribute("selected","");
            getrelationlist8.removeAttribute("selected","");
            getrelationlist9.removeAttribute("selected","");
            getrelationlist10.removeAttribute("selected","");
            getrelationlist11.removeAttribute("selected","");
            getrelationlist12.removeAttribute("selected","");
            getrelationlist13.removeAttribute("selected","");
            getrelationlist14.removeAttribute("selected","");
            getrelationlist15.setAttribute("selected","");
            getrelationlist16.removeAttribute("selected","");
            getrelationlist17.removeAttribute("selected","");
            getrelationlist18.removeAttribute("selected","");
            getrelationlist19.removeAttribute("selected","");
            getrelationlist20.removeAttribute("selected","");
            getrelationlist21.removeAttribute("selected","");
            getrelationlist22.removeAttribute("selected","");
            getrelationlist23.removeAttribute("selected","");
            getrelationlist24.removeAttribute("selected","");
        }

        if(getrelationselect=="Son"){
            var getrelationlist1=document.getElementById("relationlist1"+optionloop);
            var getrelationlist2=document.getElementById("relationlist2"+optionloop);
            var getrelationlist3=document.getElementById("relationlist3"+optionloop);
            var getrelationlist4=document.getElementById("relationlist4"+optionloop);
            var getrelationlist5=document.getElementById("relationlist5"+optionloop);
            var getrelationlist6=document.getElementById("relationlist6"+optionloop);
            var getrelationlist7=document.getElementById("relationlist7"+optionloop);
            var getrelationlist8=document.getElementById("relationlist8"+optionloop);
            var getrelationlist9=document.getElementById("relationlist9"+optionloop);
            var getrelationlist10=document.getElementById("relationlist10"+optionloop);
            var getrelationlist11=document.getElementById("relationlist11"+optionloop);
            var getrelationlist12=document.getElementById("relationlist12"+optionloop);
            var getrelationlist13=document.getElementById("relationlist13"+optionloop);
            var getrelationlist14=document.getElementById("relationlist14"+optionloop);
            var getrelationlist15=document.getElementById("relationlist15"+optionloop);
            var getrelationlist16=document.getElementById("relationlist16"+optionloop);
            var getrelationlist17=document.getElementById("relationlist17"+optionloop);
            var getrelationlist18=document.getElementById("relationlist18"+optionloop);
            var getrelationlist19=document.getElementById("relationlist19"+optionloop);
            var getrelationlist20=document.getElementById("relationlist20"+optionloop);
            var getrelationlist21=document.getElementById("relationlist21"+optionloop);
            var getrelationlist22=document.getElementById("relationlist22"+optionloop);
            var getrelationlist23=document.getElementById("relationlist23"+optionloop);
            var getrelationlist24=document.getElementById("relationlist24"+optionloop);

            getrelationlist1.removeAttribute("selected","");
            getrelationlist2.removeAttribute("selected","");
            getrelationlist3.removeAttribute("selected","");
            getrelationlist4.removeAttribute("selected","");
            getrelationlist5.removeAttribute("selected","");
            getrelationlist6.removeAttribute("selected","");
            getrelationlist7.removeAttribute("selected","");
            getrelationlist8.removeAttribute("selected","");
            getrelationlist9.removeAttribute("selected","");
            getrelationlist10.removeAttribute("selected","");
            getrelationlist11.removeAttribute("selected","");
            getrelationlist12.removeAttribute("selected","");
            getrelationlist13.removeAttribute("selected","");
            getrelationlist14.removeAttribute("selected","");
            getrelationlist15.removeAttribute("selected","");
            getrelationlist16.setAttribute("selected","");
            getrelationlist17.removeAttribute("selected","");
            getrelationlist18.removeAttribute("selected","");
            getrelationlist19.removeAttribute("selected","");
            getrelationlist20.removeAttribute("selected","");
            getrelationlist21.removeAttribute("selected","");
            getrelationlist22.removeAttribute("selected","");
            getrelationlist23.removeAttribute("selected","");
            getrelationlist24.removeAttribute("selected","");
        }

        if(getrelationselect=="Wife"){
            var getrelationlist1=document.getElementById("relationlist1"+optionloop);
            var getrelationlist2=document.getElementById("relationlist2"+optionloop);
            var getrelationlist3=document.getElementById("relationlist3"+optionloop);
            var getrelationlist4=document.getElementById("relationlist4"+optionloop);
            var getrelationlist5=document.getElementById("relationlist5"+optionloop);
            var getrelationlist6=document.getElementById("relationlist6"+optionloop);
            var getrelationlist7=document.getElementById("relationlist7"+optionloop);
            var getrelationlist8=document.getElementById("relationlist8"+optionloop);
            var getrelationlist9=document.getElementById("relationlist9"+optionloop);
            var getrelationlist10=document.getElementById("relationlist10"+optionloop);
            var getrelationlist11=document.getElementById("relationlist11"+optionloop);
            var getrelationlist12=document.getElementById("relationlist12"+optionloop);
            var getrelationlist13=document.getElementById("relationlist13"+optionloop);
            var getrelationlist14=document.getElementById("relationlist14"+optionloop);
            var getrelationlist15=document.getElementById("relationlist15"+optionloop);
            var getrelationlist16=document.getElementById("relationlist16"+optionloop);
            var getrelationlist17=document.getElementById("relationlist17"+optionloop);
            var getrelationlist18=document.getElementById("relationlist18"+optionloop);
            var getrelationlist19=document.getElementById("relationlist19"+optionloop);
            var getrelationlist20=document.getElementById("relationlist20"+optionloop);
            var getrelationlist21=document.getElementById("relationlist21"+optionloop);
            var getrelationlist22=document.getElementById("relationlist22"+optionloop);
            var getrelationlist23=document.getElementById("relationlist23"+optionloop);
            var getrelationlist24=document.getElementById("relationlist24"+optionloop);

            getrelationlist1.removeAttribute("selected","");
            getrelationlist2.removeAttribute("selected","");
            getrelationlist3.removeAttribute("selected","");
            getrelationlist4.removeAttribute("selected","");
            getrelationlist5.removeAttribute("selected","");
            getrelationlist6.removeAttribute("selected","");
            getrelationlist7.removeAttribute("selected","");
            getrelationlist8.removeAttribute("selected","");
            getrelationlist9.removeAttribute("selected","");
            getrelationlist10.removeAttribute("selected","");
            getrelationlist11.removeAttribute("selected","");
            getrelationlist12.removeAttribute("selected","");
            getrelationlist13.removeAttribute("selected","");
            getrelationlist14.removeAttribute("selected","");
            getrelationlist15.removeAttribute("selected","");
            getrelationlist16.removeAttribute("selected","");
            getrelationlist17.setAttribute("selected","");
            getrelationlist18.removeAttribute("selected","");
            getrelationlist19.removeAttribute("selected","");
            getrelationlist20.removeAttribute("selected","");
            getrelationlist21.removeAttribute("selected","");
            getrelationlist22.removeAttribute("selected","");
            getrelationlist23.removeAttribute("selected","");
            getrelationlist24.removeAttribute("selected","");
        }

        if(getrelationselect=="Others"){
            var getrelationlist1=document.getElementById("relationlist1"+optionloop);
            var getrelationlist2=document.getElementById("relationlist2"+optionloop);
            var getrelationlist3=document.getElementById("relationlist3"+optionloop);
            var getrelationlist4=document.getElementById("relationlist4"+optionloop);
            var getrelationlist5=document.getElementById("relationlist5"+optionloop);
            var getrelationlist6=document.getElementById("relationlist6"+optionloop);
            var getrelationlist7=document.getElementById("relationlist7"+optionloop);
            var getrelationlist8=document.getElementById("relationlist8"+optionloop);
            var getrelationlist9=document.getElementById("relationlist9"+optionloop);
            var getrelationlist10=document.getElementById("relationlist10"+optionloop);
            var getrelationlist11=document.getElementById("relationlist11"+optionloop);
            var getrelationlist12=document.getElementById("relationlist12"+optionloop);
            var getrelationlist13=document.getElementById("relationlist13"+optionloop);
            var getrelationlist14=document.getElementById("relationlist14"+optionloop);
            var getrelationlist15=document.getElementById("relationlist15"+optionloop);
            var getrelationlist16=document.getElementById("relationlist16"+optionloop);
            var getrelationlist17=document.getElementById("relationlist17"+optionloop);
            var getrelationlist18=document.getElementById("relationlist18"+optionloop);
            var getrelationlist19=document.getElementById("relationlist19"+optionloop);
            var getrelationlist20=document.getElementById("relationlist20"+optionloop);
            var getrelationlist21=document.getElementById("relationlist21"+optionloop);
            var getrelationlist22=document.getElementById("relationlist22"+optionloop);
            var getrelationlist23=document.getElementById("relationlist23"+optionloop);
            var getrelationlist24=document.getElementById("relationlist24"+optionloop);

            getrelationlist1.removeAttribute("selected","");
            getrelationlist2.removeAttribute("selected","");
            getrelationlist3.removeAttribute("selected","");
            getrelationlist4.removeAttribute("selected","");
            getrelationlist5.removeAttribute("selected","");
            getrelationlist6.removeAttribute("selected","");
            getrelationlist7.removeAttribute("selected","");
            getrelationlist8.removeAttribute("selected","");
            getrelationlist9.removeAttribute("selected","");
            getrelationlist10.removeAttribute("selected","");
            getrelationlist11.removeAttribute("selected","");
            getrelationlist12.removeAttribute("selected","");
            getrelationlist13.removeAttribute("selected","");
            getrelationlist14.removeAttribute("selected","");
            getrelationlist15.removeAttribute("selected","");
            getrelationlist16.removeAttribute("selected","");
            getrelationlist17.removeAttribute("selected","");
            getrelationlist18.setAttribute("selected","");
            getrelationlist19.removeAttribute("selected","");
            getrelationlist20.removeAttribute("selected","");
            getrelationlist21.removeAttribute("selected","");
            getrelationlist22.removeAttribute("selected","");
            getrelationlist23.removeAttribute("selected","");
            getrelationlist24.removeAttribute("selected","");
        }

        if(getrelationselect=="Father in Law"){
            var getrelationlist1=document.getElementById("relationlist1"+optionloop);
            var getrelationlist2=document.getElementById("relationlist2"+optionloop);
            var getrelationlist3=document.getElementById("relationlist3"+optionloop);
            var getrelationlist4=document.getElementById("relationlist4"+optionloop);
            var getrelationlist5=document.getElementById("relationlist5"+optionloop);
            var getrelationlist6=document.getElementById("relationlist6"+optionloop);
            var getrelationlist7=document.getElementById("relationlist7"+optionloop);
            var getrelationlist8=document.getElementById("relationlist8"+optionloop);
            var getrelationlist9=document.getElementById("relationlist9"+optionloop);
            var getrelationlist10=document.getElementById("relationlist10"+optionloop);
            var getrelationlist11=document.getElementById("relationlist11"+optionloop);
            var getrelationlist12=document.getElementById("relationlist12"+optionloop);
            var getrelationlist13=document.getElementById("relationlist13"+optionloop);
            var getrelationlist14=document.getElementById("relationlist14"+optionloop);
            var getrelationlist15=document.getElementById("relationlist15"+optionloop);
            var getrelationlist16=document.getElementById("relationlist16"+optionloop);
            var getrelationlist17=document.getElementById("relationlist17"+optionloop);
            var getrelationlist18=document.getElementById("relationlist18"+optionloop);
            var getrelationlist19=document.getElementById("relationlist19"+optionloop);
            var getrelationlist20=document.getElementById("relationlist20"+optionloop);
            var getrelationlist21=document.getElementById("relationlist21"+optionloop);
            var getrelationlist22=document.getElementById("relationlist22"+optionloop);
            var getrelationlist23=document.getElementById("relationlist23"+optionloop);
            var getrelationlist24=document.getElementById("relationlist24"+optionloop);

            getrelationlist1.removeAttribute("selected","");
            getrelationlist2.removeAttribute("selected","");
            getrelationlist3.removeAttribute("selected","");
            getrelationlist4.removeAttribute("selected","");
            getrelationlist5.removeAttribute("selected","");
            getrelationlist6.removeAttribute("selected","");
            getrelationlist7.removeAttribute("selected","");
            getrelationlist8.removeAttribute("selected","");
            getrelationlist9.removeAttribute("selected","");
            getrelationlist10.removeAttribute("selected","");
            getrelationlist11.removeAttribute("selected","");
            getrelationlist12.removeAttribute("selected","");
            getrelationlist13.removeAttribute("selected","");
            getrelationlist14.removeAttribute("selected","");
            getrelationlist15.removeAttribute("selected","");
            getrelationlist16.removeAttribute("selected","");
            getrelationlist17.removeAttribute("selected","");
            getrelationlist18.removeAttribute("selected","");
            getrelationlist19.setAttribute("selected","");
            getrelationlist20.removeAttribute("selected","");
            getrelationlist21.removeAttribute("selected","");
            getrelationlist22.removeAttribute("selected","");
            getrelationlist23.removeAttribute("selected","");
            getrelationlist24.removeAttribute("selected","");
        }

        if(getrelationselect=="Mother in Law"){
            var getrelationlist1=document.getElementById("relationlist1"+optionloop);
            var getrelationlist2=document.getElementById("relationlist2"+optionloop);
            var getrelationlist3=document.getElementById("relationlist3"+optionloop);
            var getrelationlist4=document.getElementById("relationlist4"+optionloop);
            var getrelationlist5=document.getElementById("relationlist5"+optionloop);
            var getrelationlist6=document.getElementById("relationlist6"+optionloop);
            var getrelationlist7=document.getElementById("relationlist7"+optionloop);
            var getrelationlist8=document.getElementById("relationlist8"+optionloop);
            var getrelationlist9=document.getElementById("relationlist9"+optionloop);
            var getrelationlist10=document.getElementById("relationlist10"+optionloop);
            var getrelationlist11=document.getElementById("relationlist11"+optionloop);
            var getrelationlist12=document.getElementById("relationlist12"+optionloop);
            var getrelationlist13=document.getElementById("relationlist13"+optionloop);
            var getrelationlist14=document.getElementById("relationlist14"+optionloop);
            var getrelationlist15=document.getElementById("relationlist15"+optionloop);
            var getrelationlist16=document.getElementById("relationlist16"+optionloop);
            var getrelationlist17=document.getElementById("relationlist17"+optionloop);
            var getrelationlist18=document.getElementById("relationlist18"+optionloop);
            var getrelationlist19=document.getElementById("relationlist19"+optionloop);
            var getrelationlist20=document.getElementById("relationlist20"+optionloop);
            var getrelationlist21=document.getElementById("relationlist21"+optionloop);
            var getrelationlist22=document.getElementById("relationlist22"+optionloop);
            var getrelationlist23=document.getElementById("relationlist23"+optionloop);
            var getrelationlist24=document.getElementById("relationlist24"+optionloop);

            getrelationlist1.removeAttribute("selected","");
            getrelationlist2.removeAttribute("selected","");
            getrelationlist3.removeAttribute("selected","");
            getrelationlist4.removeAttribute("selected","");
            getrelationlist5.removeAttribute("selected","");
            getrelationlist6.removeAttribute("selected","");
            getrelationlist7.removeAttribute("selected","");
            getrelationlist8.removeAttribute("selected","");
            getrelationlist9.removeAttribute("selected","");
            getrelationlist10.removeAttribute("selected","");
            getrelationlist11.removeAttribute("selected","");
            getrelationlist12.removeAttribute("selected","");
            getrelationlist13.removeAttribute("selected","");
            getrelationlist14.removeAttribute("selected","");
            getrelationlist15.removeAttribute("selected","");
            getrelationlist16.removeAttribute("selected","");
            getrelationlist17.removeAttribute("selected","");
            getrelationlist18.removeAttribute("selected","");
            getrelationlist19.removeAttribute("selected","");
            getrelationlist20.setAttribute("selected","");
            getrelationlist21.removeAttribute("selected","");
            getrelationlist22.removeAttribute("selected","");
            getrelationlist23.removeAttribute("selected","");
            getrelationlist24.removeAttribute("selected","");
        }

        if(getrelationselect=="Brother in Law"){
            var getrelationlist1=document.getElementById("relationlist1"+optionloop);
            var getrelationlist2=document.getElementById("relationlist2"+optionloop);
            var getrelationlist3=document.getElementById("relationlist3"+optionloop);
            var getrelationlist4=document.getElementById("relationlist4"+optionloop);
            var getrelationlist5=document.getElementById("relationlist5"+optionloop);
            var getrelationlist6=document.getElementById("relationlist6"+optionloop);
            var getrelationlist7=document.getElementById("relationlist7"+optionloop);
            var getrelationlist8=document.getElementById("relationlist8"+optionloop);
            var getrelationlist9=document.getElementById("relationlist9"+optionloop);
            var getrelationlist10=document.getElementById("relationlist10"+optionloop);
            var getrelationlist11=document.getElementById("relationlist11"+optionloop);
            var getrelationlist12=document.getElementById("relationlist12"+optionloop);
            var getrelationlist13=document.getElementById("relationlist13"+optionloop);
            var getrelationlist14=document.getElementById("relationlist14"+optionloop);
            var getrelationlist15=document.getElementById("relationlist15"+optionloop);
            var getrelationlist16=document.getElementById("relationlist16"+optionloop);
            var getrelationlist17=document.getElementById("relationlist17"+optionloop);
            var getrelationlist18=document.getElementById("relationlist18"+optionloop);
            var getrelationlist19=document.getElementById("relationlist19"+optionloop);
            var getrelationlist20=document.getElementById("relationlist20"+optionloop);
            var getrelationlist21=document.getElementById("relationlist21"+optionloop);
            var getrelationlist22=document.getElementById("relationlist22"+optionloop);
            var getrelationlist23=document.getElementById("relationlist23"+optionloop);
            var getrelationlist24=document.getElementById("relationlist24"+optionloop);

            getrelationlist1.removeAttribute("selected","");
            getrelationlist2.removeAttribute("selected","");
            getrelationlist3.removeAttribute("selected","");
            getrelationlist4.removeAttribute("selected","");
            getrelationlist5.removeAttribute("selected","");
            getrelationlist6.removeAttribute("selected","");
            getrelationlist7.removeAttribute("selected","");
            getrelationlist8.removeAttribute("selected","");
            getrelationlist9.removeAttribute("selected","");
            getrelationlist10.removeAttribute("selected","");
            getrelationlist11.removeAttribute("selected","");
            getrelationlist12.removeAttribute("selected","");
            getrelationlist13.removeAttribute("selected","");
            getrelationlist14.removeAttribute("selected","");
            getrelationlist15.removeAttribute("selected","");
            getrelationlist16.removeAttribute("selected","");
            getrelationlist17.removeAttribute("selected","");
            getrelationlist18.removeAttribute("selected","");
            getrelationlist19.removeAttribute("selected","");
            getrelationlist20.removeAttribute("selected","");
            getrelationlist21.setAttribute("selected","");
            getrelationlist22.removeAttribute("selected","");
            getrelationlist23.removeAttribute("selected","");
            getrelationlist24.removeAttribute("selected","");
        }

        if(getrelationselect=="Sister in Law"){
            var getrelationlist1=document.getElementById("relationlist1"+optionloop);
            var getrelationlist2=document.getElementById("relationlist2"+optionloop);
            var getrelationlist3=document.getElementById("relationlist3"+optionloop);
            var getrelationlist4=document.getElementById("relationlist4"+optionloop);
            var getrelationlist5=document.getElementById("relationlist5"+optionloop);
            var getrelationlist6=document.getElementById("relationlist6"+optionloop);
            var getrelationlist7=document.getElementById("relationlist7"+optionloop);
            var getrelationlist8=document.getElementById("relationlist8"+optionloop);
            var getrelationlist9=document.getElementById("relationlist9"+optionloop);
            var getrelationlist10=document.getElementById("relationlist10"+optionloop);
            var getrelationlist11=document.getElementById("relationlist11"+optionloop);
            var getrelationlist12=document.getElementById("relationlist12"+optionloop);
            var getrelationlist13=document.getElementById("relationlist13"+optionloop);
            var getrelationlist14=document.getElementById("relationlist14"+optionloop);
            var getrelationlist15=document.getElementById("relationlist15"+optionloop);
            var getrelationlist16=document.getElementById("relationlist16"+optionloop);
            var getrelationlist17=document.getElementById("relationlist17"+optionloop);
            var getrelationlist18=document.getElementById("relationlist18"+optionloop);
            var getrelationlist19=document.getElementById("relationlist19"+optionloop);
            var getrelationlist20=document.getElementById("relationlist20"+optionloop);
            var getrelationlist21=document.getElementById("relationlist21"+optionloop);
            var getrelationlist22=document.getElementById("relationlist22"+optionloop);
            var getrelationlist23=document.getElementById("relationlist23"+optionloop);
            var getrelationlist24=document.getElementById("relationlist24"+optionloop);

            getrelationlist1.removeAttribute("selected","");
            getrelationlist2.removeAttribute("selected","");
            getrelationlist3.removeAttribute("selected","");
            getrelationlist4.removeAttribute("selected","");
            getrelationlist5.removeAttribute("selected","");
            getrelationlist6.removeAttribute("selected","");
            getrelationlist7.removeAttribute("selected","");
            getrelationlist8.removeAttribute("selected","");
            getrelationlist9.removeAttribute("selected","");
            getrelationlist10.removeAttribute("selected","");
            getrelationlist11.removeAttribute("selected","");
            getrelationlist12.removeAttribute("selected","");
            getrelationlist13.removeAttribute("selected","");
            getrelationlist14.removeAttribute("selected","");
            getrelationlist15.removeAttribute("selected","");
            getrelationlist16.removeAttribute("selected","");
            getrelationlist17.removeAttribute("selected","");
            getrelationlist18.removeAttribute("selected","");
            getrelationlist19.removeAttribute("selected","");
            getrelationlist20.removeAttribute("selected","");
            getrelationlist21.removeAttribute("selected","");
            getrelationlist22.setAttribute("selected","");
            getrelationlist23.removeAttribute("selected","");
            getrelationlist24.removeAttribute("selected","");
        }

        if(getrelationselect=="Step Son"){
            var getrelationlist1=document.getElementById("relationlist1"+optionloop);
            var getrelationlist2=document.getElementById("relationlist2"+optionloop);
            var getrelationlist3=document.getElementById("relationlist3"+optionloop);
            var getrelationlist4=document.getElementById("relationlist4"+optionloop);
            var getrelationlist5=document.getElementById("relationlist5"+optionloop);
            var getrelationlist6=document.getElementById("relationlist6"+optionloop);
            var getrelationlist7=document.getElementById("relationlist7"+optionloop);
            var getrelationlist8=document.getElementById("relationlist8"+optionloop);
            var getrelationlist9=document.getElementById("relationlist9"+optionloop);
            var getrelationlist10=document.getElementById("relationlist10"+optionloop);
            var getrelationlist11=document.getElementById("relationlist11"+optionloop);
            var getrelationlist12=document.getElementById("relationlist12"+optionloop);
            var getrelationlist13=document.getElementById("relationlist13"+optionloop);
            var getrelationlist14=document.getElementById("relationlist14"+optionloop);
            var getrelationlist15=document.getElementById("relationlist15"+optionloop);
            var getrelationlist16=document.getElementById("relationlist16"+optionloop);
            var getrelationlist17=document.getElementById("relationlist17"+optionloop);
            var getrelationlist18=document.getElementById("relationlist18"+optionloop);
            var getrelationlist19=document.getElementById("relationlist19"+optionloop);
            var getrelationlist20=document.getElementById("relationlist20"+optionloop);
            var getrelationlist21=document.getElementById("relationlist21"+optionloop);
            var getrelationlist22=document.getElementById("relationlist22"+optionloop);
            var getrelationlist23=document.getElementById("relationlist23"+optionloop);
            var getrelationlist24=document.getElementById("relationlist24"+optionloop);

            getrelationlist1.removeAttribute("selected","");
            getrelationlist2.removeAttribute("selected","");
            getrelationlist3.removeAttribute("selected","");
            getrelationlist4.removeAttribute("selected","");
            getrelationlist5.removeAttribute("selected","");
            getrelationlist6.removeAttribute("selected","");
            getrelationlist7.removeAttribute("selected","");
            getrelationlist8.removeAttribute("selected","");
            getrelationlist9.removeAttribute("selected","");
            getrelationlist10.removeAttribute("selected","");
            getrelationlist11.removeAttribute("selected","");
            getrelationlist12.removeAttribute("selected","");
            getrelationlist13.removeAttribute("selected","");
            getrelationlist14.removeAttribute("selected","");
            getrelationlist15.removeAttribute("selected","");
            getrelationlist16.removeAttribute("selected","");
            getrelationlist17.removeAttribute("selected","");
            getrelationlist18.removeAttribute("selected","");
            getrelationlist19.removeAttribute("selected","");
            getrelationlist20.removeAttribute("selected","");
            getrelationlist21.removeAttribute("selected","");
            getrelationlist22.removeAttribute("selected","");
            getrelationlist23.setAttribute("selected","");
            getrelationlist24.removeAttribute("selected","");
        }

        if(getrelationselect=="Step Daughter"){
            var getrelationlist1=document.getElementById("relationlist1"+optionloop);
            var getrelationlist2=document.getElementById("relationlist2"+optionloop);
            var getrelationlist3=document.getElementById("relationlist3"+optionloop);
            var getrelationlist4=document.getElementById("relationlist4"+optionloop);
            var getrelationlist5=document.getElementById("relationlist5"+optionloop);
            var getrelationlist6=document.getElementById("relationlist6"+optionloop);
            var getrelationlist7=document.getElementById("relationlist7"+optionloop);
            var getrelationlist8=document.getElementById("relationlist8"+optionloop);
            var getrelationlist9=document.getElementById("relationlist9"+optionloop);
            var getrelationlist10=document.getElementById("relationlist10"+optionloop);
            var getrelationlist11=document.getElementById("relationlist11"+optionloop);
            var getrelationlist12=document.getElementById("relationlist12"+optionloop);
            var getrelationlist13=document.getElementById("relationlist13"+optionloop);
            var getrelationlist14=document.getElementById("relationlist14"+optionloop);
            var getrelationlist15=document.getElementById("relationlist15"+optionloop);
            var getrelationlist16=document.getElementById("relationlist16"+optionloop);
            var getrelationlist17=document.getElementById("relationlist17"+optionloop);
            var getrelationlist18=document.getElementById("relationlist18"+optionloop);
            var getrelationlist19=document.getElementById("relationlist19"+optionloop);
            var getrelationlist20=document.getElementById("relationlist20"+optionloop);
            var getrelationlist21=document.getElementById("relationlist21"+optionloop);
            var getrelationlist22=document.getElementById("relationlist22"+optionloop);
            var getrelationlist23=document.getElementById("relationlist23"+optionloop);
            var getrelationlist24=document.getElementById("relationlist24"+optionloop);

            getrelationlist1.removeAttribute("selected","");
            getrelationlist2.removeAttribute("selected","");
            getrelationlist3.removeAttribute("selected","");
            getrelationlist4.removeAttribute("selected","");
            getrelationlist5.removeAttribute("selected","");
            getrelationlist6.removeAttribute("selected","");
            getrelationlist7.removeAttribute("selected","");
            getrelationlist8.removeAttribute("selected","");
            getrelationlist9.removeAttribute("selected","");
            getrelationlist10.removeAttribute("selected","");
            getrelationlist11.removeAttribute("selected","");
            getrelationlist12.removeAttribute("selected","");
            getrelationlist13.removeAttribute("selected","");
            getrelationlist14.removeAttribute("selected","");
            getrelationlist15.removeAttribute("selected","");
            getrelationlist16.removeAttribute("selected","");
            getrelationlist17.removeAttribute("selected","");
            getrelationlist18.removeAttribute("selected","");
            getrelationlist19.removeAttribute("selected","");
            getrelationlist20.removeAttribute("selected","");
            getrelationlist21.removeAttribute("selected","");
            getrelationlist22.removeAttribute("selected","");
            getrelationlist23.removeAttribute("selected","");
            getrelationlist24.setAttribute("selected","");
        }
        //----------------------

        //pwd-------------------
        var getpwdselect=document.getElementById("pwdselect"+optionloop);
        
        if(getpwdselect==""){
            var getpwdlist1=document.getElementById("pwdlist1"+optionloop);
            var getpwdlist2=document.getElementById("pwdlist2"+optionloop);
            var getpwdlist3=document.getElementById("pwdlist3"+optionloop);
            var getpwdlist4=document.getElementById("pwdlist4"+optionloop);

            getpwdlist1.setAttribute("selected","");
            getpwdlist2.removeAttribute("selected","");
            getpwdlist3.removeAttribute("selected","");
            getpwdlist4.removeAttribute("selected","");

        }
        
        if(getpwdselect=="N/A"){
            var getpwdlist1=document.getElementById("pwdlist1"+optionloop);
            var getpwdlist2=document.getElementById("pwdlist2"+optionloop);
            var getpwdlist3=document.getElementById("pwdlist3"+optionloop);
            var getpwdlist4=document.getElementById("pwdlist4"+optionloop);

            getpwdlist1.removeAttribute("selected","");
            getpwdlist2.setAttribute("selected","");
            getpwdlist3.removeAttribute("selected","");
            getpwdlist4.removeAttribute("selected","");
        }

        if(getpwdselect=="Yes"){
            var getpwdlist1=document.getElementById("pwdlist1"+optionloop);
            var getpwdlist2=document.getElementById("pwdlist2"+optionloop);
            var getpwdlist3=document.getElementById("pwdlist3"+optionloop);
            var getpwdlist4=document.getElementById("pwdlist4"+optionloop);

            getpwdlist1.removeAttribute("selected","");
            getpwdlist2.removeAttribute("selected","");
            getpwdlist3.setAttribute("selected","");
            getpwdlist4.removeAttribute("selected","");
        }

        if(getpwdselect=="No"){
            var getpwdlist1=document.getElementById("pwdlist1"+optionloop);
            var getpwdlist2=document.getElementById("pwdlist2"+optionloop);
            var getpwdlist3=document.getElementById("pwdlist3"+optionloop);
            var getpwdlist4=document.getElementById("pwdlist4"+optionloop);

            getpwdlist1.removeAttribute("selected","");
            getpwdlist2.removeAttribute("selected","");
            getpwdlist3.removeAttribute("selected","");
            getpwdlist4.setAttribute("selected","");
        }
        //----------------------


        //ip-------------------
        var getipselect=document.getElementById("ipselect"+optionloop);
        
        if(getipselect==""){
            var getiplist1=document.getElementById("iplist1"+optionloop);
            var getiplist2=document.getElementById("iplist2"+optionloop);
            var getiplist3=document.getElementById("iplist3"+optionloop);
            var getiplist4=document.getElementById("iplist4"+optionloop);

            getiplist1.setAttribute("selected","");
            getiplist2.removeAttribute("selected","");
            getiplist3.removeAttribute("selected","");
            getiplist4.removeAttribute("selected","");

        }
        
        if(getipselect=="N/A"){
            var getiplist1=document.getElementById("iplist1"+optionloop);
            var getiplist2=document.getElementById("iplist2"+optionloop);
            var getiplist3=document.getElementById("iplist3"+optionloop);
            var getiplist4=document.getElementById("iplist4"+optionloop);

            getiplist1.removeAttribute("selected","");
            getiplist2.setAttribute("selected","");
            getiplist3.removeAttribute("selected","");
            getiplist4.removeAttribute("selected","");
        }

        if(getipselect=="Yes"){
            var getiplist1=document.getElementById("iplist1"+optionloop);
            var getiplist2=document.getElementById("iplist2"+optionloop);
            var getiplist3=document.getElementById("iplist3"+optionloop);
            var getiplist4=document.getElementById("iplist4"+optionloop);

            getiplist1.removeAttribute("selected","");
            getiplist2.removeAttribute("selected","");
            getiplist3.setAttribute("selected","");
            getiplist4.removeAttribute("selected","");
        }

        if(getipselect=="No"){
            var getiplist1=document.getElementById("iplist1"+optionloop);
            var getiplist2=document.getElementById("iplist2"+optionloop);
            var getiplist3=document.getElementById("iplist3"+optionloop);
            var getiplist4=document.getElementById("iplist4"+optionloop);

            getiplist1.removeAttribute("selected","");
            getiplist2.removeAttribute("selected","");
            getiplist3.removeAttribute("selected","");
            getiplist4.setAttribute("selected","");
        }
        //----------------------


        //philhealth-------------------
        var getphilhealthselect=document.getElementById("philhealthselect"+optionloop);
        
        if(getphilhealthselect==""){
            var getphilhealthlist1=document.getElementById("philhealthlist1"+optionloop);
            var getphilhealthlist2=document.getElementById("philhealthlist2"+optionloop);
            var getphilhealthlist3=document.getElementById("philhealthlist3"+optionloop);
            var getphilhealthlist4=document.getElementById("philhealthlist4"+optionloop);

            getphilhealthlist1.setAttribute("selected","");
            getphilhealthlist2.removeAttribute("selected","");
            getphilhealthlist3.removeAttribute("selected","");
            getphilhealthlist4.removeAttribute("selected","");

        }
        
        if(getphilhealthselect=="N/A"){
            var getphilhealthlist1=document.getElementById("philhealthlist1"+optionloop);
            var getphilhealthlist2=document.getElementById("philhealthlist2"+optionloop);
            var getphilhealthlist3=document.getElementById("philhealthlist3"+optionloop);
            var getphilhealthlist4=document.getElementById("philhealthlist4"+optionloop);

            getphilhealthlist1.removeAttribute("selected","");
            getphilhealthlist2.setAttribute("selected","");
            getphilhealthlist3.removeAttribute("selected","");
            getphilhealthlist4.removeAttribute("selected","");
        }

        if(getphilhealthselect=="Yes"){
            var getphilhealthlist1=document.getElementById("philhealthlist1"+optionloop);
            var getphilhealthlist2=document.getElementById("philhealthlist2"+optionloop);
            var getphilhealthlist3=document.getElementById("philhealthlist3"+optionloop);
            var getphilhealthlist4=document.getElementById("philhealthlist4"+optionloop);

            getphilhealthlist1.removeAttribute("selected","");
            getphilhealthlist2.removeAttribute("selected","");
            getphilhealthlist3.setAttribute("selected","");
            getphilhealthlist4.removeAttribute("selected","");
        }

        if(getphilhealthselect=="No"){
            var getphilhealthlist1=document.getElementById("philhealthlist1"+optionloop);
            var getphilhealthlist2=document.getElementById("philhealthlist2"+optionloop);
            var getphilhealthlist3=document.getElementById("philhealthlist3"+optionloop);
            var getphilhealthlist4=document.getElementById("philhealthlist4"+optionloop);

            getphilhealthlist1.removeAttribute("selected","");
            getphilhealthlist2.removeAttribute("selected","");
            getphilhealthlist3.removeAttribute("selected","");
            getphilhealthlist4.setAttribute("selected","");
        }
        //----------------------

        //breastfeed-------------------
        var getbreastfeedselect=document.getElementById("breastfeedselect"+optionloop);
        
        if(getbreastfeedselect==""){
            var getbreastfeedlist1=document.getElementById("breastfeedlist1"+optionloop);
            var getbreastfeedlist2=document.getElementById("breastfeedlist2"+optionloop);
            var getbreastfeedlist3=document.getElementById("breastfeedlist3"+optionloop);
            var getbreastfeedlist4=document.getElementById("breastfeedlist4"+optionloop);

            getbreastfeedlist1.setAttribute("selected","");
            getbreastfeedlist2.removeAttribute("selected","");
            getbreastfeedlist3.removeAttribute("selected","");
            getbreastfeedlist4.removeAttribute("selected","");

        }
        
        if(getbreastfeedselect=="N/A"){
            var getbreastfeedlist1=document.getElementById("breastfeedlist1"+optionloop);
            var getbreastfeedlist2=document.getElementById("breastfeedlist2"+optionloop);
            var getbreastfeedlist3=document.getElementById("breastfeedlist3"+optionloop);
            var getbreastfeedlist4=document.getElementById("breastfeedlist4"+optionloop);

            getbreastfeedlist1.removeAttribute("selected","");
            getbreastfeedlist2.setAttribute("selected","");
            getbreastfeedlist3.removeAttribute("selected","");
            getbreastfeedlist4.removeAttribute("selected","");
        }

        if(getbreastfeedselect=="Yes"){
            var getbreastfeedlist1=document.getElementById("breastfeedlist1"+optionloop);
            var getbreastfeedlist2=document.getElementById("breastfeedlist2"+optionloop);
            var getbreastfeedlist3=document.getElementById("breastfeedlist3"+optionloop);
            var getbreastfeedlist4=document.getElementById("breastfeedlist4"+optionloop);

            getbreastfeedlist1.removeAttribute("selected","");
            getbreastfeedlist2.removeAttribute("selected","");
            getbreastfeedlist3.setAttribute("selected","");
            getbreastfeedlist4.removeAttribute("selected","");
        }

        if(getbreastfeedselect=="No"){
            var getbreastfeedlist1=document.getElementById("breastfeedlist1"+optionloop);
            var getbreastfeedlist2=document.getElementById("breastfeedlist2"+optionloop);
            var getbreastfeedlist3=document.getElementById("breastfeedlist3"+optionloop);
            var getbreastfeedlist4=document.getElementById("breastfeedlist4"+optionloop);

            getbreastfeedlist1.removeAttribute("selected","");
            getbreastfeedlist2.removeAttribute("selected","");
            getbreastfeedlist3.removeAttribute("selected","");
            getbreastfeedlist4.setAttribute("selected","");
        }
        //----------------------


        //ntp-------------------
        var getntpselect=document.getElementById("ntpselect"+optionloop);
        
        if(getntpselect==""){
            var getntplist1=document.getElementById("ntplist1"+optionloop);
            var getntplist2=document.getElementById("ntplist2"+optionloop);
            var getntplist3=document.getElementById("ntplist3"+optionloop);
            var getntplist4=document.getElementById("ntplist4"+optionloop);

            getntplist1.setAttribute("selected","");
            getntplist2.removeAttribute("selected","");
            getntplist3.removeAttribute("selected","");
            getntplist4.removeAttribute("selected","");

        }
        
        if(getntpselect=="N/A"){
            var getntplist1=document.getElementById("ntplist1"+optionloop);
            var getntplist2=document.getElementById("ntplist2"+optionloop);
            var getntplist3=document.getElementById("ntplist3"+optionloop);
            var getntplist4=document.getElementById("ntplist4"+optionloop);

            getntplist1.removeAttribute("selected","");
            getntplist2.setAttribute("selected","");
            getntplist3.removeAttribute("selected","");
            getntplist4.removeAttribute("selected","");
        }

        if(getntpselect=="Yes"){
            var getntplist1=document.getElementById("ntplist1"+optionloop);
            var getntplist2=document.getElementById("ntplist2"+optionloop);
            var getntplist3=document.getElementById("ntplist3"+optionloop);
            var getntplist4=document.getElementById("ntplist4"+optionloop);

            getntplist1.removeAttribute("selected","");
            getntplist2.removeAttribute("selected","");
            getntplist3.setAttribute("selected","");
            getntplist4.removeAttribute("selected","");
        }

        if(getntpselect=="No"){
            var getntplist1=document.getElementById("ntplist1"+optionloop);
            var getntplist2=document.getElementById("ntplist2"+optionloop);
            var getntplist3=document.getElementById("ntplist3"+optionloop);
            var getntplist4=document.getElementById("ntplist4"+optionloop);

            getntplist1.removeAttribute("selected","");
            getntplist2.removeAttribute("selected","");
            getntplist3.removeAttribute("selected","");
            getntplist4.setAttribute("selected","");
        }
        //----------------------
    
        

        //smooking-------------------
        var getsmookingselect=document.getElementById("smookingselect"+optionloop);
        
        if(getsmookingselect==""){
            var getsmookinglist1=document.getElementById("smookinglist1"+optionloop);
            var getsmookinglist2=document.getElementById("smookinglist2"+optionloop);
            var getsmookinglist3=document.getElementById("smookinglist3"+optionloop);
            var getsmookinglist4=document.getElementById("smookinglist4"+optionloop);

            getsmookinglist1.setAttribute("selected","");
            getsmookinglist2.removeAttribute("selected","");
            getsmookinglist3.removeAttribute("selected","");
            getsmookinglist4.removeAttribute("selected","");

        }
        
        if(getsmookingselect=="N/A"){
            var getsmookinglist1=document.getElementById("smookinglist1"+optionloop);
            var getsmookinglist2=document.getElementById("smookinglist2"+optionloop);
            var getsmookinglist3=document.getElementById("smookinglist3"+optionloop);
            var getsmookinglist4=document.getElementById("smookinglist4"+optionloop);

            getsmookinglist1.removeAttribute("selected","");
            getsmookinglist2.setAttribute("selected","");
            getsmookinglist3.removeAttribute("selected","");
            getsmookinglist4.removeAttribute("selected","");
        }

        if(getsmookingselect=="Yes"){
            var getsmookinglist1=document.getElementById("smookinglist1"+optionloop);
            var getsmookinglist2=document.getElementById("smookinglist2"+optionloop);
            var getsmookinglist3=document.getElementById("smookinglist3"+optionloop);
            var getsmookinglist4=document.getElementById("smookinglist4"+optionloop);

            getsmookinglist1.removeAttribute("selected","");
            getsmookinglist2.removeAttribute("selected","");
            getsmookinglist3.setAttribute("selected","");
            getsmookinglist4.removeAttribute("selected","");
        }

        if(getsmookingselect=="No"){
            var getsmookinglist1=document.getElementById("smookinglist1"+optionloop);
            var getsmookinglist2=document.getElementById("smookinglist2"+optionloop);
            var getsmookinglist3=document.getElementById("smookinglist3"+optionloop);
            var getsmookinglist4=document.getElementById("smookinglist4"+optionloop);

            getsmookinglist1.removeAttribute("selected","");
            getsmookinglist2.removeAttribute("selected","");
            getsmookinglist3.removeAttribute("selected","");
            getsmookinglist4.setAttribute("selected","");
        }
        //----------------------


        //4Ps----------------------
        var getfourpsselect=document.getElementById("fourpsselect"+optionloop);
        
        if(getfourpsselect==""){
            var getfourpslist1=document.getElementById("fourpslist1"+optionloop);
            var getfourpslist2=document.getElementById("fourpslist2"+optionloop);
            var getfourpslist3=document.getElementById("fourpslist3"+optionloop);
            var getfourpslist4=document.getElementById("fourpslist4"+optionloop);

            getfourpslist1.setAttribute("selected","");
            getfourpslist2.removeAttribute("selected","");
            getfourpslist3.removeAttribute("selected","");
            getfourpslist4.removeAttribute("selected","");

        }
        
        if(getfourpsselect=="N/A"){
            var getfourpslist1=document.getElementById("fourpslist1"+optionloop);
            var getfourpslist2=document.getElementById("fourpslist2"+optionloop);
            var getfourpslist3=document.getElementById("fourpslist3"+optionloop);
            var getfourpslist4=document.getElementById("fourpslist4"+optionloop);

            getfourpslist1.removeAttribute("selected","");
            getfourpslist2.setAttribute("selected","");
            getfourpslist3.removeAttribute("selected","");
            getfourpslist4.removeAttribute("selected","");
        }

        if(getfourpsselect=="Yes"){
            var getfourpslist1=document.getElementById("fourpslist1"+optionloop);
            var getfourpslist2=document.getElementById("fourpslist2"+optionloop);
            var getfourpslist3=document.getElementById("fourpslist3"+optionloop);
            var getfourpslist4=document.getElementById("fourpslist4"+optionloop);

            getfourpslist1.removeAttribute("selected","");
            getfourpslist2.removeAttribute("selected","");
            getfourpslist3.setAttribute("selected","");
            getfourpslist4.removeAttribute("selected","");
        }

        if(getfourpsselect=="No"){
            var getfourpslist1=document.getElementById("fourpslist1"+optionloop);
            var getfourpslist2=document.getElementById("fourpslist2"+optionloop);
            var getfourpslist3=document.getElementById("fourpslist3"+optionloop);
            var getfourpslist4=document.getElementById("fourpslist4"+optionloop);

            getfourpslist1.removeAttribute("selected","");
            getfourpslist2.removeAttribute("selected","");
            getfourpslist3.removeAttribute("selected","");
            getfourpslist4.setAttribute("selected","");
        }
        //----------------------
    
    }  

    repeater=0;
    
    c++;
    }
    


    else{
        calldiv.style.display="none";
        a++;
        icopy=0;

        for(var i1=0;i1<increment;i1++){
        var getfname=document.getElementById("fname"+i1);
        var getmname=document.getElementById("mname"+i1);
        var getlname=document.getElementById("lname"+i1);
        
        getfname.removeAttribute("required","");
        getmname.removeAttribute("required","");
        getlname.removeAttribute("required","");
        }
    }

  
 

}
b=0;


function product(){

    z=1;

    var product=document.getElementById("product-div");
    var newdivproduct=document.createElement("div");
    newdivproduct.setAttribute("id","newproductdiv"+n);
    product.appendChild(newdivproduct);
    var callnewdivproduct=document.getElementById("newproductdiv"+n);

    var productloop=document.getElementById("productmuch").value;

    if(productloop!=""){
    
    for(var x=0;x<productloop;x++){
    var productinput=document.createElement("input");
    var productlinebreak=document.createElement("br"); 

    productinput.setAttribute("placeholder","Product");
    productinput.setAttribute("name","product"+b);
    productinput.setAttribute("id","newproduct");
    productinput.style.width="250px";
    productinput.style.height="38px";
    productinput.style.fontSize="15px";
    productinput.style.paddingLeft="10px";
    productinput.style.borderRadius="5px";
    productinput.style.marginRight="10px";

    callnewdivproduct.appendChild(productinput);
    b++;

    var hiddenfarm=document.getElementById("hiddenfarm").value=b; 
    }

    }

    else{
        callnewdivproduct.style.display="none";
        n++;
        b=0;
    }


    
}

/*
function puroklist(){
    var barangay=document.getElementById("barangay").value;
    var purok=document.getElementById("purok");
    var purokdatalist=document.getElementById("purokdatalist");

    if(barangay=="Santacruz"){
        
        var createdatalist=document.createElement("datalist");

        createdatalist.setAttribute("id","datalist1");

        purokdatalist.appendChild(createdatalist);

        var calldatalist=document.getElementById("datalist1");

            var createoptions=document.createElement("option");

        createoptions.innerHTML="Bayanihan";

        calldatalist.appendChild(createoptions);

        purok.setAttribute("list","datalist1");  
    }

    if(barangay=="San Isidro"){
        
        var createdatalist=document.createElement("datalist");

        createdatalist.setAttribute("id","datalist1");

        purokdatalist.appendChild(createdatalist);

        var calldatalist=document.getElementById("datalist1");

        var createoptions=document.createElement("option");

        createoptions.innerHTML="";

        calldatalist.appendChild(createoptions);

        purok.setAttribute("list","datalist1");  
    }

}*/

                   

</script>
<?php

        
        
        ?>
<script src="hamburger-btn-toggle.js"></script>
        <script src="button-click.js"></script>
</body>  

       
</html>