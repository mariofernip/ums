<!Doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $pageTitle; ?></title>
        <meta name="description" content="Administración Sistema de Evaluación">
		<meta name="author" content="Talento Humano">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/stylesheet.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <header class="container header_area fix" style="background-color: skyblue">
			<div id="sticker" style="background-color: skyblue">
				<div class="head">
					<a href="#"><div class="logo fix">
						<!-- <img src="img/logo.png" alt="" /> -->
					</div></a></div>
					<div style="color: white;margin-left: 20px">
						<h2>Administración Sistema de Evaluación</h2>
					</div>
				</div>
				<div class="menu fix">
					<div class="dateshow fix"><p><?php echo "Date : ".date("d M Y"); ?></p></div>
				<!--	<ul>
						<li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
						
						<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> User</a></li>
					</ul>
				-->
				</div>
			</div>
		</header>
		<div class="maincontent container fix">
			<div id="stickerside" style="background-color: skyblue">
				<div class="sidebar fix" style="background-color: skyblue">
						<ul style="margin-right: 20px;">
							<li><span class="spcl"><i class="fa fa-server" aria-hidden="true"></i> Administrador</span></li>
								<ul>
									<li><a href="index.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
								</ul>
							
							<li><span class="spcl"><i class="fa fa-male" aria-hidden="true"></i>Area Facultad</span></li>
								<ul>
									<li><a href="facultylogin.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
									<li><a href="fct_single_profile.php"><i class="fa fa-user" aria-hidden="true"></i> Perfil</a></li>
									<li><a href="class_att.php"><i class="fa fa-database" aria-hidden="true"></i> Puntaje Asistencia</a></li>
								</ul>
							
							<li><span class="spcl"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Area Aplicante</span></li>
								<ul>
									<li><a href="st_login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
									<li><a href="st_reg.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Registro</a></li>
									<li><a href="st_profile.php"><i class="fa fa-user" aria-hidden="true"></i> Perfil</a></li>
									<li><a href="#"><i class="fa fa-outdent" aria-hidden="true"></i> Resultado</a></li>
								</ul>
							
						
						</ul>
					
					</div>
				</div>
				<div class="content fix">