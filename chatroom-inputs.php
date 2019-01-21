<?php include("en-de.php"); 

	if (!isset($_SESSION)) 
	{
		session_start();
	}


	if(isset($_SESSION['userid'])) 
	{
	
?>
		
<input type="hidden" name="userid" id="userid" value="<?php echo en($_SESSION['userid']); ?>" />
<input type="hidden" name="username" id="username" value="<?php echo en($_SESSION['username']); ?>" />
<input type="hidden" name="tk" id="tk" value="<?php echo en($_SESSION['tk']); ?>"/>
<input type="hidden" name="role" id="role" value="<?php echo en($_SESSION['role']); ?>"/>
            
<?php } ?>


<input type="hidden" name="roomid" id="roomid" value="<?php echo en($_SESSION['roomid']); ?>"/>
<input type="hidden" name="ssid" id="ssid" value="<?php echo en($_SESSION['ssid']); ?>"/>
<input type="hidden" name="sid" id="sid" value="<?php echo en($_SESSION['sid']); ?>"/>