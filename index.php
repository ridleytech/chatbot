<?php 
include("functions.php");

if (!isset($_SESSION)) 
{
	session_start();
}

unset($_SESSION['context']);
$_SESSION['context'] = null;

?>

<!DOCTYPE html>
<html>

    <head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0">
   
   <?php include("links.php");?>
    </head>
    <body>

    <div id="primaryContainer" class="primaryContainer clearfix">
        <div id="containerBG" class="clearfix">
            <div id="batteryDiv" class="clearfix"></div>
            <div id="headerInfo" class="clearfix">
<!--                <img id="backArrow" src="img/back-btn.png" class="image" />-->
                <div id="companyStatus" class="clearfix">
                    <p id="companyNameTxt">
                    Real Estate Co.
                    </p>
                    <p id="statusDIv">
                    Replies instantly
                    </p>
                </div>
<!--                <img id="iconsPlaceholder" src="img/cam-icons.png" class="image" />-->
            </div>
            <div id="contentDiv" class="clearfix">
                <div id="companyImage" class="clearfix">
                    <img src="images/real-estate-icon.png" id="senderProfileImg1" class="senderProfileImg"/>
                </div>
                <div id="companyInfo" class="clearfix">
                    <p id="businessNameDiv">
                    Real Estate Co.
                    </p>
                    <p id="likeDiv">
                    100 people like this
                    </p>
                    <p id="companyTypeDiv">Real Estate Agency</p>
                </div>
                <div id="messageDiv" class="clearfix">
                    
                </div>
            </div>
            <div id="inputDiv" class="clearfix">
                <img id="image" src="img/input-arrow.png" class="image" />
                <input type="text" name="inputTxt" id="inputTxt">
            </div>
            </div>
        </div>
    </div>
    </body>
</html>


<?php

//include("email.php")
?>