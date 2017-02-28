<?php
SESSION_START();
if(empty($_SESSION['username'])||empty($_SESSION['password'])){
    header ( 'Location:index.php' );
}
?>
<html>
	<head>
		<title>onQuip</title>
        <link rel="stylesheet" type="text/css" href="css/onQuip_style.css">
		<link rel="stylesheet" type="text/css" href="css/custom.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
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

		<form name="permissions.php" action="" method="" style="rein">
		          <div align="center">
    				<p/>
    				<h1>Berechtigungen</h1>
                    <p/>
                    <div>
                        <div id="table" class="wrapper">
        					<table id='table'>
        						<thead>
        							<tr style="width: 100%">
                                        <th style="width: 10%"><b>Marker</b></th>
        								<th style="width: 45%"><b>Name</b></th>
        								<th style="width: 45%"><b>Berechtigung</b></th>
        							</tr>
        						</thead>
        						<tbody>
        							<?php
        								$link= mysql_connect('localhost', 'root', 'Schu3ler');
        								if(!$link) {
        									die('Verbindung fehlgeschlagen: '.mysql_error());
        								}else {
        									$_POST["link"]= $link;
        								}
        								if(!mysql_select_db('onQuip')) {
        									echo 'Datenbank nicht gefunden!';
        								}
        								$queryreservierungen= "SELECT * FROM permissions;";
        								$result= mysql_query($queryreservierungen, $link);
        								if(!$result) {
        									echo 'Query fail';
        								}
        								while ($row = mysql_fetch_assoc($result)) {
        									echo '<tr style="width: 100%">';
                                                echo '<td style="width: 10%"><input type= "radio" name= "marker">'.'</td>';
        										echo '<td style="width: 45%">'.$row['name'].'</td>';
        										echo '<td style="width: 45%">'.$row['permission'].'</td>';
        									echo '</tr>';
        								}
        							?>
                                    <tr style="width: 100%">
                                        <td style="width: 10%; visibility: hidden"><input type= "radio" name= "marker"></td>
                                        <td style="width: 45%"><input type="text" style="width: 100%" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>"></td>
                                        <td style="width: 45%"><input type="text" style="width: 100%" name="permission" value="<?php if (isset($_POST['permission'])) echo $_POST['permission']; ?>"></td>
                                    </tr>
        						</tbody>
        					</table>
        				</div>
                        <button type="submit" name="anlegen">Anlegen</button>
    					<!--<input type="button" name="abbrechen" value="Abbrechen" onclick="window.location.href='permissions.php'">-->
                    </div>
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
