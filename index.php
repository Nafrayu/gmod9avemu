<?php

if (isset($_GET["a"]) && $_GET["a"] == "kv" && isset($_GET["s"]) && isset($_GET["vnum"]))
{
	header("Content-Type: text/plain");
	
		
	function Steam2ToSteam3($steamid)
	{
		$exploded = explode(":", $steamid);
		$account_type = intval($exploded[1]);
		$account_id = intval($exploded[2]);
		return (($account_id + $account_type) * 2) - $account_type;
	}
	
	
    if (intval($_GET["vnum"])
	&& $_GET["s"])
	{
		echo '-go-
		"Player Info"
		{
			"Avatar" "' . Steam2ToSteam3($_GET["s"]) . '"
			"vnum" "' . Steam2ToSteam3($_GET["s"]) .'"
		}

		';

	}
	
	exit;
}

if (isset($_GET['av']))
{
	header("Cache-Control: no-cache");
	header("Access-Control-Allow-Origin: *");
	header("Pragma: no-cache");
	header("Expires: ".gmdate("D, d M Y H:i:s",time()+(-1*60))." GMT");

	$steamid3 = (int)$_GET['av'];
	
	function CommunityToSteam3($steamid) {
	  $steamid = trim($steamid);
	  // if (preg_match('/^\[U:1:(\d+)\]$/', $steamid, $matches)) {
		// $steam64id = bcadd($matches[1], '76561197960265728');
		// return $steam64id;
	  // }
	  // return false;
	  
	  return bcsub($steamid, '76561197960265728');
	}
	
	function steam3ToCommunity($steamid) {
	  $steamid = trim($steamid);
	  return bcadd($steamid, '76561197960265728');
	}
	
	/*
	
	$json_url = sprintf("https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=B7D245299F6F990504A86FF91EC9D6BD&steamids=%s",steam3ToCommunity($steamid3));

	$json_data = file_get_contents($json_url);
	$data = json_decode($json_data, true);
	$ava_url = $data["response"]["players"][0]["avatar"]
	*/
	
	$upload_path = 'C:/_server/xampp/htdocs/av/avatars/';
	$steamid3 = (int)$_GET['av'];
	$avi = $steamid3 . ".jpg";
	if (!file_exists($upload_path . $steamid3 . ".jpg"))
	{
		$avi = "0.jpg";
	}
	
	
?>

	<body style="margin:0"><img src="<?php echo "./avatars/" . $avi . "?cache=no" ?>"></body>
	
<?php
	exit;
}

    require ('steamauth/steamauth.php');
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<title>GMod Donation Page</title>
<link href="page.css" rel="stylesheet" type="text/css"/>


<style type="text/css">
<!--

.label
{
 padding-left: 10px;
 color: #555;
 font-size: 10px;
}

.input
{
 padding-left: 20px;
 color: #555;
 font-size: 10px;
 padding-bottom: 10px;
}

.important
{
 color: #f00;
 padding-left: 5px;
 font-size: 9px;
}

.input INPUT
{
 font-size: 11px;
 width: 260px;
}

.question
{
 padding-top: 10px;
 font-weight: bold;
}

.intro
{
 text-align: justify;
 padding-bottom: 20px;
}

.error
{
 padding: 10px;
 font-weight: bolder;
 font-size: 13px;
 color: red;
 background-color: yellow;
 text-align: center;
 border: 3px red dashed;
 padding-bottom: 20px;
}

.smallprint
{

 width: 500px;
 margin: 0px auto;
 text-align: justify;
 color: #555;
 padding-top: 20px;
}

-->
</style>

</head>

<body>

<div id="container">
<div id="container_top"></div>
<div id="container_head"><a href="http://gma.garry.tv/av/"><img src="cnt_hd5.jpg" width="608" height="115"></a></div>

<div id="controls">
<!-- <span class="link"><a href="http://gmod.garry.tv/">Back to GMod Site</a></span> -->
</div>

<div style="font-size: 30px; font-family: Tahoma; padding-left: 50px; color: #555">Donate to GMod</div>
<div style="padding-left: 70px; padding-right: 70px; padding-bottom: 30px;">
<hr><div class="intro">
<div class="question">What's this?</div>
Here you can help support Garry's Mod by donating money via Paypal.
<div class="question">Are you fucking serious?!</div>
No, of course not - this website emulates the old donator avatar service garry used to run on gma.garry.tv, you are free to upload your own avatar without donating, it just requires you to authenticate using steam.
<div class="question">What do the avatars look like ingame?</div>
<center><img src="av.jpg" style="border: 1px black solid; margin: 20px;"></center>
<div class="question">Can I change a friend's Avatar?</div>
No, not anymore
<div class="question">Can someone change my Avatar?</div>
No, not anymore
<div class="question">How long until I see my avatar?</div>
It should show up instantly. If it doesn't wait a couple of hours then contact me on <a href="https://steamcommunity.com/id/Nafrayu">Steam</a>



</div>
<!-- <center><a href="?section=1">Proceed to Donate</a></center> -->

<center>
<?php
    loginbutton();
?>
</center>

</div>

<div id="container_bottom"></div>

</div>
<center>

<a href="http://www.lua.org/"><img src="lua.gif" width="83" height="88" border="0" alt="Garry's Mod takes advantage of Lua scripting language."></a>
<!-- <a href="http://www.facepunchstudios.com/"><img src="fps.gif" width="83" height="88" border="0" alt="Facepunch studios - punchy and to the face."></a> -->

</center>

</body>
</html>

<!--
     FILE ARCHIVED ON 15:57:09 Feb 07, 2006 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 10:16:29 May 07, 2023.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
-->
<!--
playback timings (ms):
  captures_list: 213.398 (11)
  exclusion.robots: 0.211
  exclusion.robots.policy: 0.2
  cdx.remote: 0.063
  esindex: 0.009
  LoadShardBlock: 56.712 (3)
  PetaboxLoader3.datanode: 79.532 (4)
  load_resource: 1133.285
  PetaboxLoader3.resolve: 52.874
-->