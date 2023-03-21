
                ?>
                
                <script>
                    var disabledchecker=0;
                </script>
                
                
                <p style="font-size:17px;margin-bottom:10px;margin-top:60px"><b>Other Informations</b></p>
                <input type="hidden" id="headmemberid" name="headmemberid" value="<?php echo $rowshowheadinfo['id'] ?>"/>  
                
                <div class="background-info-div">
                <input type="hidden" id="inputheaddependency" value="<?php echo $rowshowheadinfo['dependency'] ?>"/>  
                <label style="display:block;transform:translateY(0.3em);margin-bottom:8px;padding-left:10px">Dependency</label>
                <select name="headdependency" disabled id="headdependency" style="cursor:not-allowed;font-size:15px;outline:none;border:1px solid gray;width:250px;height:40px;border-radius:5px;padding-left:10px;">
                        <option id="headdependency1" value=""></option>
                        <option id="headdependency3" value="Dependent">Dependent</option>
                        <option id="headdependency2" value="Independent">Independent</option>
                </select>
                </div>
                    <script>
                        
                        var getinputheaddependency=document.getElementById("inputheaddependency").value;
                        var getheaddependency=document.getElementById("headdependency").value;

                                if(getinputheaddependency =="" && disabledchecker==0){
                                    var getheaddependencylist1=document.getElementById("headdependency1");
                                    var getheaddependencylist2=document.getElementById("headdependency2");
                                    var getheaddependencylist3=document.getElementById("headdependency3");

                                    getheaddependencylist1.setAttribute("selected","");
                                    getheaddependencylist2.removeAttribute("selected","");
                                    getheaddependencylist3.removeAttribute("selected","");
                                }

                                if(getinputheaddependency == "Independent" && disabledchecker==0){
                                    var getheaddependencylist1=document.getElementById("headdependency1");
                                    var getheaddependencylist2=document.getElementById("headdependency2");
                                    var getheaddependencylist3=document.getElementById("headdependency3");

                                    getheaddependencylist1.removeAttribute("selected","");
                                    getheaddependencylist2.setAttribute("selected","");
                                    getheaddependencylist3.removeAttribute("selected","");
                                }

                                if(getinputheaddependency =="Dependent" && disabledchecker==0){
                                    var getheaddependencylist1=document.getElementById("headdependency1");
                                    var getheaddependencylist2=document.getElementById("headdependency2");
                                    var getheaddependencylist3=document.getElementById("headdependency3");

                                    getheaddependencylist1.removeAttribute("selected","");
                                    getheaddependencylist2.removeAttribute("selected","");
                                    getheaddependencylist3.setAttribute("selected","");
                                }

                                if(getheaddependency =="" && disabledchecker==1){
                                    var getheaddependencylist1=document.getElementById("headdependency1");
                                    var getheaddependencylist2=document.getElementById("headdependency2");
                                    var getheaddependencylist3=document.getElementById("headdependency3");

                                    getheaddependencylist1.setAttribute("selected","");
                                    getheaddependencylist2.removeAttribute("selected","");
                                    getheaddependencylist3.removeAttribute("selected","");
                                }

                                if(getheaddependency == "Independent" && disabledchecker==1){
                                    var getheaddependencylist1=document.getElementById("headdependency1");
                                    var getheaddependencylist2=document.getElementById("headdependency2");
                                    var getheaddependencylist3=document.getElementById("headdependency3");

                                    getheaddependencylist1.removeAttribute("selected","");
                                    getheaddependencylist2.setAttribute("selected","");
                                    getheaddependencylist3.removeAttribute("selected","");
                                }

                                if(getheaddependency =="Dependent" && disabledchecker==1){
                                    var getheaddependencylist1=document.getElementById("headdependency1");
                                    var getheaddependencylist2=document.getElementById("headdependency2");
                                    var getheaddependencylist3=document.getElementById("headdependency3");

                                    getheaddependencylist1.removeAttribute("selected","");
                                    getheaddependencylist2.removeAttribute("selected","");
                                    getheaddependencylist3.setAttribute("selected","");
                                }
                    </script>
                
                <div class="background-info-div">
                <input type="hidden" id="inputheadtribe" value="<?php echo $rowshowheadinfo['tribe'] ?>"/>  
                <label style="display:block;transform:translateY(0.3em);margin-bottom:8px;padding-left:10px">Tribe</label>
                <select name="headtribe" disabled id="headtribe" style="cursor:not-allowed;font-size:15px;outline:none;border:1px solid gray;width:250px;height:40px;border-radius:5px;padding-left:10px;">
                        <option id="headtribe1" value=""></option>
                        <option id="headtribe2" value="Aeta">Aeta</option>
                        <option id="headtribe3" value="Ati">Ati</option>
                        <option id="headtribe4" value="Blaan">Blaan</option>
                        <option id="headtribe5" value="Badjao">Badjao</option>
                        <option id="headtribe6" value="Bagobo">Bagobo</option>
                        <option id="headtribe7" value="Bikolano">Bikolano</option>
                        <option id="headtribe8" value="Cebuano">Cebuano</option>
                        <option id="headtribe9" value="Igorot">Igorot</option>
                        <option id="headtribe10" value="Ilonggo">Ilonggo</option>
                        <option id="headtribe11" value="Ilokano">Ilokano</option>
                        <option id="headtribe12" value="Ivatan">Ivatan</option>
                        <option id="headtribe13" value="Kapampangan">Kapampangan</option>
                        <option id="headtribe14" value="Mangyan">Mangyan</option>
                        <option id="headtribe15" value="Maranao">Maranao</option>
                        <option id="headtribe16" value="Suludnon">Suludnon</option>
                        <option id="headtribe17" value="Tboli">Tboli</option>
                        <option id="headtribe18" value="Tagalog">Tagalog</option>
                        <option id="headtribe19" value="Tausug">Tausug</option>
                        <option id="headtribe20" value="Waray">Waray</option>
                        <option id="headtribe21" value="Yakan">Yakan</option>
                </select>
                </div>
                    <script>
                        
                        var getinputheadtribe=document.getElementById("inputheadtribe").value;
                        var getheadtribe=document.getElementById("headtribe").value;

                                if(getinputheadtribe =="" && disabledchecker==0){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.setAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                    
                                }

                                if(getinputheadtribe == "Aeta" && disabledchecker==0){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.setAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getinputheadtribe =="Ati" && disabledchecker==0){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.setAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getinputheadtribe =="Blaan" && disabledchecker==0){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.setAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getinputheadtribe == "Badjao" && disabledchecker==0){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.setAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getinputheadtribe =="Bagobo" && disabledchecker==0){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.setAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getinputheadtribe =="Bikolano" && disabledchecker==0){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.setAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getinputheadtribe == "Cebuano" && disabledchecker==0){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.setAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getinputheadtribe =="Igorot" && disabledchecker==0){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.setAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getinputheadtribe =="Ilonggo" && disabledchecker==0){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.setAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getinputheadtribe == "Ilokano" && disabledchecker==0){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.setAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getinputheadtribe =="Ivatan" && disabledchecker==0){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.setAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getinputheadtribe =="Kapampangan" && disabledchecker==0){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.setAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getinputheadtribe == "Mangyan" && disabledchecker==0){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.setAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getinputheadtribe =="Maranao" && disabledchecker==0){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.setAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getinputheadtribe =="Suludnon" && disabledchecker==0){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.setAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getinputheadtribe == "Tboli" && disabledchecker==0){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.setAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getinputheadtribe =="Tagalog" && disabledchecker==0){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.setAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getinputheadtribe =="Tausug" && disabledchecker==0){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.setAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getinputheadtribe == "Waray" && disabledchecker==0){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.setAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getinputheadtribe =="Yakan" && disabledchecker==0){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.setAttribute("selected","");
                                }

                                if(getheadtribe =="" && disabledchecker==1){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.setAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getheadtribe == "Aeta" && disabledchecker==1){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.setAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getheadtribe =="Ati" && disabledchecker==1){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.setAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getheadtribe =="Blaan" && disabledchecker==1){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.setAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getheadtribe == "Badjao" && disabledchecker==1){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.setAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getheadtribe =="Bagobo" && disabledchecker==1){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.setAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getheadtribe =="Bikolano" && disabledchecker==1){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.setAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getheadtribe == "Cebuano" && disabledchecker==1){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.setAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getheadtribe =="Igorot" && disabledchecker==1){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.setAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getheadtribe =="Ilonggo" && disabledchecker==1){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.setAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getheadtribe == "Ilokano" && disabledchecker==1){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.setAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getheadtribe =="Ivatan" && disabledchecker==1){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.setAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getheadtribe =="Kapampangan" && disabledchecker==1){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.setAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getheadtribe == "Mangyan" && disabledchecker==1){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.setAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getheadtribe =="Maranao" && disabledchecker==1){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.setAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getheadtribe =="Suludnon" && disabledchecker==1){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.setAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getheadtribe == "Tboli" && disabledchecker==1){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.setAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getheadtribe =="Tagalog" && disabledchecker==1){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.setAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getheadtribe =="Tausug" && disabledchecker==1){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.setAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getheadtribe == "Waray" && disabledchecker==1){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.setAttribute("selected","");
                                    getheadtribelist21.removeAttribute("selected","");
                                }

                                if(getheadtribe =="Yakan" && disabledchecker==1){
                                    var getheadtribelist1=document.getElementById("headtribe1");
                                    var getheadtribelist2=document.getElementById("headtribe2");
                                    var getheadtribelist3=document.getElementById("headtribe3");
                                    var getheadtribelist4=document.getElementById("headtribe4");
                                    var getheadtribelist5=document.getElementById("headtribe5");
                                    var getheadtribelist6=document.getElementById("headtribe6");
                                    var getheadtribelist7=document.getElementById("headtribe7");
                                    var getheadtribelist8=document.getElementById("headtribe8");
                                    var getheadtribelist9=document.getElementById("headtribe9");
                                    var getheadtribelist10=document.getElementById("headtribe10");
                                    var getheadtribelist11=document.getElementById("headtribe11");
                                    var getheadtribelist12=document.getElementById("headtribe12");
                                    var getheadtribelist13=document.getElementById("headtribe13");
                                    var getheadtribelist14=document.getElementById("headtribe14");
                                    var getheadtribelist15=document.getElementById("headtribe15");
                                    var getheadtribelist16=document.getElementById("headtribe16");
                                    var getheadtribelist17=document.getElementById("headtribe17");
                                    var getheadtribelist18=document.getElementById("headtribe18");
                                    var getheadtribelist19=document.getElementById("headtribe19");
                                    var getheadtribelist20=document.getElementById("headtribe20");
                                    var getheadtribelist21=document.getElementById("headtribe21");

                                    getheadtribelist1.removeAttribute("selected","");
                                    getheadtribelist2.removeAttribute("selected","");
                                    getheadtribelist3.removeAttribute("selected","");
                                    getheadtribelist4.removeAttribute("selected","");
                                    getheadtribelist5.removeAttribute("selected","");
                                    getheadtribelist6.removeAttribute("selected","");
                                    getheadtribelist7.removeAttribute("selected","");
                                    getheadtribelist8.removeAttribute("selected","");
                                    getheadtribelist9.removeAttribute("selected","");
                                    getheadtribelist10.removeAttribute("selected","");
                                    getheadtribelist11.removeAttribute("selected","");
                                    getheadtribelist12.removeAttribute("selected","");
                                    getheadtribelist13.removeAttribute("selected","");
                                    getheadtribelist14.removeAttribute("selected","");
                                    getheadtribelist15.removeAttribute("selected","");
                                    getheadtribelist16.removeAttribute("selected","");
                                    getheadtribelist17.removeAttribute("selected","");
                                    getheadtribelist18.removeAttribute("selected","");
                                    getheadtribelist19.removeAttribute("selected","");
                                    getheadtribelist20.removeAttribute("selected","");
                                    getheadtribelist21.setAttribute("selected","");
                                }
                    </script>

                <div class="background-info-div">
                <input type="hidden" id="inputheadsex" value="<?php echo $rowshowheadinfo['sex'] ?>"/>  
                <label style="display:block;transform:translateY(0.3em);margin-bottom:8px;padding-left:10px">Sex</label>
                <select name="headsex" disabled id="headsex" style="border-radius:5px;cursor:not-allowed;font-size:15px;font-weight:normal;outline:none;border:1px solid gray;width:250px;height:40px;padding-left:10px">
                        <option id="headsex1" value=""></option>
                        <option id="headsex2" value="Male">Male</option>
                        <option id="headsex3" value="Female">Female</option>
                </select>
                </div>
                    <script>
                        
                        var getinputheadsex=document.getElementById("inputheadsex").value;
                        var getheadsex=document.getElementById("headsex").value;

                                if(getinputheadsex =="" && disabledchecker==0){
                                    var getheadsexlist1=document.getElementById("headsex1");
                                    var getheadsexlist2=document.getElementById("headsex2");
                                    var getheadsexlist3=document.getElementById("headsex3");

                                    getheadsexlist1.setAttribute("selected","");
                                    getheadsexlist2.removeAttribute("selected","");
                                    getheadsexlist3.removeAttribute("selected","");
                                }

                                if(getinputheadsex == "Male" && disabledchecker==0){
                                    var getheadsexlist1=document.getElementById("headsex1");
                                    var getheadsexlist2=document.getElementById("headsex2");
                                    var getheadsexlist3=document.getElementById("headsex3");

                                    getheadsexlist1.removeAttribute("selected","");
                                    getheadsexlist2.setAttribute("selected","");
                                    getheadsexlist3.removeAttribute("selected","");
                                }

                                if(getinputheadsex =="Female" && disabledchecker==0){
                                    var getheadsexlist1=document.getElementById("headsex1");
                                    var getheadsexlist2=document.getElementById("headsex2");
                                    var getheadsexlist3=document.getElementById("headsex3");

                                    getheadsexlist1.removeAttribute("selected","");
                                    getheadsexlist2.removeAttribute("selected","");
                                    getheadsexlist3.setAttribute("selected","");
                                }

                                if(getheadsex =="" && disabledchecker==1){
                                    var getheadsexlist1=document.getElementById("headsex1");
                                    var getheadsexlist2=document.getElementById("headsex2");
                                    var getheadsexlist3=document.getElementById("headsex3");

                                    getheadsexlist1.setAttribute("selected","");
                                    getheadsexlist2.removeAttribute("selected","");
                                    getheadsexlist3.removeAttribute("selected","");
                                }

                                if(getheadsex == "Male" && disabledchecker==1){
                                    var getheadsexlist1=document.getElementById("headsex1");
                                    var getheadsexlist2=document.getElementById("headsex2");
                                    var getheadsexlist3=document.getElementById("headsex3");

                                    getheadsexlist1.removeAttribute("selected","");
                                    getheadsexlist2.setAttribute("selected","");
                                    getheadsexlist3.removeAttribute("selected","");
                                }

                                if(getheadsex =="Female" && disabledchecker==1){
                                    var getheadsexlist1=document.getElementById("headsex1");
                                    var getheadsexlist2=document.getElementById("headsex2");
                                    var getheadsexlist3=document.getElementById("headsex3");

                                    getheadsexlist1.removeAttribute("selected","");
                                    getheadsexlist2.removeAttribute("selected","");
                                    getheadsexlist3.setAttribute("selected","");
                                }
                    </script>

                <div class="background-info-div" >
                <label style="display:block;transform:translateY(0.3em);margin-bottom:8px;padding-left:10px">Birth Date</label>
                <input type="text" class="member-input"  disabled style="cursor:not-allowed;font-size:15px;outline:none;border:1px solid gray;width:240px;height:38px;border-radius:5px;padding-left:10px;" id="headbdate" name="headbdate" value="<?php echo $rowshowheadinfo['bdate'] ?>" placeholder=""/>
                </div>
                
                <div class="background-info-div">
                <label style="display:block;transform:translateY(0.3em);margin-bottom:8px;padding-left:10px">Age</label>
                <input type="text" class="member-input" style="cursor:not-allowed;font-size:15px;outline:none;border:1px solid gray;width:240px;height:38px;border-radius:5px;padding-left:10px;" disabled id="headage" name="headage" value="<?php echo $rowshowheadinfo['age'] ?>" placeholder=""/>
                </div>

                <div class="background-info-div">
                <input type="hidden" id="inputheadreligion" value="<?php echo $rowshowheadinfo['religion'] ?>"/>  
                <label style="display:block;transform:translateY(0.3em);margin-bottom:8px;padding-left:10px">Religion</label>
                <select name="headreligion" disabled id="headreligion" style="border-radius:5px;cursor:not-allowed;font-size:15px;font-weight:normal;outline:none;border:1px solid gray;width:250px;height:40px;padding-left:10px;">
                        <option id="headreligion1" value=""></option>
                        <option id="headreligion2" value="Aglipay">Aglipay</option>
                        <option id="headreligion3" value="Alliance">Alliance</option>
                        <option id="headreligion4" value="Baptists">Baptists</option>
                        <option id="headreligion5" value="Born Again">Born Again</option>
                        <option id="headreligion6" value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                        <option id="headreligion7" value="Islam">Islam</option>
                        <option id="headreligion8" value="Jehovahs Witness">Jehovahs Witness</option>
                        <option id="headreligion9" value="Protestant">Protestant</option>
                        <option id="headreligion10" value="Roman Catholic">Roman Catholic</option>
                        <option id="headreligion11" value="Seventh Day Adventist">Seventh Day Adventist</option>
                </select>
                </div>
                    <script>
                        
                        var getinputheadreligion=document.getElementById("inputheadreligion").value;
                        var getheadreligion=document.getElementById("headreligion").value;

                                if(getinputheadreligion =="" && disabledchecker==0){
                                    var getheadreligionlist1=document.getElementById("headreligion1");
                                    var getheadreligionlist2=document.getElementById("headreligion2");
                                    var getheadreligionlist3=document.getElementById("headreligion3");
                                    var getheadreligionlist4=document.getElementById("headreligion4");
                                    var getheadreligionlist5=document.getElementById("headreligion5");
                                    var getheadreligionlist6=document.getElementById("headreligion6");
                                    var getheadreligionlist7=document.getElementById("headreligion7");
                                    var getheadreligionlist8=document.getElementById("headreligion8");
                                    var getheadreligionlist9=document.getElementById("headreligion9");
                                    var getheadreligionlist10=document.getElementById("headreligion10");
                                    var getheadreligionlist11=document.getElementById("headreligion11");

                                    getheadreligionlist1.setAttribute("selected","");
                                    getheadreligionlist2.removeAttribute("selected","");
                                    getheadreligionlist3.removeAttribute("selected","");
                                    getheadreligionlist4.removeAttribute("selected","");
                                    getheadreligionlist5.removeAttribute("selected","");
                                    getheadreligionlist6.removeAttribute("selected","");
                                    getheadreligionlist7.removeAttribute("selected","");
                                    getheadreligionlist8.removeAttribute("selected","");
                                    getheadreligionlist9.removeAttribute("selected","");
                                    getheadreligionlist10.removeAttribute("selected","");
                                    getheadreligionlist11.removeAttribute("selected","");
                                }

                                if(getinputheadreligion == "Aglipay" && disabledchecker==0){
                                    var getheadreligionlist1=document.getElementById("headreligion1");
                                    var getheadreligionlist2=document.getElementById("headreligion2");
                                    var getheadreligionlist3=document.getElementById("headreligion3");
                                    var getheadreligionlist4=document.getElementById("headreligion4");
                                    var getheadreligionlist5=document.getElementById("headreligion5");
                                    var getheadreligionlist6=document.getElementById("headreligion6");
                                    var getheadreligionlist7=document.getElementById("headreligion7");
                                    var getheadreligionlist8=document.getElementById("headreligion8");
                                    var getheadreligionlist9=document.getElementById("headreligion9");
                                    var getheadreligionlist10=document.getElementById("headreligion10");
                                    var getheadreligionlist11=document.getElementById("headreligion11");

                                    getheadreligionlist1.removeAttribute("selected","");
                                    getheadreligionlist2.setAttribute("selected","");
                                    getheadreligionlist3.removeAttribute("selected","");
                                    getheadreligionlist4.removeAttribute("selected","");
                                    getheadreligionlist5.removeAttribute("selected","");
                                    getheadreligionlist6.removeAttribute("selected","");
                                    getheadreligionlist7.removeAttribute("selected","");
                                    getheadreligionlist8.removeAttribute("selected","");
                                    getheadreligionlist9.removeAttribute("selected","");
                                    getheadreligionlist10.removeAttribute("selected","");
                                    getheadreligionlist11.removeAttribute("selected","");
                                }

                                if(getinputheadreligion =="Alliance" && disabledchecker==0){
                                    var getheadreligionlist1=document.getElementById("headreligion1");
                                    var getheadreligionlist2=document.getElementById("headreligion2");
                                    var getheadreligionlist3=document.getElementById("headreligion3");
                                    var getheadreligionlist4=document.getElementById("headreligion4");
                                    var getheadreligionlist5=document.getElementById("headreligion5");
                                    var getheadreligionlist6=document.getElementById("headreligion6");
                                    var getheadreligionlist7=document.getElementById("headreligion7");
                                    var getheadreligionlist8=document.getElementById("headreligion8");
                                    var getheadreligionlist9=document.getElementById("headreligion9");
                                    var getheadreligionlist10=document.getElementById("headreligion10");
                                    var getheadreligionlist11=document.getElementById("headreligion11");

                                    getheadreligionlist1.removeAttribute("selected","");
                                    getheadreligionlist2.removeAttribute("selected","");
                                    getheadreligionlist3.setAttribute("selected","");
                                    getheadreligionlist4.removeAttribute("selected","");
                                    getheadreligionlist5.removeAttribute("selected","");
                                    getheadreligionlist6.removeAttribute("selected","");
                                    getheadreligionlist7.removeAttribute("selected","");
                                    getheadreligionlist8.removeAttribute("selected","");
                                    getheadreligionlist9.removeAttribute("selected","");
                                    getheadreligionlist10.removeAttribute("selected","");
                                    getheadreligionlist11.removeAttribute("selected","");
                                }

                                if(getinputheadreligion =="Baptists" && disabledchecker==0){
                                    var getheadreligionlist1=document.getElementById("headreligion1");
                                    var getheadreligionlist2=document.getElementById("headreligion2");
                                    var getheadreligionlist3=document.getElementById("headreligion3");
                                    var getheadreligionlist4=document.getElementById("headreligion4");
                                    var getheadreligionlist5=document.getElementById("headreligion5");
                                    var getheadreligionlist6=document.getElementById("headreligion6");
                                    var getheadreligionlist7=document.getElementById("headreligion7");
                                    var getheadreligionlist8=document.getElementById("headreligion8");
                                    var getheadreligionlist9=document.getElementById("headreligion9");
                                    var getheadreligionlist10=document.getElementById("headreligion10");
                                    var getheadreligionlist11=document.getElementById("headreligion11");

                                    getheadreligionlist1.removeAttribute("selected","");
                                    getheadreligionlist2.removeAttribute("selected","");
                                    getheadreligionlist3.removeAttribute("selected","");
                                    getheadreligionlist4.setAttribute("selected","");
                                    getheadreligionlist5.removeAttribute("selected","");
                                    getheadreligionlist6.removeAttribute("selected","");
                                    getheadreligionlist7.removeAttribute("selected","");
                                    getheadreligionlist8.removeAttribute("selected","");
                                    getheadreligionlist9.removeAttribute("selected","");
                                    getheadreligionlist10.removeAttribute("selected","");
                                    getheadreligionlist11.removeAttribute("selected","");
                                }

                                if(getinputheadreligion == "Born Again" && disabledchecker==0){
                                    var getheadreligionlist1=document.getElementById("headreligion1");
                                    var getheadreligionlist2=document.getElementById("headreligion2");
                                    var getheadreligionlist3=document.getElementById("headreligion3");
                                    var getheadreligionlist4=document.getElementById("headreligion4");
                                    var getheadreligionlist5=document.getElementById("headreligion5");
                                    var getheadreligionlist6=document.getElementById("headreligion6");
                                    var getheadreligionlist7=document.getElementById("headreligion7");
                                    var getheadreligionlist8=document.getElementById("headreligion8");
                                    var getheadreligionlist9=document.getElementById("headreligion9");
                                    var getheadreligionlist10=document.getElementById("headreligion10");
                                    var getheadreligionlist11=document.getElementById("headreligion11");

                                    getheadreligionlist1.removeAttribute("selected","");
                                    getheadreligionlist2.removeAttribute("selected","");
                                    getheadreligionlist3.removeAttribute("selected","");
                                    getheadreligionlist4.removeAttribute("selected","");
                                    getheadreligionlist5.setAttribute("selected","");
                                    getheadreligionlist6.removeAttribute("selected","");
                                    getheadreligionlist7.removeAttribute("selected","");
                                    getheadreligionlist8.removeAttribute("selected","");
                                    getheadreligionlist9.removeAttribute("selected","");
                                    getheadreligionlist10.removeAttribute("selected","");
                                    getheadreligionlist11.removeAttribute("selected","");
                                }

                                if(getinputheadreligion =="Iglesia ni Cristo" && disabledchecker==0){
                                    var getheadreligionlist1=document.getElementById("headreligion1");
                                    var getheadreligionlist2=document.getElementById("headreligion2");
                                    var getheadreligionlist3=document.getElementById("headreligion3");
                                    var getheadreligionlist4=document.getElementById("headreligion4");
                                    var getheadreligionlist5=document.getElementById("headreligion5");
                                    var getheadreligionlist6=document.getElementById("headreligion6");
                                    var getheadreligionlist7=document.getElementById("headreligion7");
                                    var getheadreligionlist8=document.getElementById("headreligion8");
                                    var getheadreligionlist9=document.getElementById("headreligion9");
                                    var getheadreligionlist10=document.getElementById("headreligion10");
                                    var getheadreligionlist11=document.getElementById("headreligion11");

                                    getheadreligionlist1.removeAttribute("selected","");
                                    getheadreligionlist2.removeAttribute("selected","");
                                    getheadreligionlist3.removeAttribute("selected","");
                                    getheadreligionlist4.removeAttribute("selected","");
                                    getheadreligionlist5.removeAttribute("selected","");
                                    getheadreligionlist6.setAttribute("selected","");
                                    getheadreligionlist7.removeAttribute("selected","");
                                    getheadreligionlist8.removeAttribute("selected","");
                                    getheadreligionlist9.removeAttribute("selected","");
                                    getheadreligionlist10.removeAttribute("selected","");
                                    getheadreligionlist11.removeAttribute("selected","");
                                }

                                if(getinputheadreligion =="Islam" && disabledchecker==0){
                                    var getheadreligionlist1=document.getElementById("headreligion1");
                                    var getheadreligionlist2=document.getElementById("headreligion2");
                                    var getheadreligionlist3=document.getElementById("headreligion3");
                                    var getheadreligionlist4=document.getElementById("headreligion4");
                                    var getheadreligionlist5=document.getElementById("headreligion5");
                                    var getheadreligionlist6=document.getElementById("headreligion6");
                                    var getheadreligionlist7=document.getElementById("headreligion7");
                                    var getheadreligionlist8=document.getElementById("headreligion8");
                                    var getheadreligionlist9=document.getElementById("headreligion9");
                                    var getheadreligionlist10=document.getElementById("headreligion10");
                                    var getheadreligionlist11=document.getElementById("headreligion11");

                                    getheadreligionlist1.removeAttribute("selected","");
                                    getheadreligionlist2.removeAttribute("selected","");
                                    getheadreligionlist3.removeAttribute("selected","");
                                    getheadreligionlist4.removeAttribute("selected","");
                                    getheadreligionlist5.removeAttribute("selected","");
                                    getheadreligionlist6.removeAttribute("selected","");
                                    getheadreligionlist7.setAttribute("selected","");
                                    getheadreligionlist8.removeAttribute("selected","");
                                    getheadreligionlist9.removeAttribute("selected","");
                                    getheadreligionlist10.removeAttribute("selected","");
                                    getheadreligionlist11.removeAttribute("selected","");
                                }

                                if(getinputheadreligion == "Jehovahs Witness" && disabledchecker==0){
                                    var getheadreligionlist1=document.getElementById("headreligion1");
                                    var getheadreligionlist2=document.getElementById("headreligion2");
                                    var getheadreligionlist3=document.getElementById("headreligion3");
                                    var getheadreligionlist4=document.getElementById("headreligion4");
                                    var getheadreligionlist5=document.getElementById("headreligion5");
                                    var getheadreligionlist6=document.getElementById("headreligion6");
                                    var getheadreligionlist7=document.getElementById("headreligion7");
                                    var getheadreligionlist8=document.getElementById("headreligion8");
                                    var getheadreligionlist9=document.getElementById("headreligion9");
                                    var getheadreligionlist10=document.getElementById("headreligion10");
                                    var getheadreligionlist11=document.getElementById("headreligion11");

                                    getheadreligionlist1.removeAttribute("selected","");
                                    getheadreligionlist2.removeAttribute("selected","");
                                    getheadreligionlist3.removeAttribute("selected","");
                                    getheadreligionlist4.removeAttribute("selected","");
                                    getheadreligionlist5.removeAttribute("selected","");
                                    getheadreligionlist6.removeAttribute("selected","");
                                    getheadreligionlist7.removeAttribute("selected","");
                                    getheadreligionlist8.setAttribute("selected","");
                                    getheadreligionlist9.removeAttribute("selected","");
                                    getheadreligionlist10.removeAttribute("selected","");
                                    getheadreligionlist11.removeAttribute("selected","");
                                }

                                
                                if(getinputheadreligion =="Protestant" && disabledchecker==0){
                                    var getheadreligionlist1=document.getElementById("headreligion1");
                                    var getheadreligionlist2=document.getElementById("headreligion2");
                                    var getheadreligionlist3=document.getElementById("headreligion3");
                                    var getheadreligionlist4=document.getElementById("headreligion4");
                                    var getheadreligionlist5=document.getElementById("headreligion5");
                                    var getheadreligionlist6=document.getElementById("headreligion6");
                                    var getheadreligionlist7=document.getElementById("headreligion7");
                                    var getheadreligionlist8=document.getElementById("headreligion8");
                                    var getheadreligionlist9=document.getElementById("headreligion9");
                                    var getheadreligionlist10=document.getElementById("headreligion10");
                                    var getheadreligionlist11=document.getElementById("headreligion11");

                                    getheadreligionlist1.removeAttribute("selected","");
                                    getheadreligionlist2.removeAttribute("selected","");
                                    getheadreligionlist3.removeAttribute("selected","");
                                    getheadreligionlist4.removeAttribute("selected","");
                                    getheadreligionlist5.removeAttribute("selected","");
                                    getheadreligionlist6.removeAttribute("selected","");
                                    getheadreligionlist7.removeAttribute("selected","");
                                    getheadreligionlist8.removeAttribute("selected","");
                                    getheadreligionlist9.setAttribute("selected","");
                                    getheadreligionlist10.removeAttribute("selected","");
                                    getheadreligionlist11.removeAttribute("selected","");
                                }

                                if(getinputheadreligion =="Roman Catholic" && disabledchecker==0){
                                    var getheadreligionlist1=document.getElementById("headreligion1");
                                    var getheadreligionlist2=document.getElementById("headreligion2");
                                    var getheadreligionlist3=document.getElementById("headreligion3");
                                    var getheadreligionlist4=document.getElementById("headreligion4");
                                    var getheadreligionlist5=document.getElementById("headreligion5");
                                    var getheadreligionlist6=document.getElementById("headreligion6");
                                    var getheadreligionlist7=document.getElementById("headreligion7");
                                    var getheadreligionlist8=document.getElementById("headreligion8");
                                    var getheadreligionlist9=document.getElementById("headreligion9");
                                    var getheadreligionlist10=document.getElementById("headreligion10");
                                    var getheadreligionlist11=document.getElementById("headreligion11");

                                    getheadreligionlist1.removeAttribute("selected","");
                                    getheadreligionlist2.removeAttribute("selected","");
                                    getheadreligionlist3.removeAttribute("selected","");
                                    getheadreligionlist4.removeAttribute("selected","");
                                    getheadreligionlist5.removeAttribute("selected","");
                                    getheadreligionlist6.removeAttribute("selected","");
                                    getheadreligionlist7.removeAttribute("selected","");
                                    getheadreligionlist8.removeAttribute("selected","");
                                    getheadreligionlist9.removeAttribute("selected","");
                                    getheadreligionlist10.setAttribute("selected","");
                                    getheadreligionlist11.removeAttribute("selected","");
                                }

                                if(getinputheadreligion == "Seventh Day Adventist" && disabledchecker==0){
                                    var getheadreligionlist1=document.getElementById("headreligion1");
                                    var getheadreligionlist2=document.getElementById("headreligion2");
                                    var getheadreligionlist3=document.getElementById("headreligion3");
                                    var getheadreligionlist4=document.getElementById("headreligion4");
                                    var getheadreligionlist5=document.getElementById("headreligion5");
                                    var getheadreligionlist6=document.getElementById("headreligion6");
                                    var getheadreligionlist7=document.getElementById("headreligion7");
                                    var getheadreligionlist8=document.getElementById("headreligion8");
                                    var getheadreligionlist9=document.getElementById("headreligion9");
                                    var getheadreligionlist10=document.getElementById("headreligion10");
                                    var getheadreligionlist11=document.getElementById("headreligion11");

                                    getheadreligionlist1.removeAttribute("selected","");
                                    getheadreligionlist2.removeAttribute("selected","");
                                    getheadreligionlist3.removeAttribute("selected","");
                                    getheadreligionlist4.removeAttribute("selected","");
                                    getheadreligionlist5.removeAttribute("selected","");
                                    getheadreligionlist6.removeAttribute("selected","");
                                    getheadreligionlist7.removeAttribute("selected","");
                                    getheadreligionlist8.removeAttribute("selected","");
                                    getheadreligionlist9.removeAttribute("selected","");
                                    getheadreligionlist10.removeAttribute("selected","");
                                    getheadreligionlist11.setAttribute("selected","");
                                }



                                if(getinputheadreligion =="" && disabledchecker==1){
                                    var getheadreligionlist1=document.getElementById("headreligion1");
                                    var getheadreligionlist2=document.getElementById("headreligion2");
                                    var getheadreligionlist3=document.getElementById("headreligion3");
                                    var getheadreligionlist4=document.getElementById("headreligion4");
                                    var getheadreligionlist5=document.getElementById("headreligion5");
                                    var getheadreligionlist6=document.getElementById("headreligion6");
                                    var getheadreligionlist7=document.getElementById("headreligion7");
                                    var getheadreligionlist8=document.getElementById("headreligion8");
                                    var getheadreligionlist9=document.getElementById("headreligion9");
                                    var getheadreligionlist10=document.getElementById("headreligion10");
                                    var getheadreligionlist11=document.getElementById("headreligion11");

                                    getheadreligionlist1.setAttribute("selected","");
                                    getheadreligionlist2.removeAttribute("selected","");
                                    getheadreligionlist3.removeAttribute("selected","");
                                    getheadreligionlist4.removeAttribute("selected","");
                                    getheadreligionlist5.removeAttribute("selected","");
                                    getheadreligionlist6.removeAttribute("selected","");
                                    getheadreligionlist7.removeAttribute("selected","");
                                    getheadreligionlist8.removeAttribute("selected","");
                                    getheadreligionlist9.removeAttribute("selected","");
                                    getheadreligionlist10.removeAttribute("selected","");
                                    getheadreligionlist11.removeAttribute("selected","");
                                }

                                if(getinputheadreligion == "Aglipay" && disabledchecker==1){
                                    var getheadreligionlist1=document.getElementById("headreligion1");
                                    var getheadreligionlist2=document.getElementById("headreligion2");
                                    var getheadreligionlist3=document.getElementById("headreligion3");
                                    var getheadreligionlist4=document.getElementById("headreligion4");
                                    var getheadreligionlist5=document.getElementById("headreligion5");
                                    var getheadreligionlist6=document.getElementById("headreligion6");
                                    var getheadreligionlist7=document.getElementById("headreligion7");
                                    var getheadreligionlist8=document.getElementById("headreligion8");
                                    var getheadreligionlist9=document.getElementById("headreligion9");
                                    var getheadreligionlist10=document.getElementById("headreligion10");
                                    var getheadreligionlist11=document.getElementById("headreligion11");

                                    getheadreligionlist1.removeAttribute("selected","");
                                    getheadreligionlist2.setAttribute("selected","");
                                    getheadreligionlist3.removeAttribute("selected","");
                                    getheadreligionlist4.removeAttribute("selected","");
                                    getheadreligionlist5.removeAttribute("selected","");
                                    getheadreligionlist6.removeAttribute("selected","");
                                    getheadreligionlist7.removeAttribute("selected","");
                                    getheadreligionlist8.removeAttribute("selected","");
                                    getheadreligionlist9.removeAttribute("selected","");
                                    getheadreligionlist10.removeAttribute("selected","");
                                    getheadreligionlist11.removeAttribute("selected","");
                                }

                                if(getinputheadreligion =="Alliance" && disabledchecker==1){
                                    var getheadreligionlist1=document.getElementById("headreligion1");
                                    var getheadreligionlist2=document.getElementById("headreligion2");
                                    var getheadreligionlist3=document.getElementById("headreligion3");
                                    var getheadreligionlist4=document.getElementById("headreligion4");
                                    var getheadreligionlist5=document.getElementById("headreligion5");
                                    var getheadreligionlist6=document.getElementById("headreligion6");
                                    var getheadreligionlist7=document.getElementById("headreligion7");
                                    var getheadreligionlist8=document.getElementById("headreligion8");
                                    var getheadreligionlist9=document.getElementById("headreligion9");
                                    var getheadreligionlist10=document.getElementById("headreligion10");
                                    var getheadreligionlist11=document.getElementById("headreligion11");

                                    getheadreligionlist1.removeAttribute("selected","");
                                    getheadreligionlist2.removeAttribute("selected","");
                                    getheadreligionlist3.setAttribute("selected","");
                                    getheadreligionlist4.removeAttribute("selected","");
                                    getheadreligionlist5.removeAttribute("selected","");
                                    getheadreligionlist6.removeAttribute("selected","");
                                    getheadreligionlist7.removeAttribute("selected","");
                                    getheadreligionlist8.removeAttribute("selected","");
                                    getheadreligionlist9.removeAttribute("selected","");
                                    getheadreligionlist10.removeAttribute("selected","");
                                    getheadreligionlist11.removeAttribute("selected","");
                                }

                                if(getinputheadreligion =="Baptist" && disabledchecker==1){
                                    var getheadreligionlist1=document.getElementById("headreligion1");
                                    var getheadreligionlist2=document.getElementById("headreligion2");
                                    var getheadreligionlist3=document.getElementById("headreligion3");
                                    var getheadreligionlist4=document.getElementById("headreligion4");
                                    var getheadreligionlist5=document.getElementById("headreligion5");
                                    var getheadreligionlist6=document.getElementById("headreligion6");
                                    var getheadreligionlist7=document.getElementById("headreligion7");
                                    var getheadreligionlist8=document.getElementById("headreligion8");
                                    var getheadreligionlist9=document.getElementById("headreligion9");
                                    var getheadreligionlist10=document.getElementById("headreligion10");
                                    var getheadreligionlist11=document.getElementById("headreligion11");

                                    getheadreligionlist1.removeAttribute("selected","");
                                    getheadreligionlist2.removeAttribute("selected","");
                                    getheadreligionlist3.removeAttribute("selected","");
                                    getheadreligionlist4.setAttribute("selected","");
                                    getheadreligionlist5.removeAttribute("selected","");
                                    getheadreligionlist6.removeAttribute("selected","");
                                    getheadreligionlist7.removeAttribute("selected","");
                                    getheadreligionlist8.removeAttribute("selected","");
                                    getheadreligionlist9.removeAttribute("selected","");
                                    getheadreligionlist10.removeAttribute("selected","");
                                    getheadreligionlist11.removeAttribute("selected","");
                                }

                                if(getinputheadreligion == "Born Again" && disabledchecker==1){
                                    var getheadreligionlist1=document.getElementById("headreligion1");
                                    var getheadreligionlist2=document.getElementById("headreligion2");
                                    var getheadreligionlist3=document.getElementById("headreligion3");
                                    var getheadreligionlist4=document.getElementById("headreligion4");
                                    var getheadreligionlist5=document.getElementById("headreligion5");
                                    var getheadreligionlist6=document.getElementById("headreligion6");
                                    var getheadreligionlist7=document.getElementById("headreligion7");
                                    var getheadreligionlist8=document.getElementById("headreligion8");
                                    var getheadreligionlist9=document.getElementById("headreligion9");
                                    var getheadreligionlist10=document.getElementById("headreligion10");
                                    var getheadreligionlist11=document.getElementById("headreligion11");

                                    getheadreligionlist1.removeAttribute("selected","");
                                    getheadreligionlist2.removeAttribute("selected","");
                                    getheadreligionlist3.removeAttribute("selected","");
                                    getheadreligionlist4.removeAttribute("selected","");
                                    getheadreligionlist5.setAttribute("selected","");
                                    getheadreligionlist6.removeAttribute("selected","");
                                    getheadreligionlist7.removeAttribute("selected","");
                                    getheadreligionlist8.removeAttribute("selected","");
                                    getheadreligionlist9.removeAttribute("selected","");
                                    getheadreligionlist10.removeAttribute("selected","");
                                    getheadreligionlist11.removeAttribute("selected","");
                                }

                                if(getinputheadreligion =="Iglesia ni Cristo" && disabledchecker==1){
                                    var getheadreligionlist1=document.getElementById("headreligion1");
                                    var getheadreligionlist2=document.getElementById("headreligion2");
                                    var getheadreligionlist3=document.getElementById("headreligion3");
                                    var getheadreligionlist4=document.getElementById("headreligion4");
                                    var getheadreligionlist5=document.getElementById("headreligion5");
                                    var getheadreligionlist6=document.getElementById("headreligion6");
                                    var getheadreligionlist7=document.getElementById("headreligion7");
                                    var getheadreligionlist8=document.getElementById("headreligion8");
                                    var getheadreligionlist9=document.getElementById("headreligion9");
                                    var getheadreligionlist10=document.getElementById("headreligion10");
                                    var getheadreligionlist11=document.getElementById("headreligion11");

                                    getheadreligionlist1.removeAttribute("selected","");
                                    getheadreligionlist2.removeAttribute("selected","");
                                    getheadreligionlist3.removeAttribute("selected","");
                                    getheadreligionlist4.removeAttribute("selected","");
                                    getheadreligionlist5.removeAttribute("selected","");
                                    getheadreligionlist6.setAttribute("selected","");
                                    getheadreligionlist7.removeAttribute("selected","");
                                    getheadreligionlist8.removeAttribute("selected","");
                                    getheadreligionlist9.removeAttribute("selected","");
                                    getheadreligionlist10.removeAttribute("selected","");
                                    getheadreligionlist11.removeAttribute("selected","");
                                }

                                if(getinputheadreligion =="Islam" && disabledchecker==1){
                                    var getheadreligionlist1=document.getElementById("headreligion1");
                                    var getheadreligionlist2=document.getElementById("headreligion2");
                                    var getheadreligionlist3=document.getElementById("headreligion3");
                                    var getheadreligionlist4=document.getElementById("headreligion4");
                                    var getheadreligionlist5=document.getElementById("headreligion5");
                                    var getheadreligionlist6=document.getElementById("headreligion6");
                                    var getheadreligionlist7=document.getElementById("headreligion7");
                                    var getheadreligionlist8=document.getElementById("headreligion8");
                                    var getheadreligionlist9=document.getElementById("headreligion9");
                                    var getheadreligionlist10=document.getElementById("headreligion10");
                                    var getheadreligionlist11=document.getElementById("headreligion11");

                                    getheadreligionlist1.removeAttribute("selected","");
                                    getheadreligionlist2.removeAttribute("selected","");
                                    getheadreligionlist3.removeAttribute("selected","");
                                    getheadreligionlist4.removeAttribute("selected","");
                                    getheadreligionlist5.removeAttribute("selected","");
                                    getheadreligionlist6.removeAttribute("selected","");
                                    getheadreligionlist7.setAttribute("selected","");
                                    getheadreligionlist8.removeAttribute("selected","");
                                    getheadreligionlist9.removeAttribute("selected","");
                                    getheadreligionlist10.removeAttribute("selected","");
                                    getheadreligionlist11.removeAttribute("selected","");
                                }

                                if(getinputheadreligion == "Jehovahs Witness" && disabledchecker==1){
                                    var getheadreligionlist1=document.getElementById("headreligion1");
                                    var getheadreligionlist2=document.getElementById("headreligion2");
                                    var getheadreligionlist3=document.getElementById("headreligion3");
                                    var getheadreligionlist4=document.getElementById("headreligion4");
                                    var getheadreligionlist5=document.getElementById("headreligion5");
                                    var getheadreligionlist6=document.getElementById("headreligion6");
                                    var getheadreligionlist7=document.getElementById("headreligion7");
                                    var getheadreligionlist8=document.getElementById("headreligion8");
                                    var getheadreligionlist9=document.getElementById("headreligion9");
                                    var getheadreligionlist10=document.getElementById("headreligion10");
                                    var getheadreligionlist11=document.getElementById("headreligion11");

                                    getheadreligionlist1.removeAttribute("selected","");
                                    getheadreligionlist2.removeAttribute("selected","");
                                    getheadreligionlist3.removeAttribute("selected","");
                                    getheadreligionlist4.removeAttribute("selected","");
                                    getheadreligionlist5.removeAttribute("selected","");
                                    getheadreligionlist6.removeAttribute("selected","");
                                    getheadreligionlist7.removeAttribute("selected","");
                                    getheadreligionlist8.setAttribute("selected","");
                                    getheadreligionlist9.removeAttribute("selected","");
                                    getheadreligionlist10.removeAttribute("selected","");
                                    getheadreligionlist11.removeAttribute("selected","");
                                }

                                if(getinputheadreligion =="Protestant" && disabledchecker==1){
                                    var getheadreligionlist1=document.getElementById("headreligion1");
                                    var getheadreligionlist2=document.getElementById("headreligion2");
                                    var getheadreligionlist3=document.getElementById("headreligion3");
                                    var getheadreligionlist4=document.getElementById("headreligion4");
                                    var getheadreligionlist5=document.getElementById("headreligion5");
                                    var getheadreligionlist6=document.getElementById("headreligion6");
                                    var getheadreligionlist7=document.getElementById("headreligion7");
                                    var getheadreligionlist8=document.getElementById("headreligion8");
                                    var getheadreligionlist9=document.getElementById("headreligion9");
                                    var getheadreligionlist10=document.getElementById("headreligion10");
                                    var getheadreligionlist11=document.getElementById("headreligion11");

                                    getheadreligionlist1.removeAttribute("selected","");
                                    getheadreligionlist2.removeAttribute("selected","");
                                    getheadreligionlist3.removeAttribute("selected","");
                                    getheadreligionlist4.removeAttribute("selected","");
                                    getheadreligionlist5.removeAttribute("selected","");
                                    getheadreligionlist6.removeAttribute("selected","");
                                    getheadreligionlist7.removeAttribute("selected","");
                                    getheadreligionlist8.removeAttribute("selected","");
                                    getheadreligionlist9.setAttribute("selected","");
                                    getheadreligionlist10.removeAttribute("selected","");
                                    getheadreligionlist11.removeAttribute("selected","");
                                }

                                if(getinputheadreligion =="Roman Catholic" && disabledchecker==1){
                                    var getheadreligionlist1=document.getElementById("headreligion1");
                                    var getheadreligionlist2=document.getElementById("headreligion2");
                                    var getheadreligionlist3=document.getElementById("headreligion3");
                                    var getheadreligionlist4=document.getElementById("headreligion4");
                                    var getheadreligionlist5=document.getElementById("headreligion5");
                                    var getheadreligionlist6=document.getElementById("headreligion6");
                                    var getheadreligionlist7=document.getElementById("headreligion7");
                                    var getheadreligionlist8=document.getElementById("headreligion8");
                                    var getheadreligionlist9=document.getElementById("headreligion9");
                                    var getheadreligionlist10=document.getElementById("headreligion10");
                                    var getheadreligionlist11=document.getElementById("headreligion11");

                                    getheadreligionlist1.removeAttribute("selected","");
                                    getheadreligionlist2.removeAttribute("selected","");
                                    getheadreligionlist3.removeAttribute("selected","");
                                    getheadreligionlist4.removeAttribute("selected","");
                                    getheadreligionlist5.removeAttribute("selected","");
                                    getheadreligionlist6.removeAttribute("selected","");
                                    getheadreligionlist7.removeAttribute("selected","");
                                    getheadreligionlist8.removeAttribute("selected","");
                                    getheadreligionlist9.removeAttribute("selected","");
                                    getheadreligionlist10.setAttribute("selected","");
                                    getheadreligionlist11.removeAttribute("selected","");
                                }

                                if(getinputheadreligion == "Seventh Day Adventist" && disabledchecker==1){
                                    var getheadreligionlist1=document.getElementById("headreligion1");
                                    var getheadreligionlist2=document.getElementById("headreligion2");
                                    var getheadreligionlist3=document.getElementById("headreligion3");
                                    var getheadreligionlist4=document.getElementById("headreligion4");
                                    var getheadreligionlist5=document.getElementById("headreligion5");
                                    var getheadreligionlist6=document.getElementById("headreligion6");
                                    var getheadreligionlist7=document.getElementById("headreligion7");
                                    var getheadreligionlist8=document.getElementById("headreligion8");
                                    var getheadreligionlist9=document.getElementById("headreligion9");
                                    var getheadreligionlist10=document.getElementById("headreligion10");
                                    var getheadreligionlist11=document.getElementById("headreligion11");

                                    getheadreligionlist1.removeAttribute("selected","");
                                    getheadreligionlist2.removeAttribute("selected","");
                                    getheadreligionlist3.removeAttribute("selected","");
                                    getheadreligionlist4.removeAttribute("selected","");
                                    getheadreligionlist5.removeAttribute("selected","");
                                    getheadreligionlist6.removeAttribute("selected","");
                                    getheadreligionlist7.removeAttribute("selected","");
                                    getheadreligionlist8.removeAttribute("selected","");
                                    getheadreligionlist9.removeAttribute("selected","");
                                    getheadreligionlist10.removeAttribute("selected","");
                                    getheadreligionlist11.setAttribute("selected","");
                                }
                    </script>

                <div class="background-info-div">
                <input type="hidden" id="inputheadeducation" value="<?php echo $rowshowheadinfo['education'] ?>"/>  
                <label style="display:block;transform:translateY(0.3em);margin-bottom:8px;padding-left:10px">Education (Highest)</label>
                <select name="headeducation" disabled id="headeducation" style="border-radius:5px;cursor:not-allowed;font-size:15px;font-weight:normal;outline:none;border:1px solid gray;width:250px;height:40px;padding-left:10px;">
                        <option id="headeducation1" value="">-</option>
                        <option id="headeducation2" value="Not Attended">Not Attended</option>
                        <option id="headeducation3" value="Elementary Level">Elementary Level</option>
                        <option id="headeducation4" value="Elementary Graduate">Elementary Graduate</option>
                        <option id="headeducation5" value="High School Level">High School Level</option>
                        <option id="headeducation6" value="High School Graduate">High School Graduate</option>
                        <option id="headeducation7" value="Senior High School Level">Senior High School Level</option>
                        <option id="headeducation8" value="Senior High School Graduate">Senior High School Graduate</option>
                        <option id="headeducation9" value="College Level">College Level</option>
                        <option id="headeducation10" value="College Graduate">College Graduate</option>
                </select>
                </div>
                    <script>
                        
                        var getinputheadeducation=document.getElementById("inputheadeducation").value;
                        var getheadeducation=document.getElementById("headeducation").value;

                                if(getinputheadeducation =="" && disabledchecker==0){
                                    var getheadeducationlist1=document.getElementById("headeducation1");
                                    var getheadeducationlist2=document.getElementById("headeducation2");
                                    var getheadeducationlist3=document.getElementById("headeducation3");
                                    var getheadeducationlist4=document.getElementById("headeducation4");
                                    var getheadeducationlist5=document.getElementById("headeducation5");
                                    var getheadeducationlist6=document.getElementById("headeducation6");
                                    var getheadeducationlist7=document.getElementById("headeducation7");
                                    var getheadeducationlist8=document.getElementById("headeducation8");
                                    var getheadeducationlist9=document.getElementById("headeducation9");
                                    var getheadeducationlist10=document.getElementById("headeducation10");

                                    getheadeducationlist1.setAttribute("selected","");
                                    getheadeducationlist2.removeAttribute("selected","");
                                    getheadeducationlist3.removeAttribute("selected","");
                                    getheadeducationlist4.removeAttribute("selected","");
                                    getheadeducationlist5.removeAttribute("selected","");
                                    getheadeducationlist6.removeAttribute("selected","");
                                    getheadeducationlist7.removeAttribute("selected","");
                                    getheadeducationlist8.removeAttribute("selected","");
                                    getheadeducationlist9.removeAttribute("selected","");
                                    getheadeducationlist10.removeAttribute("selected","");
                                }

                                if(getinputheadeducation == "Not Attended" && disabledchecker==0){
                                    var getheadeducationlist1=document.getElementById("headeducation1");
                                    var getheadeducationlist2=document.getElementById("headeducation2");
                                    var getheadeducationlist3=document.getElementById("headeducation3");
                                    var getheadeducationlist4=document.getElementById("headeducation4");
                                    var getheadeducationlist5=document.getElementById("headeducation5");
                                    var getheadeducationlist6=document.getElementById("headeducation6");
                                    var getheadeducationlist7=document.getElementById("headeducation7");
                                    var getheadeducationlist8=document.getElementById("headeducation8");
                                    var getheadeducationlist9=document.getElementById("headeducation9");
                                    var getheadeducationlist10=document.getElementById("headeducation10");

                                    getheadeducationlist1.removeAttribute("selected","");
                                    getheadeducationlist2.setAttribute("selected","");
                                    getheadeducationlist3.removeAttribute("selected","");
                                    getheadeducationlist4.removeAttribute("selected","");
                                    getheadeducationlist5.removeAttribute("selected","");
                                    getheadeducationlist6.removeAttribute("selected","");
                                    getheadeducationlist7.removeAttribute("selected","");
                                    getheadeducationlist8.removeAttribute("selected","");
                                    getheadeducationlist9.removeAttribute("selected","");
                                    getheadeducationlist10.removeAttribute("selected","");
                                }

                                if(getinputheadeducation =="Elementary Level" && disabledchecker==0){
                                    var getheadeducationlist1=document.getElementById("headeducation1");
                                    var getheadeducationlist2=document.getElementById("headeducation2");
                                    var getheadeducationlist3=document.getElementById("headeducation3");
                                    var getheadeducationlist4=document.getElementById("headeducation4");
                                    var getheadeducationlist5=document.getElementById("headeducation5");
                                    var getheadeducationlist6=document.getElementById("headeducation6");
                                    var getheadeducationlist7=document.getElementById("headeducation7");
                                    var getheadeducationlist8=document.getElementById("headeducation8");
                                    var getheadeducationlist9=document.getElementById("headeducation9");
                                    var getheadeducationlist10=document.getElementById("headeducation10");

                                    getheadeducationlist1.removeAttribute("selected","");
                                    getheadeducationlist2.removeAttribute("selected","");
                                    getheadeducationlist3.setAttribute("selected","");
                                    getheadeducationlist4.removeAttribute("selected","");
                                    getheadeducationlist5.removeAttribute("selected","");
                                    getheadeducationlist6.removeAttribute("selected","");
                                    getheadeducationlist7.removeAttribute("selected","");
                                    getheadeducationlist8.removeAttribute("selected","");
                                    getheadeducationlist9.removeAttribute("selected","");
                                    getheadeducationlist10.removeAttribute("selected","");
                                }

                                if(getinputheadeducation =="Elementary Graduate" && disabledchecker==0){
                                    var getheadeducationlist1=document.getElementById("headeducation1");
                                    var getheadeducationlist2=document.getElementById("headeducation2");
                                    var getheadeducationlist3=document.getElementById("headeducation3");
                                    var getheadeducationlist4=document.getElementById("headeducation4");
                                    var getheadeducationlist5=document.getElementById("headeducation5");
                                    var getheadeducationlist6=document.getElementById("headeducation6");
                                    var getheadeducationlist7=document.getElementById("headeducation7");
                                    var getheadeducationlist8=document.getElementById("headeducation8");
                                    var getheadeducationlist9=document.getElementById("headeducation9");
                                    var getheadeducationlist10=document.getElementById("headeducation10");

                                    getheadeducationlist1.removeAttribute("selected","");
                                    getheadeducationlist2.removeAttribute("selected","");
                                    getheadeducationlist3.removeAttribute("selected","");
                                    getheadeducationlist4.setAttribute("selected","");
                                    getheadeducationlist5.removeAttribute("selected","");
                                    getheadeducationlist6.removeAttribute("selected","");
                                    getheadeducationlist7.removeAttribute("selected","");
                                    getheadeducationlist8.removeAttribute("selected","");
                                    getheadeducationlist9.removeAttribute("selected","");
                                    getheadeducationlist10.removeAttribute("selected","");
                                }

                                if(getinputheadeducation == "High School Level" && disabledchecker==0){
                                    var getheadeducationlist1=document.getElementById("headeducation1");
                                    var getheadeducationlist2=document.getElementById("headeducation2");
                                    var getheadeducationlist3=document.getElementById("headeducation3");
                                    var getheadeducationlist4=document.getElementById("headeducation4");
                                    var getheadeducationlist5=document.getElementById("headeducation5");
                                    var getheadeducationlist6=document.getElementById("headeducation6");
                                    var getheadeducationlist7=document.getElementById("headeducation7");
                                    var getheadeducationlist8=document.getElementById("headeducation8");
                                    var getheadeducationlist9=document.getElementById("headeducation9");
                                    var getheadeducationlist10=document.getElementById("headeducation10");

                                    getheadeducationlist1.removeAttribute("selected","");
                                    getheadeducationlist2.removeAttribute("selected","");
                                    getheadeducationlist3.removeAttribute("selected","");
                                    getheadeducationlist4.removeAttribute("selected","");
                                    getheadeducationlist5.setAttribute("selected","");
                                    getheadeducationlist6.removeAttribute("selected","");
                                    getheadeducationlist7.removeAttribute("selected","");
                                    getheadeducationlist8.removeAttribute("selected","");
                                    getheadeducationlist9.removeAttribute("selected","");
                                    getheadeducationlist10.removeAttribute("selected","");
                                }

                                if(getinputheadeducation == "High School Graduate" && disabledchecker==0){
                                    var getheadeducationlist1=document.getElementById("headeducation1");
                                    var getheadeducationlist2=document.getElementById("headeducation2");
                                    var getheadeducationlist3=document.getElementById("headeducation3");
                                    var getheadeducationlist4=document.getElementById("headeducation4");
                                    var getheadeducationlist5=document.getElementById("headeducation5");
                                    var getheadeducationlist6=document.getElementById("headeducation6");
                                    var getheadeducationlist7=document.getElementById("headeducation7");
                                    var getheadeducationlist8=document.getElementById("headeducation8");
                                    var getheadeducationlist9=document.getElementById("headeducation9");
                                    var getheadeducationlist10=document.getElementById("headeducation10");

                                    getheadeducationlist1.removeAttribute("selected","");
                                    getheadeducationlist2.removeAttribute("selected","");
                                    getheadeducationlist3.removeAttribute("selected","");
                                    getheadeducationlist4.removeAttribute("selected","");
                                    getheadeducationlist5.removeAttribute("selected","");
                                    getheadeducationlist6.setAttribute("selected","");
                                    getheadeducationlist7.removeAttribute("selected","");
                                    getheadeducationlist8.removeAttribute("selected","");
                                    getheadeducationlist9.removeAttribute("selected","");
                                    getheadeducationlist10.removeAttribute("selected","");
                                }

                                if(getinputheadeducation =="Senior High School Level" && disabledchecker==0){
                                    var getheadeducationlist1=document.getElementById("headeducation1");
                                    var getheadeducationlist2=document.getElementById("headeducation2");
                                    var getheadeducationlist3=document.getElementById("headeducation3");
                                    var getheadeducationlist4=document.getElementById("headeducation4");
                                    var getheadeducationlist5=document.getElementById("headeducation5");
                                    var getheadeducationlist6=document.getElementById("headeducation6");
                                    var getheadeducationlist7=document.getElementById("headeducation7");
                                    var getheadeducationlist8=document.getElementById("headeducation8");
                                    var getheadeducationlist9=document.getElementById("headeducation9");
                                    var getheadeducationlist10=document.getElementById("headeducation10");

                                    getheadeducationlist1.removeAttribute("selected","");
                                    getheadeducationlist2.removeAttribute("selected","");
                                    getheadeducationlist3.removeAttribute("selected","");
                                    getheadeducationlist4.removeAttribute("selected","");
                                    getheadeducationlist5.removeAttribute("selected","");
                                    getheadeducationlist6.removeAttribute("selected","");
                                    getheadeducationlist7.setAttribute("selected","");
                                    getheadeducationlist8.removeAttribute("selected","");
                                    getheadeducationlist9.removeAttribute("selected","");
                                    getheadeducationlist10.removeAttribute("selected","");
                                }

                                if(getinputheadeducation =="Senior High School Graduate" && disabledchecker==0){
                                    var getheadeducationlist1=document.getElementById("headeducation1");
                                    var getheadeducationlist2=document.getElementById("headeducation2");
                                    var getheadeducationlist3=document.getElementById("headeducation3");
                                    var getheadeducationlist4=document.getElementById("headeducation4");
                                    var getheadeducationlist5=document.getElementById("headeducation5");
                                    var getheadeducationlist6=document.getElementById("headeducation6");
                                    var getheadeducationlist7=document.getElementById("headeducation7");
                                    var getheadeducationlist8=document.getElementById("headeducation8");
                                    var getheadeducationlist9=document.getElementById("headeducation9");
                                    var getheadeducationlist10=document.getElementById("headeducation10");

                                    getheadeducationlist1.removeAttribute("selected","");
                                    getheadeducationlist2.removeAttribute("selected","");
                                    getheadeducationlist3.removeAttribute("selected","");
                                    getheadeducationlist4.removeAttribute("selected","");
                                    getheadeducationlist5.removeAttribute("selected","");
                                    getheadeducationlist6.removeAttribute("selected","");
                                    getheadeducationlist7.removeAttribute("selected","");
                                    getheadeducationlist8.setAttribute("selected","");
                                    getheadeducationlist9.removeAttribute("selected","");
                                    getheadeducationlist10.removeAttribute("selected","");
                                }

                                if(getinputheadeducation =="College Level" && disabledchecker==0){
                                    var getheadeducationlist1=document.getElementById("headeducation1");
                                    var getheadeducationlist2=document.getElementById("headeducation2");
                                    var getheadeducationlist3=document.getElementById("headeducation3");
                                    var getheadeducationlist4=document.getElementById("headeducation4");
                                    var getheadeducationlist5=document.getElementById("headeducation5");
                                    var getheadeducationlist6=document.getElementById("headeducation6");
                                    var getheadeducationlist7=document.getElementById("headeducation7");
                                    var getheadeducationlist8=document.getElementById("headeducation8");
                                    var getheadeducationlist9=document.getElementById("headeducation9");
                                    var getheadeducationlist10=document.getElementById("headeducation10");

                                    getheadeducationlist1.removeAttribute("selected","");
                                    getheadeducationlist2.removeAttribute("selected","");
                                    getheadeducationlist3.removeAttribute("selected","");
                                    getheadeducationlist4.removeAttribute("selected","");
                                    getheadeducationlist5.removeAttribute("selected","");
                                    getheadeducationlist6.removeAttribute("selected","");
                                    getheadeducationlist7.removeAttribute("selected","");
                                    getheadeducationlist8.removeAttribute("selected","");
                                    getheadeducationlist9.setAttribute("selected","");
                                    getheadeducationlist10.removeAttribute("selected","");
                                }

                                if(getinputheadeducation == "College Graduate" && disabledchecker==0){
                                    var getheadeducationlist1=document.getElementById("headeducation1");
                                    var getheadeducationlist2=document.getElementById("headeducation2");
                                    var getheadeducationlist3=document.getElementById("headeducation3");
                                    var getheadeducationlist4=document.getElementById("headeducation4");
                                    var getheadeducationlist5=document.getElementById("headeducation5");
                                    var getheadeducationlist6=document.getElementById("headeducation6");
                                    var getheadeducationlist7=document.getElementById("headeducation7");
                                    var getheadeducationlist8=document.getElementById("headeducation8");
                                    var getheadeducationlist9=document.getElementById("headeducation9");
                                    var getheadeducationlist10=document.getElementById("headeducation10");

                                    getheadeducationlist1.removeAttribute("selected","");
                                    getheadeducationlist2.removeAttribute("selected","");
                                    getheadeducationlist3.removeAttribute("selected","");
                                    getheadeducationlist4.removeAttribute("selected","");
                                    getheadeducationlist5.removeAttribute("selected","");
                                    getheadeducationlist6.removeAttribute("selected","");
                                    getheadeducationlist7.removeAttribute("selected","");
                                    getheadeducationlist8.removeAttribute("selected","");
                                    getheadeducationlist9.removeAttribute("selected","");
                                    getheadeducationlist10.setAttribute("selected","");
                                }


                                if(getheadeducation =="" && disabledchecker==1){
                                    var getheadeducationlist1=document.getElementById("headeducation1");
                                    var getheadeducationlist2=document.getElementById("headeducation2");
                                    var getheadeducationlist3=document.getElementById("headeducation3");
                                    var getheadeducationlist4=document.getElementById("headeducation4");
                                    var getheadeducationlist5=document.getElementById("headeducation5");
                                    var getheadeducationlist6=document.getElementById("headeducation6");
                                    var getheadeducationlist7=document.getElementById("headeducation7");
                                    var getheadeducationlist8=document.getElementById("headeducation8");
                                    var getheadeducationlist9=document.getElementById("headeducation9");
                                    var getheadeducationlist10=document.getElementById("headeducation10");

                                    getheadeducationlist1.setAttribute("selected","");
                                    getheadeducationlist2.removeAttribute("selected","");
                                    getheadeducationlist3.removeAttribute("selected","");
                                    getheadeducationlist4.removeAttribute("selected","");
                                    getheadeducationlist5.removeAttribute("selected","");
                                    getheadeducationlist6.removeAttribute("selected","");
                                    getheadeducationlist7.removeAttribute("selected","");
                                    getheadeducationlist8.removeAttribute("selected","");
                                    getheadeducationlist9.removeAttribute("selected","");
                                    getheadeducationlist10.removeAttribute("selected","");
                                }

                                if(getheadeducation == "Not Attended" && disabledchecker==1){
                                    var getheadeducationlist1=document.getElementById("headeducation1");
                                    var getheadeducationlist2=document.getElementById("headeducation2");
                                    var getheadeducationlist3=document.getElementById("headeducation3");
                                    var getheadeducationlist4=document.getElementById("headeducation4");
                                    var getheadeducationlist5=document.getElementById("headeducation5");
                                    var getheadeducationlist6=document.getElementById("headeducation6");
                                    var getheadeducationlist7=document.getElementById("headeducation7");
                                    var getheadeducationlist8=document.getElementById("headeducation8");
                                    var getheadeducationlist9=document.getElementById("headeducation9");
                                    var getheadeducationlist10=document.getElementById("headeducation10");

                                    getheadeducationlist1.removeAttribute("selected","");
                                    getheadeducationlist2.setAttribute("selected","");
                                    getheadeducationlist3.removeAttribute("selected","");
                                    getheadeducationlist4.removeAttribute("selected","");
                                    getheadeducationlist5.removeAttribute("selected","");
                                    getheadeducationlist6.removeAttribute("selected","");
                                    getheadeducationlist7.removeAttribute("selected","");
                                    getheadeducationlist8.removeAttribute("selected","");
                                    getheadeducationlist9.removeAttribute("selected","");
                                    getheadeducationlist10.removeAttribute("selected","");
                                }

                                if(getheadeducation =="Elementary Level" && disabledchecker==1){
                                    var getheadeducationlist1=document.getElementById("headeducation1");
                                    var getheadeducationlist2=document.getElementById("headeducation2");
                                    var getheadeducationlist3=document.getElementById("headeducation3");
                                    var getheadeducationlist4=document.getElementById("headeducation4");
                                    var getheadeducationlist5=document.getElementById("headeducation5");
                                    var getheadeducationlist6=document.getElementById("headeducation6");
                                    var getheadeducationlist7=document.getElementById("headeducation7");
                                    var getheadeducationlist8=document.getElementById("headeducation8");
                                    var getheadeducationlist9=document.getElementById("headeducation9");
                                    var getheadeducationlist10=document.getElementById("headeducation10");

                                    getheadeducationlist1.removeAttribute("selected","");
                                    getheadeducationlist2.removeAttribute("selected","");
                                    getheadeducationlist3.setAttribute("selected","");
                                    getheadeducationlist4.removeAttribute("selected","");
                                    getheadeducationlist5.removeAttribute("selected","");
                                    getheadeducationlist6.removeAttribute("selected","");
                                    getheadeducationlist7.removeAttribute("selected","");
                                    getheadeducationlist8.removeAttribute("selected","");
                                    getheadeducationlist9.removeAttribute("selected","");
                                    getheadeducationlist10.removeAttribute("selected","");
                                }

                                if(getheadeducation =="Elementary Graduate" && disabledchecker==1){
                                    var getheadeducationlist1=document.getElementById("headeducation1");
                                    var getheadeducationlist2=document.getElementById("headeducation2");
                                    var getheadeducationlist3=document.getElementById("headeducation3");
                                    var getheadeducationlist4=document.getElementById("headeducation4");
                                    var getheadeducationlist5=document.getElementById("headeducation5");
                                    var getheadeducationlist6=document.getElementById("headeducation6");
                                    var getheadeducationlist7=document.getElementById("headeducation7");
                                    var getheadeducationlist8=document.getElementById("headeducation8");
                                    var getheadeducationlist9=document.getElementById("headeducation9");
                                    var getheadeducationlist10=document.getElementById("headeducation10");

                                    getheadeducationlist1.removeAttribute("selected","");
                                    getheadeducationlist2.removeAttribute("selected","");
                                    getheadeducationlist3.removeAttribute("selected","");
                                    getheadeducationlist4.setAttribute("selected","");
                                    getheadeducationlist5.removeAttribute("selected","");
                                    getheadeducationlist6.removeAttribute("selected","");
                                    getheadeducationlist7.removeAttribute("selected","");
                                    getheadeducationlist8.removeAttribute("selected","");
                                    getheadeducationlist9.removeAttribute("selected","");
                                    getheadeducationlist10.removeAttribute("selected","");
                                }

                                if(getheadeducation == "High School Level" && disabledchecker==1){
                                    var getheadeducationlist1=document.getElementById("headeducation1");
                                    var getheadeducationlist2=document.getElementById("headeducation2");
                                    var getheadeducationlist3=document.getElementById("headeducation3");
                                    var getheadeducationlist4=document.getElementById("headeducation4");
                                    var getheadeducationlist5=document.getElementById("headeducation5");
                                    var getheadeducationlist6=document.getElementById("headeducation6");
                                    var getheadeducationlist7=document.getElementById("headeducation7");
                                    var getheadeducationlist8=document.getElementById("headeducation8");
                                    var getheadeducationlist9=document.getElementById("headeducation9");
                                    var getheadeducationlist10=document.getElementById("headeducation10");

                                    getheadeducationlist1.removeAttribute("selected","");
                                    getheadeducationlist2.removeAttribute("selected","");
                                    getheadeducationlist3.removeAttribute("selected","");
                                    getheadeducationlist4.removeAttribute("selected","");
                                    getheadeducationlist5.setAttribute("selected","");
                                    getheadeducationlist6.removeAttribute("selected","");
                                    getheadeducationlist7.removeAttribute("selected","");
                                    getheadeducationlist8.removeAttribute("selected","");
                                    getheadeducationlist9.removeAttribute("selected","");
                                    getheadeducationlist10.removeAttribute("selected","");
                                }

                                if(getheadeducation == "High School Graduate" && disabledchecker==1){
                                    var getheadeducationlist1=document.getElementById("headeducation1");
                                    var getheadeducationlist2=document.getElementById("headeducation2");
                                    var getheadeducationlist3=document.getElementById("headeducation3");
                                    var getheadeducationlist4=document.getElementById("headeducation4");
                                    var getheadeducationlist5=document.getElementById("headeducation5");
                                    var getheadeducationlist6=document.getElementById("headeducation6");
                                    var getheadeducationlist7=document.getElementById("headeducation7");
                                    var getheadeducationlist8=document.getElementById("headeducation8");
                                    var getheadeducationlist9=document.getElementById("headeducation9");
                                    var getheadeducationlist10=document.getElementById("headeducation10");

                                    getheadeducationlist1.removeAttribute("selected","");
                                    getheadeducationlist2.removeAttribute("selected","");
                                    getheadeducationlist3.removeAttribute("selected","");
                                    getheadeducationlist4.removeAttribute("selected","");
                                    getheadeducationlist5.removeAttribute("selected","");
                                    getheadeducationlist6.setAttribute("selected","");
                                    getheadeducationlist7.removeAttribute("selected","");
                                    getheadeducationlist8.removeAttribute("selected","");
                                    getheadeducationlist9.removeAttribute("selected","");
                                    getheadeducationlist10.removeAttribute("selected","");
                                }

                                if(getheadeducation =="Senior High School Level" && disabledchecker==1){
                                    var getheadeducationlist1=document.getElementById("headeducation1");
                                    var getheadeducationlist2=document.getElementById("headeducation2");
                                    var getheadeducationlist3=document.getElementById("headeducation3");
                                    var getheadeducationlist4=document.getElementById("headeducation4");
                                    var getheadeducationlist5=document.getElementById("headeducation5");
                                    var getheadeducationlist6=document.getElementById("headeducation6");
                                    var getheadeducationlist7=document.getElementById("headeducation7");
                                    var getheadeducationlist8=document.getElementById("headeducation8");
                                    var getheadeducationlist9=document.getElementById("headeducation9");
                                    var getheadeducationlist10=document.getElementById("headeducation10");

                                    getheadeducationlist1.removeAttribute("selected","");
                                    getheadeducationlist2.removeAttribute("selected","");
                                    getheadeducationlist3.removeAttribute("selected","");
                                    getheadeducationlist4.removeAttribute("selected","");
                                    getheadeducationlist5.removeAttribute("selected","");
                                    getheadeducationlist6.removeAttribute("selected","");
                                    getheadeducationlist7.setAttribute("selected","");
                                    getheadeducationlist8.removeAttribute("selected","");
                                    getheadeducationlist9.removeAttribute("selected","");
                                    getheadeducationlist10.removeAttribute("selected","");
                                }

                                if(getheadeducation =="Senior High School Graduate" && disabledchecker==1){
                                    var getheadeducationlist1=document.getElementById("headeducation1");
                                    var getheadeducationlist2=document.getElementById("headeducation2");
                                    var getheadeducationlist3=document.getElementById("headeducation3");
                                    var getheadeducationlist4=document.getElementById("headeducation4");
                                    var getheadeducationlist5=document.getElementById("headeducation5");
                                    var getheadeducationlist6=document.getElementById("headeducation6");
                                    var getheadeducationlist7=document.getElementById("headeducation7");
                                    var getheadeducationlist8=document.getElementById("headeducation8");
                                    var getheadeducationlist9=document.getElementById("headeducation9");
                                    var getheadeducationlist10=document.getElementById("headeducation10");

                                    getheadeducationlist1.removeAttribute("selected","");
                                    getheadeducationlist2.removeAttribute("selected","");
                                    getheadeducationlist3.removeAttribute("selected","");
                                    getheadeducationlist4.removeAttribute("selected","");
                                    getheadeducationlist5.removeAttribute("selected","");
                                    getheadeducationlist6.removeAttribute("selected","");
                                    getheadeducationlist7.removeAttribute("selected","");
                                    getheadeducationlist8.setAttribute("selected","");
                                    getheadeducationlist9.removeAttribute("selected","");
                                    getheadeducationlist10.removeAttribute("selected","");
                                }

                                if(getheadeducation =="College Level" && disabledchecker==1){
                                    var getheadeducationlist1=document.getElementById("headeducation1");
                                    var getheadeducationlist2=document.getElementById("headeducation2");
                                    var getheadeducationlist3=document.getElementById("headeducation3");
                                    var getheadeducationlist4=document.getElementById("headeducation4");
                                    var getheadeducationlist5=document.getElementById("headeducation5");
                                    var getheadeducationlist6=document.getElementById("headeducation6");
                                    var getheadeducationlist7=document.getElementById("headeducation7");
                                    var getheadeducationlist8=document.getElementById("headeducation8");
                                    var getheadeducationlist9=document.getElementById("headeducation9");
                                    var getheadeducationlist10=document.getElementById("headeducation10");

                                    getheadeducationlist1.removeAttribute("selected","");
                                    getheadeducationlist2.removeAttribute("selected","");
                                    getheadeducationlist3.removeAttribute("selected","");
                                    getheadeducationlist4.removeAttribute("selected","");
                                    getheadeducationlist5.removeAttribute("selected","");
                                    getheadeducationlist6.removeAttribute("selected","");
                                    getheadeducationlist7.removeAttribute("selected","");
                                    getheadeducationlist8.removeAttribute("selected","");
                                    getheadeducationlist9.setAttribute("selected","");
                                    getheadeducationlist10.removeAttribute("selected","");
                                }

                                if(getheadeducation =="College Graduate" && disabledchecker==1){
                                    var getheadeducationlist1=document.getElementById("headeducation1");
                                    var getheadeducationlist2=document.getElementById("headeducation2");
                                    var getheadeducationlist3=document.getElementById("headeducation3");
                                    var getheadeducationlist4=document.getElementById("headeducation4");
                                    var getheadeducationlist5=document.getElementById("headeducation5");
                                    var getheadeducationlist6=document.getElementById("headeducation6");
                                    var getheadeducationlist7=document.getElementById("headeducation7");
                                    var getheadeducationlist8=document.getElementById("headeducation8");
                                    var getheadeducationlist9=document.getElementById("headeducation9");
                                    var getheadeducationlist10=document.getElementById("headeducation10");

                                    getheadeducationlist1.removeAttribute("selected","");
                                    getheadeducationlist2.removeAttribute("selected","");
                                    getheadeducationlist3.removeAttribute("selected","");
                                    getheadeducationlist4.removeAttribute("selected","");
                                    getheadeducationlist5.removeAttribute("selected","");
                                    getheadeducationlist6.removeAttribute("selected","");
                                    getheadeducationlist7.removeAttribute("selected","");
                                    getheadeducationlist8.removeAttribute("selected","");
                                    getheadeducationlist9.removeAttribute("selected","");
                                    getheadeducationlist10.setAttribute("selected","");
                                }
                    </script>


                <div class="background-info-div">
                <label style="display:block;transform:translateY(0.3em);margin-bottom:8px;padding-left:10px">Occupation</label><input type="text" style="width:240px;height:38px;padding-left:10px;border-radius:5px;font-size:15px" class="member-input" disabled id="headoccupation" name="headoccupation" value="<?php echo $rowshowheadinfo['occupation'] ?>" placeholder=""/>
                </div>

                <br style="clear:both" />
                <input type="hidden" id="inputheadpwd" value="<?php echo $rowshowheadinfo['pwd'] ?>"/>  </br>
                <p style="font-size:17px;font-weight:bold;margin-top:50px;margin-bottom:10px;">Other Information Status</p>
                <!-- bottominfo -->
                <div class="background-info-div">
                <label style="display:block;transform:translateY(0.3em);margin-bottom:8px;padding-left:10px">PWD</label>
                <select name="headpwd" disabled id="headpwd" style="border-radius:5px;cursor:not-allowed;font-size:15px;font-weight:normal;outline:none;border:1px solid gray;width:250px;height:40px;padding-left:10px">
                        <option id="headpwd1" value=""></option>
                        <option id="headpwd2" value="Yes">Yes</option>
                        <option id="headpwd3" value="No">No</option>
                        <option id="headpwd4" value="N/A">N/A</option>
                </select>
                </div>
                    <script>
                        
                        var getinputheadpwd=document.getElementById("inputheadpwd").value;
                        var getheadpwd=document.getElementById("headpwd").value;

                                if(getinputheadpwd =="" && disabledchecker==0){
                                    var getheadpwdlist1=document.getElementById("headpwd1");
                                    var getheadpwdlist2=document.getElementById("headpwd2");
                                    var getheadpwdlist3=document.getElementById("headpwd3");
                                    var getheadpwdlist4=document.getElementById("headpwd4");

                                    getheadpwdlist1.setAttribute("selected","");
                                    getheadpwdlist2.removeAttribute("selected","");
                                    getheadpwdlist3.removeAttribute("selected","");
                                    getheadpwdlist4.removeAttribute("selected","");
                                }

                                if(getinputheadpwd == "Yes" && disabledchecker==0){
                                    var getheadpwdlist1=document.getElementById("headpwd1");
                                    var getheadpwdlist2=document.getElementById("headpwd2");
                                    var getheadpwdlist3=document.getElementById("headpwd3");
                                    var getheadpwdlist4=document.getElementById("headpwd4");

                                    getheadpwdlist1.removeAttribute("selected","");
                                    getheadpwdlist2.setAttribute("selected","");
                                    getheadpwdlist3.removeAttribute("selected","");
                                    getheadpwdlist4.removeAttribute("selected","");
                                }

                                if(getinputheadpwd == "No" && disabledchecker==0){
                                    var getheadpwdlist1=document.getElementById("headpwd1");
                                    var getheadpwdlist2=document.getElementById("headpwd2");
                                    var getheadpwdlist3=document.getElementById("headpwd3");
                                    var getheadpwdlist4=document.getElementById("headpwd4");

                                    getheadpwdlist1.removeAttribute("selected","");
                                    getheadpwdlist2.removeAttribute("selected","");
                                    getheadpwdlist3.setAttribute("selected","");
                                    getheadpwdlist4.removeAttribute("selected","");
                                }

                                if(getinputheadpwd =="N/A" && disabledchecker==0){
                                    var getheadpwdlist1=document.getElementById("headpwd1");
                                    var getheadpwdlist2=document.getElementById("headpwd2");
                                    var getheadpwdlist3=document.getElementById("headpwd3");
                                    var getheadpwdlist4=document.getElementById("headpwd4");

                                    getheadpwdlist1.removeAttribute("selected","");
                                    getheadpwdlist2.removeAttribute("selected","");
                                    getheadpwdlist3.removeAttribute("selected","");
                                    getheadpwdlist4.setAttribute("selected","");
                                }

                                if(getheadpwd =="" && disabledchecker==1){
                                    var getheadpwdlist1=document.getElementById("headpwd1");
                                    var getheadpwdlist2=document.getElementById("headpwd2");
                                    var getheadpwdlist3=document.getElementById("headpwd3");
                                    var getheadpwdlist4=document.getElementById("headpwd4");

                                    getheadpwdlist1.setAttribute("selected","");
                                    getheadpwdlist2.removeAttribute("selected","");
                                    getheadpwdlist3.removeAttribute("selected","");
                                    getheadpwdlist4.removeAttribute("selected","");
                                }

                                if(getheadpwd == "Yes" && disabledchecker==1){
                                    var getheadpwdlist1=document.getElementById("headpwd1");
                                    var getheadpwdlist2=document.getElementById("headpwd2");
                                    var getheadpwdlist3=document.getElementById("headpwd3");
                                    var getheadpwdlist4=document.getElementById("headpwd4");

                                    getheadpwdlist1.removeAttribute("selected","");
                                    getheadpwdlist2.setAttribute("selected","");
                                    getheadpwdlist3.removeAttribute("selected","");
                                    getheadpwdlist4.removeAttribute("selected","");
                                }

                                if(getheadpwd =="No" && disabledchecker==1){
                                    var getheadpwdlist1=document.getElementById("headpwd1");
                                    var getheadpwdlist2=document.getElementById("headpwd2");
                                    var getheadpwdlist3=document.getElementById("headpwd3");
                                    var getheadpwdlist4=document.getElementById("headpwd4");

                                    getheadpwdlist1.removeAttribute("selected","");
                                    getheadpwdlist2.removeAttribute("selected","");
                                    getheadpwdlist3.setAttribute("selected","");
                                    getheadpwdlist4.removeAttribute("selected","");
                                }

                                if(getheadpwd =="N/A" && disabledchecker==1){
                                    var getheadpwdlist1=document.getElementById("headpwd1");
                                    var getheadpwdlist2=document.getElementById("headpwd2");
                                    var getheadpwdlist3=document.getElementById("headpwd3");
                                    var getheadpwdlist4=document.getElementById("headpwd4");

                                    getheadpwdlist1.removeAttribute("selected","");
                                    getheadpwdlist2.removeAttribute("selected","");
                                    getheadpwdlist3.removeAttribute("selected","");
                                    getheadpwdlist4.setAttribute("selected","");
                                }
                    </script>
                
                <div class="background-info-div">
                <input type="hidden" id="inputheadip" value="<?php echo $rowshowheadinfo['ip'] ?>"/>  
                <label style="display:block;transform:translateY(0.3em);margin-bottom:8px;padding-left:10px">IP</label>
                <select name="headip" disabled id="headip" style="border-radius:5px;cursor:not-allowed;font-size:15px;font-weight:normal;outline:none;border:1px solid gray;width:250px;height:40px;padding-left:10px">
                        <option id="headip1" value=""></option>
                        <option id="headip2" value="Yes">Yes</option>
                        <option id="headip3" value="No">No</option>
                        <option id="headip4" value="N/A">N/A</option>
                </select>
                </div>
                    <script>
                        
                        var getinputheadip=document.getElementById("inputheadip").value;
                        var getheadip=document.getElementById("headip").value;

                                if(getinputheadip =="" && disabledchecker==0){
                                    var getheadiplist1=document.getElementById("headip1");
                                    var getheadiplist2=document.getElementById("headip2");
                                    var getheadiplist3=document.getElementById("headip3");
                                    var getheadiplist4=document.getElementById("headip4");

                                    getheadiplist1.setAttribute("selected","");
                                    getheadiplist2.removeAttribute("selected","");
                                    getheadiplist3.removeAttribute("selected","");
                                    getheadiplist4.removeAttribute("selected","");
                                }

                                if(getinputheadip == "Yes" && disabledchecker==0){
                                    var getheadiplist1=document.getElementById("headip1");
                                    var getheadiplist2=document.getElementById("headip2");
                                    var getheadiplist3=document.getElementById("headip3");
                                    var getheadiplist4=document.getElementById("headip4");

                                    getheadiplist1.removeAttribute("selected","");
                                    getheadiplist2.setAttribute("selected","");
                                    getheadiplist3.removeAttribute("selected","");
                                    getheadiplist4.removeAttribute("selected","");
                                }

                                if(getinputheadip == "No" && disabledchecker==0){
                                    var getheadiplist1=document.getElementById("headip1");
                                    var getheadiplist2=document.getElementById("headip2");
                                    var getheadiplist3=document.getElementById("headip3");
                                    var getheadiplist4=document.getElementById("headip4");

                                    getheadiplist1.removeAttribute("selected","");
                                    getheadiplist2.removeAttribute("selected","");
                                    getheadiplist3.setAttribute("selected","");
                                    getheadiplist4.removeAttribute("selected","");
                                }

                                if(getinputheadip =="N/A" && disabledchecker==0){
                                    var getheadiplist1=document.getElementById("headip1");
                                    var getheadiplist2=document.getElementById("headip2");
                                    var getheadiplist3=document.getElementById("headip3");
                                    var getheadiplist4=document.getElementById("headip4");

                                    getheadiplist1.removeAttribute("selected","");
                                    getheadiplist2.removeAttribute("selected","");
                                    getheadiplist3.removeAttribute("selected","");
                                    getheadiplist4.setAttribute("selected","");
                                }

                                if(getheadip =="" && disabledchecker==1){
                                    var getheadiplist1=document.getElementById("headip1");
                                    var getheadiplist2=document.getElementById("headip2");
                                    var getheadiplist3=document.getElementById("headip3");
                                    var getheadiplist4=document.getElementById("headip4");

                                    getheadiplist1.setAttribute("selected","");
                                    getheadiplist2.removeAttribute("selected","");
                                    getheadiplist3.removeAttribute("selected","");
                                    getheadiplist4.removeAttribute("selected","");
                                }

                                if(getheadip == "Yes" && disabledchecker==1){
                                    var getheadiplist1=document.getElementById("headip1");
                                    var getheadiplist2=document.getElementById("headip2");
                                    var getheadiplist3=document.getElementById("headip3");
                                    var getheadiplist4=document.getElementById("headip4");

                                    getheadiplist1.removeAttribute("selected","");
                                    getheadiplist2.setAttribute("selected","");
                                    getheadiplist3.removeAttribute("selected","");
                                    getheadiplist4.removeAttribute("selected","");
                                }

                                if(getheadip =="No" && disabledchecker==1){
                                    var getheadiplist1=document.getElementById("headip1");
                                    var getheadiplist2=document.getElementById("headip2");
                                    var getheadiplist3=document.getElementById("headip3");
                                    var getheadiplist4=document.getElementById("headip4");

                                    getheadiplist1.removeAttribute("selected","");
                                    getheadiplist2.removeAttribute("selected","");
                                    getheadiplist3.setAttribute("selected","");
                                    getheadiplist4.removeAttribute("selected","");
                                }

                                if(getheadip =="N/A" && disabledchecker==1){
                                    var getheadiplist1=document.getElementById("headip1");
                                    var getheadiplist2=document.getElementById("headip2");
                                    var getheadiplist3=document.getElementById("headip3");
                                    var getheadiplist4=document.getElementById("headip4");

                                    getheadiplist1.removeAttribute("selected","");
                                    getheadiplist2.removeAttribute("selected","");
                                    getheadiplist3.removeAttribute("selected","");
                                    getheadiplist4.setAttribute("selected","");
                                }
                    </script>

                <div class="background-info-div">
                <input type="hidden" id="inputheadphilhealth" value="<?php echo $rowshowheadinfo['philhealth'] ?>"/>  
                <label style="display:block;transform:translateY(0.3em);margin-bottom:8px;padding-left:10px">Philhealth</label>
                <select name="headphilhealth" disabled id="headphilhealth" style="border-radius:5px;cursor:not-allowed;font-size:15px;font-weight:normal;outline:none;border:1px solid gray;width:250px;height:40px;padding-left:10px">
                        <option id="headphilhealth1" value=""></option>
                        <option id="headphilhealth2" value="Yes">Yes</option>
                        <option id="headphilhealth3" value="No">No</option>
                        <option id="headphilhealth4" value="N/A">N/A</option>
                </select>
                </div>
                    <script>
                        
                        var getinputheadphilhealth=document.getElementById("inputheadphilhealth").value;
                        var getheadphilhealth=document.getElementById("headphilhealth").value;

                                if(getinputheadphilhealth =="" && disabledchecker==0){
                                    var getheadphilhealthlist1=document.getElementById("headphilhealth1");
                                    var getheadphilhealthlist2=document.getElementById("headphilhealth2");
                                    var getheadphilhealthlist3=document.getElementById("headphilhealth3");
                                    var getheadphilhealthlist4=document.getElementById("headphilhealth4");

                                    getheadphilhealthlist1.setAttribute("selected","");
                                    getheadphilhealthlist2.removeAttribute("selected","");
                                    getheadphilhealthlist3.removeAttribute("selected","");
                                    getheadphilhealthlist4.removeAttribute("selected","");
                                }

                                if(getinputheadphilhealth == "Yes" && disabledchecker==0){
                                    var getheadphilhealthlist1=document.getElementById("headphilhealth1");
                                    var getheadphilhealthlist2=document.getElementById("headphilhealth2");
                                    var getheadphilhealthlist3=document.getElementById("headphilhealth3");
                                    var getheadphilhealthlist4=document.getElementById("headphilhealth4");

                                    getheadphilhealthlist1.removeAttribute("selected","");
                                    getheadphilhealthlist2.setAttribute("selected","");
                                    getheadphilhealthlist3.removeAttribute("selected","");
                                    getheadphilhealthlist4.removeAttribute("selected","");
                                }

                                if(getinputheadphilhealth == "No" && disabledchecker==0){
                                    var getheadphilhealthlist1=document.getElementById("headphilhealth1");
                                    var getheadphilhealthlist2=document.getElementById("headphilhealth2");
                                    var getheadphilhealthlist3=document.getElementById("headphilhealth3");
                                    var getheadphilhealthlist4=document.getElementById("headphilhealth4");

                                    getheadphilhealthlist1.removeAttribute("selected","");
                                    getheadphilhealthlist2.removeAttribute("selected","");
                                    getheadphilhealthlist3.setAttribute("selected","");
                                    getheadphilhealthlist4.removeAttribute("selected","");
                                }

                                if(getinputheadphilhealth =="N/A" && disabledchecker==0){
                                    var getheadphilhealthlist1=document.getElementById("headphilhealth1");
                                    var getheadphilhealthlist2=document.getElementById("headphilhealth2");
                                    var getheadphilhealthlist3=document.getElementById("headphilhealth3");
                                    var getheadphilhealthlist4=document.getElementById("headphilhealth4");

                                    getheadphilhealthlist1.removeAttribute("selected","");
                                    getheadphilhealthlist2.removeAttribute("selected","");
                                    getheadphilhealthlist3.removeAttribute("selected","");
                                    getheadphilhealthlist4.setAttribute("selected","");
                                }

                                if(getheadphilhealth =="" && disabledchecker==1){
                                    var getheadphilhealthlist1=document.getElementById("headphilhealth1");
                                    var getheadphilhealthlist2=document.getElementById("headphilhealth2");
                                    var getheadphilhealthlist3=document.getElementById("headphilhealth3");
                                    var getheadphilhealthlist4=document.getElementById("headphilhealth4");

                                    getheadphilhealthlist1.setAttribute("selected","");
                                    getheadphilhealthlist2.removeAttribute("selected","");
                                    getheadphilhealthlist3.removeAttribute("selected","");
                                    getheadphilhealthlist4.removeAttribute("selected","");
                                }

                                if(getheadphilhealth == "Yes" && disabledchecker==1){
                                    var getheadphilhealthlist1=document.getElementById("headphilhealth1");
                                    var getheadphilhealthlist2=document.getElementById("headphilhealth2");
                                    var getheadphilhealthlist3=document.getElementById("headphilhealth3");
                                    var getheadphilhealthlist4=document.getElementById("headphilhealth4");

                                    getheadphilhealthlist1.removeAttribute("selected","");
                                    getheadphilhealthlist2.setAttribute("selected","");
                                    getheadphilhealthlist3.removeAttribute("selected","");
                                    getheadphilhealthlist4.removeAttribute("selected","");
                                }

                                if(getheadphilhealth =="No" && disabledchecker==1){
                                    var getheadphilhealthlist1=document.getElementById("headphilhealth1");
                                    var getheadphilhealthlist2=document.getElementById("headphilhealth2");
                                    var getheadphilhealthlist3=document.getElementById("headphilhealth3");
                                    var getheadphilhealthlist4=document.getElementById("headphilhealth4");

                                    getheadphilhealthlist1.removeAttribute("selected","");
                                    getheadphilhealthlist2.removeAttribute("selected","");
                                    getheadphilhealthlist3.setAttribute("selected","");
                                    getheadphilhealthlist4.removeAttribute("selected","");
                                }

                                if(getheadphilhealth =="N/A" && disabledchecker==1){
                                    var getheadphilhealthlist1=document.getElementById("headphilhealth1");
                                    var getheadphilhealthlist2=document.getElementById("headphilhealth2");
                                    var getheadphilhealthlist3=document.getElementById("headphilhealth3");
                                    var getheadphilhealthlist4=document.getElementById("headphilhealth4");

                                    getheadphilhealthlist1.removeAttribute("selected","");
                                    getheadphilhealthlist2.removeAttribute("selected","");
                                    getheadphilhealthlist3.removeAttribute("selected","");
                                    getheadphilhealthlist4.setAttribute("selected","");
                                }
                    </script>

                <div class="background-info-div">
                <input type="hidden" id="inputheadbreastfeed" value="<?php echo $rowshowheadinfo['breastfeed'] ?>"/>  
                <label style="display:block;transform:translateY(0.3em);margin-bottom:8px;padding-left:10px">Breast Feeding</label>
                <select name="headbreastfeed" disabled id="headbreastfeed" style="border-radius:5px;cursor:not-allowed;font-size:15px;font-weight:normal;outline:none;border:1px solid gray;width:250px;height:40px;padding-left:10px">
                        <option id="headbreastfeed1" value=""></option>
                        <option id="headbreastfeed2" value="Yes">Yes</option>
                        <option id="headbreastfeed3" value="No">No</option>
                        <option id="headbreastfeed4" value="N/A">N/A</option>
                </select>
                </div>
                    <script>
                        var getinputheadbreastfeed=document.getElementById("inputheadbreastfeed").value;
                        var getheadbreastfeed=document.getElementById("headbreastfeed").value;

                                if(getinputheadbreastfeed =="" && disabledchecker==0){
                                    var getheadbreastfeed1=document.getElementById("headbreastfeed1");
                                    var getheadbreastfeed2=document.getElementById("headbreastfeed2");
                                    var getheadbreastfeed3=document.getElementById("headbreastfeed3");
                                    var getheadbreastfeed4=document.getElementById("headbreastfeed4");

                                    getheadbreastfeed1.setAttribute("selected","");
                                    getheadbreastfeed2.removeAttribute("selected","");
                                    getheadbreastfeed3.removeAttribute("selected","");
                                    getheadbreastfeed4.removeAttribute("selected","");
                                }

                                if(getinputheadbreastfeed == "Yes" && disabledchecker==0){
                                    var getheadbreastfeed1=document.getElementById("headbreastfeed1");
                                    var getheadbreastfeed2=document.getElementById("headbreastfeed2");
                                    var getheadbreastfeed3=document.getElementById("headbreastfeed3");
                                    var getheadbreastfeed4=document.getElementById("headbreastfeed4");

                                    getheadbreastfeed1.removeAttribute("selected","");
                                    getheadbreastfeed2.setAttribute("selected","");
                                    getheadbreastfeed3.removeAttribute("selected","");
                                    getheadbreastfeed4.removeAttribute("selected","");
                                }

                                if(getinputheadbreastfeed == "No" && disabledchecker==0){
                                    var getheadbreastfeed1=document.getElementById("headbreastfeed1");
                                    var getheadbreastfeed2=document.getElementById("headbreastfeed2");
                                    var getheadbreastfeed3=document.getElementById("headbreastfeed3");
                                    var getheadbreastfeed4=document.getElementById("headbreastfeed4");

                                    getheadbreastfeed1.removeAttribute("selected","");
                                    getheadbreastfeed2.removeAttribute("selected","");
                                    getheadbreastfeed3.setAttribute("selected","");
                                    getheadbreastfeed4.removeAttribute("selected","");
                                }

                                if(getinputheadbreastfeed =="N/A" && disabledchecker==0){
                                    var getheadbreastfeed1=document.getElementById("headbreastfeed1");
                                    var getheadbreastfeed2=document.getElementById("headbreastfeed2");
                                    var getheadbreastfeed3=document.getElementById("headbreastfeed3");
                                    var getheadbreastfeed4=document.getElementById("headbreastfeed4");

                                    getheadbreastfeed1.removeAttribute("selected","");
                                    getheadbreastfeed2.removeAttribute("selected","");
                                    getheadbreastfeed3.removeAttribute("selected","");
                                    getheadbreastfeed4.setAttribute("selected","");
                                }

                                if(getheadbreastfeed =="" && disabledchecker==1){
                                    var getheadbreastfeed1=document.getElementById("headbreastfeed1");
                                    var getheadbreastfeed2=document.getElementById("headbreastfeed2");
                                    var getheadbreastfeed3=document.getElementById("headbreastfeed3");
                                    var getheadbreastfeed4=document.getElementById("headbreastfeed4");

                                    getheadbreastfeed1.setAttribute("selected","");
                                    getheadbreastfeed2.removeAttribute("selected","");
                                    getheadbreastfeed3.removeAttribute("selected","");
                                    getheadbreastfeed4.removeAttribute("selected","");
                                }

                                if(getheadbreastfeed == "Yes" && disabledchecker==1){
                                    var getheadbreastfeed1=document.getElementById("headbreastfeed1");
                                    var getheadbreastfeed2=document.getElementById("headbreastfeed2");
                                    var getheadbreastfeed3=document.getElementById("headbreastfeed3");
                                    var getheadbreastfeed4=document.getElementById("headbreastfeed4");

                                    getheadbreastfeed1.removeAttribute("selected","");
                                    getheadbreastfeed2.setAttribute("selected","");
                                    getheadbreastfeed3.removeAttribute("selected","");
                                    getheadbreastfeed4.removeAttribute("selected","");
                                }

                                if(getheadbreastfeed =="No" && disabledchecker==1){
                                    var getheadbreastfeed1=document.getElementById("headbreastfeed1");
                                    var getheadbreastfeed2=document.getElementById("headbreastfeed2");
                                    var getheadbreastfeed3=document.getElementById("headbreastfeed3");
                                    var getheadbreastfeed4=document.getElementById("headbreastfeed4");

                                    getheadbreastfeed1.removeAttribute("selected","");
                                    getheadbreastfeed2.removeAttribute("selected","");
                                    getheadbreastfeed3.setAttribute("selected","");
                                    getheadbreastfeed4.removeAttribute("selected","");
                                }

                                if(getheadbreastfeed =="N/A" && disabledchecker==1){
                                    var getheadbreastfeed1=document.getElementById("headbreastfeed1");
                                    var getheadbreastfeed2=document.getElementById("headbreastfeed2");
                                    var getheadbreastfeed3=document.getElementById("headbreastfeed3");
                                    var getheadbreastfeed4=document.getElementById("headbreastfeed4");

                                    getheadbreastfeed1.removeAttribute("selected","");
                                    getheadbreastfeed2.removeAttribute("selected","");
                                    getheadbreastfeed3.removeAttribute("selected","");
                                    getheadbreastfeed4.setAttribute("selected","");
                                }
                    </script>


                <div class="background-info-div">
                <input type="hidden" id="inputheadntp" value="<?php echo $rowshowheadinfo['ntp'] ?>"/>  
                <label style="display:block;transform:translateY(0.3em);margin-bottom:8px;padding-left:10px">NTP</label>
                <select name="headntp" disabled id="headntp" style="border-radius:5px;cursor:not-allowed;font-size:15px;font-weight:normal;outline:none;border:1px solid gray;width:250px;height:40px;padding-left:10px">
                        <option id="headntp1" value=""></option>
                        <option id="headntp2" value="Yes">Yes</option>
                        <option id="headntp3" value="No">No</option>
                        <option id="headntp4" value="N/A">N/A</option>
                </select>
                </div>
                    <script>
                        var getinputheadntp=document.getElementById("inputheadntp").value;
                        var getheadntp=document.getElementById("headntp").value;

                                if(getinputheadntp =="" && disabledchecker==0){
                                    var getheadntp1=document.getElementById("headntp1");
                                    var getheadntp2=document.getElementById("headntp2");
                                    var getheadntp3=document.getElementById("headntp3");
                                    var getheadntp4=document.getElementById("headntp4");

                                    getheadntp1.setAttribute("selected","");
                                    getheadntp2.removeAttribute("selected","");
                                    getheadntp3.removeAttribute("selected","");
                                    getheadntp4.removeAttribute("selected","");
                                }

                                if(getinputheadntp == "Yes" && disabledchecker==0){
                                    var getheadntp1=document.getElementById("headntp1");
                                    var getheadntp2=document.getElementById("headntp2");
                                    var getheadntp3=document.getElementById("headntp3");
                                    var getheadntp4=document.getElementById("headntp4");

                                    getheadntp1.removeAttribute("selected","");
                                    getheadntp2.setAttribute("selected","");
                                    getheadntp3.removeAttribute("selected","");
                                    getheadntp4.removeAttribute("selected","");
                                }

                                if(getinputheadntp == "No" && disabledchecker==0){
                                    var getheadntp1=document.getElementById("headntp1");
                                    var getheadntp2=document.getElementById("headntp2");
                                    var getheadntp3=document.getElementById("headntp3");
                                    var getheadntp4=document.getElementById("headntp4");

                                    getheadntp1.removeAttribute("selected","");
                                    getheadntp2.removeAttribute("selected","");
                                    getheadntp3.setAttribute("selected","");
                                    getheadntp4.removeAttribute("selected","");
                                }

                                if(getinputheadntp =="N/A" && disabledchecker==0){
                                    var getheadntp1=document.getElementById("headntp1");
                                    var getheadntp2=document.getElementById("headntp2");
                                    var getheadntp3=document.getElementById("headntp3");
                                    var getheadntp4=document.getElementById("headntp4");

                                    getheadntp1.removeAttribute("selected","");
                                    getheadntp2.removeAttribute("selected","");
                                    getheadntp3.removeAttribute("selected","");
                                    getheadntp4.setAttribute("selected","");
                                }

                                if(getheadntp =="" && disabledchecker==1){
                                    var getheadntp1=document.getElementById("headntp1");
                                    var getheadntp2=document.getElementById("headntp2");
                                    var getheadntp3=document.getElementById("headntp3");
                                    var getheadntp4=document.getElementById("headntp4");

                                    getheadntp1.setAttribute("selected","");
                                    getheadntp2.removeAttribute("selected","");
                                    getheadntp3.removeAttribute("selected","");
                                    getheadntp4.removeAttribute("selected","");
                                }

                                if(getheadntp == "Yes" && disabledchecker==1){
                                    var getheadntp1=document.getElementById("headntp1");
                                    var getheadntp2=document.getElementById("headntp2");
                                    var getheadntp3=document.getElementById("headntp3");
                                    var getheadntp4=document.getElementById("headntp4");

                                    getheadntp1.removeAttribute("selected","");
                                    getheadntp2.setAttribute("selected","");
                                    getheadntp3.removeAttribute("selected","");
                                    getheadntp4.removeAttribute("selected","");
                                }

                                if(getheadntp =="No" && disabledchecker==1){
                                    var getheadntp1=document.getElementById("headntp1");
                                    var getheadntp2=document.getElementById("headntp2");
                                    var getheadntp3=document.getElementById("headntp3");
                                    var getheadntp4=document.getElementById("headntp4");

                                    getheadntp1.removeAttribute("selected","");
                                    getheadntp2.removeAttribute("selected","");
                                    getheadntp3.setAttribute("selected","");
                                    getheadntp4.removeAttribute("selected","");
                                }

                                if(getheadntp =="N/A" && disabledchecker==1){
                                    var getheadntp1=document.getElementById("headntp1");
                                    var getheadntp2=document.getElementById("headntp2");
                                    var getheadntp3=document.getElementById("headntp3");
                                    var getheadntp4=document.getElementById("headntp4");

                                    getheadntp1.removeAttribute("selected","");
                                    getheadntp2.removeAttribute("selected","");
                                    getheadntp3.removeAttribute("selected","");
                                    getheadntp4.setAttribute("selected","");
                                }
                    </script>

                <div class="background-info-div">
                <input type="hidden" id="inputheadsmooking" value="<?php echo $rowshowheadinfo['smooking'] ?>"/>  
                <label style="display:block;transform:translateY(0.3em);margin-bottom:8px;padding-left:10px">Smooking</label>
                <select name="headsmooking" disabled id="headsmooking" style="border-radius:5px;cursor:not-allowed;font-size:15px;font-weight:normal;outline:none;border:1px solid gray;width:250px;height:40px;padding-left:10px">
                        <option id="headsmooking1" value=""></option>
                        <option id="headsmooking2" value="Yes">Yes</option>
                        <option id="headsmooking3" value="No">No</option>
                        <option id="headsmooking4" value="N/A">N/A</option>
                </select>
                </div>
                    <script>
                        var getinputheadsmooking=document.getElementById("inputheadsmooking").value;
                        var getheadsmooking=document.getElementById("headsmooking").value;

                                if(getinputheadsmooking =="" && disabledchecker==0){
                                    var getheadsmooking1=document.getElementById("headsmooking1");
                                    var getheadsmooking2=document.getElementById("headsmooking2");
                                    var getheadsmooking3=document.getElementById("headsmooking3");
                                    var getheadsmooking4=document.getElementById("headsmooking4");

                                    getheadsmooking1.setAttribute("selected","");
                                    getheadsmooking2.removeAttribute("selected","");
                                    getheadsmooking3.removeAttribute("selected","");
                                    getheadsmooking4.removeAttribute("selected","");
                                }

                                if(getinputheadsmooking == "Yes" && disabledchecker==0){
                                    var getheadsmooking1=document.getElementById("headsmooking1");
                                    var getheadsmooking2=document.getElementById("headsmooking2");
                                    var getheadsmooking3=document.getElementById("headsmooking3");
                                    var getheadsmooking4=document.getElementById("headsmooking4");

                                    getheadsmooking1.removeAttribute("selected","");
                                    getheadsmooking2.setAttribute("selected","");
                                    getheadsmooking3.removeAttribute("selected","");
                                    getheadsmooking4.removeAttribute("selected","");
                                }

                                if(getinputheadsmooking == "No" && disabledchecker==0){
                                    var getheadsmooking1=document.getElementById("headsmooking1");
                                    var getheadsmooking2=document.getElementById("headsmooking2");
                                    var getheadsmooking3=document.getElementById("headsmooking3");
                                    var getheadsmooking4=document.getElementById("headsmooking4");

                                    getheadsmooking1.removeAttribute("selected","");
                                    getheadsmooking2.removeAttribute("selected","");
                                    getheadsmooking3.setAttribute("selected","");
                                    getheadsmooking4.removeAttribute("selected","");
                                }

                                if(getinputheadsmooking =="N/A" && disabledchecker==0){
                                    var getheadsmooking1=document.getElementById("headsmooking1");
                                    var getheadsmooking2=document.getElementById("headsmooking2");
                                    var getheadsmooking3=document.getElementById("headsmooking3");
                                    var getheadsmooking4=document.getElementById("headsmooking4");

                                    getheadsmooking1.removeAttribute("selected","");
                                    getheadsmooking2.removeAttribute("selected","");
                                    getheadsmooking3.removeAttribute("selected","");
                                    getheadsmooking4.setAttribute("selected","");
                                }

                                if(getheadsmooking =="" && disabledchecker==1){
                                    var getheadsmooking1=document.getElementById("headsmooking1");
                                    var getheadsmooking2=document.getElementById("headsmooking2");
                                    var getheadsmooking3=document.getElementById("headsmooking3");
                                    var getheadsmooking4=document.getElementById("headsmooking4");

                                    getheadsmooking1.setAttribute("selected","");
                                    getheadsmooking2.removeAttribute("selected","");
                                    getheadsmooking3.removeAttribute("selected","");
                                    getheadsmooking4.removeAttribute("selected","");
                                }

                                if(getheadsmooking == "Yes" && disabledchecker==1){
                                    var getheadsmooking1=document.getElementById("headsmooking1");
                                    var getheadsmooking2=document.getElementById("headsmooking2");
                                    var getheadsmooking3=document.getElementById("headsmooking3");
                                    var getheadsmooking4=document.getElementById("headsmooking4");

                                    getheadsmooking1.removeAttribute("selected","");
                                    getheadsmooking2.setAttribute("selected","");
                                    getheadsmooking3.removeAttribute("selected","");
                                    getheadsmooking4.removeAttribute("selected","");
                                }

                                if(getheadsmooking =="No" && disabledchecker==1){
                                    var getheadsmooking1=document.getElementById("headsmooking1");
                                    var getheadsmooking2=document.getElementById("headsmooking2");
                                    var getheadsmooking3=document.getElementById("headsmooking3");
                                    var getheadsmooking4=document.getElementById("headsmooking4");

                                    getheadsmooking1.removeAttribute("selected","");
                                    getheadsmooking2.removeAttribute("selected","");
                                    getheadsmooking3.setAttribute("selected","");
                                    getheadsmooking4.removeAttribute("selected","");
                                }

                                if(getheadsmooking =="N/A" && disabledchecker==1){
                                    var getheadsmooking1=document.getElementById("headsmooking1");
                                    var getheadsmooking2=document.getElementById("headsmooking2");
                                    var getheadsmooking3=document.getElementById("headsmooking3");
                                    var getheadsmooking4=document.getElementById("headsmooking4");

                                    getheadsmooking1.removeAttribute("selected","");
                                    getheadsmooking2.removeAttribute("selected","");
                                    getheadsmooking3.removeAttribute("selected","");
                                    getheadsmooking4.setAttribute("selected","");
                                }
                    </script>
                

               
                
