<?php session_start(); 
        include_once("include.php");        
        error_reporting(0);
ini_set('display_errors', 0);
    

if($_SESSION['user']==false){
    echo "<script>window.location.href='search.php'</script>";
}

    else if(isset($_POST['memberbtn'])){
        $memberid=$_POST['hiddenmemberbtn'];
        $memberdisplay="SELECT * FROM `table2` WHERE id='$_SESSION[globalmemberid]'";
        $resultmemberdisplay=mysqli_query($conn,$memberdisplay);
        
        while($rowmemberdisplay=mysqli_fetch_array($resultmemberdisplay)){
            $mainidmember=$rowmemberdisplay['mainid'];
            $fname1=$rowmemberdisplay['fname'];
            $mname1=$rowmemberdisplay['mname'];
            $lname1=$rowmemberdisplay['lname'];
            $horm1=$rowmemberdisplay['horm'];
            $dependency1=$rowmemberdisplay['dependency'];
            $tribe1=$rowmemberdisplay['tribe'];
            $sex1=$rowmemberdisplay['sex'];
            $bdate1=$rowmemberdisplay['bdate'];
            $age1=$rowmemberdisplay['age'];
            $religion1=$rowmemberdisplay['religion'];
            $education1=$rowmemberdisplay['education'];
            $occupation1=$rowmemberdisplay['occupation'];
            $relation1=$rowmemberdisplay['relation'];
            $pwd1=$rowmemberdisplay['pwd'];
            $ip1=$rowmemberdisplay['ip'];
            $philhealth1=$rowmemberdisplay['philhealth'];
            $breastfeed1=$rowmemberdisplay['breastfeed'];
            $ntp1=$rowmemberdisplay['ntp'];
            $smooking1=$rowmemberdisplay['smooking'];
            
            $table1hhnum="SELECT * FROM `table1` WHERE id='$mainidmember'";
            $resulttable1hhnum=mysqli_query($conn,$table1hhnum);
        
            while($rowtable1hhnum=mysqli_fetch_array($resulttable1hhnum)){
                $purok1=$rowtable1hhnum['purok'];
                $barangay1=$rowtable1hhnum['barangay'];
            }
        }
        }

        else{
            echo "<script>window.location.href='search.php'</script>";
        }

?>

<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Barangay Database System</title>
<link rel="stylesheet" href="all.min.css">
        <link rel="stylesheet" href="fontawesome.min.css">
        <link rel="stylesheet" href="fonts.css">
<script src="https://kit.fontawesome.com/0d25aa5264.js" crossorigin="anonymous"></script>

    <link rel="icon" href="icon.png" type="png">


</head>

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');

*{
    margin:0;
    padding:0;
}

body{
    width:100%;
    height:100%;
    font-family: 'Poppins', sans-serif;
    background:#076C07;
}

#main{
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
}

#head-div{
    background:whitesmoke;
    width:80%;
    height:80vh;
    border-radius:10px;
    overflow:auto;
}

label{
    width:200px;
    display:inline-block;
}

#member-info label{
    width:250px;
    display:inline-block;
}

#info-div{
    padding:20px;
}

.inputbox{
    width:250px;
    height:40px;
    border:1px solid black;
    color:black;
    font-weight:bold;
}

.member-btn{
    width:auto;
    padding:10px;
    height:40px;
    cursor:pointer;
    border:1px solid black;
    font-weight:bold;
}

.member-btn:hover{
    background:#2779E7;
    color:white;
    border:1px solid;
}


.title{
    font-size:25px;
    text-align:center;
    margin-bottom:50px;
}
</style>

<body>
<div id="main">
    <div id="head-div">
        <div id="info-div">
            <p class="title"><i class="fas fa-pencil-alt" style="margin-right:10px"></i>Result </p>
            <div>    
               <!-- <label>Household Number</label>
                <input class="inputbox" type="text" value=" <?php echo $mainidmember ?> " disabled="true"/></br></br></br></br>
                -->
                <p style="font-size:20px;margin-bottom:10px"><b>Name</b></p>
                <label>First Name:</label>
                <input type="text" class="inputbox" value="<?php echo $fname1 ?>" name="fname"/></br>
                <label>Middle Name</label>
                <input type="text" class="inputbox" value="<?php echo $mname1 ?>" name="mname"/></br>
                <label>Last Name</label>
                <input type="text" class="inputbox" value="<?php echo $lname1 ?>" name="lname"/></br></br></br></br>
            
                <label>Head/Member</label>
                <input type="text" class="inputbox" value="<?php echo $horm1 ?>" disable=false/></br></br>
                <label>Dependency</label>
                <input type="text" class="inputbox" value="<?php echo $dependency1 ?>" name="dependency"/></br></br>
                <label>Tribe</label>
                <input type="text" class="inputbox" value="<?php echo $tribe1 ?>" name="tribe"/></br></br>
                <label>Sex</label>
                <input type="text" class="inputbox" value="<?php echo $sex1 ?>" name="sex"/></br></br>
                <label>Birth Date</label>
                <input type="text" class="inputbox" value="<?php echo $bdate1 ?>" name="bdate"/></br></br>
                <label>Age</label>
                <input type="text" class="inputbox" value="<?php echo $age1 ?>" name="age"/></br></br>
                <label>Religion</label>
                <input type="text" class="inputbox" value="<?php echo $religion1 ?>" name="religion"/></br></br>
                <label>Highest Educational Attainment</label>
                <input type="text" class="inputbox" value="<?php echo $education1 ?>" name="education"/></br></br>
                <label>Occupation</label>
                <input type="text" class="inputbox" value="<?php echo $occupation1 ?>" name="occupation"/></br></br>
                <label>Relation</label>
                <input type="text" class="inputbox" value="<?php echo $relation1 ?>"  name="relation"/></br></br>
                <label>PWD</label>
                <input type="text" class="inputbox" value="<?php echo $pwd1 ?>"  name="pwd"/></br></br>
                <label>IP</label>
                <input type="text" class="inputbox" value="<?php echo $ip1 ?>"  name="ip"/></br></br>
                <label>Philhealth</label>
                <input type="text" class="inputbox" value="<?php echo $philhealth1 ?>" name="philhealth"/></br></br>
                <label>Breast Feeding</label>
                <input type="text" class="inputbox" value="<?php echo $breastfeed1 ?>" name="beastfeed"/></br></br>
                <label>NTP</label>
                <input type="text" class="inputbox" value="<?php echo $ntp1 ?>" name="ntp"/></br></br>
                <label>Smooking</label>
                <input type="text" class="inputbox" value="<?php echo $smooking1 ?>" name="smooking" /></br>   
            </div>
        </div>
    </div>
</div>

</body>

</html>