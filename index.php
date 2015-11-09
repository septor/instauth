<?php
// DISCLAIMER:	As mentioned on the GitHub repo; you'll need an Insagram application for this to work!!

// This is your client ID from the application you've created. It's probably safe to give out, especially since it's in the URL below!
$client_id = 'c7b465de8e774bd4892232b03814b7df';

// This is the name of your application.
// You can put whatever you want here, but it's best if it matches your Instagram app name!
$app_name = 'Trickmod Development';

// The URL to the location of THIS file.
// It MUST match the redirect_uri you set when you created your Instagram application!
// If it DOES NOT match, it will push an error and the script will not function!
$redirect_uri = 'http://septor.xyz/instauth';

// Nothing below NEEDS to be modified, but feel free to!

$url = 'https://instagram.com/oauth/authorize/?client_id='.$client_id.'&redirect_uri='.$redirect_uri.'&response_type=token';

if($_GET['error'] == 'access_denied')
{
	echo 'Well alright, I guess you don\'t need your access token then!';
	exit;
}

if(isset($_POST['getToken']) && !empty($_POST['token']))
{
	$token = explode("#", $_POST['token']);
	echo 'Your access token is: '.str_replace('access_token=', '', $token[1]);
}
else
{
	echo '<div style="width: 60%; margin: 0 auto;">
	You can get your access token by clicking <a href="'.$url.'">here</a>
	<br /><br />
	If you\'ve already clicked the link above and authorized <b>'.$app_name.'</b> access to your basic information, do the following:
	<ol>
		<li>Copy the URL from the address bar above into the below textfield.</li>
		<li>Press the <b>Just give me my token!</b> button.</li>
		<li>You will be redirected to a page that contains your access code in an easy to copy fashion!</li>
	</ol>
	You can alternatively just copy everything after <i>access_token=</i> in the URL above!
	<br /><br />
	The source code to this script can be found here: <a href="https://github.com/septor/instauth/">https://github.com/septor/instauth</a>
	<br /><br />
	<form action="'.$_SERVER['PHP_SELF'].'" method="post">
	<input type="text" name="token" />
	<input type="submit" name="getToken" value="Just give me my token!">
	</form>';
}



?>
