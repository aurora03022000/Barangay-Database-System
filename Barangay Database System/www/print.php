<?php session_start(); 
error_reporting(0);
ini_set('display_errors', 0);
    include_once("include.php");  
    if($_SESSION['user']==false && $_SESSION['guest']==false){
        header("location: login.php");
    }      

    if($_SESSION['headprint']==1){

    $selectinfohead="SELECT * FROM `table2` WHERE mainid='$_SESSION[globalid]' and horm='Head'";
    $selectinforesulthead=mysqli_query($conn,$selectinfohead);

    while($rowselectinfohead=mysqli_fetch_array($selectinforesulthead)){
        $mainid=$rowselectinfohead['mainid'];
        $fullnamehead=$rowselectinfohead['fullname'];
        $lnamehead=$rowselectinfohead['lname'];
        $fnamehead=$rowselectinfohead['fname'];
        $mnamehead=$rowselectinfohead['mname'];
        $tribehead=$rowselectinfohead['tribe'];
        $sexhead=$rowselectinfohead['sex'];
        $bdatehead=$rowselectinfohead['bdate'];
        $agehead=$rowselectinfohead['age'];
        $religionhead=$rowselectinfohead['religion'];
        $educationhead=$rowselectinfohead['education'];
        $occupationhead=$rowselectinfohead['occupation'];
        $relationhead=$rowselectinfohead['horm'];
        $pwdhead=$rowselectinfohead['pwd'];
        $iphead=$rowselectinfohead['ip'];
        $philhealthhead=$rowselectinfohead['philhealth'];
        $breastfeedhead=$rowselectinfohead['breastfeed'];
        $ntphead=$rowselectinfohead['ntp'];
        $smookinghead=$rowselectinfohead['smooking'];
    }

    $selectinfo1="SELECT * FROM `table1` WHERE id='$mainid'";
    $selectinforesult1=mysqli_query($conn,$selectinfo1);

    while($rowselectinfo1=mysqli_fetch_array($selectinforesult1)){
        $purok=$rowselectinfo1['purok'];
        $barangay=$rowselectinfo1['barangay'];
        $famnum=$rowselectinfo1['famnum'];
        $mothertongue=$rowselectinfo1['mothertongue'];
        $housetype=$rowselectinfo1['housetype'];
        $santoilet=$rowselectinfo1['santoilet'];
        $immunization=$rowselectinfo1['immunization'];
        $wra=$rowselectinfo1['wra'];
        $garbdisposal=$rowselectinfo1['garbdisposal'];
        $watersource=$rowselectinfo1['watersource'];
        $familyplan=$rowselectinfo1['familyplan'];
        $bground=$rowselectinfo1['bground'];
        $livestat=$rowselectinfo1['livestat'];
        $animals=$rowselectinfo1['animals'];
        $blinddrain=$rowselectinfo1['blinddrain'];
        $communication=$rowselectinfo1['communication'];
        $homestat=$rowselectinfo1['homestat'];
        $energysource=$rowselectinfo1['energysource'];
        $dwtwbd=$rowselectinfo1['dwtwbd'];
        $vulstat=$rowselectinfo1['vulstat'];
        $agrifacil=$rowselectinfo1['agrifacil'];
        $osoi=$rowselectinfo1['osoi'];
        $housestat=$rowselectinfo1['housestat'];
        $transportation=$rowselectinfo1['transportation'];
    }
}

else{
        $selectinfomember1="SELECT * FROM `table2` WHERE id='$_SESSION[globalid]'";
        $selectinforesultmember1=mysqli_query($conn,$selectinfomember1);

        while($rowselectinfomember1=mysqli_fetch_array($selectinforesultmember1)){
        $mainid=$rowselectinfomember1['mainid'];
        $fullnamemember=$rowselectinfomember1['fullname'];
        $lnamemember=$rowselectinfomember1['lname'];
        $fnamemember=$rowselectinfomember1['fname'];
        $mnamemember=$rowselectinfomember1['mname'];
        $tribemember=$rowselectinfomember1['tribe'];
        $sexmember=$rowselectinfomember1['sex'];
        $bdatemember=$rowselectinfomember1['bdate'];
        $agemember=$rowselectinfomember1['age'];
        $religionmember=$rowselectinfomember1['religion'];
        $educationmember=$rowselectinfomember1['education'];
        $occupationmember=$rowselectinfomember1['occupation'];
        $relationmember=$rowselectinfomember1['horm'];
        $pwdmember=$rowselectinfomember1['pwd'];
        $ipmember=$rowselectinfomember1['ip'];
        $philhealthmember=$rowselectinfomember1['philhealth'];
        $breastfeedmember=$rowselectinfomember1['breastfeed'];
        $ntpmember=$rowselectinfomember1['ntp'];
        $smookingmember=$rowselectinfomember1['smooking'];
    }

        $selectinfohead1="SELECT * FROM `table2` WHERE mainid='$mainid' and horm='Head'";
        $selectinforesulthead1=mysqli_query($conn,$selectinfohead1);

        while($rowselectinfohead1=mysqli_fetch_array($selectinforesulthead1)){
        $fullnamehead=$rowselectinfohead1['fullname'];
    }

    $selectinfohead2="SELECT * FROM `table1` WHERE id='$mainid'";
    $selectinforesulthead2=mysqli_query($conn,$selectinfohead2);

    while($rowselectinfohead2=mysqli_fetch_array($selectinforesulthead2)){
        $purok=$rowselectinfohead2['purok'];
        $barangay=$rowselectinfohead2['barangay'];
        $famnum=$rowselectinfohead2['famnum'];
        $mothertongue=$rowselectinfohead2['mothertongue'];
    }

    
}
    
