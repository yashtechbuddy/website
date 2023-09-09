	<script type="text/javascript">
							function OnCat(cat) 
							{
							var str = cat.value; 
							
							var resOld = str.replace(/[&\/\\#,+()$~%.'":*?!@_^`|\[\];=<>{}]/g,''); //replace special charactor with     blanck space
							var res = resOld.toLowerCase();
							
							var text=" | ";
							document.getElementById("title").value =  cat.value+text;
							
							}
							
							function OnTitle(txt) 
							{
							var str = txt.value; 
                            
							var resOld = str.replace(/[&\/\\#,+()$~%.'":*?!@_^`|\[\];=<>{}]/g,''); //replace special charactor with     blanck space
							var res = resOld.toLowerCase();
							
							var text=" | Prestress Steel LLP";
							document.getElementById("meta_title").value =  txt.value+text;  //create  meta Title
							
							var res1 = res.split(" ").join("-");	 //replace space with - sign	
							document.getElementById("page_name").value = res1+".php";  //create webpage name
						
							var url="http://prestresssteel.com/products/";
							document.getElementById("meta_url").value = url+res1+".php";  //create  meta url
							
							document.getElementById("meta_canonical").value = url+res1+".php";  //create  meta canonical url
								}	
							function OnWebpageName(txt)
							{
							var str = txt.value; 
								
							var resOld = str.replace(/[&\/\\#,+()$~%'":*?!@_^`|\[\];=<>{}]/g,''); //replace special charactor with     blanck space
							var res = resOld.toLowerCase();
							
							var res1 = res.split(" ").join("-");
							
							var url="http://prestresssteel.com/products/";
							document.getElementById("meta_url").value = url+res1;  //create  meta url
							
							} 
								function OnDesc(txt) 
								{									
									var str = txt.value; 
									document.getElementById("meta_desc").value =  txt.value;  //create  meta Description
								}
								function setImage(val)
					{
					   	var url1="http://prestresssteel.com/admin/images/product/";
						var url2 = "Product-"+Math.floor((Math.random() * 99999) + 1)+"_";
						
						var fileName = val.substr(val.lastIndexOf("\\")+1, val.length); //get browse image name
						
						
						document.getElementById("browse_image").value = url2+fileName;  // add image name to text box
					   
					   
					    document.getElementById("meta_image").value = url1+url2+fileName;  // add image name to meta_image with comlete URl
					    
					}
										
					function onWebPage()
					{
						if(document.getElementById("web_page").checked)
						{
							document.getElementById("page_name").readOnly = true;
						}
						else
						{
							document.getElementById("page_name").readOnly = false;
						}
					}
							</script>