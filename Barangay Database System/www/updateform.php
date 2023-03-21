<?php
 session_start(); 
    include_once("include.php");        

if(isset($_POST['update'])){

    $newfamnum=$_POST['newfamnum'];
    $getfamnum=$_POST['famnum'];
    $headmemberid=$_POST['headmemberid'];
    

    //para sa other info
    $updatepurok=$_POST['purok'];
    $updatemothertongue=$_POST['mothertongue'];
    $updatehousetype=$_POST['housetype'];
    $updatesantoilet=$_POST['santoilet'];
    $updateimmunization=$_POST['immunization'];
    $updatewra=$_POST['wra'];
    $updategarbdisposal=$_POST['garbdisposal'];
    $updatewatersource=$_POST['watersource'];
    $updatefamilyplan=$_POST['familyplan'];
    $updatebground=$_POST['bground'];
    $updatelivestat=$_POST['livestat'];
    $updateanimals=$_POST['animals'];
    $updateblinddrain=$_POST['blinddrain'];
    $updatecommunication=$_POST['communication'];
    $updatehomestat=$_POST['homestat'];
    $updateenergysource=$_POST['energysource'];
    $updatedwtwbd=$_POST['dwtwbd'];
    $updatevulstat=$_POST['vulstat'];
    $updateagrifacil=$_POST['agrifacil'];
    $updateosoi=$_POST['osoi'];
    $updatehousestat=$_POST['housestat'];
    $updatetransportation=$_POST['transportation'];
    
    $productcounter=$_POST['productamount'];
    
        for($p=0;$p<$productcounter;$p++){
            $updateproduct=$_POST['product'.$p];
            $getproductid=$_POST['productid'.$p];
            $updateproductinfo="UPDATE `table4` SET product='$updateproduct' WHERE productid='$getproductid' "; 
            $updateproductinforesult=mysqli_query($conn,$updateproductinfo);
    
            ?> <script>window.close();</script> <?php

        }
    
    
    $updatepurokinfo="UPDATE `table1` SET purok='$updatepurok' WHERE id='$_SESSION[globalid]' "; 
    $updatemothertongueinfo="UPDATE `table1` SET mothertongue='$updatemothertongue' WHERE id='$_SESSION[globalid]' "; 
    $updatehousetypeinfo="UPDATE `table1` SET housetype='$updatehousetype' WHERE id='$_SESSION[globalid]' "; 
    $updatesantoiletinfo="UPDATE `table1` SET santoilet='$updatesantoilet' WHERE id='$_SESSION[globalid]' "; 
    $updateimmunizationinfo="UPDATE `table1` SET immunization='$updateimmunization' WHERE id='$_SESSION[globalid]' "; 
    $updatewrainfo="UPDATE `table1` SET wra='$updatewra' WHERE id='$_SESSION[globalid]' "; 
    $updategarbdisposalinfo="UPDATE `table1` SET garbdisposal='$updategarbdisposal' WHERE id='$_SESSION[globalid]' "; 
    $updatewatersourceinfo="UPDATE `table1` SET watersource='$updatewatersource' WHERE id='$_SESSION[globalid]' "; 
    $updatefamilyplaninfo="UPDATE `table1` SET familyplan='$updatefamilyplan' WHERE id='$_SESSION[globalid]' "; 
    $updatebgroundinfo="UPDATE `table1` SET bground='$updatebground' WHERE id='$_SESSION[globalid]' "; 
    $updatelivestatinfo="UPDATE `table1` SET livestat='$updatelivestat' WHERE id='$_SESSION[globalid]' "; 
    $updateanimalsinfo="UPDATE `table1` SET animals='$updateanimals' WHERE id='$_SESSION[globalid]' "; 
    $updateblinddraininfo="UPDATE `table1` SET blinddrain='$updateblinddrain' WHERE id='$_SESSION[globalid]' "; 
    $updatecommunicationinfo="UPDATE `table1` SET communication='$updatecommunication' WHERE id='$_SESSION[globalid]' "; 
    $updatehomestatinfo="UPDATE `table1` SET homestat='$updatehomestat' WHERE id='$_SESSION[globalid]' "; 
    $updateenergysourceinfo="UPDATE `table1` SET energysource='$updateenergysource' WHERE id='$_SESSION[globalid]' "; 
    $updatedwtwbdinfo="UPDATE `table1` SET dwtwbd='$updatedwtwbd' WHERE id='$_SESSION[globalid]' "; 
    $updatevulstatinfo="UPDATE `table1` SET vulstat='$updatevulstat' WHERE id='$_SESSION[globalid]' "; 
    $updateagrifacilinfo="UPDATE `table1` SET agrifacil='$updateagrifacil' WHERE id='$_SESSION[globalid]' "; 
    $updateosoiinfo="UPDATE `table1` SET osoi='$updateosoi' WHERE id='$_SESSION[globalid]' "; 
    $updatehousestatinfo="UPDATE `table1` SET housestat='$updatehousestat' WHERE id='$_SESSION[globalid]' "; 
    $updatetransportationinfo="UPDATE `table1` SET transportation='$updatetransportation' WHERE id='$_SESSION[globalid]' "; 

    $updatepurokinforesult=mysqli_query($conn,$updatepurokinfo);
    $updatemothertongueinforesult=mysqli_query($conn,$updatemothertongueinfo);
    $updatehousetypeinforesult=mysqli_query($conn,$updatehousetypeinfo);
    $updatesantoiletinforesult=mysqli_query($conn,$updatesantoiletinfo);
    $updateimmunizationresult=mysqli_query($conn,$updateimmunizationinfo);
    $updatewraresult=mysqli_query($conn,$updatewrainfo);
    $updategarbdisposalresult=mysqli_query($conn,$updategarbdisposalinfo);
    $updatewatersourceresult=mysqli_query($conn,$updatewatersourceinfo);
    $updatefamilyplaninforesult=mysqli_query($conn,$updatefamilyplaninfo);
    $updatebgroundinforesult=mysqli_query($conn,$updatebgroundinfo);
    $updatelivestatinforesult=mysqli_query($conn,$updatelivestatinfo);
    $updateanimalsinforesult=mysqli_query($conn,$updateanimalsinfo);
    $updateblinddraininforesult=mysqli_query($conn,$updateblinddraininfo);
    $updatecommunicationinforesult=mysqli_query($conn,$updatecommunicationinfo);
    $updatehomestatinforesult=mysqli_query($conn,$updatehomestatinfo);
    $updateenergysourceinforesult=mysqli_query($conn,$updateenergysourceinfo);
    $updatedwtwbdinforesult=mysqli_query($conn,$updatedwtwbdinfo);
    $updatevulstatinforesult=mysqli_query($conn,$updatevulstatinfo);
    $updateagrifacilinforesult=mysqli_query($conn,$updateagrifacilinfo);
    $updateosoiinforesult=mysqli_query($conn,$updateosoiinfo);
    $updatehousestatinforesult=mysqli_query($conn,$updatehousestatinfo);
    $updatetransportationinforesult=mysqli_query($conn,$updatetransportationinfo);


    //para sa head update
        $headupdatefname=$_POST['headfname'];
        $headupdatemname=$_POST['headmname'];
        $headupdatelname=$_POST['headlname'];
        $headupdatedependency=$_POST['headdependency'];
        $headupdatetribe=$_POST['headtribe'];
        $headupdatesex=$_POST['headsex'];
        $headupdatebdate=$_POST['headbdate'];
        $headupdateage=$_POST['headage'];
        $headupdatereligion=$_POST['headreligion'];
        $headupdateeducation=$_POST['headeducation'];
        $headupdateoccupation=$_POST['headoccupation'];
        $headupdatepwd=$_POST['headpwd'];
        $headupdateip=$_POST['headip'];
        $headupdatephilhealth=$_POST['headphilhealth'];
        $headupdatebreastfeed=$_POST['headbreastfeed'];
        $headupdatentp=$_POST['headntp'];
        $headupdatesmooking=$_POST['headsmooking'];
        $headupdatefourps=$_POST['headfourps'];

        if($headupdatefname=="" && $headupdatemname=="" && $headupdatelname==""){
            $headupdatefullnameinfo="UPDATE `table2` SET fullname='No Information Given' WHERE id='$headmemberid' "; 
        }

        else{
            $headupdatefullnameinfo="UPDATE `table2` SET fullname='$headupdatefname $headupdatemname $headupdatelname' WHERE id='$headmemberid' "; 
        }
    
        $headupdatefnameinfo="UPDATE `table2` SET fname='$headupdatefname' WHERE id='$headmemberid' "; 
        $headupdatemnameinfo="UPDATE `table2` SET mname='$headupdatemname' WHERE id='$headmemberid' "; 
        $headupdatelnameinfo="UPDATE `table2` SET lname='$headupdatelname' WHERE id='$headmemberid' "; 
        $headupdatedependencyinfo="UPDATE `table2` SET dependency='$headupdatedependency' WHERE id='$headmemberid' "; 
        $headupdatetribeinfo="UPDATE `table2` SET tribe='$headupdatetribe' WHERE id='$headmemberid' "; 
        $headupdatesexinfo="UPDATE `table2` SET sex='$headupdatesex' WHERE id='$headmemberid' "; 
        $headupdatebdateinfo="UPDATE `table2` SET bdate='$headupdatebdate' WHERE id='$headmemberid' "; 
        $headupdateageinfo="UPDATE `table2` SET age='$headupdateage' WHERE id='$headmemberid' "; 
        $headupdatereligioninfo="UPDATE `table2` SET religion='$headupdatereligion' WHERE id='$headmemberid' "; 
        $headupdateeducationinfo="UPDATE `table2` SET education='$headupdateeducation' WHERE id='$headmemberid' "; 
        $headupdateoccupationinfo="UPDATE `table2` SET occupation='$headupdateoccupation' WHERE id='$headmemberid' "; 
        $headupdatepwdinfo="UPDATE `table2` SET pwd='$headupdatepwd' WHERE id='$headmemberid' "; 
        $headupdateipinfo="UPDATE `table2` SET ip='$headupdateip' WHERE id='$headmemberid' "; 
        $headupdatephilhealthinfo="UPDATE `table2` SET philhealth='$headupdatephilhealth' WHERE id='$headmemberid' "; 
        $headupdatebreastfeedinfo="UPDATE `table2` SET breastfeed='$headupdatebreastfeed' WHERE id='$headmemberid' "; 
        $headupdatentpinfo="UPDATE `table2` SET ntp='$headupdatentp' WHERE id='$headmemberid' "; 
        $headupdatesmookinginfo="UPDATE `table2` SET smooking='$headupdatesmooking' WHERE id='$headmemberid' "; 
        $headupdatefourpsinfo="UPDATE `table2` SET fourps='$headupdatefourps' WHERE id='$headmemberid' "; 

        $headupdatefullnameinforesult=mysqli_query($conn,$headupdatefullnameinfo);
        $headupdatefnameinforesult=mysqli_query($conn,$headupdatefnameinfo);
        $headupdatemnameinforesult=mysqli_query($conn,$headupdatemnameinfo);
        $headupdatelnameinforesult=mysqli_query($conn,$headupdatelnameinfo);
        $headupdatedependencyinforesult=mysqli_query($conn,$headupdatedependencyinfo);
        $headupdatetribeinforesult=mysqli_query($conn,$headupdatetribeinfo);
        $headupdatesexinforesult=mysqli_query($conn,$headupdatesexinfo);
        $headupdatebdateinforesult=mysqli_query($conn,$headupdatebdateinfo);
        $headupdateageinforesult=mysqli_query($conn,$headupdateageinfo);
        $headupdatereligioninforesult=mysqli_query($conn,$headupdatereligioninfo);
        $headupdateeducationinforesult=mysqli_query($conn,$headupdateeducationinfo);
        $headupdateoccupationinforesult=mysqli_query($conn,$headupdateoccupationinfo);
        $headupdatepwdinforesult=mysqli_query($conn,$headupdatepwdinfo);
        $headupdateipinforesult=mysqli_query($conn,$headupdateipinfo);
        $headupdatephilhealthinforesult=mysqli_query($conn,$headupdatephilhealthinfo);
        $headupdatebreastfeedinforesult=mysqli_query($conn,$headupdatebreastfeedinfo);
        $headupdatentpinforesult=mysqli_query($conn,$headupdatentpinfo);
        $headupdatesmookinginforesult=mysqli_query($conn,$headupdatesmookinginfo);
        $headupdatefourpsinforesult=mysqli_query($conn,$headupdatefourpsinfo);

    
        $getfamnum=$getfamnum-1;
    //for update members
    for($z=0;$z<=$getfamnum;$z++){
        $getmemberid=$_POST['memberid'.$z];
        $updatefname=$_POST['updatefname'.$z];
        $updatemname=$_POST['updatemname'.$z];
        $updatelname=$_POST['updatelname'.$z];
        $updatedependency=$_POST['updatedependency'.$z];
        $updatetribe=$_POST['updatetribe'.$z];
        $updatesex=$_POST['updatesex'.$z];
        $updatebdate=$_POST['updatebdate'.$z];
        $updateage=$_POST['updateage'.$z];
        $updatereligion=$_POST['updatereligion'.$z];
        $updateeducation=$_POST['updateeducation'.$z];
        $updateoccupation=$_POST['updateoccupation'.$z];
        $updaterelation=$_POST['updaterelation'.$z];
        $updatepwd=$_POST['updatepwd'.$z];
        $updateip=$_POST['updateip'.$z];
        $updatephilhealth=$_POST['updatephilhealth'.$z];
        $updatebreastfeed=$_POST['updatebreastfeed'.$z];
        $updatentp=$_POST['updatentp'.$z];
        $updatesmooking=$_POST['updatesmooking'.$z];
        $updatefourps=$_POST['updatefourps'.$z];

        if($updatefname=="" && $updatemname=="" && $updatelname==""){
            $updatefullnameinfo="UPDATE `table2` SET fullname='No Information' WHERE id='$getmemberid' "; 
        }

        else{
            $updatefullnameinfo="UPDATE `table2` SET fullname='$updatefname $updatemname $updatelname' WHERE id='$getmemberid' "; 
        }

        $updatefnameinfo="UPDATE `table2` SET fname='$updatefname' WHERE id='$getmemberid' "; 
        $updatemnameinfo="UPDATE `table2` SET mname='$updatemname' WHERE id='$getmemberid' "; 
        $updatelnameinfo="UPDATE `table2` SET lname='$updatelname' WHERE id='$getmemberid' "; 
        $updatedependencyinfo="UPDATE `table2` SET dependency='$updatedependency' WHERE id='$getmemberid' "; 
        $updatetribeinfo="UPDATE `table2` SET tribe='$updatetribe' WHERE id='$getmemberid' "; 
        $updatesexinfo="UPDATE `table2` SET sex='$updatesex' WHERE id='$getmemberid' "; 
        $updatebdateinfo="UPDATE `table2` SET bdate='$updatebdate' WHERE id='$getmemberid' "; 
        $updateageinfo="UPDATE `table2` SET age='$updateage' WHERE id='$getmemberid' "; 
        $updatereligioninfo="UPDATE `table2` SET religion='$updatereligion' WHERE id='$getmemberid' "; 
        $updateeducationinfo="UPDATE `table2` SET education='$updateeducation' WHERE id='$getmemberid' "; 
        $updateoccupationinfo="UPDATE `table2` SET occupation='$updateoccupation' WHERE id='$getmemberid' "; 
        $updaterelationinfo="UPDATE `table2` SET relation='$updaterelation' WHERE id='$getmemberid' "; 
        $updatepwdinfo="UPDATE `table2` SET pwd='$updatepwd' WHERE id='$getmemberid' "; 
        $updateipnfo="UPDATE `table2` SET ip='$updateip' WHERE id='$getmemberid' "; 
        $updatephilhealthinfo="UPDATE `table2` SET philhealth='$updatephilhealth' WHERE id='$getmemberid' "; 
        $updatebreastfeedinfo="UPDATE `table2` SET breastfeed='$updatebreastfeed' WHERE id='$getmemberid' "; 
        $updatentpinfo="UPDATE `table2` SET ntp='$updatentp' WHERE id='$getmemberid' "; 
        $updatesmookinginfo="UPDATE `table2` SET smooking='$updatesmooking' WHERE id='$getmemberid' "; 
        $updatefourpsinfo="UPDATE `table2` SET fourps='$updatefourps' WHERE id='$getmemberid' "; 

        $updatefullnameinforesult=mysqli_query($conn,$updatefullnameinfo);
        $updatefnameinforesult=mysqli_query($conn,$updatefnameinfo);
        $updatemnameinforesult=mysqli_query($conn,$updatemnameinfo);
        $updatelnameinforesult=mysqli_query($conn,$updatelnameinfo);
        $updatedependencyinforesult=mysqli_query($conn,$updatedependencyinfo);
        $updatetribeinforesult=mysqli_query($conn,$updatetribeinfo);
        $updatesexinforesult=mysqli_query($conn,$updatesexinfo);
        $updatebdateinforesult=mysqli_query($conn,$updatebdateinfo);
        $updateageinforesult=mysqli_query($conn,$updateageinfo);
        $updatereligioninforesult=mysqli_query($conn,$updatereligioninfo);
        $updateeducationinforesult=mysqli_query($conn,$updateeducationinfo);
        $updateoccupationinforesult=mysqli_query($conn,$updateoccupationinfo);
        $updaterelationinforesult=mysqli_query($conn,$updaterelationinfo);
        $updatepwdinforesult=mysqli_query($conn,$updatepwdinfo);
        $updateipinforesult=mysqli_query($conn,$updateipnfo);
        $updatephilhealthinforesult=mysqli_query($conn,$updatephilhealthinfo);
        $updatebreastfeedinforesult=mysqli_query($conn,$updatebreastfeedinfo);
        $updatentpinforesult=mysqli_query($conn,$updatentpinfo);
        $updatesmookinginforesult=mysqli_query($conn,$updatesmookinginfo);
        $updatefourpsinforesult=mysqli_query($conn,$updatefourpsinfo);

    }




    //for adding new member
    if($newfamnum!=""){
        for($i=0;$i<$newfamnum;$i++){
                    $newfname=$_POST['newfname'.$i];
                    $newmname=$_POST['newmname'.$i];
                    $newlname=$_POST['newlname'.$i];
                    $newdependency=$_POST['newdependency'.$i];
                    $newtribe=$_POST['newtribe'.$i];
                    $newsex=$_POST['newsex'.$i];
                    $newbdate=$_POST['newbdate'.$i];
                    $newage=$_POST['newage'.$i];
                    $newreligion=$_POST['newreligion'.$i];
                    $neweducation=$_POST['neweducation'.$i];
                    $newoccupation=$_POST['newoccupation'.$i];
                    $newrelation=$_POST['newrelation'.$i];
                    $newpwd=$_POST['newpwd'.$i];
                    $newip=$_POST['newip'.$i];
                    $newphilhealth=$_POST['newphilhealth'.$i];
                    $newbreastfeed=$_POST['newbreastfeed'.$i];
                    $newntp=$_POST['newntp'.$i];
                    $newsmooking=$_POST['newsmooking'.$i];
                    $newfourps=$_POST['newfourps'.$i];

                    if($newfname=="" && $newmname==""&& $newlname==""){
                        $newmemberinfo="INSERT INTO `table2` (`mainid`,`fullname`,`fname`,`mname`,`lname`,`horm`,`dependency`,`tribe`,`sex`,`bdate`,`age`,`religion`,`education`,`occupation`,`relation`,`pwd`,`ip`,`philhealth`,`breastfeed`,`ntp`,`smooking`,`fourps`) VALUES ('$_SESSION[globalid]','No Information','$newfname','$newmname','$newlname','Member','$newdependency','$newtribe','$newsex','$newbdate','$newage','$newreligion','$neweducation','$newoccupation','$newrelation','$newpwd','$newip','$newphilhealth','$newbreastfeed','$newntp','$newsmooking','$newfourps')";
                        $newmemberinforesult=mysqli_query($conn,$newmemberinfo); 
                    }
                    
                    else{
                        $newmemberinfo="INSERT INTO `table2` (`mainid`,`fullname`,`fname`,`mname`,`lname`,`horm`,`dependency`,`tribe`,`sex`,`bdate`,`age`,`religion`,`education`,`occupation`,`relation`,`pwd`,`ip`,`philhealth`,`breastfeed`,`ntp`,`smooking`,`fourps`) VALUES ('$_SESSION[globalid]','$newfname $newmname $newlname','$newfname','$newmname','$newlname','Member','$newdependency','$newtribe','$newsex','$newbdate','$newage','$newreligion','$neweducation','$newoccupation','$newrelation','$newpwd','$newip','$newphilhealth','$newbreastfeed','$newntp','$newsmooking','$newfourps')";
                        $newmemberinforesult=mysqli_query($conn,$newmemberinfo); 
                    }
                    
        
                if($newmemberinforesult){
                    ?> <script>window.close();</script> <?php
                }
    
            }


                    $selectfamnum="SELECT * FROM `table1` WHERE id='$_SESSION[globalid]'";
                    $selectfamnumresult=mysqli_query($conn,$selectfamnum);
                    
                    while($rowfamnumsearch=mysqli_fetch_array($selectfamnumresult)){
                    $getrowfamnumvalue=$rowfamnumsearch['famnum'];
                    $addfamnum = $getrowfamnumvalue + $newfamnum;

                    $addtofamnum="UPDATE `table1` SET famnum='$addfamnum' WHERE id='$_SESSION[globalid]' ";
                    $addtofamnumresult=mysqli_query($conn,$addtofamnum);
                    
                    if($addtofamnumresult){
                        ?> <script>window.close();</script> <?php

                    }
                }    
                ?> <script>window.close();</script> <?php

    }

    
    $addproduct=$_POST['addproduct'];

    if($addproduct!=""){
    $farmingidvalue=$_POST['farmingidvalue'];
       
        for($newp=0;$newp<$addproduct;$newp++){
            $newproduct=$_POST['newp'.$newp];

            $insertnewproduct="INSERT INTO `table4` (`product`,`farmingid`) VALUES ('$newproduct','$farmingidvalue')";
            $insertnewproductresult=mysqli_query($conn,$insertnewproduct);
        }

    }

    ?> <script>window.close();</script> <?php


} 

