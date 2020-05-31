	<html>
<title>admin page finder</title>
<head>
<style>
* {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
  line-height: 1.4;
}

body {
  min-height: 100%;
  margin: 0 0 10px;
  padding: 0;
  font-size: 16px;
  background-color: black;
  color: #000000;
}


</style>
</head>
<body bgcolor="black">

<br>
<br>
<br>


<center><font size='8' color='white' face='Wallpoet'>Admin Page <font color="lime">Finder</font></font>
<br>
<br>
<br>
<form method="POST" action="<?php $PHP_SELF; ?>">
<p align="center"><font color="c0c0c0">Target : </font>
<input type="text" name="url" value="http://"/>
<br>
<br><input type="submit" name="submit" value="Find"/><br/>
</p>
<br>
<br>
<?php
function xss_protect($data, $strip_tags = false, $allowed_tags = "") { 
    if($strip_tags) {
  $data = strip_tags($data, $allowed_tags . "<b>");
    }

    if(stripos($data, "script") !== false) { 
  $result = str_replace("script","scr<b></b>ipt", htmlentities($data, ENT_QUOTES)); 
    } else { 
  $result = htmlentities($data, ENT_QUOTES); 
    } 

    return $result;
}
function urlExist($url)
{
    $handle   = curl_init($url);
    if (false === $handle)
    {
    return false;
    }
    curl_setopt($handle, CURLOPT_HEADER, false);
    curl_setopt($handle, CURLOPT_FAILONERROR, true);
    curl_setopt($handle, CURLOPT_HTTPHEADER, Array("User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.15) Gecko/20080623 Firefox/2.0.0.15") );
    curl_setopt($handle, CURLOPT_NOBODY, true);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, false);
    $connectable = curl_exec($handle);
    curl_close($handle);
    return $connectable;
}
    if(isset($_POST['submit']) && isset($_POST['url']))
    {
  $url= htmlentities(xss_protect($_POST['url']));
  if(filter_var($url, FILTER_VALIDATE_URL))
  {
    $trying = array('/admin/','/wp-login.php','admin/index.php','adminarea','adminLogin','admin_area',
    'admin/index.php','admin/login.php','admin.php','admin_area/admin.php',
    'admin_area/login.php','admin_area/index.php','admin/home.php','admin/controlpanel.php','admin/admin_login.php','admin_login.php','admin/admin-login.php','admincontrol.php',
    'adminLogin.php','admin/adminLogin.php','home.php','admin.php',
    'adminarea/index.php/','adminarea/admin.php/','adminarea/login.php/','siteadmin/index.asp/','admin/','administrator/','admin1/','admin2/','admin3/','admin4/','admin5/','moderator/','webadmin/','adminarea/','bb-admin/','adminLogin/','admin_area/','panel-administracion/','instadmin/',
    'memberadmin/','administratorlogin/','adm/','account.asp','admin/account.asp','admin/index.asp','admin/login.asp','admin/admin.asp',
    'admin_area/admin.asp','admin_area/login.asp','admin/account.html','admin/index.html','admin/login.html','admin/admin.html',
    'admin_area/admin.html','admin_area/login.html','admin_area/index.html','admin_area/index.asp','bb-admin/index.asp','bb-admin/login.asp','bb-admin/admin.asp',
    'bb-admin/index.html','bb-admin/login.html','bb-admin/admin.html','admin/home.html','admin/controlpanel.html','admin.html','admin/cp.html','cp.html',
    'administrator/index.html','administrator/login.html','administrator/account.html','administrator.html','login.html','modelsearch/login.html','moderator.html',
    'moderator/login.html','moderator/admin.html','account.html','controlpanel.html','admincontrol.html','admin_login.html','panel-administracion/login.html',
    'admin/home.asp','admin/controlpanel.asp','admin.asp','pages/admin/admin-login.asp','admin/admin-login.asp','admin-login.asp','admin/cp.asp','cp.asp',
    'administrator/account.asp','administrator.asp','acceso.asp','login.asp','modelsearch/login.asp','moderator.asp','moderator/login.asp','administrator/login.asp',
    'moderator/admin.asp','controlpanel.asp','admin/account.html','adminpanel.html','webadmin.html','pages/admin/admin-login.html','admin/admin-login.html',
    'webadmin/index.html','webadmin/admin.html','webadmin/login.html','user.asp','user.html','admincp/index.asp','admincp/login.asp','admincp/index.html',
    'admin/adminLogin.html','adminLogin.html','admin/adminLogin.html','home.html','adminarea/index.html','adminarea/admin.html','adminarea/login.html',
    'panel-administracion/index.html','panel-administracion/admin.html','modelsearch/index.html','modelsearch/admin.html','admin/admin_login.html',
    'admincontrol/login.html','adm/index.html','adm.html','admincontrol.asp','admin/account.asp','adminpanel.asp','webadmin.asp','webadmin/index.asp',
    'webadmin/admin.asp','webadmin/login.asp','admin/admin_login.asp','admin_login.asp','panel-administracion/login.asp','adminLogin.asp',
    'admin/adminLogin.asp','home.asp','admin.asp','adminarea/index.asp','adminarea/admin.asp','adminarea/login.asp','admin-login.html',
    'panel-administracion/index.asp','panel-administracion/admin.asp','modelsearch/index.asp','modelsearch/admin.asp','administrator/index.asp',
    'admincontrol/login.asp','adm/admloginuser.asp','admloginuser.asp','admin2.asp','admin2/login.asp','admin2/index.asp','adm/index.asp',
    'adm.asp','affiliate.asp','adm_auth.asp','memberadmin.asp','administratorlogin.asp','siteadmin/login.asp','siteadmin/index.asp','siteadmin/login.html','ad','panel','panel.php','panel.html','panel.asp','manager','/index.php/login','administration');
    foreach($trying as $sec)
    {
    $urll=$url.'/'.$sec;
    if(urlExist($urll))
    {
    echo '<p align="center"><font color="white"><h2>admin page:</h2></font><font color="lime"><h3>'.$urll.' </h3></font><font color="yellow">Found<br>OK</font></p>' ;
    exit;
    }
    else
    {
    echo '<p align="center"><font color="c0c0c0" size="5">Not Found</font></p>';
    }   
    }
  }
  else
  {
    echo '<p align="center"><font color="red" size="5">Invalid URL</font></p>';    
  }
    }
  else 
?>
</body></html>
