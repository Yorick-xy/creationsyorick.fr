<?php
require_once dirname(__FILE__) . '/../class/class.auth.php';
/*
 * cette fonction sert à nettoyer et enregistrer un texte
 */
function myEscape($text){
	$text = htmlspecialchars(trim($text), ENT_QUOTES);
	if (1 === get_magic_quotes_gpc())
	{
		$text = stripslashes($text);
	}

	$text = nl2br($text);
	return $text;
}

/*
 * Cette fonction sert à vérifier la syntaxe d'un email
 */
function isEmail($email){
	$value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
	return (($value === 0) || ($value === false)) ? false : true;
}

/*
* Fonction permettant d'envoyer un email
*/

function SendMail(){
    if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "yorick@creationsyorick.fr";
    $email_subject = "Le sujet de votre email";
 
    function died($error) {
        // your error code can go here
        echo "Nous sommes désolés, mais des erreurs ont été détectées dans le" . " formulaire que vous avez envoyé. ";
        echo "Ces erreurs apparaissent ci-dessous.<br /><br />";
        echo $error."<br /><br />";
        echo "Merci de corriger ces erreurs.<br /><br />";
        die();
    }
 
 
    // si la validation des données attendues existe
     if(!isset($_POST['nom']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died(
'Nous sommes désolés, mais le formulaire que vous avez soumis semble poser' .
' problème.');
    } 
 
    $nom = $_POST['nom']; // required
    $email = $_POST['email']; // required
    $message = $_POST['message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
    if(!preg_match($email_exp,$email)) {
      $error_message .= 
'L\'adresse e-mail que vous avez entrée ne semble pas être valide.<br />';
    }
   
      // Prend les caractères alphanumériques + le point et le tiret 6
      $string_exp = "/^[A-Za-z0-9 .'-]+$/";
   
    if(!preg_match($string_exp,$nom)) {
      $error_message .= 
'Le nom que vous avez entré ne semble pas être valide.<br />';
    }
   
    if(!preg_match($string_exp,$prenom)) {
      $error_message .= 
'Le prénom que vous avez entré ne semble pas être valide.<br />';
    }
   
    if(strlen($message) < 2) {
      $error_message .= 
'Le message que vous avez entré ne semble pas être valide.<br />';
    }
   
    if(strlen($error_message) > 0) {
      died($error_message);
    }
 
    $email_message = "Détail.\n\n";
    $email_message .= "Nom: ".$nom."\n";
    $email_message .= "Email: ".$email."\n";
    $email_message .= "message: ".$message."\n";
 
    // create email headers
    $headers = 'From: '.$email."\r\n".
    'Reply-To: '.$email."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($email_to, $email_subject, $email_message, $headers);
    ?>
     
    <!-- mettez ici votre propre message de succès en html -->
     
    <p>Merci de nous avoir contacter. Nous vous contacterons très bientôt.</p>
     
    <?php

    }
}

/*
* Fonction calculant mon age
*/

function age(){
	 // stockage de date
        $an_now=date("Y");
        $mois_now=date("m");
        $jour_now=date("d");

        $date_naiss="01/04/1996";
        $countMonth=date("n");

        //on décortique la date de naissance (jour,mois et année):
        $an=substr($date_naiss,6,4);
        $mois=substr($date_naiss,3,2);
        $jour=substr($date_naiss,0,2);

        //on soustrait l'année de naissance de l'année actuelle :
        $age=$an_now-$an;

        //si le jour de naissance n'est pas encore passé, on retire une année :
        if( ($mois>$mois_now) or (($mois==$mois_now) and ($jour>$jour_now)) )
        {
           $age = $age - 1;
        }

        //compte les mois
        //-------------
        $mois_actu = $mois_now;
        $jour_actu = $jour_now;
        $annee_actu = date('Y');
        $jour_naissance = $jour;
        $mois_naissance = $mois;
        $annee_naissance = $an;
        $mois_total = $mois_actu - $mois_naissance;    
        $mois_total1 = 12 - abs($mois_total);

        if ($mois_total1 <= 12) {
        	$mois_total2 = $mois_actu - $mois_naissance;
        }
        if ($mois_total2 < 0) {
        	$mois_total2 = $mois_total1;
        }

        //----------------
        
        //-----------

        echo $age.' ans et '.$mois_total2.' mois';
        $nbrmois = $mois_now - $mois;
        if($nbrmois<12){
            $anniv = $mois - $mois_now; // compte le nombre de mois restant avant le prochain anniv
        }
        $agesup = $age + 1; // age supérieur
        if($mois_now == $mois){
            $anni = 12 - $mois_now;
        }
        //echo $agesup.' ans dans '.$anniv.' mois';

        /**echo $age.' ans + '; 
        $nbrmois = $mois_now - $mois;
        echo $nbrmois.' mois';**/
        
}

function dateFormat(){
    /*
    * Fonction pour ajuster le format de la date en français
    */
    /*$req = $db->query('SELECT * FROM news');
    while ($data = $req->fetch()) {
        $dateAjout = $data['dateAjout'];
    }
    return $dateAjout;*/
    echo date('d/m/Y').' à '.date('G').'h:'.date('i');
    
}

function dateFr(){
    /*Fonction qui modifie le format de la date et l'afficher en français*/

    switch (date('m')) {
        case 1:
            echo date('d').' Janvier '.date('Y');
            break;
        case 2:
            echo date('d').' Février '.date('Y');
            break;
        case 3:
            echo date('d').' Mars '.date('Y');
            break;
        case 4:
            echo date('d').' Avril '.date('Y');
            break;
        case 5:
            echo date('d').' Mai '.date('Y');
            break;
        case 6:
            echo date('d').' Juin '.date('Y');
            break;
        case 7:
            echo date('d').' Juillet '.date('Y');
            break;
        case 8:
            echo date('d').' Août '.date('Y');
            break;
        case 9:
            echo date('d').' Septembre '.date('Y');
            break;
        case 10:
            echo date('d').' Octobre '.date('Y');
            break;
        case 11:
            echo date('d').' Novembre '.date('Y');
            break;
        case 12:
            echo date('d').' Décembre '.date('Y');
            break;
        
        default:
            # code...
            break;
    }


}

function getIp(){ // Récupérer une adresse ip
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) return $_SERVER['HTTP_X_FORWARDED_FOR'];
        else return $_SERVER['REMOTE_ADDR'];
}