else if(isset($_POST['deletememberbtn'])){
        
        $queryupdatefamnum="SELECT * FROM `table2` WHERE id='$_SESSION[globalmemberid]'";
        $queryupdatefamnumresult=mysqli_query($conn,$queryupdatefamnum);

        while($queryupdatefamnumvalue=mysqli_fetch_array($queryupdatefamnumresult)){
            $getmembermainid=$queryupdatefamnumvalue['mainid'];

            $queryupdatefamnum1="SELECT * FROM `table1` WHERE id='$getmembermainid'";
            $queryupdatefamnumresult1=mysqli_query($conn,$queryupdatefamnum1);

            while($queryupdatefamnumvalue1=mysqli_fetch_array($queryupdatefamnumresult1)){
                $getmemberfamnum=$queryupdatefamnumvalue1['famnum'];
                $getmemberfamnumvalue=$getmemberfamnum-1;

                $queryupdatefamnum2="UPDATE `table1` SET famnum='$getmemberfamnumvalue' WHERE id='$getmembermainid'";
                $queryupdatefamnumresult2=mysqli_query($conn,$queryupdatefamnum2);

            }
        }

        $querydeletemember="DELETE FROM `table2` WHERE id='$_SESSION[globalmemberid]'";
        $querydeletememberresult=mysqli_query($conn,$querydeletemember);


}

