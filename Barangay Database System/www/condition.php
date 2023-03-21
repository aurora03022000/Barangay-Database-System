<!DOCTYPE html>
<html>
    <head>
    <link rel="icon" href="icon.png" type="png">
        <script src="footer-bottom.js"> </script>
        <link rel="stylesheet" href="all.min.css">
        <link rel="stylesheet" href="fontawesome.min.css">
        <link rel="stylesheet" href="fonts1.css">
        <script src="display-flex-div.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/0d25aa5264.js" crossorigin="anonymous"></script>
    </head>
<body>
<?php
    include_once("include.php");        

                            if(isset($_POST['submit'])){
                                $check=false;
                                $searchby=$_POST['searchby'];
                                $_SESSION['searchby']=$_POST['searchby'];
                                $search=$_POST['search'];


                                    //name
                                    if($searchby=="Name"){
                                        $checkerfullname=true;
                                        $_SESSION['viewcondition']=27;

                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;

                                        ?>
                                        <div class="table-div">  
                                        <?php 
                                        if($search!=""){
                                        $countfullname="SELECT * FROM `table2` WHERE fullname LIKE '$search%' OR fullname LIKE '%$search%' OR fullname LIKE '%$search'";
                                        $countfullnameresult=mysqli_query($conn,$countfullname);
                                        $existfullname=false;
                                        $countnumrowsfullname=0;
                                        }

                                        else{
                                            $countfullname="SELECT * FROM `table2` WHERE fullname=''";
                                            $countfullnameresult=mysqli_query($conn,$countfullname);
                                            $existfullname=false;
                                            $countnumrowsfullname=0;
                                        }

                                        while($rowcountfullname=mysqli_fetch_array($countfullnameresult)){
                                            $countfullnamemainid=$rowcountfullname['mainid'];
                                            $countfullnameid=$rowcountfullname['id'];

                                            $countfullname1="SELECT * FROM `table1` WHERE id='$countfullnamemainid' and barangay='$_SESSION[userbarangay]'";
                                            $countfullnameresult1=mysqli_query($conn,$countfullname1);

                                            while($rowcountfullname1=mysqli_fetch_array($countfullnameresult1)){
                                                $countfullnameid1=$rowcountfullname1['id'];

                                                $countfullname2="SELECT * FROM `table2` WHERE id='$countfullnameid1'";
                                                $countfullnameresult2=mysqli_query($conn,$countfullname2);
                                                $countnumrowsfullname++;
                                                $existfullname=true;
                                            }
                                            
                                        }
                                        

                                        if($existfullname==false){
                                            $emptycountfullname=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Name</b></p>
                                                    <p class="info-p"  ><i class="fas fa-user" style="margin-right:5px;"></i>Name : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsfullname ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Name</b></p>
                                                    <p class="info-p"  ><i class="fas fa-user" style="margin-right:5px;"></i>Name : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsfullname ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <!-- table  -->
                                        <table>
                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th style="color:#076C07;font-weight:bold">Name</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- End of table row heading -->
                                            
                                            <?php
                                            if($search!=""){
                                            $queryfullname3="SELECT * FROM `table2` WHERE fullname LIKE '$search%' OR fullname LIKE '%$search%' OR fullname LIKE '%$search' ORDER BY mainid";
                                            $resultfullname3=mysqli_query($conn,$queryfullname3);

                                            while($rowfullname3=mysqli_fetch_array($resultfullname3)){
                                            $fullnameid3=$rowfullname3['mainid'];    
                                            $fullnamehorm=$rowfullname3['horm'];

                                            $queryfullname4="SELECT * FROM `table1` WHERE id='$fullnameid3' and barangay='$_SESSION[userbarangay]'";
                                            $resultfullname4=mysqli_query($conn, $queryfullname4);

                                            while($rowfullname4=mysqli_fetch_array($resultfullname4)){
                                                $checkerfullname=false;

                                            ?>
                                            
                                            <!-- table row data -->
                                            <tbody>
                                            <tr>
                                                <?php if($fullnamehorm=="Head"){ ?>
                                                <td data-label="Family ID"><b><?php echo $rowfullname3['mainid']; ?></b></td>    
                                                <td data-label="Name"><span style="color:#076C07;font-weight:bold"><?php echo $rowfullname3['fullname']; ?></span> (<?php echo $rowfullname3['horm'] ?>) </td>                             
                                                <td data-label="Sex"><?php echo $rowfullname3['sex']; ?></td>    
                                                <td data-label="Purok"><?php echo $rowfullname4['purok']; ?></td>    
                                                <td data-label="Barangay"><?php echo $rowfullname4['barangay']; ?></td>  
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowfullname4['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>              
                                                <?php } 
                                                    
                                                else{
                                                ?>
                                                <td data-label="Family ID"><b><?php echo $rowfullname3['mainid']; ?></b></td>    
                                                <td data-label="Name"><span style="color:#076C07;font-weight:bold"><?php echo $rowfullname3['fullname']; ?></span> (<?php echo $rowfullname3['horm'] ?>) </td>                             
                                                <td data-label="Sex"><?php echo $rowfullname3['sex']; ?></td>
                                                <td data-label="Purok"><?php echo $rowfullname4['purok']; ?></td>
                                                <td data-label="Barangay"><?php echo $rowfullname4['barangay']; ?></td>  
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="table2" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowfullname3['id']; ?> (Member)" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>    
                                                </td>              
                                                <?php } ?>
                                                                                                           
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data  -->
                                        
                                            <?php
                                            }
                                            }
                                            }

                                            if($search==""){
                                                $queryemptyname="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                                                $queryemptynameresult=mysqli_query($conn,$queryemptyname);

                                                while($rowemptyname=mysqli_fetch_array($queryemptynameresult)){
                                                    $emptynameid=$rowemptyname['id'];

                                                    $queryemptyname1="SELECT * FROM `table2` WHERE fullname='' and mainid='$emptynameid' ORDER BY mainid";
                                                    $queryemptynameresult1=mysqli_query($conn,$queryemptyname1);

                                                    while($rowemptyname1=mysqli_fetch_array($queryemptynameresult1)){
                                                        $checkerfullname=false;
                                                        $emptynamehorm=$rowemptyname1['horm'];

                                                        ?>
                                            
                                            <!-- table row data -->
                                            <tbody>
                                            <tr>
                                                <?php if($emptynamehorm=="Head"){ ?>
                                                <td data-label="Family ID"><b><?php echo $rowemptyname1['mainid']; ?></b></td>    
                                                <td data-label="Name"><span style="color:#076C07;font-weight:bold">No Information</span> (<?php echo $rowemptyname1['horm'] ?>) </td>                             
                                                <td data-label="Sex"><?php echo $rowemptyname1['sex']; ?></td>    
                                                <td data-label="Purok"><?php echo $rowemptyname['purok']; ?></td>    
                                                <td data-label="Barangay"><?php echo $rowemptyname['barangay']; ?></td>  
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowemptyname['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>              
                                                <?php } 
                                                    
                                                else{
                                                ?>
                                                <td data-label="Family ID"><b><?php echo $rowemptyname['mainid']; ?></b></td>    
                                                <td data-label="Name"><span style="color:#076C07;font-weight:bold">No Information</span> (<?php echo $rowemptyname['horm'] ?>) </td>                             
                                                <td data-label="Sex"><?php echo $rowemptyname['sex']; ?></td>
                                                <td data-label="Purok"><?php echo $rowemptyname1['purok']; ?></td>
                                                <td data-label="Barangay"><?php echo $rowemptyname1['barangay']; ?></td>  
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="table2" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowemptyname['id']; ?> (Member)" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>    
                                                </td>              
                                                <?php } ?>
                                                                                                           
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data  -->
                                        
                                            <?php
                                                    }
                                                }

                                            }
                                            

                                            // this table row will display if the input is not found
                                            if($checkerfullname==true){
                                            ?>
                                            
                                            <!-- table row for empty -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>    
                                                <td data-label="-"><?php echo "-"; ?></td>       
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>       
                                                <td data-label="-"><?php echo "-"; ?></td>                                                                                                                                         
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>

                                         </table> <!-- End of table -->
                                        </div>
                                         <?php
                                    
                                    } // end of condition for fullname


                                    //fname condition if it is searched
                                    else if($searchby=="First Name"){
                                        $checkerfname=true;

                                        $_SESSION['viewcondition']=15;
                                        
                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;

                                        ?>
                                        <div class="table-div"> 
                                        <?php 
                                        if($search!=""){
                                        $countfirstname="SELECT * FROM `table2` WHERE fname LIKE '$search%' OR fname LIKE '%$search%' OR fname LIKE '%$search'";
                                        $countfirstnameresult=mysqli_query($conn,$countfirstname);
                                        $countnumrowsfirstname=0;
                                        $existfirstname=false;
                                        }

                                        else{
                                        $countfirstname="SELECT * FROM `table2` WHERE fname=''";
                                        $countfirstnameresult=mysqli_query($conn,$countfirstname);
                                        $countnumrowsfirstname=0;
                                        $existfirstname=false;
                                        }

                                        while($countfirstnamerow=mysqli_fetch_array($countfirstnameresult)){
                                            $countfirstnamemainid=$countfirstnamerow['mainid'];
                                            $countfirstnameid=$countfirstnamerow['id'];

                                            $countfirstname1="SELECT * FROM `table1` WHERE id='$countfirstnamemainid' and barangay='$_SESSION[userbarangay]' ";
                                            $countfirstnameresult1=mysqli_query($conn,$countfirstname1);

                                            while($countfirstnamerow1=mysqli_fetch_array($countfirstnameresult1)){
                                                $countfirstnameid1=$countfirstnamerow1['id'];

                                                $countfirstname2="SELECT * FROM `table2` WHERE id='$countfirstnameid1'";
                                                $countfirstnameresult2=mysqli_query($conn,$countfirstname2);
                                                $countnumrowsfirstname++;
                                                $existfirstname=true;
                                            }
                                        
                                        }

                                        if($existfirstname==false){
                                            $emptycountfirstname=0;
                                            ?>
                                            <div class="top-info">
                                                <div style="width:100%;">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>First Name</b></p>
                                                    <p class="info-p"  ><i class="fas fa-user" style="margin-right:5px;"></i>First Name : <b><?php echo $search ?></b></p>
                                                </div>
                                            
                                                <div class="p-div count-div1" >
                                                    <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountfirstname ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div style="width:100%;">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>First Name</b></p>
                                                    <p class="info-p"  ><i class="fas fa-user" style="margin-right:5px;"></i>First Name : <b><?php echo $search ?></b></p>
                                                </div>
                                            
                                                <div class="count-div" >
                                                    <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsfirstname ?></b></p>
                                                    <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?> 
                                        <!-- table  -->
                                        <table>
                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th style="color:#076C07;font-weight:bold">First Name</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- End of table row heading -->
                                            
                                            <?php
                                            if($search!=""){
                                            $queryfname="SELECT * FROM `table2` WHERE fname LIKE '$search%' OR fname LIKE '%$search%' OR fname LIKE '%$search' ORDER BY mainid";
                                            $resultfname=mysqli_query($conn,$queryfname);

                                            while($rowfname=mysqli_fetch_array($resultfname)){
                                            $fnameid=$rowfname['mainid'];
                                            $firstnamehorm=$rowfname['horm'];    

                                            $queryfname1="SELECT * FROM `table1` WHERE id='$fnameid' and barangay='$_SESSION[userbarangay]'";
                                            $resultfname1=mysqli_query($conn, $queryfname1);

                                            while($rowfname1=mysqli_fetch_array($resultfname1)){
                                                $checkerfname=false;

                                            ?>
                                            
                                            <!-- table row data -->
                                            <tbody>
                                            <tr>
                                            <?php if($firstnamehorm=="Head"){ ?>
                                                <td data-label="Family ID"><b><?php echo $rowfname['mainid']; ?></b></td>     
                                                <td data-label="Name"><span style="color:#076C07;font-weight:bold"><?php echo $rowfname['fname']; ?></span> <?php echo $rowfname['mname'] ?> <?php echo $rowfname['lname'] ?> (<?php echo $rowfname['horm'] ?>) </td>                             
                                                <td data-label="Sex"><?php echo $rowfname['sex']; ?></td>     
                                                <td data-label="Purok"><?php echo $rowfname1['purok']; ?></td>   
                                                <td data-label="Barangay"><?php echo $rowfname1['barangay']; ?></td>  
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowfname1['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>              
                                                <?php } 
                                                    
                                                else{
                                                ?>
                                                <td data-label="Family ID"><b><?php echo $rowfname['mainid']; ?></b></td>     
                                                <td data-label="Name" ><span style="color:#076C07;font-weight:bold"><?php echo $rowfname['fname']; ?></span> <?php echo $rowfname['mname'] ?> <?php echo $rowfname['lname'] ?> (<?php echo $rowfname['horm'] ?>) </td>                             
                                                <td data-label="Sex"><?php echo $rowfname['sex']; ?></td>     
                                                <td data-label="Purok"><?php echo $rowfname1['purok']; ?></td>    
                                                <td data-label="Barangay"><?php echo $rowfname1['barangay']; ?></td>  
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="table2" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowfname['id']; ?> (Member)" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>    
                                                </td>              
                                                <?php } ?>              
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data  -->
                                        
                                            <?php
                                            }
                                            }
                                            }

                                            if($search==""){
                                                $queryemptyfname="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                                                $queryemptyfnameresult=mysqli_query($conn, $queryemptyfname);

                                                while($rowemptyfname=mysqli_fetch_array($queryemptyfnameresult)){
                                                    $emptyfnameid=$rowemptyfname['id'];

                                                    $queryemptyfname1="SELECT * FROM `table2` WHERE mainid='$emptyfnameid' and fname='' ORDER BY mainid";
                                                    $queryemptyfnameresult1=mysqli_query($conn, $queryemptyfname1);

                                                    while($rowemptyfname1=mysqli_fetch_array($queryemptyfnameresult1)){
                                                        $checkerfname=false;
                                                        $firstnameemptyhorm=$rowemptyfname1['horm'];

                                                        ?>
                                            
                                            <!-- table row data -->
                                            <tbody>
                                            <tr>
                                            <?php if($firstnameemptyhorm=="Head"){ ?>
                                                <td data-label="Family ID"><b><?php echo $rowemptyfname1['mainid']; ?></b></td>     
                                                <td data-label="First Name"><span style="color:#076C07;font-weight:bold">No Information</span> (<?php echo $rowemptyfname1['horm'] ?>) </td>                             
                                                <td data-label="Sex"><?php echo $rowemptyfname1['sex']; ?></td>     
                                                <td data-label="Purok"><?php echo $rowemptyfname['purok']; ?></td>   
                                                <td data-label="Barangay"><?php echo $rowemptyfname['barangay']; ?></td>  
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowemptyfname['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>              
                                                <?php } 
                                                    
                                                else{
                                                ?>
                                                <td data-label="Family ID"><b><?php echo $rowemptyfname1['mainid']; ?></b></td>     
                                                <td data-label="First Name"><span style="color:#076C07;font-weight:bold">No Information</span> (<?php echo $rowemptyfname1['horm'] ?>) </td>                             
                                                <td data-label="Sex"><?php echo $rowemptyfname1['sex']; ?></td>     
                                                <td data-label="Purok"><?php echo $rowemptyfname['purok']; ?></td>    
                                                <td data-label="Barangay"><?php echo $rowemptyfname['barangay']; ?></td>  
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="table2" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowemptyfname1['id']; ?> (Member)" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>    
                                                </td>              
                                                <?php } ?>              
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data  -->
                                        
                                            <?php


                                                    }
                                                }
                                            }

                                            // this table row will display if the input is not found
                                            if($checkerfname==true){
                                            ?>
                                            
                                            <!-- table row for empty -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>    
                                                <td data-label="-"><?php echo "-"; ?></td>       
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td>                                                                                                                                                                                                                                                                              
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>

                                         </table> <!-- End of table -->
                                        </div>
                                         <?php
                                    
                                    } // end of condition for fname


                                    //mname condition if it is searched
                                    else if($searchby=="Middle Name"){
                                        $checkermname=true;

                                        $_SESSION['viewcondition']=25;

                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                        ?>
                                        <div class="table-div">  
                                        
                                        <?php 
                                        if($search!=""){
                                        $countmiddlename="SELECT * FROM `table2` WHERE mname LIKE '$search%' OR mname LIKE '%$search%' OR mname LIKE '%$search'";
                                        $countmiddlenameresult=mysqli_query($conn,$countmiddlename);
                                        $countnumrowsmiddlename=0;
                                        $existmiddlename=false;
                                        }

                                        else{
                                            $countmiddlename="SELECT * FROM `table2` WHERE mname=''";
                                            $countmiddlenameresult=mysqli_query($conn,$countmiddlename);
                                            $countnumrowsmiddlename=0;
                                            $existmiddlename=false;
                                        }

                                        while($countmiddlenamerow=mysqli_fetch_array($countmiddlenameresult)){
                                            $countmiddlenamemainid=$countmiddlenamerow['mainid'];
                                            $countmiddlenameid=$countmiddlenamerow['id'];

                                            $countmiddlename1="SELECT * FROM `table1` WHERE id='$countmiddlenamemainid' and barangay='$_SESSION[userbarangay]' ";
                                            $countmiddlenameresult1=mysqli_query($conn,$countmiddlename1);

                                            while($countmiddlenamerow1=mysqli_fetch_array($countmiddlenameresult1)){
                                                $countmiddlenameid1=$countmiddlenamerow1['id'];

                                                $countmiddlename2="SELECT * FROM `table2` WHERE id='$countmiddlenameid1'";
                                                $countmiddlenameresult2=mysqli_query($conn,$countmiddlename2);
                                                $countnumrowsmiddlename++;
                                                $existmiddlename=true;
                                            }
                                        
                                        }

                                        if($existmiddlename==false){
                                            $emptycountmiddlename=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Middle Name</b></p>
                                                    <p class="info-p"  ><i class="fas fa-user" style="margin-right:5px;"></i>Middle Name : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountmiddlename ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Middle Name</b></p>
                                                    <p class="info-p"  ><i class="fas fa-user" style="margin-right:5px;"></i>Middle Name : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsmiddlename ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <!-- table  -->
                                        <table>
                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th style="color:#076C07;font-weight:bold">Middle Name</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- End of table row heading -->
                                            
                                            <?php
                                            if($search!=""){
                                            $querymname="SELECT * FROM `table2` WHERE mname LIKE '$search%' OR mname LIKE '%$search%' OR mname LIKE '%$search'";
                                            $resultmname=mysqli_query($conn,$querymname);

                                            while($rowmname=mysqli_fetch_array($resultmname)){
                                            $mnameid=$rowmname['mainid'];
                                            $mnamehorm=$rowmname['horm'];

                                            $querymname1="SELECT * FROM `table1` WHERE id='$mnameid' and barangay='$_SESSION[userbarangay]'";
                                            $resultmname1=mysqli_query($conn,$querymname1);

                                            while($rowmname1=mysqli_fetch_array($resultmname1)){
                                            $checkermname=false;
                                            ?>
                                            
                                            <!-- table row data -->
                                            <tbody>
                                            <tr>
                                            <?php if($mnamehorm=="Head"){ ?>
                                                <td data-label="Family ID"><b><?php echo $rowmname['mainid']; ?></b></td>    
                                                <td data-label="Middle Name"><?php echo $rowmname['fname']; ?> <span style="color:#076C07;font-weight:bold"><?php echo $rowmname['mname']; ?></span> <?php echo $rowmname['lname']; ?> (<?php echo $rowmname['horm'] ?>) </td>                             
                                                <td data-label="Sex"><?php echo $rowmname['sex']; ?></td>    
                                                <td data-label="Purok"><?php echo $rowmname1['purok']; ?></td>    
                                                <td data-label="Barangay"><?php echo $rowmname1['barangay']; ?></td>  
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowmname1['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>              
                                                <?php } 
                                                    
                                                else{
                                                ?>
                                                <td data-label="Family ID"><b><?php echo $rowmname['mainid']; ?></b></td>    
                                                <td data-label="Name"><?php echo $rowmname['fname']; ?> <span style="color:#076C07;font-weight:bold"><?php echo $rowmname['mname']; ?></span> <?php echo $rowmname['lname']; ?> (<?php echo $rowmname['horm'] ?>) </td>                             
                                                <td data-label="Sex"><?php echo $rowmname['sex']; ?></td>    
                                                <td data-label="Purok"><?php echo $rowmname1['purok']; ?></td>    
                                                <td data-label="Barangay"><?php echo $rowmname1['barangay']; ?></td>  
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="table2" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowmname['id']; ?> (Member)" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>    
                                                </td>              
                                                <?php } ?>               
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data  -->
                                        
                                            <?php
                                            }
                                            }
                                            }

                                            if($search==""){
                                                $queryemptymname="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                                                $queryemptymnameresult=mysqli_query($conn,$queryemptymname);

                                                while($rowemptymname=mysqli_fetch_array($queryemptymnameresult)){
                                                    $mnameepmtyid=$rowemptymname['id'];

                                                    $queryemptymname1="SELECT * FROM `table2` WHERE mname='' and mainid='$mnameepmtyid' ORDER BY mainid";
                                                    $queryemptymnameresult1=mysqli_query($conn,$queryemptymname1);

                                                    while($rowemptymname1=mysqli_fetch_array($queryemptymnameresult1)){
                                                        $checkermname=false;
                                                        $emptymnamehorm=$rowemptymname1['horm'];
                                                        ?>
                                            
                                                        <!-- table row data -->
                                                        <tbody>
                                                        <tr>
                                                        <?php if($emptymnamehorm=="Head"){ ?>
                                                            <td data-label="Family ID"><?php echo $rowemptymname1['mainid']; ?></td>    
                                                            <td data-label="Middle Name"><span style="color:#076C07;font-weight:bold">No Information</span> (<?php echo $rowemptymname1['horm'] ?>) </td>                             
                                                            <td data-label="Sex"><?php echo $rowemptymname1['sex']; ?></td>    
                                                            <td data-label="Purok"><?php echo $rowemptymname['purok']; ?></td>    
                                                            <td data-label="Barangay"><?php echo $rowemptymname['barangay']; ?></td>  
                                                            <td data-label="View Information">
                                                                <form action="result.php" target="_blank" method="POST">
                                                                    <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                                    <input type="hidden" value="<?php echo $rowemptymname['id']; ?>" name="hidden-btn" />
                                                                    <input type="submit" name="view" value="View" class="view_btn"/>
                                                                </form>
                                                            </td>              
                                                            <?php } 
                                                                
                                                            else{
                                                            ?>
                                                            <td data-label="Family ID"><?php echo $rowemptymname1['mainid']; ?></td>    
                                                            <td data-label="Name"><span style="color:#076C07;font-weight:bold">No Information</span> (<?php echo $rowemptymname1['horm'] ?>) </td>                             
                                                            <td data-label="Sex"><?php echo $rowemptymname1['sex']; ?></td>    
                                                            <td data-label="Purok"><?php echo $rowemptymname['purok']; ?></td>    
                                                            <td data-label="Barangay"><?php echo $rowemptymname['barangay']; ?></td>  
                                                            <td data-label="View Information">
                                                                <form action="result.php" target="_blank" method="POST">
                                                                    <input type="hidden" value="table2" name="hidden-btn1" />
                                                                    <input type="hidden" value="<?php echo $rowemptymname1['id']; ?> (Member)" name="hidden-btn" />
                                                                    <input type="submit" name="view" value="View" class="view_btn"/>
                                                                </form>    
                                                            </td>              
                                                            <?php } ?>               
                                                        </tr>
                                                        </tbody>
                                                        <!-- end of table row data  -->
                                                    
                                                        <?php
                                                    }

                                                }
                                            }

                                            // this table row will display if the input is not found
                                            if($checkermname==true){
                                            ?>
                                            
                                            <!-- table row for empty -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>    
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>                                                                                                                                           
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>

                                         </table> <!-- End of table -->
                                         </div>
                                         <?php
                                    
                                    } // end of condition for mname



                                    //lname condition if it is searched
                                    else if($searchby=="Last Name"){
                                        $checkerlname=true;

                                        $_SESSION['viewcondition']=23;

                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                        ?>
                                        <div class="table-div">
                                        <?php 
                                        if($search!=""){
                                        $countlastname="SELECT * FROM `table2` WHERE lname LIKE '$search%' OR lname LIKE '%$search%' OR lname LIKE '%$search'";
                                        $countlastnameresult=mysqli_query($conn,$countlastname);
                                        $countnumrowslastname=0;
                                        $existlastname=false;
                                        }

                                        else{
                                            $countlastname="SELECT * FROM `table2` WHERE lname=''";
                                            $countlastnameresult=mysqli_query($conn,$countlastname);
                                            $countnumrowslastname=0;
                                            $existlastname=false;
                                        }

                                        while($countlastnamerow=mysqli_fetch_array($countlastnameresult)){
                                            $countlastnamemainid=$countlastnamerow['mainid'];
                                            $countlastnameid=$countlastnamerow['id'];

                                            $countlastname1="SELECT * FROM `table1` WHERE id='$countlastnamemainid' and barangay='$_SESSION[userbarangay]' ";
                                            $countlastnameresult1=mysqli_query($conn,$countlastname1);

                                            while($countlastnamerow1=mysqli_fetch_array($countlastnameresult1)){
                                                $countlastnameid1=$countlastnamerow1['id'];

                                                $countlastname2="SELECT * FROM `table2` WHERE id='$countlastnameid1'";
                                                $countlastnameresult2=mysqli_query($conn,$countlastname2);
                                                $countnumrowslastname++;
                                                $existlastname=true;
                                            }
                                        
                                        }

                                        if($existlastname==false){
                                            $emptycountlastname=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Last Name</b></p>
                                                    <p class="info-p"  ><i class="fas fa-user" style="margin-right:5px;"></i>last Name : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountlastname ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Last Name</b></p>
                                                    <p class="info-p"  ><i class="fas fa-user" style="margin-right:5px;"></i>Last Name : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowslastname ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>  
                                        <!-- table  -->
                                        <table>
                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th style="color:#076C07;font-weight:bold">Last Name</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- End of table row heading -->
                                            
                                            <?php
                                            if($search!=""){
                                            $querylname="SELECT * FROM `table2` WHERE lname LIKE '$search%' OR lname LIKE '%$search%' OR lname LIKE '%$search' ORDER BY mainid";
                                            $resultlname=mysqli_query($conn,$querylname);

                                            while($rowlname=mysqli_fetch_array($resultlname)){
                                            $lnameid=$rowlname['mainid'];
                                            $lnamehorm=$rowlname['horm'];

                                            $querylname1="SELECT * FROM `table1` WHERE id='$lnameid' and barangay='$_SESSION[userbarangay]'";
                                            $resultlname1=mysqli_query($conn,$querylname1);

                                            while($rowlname1=mysqli_fetch_array($resultlname1)){
                                            $checkerlname=false;

                                            ?>
                                            
                                            <!-- table row data -->
                                            <tbody>
                                            <tr>
                                            <?php if($lnamehorm=="Head"){ ?>
                                                <td data-label="Family ID"><b><?php echo $rowlname['mainid']; ?></b></td>    
                                                <td data-label="Name"><?php echo $rowlname['fname']; ?> <?php echo $rowlname['mname']; ?> <span style="color:#076C07;font-weight:bold"><?php echo $rowlname['lname']; ?></span> (<?php echo $rowlname['horm'] ?>) </td>                             
                                                <td data-label="Sex"><?php echo $rowlname['sex']; ?></td>    
                                                <td data-label="Purok"><?php echo $rowlname1['purok']; ?></td>    
                                                <td data-label="Barangay"><?php echo $rowlname1['barangay']; ?></td>  
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowlname1['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>              
                                                <?php } 
                                                    
                                                else{
                                                ?>
                                                <td data-label="Family ID"><b><?php echo $rowlname['mainid']; ?></b></td>    
                                                <td data-label="Name"><?php echo $rowlname['fname']; ?> <?php echo $rowlname['mname']; ?> <span style="color:#076C07;font-weight:bold"><?php echo $rowlname['lname']; ?></span> (<?php echo $rowlname['horm'] ?>) </td>                             
                                                <td data-label="Sex"><?php echo $rowlname['sex']; ?></td>    
                                                <td data-label="Purok"><?php echo $rowlname1['purok']; ?></td>    
                                                <td data-label="Barangay"><?php echo $rowlname1['barangay']; ?></td>  
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="table2" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowlname['id']; ?> (Member)" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>    
                                                </td>              
                                                <?php } ?>            
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data  -->
                                        
                                            <?php
                                            }
                                            }
                                            }

                                            if($search==""){
                                                $queryemptylname="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                                                $queryemptylnameresult=mysqli_query($conn, $queryemptylname);

                                                while($rowemptylname=mysqli_fetch_array($queryemptylnameresult)){
                                                    $emptylnameid=$rowemptylname['id'];

                                                    $queryemptylname1="SELECT * FROM `table2` WHERE lname='' and mainid='$emptylnameid' ORDER BY mainid";
                                                    $queryemptylnameresult1=mysqli_query($conn, $queryemptylname1);

                                                    while($rowemptylname1=mysqli_fetch_array($queryemptylnameresult1)){
                                                        $checkerlname=false;
                                                        $emptylnamehorm=$rowemptylname1['horm'];

                                                        ?>
                                            
                                                        <!-- table row data -->
                                                        <tbody>
                                                        <tr>
                                                        <?php if($emptylnamehorm=="Head"){ ?>
                                                            <td data-label="Family ID"><b><?php echo $rowemptylname1['mainid']; ?></b></td>    
                                                            <td data-label="Name"><span style="color:#076C07;font-weight:bold">No Information</span> (<?php echo $rowemptylname1['horm'] ?>) </td>                             
                                                            <td data-label="Sex"><?php echo $rowemptylname1['sex']; ?></td>    
                                                            <td data-label="Purok"><?php echo $rowemptylname['purok']; ?></td>    
                                                            <td data-label="Barangay"><?php echo $rowemptylname['barangay']; ?></td>  
                                                            <td data-label="View Information">
                                                                <form action="result.php" target="_blank" method="POST">
                                                                    <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                                    <input type="hidden" value="<?php echo $rowemptylname['id']; ?>" name="hidden-btn" />
                                                                    <input type="submit" name="view" value="View" class="view_btn"/>
                                                                </form>
                                                            </td>              
                                                            <?php } 
                                                                
                                                            else{
                                                            ?>
                                                            <td data-label="Family ID"><b><?php echo $rowemptylname1['mainid']; ?></b></td>    
                                                            <td data-label="Name"><span style="color:#076C07;font-weight:bold">No Information</span> (<?php echo $rowemptylname1['horm'] ?>) </td>                             
                                                            <td data-label="Sex"><?php echo $rowemptylname1['sex']; ?></td>    
                                                            <td data-label="Purok"><?php echo $rowemptylname['purok']; ?></td>    
                                                            <td data-label="Barangay"><?php echo $rowemptylname['barangay']; ?></td>  
                                                            <td data-label="View Information">
                                                                <form action="result.php" target="_blank" method="POST">
                                                                    <input type="hidden" value="table2" name="hidden-btn1" />
                                                                    <input type="hidden" value="<?php echo $rowemptylname1['id']; ?> (Member)" name="hidden-btn" />
                                                                    <input type="submit" name="view" value="View" class="view_btn"/>
                                                                </form>    
                                                            </td>              
                                                            <?php } ?>            
                                                        </tr>
                                                        </tbody>
                                                        <!-- end of table row data  -->
                                                    
                                                        <?php
                                                    }

                                                }
                                            }
                                            // this table row will display if the input is not found
                                            if($checkerlname==true){
                                            ?>
                                            
                                            <!-- table row for empty -->
                                            <tbody>    
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>    
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>                                                                                                                                              
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>

                                         </table> <!-- End of table -->
                                         </div>
                                         <?php
                                    
                                    } // end of condition for lname



                                    //purok codition if it is searched
                                    else if($searchby=="Purok"){
                                        $_SESSION['viewcondition']=46;

                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;

                                        if($search=="-"){
                                            $search="";
                                        }

                                        

                                        $checkerpurok=true;
                                        ?>
                                        <div class="table-div">
                                        <?php 
                                        $countpurok="SELECT * FROM `table1` WHERE purok='$search' and barangay='$_SESSION[userbarangay]'";
                                        $countpurokresult=mysqli_query($conn,$countpurok);
                                        $existpurok=false;
                                        $countnumrowspurok=0;

                                        while($rowcountpurok=mysqli_fetch_array($countpurokresult)){
                                            $countpurokid=$rowcountpurok['id'];

                                            $countpurok1="SELECT * FROM `table2` WHERE mainid='$countpurokid' and horm='Head'";
                                            $countpurokresult1=mysqli_query($conn,$countpurok1);

                                            while($rowcountpurok1=mysqli_fetch_array($countpurokresult1)){
                                                $countpurokid1=$rowcountpurok1['id'];

                                                $countpurok2="SELECT * FROM `table2` WHERE id='$countpurokid1'";
                                                $countpurokresult2=mysqli_query($conn,$countpurok2);

                                                $countnumrowspurok++;
                                                $existpurok=true;
                                            }
                                            
                                        }

                                        if($existpurok==false){
                                            $emptycountpurok=0;
                                            ?>
                                            <div class="top-info">
                                                <div style="width:100%;">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Purok</b></p>
                                                    <p class="info-p" ><i class="fas fa-home" style="margin-right:5px;"></i>Purok : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1" >
                                                    <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountpurok ?></b> Items</p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div style="width:100%;">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Purok</b></p>
                                                    <p class="info-p" ><i class="fas fa-home" style="margin-right:5px;"></i>Purok : <b><?php echo $search ?></b></p>
                                                </div>
                                        
                                                <div class="p-div count-div1" >
                                                    <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowspurok ?></b> Items</p>
                                                    <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>  
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Head Name</th>
                                                <th>Sex</th>
                                                <th style="color:#076C07;font-weight:bold">Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            $querypurok="SELECT * FROM `table1` WHERE purok='$search' and barangay='$_SESSION[userbarangay]'";
                                            $resultpurok=mysqli_query($conn,$querypurok);

                                            while($rowpurok=mysqli_fetch_array($resultpurok)){ 
                                            $purokid=$rowpurok['id'];

                                            $querypurok1="SELECT * FROM `table2` WHERE mainid='$purokid' and horm='Head' ORDER BY mainid";
                                            $resultpurok1=mysqli_query($conn,$querypurok1);

                                            while($rowpurok1=mysqli_fetch_array($resultpurok1)){
                                            $checkerpurok=false;
                                            $purokhorm=$rowpurok1['horm'];
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                                <td data-label="Family ID"><b><?php echo $rowpurok1['mainid']; ?></b></td>                             
                                                <td data-label="Head Name"><?php echo $rowpurok1['fullname']; ?></td>
                                                <td data-label="Sex"><?php echo $rowpurok1['sex']; ?></td>                                                          
                                                <td data-label="Purok" style="color:#076C07;font-weight:bold"><?php echo $rowpurok['purok']; ?></td>    
                                                <td data-label="Barangay"><?php echo $rowpurok['barangay']; ?></td>  
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowpurok['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>               
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            }

                                            // this will execute if the result is not found
                                            if($checkerpurok==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>  
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                           
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of purok condition



                                    //dependency codition if it is searched
                                    else if($searchby=="Dependency"){
                                        $checkerdependency=true;

                                        $_SESSION['viewcondition']=11;
                                        
                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;

                                        if($search=="-"){
                                            $search="";
                                        }
                                        
                                        ?>
                                        <div class="table-div">  
                                        <?php 
                                        $countdependency="SELECT * FROM `table2` WHERE dependency='$search'";
                                        $countdependencyresult=mysqli_query($conn,$countdependency);
                                        $countnumrowsdependency=0;
                                        $existdependency=false;

                                        while($countdependencyrow=mysqli_fetch_array($countdependencyresult)){
                                            $countdependencymainid=$countdependencyrow['mainid'];
                                            $countdependencyid=$countdependencyrow['id'];

                                            $countdependency1="SELECT * FROM `table1` WHERE id='$countdependencymainid' and barangay='$_SESSION[userbarangay]' ";
                                            $countdependencyresult1=mysqli_query($conn,$countdependency1);

                                            while($countdependencyrow1=mysqli_fetch_array($countdependencyresult1)){
                                                $countdependencyid1=$countdependencyrow1['id'];

                                                $countdependency2="SELECT * FROM `table2` WHERE id='$countdependencyid1'";
                                                $countdependencyresult2=mysqli_query($conn,$countdependency2);
                                                $countnumrowsdependency++;
                                                $existdependency=true;
                                            }
                                        
                                        }

                                        if($existdependency==false){
                                            $emptycountdependency=0;
                                            ?>
                                            <div class="top-info">
                                                <div style="width:100%">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Dependency</b></p>
                                                    <p class="info-p"  ><i class="fas fa-users" style="margin-right:5px;"></i>Dependency : <b><?php echo $search ?></b></p>
                                                </div>
                                            
                                                <div class="p-div count-div1" >
                                                    <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountdependency ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div style="width:100%;">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Dependency</b></p>
                                                    <p class="info-p"  ><i class="fas fa-users" style="margin-right:5px;"></i>Dependency : <b><?php echo $search ?></b></p>
                                                </div>
                                            
                                                <div class="count-div" >
                                                    <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsdependency ?></b></p>
                                                    <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Name</th>
                                                <th style="color:#076C07;font-weight:bold">Dependency</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            $querydependency="SELECT * FROM `table2` WHERE dependency='$search' ORDER BY mainid";
                                            $resultdependency=mysqli_query($conn,$querydependency);

                                            while($rowdependency=mysqli_fetch_array($resultdependency)){
                                            $dependencymainid=$rowdependency['mainid'];
                                            $dependencyhorm=$rowdependency['horm'];

                                            $querydependency1="SELECT * FROM `table1` WHERE id='$dependencymainid' and barangay='$_SESSION[userbarangay]'";
                                            $resultdependency1=mysqli_query($conn,$querydependency1);

                                            while($rowdependency1=mysqli_fetch_array($resultdependency1)){
                                            $checkerdependency=false;
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                            <?php if($dependencyhorm=="Head"){ ?>
                                                <td data-label="Mainid"><b><?php echo $rowdependency['mainid']; ?></b></td>    
                                                <td data-label="Name"><?php echo $rowdependency['fullname']; ?> (<?php echo $rowdependency['horm'] ?>) </td>                             
                                                <td data-label="Dependency" style="color:#076C07;font-weight:bold"><?php echo $rowdependency['dependency']; ?></td> 
                                                <td data-label="Sex"><?php echo $rowdependency['sex']; ?></td>   
                                                <td data-label="Purok"><?php echo $rowdependency1['purok']; ?></td>    
                                                <td data-label="Barangay"><?php echo $rowdependency1['barangay']; ?></td>  
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowdependency1['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>              
                                                <?php } 
                                                    
                                                else{
                                                ?>
                                                <td data-label="Mainid"><b><?php echo $rowdependency['mainid']; ?></b></td>    
                                                <td data-label="Name"><?php echo $rowdependency['fullname']; ?> (<?php echo $rowdependency['horm'] ?>) </td>                             
                                                <td data-label="Dependency" style="color:#076C07;font-weight:bold"><?php echo $rowdependency['dependency']; ?></td> 
                                                <td data-label="Sex"><?php echo $rowdependency['sex']; ?></td>    
                                                <td data-label="Purok"><?php echo $rowdependency1['purok']; ?></td>    
                                                <td data-label="Barangay"><?php echo $rowdependency1['barangay']; ?></td>  
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="table2" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowdependency['id']; ?> (Member)" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>    
                                                </td>              
                                                <?php } ?>               
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            }

                                            // this will execute if the result is not found
                                            if($checkerdependency==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>                             
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of dependency condition




                                    //tribe codition if it is searched
                                    else if($searchby=="Tribe"){
                                        $checkertribe=true;

                                        $_SESSION['viewcondition']=41;

                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;

                                        ?>
                                        <div class="table-div">  
                                        <?php 
                                        $counttribe="SELECT * FROM `table2` WHERE tribe='$search'";
                                        $counttriberesult=mysqli_query($conn,$counttribe);
                                        $countnumrowstribe=0;
                                        $existtribe=false;

                                        while($counttriberow=mysqli_fetch_array($counttriberesult)){
                                            $counttribemainid=$counttriberow['mainid'];
                                            $counttribeid=$counttriberow['id'];

                                            $counttribe1="SELECT * FROM `table1` WHERE id='$counttribemainid' and barangay='$_SESSION[userbarangay]' ";
                                            $counttriberesult1=mysqli_query($conn,$counttribe1);

                                            while($counttriberow1=mysqli_fetch_array($counttriberesult1)){
                                                $counttribeid1=$counttriberow1['id'];

                                                $counttribe2="SELECT * FROM `table2` WHERE id='$counttribeid1'";
                                                $counttriberesult2=mysqli_query($conn,$counttribe2);
                                                $countnumrowstribe++;
                                                $existtribe=true;
                                            }
                                        
                                        }

                                        if($existtribe==false){
                                            $emptycounttribe=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Tribe</b></p>
                                                    <p class="info-p"  ><i class="fas fa-users" style="margin-right:5px;"></i>Tribe : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycounttribe ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Tribe</b></p>
                                                    <p class="info-p"  ><i class="fas fa-users" style="margin-right:5px;"></i>Tribe : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowstribe ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Name</th>
                                                <th style="color:#076C07;font-weight:bold">Tribe</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            $querytribe="SELECT * FROM `table2` WHERE tribe='$search' ORDER BY mainid";
                                            $resulttribe=mysqli_query($conn,$querytribe);

                                            while($rowtribe=mysqli_fetch_array($resulttribe)){
                                            $tribeid=$rowtribe['mainid'];
                                            $tribehorm=$rowtribe['horm'];

                                            $querytribe1="SELECT * FROM `table1` WHERE id='$tribeid' and barangay='$_SESSION[userbarangay]'";
                                            $resulttribe1=mysqli_query($conn, $querytribe1);

                                            while($rowtribe1=mysqli_fetch_array($resulttribe1)){
                                            $checkertribe=false;
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                            <?php if($tribehorm=="Head"){ ?>
                                                <td data-label="Family ID"><b><?php echo $rowtribe['mainid']; ?></b></td>
                                                <td data-label="Name"><?php echo $rowtribe['fullname']; ?> (<?php echo $rowtribe['horm'] ?>) </td>                             
                                                <td data-label="Tribe" style="color:#076C07;font-weight:bold"><?php echo $rowtribe['tribe']; ?></td> 
                                                <td data-label="Sex"><?php echo $rowtribe['sex']; ?></td>     
                                                <td data-label="Purok"><?php echo $rowtribe1['purok']; ?></td>    
                                                <td data-label="Barangay"><?php echo $rowtribe1['barangay']; ?></td>  
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowtribe1['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>              
                                                <?php } 
                                                    
                                                else{
                                                ?>
                                                <td data-label="Family ID"><b><?php echo $rowtribe['mainid']; ?></b></td>
                                                <td data-label="Name"><?php echo $rowtribe['fullname']; ?> (<?php echo $rowtribe['horm'] ?>) </td>                             
                                                <td data-label="Tribe" style="color:#076C07;font-weight:bold"><?php echo $rowtribe['tribe']; ?></td>  
                                                <td data-label="Sex"><?php echo $rowtribe['sex']; ?></td>
                                                <td data-label="Purok"><?php echo $rowtribe1['purok']; ?></td>    
                                                <td data-label="Barangay"><?php echo $rowtribe1['barangay']; ?></td>  
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="table2" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowtribe['id']; ?> (Member)" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>    
                                                </td>              
                                                <?php } ?>              
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            }

                                            // this will execute if the result is not found
                                            if($checkertribe==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>                               
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of tribe condition



                                    //sex codition if it is searched
                                    else if($searchby=="Sex"){
                                        $checkersex=true;

                                        $_SESSION['viewcondition']=38;

                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                        
                                        ?>
                                        <div class="table-div">  
                                        <?php 

                                        if($search=="-"){
                                            $search="";
                                        }

                                        $countsex="SELECT * FROM `table2` WHERE sex='$search'";
                                        $countsexresult=mysqli_query($conn,$countsex);
                                        $countnumrowssex=0;
                                        $existsex=false;

                                        while($countsexrow=mysqli_fetch_array($countsexresult)){
                                            $countsexmainid=$countsexrow['mainid'];
                                            $countsexid=$countsexrow['id'];

                                            $countsex1="SELECT * FROM `table1` WHERE id='$countsexmainid' and barangay='$_SESSION[userbarangay]' ";
                                            $countsexresult1=mysqli_query($conn,$countsex1);

                                            while($countsexrow1=mysqli_fetch_array($countsexresult1)){
                                                $countsexid1=$countsexrow1['id'];

                                                $countsex2="SELECT * FROM `table2` WHERE id='$countsexid1'";
                                                $countsexresult2=mysqli_query($conn,$countsex2);
                                                $countnumrowssex++;
                                                $existsex=true;
                                            }
                                        
                                        }

                                        if($existsex==false){
                                            $emptycountsex=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Sex</b></p>
                                                    <p class="info-p"  ><i class="fas fa-venus-mars" style="margin-right:5px;"></i>Sex : <b><?php echo $search ?></b></p>
                                                </div>
                                            
                                                <div class="p-div count-div1" >
                                                    <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountsex ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Sex</b></p>
                                                    <p class="info-p"  ><i class="fas fa-venus-mars" style="margin-right:5px;"></i>Sex : <b><?php echo $search ?></b></p>
                                                </div>
                                        
                                                <div class="count-div" >
                                                    <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowssex ?></b></p>
                                                    <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Name</th>
                                                <th style="color:#076C07;font-weight:bold">Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            $querysex="SELECT * FROM `table2` WHERE sex='$search' ORDER BY mainid";
                                            $resultsex=mysqli_query($conn,$querysex);

                                            while($rowsex=mysqli_fetch_array($resultsex)){
                                            $sexid=$rowsex['mainid'];
                                            $sexhorm=$rowsex['horm'];

                                            $querysex1="SELECT * FROM `table1` WHERE id='$sexid' and barangay='$_SESSION[userbarangay]'";
                                            $resultsex1=mysqli_query($conn, $querysex1);

                                            while($rowsex1=mysqli_fetch_array($resultsex1)){
                                            $checkersex=false;
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                            <?php if($sexhorm=="Head"){ ?>
                                                <td data-label="Family ID"><b><?php echo $rowsex['mainid']; ?></b></td>
                                                <td data-label="Name"><?php echo $rowsex['fullname']; ?> (<?php echo $rowsex['horm'] ?>) </td>                             
                                                <td data-label="Sex" style="color:#076C07;font-weight:bold"><?php echo $rowsex['sex']; ?></td>  
                                                <td data-label="Purok"><?php echo $rowsex1['purok']; ?></td>    
                                                <td data-label="Barangay"><?php echo $rowsex1['barangay']; ?></td>  
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowsex1['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>              
                                                <?php } 
                                                    
                                                else{
                                                ?>
                                                <td data-label="Family ID"><b><?php echo $rowsex['mainid']; ?></b></td>
                                                <td data-label="Name"><?php echo $rowsex['fname']; ?> <?php echo $rowsex['mname']; ?> <?php echo $rowsex['lname']; ?> (<?php echo $rowsex['horm'] ?>) </td>                             
                                                <td data-label="Sex" style="color:#076C07;font-weight:bold"><?php echo $rowsex['sex']; ?></td>  
                                                <td data-label="Purok"><?php echo $rowsex1['purok']; ?></td>    
                                                <td data-label="Barangay"><?php echo $rowsex1['barangay']; ?></td>  
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="table2" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowsex['id']; ?> (Member)" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>    
                                                </td>              
                                                <?php } ?>              
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            }

                                            // this will execute if the result is not found
                                            if($checkersex==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>                                
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of sex condition


                                    //b-date codition if it is searched
                                    else if($searchby=="Birth Date"){
                                        $checkerbdate=true;

                                        $_SESSION['viewcondition']=7;
                                        
                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                        ?>
                                       
                                        <div class="table-div">
                                        <?php 
                                        $countbdate="SELECT * FROM `table2` WHERE bdate='$search'";
                                        $countbdateresult=mysqli_query($conn,$countbdate);
                                        $countnumrowsbdate=0;
                                        $existbdate=false;

                                        while($countbdaterow=mysqli_fetch_array($countbdateresult)){
                                            $countbdatemainid=$countbdaterow['mainid'];
                                            $countbdateid=$countbdaterow['id'];

                                            $countbdate1="SELECT * FROM `table1` WHERE id='$countbdatemainid' and barangay='$_SESSION[userbarangay]' ";
                                            $countbdateresult1=mysqli_query($conn,$countbdate1);

                                            while($countbdaterow1=mysqli_fetch_array($countbdateresult1)){
                                                $countbdateid1=$countbdaterow1['id'];

                                                $countbdate2="SELECT * FROM `table2` WHERE id='$countbdateid1'";
                                                $countbdateresult2=mysqli_query($conn,$countbdate2);
                                                $countnumrowsbdate++;
                                                $existbdate=true;
                                            }
                                        
                                        }

                                        if($existbdate==false){
                                            $emptycountbdate=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Birth Date</b></p>
                                                    <p class="info-p"  ><i class="fas fa-calendar-week" style="margin-right:5px;"></i>Birth Date : <b><?php echo $search ?></b></p>
                                                </div>
                                            
                                                <div class="p-div count-div1">
                                                    <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountbdate ?></b></p></p> 
                                                </div>
                                                
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div" >
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Birth Date</b></p>
                                                    <p class="info-p" ><i class="fas fa-calendar-week" style="margin-right:5px"></i>Birth Date : <b><?php echo $search ?></b></p>
                                                </div>
                                            
                                                <div class="p-div count-div1" >
                                                    <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px"></i>Total : <b><?php echo $countnumrowsbdate ?></b></p>
                                                    <p class="info-p" ><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>  
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Name</th>
                                                <th style="color:#076C07;font-weight:bold">Birth Date (yyyy-mm-dd)</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            $querybdate="SELECT * FROM `table2` WHERE bdate='$search' ORDER BY mainid";
                                            $resultbdate=mysqli_query($conn,$querybdate);

                                            while($rowbdate=mysqli_fetch_array($resultbdate)){
                                            $bdateid=$rowbdate['mainid'];
                                            $bdatehorm=$rowbdate['horm'];

                                            $querybdate1="SELECT * FROM `table1` WHERE id='$bdateid' and barangay='$_SESSION[userbarangay]'";
                                            $resultbdate1=mysqli_query($conn, $querybdate1);

                                            while($rowbdate1=mysqli_fetch_array($resultbdate1)){
                                            $checkerbdate=false;
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                            <?php if($bdatehorm=="Head"){ ?>
                                                <td data-label="Mainid"><b><?php echo $rowbdate['mainid']; ?></b></td>  
                                                <td data-label="Full Name"><?php echo $rowbdate['fullname']; ?> (<?php echo $rowbdate['horm'] ?>) </td>                             
                                                <td data-label="Birth Date" style="color:#076C07;font-weight:bold"><?php echo $rowbdate['bdate']; ?></td> 
                                                <td data-label="Sex"><?php echo $rowbdate['sex']; ?></td>   
                                                <td data-label="Purok"><?php echo $rowbdate1['purok']; ?></td>  
                                                <td data-label="Barangay"><?php echo $rowbdate1['barangay']; ?></td>    
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowbdate1['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>              
                                                <?php } 
                                                    
                                                else{
                                                ?>
                                                <td data-label="Mainid"><b><?php echo $rowbdate['mainid']; ?></b></td>  
                                                <td data-label="Name"><?php echo $rowbdate['fullname']; ?> (<?php echo $rowbdate['horm'] ?>) </td>                             
                                                <td data-label="Birth Date" style="color:#076C07;font-weight:bold"><?php echo $rowbdate['bdate']; ?></td>  
                                                <td data-label="Sex"><?php echo $rowbdate['sex']; ?></td>   
                                                <td data-label="Purok"><?php echo $rowbdate1['purok']; ?></td>    
                                                <td data-label="Barangay"><?php echo $rowbdate1['barangay']; ?></td>  
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="table2" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowbdate['id']; ?> (Member)" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>    
                                                </td>              
                                                <?php } ?>                
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            }

                                            // this will execute if the result is not found
                                            if($checkerbdate==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>  
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>                            
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of bdate condition


                                    //age codition if it is searched
                                    else if($searchby=="Age"){
                                        $checkerage=true;

                                        $_SESSION['viewcondition']=3;
                                        
                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                        ?>
                                        <div class="table-div">  
                                        <?php 
                                        $countage="SELECT * FROM `table2` WHERE age='$search'";
                                        $countageresult=mysqli_query($conn,$countage);
                                        $countnumrowsage=0;
                                        $existage=false;

                                        while($countagerow=mysqli_fetch_array($countageresult)){
                                            $countagemainid=$countagerow['mainid'];
                                            $countageid=$countagerow['id'];

                                            $countage1="SELECT * FROM `table1` WHERE id='$countagemainid' and barangay='$_SESSION[userbarangay]' ";
                                            $countageresult1=mysqli_query($conn,$countage1);

                                            while($countagerow1=mysqli_fetch_array($countageresult1)){
                                                $countageid1=$countagerow1['id'];

                                                $countage2="SELECT * FROM `table2` WHERE id='$countageid1'";
                                                $countageresult2=mysqli_query($conn,$countage2);
                                                $countnumrowsage++;
                                                $existage=true;
                                            }
                                        
                                        }

                                        if($existage==false){
                                            $emptycountage=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Age</b></p>
                                                    <p class="info-p"  ><i class="fas fa-user" style="margin-right:5px;"></i>Age : <b><?php echo $search ?></b></p>
                                                </div>
                                            
                                                <div class="p-div count-div1">
                                                    <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountage ?></b></p>
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Age</b></p>
                                                    <p class="info-p"  ><i class="fas fa-user" style="margin-right:5px;"></i>Age : <b><?php echo $search ?></b></p>
                                                </div>
                                            
                                                <div class="p-div count-div1">
                                                    <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsage ?></b></p>
                                                    <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Name</th>
                                                <th style="color:#076C07;font-weight:bold">Age</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            $queryage="SELECT * FROM `table2` WHERE age='$search' ORDER BY mainid";
                                            $resultage=mysqli_query($conn,$queryage);

                                            while($rowage=mysqli_fetch_array($resultage)){
                                            $ageid=$rowage['mainid'];
                                            $agehorm=$rowage['horm'];

                                            $queryage1="SELECT * FROM `table1` WHERE id='$ageid' and barangay='$_SESSION[userbarangay]'";
                                            $resultage1=mysqli_query($conn,$queryage1);

                                            while($rowage1=mysqli_fetch_array($resultage1)){
                                            $checkerage=false;
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                            <?php if($agehorm=="Head"){ ?>
                                                <td data-label="Mainid"><b><?php echo $rowage['mainid']; ?></b></td>  
                                                <td data-label="Full Name"><?php echo $rowage['fullname']; ?> (<?php echo $rowage['horm'] ?>) </td>                             
                                                <td data-label="Age" style="color:#076C07;font-weight:bold"><?php echo $rowage['age']; ?></td>  
                                                <td data-label="Sex" ><?php echo $rowage['sex']; ?></td>  
                                                <td data-label="Purok"><?php echo $rowage1['purok']; ?></td>
                                                <td data-label="Barangay"><?php echo $rowage1['barangay']; ?></td>      
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowage1['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>              
                                                <?php } 
                                                    
                                                else{
                                                ?>
                                                <td data-label="Mainid"><b><?php echo $rowage['mainid']; ?></b></td>
                                                <td data-label="Name"><?php echo $rowage['fullname']; ?> (<?php echo $rowage['horm'] ?>) </td>                             
                                                <td data-label="Age" style="color:#076C07;font-weight:bold"><?php echo $rowage['age']; ?></td>  
                                                <td data-label="Sex"><?php echo $rowage['sex']; ?></td>  
                                                <td data-label="Purok"><?php echo $rowage1['purok']; ?></td>   
                                                <td data-label="Barangay"><?php echo $rowage1['barangay']; ?></td>   
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="table2" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowage['id']; ?> (Member)" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>    
                                                </td>              
                                                <?php } ?> 
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            }

                                            // this will execute if the result is not found
                                            if($checkerage==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>                                
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of age condition



                                    //religion codition if it is searched
                                    else if($searchby=="Religion"){
                                        $checkerreligion=true;

                                        $_SESSION['viewcondition']=36;

                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                        ?>
                                        <div class="table-div">  
                                        <?php 
                                        $countreligion="SELECT * FROM `table2` WHERE religion='$search'";
                                        $countreligionresult=mysqli_query($conn,$countreligion);
                                        $countnumrowsreligion=0;
                                        $existreligion=false;

                                        while($countreligionrow=mysqli_fetch_array($countreligionresult)){
                                            $countreligionmainid=$countreligionrow['mainid'];
                                            $countreligionid=$countreligionrow['id'];

                                            $countreligion1="SELECT * FROM `table1` WHERE id='$countreligionmainid' and barangay='$_SESSION[userbarangay]' ";
                                            $countreligionresult1=mysqli_query($conn,$countreligion1);

                                            while($countreligionrow1=mysqli_fetch_array($countreligionresult1)){
                                                $countreligionid1=$countreligionrow1['id'];

                                                $countreligion2="SELECT * FROM `table2` WHERE id='$countreligionid1'";
                                                $countreligionresult2=mysqli_query($conn,$countreligion2);
                                                $countnumrowsreligion++;
                                                $existreligion=true;
                                            }
                                        
                                        }

                                        if($existreligion==false){
                                            $emptycountreligion=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Religion</b></p>
                                                    <p class="info-p"  ><i class="fas fa-pray" style="margin-right:5px;"></i>Religion : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountreligion ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Religion</b></p>
                                                    <p class="info-p"  ><i class="fas fa-pray" style="margin-right:5px;"></i>Religion : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsreligion ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Name</th>
                                                <th style="color:#076C07;font-weight:bold">Religion</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            $queryreligion="SELECT * FROM `table2` WHERE religion='$search' ORDER BY mainid";
                                            $resultreligion=mysqli_query($conn,$queryreligion);

                                            while($rowreligion=mysqli_fetch_array($resultreligion)){
                                            $religionid=$rowreligion['mainid'];
                                            $religionhorm=$rowreligion['horm'];

                                            $queryreligion1="SELECT * FROM `table1` WHERE id='$religionid' and barangay='$_SESSION[userbarangay]'";
                                            $resultreligion1=mysqli_query($conn,$queryreligion1);

                                            while($rowreligion1=mysqli_fetch_array($resultreligion1)){
                                            $checkerreligion=false;
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                            <?php if($religionhorm=="Head"){ ?>
                                                <td data-label="Family ID"><b><?php echo $rowreligion['mainid']; ?></b></td>  
                                                <td data-label="Name"><?php echo $rowreligion['fullname']; ?> (<?php echo $rowreligion['horm'] ?>) </td>                             
                                                <td data-label="Religion" style="color:#076C07;font-weight:bold"><?php echo $rowreligion['religion']; ?></td>  
                                                <td data-label="Sex"><?php echo $rowreligion['sex']; ?></td>  
                                                <td data-label="Purok"><?php echo $rowreligion1['purok']; ?></td>  
                                                <td data-label="Barangay"><?php echo $rowreligion1['barangay']; ?></td>    
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowreligion1['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>              
                                                <?php } 
                                                    
                                                else{
                                                ?>
                                                <td data-label="Family ID"><b><?php echo $rowreligion['mainid']; ?></b></td>
                                                <td data-label="Name"><?php echo $rowreligion['fullname']; ?> (<?php echo $rowreligion['horm'] ?>) </td>                             
                                                <td data-label="Religion" style="color:#076C07;font-weight:bold"><?php echo $rowreligion['religion']; ?></td>  
                                                <td data-label="Sex"><?php echo $rowreligion['sex']; ?></td>  
                                                <td data-label="Purok"><?php echo $rowreligion1['purok']; ?></td>
                                                <td data-label="Barangay"><?php echo $rowreligion1['barangay']; ?></td>      
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="table2" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowreligion['id']; ?> (Member)" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>    
                                                </td>              
                                                <?php } ?>               
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            }

                                            // this will execute if the result is not found
                                            if($checkerreligion==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>                           
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of religion condition



                                    //education codition if it is searched
                                    else if($searchby=="Highest Educational Attainment"){
                                        $checkereducation=true;

                                        $_SESSION['viewcondition']=17;
                                        
                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                        ?>
                                        <div class="table-div">  
                                        <?php 
                                        $counteducation="SELECT * FROM `table2` WHERE education='$search'";
                                        $counteducationresult=mysqli_query($conn,$counteducation);
                                        $countnumrowseducation=0;
                                        $existeducation=false;

                                        while($counteducationrow=mysqli_fetch_array($counteducationresult)){
                                            $counteducationmainid=$counteducationrow['mainid'];
                                            $counteducationid=$counteducationrow['id'];

                                            $counteducation1="SELECT * FROM `table1` WHERE id='$counteducationmainid' and barangay='$_SESSION[userbarangay]' ";
                                            $counteducationresult1=mysqli_query($conn,$counteducation1);

                                            while($counteducationrow1=mysqli_fetch_array($counteducationresult1)){
                                                $counteducationid1=$counteducationrow1['id'];

                                                $counteducation2="SELECT * FROM `table2` WHERE id='$counteducationid1'";
                                                $counteducationresult2=mysqli_query($conn,$counteducation2);
                                                $countnumrowseducation++;
                                                $existeducation=true;
                                            }
                                        
                                        }

                                        if($existeducation==false){
                                            $emptycounteducation=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Highest Educational Attainment</b></p>
                                                    <p class="info-p"  ><i class="fas fa-user-graduate" style="margin-right:5px;"></i>Highest Educational Attainment : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycounteducation ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Highest Educational Attainment</b></p>
                                                    <p class="info-p"  ><i class="fas fa-user-graduate" style="margin-right:5px;"></i>Highest Educational Attainment : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowseducation ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Name</th>
                                                <th style="color:#076C07;font-weight:bold">Highest Educational Attainment</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            $queryeducation="SELECT * FROM `table2` WHERE education='$search' ORDER BY mainid";
                                            $resulteducation=mysqli_query($conn,$queryeducation);

                                            while($roweducation=mysqli_fetch_array($resulteducation)){
                                            $educationid=$roweducation['mainid'];
                                            $educationhorm=$roweducation['horm'];

                                            $queryeducation1="SELECT * FROM `table1` WHERE id='$educationid' and barangay='$_SESSION[userbarangay]'";
                                            $resulteducation1=mysqli_query($conn, $queryeducation1);

                                            while($roweducation1=mysqli_fetch_array($resulteducation1)){
                                            $checkereducation=false;
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                            <?php if($educationhorm=="Head"){ ?>
                                                <td data-label="Family ID"><b><?php echo $roweducation['mainid']; ?></b></td>    
                                                <td data-label="Name"><?php echo $roweducation['fullname']; ?> (<?php echo $roweducation['horm'] ?>) </td>                             
                                                <td data-label="Highest Educational Attainment" style="color:#076C07;font-weight:bold"><?php echo $roweducation['education']; ?></td>  
                                                <td data-label="Sex"><?php echo $roweducation['sex']; ?></td> 
                                                <td data-label="Purok"><?php echo $roweducation1['purok']; ?></td> 
                                                <td data-label="Barangay"><?php echo $roweducation1['barangay']; ?></td>     
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $roweducation1['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>              
                                                <?php } 
                                                    
                                                else{
                                                ?>
                                                <td data-label="Family ID"><b><?php echo $roweducation['mainid']; ?></b></td>    
                                                <td data-label="Name"><?php echo $roweducation['fullname']; ?> (<?php echo $roweducation['horm'] ?>) </td>                             
                                                <td data-label="Highest Educational Attainment" style="color:#076C07;font-weight:bold"><?php echo $roweducation['education']; ?></td>  
                                                <td data-label="Sex"><?php echo $roweducation['sex']; ?></td> 
                                                <td data-label="Purok"><?php echo $roweducation1['purok']; ?></td>  
                                                <td data-label="Barangay"><?php echo $roweducation1['barangay']; ?></td>    
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="table2" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $roweducation['id']; ?> (Member)" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>    
                                                </td>              
                                                <?php } ?>                
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            }

                                            // this will execute if the result is not found
                                            if($checkereducation==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>  
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>  
                                                <td data-label="-"><?php echo "-"; ?></td>                                                       
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of education condition



                                    //occupation codition if it is searched
                                    else if($searchby=="Occupation"){
                                        $checkeroccupation=true;

                                        $_SESSION['viewcondition']=30;

                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                        ?>
                                        <div class="table-div">  
                                        <?php 
                                       
                                        $countoccupation="SELECT * FROM `table2` WHERE occupation='$search'";
                                        $countoccupationresult=mysqli_query($conn,$countoccupation);
                                        $countnumrowsoccupation=0;
                                        $existoccupation=false;
                                        

                                        while($countoccupationrow=mysqli_fetch_array($countoccupationresult)){
                                            $countoccupationmainid=$countoccupationrow['mainid'];
                                            $countoccupationid=$countoccupationrow['id'];

                                            $countoccupation1="SELECT * FROM `table1` WHERE id='$countoccupationmainid' and barangay='$_SESSION[userbarangay]' ";
                                            $countoccupationresult1=mysqli_query($conn,$countoccupation1);

                                            while($countoccupationrow1=mysqli_fetch_array($countoccupationresult1)){
                                                $countoccupationid1=$countoccupationrow1['id'];

                                                $countoccupation2="SELECT * FROM `table2` WHERE id='$countoccupationid1'";
                                                $countoccupationresult2=mysqli_query($conn,$countoccupation2);
                                                $countnumrowsoccupation++;
                                                $existoccupation=true;
                                            }
                                        
                                        }

                                        if($existoccupation==false){
                                            $emptycountoccupation=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Occupation</b></p>
                                                    <p class="info-p"  ><i class="fas fa-briefcase" style="margin-right:5px;"></i>Occupation : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountoccupation ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Occupation</b></p>
                                                    <p class="info-p"  ><i class="fas fa-briefcase" style="margin-right:5px;"></i>Occupation : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsoccupation ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Name</th>
                                                <th style="color:#076C07;font-weight:bold">Occupation</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            $queryoccupation="SELECT * FROM `table2` WHERE occupation='$search' ORDER BY mainid";
                                            $resultoccupation=mysqli_query($conn,$queryoccupation);

                                            while($rowoccupation=mysqli_fetch_array($resultoccupation)){
                                            $occupationid=$rowoccupation['mainid'];
                                            $occupationhorm=$rowoccupation['horm'];

                                            $queryoccupation1="SELECT * FROM `table1` WHERE id='$occupationid' and barangay='$_SESSION[userbarangay]'";
                                            $resultoccupation1=mysqli_query($conn,$queryoccupation1);

                                            while($rowoccupation1=mysqli_fetch_array($resultoccupation1)){
                                            $checkeroccupation=false;
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                            <?php if($occupationhorm=="Head"){ ?>
                                                <td data-label="Family ID"><b><?php echo $rowoccupation['mainid']; ?></b></td>  
                                                <td data-label="Name"><?php echo $rowoccupation['fullname']; ?> (<?php echo $rowoccupation['horm'] ?>) </td>                             
                                                <td data-label="Occupation" style="color:#076C07;font-weight:bold"><?php echo $rowoccupation['occupation']; ?></td> 
                                                <td data-label="Sex"><?php echo $rowoccupation['sex']; ?></td>   
                                                <td data-label="Purok"><?php echo $rowoccupation1['purok']; ?></td>  
                                                <td data-label="Barangay"><?php echo $rowoccupation1['barangay']; ?></td>    
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowoccupation1['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>              
                                                <?php } 
                                                    
                                                else{
                                                ?>
                                                <td data-label="Family ID"><b><?php echo $rowoccupation['mainid']; ?></b></td>  
                                                <td data-label="Name"><?php echo $rowoccupation['fullname']; ?> (<?php echo $rowoccupation['horm'] ?>) </td>                             
                                                <td data-label="Occupation" style="color:#076C07;font-weight:bold"><?php echo $rowoccupation['occupation']; ?></td>  
                                                <td data-label="Sex"><?php echo $rowoccupation['sex']; ?></td>  
                                                <td data-label="Purok"><?php echo $rowoccupation1['purok']; ?></td> 
                                                <td data-label="Barangay"><?php echo $rowoccupation1['barangay']; ?></td>     
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="table2" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowoccupation['id']; ?> (Member)" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>    
                                                </td>              
                                                <?php } ?>               
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            }

                                            // this will execute if the result is not found
                                            if($checkeroccupation==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>  
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>                                                       
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of occupation condition                                    


                                    //relation codition if it is searched
                                    else if($searchby=="Relation to Head of the Family"){
                                        $checkerrelation=true;

                                        $_SESSION['viewcondition']=35;

                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                        ?>
                                        <?php 
                                        $countrelation="SELECT * FROM `table2` WHERE relation='$search'";
                                        $countrelationresult=mysqli_query($conn,$countrelation);
                                        $countnumrowsrelation=0;
                                        $existrelation=false;

                                        while($countrelationrow=mysqli_fetch_array($countrelationresult)){
                                            $countrelationmainid=$countrelationrow['mainid'];
                                            $countrelationid=$countrelationrow['id'];

                                            $countrelation1="SELECT * FROM `table1` WHERE id='$countrelationmainid' and barangay='$_SESSION[userbarangay]' ";
                                            $countrelationresult1=mysqli_query($conn,$countrelation1);

                                            while($countrelationrow1=mysqli_fetch_array($countrelationresult1)){
                                                $countrelationid1=$countrelationrow1['id'];

                                                $countrelation2="SELECT * FROM `table2` WHERE id='$countrelationid1'";
                                                $countrelationresult2=mysqli_query($conn,$countrelation2);
                                                $countnumrowsrelation++;
                                                $existrelation=true;
                                            }
                                        
                                        }

                                        if($existrelation==false){
                                            $emptycountrelation=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Relation to Head of the Family</b></p>
                                                    <p class="info-p"  ><i class="fas fa-users" style="margin-right:5px;"></i>Relation to Head of the Family : <b><?php echo $search ?></b></p>
                                                </div>
                                            
                                                <div class="p-div count-div1">
                                                    <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountrelation ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Relation to Head of the Family</b></p>
                                                    <p class="info-p"  ><i class="fas fa-users" style="margin-right:5px;"></i>Relation to Head of the Family : <b><?php echo $search ?></b></p>
                                                </div>
                                            
                                                <div class="p-div count-div1">
                                                    <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsrelation ?></b></p>
                                                    <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <div class="table-div">  
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Name</th>
                                                <th style="color:#076C07;font-weight:bold">Relation to Head of the Family</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            $queryrelation="SELECT * FROM `table2` WHERE relation='$search' ORDER BY mainid";
                                            $resultrelation=mysqli_query($conn,$queryrelation);

                                            while($rowrelation=mysqli_fetch_array($resultrelation)){
                                            $relationid=$rowrelation['mainid'];
                                            $relationhorm=$rowrelation['horm'];

                                            $queryrelation1="SELECT * FROM `table1` WHERE id='$relationid' and barangay='$_SESSION[userbarangay]'";
                                            $resultrelation1=mysqli_query($conn, $queryrelation1);

                                            while($rowrelation1=mysqli_fetch_array($resultrelation1)){
                                            $checkerrelation=false;
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                            <?php if($relationhorm=="Head"){ ?>
                                                <td data-label="Family ID"><b><?php echo $rowrelation['mainid']; ?></b></td>  
                                                <td data-label="Name"><?php echo $rowrelation['fullname']; ?> (<?php echo $rowrelation['horm'] ?>) </td>                             
                                                <td data-label="Relation to Head of the family" style="color:#076C07;font-weight:bold"><?php echo $rowrelation['relation']; ?></td>  
                                                <td data-label="Sex"><?php echo $rowrelation['sex']; ?></td>  
                                                <td data-label="Purok"><?php echo $rowrelation1['purok']; ?></td>
                                                <td data-label="Barangay"><?php echo $rowrelation1['barangay']; ?></td>     
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowrelation1['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>              
                                                <?php } 
                                                    
                                                else{
                                                ?>
                                                <td data-label="Family ID"><b><?php echo $rowrelation['mainid']; ?></b></td>  
                                                <td data-label="Name"><?php echo $rowrelation['fullname']; ?> (<?php echo $rowrelation['horm'] ?>) </td>                             
                                                <td data-label="Relation to Head of the family" style="color:#076C07;font-weight:bold"><?php echo $rowrelation['relation']; ?></td>  
                                                <td data-label="Sex"><?php echo $rowrelation['sex']; ?></td>  
                                                <td data-label="Purok"><?php echo $rowrelation1['purok']; ?></td> 
                                                <td data-label="Barangay"><?php echo $rowrelation1['barangay']; ?></td>     
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="table2" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowrelation['id']; ?> (Member)" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>    
                                                </td>              
                                                <?php } ?>              
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            }

                                            // this will execute if the result is not found
                                            if($checkerrelation==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>  
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>  
                                                <td data-label="-"><?php echo "-"; ?></td>                                                          
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of Relation condition
                                    


                                    //pwd codition if it is searched
                                    else if($searchby=="PWD"){
                                        $checkerpwd=true;

                                        $_SESSION['viewcondition']=34;

                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                        ?>
                                        <div class="table-div"> 
                                        <?php 
                                        $countpwd="SELECT * FROM `table2` WHERE pwd='$search'";
                                        $countpwdresult=mysqli_query($conn,$countpwd);
                                        $countnumrowspwd=0;
                                        $existpwd=false;

                                        while($countpwdrow=mysqli_fetch_array($countpwdresult)){
                                            $countpwdmainid=$countpwdrow['mainid'];
                                            $countpwdid=$countpwdrow['id'];

                                            $countpwd1="SELECT * FROM `table1` WHERE id='$countpwdmainid' and barangay='$_SESSION[userbarangay]' ";
                                            $countpwdresult1=mysqli_query($conn,$countpwd1);

                                            while($countpwdrow1=mysqli_fetch_array($countpwdresult1)){
                                                $countpwdid1=$countpwdrow1['id'];

                                                $countpwd2="SELECT * FROM `table2` WHERE id='$countpwdid1'";
                                                $countpwdresult2=mysqli_query($conn,$countpwd2);
                                                $countnumrowspwd++;
                                                $existpwd=true;
                                            }
                                        
                                        }

                                        if($existpwd==false){
                                            $emptycountpwd=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>PWD</b></p>
                                                    <p class="info-p"  ><i class="fas fa-blind" style="margin-right:5px;"></i>PWD : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountpwd ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>PWD</b></p>
                                                    <p class="info-p"  ><i class="fas fa-blind" style="margin-right:5px;"></i>PWD : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowspwd ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?> 
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Name</th>
                                                <th style="color:#076C07;font-weight:bold">PWD</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            $querypwd="SELECT * FROM `table2` WHERE pwd='$search' ORDER BY mainid";
                                            $resultpwd=mysqli_query($conn,$querypwd);

                                            while($rowpwd=mysqli_fetch_array($resultpwd)){
                                            $pwdid=$rowpwd['mainid'];
                                            $pwdhorm=$rowpwd['horm'];

                                            $querypwd1="SELECT * FROM `table1` WHERE id='$pwdid' and barangay='$_SESSION[userbarangay]'";
                                            $resultpwd1=mysqli_query($conn,$querypwd1);

                                            while($rowpwd1=mysqli_fetch_array($resultpwd1)){
                                            $checkerpwd=false;
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                            <?php if($pwdhorm=="Head"){ ?>
                                                <td data-label="Family ID"><b><?php echo $rowpwd['mainid']; ?></b></td>  
                                                <td data-label="Name"><?php echo $rowpwd['fullname']; ?> (<?php echo $rowpwd['horm'] ?>) </td>                             
                                                <td data-label="PWD" style="color:#076C07;font-weight:bold"><?php echo $rowpwd['pwd']; ?></td>  
                                                <td data-label="Sex"><?php echo $rowpwd['sex']; ?></td>    
                                                <td data-label="Purok"><?php echo $rowpwd1['purok']; ?></td>    
                                                <td data-label="Barangay"><?php echo $rowpwd1['barangay']; ?></td>  
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowpwd1['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>              
                                                <?php } 
                                                    
                                                else{
                                                ?>
                                                <td data-label="Family ID"><b><?php echo $rowpwd['mainid']; ?></b></td>
                                                <td data-label="Name"><?php echo $rowpwd['fullname']; ?> (<?php echo $rowpwd['horm'] ?>) </td>                             
                                                <td data-label="PWD" style="color:#076C07;font-weight:bold"><?php echo $rowpwd['pwd']; ?></td>  
                                                <td data-label="Sex"><?php echo $rowpwd['sex']; ?></td> 
                                                <td data-label="Purok"><?php echo $rowpwd1['purok']; ?></td>
                                                <td data-label="Barangay"><?php echo $rowpwd1['barangay']; ?></td>      
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="table2" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowpwd['id']; ?> (Member)" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>    
                                                </td>              
                                                <?php } ?>                 
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            }

                                            // this will execute if the result is not found
                                            if($checkerpwd==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>  
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                          
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of pwd condition 



                                    //ip codition if it is searched
                                    else if($searchby=="IP"){
                                        $checkerip=true;
                                        
                                        $_SESSION['viewcondition']=22;
                                        
                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                        
                                        ?>
                                        
                                        <div class="table-div"> 
                                        <?php 
                                        $countip="SELECT * FROM `table2` WHERE ip='$search'";
                                        $countipresult=mysqli_query($conn,$countip);
                                        $countnumrowsip=0;
                                        $existip=false;

                                        while($countiprow=mysqli_fetch_array($countipresult)){
                                            $countipmainid=$countiprow['mainid'];
                                            $countipid=$countiprow['id'];

                                            $countip1="SELECT * FROM `table1` WHERE id='$countipmainid' and barangay='$_SESSION[userbarangay]' ";
                                            $countipresult1=mysqli_query($conn,$countip1);

                                            while($countiprow1=mysqli_fetch_array($countipresult1)){
                                                $countipid1=$countiprow1['id'];

                                                $countip2="SELECT * FROM `table2` WHERE id='$countipid1'";
                                                $countipresult2=mysqli_query($conn,$countip2);
                                                $countnumrowsip++;
                                                $existip=true;
                                            }
                                        
                                        }

                                        if($existip==false){
                                            $emptycountip=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>IP</b></p>
                                                    <p class="info-p"  ><i class="fas fa-user" style="margin-right:5px;"></i>IP : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountip ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>IP</b></p>
                                                    <p class="info-p"  ><i class="fas fa-user" style="margin-right:5px;"></i>IP : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsip ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>  
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Name</th>
                                                <th style="color:#076C07;font-weight:bold">IP</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            $queryip="SELECT * FROM `table2` WHERE ip='$search' ORDER BY mainid";
                                            $resultip=mysqli_query($conn,$queryip);

                                            while($rowip=mysqli_fetch_array($resultip)){
                                            $ipid=$rowip['mainid'];
                                            $iphorm=$rowip['horm'];

                                            $queryip1="SELECT * FROM `table1` WHERE id='$ipid' and barangay='$_SESSION[userbarangay]'";
                                            $resultip1=mysqli_query($conn,$queryip1);

                                            while($rowip1=mysqli_fetch_array($resultip1)){
                                            $checkerip=false;
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                            <?php if($iphorm=="Head"){ ?>
                                                <td data-label="Family ID"><b><?php echo $rowip['mainid']; ?></b></td>  
                                                <td data-label="Name"><?php echo $rowip['fullname']; ?> (<?php echo $rowip['horm'] ?>) </td>                             
                                                <td data-label="IP" style="color:#076C07;font-weight:bold"><?php echo $rowip['ip']; ?></td>  
                                                <td data-label="Sex"><?php echo $rowip['sex']; ?></td>  
                                                <td data-label="Barangay"><?php echo $rowip1['barangay']; ?></td>  
                                                <td data-label="Purok"><?php echo $rowip1['purok']; ?></td>    
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowip1['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>              
                                                <?php } 
                                                    
                                                else{
                                                ?>
                                                <td data-label="Family ID"><b><?php echo $rowip['mainid']; ?></b></td>  
                                                <td data-label="Name"><?php echo $rowip['fullname']; ?> (<?php echo $rowip['horm'] ?>) </td>                             
                                                <td data-label="IP" style="color:#076C07;font-weight:bold"><?php echo $rowip['ip']; ?></td>  
                                                <td data-label="Sex"><?php echo $rowip['sex']; ?></td>  
                                                <td data-label="Barangay"><?php echo $rowip1['barangay']; ?></td>  
                                                <td data-label="Purok"><?php echo $rowip1['purok']; ?></td>    
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="table2" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowip['id']; ?> (Member)" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>    
                                                </td>              
                                                <?php } ?>                 
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            }

                                            // this will execute if the result is not found
                                            if($checkerip==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td>                                                          
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of ip condition 




                                    //philhealth codition if it is searched
                                    else if($searchby=="Philhealth"){
                                        $checkerphilhealth=true;

                                        $_SESSION['viewcondition']=32;

                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;

                                        ?>
                                        <div class="table-div">  
                                        <?php 
                                        $countphilhealth="SELECT * FROM `table2` WHERE philhealth='$search'";
                                        $countphilhealthresult=mysqli_query($conn,$countphilhealth);
                                        $countnumrowsphilhealth=0;
                                        $existphilhealth=false;

                                        while($countphilhealthrow=mysqli_fetch_array($countphilhealthresult)){
                                            $countphilhealthmainid=$countphilhealthrow['mainid'];
                                            $countphilhealthid=$countphilhealthrow['id'];

                                            $countphilhealth1="SELECT * FROM `table1` WHERE id='$countphilhealthmainid' and barangay='$_SESSION[userbarangay]' ";
                                            $countphilhealthresult1=mysqli_query($conn,$countphilhealth1);

                                            while($countphilhealthrow1=mysqli_fetch_array($countphilhealthresult1)){
                                                $countphilhealthid1=$countphilhealthrow1['id'];

                                                $countphilhealth2="SELECT * FROM `table2` WHERE id='$countphilhealthid1'";
                                                $countphilhealthresult2=mysqli_query($conn,$countphilhealth2);
                                                $countnumrowsphilhealth++;
                                                $existphilhealth=true;
                                            }
                                        
                                        }

                                        if($existphilhealth==false){
                                            $emptycountphilhealth=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Philhealth</b></p>
                                                    <p class="info-p"  ><i class="fas fa-heartbeat" style="margin-right:5px;"></i>Philhealth : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountphilhealth ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Philhealth</b></p>
                                                    <p class="info-p"  ><i class="fas fa-heartbeat" style="margin-right:5px;"></i>Philhealth : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsphilhealth ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Name</th>
                                                <th style="color:#076C07;font-weight:bold">Philhealth</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            $queryphilhealth="SELECT * FROM `table2` WHERE philhealth='$search' ORDER BY mainid";
                                            $resultphilhealth=mysqli_query($conn,$queryphilhealth);

                                            while($rowphilhealth=mysqli_fetch_array($resultphilhealth)){
                                            $philhealthid=$rowphilhealth['mainid'];
                                            $philhealthhorm=$rowphilhealth['horm'];

                                            $queryphilhealth1="SELECT * FROM `table1` WHERE id='$philhealthid' and barangay='$_SESSION[userbarangay]'";
                                            $resultphilhealth1=mysqli_query($conn,$queryphilhealth1);

                                            while($rowphilhealth1=mysqli_fetch_array($resultphilhealth1)){
                                            $checkerphilhealth=false;
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                            <?php if($philhealthhorm=="Head"){ ?>
                                                <td data-label="Family ID"><b><?php echo $rowphilhealth['mainid']; ?></b></td>  
                                                <td data-label="Name"><?php echo $rowphilhealth['fullname']; ?> (<?php echo $rowphilhealth['horm'] ?>) </td>                             
                                                <td data-label="Philhealth" style="color:#076C07;font-weight:bold"><?php echo $rowphilhealth['philhealth']; ?></td> 
                                                <td data-label="Sex"><?php echo $rowphilhealth['sex']; ?></td>   
                                                <td data-label="Purok"><?php echo $rowphilhealth1['purok']; ?></td>  
                                                <td data-label="Barangay"><?php echo $rowphilhealth1['barangay']; ?></td>    
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowphilhealth1['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>              
                                                <?php } 
                                                    
                                                else{
                                                ?>
                                                <td data-label="Family ID"><b><?php echo $rowphilhealth['mainid']; ?></b></td>  
                                                <td data-label="Name"><?php echo $rowphilhealth['fname']; ?> <?php echo $rowphilhealth['mname']; ?> <?php echo $rowphilhealth['lname']; ?> (<?php echo $rowphilhealth['horm'] ?>) </td>                             
                                                <td data-label="Philhealth" style="color:#076C07;font-weight:bold"><?php echo $rowphilhealth['philhealth']; ?></td> 
                                                <td data-label="Sex"><?php echo $rowphilhealth['sex']; ?></td>    
                                                <td data-label="Purok"><?php echo $rowphilhealth1['purok']; ?></td> 
                                                <td data-label="Barangay"><?php echo $rowphilhealth1['barangay']; ?></td>     
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="table2" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowphilhealth['id']; ?> (Member)" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>    
                                                </td>              
                                                <?php } ?>              
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            }

                                            // this will execute if the result is not found
                                            if($checkerphilhealth==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>  
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                           
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of philhealth condition 



                                    //breastfeed codition if it is searched
                                    else if($searchby=="Breast Feeding"){
                                        $checkerbreastfeed=true;

                                        $_SESSION['viewcondition']=9;
                                        
                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                        ?>
                                        <div class="table-div">  
                                        <?php 
                                        $countbreastfeed="SELECT * FROM `table2` WHERE breastfeed='$search'";
                                        $countbreastfeedresult=mysqli_query($conn,$countbreastfeed);
                                        $countnumrowsbreastfeed=0;
                                        $existbreastfeed=false;

                                        while($countbreastfeedrow=mysqli_fetch_array($countbreastfeedresult)){
                                            $countbreastfeedmainid=$countbreastfeedrow['mainid'];
                                            $countbreastfeedid=$countbreastfeedrow['id'];

                                            $countbreastfeed1="SELECT * FROM `table1` WHERE id='$countbreastfeedmainid' and barangay='$_SESSION[userbarangay]' ";
                                            $countbreastfeedresult1=mysqli_query($conn,$countbreastfeed1);

                                            while($countbreastfeedrow1=mysqli_fetch_array($countbreastfeedresult1)){
                                                $countbreastfeedid1=$countbreastfeedrow1['id'];

                                                $countbreastfeed2="SELECT * FROM `table2` WHERE id='$countbreastfeedid1'";
                                                $countbreastfeedresult2=mysqli_query($conn,$countbreastfeed2);
                                                $countnumrowsbreastfeed++;
                                                $existbreastfeed=true;
                                            }
                                        
                                        }

                                        if($existbreastfeed==false){
                                            $emptycountbreastfeed=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Breast Feeding</b></p>
                                                    <p class="info-p"  ><i class="fas fa-user" style="margin-right:5px;"></i>Breast Feeding : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountbreastfeed ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Breast Feeding</b></p>
                                                    <p class="info-p"  ><i class="fas fa-user" style="margin-right:5px;"></i>Breast Feeding : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                    <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsbreastfeed ?></b></p>
                                                    <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Name</th>
                                                <th style="color:#076C07;font-weight:bold">Breast Feeding</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            $querybreastfeed="SELECT * FROM `table2` WHERE breastfeed='$search' ORDER BY mainid";
                                            $resultbreastfeed=mysqli_query($conn,$querybreastfeed);

                                            while($rowbreastfeed=mysqli_fetch_array($resultbreastfeed)){
                                            $breastfeedid=$rowbreastfeed['mainid'];
                                            $breastfeedhorm=$rowbreastfeed['horm'];

                                            $querybreastfeed1="SELECT * FROM `table1` WHERE id='$breastfeedid' and barangay='$_SESSION[userbarangay]' ";
                                            $resultbreastfeed1=mysqli_query($conn,$querybreastfeed1);

                                            while($rowbreastfeed1=mysqli_fetch_array($resultbreastfeed1)){
                                            $checkerbreastfeed=false;
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                            <?php if($breastfeedhorm=="Head"){ ?>
                                                <td data-label="Mainid"><b><?php echo $rowbreastfeed['mainid']; ?></b></td>  
                                                <td data-label="Name"><?php echo $rowbreastfeed['fullname']; ?> (<?php echo $rowbreastfeed['horm'] ?>) </td>                             
                                                <td data-label="Breast Feeding" style="color:#076C07;font-weight:bold"><?php echo $rowbreastfeed['breastfeed']; ?></td>  
                                                <td data-label="Sex"><?php echo $rowbreastfeed['sex']; ?></td>  
                                                <td data-label="Purok"><?php echo $rowbreastfeed1['purok']; ?></td>    
                                                <td data-label="Barangay"><?php echo $rowbreastfeed1['barangay']; ?></td>  
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowbreastfeed1['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>              
                                                <?php } 
                                                    
                                                else{
                                                ?>
                                                <td data-label="Mainid"><b><?php echo $rowbreastfeed['mainid']; ?></b></td>  
                                                <td data-label="Name"><?php echo $rowbreastfeed['fullname']; ?> (<?php echo $rowbreastfeed['horm'] ?>) </td>                             
                                                <td data-label="Breast Feeding" style="color:#076C07;font-weight:bold"><?php echo $rowbreastfeed['breastfeed']; ?></td>  
                                                <td data-label="Sex"><?php echo $rowbreastfeed['sex']; ?></td>  
                                                <td data-label="Purok"><?php echo $rowbreastfeed1['purok']; ?></td>    
                                                <td data-label="Barangay"><?php echo $rowbreastfeed1['barangay']; ?></td>  
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="table2" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowbreastfeed['id']; ?> (Member)" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>    
                                                </td>              
                                                <?php } ?>            
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            }

                                            // this will execute if the result is not found
                                            if($checkerbreastfeed==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>  
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                          
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of breastfeed condition 




                                    //ntp codition if it is searched
                                    else if($searchby=="NTP"){
                                        $checkerntp=true;

                                        $_SESSION['viewcondition']=29;

                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                        ?>
                                        <div class="table-div">  
                                        <?php 
                                        $countntp="SELECT * FROM `table2` WHERE ntp='$search'";
                                        $countntpresult=mysqli_query($conn,$countntp);
                                        $countnumrowsntp=0;
                                        $existntp=false;

                                        while($countntprow=mysqli_fetch_array($countntpresult)){
                                            $countntpmainid=$countntprow['mainid'];
                                            $countntpid=$countntprow['id'];

                                            $countntp1="SELECT * FROM `table1` WHERE id='$countntpmainid' and barangay='$_SESSION[userbarangay]' ";
                                            $countntpresult1=mysqli_query($conn,$countntp1);

                                            while($countntprow1=mysqli_fetch_array($countntpresult1)){
                                                $countntpid1=$countntprow1['id'];

                                                $countntp2="SELECT * FROM `table2` WHERE id='$countntpid1'";
                                                $countntpresult2=mysqli_query($conn,$countntp2);
                                                $countnumrowsntp++;
                                                $existntp=true;
                                            }
                                        
                                        }

                                        if($existntp==false){
                                            $emptycountntp=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>NTP</b></p>
                                                    <p class="info-p"  ><i class="fas fa-folder" style="margin-right:5px;"></i>NTP : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountntp ?></b> Items</p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>NTP</b></p>
                                                    <p class="info-p"  ><i class="fas fa-folder" style="margin-right:5px;"></i>NTP : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsntp ?></b> Items</p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Name</th>
                                                <th style="color:#076C07;font-weight:bold">NTP</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            $queryntp="SELECT * FROM `table2` WHERE ntp='$search' ORDER BY mainid";
                                            $resultntp=mysqli_query($conn,$queryntp);

                                            while($rowntp=mysqli_fetch_array($resultntp)){
                                            $ntpid=$rowntp['mainid'];
                                            $ntphorm=$rowntp['horm'];

                                            $queryntp1="SELECT * FROM `table1` WHERE id='$ntpid' and barangay='$_SESSION[userbarangay]' ";
                                            $resultntp1=mysqli_query($conn,$queryntp1);

                                            while($rowntp1=mysqli_fetch_array($resultntp1)){
                                            $checkerntp=false;
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                            <?php if($ntphorm=="Head"){ ?>
                                                <td data-label="Family ID"><b><?php echo $rowntp['mainid']; ?></b></td>  
                                                <td data-label="Name"><?php echo $rowntp['fullname']; ?> (<?php echo $rowntp['horm'] ?>) </td>                             
                                                <td data-label="NTP" style="color:#076C07;font-weight:bold"><?php echo $rowntp['ntp']; ?></td> 
                                                <td data-label="Sex"><?php echo $rowntp['sex']; ?></td>   
                                                <td data-label="Barangay"><?php echo $rowntp1['barangay']; ?></td>  
                                                <td data-label="Purok"><?php echo $rowntp1['purok']; ?></td>    
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowntp1['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>              
                                                <?php } 
                                                    
                                                else{
                                                ?>
                                                <td data-label="Family ID"><b><?php echo $rowntp['mainid']; ?></b></td>  
                                                <td data-label="Name"><?php echo $rowntp['fullname']; ?> (<?php echo $rowntp['horm'] ?>) </td>                             
                                                <td data-label="NTP" style="color:#076C07;font-weight:bold"><?php echo $rowntp['ntp']; ?></td>  
                                                <td data-label="Sex"><?php echo $rowntp['sex']; ?></td>   
                                                <td data-label="Purok"><?php echo $rowntp1['purok']; ?></td>
                                                <td data-label="Barangay"><?php echo $rowntp1['barangay']; ?></td>      
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="table2" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowntp['id']; ?> (Member)" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>    
                                                </td>              
                                                <?php } ?>                
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            }

                                            // this will execute if the result is not found
                                            if($checkerntp==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>                                                          
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of ntp condition 
                                    
                                    


                                    //smooking codition if it is searched
                                    else if($searchby=="Smooking"){
                                        $checkersmooking=true;

                                        $_SESSION['viewcondition']=39;

                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                        ?>
                                        <div class="table-div">  
                                        <?php 
                                        $countsmooking="SELECT * FROM `table2` WHERE smooking='$search'";
                                        $countsmookingresult=mysqli_query($conn,$countsmooking);
                                        $countnumrowssmooking=0;
                                        $existsmooking=false;

                                        while($countsmookingrow=mysqli_fetch_array($countsmookingresult)){
                                            $countsmookingmainid=$countsmookingrow['mainid'];
                                            $countsmookingid=$countsmookingrow['id'];

                                            $countsmooking1="SELECT * FROM `table1` WHERE id='$countsmookingmainid' and barangay='$_SESSION[userbarangay]' ";
                                            $countsmookingresult1=mysqli_query($conn,$countsmooking1);

                                            while($countsmookingrow1=mysqli_fetch_array($countsmookingresult1)){
                                                $countsmookingid1=$countsmookingrow1['id'];

                                                $countsmooking2="SELECT * FROM `table2` WHERE id='$countsmookingid1'";
                                                $countsmookingresult2=mysqli_query($conn,$countsmooking2);
                                                $countnumrowssmooking++;
                                                $existsmooking=true;
                                            }
                                        
                                        }

                                        if($existsmooking==false){
                                            $emptycountsmooking=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Smooking</b></p>
                                                    <p class="info-p"  ><i class="fas fa-smoking" style="margin-right:5px;"></i>Smooking : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountsmooking ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Smooking</b></p>
                                                    <p class="info-p"  ><i class="fas fa-smoking" style="margin-right:5px;"></i>Smooking : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowssmooking ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Name</th>
                                                <th style="color:#076C07;font-weight:bold">Smooking</th>
                                                <th >Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            $querysmooking="SELECT * FROM `table2` WHERE smooking='$search' ORDER BY mainid";
                                            $resultsmooking=mysqli_query($conn,$querysmooking);

                                            while($rowsmooking=mysqli_fetch_array($resultsmooking)){
                                            $smookingid=$rowsmooking['mainid'];
                                            $smookinghorm=$rowsmooking['horm'];

                                            $querysmooking1="SELECT * FROM `table1` WHERE id='$smookingid' and barangay='$_SESSION[userbarangay]'";
                                            $resultsmooking1=mysqli_query($conn,$querysmooking1);

                                            while($rowsmooking1=mysqli_fetch_array($resultsmooking1)){
                                            $checkersmooking=false;
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                            <?php if($smookinghorm=="Head"){ ?>
                                                <td data-label="Family ID"><b><?php echo $rowsmooking['mainid']; ?></b></td>  
                                                <td data-label="Name"><?php echo $rowsmooking['fullname']; ?> (<?php echo $rowsmooking['horm'] ?>) </td>                             
                                                <td data-label="Smooking" style="color:#076C07;font-weight:bold"><?php echo $rowsmooking['smooking']; ?></td>  
                                                <td data-label="Sex"><?php echo $rowsmooking['sex']; ?></td>  
                                                <td data-label="Purok"><?php echo $rowsmooking1['purok']; ?></td>
                                                <td data-label="Barangay"><?php echo $rowsmooking1['barangay']; ?></td>      
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowsmooking1['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>              
                                                <?php } 
                                                    
                                                else{
                                                ?>
                                                <td data-label="Family ID"><b><?php echo $rowsmooking['mainid']; ?></b></td>  
                                                <td data-label="Name"><?php echo $rowsmooking['fullname']; ?> (<?php echo $rowsmooking['horm'] ?>) </td>                             
                                                <td data-label="Smooking" style="color:#076C07;font-weight:bold"><?php echo $rowsmooking['smooking']; ?></td>  
                                                <td data-label="Sex"><?php echo $rowsmooking['sex']; ?></td>  
                                                <td data-label="Purok"><?php echo $rowsmooking1['purok']; ?></td>    
                                                <td data-label="Barangay"><?php echo $rowsmooking1['barangay']; ?></td>  
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="table2" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowsmooking['id']; ?> (Member)" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>    
                                                </td>              
                                                <?php } ?>                 
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            }

                                            // this will execute if the result is not found
                                            if($checkersmooking==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                                                                                       
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of smooking condition 


                                    //fourps codition if it is searched
                                    else if($searchby=="4Ps"){
                                        $checkerfourps=true;

                                        $_SESSION['viewcondition']=48;

                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                        ?>
                                        <div class="table-div">  
                                        <?php 
                                        $countfourps="SELECT * FROM `table2` WHERE fourps='$search'";
                                        $countfourpsresult=mysqli_query($conn,$countfourps);
                                        $countnumrowsfourps=0;
                                        $existfourps=false;

                                        while($countfourpsrow=mysqli_fetch_array($countfourpsresult)){
                                            $countfourpsmainid=$countfourpsrow['mainid'];
                                            $countfourpsid=$countfourpsrow['id'];

                                            $countfourps1="SELECT * FROM `table1` WHERE id='$countfourpsmainid' and barangay='$_SESSION[userbarangay]' ";
                                            $countfourpsresult1=mysqli_query($conn,$countfourps1);

                                            while($countfourpsrow1=mysqli_fetch_array($countfourpsresult1)){
                                                $countfourpsid1=$countfourpsrow1['id'];

                                                $countfourps2="SELECT * FROM `table2` WHERE id='$countfourpsid1'";
                                                $countfourpsresult2=mysqli_query($conn,$countfourps2);
                                                $countnumrowsfourps++;
                                                $existfourps=true;
                                            }
                                        
                                        }

                                        if($existfourps==false){
                                            $emptycountfourps=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>fourps</b></p>
                                                    <p class="info-p"  ><i class="fas fa-folder" style="margin-right:5px;"></i>4Ps : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountfourps ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>fourps</b></p>
                                                    <p class="info-p"  ><i class="fas fa-folder" style="margin-right:5px;"></i>4Ps : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsfourps ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Name</th>
                                                <th style="color:#076C07;font-weight:bold">4Ps</th>
                                                <th >Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            $queryfourps="SELECT * FROM `table2` WHERE fourps='$search' ORDER BY mainid";
                                            $resultfourps=mysqli_query($conn,$queryfourps);

                                            while($rowfourps=mysqli_fetch_array($resultfourps)){
                                            $fourpsid=$rowfourps['mainid'];
                                            $fourpshorm=$rowfourps['horm'];

                                            $queryfourps1="SELECT * FROM `table1` WHERE id='$fourpsid' and barangay='$_SESSION[userbarangay]'";
                                            $resultfourps1=mysqli_query($conn,$queryfourps1);

                                            while($rowfourps1=mysqli_fetch_array($resultfourps1)){
                                            $checkerfourps=false;
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                            <?php if($fourpshorm=="Head"){ ?>
                                                <td data-label="Family ID"><b><?php echo $rowfourps['mainid']; ?></b></td>  
                                                <td data-label="Name"><?php echo $rowfourps['fullname']; ?> (<?php echo $rowfourps['horm'] ?>) </td>                             
                                                <td data-label="fourps" style="color:#076C07;font-weight:bold"><?php echo $rowfourps['fourps']; ?></td>  
                                                <td data-label="Sex"><?php echo $rowfourps['sex']; ?></td>  
                                                <td data-label="Purok"><?php echo $rowfourps1['purok']; ?></td>
                                                <td data-label="Barangay"><?php echo $rowfourps1['barangay']; ?></td>      
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowfourps1['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>              
                                                <?php } 
                                                    
                                                else{
                                                ?>
                                                <td data-label="Family ID"><b><?php echo $rowfourps['mainid']; ?></b></td>  
                                                <td data-label="Name"><?php echo $rowfourps['fullname']; ?> (<?php echo $rowfourps['horm'] ?>) </td>                             
                                                <td data-label="fourps" style="color:#076C07;font-weight:bold"><?php echo $rowfourps['fourps']; ?></td>  
                                                <td data-label="Sex"><?php echo $rowfourps['sex']; ?></td>  
                                                <td data-label="Purok"><?php echo $rowfourps1['purok']; ?></td>    
                                                <td data-label="Barangay"><?php echo $rowfourps1['barangay']; ?></td>  
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="table2" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowfourps['id']; ?> (Member)" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>    
                                                </td>              
                                                <?php } ?>                 
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            }

                                            // this will execute if the result is not found
                                            if($checkerfourps==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                                                                                       
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of fourps condition 

                                    else if($searchby=="Number of Family Members"){

                                        //we use this checker in order for us to check if the record does not exist
                                        //if the record exist the value of it will be false
                                        //and once this will become true it will not meet the condition below that ask if checkernum is still true
                                        //but if its still true or it didint go inside the while loop then it will meet the condition and
                                        //it will display that there is no records found
                                        $checkerfamnum=true;

                                        $_SESSION['viewcondition']=28;

                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;

                                        ?>
                                        <div class="table-div">
                                        <?php 
                                        $countfamnum="SELECT * FROM `table1` WHERE famnum='$search' and barangay='$_SESSION[userbarangay]'";
                                        $countfamnumresult=mysqli_query($conn,$countfamnum);
                                        $existfamnum=false;
                                        $countnumrowsfamnum=0;

                                        while($rowcountfamnum=mysqli_fetch_array($countfamnumresult)){
                                            $countfamnumid=$rowcountfamnum['id'];

                                            $countfamnum1="SELECT * FROM `table2` WHERE mainid='$countfamnumid'";
                                            $countfamnumresult1=mysqli_query($conn,$countfamnum1);
                                            $existfamnum=true;
                                            $countnumrowsfamnum++;

                                        }

                                        if($existfamnum==false){
                                            $emptycountfamnum=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Number of Family Members</b></p>
                                                    <p class="info-p"  ><i class="fas fa-users" style="margin-right:5px;"></i>Number of Family Members : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountfamnum ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Number of Family Members</b></p>
                                                    <p class="info-p"  ><i class="fas fa-users" style="margin-right:5px;"></i>Number of Family Members : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsfamnum ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Head Name</th>
                                                <th style="color:#076C07;font-weight:bold">Number of Family Members</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            //this query is to search for famnum that is equal to the input value
                                            $queryfamnum="SELECT * FROM `table1` WHERE famnum='$search' and barangay='$_SESSION[userbarangay]'";
                                            $resultfamnum=mysqli_query($conn,$queryfamnum);

                                            //this will execute if the query found a match
                                            while($rowfamnum=mysqli_fetch_array($resultfamnum)){
                                            $headfamnumid=$rowfamnum['id'];

                                            $queryfamnum1="SELECT * FROM `table2` WHERE mainid='$headfamnumid' and horm='Head' ORDER BY mainid";
                                            $resultfamnum1=mysqli_query($conn,$queryfamnum1);

                                            while($rowfamnum1=mysqli_fetch_array($resultfamnum1)){

                                            // this variable serves as to get the hhnum of the famnum who matches the input                                            
                                            $checkerfamnum=false;                                             
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                                <tr>
                                                <td data-label="Family ID"><b><?php echo $rowfamnum1['mainid']; ?></b></td>  
                                                <td data-label="Name"><?php echo $rowfamnum1['fullname']; ?> </td>                             
                                                <td data-label="Number of Family Members" style="color:#076C07;font-weight:bold"><?php echo $rowfamnum['famnum']; ?></td>  
                                                <td data-label="Sex"><?php echo $rowfamnum1['sex']; ?></td>
                                                <td data-label="Purok"><?php echo $rowfamnum['purok']; ?></td>
                                                <td data-label="Barangay"><?php echo $rowfamnum['barangay']; ?></td>      
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowfamnum['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>                              
                                                </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            
                                            } //end of main while loop
                                            }
                                            // this will execute if the result is not found
                                            if($checkerfamnum==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                                                                                  
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        </div>
                                        <!-- end of table -->

                                        <?php
                                    }
                                    //end of famnum condition


                                    //mothertongue codition if it is searched
                                    else if($searchby=="Mother Tongue"){

                                        //we use this checker in order for us to check if the record does not exist
                                        //if the record exist the value of it will be false
                                        //and once this will become true it will not meet the condition below that ask if checkernum is still true
                                        //but if its still true or it didint go inside the while loop then it will meet the condition and
                                        //it will display that there is no records found
                                        $checkermothertongue=true;

                                        $_SESSION['viewcondition']=26;

                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;

                                        ?>
                                        <div class="table-div">
                                        <?php 
                                        $countmothertongue="SELECT * FROM `table1` WHERE mothertongue='$search' and barangay='$_SESSION[userbarangay]'";
                                        $countmothertongueresult=mysqli_query($conn,$countmothertongue);
                                        $existmothertongue=false;
                                        $countnumrowsmothertongue=0;

                                        while($rowcountmothertongue=mysqli_fetch_array($countmothertongueresult)){
                                            $countmothertongueid=$rowcountmothertongue['id'];

                                            $countmothertongue1="SELECT * FROM `table2` WHERE mainid='$countmothertongueid' and horm='Head'";
                                            $countmothertongueresult1=mysqli_query($conn,$countmothertongue1);

                                            while($rowcountmothertongue1=mysqli_fetch_array($countmothertongueresult1)){
                                            $existmothertongue=true;
                                            $countnumrowsmothertongue++;
                                            }
                                        }

                                        if($existmothertongue==false){
                                            $emptycountmothertongue=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Mother Tongue</b></p>
                                                    <p class="info-p"  ><i class="fas fa-user" style="margin-right:5px;"></i>Mother Tongue : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountmothertongue ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Mother Tongue</b></p>
                                                    <p class="info-p"  ><i class="fas fa-user" style="margin-right:5px;"></i>Mother Tongue : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsmothertongue ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <!-- table -->
                                        <table>
                                        
                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Name</th>
                                                <th style="color:#076C07;font-weight:bold">Mother Tongue</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            //this query is to search for famnum that is equal to the input value
                                            $querymothertongue="SELECT * FROM `table1` WHERE mothertongue='$search' and barangay='$_SESSION[userbarangay]'";
                                            $resultmothertongue=mysqli_query($conn,$querymothertongue);

                                            //this will execute if the query found a match
                                            while($rowmothertongue=mysqli_fetch_array($resultmothertongue)){
                                            $mothertongueid=$rowmothertongue['id'];

                                            $querymothertongue1="SELECT * FROM `table2` WHERE mainid='$mothertongueid' and horm='Head' ORDER BY mainid";
                                            $resultmothertongue1=mysqli_query($conn,$querymothertongue1);

                                            while($rowmothertongue1=mysqli_fetch_array($resultmothertongue1)){
                                            $mothertonguehorm=$rowmothertongue1['horm'];

                                            $checkermothertongue=false;                                             
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                                <td data-label="Family ID"><b><?php echo $rowmothertongue1['mainid']; ?></b></td>  
                                                <td data-label="Head Name"><?php echo $rowmothertongue1['fullname']; ?></td>                             
                                                <td data-label="Mother Tongue" style="color:#076C07;font-weight:bold"><?php echo $rowmothertongue['mothertongue']; ?></td>
                                                <td data-label="Sex"><?php echo $rowmothertongue1['sex']; ?></td>  
                                                <td data-label="Purok"><?php echo $rowmothertongue['purok']; ?></td>
                                                <td data-label="Barangay"><?php echo $rowmothertongue['barangay']; ?></td>      
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowmothertongue['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>              
                                                    
                                                             
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            
                                            } //end of main while loop
                                            }
                                            // this will execute if the result is not found
                                            if($checkermothertongue==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td>                                                                                                                       
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        </div>
                                        <!-- end of table -->

                                        <?php
                                    }
                                    //end of mothertongue condition

                                    else if($searchby=="Family ID"){

                                        //we use this checker in order for us to check if the record does not exist
                                        //if the record exist the value of it will be false
                                        //and once this will become true it will not meet the condition below that ask if checkernum is still true
                                        //but if its still true or it didint go inside the while loop then it will meet the condition and
                                        //it will display that there is no records found
                                        $checkerid=true;

                                        $_SESSION['viewcondition']=45;

                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;

                                        ?>
                                        <div class="table-div">
                                        <?php 
                                        $countid="SELECT * FROM `table1` WHERE id='$search' and barangay='$_SESSION[userbarangay]'";
                                        $countidresult=mysqli_query($conn,$countid);
                                        $existid=false;
                                        $countnumrowsid=0;

                                        while($rowcountid=mysqli_fetch_array($countidresult)){
                                            $countidid=$rowcountid['id'];

                                            $countid1="SELECT * FROM `table2` WHERE mainid='$countidid'";
                                            $countidresult1=mysqli_query($conn,$countid1);

                                            while($rowcountid1=mysqli_fetch_array($countidresult1)){
                                            $existid=true;
                                            $countnumrowsid++;
                                            }
                                        }

                                        if($existid==false){
                                            $emptycountid=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Family ID</b></p>
                                                    <p class="info-p"  ><i class="fas fa-users" style="margin-right:5px;"></i>Family ID : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountid ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Family ID</b></p>
                                                    <p class="info-p"  ><i class="fas fa-users" style="margin-right:5px;"></i>Family ID : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsid ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <!-- table -->
                                        <table>
                                        
                                            <!-- table row for heading -->
                                            <thead>
                                                <th style="color:#076C07;font-weight:bold">Family ID</th>
                                                <th>Name</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            //this query is to search for famnum that is equal to the input value
                                            $queryid="SELECT * FROM `table1` WHERE id='$search' and barangay='$_SESSION[userbarangay]'";
                                            $resultid=mysqli_query($conn,$queryid);

                                            //this will execute if the query found a match
                                            while($rowid=mysqli_fetch_array($resultid)){
                                            $idid=$rowid['id'];

                                            $queryid1="SELECT * FROM `table2` WHERE mainid='$idid' ORDER BY mainid";
                                            $resultid1=mysqli_query($conn,$queryid1);

                                            while($rowid1=mysqli_fetch_array($resultid1)){
                                            $idhorm=$rowid1['horm'];

                                            $checkerid=false;                                             
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                                <td data-label="Family ID" style="color:#076C07;font-weight:bold"><b><?php echo $rowid1['mainid']; ?></b></td>  
                                                <td data-label="Head Name"><?php echo $rowid1['fullname']; ?></td>                             
                                                <td data-label="Sex"><?php echo $rowid1['sex']; ?></td>  
                                                <td data-label="Purok"><?php echo $rowid['purok']; ?></td>
                                                <td data-label="Barangay"><?php echo $rowid['barangay']; ?></td>      
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowid['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>              
                                                    
                                                             
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            
                                            } //end of main while loop
                                            }
                                            // this will execute if the result is not found
                                            if($checkerid==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td>                                                                                                                       
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        </div>
                                        <!-- end of table -->

                                        <?php
                                    }
                                    //end of id condition



                                    //housetype codition if it is searched
                                    else if($searchby=="House Type"){

                                        //we use this checker in order for us to check if the record does not exist
                                        //if the record exist the value of it will be false
                                        //and once this will become true it will not meet the condition below that ask if checkernum is still true
                                        //but if its still true or it didint go inside the while loop then it will meet the condition and
                                        //it will display that there is no records found
                                        $checkerhousetype=true;

                                        $_SESSION['viewcondition']=20;
                                        
                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;

                                        ?>
                                        <div class="table-div">
                                        <?php 
                                        $counthousetype="SELECT * FROM `table1` WHERE housetype='$search' and barangay='$_SESSION[userbarangay]'";
                                        $counthousetyperesult=mysqli_query($conn,$counthousetype);
                                        $existhousetype=false;
                                        $countnumrowshousetype=0;

                                        while($rowcounthousetype=mysqli_fetch_array($counthousetyperesult)){
                                            $counthousetypeid=$rowcounthousetype['id'];

                                            $counthousetype1="SELECT * FROM `table2` WHERE mainid='$counthousetypeid' and horm='Head'";
                                            $counthousetyperesult1=mysqli_query($conn,$counthousetype1);

                                            while($rowcounthousetype1=mysqli_fetch_array($counthousetyperesult1)){
                                            $existhousetype=true;
                                            $countnumrowshousetype++;
                                            }

                                        }

                                        if($existhousetype==false){
                                            $emptycounthousetype=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>House Type</b></p>
                                                    <p class="info-p"  ><i class="fas fa-home" style="margin-right:5px;"></i>House Type : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycounthousetype ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>House Type</b></p>
                                                    <p class="info-p"  ><i class="fas fa-home" style="margin-right:5px;"></i>House Type : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowshousetype ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Head Name</th>
                                                <th style="color:#076C07;font-weight:bold">House Type</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            //this query is to search for famnum that is equal to the input value
                                            $queryhousetype="SELECT * FROM `table1` WHERE housetype='$search' and barangay='$_SESSION[userbarangay]'";
                                            $resulthousetype=mysqli_query($conn,$queryhousetype);

                                            //this will execute if the query found a match
                                            while($rowhousetype=mysqli_fetch_array($resulthousetype)){
                                            $housetypeid=$rowhousetype['id'];
                                            
                                            $queryhousetype1="SELECT * FROM `table2` WHERE mainid='$housetypeid' and horm='Head' ORDER BY mainid";
                                            $resulthousetype1=mysqli_query($conn,$queryhousetype1);

                                            while($rowhousetype1=mysqli_fetch_array($resulthousetype1)){

                                            $checkerhousetype=false;                                            
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                                <td data-label="Family ID"><b><?php echo $rowhousetype1['mainid']; ?></b></td>   
                                                <td data-label="Head Name"><?php echo $rowhousetype1['fullname']; ?></td>                             
                                                <td data-label="House Type" style="color:#076C07;font-weight:bold"><?php echo $rowhousetype['housetype']; ?></td>                                                         
                                                <td data-label="Sex"><?php echo $rowhousetype1['sex']; ?></td>   
                                                <td data-label="Purok"><?php echo $rowhousetype['purok']; ?></td> 
                                                <td data-label="Barangay"><?php echo $rowhousetype['barangay']; ?></td>     
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />    
                                                        <input type="hidden" value="<?php echo $rowhousetype['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>               
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            
                                            } //end of main while loop
                                            }
                                            // this will execute if the result is not found
                                            if($checkerhousetype==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>    
                                                <td data-label="-"><?php echo "-"; ?></td>  
                                                <td data-label="-"><?php echo "-"; ?></td>    
                                                <td data-label="-"><?php echo "-"; ?></td>                                                                                                                
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                        </div>

                                        <?php
                                    }
                                    //end of housetype condition


                                    //santoilet codition if it is searched
                                    else if($searchby=="Sanitary Toilet"){

                                        //we use this checker in order for us to check if the record does not exist
                                        //if the record exist the value of it will be false
                                        //and once this will become true it will not meet the condition below that ask if checkernum is still true
                                        //but if its still true or it didint go inside the while loop then it will meet the condition and
                                        //it will display that there is no records found
                                        $checkersantoilet=true;

                                        $_SESSION['viewcondition']=37;

                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;

                                        ?>
                                        <div class="table-div">
                                        <?php 
                                        $countsantoilet="SELECT * FROM `table1` WHERE santoilet='$search' and barangay='$_SESSION[userbarangay]'";
                                        $countsantoiletresult=mysqli_query($conn,$countsantoilet);
                                        $existtoilet=false;
                                        $countnumrowssantoilet=0;

                                        while($rowcountsantoilet=mysqli_fetch_array($countsantoiletresult)){
                                            $countsantoiletid=$rowcountsantoilet['id'];

                                            $countsantoilet1="SELECT * FROM `table2` WHERE mainid='$countsantoiletid' and horm='Head'";
                                            $countsantoiletresult1=mysqli_query($conn,$countsantoilet1);

                                            while($rowcountsantoilet1=mysqli_fetch_array($countsantoiletresult1)){
                                                $existtoilet=true;
                                                $countnumrowssantoilet++;
                                            }
                                            

                                        }

                                        if($existtoilet==false){
                                            $emptycountsantoilet=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Sanitary Toilet</b></p>
                                                    <p class="info-p"  ><i class="fas fa-toilet" style="margin-right:5px;"></i>Sanitary Toilet : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountsantoilet ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Sanitary Toilet</b></p>
                                                    <p class="info-p"  ><i class="fas fa-toilet" style="margin-right:5px;"></i>Sanitary Toilet : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowssantoilet ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Head Name</th>
                                                <th style="color:#076C07;font-weight:bold">Sanitary Toilet</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                        </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            //this query is to search for famnum that is equal to the input value
                                            $querysantoilet="SELECT * FROM `table1` WHERE santoilet='$search' and barangay='$_SESSION[userbarangay]'";
                                            $resultsantoilet=mysqli_query($conn,$querysantoilet);

                                            //this will execute if the query found a match
                                            while($rowsantoilet=mysqli_fetch_array($resultsantoilet)){
                                            $santoiletid=$rowsantoilet['id'];
                                            
                                            $querysantoilet1="SELECT * FROM `table2` WHERE mainid='$santoiletid' and horm='Head' ORDER BY mainid";
                                            $resultsantoilet1=mysqli_query($conn,$querysantoilet1);
    
                                            while($rowsantoilet1=mysqli_fetch_array($resultsantoilet1)){
                                            $checkersantoilet=false; 

                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                                <td data-label="Family ID"><b><?php echo $rowsantoilet1['mainid']; ?></b></td>
                                                <td data-label="Head Name"><?php echo $rowsantoilet1['fullname']; ?></td>
                                                <td data-label="Sanitary Toilet" style="color:#076C07;font-weight:bold"><?php echo $rowsantoilet['santoilet']; ?></td>
                                                <td data-label="Sex"><?php echo $rowsantoilet1['sex']; ?></td>                                                            
                                                <td data-label="Purok"><?php echo $rowsantoilet['purok']; ?></td>   
                                                <td data-label="Barangay"><?php echo $rowsantoilet['barangay']; ?></td>   
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />    
                                                        <input type="hidden" value="<?php echo $rowsantoilet['id']; ?>" name="hidden-btn" />
                                                        <input type="submit"  value="View" name="view" class="view_btn"/>
                                                    </form>
                                                </td>               
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            } //end of main while loop

                                            // this will execute if the result is not found
                                            if($checkersantoilet==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td>                                                             
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                        </div>
                                        <?php
                                    }
                                    //end of santoilet condition



                                    //immunization codition if it is searched
                                    else if($searchby=="Immunization"){

                                        //we use this checker in order for us to check if the record does not exist
                                        //if the record exist the value of it will be false
                                        //and once this will become true it will not meet the condition below that ask if checkernum is still true
                                        //but if its still true or it didint go inside the while loop then it will meet the condition and
                                        //it will display that there is no records found
                                        $checkerimmunization=true;

                                        $_SESSION['viewcondition']=21;
                                        
                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;

                                        ?>
                                        <div class="table-div">     
                                        <?php 
                                        $countimmunization="SELECT * FROM `table1` WHERE immunization='$search' and barangay='$_SESSION[userbarangay]'";
                                        $countimmunizationresult=mysqli_query($conn,$countimmunization);
                                        $existimmunization=false;
                                        $countnumrowsimmunization=0;
                                        
                                        while($rowcountimmunization=mysqli_fetch_array($countimmunizationresult)){
                                            $countimmunizationid=$rowcountimmunization['id'];

                                            $countimmunization1="SELECT * FROM `table2` WHERE mainid='$countimmunizationid' and horm='Head'";
                                            $countimmunizationresult1=mysqli_query($conn,$countimmunization1);

                                            while($rowcountimmunization1=mysqli_fetch_array($countimmunizationresult1)){
                                                $existimmunization=true;
                                                $countnumrowsimmunization++;
                                            }
                                            

                                        }

                                        if($existimmunization==false){
                                            $emptycountimmunization=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Immunization</b></p>
                                                    <p class="info-p"  ><i class="fas fa-syringe" style="margin-right:5px;"></i>Immunization : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountimmunization ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Immunization</b></p>
                                                    <p class="info-p"  ><i class="fas fa-syringe" style="margin-right:5px;"></i>Immunization : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsimmunization ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>                                   
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Head Name</th>
                                                <th style="color:#076C07;font-weight:bold">Immunization</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            //this query is to search for famnum that is equal to the input value
                                            $queryimmunization="SELECT * FROM `table1` WHERE immunization='$search' and barangay='$_SESSION[userbarangay]'";
                                            $resultimmunization=mysqli_query($conn,$queryimmunization);

                                            //this will execute if the query found a match
                                            while($rowimmunization=mysqli_fetch_array($resultimmunization)){
                                            $immunizationid=$rowimmunization['id'];
                                            
                                            $queryimmunization1="SELECT * FROM `table2` WHERE mainid='$immunizationid' and horm='Head' ORDER BY mainid";
                                            $resultimmunization1=mysqli_query($conn,$queryimmunization1);
        
                                            while($rowimmunization1=mysqli_fetch_array($resultimmunization1)){
                                        
                                            $checkerimmunization=false;                                              
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                                <td data-label="Family ID"><b><?php echo $rowimmunization1['mainid']; ?></b></td>                                                         
                                                <td data-label="Head Name"><?php echo $rowimmunization1['fullname']; ?></td>
                                                <td data-label="Immunization" style="color:#076C07;font-weight:bold"><?php echo $rowimmunization['immunization']; ?></td> 
                                                <td data-label="Sex"><?php echo $rowimmunization1['sex']; ?></td>                                                         
                                                <td data-label="Purok"><?php echo $rowimmunization['purok']; ?></td>
                                                <td data-label="Barangay"><?php echo $rowimmunization['barangay']; ?></td>      
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />    
                                                        <input type="hidden" value="<?php echo $rowimmunization['id']; ?>" name="hidden-btn" />
                                                        <input type="submit"  value="View" class="view_btn" name="view"/>
                                                    </form>
                                                </td>               
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            } //end of main while loop

                                            // this will execute if the result is not found
                                            if($checkerimmunization==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td>                                                           
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of immunization condition


                                    //wra codition if it is searched
                               


                                //garbdisposal codition if it is searched
                                else if($searchby=="Garbage Disposal"){

                                    //we use this checker in order for us to check if the record does not exist
                                    //if the record exist the value of it will be false
                                    //and once this will become true it will not meet the condition below that ask if checkernum is still true
                                    //but if its still true or it didint go inside the while loop then it will meet the condition and
                                    //it will display that there is no records found
                                    $checkergarbdisposal=true;

                                    $_SESSION['viewcondition']=16;
                                        
                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;

                                    ?>
                                    <div class="table-div">  
                                    <?php 
                                        $countgarbdisposal="SELECT * FROM `table1` WHERE garbdisposal='$search' and barangay='$_SESSION[userbarangay]'";
                                        $countgarbdisposalresult=mysqli_query($conn,$countgarbdisposal);
                                        $existgarbdisposal=false;
                                        $countnumrowsgarbdisposal=0;

                                        while($rowcountgarbdisposal=mysqli_fetch_array($countgarbdisposalresult)){
                                            $countgarbdisposalid=$rowcountgarbdisposal['id'];

                                            $countgarbdisposal1="SELECT * FROM `table2` WHERE mainid='$countgarbdisposalid' and horm='Head'";
                                            $countgarbdisposalresult1=mysqli_query($conn,$countgarbdisposal1);

                                            while($rowcountgarbdisposal1=mysqli_fetch_array($countgarbdisposalresult1)){
                                                $existgarbdisposal=true;
                                                $countnumrowsgarbdisposal++;
                                            }
                                            

                                        }

                                        if($existgarbdisposal==false){
                                            $emptycountgarbdisposal=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Garbage Disposal</b></p>
                                                    <p class="info-p"  ><i class="fas fa-trash" style="margin-right:5px;"></i>Garbage Disposal : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountgarbdisposal ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Garbage Disposal</b></p>
                                                    <p class="info-p"  ><i class="fas fa-trash" style="margin-right:5px;"></i>Garbage Disposal : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsgarbdisposal ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?> 
                                    <!-- table -->
                                    <table>

                                        <!-- table row for heading -->
                                        <thead>
                                            <th>Family ID</th>
                                            <th>Head Name</th>
                                            <th style="color:#076C07;font-weight:bold">Garbage Disposal</th>
                                            <th>Sex</th>
                                            <th>Purok</th>
                                            <th>Barangay</th>
                                            <th>View Information</th>
                                        </thead>
                                        <!-- end of table row heading -->

                                        <?php
                                        //this query is to search for famnum that is equal to the input value
                                        $querygarbdisposal="SELECT * FROM `table1` WHERE garbdisposal='$search' and barangay='$_SESSION[userbarangay]'";
                                        $resultgarbdisposal=mysqli_query($conn,$querygarbdisposal);

                                        //this will execute if the query found a match
                                        while($rowgarbdisposal=mysqli_fetch_array($resultgarbdisposal)){
                                        $garbdisposalid=$rowgarbdisposal['id'];
                                        
                                        $querygarbdisposal1="SELECT * FROM `table2` WHERE mainid='$garbdisposalid' and horm='Head' ORDER BY mainid";
                                        $resultgarbdisposal1=mysqli_query($conn,$querygarbdisposal1);
        
                                        while($rowgarbdisposal1=mysqli_fetch_array($resultgarbdisposal1)){
                                        $checkergarbdisposal=false;                                            
                                        ?>
                                        <!-- table row for data -->
                                        <tbody>
                                        <tr>
                                            <td data-label="Family ID"><b><?php echo $rowgarbdisposal1['mainid']; ?></b></td>   
                                            <td data-label="Head Name"><?php echo $rowgarbdisposal1['fullname']; ?></td>
                                            <td data-label="Garbage Disposal" style="color:#076C07;font-weight:bold"><?php echo $rowgarbdisposal['garbdisposal']; ?></td> 
                                            <td data-label="Sex"><?php echo $rowgarbdisposal1['sex']; ?></td>                                                           
                                            <td data-label="Purok"><?php echo $rowgarbdisposal['purok']; ?></td> 
                                            <td data-label="Barangay"><?php echo $rowgarbdisposal['barangay']; ?></td>     
                                            <td data-label="View Information">
                                                <form action="result.php" target="_blank" method="POST">
                                                    <input type="hidden" value="tablehead" name="hidden-btn1" />    
                                                    <input type="hidden" value="<?php echo $rowgarbdisposal['id']; ?>" name="hidden-btn" />
                                                    <input type="submit"  value="View" class="view_btn" name="view" />
                                                </form>
                                            </td>               
                                        </tr>
                                        </tbody>
                                        <!-- end of table row data -->

                                        <?php
                                        }
                                        } //end of main while loop

                                        // this will execute if the result is not found
                                        if($checkergarbdisposal==true){
                                        ?>
                                        <!-- table row for not found -->
                                        <tbody>
                                        <tr>
                                            <td data-label="-"><?php echo "-"; ?></td>                                                         
                                            <td data-label="-"><?php echo "-"; ?></td>                                                         
                                            <td data-label="-"><?php echo "-"; ?></td>
                                            <td data-label="-"><?php echo "-"; ?></td>
                                            <td data-label="-"><?php echo "-"; ?></td>
                                            <td data-label="-"><?php echo "-"; ?></td>
                                            <td data-label="-"><?php echo "-"; ?></td>                                                            
                                        </tr>
                                        </tbody>
                                        <?php
                                        }
                                        ?>
                                    
                                    </table>
                                    <!-- end of table -->
                                        </div>
                                    <?php
                                }
                                //end of garbdisposal condition 
                                     else if($searchby=="Water Source"){

                                        //we use this checker in order for us to check if the record does not exist
                                        //if the record exist the value of it will be false
                                        //and once this will become true it will not meet the condition below that ask if checkernum is still true
                                        //but if its still true or it didint go inside the while loop then it will meet the condition and
                                        //it will display that there is no records found
                                        $checkerwatersource=true;

                                        $_SESSION['viewcondition']=43;

                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;

                                        ?>
                                        <div class="table-div">  
                                        <?php 
                                        $countwatersource="SELECT * FROM `table1` WHERE watersource='$search' and barangay='$_SESSION[userbarangay]'";
                                        $countwatersourceresult=mysqli_query($conn,$countwatersource);
                                        $existwatersource=false;
                                        $countnumrowswatersource=0;
                                        
                                        while($rowcountwatersource=mysqli_fetch_array($countwatersourceresult)){
                                            $countwatersourceid=$rowcountwatersource['id'];

                                            $countwatersource1="SELECT * FROM `table2` WHERE mainid='$countwatersourceid' and horm='Head'";
                                            $countwatersourceresult1=mysqli_query($conn,$countwatersource1);

                                            while($rowcountwatersource1=mysqli_fetch_array($countwatersourceresult1)){
                                                $existwatersource=true;
                                                $countnumrowswatersource++;
                                            }
                                        
                                        }

                                        if($existwatersource==false){
                                            $emptycountwatersource=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Water Source</b></p>
                                                    <p class="info-p"  ><i class="fas fa-tint" style="margin-right:5px;"></i>Water Source : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountwatersource ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Water Source</b></p>
                                                    <p class="info-p"  ><i class="fas fa-tint" style="margin-right:5px;"></i>Water Source : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowswatersource ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Head Name</th>
                                                <th style="color:#076C07;font-weight:bold">Water Source</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            //this query is to search for famnum that is equal to the input value
                                            $querywatersource="SELECT * FROM `table1` WHERE watersource='$search' and barangay='$_SESSION[userbarangay]'";
                                            $resultwatersource=mysqli_query($conn,$querywatersource);

                                            //this will execute if the query found a match
                                            while($rowwatersource=mysqli_fetch_array($resultwatersource)){
                                            $watersourceid=$rowwatersource['id'];
                                        
                                            $querywatersource1="SELECT * FROM `table2` WHERE mainid='$watersourceid' and horm='Head' ORDER BY mainid";
                                            $resultwatersource1=mysqli_query($conn,$querywatersource1);
                
                                            while($rowwatersource1=mysqli_fetch_array($resultwatersource1)){
                                            $checkerwatersource=false;  
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                                <td data-label="Family ID"><b><?php echo $rowwatersource1['mainid']; ?></b></td>
                                                <td data-label="Head Name"><?php echo $rowwatersource1['fullname']; ?></td>
                                                <td data-label="Water Source" style="color:#076C07;font-weight:bold"><?php echo $rowwatersource['watersource']; ?></td> 
                                                <td data-label="Sex"><?php echo $rowwatersource1['sex']; ?></td>                                                        
                                                <td data-label="Purok"><?php echo $rowwatersource['purok']; ?></td>
                                                <td data-label="Barangay"><?php echo $rowwatersource['barangay']; ?></td>      
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />    
                                                        <input type="hidden" value="<?php echo $rowwatersource['id']; ?>" name="hidden-btn" />
                                                        <input type="submit"  value="View" class="view_btn" name="view"  />
                                                    </form>
                                                </td>               
                                            </tr>
                                            <tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            } //end of main while loop

                                            // this will execute if the result is not found
                                            if($checkerwatersource==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>  
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                               
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of watersource condition 
                                    



                                    //familyplan codition if it is searched
                                    else if($searchby=="Family Planning"){

                                        //we use this checker in order for us to check if the record does not exist
                                        //if the record exist the value of it will be false
                                        //and once this will become true it will not meet the condition below that ask if checkernum is still true
                                        //but if its still true or it didint go inside the while loop then it will meet the condition and
                                        //it will display that there is no records found
                                        $checkerfamilyplan=true;

                                        $_SESSION['viewcondition']=14;
                                        
                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;

                                        ?>
                                        <div class="table-div">  
                                        <?php 
                                        $countfamilyplan="SELECT * FROM `table1` WHERE familyplan='$search' and barangay='$_SESSION[userbarangay]'";
                                        $countfamilyplanresult=mysqli_query($conn,$countfamilyplan);
                                        $existfamilyplan=false;
                                        $countnumrowsfamilyplan=0;
                                        
                                        while($rowcountfamilyplan=mysqli_fetch_array($countfamilyplanresult)){
                                            $countfamilyplanid=$rowcountfamilyplan['id'];

                                            $countfamilyplan1="SELECT * FROM `table2` WHERE mainid='$countfamilyplanid' and horm='Head'";
                                            $countfamilyplanresult1=mysqli_query($conn,$countfamilyplan1);

                                            while($rowcountfamilyplan1=mysqli_fetch_array($countfamilyplanresult1)){
                                                $existfamilyplan=true;
                                                $countnumrowsfamilyplan++;
                                            }
                                            

                                        }

                                        if($existfamilyplan==false){
                                            $emptycountfamilyplan=0;
                                            ?>
                                           <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Family Planning</b></p>
                                                    <p class="info-p"  ><i class="fas fa-users" style="margin-right:5px;"></i>Family Planning : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountfamilyplan ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Family Planning</b></p>
                                                    <p class="info-p"  ><i class="fas fa-users" style="margin-right:5px;"></i>Family Planning : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsfamilyplan ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Head Name</th>
                                                <th style="color:#076C07;font-weight:bold">Family Planning</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            //this query is to search for famnum that is equal to the input value
                                            $queryfamilyplan="SELECT * FROM `table1` WHERE familyplan='$search' and barangay='$_SESSION[userbarangay]'";
                                            $resultfamilyplan=mysqli_query($conn,$queryfamilyplan);

                                            //this will execute if the query found a match
                                            while($rowfamilyplan=mysqli_fetch_array($resultfamilyplan)){
                                            $familyplanid=$rowfamilyplan['id'];
                                        
                                            $queryfamilyplan1="SELECT * FROM `table2` WHERE mainid='$familyplanid' and horm='Head' ORDER BY mainid";
                                            $resultfamilyplan1=mysqli_query($conn,$queryfamilyplan1);
                
                                            while($rowfamilyplan1=mysqli_fetch_array($resultfamilyplan1)){
                                            $checkerfamilyplan=false;  
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                                <td data-label="Family ID"><b><?php echo $rowfamilyplan1['mainid']; ?></b></td>
                                                <td data-label="Head Name"><?php echo $rowfamilyplan1['fullname']; ?></td>
                                                <td data-label="Family Planning" style="color:#076C07;font-weight:bold"><?php echo $rowfamilyplan['familyplan']; ?></td>   
                                                <td data-label="Sex"><?php echo $rowfamilyplan1['sex']; ?></td>                                                         
                                                <td data-label="Purok"><?php echo $rowfamilyplan['purok']; ?></td>   
                                                <td data-label="Barangay"><?php echo $rowfamilyplan['barangay']; ?></td>   
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />    
                                                        <input type="hidden" value="<?php echo $rowfamilyplan['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view"  value="View" class="view_btn"/>
                                                    </form>
                                                </td>               
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            } //end of main while loop

                                            // this will execute if the result is not found
                                            if($checkerfamilyplan==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of familyplan condition


                                     //bground codition if it is searched
                                     else if($searchby=="Background Gardening"){

                                        //we use this checker in order for us to check if the record does not exist
                                        //if the record exist the value of it will be false
                                        //and once this will become true it will not meet the condition below that ask if checkernum is still true
                                        //but if its still true or it didint go inside the while loop then it will meet the condition and
                                        //it will display that there is no records found
                                        $checkerbground=true;

                                        
                                        $_SESSION['viewcondition']=6;
                                        
                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                
                                
                                        ?>
                                        <div class="table-div">
                                        <?php 
                                        $countbground="SELECT * FROM `table1` WHERE bground='$search' and barangay='$_SESSION[userbarangay]'";
                                        $countbgroundresult=mysqli_query($conn,$countbground);
                                        $existbground=false;
                                        $countnumrowsbground=0;

                                        while($rowcountbground=mysqli_fetch_array($countbgroundresult)){
                                            $countbgroundid=$rowcountbground['id'];

                                            $countbground1="SELECT * FROM `table2` WHERE mainid='$countbgroundid' and horm='Head'";
                                            $countbgroundresult1=mysqli_query($conn,$countbground1);

                                            while($rowcountbground1=mysqli_fetch_array($countbgroundresult1)){
                                                $existbground=true;
                                                $countnumrowsbground++;
                                            }
                                            

                                        }

                                        if($existbground==false){
                                            $emptycountbgroud=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Background Gardening</b></p>
                                                    <p class="info-p"  ><i class="fas fa-tree" style="margin-right:5px;"></i>Background Gardening : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                    <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountbgroud ?></b></p></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Background Gardening</b></p>
                                                    <p class="info-p"  ><i class="fas fa-tree" style="margin-right:5px;"></i>Background Gardening : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                    <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsbground ?></b></p>
                                                    <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>  
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Head Name</th>
                                                <th style="color:#076C07;font-weight:bold">Background Gardening</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            //this query is to search for famnum that is equal to the input value
                                            $querybground="SELECT * FROM `table1` WHERE bground='$search' and barangay='$_SESSION[userbarangay]'";
                                            $resultbground=mysqli_query($conn,$querybground);

                                            //this will execute if the query found a match
                                            while($rowbground=mysqli_fetch_array($resultbground)){
                                            $bgroundid=$rowbground['id'];
                                        
                                            $querybground1="SELECT * FROM `table2` WHERE mainid='$bgroundid' and horm='Head' ORDER BY mainid";
                                            $resultbground1=mysqli_query($conn,$querybground1);
                    
                                            while($rowbground1=mysqli_fetch_array($resultbground1)){    
                                            $checkerbground=false;  
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                                <td data-label="Mainid"><b><?php echo $rowbground1['mainid']; ?></b></td> 
                                                <td data-label="Head Name"><?php echo $rowbground1['fullname']; ?></td>   
                                                <td data-label="Background Gardening" style="color:#076C07;font-weight:bold"><?php echo $rowbground['bground']; ?></td>
                                                <td data-label="Sex"><?php echo $rowbground1['sex']; ?></td>
                                                <td data-label="Purok"><?php echo $rowbground['purok']; ?></td>                                                           
                                                <td data-label="Barangay"><?php echo $rowbground['barangay']; ?></td>   
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />    
                                                        <input type="hidden" value="<?php echo $rowbground['id']; ?>" name="hidden-btn" />
                                                        <input type="submit"  value="View" name="view" class="view_btn"/>
                                                    </form>
                                                </td>               
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            } //end of main while loop

                                            // this will execute if the result is not found
                                            if($checkerbground==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>    
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                        
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of bground condition



                                    //livestat codition if it is searched
                                    else if($searchby=="Livelihood Status"){

                                        //we use this checker in order for us to check if the record does not exist
                                        //if the record exist the value of it will be false
                                        //and once this will become true it will not meet the condition below that ask if checkernum is still true
                                        //but if its still true or it didint go inside the while loop then it will meet the condition and
                                        //it will display that there is no records found
                                        $checkerlivestat=true;

                                        $_SESSION['viewcondition']=24;

                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                
                                        ?>
                                        <div class="table-div"> 
                                        <?php 
                                        $countlivestat="SELECT * FROM `table1` WHERE livestat='$search' and barangay='$_SESSION[userbarangay]'";
                                        $countlivestatresult=mysqli_query($conn,$countlivestat);
                                        $existlivestat=false;
                                        $countnumrowslivestat=0;

                                        
                                        while($rowcountlivestat=mysqli_fetch_array($countlivestatresult)){
                                            $countlivestatid=$rowcountlivestat['id'];

                                            $countlivestat1="SELECT * FROM `table2` WHERE mainid='$countlivestatid' and horm='Head'";
                                            $countlivestatresult1=mysqli_query($conn,$countlivestat1);

                                            while($rowcountlivestat1=mysqli_fetch_array($countlivestatresult1)){
                                                $existlivestat=true;
                                                $countnumrowslivestat++;
                                            }
                                            

                                        }

                                        if($existlivestat==false){
                                            $emptycountlivestat=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Livelihood Status</b></p>
                                                    <p class="info-p"  ><i class="fas fa-home" style="margin-right:5px;"></i>Livelihood Status : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountlivestat ?></b></p></p> 
                                                </div>
                                            </div>
                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Livelihood Status</b></p>
                                                    <p class="info-p"  ><i class="fas fa-home" style="margin-right:5px;"></i>Livelihood Status : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowslivestat ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?> 
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Head Name</th>
                                                <th style="color:#076C07;font-weight:bold">Livelihood Status</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            //this query is to search for famnum that is equal to the input value
                                            $querylivestat="SELECT * FROM `table1` WHERE livestat='$search' and barangay='$_SESSION[userbarangay]'";
                                            $resultlivestat=mysqli_query($conn,$querylivestat);

                                            //this will execute if the query found a match
                                            while($rowlivestat=mysqli_fetch_array($resultlivestat)){
                                            
                                            // this variable serves as to get the hhnum of the famnum who matches the input
                                            $livestatid=$rowlivestat['id'];
                                            
                                            //this query will search for barangay if it is santacruz
                                            //also it will search for hhnum that is similar to the hhnum of the famnum who matches the input value
                                            //also it will search if that person is the head if its not then it will skip this
                                            $querylivestat1="SELECT * FROM `table2` WHERE mainid='$livestatid' and horm='head' ORDER BY mainid ";
                                            $resultlivestat1=mysqli_query($conn,$querylivestat1);
                                            
                                            //this will execute if the above query found all the information needed
                                            while($rowlivestat1=mysqli_fetch_array($resultlivestat1)){

                                            //if the query found a match it will become false
                                            //and it wont meet the if requirements below 
                                            $checkerlivestat=false;  
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                                <td data-label="Family ID"><b><?php echo $rowlivestat1['mainid']; ?></b></td>
                                                <td data-label="Head Name"><?php echo $rowlivestat1['fullname']; ?></td>   
                                                <td data-label="Livelihood Status" style="color:#076C07;font-weight:bold"><?php echo $rowlivestat['livestat']; ?></td>
                                                <td data-label="Sex"><?php echo $rowlivestat1['sex']; ?></td>
                                                <td data-label="Purok"><?php echo $rowlivestat['purok']; ?></td>                                                            
                                                <td data-label="Barangay"><?php echo $rowlivestat['barangay']; ?></td>   
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />    
                                                        <input type="hidden" value="<?php echo $rowlivestat['id']; ?>" name="hidden-btn" />
                                                        <input type="submit"  value="View" name="view" class="view_btn"/>
                                                    </form>
                                                </td>               
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }//end of nested while loop
                                            
                                            } //end of main while loop

                                            // this will execute if the result is not found
                                            if($checkerlivestat==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td>                                                          
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of livestat condition



                                    //animals codition if it is searched
                                    else if($searchby=="Animals/Pet"){

                                        //we use this checker in order for us to check if the record does not exist
                                        //if the record exist the value of it will be false
                                        //and once this will become true it will not meet the condition below that ask if checkernum is still true
                                        //but if its still true or it didint go inside the while loop then it will meet the condition and
                                        //it will display that there is no records found
                                        $checkeranimals=true;

                                        $_SESSION['viewcondition']=4;
                                        
                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                
                                        ?>
                                        <div class="table-div">
                                        <?php 
                                        $countanimals="SELECT * FROM `table1` WHERE animals='$search' and barangay='$_SESSION[userbarangay]'";
                                        $countanimalsresult=mysqli_query($conn,$countanimals);
                                        $existanimals=false;
                                        $countnumrowsanimals=0;
                                        
                                        while($rowcountanimals=mysqli_fetch_array($countanimalsresult)){
                                            $countanimalsid=$rowcountanimals['id'];

                                            $countanimals1="SELECT * FROM `table2` WHERE mainid='$countanimalsid' and horm='Head'";
                                            $countanimalsresult1=mysqli_query($conn,$countanimals1);

                                            while($rowcountanimals1=mysqli_fetch_array($countanimalsresult1)){
                                                $existanimals=true;
                                                $countnumrowsanimals++;
                                            }
                                            

                                        }

                                        if($existanimals==false){
                                            $emptycountanimals=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Animals/Pet</b></p>
                                                    <p class="info-p"  ><i class="fas fa-paw" style="margin-right:5px;"></i>Animals/Pet : <b><?php echo $search ?></b></p>
                                                </div>
                                            
                                                <div class="p-div count-div1">
                                                    <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountanimals ?></b></p></p> 
                                                </div>
                                            </div>
                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Animals/Pet</b></p>
                                                    <p class="info-p"  ><i class="fas fa-paw" style="margin-right:5px;"></i>Animals/Pet : <b><?php echo $search ?></b></p>
                                                </div>
                                            
                                                <div class="p-div count-div1">
                                                    <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsanimals ?></b></p>
                                                    <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>   
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Head Name</th>
                                                <th style="color:#076C07;font-weight:bold">Animal/Pet</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            //this query is to search for famnum that is equal to the input value
                                            $queryanimals="SELECT * FROM `table1` WHERE animals='$search' and barangay='$_SESSION[userbarangay]' ";
                                            $resultanimals=mysqli_query($conn,$queryanimals);

                                            //this will execute if the query found a match
                                            while($rowanimals=mysqli_fetch_array($resultanimals)){
                                            $animalsid=$rowanimals['id'];
                                        
                                            $queryanimals1="SELECT * FROM `table2` WHERE mainid='$animalsid' and horm='Head' ORDER BY mainid";
                                            $resultanimals1=mysqli_query($conn,$queryanimals1);
                        
                                            while($rowanimals1=mysqli_fetch_array($resultanimals1)){ 
                                            
                                            $checkeranimals=false;  
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                                <td data-label="Mainid"><b><?php echo $rowanimals1['mainid']; ?></b></td>   
                                                <td data-label="Head Name"><?php echo $rowanimals1['fname']; ?> <?php echo $rowanimals1['mname']; ?> <?php echo $rowanimals1['lname']; ?></td>   
                                                <td data-label="Animals" style="color:#076C07;font-weight:bold"><?php echo $rowanimals['animals']; ?></td> 
                                                <td data-label="Sex"><?php echo $rowanimals1['sex']; ?></td> 
                                                <td data-label="Purok"><?php echo $rowanimals['purok']; ?></td>                                                            
                                                <td data-label="Barangay"><?php echo $rowanimals['barangay']; ?></td>
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />    
                                                        <input type="hidden" value="<?php echo $rowanimals['id']; ?>" name="hidden-btn" />
                                                        <input type="submit"  value="View" class="view_btn" name="view" />
                                                    </form>
                                                </td>               
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            } //end of main while loop

                                            // this will execute if the result is not found
                                            if($checkeranimals==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                           
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of animals condition



                                    //blinddrain codition if it is searched
                                    else if($searchby=="Blind Drainage"){

                                        //we use this checker in order for us to check if the record does not exist
                                        //if the record exist the value of it will be false
                                        //and once this will become true it will not meet the condition below that ask if checkernum is still true
                                        //but if its still true or it didint go inside the while loop then it will meet the condition and
                                        //it will display that there is no records found
                                        $checkerblinddrain=true;

                                        $_SESSION['viewcondition']=8;
                                        
                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                
                                        ?>
                                        <div class="table-div">
                                        <?php 
                                        $countblinddrain="SELECT * FROM `table1` WHERE blinddrain='$search' and barangay='$_SESSION[userbarangay]'";
                                        $countblinddrainresult=mysqli_query($conn,$countblinddrain);
                                        $existblinddrain=false;
                                        $countnumrowsblinddrain=0;
                                        
                                        while($rowcountblinddrain=mysqli_fetch_array($countblinddrainresult)){
                                            $countblinddrainid=$rowcountblinddrain['id'];

                                            $countblinddrain1="SELECT * FROM `table2` WHERE mainid='$countblinddrainid' and horm='Head'";
                                            $countblinddrainresult1 =mysqli_query($conn,$countblinddrain1);

                                            while($rowcountblinddrain1=mysqli_fetch_array($countblinddrainresult1)){
                                                $existblinddrain=true;
                                                $countnumrowsblinddrain++;
                                            }
                                            

                                        }

                                        if($existblinddrain==false){
                                            $emptycountblinddrain=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Blind Drainage</b></p>
                                                    <p class="info-p"  ><i class="fas fa-tint" style="margin-right:5px;"></i>Blind Drainage : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountblinddrain ?></b></p></p> 
                                                </div>
                                            </div>
                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Blind Drainage</b></p>
                                                    <p class="info-p"  ><i class="fas fa-tint" style="margin-right:5px;"></i>Blind Drainage : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsblinddrain ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>   
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Head Name</th>
                                                <th style="color:#076C07;font-weight:bold">Blind Drainage</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            //this query is to search for famnum that is equal to the input value
                                            $queryblinddrain="SELECT * FROM `table1` WHERE blinddrain='$search' and barangay='$_SESSION[userbarangay]'";
                                            $resultblinddrain=mysqli_query($conn,$queryblinddrain);

                                            //this will execute if the query found a match
                                            while($rowblinddrain=mysqli_fetch_array($resultblinddrain)){
                                            $blinddrainid=$rowblinddrain['id'];
                                        
                                            $queryblinddrain1="SELECT * FROM `table2` WHERE mainid='$blinddrainid' and horm='Head' ORDER BY mainid";
                                            $resultblinddrain1=mysqli_query($conn,$queryblinddrain1);
                            
                                            while($rowblinddrain1=mysqli_fetch_array($resultblinddrain1)){
                                            $checkerblinddrain=false;  
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                                <td data-label="Mainid"><b><?php echo $rowblinddrain1['mainid']; ?></b></td>                                                         
                                                <td data-label="Head Name"><?php echo $rowblinddrain1['fullname']; ?></td>   
                                                <td data-label="Blind Drainage" style="color:#076C07;font-weight:bold"><?php echo $rowblinddrain['blinddrain']; ?></td>  
                                                <td data-label="Sex"><?php echo $rowblinddrain1['sex']; ?></td>                                                        
                                                <td data-label="Purok"><?php echo $rowblinddrain['purok']; ?></td> 
                                                <td data-label="Barangay"><?php echo $rowblinddrain['barangay']; ?></td>   
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />    
                                                        <input type="hidden" value="<?php echo $rowblinddrain['id']; ?>" name="hidden-btn" />
                                                        <input type="submit"  value="View" name="view" class="view_btn"/>
                                                    </form>
                                                </td>               
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            } //end of main while loop

                                            // this will execute if the result is not found
                                            if($checkerblinddrain==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of blinddrain condition

                                    //communication codition if it is searched
                                    else if($searchby=="Communication"){

                                        //we use this checker in order for us to check if the record does not exist
                                        //if the record exist the value of it will be false
                                        //and once this will become true it will not meet the condition below that ask if checkernum is still true
                                        //but if its still true or it didint go inside the while loop then it will meet the condition and
                                        //it will display that there is no records found
                                        $checkercommunication=true;

                                        $_SESSION['viewcondition']=10;
                                        
                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                
                                        ?>
                                        <div class="table-div">  
                                        <?php 
                                        $countcommunication="SELECT * FROM `table1` WHERE communication='$search' and barangay='$_SESSION[userbarangay]'";
                                        $countcommunicationresult=mysqli_query($conn,$countcommunication);
                                        $existcommunication=false;
                                        $countnumrowscommunication=0;
                                        
                                        while($rowcountcommunication=mysqli_fetch_array($countcommunicationresult)){
                                            $countcommunicationid=$rowcountcommunication['id'];

                                            $countcommunication1="SELECT * FROM `table2` WHERE mainid='$countcommunicationid' and horm='Head'";
                                            $countcommunicationresult1=mysqli_query($conn,$countcommunication1);

                                            while($rowcountcommunication1=mysqli_fetch_array($countcommunicationresult1)){
                                                $existcommunication=true;
                                                $countnumrowscommunication++;
                                            }
                                            

                                        }

                                        if($existcommunication==false){
                                            $emptycountcommunication=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Communication</b></p>
                                                    <p class="info-p"  ><i class="fas fa-phone" style="margin-right:5px;"></i>Communication : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountcommunication ?></b></p></p> 
                                                </div>
                                            </div>
                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Communication</b></p>
                                                    <p class="info-p"  ><i class="fas fa-phone" style="margin-right:5px;"></i>Communication : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowscommunication ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>  
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Head Name</th>
                                                <th style="color:#076C07;font-weight:bold">Communication</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            //this query is to search for famnum that is equal to the input value
                                            $querycommunication="SELECT * FROM `table1` WHERE communication='$search' and barangay='$_SESSION[userbarangay]'";
                                            $resultcommunication=mysqli_query($conn,$querycommunication);

                                            //this will execute if the query found a match
                                            while($rowcommunication=mysqli_fetch_array($resultcommunication)){
                                            $communicationid=$rowcommunication['id'];
                                        
                                            $querycommunication1="SELECT * FROM `table2` WHERE mainid='$communicationid' and horm='Head' ORDER BY mainid";
                                            $resultcommunication1=mysqli_query($conn,$querycommunication1);
                                
                                            while($rowcommunication1=mysqli_fetch_array($resultcommunication1)){
                                            $checkercommunication=false;  
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                                <td data-label="Mainid"><b><?php echo $rowcommunication1['mainid']; ?></b></td>                                                         
                                                <td data-label="Head Name"><?php echo $rowcommunication1['fullname']; ?></td>   
                                                <td data-label="Communication" style="color:#076C07;font-weight:bold"><?php echo $rowcommunication['communication']; ?></td> 
                                                <td data-label="Sex"><?php echo $rowcommunication1['sex']; ?></td>                                                           
                                                <td data-label="Purok"><?php echo $rowcommunication['purok']; ?></td>   
                                                <td data-label="Barangay"><?php echo $rowcommunication['barangay']; ?></td>   
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />    
                                                        <input type="hidden" value="<?php echo $rowcommunication['id']; ?>" name="hidden-btn" />
                                                        <input type="submit"  value="View" name="view" class="view_btn" />
                                                    </form>
                                                </td>               
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            } //end of main while loop

                                            // this will execute if the result is not found
                                            if($checkercommunication==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>    
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>           
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of communication condition



                                    //homestat codition if it is searched
                                    else if($searchby=="Home Status"){

                                        //we use this checker in order for us to check if the record does not exist
                                        //if the record exist the value of it will be false
                                        //and once this will become true it will not meet the condition below that ask if checkernum is still true
                                        //but if its still true or it didint go inside the while loop then it will meet the condition and
                                        //it will display that there is no records found
                                        $checkerhomestat=true;

                                        $_SESSION['viewcondition']=18;
                                        
                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                
                                        ?>
                                        <div class="table-div">
                                        <?php 
                                        $counthomestat="SELECT * FROM `table1` WHERE homestat='$search' and barangay='$_SESSION[userbarangay]'";
                                        $counthomestatresult=mysqli_query($conn,$counthomestat);
                                        $existhomestat=false;
                                        $countnumrowshomestat=0;
                                        
                                        while($rowcounthomestat=mysqli_fetch_array($counthomestatresult)){
                                            $counthomestatid=$rowcounthomestat['id'];

                                            $counthomestat1="SELECT * FROM `table2` WHERE mainid='$counthomestatid' and horm='Head'";
                                            $counthomestatresult1=mysqli_query($conn,$counthomestat1);

                                            while($rowcounthomestat1=mysqli_fetch_array($counthomestatresult1)){
                                                $existhomestat=true;
                                                $countnumrowshomestat++;
                                            }
                                            

                                        }

                                        if($existhomestat==false){
                                            $emptycounthomestat=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Home Status</b></p>
                                                    <p class="info-p"  ><i class="fas fa-home" style="margin-right:5px;"></i>Home Status : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycounthomestat ?></b></p></p> 
                                                </div>
                                            </div>
                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Home Status</b></p>
                                                    <p class="info-p"  ><i class="fas fa-home" style="margin-right:5px;"></i>Home Status : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowshomestat ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>   
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Head Name</th>
                                                <th style="color:#076C07;font-weight:bold">Home Status</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            //this query is to search for famnum that is equal to the input value
                                            $queryhomestat="SELECT * FROM `table1` WHERE homestat='$search' and barangay='$_SESSION[userbarangay]'";
                                            $resulthomestat=mysqli_query($conn,$queryhomestat);

                                            //this will execute if the query found a match
                                            while($rowhomestat=mysqli_fetch_array($resulthomestat)){
                                            $homestatid=$rowhomestat['id'];
                                        
                                            $queryhomestat1="SELECT * FROM `table2` WHERE mainid='$homestatid' and horm='Head'ORDER BY mainid";
                                            $resulthomestat1=mysqli_query($conn,$queryhomestat1);
                                    
                                            while($rowhomestat1=mysqli_fetch_array($resulthomestat1)){
                                
                                            $checkerhomestat=false;  
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                                <td data-label="Family ID"><b><?php echo $rowhomestat1['mainid']; ?></b></td>                                                         
                                                <td data-label="Head Name"><?php echo $rowhomestat1['fullname']; ?></td>   
                                                <td data-label="Home Status" style="color:#076C07;font-weight:bold"><?php echo $rowhomestat['homestat']; ?></td>
                                                <td data-label="Sex"><?php echo $rowhomestat1['sex']; ?></td>                                                            
                                                <td data-label="Purok"><?php echo $rowhomestat['purok']; ?></td>  
                                                <td data-label="Barangay"><?php echo $rowhomestat['barangay']; ?></td>    
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />    
                                                        <input type="hidden" value="<?php echo $rowhomestat['id']; ?>" name="hidden-btn" />
                                                        <input type="submit"  value="View" name="view" class="view_btn"/>
                                                    </form>
                                                </td>               
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            } //end of main while loop

                                            // this will execute if the result is not found
                                            if($checkerhomestat==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                           
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of homestat condition



                                    //energysource codition if it is searched
                                    else if($searchby=="Energy Source"){

                                        //we use this checker in order for us to check if the record does not exist
                                        //if the record exist the value of it will be false
                                        //and once this will become true it will not meet the condition below that ask if checkernum is still true
                                        //but if its still true or it didint go inside the while loop then it will meet the condition and
                                        //it will display that there is no records found
                                        $checkerenergysource=true;

                                        $_SESSION['viewcondition']=13;
                                        
                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                
                                        ?>
                                        <div class="table-div"> 
                                        <?php 
                                        $countenergysource="SELECT * FROM `table1` WHERE energysource='$search' and barangay='$_SESSION[userbarangay]'";
                                        $countenergysourceresult=mysqli_query($conn,$countenergysource);
                                        $existenergysource=false;
                                        $countnumrowsenergysource=0;
                                        
                                        while($rowcountenergysource=mysqli_fetch_array($countenergysourceresult)){
                                            $countenergysourceid=$rowcountenergysource['id'];

                                            $countenergysource1="SELECT * FROM `table2` WHERE mainid='$countenergysourceid' and horm='Head'";
                                            $countenergysourceresult1=mysqli_query($conn,$countenergysource1);

                                            while($rowcountenergysource1=mysqli_fetch_array($countenergysourceresult1)){
                                                $existenergysource=true;
                                                $countnumrowsenergysource++;
                                            }   

                                        }

                                        if($existenergysource==false){
                                            $emptycountenergysource=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Energy Source</b></p>
                                                    <p class="info-p"  ><i class="fas fa-bolt" style="margin-right:5px;"></i>Energy Source : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountenergysource ?></b></p></p> 
                                                </div>
                                            </div>
                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Energy Source</b></p>
                                                    <p class="info-p"  ><i class="fas fa-bolt" style="margin-right:5px;"></i>Energy Source : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsenergysource ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>  
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Head Name</th>
                                                <th style="color:#076C07;font-weight:bold">Energy Source</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            //this query is to search for famnum that is equal to the input value
                                            $queryenergysource="SELECT * FROM `table1` WHERE energysource='$search' and barangay='$_SESSION[userbarangay]'";
                                            $resultenergysource=mysqli_query($conn,$queryenergysource);

                                            //this will execute if the query found a match
                                            while($rowenergysource=mysqli_fetch_array($resultenergysource)){
                                            $energysourceid=$rowenergysource['id'];
                                        
                                            $queryenergysource1="SELECT * FROM `table2` WHERE mainid='$energysourceid' and horm='Head' ORDER BY mainid ";
                                            $resultenergysource1=mysqli_query($conn,$queryenergysource1);
                                        
                                            while($rowenergysource1=mysqli_fetch_array($resultenergysource1)){
                                                
                                                $checkerenergysource=false;  
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                                <td data-label="Mainid"><b><?php echo $rowenergysource1['mainid']; ?></b></td>                                                         
                                                <td data-label="Head Name"><?php echo $rowenergysource1['fullname']; ?></td>   
                                                <td data-label="Energy Source" style="color:#076C07;font-weight:bold"><?php echo $rowenergysource['energysource']; ?></td>   
                                                <td data-label="Sex"><?php echo $rowenergysource1['sex']; ?></td>                                                       
                                                <td data-label="Purok"><?php echo $rowenergysource['purok']; ?></td> 
                                                <td data-label="Barangay"><?php echo $rowenergysource['barangay']; ?></td>    
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />    
                                                        <input type="hidden" value="<?php echo $rowenergysource['id']; ?>" name="hidden-btn" />
                                                        <input type="submit"  value="View" name="view" class="view_btn"/>
                                                    </form>
                                                </td>               
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            } //end of main while loop

                                            // this will execute if the result is not found
                                            if($checkerenergysource==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>  
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                        
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of energysource condition




                                    //dwtwbd codition if it is searched
                                    else if($searchby=="Direct Waste to Water Bodies"){

                                        //we use this checker in order for us to check if the record does not exist
                                        //if the record exist the value of it will be false
                                        //and once this will become true it will not meet the condition below that ask if checkernum is still true
                                        //but if its still true or it didint go inside the while loop then it will meet the condition and
                                        //it will display that there is no records found
                                        $checkerdwtwbd=true;

                                        $_SESSION['viewcondition']=12;
                                        
                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                
                                        ?>
                                        <div class="table-div"> 
                                        <?php 
                                        $countdwtwbd="SELECT * FROM `table1` WHERE dwtwbd='$search' and barangay='$_SESSION[userbarangay]'";
                                        $countdwtwbdresult=mysqli_query($conn,$countdwtwbd);
                                        $existdwtwbd=false;
                                        $countnumrowsdwtwbd=0;
                                        
                                        while($rowcountdwtwbd=mysqli_fetch_array($countdwtwbdresult)){
                                            $countdwtwbdid=$rowcountdwtwbd['id'];

                                            $countdwtwbd1="SELECT * FROM `table2` WHERE mainid='$countdwtwbdid' and horm='Head'";
                                            $countdwtwbdresult1=mysqli_query($conn,$countdwtwbd1);

                                            while($rowcountdwtwbd1=mysqli_fetch_array($countdwtwbdresult1)){
                                                $existdwtwbd=true;
                                                $countnumrowsdwtwbd++;
                                            }
                                            

                                        }

                                        if($existdwtwbd==false){
                                            $emptycountdwtwbd=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Direct Waste to Water Bodies</b></p>
                                                    <p class="info-p"  ><i class="fas fa-trash" style="margin-right:5px;"></i>Direct Waste to Water Bodies : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountdwtwbd ?></b></p></p> 
                                                </div>
                                            </div>
                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Direct Waste to Water Bodies</b></p>
                                                    <p class="info-p"  ><i class="fas fa-trash" style="margin-right:5px;"></i>Direct Waste to Water Bodies : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsdwtwbd ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>  
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Head Name</th>
                                                <th style="color:#076C07;font-weight:bold">Direct Waste to Water Bodies</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            //this query is to search for famnum that is equal to the input value
                                            $querydwtwbd="SELECT * FROM `table1` WHERE dwtwbd='$search' and barangay='$_SESSION[userbarangay]'";
                                            $resultdwtwbd=mysqli_query($conn,$querydwtwbd);

                                            //this will execute if the query found a match
                                            while($rowdwtwbd=mysqli_fetch_array($resultdwtwbd)){
                                            $dwtwbdid=$rowdwtwbd['id'];
                                        
                                            $querydwtwbd1="SELECT * FROM `table2` WHERE mainid='$dwtwbdid' and horm='Head' ORDER BY mainid";
                                            $resultdwtwbd1=mysqli_query($conn,$querydwtwbd1);
                                            
                                            while($rowdwtwbd1=mysqli_fetch_array($resultdwtwbd1)){
                                      
                                            $checkerdwtwbd=false;  
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>   
                                                <td data-label="Mainid"><b><?php echo $rowdwtwbd1['mainid']; ?></b></td>   
                                                <td data-label="Head Name"><?php echo $rowdwtwbd1['fullname']; ?></td>   
                                                <td data-label="Direct Waste to Water Bodies" style="color:#076C07;font-weight:bold"><?php echo $rowdwtwbd['dwtwbd']; ?></td>  
                                                <td data-label="Sex"><?php echo $rowdwtwbd1['sex']; ?></td>                                                        
                                                <td data-label="Purok"><?php echo $rowdwtwbd['purok']; ?></td> 
                                                <td data-label="Barangay"><?php echo $rowdwtwbd['barangay']; ?></td>     
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />    
                                                        <input type="hidden" value="<?php echo $rowdwtwbd['id']; ?>" name="hidden-btn" />
                                                        <input type="submit"  value="View" name="view" class="view_btn"/>
                                                    </form>
                                                </td>               
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            } //end of main while loop

                                            // this will execute if the result is not found
                                            if($checkerdwtwbd==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of dwtwbd condition




                                    //vulstat codition if it is searched
                                    else if($searchby=="Vulnerable Status"){

                                        //we use this checker in order for us to check if the record does not exist
                                        //if the record exist the value of it will be false
                                        //and once this will become true it will not meet the condition below that ask if checkernum is still true
                                        //but if its still true or it didint go inside the while loop then it will meet the condition and
                                        //it will display that there is no records found
                                        $checkervulstat=true;

                                        $_SESSION['viewcondition']=42;

                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                
                                        ?>
                                        <div class="table-div">
                                        <?php 
                                        $countvulstat="SELECT * FROM `table1` WHERE vulstat='$search' and barangay='$_SESSION[userbarangay]'";
                                        $countvulstatresult=mysqli_query($conn,$countvulstat);
                                        $existvulstat=false;
                                        $countnumrowsvulstat=0;
                                        
                                        while($rowcountvulstat=mysqli_fetch_array($countvulstatresult)){
                                            $countvulstatid=$rowcountvulstat['id'];

                                            $countvulstat1="SELECT * FROM `table2` WHERE mainid='$countvulstatid' and horm='Head'";
                                            $countvulstatresult1=mysqli_query($conn,$countvulstat1);

                                            while($rowcountvulstat1=mysqli_fetch_array($countvulstatresult1)){
                                                $existvulstat=true;
                                                $countnumrowsvulstat++;
                                            }

                                        }

                                        if($existvulstat==false){
                                            $emptycountvulstat=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Vulnerable Status</b></p>
                                                    <p class="info-p"  ><i class="fas fa-folder" style="margin-right:5px;"></i>Vulnerable Status : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountvulstat ?></b></p></p> 
                                                </div>
                                            </div>
                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Vulnerable Status</b></p>
                                                    <p class="info-p"  ><i class="fas fa-folder" style="margin-right:5px;"></i>Vulnerable Status : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsvulstat ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>   
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Head Name</th>
                                                <th style="color:#076C07;font-weight:bold">Vulnerable Status</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            //this query is to search for famnum that is equal to the input value
                                            $queryvulstat="SELECT * FROM `table1` WHERE vulstat='$search' and barangay='$_SESSION[userbarangay]'";
                                            $resultvulstat=mysqli_query($conn,$queryvulstat);

                                            //this will execute if the query found a match
                                            while($rowvulstat=mysqli_fetch_array($resultvulstat)){
                                            $vulstatid=$rowvulstat['id'];
                                        
                                            $queryvulstat1="SELECT * FROM `table2` WHERE mainid='$vulstatid' and horm='Head' ORDER BY mainid";
                                            $resultvulstat1=mysqli_query($conn,$queryvulstat1);
                                                
                                            while($rowvulstat1=mysqli_fetch_array($resultvulstat1)){
                                            $checkervulstat=false;  
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                                <td data-label="Family ID"><b><?php echo $rowvulstat1['mainid']; ?></b></td> 
                                                <td data-label="Head Name"><?php echo $rowvulstat1['fullname']; ?></td>   
                                                <td data-label="Vulnerable Status" style="color:#076C07;font-weight:bold"><?php echo $rowvulstat['vulstat']; ?></td>
                                                <td data-label="Sex"><?php echo $rowvulstat1['sex']; ?></td>                                                         
                                                <td data-label="Purok"><?php echo $rowvulstat['purok']; ?></td>
                                                <td data-label="Barangay"><?php echo $rowvulstat['barangay']; ?></td>      
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />    
                                                        <input type="hidden" value="<?php echo $rowvulstat['id']; ?>" name="hidden-btn" />
                                                        <input type="submit"  value="View" name="view" class="view_btn"/>
                                                    </form>
                                                </td>               
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            } //end of main while loop

                                            // this will execute if the result is not found
                                            if($checkervulstat==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>  
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                        
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of vulstat condition



                                    //agrifacil codition if it is searched
                                    else if($searchby=="Agricultural Facility"){

                                        //we use this checker in order for us to check if the record does not exist
                                        //if the record exist the value of it will be false
                                        //and once this will become true it will not meet the condition below that ask if checkernum is still true
                                        //but if its still true or it didint go inside the while loop then it will meet the condition and
                                        //it will display that there is no records found
                                        $checkeragrifacil=true;

                                        $_SESSION['viewcondition']=5;
                                        
                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                
                                        ?>
                                        <div class="table-div">  
                                        <?php 
                                        $countagrifacil="SELECT * FROM `table1` WHERE agrifacil='$search' and barangay='$_SESSION[userbarangay]'";
                                        $countagrifacilresult=mysqli_query($conn,$countagrifacil);
                                        $existagrifacil=false;
                                        $countnumrowsagrifacil=0;
                                        
                                        while($rowcountagrifacil=mysqli_fetch_array($countagrifacilresult)){
                                            $countagrifacilid=$rowcountagrifacil['id'];

                                            $countagrifacil1="SELECT * FROM `table2` WHERE mainid='$countagrifacilid' and horm='Head'";
                                            $countagrifacilresult1=mysqli_query($conn,$countagrifacil1);

                                            while($rowcountagrifacil1=mysqli_fetch_array($countagrifacilresult1)){
                                                $existagrifacil=true;
                                                $countnumrowsagrifacil++;
                                            }
                                            

                                        }

                                        if($existagrifacil==false){
                                            $emptycountagrifacil=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Agricultural Facility</b></p>
                                                    <p class="info-p"  ><i class="fas fa-building" style="margin-right:5px;"></i>Agricultural Facility : <b><?php echo $search ?></b></p>
                                                </div>
                                            
                                                <div class="p-div count-div1">
                                                    <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountagrifacil ?></b></p></p> 
                                                </div>
                                            </div>
                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Agricultural Facility</b></p>
                                                    <p class="info-p"  ><i class="fas fa-building" style="margin-right:5px;"></i>Agricultural Facility : <b><?php echo $search ?></b></p>
                                                </div>
                                            
                                                <div class="p-div count-div1">
                                                    <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsagrifacil ?></b></p>
                                                    <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?> 
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Head Name</th>
                                                <th style="color:#076C07;font-weight:bold">Agricultural Facility</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            //this query is to search for famnum that is equal to the input value
                                            $queryagrifacil="SELECT * FROM `table1` WHERE agrifacil='$search' and barangay='$_SESSION[userbarangay]'";
                                            $resultagrifacil=mysqli_query($conn,$queryagrifacil);

                                            //this will execute if the query found a match
                                            while($rowagrifacil=mysqli_fetch_array($resultagrifacil)){
                                            $agrifacilid=$rowagrifacil['id'];
                                        
                                            $queryagrifacil1="SELECT * FROM `table2` WHERE mainid='$agrifacilid' and horm='Head' ORDER BY mainid";
                                            $resultagrifacil1=mysqli_query($conn,$queryagrifacil1);
                                                    
                                            while($rowagrifacil1=mysqli_fetch_array($resultagrifacil1)){
                                            
                                            $checkeragrifacil=false;  
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                                <td data-label="Mainid"><b><?php echo $rowagrifacil1['mainid']; ?></b></td>                                                            
                                                <td data-label="Head Name"><?php echo $rowagrifacil1['fullname']; ?></td>   
                                                <td data-label="Agricultural Facility" style="color:#076C07;font-weight:bold"><?php echo $rowagrifacil['agrifacil']; ?></td>
                                                <td data-label="Sex"><?php echo $rowagrifacil1['sex']; ?></td>                                                            
                                                <td data-label="Purok"><?php echo $rowagrifacil['purok']; ?></td>                                                            
                                                <td data-label="Barangay"><?php echo $rowagrifacil['barangay']; ?></td>   
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />    
                                                        <input type="hidden" value="<?php echo $rowagrifacil['id']; ?>" name="hidden-btn" />
                                                        <input type="submit"  value="View" name="view" class="view_btn"/>
                                                    </form>
                                                </td>               
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            } //end of main while loop

                                            // this will execute if the result is not found
                                            if($checkeragrifacil==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                            
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of agrifacil condition




                                    //osoi codition if it is searched
                                    else if($searchby=="Other Source of Income"){

                                        //we use this checker in order for us to check if the record does not exist
                                        //if the record exist the value of it will be false
                                        //and once this will become true it will not meet the condition below that ask if checkernum is still true
                                        //but if its still true or it didint go inside the while loop then it will meet the condition and
                                        //it will display that there is no records found
                                        $checkerosoi=true;

                                        $_SESSION['viewcondition']=31;

                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                
                                        ?>
                                        <div class="table-div">
                                        <?php 
                                        $countosoi="SELECT * FROM `table1` WHERE osoi='$search' and barangay='$_SESSION[userbarangay]'";
                                        $countosoiresult=mysqli_query($conn,$countosoi);
                                        $existosoi=false;
                                        $countnumrowosoi=0;
                                        
                                        while($rowcountosoi=mysqli_fetch_array($countosoiresult)){
                                            $countosoiid=$rowcountosoi['id'];

                                            $countosoi1="SELECT * FROM `table2` WHERE mainid='$countosoiid' and horm='Head'";
                                            $countosoiresult1=mysqli_query($conn,$countosoi1);

                                            while($rowcountosoi1=mysqli_fetch_array($countosoiresult1)){
                                                $existosoi=true;
                                                $countnumrowosoi++;
                                            }
                                            

                                        }

                                        if($existosoi==false){
                                            $emptycountosoi=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Other Source of Income</b></p>
                                                    <p class="info-p"  ><i class="fas fa-wallet" style="margin-right:5px;"></i>Other Source of Income : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountosoi ?></b></p></p> 
                                                </div>
                                            </div>
                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Other Source of Income</b></p>
                                                    <p class="info-p"  ><i class="fas fa-wallet" style="margin-right:5px;"></i>Other Source of Income : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowosoi ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?>   
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Head Name</th>
                                                <th style="color:#076C07;font-weight:bold">Other Source of Income</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            //this query is to search for famnum that is equal to the input value
                                            $queryosoi="SELECT * FROM `table1` WHERE osoi='$search' and barangay='$_SESSION[userbarangay]'";
                                            $resultosoi=mysqli_query($conn,$queryosoi);

                                            //this will execute if the query found a match
                                            while($rowosoi=mysqli_fetch_array($resultosoi)){
                                            $osoiid=$rowosoi['id'];
                                        
                                            $queryosoi1="SELECT * FROM `table2` WHERE mainid='$osoiid' and horm='Head' ORDER BY mainid";
                                            $resultosoi1=mysqli_query($conn,$queryosoi1);
                                                    
                                            while($rowosoi1=mysqli_fetch_array($resultosoi1)){
                                            $checkerosoi=false;  
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                                <td data-label="Family ID"><b><?php echo $rowosoi1['mainid']; ?></b></td>
                                                <td data-label="Head Name"><?php echo $rowosoi1['fullname']; ?></td>   
                                                <td data-label="Other Source of Income" style="color:#076C07;font-weight:bold"><?php echo $rowosoi['osoi']; ?></td>                                                         
                                                <td data-label="Sex"><?php echo $rowosoi1['sex']; ?></td>  
                                                <td data-label="Purok"><?php echo $rowosoi['purok']; ?></td>  
                                                <td data-label="Brangay"><?php echo $rowosoi['barangay']; ?></td>    
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />    
                                                        <input type="hidden" value="<?php echo $rowosoi['id']; ?>" name="hidden-btn" />
                                                        <input type="submit"  value="View" name="view" class="view_btn"/>
                                                    </form>
                                                </td>               
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            } //end of main while loop

                                            // this will execute if the result is not found
                                            if($checkerosoi==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>    
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                                 
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of osoi condition



                                    //housestat codition if it is searched
                                    else if($searchby=="House Status"){

                                        //we use this checker in order for us to check if the record does not exist
                                        //if the record exist the value of it will be false
                                        //and once this will become true it will not meet the condition below that ask if checkernum is still true
                                        //but if its still true or it didint go inside the while loop then it will meet the condition and
                                        //it will display that there is no records found
                                        $checkerhousestat=true;

                                        $_SESSION['viewcondition']=19;
                                        
                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                
                                        ?>
                                        <div class="table-div">  
                                        <?php 
                                        $counthousestat="SELECT * FROM `table1` WHERE housestat='$search' and barangay='$_SESSION[userbarangay]'";
                                        $counthousestatresult=mysqli_query($conn,$counthousestat);
                                        $existhousestat=false;
                                        $countnumrowshousestat=0;
                                        
                                        while($rowcounthousestat=mysqli_fetch_array($counthousestatresult)){
                                            $counthousestatid=$rowcounthousestat['id'];

                                            $counthousestat1="SELECT * FROM `table2` WHERE mainid='$counthousestatid' and horm='Head'";
                                            $counthousestatresult1=mysqli_query($conn,$counthousestat1);

                                            while($rowcounthousestat1=mysqli_fetch_array($counthousestatresult1)){
                                                $existhousestat=true;
                                                $countnumrowshousestat++;
                                            }
                                        
                                        }

                                        if($existhousestat==false){
                                            $emptycounthousestat=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>House Status</b></p>
                                                    <p class="info-p"  ><i class="fas fa-home" style="margin-right:5px;"></i>House Status : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycounthousestat ?></b></p></p> 
                                                </div>
                                            </div>
                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>House Status</b></p>
                                                    <p class="info-p"  ><i class="fas fa-home" style="margin-right:5px;"></i>House Status : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowshousestat ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?> 
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Head Name</th>
                                                <th style="color:#076C07;font-weight:bold">House Status</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            //this query is to search for famnum that is equal to the input value
                                            $queryhousestat="SELECT * FROM `table1` WHERE housestat='$search' and barangay='$_SESSION[userbarangay]'";
                                            $resulthousestat=mysqli_query($conn,$queryhousestat);

                                            //this will execute if the query found a match
                                            while($rowhousestat=mysqli_fetch_array($resulthousestat)){
                                            $housestatid=$rowhousestat['id'];
                                        
                                            $queryhousestat1="SELECT * FROM `table2` WHERE mainid='$housestatid' and horm='Head' ORDER BY mainid";
                                            $resulthousestat1=mysqli_query($conn,$queryhousestat1);
                                                        
                                            while($rowhousestat1=mysqli_fetch_array($resulthousestat1)){
                                          
                                            $checkerhousestat=false;  
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                                <td data-label="Family ID"><b><?php echo $rowhousestat1['mainid']; ?></b></td> 
                                                <td data-label="Head Name"><?php echo $rowhousestat1['fullname']; ?></td>   
                                                <td data-label="House Status" style="color:#076C07;font-weight:bold"><?php echo $rowhousestat['housestat']; ?></td>  
                                                <td data-label="Sex"><?php echo $rowhousestat1['sex']; ?></td>                                                        
                                                <td data-label="Purok"><?php echo $rowhousestat['purok']; ?></td> 
                                                <td data-label="Barangay"><?php echo $rowhousestat['barangay']; ?></td>     
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />    
                                                        <input type="hidden" value="<?php echo $rowhousestat['id']; ?>" name="hidden-btn" />
                                                        <input type="submit"  value="View" class="view_btn" name="view" />
                                                    </form>
                                                </td>               
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            } //end of main while loop

                                            // this will execute if the result is not found
                                            if($checkerhousestat==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>  
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of housestat condition

                                    //WRA
                                    else if($searchby=="WRA"){
                                        $checkerwra=true;

                                        $_SESSION['viewcondition']=44;

                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                        ?>
                                        <div class="table-div">
                                        <?php 
                                        $countwra="SELECT * FROM `table1` WHERE wra='$search' and barangay='$_SESSION[userbarangay]'";
                                        $countwraresult=mysqli_query($conn,$countwra);
                                        $existwra=false;
                                        $countnumrowswra=0;

                                        while($rowcountwra=mysqli_fetch_array($countwraresult)){
                                            $countwraid=$rowcountwra['id'];

                                            $countwra1="SELECT * FROM `table2` WHERE mainid='$countwraid' and horm='Head'";
                                            $countwraresult1=mysqli_query($conn,$countwra1);

                                            while($rowcountwra1=mysqli_fetch_array($countwraresult1)){
                                                $existwra=true;
                                                $countnumrowswra++;
                                            }

                                        }

                                        if($existwra==false){
                                            $emptycountwra=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>WRA</b></p>
                                                    <p class="info-p"  ><i class="fas fa-folder" style="margin-right:5px;"></i>WRA : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountwra ?></b></p></p> 
                                                </div>
                                            </div>
                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>WRA</b></p>
                                                    <p class="info-p"  ><i class="fas fa-folder" style="margin-right:5px;"></i>WRA : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowswra ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?> 
                                            <table>
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Head Name</th>
                                                <th style="color:#076C07;font-weight:bold">WRA</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            
                                            <?php
                                            $selectwra="SELECT * FROM `table1` WHERE wra='$search' and barangay='$_SESSION[userbarangay]'";
                                            $wraresult=mysqli_query($conn,$selectwra);
                                            
                                            while($rowwra=mysqli_fetch_array($wraresult)){
                                                $wraid=$rowwra['id'];
                                        
                                                $selectwra1="SELECT * FROM `table2` WHERE mainid='$wraid' and horm='Head' ORDER BY mainid";
                                                $wraresult1=mysqli_query($conn,$selectwra1);
                                                            
                                                while($rowwra1=mysqli_fetch_array($wraresult1)){
                                            $checkerwra=false;
                                            ?>
                                            <tbody>
                                            <tr>
                                                <td data-label="Family ID"><b><?php echo $rowwra1['mainid']; ?></b></td>
                                                <td data-label="Head Name"><?php echo $rowwra1['fullname']; ?></td>
                                                <td data-label="WRA" style="color:#076C07;font-weight:bold"><?php echo $rowwra['wra']; ?></td> 
                                                <td data-label="Sex"><?php echo $rowwra1['sex']; ?></td>                                                        
                                                <td data-label="Purok"><?php echo $rowwra['purok']; ?></td>
                                                <td data-label="Barangay"><?php echo $rowwra['barangay']; ?></td>      
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowwra['id']; ?>" name="hidden-btn" />
                                                        <input type="submit"  value="View" name="view" class="view_btn" />
                                                    </form>
                                                </td>               
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            }
                                            if($checkerwra==true){
                                                ?>
                                                <!-- table row for not found -->
                                                <tbody>
                                                <tr>
                                                    <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                    <td data-label="-"><?php echo "-"; ?></td>
                                                    <td data-label="-"><?php echo "-"; ?></td>   
                                                    <td data-label="-"><?php echo "-"; ?></td>
                                                    <td data-label="-"><?php echo "-"; ?></td>
                                                    <td data-label="-"><?php echo "-"; ?></td>
                                                    <td data-label="-"><?php echo "-"; ?></td>
                                                </tr>
                                                </tbody>
                                            <?php } ?>
                                            </table>
                                        </div>
                                        <?php
                                    }
                                    //END OF WRA

                                    //transportation codition if it is searched
                                    else if($searchby=="Transportation"){

                                        //we use this checker in order for us to check if the record does not exist
                                        //if the record exist the value of it will be false
                                        //and once this will become true it will not meet the condition below that ask if checkernum is still true
                                        //but if its still true or it didint go inside the while loop then it will meet the condition and
                                        //it will display that there is no records found
                                        $checkertransportation=true;

                                        $_SESSION['viewcondition']=40;

                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                
                                        ?>
                                        <div class="table-div">  
                                        <?php 
                                        $counttransportation="SELECT * FROM `table1` WHERE transportation='$search' and barangay='$_SESSION[userbarangay]'";
                                        $counttransportationresult=mysqli_query($conn,$counttransportation);
                                        $existtransportation=false;
                                        $countnumrowstransportation=0;
                                        
                                        while($rowcounttransportation=mysqli_fetch_array($counttransportationresult)){
                                            $counttransportationid=$rowcounttransportation['id'];

                                            $counttransportation1="SELECT * FROM `table2` WHERE mainid='$counttransportationid' and horm='Head'";
                                            $counttransportationresult1=mysqli_query($conn,$counttransportation1);
                                            
                                            while($rowcounttransportation1=mysqli_fetch_array($counttransportationresult1)){
                                                $existtransportation=true;
                                                $countnumrowstransportation++;
                                            }
                                            

                                        }

                                        if($existtransportation==false){
                                            $emptycounttransportation=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Transportation</b></p>
                                                    <p class="info-p"  ><i class="fas fa-bus" style="margin-right:5px;"></i>Transportation : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycounttransportation ?></b></p></p> 
                                                </div>
                                            </div>
                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Transportation</b></p>
                                                    <p class="info-p"  ><i class="fas fa-bus" style="margin-right:5px;"></i>Transportation : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowstransportation ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?> 
                                        <!-- table -->
                                        <table>

                                            <!-- table row for heading -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Head Name</th>
                                                <th style="color:#076C07;font-weight:bold">Transportation</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- end of table row heading -->

                                            <?php
                                            //this query is to search for famnum that is equal to the input value
                                            $querytransportation="SELECT * FROM `table1` WHERE transportation='$search' and barangay='$_SESSION[userbarangay]'";
                                            $resulttransportation=mysqli_query($conn,$querytransportation);

                                            //this will execute if the query found a match
                                            while($rowtransportation=mysqli_fetch_array($resulttransportation)){
                                            $transportationid=$rowtransportation['id'];
                                        
                                            $querytransportation1="SELECT * FROM `table2` WHERE mainid='$transportationid' and horm='Head' ORDER BY mainid";
                                            $resulttransportation1=mysqli_query($conn,$querytransportation1);
                                                            
                                            while($rowtransportation1=mysqli_fetch_array($resulttransportation1)){
                                            $checkertransportation=false;  
                                            
                                            ?>
                                            <!-- table row for data -->
                                            <tbody>
                                            <tr>
                                                <td data-label="Family ID"><b><?php echo $rowtransportation1['mainid']; ?></b></td>
                                                <td data-label="Head Name"><?php echo $rowtransportation1['fullname']; ?></td>
                                                <td data-label="Transportation" style="color:#076C07;font-weight:bold"><?php echo $rowtransportation['transportation']; ?></td>
                                                <td data-label="Sex"><?php echo $rowtransportation1['sex']; ?></td>                                                         
                                                <td data-label="Purok"><?php echo $rowtransportation['purok']; ?></td>
                                                <td data-label="Barangay"><?php echo $rowtransportation['barangay']; ?></td>      
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />    
                                                        <input type="hidden" value="<?php echo $rowtransportation['id']; ?>" name="hidden-btn" />
                                                        <input type="submit"  value="View" name="view" class="view_btn"/>
                                                    </form>
                                                </td>               
                                            </tr>
                                            </tbody>
                                            <!-- end of table row data -->

                                            <?php
                                            }
                                            } //end of main while loop

                                            // this will execute if the result is not found
                                            if($checkertransportation==true){
                                            ?>
                                            <!-- table row for not found -->
                                            <tbody>
                                            <tr>
                                                <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                <td data-label="-"><?php echo "-"; ?></td>
                                                <td data-label="-"><?php echo "-"; ?></td>   
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td> 
                                                <td data-label="-"><?php echo "-"; ?></td>                                                        
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            ?>
                                        
                                        </table>
                                        <!-- end of table -->
                                            </div>
                                        <?php
                                    }
                                    //end of transportation condition

                                    else if($searchby=="Product"){
                                        $checkerproduct=true;

                                        $_SESSION['viewcondition']=33;

                                        $_SESSION['searchby']=$searchby;
                                        $_SESSION['search']=$search;
                                        ?> 
                                        <div class="table-div">
                                        <?php 
                                        $countproduct="SELECT * FROM `table4` WHERE product='$search'";
                                        $countproductresult=mysqli_query($conn,$countproduct);
                                        $existproduct=false;
                                        $countnumrowsproduct=0;

                                        while($rowcountproduct=mysqli_fetch_array($countproductresult)){
                                            $countproductfarmingid=$rowcountproduct['farmingid'];
                                            
                                            $countproduct1="SELECT * FROM `table1` WHERE farmingid='$countproductfarmingid' and barangay='$_SESSION[userbarangay]'";
                                            $countproductresult1=mysqli_query($conn,$countproduct1);
                                            
                                            while($rowcountproduct1=mysqli_fetch_array($countproductresult1)){
                                            $countproductid=$rowcountproduct1['id'];
                                            
                                            $countproduct2="SELECT * FROM `table2` WHERE mainid='$countproductid' and horm='Head'";
                                            $countproductresult2=mysqli_query($conn,$countproduct2);
                                            $countnumrowsproduct++;
                                            $existproduct=true;

                                            }
                                        }

                                        if($existproduct==false){
                                            $emptycountproduct=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Product</b></p>
                                                    <p class="info-p"  ><i class="fas fa-carrot" style="margin-right:5px;"></i>Product : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycountproduct ?></b></p></p> 
                                                </div>
                                            </div>
                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Product</b></p>
                                                    <p class="info-p"  ><i class="fas fa-carrot" style="margin-right:5px;"></i>Product : <b><?php echo $search ?></b></p>
                                                </div>

                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsproduct ?></b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;margin-top:15px"></i>View All</a></p>
                                                </div>
                                            </div>

                                        <?php } ?> 
                                            <table>
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Head Name</th>
                                                <th style="color:#076C07;font-weight:bold">Product</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>

                                            <?php 
                                            $selectproduct="SELECT * FROM `table4` WHERE product='$search' ORDER BY farmingid";
                                            $productresult=mysqli_query($conn,$selectproduct);

                                            while($rowproduct=mysqli_fetch_array($productresult)){
                                            $productfarmingid=$rowproduct['farmingid'];
                                                
                                            $producttable1="SELECT * FROM `table1` WHERE farmingid='$productfarmingid' and barangay='$_SESSION[userbarangay]'";
                                            $producttable1result=mysqli_query($conn,$producttable1);
                                            
                                            while($rowproducttable1=mysqli_fetch_array($producttable1result)){
                                            $productid=$rowproducttable1['id'];

                                            $producttable2="SELECT * FROM `table2` WHERE mainid='$productid' and horm='Head' ORDER BY mainid";
                                            $producttable2result=mysqli_query($conn,$producttable2);

                                            while($rowproducttable2=mysqli_fetch_array($producttable2result)){

                                            $checkerproduct=false;  
                                            ?>
                                            <tbody>
                                            <tr>
                                                <td data-label="Family ID"><b><?php echo $rowproducttable2['mainid']; ?></b></td>   
                                                <td data-label="Head Name"><?php echo $rowproducttable2['fullname']; ?></td>   
                                                <td data-label="Product" style="color:#076C07;font-weight:bold"><?php echo $rowproduct['product']; ?></td>                                                         
                                                <td data-label="Sex"><?php echo $rowproducttable2['sex']; ?></td>
                                                <td data-label="Purok"><?php echo $rowproducttable1['purok']; ?></td>
                                                <td data-label="Barangay"><?php echo $rowproducttable1['barangay']; ?></td>      
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowproducttable1['id']; ?>" name="hidden-btn" />
                                                        <input type="submit"  value="View" name="view" class="view_btn"/>
                                                    </form>
                                                </td>               
                                            </tr>
                                            </tbody>
                                            <?php
                                            }
                                            }
                                            }
                                            if($checkerproduct==true){
                                                ?>
                                                <!-- table row for not found -->
                                                <tbody>
                                                <tr>
                                                    <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                    <td data-label="-"><?php echo "-"; ?></td>
                                                    <td data-label="-"><?php echo "-"; ?></td>   
                                                    <td data-label="-"><?php echo "-"; ?></td>
                                                    <td data-label="-"><?php echo "-"; ?></td>
                                                    <td data-label="-"><?php echo "-"; ?></td>
                                                    <td data-label="-"><?php echo "-"; ?></td>
                                                </tr>
                                                </tbody>
                                                <?php
                                                }
                                                ?>
                                                                                    
                                            </table>
                                        </div>
                                        <?php
                                    }

                                    else if($search=="" && $searchby==""){
                                        $checkempty=true;
                                        $_SESSION['viewcondition']=1;
                                        
                                        $queryempty="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                                        $resultempty=mysqli_query($conn,$queryempty);

                                        ?>
                                        <div class="table-div">  
                                        <?php 
                                        $countempty="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                                        $countemptyresult=mysqli_query($conn,$countempty);
                                        $existempty=false;
                                        $countnumrowsempty=0;

                                        while($countrowsempty=mysqli_fetch_array($countemptyresult)){
                                            $getemptyid=$countrowsempty['id'];

                                            $countempty1="SELECT * FROM `table2` WHERE mainid='$getemptyid'";
                                            $countemptyresult1=mysqli_query($conn,$countempty1);

                                            while($countrowsempty1=mysqli_fetch_array($countemptyresult1)){
                                                $countnumrowsempty++;
                                                $existempty=true;

                                            }
                                        }

                                        if($existempty==false){
                                            $emptycount=0;
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p1" ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Name </b></p>
                                                </div>
                                            
                                                <div class="p-div count-div1">
                                                    <p class="info-p1" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $emptycount ?></b></p> 
                                                </div>
                                            </div>

                                            <?php
                                        }

                                        else{
                                            ?>
                                            <div class="top-info">
                                                <div class="p-div">
                                                    <p class="info-p"  ><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Name </b></p>
                                                    <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;"></i>View All</a></p>
                                                </div>
                                                                              
                                                <div class="p-div count-div1">
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsempty ?></b></p>
                                                </div>
                                            </div>

                                        <?php } ?>
                                        <table>
                                            <!-- table row for headings -->
                                            <thead>
                                                <th>Family ID</th>
                                                <th>Name</th>
                                                <th>Sex</th>
                                                <th>Purok</th>
                                                <th>Barangay</th>
                                                <th>View Information</th>
                                            </thead>
                                            <!-- End of table row heading -->
                                            
                                            <?php

                                            while($rowempty=mysqli_fetch_array($resultempty)){
                                            $emptyid=$rowempty['id'];
                                                
                                            $queryempty1="SELECT * FROM `table2` WHERE mainid='$emptyid' ORDER BY mainid";
                                            $resultempty1=mysqli_query($conn, $queryempty1);

                                            while($rowempty1=mysqli_fetch_array($resultempty1)){
                                            $emptyhorm=$rowempty1['horm'];
                                            $checkempty=false;

                                            ?>
                                            <!-- Table row for data -->
                                            <tbody>
                                            <tr>
                                            <?php if($emptyhorm=="Head"){ ?>
                                                <td data-label="Mainid"><b><?php echo $rowempty1['mainid']; ?></b></td>
                                                <td data-label="Full Name"><?php echo $rowempty1['fullname']; ?> (<?php echo $rowempty1['horm'] ?>) </td>                             
                                                <td data-label="Sex"><?php echo $rowempty1['sex']; ?></td>
                                                <td data-label="Purok"><?php echo $rowempty['purok']; ?></td>
                                                <td data-label="Barangay"><?php echo $rowempty['barangay']; ?></td>      
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowempty['id']; ?>" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>
                                                </td>              
                                                <?php } 
                                                    
                                                else{
                                                ?>
                                                <td data-label="Mainid"><b><?php echo $rowempty1['mainid']; ?></b></td>
                                                <td data-label="Full Name"><?php echo $rowempty1['fullname']; ?> (<?php echo $rowempty1['horm'] ?>) </td>                             
                                                <td data-label="Sex"><?php echo $rowempty1['sex']; ?></td>
                                                <td data-label="Purok"><?php echo $rowempty['purok']; ?></td>  
                                                <td data-label="Barangay"><?php echo $rowempty['barangay']; ?></td>    
                                                <td data-label="View Information">
                                                    <form action="result.php" target="_blank" method="POST">
                                                        <input type="hidden" value="table2" name="hidden-btn1" />
                                                        <input type="hidden" value="<?php echo $rowempty1['id']; ?> (Member)" name="hidden-btn" />
                                                        <input type="submit" name="view" value="View" class="view_btn"/>
                                                    </form>    
                                                </td>              
                                                <?php } ?>                
                                            </tr>
                                            </tbody>
                                            <!-- End of table row data -->

                                            <?php
                                            }
                                            }
                                            if($checkempty==true){
                                                ?>
                                                <!-- table row for not found -->
                                                <tbody>
                                                <tr>
                                                    <td data-label="-"><?php echo "-"; ?></td>                                                         
                                                    <td data-label="-"><?php echo "-"; ?></td>
                                                    <td data-label="-"><?php echo "-"; ?></td>   
                                                    <td data-label="-"><?php echo "-"; ?></td>
                                                    <td data-label="-"><?php echo "-"; ?></td>
                                                    <td data-label="-"><?php echo "-"; ?></td>

                                                </tr>
                                                </tbody>
                                                <?php
                                                }
                                                ?>
                                        </table> <!-- Table closing -->
                                        </div>
                                        <?php

                                    } //closing if else if condition for empty input
                                    //hhnum codition if it is searched     


                                    }  
                            
                         
                                                      


                            // this will execute if the button is not yet clicked
                            // i did it in order for all of the data to be displayed
                            else{
                                $checkemptydefault=true;
                                $_SESSION['viewcondition']=2;
                                $queryall="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                                $resultall=mysqli_query($conn,$queryall);
                                
                                ?>
                                <div class="table-div">
                                <?php 
                                    $countdefaulthead="SELECT * FROM `table1` WHERE barangay='$_SESSION[userbarangay]'";
                                    $countdefaultheadresult=mysqli_query($conn,$countdefaulthead);
                                    $countnumrowsdefaulthead=0;

                                    while($countdefaultheadrow=mysqli_fetch_array($countdefaultheadresult)){
                                        $countdefaultheadmainid=$countdefaultheadrow['id'];

                                        $countdefaulthead1="SELECT * FROM `table2`  WHERE mainid='$countdefaultheadmainid' and horm='Head' ORDER BY mainid";
                                        $countdefaultheadresult1=mysqli_query($conn,$countdefaulthead1);

                                        while($countdefaultheadrow1=mysqli_fetch_array($countdefaultheadresult1)){
                                            $countnumrowsdefaulthead++;

                                        }
                                    }
                                    
                                        ?>
           
                                        <div class="top-info" class="margin-bottom:0" >
                                            <div class="p-div">
                                                <p class="info-p"><i class="fas fa-folder" style="margin-right:5px;margin-bottom:15px"></i>Category : <b>Head</b></p>
                                                <p class="info-p"><a class="viewall" target="_blank" href="viewall.php"><i class="fas fa-eye" style="margin-right:5px;"></i>View All</a></p>
                                            </div>
                                        
                                            <div class="p-div count-div1" >
                                                <p class="info-p" ><i class="fas fa-scroll" style="margin-right:5px;"></i>Total : <b><?php echo $countnumrowsdefaulthead ?></b></p> 
                                            </div>
                                        </div>
                                <table>
                                    <!-- Table row head -->
                                    <thead>
                                        <th>Family ID</th>
                                        <th>Head Name</th>
                                        <th>Sex</th>
                                        <th>Purok</th>
                                        <th>Barangay</th>
                                        <th>View Information</th>
                                    </thead>
                                    <!-- End of table row -->
                                    
                                    <?php
                                    
                                    while($rowall=mysqli_fetch_array($resultall)){
                                    $rowallid=$rowall['id'];

                                    $queryall1="SELECT * FROM `table2` WHERE mainid='$rowallid' and horm='Head' ORDER BY mainid";
                                    $resultall1=mysqli_query($conn, $queryall1);

                                    while($rowall1=mysqli_fetch_array($resultall1)){

                                    $checkemptydefault=false;
                                    ?>
                                    <!-- This table row is for the table datas -->
                                    
                                    <tbody>
                                        <tr >
                                        <td data-label="mainid"><b><?php echo $rowall1['mainid']; ?></b></td>                             
                                        <td data-label="Full Name"><?php echo $rowall1['fullname']; ?></td>
                                        <td data-label="Sex"><?php echo $rowall1['sex']; ?></td>                                                          
                                        <td data-label="purok"><?php echo $rowall['purok']; ?></td>   
                                        <td data-label="Barangay"><?php echo $rowall['barangay']; ?></td>
                                        <td data-label="View Information">
                                        
                                            <form action="result.php" target="_blank" method="POST">
                                                <input type="hidden" value="tablehead" name="hidden-btn1" />
                                                <input type="hidden" value="<?php echo $rowall['id']; ?>" name="hidden-btn" />
                                                <input type="submit" value="View" class="view_btn" id="viewbtn" name="view"/>
                                            </form>
                                        </td>              
                                    </tr> <!-- End of table row -->
                                </tbody>
                                    <?php 
                                    }
                                    } //end of while loop
                                    if($checkemptydefault==true){
                                        ?>
                                        <!-- table row for not found -->
                                        <tbody>
                                        <tr>
                                            <td data-label="-"><?php echo "-"; ?></td>                                                         
                                            <td data-label="-"><?php echo "-"; ?></td>
                                            <td data-label="-"><?php echo "-"; ?></td>   
                                            <td data-label="-"><?php echo "-"; ?></td>
                                            <td data-label="-"><?php echo "-"; ?></td>
                                            <td data-label="-"><?php echo "-"; ?></td>

                                        </tr>
                                        </tbody>
                                        <?php
                                        }
                                        ?>

                                </table> <!-- Table Closing -->
                                </div>
                                <?php

                            } // closing of else
                        ?>
    </body>
    </html>
    