?>

<!DOCTYPE html>
<html>
<?php if($_SESSION['headprint']==1) { ?>
    <head>
    
   
        <link rel="stylesheet" href="all.min.css">
        <link rel="stylesheet" href="fontawesome.min.css">
        <script src="https://kit.fontawesome.com/0d25aa5264.js" crossorigin="anonymous"></script>
        
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Kaisei+Opti&display=swap');

        *{
            margin:0;
            padding:0;
        }

        body{
            font-family: 'Poppins', sans-serif;
            background-image:url('pattern.jpg');
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

        .table-container{
            width:100%;
            margin:0 auto;
            margin-top:20px;
        }

        .top-input{
            border:none;
            background:none;
        }

        label{
            font-size:13px;
        }

        table{
            margin-top:20px;
            width:98%;
            font-size:13px;
            border:3px solid black;
            margin:0 auto;
            border-collapse:collapse;
            height:80vh;
            margin-bottom:10px;
        }

        input{
            text-align:center;
            margin-right:30px;
        }

        table thead th{
            padding:10px 0;
            text-align:center;
        }

        table tbody tr td{
            padding:5px 5px;
        }

        table thead th, table tbody tr td{
            border:1px solid black;
        }

    </style>

    </head>
<body>

<header><i class="fas fa-database" style="margin-right:10px;font-size:40px"></i>Barangay Database System</header>
<div style="text-align:center;margin-top:30px;font-weight:bold">
    <label>HH#: </label><input type="text" class="top-input" value="" style="border-bottom:1px solid black">
    <label>Purok: </label><input type="text" class="top-input" value="<?php echo $purok ?>" style="border-bottom:1px solid black">
    <label>Barangay: </label><input type="text" class="top-input" value="<?php echo $barangay ?>" style="border-bottom:1px solid black">
    </br></br>
    <label>Household Head: </label><input type="text" class="top-input" value="<?php echo $fullnamehead ?>" style="border-bottom:1px solid black">
    <label>Number of Family Members: </label><input type="text" class="top-input" value="<?php echo $famnum ?>" style="border-bottom:1px solid black">
    <label>Mother Tongue: </label><input type="text" class="top-input" value="<?php echo $mothertongue ?>" style="border-bottom:1px solid black">
</div>
<div class="table-container">

<table>
    <thead >
        <th>Last Name</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Tribe</th>
        <th>Sex</th>
        <th>Birth Date</th>
        <th>Age</th>
        <th>Religion</th>
        <th>Education (Highest)</th>
        <th>Occupation</th>
        <th>Relation to Head</th>
        <th>PWD</th>
        <th>IP</th>
        <th>Philhealth</th>
        <th>Breast Feed</th>
        <th>NTP</th>
        <th>Smooking</th>
    </thead>
    
    <tbody>
        <tr>
            <td><i><?php echo $lnamehead ?></i></td>
            <td><i><?php echo $fnamehead ?></i></td>
            <td><i><?php echo $mnamehead ?></i></td>
            <td><i><?php echo $tribehead ?></i></td>
            <td><i><?php echo $sexhead ?></i></td>
            <td><i><?php echo $bdatehead ?></i></td>
            <td><i><?php echo $agehead ?></i></td>
            <td><i><?php echo $religionhead ?></i></td>
            <td><i><?php echo $educationhead ?></i></td>
            <td><i><?php echo $occupationhead ?></i></td>
            <td><i><?php echo $relationhead ?></i></td>
            <td><i><?php echo $pwdhead ?></i></td>
            <td><i><?php echo $iphead ?></i></td>
            <td><i><?php echo $philhealthhead ?></i></td>
            <td><i><?php echo $breastfeedhead ?></i></td>
            <td><i><?php echo $ntphead ?></i></td>
            <td><i><?php echo $smookinghead ?></i></td>
        </tr>

        <tr>
            <td colspan="17">-</td>
        </tr>

        

        <?php
        $selectinfo2="SELECT * FROM `table2` WHERE mainid='$_SESSION[globalid]'";
        $selectinforesult2=mysqli_query($conn,$selectinfo2);
        $count=0;
        while($rowselectinfo2=mysqli_fetch_array($selectinforesult2)){
        
        if($rowselectinfo2['horm']=="Member" && $rowselectinfo2['dependency']=="Dependent") {
            if($count==0){ ?>
                <tr>
                    <td colspan="17"><b>Dependent</b></td>
                </tr>
            <?php } ?>

        <tr>
            <td><i><?php echo $rowselectinfo2['lname'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['fname'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['mname'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['tribe'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['sex'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['bdate'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['age'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['religion'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['education'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['occupation'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['relation'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['pwd'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['ip'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['philhealth'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['breastfeed'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['ntp'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['smooking'] ?></i></td>
        </tr>
        <?php 
            $count=$count+1;
            } 
        }
        ?>

        

        <?php
        $selectinfo2="SELECT * FROM `table2` WHERE mainid='$_SESSION[globalid]'";
        $selectinforesult2=mysqli_query($conn,$selectinfo2);
        $count1=0;
        while($rowselectinfo2=mysqli_fetch_array($selectinforesult2)){
        if($rowselectinfo2['horm']=="Member" && $rowselectinfo2['dependency']=="Independent") { 
            if($count1==0){ ?>
                <tr>
                    <td colspan="17"><b>Independent</b></td>
                </tr>
            <?php } ?>

        <tr>
            <td><i><?php echo $rowselectinfo2['lname'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['fname'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['mname'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['tribe'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['sex'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['bdate'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['age'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['religion'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['education'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['occupation'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['relation'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['pwd'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['ip'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['philhealth'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['breastfeed'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['ntp'] ?></i></td>
            <td><i><?php echo $rowselectinfo2['smooking'] ?></i></td>
        </tr>
        <?php 
            $count1=$count1+1;
            } 
        }
        ?>

        <tr>
            <td colspan="17">-</td>
        </tr>

        <tr>
            <td colspan="17">-</td>
        </tr>

        <tr>
            <td colspan="17"><b>Other Informations</b></td>
            
        </tr>

        <tr>
            <td colspan="2"><b>Type of House</b></td>
            <td><i><?php echo $housetype ?></i></td>
            <td colspan="2"><b>Sanitary Toilet</b></td>
            <td colspan="3"><i><?php echo $santoilet ?></i></td>
            <td><b>Immunization</b></td>
            <td><i><?php echo $immunization ?></i></td>
            <td><b>WRA</b></td>
            <td colspan="6"><i><?php echo $wra ?></i></td>
        </tr>

        <tr>
            <td colspan="2"><b>Garbage Disposal</b></td>
            <td><i><?php echo $garbdisposal ?></i></td>
            <td colspan="2"><b>Water Source</b></td>
            <td colspan="3"><i><?php echo $watersource ?></i></td>
            <td><b>Family Planning</b></td>
            <td><i><?php echo $familyplan ?></i></td>
            <td><b>Background Gardening</b></td>
            <td colspan="6"><i><?php echo $bground ?></i></td>
        </tr>

        <tr>
            <td colspan="2"><b>Livelihood Status</b></td>
            <td><i><?php echo $livestat ?></i></td>
            <td colspan="2"><b>Animals/Pet</b></td>
            <td colspan="3"><i><?php echo $animals ?></i></td>
            <td><b>Blind Drainage</b></td>
            <td><i><?php echo $blinddrain ?></i></td>
            <td><b>Communication</b></td>
            <td colspan="6"><i><?php echo $communication ?></i></td> 
        </tr>

        <tr>
            <td colspan="2"><b>Homelot Status</b></td>
            <td><i><?php echo $homestat ?></i></td>
            <td colspan="5"><i></i></td>
            <td><b>Energy Source</b></td>
            <td><i><?php echo $energysource ?></i></td>
            <td colspan="4"><b>Discharging Waste Direct To Water Bodies</b></td>
            <td colspan="3"><i><?php echo $dwtwbd ?></i></td>
        </tr>

        <tr>
            <td colspan="2"><b>Vulnerable Status</b></td>
            <td><i><?php echo $vulstat ?></i></td>
            <td colspan="5"><i></i></td>
            <td><b>Agricultural Facility</b></td>
            <td colspan="8"><i><?php echo $agrifacil ?></i></td>
        </tr>

        <tr>
            <td colspan="2"><b>Other Source of Income</b></td>
            <td><i><?php echo $osoi ?></i></td>
            <td colspan="2"><b>Status of House</b></td>
            <td colspan="3"><i><?php echo $housestat ?></i></td>
            <td><b>Transportation Equipment</b></td>
            <td colspan="8"><i><?php echo $transportation ?></i></td>
        </tr>

        <tr>
            <td colspan="17"><b>Farming</b></td>
        </tr>
        
        <?php
        
        $selectfarmingid="SELECT `farmingid` FROM `table1` WHERE id='$_SESSION[globalid]'";
        $selectfarmingidresult=mysqli_query($conn,$selectfarmingid);

        while($rowfarmingid=mysqli_fetch_array($selectfarmingidresult)){
            $farmingid=$rowfarmingid['farmingid'];

            $selectproduct="SELECT * FROM `table4` WHERE farmingid='$farmingid'";
            $selectproductresult=mysqli_query($conn,$selectproduct);

            while($rowproduct=mysqli_fetch_array($selectproductresult)){
                ?>
                    <tr>
                        <td colspan="17"><i><?php echo $rowproduct['product'] ?></i></td>                        
                    </tr>
                <?php
            }
        }

        
        ?>
    </tbody>
</table>
</div>
   <?php } 
   
   else{ ?>

<head>
    
   
    <link rel="stylesheet" href="all.min.css">
    <link rel="stylesheet" href="fontawesome.min.css">
    <script src="https://kit.fontawesome.com/0d25aa5264.js" crossorigin="anonymous"></script>
    
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Kaisei+Opti&display=swap');

    *{
        margin:0;
        padding:0;
    }

    body{
        font-family: 'Poppins', sans-serif;
        background-image:url('pattern.jpg');
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

    .table-container{
        width:100%;
        margin:0 auto;
        margin-top:20px;
    }

    .top-input{
        border:none;
        background:none;
    }

    label{
        font-size:13px;
    }

    table{
        margin-top:20px;
        width:98%;
        font-size:13px;
        border:3px solid black;
        margin:0 auto;
        border-collapse:collapse;
        height:auto;
        margin-bottom:10px;
    }

    input{
        text-align:center;
        margin-right:30px;
    }

    table thead th{
        padding:10px 0;
        text-align:center;
    }

    table tbody tr td{
        padding:5px 5px;
    }

    table thead th, table tbody tr td{
        border:1px solid black;
    }

</style>

</head>
       <header><i class="fas fa-database" style="margin-right:10px;font-size:40px"></i>Barangay Database System</header>
<div style="text-align:center;margin-top:30px;font-weight:bold">
    <label>HH#: </label><input type="text" class="top-input" value="" style="border-bottom:1px solid black">
    <label>Purok: </label><input type="text" class="top-input" value="<?php echo $purok ?>" style="border-bottom:1px solid black">
    <label>Barangay: </label><input type="text" class="top-input" value="<?php echo $barangay ?>" style="border-bottom:1px solid black">
    </br></br>
    <label>Household Head: </label><input type="text" class="top-input" value="<?php echo $fullnamehead ?>" style="border-bottom:1px solid black">
    <label>Number of Family Members: </label><input type="text" class="top-input" value="<?php echo $famnum ?>" style="border-bottom:1px solid black">
    <label>Mother Tongue: </label><input type="text" class="top-input" value="<?php echo $mothertongue ?>" style="border-bottom:1px solid black">
</div>
<div class="table-container">

<table>
    <thead >
        <th>Last Name</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Tribe</th>
        <th>Sex</th>
        <th>Birth Date</th>
        <th>Age</th>
        <th>Religion</th>
        <th>Education (Highest)</th>
        <th>Occupation</th>
        <th>Relation to Head</th>
        <th>PWD</th>
        <th>IP</th>
        <th>Philhealth</th>
        <th>Breast Feed</th>
        <th>NTP</th>
        <th>Smooking</th>
    </thead>
    
    <tbody>
        <tr>
            <td><i><?php echo $lnamemember ?></i></td>
            <td><i><?php echo $fnamemember ?></i></td>
            <td><i><?php echo $mnamemember ?></i></td>
            <td><i><?php echo $tribemember ?></i></td>
            <td><i><?php echo $sexmember ?></i></td>
            <td><i><?php echo $bdatemember ?></i></td>
            <td><i><?php echo $agemember ?></i></td>
            <td><i><?php echo $religionmember ?></i></td>
            <td><i><?php echo $educationmember ?></i></td>
            <td><i><?php echo $occupationmember ?></i></td>
            <td><i><?php echo $relationmember ?></i></td>
            <td><i><?php echo $pwdmember ?></i></td>
            <td><i><?php echo $ipmember ?></i></td>
            <td><i><?php echo $philhealthmember ?></i></td>
            <td><i><?php echo $breastfeedmember ?></i></td>
            <td><i><?php echo $ntpmember ?></i></td>
            <td><i><?php echo $smookingmember ?></i></td>
        </tr>
    </tbody>
</table>
</div>
  <?php }
   
   ?>
</body>
</html>
