<?php
/**
 * Created by Joe of ExchangeCore.com
 */

# Die Session muss immer zuerst gestartet werden, bevor 
# eine Ausgabe an den Browser erfolgt !!! 
SESSION_START(); 

$bind=false;
if($_GET["q"]=="fail"){
    echo "Username/Passwort ist ungueltig";
  }
if(isset($_POST['username']) && isset($_POST['password'])){
    $host = "ldap://dc-01.tgm.ac.at";
	$port = 389;
	$person=$_POST['username'];
	
	
    $con = ldap_connect($host,$port) or die ( "Connect ist da {$host} möglich!" );
    $username = $_POST['username'];
    $password = $_POST['password'];

 
    $bind = @ldap_bind($con, "fotorent", "ukv,QEE@Fr") or die ( "Serviceuser geht nicht" );
	//OU=Lehrer
	$dn = "OU=People,OU=identity,dc=tgm,dc=ac,dc=at";
	$filter = "(sAMAccountName=$person)";
	// $attributes_ad = array("displayName","description","cn","givenName","sn","mail","co","mobile","company","displayName");
	
	$sr = ldap_search ( $con, $dn, $filter ) or die ("No Search");
	$data1 = ldap_get_entries ( $con, $sr );
	
	$first = ldap_first_entry($con, $sr);
	$data = ldap_get_dn($con,$first) or die(header( 'Location:index.php?q=fail' ));
	
	$userdn=$data;
	//echo $userdn;
	
	$auth_status = ldap_bind($con, $userdn, $password);
	if (!$auth_status) {
		unset($_SESSION['username'], $_SESSION['password']);
		die(header( 'Location:index.php?q=fail' ));
	}else{
		$_SESSION["username"] =  $_POST['username'];
		$_SESSION["password"] =  $_POST['password'];
		header ( 'Location:index_menue.php' );
	echo auth_status;
	}
}
	
	
	// if($bind){
		// $_SESSION['username'] = $username;
		// $_SESSION['password'] = $password;
		// header ( 'Location:all.php' );
	// }

    // if ($bind) {
		// $_SESSION["username"] =  $_POST['username'];
		// $_SESSION["password"] =  $_POST['password'];
		// $basedn = "cn=users,dc=domain,dc=local";
		// $filter = "(&(objectClass=user)(cn=*))";
		// $search = ldap_search($ldap, $basedn, $filter);
		// echo($search);
		// // header ( 'Location:all.php' );
	// }
?>
<html>
	<head>
		<title>onQuip</title>
		<!--<link rel="stylesheet" type="text/css" href="css/onQuip_style.css">-->
		<link rel="stylesheet" type="text/css" href="css/custom.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <!--<link rel="stylesheet" href="https://www.tgm.ac.at/media/mod_bootstrapnav3/css/bootstrap.css" type="text/css">-->
	</head>
	<body style="background: url(img/bg.jpg) no-repeat center center fixed;
  				-webkit-background-size: cover;
	  			-moz-background-size: cover;
  				-o-background-size: cover;
  				background-size: cover;">

        <div class="moduletable">
            <style>
                .navbar-nav > li > a{
                     color:#ffffff !important;
                     text-shadow: 0 0 0 !important;
                }

                .dropdown-menu .sub-menu {
                    left: 100%;
                    position: absolute;
                    top: 0;
                    visibility: hidden;
                    margin-top: -1px;
                }

                .dropdown-menu li:hover .sub-menu {
                    visibility: visible;
                }

                .dropdown:hover .dropdown-menu {
                    display: block;
                }

                .nav-tabs .dropdown-menu, .nav-pills .dropdown-menu, .navbar .dropdown-menu {
                    margin-top: 0;
                }

                .navbar .sub-menu:before {
                    border-bottom: 7px solid transparent;
                    border-left: none;
                    border-right: 7px solid rgba(0, 0, 0, 0.2);
                    border-top: 7px solid transparent;
                    left: -7px;
                    top: 10px;
                }
                .navbar .sub-menu:after {
                    border-top: 6px solid transparent;
                    border-left: none;
                    border-right: 6px solid #fff;
                    border-bottom: 6px solid transparent;
                    left: 10px;
                    top: 11px;
                    left: -6px;
                }

                .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus{
                     background: #0288d1 !important;
                }
            </style>
            <div class="navbar navbar-default" role="navigation" style="background-color:#1c4c98">
                <div class="container" style="background-color:#1c4c98">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar3">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/index.php"></a>
                    </div><!-- /.navbar-header -->
                    <div class="navbar-collapse collapse" id="navbar3">
                        
                    </div><!--/.nav-collapse -->
                </div><!--Container-->
            </div><!-- /.navbar -->
        </div>

		    <div align= "center">
    			<h1>onQuip Anmeldung</h1>
				<form action="#" method="POST">
					<label for="username" align="center">Username:</label><input id="username" type="text" name="username" /> </br>
					<label for="password">Password: </label><input id="password" type="password" name="password" /> </br>       
					<input type="submit" name="submit" value="Submit" />
				</form>
			</div>
		<script type="text/javascript">
			  var $ = document.querySelector.bind(document);
			  window.onload = function () {
				  Ps.initialize($('#table tbody'));
			  };
		</script>
	</body>
<html> 
<?php ?> 