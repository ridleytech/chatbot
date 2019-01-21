
var xmlhttp;
var state;
var debug = true;
var init = true;
var hasChats = false;


function SendData(Arg,stateP,array,time) {
		
	state = stateP;
	
	xmlhttp=null;
	
	var Url;
	
	if(debug == true)
	{
		if(array)
		{
			Url="getmessages.php?roomid="+escape(Arg)+"&list="+escape(array);	
			//console.log("messages.php?roomid="+Arg+"&list="+array);
		}
		else if(time)
		{
			init = false;
			Url="getmessages.php?roomid="+escape(Arg)+"&time="+time+"&messages="+escape(messageArray);	
			//console.log("messages.php?roomid="+Arg+"&time="+time);
		}
		else if(Arg)
		{
			Url="getmessages.php?roomid="+escape(Arg);	
		}
		else
		{
			Url="getmessages.php"      
		}
	}
		
	//console.log("url: "+Url);
	
	//alert(Arg);	

	if (window.XMLHttpRequest) {
	
		xmlhttp=new XMLHttpRequest() ;                   // For all modern browsers
	  	
	} else if (window.ActiveXObject) {
	
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP")   // For (older) IE
	}

	if (xmlhttp!=null)  
	{
		xmlhttp.onreadystatechange=onStateChange;     
		
		//Url=Url+"?Date="+escape(Arg)+"&NoCache="+new Date().getTime()    // "&NoCache"  => Append the timestamp to avoid cashing
											   // Also escape the input argument  (Arg) to properly url-encode the characters (to be sure)
		
		xmlhttp.open("GET", Url, true);                                                         //  (httpMethod,  URL,  asynchronous)
		
		// xmlhttp.overrideMimeType('text/xml');
			
		xmlhttp.send(null);
	
	/* 
	   // How to send a POST request
		xmlhttp.open("POST", Url, true);                                                         //  (httpMethod,  URL,  asynchronous)
	
		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
	
		 xmlhttp.send( "Date=" + escape(Arg) );
	*/
	} 
	else 
	{
		alert("The XMLHttpRequest not supported");
	}
}

function convert(str) 
{ 
	var xmlStr = str.replace('&lt;','<');
	xmlStr = xmlStr.replace('&gt;','>'); 
	xmlStr = xmlStr.replace('&quot;','"'); 
	xmlStr = xmlStr.replace('&#39;',"'"); 
	xmlStr = xmlStr.replace('&amp;',"&"); 
	return xmlStr; 
} 

function onStateChange()  {

	if (xmlhttp.readyState == 4) {                                                   
	   if (xmlhttp.status == 200) {                                                   
		var xml = xmlhttp.responseXML;
		
		//console.log(xml);
		
		if(xml)
		{
			var markers = xml.documentElement.getElementsByTagName("marker");
			
			var html = "";
			var newMessage = false;
			
			//console.log("count: "+markers.length);
			
			//console.log("markers: "+markers);
			
			for (var i = 0; i < markers.length; i++) 
			{
				var message = markers[i].getAttribute("message");
				var username = convert(markers[i].getAttribute("username"));
				var userid = convert(markers[i].getAttribute("userid"));
				var messageid = convert(markers[i].getAttribute("messageid"));
				var stamp = convert(markers[i].getAttribute("stamp"));
				var sqltime = convert(markers[i].getAttribute("sqltime"));
				var condition = convert(markers[i].getAttribute("condition"));
				var mod = convert(markers[i].getAttribute("mod"));
								
				var userClass = "userDiv";
				
				
				if(mod != null && mod == 0)
				{					
					userClass = "modDiv";
				}
								
				if(message != "")
				{					
//					if(allowLinks == true)
//					{
//						message = message.replace(/&lt;/gi, "<");
//						message = message.replace(/&quot;/gi, '""');
//						message = message.replace(/gt;/gi, ">");						
//					}
					
					html = "<div id='"+userid+"' name='"+username+"' class='"+userClass+"' onclick='showMessage(this)'><span class='timeTxt'>" + stamp + "</span> <span class='nameTxt'>" + username + "</span> <span class='messageTxt'>" + message + "</span></div>";
					
					messageArray.push(messageid);
					
					if(init)
					{
						document.getElementById("feedTxt").innerHTML += html;
					}
					else
					{
						$( "#feedTxt" ).append(html);
					}
				}
				
				
				if(i == 0 && markers.length > 0 && message != "")
				{
					lasttime = sqltime;
					newMessage = true;
				}
			}
			
			if(hasChats == false)
			{
				hasChats = true;
			}	
			
			if(enabledAutoScroll == true)
			{
				//console.log("enabledAutoScroll = true");

				var d = $('#feedTxt');
				d.scrollTop(d.prop("scrollHeight"));
			}
			
			if(loop > 1 && newMessage)
			{
				//console.log("new chat!");
			}
		}
		else
		{
			//console.log("no new chats");	
		}

	} else {
	
			alert("statusText: " + xmlhttp.statusText + "\nHTTP status code: " + xmlhttp.status);
	
	}  // End of:   if (xmlhttp.status==200)
  }
}