function viderSession(){
    foreach($_SESSION as $cle => $element){
        unset($_SESSION[$cle]);
    }
}

function verifConnexion(){ // Vérifier si une connexion existe
    if (isset($_SESSION['username'])) {
       ?>
         <script type="text/javascript">
         alert("Vous êtes déjà connecté");
         document.location.href="javascript:window.history.go(-1)";
         </script>
       <?php
    }
}

function userStatus(){
    $req = $db->query('SELECT * FROM cy_users');
    while ($status = $req->fetch()) {
        echo $status['active'];
    }
    return $status;
}


// -- transforme toutes les urls du texte en liens cliqualbles
function url($lien)
{
    $ret = ' ' . $lien;
    $ret = preg_replace("#(^|[\n ])([\w]+?://[^ \"\n\r\t<]*)#is", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $ret);
    $ret = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r<]*)#is", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $ret);
    $ret = preg_replace("#(^|[\n ])([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1<a href=\"mailto:\\2@\\3\">\\2@\\3</a>", $ret);
    $ret = substr($ret, 1);
    return($ret);
}

function liensite($link){
    echo '<a href="http://zaphy.izdev.fr/blog_yoyo">http://zaphy.izdev.fr/</a>'.$link;
}

function getIdProfil(){
    $req = $db->query('SELECT * FROM cy_users ORDER BY id ASC');
    $req->setFetchMode(PDO::FETCH_ASSOC);
    foreach ($req as $user){
        echo $user['id'];
    }
}

function Smile(){
    $smile = str_replace(";)", "<img src='../images/smileys/clin_oeil.png' style='height:20px;width:20px;'/>", $smile);
    $smile = str_replace(":)", "<img src='../images/smileys/smile.png' style='height:20px;width:20px;'/>", $smile).'</p>';
    $smile = str_replace(":p", "<img src='../images/smileys/langue.png' style='height:20px;width:20px;'/>", $smile).'</p>';
    $smile = str_replace("???", "<img src='../images/smileys/intero.gif' style='height:20px;width:20px;'/>", $smile).'</p>';

    $smile = str_replace("-_-", "<img src='../images/smileys/agace.png' style='height:20px;width:20px;'/>", $smile).'</p>';
    $smile = str_replace("^^", "<img src='../images/smileys/wesh.png' style='height:20px;width:20px;'/>", $smile).'</p>';
    $smile = str_replace("<3", "<img src='../images/smileys/love.png' style='height:20px;width:20px;'/>", $smile).'</p>';
    $smile = str_replace(":D", "<img src='../images/smileys/big_smile.png' style='height:20px;width:20px;'/>", $smile);

    $smile = str_replace(":$", "<img src='../images/smileys/rougie.png' style='height:20px;width:20px;'/>", $smile).'</p>';
    $smile = str_replace("^^'", "<img src='../images/smileys/euh.png' style='height:20px;width:20px;'/>", $smile).'</p>';
    $smile = str_replace(";D", "<img src='../images/smileys/mdr.png' style='height:20px;width:20px;'/>", $smile).'</p>';
    $smile = str_replace(":D", "<img src='../images/smileys/big_smile.png' style='height:20px;width:20px;'/>", $smile).'</p>';
    $smile = str_replace("zzz", "<img src='../images/smileys/dodo.png' style='height:20px;width:20px;'/>", $smile).'</p>';
    $smile = str_replace("bg", "<img src='../images/smileys/bg.png' style='height:20px;width:20px;'/>", $smile).'</p>';

}

// Fonction qui permet de mettre à jour le compteur de visites
function compter_visite(){
    // On va utiliser l'objet $pdo pour se connecter, il est créé en dehors de la fonction
    // donc on doit indiquer global $pdo; au début de la fonction
    global $pdo;
     
    // On prépare les données à insérer
    $ip   = $_SERVER['REMOTE_ADDR']; // L'adresse IP du visiteur
    $date = date('Y-m-d');           // La date d'aujourd'hui, sous la forme AAAA-MM-JJ
     
    // Mise à jour de la base de données
    // 1. On initialise la requête préparée
    $query = $pdo->prepare("
        INSERT INTO stats_visites (ip , date_visite , pages_vues) VALUES (:ip , :date , 1)
        ON DUPLICATE KEY UPDATE pages_vues = pages_vues + 1
    ");
    // 2. On execute la requête préparée avec nos paramètres
    $query->execute(array(
        ':ip'   => $ip,
        ':date' => $date
    ));
}

function baseUrl(){
    echo "http://creationsyorick.fr/";
}

function countComments(){
   
}

function majYorick(){
    
}

function logOut(){
    session_start();
    session_destroy();
    header('Location:../index.php');
    }

    
  
?>
