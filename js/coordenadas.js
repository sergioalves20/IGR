
    
                        function coordLat(){
                                 var G = document.getElementById("cLatitudeG").value;
                                 var M = document.getElementById("cLatitudeM").value;
                                 var S = document.getElementById("cLatitudeS").value;
                                 var coord =  parseInt(G) + parseInt(M) /  60 + parseInt(S) / 3600;
                                 var n = coord.toFixed(8);
                                 document.getElementById("cLatitudeN").value  =  n;    
                                 var str2 = "°";
                                 var str4 = "´";                            
                                 var str6 = "´´";                                                     
                                 var res = G.concat(str2,M,str4,S,str6);
                                 document.getElementById("cLatitude").value = res;             
                        }                                                                      
                        function coordLong(){
                                 var G = document.getElementById("cLongitudeG").value;
                                 var M = document.getElementById("cLongitudeM").value;
                                 var S = document.getElementById("cLongitudeS").value;
                                 var coord = parseInt(G) + parseInt(M) /  60 + parseInt(S) / 3600;
                                 var n = coord.toFixed(8);
                                 document.getElementById("cLongitudeN").value  = n;    
                                 var str2 = "°";
                                 var str4 = "´";                            
                                 var str6 = "´´";                                                     
                                 var res = G.concat(str2,M,str4,S,str6);
                                 document.getElementById("cLongitude").value = res;             
                        } 
                        
                        function coordLati(){
                                 var G = document.getElementById("cLatitudeGi").value;
                                 var M = document.getElementById("cLatitudeMi").value;
                                 var S = document.getElementById("cLatitudeSi").value;
                                 var coord =  parseInt(G) + parseInt(M) /  60 + parseInt(S) / 3600;
                                 var n = coord.toFixed(8);
                                 document.getElementById("cLatitudeNi").value  =  n;    
                                 var str2 = "°";
                                 var str4 = "´";                            
                                 var str6 = "´´";                                                     
                                 var res = G.concat(str2,M,str4,S,str6);
                                 document.getElementById("cLatitudei").value = res;             
                        }                                                                      
                        function coordLongi(){
                                 var G = document.getElementById("cLongitudeGi").value;
                                 var M = document.getElementById("cLongitudeMi").value;
                                 var S = document.getElementById("cLongitudeSi").value;
                                 var coord =  parseInt(G) + parseInt(M) /  60 + parseInt(S) / 3600;
                                 var n = coord.toFixed(8);
                                 document.getElementById("cLongitudeNi").value  = n;    
                                 var str2 = "°";
                                 var str4 = "´";                            
                                 var str6 = "´´";                                                     
                                 var res = G.concat(str2,M,str4,S,str6);
                                 document.getElementById("cLongitudei").value = res;             
                        } 

                        function coordLatf(){
                                 var G = document.getElementById("cLatitudeGf").value;
                                 var M = document.getElementById("cLatitudeMf").value;
                                 var S = document.getElementById("cLatitudeSf").value;
                                 var coord =  parseInt(G) + parseInt(M) /  60 + parseInt(S) / 3600;
                                 var n = coord.toFixed(8);
                                 document.getElementById("cLatitudeNf").value  =  n;    
                                 var str2 = "°";
                                 var str4 = "´";                            
                                 var str6 = "´´";                                                     
                                 var res = G.concat(str2,M,str4,S,str6);
                                 document.getElementById("cLatitudef").value = res;             
                        }                                                                      
                        function coordLongf(){
                                 var G = document.getElementById("cLongitudeGf").value;
                                 var M = document.getElementById("cLongitudeMf").value;
                                 var S = document.getElementById("cLongitudeSf").value;
                                 var coord =  parseInt(G) + parseInt(M) /  60 + parseInt(S) / 3600;
                                 var n = coord.toFixed(8);
                                 document.getElementById("cLongitudeNf").value  =  n;    
                                 var str2 = "°";
                                 var str4 = "´";                            
                                 var str6 = "´´";                                                     
                                 var res = G.concat(str2,M,str4,S,str6);
                                 document.getElementById("cLongitudef").value = res;             
                        }  
                    
                       function pk(){
                                var pki = document.getElementById("cPkinicio").value;
                                var pkf= document.getElementById("cPkfim").value;
                                if(pkf < pki){
                                alert('O valor do pkFim não pode ser menor que o valor do pkInicio.');
                                document.getElementById("cPkfim").style.backgroundColor = "#C0FF3E";
                                return false;
                                 }
                        }	 
                        function desniv(){
                                document.intersecao.tDenivel.disabled = true;
                                document.intersecao.tSentido.disabled = true;
                        }
              
                        function limpar(){
                                document.intersecao.tDenivel.disabled = false;
                                document.intersecao.tSentido.disabled = false;
                                document.intersecao.tDesniv.value = 0;
                                document.intersecao.tDenivel.value = "";
                                document.intersecao.tSentido.value = "";
                                document.intersecao.tDesniv.disabled = false;
                        }
                        function deniv(){
                            document.intersecao.tDesniv.value = 0;
                            document.intersecao.tDesniv.disabled = true;
                        }
                        