else if(isset($_POST['update1'])){
       

        $update1memberidrow=$_POST['memberidrow'];
        $update1fname=$_POST['memberfname'];
        $update1mname=$_POST['membermname'];
        $update1lname=$_POST['memberlname'];
        $update1dependency=$_POST['memberdependency'];
        $update1tribe=$_POST['membertribe'];
        $update1sex=$_POST['membersex'];
        $update1bdate=$_POST['memberbdate'];
        $update1age=$_POST['memberage'];
        $update1religion=$_POST['memberreligion'];
        $update1education=$_POST['membereducation'];
        $update1occupation=$_POST['memberoccupation'];
        $update1relation=$_POST['memberrelation'];
        $update1pwd=$_POST['memberpwd'];
        $update1ip=$_POST['memberip'];
        $update1philhealth=$_POST['memberphilhealth'];
        $update1breastfeed=$_POST['memberbreastfeed'];
        $update1ntp=$_POST['memberntp'];
        $update1smooking=$_POST['membersmooking'];
        $update1fourps=$_POST['memberfourps'];


        $update1member="UPDATE `table2` SET fullname='$update1fname $update1mname $update1lname' ,
        fname='$update1fname' ,
        mname='$update1mname' ,
        lname='$update1lname' ,
        dependency='$update1dependency' ,
        tribe='$update1tribe' ,
        sex='$update1sex' ,
        bdate='$update1bdate' ,
        age='$update1age' ,
        religion='$update1religion' ,
        education='$update1education' ,
        occupation='$update1occupation' ,
        relation='$update1relation' ,
        pwd='$update1pwd' ,
        ip='$update1ip' ,
        philhealth='$update1philhealth' ,
        breastfeed='$update1breastfeed' ,
        ntp='$update1ntp' ,
        smooking='$update1smooking'
        fourps='$update1fourps'

        WHERE id='$update1memberidrow'";
        $update1memberresult=mysqli_query($conn,$update1member);

        if($update1memberresult){
            ?> <script>window.close();</script> <?php
        }

        ?> <script>window.close();</script> <?php

}

