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
		<form name="main_anzeige.php" action="" method="" style="rein">
			<div align="center">
				<h1>onQuip</h1>
				<script language="JavaScript">
					<!--
					var date=new Date();
					var dd=date.getDate();
					var mm=date.getMonth();
					var yy=date.getYear();
					if(yy < 1900)yy+=1900;
					document.write("<font size=+2>Kalender für ", mm+1, ".", yy, "</font><br>");

					//Wochentag des 1. des Monats ermitteln
					date.setDate(1);
					var kk=date.getDay();
					//Setze Sonntag von 0 auf das allgemein gebräuchliche 7
					if(kk == 0) {
						kk=7;
					}

					document.write("<table border>");
					document.write("<tr><th>Mo<th>Di<th>Mi<th>Do<th>Fr<th>Sa<th>So</tr>");
					document.write("<tr>");

					//erste Zeile auffuellen
					for(var ii=1; ii<kk; ii++) {
						document.write("<td>");
					}

					for(ii=1; ii<32; ii++) {
						date.setDate(ii);
						/*Wenn der aktuelle Monat sich ändert -
						sprich das aktuelle Monat hat beispielsweise nur 30 Tage -
						daraus folgt der Monat springt auf das nächste - dann soll abgebrochen werden
						*/
						if(date.getMonth() != mm)break;

						if(ii == dd) {
							//den aktuellen Tag fett
							document.write("<td><font color='#ff0000'><b>", ii, "</b></font></td>");
						} else {
							document.write("<td>",ii,"</td>");
						}
						kk++;
						//Wenn die aktuelle Woche vorbei ist
						if(kk > 7) {
							document.write("</tr>\n<tr>");
							kk=1;
						}
					}
					document.write("</tr>\</table>");
					//-->
				</script>
				<p/>
				<div id="table" class="wrapper">
					<table id='table'>
						<thead>
							<tr>
								<th><b>Marker</b></th>
								<th><b>ID</b></th>
								<th><b>Seriennummer</b></th>
								<th><b>von</b></th>
								<th><b>bis</b></th>
								<th><b>Sch&uuml;ler</b></th>
								<th><b>Telefonnr.</b></th>
								<th><b>Lehrer abholen</b></th>
								<th><b>Lehrer r&uuml;ckgabe</b></th>
								<th><b>Zweck</b></th>
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
								$queryreservierungen= "SELECT * FROM reservierungen LIMIT 1000;";
								$result= mysql_query($queryreservierungen, $link);
								if(!$result) {
									echo 'Query fail';
								}
								while ($row = mysql_fetch_assoc($result)) {
									echo '<tr>';
										echo '<td><input type= "radio" name= "marker">'.'</td>';
										echo '<td>'.$row['id'].'</td>';
										echo '<td>'.$row['equipmentsn'].'</td>';
										echo '<td>'.$row['von'].'</td>';
										echo '<td>'.$row['bis'].'</td>';
										echo '<td>'.$row['schueler'].'</td>';
										echo '<td>'.$row['telefonnr'].'</td>';
										echo '<td>'.$row['lehrerabholen'].'</td>';
										echo '<td>'.$row['lehrerrueck'].'</td>';
										echo '<td>'.$row['zweck'].'</td>';
									echo '</tr>';
								}
							?>
						</tbody>
					</table>
				</div>
				<p/><p/>
				<input type="button" name="hinzufuegen" value="Hinzuf&uuml;gen" onclick="window.location.href='reserstellen.php'">
				<input type="button" name="loeschen" value="L&ouml;schen" onclick="window.location.href='resstornieren.php'">
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
