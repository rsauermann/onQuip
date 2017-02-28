<?php
SESSION_START();
if(empty($_SESSION['username'])||empty($_SESSION['password'])){
    header ( 'Location:index.php' );
}
?>
<html>
	<head>
		<title>onQuip: storniert</title>
		<!--<link rel="stylesheet" type="text/css" href="css/onQuip_style.css">
		<link rel="stylesheet" type="text/css" href="css/custom.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">-->
        <link rel="stylesheet" href="https://www.tgm.ac.at/media/mod_bootstrapnav3/css/bootstrap.css" type="text/css">
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
                        <a class="navbar-brand" href="/index_menue.php"></a>
                    </div><!-- /.navbar-header -->
                    <div class="navbar-collapse collapse" id="navbar3">
                        <ul class="nav navbar-nav navbar-left">
                            <li class="dropdown">
                                <a href="index.php" class="dropdown-toggle" data-toggle="dropdown">Home<b class="caret"></b></a>
                            </li>
                            <li class="dropdown">
                                <a href="reservierungen.php" class="dropdown-toggle" data-toggle="dropdown">Reservierungen<b class="caret"></b></a>
                                <ul class="dropdown-menu" style="background-color:#0277bd">
                                    <li><a href="reserstellen.php" style="text-align: left;">Reservierung erstellen</a></li>
                                    <li><a href="resstornieren.php" style="text-align: left;">Reservierung stornieren</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="Equipment.php" class="dropdown-toggle" data-toggle="dropdown">Equipment<b class="caret"></b></a>
                                <ul class="dropdown-menu" style="background-color:#0277bd">
                                    <li><a href="equhinzufuegen.php" style="text-align: left;">Equipment hinzuf&uuml;gen</a></li>
                                    <li><a href="equbearbeiten.php" style="text-align: left;">Equipment bearbeiten</a></li>
                                    <li><a href="equentfernen.php" style="text-align: left;">Equipment entfernen</a></li>
                                </ul>
                            </li>
                        </ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
                                <a href="logout.php" class="dropdown-toggle" data-toggle="dropdown">Logout<b class="caret"></b></a>
                            </li>
						</ul>
                    </div><!--/.nav-collapse -->
                </div><!--Container-->
            </div><!-- /.navbar -->
        </div>

		<form name="equipment_entfernen.php" action="" method="" style="rein">
		          <div align="center">

    				<p/>
    				<h1>Equipment entfernen</h1>

					<?php
						$servername = "localhost";
						$username = "root";
						$password = "Schu3ler";
						$dbname = "onQuip";

						if( isset($_POST["entfernen"]) ) {
							// Create connection
							$conn = new mysqli($servername, $username, $password, $dbname);
							// Check connection
							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							}

                            $sql = "DELETE FROM equipment WHERE inventarnummer='". $_POST['equipmentin'] ."' AND seriennummer='". $_POST['equipmentsn'] ."' AND bezeichnung='". $_POST['bezeichnung'] ."';";

							if ($conn->query($sql) === TRUE) {
								echo "Equipment wurde entfernt!";
							} else {
								echo "Fehler beim Stornieren: " . $conn->error;
							}

							$conn->close();
						}
					?>
    			</div>
		</form>
		<script type="text/javascript">
			  var $ = document.querySelector.bind(document);
			  window.onload = function () {
				  Ps.initialize($('#table tbody'));
			  };
		</script>
	</body>
<html>