if(isset($_POST['delete'])){

    if(isset($_POST['deletebox'])){
        $famnum=1;
        foreach($_POST['deletebox'] as $deleteid){
            $delete="DELETE FROM `table2` WHERE id='$deleteid'";
            $deleteresult=mysqli_query($conn,$delete);
            
            $selectfamnum1="SELECT * FROM `table1` WHERE id='$_SESSION[globalid]'";
            $selectfamnum1result=mysqli_query($conn,$selectfamnum1);

            while($rowfamnum=mysqli_fetch_array($selectfamnum1result)){
                $getrowfamnumvalue1=$rowfamnum['famnum'];
            }

            $getrowfamnumvalue1--;

            if($getrowfamnumvalue1<0){
                $updatefamnum="UPDATE `table1` SET famnum='0'";
                $updatefamnumresult=mysqli_query($conn,$updatefamnum);
            }

            else{
                $updatefamnum="UPDATE `table1` SET famnum='$getrowfamnumvalue1' WHERE id='$_SESSION[globalid]'";
                $updatefamnumresult=mysqli_query($conn,$updatefamnum);
            }


        }
    }

    if(isset($_POST['deleteproduct'])){
        foreach($_POST['deleteproduct'] as $deleteproduct){
            $deleteproduct="DELETE FROM `table4` WHERE productid='$deleteproduct'";
            $deleteproductresult=mysqli_query($conn,$deleteproduct);
        }
    }

    if(isset($_POST['deletecheckboxbtn'])){
        foreach($_POST['deletecheckboxbtn'] as $deletehead){
            $deletemember="DELETE FROM `table2` WHERE mainid='$deletehead'";
            $deletemember=mysqli_query($conn,$deletemember);

            $deleteheadrow="DELETE FROM `table1` WHERE id='$deletehead'";
            $deleteheadrowresult=mysqli_query($conn,$deleteheadrow);
        }
    }


    ?> <script>window.close();</script> <?php

}


?>