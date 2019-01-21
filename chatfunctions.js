	var counter;
	var session;
	var archiveId;
	var streamEnded;
	var hostStreamId;
	var sessionId;
	var token;
	var role;
	var recordingStarted;
	var rows;
	var diff;
	var roomname;
	var archiving;
	var userIdleTime = 0;
	var maxIdleTime = 1000;
	var toBan;
	var showid;
	var myName = "";
	var messageArray = [];
	var lasttime;
	var runit = true;
	var userid;
	var loop = 0;
	var selectedUser;
	var selectedUsername;
	var modStatus;
	var enabledAutoScroll = true;
	var onAir = false;
	var allowlinks = false;

	$(document).ready(function () {
					
		var maxIdleTime = 60*15;
				
		sessionId = $('#ssid').val();
		token = $('#tk').val();
		role = $('#role').val();
		showid = $('#sid').val();
		
		//chatroom
		
		var username = $('#username').val();
		userid = $('#userid').val();
		var roomid = $('#roomid').val();
		
		$("#popupBox").show();
		
		$('#inputTxt').on("keypress", function(e) {
						
			if (e.keyCode == 13 && $('#inputTxt').val() != '') 
			{
				sendMessage();
				return false; // prevent the button click from happening
			}
		});
		
		var userid = 1;
		var username = "Bot";
		var userClass = "userDiv";
		
		var d = new Date();

		
		
		//default message

		//var html = "<div id='"+userid+"' name='"+username+"' class='"+userClass+"' <span class='timeTxt'>" + stamp + "</span> <span class='nameTxt'>" + username + "</span> <span class='messageTxt'>" + "Welcome to chatbot. How can I help you?" + "</span></div>";
		
		console.log("add default message");
		
		
			
		var html = "<div class='senderDiv'><p id='senderMessageTime'>"+formatAMPM(d)+"</p><div id='senderProfileImage' class='clearfix'><img src='images/real-estate-icon.png' id='senderIcon' class='clearfix'/></div><div class='senderMessagePhoto' class='clearfix'><img src='images/92133765.jpg' class='feedImg'/></div> </div>";

		$( "#messageDiv" ).append(html);
		
		
		
		
		
		
		
		

		
		var html3 = "<div class='senderDiv'><div id='senderProfileImage' class='clearfix'><img src='images/real-estate-icon.png' id='senderIcon' class='clearfix'/></div><div class='senderMessage' class='clearfix'><p id='senderTxt'>Hello. I'm Bot, and I'd like to help you with any of your real estate concerns. How can I help you?</p></div> </div>";

		$( "#messageDiv" ).append(html3);	
		
		var html2 = "<div class='senderDiv'><div id='senderProfileImage' class='clearfix'><img src='images/real-estate-icon.png' id='senderIcon' class='clearfix'/></div><div class='senderMessage' class='clearfix'><p id='senderTxt'>But first, tell me what you would like to do.<input type='button' name='buyBtn' id='buyBtn' value='Buy a Home' class='optionBtn' onClick='selectBuy();'></p></div> </div>";

		$( "#messageDiv" ).append(html2);	
				
		
		var globalModal = $('.global-modal');

		$( ".btn-green-flat-trigger" ).on( "click", function(e) {

			  e.preventDefault();
			  $( globalModal ).toggleClass('global-modal-show');
		});

		$( ".overlay" ).on( "click", function() {

			  $( globalModal ).toggleClass('global-modal-show');
		});

		$( ".global-modal_close" ).on( "click", function() {

			  $( globalModal ).toggleClass('global-modal-show');
		});

		$(".mobile-close").on("click", function(){

			  $( globalModal ).toggleClass('global-modal-show');
		});
	});



function selectOption(option) {
	
	console.log("select " + option);
	
	insertMessage(option);
	
	document.getElementById('1btn').onclick = '';
	document.getElementById('2btn').onclick = '';
	document.getElementById('3btn').onclick = '';
}

function start() {
	
	console.log("start");
	
	insertMessage("start");
	
	document.getElementById('startBtn').onclick = '';
}

function showListings () {
	
	var d = new Date();
	
	//listings
		
	var html = "<div class='senderDiv'>  <p id='senderMessageTime'>"+formatAMPM(d)+"</p>  <div id='senderProfileImage' class='clearfix'><img src='images/real-estate-icon.png' id='senderIcon' class='clearfix'/></div><div class='senderMessagePhoto' class='clearfix'>  <div class='listingsContainer'><div class='listingsContent'>  <div class='listing'><img src='images/house1.jpeg' class='feedImgBottom'/><div class='listingDetails'>  <div class='address'>1234 Main St. Detroit, MI 48223</div>  <div class='cost'>$90,000 - 4 bed - 3 bath - 4000 SqFt </div></div>  </div>  <div class='listing'><img src='images/house2.jpg' class='feedImgBottom'/><div class='listingDetails'>  <div class='address'>1234 Main St. Detroit, MI 48223</div>  <div class='cost'>$150,000 - 4 bed - 3 bath - 4000 SqFt </div></div>  </div>  <div class='listing'><img src='images/house3.jpg' class='feedImgBottom'/><div class='listingDetails'>  <div class='address'>1234 Main St. Detroit, MI 48223</div>  <div class='cost'>$120,000 - 4 bed - 3 bath - 4000 SqFt </div></div>  </div></div>  </div></div></div>";

	$( "#messageDiv" ).append(html);
	
	var d = $('#messageDiv');
	d.scrollTop(d.prop("scrollHeight"));
}

function selectBuy() {
	
	insertMessage("Buy a Home");
	
	document.getElementById('buyBtn').onclick = '';
	
	var d = new Date();
	
	var html = "<div class='senderDiv'><p id='senderMessageTime'>"+formatAMPM(d)+"</p><div id='senderProfileImage' class='clearfix'><img src='images/real-estate-icon.png'id='senderIcon' class='clearfix'/></div><div class='senderMessagePhoto' class='clearfix'><img src='images/open-house-sign.jpg' class='feedImg'/></div> </div>";

	$( "#messageDiv" ).append(html);
}

		
	function sendMessage() {
					
		var username = $('#username').val();
		var userid = $('#userid').val();
		var roomid = $('#roomid').val();
		
		if($('#chatInput').val() != '')
		{
			var message1 = $('#inputTxt').val();
			
			insertMessage(message1);
			
			$('#inputTxt').val('');
			
			var userid = 1;
			var username = "User";
			var userClass = "userDiv";
			var stamp = "";

			
		
		//var html = "<div id='"+userid+"' name='"+username+"' class='"+userClass+"' <span class='timeTxt'>" + stamp + "</span> <span class='nameTxt'>" + username + "</span> <span class='messageTxt'>" + message1 + "</span></div>";
			
			var html = "<div class='userDiv'><p id='userMessageTime'>12&#x3a;00 PM</p><div id='userMessage' class='clearfix'><p id='userTxt'>"+message1+"</p></div></div>"
			
			$( "#messageDiv" ).append(html);
			
			//$( "#feedTxt" ).append(html);	
		}
	}

function formatAMPM(date) {
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? 'PM' : 'AM';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0'+minutes : minutes;
  var strTime = hours + ':' + minutes + ' ' + ampm;
  return strTime;
}
	