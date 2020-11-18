<?php 
//echo 'Vous allez être redirigé dans 1 secondes';
//sleep(1);
//header('Location: http://creationsyorick.fr/construction.php');

 ?>
<?php session_start();
header('Content-Type: text/html; charset=utf-8');
require_once dirname(__FILE__) . '/../../class/class.auth.php';
require_once dirname(__FILE__) . '/../../include/function.php';
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
		<link rel="stylesheet" href="../../assets/css/main.css" />
		<link rel="shortcut icon" href="../../images/logo_cy.png">
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
							<li><a href="/">Home</a></li>
							<li><a href="../../generic.php">Projets</a></li>
							<li class="active"><a href="../pages/Etudes/etudes.php">Etudes</a></li>
							<li><a href="/../../about.php">A Propos</a></li>
							<li><a href="MAPET_Yorick_CV.pdf">Mon CV</a></li>
						</ul>
						<ul class="icons">
							<li><a href="https://twitter.com/YorickMpt" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="https://www.facebook.com/yorick.orionis" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="https://www.instagram.com/yorick_orns/?hl=fr" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="https://discord.gg/PNCzdKj" class="icon brands fa-discord"><span class="label">Discord</span></a></li>
							<li>
								<?php 
									if (!isset($_SESSION['username'])) {
										?>
											<a href="../users/login.php" class="icon fa-sign-in">login</a>
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
									<span class="date">17 Septembre, 2020</span>
									<h1>Mon parcours scolaire</h1>
									<p>
										Toujours en quête de ma voie, je suis passé par pas mal de formations :D
									</p><br>
								</header>
								<div class="image main"><img src="diploma-1390785_640.png" alt="diplome" /></div>
									<p>
										Après avoir obtenu mon Bac STI2D spécialité SIN (Systèmes d'Informations et Numérique) avec une mention BIEN. <br> Je me suis dirigé vers une licence Physique Chimie avec une spécialité en Astrophysique. Nayant pas aboutie jusqu'à la fin de la licence, <br> je me suis dirigé vers un DUT Génie Indutriel et Maintenance (GIM) <br> puis une Licence Pro en Mécatronique Cobotique et Maintenance avec une mention Assez Bien, passé de peu à la BIEN ><. <br> A Présent je suis en Mastère 1 Robotique et Ingénierie Systèmes spécialité Expert Mécatronique et Systèmes Embarqués. 
									</p>
								<ul>
									<li>Bac STI2D (SIN)</li>
									<ul>
										<li>
											<p>
												Projet de Bac : Domobox, <br> Réalisation d'une application permettant la gestion d'une maison connectée depuis un interface mobile. Application réalisé en HTML5, CSS3, PHP5, Javascript et Arduino pour recolter les informations depuis les capteurs.
											</p>
										</li>
									</ul>
									<li>
										<a href="https://www.u-bordeaux.fr/formation/PRLIPC/licence-physique-chimie">Licence Physique Chimie</a>
									</li>
									<ul>
										<li>
											<p>
												Avec une spécialité en Astrophysique, Beaucoup de théorie... :D <br> - Création de deux petits jeux en Python (Stick Hero et un jeu du style Snake)
											</p>
											<p>
												-> Résumé et Programme,
												<a href="https://www.u-bordeaux.fr/formation/PRLIPC/licence-physique-chimie">Ici</a>
											</p>
										</li>
									</ul>
									<li>
										<a href="https://cache.media.enseignementsup-recherche.gouv.fr/file/DUT_-_Programmes_pedagogiques_nationaux/54/3/PPN_GIM_678543.pdf">
										DUT Génie Industriel et Maintenance
										</a>										
									</li>
									<ul>
										<p>- Projet de 1ère Année : Réalisation d'une mini éolienne <br>
											- Projet de 2ème Année : Réalisation d'une déchiqueteuse de déchets d'imprimantes 3D 
										</p>
										<p>
											-> Le résumé de la formation, 
											<a href="https://www.letudiant.fr/etudes/dut/dut-genie-industriel-et-maintenance.html">Ici</a><br>
											-> Et le programme pédagogique, 
											<a href="https://cache.media.enseignementsup-recherche.gouv.fr/file/DUT_-_Programmes_pedagogiques_nationaux/54/3/PPN_GIM_678543.pdf">Ici</a>									
										</p>
									</ul>
									<li>
										<a href="http://www.iut.unilim.fr/les-formations/licences-professionnelles/maintenance-et-technologie-systemes-pluritechniques-maintenance-mecatronique-cobotique/">Licence Pro Mécatronique Cobotique et Maintenance</a>
									</li>
									<ul>
										<li>
											<p>Alternant Technicien de Maintenance à Schneider Electric <br> 
											- Développement et déploiement d'une solution permettant la réduction des temps d'arrêt des machine. Application utilisant la Réalité Augmentée.
											</p>
											-> Le résumé de la formation, 
											<a href="http://www.iut.unilim.fr/les-formations/licences-professionnelles/maintenance-et-technologie-systemes-pluritechniques-maintenance-mecatronique-cobotique/">Ici</a><br>
											-> Et la fiche formation, 
											<a href="https://www.iut.unilim.fr/wp-content/uploads/sites/3/2019/07/Fiches-LP-GIM-MMC.pdf">Ici</a>
										</li>
									</ul>
									<li>
										<a href="https://www.ynov.com/formation/ynov-masteres/robotique-et-mecatronique/">Mastère Robotique et Ingénierie Systèmes</a>
									</li>
									<ul><li>Alternant Chef de Projets Systèmes Embarqués à Schneider Electric</li></ul>
								</ul>
							</section>

					</div>

<!-- Footer -->
					<footer id="footer">
						<section>
							<?php echo $error; ?>
							<form method="post" action="#">
								<div class="fields">
									<div class="field">
										<label for="name">Nom</label>
										<input type="text" name="name" id="name" />
									</div>
									<div class="field">
										<label for="email">Email</label>
										<input type="text" name="email" id="email" />
									</div>
									<div class="field">
										<label for="message">Message</label>
										<textarea name="message" id="message" rows="3"></textarea>
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
								<p><a href="mail:to">yorick@creationsyorick.fr</a></p>
							</section>
							<section>
						 		<h3>Social</h3>
								<ul class="icons alt">
									<li>
										<a href="https://twitter.com/YorickMpt" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a>
									</li>
									<li>
										<a href="https://www.facebook.com/yorick.orionis" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a>
									</li>
									<li>
										<a href="https://www.instagram.com/yorick_orns/?hl=fr" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a>
									</li>
									<li>
										<a href="https://github.com/" class="icon brands alt fa-github"><span class="label">GitHub</span></a>
									</li>
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