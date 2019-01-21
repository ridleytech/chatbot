
var xmlhttp2;
var state;
var debug = true;
var init = true;

function insertMessage(message) {
	
	console.log("message: " + message);
			
	if (window.XMLHttpRequest) {
	
		xmlhttp2=new XMLHttpRequest() ;                   // For all modern browsers
	  	
	} else if (window.ActiveXObject) {
	
		xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP")   // For (older) IE
	}

	if (xmlhttp2!=null)  
	{	 
		xmlhttp2.onreadystatechange=onStateChange2;    
		
		var url = "&message=" + message;

		xmlhttp2.open("POST", "sendmessageAJAX.php", true);
		xmlhttp2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
		xmlhttp2.send(url);
	} 
	else 
	{
		alert("The XMLHttpRequest not supported");
	}
}

function convert(str) 
{ 
	var xmlStr = str.replace(/&lt;/g,'<');
	xmlStr = xmlStr.replace(/&gt;/g,'>'); 
	//xmlStr = xmlStr.replace('&quot;',""); 
	xmlStr.replace(/&quot;/g, '');
	xmlStr = xmlStr.replace(/&#39;/g,"'"); 
	xmlStr = xmlStr.replace(/&amp;/g,"&");
	xmlStr = xmlStr.replace(/\\"/g, "");
	xmlStr = xmlStr.replace(/['"]+/g, '');
	return xmlStr; 
} 

function onStateChange2()  {

	if (xmlhttp2.readyState == 4) {                                                   
	
	   if (xmlhttp2.status == 200) {                                                   
				
		var xml2 = xmlhttp2.responseXML;
		
		//console.log(xml);
		
		if(xml2)
		{
			$( "#responseOutput" ).empty();
			$( "#toneOutput" ).empty();
			
			var markers2 = xml2.documentElement.getElementsByTagName("marker");
			
			var html = "";
			
			for (var i = 0; i < markers2.length; i++) 
			{
				var output = markers2[i].getAttribute("output");
				var responseString = markers2[i].getAttribute("responseString");
				var toneString = markers2[i].getAttribute("toneString");
				var date = markers2[i].getAttribute("date");
				
				console.log("output: " + output);
				console.log("toneString: " + toneString);	
				console.log("responseString: " + responseString);	
				
				var userid = 1;
				var username = "Bot";
				var userClass = "userDiv";
				var stamp = ""; //convert(markers[i].getAttribute("stamp"));
				
				var strings = output.split("--");
				
				for (var j = 0; j < strings.length; j++) 
				{
					var str = strings[j];
					
					if(j == 0)
						{
							var html3 = "<div class='senderDiv'><p id='senderMessageTime'>"+date+"</p><div id='senderProfileImage' class='clearfix'><img src='images/real-estate-icon.png' id='senderIcon' class='clearfix'/></div><div class='senderMessage' class='clearfix'><p id='senderTxt'>"+convert(str)+"</p></div> </div>";
						}
					else
						{
							var html3 = "<div class='senderDiv'><div id='senderProfileImage' class='clearfix'><img src='images/real-estate-icon.png' id='senderIcon' class='clearfix'/></div><div class='senderMessage' class='clearfix'><p id='senderTxt'>"+convert(str)+"</p></div> </div>";
						}

					//var s = String.fromCodePoint("\u0041");

					$( "#messageDiv" ).append(html3);
					
					
				}
				
				var d = $('#messageDiv');
				d.scrollTop(d.prop("scrollHeight"));
				
//				var s = String.fromCodePoint("0x1F60A");
//
//
//				$( "#messageDiv" ).append(s);
				
				
				//var html = "<div id='"+userid+"' name='"+username+"' class='"+userClass+"' <span class='timeTxt'>" + stamp + "</span> <span class='nameTxt'>" + username + "</span> <span class='messageTxt'>" + output + "</span></div>";
				
				
				
				//$( "#responseOutput" ).append(responseString);
				
				
				
//				if(toneString != null)
//				{
//					$( "#toneOutput" ).append(convert(toneString));
//				}
//				else
//				{
//					$( "#toneOutput" ).append("No emotion detected");
//				}
			}	
		}
		else
		{
			//console.log("no new chats");	
		}

	} else {
	
			alert("statusText: " + xmlhttp2.statusText + "\nHTTP status code: " + xmlhttp2.status);
	
	}  // End of:   if (xmlhttp.status==200)
  }
}