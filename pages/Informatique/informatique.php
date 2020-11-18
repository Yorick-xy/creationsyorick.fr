<?php session_start();
require_once dirname(__FILE__) . '/../../class/autoload.php';
require_once dirname(__FILE__) . '/../../class/class.auth.php';
require_once dirname(__FILE__) . '/../../include/function.php';
?>
<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<title>Informatique</title>
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
				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<section class="post">
								<header class="major">
									<span class="date">Octobre 29, 2020</span>
									<h1>Bienvenue dans la matrice...</h1>
									<p>Aenean ornare velit lacus varius enim ullamcorper proin aliquam<br />
									facilisis ante sed etiam magna interdum congue. Lorem ipsum dolor<br />
									amet nullam sed etiam veroeros.</p>
								</header>
								<div class="image main"><img src="images/pic01.jpg" alt="" /></div>
								<h2>Projet IA</h2>
								<p>Ce projet consiste à créer un algorithme de tri puis d'y insérer un algorithme génétique pour déterminer les meilleurs paramètre à prendre afin d'obtenir un algorithme de tri le plus efficace. </br> Donc voir au bout de combien de générations on trouve les meilleurs paramètres.</br>Le développement est effectué sur Qt Creator et développé en C++</p>
								<h2>Projet POO en C++</h2>
								Développer une population la plus parfaite en utilisant un algorithme génétique. </br>- Choisir une courbe aléatoire, qui représente une population.</br>- Trouver un nombre sur l'axe des ordonnées le plus proche de 0. Il s'agit de notre Alpha.</br> - Parcourir la population et choisir un nombre aleatoire.</br>- Le combiner avec l'alpha (reproduction) et extraire le meilleur gène. </br> - Garder ce gène pour ensuite le faire reproduire avec un autre nombre aléatoire dans la courbe.</br> - Reitérer l'opération jusqu'a obtenir la meilleur population.
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
