<?php session_start();
header('Content-Type: text/html; charset=utf-8');
require_once dirname(__FILE__) . '/../class/class.auth.php';
require_once dirname(__FILE__) . '/function.php';

?>
<!DOCTYPE HTML>
<html lang="fr">
	<head>
        <?php echo (!empty($titre))?'<title>'.$titre.'</title>':'<title> Creationsyorick.fr </title>';?>
	    <meta name="author" lang="fr" content="Yorick MAPET">
	    <meta name="identifier-url" content="http://creationsyorick.fr/">
	    <meta name="keywords" content="Yorick, Mapet, Yorick Mapet, Mapet Yorick, electronique, Arduino, Raspberry pi, informatique, systèmes embarqués, mécatronique">
	    <meta name="robots" content="index, follow">
	    <meta name="language" content="fr">
	    <meta name="description" content="Blog pluridiciplinaire">
	    <meta charset="utf-8">
	    <!-- Tell the browser to be responsive to screen width -->
	    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="/assets/css/main.css" />
		<link rel="shortcut icon" href="/images/logo_cy.png">
		<noscript><link rel="stylesheet" href="/assets/css/noscript.css" /></noscript>
		<script type="text/javascript" src="/class/JS/functions.js"></script>

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-180523663-1"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-180523663-1');
		</script>

	  	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	  	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	  	<!--[if lt IE 9]>
	  	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	  	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	  	<![endif]-->

	</head>
		<body class="is-loading">

		<!-- Wrapper -->
			<div id="wrapper" class="fade-in">

				<!-- Intro -->
					<div id="intro">
						<h2>Creationsyorick.fr</h2>
						<p>Passionné par l'innovation technologique, ma soif pour la connaissance n'a pas de limite ! Dans ce blog  je tiens à partager avec vous mes passions. Et Parce que je veux comprendre, pourquoi et comment le monde tourne !</p>
						<ul class="actions">
							<li><a href="#header" class="button icon solid solo fa-arrow-down scrolly">Continue</a></li>
						</ul>
					</div>

				<!-- Header -->
					<header id="header">
						<a href="/" class="logo">CY.fr</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li class="active"><a href="/">Home</a></li>
							<li><a href="generic.php">Projets</a></li>
							<li><a href="../pages/Etudes/etudes.php">Etudes</a></li>
							<li><a href="../about.php">A Propos</a></li>
							<li><a href="../pages/Etudes/MAPET_Yorick_CV.pdf">Mon CV</a></li>
						</ul>
						<ul class="icons">
							<li><a href="https://twitter.com/YorickMpt" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="https://www.facebook.com/yorick.orionis" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="https://www.instagram.com/yorick_orns/?hl=fr" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="https://discord.gg/PNCzdKj" class="icon brands fa-discord"><span class="label">Discord</span></a></li>
							<li><a href="https://github.com/Yorick-xy" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
							<li>
								<?php 
									if (!isset($_SESSION['username'])) {
										?>
											<a href="../users/login.php" class="icon fa-sign-in"></a>
										<?php
									}else{
										echo '<a href="users/profile.php" class="icon fa-user-circle"></a>';
										?>
										<a href="users/logout.php" class="icon fa-sign-out">
										<span class="label">Logout</span>
										<?php
										if ($_SESSION['rank'] >= 6) {
											echo '<a href="admin/" class="btn btn-default btn-flat">Admin</a>';
										}
									}
								 ?>
						 	</li>
						</ul>
					</nav>