<?php session_start(); 
error_reporting(0);
ini_set('display_errors', 0);
    include_once("include.php");        
if($_SESSION['user']==false){
    echo "<script>window.location.href='login.php'</script>";
}

//for viewall
$_SESSION['viewcondition']=0;
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Barangay Database System</title>
        <link rel="icon" href="icon.png" type="png">
        <script src="footer-bottom.js"> </script>
        <link rel="stylesheet" href="all.min.css">
        <link rel="stylesheet" href="fontawesome.min.css">
        <script src="display-flex-div.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/0d25aa5264.js" crossorigin="anonymous"></script>
        
      

        <style>
          /* MAIN/PARENTS */
              *{
        margin: 0;
        padding: 0;
        outline:none;
    }

    body,html{
        min-width:1300px;
        min-height:100vh;
        font-family: 'Poppins', sans-serif;
        font-size: 30px;
    }

    .main{
        min-height: 100vh;
    }

    .container{
        min-width:1300px;
        min-height: 100vh;  
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

    .menu-ul{
        margin-top: 50px;
    }

    .menu-ul .menu-li{
        padding:20px 0 20px 20px;
        font-size: 0.7rem;
        cursor: pointer;
    }

    .menu-ul .menu-li:hover{
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


    /*------*/




    /* RIGHT DIV ELEMENTS */
    .rightdiv{
        width:82%;
        z-index: 1;
        min-height:100vh;
        background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.2)),url('pattern.jpg') ;
        display:flex;
        justify-content:center;
        align-items:center;
    }


    /*-----*/

   

    table{
        color:white;    
        border-collapse:collapse;
        color:black;  
        text-align:center;
        width:100%;
        overflow:auto;
    }

    table th{
        padding:15px 10px;
        border-bottom:1px solid gray;
        color:black;
        font-size:15px;
    }

    table td{
        padding:5px 10px;
        font-size:15px;
    }


    .view_btn{
        height:25px;
        width:60px;
        cursor:pointer;
        font-size:13px;
        letter-spacing:1px;
        border-radius:5px;
        border:1px solid black;
    }

    .logouthover{
        margin-top:70px;
        padding:15px 0 15px 0;
        cursor:pointer;
    }
    .logouthover:hover{
        background: rgba(0,0,0,0.5);
        border-left: 2px solid white;
    }

    .top-info .info-p{
        padding:0px 20px;
    }

    .top-info .count-div{
        width:100%;
        text-align:right;
    }

    .flex-div{
        margin-bottom:10px;
        display:flex;
    }

    .top-info{
        padding:20px 0px;
        font-size:15px;
        display:flex;
        color:#DCE5DC;
        width:100%;
        top:0px;
        background:#40AEDE;
        position:sticky;
    }

    .p-div{
        width:100%;
    }

    .count-div1{
        text-align:right;
    }

    .search-div{
        width:100%;
        height:90px;
        z-index:1;
    }

    .result-div{
      background:white;  
      height:600px;
      margin-bottom:20px;
      overflow:auto;
      box-shadow:0px 0px 10px 2px black;
    }

    .viewall{
        text-decoration:none;
        color:#DCE5DC;
    }
    

    .viewall:hover{
        color:white;
    }

    .container1{
      width:93%;
    }

    

    
        </style>
    </head>

    <body>
        <div class="main">
         <!-- container -->
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
        
            <div class="leftdiv" id="leftdiv">
                <div class="navbar-container">
                    <nav>
                        <div class="title"><i class="fas fa-database" style="margin-right:10px;font-size:50px"></i>BDS</div>
                        <div>
                            <ul class="menu-ul">
                                <a style="color:white;text-decoration:none;" href="home.php"><li class="menu-li"><i class="fas fa-home" style="margin-right:10px;"></i> Home</li></a>
                                <a style="color:white;text-decoration:none" href="enter.php"><li class="menu-li"><i class="fas fa-sign-in-alt" style="margin-right:10px;"></i>Enter Data</li></a>
                                <a style="color:white;text-decoration:none" href="search.php"><li class="menu-li"><i class="fas fa-search" style="margin-right:10px;"></i>Search Data</li></a>
                            </ul>
                        </div>
                        <form action="login.php" method="POST">
                        <button class="logout" id="logout" name="logout" ><i class="fas fa-sign-out-alt" style="font-size:23px;margin-right:10px"></i>Logout</button>
                            </form>
                    </nav>
                </div>
            </div>

            <div class="rightdiv" id="rightdiv">
                <div class="container1">
                    <div class="search-div" style="text-align:center">
                        <form action="" class="search-form" method="POST" style="margin-top:10px;">
                            <input type="hidden" name="searchby" id="searchby" />
                            <select oninput="show()" style="border:2px solid #40AEDE;height:36px;width:250px;cursor:pointer;outline:none;padding-left:10px;font-size:15px" name="searchby1" id="searchby1">
                                <option id="list0" value="">Search Catergory</option>
                                <option id="listlast" value="4Ps">4Ps</option>
                                <option id="list12" value="Age">Age</option>
                                <option id="list33" value="Animals/Pet">Animals/Pet</option>
                                <option id="list40" value="Agricultural Facility">Agricultural Facility</option>
                                <option id="list31" value="Background Gardening">Background Gardening</option>
                                <option id="list11" value="Birth Date">Birth Date</option>
                                <option id="list34" value="Blind Drainage">Blind Drainage</option>
                                <option id="list19" value="Breast Feeding">Breast Feeding</option>
                                <option id="list35" value="Communication">Communication</option>
                                <option id="list8" value="Dependency">Dependency</option>
                                <option id="list38" value="Direct Waste to Water Bodies">Direct Waste to Water Bodies</option>
                                <option id="list37" value="Energy Source">Energy Source</option>
                                <option id="list45" value="Family ID">Family ID</option>
                                <option id="list30" value="Family Planning">Family Planning</option>
                                <option id="list3" value="First Name">First Name</option>
                                <option id="list28" value="Garbage Disposal">Garbage Disposal</option>
                                <option id="list13" value="Highest Educational Attainment">Highest Educational Attainment</option>
                                <option id="list36" value="Home Status">Home Status</option>
                                <option id="list42" value="House Status">House Status</option>
                                <option id="list24" value="House Type">House Type</option>
                                <option id="list26" value="Immunization">Immunization</option>
                                <option id="list17" value="IP">IP</option>
                                <option id="list5" value="Last Name">Last Name</option>
                                <option id="list32" value="Livelihood Status">Livelihood Status</option>
                                <option id="list4" value="Middle Name">Middle Name</option>
                                <option id="list23" value="Mother Tongue">Mother Tongue</option>
                                <option id="list2" value="Name">Name</option>
                                <option id="list22" value="Number of Family Members">Number of Family Members</option>
                                <option id="list20" value="NTP">NTP</option>
                                <option id="list14" value="Occupation">Occupation</option>
                                <option id="list41" value="Other Source of Income">Other Source of Income</option>
                                <option id="list18" value="Philhealth">Philhealth</option>
                                <option id="list44" value="Product">Product</option>
                                <option id="list6" value="Purok">Purok</option>
                                <option id="list16" value="PWD">PWD</option>
                                <option id="list15" value="Relation to Head of the Family">Relation to Head of the Family</option>
                                <option id="list7" value="Religion">Religion</option>
                                <option id="list25" value="Sanitary Toilet">Sanitary Toilet</option>
                                <option id="list10" value="Sex">Sex</option>
                                <option id="list21" value="Smooking">Smooking</option>
                                <option id="list43" value="Transportation">Transportation</option>
                                <option id="list9" value="Tribe">Tribe</option>
                                <option id="list39" value="Vulnerable Status">Vulnerable Status</option>
                                <option id="list29" value="Water Source">Water Source</option>
                                <option id="list27" value="WRA">WRA</option>
                            
                            </select>
                            
                            <span id="selectspan"></span>
                            <input type="text" name="search" style="border:2px solid #40AEDE;height:32px;width:150px;padding-left:10px;outline:none;font-size:15px;padding-right:40px;"  id="search"  class="input_search">
                            
                            <script>
                                <?php 
                                    
                                ?>
                                var checkpurokvisit=0;
                                var checkdependencyvisit=0;
                                var checksexvisit=0;
                                var checkrelationvisit=0;
                                var checktribevisit=0;
                                var checkreligionvisit=0;
                                var checkeducationvisit=0;
                                var checkpwdvisit=0;
                                var checkipvisit=0;
                                var checkphilhealthvisit=0;
                                var checkbreastfeedvisit=0;
                                var checkntpvisit=0;
                                var checksmookingvisit=0;
                                var checkmothertonguevisit=0;
                                var checkhousetypevisit=0;
                                var checkimmunizationvisit=0;
                                var checkwravisit=0;
                                var checkgarbdisposalvisit=0;
                                var checkfamilyplanvisit=0;
                                var checkbgroundvisit=0;
                                var checklivestatvisit=0;
                                var checkanimalvisit=0;
                                var checkblinddrainvisit=0;
                                var checkhomestatvisit=0;
                                var checkdwtwbdvisit=0;
                                var checkvulstatvisit=0;
                                var checkagrifacilvisit=0;
                                var checkhousestatvisit=0;
                                var checksantoiletvisit=0;
                                var checkfourpsvisit=0;

                                //var getsearch=document.getElementById("search");
                                //getsearch.setAttribute("name","search");
                                //getsearch.style.display="none";

                                    function show(){
                                        var getsearchby1=document.getElementById("searchby1").value;

                                        if(getsearchby1=="4Ps"){
                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","search");
                                                getntpselectid.style.display="inline-block";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==0 || checkfourpsvisit==1){
                                                if(checkfourpsvisit==1){
                                                    var getlist=document.getElementById("listlast").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createfourpsselect=document.createElement("select");
                                                createfourpsselect.setAttribute("id","fourpsselectid");
                                                createfourpsselect.setAttribute("name","search");
                                                createfourpsselect.style.display="none";

                                                getselectspan.appendChild(createfourpsselect);

                                                var callcreatefourpsselect=document.getElementById("fourpsselectid");
                                                callcreatefourpsselect.style.width="200px";
                                                callcreatefourpsselect.style.height="36px";
                                                callcreatefourpsselect.style.cursor="pointer";
                                                callcreatefourpsselect.style.outline="none";
                                                callcreatefourpsselect.style.paddingLeft="20px";
                                                callcreatefourpsselect.style.fontSize="15px";
                                                callcreatefourpsselect.style.border="2px solid #40AEDE";

                                                }

                                                if(checkfourpsvisit==0){
                                                var getlist=document.getElementById("listlast").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createfourpsselect=document.createElement("select");
                                                createfourpsselect.setAttribute("id","fourpsselectid");
                                                createfourpsselect.setAttribute("name","search");

                                                getselectspan.appendChild(createfourpsselect);

                                                var callcreatefourpsselect=document.getElementById("fourpsselectid");
                                                callcreatefourpsselect.style.width="200px";
                                                callcreatefourpsselect.style.height="36px";
                                                callcreatefourpsselect.style.cursor="pointer";
                                                callcreatefourpsselect.style.outline="none";
                                                callcreatefourpsselect.style.paddingLeft="20px";
                                                callcreatefourpsselect.style.fontSize="15px";
                                                callcreatefourpsselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($fourpsoptions=1;$fourpsoptions<5;$fourpsoptions++){ ?>
                                                    var createfourpsoption<?php echo $fourpsoptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createfourpsoption1.innerHTML="";
                                                createfourpsoption2.innerHTML="Yes";
                                                createfourpsoption3.innerHTML="No";
                                                createfourpsoption4.innerHTML="N/A";
                                                


                                                //append options
                                                <?php for($fourpsoptionsappend=1;$fourpsoptionsappend<5;$fourpsoptionsappend++){ ?>
                                                    callcreatefourpsselect.appendChild(createfourpsoption<?php echo $fourpsoptionsappend ?>);
                                                <?php } ?> 

                                                checkfourpsvisit=1;
                                                }
                                            }
                                        }


                                        if(getsearchby1==""){
                                            
                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }


                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            var getsearch=document.getElementById("search");
                                            getsearch.setAttribute("name","search");
                                            getsearch.style.display="inline-block";
                                            getsearch.setAttribute("type","text");
                                            getsearch.style.paddingRight="40px";

                                            var getlist=document.getElementById("list0").value;
                                            var getsearchby=document.getElementById("searchby");

                                            getsearchby.setAttribute("value",getlist);
                                        }

                                        

                                        if(getsearchby1=="Family ID"){
                                            
                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            var getsearch=document.getElementById("search");
                                            getsearch.setAttribute("name","search");
                                            getsearch.style.display="inline-block";
                                            getsearch.setAttribute("type","number");
                                            getsearch.style.paddingRight="0px";

                                            var getlist=document.getElementById("list45").value;
                                            var getsearchby=document.getElementById("searchby");

                                            getsearchby.setAttribute("value",getlist);
                                        }


                                        if(getsearchby1=="Name"){

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            var getsearch=document.getElementById("search");
                                            getsearch.setAttribute("name","search");
                                            getsearch.style.display="inline-block";
                                            getsearch.setAttribute("type","text");
                                            getsearch.style.paddingRight="40px";
                                            
                                            var getlist=document.getElementById("list2").value;
                                            var getsearchby=document.getElementById("searchby");

                                            getsearchby.setAttribute("value",getlist);
                                        }

                                        if(getsearchby1=="First Name"){

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            var getsearch=document.getElementById("search");
                                            getsearch.setAttribute("name","search");
                                            getsearch.style.display="inline-block";
                                            getsearch.setAttribute("type","text");
                                            getsearch.style.paddingRight="40px";


                                            var getlist=document.getElementById("list3").value;
                                            var getsearchby=document.getElementById("searchby");

                                            getsearchby.setAttribute("value",getlist);
                                        }



                                        if(getsearchby1=="Middle Name"){

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            var getsearch=document.getElementById("search");
                                            getsearch.setAttribute("name","search");
                                            getsearch.style.display="inline-block";
                                            getsearch.setAttribute("type","text");
                                            getsearch.style.paddingRight="40px";

                                            var getlist=document.getElementById("list4").value;
                                            var getsearchby=document.getElementById("searchby");

                                            getsearchby.setAttribute("value",getlist);
                                        }

                                        if(getsearchby1=="Last Name"){

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            var getsearch=document.getElementById("search");
                                            getsearch.setAttribute("name","search");
                                            getsearch.style.display="inline-block";
                                            getsearch.setAttribute("type","text");
                                            getsearch.style.paddingRight="40px";

                                            var getlist=document.getElementById("list5").value;
                                            var getsearchby=document.getElementById("searchby");

                                            getsearchby.setAttribute("value",getlist);
                                        }




                                        if(getsearchby1=="Purok"){

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","search");
                                                getpurokselectid.style.display="inline-block";
                                            }


                                            if(checkpurokvisit==0 || checkpurokvisit==1){
                                                
                                                if(checkpurokvisit==1){
                                                    var getlist=document.getElementById("list6").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createpurokselect=document.createElement("select");
                                                createpurokselect.setAttribute("id","purokselectid");
                                                createpurokselect.setAttribute("name","search");
                                                createpurokselect.style.display="none";

                                                getselectspan.appendChild(createpurokselect);

                                                var callcreatepurokselect=document.getElementById("purokselectid");
                                                callcreatepurokselect.style.width="200px";
                                                callcreatepurokselect.style.height="36px";
                                                callcreatepurokselect.style.cursor="pointer";
                                                callcreatepurokselect.style.outline="none";
                                                callcreatepurokselect.style.paddingLeft="20px";
                                                callcreatepurokselect.style.fontSize="15px";
                                                callcreatepurokselect.style.border="2px solid #40AEDE";

                                                

                                                checkpurokvisit=1;
                                                }


                                                if(checkpurokvisit==0){
                                                var getlist=document.getElementById("list6").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createpurokselect=document.createElement("select");
                                                createpurokselect.setAttribute("id","purokselectid");
                                                createpurokselect.setAttribute("name","search");

                                                getselectspan.appendChild(createpurokselect);

                                                var callcreatepurokselect=document.getElementById("purokselectid");
                                                callcreatepurokselect.style.width="200px";
                                                callcreatepurokselect.style.height="36px";
                                                callcreatepurokselect.style.cursor="pointer";
                                                callcreatepurokselect.style.outline="none";
                                                callcreatepurokselect.style.paddingLeft="20px";
                                                callcreatepurokselect.style.fontSize="15px";
                                                callcreatepurokselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($purokoptions=1;$purokoptions<17;$purokoptions++){ ?>
                                                    var createpurokoption<?php echo $purokoptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createpurokoption1.innerHTML="";
                                                createpurokoption2.innerHTML="Bagong Lipunan";
                                                createpurokoption3.innerHTML="Diaz";
                                                createpurokoption4.innerHTML="Felipe";
                                                createpurokoption5.innerHTML="Lot A";
                                                createpurokoption6.innerHTML="Lot B";
                                                createpurokoption7.innerHTML="Lot C";
                                                createpurokoption8.innerHTML="Lot D";
                                                createpurokoption9.innerHTML="Lower Acub";
                                                createpurokoption10.innerHTML="Mabinuligon";
                                                createpurokoption11.innerHTML="Mabuhay";
                                                createpurokoption12.innerHTML="Maligaya";
                                                createpurokoption13.innerHTML="Malipayon";
                                                createpurokoption14.innerHTML="Montefrio 1";
                                                createpurokoption15.innerHTML="Montefrio 2";
                                                createpurokoption16.innerHTML="Upper Acub";

                                                //append options
                                                <?php for($purokoptionsappend=1;$purokoptionsappend<17;$purokoptionsappend++){ ?>
                                                    callcreatepurokselect.appendChild(createpurokoption<?php echo $purokoptionsappend ?>);
                                                <?php } ?> 

                                                checkpurokvisit=1;
                                                }
                                            
                                            }
                                        }

                                        if(getsearchby1=="Religion"){

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","search");
                                                getreligionselectid.style.display="inline-block";
                                            }

                                            if(checkreligionvisit==0 || checkreligionvisit==1){

                                                if(checkreligionvisit==1){
                                                    var getlist=document.getElementById("list7").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createreligionselect=document.createElement("select");
                                                createreligionselect.setAttribute("id","religionselectid");
                                                createreligionselect.setAttribute("name","search");
                                                createreligionselect.style.display="none";

                                                getselectspan.appendChild(createreligionselect);

                                                var callcreatereligionselect=document.getElementById("religionselectid");
                                                callcreatereligionselect.style.width="200px";
                                                callcreatereligionselect.style.height="36px";
                                                callcreatereligionselect.style.cursor="pointer";
                                                callcreatereligionselect.style.outline="none";
                                                callcreatereligionselect.style.paddingLeft="20px";
                                                callcreatereligionselect.style.fontSize="15px";
                                                callcreatereligionselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($religionoptions=1;$religionoptions<12;$religionoptions++){ ?>
                                                    var createreligionoption<?php echo $religionoptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createreligionoption1.innerHTML="-";
                                                createreligionoption2.innerHTML="Aglipay";
                                                createreligionoption3.innerHTML="Alliance";
                                                createreligionoption4.innerHTML="Baptists";
                                                createreligionoption5.innerHTML="Born Again";
                                                createreligionoption6.innerHTML="Iglesia ni Cristo";
                                                createreligionoption7.innerHTML="Islam";
                                                createreligionoption8.innerHTML="Jehovah's Witness";
                                                createreligionoption9.innerHTML="Protestant";
                                                createreligionoption10.innerHTML="Roman Catholic";
                                                createreligionoption11.innerHTML="Seventh Day Adventist";
                                                }

                                                if(checkreligionvisit==0){
                                                var getlist=document.getElementById("list7").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createreligionselect=document.createElement("select");
                                                createreligionselect.setAttribute("id","religionselectid");
                                                createreligionselect.setAttribute("name","search");

                                                getselectspan.appendChild(createreligionselect);

                                                var callcreatereligionselect=document.getElementById("religionselectid");
                                                callcreatereligionselect.style.width="200px";
                                                callcreatereligionselect.style.height="36px";
                                                callcreatereligionselect.style.cursor="pointer";
                                                callcreatereligionselect.style.outline="none";
                                                callcreatereligionselect.style.paddingLeft="20px";
                                                callcreatereligionselect.style.fontSize="15px";
                                                callcreatereligionselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($religionoptions=1;$religionoptions<12;$religionoptions++){ ?>
                                                    var createreligionoption<?php echo $religionoptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createreligionoption1.innerHTML="";
                                                createreligionoption2.innerHTML="Aglipay";
                                                createreligionoption3.innerHTML="Alliance";
                                                createreligionoption4.innerHTML="Baptists";
                                                createreligionoption5.innerHTML="Born Again";
                                                createreligionoption6.innerHTML="Iglesia ni Cristo";
                                                createreligionoption7.innerHTML="Islam";
                                                createreligionoption8.innerHTML="Jehovah's Witness";
                                                createreligionoption9.innerHTML="Protestant";
                                                createreligionoption10.innerHTML="Roman Catholic";
                                                createreligionoption11.innerHTML="Seventh Day Adventist";

                                                //append options
                                                <?php for($religionoptionsappend=1;$religionoptionsappend<12;$religionoptionsappend++){ ?>
                                                    callcreatereligionselect.appendChild(createreligionoption<?php echo $religionoptionsappend ?>);
                                                <?php } ?> 

                                                checkreligionvisit=1;
                                                }
                                            }
                                        }


                                        if(getsearchby1=="Dependency"){

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","search");
                                                getdependencyselectid.style.display="inline-block";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }


                                            if(checkdependencyvisit==0 || checkdependencyvisit==1){

                                                if(checkdependencyvisit==1){
                                                    var getlist=document.getElementById("list8").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createdependencyselect=document.createElement("select");
                                                createdependencyselect.setAttribute("id","dependencyselectid");
                                                createdependencyselect.setAttribute("name","search");
                                                createdependencyselect.style.display="none";

                                                getselectspan.appendChild(createdependencyselect);

                                                var callcreatedependencyselect=document.getElementById("dependencyselectid");
                                                callcreatedependencyselect.style.width="200px";
                                                callcreatedependencyselect.style.height="36px";
                                                callcreatedependencyselect.style.cursor="pointer";
                                                callcreatedependencyselect.style.outline="none";
                                                callcreatedependencyselect.style.paddingLeft="20px";
                                                callcreatedependencyselect.style.fontSize="15px";
                                                callcreatedependencyselect.style.border="2px solid #40AEDE"; 
                                                }

                                                if(checkdependencyvisit==0){
                                                var getlist=document.getElementById("list8").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createdependencyselect=document.createElement("select");
                                                createdependencyselect.setAttribute("id","dependencyselectid");
                                                createdependencyselect.setAttribute("name","search");

                                                getselectspan.appendChild(createdependencyselect);

                                                var callcreatedependencyselect=document.getElementById("dependencyselectid");
                                                callcreatedependencyselect.style.width="200px";
                                                callcreatedependencyselect.style.height="36px";
                                                callcreatedependencyselect.style.cursor="pointer";
                                                callcreatedependencyselect.style.outline="none";
                                                callcreatedependencyselect.style.paddingLeft="20px";
                                                callcreatedependencyselect.style.fontSize="15px";
                                                callcreatedependencyselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($dependencyoptions=1;$dependencyoptions<4;$dependencyoptions++){ ?>
                                                    var createdependencyoption<?php echo $dependencyoptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createdependencyoption1.innerHTML="";
                                                createdependencyoption2.innerHTML="Dependent";
                                                createdependencyoption3.innerHTML="Independent";

                                                //append options
                                                <?php for($dependencyoptionsappend=1;$dependencyoptionsappend<4;$dependencyoptionsappend++){ ?>
                                                    callcreatedependencyselect.appendChild(createdependencyoption<?php echo $dependencyoptionsappend ?>);
                                                <?php } ?> 

                                                checkdependencyvisit=1;
                                                }
                                            }

                                        }

                                        if(getsearchby1=="Tribe"){

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","search");
                                                gettribeselectid.style.display="inline-block";
                                            }

                                            if(checktribevisit==1 || checktribevisit==0){
                                            
                                                if(checktribevisit==1){
                                                    var getlist=document.getElementById("list9").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createtribeselect=document.createElement("select");
                                                createtribeselect.setAttribute("id","tribeselectid");
                                                createtribeselect.setAttribute("name","search");
                                                createtribeselect.style.display="none";

                                                getselectspan.appendChild(createtribeselect);

                                                var callcreatetribeselect=document.getElementById("tribeselectid");
                                                callcreatetribeselect.style.width="200px";
                                                callcreatetribeselect.style.height="36px";
                                                callcreatetribeselect.style.cursor="pointer";
                                                callcreatetribeselect.style.outline="none";
                                                callcreatetribeselect.style.paddingLeft="20px";
                                                callcreatetribeselect.style.fontSize="15px";
                                                callcreatetribeselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($tribeoptions=1;$tribeoptions<22;$tribeoptions++){ ?>
                                                    var createtribeoption<?php echo $tribeoptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createtribeoption1.innerHTML="-";
                                                createtribeoption2.innerHTML="Aeta";
                                                createtribeoption3.innerHTML="Ati";
                                                createtribeoption4.innerHTML="B’laan";
                                                createtribeoption5.innerHTML="Badjao";
                                                createtribeoption6.innerHTML="Bagobo";
                                                createtribeoption7.innerHTML="Bikolano";
                                                createtribeoption8.innerHTML="Cebuano";
                                                createtribeoption9.innerHTML="Igorot";
                                                createtribeoption10.innerHTML="Ilonggo";
                                                createtribeoption11.innerHTML="Ilokano";
                                                createtribeoption12.innerHTML="Ivatan";
                                                createtribeoption13.innerHTML="Kapampangan";
                                                createtribeoption14.innerHTML="Mangyan";
                                                createtribeoption15.innerHTML="Maranao";
                                                createtribeoption16.innerHTML="Suludnon";
                                                createtribeoption17.innerHTML="T’boli";
                                                createtribeoption18.innerHTML="Tagalog";
                                                createtribeoption19.innerHTML="Tausug";
                                                createtribeoption20.innerHTML="Waray";
                                                createtribeoption21.innerHTML="Yakan";
                                                }

                                                if(checktribevisit==0){
                                                var getlist=document.getElementById("list9").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createtribeselect=document.createElement("select");
                                                createtribeselect.setAttribute("id","tribeselectid");
                                                createtribeselect.setAttribute("name","search");

                                                getselectspan.appendChild(createtribeselect);

                                                var callcreatetribeselect=document.getElementById("tribeselectid");
                                                callcreatetribeselect.style.width="200px";
                                                callcreatetribeselect.style.height="36px";
                                                callcreatetribeselect.style.cursor="pointer";
                                                callcreatetribeselect.style.outline="none";
                                                callcreatetribeselect.style.paddingLeft="20px";
                                                callcreatetribeselect.style.fontSize="15px";
                                                callcreatetribeselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($tribeoptions=1;$tribeoptions<22;$tribeoptions++){ ?>
                                                    var createtribeoption<?php echo $tribeoptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createtribeoption1.innerHTML="";
                                                createtribeoption2.innerHTML="Aeta";
                                                createtribeoption3.innerHTML="Ati";
                                                createtribeoption4.innerHTML="Blaan";
                                                createtribeoption5.innerHTML="Badjao";
                                                createtribeoption6.innerHTML="Bagobo";
                                                createtribeoption7.innerHTML="Bikolano";
                                                createtribeoption8.innerHTML="Cebuano";
                                                createtribeoption9.innerHTML="Igorot";
                                                createtribeoption10.innerHTML="Ilonggo";
                                                createtribeoption11.innerHTML="Ilokano";
                                                createtribeoption12.innerHTML="Ivatan";
                                                createtribeoption13.innerHTML="Kapampangan";
                                                createtribeoption14.innerHTML="Mangyan";
                                                createtribeoption15.innerHTML="Maranao";
                                                createtribeoption16.innerHTML="Suludnon";
                                                createtribeoption17.innerHTML="Tboli";
                                                createtribeoption18.innerHTML="Tagalog";
                                                createtribeoption19.innerHTML="Tausug";
                                                createtribeoption20.innerHTML="Waray";
                                                createtribeoption21.innerHTML="Yakan";

                                                //append options
                                                <?php for($tribeoptionsappend=1;$tribeoptionsappend<22;$tribeoptionsappend++){ ?>
                                                    callcreatetribeselect.appendChild(createtribeoption<?php echo $tribeoptionsappend ?>);
                                                <?php } ?> 

                                                checktribevisit=1;
                                                }
                                            }
                                        }

                                        if(getsearchby1=="Sex"){

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","search");
                                                getsexselectid.style.display="inline-block";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }
                                        
                                            if(checksexvisit==0 || checksexvisit==1){

                                                if(checksexvisit==1){
                                                    var getlist=document.getElementById("list10").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createsexselect=document.createElement("select");
                                                createsexselect.setAttribute("id","sexselectid");
                                                createsexselect.setAttribute("name","search");
                                                createsexselect.style.display="none";

                                                getselectspan.appendChild(createsexselect);

                                                var callcreatesexselect=document.getElementById("sexselectid");
                                                callcreatesexselect.style.width="200px";
                                                callcreatesexselect.style.height="36px";
                                                callcreatesexselect.style.cursor="pointer";
                                                callcreatesexselect.style.outline="none";
                                                callcreatesexselect.style.paddingLeft="20px";
                                                callcreatesexselect.style.fontSize="15px";
                                                callcreatesexselect.style.border="2px solid #40AEDE";
                                                }

                                                if(checksexvisit==0){
                                                var getlist=document.getElementById("list10").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createsexselect=document.createElement("select");
                                                createsexselect.setAttribute("id","sexselectid");
                                                createsexselect.setAttribute("name","search");

                                                getselectspan.appendChild(createsexselect);

                                                var callcreatesexselect=document.getElementById("sexselectid");
                                                callcreatesexselect.style.width="200px";
                                                callcreatesexselect.style.height="36px";
                                                callcreatesexselect.style.cursor="pointer";
                                                callcreatesexselect.style.outline="none";
                                                callcreatesexselect.style.paddingLeft="20px";
                                                callcreatesexselect.style.fontSize="15px";
                                                callcreatesexselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($sexoptions=1;$sexoptions<4;$sexoptions++){ ?>
                                                    var createsexoption<?php echo $sexoptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createsexoption1.innerHTML="";
                                                createsexoption2.innerHTML="Male";
                                                createsexoption3.innerHTML="Female";

                                                //append options
                                                <?php for($sexoptionsappend=1;$sexoptionsappend<4;$sexoptionsappend++){ ?>
                                                    callcreatesexselect.appendChild(createsexoption<?php echo $sexoptionsappend ?>);
                                                <?php } ?> 

                                                checksexvisit=1;
                                                }
                                            
                                            }
                                        }

                                        if(getsearchby1=="Birth Date"){

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            var getsearch=document.getElementById("search");
                                            getsearch.setAttribute("type","date");
                                            getsearch.setAttribute("name","search");
                                            getsearch.style.display="inline-block";
                                            getsearch.style.paddingRight="0px";



                                        var getlist=document.getElementById("list11").value;
                                        var getsearchby=document.getElementById("searchby");

                                        getsearchby.setAttribute("value",getlist);
                                        }

                                        if(getsearchby1=="Age"){

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            var getsearch=document.getElementById("search");
                                            getsearch.setAttribute("name","search");
                                            getsearch.setAttribute("type","number");
                                            getsearch.style.display="inline-block";
                                            getsearch.style.paddingRight="0px";

                                        var getlist=document.getElementById("list12").value;
                                        var getsearchby=document.getElementById("searchby");

                                        getsearchby.setAttribute("value",getlist);
                                        }

                                        if(getsearchby1=="Highest Educational Attainment"){

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","search");
                                                geteducationselectid.style.display="inline-block";
                                            }


                                            if(checkeducationvisit==0 || checkeducationvisit==1){

                                                if(checkeducationvisit==1){
                                                    var getlist=document.getElementById("list13").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createeducationselect=document.createElement("select");
                                                createeducationselect.setAttribute("id","educationselectid");
                                                createeducationselect.setAttribute("name","search");
                                                createeducationselect.style.display="none";

                                                getselectspan.appendChild(createeducationselect);

                                                var callcreateeducationselect=document.getElementById("educationselectid");
                                                callcreateeducationselect.style.width="250px";
                                                callcreateeducationselect.style.height="36px";
                                                callcreateeducationselect.style.cursor="pointer";
                                                callcreateeducationselect.style.outline="none";
                                                callcreateeducationselect.style.paddingLeft="20px";
                                                callcreateeducationselect.style.fontSize="15px";
                                                callcreateeducationselect.style.border="2px solid #40AEDE";
                                                }

                                                if(checkeducationvisit==0){
                                                var getlist=document.getElementById("list13").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createeducationselect=document.createElement("select");
                                                createeducationselect.setAttribute("id","educationselectid");
                                                createeducationselect.setAttribute("name","search");

                                                getselectspan.appendChild(createeducationselect);

                                                var callcreateeducationselect=document.getElementById("educationselectid");
                                                callcreateeducationselect.style.width="250px";
                                                callcreateeducationselect.style.height="36px";
                                                callcreateeducationselect.style.cursor="pointer";
                                                callcreateeducationselect.style.outline="none";
                                                callcreateeducationselect.style.paddingLeft="20px";
                                                callcreateeducationselect.style.fontSize="15px";
                                                callcreateeducationselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($educationoptions=1;$educationoptions<12;$educationoptions++){ ?>
                                                    var createeducationoption<?php echo $educationoptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createeducationoption1.innerHTML="";
                                                createeducationoption2.innerHTML="Not Attended";
                                                createeducationoption3.innerHTML="Vocational";
                                                createeducationoption4.innerHTML="Elementary Level";
                                                createeducationoption5.innerHTML="Elementary Graduate";
                                                createeducationoption6.innerHTML="High School Level";
                                                createeducationoption7.innerHTML="High School Graduate";
                                                createeducationoption8.innerHTML="Senior High School Level";
                                                createeducationoption9.innerHTML="Senior High School Graduate";
                                                createeducationoption10.innerHTML="College Level";
                                                createeducationoption11.innerHTML="College Graduate";

                                                //append options
                                                <?php for($educationoptionsappend=1;$educationoptionsappend<12;$educationoptionsappend++){ ?>
                                                    callcreateeducationselect.appendChild(createeducationoption<?php echo $educationoptionsappend ?>);
                                                <?php } ?> 

                                                checkeducationvisit=1;
                                                }
                                            }
                                        }

                                        if(getsearchby1=="Occupation"){

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            var getsearch=document.getElementById("search");
                                            getsearch.setAttribute("name","search");
                                            getsearch.setAttribute("type","text");
                                            getsearch.style.paddingRight="40px";
                                            getsearch.style.display="inline-block";


                                        var getlist=document.getElementById("list14").value;
                                        var getsearchby=document.getElementById("searchby");

                                        getsearchby.setAttribute("value",getlist);
                                        }

                                        if(getsearchby1=="Relation to Head of the Family"){

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","search");
                                                getrelationselectid.style.display="inline-block";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==0 || checkrelationvisit==1){
                                                if(checkrelationvisit==1){
                                                    var getlist=document.getElementById("list15").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createrelationselect=document.createElement("select");
                                                createrelationselect.setAttribute("id","relationselectid");
                                                createrelationselect.setAttribute("name","search");
                                                createrelationselect.style.display="none";

                                                getselectspan.appendChild(createrelationselect);

                                                var callcreaterelationselect=document.getElementById("relationselectid");
                                                callcreaterelationselect.style.width="200px";
                                                callcreaterelationselect.style.height="36px";
                                                callcreaterelationselect.style.cursor="pointer";
                                                callcreaterelationselect.style.outline="none";
                                                callcreaterelationselect.style.paddingLeft="20px";
                                                callcreaterelationselect.style.fontSize="15px";
                                                callcreaterelationselect.style.border="2px solid #40AEDE";

                                                }

                                                if(checkrelationvisit==0){
                                                var getlist=document.getElementById("list15").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createrelationselect=document.createElement("select");
                                                createrelationselect.setAttribute("id","relationselectid");
                                                createrelationselect.setAttribute("name","search");

                                                getselectspan.appendChild(createrelationselect);

                                                var callcreaterelationselect=document.getElementById("relationselectid");
                                                callcreaterelationselect.style.width="200px";
                                                callcreaterelationselect.style.height="36px";
                                                callcreaterelationselect.style.cursor="pointer";
                                                callcreaterelationselect.style.outline="none";
                                                callcreaterelationselect.style.paddingLeft="20px";
                                                callcreaterelationselect.style.fontSize="15px";
                                                callcreaterelationselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($relationoptions=1;$relationoptions<23;$relationoptions++){ ?>
                                                    var createrelationoption<?php echo $relationoptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createrelationoption1.innerHTML="";
                                                createrelationoption2.innerHTML="Ancle";
                                                createrelationoption3.innerHTML="Aunt";
                                                createrelationoption4.innerHTML="Brother";
                                                createrelationoption5.innerHTML="Brother in Law";
                                                createrelationoption6.innerHTML="Cousin";
                                                createrelationoption7.innerHTML="Daughter";
                                                createrelationoption8.innerHTML="Father";
                                                createrelationoption9.innerHTML="Father in Law";
                                                createrelationoption10.innerHTML="Grand Daughter";
                                                createrelationoption11.innerHTML="Grand Daughter";
                                                createrelationoption12.innerHTML="Grand Mother";
                                                createrelationoption13.innerHTML="Grand Son";
                                                createrelationoption14.innerHTML="Mother"; 
                                                createrelationoption15.innerHTML="Mother in Law";
                                                createrelationoption16.innerHTML="Nephew";
                                                createrelationoption17.innerHTML="Niece";
                                                createrelationoption18.innerHTML="Sister";
                                                createrelationoption19.innerHTML="Sister in Law";
                                                createrelationoption20.innerHTML="Son";
                                                createrelationoption21.innerHTML="Wife";
                                                createrelationoption22.innerHTML="Others";


                                                //append options
                                                <?php for($relationoptionsappend=1;$relationoptionsappend<23;$relationoptionsappend++){ ?>
                                                    callcreaterelationselect.appendChild(createrelationoption<?php echo $relationoptionsappend ?>);
                                                <?php } ?> 

                                                checkrelationvisit=1;
                                                }
                                            }
                                        }

                                        if(getsearchby1=="PWD"){

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","search");
                                                getpwdselectid.style.display="inline-block";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==0 || checkpwdvisit==1){
                                                if(checkpwdvisit==1){
                                                    var getlist=document.getElementById("list16").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createpwdselect=document.createElement("select");
                                                createpwdselect.setAttribute("id","pwdselectid");
                                                createpwdselect.setAttribute("name","search");
                                                createpwdselect.style.display="none";

                                                getselectspan.appendChild(createpwdselect);

                                                var callcreatepwdselect=document.getElementById("pwdselectid");
                                                callcreatepwdselect.style.width="200px";
                                                callcreatepwdselect.style.height="36px";
                                                callcreatepwdselect.style.cursor="pointer";
                                                callcreatepwdselect.style.outline="none";
                                                callcreatepwdselect.style.paddingLeft="20px";
                                                callcreatepwdselect.style.fontSize="15px";
                                                callcreatepwdselect.style.border="2px solid #40AEDE";

                                                }

                                                if(checkpwdvisit==0){
                                                var getlist=document.getElementById("list16").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createpwdselect=document.createElement("select");
                                                createpwdselect.setAttribute("id","pwdselectid");
                                                createpwdselect.setAttribute("name","search");

                                                getselectspan.appendChild(createpwdselect);

                                                var callcreatepwdselect=document.getElementById("pwdselectid");
                                                callcreatepwdselect.style.width="200px";
                                                callcreatepwdselect.style.height="36px";
                                                callcreatepwdselect.style.cursor="pointer";
                                                callcreatepwdselect.style.outline="none";
                                                callcreatepwdselect.style.paddingLeft="20px";
                                                callcreatepwdselect.style.fontSize="15px";
                                                callcreatepwdselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($pwdoptions=1;$pwdoptions<5;$pwdoptions++){ ?>
                                                    var createpwdoption<?php echo $pwdoptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createpwdoption1.innerHTML="";
                                                createpwdoption2.innerHTML="Yes";
                                                createpwdoption3.innerHTML="No";
                                                createpwdoption4.innerHTML="N/A";
                                                


                                                //append options
                                                <?php for($pwdoptionsappend=1;$pwdoptionsappend<5;$pwdoptionsappend++){ ?>
                                                    callcreatepwdselect.appendChild(createpwdoption<?php echo $pwdoptionsappend ?>);
                                                <?php } ?> 

                                                checkpwdvisit=1;
                                                }
                                            }

                                        }

                                        if(getsearchby1=="IP"){
                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","search");
                                                getipselectid.style.display="inline-block";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            if(checkipvisit==0 || checkipvisit==1){
                                                if(checkipvisit==1){
                                                    var getlist=document.getElementById("list17").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createipselect=document.createElement("select");
                                                createipselect.setAttribute("id","ipselectid");
                                                createipselect.setAttribute("name","search");
                                                createipselect.style.display="none";

                                                getselectspan.appendChild(createipselect);

                                                var callcreateipselect=document.getElementById("ipselectid");
                                                callcreateipselect.style.width="200px";
                                                callcreateipselect.style.height="36px";
                                                callcreateipselect.style.cursor="pointer";
                                                callcreateipselect.style.outline="none";
                                                callcreateipselect.style.paddingLeft="20px";
                                                callcreateipselect.style.fontSize="15px";
                                                callcreateipselect.style.border="2px solid #40AEDE";

                                                }

                                                if(checkipvisit==0){
                                                var getlist=document.getElementById("list17").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createipselect=document.createElement("select");
                                                createipselect.setAttribute("id","ipselectid");
                                                createipselect.setAttribute("name","search");

                                                getselectspan.appendChild(createipselect);

                                                var callcreateipselect=document.getElementById("ipselectid");
                                                callcreateipselect.style.width="200px";
                                                callcreateipselect.style.height="36px";
                                                callcreateipselect.style.cursor="pointer";
                                                callcreateipselect.style.outline="none";
                                                callcreateipselect.style.paddingLeft="20px";
                                                callcreateipselect.style.fontSize="15px";
                                                callcreateipselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($ipoptions=1;$ipoptions<5;$ipoptions++){ ?>
                                                    var createipoption<?php echo $ipoptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createipoption1.innerHTML="";
                                                createipoption2.innerHTML="Yes";
                                                createipoption3.innerHTML="No";
                                                createipoption4.innerHTML="N/A";
                                                


                                                //append options
                                                <?php for($ipoptionsappend=1;$ipoptionsappend<5;$ipoptionsappend++){ ?>
                                                    callcreateipselect.appendChild(createipoption<?php echo $ipoptionsappend ?>);
                                                <?php } ?> 

                                                checkipvisit=1;
                                                }
                                            }
                                        }

                                        if(getsearchby1=="Philhealth"){

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","search");
                                                getphilhealthselectid.style.display="inline-block";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==0 || checkphilhealthvisit==1){
                                                if(checkphilhealthvisit==1){
                                                    var getlist=document.getElementById("list18").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createphilhealthselect=document.createElement("select");
                                                createphilhealthselect.setAttribute("id","philhealthselectid");
                                                createphilhealthselect.setAttribute("name","search");
                                                createphilhealthselect.style.display="none";

                                                getselectspan.appendChild(createphilhealthselect);

                                                var callcreatephilhealthselect=document.getElementById("philhealthselectid");
                                                callcreatephilhealthselect.style.width="200px";
                                                callcreatephilhealthselect.style.height="36px";
                                                callcreatephilhealthselect.style.cursor="pointer";
                                                callcreatephilhealthselect.style.outline="none";
                                                callcreatephilhealthselect.style.paddingLeft="20px";
                                                callcreatephilhealthselect.style.fontSize="15px";
                                                callcreatephilhealthselect.style.border="2px solid #40AEDE";

                                                }

                                                if(checkphilhealthvisit==0){
                                                var getlist=document.getElementById("list18").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createphilhealthselect=document.createElement("select");
                                                createphilhealthselect.setAttribute("id","philhealthselectid");
                                                createphilhealthselect.setAttribute("name","search");

                                                getselectspan.appendChild(createphilhealthselect);

                                                var callcreatephilhealthselect=document.getElementById("philhealthselectid");
                                                callcreatephilhealthselect.style.width="200px";
                                                callcreatephilhealthselect.style.height="36px";
                                                callcreatephilhealthselect.style.cursor="pointer";
                                                callcreatephilhealthselect.style.outline="none";
                                                callcreatephilhealthselect.style.paddingLeft="20px";
                                                callcreatephilhealthselect.style.fontSize="15px";
                                                callcreatephilhealthselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($philhealthoptions=1;$philhealthoptions<5;$philhealthoptions++){ ?>
                                                    var createphilhealthoption<?php echo $philhealthoptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createphilhealthoption1.innerHTML="";
                                                createphilhealthoption2.innerHTML="Yes";
                                                createphilhealthoption3.innerHTML="No";
                                                createphilhealthoption4.innerHTML="N/A";
                                                


                                                //append options
                                                <?php for($philhealthoptionsappend=1;$philhealthoptionsappend<5;$philhealthoptionsappend++){ ?>
                                                    callcreatephilhealthselect.appendChild(createphilhealthoption<?php echo $philhealthoptionsappend ?>);
                                                <?php } ?> 

                                                checkphilhealthvisit=1;
                                                }
                                            }

                                        }

                                        if(getsearchby1=="Breast Feeding"){
                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","search");
                                                getbreastfeedselectid.style.display="inline-block";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==0 || checkbreastfeedvisit==1){
                                                if(checkbreastfeedvisit==1){
                                                    var getlist=document.getElementById("list19").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createbreastfeedselect=document.createElement("select");
                                                createbreastfeedselect.setAttribute("id","breastfeedselectid");
                                                createbreastfeedselect.setAttribute("name","search");
                                                createbreastfeedselect.style.display="none";

                                                getselectspan.appendChild(createbreastfeedselect);

                                                var callcreatebreastfeedselect=document.getElementById("breastfeedselectid");
                                                callcreatebreastfeedselect.style.width="200px";
                                                callcreatebreastfeedselect.style.height="36px";
                                                callcreatebreastfeedselect.style.cursor="pointer";
                                                callcreatebreastfeedselect.style.outline="none";
                                                callcreatebreastfeedselect.style.paddingLeft="20px";
                                                callcreatebreastfeedselect.style.fontSize="15px";
                                                callcreatebreastfeedselect.style.border="2px solid #40AEDE";

                                                }

                                                if(checkbreastfeedvisit==0){
                                                var getlist=document.getElementById("list19").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createbreastfeedselect=document.createElement("select");
                                                createbreastfeedselect.setAttribute("id","breastfeedselectid");
                                                createbreastfeedselect.setAttribute("name","search");

                                                getselectspan.appendChild(createbreastfeedselect);

                                                var callcreatebreastfeedselect=document.getElementById("breastfeedselectid");
                                                callcreatebreastfeedselect.style.width="200px";
                                                callcreatebreastfeedselect.style.height="36px";
                                                callcreatebreastfeedselect.style.cursor="pointer";
                                                callcreatebreastfeedselect.style.outline="none";
                                                callcreatebreastfeedselect.style.paddingLeft="20px";
                                                callcreatebreastfeedselect.style.fontSize="15px";
                                                callcreatebreastfeedselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($breastfeedoptions=1;$breastfeedoptions<5;$breastfeedoptions++){ ?>
                                                    var createbreastfeedoption<?php echo $breastfeedoptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createbreastfeedoption1.innerHTML="";
                                                createbreastfeedoption2.innerHTML="Yes";
                                                createbreastfeedoption3.innerHTML="No";
                                                createbreastfeedoption4.innerHTML="N/A";
                                                


                                                //append options
                                                <?php for($breastfeedoptionsappend=1;$breastfeedoptionsappend<5;$breastfeedoptionsappend++){ ?>
                                                    callcreatebreastfeedselect.appendChild(createbreastfeedoption<?php echo $breastfeedoptionsappend ?>);
                                                <?php } ?> 

                                                checkbreastfeedvisit=1;
                                                }
                                            }
                                        }

                                        if(getsearchby1=="NTP"){
                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","search");
                                                getntpselectid.style.display="inline-block";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            if(checkntpvisit==0 || checkntpvisit==1){
                                                if(checkntpvisit==1){
                                                    var getlist=document.getElementById("list20").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createntpselect=document.createElement("select");
                                                createntpselect.setAttribute("id","ntpselectid");
                                                createntpselect.setAttribute("name","search");
                                                createntpselect.style.display="none";

                                                getselectspan.appendChild(createntpselect);

                                                var callcreatentpselect=document.getElementById("ntpselectid");
                                                callcreatentpselect.style.width="200px";
                                                callcreatentpselect.style.height="36px";
                                                callcreatentpselect.style.cursor="pointer";
                                                callcreatentpselect.style.outline="none";
                                                callcreatentpselect.style.paddingLeft="20px";
                                                callcreatentpselect.style.fontSize="15px";
                                                callcreatentpselect.style.border="2px solid #40AEDE";

                                                }

                                                if(checkntpvisit==0){
                                                var getlist=document.getElementById("list20").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createntpselect=document.createElement("select");
                                                createntpselect.setAttribute("id","ntpselectid");
                                                createntpselect.setAttribute("name","search");

                                                getselectspan.appendChild(createntpselect);

                                                var callcreatentpselect=document.getElementById("ntpselectid");
                                                callcreatentpselect.style.width="200px";
                                                callcreatentpselect.style.height="36px";
                                                callcreatentpselect.style.cursor="pointer";
                                                callcreatentpselect.style.outline="none";
                                                callcreatentpselect.style.paddingLeft="20px";
                                                callcreatentpselect.style.fontSize="15px";
                                                callcreatentpselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($ntpoptions=1;$ntpoptions<5;$ntpoptions++){ ?>
                                                    var createntpoption<?php echo $ntpoptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createntpoption1.innerHTML="";
                                                createntpoption2.innerHTML="Yes";
                                                createntpoption3.innerHTML="No";
                                                createntpoption4.innerHTML="N/A";
                                                


                                                //append options
                                                <?php for($ntpoptionsappend=1;$ntpoptionsappend<5;$ntpoptionsappend++){ ?>
                                                    callcreatentpselect.appendChild(createntpoption<?php echo $ntpoptionsappend ?>);
                                                <?php } ?> 

                                                checkntpvisit=1;
                                                }
                                            }
                                        }


                                        if(getsearchby1=="Smooking"){
                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","search");
                                                getsmookingselectid.style.display="inline-block";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==0 || checksmookingvisit==1){
                                                if(checksmookingvisit==1){
                                                    var getlist=document.getElementById("list21").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createsmookingselect=document.createElement("select");
                                                createsmookingselect.setAttribute("id","smookingselectid");
                                                createsmookingselect.setAttribute("name","search");
                                                createsmookingselect.style.display="none";

                                                getselectspan.appendChild(createsmookingselect);

                                                var callcreatesmookingselect=document.getElementById("smookingselectid");
                                                callcreatesmookingselect.style.width="200px";
                                                callcreatesmookingselect.style.height="36px";
                                                callcreatesmookingselect.style.cursor="pointer";
                                                callcreatesmookingselect.style.outline="none";
                                                callcreatesmookingselect.style.paddingLeft="20px";
                                                callcreatesmookingselect.style.fontSize="15px";
                                                callcreatesmookingselect.style.border="2px solid #40AEDE";

                                                }

                                                if(checksmookingvisit==0){
                                                var getlist=document.getElementById("list21").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createsmookingselect=document.createElement("select");
                                                createsmookingselect.setAttribute("id","smookingselectid");
                                                createsmookingselect.setAttribute("name","search");

                                                getselectspan.appendChild(createsmookingselect);

                                                var callcreatesmookingselect=document.getElementById("smookingselectid");
                                                callcreatesmookingselect.style.width="200px";
                                                callcreatesmookingselect.style.height="36px";
                                                callcreatesmookingselect.style.cursor="pointer";
                                                callcreatesmookingselect.style.outline="none";
                                                callcreatesmookingselect.style.paddingLeft="20px";
                                                callcreatesmookingselect.style.fontSize="15px";
                                                callcreatesmookingselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($smookingoptions=1;$smookingoptions<5;$smookingoptions++){ ?>
                                                    var createsmookingoption<?php echo $smookingoptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createsmookingoption1.innerHTML="";
                                                createsmookingoption2.innerHTML="Yes";
                                                createsmookingoption3.innerHTML="No";
                                                createsmookingoption4.innerHTML="N/A";
                                                


                                                //append options
                                                <?php for($smookingoptionsappend=1;$smookingoptionsappend<5;$smookingoptionsappend++){ ?>
                                                    callcreatesmookingselect.appendChild(createsmookingoption<?php echo $smookingoptionsappend ?>);
                                                <?php } ?> 

                                                checksmookingvisit=1;
                                                }
                                            }
                                        }

                                        if(getsearchby1=="Number of Family Members"){

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }
                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            var getsearch=document.getElementById("search");
                                            getsearch.setAttribute("name","search");
                                            getsearch.style.display="inline-block";
                                            getsearch.setAttribute("type","number");
                                            getsearch.style.paddingRight="0px";

                                        var getlist=document.getElementById("list22").value;
                                        var getsearchby=document.getElementById("searchby");

                                        getsearchby.setAttribute("value",getlist);
                                        }

                                        if(getsearchby1=="Mother Tongue"){
                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","search");
                                                getmothertongueselectid.style.display="inline-block";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==0 || checkmothertonguevisit==1){
                                                if(checkmothertonguevisit==1){
                                                    var getlist=document.getElementById("list23").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createmothertongueselect=document.createElement("select");
                                                createmothertongueselect.setAttribute("id","mothertongueselectid");
                                                createmothertongueselect.setAttribute("name","search");
                                                createmothertongueselect.style.display="none";

                                                getselectspan.appendChild(createmothertongueselect);

                                                var callcreatemothertongueselect=document.getElementById("mothertongueselectid");
                                                callcreatemothertongueselect.style.width="200px";
                                                callcreatemothertongueselect.style.height="36px";
                                                callcreatemothertongueselect.style.cursor="pointer";
                                                callcreatemothertongueselect.style.outline="none";
                                                callcreatemothertongueselect.style.paddingLeft="20px";
                                                callcreatemothertongueselect.style.fontSize="15px";
                                                callcreatemothertongueselect.style.border="2px solid #40AEDE";

                                                }

                                                if(checkmothertonguevisit==0){
                                                var getlist=document.getElementById("list23").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createmothertongueselect=document.createElement("select");
                                                createmothertongueselect.setAttribute("id","mothertongueselectid");
                                                createmothertongueselect.setAttribute("name","search");

                                                getselectspan.appendChild(createmothertongueselect);

                                                var callcreatemothertongueselect=document.getElementById("mothertongueselectid");
                                                callcreatemothertongueselect.style.width="200px";
                                                callcreatemothertongueselect.style.height="36px";
                                                callcreatemothertongueselect.style.cursor="pointer";
                                                callcreatemothertongueselect.style.outline="none";
                                                callcreatemothertongueselect.style.paddingLeft="20px";
                                                callcreatemothertongueselect.style.fontSize="15px";
                                                callcreatemothertongueselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($mothertongueoptions=1;$mothertongueoptions<13;$mothertongueoptions++){ ?>
                                                    var createmothertongueoption<?php echo $mothertongueoptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createmothertongueoption1.innerHTML="";
                                                createmothertongueoption2.innerHTML="Arabic";
                                                createmothertongueoption3.innerHTML="Bikolano";
                                                createmothertongueoption4.innerHTML="Cebuano";
                                                createmothertongueoption5.innerHTML="Hiligaynon";
                                                createmothertongueoption6.innerHTML="Ilocano";
                                                createmothertongueoption7.innerHTML="Kapampangan";
                                                createmothertongueoption8.innerHTML="Karaya";
                                                createmothertongueoption9.innerHTML="Pangasinan";
                                                createmothertongueoption10.innerHTML="Tagalog";
                                                createmothertongueoption11.innerHTML="Waray";
                                                createmothertongueoption12.innerHTML="Foreign";

                                                


                                                //append options
                                                <?php for($mothertongueoptionsappend=1;$mothertongueoptionsappend<13;$mothertongueoptionsappend++){ ?>
                                                    callcreatemothertongueselect.appendChild(createmothertongueoption<?php echo $mothertongueoptionsappend ?>);
                                                <?php } ?> 

                                                checkmothertonguevisit=1;
                                                }
                                            }
                                        }

                                        if(getsearchby1=="House Type"){
                                            
                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            var getsearch=document.getElementById("search");
                                            getsearch.setAttribute("name","search");
                                            getsearch.style.display="inline-block";
                                            getsearch.setAttribute("type","text");
                                            getsearch.style.paddingRight="40px";

                                        var getlist=document.getElementById("list24").value;
                                        var getsearchby=document.getElementById("searchby");

                                        getsearchby.setAttribute("value",getlist);
                                        }

                                        if(getsearchby1=="Sanitary Toilet"){

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","search");
                                                getsantoiletselectid.style.display="inline-block";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","search");
                                                getsantoiletselectid.style.display="inline-block";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==0 || checksantoiletvisit==1){
                                                if(checksantoiletvisit==1){
                                                    var getlist=document.getElementById("list25").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createsantoiletselect=document.createElement("select");
                                                createsantoiletselect.setAttribute("id","santoiletselectid");
                                                createsantoiletselect.setAttribute("name","search");
                                                createsantoiletselect.style.display="none";

                                                getselectspan.appendChild(createsantoiletselect);

                                                var callcreatesantoiletselect=document.getElementById("santoiletselectid");
                                                callcreatesantoiletselect.style.width="270px";
                                                callcreatesantoiletselect.style.height="36px";
                                                callcreatesantoiletselect.style.cursor="pointer";
                                                callcreatesantoiletselect.style.outline="none";
                                                callcreatesantoiletselect.style.paddingLeft="20px";
                                                callcreatesantoiletselect.style.fontSize="15px";
                                                callcreatesantoiletselect.style.border="2px solid #40AEDE";

                                                }

                                                if(checksantoiletvisit==0){
                                                var getlist=document.getElementById("list25").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createsantoiletselect=document.createElement("select");
                                                createsantoiletselect.setAttribute("id","santoiletselectid");
                                                createsantoiletselect.setAttribute("name","search");

                                                getselectspan.appendChild(createsantoiletselect);

                                                var callcreatesantoiletselect=document.getElementById("santoiletselectid");
                                                callcreatesantoiletselect.style.width="270px";
                                                callcreatesantoiletselect.style.height="36px";
                                                callcreatesantoiletselect.style.cursor="pointer";
                                                callcreatesantoiletselect.style.outline="none";
                                                callcreatesantoiletselect.style.paddingLeft="20px";
                                                callcreatesantoiletselect.style.fontSize="15px";
                                                callcreatesantoiletselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($santoiletoptions=1;$santoiletoptions<5;$santoiletoptions++){ ?>
                                                    var createsantoiletoption<?php echo $santoiletoptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createsantoiletoption1.innerHTML="";
                                                createsantoiletoption2.innerHTML="Water sealed, sewer septic Tank";
                                                createsantoiletoption3.innerHTML="Closed pit";
                                                createsantoiletoption4.innerHTML="Open pit";

                                                //append options
                                                <?php for($santoiletoptionsappend=1;$santoiletoptionsappend<5;$santoiletoptionsappend++){ ?>
                                                    callcreatesantoiletselect.appendChild(createsantoiletoption<?php echo $santoiletoptionsappend ?>);
                                                <?php } ?> 

                                                checksantoiletvisit=1;
                                                }
                                            }

                                        }

                                        if(getsearchby1=="Immunization"){
                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","search");
                                                getimmunizationselectid.style.display="inline-block";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==0 || checkimmunizationvisit==1){
                                                if(checkimmunizationvisit==1){
                                                    var getlist=document.getElementById("list26").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createimmunizationselect=document.createElement("select");
                                                createimmunizationselect.setAttribute("id","immunizationselectid");
                                                createimmunizationselect.setAttribute("name","search");
                                                createimmunizationselect.style.display="none";

                                                getselectspan.appendChild(createimmunizationselect);

                                                var callcreateimmunizationselect=document.getElementById("immunizationselectid");
                                                callcreateimmunizationselect.style.width="200px";
                                                callcreateimmunizationselect.style.height="36px";
                                                callcreateimmunizationselect.style.cursor="pointer";
                                                callcreateimmunizationselect.style.outline="none";
                                                callcreateimmunizationselect.style.paddingLeft="20px";
                                                callcreateimmunizationselect.style.fontSize="15px";
                                                callcreateimmunizationselect.style.border="2px solid #40AEDE";

                                                }

                                                if(checkimmunizationvisit==0){
                                                var getlist=document.getElementById("list26").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createimmunizationselect=document.createElement("select");
                                                createimmunizationselect.setAttribute("id","immunizationselectid");
                                                createimmunizationselect.setAttribute("name","search");

                                                getselectspan.appendChild(createimmunizationselect);

                                                var callcreateimmunizationselect=document.getElementById("immunizationselectid");
                                                callcreateimmunizationselect.style.width="200px";
                                                callcreateimmunizationselect.style.height="36px";
                                                callcreateimmunizationselect.style.cursor="pointer";
                                                callcreateimmunizationselect.style.outline="none";
                                                callcreateimmunizationselect.style.paddingLeft="20px";
                                                callcreateimmunizationselect.style.fontSize="15px";
                                                callcreateimmunizationselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($immunizationoptions=1;$immunizationoptions<5;$immunizationoptions++){ ?>
                                                    var createimmunizationoption<?php echo $immunizationoptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createimmunizationoption1.innerHTML="";
                                                createimmunizationoption2.innerHTML="Yes";
                                                createimmunizationoption3.innerHTML="No";
                                                createimmunizationoption4.innerHTML="N/A";
                                                


                                                //append options
                                                <?php for($immunizationoptionsappend=1;$immunizationoptionsappend<5;$immunizationoptionsappend++){ ?>
                                                    callcreateimmunizationselect.appendChild(createimmunizationoption<?php echo $immunizationoptionsappend ?>);
                                                <?php } ?> 

                                                checkimmunizationvisit=1;
                                                }
                                            }
                                        }

                                        if(getsearchby1=="WRA"){
                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","search");
                                                getwraselectid.style.display="inline-block";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            if(checkwravisit==0 || checkwravisit==1){
                                                if(checkwravisit==1){
                                                    var getlist=document.getElementById("list27").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createwraselect=document.createElement("select");
                                                createwraselect.setAttribute("id","wraselectid");
                                                createwraselect.setAttribute("name","search");
                                                createwraselect.style.display="none";

                                                getselectspan.appendChild(createwraselect);

                                                var callcreatewraselect=document.getElementById("wraselectid");
                                                callcreatewraselect.style.width="200px";
                                                callcreatewraselect.style.height="36px";
                                                callcreatewraselect.style.cursor="pointer";
                                                callcreatewraselect.style.outline="none";
                                                callcreatewraselect.style.paddingLeft="20px";
                                                callcreatewraselect.style.fontSize="15px";
                                                callcreatewraselect.style.border="2px solid #40AEDE";

                                                }

                                                if(checkwravisit==0){
                                                var getlist=document.getElementById("list27").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createwraselect=document.createElement("select");
                                                createwraselect.setAttribute("id","wraselectid");
                                                createwraselect.setAttribute("name","search");

                                                getselectspan.appendChild(createwraselect);

                                                var callcreatewraselect=document.getElementById("wraselectid");
                                                callcreatewraselect.style.width="200px";
                                                callcreatewraselect.style.height="36px";
                                                callcreatewraselect.style.cursor="pointer";
                                                callcreatewraselect.style.outline="none";
                                                callcreatewraselect.style.paddingLeft="20px";
                                                callcreatewraselect.style.fontSize="15px";
                                                callcreatewraselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($wraoptions=1;$wraoptions<5;$wraoptions++){ ?>
                                                    var createwraoption<?php echo $wraoptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createwraoption1.innerHTML="";
                                                createwraoption2.innerHTML="Yes";
                                                createwraoption3.innerHTML="No";
                                                createwraoption4.innerHTML="N/A";
                                                


                                                //append options
                                                <?php for($wraoptionsappend=1;$wraoptionsappend<5;$wraoptionsappend++){ ?>
                                                    callcreatewraselect.appendChild(createwraoption<?php echo $wraoptionsappend ?>);
                                                <?php } ?> 

                                                checkwravisit=1;
                                                }
                                            }
                                            
                                        }

                                        if(getsearchby1=="Garbage Disposal"){
                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            var getsearch=document.getElementById("search");
                                            getsearch.setAttribute("name","search");
                                            getsearch.style.display="inline-block";
                                            getsearch.setAttribute("type","text");
                                            getsearch.style.paddingRight="40px";

                                        var getlist=document.getElementById("list28").value;
                                        var getsearchby=document.getElementById("searchby");

                                        getsearchby.setAttribute("value",getlist);
                                        }

                                        if(getsearchby1=="Water Source"){

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            var getsearch=document.getElementById("search");
                                            getsearch.setAttribute("name","search");
                                            getsearch.style.display="inline-block";
                                            getsearch.setAttribute("type","text");
                                            getsearch.style.paddingRight="40px";

                                        var getlist=document.getElementById("list29").value;
                                        var getsearchby=document.getElementById("searchby");

                                        getsearchby.setAttribute("value",getlist);
                                        }

                                        if(getsearchby1=="Family Planning"){
                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","search");
                                                getfamilyplanselectid.style.display="inline-block";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==0 || checkfamilyplanvisit==1){
                                                if(checkfamilyplanvisit==1){
                                                    var getlist=document.getElementById("list30").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createfamilyplanselect=document.createElement("select");
                                                createfamilyplanselect.setAttribute("id","familyplanselectid");
                                                createfamilyplanselect.setAttribute("name","search");
                                                createfamilyplanselect.style.display="none";

                                                getselectspan.appendChild(createfamilyplanselect);

                                                var callcreatefamilyplanselect=document.getElementById("familyplanselectid");
                                                callcreatefamilyplanselect.style.width="200px";
                                                callcreatefamilyplanselect.style.height="36px";
                                                callcreatefamilyplanselect.style.cursor="pointer";
                                                callcreatefamilyplanselect.style.outline="none";
                                                callcreatefamilyplanselect.style.paddingLeft="20px";
                                                callcreatefamilyplanselect.style.fontSize="15px";
                                                callcreatefamilyplanselect.style.border="2px solid #40AEDE";

                                                }

                                                if(checkfamilyplanvisit==0){
                                                var getlist=document.getElementById("list30").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createfamilyplanselect=document.createElement("select");
                                                createfamilyplanselect.setAttribute("id","familyplanselectid");
                                                createfamilyplanselect.setAttribute("name","search");

                                                getselectspan.appendChild(createfamilyplanselect);

                                                var callcreatefamilyplanselect=document.getElementById("familyplanselectid");
                                                callcreatefamilyplanselect.style.width="200px";
                                                callcreatefamilyplanselect.style.height="36px";
                                                callcreatefamilyplanselect.style.cursor="pointer";
                                                callcreatefamilyplanselect.style.outline="none";
                                                callcreatefamilyplanselect.style.paddingLeft="20px";
                                                callcreatefamilyplanselect.style.fontSize="15px";
                                                callcreatefamilyplanselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($familyplanoptions=1;$familyplanoptions<5;$familyplanoptions++){ ?>
                                                    var createfamilyplanoption<?php echo $familyplanoptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createfamilyplanoption1.innerHTML="";
                                                createfamilyplanoption2.innerHTML="Yes";
                                                createfamilyplanoption3.innerHTML="No";
                                                createfamilyplanoption4.innerHTML="N/A";
                                                


                                                //append options
                                                <?php for($familyplanoptionsappend=1;$familyplanoptionsappend<5;$familyplanoptionsappend++){ ?>
                                                    callcreatefamilyplanselect.appendChild(createfamilyplanoption<?php echo $familyplanoptionsappend ?>);
                                                <?php } ?> 

                                                checkfamilyplanvisit=1;
                                                }
                                            }
                                        }

                                        if(getsearchby1=="Background Gardening"){
                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","search");
                                                getbgroundselectid.style.display="inline-block";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==0 || checkbgroundvisit==1){
                                                if(checkbgroundvisit==1){
                                                    var getlist=document.getElementById("list31").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createbgroundselect=document.createElement("select");
                                                createbgroundselect.setAttribute("id","bgroundselectid");
                                                createbgroundselect.setAttribute("name","search");
                                                createbgroundselect.style.display="none";

                                                getselectspan.appendChild(createbgroundselect);

                                                var callcreatebgroundselect=document.getElementById("bgroundselectid");
                                                callcreatebgroundselect.style.width="200px";
                                                callcreatebgroundselect.style.height="36px";
                                                callcreatebgroundselect.style.cursor="pointer";
                                                callcreatebgroundselect.style.outline="none";
                                                callcreatebgroundselect.style.paddingLeft="20px";
                                                callcreatebgroundselect.style.fontSize="15px";
                                                callcreatebgroundselect.style.border="2px solid #40AEDE";

                                                }

                                                if(checkbgroundvisit==0){
                                                var getlist=document.getElementById("list31").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createbgroundselect=document.createElement("select");
                                                createbgroundselect.setAttribute("id","bgroundselectid");
                                                createbgroundselect.setAttribute("name","search");

                                                getselectspan.appendChild(createbgroundselect);

                                                var callcreatebgroundselect=document.getElementById("bgroundselectid");
                                                callcreatebgroundselect.style.width="200px";
                                                callcreatebgroundselect.style.height="36px";
                                                callcreatebgroundselect.style.cursor="pointer";
                                                callcreatebgroundselect.style.outline="none";
                                                callcreatebgroundselect.style.paddingLeft="20px";
                                                callcreatebgroundselect.style.fontSize="15px";
                                                callcreatebgroundselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($bgroundoptions=1;$bgroundoptions<5;$bgroundoptions++){ ?>
                                                    var createbgroundoption<?php echo $bgroundoptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createbgroundoption1.innerHTML="";
                                                createbgroundoption2.innerHTML="Yes";
                                                createbgroundoption3.innerHTML="No";
                                                createbgroundoption4.innerHTML="N/A";
                                                

                                                //append options
                                                <?php for($bgroundoptionsappend=1;$bgroundoptionsappend<5;$bgroundoptionsappend++){ ?>
                                                    callcreatebgroundselect.appendChild(createbgroundoption<?php echo $bgroundoptionsappend ?>);
                                                <?php } ?> 

                                                checkbgroundvisit=1;
                                                }
                                            }
                                        }

                                        if(getsearchby1=="Livelihood Status"){
                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            } 
                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            var getsearch=document.getElementById("search");
                                            getsearch.setAttribute("name","search");
                                            getsearch.style.display="inline-block";
                                            getsearch.setAttribute("type","text");
                                            getsearch.style.paddingRight="40px";

                                        var getlist=document.getElementById("list32").value;
                                        var getsearchby=document.getElementById("searchby");

                                        getsearchby.setAttribute("value",getlist);
                                        }

                                        if(getsearchby1=="Animals/Pet"){
                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }
                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","search");
                                                getanimalselectid.style.display="inline-block";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==0 || checkanimalvisit==1){
                                                if(checkanimalvisit==1){
                                                    var getlist=document.getElementById("list33").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createanimalselect=document.createElement("select");
                                                createanimalselect.setAttribute("id","animalselectid");
                                                createanimalselect.setAttribute("name","search");
                                                createanimalselect.style.display="none";

                                                getselectspan.appendChild(createanimalselect);

                                                var callcreateanimalselect=document.getElementById("animalselectid");
                                                callcreateanimalselect.style.width="200px";
                                                callcreateanimalselect.style.height="36px";
                                                callcreateanimalselect.style.cursor="pointer";
                                                callcreateanimalselect.style.outline="none";
                                                callcreateanimalselect.style.paddingLeft="20px";
                                                callcreateanimalselect.style.fontSize="15px";
                                                callcreateanimalselect.style.border="2px solid #40AEDE";

                                                }

                                                if(checkanimalvisit==0){
                                                var getlist=document.getElementById("list33").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createanimalselect=document.createElement("select");
                                                createanimalselect.setAttribute("id","animalselectid");
                                                createanimalselect.setAttribute("name","search");

                                                getselectspan.appendChild(createanimalselect);

                                                var callcreateanimalselect=document.getElementById("animalselectid");
                                                callcreateanimalselect.style.width="200px";
                                                callcreateanimalselect.style.height="36px";
                                                callcreateanimalselect.style.cursor="pointer";
                                                callcreateanimalselect.style.outline="none";
                                                callcreateanimalselect.style.paddingLeft="20px";
                                                callcreateanimalselect.style.fontSize="15px";
                                                callcreateanimalselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($animaloptions=1;$animaloptions<5;$animaloptions++){ ?>
                                                    var createanimaloption<?php echo $animaloptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createanimaloption1.innerHTML="";
                                                createanimaloption2.innerHTML="Yes";
                                                createanimaloption3.innerHTML="No";
                                                createanimaloption4.innerHTML="N/A";
                                                


                                                //append options
                                                <?php for($animaloptionsappend=1;$animaloptionsappend<5;$animaloptionsappend++){ ?>
                                                    callcreateanimalselect.appendChild(createanimaloption<?php echo $animaloptionsappend ?>);
                                                <?php } ?> 

                                                checkanimalvisit=1;
                                                }
                                            }
                                        }


                                        if(getsearchby1=="Communication"){

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            var getsearch=document.getElementById("search");
                                            getsearch.setAttribute("name","search");
                                            getsearch.style.display="inline-block";
                                            getsearch.setAttribute("type","text");
                                            getsearch.style.paddingRight="40px";

                                        var getlist=document.getElementById("list35").value;
                                        var getsearchby=document.getElementById("searchby");

                                        getsearchby.setAttribute("value",getlist);
                                        }

                                        if(getsearchby1=="Home Status"){

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            var getsearch=document.getElementById("search");
                                            getsearch.setAttribute("name","search");
                                            getsearch.style.display="inline-block";
                                            getsearch.setAttribute("type","text");
                                            getsearch.style.paddingRight="40px";

                                        var getlist=document.getElementById("list36").value;
                                        var getsearchby=document.getElementById("searchby");

                                        getsearchby.setAttribute("value",getlist);

                                        }

                                        if(getsearchby1=="Energy Source"){

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            var getsearch=document.getElementById("search");
                                            getsearch.setAttribute("name","search");
                                            getsearch.style.display="inline-block";
                                            getsearch.setAttribute("type","text");
                                            getsearch.style.paddingRight="40px";

                                        var getlist=document.getElementById("list37").value;
                                        var getsearchby=document.getElementById("searchby");

                                        getsearchby.setAttribute("value",getlist);
                                        }

                                        if(getsearchby1=="Blind Drainage"){
                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","search");
                                                getblinddrainselectid.style.display="inline-block";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==0 || checkblinddrainvisit==1){
                                                if(checkblinddrainvisit==1){
                                                    var getlist=document.getElementById("list34").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createblinddrainselect=document.createElement("select");
                                                createblinddrainselect.setAttribute("id","blinddrainselectid");
                                                createblinddrainselect.setAttribute("name","search");
                                                createblinddrainselect.style.display="none";

                                                getselectspan.appendChild(createblinddrainselect);

                                                var callcreateblinddrainselect=document.getElementById("blinddrainselectid");
                                                callcreateblinddrainselect.style.width="200px";
                                                callcreateblinddrainselect.style.height="36px";
                                                callcreateblinddrainselect.style.cursor="pointer";
                                                callcreateblinddrainselect.style.outline="none";
                                                callcreateblinddrainselect.style.paddingLeft="20px";
                                                callcreateblinddrainselect.style.fontSize="15px";
                                                callcreateblinddrainselect.style.border="2px solid #40AEDE";

                                                }

                                                if(checkblinddrainvisit==0){
                                                var getlist=document.getElementById("list34").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createblinddrainselect=document.createElement("select");
                                                createblinddrainselect.setAttribute("id","blinddrainselectid");
                                                createblinddrainselect.setAttribute("name","search");

                                                getselectspan.appendChild(createblinddrainselect);

                                                var callcreateblinddrainselect=document.getElementById("blinddrainselectid");
                                                callcreateblinddrainselect.style.width="200px";
                                                callcreateblinddrainselect.style.height="36px";
                                                callcreateblinddrainselect.style.cursor="pointer";
                                                callcreateblinddrainselect.style.outline="none";
                                                callcreateblinddrainselect.style.paddingLeft="20px";
                                                callcreateblinddrainselect.style.fontSize="15px";
                                                callcreateblinddrainselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($blinddrainoptions=1;$blinddrainoptions<5;$blinddrainoptions++){ ?>
                                                    var createblinddrainoption<?php echo $blinddrainoptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createblinddrainoption1.innerHTML="";
                                                createblinddrainoption2.innerHTML="Yes";
                                                createblinddrainoption3.innerHTML="No";
                                                createblinddrainoption4.innerHTML="N/A";
                                                


                                                //append options
                                                <?php for($blinddrainoptionsappend=1;$blinddrainoptionsappend<5;$blinddrainoptionsappend++){ ?>
                                                    callcreateblinddrainselect.appendChild(createblinddrainoption<?php echo $blinddrainoptionsappend ?>);
                                                <?php } ?> 

                                                checkblinddrainvisit=1;
                                                }
                                            }
                                        }
                                        
                                        if(getsearchby1=="Direct Waste to Water Bodies"){
                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","search");
                                                getdwtwbdselectid.style.display="inline-block";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==0 || checkdwtwbdvisit==1){
                                                if(checkdwtwbdvisit==1){
                                                    var getlist=document.getElementById("list38").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createdwtwbdselect=document.createElement("select");
                                                createdwtwbdselect.setAttribute("id","dwtwbdselectid");
                                                createdwtwbdselect.setAttribute("name","search");
                                                createdwtwbdselect.style.display="none";

                                                getselectspan.appendChild(createdwtwbdselect);

                                                var callcreatedwtwbdselect=document.getElementById("dwtwbdselectid");
                                                callcreatedwtwbdselect.style.width="200px";
                                                callcreatedwtwbdselect.style.height="36px";
                                                callcreatedwtwbdselect.style.cursor="pointer";
                                                callcreatedwtwbdselect.style.outline="none";
                                                callcreatedwtwbdselect.style.paddingLeft="20px";
                                                callcreatedwtwbdselect.style.fontSize="15px";
                                                callcreatedwtwbdselect.style.border="2px solid #40AEDE";

                                                }

                                                if(checkdwtwbdvisit==0){
                                                var getlist=document.getElementById("list38").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createdwtwbdselect=document.createElement("select");
                                                createdwtwbdselect.setAttribute("id","dwtwbdselectid");
                                                createdwtwbdselect.setAttribute("name","search");

                                                getselectspan.appendChild(createdwtwbdselect);

                                                var callcreatedwtwbdselect=document.getElementById("dwtwbdselectid");
                                                callcreatedwtwbdselect.style.width="200px";
                                                callcreatedwtwbdselect.style.height="36px";
                                                callcreatedwtwbdselect.style.cursor="pointer";
                                                callcreatedwtwbdselect.style.outline="none";
                                                callcreatedwtwbdselect.style.paddingLeft="20px";
                                                callcreatedwtwbdselect.style.fontSize="15px";
                                                callcreatedwtwbdselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($dwtwbdoptions=1;$dwtwbdoptions<5;$dwtwbdoptions++){ ?>
                                                    var createdwtwbdoption<?php echo $dwtwbdoptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createdwtwbdoption1.innerHTML="";
                                                createdwtwbdoption2.innerHTML="Yes";
                                                createdwtwbdoption3.innerHTML="No";
                                                createdwtwbdoption4.innerHTML="N/A";
                                                


                                                //append options
                                                <?php for($dwtwbdoptionsappend=1;$dwtwbdoptionsappend<5;$dwtwbdoptionsappend++){ ?>
                                                    callcreatedwtwbdselect.appendChild(createdwtwbdoption<?php echo $dwtwbdoptionsappend ?>);
                                                <?php } ?> 

                                                checkdwtwbdvisit=1;
                                                }
                                            }
                                        }

                                        if(getsearchby1=="Vulnerable Status"){
                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            var getsearch=document.getElementById("search");
                                            getsearch.setAttribute("name","search");
                                            getsearch.style.display="inline-block";
                                            getsearch.setAttribute("type","text");
                                            getsearch.style.paddingRight="40px";

                                        var getlist=document.getElementById("list39").value;
                                        var getsearchby=document.getElementById("searchby");

                                        getsearchby.setAttribute("value",getlist);
                                        }

                                        if(getsearchby1=="Agricultural Facility"){
                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","search");
                                                getagrifacilselectid.style.display="inline-block";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==0 || checkagrifacilvisit==1){
                                                if(checkagrifacilvisit==1){
                                                    var getlist=document.getElementById("list40").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createagrifacilselect=document.createElement("select");
                                                createagrifacilselect.setAttribute("id","agrifacilselectid");
                                                createagrifacilselect.setAttribute("name","search");
                                                createagrifacilselect.style.display="none";

                                                getselectspan.appendChild(createagrifacilselect);

                                                var callcreateagrifacilselect=document.getElementById("agrifacilselectid");
                                                callcreateagrifacilselect.style.width="200px";
                                                callcreateagrifacilselect.style.height="36px";
                                                callcreateagrifacilselect.style.cursor="pointer";
                                                callcreateagrifacilselect.style.outline="none";
                                                callcreateagrifacilselect.style.paddingLeft="20px";
                                                callcreateagrifacilselect.style.fontSize="15px";
                                                callcreateagrifacilselect.style.border="2px solid #40AEDE";

                                                }

                                                if(checkagrifacilvisit==0){
                                                var getlist=document.getElementById("list40").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createagrifacilselect=document.createElement("select");
                                                createagrifacilselect.setAttribute("id","agrifacilselectid");
                                                createagrifacilselect.setAttribute("name","search");

                                                getselectspan.appendChild(createagrifacilselect);

                                                var callcreateagrifacilselect=document.getElementById("agrifacilselectid");
                                                callcreateagrifacilselect.style.width="200px";
                                                callcreateagrifacilselect.style.height="36px";
                                                callcreateagrifacilselect.style.cursor="pointer";
                                                callcreateagrifacilselect.style.outline="none";
                                                callcreateagrifacilselect.style.paddingLeft="20px";
                                                callcreateagrifacilselect.style.fontSize="15px";
                                                callcreateagrifacilselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($agrifaciloptions=1;$agrifaciloptions<5;$agrifaciloptions++){ ?>
                                                    var createagrifaciloption<?php echo $agrifaciloptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createagrifaciloption1.innerHTML="";
                                                createagrifaciloption2.innerHTML="Yes";
                                                createagrifaciloption3.innerHTML="No";
                                                createagrifaciloption4.innerHTML="N/A";
                                                


                                                //append options
                                                <?php for($agrifaciloptionsappend=1;$agrifaciloptionsappend<5;$agrifaciloptionsappend++){ ?>
                                                    callcreateagrifacilselect.appendChild(createagrifaciloption<?php echo $agrifaciloptionsappend ?>);
                                                <?php } ?> 

                                                checkagrifacilvisit=1;
                                                }
                                            }
                                        }

                                        if(getsearchby1=="Other Source of Income"){

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            var getsearch=document.getElementById("search");
                                            getsearch.setAttribute("name","search");
                                            getsearch.style.display="inline-block";
                                            getsearch.setAttribute("type","text");
                                            getsearch.style.paddingRight="40px";

                                        var getlist=document.getElementById("list41").value;
                                        var getsearchby=document.getElementById("searchby");

                                        getsearchby.setAttribute("value",getlist);
                                        }

                                        if(getsearchby1=="House Status"){
                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","search");
                                                gethousestatselectid.style.display="inline-block";
                                            }

                                            if(checkhousestatvisit==0 || checkhousestatvisit==1){
                                                if(checkhousestatvisit==1){
                                                    var getlist=document.getElementById("list42").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createhousestatselect=document.createElement("select");
                                                createhousestatselect.setAttribute("id","housestatselectid");
                                                createhousestatselect.setAttribute("name","search");
                                                createhousestatselect.style.display="none";

                                                getselectspan.appendChild(createhousestatselect);

                                                var callcreatehousestatselect=document.getElementById("housestatselectid");
                                                callcreatehousestatselect.style.width="250px";
                                                callcreatehousestatselect.style.height="36px";
                                                callcreatehousestatselect.style.cursor="pointer";
                                                callcreatehousestatselect.style.outline="none";
                                                callcreatehousestatselect.style.paddingLeft="20px";
                                                callcreatehousestatselect.style.fontSize="15px";
                                                callcreatehousestatselect.style.border="2px solid #40AEDE";

                                                }

                                                if(checkhousestatvisit==0){
                                                var getlist=document.getElementById("list42").value;
                                                var getsearchby=document.getElementById("searchby");

                                                getsearchby.setAttribute("value",getlist);

                                                var getsearch=document.getElementById("search");
                                                getsearch.style.display="none";
                                                getsearch.setAttribute("name","searchhidden");

                                                var getselectspan=document.getElementById("selectspan");
                                                var createhousestatselect=document.createElement("select");
                                                createhousestatselect.setAttribute("id","housestatselectid");
                                                createhousestatselect.setAttribute("name","search");

                                                getselectspan.appendChild(createhousestatselect);

                                                var callcreatehousestatselect=document.getElementById("housestatselectid");
                                                callcreatehousestatselect.style.width="250px";
                                                callcreatehousestatselect.style.height="36px";
                                                callcreatehousestatselect.style.cursor="pointer";
                                                callcreatehousestatselect.style.outline="none";
                                                callcreatehousestatselect.style.paddingLeft="20px";
                                                callcreatehousestatselect.style.fontSize="15px";
                                                callcreatehousestatselect.style.border="2px solid #40AEDE";

                                                //creating options
                                                <?php for($housestatoptions=1;$housestatoptions<5;$housestatoptions++){ ?>
                                                    var createhousestatoption<?php echo $housestatoptions ?> = document.createElement("option");
                                                <?php } ?> 
                                            
                                                createhousestatoption1.innerHTML="";
                                                createhousestatoption2.innerHTML="Own";
                                                createhousestatoption3.innerHTML="Not Own / Living For Free";
                                                createhousestatoption4.innerHTML="Rent";
                                                


                                                //append options
                                                <?php for($housestatoptionsappend=1;$housestatoptionsappend<5;$housestatoptionsappend++){ ?>
                                                    callcreatehousestatselect.appendChild(createhousestatoption<?php echo $housestatoptionsappend ?>);
                                                <?php } ?> 

                                                checkhousestatvisit=1;
                                                }
                                            }
                                        }

                                        if(getsearchby1=="Transportation"){

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            var getsearch=document.getElementById("search");
                                            getsearch.setAttribute("name","search");
                                            getsearch.style.display="inline-block";
                                            getsearch.setAttribute("type","text");
                                            getsearch.style.paddingRight="40px";

                                        var getlist=document.getElementById("list43").value;
                                        var getsearchby=document.getElementById("searchby");

                                        getsearchby.setAttribute("value",getlist);
                                        }

                                        if(getsearchby1=="Product"){

                                            if(checkdependencyvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checkfourpsvisit==1){
                                                var getdependencyselectid=document.getElementById("dependencyselectid");
                                                getdependencyselectid.setAttribute("name","searchhidden");
                                                getdependencyselectid.style.display="none";
                                            }

                                            if(checksexvisit==1){
                                                var getsexselectid=document.getElementById("sexselectid");
                                                getsexselectid.setAttribute("name","searchhidden");
                                                getsexselectid.style.display="none";
                                            }

                                            if(checkpurokvisit==1){
                                                var getpurokselectid=document.getElementById("purokselectid");
                                                getpurokselectid.setAttribute("name","searchhidden");
                                                getpurokselectid.style.display="none";
                                            }

                                            if(checkrelationvisit==1){
                                                var getrelationselectid=document.getElementById("relationselectid");
                                                getrelationselectid.setAttribute("name","searchhidden");
                                                getrelationselectid.style.display="none";
                                            }

                                            if(checktribevisit==1){
                                                var gettribeselectid=document.getElementById("tribeselectid");
                                                gettribeselectid.setAttribute("name","searchhidden");
                                                gettribeselectid.style.display="none";
                                            }

                                            if(checkreligionvisit==1){
                                                var getreligionselectid=document.getElementById("religionselectid");
                                                getreligionselectid.setAttribute("name","searchhidden");
                                                getreligionselectid.style.display="none";
                                            }

                                            if(checkeducationvisit==1){
                                                var geteducationselectid=document.getElementById("educationselectid");
                                                geteducationselectid.setAttribute("name","searchhidden");
                                                geteducationselectid.style.display="none";
                                            }

                                            if(checksantoiletvisit==1){
                                                var getsantoiletselectid=document.getElementById("santoiletselectid");
                                                getsantoiletselectid.setAttribute("name","searchhidden");
                                                getsantoiletselectid.style.display="none";
                                            }

                                            if(checkpwdvisit==1){
                                                var getpwdselectid=document.getElementById("pwdselectid");
                                                getpwdselectid.setAttribute("name","searchhidden");
                                                getpwdselectid.style.display="none";
                                            }

                                            if(checkipvisit==1){
                                                var getipselectid=document.getElementById("ipselectid");
                                                getipselectid.setAttribute("name","searchhidden");
                                                getipselectid.style.display="none";
                                            }

                                            if(checkphilhealthvisit==1){
                                                var getphilhealthselectid=document.getElementById("philhealthselectid");
                                                getphilhealthselectid.setAttribute("name","searchhidden");
                                                getphilhealthselectid.style.display="none";
                                            }

                                            if(checkbreastfeedvisit==1){
                                                var getbreastfeedselectid=document.getElementById("breastfeedselectid");
                                                getbreastfeedselectid.setAttribute("name","searchhidden");
                                                getbreastfeedselectid.style.display="none";
                                            }

                                            if(checkntpvisit==1){
                                                var getntpselectid=document.getElementById("ntpselectid");
                                                getntpselectid.setAttribute("name","searchhidden");
                                                getntpselectid.style.display="none";
                                            }

                                            if(checksmookingvisit==1){
                                                var getsmookingselectid=document.getElementById("smookingselectid");
                                                getsmookingselectid.setAttribute("name","searchhidden");
                                                getsmookingselectid.style.display="none";
                                            }

                                            if(checkmothertonguevisit==1){
                                                var getmothertongueselectid=document.getElementById("mothertongueselectid");
                                                getmothertongueselectid.setAttribute("name","searchhidden");
                                                getmothertongueselectid.style.display="none";
                                            }

                                            if(checkhousetypevisit==1){
                                                var gethousetypeselectid=document.getElementById("housetypeselectid");
                                                gethousetypeselectid.setAttribute("name","searchhidden");
                                                gethousetypeselectid.style.display="none";
                                            }

                                            if(checkimmunizationvisit==1){
                                                var getimmunizationselectid=document.getElementById("immunizationselectid");
                                                getimmunizationselectid.setAttribute("name","searchhidden");
                                                getimmunizationselectid.style.display="none";
                                            }

                                            if(checkwravisit==1){
                                                var getwraselectid=document.getElementById("wraselectid");
                                                getwraselectid.setAttribute("name","searchhidden");
                                                getwraselectid.style.display="none";
                                            }

                                            if(checkgarbdisposalvisit==1){
                                                var getgarbdisposalselectid=document.getElementById("garbdisposalselectid");
                                                getgarbdisposalselectid.setAttribute("name","searchhidden");
                                                getgarbdisposalselectid.style.display="none";
                                            }

                                            if(checkfamilyplanvisit==1){
                                                var getfamilyplanselectid=document.getElementById("familyplanselectid");
                                                getfamilyplanselectid.setAttribute("name","searchhidden");
                                                getfamilyplanselectid.style.display="none";
                                            }

                                            if(checkbgroundvisit==1){
                                                var getbgroundselectid=document.getElementById("bgroundselectid");
                                                getbgroundselectid.setAttribute("name","searchhidden");
                                                getbgroundselectid.style.display="none";
                                            }

                                            if(checklivestatvisit==1){
                                                var getlivestatselectid=document.getElementById("livestatselectid");
                                                getlivestatselectid.setAttribute("name","searchhidden");
                                                getlivestatselectid.style.display="none";
                                            }

                                            if(checkanimalvisit==1){
                                                var getanimalselectid=document.getElementById("animalselectid");
                                                getanimalselectid.setAttribute("name","searchhidden");
                                                getanimalselectid.style.display="none";
                                            }

                                            if(checkblinddrainvisit==1){
                                                var getblinddrainselectid=document.getElementById("blinddrainselectid");
                                                getblinddrainselectid.setAttribute("name","searchhidden");
                                                getblinddrainselectid.style.display="none";
                                            }

                                            if(checkhomestatvisit==1){
                                                var gethomestatselectid=document.getElementById("homestatselectid");
                                                gethomestatselectid.setAttribute("name","searchhidden");
                                                gethomestatselectid.style.display="none";
                                            }

                                            if(checkdwtwbdvisit==1){
                                                var getdwtwbdselectid=document.getElementById("dwtwbdselectid");
                                                getdwtwbdselectid.setAttribute("name","searchhidden");
                                                getdwtwbdselectid.style.display="none";
                                            }

                                            if(checkvulstatvisit==1){
                                                var getvulstatselectid=document.getElementById("vulstatselectid");
                                                getvulstatselectid.setAttribute("name","searchhidden");
                                                getvulstatselectid.style.display="none";
                                            }

                                            if(checkagrifacilvisit==1){
                                                var getagrifacilselectid=document.getElementById("agrifacilselectid");
                                                getagrifacilselectid.setAttribute("name","searchhidden");
                                                getagrifacilselectid.style.display="none";
                                            }

                                            if(checkhousestatvisit==1){
                                                var gethousestatselectid=document.getElementById("housestatselectid");
                                                gethousestatselectid.setAttribute("name","searchhidden");
                                                gethousestatselectid.style.display="none";
                                            }

                                            var getsearch=document.getElementById("search");
                                            getsearch.setAttribute("name","search");
                                            getsearch.style.display="inline-block";
                                            getsearch.setAttribute("type","text");
                                            getsearch.style.paddingRight="40px";
                                            
                                        var getlist=document.getElementById("list44").value;
                                        var getsearchby=document.getElementById("searchby");

                                        getsearchby.setAttribute("value",getlist);
                                        }
                                    }
                            </script>
                            
                            <button type="submit" name="submit" style="height:35px;width:100px;cursor:pointer;background:#40AEDE;border:1px solid whitesmoke;border-radius:5px;color:white" class="input_btn"><i class="fas fa-search" style="margin-right:5px"></i>Search</button>
                            
                        </form>
                    </div>

                    <div class="result-div">
                        <?php include_once('condition.php'); 
                         ?>
                    </div>
                </div>
            </div>
  
            
        </div>
           
        <script src="hamburger-btn-toggle.js"></script>
        <script src="button-click.js"></script>
        
    </body>

</html>