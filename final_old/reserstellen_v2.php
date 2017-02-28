<html>
	<head>
		<title>onQuip: reservieren</title>
		<!--<link rel="stylesheet" type="text/css" href="css/onQuip_style.css">
		<link rel="stylesheet" type="text/css" href="css/custom.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">-->
        <link rel="stylesheet" href="https://www.tgm.ac.at/media/mod_bootstrapnav3/css/bootstrap.css" type="text/css">
		<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    	<link rel="stylesheet" type="text/css" media="screen" href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
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
                                <a href="equipment.php" class="dropdown-toggle" data-toggle="dropdown">Equipment<b class="caret"></b></a>
                                <ul class="dropdown-menu" style="background-color:#0277bd">
                                    <li><a href="equhinzufuegen.php" style="text-align: left;">Equipment hinzuf&uuml;gen</a></li>
                                    <li><a href="equbearbeiten.php" style="text-align: left;">Equipment bearbeiten</a></li>
                                    <li><a href="equentfernen.php" style="text-align: left;">Equipment entfernen</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!--Container-->
            </div><!-- /.navbar -->
        </div>

		<form action="reservieren.php" method="post" style="rein">
		    <div align="center">

    			<p/>
    			<h1>Reservierung erstellen</h1>
                <p/>
                    Equipment-Seriennummer: <input type="text" name="equipmentsn" value="<?php if (isset($_POST['equipmentsn'])) echo $_POST['equipmentsn']; ?>"><br>
                    Ausleihdatum: <div id="datetimepicker" class="input-append date"><input type="text" name="von" value="<?php if (isset($_POST['von'])) echo $_POST['von']; ?>">
					<span class="add-on">
				        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				    </span></div><br>
                    R&uuml;ckgabedatum: <div id="datetimepicker" class="input-append date"><input type="text" name="bis" value="<?php if (isset($_POST['bis'])) echo $_POST['bis']; ?>">
					<span class="add-on">
				        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				    </span></div><br>
                    Name(abk.): <input type="text" name="schueler" value="<?php if (isset($_POST['schueler'])) echo $_POST['schueler']; ?>"><br>
                    Telefonnummer: <input type="text" name="telefonnr" value="<?php if (isset($_POST['telefonnr'])) echo $_POST['telefonnr']; ?>"><br>
                    Zweck: <input type="text" name="zweck" value="<?php if (isset($_POST['zweck'])) echo $_POST['zweck']; ?>"><br>
                    <button type="submit" name="anlegen">Anlegen</button>

				<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
			    </script>
			    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">
			    </script>
			    <script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
			    </script>
			    <script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
			    </script>
			    <script type="text/javascript">
			      $('#datetimepicker').datetimepicker({
			        format: 'dd.MM.yyyy hh:mm:ss',
			        language: 'pt-EN'
			      });
			    </script>
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
