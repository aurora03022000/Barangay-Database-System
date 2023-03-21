<?php session_start(); 
error_reporting(0);
ini_set('display_errors', 0);
    include_once("include.php");    
    
    if($_SESSION['user']==false && $_SESSION['guest']==false){
        header("location: login.php");
    }

?>
<!DOCTYPE html>
<html>
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
            width:900px;
            min-width:700px;
            margin:0 auto;
            margin-top:40px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            font-size:15px;
            margin:0 auto;
            text-align:center;
            border-top:1px solid black;
        }

        table thead th{
            text-align:center;
            padding:10px 0;
            font-size:15px;
        }

        table tbody tr td{
            padding:5px 0;
        }
    </style>

    </head>
</body>
<header><i class="fas fa-database" style="margin-right:10px;font-size:40px"></i>Barangay Database System</header>

<div class="table-container">

    
<?php 
           if($_SESSION['viewcondition']==1){ 
            ?>
            <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;">Names (<b>All</b>)</p>
            <?php 
            

                $countviewalldefault1="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' ";
                $countviewalldefaultresult1=mysqli_query($conn,$countviewalldefault1);
                $countnumrowviewallsdefault=0;

                while($countviewalldefaultrow1=mysqli_fetch_array($countviewalldefaultresult1)){
                    $countviewalldefaultid1=$countviewalldefaultrow1['id'];

                    $countviewalldefault2="SELECT * FROM `table2` WHERE mainid='$countviewalldefaultid1'";
                    $countviewalldefaultresult2=mysqli_query($conn,$countviewalldefault2);

                    while($countviewalldefaultrow2=mysqli_fetch_array($countviewalldefaultresult2)){
                        $countnumrowviewallsdefault++;
                    }
                }                    

            $countviewalldefaultsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
            $countviewalldefaultresultsex=mysqli_query($conn,$countviewalldefaultsex);
            $countnumrowviewallsdefaultsexmale=0;
            $countnumrowviewallsdefaultsexfemale=0;

            while($countviewalldefaultrowsex=mysqli_fetch_array($countviewalldefaultresultsex)){
                $countviewalldefaultmainidsex=$countviewalldefaultrowsex['id'];
                
                $countviewalldefaultsex1="SELECT * FROM `table2` WHERE sex='Female' and mainid='$countviewalldefaultmainidsex'";
                $countviewalldefaultresultsex1=mysqli_query($conn,$countviewalldefaultsex1);

                while($countviewalldefaultrowsex1=mysqli_fetch_array($countviewalldefaultresultsex1)){
                    $countnumrowviewallsdefaultsexfemale++;
                }

                $countviewalldefaultsex2="SELECT * FROM `table2` WHERE sex='Male' and mainid='$countviewalldefaultmainidsex'";
                $countviewalldefaultresultsex2=mysqli_query($conn,$countviewalldefaultsex2);

                while($countviewalldefaultrowsex2=mysqli_fetch_array($countviewalldefaultresultsex2)){
                    $countnumrowviewallsdefaultsexmale++;
                }


            }


            ?>
            <span>
                <p style="margin-bottom:10px;text-align:center;font-size:15px">
                <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsdefaultsexmale ?></span>    
                <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsdefaultsexfemale ?> </span>
                <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsdefault ?> </span></br>
                </p>
            </span>
            <table>
                <thead>
                    <th>Family ID</th>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Purok</th>
                    <th>Barangay</th>
            </thead>
        <?php

        $queryviewalldefault="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
        $queryviewalldefaultresult=mysqli_query($conn,$queryviewalldefault);

        while($rowviewalldefault=mysqli_fetch_array($queryviewalldefaultresult)){
        $viewalldefaultid=$rowviewalldefault['id'];

        $queryviewalldefault1="SELECT * FROM `table2` WHERE mainid='$viewalldefaultid' ORDER BY mainid";
        $queryviewalldefaultresult1=mysqli_query($conn, $queryviewalldefault1);

        while($rowviewalldefault1=mysqli_fetch_array($queryviewalldefaultresult1)){ ?>
            <tbody>
                <tr>
                    <td><b><?php echo $rowviewalldefault1['mainid'] ?></b></td>
                    <td><?php echo $rowviewalldefault1['fullname'] ?></td>
                    <td><?php echo $rowviewalldefault1['sex'] ?></td>
                    <td><?php echo $rowviewalldefault['purok'] ?></td>
                    <td><?php echo $rowviewalldefault['barangay'] ?></td>
                </tr>
            </tbody>
        <?php
    } 
}
}

           if($_SESSION['viewcondition']==2){ 
            ?>
            <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;">Head Names (<b>All</b>)</p>
            <?php 
            

                $countviewalldefault1="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' ";
                $countviewalldefaultresult1=mysqli_query($conn,$countviewalldefault1);
                $countnumrowviewallsdefault=0;

                while($countviewalldefaultrow1=mysqli_fetch_array($countviewalldefaultresult1)){
                    $countviewalldefaultid1=$countviewalldefaultrow1['id'];

                    $countviewalldefault2="SELECT * FROM `table2` WHERE mainid='$countviewalldefaultid1' and horm='Head'";
                    $countviewalldefaultresult2=mysqli_query($conn,$countviewalldefault2);

                    while($countviewalldefaultrow2=mysqli_fetch_array($countviewalldefaultresult2)){
                        $countnumrowviewallsdefault++;
                    }
                }                    

            $countviewalldefaultsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
            $countviewalldefaultresultsex=mysqli_query($conn,$countviewalldefaultsex);
            $countnumrowviewallsdefaultsexmale=0;
            $countnumrowviewallsdefaultsexfemale=0;

            while($countviewalldefaultrowsex=mysqli_fetch_array($countviewalldefaultresultsex)){
                $countviewalldefaultmainidsex=$countviewalldefaultrowsex['id'];
                
                $countviewalldefaultsex1="SELECT * FROM `table2` WHERE sex='Female' and horm='Head' and mainid='$countviewalldefaultmainidsex'";
                $countviewalldefaultresultsex1=mysqli_query($conn,$countviewalldefaultsex1);

                while($countviewalldefaultrowsex1=mysqli_fetch_array($countviewalldefaultresultsex1)){
                    $countnumrowviewallsdefaultsexfemale++;
                }

                $countviewalldefaultsex2="SELECT * FROM `table2` WHERE sex='Male' and horm='Head' and mainid='$countviewalldefaultmainidsex'";
                $countviewalldefaultresultsex2=mysqli_query($conn,$countviewalldefaultsex2);

                while($countviewalldefaultrowsex2=mysqli_fetch_array($countviewalldefaultresultsex2)){
                    $countnumrowviewallsdefaultsexmale++;
                }


            }


            ?>
            <span>
                <p style="margin-bottom:10px;text-align:center;font-size:15px">
                <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsdefaultsexmale ?></span>    
                <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsdefaultsexfemale ?> </span>
                <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsdefault ?> </span></br>
                </p>
            </span>
            <table>
                <thead>
                    <th>Family ID</th>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Purok</th>
                    <th>Barangay</th>
            </thead>
        <?php

        $queryviewalldefault="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
        $queryviewalldefaultresult=mysqli_query($conn,$queryviewalldefault);

        while($rowviewalldefault=mysqli_fetch_array($queryviewalldefaultresult)){
        $viewalldefaultid=$rowviewalldefault['id'];

        $queryviewalldefault1="SELECT * FROM `table2` WHERE mainid='$viewalldefaultid' and horm='Head' ORDER BY mainid";
        $queryviewalldefaultresult1=mysqli_query($conn, $queryviewalldefault1);

        while($rowviewalldefault1=mysqli_fetch_array($queryviewalldefaultresult1)){ ?>
            <tbody>
                <tr>
                    <td><b><?php echo $rowviewalldefault1['mainid'] ?></b></td>
                    <td><?php echo $rowviewalldefault1['fullname'] ?></td>
                    <td><?php echo $rowviewalldefault1['sex'] ?></td>
                    <td><?php echo $rowviewalldefault['purok'] ?></td>
                    <td><?php echo $rowviewalldefault['barangay'] ?></td>
                </tr>
            </tbody>
        <?php
    } 
}
}


    if($_SESSION['viewcondition']==3){ 
                   if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }

                    $countviewallage="SELECT * FROM `table2` WHERE age='$_SESSION[search]'";
                    $countviewallageresult=mysqli_query($conn,$countviewallage);
                    $countnumrowviewallsage=0;

                    while($countviewallagerow=mysqli_fetch_array($countviewallageresult)){
                        $countviewallagemainid=$countviewallagerow['mainid'];

                        $countviewallage1="SELECT * FROM `table1` WHERE id='$countviewallagemainid' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallageresult1=mysqli_query($conn,$countviewallage1);

                        while($countviewallagerow1=mysqli_fetch_array($countviewallageresult1)){
                            $countviewallageid1=$countviewallagerow1['id'];

                            $countviewallage2="SELECT * FROM `table2` WHERE id='$countviewallageid1'";
                            $countviewallageresult2=mysqli_query($conn,$countviewallage2);
                            $countnumrowviewallsage++;
                        }                    
                    }

                    $countviewallagesex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                    $countviewallageresultsex=mysqli_query($conn,$countviewallagesex);
                    $countnumrowviewallsagesexmale=0;
                    $countnumrowviewallsagesexfemale=0;

                    while($countviewallagerowsex=mysqli_fetch_array($countviewallageresultsex)){
                        $countviewallagemainidsex=$countviewallagerowsex['id'];
                        
                        $countviewallagesex1="SELECT * FROM `table2` WHERE age='$_SESSION[search]' and sex='Female' and mainid='$countviewallagemainidsex'";
                        $countviewallageresultsex1=mysqli_query($conn,$countviewallagesex1);

                        while($countviewallagerowsex1=mysqli_fetch_array($countviewallageresultsex1)){
                            $countnumrowviewallsagesexfemale++;
                        }

                        $countviewallagesex2="SELECT * FROM `table2` WHERE age='$_SESSION[search]' and sex='Male' and mainid='$countviewallagemainidsex'";
                        $countviewallageresultsex2=mysqli_query($conn,$countviewallagesex2);

                        while($countviewallagerowsex2=mysqli_fetch_array($countviewallageresultsex2)){
                            $countnumrowviewallsagesexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsagesexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsagesexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsage ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Age</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallage="SELECT * FROM `table2` WHERE age='$_SESSION[search]' ORDER BY mainid";
                $queryviewallageresult=mysqli_query($conn,$queryviewallage);

                while($rowviewallage=mysqli_fetch_array($queryviewallageresult)){
                $viewallageid=$rowviewallage['mainid'];
                $viewallagehorm=$rowviewallage['horm'];

                $queryviewallage1="SELECT * FROM `table1` WHERE id='$viewallageid' and barangay='$_SESSION[userbarangay]'";
                $queryviewallageresult1=mysqli_query($conn, $queryviewallage1);

                while($rowviewallage1=mysqli_fetch_array($queryviewallageresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallage['mainid'] ?></b></td>
                            <td><?php echo $rowviewallage['fullname'] ?> (<?php echo $viewallagehorm ?>)</td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallage['age'] ?></td>
                            <td><?php echo $rowviewallage['sex'] ?></td>
                            <td><?php echo $rowviewallage1['purok'] ?></td>
                            <td><?php echo $rowviewallage1['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }

        if($_SESSION['viewcondition']==4){ 

                    if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }
                    

                        $countviewallanimals1="SELECT * FROM `table1` WHERE animals='$_SESSION[search]' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallanimalsresult1=mysqli_query($conn,$countviewallanimals1);
                        $countnumrowviewallsanimals=0;

                        while($countviewallanimalsrow1=mysqli_fetch_array($countviewallanimalsresult1)){
                            $countviewallanimalsid1=$countviewallanimalsrow1['id'];

                            $countviewallanimals2="SELECT * FROM `table2` WHERE mainid='$countviewallanimalsid1' and horm='Head'";
                            $countviewallanimalsresult2=mysqli_query($conn,$countviewallanimals2);

                            while($countviewallanimalsrow1a=mysqli_fetch_array($countviewallanimalsresult2)){
                                $countnumrowviewallsanimals++;
                            }
                        }                    

                    $countviewallanimalssex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' and animals='$_SESSION[search]'";
                    $countviewallanimalsresultsex=mysqli_query($conn,$countviewallanimalssex);
                    $countnumrowviewallsanimalssexmale=0;
                    $countnumrowviewallsanimalssexfemale=0;

                    while($countviewallanimalsrowsex=mysqli_fetch_array($countviewallanimalsresultsex)){
                        $countviewallanimalsmainidsex=$countviewallanimalsrowsex['id'];
                        
                        $countviewallanimalssex1="SELECT * FROM `table2` WHERE sex='Female' and horm='Head' and mainid='$countviewallanimalsmainidsex'";
                        $countviewallanimalsresultsex1=mysqli_query($conn,$countviewallanimalssex1);

                        while($countviewallanimalsrowsex1=mysqli_fetch_array($countviewallanimalsresultsex1)){
                            $countnumrowviewallsanimalssexfemale++;
                        }

                        $countviewallanimalssex2="SELECT * FROM `table2` WHERE sex='Male' and horm='Head'  and mainid='$countviewallanimalsmainidsex'";
                        $countviewallanimalsresultsex2=mysqli_query($conn,$countviewallanimalssex2);

                        while($countviewallanimalsrowsex2=mysqli_fetch_array($countviewallanimalsresultsex2)){
                            $countnumrowviewallsanimalssexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsanimalssexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsanimalssexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsanimals ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Animal/Pet</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallanimals="SELECT * FROM `table1` WHERE animals='$_SESSION[search]' and barangay='$_SESSION[userbarangay]'";
                $queryviewallanimalsresult=mysqli_query($conn,$queryviewallanimals);

                while($rowviewallanimals=mysqli_fetch_array($queryviewallanimalsresult)){
                $viewallanimalsid=$rowviewallanimals['id'];

                $queryviewallanimals1="SELECT * FROM `table2` WHERE mainid='$viewallanimalsid' and horm='Head' ORDER BY mainid";
                $queryviewallanimalsresult1=mysqli_query($conn, $queryviewallanimals1);

                while($rowviewallanimals1=mysqli_fetch_array($queryviewallanimalsresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallanimals1['mainid'] ?></b></td>
                            <td><?php echo $rowviewallanimals1['fullname'] ?></td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallanimals['animals'] ?></td>
                            <td><?php echo $rowviewallanimals1['sex'] ?></td>
                            <td><?php echo $rowviewallanimals['purok'] ?></td>
                            <td><?php echo $rowviewallanimals['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }


        if($_SESSION['viewcondition']==5){ 

                    if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }
                    

                        $countviewallagrifacil1="SELECT * FROM `table1` WHERE agrifacil='$_SESSION[search]' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallagrifacilresult1=mysqli_query($conn,$countviewallagrifacil1);
                        $countnumrowviewallsagrifacil=0;

                        while($countviewallagrifacilrow1=mysqli_fetch_array($countviewallagrifacilresult1)){
                            $countviewallagrifacilid1=$countviewallagrifacilrow1['id'];

                            $countviewallagrifacil2="SELECT * FROM `table2` WHERE mainid='$countviewallagrifacilid1' and horm='Head'";
                            $countviewallagrifacilresult2=mysqli_query($conn,$countviewallagrifacil2);

                            while($countviewallagrifacilrow1a=mysqli_fetch_array($countviewallagrifacilresult2)){
                                $countnumrowviewallsagrifacil++;
                            }
                        }                    

                    $countviewallagrifacilsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' and agrifacil='$_SESSION[search]'";
                    $countviewallagrifacilresultsex=mysqli_query($conn,$countviewallagrifacilsex);
                    $countnumrowviewallsagrifacilsexmale=0;
                    $countnumrowviewallsagrifacilsexfemale=0;

                    while($countviewallagrifacilrowsex=mysqli_fetch_array($countviewallagrifacilresultsex)){
                        $countviewallagrifacilmainidsex=$countviewallagrifacilrowsex['id'];
                        
                        $countviewallagrifacilsex1="SELECT * FROM `table2` WHERE sex='Female' and horm='Head' and mainid='$countviewallagrifacilmainidsex'";
                        $countviewallagrifacilresultsex1=mysqli_query($conn,$countviewallagrifacilsex1);

                        while($countviewallagrifacilrowsex1=mysqli_fetch_array($countviewallagrifacilresultsex1)){
                            $countnumrowviewallsagrifacilsexfemale++;
                        }

                        $countviewallagrifacilsex2="SELECT * FROM `table2` WHERE sex='Male' and horm='Head'  and mainid='$countviewallagrifacilmainidsex'";
                        $countviewallagrifacilresultsex2=mysqli_query($conn,$countviewallagrifacilsex2);

                        while($countviewallagrifacilrowsex2=mysqli_fetch_array($countviewallagrifacilresultsex2)){
                            $countnumrowviewallsagrifacilsexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsagrifacilsexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsagrifacilsexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsagrifacil ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Agricultural Facility</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallagrifacil="SELECT * FROM `table1` WHERE agrifacil='$_SESSION[search]' and barangay='$_SESSION[userbarangay]'";
                $queryviewallagrifacilresult=mysqli_query($conn,$queryviewallagrifacil);

                while($rowviewallagrifacil=mysqli_fetch_array($queryviewallagrifacilresult)){
                $viewallagrifacilid=$rowviewallagrifacil['id'];

                $queryviewallagrifacil1="SELECT * FROM `table2` WHERE mainid='$viewallagrifacilid' and horm='Head' ORDER BY mainid";
                $queryviewallagrifacilresult1=mysqli_query($conn, $queryviewallagrifacil1);

                while($rowviewallagrifacil1=mysqli_fetch_array($queryviewallagrifacilresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallagrifacil1['mainid'] ?></b></td>
                            <td><?php echo $rowviewallagrifacil1['fullname'] ?></td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallagrifacil['agrifacil'] ?></td>
                            <td><?php echo $rowviewallagrifacil1['sex'] ?></td>
                            <td><?php echo $rowviewallagrifacil['purok'] ?></td>
                            <td><?php echo $rowviewallagrifacil['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }

            if($_SESSION['viewcondition']==6){ 

                    if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }
                    

                        $countviewallbground1="SELECT * FROM `table1` WHERE bground='$_SESSION[search]' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallbgroundresult1=mysqli_query($conn,$countviewallbground1);
                        $countnumrowviewallsbground=0;

                        while($countviewallbgroundrow1=mysqli_fetch_array($countviewallbgroundresult1)){
                            $countviewallbgroundid1=$countviewallbgroundrow1['id'];

                            $countviewallbground2="SELECT * FROM `table2` WHERE mainid='$countviewallbgroundid1' and horm='Head'";
                            $countviewallbgroundresult2=mysqli_query($conn,$countviewallbground2);

                            while($countviewallbgroundrow1a=mysqli_fetch_array($countviewallbgroundresult2)){
                                $countnumrowviewallsbground++;
                            }
                        }                    

                    $countviewallbgroundsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' and bground='$_SESSION[search]'";
                    $countviewallbgroundresultsex=mysqli_query($conn,$countviewallbgroundsex);
                    $countnumrowviewallsbgroundsexmale=0;
                    $countnumrowviewallsbgroundsexfemale=0;

                    while($countviewallbgroundrowsex=mysqli_fetch_array($countviewallbgroundresultsex)){
                        $countviewallbgroundmainidsex=$countviewallbgroundrowsex['id'];
                        
                        $countviewallbgroundsex1="SELECT * FROM `table2` WHERE sex='Female' and horm='Head' and mainid='$countviewallbgroundmainidsex'";
                        $countviewallbgroundresultsex1=mysqli_query($conn,$countviewallbgroundsex1);

                        while($countviewallbgroundrowsex1=mysqli_fetch_array($countviewallbgroundresultsex1)){
                            $countnumrowviewallsbgroundsexfemale++;
                        }

                        $countviewallbgroundsex2="SELECT * FROM `table2` WHERE sex='Male' and horm='Head'  and mainid='$countviewallbgroundmainidsex'";
                        $countviewallbgroundresultsex2=mysqli_query($conn,$countviewallbgroundsex2);

                        while($countviewallbgroundrowsex2=mysqli_fetch_array($countviewallbgroundresultsex2)){
                            $countnumrowviewallsbgroundsexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsbgroundsexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsbgroundsexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsbground ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Background Gardening</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallbground="SELECT * FROM `table1` WHERE bground='$_SESSION[search]' and barangay='$_SESSION[userbarangay]'";
                $queryviewallbgroundresult=mysqli_query($conn,$queryviewallbground);

                while($rowviewallbground=mysqli_fetch_array($queryviewallbgroundresult)){
                $viewallbgroundid=$rowviewallbground['id'];

                $queryviewallbground1="SELECT * FROM `table2` WHERE mainid='$viewallbgroundid' and horm='Head' ORDER BY mainid";
                $queryviewallbgroundresult1=mysqli_query($conn, $queryviewallbground1);

                while($rowviewallbground1=mysqli_fetch_array($queryviewallbgroundresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallbground1['mainid'] ?></b></td>
                            <td><?php echo $rowviewallbground1['fullname'] ?></td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallbground['bground'] ?></td>
                            <td><?php echo $rowviewallbground1['sex'] ?></td>
                            <td><?php echo $rowviewallbground['purok'] ?></td>
                            <td><?php echo $rowviewallbground['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }

     if($_SESSION['viewcondition']==7){ 
                   if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }

                    $countviewallbdate="SELECT * FROM `table2` WHERE bdate='$_SESSION[search]'";
                    $countviewallbdateresult=mysqli_query($conn,$countviewallbdate);
                    $countnumrowviewallsbdate=0;

                    while($countviewallbdaterow=mysqli_fetch_array($countviewallbdateresult)){
                        $countviewallbdatemainid=$countviewallbdaterow['mainid'];

                        $countviewallbdate1="SELECT * FROM `table1` WHERE id='$countviewallbdatemainid' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallbdateresult1=mysqli_query($conn,$countviewallbdate1);

                        while($countviewallbdaterow1=mysqli_fetch_array($countviewallbdateresult1)){
                            $countviewallbdateid1=$countviewallbdaterow1['id'];

                            $countviewallbdate2="SELECT * FROM `table2` WHERE id='$countviewallbdateid1'";
                            $countviewallbdateresult2=mysqli_query($conn,$countviewallbdate2);
                            $countnumrowviewallsbdate++;
                        }                    
                    }

                    $countviewallbdatesex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                    $countviewallbdateresultsex=mysqli_query($conn,$countviewallbdatesex);
                    $countnumrowviewallsbdatesexmale=0;
                    $countnumrowviewallsbdatesexfemale=0;

                    while($countviewallbdaterowsex=mysqli_fetch_array($countviewallbdateresultsex)){
                        $countviewallbdatemainidsex=$countviewallbdaterowsex['id'];
                        
                        $countviewallbdatesex1="SELECT * FROM `table2` WHERE bdate='$_SESSION[search]' and sex='Female' and mainid='$countviewallbdatemainidsex'";
                        $countviewallbdateresultsex1=mysqli_query($conn,$countviewallbdatesex1);

                        while($countviewallbdaterowsex1=mysqli_fetch_array($countviewallbdateresultsex1)){
                            $countnumrowviewallsbdatesexfemale++;
                        }

                        $countviewallbdatesex2="SELECT * FROM `table2` WHERE bdate='$_SESSION[search]' and sex='Male' and mainid='$countviewallbdatemainidsex'";
                        $countviewallbdateresultsex2=mysqli_query($conn,$countviewallbdatesex2);

                        while($countviewallbdaterowsex2=mysqli_fetch_array($countviewallbdateresultsex2)){
                            $countnumrowviewallsbdatesexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsbdatesexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsbdatesexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsbdate ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Birth Date (yyyy-mm-dd)</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallbdate="SELECT * FROM `table2` WHERE bdate='$_SESSION[search]' ORDER BY mainid";
                $queryviewallbdateresult=mysqli_query($conn,$queryviewallbdate);

                while($rowviewallbdate=mysqli_fetch_array($queryviewallbdateresult)){
                $viewallbdateid=$rowviewallbdate['mainid'];
                $viewallbdatehorm=$rowviewallbdate['horm'];

                $queryviewallbdate1="SELECT * FROM `table1` WHERE id='$viewallbdateid' and barangay='$_SESSION[userbarangay]'";
                $queryviewallbdateresult1=mysqli_query($conn, $queryviewallbdate1);

                while($rowviewallbdate1=mysqli_fetch_array($queryviewallbdateresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallbdate['mainid'] ?></b></td>
                            <td><?php echo $rowviewallbdate['fullname'] ?> (<?php echo $viewallbdatehorm ?>)</td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallbdate['bdate'] ?></td>
                            <td><?php echo $rowviewallbdate['sex'] ?></td>
                            <td><?php echo $rowviewallbdate1['purok'] ?></td>
                            <td><?php echo $rowviewallbdate1['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }   


    if($_SESSION['viewcondition']==8){ 

                    if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }
                    

                        $countviewallblinddrain1="SELECT * FROM `table1` WHERE blinddrain='$_SESSION[search]' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallblinddrainresult1=mysqli_query($conn,$countviewallblinddrain1);
                        $countnumrowviewallsblinddrain=0;

                        while($countviewallblinddrainrow1=mysqli_fetch_array($countviewallblinddrainresult1)){
                            $countviewallblinddrainid1=$countviewallblinddrainrow1['id'];

                            $countviewallblinddrain2="SELECT * FROM `table2` WHERE mainid='$countviewallblinddrainid1' and horm='Head'";
                            $countviewallblinddrainresult2=mysqli_query($conn,$countviewallblinddrain2);

                            while($countviewallblinddrainrow1a=mysqli_fetch_array($countviewallblinddrainresult2)){
                                $countnumrowviewallsblinddrain++;
                            }
                        }                    

                    $countviewallblinddrainsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' and blinddrain='$_SESSION[search]'";
                    $countviewallblinddrainresultsex=mysqli_query($conn,$countviewallblinddrainsex);
                    $countnumrowviewallsblinddrainsexmale=0;
                    $countnumrowviewallsblinddrainsexfemale=0;

                    while($countviewallblinddrainrowsex=mysqli_fetch_array($countviewallblinddrainresultsex)){
                        $countviewallblinddrainmainidsex=$countviewallblinddrainrowsex['id'];
                        
                        $countviewallblinddrainsex1="SELECT * FROM `table2` WHERE sex='Female' and horm='Head' and mainid='$countviewallblinddrainmainidsex'";
                        $countviewallblinddrainresultsex1=mysqli_query($conn,$countviewallblinddrainsex1);

                        while($countviewallblinddrainrowsex1=mysqli_fetch_array($countviewallblinddrainresultsex1)){
                            $countnumrowviewallsblinddrainsexfemale++;
                        }

                        $countviewallblinddrainsex2="SELECT * FROM `table2` WHERE sex='Male' and horm='Head'  and mainid='$countviewallblinddrainmainidsex'";
                        $countviewallblinddrainresultsex2=mysqli_query($conn,$countviewallblinddrainsex2);

                        while($countviewallblinddrainrowsex2=mysqli_fetch_array($countviewallblinddrainresultsex2)){
                            $countnumrowviewallsblinddrainsexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsblinddrainsexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsblinddrainsexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsblinddrain ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Blind Drainage</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallblinddrain="SELECT * FROM `table1` WHERE blinddrain='$_SESSION[search]' and barangay='$_SESSION[userbarangay]'";
                $queryviewallblinddrainresult=mysqli_query($conn,$queryviewallblinddrain);

                while($rowviewallblinddrain=mysqli_fetch_array($queryviewallblinddrainresult)){
                $viewallblinddrainid=$rowviewallblinddrain['id'];

                $queryviewallblinddrain1="SELECT * FROM `table2` WHERE mainid='$viewallblinddrainid' and horm='Head' ORDER BY mainid";
                $queryviewallblinddrainresult1=mysqli_query($conn, $queryviewallblinddrain1);

                while($rowviewallblinddrain1=mysqli_fetch_array($queryviewallblinddrainresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallblinddrain1['mainid'] ?></b></td>
                            <td><?php echo $rowviewallblinddrain1['fullname'] ?></td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallblinddrain['blinddrain'] ?></td>
                            <td><?php echo $rowviewallblinddrain1['sex'] ?></td>
                            <td><?php echo $rowviewallblinddrain['purok'] ?></td>
                            <td><?php echo $rowviewallblinddrain['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }


       if($_SESSION['viewcondition']==9){ 
                   if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }

                    $countviewallbreastfeed="SELECT * FROM `table2` WHERE breastfeed='$_SESSION[search]'";
                    $countviewallbreastfeedresult=mysqli_query($conn,$countviewallbreastfeed);
                    $countnumrowviewallsbreastfeed=0;

                    while($countviewallbreastfeedrow=mysqli_fetch_array($countviewallbreastfeedresult)){
                        $countviewallbreastfeedmainid=$countviewallbreastfeedrow['mainid'];

                        $countviewallbreastfeed1="SELECT * FROM `table1` WHERE id='$countviewallbreastfeedmainid' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallbreastfeedresult1=mysqli_query($conn,$countviewallbreastfeed1);

                        while($countviewallbreastfeedrow1=mysqli_fetch_array($countviewallbreastfeedresult1)){
                            $countviewallbreastfeedid1=$countviewallbreastfeedrow1['id'];

                            $countviewallbreastfeed2="SELECT * FROM `table2` WHERE id='$countviewallbreastfeedid1'";
                            $countviewallbreastfeedresult2=mysqli_query($conn,$countviewallbreastfeed2);
                            $countnumrowviewallsbreastfeed++;
                        }                    
                    }

                    $countviewallbreastfeedsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                    $countviewallbreastfeedresultsex=mysqli_query($conn,$countviewallbreastfeedsex);
                    $countnumrowviewallsbreastfeedsexmale=0;
                    $countnumrowviewallsbreastfeedsexfemale=0;

                    while($countviewallbreastfeedrowsex=mysqli_fetch_array($countviewallbreastfeedresultsex)){
                        $countviewallbreastfeedmainidsex=$countviewallbreastfeedrowsex['id'];
                        
                        $countviewallbreastfeedsex1="SELECT * FROM `table2` WHERE breastfeed='$_SESSION[search]' and sex='Female' and mainid='$countviewallbreastfeedmainidsex'";
                        $countviewallbreastfeedresultsex1=mysqli_query($conn,$countviewallbreastfeedsex1);

                        while($countviewallbreastfeedrowsex1=mysqli_fetch_array($countviewallbreastfeedresultsex1)){
                            $countnumrowviewallsbreastfeedsexfemale++;
                        }

                        $countviewallbreastfeedsex2="SELECT * FROM `table2` WHERE breastfeed='$_SESSION[search]' and sex='Male' and mainid='$countviewallbreastfeedmainidsex'";
                        $countviewallbreastfeedresultsex2=mysqli_query($conn,$countviewallbreastfeedsex2);

                        while($countviewallbreastfeedrowsex2=mysqli_fetch_array($countviewallbreastfeedresultsex2)){
                            $countnumrowviewallsbreastfeedsexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsbreastfeedsexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsbreastfeedsexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsbreastfeed ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Breast Feeding</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallbreastfeed="SELECT * FROM `table2` WHERE breastfeed='$_SESSION[search]' ORDER BY mainid";
                $queryviewallbreastfeedresult=mysqli_query($conn,$queryviewallbreastfeed);

                while($rowviewallbreastfeed=mysqli_fetch_array($queryviewallbreastfeedresult)){
                $viewallbreastfeedid=$rowviewallbreastfeed['mainid'];
                $viewallbreastfeedhorm=$rowviewallbreastfeed['horm'];

                $queryviewallbreastfeed1="SELECT * FROM `table1` WHERE id='$viewallbreastfeedid' and barangay='$_SESSION[userbarangay]'";
                $queryviewallbreastfeedresult1=mysqli_query($conn, $queryviewallbreastfeed1);

                while($rowviewallbreastfeed1=mysqli_fetch_array($queryviewallbreastfeedresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallbreastfeed['mainid'] ?></b></td>
                            <td><?php echo $rowviewallbreastfeed['fullname'] ?> (<?php echo $viewallbreastfeedhorm ?>)</td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallbreastfeed['breastfeed'] ?></td>
                            <td><?php echo $rowviewallbreastfeed['sex'] ?></td>
                            <td><?php echo $rowviewallbreastfeed1['purok'] ?></td>
                            <td><?php echo $rowviewallbreastfeed1['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }  
    
    
        if($_SESSION['viewcondition']==10){ 

                    if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }
                    

                        $countviewallcommunication1="SELECT * FROM `table1` WHERE communication='$_SESSION[search]' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallcommunicationresult1=mysqli_query($conn,$countviewallcommunication1);
                        $countnumrowviewallscommunication=0;

                        while($countviewallcommunicationrow1=mysqli_fetch_array($countviewallcommunicationresult1)){
                            $countviewallcommunicationid1=$countviewallcommunicationrow1['id'];

                            $countviewallcommunication2="SELECT * FROM `table2` WHERE mainid='$countviewallcommunicationid1' and horm='Head'";
                            $countviewallcommunicationresult2=mysqli_query($conn,$countviewallcommunication2);

                            while($countviewallcommunicationrow1a=mysqli_fetch_array($countviewallcommunicationresult2)){
                                $countnumrowviewallscommunication++;
                            }
                        }                    

                    $countviewallcommunicationsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' and communication='$_SESSION[search]'";
                    $countviewallcommunicationresultsex=mysqli_query($conn,$countviewallcommunicationsex);
                    $countnumrowviewallscommunicationsexmale=0;
                    $countnumrowviewallscommunicationsexfemale=0;

                    while($countviewallcommunicationrowsex=mysqli_fetch_array($countviewallcommunicationresultsex)){
                        $countviewallcommunicationmainidsex=$countviewallcommunicationrowsex['id'];
                        
                        $countviewallcommunicationsex1="SELECT * FROM `table2` WHERE sex='Female' and horm='Head' and mainid='$countviewallcommunicationmainidsex'";
                        $countviewallcommunicationresultsex1=mysqli_query($conn,$countviewallcommunicationsex1);

                        while($countviewallcommunicationrowsex1=mysqli_fetch_array($countviewallcommunicationresultsex1)){
                            $countnumrowviewallscommunicationsexfemale++;
                        }

                        $countviewallcommunicationsex2="SELECT * FROM `table2` WHERE sex='Male' and horm='Head'  and mainid='$countviewallcommunicationmainidsex'";
                        $countviewallcommunicationresultsex2=mysqli_query($conn,$countviewallcommunicationsex2);

                        while($countviewallcommunicationrowsex2=mysqli_fetch_array($countviewallcommunicationresultsex2)){
                            $countnumrowviewallscommunicationsexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallscommunicationsexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallscommunicationsexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallscommunication ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Communication</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallcommunication="SELECT * FROM `table1` WHERE communication='$_SESSION[search]' and barangay='$_SESSION[userbarangay]'";
                $queryviewallcommunicationresult=mysqli_query($conn,$queryviewallcommunication);

                while($rowviewallcommunication=mysqli_fetch_array($queryviewallcommunicationresult)){
                $viewallcommunicationid=$rowviewallcommunication['id'];

                $queryviewallcommunication1="SELECT * FROM `table2` WHERE mainid='$viewallcommunicationid' and horm='Head' ORDER BY mainid";
                $queryviewallcommunicationresult1=mysqli_query($conn, $queryviewallcommunication1);

                while($rowviewallcommunication1=mysqli_fetch_array($queryviewallcommunicationresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallcommunication1['mainid'] ?></b></td>
                            <td><?php echo $rowviewallcommunication1['fullname'] ?></td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallcommunication['communication'] ?></td>
                            <td><?php echo $rowviewallcommunication1['sex'] ?></td>
                            <td><?php echo $rowviewallcommunication['purok'] ?></td>
                            <td><?php echo $rowviewallcommunication['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }



    if($_SESSION['viewcondition']==11){ 
        if($_SESSION['search']==""){
         ?>
         <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
         <?php }

         else{
         ?>
         <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
         <?php }

         $countviewalldependency="SELECT * FROM `table2` WHERE dependency='$_SESSION[search]'";
         $countviewalldependencyresult=mysqli_query($conn,$countviewalldependency);
         $countnumrowviewallsdependency=0;

         while($countviewalldependencyrow=mysqli_fetch_array($countviewalldependencyresult)){
             $countviewalldependencymainid=$countviewalldependencyrow['mainid'];

             $countviewalldependency1="SELECT * FROM `table1` WHERE id='$countviewalldependencymainid' and barangay='$_SESSION[userbarangay]' ";
             $countviewalldependencyresult1=mysqli_query($conn,$countviewalldependency1);

             while($countviewalldependencyrow1=mysqli_fetch_array($countviewalldependencyresult1)){
                 $countviewalldependencyid1=$countviewalldependencyrow1['id'];

                 $countviewalldependency2="SELECT * FROM `table2` WHERE id='$countviewalldependencyid1'";
                 $countviewalldependencyresult2=mysqli_query($conn,$countviewalldependency2);
                 $countnumrowviewallsdependency++;
             }                    
         }

         $countviewalldependencysex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
         $countviewalldependencyresultsex=mysqli_query($conn,$countviewalldependencysex);
         $countnumrowviewallsdependencysexmale=0;
         $countnumrowviewallsdependencysexfemale=0;

         while($countviewalldependencyrowsex=mysqli_fetch_array($countviewalldependencyresultsex)){
             $countviewalldependencymainidsex=$countviewalldependencyrowsex['id'];
             
             $countviewalldependencysex1="SELECT * FROM `table2` WHERE dependency='$_SESSION[search]' and sex='Female' and mainid='$countviewalldependencymainidsex'";
             $countviewalldependencyresultsex1=mysqli_query($conn,$countviewalldependencysex1);

             while($countviewalldependencyrowsex1=mysqli_fetch_array($countviewalldependencyresultsex1)){
                 $countnumrowviewallsdependencysexfemale++;
             }

             $countviewalldependencysex2="SELECT * FROM `table2` WHERE dependency='$_SESSION[search]' and sex='Male' and mainid='$countviewalldependencymainidsex'";
             $countviewalldependencyresultsex2=mysqli_query($conn,$countviewalldependencysex2);

             while($countviewalldependencyrowsex2=mysqli_fetch_array($countviewalldependencyresultsex2)){
                 $countnumrowviewallsdependencysexmale++;
             }


         }


         ?>
         <span>
             <p style="margin-bottom:10px;text-align:center;font-size:15px">
             <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsdependencysexmale ?></span>    
             <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsdependencysexfemale ?> </span>
             <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsdependency ?> </span></br>
             </p>
         </span>
         <table>
             <thead>
                 <th>Family ID</th>
                 <th>Name</th>
                 <th style="color:#40AEDE;font-weight:bold">Dependency</th>
                 <th>Sex</th>
                 <th>Purok</th>
                 <th>Barangay</th>
         </thead>
     <?php

     $queryviewalldependency="SELECT * FROM `table2` WHERE dependency='$_SESSION[search]' ORDER BY mainid";
     $queryviewalldependencyresult=mysqli_query($conn,$queryviewalldependency);

     while($rowviewalldependency=mysqli_fetch_array($queryviewalldependencyresult)){
     $viewalldependencyid=$rowviewalldependency['mainid'];
     $viewalldependencyhorm=$rowviewalldependency['horm'];

     $queryviewalldependency1="SELECT * FROM `table1` WHERE id='$viewalldependencyid' and barangay='$_SESSION[userbarangay]'";
     $queryviewalldependencyresult1=mysqli_query($conn, $queryviewalldependency1);

     while($rowviewalldependency1=mysqli_fetch_array($queryviewalldependencyresult1)){ ?>
         <tbody>
             <tr>
                 <td><b><?php echo $rowviewalldependency['mainid'] ?></b></td>
                 <td><?php echo $rowviewalldependency['fullname'] ?> (<?php echo $viewalldependencyhorm ?>)</td>
                 <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewalldependency['dependency'] ?></td>
                 <td><?php echo $rowviewalldependency['sex'] ?></td>
                 <td><?php echo $rowviewalldependency1['purok'] ?></td>
                 <td><?php echo $rowviewalldependency1['barangay'] ?></td>
             </tr>
         </tbody>
     <?php
 } 
}
} 



    if($_SESSION['viewcondition']==12){ 

                    if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }
                    

                        $countviewalldwtwbd1="SELECT * FROM `table1` WHERE dwtwbd='$_SESSION[search]' and barangay='$_SESSION[userbarangay]' ";
                        $countviewalldwtwbdresult1=mysqli_query($conn,$countviewalldwtwbd1);
                        $countnumrowviewallsdwtwbd=0;

                        while($countviewalldwtwbdrow1=mysqli_fetch_array($countviewalldwtwbdresult1)){
                            $countviewalldwtwbdid1=$countviewalldwtwbdrow1['id'];

                            $countviewalldwtwbd2="SELECT * FROM `table2` WHERE mainid='$countviewalldwtwbdid1' and horm='Head'";
                            $countviewalldwtwbdresult2=mysqli_query($conn,$countviewalldwtwbd2);

                            while($countviewalldwtwbdrow1a=mysqli_fetch_array($countviewalldwtwbdresult2)){
                                $countnumrowviewallsdwtwbd++;
                            }
                        }                    

                    $countviewalldwtwbdsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' and dwtwbd='$_SESSION[search]'";
                    $countviewalldwtwbdresultsex=mysqli_query($conn,$countviewalldwtwbdsex);
                    $countnumrowviewallsdwtwbdsexmale=0;
                    $countnumrowviewallsdwtwbdsexfemale=0;

                    while($countviewalldwtwbdrowsex=mysqli_fetch_array($countviewalldwtwbdresultsex)){
                        $countviewalldwtwbdmainidsex=$countviewalldwtwbdrowsex['id'];
                        
                        $countviewalldwtwbdsex1="SELECT * FROM `table2` WHERE sex='Female' and horm='Head' and mainid='$countviewalldwtwbdmainidsex'";
                        $countviewalldwtwbdresultsex1=mysqli_query($conn,$countviewalldwtwbdsex1);

                        while($countviewalldwtwbdrowsex1=mysqli_fetch_array($countviewalldwtwbdresultsex1)){
                            $countnumrowviewallsdwtwbdsexfemale++;
                        }

                        $countviewalldwtwbdsex2="SELECT * FROM `table2` WHERE sex='Male' and horm='Head'  and mainid='$countviewalldwtwbdmainidsex'";
                        $countviewalldwtwbdresultsex2=mysqli_query($conn,$countviewalldwtwbdsex2);

                        while($countviewalldwtwbdrowsex2=mysqli_fetch_array($countviewalldwtwbdresultsex2)){
                            $countnumrowviewallsdwtwbdsexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsdwtwbdsexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsdwtwbdsexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsdwtwbd ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Direct Waste To Water Bodies</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewalldwtwbd="SELECT * FROM `table1` WHERE dwtwbd='$_SESSION[search]' and barangay='$_SESSION[userbarangay]'";
                $queryviewalldwtwbdresult=mysqli_query($conn,$queryviewalldwtwbd);

                while($rowviewalldwtwbd=mysqli_fetch_array($queryviewalldwtwbdresult)){
                $viewalldwtwbdid=$rowviewalldwtwbd['id'];

                $queryviewalldwtwbd1="SELECT * FROM `table2` WHERE mainid='$viewalldwtwbdid' and horm='Head' ORDER BY mainid";
                $queryviewalldwtwbdresult1=mysqli_query($conn, $queryviewalldwtwbd1);

                while($rowviewalldwtwbd1=mysqli_fetch_array($queryviewalldwtwbdresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewalldwtwbd1['mainid'] ?></b></td>
                            <td><?php echo $rowviewalldwtwbd1['fullname'] ?></td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewalldwtwbd['dwtwbd'] ?></td>
                            <td><?php echo $rowviewalldwtwbd1['sex'] ?></td>
                            <td><?php echo $rowviewalldwtwbd['purok'] ?></td>
                            <td><?php echo $rowviewalldwtwbd['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }


       if($_SESSION['viewcondition']==13){ 

                    if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }
                    

                        $countviewallenergysource1="SELECT * FROM `table1` WHERE energysource='$_SESSION[search]' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallenergysourceresult1=mysqli_query($conn,$countviewallenergysource1);
                        $countnumrowviewallsenergysource=0;

                        while($countviewallenergysourcerow1=mysqli_fetch_array($countviewallenergysourceresult1)){
                            $countviewallenergysourceid1=$countviewallenergysourcerow1['id'];

                            $countviewallenergysource2="SELECT * FROM `table2` WHERE mainid='$countviewallenergysourceid1' and horm='Head'";
                            $countviewallenergysourceresult2=mysqli_query($conn,$countviewallenergysource2);

                            while($countviewallenergysourcerow1a=mysqli_fetch_array($countviewallenergysourceresult2)){
                                $countnumrowviewallsenergysource++;
                            }
                        }                    

                    $countviewallenergysourcesex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' and energysource='$_SESSION[search]'";
                    $countviewallenergysourceresultsex=mysqli_query($conn,$countviewallenergysourcesex);
                    $countnumrowviewallsenergysourcesexmale=0;
                    $countnumrowviewallsenergysourcesexfemale=0;

                    while($countviewallenergysourcerowsex=mysqli_fetch_array($countviewallenergysourceresultsex)){
                        $countviewallenergysourcemainidsex=$countviewallenergysourcerowsex['id'];
                        
                        $countviewallenergysourcesex1="SELECT * FROM `table2` WHERE sex='Female' and horm='Head' and mainid='$countviewallenergysourcemainidsex'";
                        $countviewallenergysourceresultsex1=mysqli_query($conn,$countviewallenergysourcesex1);

                        while($countviewallenergysourcerowsex1=mysqli_fetch_array($countviewallenergysourceresultsex1)){
                            $countnumrowviewallsenergysourcesexfemale++;
                        }

                        $countviewallenergysourcesex2="SELECT * FROM `table2` WHERE sex='Male' and horm='Head'  and mainid='$countviewallenergysourcemainidsex'";
                        $countviewallenergysourceresultsex2=mysqli_query($conn,$countviewallenergysourcesex2);

                        while($countviewallenergysourcerowsex2=mysqli_fetch_array($countviewallenergysourceresultsex2)){
                            $countnumrowviewallsenergysourcesexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsenergysourcesexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsenergysourcesexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsenergysource ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Energy Source</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallenergysource="SELECT * FROM `table1` WHERE energysource='$_SESSION[search]' and barangay='$_SESSION[userbarangay]'";
                $queryviewallenergysourceresult=mysqli_query($conn,$queryviewallenergysource);

                while($rowviewallenergysource=mysqli_fetch_array($queryviewallenergysourceresult)){
                $viewallenergysourceid=$rowviewallenergysource['id'];

                $queryviewallenergysource1="SELECT * FROM `table2` WHERE mainid='$viewallenergysourceid' and horm='Head' ORDER BY mainid";
                $queryviewallenergysourceresult1=mysqli_query($conn, $queryviewallenergysource1);

                while($rowviewallenergysource1=mysqli_fetch_array($queryviewallenergysourceresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallenergysource1['mainid'] ?></b></td>
                            <td><?php echo $rowviewallenergysource1['fullname'] ?></td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallenergysource['energysource'] ?></td>
                            <td><?php echo $rowviewallenergysource1['sex'] ?></td>
                            <td><?php echo $rowviewallenergysource['purok'] ?></td>
                            <td><?php echo $rowviewallenergysource['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }


           if($_SESSION['viewcondition']==14){ 

                    if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }
                    

                        $countviewallfamilyplan1="SELECT * FROM `table1` WHERE familyplan='$_SESSION[search]' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallfamilyplanresult1=mysqli_query($conn,$countviewallfamilyplan1);
                        $countnumrowviewallsfamilyplan=0;

                        while($countviewallfamilyplanrow1=mysqli_fetch_array($countviewallfamilyplanresult1)){
                            $countviewallfamilyplanid1=$countviewallfamilyplanrow1['id'];

                            $countviewallfamilyplan2="SELECT * FROM `table2` WHERE mainid='$countviewallfamilyplanid1' and horm='Head'";
                            $countviewallfamilyplanresult2=mysqli_query($conn,$countviewallfamilyplan2);

                        while($countviewallfamilyplanrow1a=mysqli_fetch_array($countviewallfamilyplanresult2)){
                            $countnumrowviewallsfamilyplan++;
                        }
                        }                    

                    $countviewallfamilyplansex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' and familyplan='$_SESSION[search]'";
                    $countviewallfamilyplanresultsex=mysqli_query($conn,$countviewallfamilyplansex);
                    $countnumrowviewallsfamilyplansexmale=0;
                    $countnumrowviewallsfamilyplansexfemale=0;

                    while($countviewallfamilyplanrowsex=mysqli_fetch_array($countviewallfamilyplanresultsex)){
                        $countviewallfamilyplanmainidsex=$countviewallfamilyplanrowsex['id'];
                        
                        $countviewallfamilyplansex1="SELECT * FROM `table2` WHERE sex='Female' and horm='Head' and mainid='$countviewallfamilyplanmainidsex'";
                        $countviewallfamilyplanresultsex1=mysqli_query($conn,$countviewallfamilyplansex1);

                        while($countviewallfamilyplanrowsex1=mysqli_fetch_array($countviewallfamilyplanresultsex1)){
                            $countnumrowviewallsfamilyplansexfemale++;
                        }

                        $countviewallfamilyplansex2="SELECT * FROM `table2` WHERE sex='Male' and horm='Head'  and mainid='$countviewallfamilyplanmainidsex'";
                        $countviewallfamilyplanresultsex2=mysqli_query($conn,$countviewallfamilyplansex2);

                        while($countviewallfamilyplanrowsex2=mysqli_fetch_array($countviewallfamilyplanresultsex2)){
                            $countnumrowviewallsfamilyplansexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsfamilyplansexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsfamilyplansexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsfamilyplan ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Family Planning</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallfamilyplan="SELECT * FROM `table1` WHERE familyplan='$_SESSION[search]' and barangay='$_SESSION[userbarangay]'";
                $queryviewallfamilyplanresult=mysqli_query($conn,$queryviewallfamilyplan);

                while($rowviewallfamilyplan=mysqli_fetch_array($queryviewallfamilyplanresult)){
                $viewallfamilyplanid=$rowviewallfamilyplan['id'];

                $queryviewallfamilyplan1="SELECT * FROM `table2` WHERE mainid='$viewallfamilyplanid' and horm='Head' ORDER BY mainid";
                $queryviewallfamilyplanresult1=mysqli_query($conn, $queryviewallfamilyplan1);

                while($rowviewallfamilyplan1=mysqli_fetch_array($queryviewallfamilyplanresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallfamilyplan1['mainid'] ?></b></td>
                            <td><?php echo $rowviewallfamilyplan1['fullname'] ?></td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallfamilyplan['familyplan'] ?></td>
                            <td><?php echo $rowviewallfamilyplan1['sex'] ?></td>
                            <td><?php echo $rowviewallfamilyplan['purok'] ?></td>
                            <td><?php echo $rowviewallfamilyplan['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }


         if($_SESSION['viewcondition']==15){ 
                   if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }

                    if($_SESSION['search']!=""){
                    $countviewallfname="SELECT * FROM `table2` WHERE fname LIKE '%$_SESSION[search]' OR fname LIKE '%$_SESSION[search]%' OR fname LIKE '$_SESSION[search]%'  ORDER BY mainid";
                    $countviewallfnameresult=mysqli_query($conn,$countviewallfname);
                    $countnumrowviewallsfname=0;

                    while($countviewallfnamerow=mysqli_fetch_array($countviewallfnameresult)){
                        $countviewallfnamemainid=$countviewallfnamerow['mainid'];

                        $countviewallfname1="SELECT * FROM `table1` WHERE id='$countviewallfnamemainid' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallfnameresult1=mysqli_query($conn,$countviewallfname1);

                        while($countviewallfnamerow1=mysqli_fetch_array($countviewallfnameresult1)){
                            $countviewallfnameid1=$countviewallfnamerow1['id'];

                            $countviewallfname2="SELECT * FROM `table2` WHERE id='$countviewallfnameid1'";
                            $countviewallfnameresult2=mysqli_query($conn,$countviewallfname2);
                            $countnumrowviewallsfname++;
                        }                    
                    }
                    

                    $countviewallfnamesex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                    $countviewallfnameresultsex=mysqli_query($conn,$countviewallfnamesex);
                    $countnumrowviewallsfnamesexmale=0;
                    $countnumrowviewallsfnamesexfemale=0;

                    while($countviewallfnamerowsex=mysqli_fetch_array($countviewallfnameresultsex)){
                        $countviewallfnamemainidsex=$countviewallfnamerowsex['id'];
                        
                        $countviewallfnamesex1="SELECT * FROM `table2` WHERE fname LIKE '%$_SESSION[search]' OR fname LIKE '%$_SESSION[search]%' OR fname LIKE '$_SESSION[search]%'";
                        $countviewallfnameresultsex1=mysqli_query($conn,$countviewallfnamesex1);

                        while($countviewallfnamerowsex1=mysqli_fetch_array($countviewallfnameresultsex1)){
                            $countviewallfnameidsex1=$countviewallfnamerowsex1['id'];
                        
                            $countviewallfnamesex2="SELECT * FROM `table2` WHERE id='$countviewallfnameidsex1' and mainid='$countviewallfnamemainidsex' and sex='Female'";
                            $countviewallfnameresultsex2=mysqli_query($conn,$countviewallfnamesex2);

                            while($countviewallfnamerowsex2=mysqli_fetch_array($countviewallfnameresultsex2)){
                                $countnumrowviewallsfnamesexfemale++;
                            }
                        }

                        $countviewallfnamesex3="SELECT * FROM `table2` WHERE fname LIKE '%$_SESSION[search]' OR fname LIKE '%$_SESSION[search]%' OR fname LIKE '$_SESSION[search]%'";
                        $countviewallfnameresultsex3=mysqli_query($conn,$countviewallfnamesex3);

                        while($countviewallfnamerowsex3=mysqli_fetch_array($countviewallfnameresultsex3)){
                            $getviewallfnamesexmainid1=$countviewallfnamerowsex3['id'];
                            
                            $countviewallfnamesex4="SELECT * FROM `table2` WHERE sex='Male' and mainid='$countviewallfnamemainidsex' and id='$getviewallfnamesexmainid1'";
                            $countviewallfnameresultsex4=mysqli_query($conn,$countviewallfnamesex4);

                            while($countviewallfnamerowsex4=mysqli_fetch_array($countviewallfnameresultsex4)){
                                $countnumrowviewallsfnamesexmale++;
                            }
                        }
                    }
                    }

                    else{
                        $countviewallfname="SELECT * FROM `table2` WHERE fname='' ORDER BY mainid";
                        $countviewallfnameresult=mysqli_query($conn,$countviewallfname);
                        $countnumrowviewallsfname=0;
    
                        while($countviewallfnamerow=mysqli_fetch_array($countviewallfnameresult)){
                            $countviewallfnamemainid=$countviewallfnamerow['mainid'];
    
                            $countviewallfname1="SELECT * FROM `table1` WHERE id='$countviewallfnamemainid' and barangay='$_SESSION[userbarangay]' ";
                            $countviewallfnameresult1=mysqli_query($conn,$countviewallfname1);
    
                            while($countviewallfnamerow1=mysqli_fetch_array($countviewallfnameresult1)){
                                $countviewallfnameid1=$countviewallfnamerow1['id'];
    
                                $countviewallfname2="SELECT * FROM `table2` WHERE id='$countviewallfnameid1'";
                                $countviewallfnameresult2=mysqli_query($conn,$countviewallfname2);
                                $countnumrowviewallsfname++;
                            }                    
                        }
                        
    
                        $countviewallfnamesex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                        $countviewallfnameresultsex=mysqli_query($conn,$countviewallfnamesex);
                        $countnumrowviewallsfnamesexmale=0;
                        $countnumrowviewallsfnamesexfemale=0;
    
                        while($countviewallfnamerowsex=mysqli_fetch_array($countviewallfnameresultsex)){
                            $countviewallfnamemainidsex=$countviewallfnamerowsex['id'];
                            
                            $countviewallfnamesex1="SELECT * FROM `table2` WHERE fname='' ";
                            $countviewallfnameresultsex1=mysqli_query($conn,$countviewallfnamesex1);
    
                            while($countviewallfnamerowsex1=mysqli_fetch_array($countviewallfnameresultsex1)){
                                $countviewallfnameidsex1=$countviewallfnamerowsex1['id'];
                            
                                $countviewallfnamesex2="SELECT * FROM `table2` WHERE id='$countviewallfnameidsex1' and mainid='$countviewallfnamemainidsex' and sex='Female'";
                                $countviewallfnameresultsex2=mysqli_query($conn,$countviewallfnamesex2);
    
                                while($countviewallfnamerowsex2=mysqli_fetch_array($countviewallfnameresultsex2)){
                                    $countnumrowviewallsfnamesexfemale++;
                                }
                            }
    
                            $countviewallfnamesex3="SELECT * FROM `table2` WHERE fname='' ";
                            $countviewallfnameresultsex3=mysqli_query($conn,$countviewallfnamesex3);
    
                            while($countviewallfnamerowsex3=mysqli_fetch_array($countviewallfnameresultsex3)){
                                $getviewallfnamesexmainid1=$countviewallfnamerowsex3['id'];
                                
                                $countviewallfnamesex4="SELECT * FROM `table2` WHERE sex='Male' and mainid='$countviewallfnamemainidsex' and id='$getviewallfnamesexmainid1'";
                                $countviewallfnameresultsex4=mysqli_query($conn,$countviewallfnamesex4);
    
                                while($countviewallfnamerowsex4=mysqli_fetch_array($countviewallfnameresultsex4)){
                                    $countnumrowviewallsfnamesexmale++;
                                }
                            }
                        }
                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsfnamesexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsfnamesexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsfname ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th style="color:#40AEDE;font-weight:bold">First Name</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php

                if($_SESSION['search']!=""){
                $queryviewallfname="SELECT * FROM `table2` WHERE fname LIKE '%$_SESSION[search]' OR fname LIKE '%$_SESSION[search]%' OR fname LIKE '$_SESSION[search]%'  ORDER BY mainid";
                $queryviewallfnameresult=mysqli_query($conn,$queryviewallfname);

                while($rowviewallfname=mysqli_fetch_array($queryviewallfnameresult)){
                $viewallfnameid=$rowviewallfname['mainid'];
                $viewallfnamehorm=$rowviewallfname['horm'];

                $queryviewallfname1="SELECT * FROM `table1` WHERE id='$viewallfnameid' and barangay='$_SESSION[userbarangay]'";
                $queryviewallfnameresult1=mysqli_query($conn, $queryviewallfname1);

                while($rowviewallfname1=mysqli_fetch_array($queryviewallfnameresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallfname['mainid'] ?></b></td>
                            <td><span style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallfname['fname'] ?></span> <?php echo $rowviewallfname['fullname'] ?> <?php echo $rowviewallfname['lname'] ?> (<?php echo $viewallfnamehorm ?>)</td>
                            <td><?php echo $rowviewallfname['sex'] ?></td>
                            <td><?php echo $rowviewallfname1['purok'] ?></td>
                            <td><?php echo $rowviewallfname1['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
                } 
            }
        }


            else{

                $queryviewallfname="SELECT * FROM `table2` WHERE fname='' ORDER BY mainid";
                $queryviewallfnameresult=mysqli_query($conn,$queryviewallfname);

                while($rowviewallfname=mysqli_fetch_array($queryviewallfnameresult)){
                $viewallfnameid=$rowviewallfname['mainid'];
                $viewallfnamehorm=$rowviewallfname['horm'];

                $queryviewallfname1="SELECT * FROM `table1` WHERE id='$viewallfnameid' and barangay='$_SESSION[userbarangay]'";
                $queryviewallfnameresult1=mysqli_query($conn, $queryviewallfname1);

                while($rowviewallfname1=mysqli_fetch_array($queryviewallfnameresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallfname['mainid'] ?></b></td>
                            <td><span style="color:#40AEDE;font-weight:bold">No Information</span> (<?php echo $viewallfnamehorm ?>)</td>
                            <td><?php echo $rowviewallfname['sex'] ?></td>
                            <td><?php echo $rowviewallfname1['purok'] ?></td>
                            <td><?php echo $rowviewallfname1['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
                } 
            }

            }
    }  
    
    
           if($_SESSION['viewcondition']==16){ 

                    if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }
                    

                        $countviewallgarbdisposal1="SELECT * FROM `table1` WHERE garbdisposal='$_SESSION[search]' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallgarbdisposalresult1=mysqli_query($conn,$countviewallgarbdisposal1);
                        $countnumrowviewallsgarbdisposal=0;

                        while($countviewallgarbdisposalrow1=mysqli_fetch_array($countviewallgarbdisposalresult1)){
                            $countviewallgarbdisposalid1=$countviewallgarbdisposalrow1['id'];

                            $countviewallgarbdisposal2="SELECT * FROM `table2` WHERE mainid='$countviewallgarbdisposalid1' and horm='Head'";
                            $countviewallgarbdisposalresult2=mysqli_query($conn,$countviewallgarbdisposal2);

                        while($countviewallgarbdisposalrow1a=mysqli_fetch_array($countviewallgarbdisposalresult2)){
                            $countnumrowviewallsgarbdisposal++;
                        }
                        }                    

                    $countviewallgarbdisposalsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' and garbdisposal='$_SESSION[search]'";
                    $countviewallgarbdisposalresultsex=mysqli_query($conn,$countviewallgarbdisposalsex);
                    $countnumrowviewallsgarbdisposalsexmale=0;
                    $countnumrowviewallsgarbdisposalsexfemale=0;

                    while($countviewallgarbdisposalrowsex=mysqli_fetch_array($countviewallgarbdisposalresultsex)){
                        $countviewallgarbdisposalmainidsex=$countviewallgarbdisposalrowsex['id'];
                        
                        $countviewallgarbdisposalsex1="SELECT * FROM `table2` WHERE sex='Female' and horm='Head' and mainid='$countviewallgarbdisposalmainidsex'";
                        $countviewallgarbdisposalresultsex1=mysqli_query($conn,$countviewallgarbdisposalsex1);

                        while($countviewallgarbdisposalrowsex1=mysqli_fetch_array($countviewallgarbdisposalresultsex1)){
                            $countnumrowviewallsgarbdisposalsexfemale++;
                        }

                        $countviewallgarbdisposalsex2="SELECT * FROM `table2` WHERE sex='Male' and horm='Head'  and mainid='$countviewallgarbdisposalmainidsex'";
                        $countviewallgarbdisposalresultsex2=mysqli_query($conn,$countviewallgarbdisposalsex2);

                        while($countviewallgarbdisposalrowsex2=mysqli_fetch_array($countviewallgarbdisposalresultsex2)){
                            $countnumrowviewallsgarbdisposalsexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsgarbdisposalsexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsgarbdisposalsexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsgarbdisposal ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Garbage Disposal</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallgarbdisposal="SELECT * FROM `table1` WHERE garbdisposal='$_SESSION[search]' and barangay='$_SESSION[userbarangay]'";
                $queryviewallgarbdisposalresult=mysqli_query($conn,$queryviewallgarbdisposal);

                while($rowviewallgarbdisposal=mysqli_fetch_array($queryviewallgarbdisposalresult)){
                $viewallgarbdisposalid=$rowviewallgarbdisposal['id'];

                $queryviewallgarbdisposal1="SELECT * FROM `table2` WHERE mainid='$viewallgarbdisposalid' and horm='Head' ORDER BY mainid";
                $queryviewallgarbdisposalresult1=mysqli_query($conn, $queryviewallgarbdisposal1);

                while($rowviewallgarbdisposal1=mysqli_fetch_array($queryviewallgarbdisposalresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallgarbdisposal1['mainid'] ?></b></td>
                            <td><?php echo $rowviewallgarbdisposal1['fullname'] ?></td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallgarbdisposal['garbdisposal'] ?></td>
                            <td><?php echo $rowviewallgarbdisposal1['sex'] ?></td>
                            <td><?php echo $rowviewallgarbdisposal['purok'] ?></td>
                            <td><?php echo $rowviewallgarbdisposal['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }


    if($_SESSION['viewcondition']==17){ 
                   if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }

                    $countviewalleducation="SELECT * FROM `table2` WHERE education='$_SESSION[search]'";
                    $countviewalleducationresult=mysqli_query($conn,$countviewalleducation);
                    $countnumrowviewallseducation=0;

                    while($countviewalleducationrow=mysqli_fetch_array($countviewalleducationresult)){
                        $countviewalleducationmainid=$countviewalleducationrow['mainid'];

                        $countviewalleducation1="SELECT * FROM `table1` WHERE id='$countviewalleducationmainid' and barangay='$_SESSION[userbarangay]' ";
                        $countviewalleducationresult1=mysqli_query($conn,$countviewalleducation1);

                        while($countviewalleducationrow1=mysqli_fetch_array($countviewalleducationresult1)){
                            $countviewalleducationid1=$countviewalleducationrow1['id'];

                            $countviewalleducation2="SELECT * FROM `table2` WHERE id='$countviewalleducationid1'";
                            $countviewalleducationresult2=mysqli_query($conn,$countviewalleducation2);
                            $countnumrowviewallseducation++;
                        }                    
                    }

                    $countviewalleducationsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                    $countviewalleducationresultsex=mysqli_query($conn,$countviewalleducationsex);
                    $countnumrowviewallseducationsexmale=0;
                    $countnumrowviewallseducationsexfemale=0;

                    while($countviewalleducationrowsex=mysqli_fetch_array($countviewalleducationresultsex)){
                        $countviewalleducationmainidsex=$countviewalleducationrowsex['id'];
                        
                        $countviewalleducationsex1="SELECT * FROM `table2` WHERE education='$_SESSION[search]' and sex='Female' and mainid='$countviewalleducationmainidsex'";
                        $countviewalleducationresultsex1=mysqli_query($conn,$countviewalleducationsex1);

                        while($countviewalleducationrowsex1=mysqli_fetch_array($countviewalleducationresultsex1)){
                            $countnumrowviewallseducationsexfemale++;
                        }

                        $countviewalleducationsex2="SELECT * FROM `table2` WHERE education='$_SESSION[search]' and sex='Male' and mainid='$countviewalleducationmainidsex'";
                        $countviewalleducationresultsex2=mysqli_query($conn,$countviewalleducationsex2);

                        while($countviewalleducationrowsex2=mysqli_fetch_array($countviewalleducationresultsex2)){
                            $countnumrowviewallseducationsexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallseducationsexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallseducationsexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallseducation ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Highest Educational Attainment</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewalleducation="SELECT * FROM `table2` WHERE education='$_SESSION[search]' ORDER BY mainid";
                $queryviewalleducationresult=mysqli_query($conn,$queryviewalleducation);

                while($rowviewalleducation=mysqli_fetch_array($queryviewalleducationresult)){
                $viewalleducationid=$rowviewalleducation['mainid'];
                $viewalleducationhorm=$rowviewalleducation['horm'];

                $queryviewalleducation1="SELECT * FROM `table1` WHERE id='$viewalleducationid' and barangay='$_SESSION[userbarangay]'";
                $queryviewalleducationresult1=mysqli_query($conn, $queryviewalleducation1);

                while($rowviewalleducation1=mysqli_fetch_array($queryviewalleducationresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewalleducation['mainid'] ?></b></td>
                            <td><?php echo $rowviewalleducation['fullname'] ?> (<?php echo $viewalleducationhorm ?>)</td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewalleducation['education'] ?></td>
                            <td><?php echo $rowviewalleducation['sex'] ?></td>
                            <td><?php echo $rowviewalleducation1['purok'] ?></td>
                            <td><?php echo $rowviewalleducation1['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }


    if($_SESSION['viewcondition']==18){ 

        if($_SESSION['search']==""){
        ?>
        <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
        <?php }
        
        else{
        ?>
        <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
        <?php }
        
        
            $countviewallhomestat1="SELECT * FROM `table1` WHERE homestat='$_SESSION[search]' and barangay='$_SESSION[userbarangay]' ";
            $countviewallhomestatresult1=mysqli_query($conn,$countviewallhomestat1);
            $countnumrowviewallshomestat=0;
        
            while($countviewallhomestatrow1=mysqli_fetch_array($countviewallhomestatresult1)){
                $countviewallhomestatid1=$countviewallhomestatrow1['id'];
        
                $countviewallhomestat2="SELECT * FROM `table2` WHERE mainid='$countviewallhomestatid1' and horm='Head'";
                $countviewallhomestatresult2=mysqli_query($conn,$countviewallhomestat2);

                while($countviewallhomestatrow1a=mysqli_fetch_array($countviewallhomestatresult2)){
                    $countnumrowviewallshomestat++;
                }
            }                    
        
        $countviewallhomestatsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' and homestat='$_SESSION[search]'";
        $countviewallhomestatresultsex=mysqli_query($conn,$countviewallhomestatsex);
        $countnumrowviewallshomestatsexmale=0;
        $countnumrowviewallshomestatsexfemale=0;
        
        while($countviewallhomestatrowsex=mysqli_fetch_array($countviewallhomestatresultsex)){
            $countviewallhomestatmainidsex=$countviewallhomestatrowsex['id'];
            
            $countviewallhomestatsex1="SELECT * FROM `table2` WHERE sex='Female' and horm='Head' and mainid='$countviewallhomestatmainidsex'";
            $countviewallhomestatresultsex1=mysqli_query($conn,$countviewallhomestatsex1);
        
            while($countviewallhomestatrowsex1=mysqli_fetch_array($countviewallhomestatresultsex1)){
                $countnumrowviewallshomestatsexfemale++;
            }
        
            $countviewallhomestatsex2="SELECT * FROM `table2` WHERE sex='Male' and horm='Head'  and mainid='$countviewallhomestatmainidsex'";
            $countviewallhomestatresultsex2=mysqli_query($conn,$countviewallhomestatsex2);
        
            while($countviewallhomestatrowsex2=mysqli_fetch_array($countviewallhomestatresultsex2)){
                $countnumrowviewallshomestatsexmale++;
            }
        
        
        }
        
        
        ?>
        <span>
            <p style="margin-bottom:10px;text-align:center;font-size:15px">
            <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallshomestatsexmale ?></span>    
            <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallshomestatsexfemale ?> </span>
            <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallshomestat ?> </span></br>
            </p>
        </span>
        <table>
            <thead>
                <th>Family ID</th>
                <th>Name</th>
                <th style="color:#40AEDE;font-weight:bold">Home Status</th>
                <th>Sex</th>
                <th>Purok</th>
                <th>Barangay</th>
        </thead>
        <?php
        
        $queryviewallhomestat="SELECT * FROM `table1` WHERE homestat='$_SESSION[search]' and barangay='$_SESSION[userbarangay]'";
        $queryviewallhomestatresult=mysqli_query($conn,$queryviewallhomestat);
        
        while($rowviewallhomestat=mysqli_fetch_array($queryviewallhomestatresult)){
        $viewallhomestatid=$rowviewallhomestat['id'];
        
        $queryviewallhomestat1="SELECT * FROM `table2` WHERE mainid='$viewallhomestatid' and horm='Head' ORDER BY mainid";
        $queryviewallhomestatresult1=mysqli_query($conn, $queryviewallhomestat1);
        
        while($rowviewallhomestat1=mysqli_fetch_array($queryviewallhomestatresult1)){ ?>
        <tbody>
            <tr>
                <td><b><?php echo $rowviewallhomestat1['mainid'] ?></b></td>
                <td><?php echo $rowviewallhomestat1['fullname'] ?></td>
                <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallhomestat['homestat'] ?></td>
                <td><?php echo $rowviewallhomestat1['sex'] ?></td>
                <td><?php echo $rowviewallhomestat['purok'] ?></td>
                <td><?php echo $rowviewallhomestat['barangay'] ?></td>
            </tr>
        </tbody>
        <?php
        } 
        }
        }


        if($_SESSION['viewcondition']==19){ 

            if($_SESSION['search']==""){
            ?>
            <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
            <?php }

            else{
            ?>
            <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
            <?php }
            

                $countviewallhousestat1="SELECT * FROM `table1` WHERE housestat='$_SESSION[search]' and barangay='$_SESSION[userbarangay]' ";
                $countviewallhousestatresult1=mysqli_query($conn,$countviewallhousestat1);
                $countnumrowviewallshousestat=0;

                while($countviewallhousestatrow1=mysqli_fetch_array($countviewallhousestatresult1)){
                    $countviewallhousestatid1=$countviewallhousestatrow1['id'];

                    $countviewallhousestat2="SELECT * FROM `table2` WHERE mainid='$countviewallhousestatid1' and horm='Head'";
                    $countviewallhousestatresult2=mysqli_query($conn,$countviewallhousestat2);  
                    
                    while($countviewallhousestatrow1a=mysqli_fetch_array($countviewallhousestatresult2)){
                        $countnumrowviewallshousestat++;
                    }
                }                    

            $countviewallhousestatsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' and housestat='$_SESSION[search]'";
            $countviewallhousestatresultsex=mysqli_query($conn,$countviewallhousestatsex);
            $countnumrowviewallshousestatsexmale=0;
            $countnumrowviewallshousestatsexfemale=0;

            while($countviewallhousestatrowsex=mysqli_fetch_array($countviewallhousestatresultsex)){
                $countviewallhousestatmainidsex=$countviewallhousestatrowsex['id'];
                
                $countviewallhousestatsex1="SELECT * FROM `table2` WHERE sex='Female' and horm='Head' and mainid='$countviewallhousestatmainidsex'";
                $countviewallhousestatresultsex1=mysqli_query($conn,$countviewallhousestatsex1);

                while($countviewallhousestatrowsex1=mysqli_fetch_array($countviewallhousestatresultsex1)){
                    $countnumrowviewallshousestatsexfemale++;
                }

                $countviewallhousestatsex2="SELECT * FROM `table2` WHERE sex='Male' and horm='Head'  and mainid='$countviewallhousestatmainidsex'";
                $countviewallhousestatresultsex2=mysqli_query($conn,$countviewallhousestatsex2);

                while($countviewallhousestatrowsex2=mysqli_fetch_array($countviewallhousestatresultsex2)){
                    $countnumrowviewallshousestatsexmale++;
                }


            }


            ?>
            <span>
                <p style="margin-bottom:10px;text-align:center;font-size:15px">
                <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallshousestatsexmale ?></span>    
                <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallshousestatsexfemale ?> </span>
                <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallshousestat ?> </span></br>
                </p>
            </span>
            <table>
                <thead>
                    <th>Family ID</th>
                    <th>Name</th>
                    <th style="color:#40AEDE;font-weight:bold">House Status</th>
                    <th>Sex</th>
                    <th>Purok</th>
                    <th>Barangay</th>
            </thead>
        <?php

        $queryviewallhousestat="SELECT * FROM `table1` WHERE housestat='$_SESSION[search]' and barangay='$_SESSION[userbarangay]'";
        $queryviewallhousestatresult=mysqli_query($conn,$queryviewallhousestat);

        while($rowviewallhousestat=mysqli_fetch_array($queryviewallhousestatresult)){
        $viewallhousestatid=$rowviewallhousestat['id'];

        $queryviewallhousestat1="SELECT * FROM `table2` WHERE mainid='$viewallhousestatid' and horm='Head' ORDER BY mainid";
        $queryviewallhousestatresult1=mysqli_query($conn, $queryviewallhousestat1);

        while($rowviewallhousestat1=mysqli_fetch_array($queryviewallhousestatresult1)){ ?>
            <tbody>
                <tr>
                    <td><b><?php echo $rowviewallhousestat1['mainid'] ?></b></td>
                    <td><?php echo $rowviewallhousestat1['fullname'] ?></td>
                    <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallhousestat['housestat'] ?></td>
                    <td><?php echo $rowviewallhousestat1['sex'] ?></td>
                    <td><?php echo $rowviewallhousestat['purok'] ?></td>
                    <td><?php echo $rowviewallhousestat['barangay'] ?></td>
                </tr>
            </tbody>
        <?php
    } 
}
}

       if($_SESSION['viewcondition']==20){ 

                    if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }
                    

                        $countviewallhousetype1="SELECT * FROM `table1` WHERE housetype='$_SESSION[search]' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallhousetyperesult1=mysqli_query($conn,$countviewallhousetype1);
                        $countnumrowviewallshousetype=0;

                        while($countviewallhousetyperow1=mysqli_fetch_array($countviewallhousetyperesult1)){
                            $countviewallhousetypeid1=$countviewallhousetyperow1['id'];

                            $countviewallhousetype2="SELECT * FROM `table2` WHERE mainid='$countviewallhousetypeid1' and horm='Head'";
                            $countviewallhousetyperesult2=mysqli_query($conn,$countviewallhousetype2);

                            while($countviewallhousetyperow1a=mysqli_fetch_array($countviewallhousetyperesult2)){
                                $countnumrowviewallshousetype++;
                            }
                        }                    

                    $countviewallhousetypesex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' and housetype='$_SESSION[search]'";
                    $countviewallhousetyperesultsex=mysqli_query($conn,$countviewallhousetypesex);
                    $countnumrowviewallshousetypesexmale=0;
                    $countnumrowviewallshousetypesexfemale=0;

                    while($countviewallhousetyperowsex=mysqli_fetch_array($countviewallhousetyperesultsex)){
                        $countviewallhousetypemainidsex=$countviewallhousetyperowsex['id'];
                        
                        $countviewallhousetypesex1="SELECT * FROM `table2` WHERE sex='Female' and horm='Head' and mainid='$countviewallhousetypemainidsex'";
                        $countviewallhousetyperesultsex1=mysqli_query($conn,$countviewallhousetypesex1);

                        while($countviewallhousetyperowsex1=mysqli_fetch_array($countviewallhousetyperesultsex1)){
                            $countnumrowviewallshousetypesexfemale++;
                        }

                        $countviewallhousetypesex2="SELECT * FROM `table2` WHERE sex='Male' and horm='Head'  and mainid='$countviewallhousetypemainidsex'";
                        $countviewallhousetyperesultsex2=mysqli_query($conn,$countviewallhousetypesex2);

                        while($countviewallhousetyperowsex2=mysqli_fetch_array($countviewallhousetyperesultsex2)){
                            $countnumrowviewallshousetypesexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallshousetypesexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallshousetypesexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallshousetype ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">House Type</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallhousetype="SELECT * FROM `table1` WHERE housetype='$_SESSION[search]' and barangay='$_SESSION[userbarangay]'";
                $queryviewallhousetyperesult=mysqli_query($conn,$queryviewallhousetype);

                while($rowviewallhousetype=mysqli_fetch_array($queryviewallhousetyperesult)){
                $viewallhousetypeid=$rowviewallhousetype['id'];

                $queryviewallhousetype1="SELECT * FROM `table2` WHERE mainid='$viewallhousetypeid' and horm='Head' ORDER BY mainid";
                $queryviewallhousetyperesult1=mysqli_query($conn, $queryviewallhousetype1);

                while($rowviewallhousetype1=mysqli_fetch_array($queryviewallhousetyperesult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallhousetype1['mainid'] ?></b></td>
                            <td><?php echo $rowviewallhousetype1['fullname'] ?></td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallhousetype['housetype'] ?></td>
                            <td><?php echo $rowviewallhousetype1['sex'] ?></td>
                            <td><?php echo $rowviewallhousetype['purok'] ?></td>
                            <td><?php echo $rowviewallhousetype['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }



           if($_SESSION['viewcondition']==21){ 

                    if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }
                    

                        $countviewallimmunization1="SELECT * FROM `table1` WHERE immunization='$_SESSION[search]' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallimmunizationresult1=mysqli_query($conn,$countviewallimmunization1);
                        $countnumrowviewallsimmunization=0;

                        while($countviewallimmunizationrow1=mysqli_fetch_array($countviewallimmunizationresult1)){
                            $countviewallimmunizationid1=$countviewallimmunizationrow1['id'];

                            $countviewallimmunization2="SELECT * FROM `table2` WHERE mainid='$countviewallimmunizationid1' and horm='Head'";
                            $countviewallimmunizationresult2=mysqli_query($conn,$countviewallimmunization2);

                            while($countviewallimmunizationrow1a=mysqli_fetch_array($countviewallimmunizationresult2)){
                                $countnumrowviewallsimmunization++;
                            }
                        }                    

                    $countviewallimmunizationsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' and immunization='$_SESSION[search]'";
                    $countviewallimmunizationresultsex=mysqli_query($conn,$countviewallimmunizationsex);
                    $countnumrowviewallsimmunizationsexmale=0;
                    $countnumrowviewallsimmunizationsexfemale=0;

                    while($countviewallimmunizationrowsex=mysqli_fetch_array($countviewallimmunizationresultsex)){
                        $countviewallimmunizationmainidsex=$countviewallimmunizationrowsex['id'];
                        
                        $countviewallimmunizationsex1="SELECT * FROM `table2` WHERE sex='Female' and horm='Head' and mainid='$countviewallimmunizationmainidsex'";
                        $countviewallimmunizationresultsex1=mysqli_query($conn,$countviewallimmunizationsex1);

                        while($countviewallimmunizationrowsex1=mysqli_fetch_array($countviewallimmunizationresultsex1)){
                            $countnumrowviewallsimmunizationsexfemale++;
                        }

                        $countviewallimmunizationsex2="SELECT * FROM `table2` WHERE sex='Male' and horm='Head'  and mainid='$countviewallimmunizationmainidsex'";
                        $countviewallimmunizationresultsex2=mysqli_query($conn,$countviewallimmunizationsex2);

                        while($countviewallimmunizationrowsex2=mysqli_fetch_array($countviewallimmunizationresultsex2)){
                            $countnumrowviewallsimmunizationsexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsimmunizationsexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsimmunizationsexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsimmunization ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Immunization</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallimmunization="SELECT * FROM `table1` WHERE immunization='$_SESSION[search]' and barangay='$_SESSION[userbarangay]'";
                $queryviewallimmunizationresult=mysqli_query($conn,$queryviewallimmunization);

                while($rowviewallimmunization=mysqli_fetch_array($queryviewallimmunizationresult)){
                $viewallimmunizationid=$rowviewallimmunization['id'];

                $queryviewallimmunization1="SELECT * FROM `table2` WHERE mainid='$viewallimmunizationid' and horm='Head' ORDER BY mainid";
                $queryviewallimmunizationresult1=mysqli_query($conn, $queryviewallimmunization1);

                while($rowviewallimmunization1=mysqli_fetch_array($queryviewallimmunizationresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallimmunization1['mainid'] ?></b></td>
                            <td><?php echo $rowviewallimmunization1['fullname'] ?></td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallimmunization['immunization'] ?></td>
                            <td><?php echo $rowviewallimmunization1['sex'] ?></td>
                            <td><?php echo $rowviewallimmunization['purok'] ?></td>
                            <td><?php echo $rowviewallimmunization['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }



    if($_SESSION['viewcondition']==22){ 
                   if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }

                    $countviewallip="SELECT * FROM `table2` WHERE ip='$_SESSION[search]'";
                    $countviewallipresult=mysqli_query($conn,$countviewallip);
                    $countnumrowviewallsip=0;

                    while($countviewalliprow=mysqli_fetch_array($countviewallipresult)){
                        $countviewallipmainid=$countviewalliprow['mainid'];

                        $countviewallip1="SELECT * FROM `table1` WHERE id='$countviewallipmainid' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallipresult1=mysqli_query($conn,$countviewallip1);

                        while($countviewalliprow1=mysqli_fetch_array($countviewallipresult1)){
                            $countviewallipid1=$countviewalliprow1['id'];

                            $countviewallip2="SELECT * FROM `table2` WHERE id='$countviewallipid1'";
                            $countviewallipresult2=mysqli_query($conn,$countviewallip2);
                            $countnumrowviewallsip++;
                        }                    
                    }

                    $countviewallipsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                    $countviewallipresultsex=mysqli_query($conn,$countviewallipsex);
                    $countnumrowviewallsipsexmale=0;
                    $countnumrowviewallsipsexfemale=0;

                    while($countviewalliprowsex=mysqli_fetch_array($countviewallipresultsex)){
                        $countviewallipmainidsex=$countviewalliprowsex['id'];
                        
                        $countviewallipsex1="SELECT * FROM `table2` WHERE ip='$_SESSION[search]' and sex='Female' and mainid='$countviewallipmainidsex'";
                        $countviewallipresultsex1=mysqli_query($conn,$countviewallipsex1);

                        while($countviewalliprowsex1=mysqli_fetch_array($countviewallipresultsex1)){
                            $countnumrowviewallsipsexfemale++;
                        }

                        $countviewallipsex2="SELECT * FROM `table2` WHERE ip='$_SESSION[search]' and sex='Male' and mainid='$countviewallipmainidsex'";
                        $countviewallipresultsex2=mysqli_query($conn,$countviewallipsex2);

                        while($countviewalliprowsex2=mysqli_fetch_array($countviewallipresultsex2)){
                            $countnumrowviewallsipsexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsipsexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsipsexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsip ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">IP</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallip="SELECT * FROM `table2` WHERE ip='$_SESSION[search]' ORDER BY mainid";
                $queryviewallipresult=mysqli_query($conn,$queryviewallip);

                while($rowviewallip=mysqli_fetch_array($queryviewallipresult)){
                $viewallipid=$rowviewallip['mainid'];
                $viewalliphorm=$rowviewallip['horm'];

                $queryviewallip1="SELECT * FROM `table1` WHERE id='$viewallipid' and barangay='$_SESSION[userbarangay]'";
                $queryviewallipresult1=mysqli_query($conn, $queryviewallip1);

                while($rowviewallip1=mysqli_fetch_array($queryviewallipresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallip['mainid'] ?></b></td>
                            <td><?php echo $rowviewallip['fullname'] ?> (<?php echo $viewalliphorm ?>)</td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallip['ip'] ?></td>
                            <td><?php echo $rowviewallip['sex'] ?></td>
                            <td><?php echo $rowviewallip1['purok'] ?></td>
                            <td><?php echo $rowviewallip1['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }


        if($_SESSION['viewcondition']==23){ 
                   if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }

                    if($_SESSION['search']!=""){
                    $countviewalllname="SELECT * FROM `table2` WHERE lname LIKE '%$_SESSION[search]' OR lname LIKE '%$_SESSION[search]%' OR lname LIKE '$_SESSION[search]%'  ORDER BY mainid";
                    $countviewalllnameresult=mysqli_query($conn,$countviewalllname);
                    $countnumrowviewallslname=0;

                    while($countviewalllnamerow=mysqli_fetch_array($countviewalllnameresult)){
                        $countviewalllnamemainid=$countviewalllnamerow['mainid'];

                        $countviewalllname1="SELECT * FROM `table1` WHERE id='$countviewalllnamemainid' and barangay='$_SESSION[userbarangay]' ";
                        $countviewalllnameresult1=mysqli_query($conn,$countviewalllname1);

                        while($countviewalllnamerow1=mysqli_fetch_array($countviewalllnameresult1)){
                            $countviewalllnameid1=$countviewalllnamerow1['id'];

                            $countviewalllname2="SELECT * FROM `table2` WHERE id='$countviewalllnameid1'";
                            $countviewalllnameresult2=mysqli_query($conn,$countviewalllname2);
                            $countnumrowviewallslname++;
                        }                    
                    }
                    

                    $countviewalllnamesex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                    $countviewalllnameresultsex=mysqli_query($conn,$countviewalllnamesex);
                    $countnumrowviewallslnamesexmale=0;
                    $countnumrowviewallslnamesexfemale=0;

                    while($countviewalllnamerowsex=mysqli_fetch_array($countviewalllnameresultsex)){
                        $countviewalllnamemainidsex=$countviewalllnamerowsex['id'];
                        
                        $countviewalllnamesex1="SELECT * FROM `table2` WHERE lname LIKE '%$_SESSION[search]' OR lname LIKE '%$_SESSION[search]%' OR lname LIKE '$_SESSION[search]%'";
                        $countviewalllnameresultsex1=mysqli_query($conn,$countviewalllnamesex1);

                        while($countviewalllnamerowsex1=mysqli_fetch_array($countviewalllnameresultsex1)){
                            $countviewalllnameidsex1=$countviewalllnamerowsex1['id'];
                        
                            $countviewalllnamesex2="SELECT * FROM `table2` WHERE id='$countviewalllnameidsex1' and mainid='$countviewalllnamemainidsex' and sex='Female'";
                            $countviewalllnameresultsex2=mysqli_query($conn,$countviewalllnamesex2);

                            while($countviewalllnamerowsex2=mysqli_fetch_array($countviewalllnameresultsex2)){
                                $countnumrowviewallslnamesexfemale++;
                            }
                        }

                        $countviewalllnamesex3="SELECT * FROM `table2` WHERE lname LIKE '%$_SESSION[search]' OR lname LIKE '%$_SESSION[search]%' OR lname LIKE '$_SESSION[search]%'";
                        $countviewalllnameresultsex3=mysqli_query($conn,$countviewalllnamesex3);

                        while($countviewalllnamerowsex3=mysqli_fetch_array($countviewalllnameresultsex3)){
                            $getviewalllnamesexmainid1=$countviewalllnamerowsex3['id'];
                            
                            $countviewalllnamesex4="SELECT * FROM `table2` WHERE sex='Male' and mainid='$countviewalllnamemainidsex' and id='$getviewalllnamesexmainid1'";
                            $countviewalllnameresultsex4=mysqli_query($conn,$countviewalllnamesex4);

                            while($countviewalllnamerowsex4=mysqli_fetch_array($countviewalllnameresultsex4)){
                                $countnumrowviewallslnamesexmale++;
                            }
                        }
                    }
                    }

                    else{
                        $countviewalllname="SELECT * FROM `table2` WHERE lname='' ORDER BY mainid";
                        $countviewalllnameresult=mysqli_query($conn,$countviewalllname);
                        $countnumrowviewallslname=0;
    
                        while($countviewalllnamerow=mysqli_fetch_array($countviewalllnameresult)){
                            $countviewalllnamemainid=$countviewalllnamerow['mainid'];
    
                            $countviewalllname1="SELECT * FROM `table1` WHERE id='$countviewalllnamemainid' and barangay='$_SESSION[userbarangay]' ";
                            $countviewalllnameresult1=mysqli_query($conn,$countviewalllname1);
    
                            while($countviewalllnamerow1=mysqli_fetch_array($countviewalllnameresult1)){
                                $countviewalllnameid1=$countviewalllnamerow1['id'];
    
                                $countviewalllname2="SELECT * FROM `table2` WHERE id='$countviewalllnameid1'";
                                $countviewalllnameresult2=mysqli_query($conn,$countviewalllname2);
                                $countnumrowviewallslname++;
                            }                    
                        }
                        
    
                        $countviewalllnamesex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                        $countviewalllnameresultsex=mysqli_query($conn,$countviewalllnamesex);
                        $countnumrowviewallslnamesexmale=0;
                        $countnumrowviewallslnamesexfemale=0;
    
                        while($countviewalllnamerowsex=mysqli_fetch_array($countviewalllnameresultsex)){
                            $countviewalllnamemainidsex=$countviewalllnamerowsex['id'];
                            
                            $countviewalllnamesex1="SELECT * FROM `table2` WHERE lname='' ";
                            $countviewalllnameresultsex1=mysqli_query($conn,$countviewalllnamesex1);
    
                            while($countviewalllnamerowsex1=mysqli_fetch_array($countviewalllnameresultsex1)){
                                $countviewalllnameidsex1=$countviewalllnamerowsex1['id'];
                            
                                $countviewalllnamesex2="SELECT * FROM `table2` WHERE id='$countviewalllnameidsex1' and mainid='$countviewalllnamemainidsex' and sex='Female'";
                                $countviewalllnameresultsex2=mysqli_query($conn,$countviewalllnamesex2);
    
                                while($countviewalllnamerowsex2=mysqli_fetch_array($countviewalllnameresultsex2)){
                                    $countnumrowviewallslnamesexfemale++;
                                }
                            }
    
                            $countviewalllnamesex3="SELECT * FROM `table2` WHERE lname='' ";
                            $countviewalllnameresultsex3=mysqli_query($conn,$countviewalllnamesex3);
    
                            while($countviewalllnamerowsex3=mysqli_fetch_array($countviewalllnameresultsex3)){
                                $getviewalllnamesexmainid1=$countviewalllnamerowsex3['id'];
                                
                                $countviewalllnamesex4="SELECT * FROM `table2` WHERE sex='Male' and mainid='$countviewalllnamemainidsex' and id='$getviewalllnamesexmainid1'";
                                $countviewalllnameresultsex4=mysqli_query($conn,$countviewalllnamesex4);
    
                                while($countviewalllnamerowsex4=mysqli_fetch_array($countviewalllnameresultsex4)){
                                    $countnumrowviewallslnamesexmale++;
                                }
                            }
                        }
                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallslnamesexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallslnamesexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallslname ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th style="color:#40AEDE;font-weight:bold">Last Name</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php

                if($_SESSION['search']!=""){
                $queryviewalllname="SELECT * FROM `table2` WHERE lname LIKE '%$_SESSION[search]' OR lname LIKE '%$_SESSION[search]%' OR lname LIKE '$_SESSION[search]%'  ORDER BY mainid";
                $queryviewalllnameresult=mysqli_query($conn,$queryviewalllname);

                while($rowviewalllname=mysqli_fetch_array($queryviewalllnameresult)){
                $viewalllnameid=$rowviewalllname['mainid'];
                $viewalllnamehorm=$rowviewalllname['horm'];

                $queryviewalllname1="SELECT * FROM `table1` WHERE id='$viewalllnameid' and barangay='$_SESSION[userbarangay]'";
                $queryviewalllnameresult1=mysqli_query($conn, $queryviewalllname1);

                while($rowviewalllname1=mysqli_fetch_array($queryviewalllnameresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewalllname['mainid'] ?></b></td>
                            <td ><?php echo $rowviewalllname['fname'] ?> <?php echo $rowviewalllname['mname'] ?> <span style="color:#40AEDE;font-weight:bold"><?php echo $rowviewalllname['lname'] ?></span> (<?php echo $viewalllnamehorm ?>)</td>
                            <td><?php echo $rowviewalllname['sex'] ?></td>
                            <td><?php echo $rowviewalllname1['purok'] ?></td>
                            <td><?php echo $rowviewalllname1['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
                } 
            }
        }


            else{

                $queryviewalllname="SELECT * FROM `table2` WHERE lname='' ORDER BY mainid";
                $queryviewalllnameresult=mysqli_query($conn,$queryviewalllname);

                while($rowviewalllname=mysqli_fetch_array($queryviewalllnameresult)){
                $viewalllnameid=$rowviewalllname['mainid'];
                $viewalllnamehorm=$rowviewalllname['horm'];

                $queryviewalllname1="SELECT * FROM `table1` WHERE id='$viewalllnameid' and barangay='$_SESSION[userbarangay]'";
                $queryviewalllnameresult1=mysqli_query($conn, $queryviewalllname1);

                while($rowviewalllname1=mysqli_fetch_array($queryviewalllnameresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewalllname['mainid'] ?></b></td>
                            <td><span style="color:#40AEDE;font-weight:bold">No Information</span> (<?php echo $viewalllnamehorm ?>)</td>
                            <td><?php echo $rowviewalllname['sex'] ?></td>
                            <td><?php echo $rowviewalllname1['purok'] ?></td>
                            <td><?php echo $rowviewalllname1['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
                } 
            }

            }
    }  


           if($_SESSION['viewcondition']==24){ 

                    if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }
                    

                        $countviewalllivestat1="SELECT * FROM `table1` WHERE livestat='$_SESSION[search]' and barangay='$_SESSION[userbarangay]' ";
                        $countviewalllivestatresult1=mysqli_query($conn,$countviewalllivestat1);
                        $countnumrowviewallslivestat=0;

                        while($countviewalllivestatrow1=mysqli_fetch_array($countviewalllivestatresult1)){
                            $countviewalllivestatid1=$countviewalllivestatrow1['id'];

                            $countviewalllivestat2="SELECT * FROM `table2` WHERE mainid='$countviewalllivestatid1' and horm='Head'";
                            $countviewalllivestatresult2=mysqli_query($conn,$countviewalllivestat2);

                            while($countviewalllivestatrow1a=mysqli_fetch_array($countviewalllivestatresult2)){
                                $countnumrowviewallslivestat++;
                            }
                        }                    

                    $countviewalllivestatsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' and livestat='$_SESSION[search]'";
                    $countviewalllivestatresultsex=mysqli_query($conn,$countviewalllivestatsex);
                    $countnumrowviewallslivestatsexmale=0;
                    $countnumrowviewallslivestatsexfemale=0;

                    while($countviewalllivestatrowsex=mysqli_fetch_array($countviewalllivestatresultsex)){
                        $countviewalllivestatmainidsex=$countviewalllivestatrowsex['id'];
                        
                        $countviewalllivestatsex1="SELECT * FROM `table2` WHERE sex='Female' and horm='Head' and mainid='$countviewalllivestatmainidsex'";
                        $countviewalllivestatresultsex1=mysqli_query($conn,$countviewalllivestatsex1);

                        while($countviewalllivestatrowsex1=mysqli_fetch_array($countviewalllivestatresultsex1)){
                            $countnumrowviewallslivestatsexfemale++;
                        }

                        $countviewalllivestatsex2="SELECT * FROM `table2` WHERE sex='Male' and horm='Head'  and mainid='$countviewalllivestatmainidsex'";
                        $countviewalllivestatresultsex2=mysqli_query($conn,$countviewalllivestatsex2);

                        while($countviewalllivestatrowsex2=mysqli_fetch_array($countviewalllivestatresultsex2)){
                            $countnumrowviewallslivestatsexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallslivestatsexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallslivestatsexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallslivestat ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Livelihood Status</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewalllivestat="SELECT * FROM `table1` WHERE livestat='$_SESSION[search]' and barangay='$_SESSION[userbarangay]'";
                $queryviewalllivestatresult=mysqli_query($conn,$queryviewalllivestat);

                while($rowviewalllivestat=mysqli_fetch_array($queryviewalllivestatresult)){
                $viewalllivestatid=$rowviewalllivestat['id'];

                $queryviewalllivestat1="SELECT * FROM `table2` WHERE mainid='$viewalllivestatid' and horm='Head' ORDER BY mainid";
                $queryviewalllivestatresult1=mysqli_query($conn, $queryviewalllivestat1);

                while($rowviewalllivestat1=mysqli_fetch_array($queryviewalllivestatresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewalllivestat1['mainid'] ?></b></td>
                            <td><?php echo $rowviewalllivestat1['fullname'] ?></td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewalllivestat['livestat'] ?></td>
                            <td><?php echo $rowviewalllivestat1['sex'] ?></td>
                            <td><?php echo $rowviewalllivestat['purok'] ?></td>
                            <td><?php echo $rowviewalllivestat['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }


            if($_SESSION['viewcondition']==25){ 
                   if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }

                    if($_SESSION['search']!=""){
                    $countviewallmname="SELECT * FROM `table2` WHERE mname LIKE '%$_SESSION[search]' OR mname LIKE '%$_SESSION[search]%' OR mname LIKE '$_SESSION[search]%'  ORDER BY mainid";
                    $countviewallmnameresult=mysqli_query($conn,$countviewallmname);
                    $countnumrowviewallsmname=0;

                    while($countviewallmnamerow=mysqli_fetch_array($countviewallmnameresult)){
                        $countviewallmnamemainid=$countviewallmnamerow['mainid'];

                        $countviewallmname1="SELECT * FROM `table1` WHERE id='$countviewallmnamemainid' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallmnameresult1=mysqli_query($conn,$countviewallmname1);

                        while($countviewallmnamerow1=mysqli_fetch_array($countviewallmnameresult1)){
                            $countviewallmnameid1=$countviewallmnamerow1['id'];

                            $countviewallmname2="SELECT * FROM `table2` WHERE id='$countviewallmnameid1'";
                            $countviewallmnameresult2=mysqli_query($conn,$countviewallmname2);
                            $countnumrowviewallsmname++;
                        }                    
                    }
                    

                    $countviewallmnamesex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                    $countviewallmnameresultsex=mysqli_query($conn,$countviewallmnamesex);
                    $countnumrowviewallsmnamesexmale=0;
                    $countnumrowviewallsmnamesexfemale=0;

                    while($countviewallmnamerowsex=mysqli_fetch_array($countviewallmnameresultsex)){
                        $countviewallmnamemainidsex=$countviewallmnamerowsex['id'];
                        
                        $countviewallmnamesex1="SELECT * FROM `table2` WHERE mname LIKE '%$_SESSION[search]' OR mname LIKE '%$_SESSION[search]%' OR mname LIKE '$_SESSION[search]%'";
                        $countviewallmnameresultsex1=mysqli_query($conn,$countviewallmnamesex1);

                        while($countviewallmnamerowsex1=mysqli_fetch_array($countviewallmnameresultsex1)){
                            $countviewallmnameidsex1=$countviewallmnamerowsex1['id'];
                        
                            $countviewallmnamesex2="SELECT * FROM `table2` WHERE id='$countviewallmnameidsex1' and mainid='$countviewallmnamemainidsex' and sex='Female'";
                            $countviewallmnameresultsex2=mysqli_query($conn,$countviewallmnamesex2);

                            while($countviewallmnamerowsex2=mysqli_fetch_array($countviewallmnameresultsex2)){
                                $countnumrowviewallsmnamesexfemale++;
                            }
                        }

                        $countviewallmnamesex3="SELECT * FROM `table2` WHERE mname LIKE '%$_SESSION[search]' OR mname LIKE '%$_SESSION[search]%' OR mname LIKE '$_SESSION[search]%'";
                        $countviewallmnameresultsex3=mysqli_query($conn,$countviewallmnamesex3);

                        while($countviewallmnamerowsex3=mysqli_fetch_array($countviewallmnameresultsex3)){
                            $getviewallmnamesexmainid1=$countviewallmnamerowsex3['id'];
                            
                            $countviewallmnamesex4="SELECT * FROM `table2` WHERE sex='Male' and mainid='$countviewallmnamemainidsex' and id='$getviewallmnamesexmainid1'";
                            $countviewallmnameresultsex4=mysqli_query($conn,$countviewallmnamesex4);

                            while($countviewallmnamerowsex4=mysqli_fetch_array($countviewallmnameresultsex4)){
                                $countnumrowviewallsmnamesexmale++;
                            }
                        }
                    }
                    }

                    else{
                        $countviewallmname="SELECT * FROM `table2` WHERE mname='' ORDER BY mainid";
                        $countviewallmnameresult=mysqli_query($conn,$countviewallmname);
                        $countnumrowviewallsmname=0;
    
                        while($countviewallmnamerow=mysqli_fetch_array($countviewallmnameresult)){
                            $countviewallmnamemainid=$countviewallmnamerow['mainid'];
    
                            $countviewallmname1="SELECT * FROM `table1` WHERE id='$countviewallmnamemainid' and barangay='$_SESSION[userbarangay]' ";
                            $countviewallmnameresult1=mysqli_query($conn,$countviewallmname1);
    
                            while($countviewallmnamerow1=mysqli_fetch_array($countviewallmnameresult1)){
                                $countviewallmnameid1=$countviewallmnamerow1['id'];
    
                                $countviewallmname2="SELECT * FROM `table2` WHERE id='$countviewallmnameid1'";
                                $countviewallmnameresult2=mysqli_query($conn,$countviewallmname2);
                                $countnumrowviewallsmname++;
                            }                    
                        }
                        
    
                        $countviewallmnamesex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                        $countviewallmnameresultsex=mysqli_query($conn,$countviewallmnamesex);
                        $countnumrowviewallsmnamesexmale=0;
                        $countnumrowviewallsmnamesexfemale=0;
    
                        while($countviewallmnamerowsex=mysqli_fetch_array($countviewallmnameresultsex)){
                            $countviewallmnamemainidsex=$countviewallmnamerowsex['id'];
                            
                            $countviewallmnamesex1="SELECT * FROM `table2` WHERE mname='' ";
                            $countviewallmnameresultsex1=mysqli_query($conn,$countviewallmnamesex1);
    
                            while($countviewallmnamerowsex1=mysqli_fetch_array($countviewallmnameresultsex1)){
                                $countviewallmnameidsex1=$countviewallmnamerowsex1['id'];
                            
                                $countviewallmnamesex2="SELECT * FROM `table2` WHERE id='$countviewallmnameidsex1' and mainid='$countviewallmnamemainidsex' and sex='Female'";
                                $countviewallmnameresultsex2=mysqli_query($conn,$countviewallmnamesex2);
    
                                while($countviewallmnamerowsex2=mysqli_fetch_array($countviewallmnameresultsex2)){
                                    $countnumrowviewallsmnamesexfemale++;
                                }
                            }
    
                            $countviewallmnamesex3="SELECT * FROM `table2` WHERE mname='' ";
                            $countviewallmnameresultsex3=mysqli_query($conn,$countviewallmnamesex3);
    
                            while($countviewallmnamerowsex3=mysqli_fetch_array($countviewallmnameresultsex3)){
                                $getviewallmnamesexmainid1=$countviewallmnamerowsex3['id'];
                                
                                $countviewallmnamesex4="SELECT * FROM `table2` WHERE sex='Male' and mainid='$countviewallmnamemainidsex' and id='$getviewallmnamesexmainid1'";
                                $countviewallmnameresultsex4=mysqli_query($conn,$countviewallmnamesex4);
    
                                while($countviewallmnamerowsex4=mysqli_fetch_array($countviewallmnameresultsex4)){
                                    $countnumrowviewallsmnamesexmale++;
                                }
                            }
                        }
                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsmnamesexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsmnamesexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsmname ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th style="color:#40AEDE;font-weight:bold">Middle Name</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php

                if($_SESSION['search']!=""){
                $queryviewallmname="SELECT * FROM `table2` WHERE mname LIKE '%$_SESSION[search]' OR mname LIKE '%$_SESSION[search]%' OR mname LIKE '$_SESSION[search]%'  ORDER BY mainid";
                $queryviewallmnameresult=mysqli_query($conn,$queryviewallmname);

                while($rowviewallmname=mysqli_fetch_array($queryviewallmnameresult)){
                $viewallmnameid=$rowviewallmname['mainid'];
                $viewallmnamehorm=$rowviewallmname['horm'];

                $queryviewallmname1="SELECT * FROM `table1` WHERE id='$viewallmnameid' and barangay='$_SESSION[userbarangay]'";
                $queryviewallmnameresult1=mysqli_query($conn, $queryviewallmname1);

                while($rowviewallmname1=mysqli_fetch_array($queryviewallmnameresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallmname['mainid'] ?></b></td>
                            <td ><?php echo $rowviewallmname['fname'] ?> <span style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallmname['mname'] ?></span> <?php echo $rowviewallmname['lname'] ?> (<?php echo $viewallmnamehorm ?>)</td>
                            <td><?php echo $rowviewallmname['sex'] ?></td>
                            <td><?php echo $rowviewallmname1['purok'] ?></td>
                            <td><?php echo $rowviewallmname1['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
                } 
            }
        }


            else{

                $queryviewallmname="SELECT * FROM `table2` WHERE mname='' ORDER BY mainid";
                $queryviewallmnameresult=mysqli_query($conn,$queryviewallmname);

                while($rowviewallmname=mysqli_fetch_array($queryviewallmnameresult)){
                $viewallmnameid=$rowviewallmname['mainid'];
                $viewallmnamehorm=$rowviewallmname['horm'];

                $queryviewallmname1="SELECT * FROM `table1` WHERE id='$viewallmnameid' and barangay='$_SESSION[userbarangay]'";
                $queryviewallmnameresult1=mysqli_query($conn, $queryviewallmname1);

                while($rowviewallmname1=mysqli_fetch_array($queryviewallmnameresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallmname['mainid'] ?></b></td>
                            <td><span style="color:#40AEDE;font-weight:bold">No Information</span> (<?php echo $viewallmnamehorm ?>)</td>
                            <td><?php echo $rowviewallmname['sex'] ?></td>
                            <td><?php echo $rowviewallmname1['purok'] ?></td>
                            <td><?php echo $rowviewallmname1['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
                } 
            }

            }
    } 


           if($_SESSION['viewcondition']==26){ 

                    if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }
                    

                        $countviewallmothertongue1="SELECT * FROM `table1` WHERE mothertongue='$_SESSION[search]' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallmothertongueresult1=mysqli_query($conn,$countviewallmothertongue1);
                        $countnumrowviewallsmothertongue=0;

                        while($countviewallmothertonguerow1=mysqli_fetch_array($countviewallmothertongueresult1)){
                            $countviewallmothertongueid1=$countviewallmothertonguerow1['id'];

                            $countviewallmothertongue2="SELECT * FROM `table2` WHERE mainid='$countviewallmothertongueid1' and horm='Head'";
                            $countviewallmothertongueresult2=mysqli_query($conn,$countviewallmothertongue2);

                            while($countviewallmothertonguerow1a=mysqli_fetch_array($countviewallmothertongueresult2)){
                                $countnumrowviewallsmothertongue++;
                            }                            
                        }                    

                    $countviewallmothertonguesex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' and mothertongue='$_SESSION[search]'";
                    $countviewallmothertongueresultsex=mysqli_query($conn,$countviewallmothertonguesex);
                    $countnumrowviewallsmothertonguesexmale=0;
                    $countnumrowviewallsmothertonguesexfemale=0;

                    while($countviewallmothertonguerowsex=mysqli_fetch_array($countviewallmothertongueresultsex)){
                        $countviewallmothertonguemainidsex=$countviewallmothertonguerowsex['id'];
                        
                        $countviewallmothertonguesex1="SELECT * FROM `table2` WHERE sex='Female' and horm='Head' and mainid='$countviewallmothertonguemainidsex'";
                        $countviewallmothertongueresultsex1=mysqli_query($conn,$countviewallmothertonguesex1);

                        while($countviewallmothertonguerowsex1=mysqli_fetch_array($countviewallmothertongueresultsex1)){
                            $countnumrowviewallsmothertonguesexfemale++;
                        }

                        $countviewallmothertonguesex2="SELECT * FROM `table2` WHERE sex='Male' and horm='Head'  and mainid='$countviewallmothertonguemainidsex'";
                        $countviewallmothertongueresultsex2=mysqli_query($conn,$countviewallmothertonguesex2);

                        while($countviewallmothertonguerowsex2=mysqli_fetch_array($countviewallmothertongueresultsex2)){
                            $countnumrowviewallsmothertonguesexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsmothertonguesexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsmothertonguesexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsmothertongue ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Mother Tongue</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallmothertongue="SELECT * FROM `table1` WHERE mothertongue='$_SESSION[search]' and barangay='$_SESSION[userbarangay]'";
                $queryviewallmothertongueresult=mysqli_query($conn,$queryviewallmothertongue);

                while($rowviewallmothertongue=mysqli_fetch_array($queryviewallmothertongueresult)){
                $viewallmothertongueid=$rowviewallmothertongue['id'];

                $queryviewallmothertongue1="SELECT * FROM `table2` WHERE mainid='$viewallmothertongueid' and horm='Head' ORDER BY mainid";
                $queryviewallmothertongueresult1=mysqli_query($conn, $queryviewallmothertongue1);

                while($rowviewallmothertongue1=mysqli_fetch_array($queryviewallmothertongueresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallmothertongue1['mainid'] ?></b></td>
                            <td><?php echo $rowviewallmothertongue1['fullname'] ?></td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallmothertongue['mothertongue'] ?></td>
                            <td><?php echo $rowviewallmothertongue1['sex'] ?></td>
                            <td><?php echo $rowviewallmothertongue['purok'] ?></td>
                            <td><?php echo $rowviewallmothertongue['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }


                if($_SESSION['viewcondition']==27){ 
                   if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }

                    if($_SESSION['search']!=""){
                    $countviewallfullname="SELECT * FROM `table2` WHERE fullname LIKE '%$_SESSION[search]' OR fullname LIKE '%$_SESSION[search]%' OR fullname LIKE '$_SESSION[search]%'  ORDER BY mainid";
                    $countviewallfullnameresult=mysqli_query($conn,$countviewallfullname);
                    $countnumrowviewallsfullname=0;

                    while($countviewallfullnamerow=mysqli_fetch_array($countviewallfullnameresult)){
                        $countviewallfullnamemainid=$countviewallfullnamerow['mainid'];

                        $countviewallfullname1="SELECT * FROM `table1` WHERE id='$countviewallfullnamemainid' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallfullnameresult1=mysqli_query($conn,$countviewallfullname1);

                        while($countviewallfullnamerow1=mysqli_fetch_array($countviewallfullnameresult1)){
                            $countviewallfullnameid1=$countviewallfullnamerow1['id'];

                            $countviewallfullname2="SELECT * FROM `table2` WHERE id='$countviewallfullnameid1'";
                            $countviewallfullnameresult2=mysqli_query($conn,$countviewallfullname2);
                            $countnumrowviewallsfullname++;
                        }                    
                    }
                    

                    $countviewallfullnamesex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                    $countviewallfullnameresultsex=mysqli_query($conn,$countviewallfullnamesex);
                    $countnumrowviewallsfullnamesexmale=0;
                    $countnumrowviewallsfullnamesexfemale=0;

                    while($countviewallfullnamerowsex=mysqli_fetch_array($countviewallfullnameresultsex)){
                        $countviewallfullnamemainidsex=$countviewallfullnamerowsex['id'];
                        
                        $countviewallfullnamesex1="SELECT * FROM `table2` WHERE fullname LIKE '%$_SESSION[search]' OR fullname LIKE '%$_SESSION[search]%' OR fullname LIKE '$_SESSION[search]%'";
                        $countviewallfullnameresultsex1=mysqli_query($conn,$countviewallfullnamesex1);

                        while($countviewallfullnamerowsex1=mysqli_fetch_array($countviewallfullnameresultsex1)){
                            $countviewallfullnameidsex1=$countviewallfullnamerowsex1['id'];
                        
                            $countviewallfullnamesex2="SELECT * FROM `table2` WHERE id='$countviewallfullnameidsex1' and mainid='$countviewallfullnamemainidsex' and sex='Female'";
                            $countviewallfullnameresultsex2=mysqli_query($conn,$countviewallfullnamesex2);

                            while($countviewallfullnamerowsex2=mysqli_fetch_array($countviewallfullnameresultsex2)){
                                $countnumrowviewallsfullnamesexfemale++;
                            }
                        }

                        $countviewallfullnamesex3="SELECT * FROM `table2` WHERE fullname LIKE '%$_SESSION[search]' OR fullname LIKE '%$_SESSION[search]%' OR fullname LIKE '$_SESSION[search]%'";
                        $countviewallfullnameresultsex3=mysqli_query($conn,$countviewallfullnamesex3);

                        while($countviewallfullnamerowsex3=mysqli_fetch_array($countviewallfullnameresultsex3)){
                            $getviewallfullnamesexmainid1=$countviewallfullnamerowsex3['id'];
                            
                            $countviewallfullnamesex4="SELECT * FROM `table2` WHERE sex='Male' and mainid='$countviewallfullnamemainidsex' and id='$getviewallfullnamesexmainid1'";
                            $countviewallfullnameresultsex4=mysqli_query($conn,$countviewallfullnamesex4);

                            while($countviewallfullnamerowsex4=mysqli_fetch_array($countviewallfullnameresultsex4)){
                                $countnumrowviewallsfullnamesexmale++;
                            }
                        }
                    }
                    }

                    else{
                        $countviewallfullname="SELECT * FROM `table2` WHERE fullname='' ORDER BY mainid";
                        $countviewallfullnameresult=mysqli_query($conn,$countviewallfullname);
                        $countnumrowviewallsfullname=0;
    
                        while($countviewallfullnamerow=mysqli_fetch_array($countviewallfullnameresult)){
                            $countviewallfullnamemainid=$countviewallfullnamerow['mainid'];
    
                            $countviewallfullname1="SELECT * FROM `table1` WHERE id='$countviewallfullnamemainid' and barangay='$_SESSION[userbarangay]' ";
                            $countviewallfullnameresult1=mysqli_query($conn,$countviewallfullname1);
    
                            while($countviewallfullnamerow1=mysqli_fetch_array($countviewallfullnameresult1)){
                                $countviewallfullnameid1=$countviewallfullnamerow1['id'];
    
                                $countviewallfullname2="SELECT * FROM `table2` WHERE id='$countviewallfullnameid1'";
                                $countviewallfullnameresult2=mysqli_query($conn,$countviewallfullname2);
                                $countnumrowviewallsfullname++;
                            }                    
                        }
                        
    
                        $countviewallfullnamesex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                        $countviewallfullnameresultsex=mysqli_query($conn,$countviewallfullnamesex);
                        $countnumrowviewallsfullnamesexmale=0;
                        $countnumrowviewallsfullnamesexfemale=0;
    
                        while($countviewallfullnamerowsex=mysqli_fetch_array($countviewallfullnameresultsex)){
                            $countviewallfullnamemainidsex=$countviewallfullnamerowsex['id'];
                            
                            $countviewallfullnamesex1="SELECT * FROM `table2` WHERE fullname='' ";
                            $countviewallfullnameresultsex1=mysqli_query($conn,$countviewallfullnamesex1);
    
                            while($countviewallfullnamerowsex1=mysqli_fetch_array($countviewallfullnameresultsex1)){
                                $countviewallfullnameidsex1=$countviewallfullnamerowsex1['id'];
                            
                                $countviewallfullnamesex2="SELECT * FROM `table2` WHERE id='$countviewallfullnameidsex1' and mainid='$countviewallfullnamemainidsex' and sex='Female'";
                                $countviewallfullnameresultsex2=mysqli_query($conn,$countviewallfullnamesex2);
    
                                while($countviewallfullnamerowsex2=mysqli_fetch_array($countviewallfullnameresultsex2)){
                                    $countnumrowviewallsfullnamesexfemale++;
                                }
                            }
    
                            $countviewallfullnamesex3="SELECT * FROM `table2` WHERE fullname='' ";
                            $countviewallfullnameresultsex3=mysqli_query($conn,$countviewallfullnamesex3);
    
                            while($countviewallfullnamerowsex3=mysqli_fetch_array($countviewallfullnameresultsex3)){
                                $getviewallfullnamesexmainid1=$countviewallfullnamerowsex3['id'];
                                
                                $countviewallfullnamesex4="SELECT * FROM `table2` WHERE sex='Male' and mainid='$countviewallfullnamemainidsex' and id='$getviewallfullnamesexmainid1'";
                                $countviewallfullnameresultsex4=mysqli_query($conn,$countviewallfullnamesex4);
    
                                while($countviewallfullnamerowsex4=mysqli_fetch_array($countviewallfullnameresultsex4)){
                                    $countnumrowviewallsfullnamesexmale++;
                                }
                            }
                        }
                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsfullnamesexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsfullnamesexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsfullname ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th style="color:#40AEDE;font-weight:bold">Name</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php

                if($_SESSION['search']!=""){
                $queryviewallfullname="SELECT * FROM `table2` WHERE fullname LIKE '%$_SESSION[search]' OR fullname LIKE '%$_SESSION[search]%' OR fullname LIKE '$_SESSION[search]%'  ORDER BY mainid";
                $queryviewallfullnameresult=mysqli_query($conn,$queryviewallfullname);

                while($rowviewallfullname=mysqli_fetch_array($queryviewallfullnameresult)){
                $viewallfullnameid=$rowviewallfullname['mainid'];
                $viewallfullnamehorm=$rowviewallfullname['horm'];

                $queryviewallfullname1="SELECT * FROM `table1` WHERE id='$viewallfullnameid' and barangay='$_SESSION[userbarangay]'";
                $queryviewallfullnameresult1=mysqli_query($conn, $queryviewallfullname1);

                while($rowviewallfullname1=mysqli_fetch_array($queryviewallfullnameresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallfullname['mainid'] ?></b></td>
                            <td ><span style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallfullname['fullname'] ?></span> (<?php echo $viewallfullnamehorm ?>)</td>
                            <td><?php echo $rowviewallfullname['sex'] ?></td>
                            <td><?php echo $rowviewallfullname1['purok'] ?></td>
                            <td><?php echo $rowviewallfullname1['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
                } 
            }
        }


            else{

                $queryviewallfullname="SELECT * FROM `table2` WHERE fullname='' ORDER BY mainid";
                $queryviewallfullnameresult=mysqli_query($conn,$queryviewallfullname);

                while($rowviewallfullname=mysqli_fetch_array($queryviewallfullnameresult)){
                $viewallfullnameid=$rowviewallfullname['mainid'];
                $viewallfullnamehorm=$rowviewallfullname['horm'];

                $queryviewallfullname1="SELECT * FROM `table1` WHERE id='$viewallfullnameid' and barangay='$_SESSION[userbarangay]'";
                $queryviewallfullnameresult1=mysqli_query($conn, $queryviewallfullname1);

                while($rowviewallfullname1=mysqli_fetch_array($queryviewallfullnameresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallfullname['mainid'] ?></b></td>
                            <td><span style="color:#40AEDE;font-weight:bold">No Information</span> (<?php echo $viewallfullnamehorm ?>)</td>
                            <td><?php echo $rowviewallfullname['sex'] ?></td>
                            <td><?php echo $rowviewallfullname1['purok'] ?></td>
                            <td><?php echo $rowviewallfullname1['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
                } 
            }

            }
    } 


           if($_SESSION['viewcondition']==28){ 

                    if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }
                    

                        $countviewallfamnum1="SELECT * FROM `table1` WHERE famnum='$_SESSION[search]' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallfamnumresult1=mysqli_query($conn,$countviewallfamnum1);
                        $countnumrowviewallsfamnum=0;

                        while($countviewallfamnumrow1=mysqli_fetch_array($countviewallfamnumresult1)){
                            $countviewallfamnumid1=$countviewallfamnumrow1['id'];

                            $countviewallfamnum2="SELECT * FROM `table2` WHERE id='$countviewallfamnumid1'";
                            $countviewallfamnumresult2=mysqli_query($conn,$countviewallfamnum2);
                            $countnumrowviewallsfamnum++;
                        }                    

                    $countviewallfamnumsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' and famnum='$_SESSION[search]'";
                    $countviewallfamnumresultsex=mysqli_query($conn,$countviewallfamnumsex);
                    $countnumrowviewallsfamnumsexmale=0;
                    $countnumrowviewallsfamnumsexfemale=0;

                    while($countviewallfamnumrowsex=mysqli_fetch_array($countviewallfamnumresultsex)){
                        $countviewallfamnummainidsex=$countviewallfamnumrowsex['id'];
                        
                        $countviewallfamnumsex1="SELECT * FROM `table2` WHERE sex='Female' and horm='Head' and mainid='$countviewallfamnummainidsex'";
                        $countviewallfamnumresultsex1=mysqli_query($conn,$countviewallfamnumsex1);

                        while($countviewallfamnumrowsex1=mysqli_fetch_array($countviewallfamnumresultsex1)){
                            $countnumrowviewallsfamnumsexfemale++;
                        }

                        $countviewallfamnumsex2="SELECT * FROM `table2` WHERE sex='Male' and horm='Head'  and mainid='$countviewallfamnummainidsex'";
                        $countviewallfamnumresultsex2=mysqli_query($conn,$countviewallfamnumsex2);

                        while($countviewallfamnumrowsex2=mysqli_fetch_array($countviewallfamnumresultsex2)){
                            $countnumrowviewallsfamnumsexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsfamnumsexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsfamnumsexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsfamnum ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Number of Family Members</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallfamnum="SELECT * FROM `table1` WHERE famnum='$_SESSION[search]' and barangay='$_SESSION[userbarangay]'";
                $queryviewallfamnumresult=mysqli_query($conn,$queryviewallfamnum);

                while($rowviewallfamnum=mysqli_fetch_array($queryviewallfamnumresult)){
                $viewallfamnumid=$rowviewallfamnum['id'];

                $queryviewallfamnum1="SELECT * FROM `table2` WHERE mainid='$viewallfamnumid' and horm='Head' ORDER BY mainid";
                $queryviewallfamnumresult1=mysqli_query($conn, $queryviewallfamnum1);

                while($rowviewallfamnum1=mysqli_fetch_array($queryviewallfamnumresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallfamnum1['mainid'] ?></b></td>
                            <td><?php echo $rowviewallfamnum1['fullname'] ?></td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallfamnum['famnum'] ?></td>
                            <td><?php echo $rowviewallfamnum1['sex'] ?></td>
                            <td><?php echo $rowviewallfamnum['purok'] ?></td>
                            <td><?php echo $rowviewallfamnum['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }

    if($_SESSION['viewcondition']==29){ 
                   if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }

                    $countviewallntp="SELECT * FROM `table2` WHERE ntp='$_SESSION[search]'";
                    $countviewallntpresult=mysqli_query($conn,$countviewallntp);
                    $countnumrowviewallsntp=0;

                    while($countviewallntprow=mysqli_fetch_array($countviewallntpresult)){
                        $countviewallntpmainid=$countviewallntprow['mainid'];

                        $countviewallntp1="SELECT * FROM `table1` WHERE id='$countviewallntpmainid' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallntpresult1=mysqli_query($conn,$countviewallntp1);

                        while($countviewallntprow1=mysqli_fetch_array($countviewallntpresult1)){
                            $countviewallntpid1=$countviewallntprow1['id'];

                            $countviewallntp2="SELECT * FROM `table2` WHERE id='$countviewallntpid1'";
                            $countviewallntpresult2=mysqli_query($conn,$countviewallntp2);
                            $countnumrowviewallsntp++;
                        }                    
                    }

                    $countviewallntpsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                    $countviewallntpresultsex=mysqli_query($conn,$countviewallntpsex);
                    $countnumrowviewallsntpsexmale=0;
                    $countnumrowviewallsntpsexfemale=0;

                    while($countviewallntprowsex=mysqli_fetch_array($countviewallntpresultsex)){
                        $countviewallntpmainidsex=$countviewallntprowsex['id'];
                        
                        $countviewallntpsex1="SELECT * FROM `table2` WHERE ntp='$_SESSION[search]' and sex='Female' and mainid='$countviewallntpmainidsex'";
                        $countviewallntpresultsex1=mysqli_query($conn,$countviewallntpsex1);

                        while($countviewallntprowsex1=mysqli_fetch_array($countviewallntpresultsex1)){
                            $countnumrowviewallsntpsexfemale++;
                        }

                        $countviewallntpsex2="SELECT * FROM `table2` WHERE ntp='$_SESSION[search]' and sex='Male' and mainid='$countviewallntpmainidsex'";
                        $countviewallntpresultsex2=mysqli_query($conn,$countviewallntpsex2);

                        while($countviewallntprowsex2=mysqli_fetch_array($countviewallntpresultsex2)){
                            $countnumrowviewallsntpsexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsntpsexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsntpsexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsntp ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">NTP</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallntp="SELECT * FROM `table2` WHERE ntp='$_SESSION[search]' ORDER BY mainid";
                $queryviewallntpresult=mysqli_query($conn,$queryviewallntp);

                while($rowviewallntp=mysqli_fetch_array($queryviewallntpresult)){
                $viewallntpid=$rowviewallntp['mainid'];

                $queryviewallntp1="SELECT * FROM `table1` WHERE id='$viewallntpid' and barangay='$_SESSION[userbarangay]'";
                $queryviewallntpresult1=mysqli_query($conn, $queryviewallntp1);

                while($rowviewallntp1=mysqli_fetch_array($queryviewallntpresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallntp['mainid'] ?></b></td>
                            <td><?php echo $rowviewallntp['fullname'] ?></td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallntp['ntp'] ?></td>
                            <td><?php echo $rowviewallntp['sex'] ?></td>
                            <td><?php echo $rowviewallntp1['purok'] ?></td>
                            <td><?php echo $rowviewallntp1['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }


    if($_SESSION['viewcondition']==30){ 
                   if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }

                    $countviewalloccupation="SELECT * FROM `table2` WHERE occupation='$_SESSION[search]'";
                    $countviewalloccupationresult=mysqli_query($conn,$countviewalloccupation);
                    $countnumrowviewallsoccupation=0;

                    while($countviewalloccupationrow=mysqli_fetch_array($countviewalloccupationresult)){
                        $countviewalloccupationmainid=$countviewalloccupationrow['mainid'];

                        $countviewalloccupation1="SELECT * FROM `table1` WHERE id='$countviewalloccupationmainid' and barangay='$_SESSION[userbarangay]' ";
                        $countviewalloccupationresult1=mysqli_query($conn,$countviewalloccupation1);

                        while($countviewalloccupationrow1=mysqli_fetch_array($countviewalloccupationresult1)){
                            $countviewalloccupationid1=$countviewalloccupationrow1['id'];

                            $countviewalloccupation2="SELECT * FROM `table2` WHERE id='$countviewalloccupationid1'";
                            $countviewalloccupationresult2=mysqli_query($conn,$countviewalloccupation2);
                            $countnumrowviewallsoccupation++;
                        }                    
                    }

                    $countviewalloccupationsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                    $countviewalloccupationresultsex=mysqli_query($conn,$countviewalloccupationsex);
                    $countnumrowviewallsoccupationsexmale=0;
                    $countnumrowviewallsoccupationsexfemale=0;

                    while($countviewalloccupationrowsex=mysqli_fetch_array($countviewalloccupationresultsex)){
                        $countviewalloccupationmainidsex=$countviewalloccupationrowsex['id'];
                        
                        $countviewalloccupationsex1="SELECT * FROM `table2` WHERE occupation='$_SESSION[search]' and sex='Female' and mainid='$countviewalloccupationmainidsex'";
                        $countviewalloccupationresultsex1=mysqli_query($conn,$countviewalloccupationsex1);

                        while($countviewalloccupationrowsex1=mysqli_fetch_array($countviewalloccupationresultsex1)){
                            $countnumrowviewallsoccupationsexfemale++;
                        }

                        $countviewalloccupationsex2="SELECT * FROM `table2` WHERE occupation='$_SESSION[search]' and sex='Male' and mainid='$countviewalloccupationmainidsex'";
                        $countviewalloccupationresultsex2=mysqli_query($conn,$countviewalloccupationsex2);

                        while($countviewalloccupationrowsex2=mysqli_fetch_array($countviewalloccupationresultsex2)){
                            $countnumrowviewallsoccupationsexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsoccupationsexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsoccupationsexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsoccupation ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Occupation</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewalloccupation="SELECT * FROM `table2` WHERE occupation='$_SESSION[search]' ORDER BY mainid";
                $queryviewalloccupationresult=mysqli_query($conn,$queryviewalloccupation);

                while($rowviewalloccupation=mysqli_fetch_array($queryviewalloccupationresult)){
                $viewalloccupationid=$rowviewalloccupation['mainid'];
                $viewalloccupationhorm=$rowviewalloccupation['horm'];

                $queryviewalloccupation1="SELECT * FROM `table1` WHERE id='$viewalloccupationid' and barangay='$_SESSION[userbarangay]'";
                $queryviewalloccupationresult1=mysqli_query($conn, $queryviewalloccupation1);

                while($rowviewalloccupation1=mysqli_fetch_array($queryviewalloccupationresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewalloccupation['mainid'] ?></b></td>
                            <td><?php echo $rowviewalloccupation['fullname'] ?> (<?php echo $viewalloccupationhorm ?>)</td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewalloccupation['occupation'] ?></td>
                            <td><?php echo $rowviewalloccupation['sex'] ?></td>
                            <td><?php echo $rowviewalloccupation1['purok'] ?></td>
                            <td><?php echo $rowviewalloccupation1['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }


           if($_SESSION['viewcondition']==31){ 

                    if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }
                    

                        $countviewallosoi1="SELECT * FROM `table1` WHERE osoi='$_SESSION[search]' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallosoiresult1=mysqli_query($conn,$countviewallosoi1);
                        $countnumrowviewallsosoi=0;

                        while($countviewallosoirow1=mysqli_fetch_array($countviewallosoiresult1)){
                            $countviewallosoiid1=$countviewallosoirow1['id'];

                            $countviewallosoi2="SELECT * FROM `table2` WHERE mainid='$countviewallosoiid1' and horm='Head'";
                            $countviewallosoiresult2=mysqli_query($conn,$countviewallosoi2);

                            while($countviewallosoirow1a=mysqli_fetch_array($countviewallosoiresult2)){
                                $countnumrowviewallsosoi++;
                            }

                        }                    

                    $countviewallosoisex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' and osoi='$_SESSION[search]'";
                    $countviewallosoiresultsex=mysqli_query($conn,$countviewallosoisex);
                    $countnumrowviewallsosoisexmale=0;
                    $countnumrowviewallsosoisexfemale=0;

                    while($countviewallosoirowsex=mysqli_fetch_array($countviewallosoiresultsex)){
                        $countviewallosoimainidsex=$countviewallosoirowsex['id'];
                        
                        $countviewallosoisex1="SELECT * FROM `table2` WHERE sex='Female' and horm='Head' and mainid='$countviewallosoimainidsex'";
                        $countviewallosoiresultsex1=mysqli_query($conn,$countviewallosoisex1);

                        while($countviewallosoirowsex1=mysqli_fetch_array($countviewallosoiresultsex1)){
                            $countnumrowviewallsosoisexfemale++;
                        }

                        $countviewallosoisex2="SELECT * FROM `table2` WHERE sex='Male' and horm='Head'  and mainid='$countviewallosoimainidsex'";
                        $countviewallosoiresultsex2=mysqli_query($conn,$countviewallosoisex2);

                        while($countviewallosoirowsex2=mysqli_fetch_array($countviewallosoiresultsex2)){
                            $countnumrowviewallsosoisexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsosoisexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsosoisexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsosoi ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Other Source of Income</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallosoi="SELECT * FROM `table1` WHERE osoi='$_SESSION[search]' and barangay='$_SESSION[userbarangay]'";
                $queryviewallosoiresult=mysqli_query($conn,$queryviewallosoi);

                while($rowviewallosoi=mysqli_fetch_array($queryviewallosoiresult)){
                $viewallosoiid=$rowviewallosoi['id'];

                $queryviewallosoi1="SELECT * FROM `table2` WHERE mainid='$viewallosoiid' and horm='Head' ORDER BY mainid";
                $queryviewallosoiresult1=mysqli_query($conn, $queryviewallosoi1);

                while($rowviewallosoi1=mysqli_fetch_array($queryviewallosoiresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallosoi1['mainid'] ?></b></td>
                            <td><?php echo $rowviewallosoi1['fullname'] ?></td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallosoi['osoi'] ?></td>
                            <td><?php echo $rowviewallosoi1['sex'] ?></td>
                            <td><?php echo $rowviewallosoi['purok'] ?></td>
                            <td><?php echo $rowviewallosoi['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }


    if($_SESSION['viewcondition']==32){ 
                   if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }

                    $countviewallphilhealth="SELECT * FROM `table2` WHERE philhealth='$_SESSION[search]'";
                    $countviewallphilhealthresult=mysqli_query($conn,$countviewallphilhealth);
                    $countnumrowviewallsphilhealth=0;

                    while($countviewallphilhealthrow=mysqli_fetch_array($countviewallphilhealthresult)){
                        $countviewallphilhealthmainid=$countviewallphilhealthrow['mainid'];

                        $countviewallphilhealth1="SELECT * FROM `table1` WHERE id='$countviewallphilhealthmainid' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallphilhealthresult1=mysqli_query($conn,$countviewallphilhealth1);

                        while($countviewallphilhealthrow1=mysqli_fetch_array($countviewallphilhealthresult1)){
                            $countviewallphilhealthid1=$countviewallphilhealthrow1['id'];

                            $countviewallphilhealth2="SELECT * FROM `table2` WHERE id='$countviewallphilhealthid1'";
                            $countviewallphilhealthresult2=mysqli_query($conn,$countviewallphilhealth2);
                            $countnumrowviewallsphilhealth++;
                        }                    
                    }

                    $countviewallphilhealthsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                    $countviewallphilhealthresultsex=mysqli_query($conn,$countviewallphilhealthsex);
                    $countnumrowviewallsphilhealthsexmale=0;
                    $countnumrowviewallsphilhealthsexfemale=0;

                    while($countviewallphilhealthrowsex=mysqli_fetch_array($countviewallphilhealthresultsex)){
                        $countviewallphilhealthmainidsex=$countviewallphilhealthrowsex['id'];
                        
                        $countviewallphilhealthsex1="SELECT * FROM `table2` WHERE philhealth='$_SESSION[search]' and sex='Female' and mainid='$countviewallphilhealthmainidsex'";
                        $countviewallphilhealthresultsex1=mysqli_query($conn,$countviewallphilhealthsex1);

                        while($countviewallphilhealthrowsex1=mysqli_fetch_array($countviewallphilhealthresultsex1)){
                            $countnumrowviewallsphilhealthsexfemale++;
                        }

                        $countviewallphilhealthsex2="SELECT * FROM `table2` WHERE philhealth='$_SESSION[search]' and sex='Male' and mainid='$countviewallphilhealthmainidsex'";
                        $countviewallphilhealthresultsex2=mysqli_query($conn,$countviewallphilhealthsex2);

                        while($countviewallphilhealthrowsex2=mysqli_fetch_array($countviewallphilhealthresultsex2)){
                            $countnumrowviewallsphilhealthsexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsphilhealthsexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsphilhealthsexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsphilhealth ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Philhealth</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallphilhealth="SELECT * FROM `table2` WHERE philhealth='$_SESSION[search]' ORDER BY mainid";
                $queryviewallphilhealthresult=mysqli_query($conn,$queryviewallphilhealth);

                while($rowviewallphilhealth=mysqli_fetch_array($queryviewallphilhealthresult)){
                $viewallphilhealthid=$rowviewallphilhealth['mainid'];
                $viewallphilhealthhorm=$rowviewallphilhealth['horm'];

                $queryviewallphilhealth1="SELECT * FROM `table1` WHERE id='$viewallphilhealthid' and barangay='$_SESSION[userbarangay]'";
                $queryviewallphilhealthresult1=mysqli_query($conn, $queryviewallphilhealth1);

                while($rowviewallphilhealth1=mysqli_fetch_array($queryviewallphilhealthresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallphilhealth['mainid'] ?></b></td>
                            <td><?php echo $rowviewallphilhealth['fullname'] ?> (<?php echo $viewallphilhealthhorm ?>)</td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallphilhealth['philhealth'] ?></td>
                            <td><?php echo $rowviewallphilhealth['sex'] ?></td>
                            <td><?php echo $rowviewallphilhealth1['purok'] ?></td>
                            <td><?php echo $rowviewallphilhealth1['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }


           if($_SESSION['viewcondition']==33){ 

                    if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }
                    
                    $countviewallproducttable4="SELECT * FROM `table4` WHERE product='$_SESSION[search]'";
                    $countviewallproducttable4result=mysqli_query($conn , $countviewallproducttable4);
                    $countnumrowviewallsproduct=0;

                    while($countviewallproducttable4row=mysqli_fetch_array($countviewallproducttable4result)){
                        $countviewallproductfarmingid=$countviewallproducttable4row['farmingid'];

                        $countviewallproduct1="SELECT * FROM `table1` WHERE farmingid='$countviewallproductfarmingid' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallproductresult1=mysqli_query($conn,$countviewallproduct1);

                        while($countviewallproductrow1=mysqli_fetch_array($countviewallproductresult1)){
                            $countviewallproductid1=$countviewallproductrow1['id'];

                            $countviewallproduct2="SELECT * FROM `table2` WHERE id='$countviewallproductid1'";
                            $countviewallproductresult2=mysqli_query($conn,$countviewallproduct2);
                            $countnumrowviewallsproduct++;
                        } 
                    }                   

                    $countviewallproduct1table4="SELECT * FROM `table4` WHERE product='$_SESSION[search]'";
                    $countviewallproduct1table4result=mysqli_query($conn , $countviewallproduct1table4);
                    $countnumrowviewallsproductsexmale=0;
                    $countnumrowviewallsproductsexfemale=0;

                    while($countviewallproduct1table4row=mysqli_fetch_array($countviewallproduct1table4result)){
                    $countviewallproductfarmingid1=$countviewallproduct1table4row['farmingid'];

                    $countviewallproductsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' and farmingid='$countviewallproductfarmingid1'";
                    $countviewallproductresultsex=mysqli_query($conn,$countviewallproductsex);
                    
                    while($countviewallproductrowsex=mysqli_fetch_array($countviewallproductresultsex)){
                        $countviewallproductmainidsex=$countviewallproductrowsex['id'];
                        
                        $countviewallproductsex1="SELECT * FROM `table2` WHERE sex='Female' and horm='Head' and mainid='$countviewallproductmainidsex'";
                        $countviewallproductresultsex1=mysqli_query($conn,$countviewallproductsex1);

                        while($countviewallproductrowsex1=mysqli_fetch_array($countviewallproductresultsex1)){
                            $countnumrowviewallsproductsexfemale++;
                        }

                        $countviewallproductsex2="SELECT * FROM `table2` WHERE sex='Male' and horm='Head'  and mainid='$countviewallproductmainidsex'";
                        $countviewallproductresultsex2=mysqli_query($conn,$countviewallproductsex2);

                        while($countviewallproductrowsex2=mysqli_fetch_array($countviewallproductresultsex2)){
                            $countnumrowviewallsproductsexmale++;
                        }


                    }

                }
                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsproductsexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsproductsexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsproduct ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Product</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php

                $queryviewallproducttable4="SELECT * FROM `table4` WHERE product='$_SESSION[search]' ORDER BY farmingid";
                $queryviewallproducttable4result=mysqli_query($conn, $queryviewallproducttable4);

                while($rowviewallproducttable4=mysqli_fetch_array($queryviewallproducttable4result)){
                $viewallproductfarmingid=$rowviewallproducttable4['farmingid'];

                $queryviewallproduct="SELECT * FROM `table1` WHERE farmingid='$viewallproductfarmingid' and barangay='$_SESSION[userbarangay]'";
                $queryviewallproductresult=mysqli_query($conn,$queryviewallproduct);

                while($rowviewallproduct=mysqli_fetch_array($queryviewallproductresult)){
                $viewallproductid=$rowviewallproduct['id'];

                $queryviewallproduct1="SELECT * FROM `table2` WHERE mainid='$viewallproductid' and horm='Head' ORDER BY mainid";
                $queryviewallproductresult1=mysqli_query($conn, $queryviewallproduct1);

                while($rowviewallproduct1=mysqli_fetch_array($queryviewallproductresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallproduct1['mainid'] ?></b></td>
                            <td><?php echo $rowviewallproduct1['fullname'] ?></td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallproducttable4['product'] ?></td>
                            <td><?php echo $rowviewallproduct1['sex'] ?></td>
                            <td><?php echo $rowviewallproduct['purok'] ?></td>
                            <td><?php echo $rowviewallproduct['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }
}


if($_SESSION['viewcondition']==34){ 
                   if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }

                    $countviewallpwd="SELECT * FROM `table2` WHERE pwd='$_SESSION[search]'";
                    $countviewallpwdresult=mysqli_query($conn,$countviewallpwd);
                    $countnumrowviewallspwd=0;

                    while($countviewallpwdrow=mysqli_fetch_array($countviewallpwdresult)){
                        $countviewallpwdmainid=$countviewallpwdrow['mainid'];

                        $countviewallpwd1="SELECT * FROM `table1` WHERE id='$countviewallpwdmainid' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallpwdresult1=mysqli_query($conn,$countviewallpwd1);

                        while($countviewallpwdrow1=mysqli_fetch_array($countviewallpwdresult1)){
                            $countviewallpwdid1=$countviewallpwdrow1['id'];

                            $countviewallpwd2="SELECT * FROM `table2` WHERE id='$countviewallpwdid1'";
                            $countviewallpwdresult2=mysqli_query($conn,$countviewallpwd2);
                            $countnumrowviewallspwd++;
                        }                    
                    }

                    $countviewallpwdsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                    $countviewallpwdresultsex=mysqli_query($conn,$countviewallpwdsex);
                    $countnumrowviewallspwdsexmale=0;
                    $countnumrowviewallspwdsexfemale=0;

                    while($countviewallpwdrowsex=mysqli_fetch_array($countviewallpwdresultsex)){
                        $countviewallpwdmainidsex=$countviewallpwdrowsex['id'];
                        
                        $countviewallpwdsex1="SELECT * FROM `table2` WHERE pwd='$_SESSION[search]' and sex='Female' and mainid='$countviewallpwdmainidsex'";
                        $countviewallpwdresultsex1=mysqli_query($conn,$countviewallpwdsex1);

                        while($countviewallpwdrowsex1=mysqli_fetch_array($countviewallpwdresultsex1)){
                            $countnumrowviewallspwdsexfemale++;
                        }

                        $countviewallpwdsex2="SELECT * FROM `table2` WHERE pwd='$_SESSION[search]' and sex='Male' and mainid='$countviewallpwdmainidsex'";
                        $countviewallpwdresultsex2=mysqli_query($conn,$countviewallpwdsex2);

                        while($countviewallpwdrowsex2=mysqli_fetch_array($countviewallpwdresultsex2)){
                            $countnumrowviewallspwdsexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallspwdsexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallspwdsexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallspwd ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">PWD</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallpwd="SELECT * FROM `table2` WHERE pwd='$_SESSION[search]' ORDER BY mainid";
                $queryviewallpwdresult=mysqli_query($conn,$queryviewallpwd);

                while($rowviewallpwd=mysqli_fetch_array($queryviewallpwdresult)){
                $viewallpwdid=$rowviewallpwd['mainid'];
                $viewallpwdhorm=$rowviewallpwd['horm'];

                $queryviewallpwd1="SELECT * FROM `table1` WHERE id='$viewallpwdid' and barangay='$_SESSION[userbarangay]'";
                $queryviewallpwdresult1=mysqli_query($conn, $queryviewallpwd1);

                while($rowviewallpwd1=mysqli_fetch_array($queryviewallpwdresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallpwd['mainid'] ?></b></td>
                            <td><?php echo $rowviewallpwd['fullname'] ?> (<?php echo $viewallpwdhorm ?>)</td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallpwd['pwd'] ?></td>
                            <td><?php echo $rowviewallpwd['sex'] ?></td>
                            <td><?php echo $rowviewallpwd1['purok'] ?></td>
                            <td><?php echo $rowviewallpwd1['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }


    if($_SESSION['viewcondition']==35){ 
                   if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }

                    $countviewallrelation="SELECT * FROM `table2` WHERE relation='$_SESSION[search]'";
                    $countviewallrelationresult=mysqli_query($conn,$countviewallrelation);
                    $countnumrowviewallsrelation=0;

                    while($countviewallrelationrow=mysqli_fetch_array($countviewallrelationresult)){
                        $countviewallrelationmainid=$countviewallrelationrow['mainid'];

                        $countviewallrelation1="SELECT * FROM `table1` WHERE id='$countviewallrelationmainid' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallrelationresult1=mysqli_query($conn,$countviewallrelation1);

                        while($countviewallrelationrow1=mysqli_fetch_array($countviewallrelationresult1)){
                            $countviewallrelationid1=$countviewallrelationrow1['id'];

                            $countviewallrelation2="SELECT * FROM `table2` WHERE id='$countviewallrelationid1'";
                            $countviewallrelationresult2=mysqli_query($conn,$countviewallrelation2);
                            $countnumrowviewallsrelation++;
                        }                    
                    }

                    $countviewallrelationsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                    $countviewallrelationresultsex=mysqli_query($conn,$countviewallrelationsex);
                    $countnumrowviewallsrelationsexmale=0;
                    $countnumrowviewallsrelationsexfemale=0;

                    while($countviewallrelationrowsex=mysqli_fetch_array($countviewallrelationresultsex)){
                        $countviewallrelationmainidsex=$countviewallrelationrowsex['id'];
                        
                        $countviewallrelationsex1="SELECT * FROM `table2` WHERE relation='$_SESSION[search]' and sex='Female' and mainid='$countviewallrelationmainidsex'";
                        $countviewallrelationresultsex1=mysqli_query($conn,$countviewallrelationsex1);

                        while($countviewallrelationrowsex1=mysqli_fetch_array($countviewallrelationresultsex1)){
                            $countnumrowviewallsrelationsexfemale++;
                        }

                        $countviewallrelationsex2="SELECT * FROM `table2` WHERE relation='$_SESSION[search]' and sex='Male' and mainid='$countviewallrelationmainidsex'";
                        $countviewallrelationresultsex2=mysqli_query($conn,$countviewallrelationsex2);

                        while($countviewallrelationrowsex2=mysqli_fetch_array($countviewallrelationresultsex2)){
                            $countnumrowviewallsrelationsexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsrelationsexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsrelationsexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsrelation ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Relation</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallrelation="SELECT * FROM `table2` WHERE relation='$_SESSION[search]' ORDER BY mainid";
                $queryviewallrelationresult=mysqli_query($conn,$queryviewallrelation);

                while($rowviewallrelation=mysqli_fetch_array($queryviewallrelationresult)){
                $viewallrelationid=$rowviewallrelation['mainid'];
                $viewallrelationhorm=$rowviewallrelation['horm'];

                $queryviewallrelation1="SELECT * FROM `table1` WHERE id='$viewallrelationid' and barangay='$_SESSION[userbarangay]'";
                $queryviewallrelationresult1=mysqli_query($conn, $queryviewallrelation1);

                while($rowviewallrelation1=mysqli_fetch_array($queryviewallrelationresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallrelation['mainid'] ?></b></td>
                            <td><?php echo $rowviewallrelation['fullname'] ?> (<?php echo $viewallrelationhorm ?>)</td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallrelation['relation'] ?></td>
                            <td><?php echo $rowviewallrelation['sex'] ?></td>
                            <td><?php echo $rowviewallrelation1['purok'] ?></td>
                            <td><?php echo $rowviewallrelation1['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }

           if($_SESSION['viewcondition']==36){ 
                   if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }

                    $countviewallreligion="SELECT * FROM `table2` WHERE religion='$_SESSION[search]'";
                    $countviewallreligionresult=mysqli_query($conn,$countviewallreligion);
                    $countnumrowviewallsreligion=0;

                    while($countviewallreligionrow=mysqli_fetch_array($countviewallreligionresult)){
                        $countviewallreligionmainid=$countviewallreligionrow['mainid'];

                        $countviewallreligion1="SELECT * FROM `table1` WHERE id='$countviewallreligionmainid' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallreligionresult1=mysqli_query($conn,$countviewallreligion1);

                        while($countviewallreligionrow1=mysqli_fetch_array($countviewallreligionresult1)){
                            $countviewallreligionid1=$countviewallreligionrow1['id'];

                            $countviewallreligion2="SELECT * FROM `table2` WHERE id='$countviewallreligionid1'";
                            $countviewallreligionresult2=mysqli_query($conn,$countviewallreligion2);
                            $countnumrowviewallsreligion++;
                        }                    
                    }

                    $countviewallreligionsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                    $countviewallreligionresultsex=mysqli_query($conn,$countviewallreligionsex);
                    $countnumrowviewallsreligionsexmale=0;
                    $countnumrowviewallsreligionsexfemale=0;

                    while($countviewallreligionrowsex=mysqli_fetch_array($countviewallreligionresultsex)){
                        $countviewallreligionmainidsex=$countviewallreligionrowsex['id'];
                        
                        $countviewallreligionsex1="SELECT * FROM `table2` WHERE religion='$_SESSION[search]' and sex='Female' and mainid='$countviewallreligionmainidsex'";
                        $countviewallreligionresultsex1=mysqli_query($conn,$countviewallreligionsex1);

                        while($countviewallreligionrowsex1=mysqli_fetch_array($countviewallreligionresultsex1)){
                            $countnumrowviewallsreligionsexfemale++;
                        }

                        $countviewallreligionsex2="SELECT * FROM `table2` WHERE religion='$_SESSION[search]' and sex='Male' and mainid='$countviewallreligionmainidsex'";
                        $countviewallreligionresultsex2=mysqli_query($conn,$countviewallreligionsex2);

                        while($countviewallreligionrowsex2=mysqli_fetch_array($countviewallreligionresultsex2)){
                            $countnumrowviewallsreligionsexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsreligionsexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsreligionsexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsreligion ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Religion</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallreligion="SELECT * FROM `table2` WHERE religion='$_SESSION[search]' ORDER BY mainid";
                $queryviewallreligionresult=mysqli_query($conn,$queryviewallreligion);

                while($rowviewallreligion=mysqli_fetch_array($queryviewallreligionresult)){
                $viewallreligionid=$rowviewallreligion['mainid'];
                $viewallreligionhorm=$rowviewallreligion['horm'];

                $queryviewallreligion1="SELECT * FROM `table1` WHERE id='$viewallreligionid' and barangay='$_SESSION[userbarangay]'";
                $queryviewallreligionresult1=mysqli_query($conn, $queryviewallreligion1);

                while($rowviewallreligion1=mysqli_fetch_array($queryviewallreligionresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallreligion['mainid'] ?></b></td>
                            <td><?php echo $rowviewallreligion['fullname'] ?> (<?php echo $viewallreligionhorm ?>)</td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallreligion['religion'] ?></td>
                            <td><?php echo $rowviewallreligion['sex'] ?></td>
                            <td><?php echo $rowviewallreligion1['purok'] ?></td>
                            <td><?php echo $rowviewallreligion1['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }

               if($_SESSION['viewcondition']==37){ 

                    if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }
                    

                        $countviewallsantoilet1="SELECT * FROM `table1` WHERE santoilet='$_SESSION[search]' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallsantoiletresult1=mysqli_query($conn,$countviewallsantoilet1);
                        $countnumrowviewallssantoilet=0;

                        while($countviewallsantoiletrow1=mysqli_fetch_array($countviewallsantoiletresult1)){
                            $countviewallsantoiletid1=$countviewallsantoiletrow1['id'];

                            $countviewallsantoilet2="SELECT * FROM `table2` WHERE mainid='$countviewallsantoiletid1' and horm='Head'";
                            $countviewallsantoiletresult2=mysqli_query($conn,$countviewallsantoilet2);

                            while($countviewallsantoiletrow1a=mysqli_fetch_array($countviewallsantoiletresult2)){
                                $countnumrowviewallssantoilet++;
                            }
                        }                    

                    $countviewallsantoiletsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' and santoilet='$_SESSION[search]'";
                    $countviewallsantoiletresultsex=mysqli_query($conn,$countviewallsantoiletsex);
                    $countnumrowviewallssantoiletsexmale=0;
                    $countnumrowviewallssantoiletsexfemale=0;

                    while($countviewallsantoiletrowsex=mysqli_fetch_array($countviewallsantoiletresultsex)){
                        $countviewallsantoiletmainidsex=$countviewallsantoiletrowsex['id'];
                        
                        $countviewallsantoiletsex1="SELECT * FROM `table2` WHERE sex='Female' and horm='Head' and mainid='$countviewallsantoiletmainidsex'";
                        $countviewallsantoiletresultsex1=mysqli_query($conn,$countviewallsantoiletsex1);

                        while($countviewallsantoiletrowsex1=mysqli_fetch_array($countviewallsantoiletresultsex1)){
                            $countnumrowviewallssantoiletsexfemale++;
                        }

                        $countviewallsantoiletsex2="SELECT * FROM `table2` WHERE sex='Male' and horm='Head'  and mainid='$countviewallsantoiletmainidsex'";
                        $countviewallsantoiletresultsex2=mysqli_query($conn,$countviewallsantoiletsex2);

                        while($countviewallsantoiletrowsex2=mysqli_fetch_array($countviewallsantoiletresultsex2)){
                            $countnumrowviewallssantoiletsexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallssantoiletsexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallssantoiletsexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallssantoilet ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Sanitary Toilet</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallsantoilet="SELECT * FROM `table1` WHERE santoilet='$_SESSION[search]' and barangay='$_SESSION[userbarangay]'";
                $queryviewallsantoiletresult=mysqli_query($conn,$queryviewallsantoilet);

                while($rowviewallsantoilet=mysqli_fetch_array($queryviewallsantoiletresult)){
                $viewallsantoiletid=$rowviewallsantoilet['id'];

                $queryviewallsantoilet1="SELECT * FROM `table2` WHERE mainid='$viewallsantoiletid' and horm='Head' ORDER BY mainid";
                $queryviewallsantoiletresult1=mysqli_query($conn, $queryviewallsantoilet1);

                while($rowviewallsantoilet1=mysqli_fetch_array($queryviewallsantoiletresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallsantoilet1['mainid'] ?></b></td>
                            <td><?php echo $rowviewallsantoilet1['fullname'] ?></td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallsantoilet['santoilet'] ?></td>
                            <td><?php echo $rowviewallsantoilet1['sex'] ?></td>
                            <td><?php echo $rowviewallsantoilet['purok'] ?></td>
                            <td><?php echo $rowviewallsantoilet['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }


    if($_SESSION['viewcondition']==38){ 
                   if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }

                    $countviewallsex="SELECT * FROM `table2` WHERE sex='$_SESSION[search]'";
                    $countviewallsexresult=mysqli_query($conn,$countviewallsex);
                    $countnumrowviewallssex=0;

                    while($countviewallsexrow=mysqli_fetch_array($countviewallsexresult)){
                        $countviewallsexmainid=$countviewallsexrow['mainid'];

                        $countviewallsex1="SELECT * FROM `table1` WHERE id='$countviewallsexmainid' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallsexresult1=mysqli_query($conn,$countviewallsex1);

                        while($countviewallsexrow1=mysqli_fetch_array($countviewallsexresult1)){
                            $countviewallsexid1=$countviewallsexrow1['id'];

                            $countviewallsex2="SELECT * FROM `table2` WHERE id='$countviewallsexid1'";
                            $countviewallsexresult2=mysqli_query($conn,$countviewallsex2);
                            $countnumrowviewallssex++;
                        }                    
                    }

                    $countviewallsexsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                    $countviewallsexresultsex=mysqli_query($conn,$countviewallsexsex);
                    $countnumrowviewallssexsexmale=0;
                    $countnumrowviewallssexsexfemale=0;

                    while($countviewallsexrowsex=mysqli_fetch_array($countviewallsexresultsex)){
                        $countviewallsexmainidsex=$countviewallsexrowsex['id'];
                        
                        $countviewallsexsex1="SELECT * FROM `table2` WHERE sex='$_SESSION[search]' and sex='Female' and mainid='$countviewallsexmainidsex'";
                        $countviewallsexresultsex1=mysqli_query($conn,$countviewallsexsex1);

                        while($countviewallsexrowsex1=mysqli_fetch_array($countviewallsexresultsex1)){
                            $countnumrowviewallssexsexfemale++;
                        }

                        $countviewallsexsex2="SELECT * FROM `table2` WHERE sex='$_SESSION[search]' and sex='Male' and mainid='$countviewallsexmainidsex'";
                        $countviewallsexresultsex2=mysqli_query($conn,$countviewallsexsex2);

                        while($countviewallsexrowsex2=mysqli_fetch_array($countviewallsexresultsex2)){
                            $countnumrowviewallssexsexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallssexsexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallssexsexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallssex ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallsex="SELECT * FROM `table2` WHERE sex='$_SESSION[search]' ORDER BY mainid";
                $queryviewallsexresult=mysqli_query($conn,$queryviewallsex);

                while($rowviewallsex=mysqli_fetch_array($queryviewallsexresult)){
                $viewallsexid=$rowviewallsex['mainid'];
                $viewallsexhorm=$rowviewallsex['horm'];

                $queryviewallsex1="SELECT * FROM `table1` WHERE id='$viewallsexid' and barangay='$_SESSION[userbarangay]'";
                $queryviewallsexresult1=mysqli_query($conn, $queryviewallsex1);

                while($rowviewallsex1=mysqli_fetch_array($queryviewallsexresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallsex['mainid'] ?></b></td>
                            <td><?php echo $rowviewallsex['fullname'] ?> (<?php echo $viewallsexhorm ?>)</td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallsex['sex'] ?></td>
                            <td><?php echo $rowviewallsex1['purok'] ?></td>
                            <td><?php echo $rowviewallsex1['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }

    if($_SESSION['viewcondition']==39){ 
                   if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }

                    $countviewallsmooking="SELECT * FROM `table2` WHERE smooking='$_SESSION[search]'";
                    $countviewallsmookingresult=mysqli_query($conn,$countviewallsmooking);
                    $countnumrowviewallssmooking=0;

                    while($countviewallsmookingrow=mysqli_fetch_array($countviewallsmookingresult)){
                        $countviewallsmookingmainid=$countviewallsmookingrow['mainid'];

                        $countviewallsmooking1="SELECT * FROM `table1` WHERE id='$countviewallsmookingmainid' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallsmookingresult1=mysqli_query($conn,$countviewallsmooking1);

                        while($countviewallsmookingrow1=mysqli_fetch_array($countviewallsmookingresult1)){
                            $countviewallsmookingid1=$countviewallsmookingrow1['id'];

                            $countviewallsmooking2="SELECT * FROM `table2` WHERE id='$countviewallsmookingid1'";
                            $countviewallsmookingresult2=mysqli_query($conn,$countviewallsmooking2);
                            $countnumrowviewallssmooking++;
                        }                    
                    }

                    $countviewallsmookingsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                    $countviewallsmookingresultsex=mysqli_query($conn,$countviewallsmookingsex);
                    $countnumrowviewallssmookingsexmale=0;
                    $countnumrowviewallssmookingsexfemale=0;

                    while($countviewallsmookingrowsex=mysqli_fetch_array($countviewallsmookingresultsex)){
                        $countviewallsmookingmainidsex=$countviewallsmookingrowsex['id'];
                        
                        $countviewallsmookingsex1="SELECT * FROM `table2` WHERE smooking='$_SESSION[search]' and sex='Female' and mainid='$countviewallsmookingmainidsex'";
                        $countviewallsmookingresultsex1=mysqli_query($conn,$countviewallsmookingsex1);

                        while($countviewallsmookingrowsex1=mysqli_fetch_array($countviewallsmookingresultsex1)){
                            $countnumrowviewallssmookingsexfemale++;
                        }

                        $countviewallsmookingsex2="SELECT * FROM `table2` WHERE smooking='$_SESSION[search]' and sex='Male' and mainid='$countviewallsmookingmainidsex'";
                        $countviewallsmookingresultsex2=mysqli_query($conn,$countviewallsmookingsex2);

                        while($countviewallsmookingrowsex2=mysqli_fetch_array($countviewallsmookingresultsex2)){
                            $countnumrowviewallssmookingsexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallssmookingsexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallssmookingsexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallssmooking ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Smooking</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallsmooking="SELECT * FROM `table2` WHERE smooking='$_SESSION[search]' ORDER BY mainid";
                $queryviewallsmookingresult=mysqli_query($conn,$queryviewallsmooking);

                while($rowviewallsmooking=mysqli_fetch_array($queryviewallsmookingresult)){
                $viewallsmookingid=$rowviewallsmooking['mainid'];
                $viewallsmookinghorm=$rowviewallsmooking['horm'];

                $queryviewallsmooking1="SELECT * FROM `table1` WHERE id='$viewallsmookingid' and barangay='$_SESSION[userbarangay]'";
                $queryviewallsmookingresult1=mysqli_query($conn, $queryviewallsmooking1);

                while($rowviewallsmooking1=mysqli_fetch_array($queryviewallsmookingresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallsmooking['mainid'] ?></b></td>
                            <td><?php echo $rowviewallsmooking['fullname'] ?> (<?php echo $viewallsmookinghorm ?>)</td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallsmooking['smooking'] ?></td>
                            <td><?php echo $rowviewallsmooking['sex'] ?></td>
                            <td><?php echo $rowviewallsmooking1['purok'] ?></td>
                            <td><?php echo $rowviewallsmooking1['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }

               if($_SESSION['viewcondition']==40){ 

                    if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }
                    

                        $countviewalltransportation1="SELECT * FROM `table1` WHERE transportation='$_SESSION[search]' and barangay='$_SESSION[userbarangay]' ";
                        $countviewalltransportationresult1=mysqli_query($conn,$countviewalltransportation1);
                        $countnumrowviewallstransportation=0;

                        while($countviewalltransportationrow1=mysqli_fetch_array($countviewalltransportationresult1)){
                            $countviewalltransportationid1=$countviewalltransportationrow1['id'];

                            $countviewalltransportation2="SELECT * FROM `table2` WHERE mainid='$countviewalltransportationid1' and horm='Head'";
                            $countviewalltransportationresult2=mysqli_query($conn,$countviewalltransportation2);

                            while($countviewalltransportationrow1a=mysqli_fetch_array($countviewalltransportationresult2)){
                                $countnumrowviewallstransportation++;
                            }
                        }                    

                    $countviewalltransportationsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' and transportation='$_SESSION[search]'";
                    $countviewalltransportationresultsex=mysqli_query($conn,$countviewalltransportationsex);
                    $countnumrowviewallstransportationsexmale=0;
                    $countnumrowviewallstransportationsexfemale=0;

                    while($countviewalltransportationrowsex=mysqli_fetch_array($countviewalltransportationresultsex)){
                        $countviewalltransportationmainidsex=$countviewalltransportationrowsex['id'];
                        
                        $countviewalltransportationsex1="SELECT * FROM `table2` WHERE sex='Female' and horm='Head' and mainid='$countviewalltransportationmainidsex'";
                        $countviewalltransportationresultsex1=mysqli_query($conn,$countviewalltransportationsex1);

                        while($countviewalltransportationrowsex1=mysqli_fetch_array($countviewalltransportationresultsex1)){
                            $countnumrowviewallstransportationsexfemale++;
                        }

                        $countviewalltransportationsex2="SELECT * FROM `table2` WHERE sex='Male' and horm='Head'  and mainid='$countviewalltransportationmainidsex'";
                        $countviewalltransportationresultsex2=mysqli_query($conn,$countviewalltransportationsex2);

                        while($countviewalltransportationrowsex2=mysqli_fetch_array($countviewalltransportationresultsex2)){
                            $countnumrowviewallstransportationsexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallstransportationsexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallstransportationsexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallstransportation ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Transportation</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewalltransportation="SELECT * FROM `table1` WHERE transportation='$_SESSION[search]' and barangay='$_SESSION[userbarangay]'";
                $queryviewalltransportationresult=mysqli_query($conn,$queryviewalltransportation);

                while($rowviewalltransportation=mysqli_fetch_array($queryviewalltransportationresult)){
                $viewalltransportationid=$rowviewalltransportation['id'];

                $queryviewalltransportation1="SELECT * FROM `table2` WHERE mainid='$viewalltransportationid' and horm='Head' ORDER BY mainid";
                $queryviewalltransportationresult1=mysqli_query($conn, $queryviewalltransportation1);

                while($rowviewalltransportation1=mysqli_fetch_array($queryviewalltransportationresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewalltransportation1['mainid'] ?></b></td>
                            <td><?php echo $rowviewalltransportation1['fullname'] ?></td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewalltransportation['transportation'] ?></td>
                            <td><?php echo $rowviewalltransportation1['sex'] ?></td>
                            <td><?php echo $rowviewalltransportation['purok'] ?></td>
                            <td><?php echo $rowviewalltransportation['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }


    if($_SESSION['viewcondition']==41){ 
                   if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }

                    $countviewalltribe="SELECT * FROM `table2` WHERE tribe='$_SESSION[search]'";
                    $countviewalltriberesult=mysqli_query($conn,$countviewalltribe);
                    $countnumrowviewallstribe=0;

                    while($countviewalltriberow=mysqli_fetch_array($countviewalltriberesult)){
                        $countviewalltribemainid=$countviewalltriberow['mainid'];

                        $countviewalltribe1="SELECT * FROM `table1` WHERE id='$countviewalltribemainid' and barangay='$_SESSION[userbarangay]' ";
                        $countviewalltriberesult1=mysqli_query($conn,$countviewalltribe1);

                        while($countviewalltriberow1=mysqli_fetch_array($countviewalltriberesult1)){
                            $countviewalltribeid1=$countviewalltriberow1['id'];

                            $countviewalltribe2="SELECT * FROM `table2` WHERE id='$countviewalltribeid1'";
                            $countviewalltriberesult2=mysqli_query($conn,$countviewalltribe2);
                            $countnumrowviewallstribe++;
                        }                    
                    }

                    $countviewalltribesex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                    $countviewalltriberesultsex=mysqli_query($conn,$countviewalltribesex);
                    $countnumrowviewallstribesexmale=0;
                    $countnumrowviewallstribesexfemale=0;

                    while($countviewalltriberowsex=mysqli_fetch_array($countviewalltriberesultsex)){
                        $countviewalltribemainidsex=$countviewalltriberowsex['id'];
                        
                        $countviewalltribesex1="SELECT * FROM `table2` WHERE tribe='$_SESSION[search]' and sex='Female' and mainid='$countviewalltribemainidsex'";
                        $countviewalltriberesultsex1=mysqli_query($conn,$countviewalltribesex1);

                        while($countviewalltriberowsex1=mysqli_fetch_array($countviewalltriberesultsex1)){
                            $countnumrowviewallstribesexfemale++;
                        }

                        $countviewalltribesex2="SELECT * FROM `table2` WHERE tribe='$_SESSION[search]' and sex='Male' and mainid='$countviewalltribemainidsex'";
                        $countviewalltriberesultsex2=mysqli_query($conn,$countviewalltribesex2);

                        while($countviewalltriberowsex2=mysqli_fetch_array($countviewalltriberesultsex2)){
                            $countnumrowviewallstribesexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallstribesexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallstribesexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallstribe ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Tribe</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewalltribe="SELECT * FROM `table2` WHERE tribe='$_SESSION[search]' ORDER BY mainid";
                $queryviewalltriberesult=mysqli_query($conn,$queryviewalltribe);

                while($rowviewalltribe=mysqli_fetch_array($queryviewalltriberesult)){
                $viewalltribeid=$rowviewalltribe['mainid'];
                $viewalltribehorm=$rowviewalltribe['horm'];

                $queryviewalltribe1="SELECT * FROM `table1` WHERE id='$viewalltribeid' and barangay='$_SESSION[userbarangay]'";
                $queryviewalltriberesult1=mysqli_query($conn, $queryviewalltribe1);

                while($rowviewalltribe1=mysqli_fetch_array($queryviewalltriberesult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewalltribe['mainid'] ?></b></td>
                            <td><?php echo $rowviewalltribe['fullname'] ?> (<?php echo $viewalltribehorm ?>)</td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewalltribe['tribe'] ?></td>
                            <td><?php echo $rowviewalltribe['sex'] ?></td>
                            <td><?php echo $rowviewalltribe1['purok'] ?></td>
                            <td><?php echo $rowviewalltribe1['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }

               if($_SESSION['viewcondition']==42){ 

                    if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }
                    

                        $countviewallvulstat1="SELECT * FROM `table1` WHERE vulstat='$_SESSION[search]' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallvulstatresult1=mysqli_query($conn,$countviewallvulstat1);
                        $countnumrowviewallsvulstat=0;

                        while($countviewallvulstatrow1=mysqli_fetch_array($countviewallvulstatresult1)){
                            $countviewallvulstatid1=$countviewallvulstatrow1['id'];

                            $countviewallvulstat2="SELECT * FROM `table2` WHERE mainid='$countviewallvulstatid1' and horm='Head'";
                            $countviewallvulstatresult2=mysqli_query($conn,$countviewallvulstat2);

                            while($countviewallvulstatrow1a=mysqli_fetch_array($countviewallvulstatresult2)){
                                $countnumrowviewallsvulstat++;
                            }
                        }                    

                    $countviewallvulstatsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' and vulstat='$_SESSION[search]'";
                    $countviewallvulstatresultsex=mysqli_query($conn,$countviewallvulstatsex);
                    $countnumrowviewallsvulstatsexmale=0;
                    $countnumrowviewallsvulstatsexfemale=0;

                    while($countviewallvulstatrowsex=mysqli_fetch_array($countviewallvulstatresultsex)){
                        $countviewallvulstatmainidsex=$countviewallvulstatrowsex['id'];
                        
                        $countviewallvulstatsex1="SELECT * FROM `table2` WHERE sex='Female' and horm='Head' and mainid='$countviewallvulstatmainidsex'";
                        $countviewallvulstatresultsex1=mysqli_query($conn,$countviewallvulstatsex1);

                        while($countviewallvulstatrowsex1=mysqli_fetch_array($countviewallvulstatresultsex1)){
                            $countnumrowviewallsvulstatsexfemale++;
                        }

                        $countviewallvulstatsex2="SELECT * FROM `table2` WHERE sex='Male' and horm='Head'  and mainid='$countviewallvulstatmainidsex'";
                        $countviewallvulstatresultsex2=mysqli_query($conn,$countviewallvulstatsex2);

                        while($countviewallvulstatrowsex2=mysqli_fetch_array($countviewallvulstatresultsex2)){
                            $countnumrowviewallsvulstatsexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsvulstatsexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsvulstatsexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsvulstat ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Vulnerable Status</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallvulstat="SELECT * FROM `table1` WHERE vulstat='$_SESSION[search]' and barangay='$_SESSION[userbarangay]'";
                $queryviewallvulstatresult=mysqli_query($conn,$queryviewallvulstat);

                while($rowviewallvulstat=mysqli_fetch_array($queryviewallvulstatresult)){
                $viewallvulstatid=$rowviewallvulstat['id'];

                $queryviewallvulstat1="SELECT * FROM `table2` WHERE mainid='$viewallvulstatid' and horm='Head' ORDER BY mainid";
                $queryviewallvulstatresult1=mysqli_query($conn, $queryviewallvulstat1);

                while($rowviewallvulstat1=mysqli_fetch_array($queryviewallvulstatresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallvulstat1['mainid'] ?></b></td>
                            <td><?php echo $rowviewallvulstat1['fullname'] ?></td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallvulstat['vulstat'] ?></td>
                            <td><?php echo $rowviewallvulstat1['sex'] ?></td>
                            <td><?php echo $rowviewallvulstat['purok'] ?></td>
                            <td><?php echo $rowviewallvulstat['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }


               if($_SESSION['viewcondition']==43){ 

                    if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }
                    

                        $countviewallwatersource1="SELECT * FROM `table1` WHERE watersource='$_SESSION[search]' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallwatersourceresult1=mysqli_query($conn,$countviewallwatersource1);
                        $countnumrowviewallswatersource=0;

                        while($countviewallwatersourcerow1=mysqli_fetch_array($countviewallwatersourceresult1)){
                            $countviewallwatersourceid1=$countviewallwatersourcerow1['id'];

                            $countviewallwatersource2="SELECT * FROM `table2` WHERE mainid='$countviewallwatersourceid1' and horm='Head'";
                            $countviewallwatersourceresult2=mysqli_query($conn,$countviewallwatersource2);

                            while($countviewallwatersourcerow1a=mysqli_fetch_array($countviewallwatersourceresult2)){
                                $countnumrowviewallswatersource++;
                            }
                        }                    

                    $countviewallwatersourcesex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' and watersource='$_SESSION[search]'";
                    $countviewallwatersourceresultsex=mysqli_query($conn,$countviewallwatersourcesex);
                    $countnumrowviewallswatersourcesexmale=0;
                    $countnumrowviewallswatersourcesexfemale=0;

                    while($countviewallwatersourcerowsex=mysqli_fetch_array($countviewallwatersourceresultsex)){
                        $countviewallwatersourcemainidsex=$countviewallwatersourcerowsex['id'];
                        
                        $countviewallwatersourcesex1="SELECT * FROM `table2` WHERE sex='Female' and horm='Head' and mainid='$countviewallwatersourcemainidsex'";
                        $countviewallwatersourceresultsex1=mysqli_query($conn,$countviewallwatersourcesex1);

                        while($countviewallwatersourcerowsex1=mysqli_fetch_array($countviewallwatersourceresultsex1)){
                            $countnumrowviewallswatersourcesexfemale++;
                        }

                        $countviewallwatersourcesex2="SELECT * FROM `table2` WHERE sex='Male' and horm='Head'  and mainid='$countviewallwatersourcemainidsex'";
                        $countviewallwatersourceresultsex2=mysqli_query($conn,$countviewallwatersourcesex2);

                        while($countviewallwatersourcerowsex2=mysqli_fetch_array($countviewallwatersourceresultsex2)){
                            $countnumrowviewallswatersourcesexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallswatersourcesexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallswatersourcesexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallswatersource ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">Water Source</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallwatersource="SELECT * FROM `table1` WHERE watersource='$_SESSION[search]' and barangay='$_SESSION[userbarangay]'";
                $queryviewallwatersourceresult=mysqli_query($conn,$queryviewallwatersource);

                while($rowviewallwatersource=mysqli_fetch_array($queryviewallwatersourceresult)){
                $viewallwatersourceid=$rowviewallwatersource['id'];

                $queryviewallwatersource1="SELECT * FROM `table2` WHERE mainid='$viewallwatersourceid' and horm='Head' ORDER BY mainid";
                $queryviewallwatersourceresult1=mysqli_query($conn, $queryviewallwatersource1);

                while($rowviewallwatersource1=mysqli_fetch_array($queryviewallwatersourceresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallwatersource1['mainid'] ?></b></td>
                            <td><?php echo $rowviewallwatersource1['fullname'] ?></td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallwatersource['watersource'] ?></td>
                            <td><?php echo $rowviewallwatersource1['sex'] ?></td>
                            <td><?php echo $rowviewallwatersource['purok'] ?></td>
                            <td><?php echo $rowviewallwatersource['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }

               if($_SESSION['viewcondition']==44){ 

                    if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }
                    

                        $countviewallwra1="SELECT * FROM `table1` WHERE wra='$_SESSION[search]' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallwraresult1=mysqli_query($conn,$countviewallwra1);
                        $countnumrowviewallswra=0;

                        while($countviewallwrarow1=mysqli_fetch_array($countviewallwraresult1)){
                            $countviewallwraid1=$countviewallwrarow1['id'];

                            $countviewallwra2="SELECT * FROM `table2` WHERE mainid='$countviewallwraid1' and horm='Head'";
                            $countviewallwraresult2=mysqli_query($conn,$countviewallwra2);

                            while($countviewallwrarow1a=mysqli_fetch_array($countviewallwraresult2)){
                                $countnumrowviewallswra++;
                            }
                            
                        }                    

                    $countviewallwrasex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' and wra='$_SESSION[search]'";
                    $countviewallwraresultsex=mysqli_query($conn,$countviewallwrasex);
                    $countnumrowviewallswrasexmale=0;
                    $countnumrowviewallswrasexfemale=0;

                    while($countviewallwrarowsex=mysqli_fetch_array($countviewallwraresultsex)){
                        $countviewallwramainidsex=$countviewallwrarowsex['id'];
                        
                        $countviewallwrasex1="SELECT * FROM `table2` WHERE sex='Female' and horm='Head' and mainid='$countviewallwramainidsex'";
                        $countviewallwraresultsex1=mysqli_query($conn,$countviewallwrasex1);

                        while($countviewallwrarowsex1=mysqli_fetch_array($countviewallwraresultsex1)){
                            $countnumrowviewallswrasexfemale++;
                        }

                        $countviewallwrasex2="SELECT * FROM `table2` WHERE sex='Male' and horm='Head'  and mainid='$countviewallwramainidsex'";
                        $countviewallwraresultsex2=mysqli_query($conn,$countviewallwrasex2);

                        while($countviewallwrarowsex2=mysqli_fetch_array($countviewallwraresultsex2)){
                            $countnumrowviewallswrasexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallswrasexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallswrasexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallswra ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">WRA</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallwra="SELECT * FROM `table1` WHERE wra='$_SESSION[search]' and barangay='$_SESSION[userbarangay]'";
                $queryviewallwraresult=mysqli_query($conn,$queryviewallwra);

                while($rowviewallwra=mysqli_fetch_array($queryviewallwraresult)){
                $viewallwraid=$rowviewallwra['id'];

                $queryviewallwra1="SELECT * FROM `table2` WHERE mainid='$viewallwraid' and horm='Head' ORDER BY mainid";
                $queryviewallwraresult1=mysqli_query($conn, $queryviewallwra1);

                while($rowviewallwra1=mysqli_fetch_array($queryviewallwraresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallwra1['mainid'] ?></b></td>
                            <td><?php echo $rowviewallwra1['fullname'] ?></td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallwra['wra'] ?></td>
                            <td><?php echo $rowviewallwra1['sex'] ?></td>
                            <td><?php echo $rowviewallwra['purok'] ?></td>
                            <td><?php echo $rowviewallwra['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }


    if($_SESSION['viewcondition']==45){ 

                    if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }
                    

                        $countviewallid1="SELECT * FROM `table1` WHERE id='$_SESSION[search]' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallidresult1=mysqli_query($conn,$countviewallid1);
                        $countnumrowviewallsid=0;

                        while($countviewallidrow1=mysqli_fetch_array($countviewallidresult1)){
                            $countviewallidid1=$countviewallidrow1['id'];

                            $countviewallid2="SELECT * FROM `table2` WHERE mainid='$countviewallidid1'";
                            $countviewallidresult2=mysqli_query($conn,$countviewallid2);

                            while($countviewallidrow2=mysqli_fetch_array($countviewallidresult2)){
                                $countnumrowviewallsid++;
                            }

                        }                    

                    $countviewallidsex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' and id='$_SESSION[search]'";
                    $countviewallidresultsex=mysqli_query($conn,$countviewallidsex);
                    $countnumrowviewallsidsexmale=0;
                    $countnumrowviewallsidsexfemale=0;

                    while($countviewallidrowsex=mysqli_fetch_array($countviewallidresultsex)){
                        $countviewallidmainidsex=$countviewallidrowsex['id'];
                        
                        $countviewallidsex1="SELECT * FROM `table2` WHERE sex='Female' and mainid='$countviewallidmainidsex'";
                        $countviewallidresultsex1=mysqli_query($conn,$countviewallidsex1);

                        while($countviewallidrowsex1=mysqli_fetch_array($countviewallidresultsex1)){
                            $countnumrowviewallsidsexfemale++;
                        }

                        $countviewallidsex2="SELECT * FROM `table2` WHERE sex='Male'  and mainid='$countviewallidmainidsex'";
                        $countviewallidresultsex2=mysqli_query($conn,$countviewallidsex2);

                        while($countviewallidrowsex2=mysqli_fetch_array($countviewallidresultsex2)){
                            $countnumrowviewallsidsexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsidsexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsidsexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsid ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th style="color:#40AEDE;font-weight:bold">Family ID</th>
                            <th>Name</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallid="SELECT * FROM `table1` WHERE id='$_SESSION[search]' and barangay='$_SESSION[userbarangay]'";
                $queryviewallidresult=mysqli_query($conn,$queryviewallid);

                while($rowviewallid=mysqli_fetch_array($queryviewallidresult)){
                $viewallidid=$rowviewallid['id'];

                $queryviewallid1="SELECT * FROM `table2` WHERE mainid='$viewallidid' ORDER BY mainid";
                $queryviewallidresult1=mysqli_query($conn, $queryviewallid1);

                while($rowviewallid1=mysqli_fetch_array($queryviewallidresult1)){ ?>
                    <tbody>
                        <tr>
                            <td style="color:#40AEDE;font-weight:bold"><b><?php echo $rowviewallid1['mainid'] ?></b></td>
                            <td><?php echo $rowviewallid1['fullname'] ?></td>
                            <td><?php echo $rowviewallid1['sex'] ?></td>
                            <td><?php echo $rowviewallid['purok'] ?></td>
                            <td><?php echo $rowviewallid['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }


     if($_SESSION['viewcondition']==46){ 
                    if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }
                    

                        $countviewallpurok1="SELECT * FROM `table1` WHERE purok='$_SESSION[search]' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallpurokresult1=mysqli_query($conn,$countviewallpurok1);
                        $countnumrowviewallspurok=0;

                        while($countviewallpurokrow1=mysqli_fetch_array($countviewallpurokresult1)){
                            $countviewallpurokid1=$countviewallpurokrow1['id'];

                            $countviewallpurok2="SELECT * FROM `table2` WHERE mainid='$countviewallpurokid1' and horm='Head'";
                            $countviewallpurokresult2=mysqli_query($conn,$countviewallpurok2);

                            while($countviewallpurokrow1a=mysqli_fetch_array($countviewallpurokresult2)){
                                $countnumrowviewallspurok++;
                            }
                        }                    

                    $countviewallpuroksex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]' and purok='$_SESSION[search]'";
                    $countviewallpurokresultsex=mysqli_query($conn,$countviewallpuroksex);
                    $countnumrowviewallspuroksexmale=0;
                    $countnumrowviewallspuroksexfemale=0;

                    while($countviewallpurokrowsex=mysqli_fetch_array($countviewallpurokresultsex)){
                        $countviewallpurokmainidsex=$countviewallpurokrowsex['id'];
                        
                        $countviewallpuroksex1="SELECT * FROM `table2` WHERE sex='Female' and horm='Head' and mainid='$countviewallpurokmainidsex'";
                        $countviewallpurokresultsex1=mysqli_query($conn,$countviewallpuroksex1);

                        while($countviewallpurokrowsex1=mysqli_fetch_array($countviewallpurokresultsex1)){
                            $countnumrowviewallspuroksexfemale++;
                        }

                        $countviewallpuroksex2="SELECT * FROM `table2` WHERE sex='Male' and horm='Head'  and mainid='$countviewallpurokmainidsex'";
                        $countviewallpurokresultsex2=mysqli_query($conn,$countviewallpuroksex2);

                        while($countviewallpurokrowsex2=mysqli_fetch_array($countviewallpurokresultsex2)){
                            $countnumrowviewallspuroksexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallspuroksexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallspuroksexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallspurok ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th>Sex</th>
                            <th style="color:#40AEDE;font-weight:bold">Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallpurok="SELECT * FROM `table1` WHERE purok='$_SESSION[search]' and barangay='$_SESSION[userbarangay]'";
                $queryviewallpurokresult=mysqli_query($conn,$queryviewallpurok);

                while($rowviewallpurok=mysqli_fetch_array($queryviewallpurokresult)){
                $viewallpurokid=$rowviewallpurok['id'];

                $queryviewallpurok1="SELECT * FROM `table2` WHERE mainid='$viewallpurokid' and horm='Head' ORDER BY mainid";
                $queryviewallpurokresult1=mysqli_query($conn, $queryviewallpurok1);

                while($rowviewallpurok1=mysqli_fetch_array($queryviewallpurokresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallpurok1['mainid'] ?></b></td>
                            <td><?php echo $rowviewallpurok1['fullname'] ?></td>
                            <td><?php echo $rowviewallpurok1['sex'] ?></td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallpurok['purok'] ?></td>
                            <td><?php echo $rowviewallpurok['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }


    if($_SESSION['viewcondition']==48){ 
                   if($_SESSION['search']==""){
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b>No Response</b>)</p>
                    <?php }

                    else{
                    ?>
                    <p style="text-align:center;font-size:20px;margin-bottom:40px;letter-spacing:2px;"><?php echo $_SESSION['searchby'] ?> (<b><?php echo $_SESSION['search'] ?></b>)</p>
                    <?php }

                    $countviewallfourps="SELECT * FROM `table2` WHERE fourps='$_SESSION[search]'";
                    $countviewallfourpsresult=mysqli_query($conn,$countviewallfourps);
                    $countnumrowviewallsfourps=0;

                    while($countviewallfourpsrow=mysqli_fetch_array($countviewallfourpsresult)){
                        $countviewallfourpsmainid=$countviewallfourpsrow['mainid'];

                        $countviewallfourps1="SELECT * FROM `table1` WHERE id='$countviewallfourpsmainid' and barangay='$_SESSION[userbarangay]' ";
                        $countviewallfourpsresult1=mysqli_query($conn,$countviewallfourps1);

                        while($countviewallfourpsrow1=mysqli_fetch_array($countviewallfourpsresult1)){
                            $countviewallfourpsid1=$countviewallfourpsrow1['id'];

                            $countviewallfourps2="SELECT * FROM `table2` WHERE id='$countviewallfourpsid1'";
                            $countviewallfourpsresult2=mysqli_query($conn,$countviewallfourps2);
                            $countnumrowviewallsfourps++;
                        }                    
                    }

                    $countviewallfourpssex="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                    $countviewallfourpsresultsex=mysqli_query($conn,$countviewallfourpssex);
                    $countnumrowviewallsfourpssexmale=0;
                    $countnumrowviewallsfourpssexfemale=0;

                    while($countviewallfourpsrowsex=mysqli_fetch_array($countviewallfourpsresultsex)){
                        $countviewallfourpsmainidsex=$countviewallfourpsrowsex['id'];
                        
                        $countviewallfourpssex1="SELECT * FROM `table2` WHERE fourps='$_SESSION[search]' and sex='Female' and mainid='$countviewallfourpsmainidsex'";
                        $countviewallfourpsresultsex1=mysqli_query($conn,$countviewallfourpssex1);

                        while($countviewallfourpsrowsex1=mysqli_fetch_array($countviewallfourpsresultsex1)){
                            $countnumrowviewallsfourpssexfemale++;
                        }

                        $countviewallfourpssex2="SELECT * FROM `table2` WHERE fourps='$_SESSION[search]' and sex='Male' and mainid='$countviewallfourpsmainidsex'";
                        $countviewallfourpsresultsex2=mysqli_query($conn,$countviewallfourpssex2);

                        while($countviewallfourpsrowsex2=mysqli_fetch_array($countviewallfourpsresultsex2)){
                            $countnumrowviewallsfourpssexmale++;
                        }


                    }


                    ?>
                    <span>
                        <p style="margin-bottom:10px;text-align:center;font-size:15px">
                        <span style="float:left;margin-right:20px;"><b>Male :</b> <?php echo $countnumrowviewallsfourpssexmale ?></span>    
                        <span style="float:left;"><b>Female :</b> <?php echo $countnumrowviewallsfourpssexfemale ?> </span>
                        <span style="float:right"><b>Total :</b> <?php echo $countnumrowviewallsfourps ?> </span></br>
                        </p>
                    </span>
                    <table>
                        <thead>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th style="color:#40AEDE;font-weight:bold">4Ps</th>
                            <th>Sex</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                    </thead>
                <?php
        
                $queryviewallfourps="SELECT * FROM `table2` WHERE fourps='$_SESSION[search]' ORDER BY mainid";
                $queryviewallfourpsresult=mysqli_query($conn,$queryviewallfourps);

                while($rowviewallfourps=mysqli_fetch_array($queryviewallfourpsresult)){
                $viewallfourpsid=$rowviewallfourps['mainid'];
                $viewallfourpshorm=$rowviewallfourps['horm'];

                $queryviewallfourps1="SELECT * FROM `table1` WHERE id='$viewallfourpsid' and barangay='$_SESSION[userbarangay]'";
                $queryviewallfourpsresult1=mysqli_query($conn, $queryviewallfourps1);

                while($rowviewallfourps1=mysqli_fetch_array($queryviewallfourpsresult1)){ ?>
                    <tbody>
                        <tr>
                            <td><b><?php echo $rowviewallfourps['mainid'] ?></b></td>
                            <td><?php echo $rowviewallfourps['fullname'] ?> (<?php echo $viewallfourpshorm ?>)</td>
                            <td style="color:#40AEDE;font-weight:bold"><?php echo $rowviewallfourps['fourps'] ?></td>
                            <td><?php echo $rowviewallfourps['sex'] ?></td>
                            <td><?php echo $rowviewallfourps1['purok'] ?></td>
                            <td><?php echo $rowviewallfourps1['barangay'] ?></td>
                        </tr>
                    </tbody>
                <?php
            } 
        }
    }

?>
</table>
</div>
</body>
</html>