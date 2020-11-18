<?php session_start();
require_once dirname(__FILE__) . '/../../class/autoload.php';
require_once dirname(__FILE__) . '/../../class/class.auth.php';
require_once dirname(__FILE__) . '/../../include/function.php';
?>
<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<title>Creationsyorick.fr</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../../assets/css/main.css" />
		<link rel="shortcut icon" href="../../images/logo.png">
		<noscript><link rel="stylesheet" href="../../assets/css/noscript.css" /></noscript>
		<script type="text/javascript" src="../../class/JS/functions.js"></script>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-180523663-1"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-180523663-1');
		</script>

	</head>
		<body class="is-loading">

		<!-- Wrapper -->
			<div id="wrapper" class="fade-in">

				<!-- Intro -->
					<div id="intro">
						<h2>Creationsyorick.fr</h2>
						<p>Passionné par l'innovation technologigue, ma soif pour la connaissance n'a pas de limite ! Dans ce blog  je tiens à partager avec vous mes passions. Et Parce que je veux comprendre, pourquoi et comment le monde tourne !</p>
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
							<li><a href="/">Home</a></li>
							<li><a href="../../generic.php">Projets</a></li>
							<li class="active"><a href="../../generic.php">Blog</a></li>
							<li><a href="../../about.php">A Propos</a></li>
							<li><a href="../../pages/Etudes/MAPET_Yorick_CV.pdf">Mon CV</a></li>
						</ul>
						<ul class="icons">
							<li><a href="https://twitter.com/YorickMpt" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="https://www.facebook.com/yorick.orionis" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="https://www.instagram.com/yorick_orns/?hl=fr" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="https://discord.com/channels/748667690712956960/748667690712956964" class="icon brands fa-discord"><span class="label">Discord</span></a></li>
							<li>
								<?php 
									if (!isset($_SESSION['username'])) {
										?>
											<a href="../../users/login.php" class="icon fa-sign-in">login</a>
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
				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<section class="post">
								<header class="major">
									<span class="date">Août 24, 2020</span>
									<h1>Electronique</h1>
									<p>L'électronique, je trouve cette discipline juste fascinante car on peut contrôler tout et n'importe quoi en manipulant l'énergie électrique :).</p>
								</header>
								<div class="image fit">
									<img src="../../images/Electronique/carte-electronique.jpg" alt="img_electro" style="height:300px;width:400px;margin:auto;"/>
								</div>
								<p>
								Dans un premier temps, qu'est-ce que l'électronique ?, quels sont les composants de cette discipline et comment on les utilises ? <br/> Voici les questions auxquelles je vais tenter d'y répondre ici en déployant les moyens les plus contrêts :D. C'est bien le blabla mais la pratique c'est mieux !
								</p>
								<h2>Définition (Wikipédia)</h2>
								<p>L'électronique est <b>une science technique</b>, ou <b>science de l'ingénieur</b>, constituant l'une des branches les plus importantes de la <b>physique appliquée</b>, qui étudie et conçoit les structures effectuant des <b>traitements de signaux électriques</b>, c'est-à-dire de courants ou de tensions électriques, porteurs d’informations.<br/> Bon c'est peut-être pas très clair tout ça :D on va approfondir tout ça.</p>
								<h2>Les domaines où intervient l'électronique</h2>
								<p>Souvent associé avec l'informatique, l'électronique intervient dans de nombreuses industries et les nouvelles technologies:<br>Automobile, Aéronautique et Spatial, Pharmaceutique et Médecine, BTP, Télécommunication...
								</p>
								<h2>Le matériel</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus rutrum facilisis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam tristique libero eu nibh porttitor fermentum. Nullam venenatis erat id vehicula viverra. Nunc ultrices eros ut ultricies condimentum. Mauris risus lacus, blandit sit amet venenatis non, bibendum vitae dolor. Nunc lorem mauris, fringilla in aliquam at, euismod in lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In non lorem sit amet elit placerat maximus. Pellentesque aliquam maximus risus. Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis. Praesent rutrum sem diam, vitae egestas enim auctor sit amet. Pellentesque leo mauris, consectetur id ipsum.
								</p>
							</section>

					</div>

<!-- Footer -->
					<footer id="footer">
						<section>
							<form method="post" action="#">
								<div class="fields">
									<div class="field">
										<label for="name">Nom *</label>
										<input type="text" name="name" id="name" value="
										<?php 
											if (isset($_POST['nom'])) echo htmlspecialchars($_POST['nom']);?>" 
										/>
									</div>
									<div class="field">
										<label for="email">Email *</label>
										<input type="text" name="email" id="email" value="
										<?php 
											if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']);?>" 
										/>
									</div>
									<div class="field">
										<label for="message">Message *</label>
										<textarea name="message" id="message" rows="3">
											<?php 
												if (isset($_POST['commentaire'])) echo htmlspecialchars($_POST['commentaire']);
											?>												
										</textarea>
									</div>
								</div>
								<ul class="actions">
									<li><input type="submit" value="Envoyer" class="primary" /></li>
									<li><input type="reset" value="Reset" /></li>
								</ul>
							</form>
						</section>
						<section class="split contact">
							<section class="alt">
								<h3>Addresse</h3>
								<p>Quelque part dans le Sud-Ouest de la France</p>
							</section>
							<section>
								<h3>Email</h3>
								<p><a href="#">yorick@creationsyorick.fr</a></p>
							</section>
							<section>
								<h3>Social</h3>
								<ul class="icons alt">
									<li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
								</ul>
							</section>
						</section>
					</footer>

				<!-- Copyright -->
					<div id="copyright">
						<ul><li>&copy; Yorick</li><li>Design: <a href="https://html5up.net">HTML5 UP</a></li></ul>
					</div>

			</div>

		<!-- Scripts -->
			<script src="../../assets/js/jquery.min.js"></script>
			<script src="../../assets/js/jquery.scrollex.min.js"></script>
			<script src="../../assets/js/jquery.scrolly.min.js"></script>
			<script src="../../assets/js/browser.min.js"></script>
			<script src="../../assets/js/breakpoints.min.js"></script>
			<script src="../../assets/js/util.js"></script>
			<script src="../../assets/js/main.js"></script>

	</body>
</html>