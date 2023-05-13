<?php
    require ('steamauth/steamauth.php');
	// include('error_handler.php');
	# You would uncomment the line beneath to make it refresh the data every time the page is loaded
	// unset($_SESSION['steam_uptodate']);

	function steam3ToCommunity($steamid) {
	  $steamid = trim($steamid);
	  // if (preg_match('/^\[U:1:(\d+)\]$/', $steamid, $matches)) {
		// $steam64id = bcadd($matches[1], '76561197960265728');
		// return $steam64id;
	  // }
	  // return false;
	  
	  return bcadd($steamid, '76561197960265728');
	}

	function CommunityToSteam3($steamid) {
	  $steamid = trim($steamid);
	  // if (preg_match('/^\[U:1:(\d+)\]$/', $steamid, $matches)) {
		// $steam64id = bcadd($matches[1], '76561197960265728');
		// return $steam64id;
	  // }
	  // return false;
	  
	  return bcsub($steamid, '76561197960265728');
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>GMod9 - Avatar Upload</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-pink.css">

<!--<link rel="stylesheet" href="w3.css">-->
<link rel="shortcut icon" href="/favicon.png" />
<style>

.w3-theme-l5 {color:#000 !important; background-color:#f2f2f4 !important}
.w3-theme-l4 {color:#000 !important; background-color:#d3d5d9 !important}
.w3-theme-l3 {color:#000 !important; background-color:#a8abb3 !important}
.w3-theme-l2 {color:#fff !important; background-color:#7c818d !important}
.w3-theme-l1 {color:#fff !important; background-color:#555962 !important}
.w3-theme-d1 {color:#fff !important; background-color:#2b2d31 !important}
.w3-theme-d2 {color:#fff !important; background-color:#26282c !important}
.w3-theme-d3 {color:#fff !important; background-color:#212326 !important}
.w3-theme-d4 {color:#fff !important; background-color:#1c1e21 !important}
.w3-theme-d5 {color:#fff !important; background-color:#18191b !important}

.w3-theme-light {color:#000 !important; background-color:#f2f2f4 !important}
.w3-theme-dark {color:#fff !important; background-color:#18191b !important}
.w3-theme-action {color:#fff !important; background-color:#18191b !important}

.w3-theme {color:#fff !important; background-color:#2f3136 !important}
.w3-text-theme {color:#2f3136 !important}
.w3-border-theme {border-color:#2f3136 !important}

.w3-hover-theme:hover {color:#fff !important; background-color:#2f3136 !important}
.w3-hover-text-theme:hover {color:#2f3136 !important}
.w3-hover-border-theme:hover {border-color:#2f3136 !important}

</style>
</head>
<body class="w3-theme">


<?php
if (!isset($_SESSION['steamid'])) {

    echo "welcome guest! please login<br><br>";
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
		echo "NOT LOGGED IN WTF";
	}
	
    loginbutton();
    
}  else {
    include ('steamauth/userInfo.php');
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
		$file = $_FILES['file'];
		$allowed_extensions = array('jpg', 'jpeg');
		$upload_path = 'C:/_server/xampp/htdocs/av/avatars/';
		$steamid3 = CommunityToSteam3($steamprofile['steamid']);
		$upload_path = $upload_path . $steamid3 . ".jpg";

		if ($file['error'] == UPLOAD_ERR_OK) {
			$file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);

			$image_size = getimagesize($file['tmp_name']);
			
			if (!$image_size) {
				echo "ERROR, WRONG DIMENSIONS OR INVALID JPEG";
				echo "<a href=upload.php>Click here</a> to try again";
				return;
			}

			if (in_array($file_extension, $allowed_extensions, true)
			&& $image_size[0] <= 64 && $image_size[1] <= 32
			&& imagecreatefromjpeg($file['tmp_name'])) {
			
				$timestamp = time();
				$filename = $timestamp . '_' . basename($file['name']);
				move_uploaded_file($file['tmp_name'], $upload_path);
				echo "File uploaded successfully";
			} else {
				echo "ERROR, WRONG DIMENSIONS OR INVALID JPEG";
				echo "<a href=upload.php>Click here</a> to try again";
				return;
			}
		}
	}

	echo <<<EOD
		<form method="post" enctype="multipart/form-data">
			<input type="file" name="file">
			<input type="submit" value="Upload">
		</form>
	EOD;

    //Protected content
    // echo "Welcome back " . $steamprofile['personaname'] . "</br>";
    
    logoutbutton();
}    
?> 

</body>
</html>