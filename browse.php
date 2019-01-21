<?php

session_start();

if(isset($_POST['fileList']))
{	
	$_SESSION['file'] = $_POST['fileList'];	
	$_SESSION['code'] = file_get_contents($_SESSION['file']);
}

if(isset($_POST['codeTxt']))
{
	//echo "save code<br>";
	
	$_SESSION['file'] = $_POST['fileTxt'];	
	
	$_SESSION['code'] = $_POST['codeTxt'];
	
	file_put_contents($_POST['fileTxt'],$_POST['codeTxt']);
}

?>

<style type="text/css">
#codeTxt {
    width: 100%;
    height: 300px;
}
</style>

<head>
	
<meta charset="utf-8">
<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0">

</head>

<form name="form1" method="post" action="">
  <label for="fileTxt">File: </label>
  <select name="fileList" id="fileList">
    <option value="1">Select file...</option>
	  
<?php
	  
if ($handle = opendir('.')) {

	while (false !== ($entry = readdir($handle))) 
	{
		if ($entry != "." && $entry != "..") {

			if($_SESSION['file'] == $entry)
			{
				echo "<option value='".$entry."' selected='selected'>".$entry."</option>";
			}
			else
			{
				echo "<option value='".$entry."'>".$entry."</option>";
			}
		}
	}

	closedir($handle);
}

?>
  
  </select>
  <input type="submit" name="submit" id="submit" value="Open">
</form>


<form name="form2" method="post" action="">
	<p>
	  <label for="textfield">Filename:</label>
	  <input type="text" name="fileTxt" id="fileTxt" value="<?php if(isset($_SESSION['file'])){echo $_SESSION['file'];}?>">
  </p>
	<p>
	  <textarea name="codeTxt" id="codeTxt" cols="45" rows="5"><?php if(isset($_SESSION['code'])){echo $_SESSION['code'];}?>
  </textarea>
	  <br>
	  <input type="submit" name="submit" id="submit" value="Save">
  </p>
</form>
