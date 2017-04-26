<?php
$j=basename($_SERVER['REQUEST_URI']);

if(!ctype_digit(strval($j))){
	$j=explode('/',drupal_get_normal_path($j))[1];
}

$node=node_load($j);

$font = field_get_items('node', $node, 'field_font');
$font_url = "url(" . file_create_url($font[0]["uri"]) . ")";

$color1=field_get_items('node', $node, 'field_couleur_principale')[0]['value'];
$color2=field_get_items('node', $node, 'field_couleur_secondaire')[0]['value'];

$img_fond = field_get_items('node', $node, 'field_image_fond');
$img_fond = "url(" . file_create_url($img_fond[0]["uri"]) . ")";

$img_desc = field_get_items('node', $node, 'field_image_description');
$desc=field_get_items('node', $node, 'field_description');

$prog=field_get_items('node', $node, 'field_program');
$img_prog=field_get_items('node', $node, 'field_image_program');
$cont=field_get_items('node', $node, 'field_continu');

$img=field_get_items('node', $node, 'field_galeries');

$captcha=field_get_items('node', $node, 'field_captcha_key');

$text_part=field_get_items('node', $node, 'field_texte_partenaire');
$img_part=field_get_items('node', $node, 'field_image_partenaire');

$date=field_get_items('node', $node, 'field_date');
$heure=field_get_items('node', $node, 'field_time');
$tel=field_get_items('node', $node, 'field_phone');
$mail=field_get_items('node', $node, 'field_mail');

$facebook=field_get_items('node', $node, 'field_facebook');
$twitter=field_get_items('node', $node, 'field_twitter');
$instagram=field_get_items('node', $node, 'field_insta');

$img_bordeaux = field_get_items('node', $node, 'field_image_bordeaux');
$img_bordeaux = file_create_url($img_bordeaux[0]["uri"]);
$img_mba = field_get_items('node', $node, 'field_image_mba');
$img_mba = file_create_url($img_mba[0]["uri"]);

$copyright=field_get_items('node', $node, 'field_copyright');

$ga=field_get_items('node', $node, 'field_ga');

?>

<?php
// Check for empty fields
	if(!empty($_POST['name'])  		&&
   	!empty($_POST['email']) 		&&
   	!empty($_POST['message']))   {
	$name = $_POST['name'];
	$email_address = $_POST['email'];
	$message = $_POST['message'];
	
	$to = $mail[0]['value']; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
	$email_subject = "Contact depuis la page de la bacchanight de :  $name";
	$email_body = "\nNom: $name\n\nEmail: $email_address\n\nMessage:\n$message";
	$headers = "From: noreply@mairie-bordeaux.fr\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
	$headers .= "Reply-To: $email_address";	
	mail($to,$email_subject,$email_body,$headers);
	return true;
    }
?>

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>

<!-- Stylesheet
    ================================================== -->
<style type="text/css">
 @font-face {
   font-family: <?php echo explode(".", $font[0]["filename"])[0]; ?>;
   src: <?php echo $font_url; ?>;
}

.region-page-top{
    display: none;
}

body, html {
	font-family: 'Raleway', sans-serif;
	text-rendering: optimizeLegibility !important;
	-webkit-font-smoothing: antialiased !important;
	color: #000;
	font-weight: 300;
	width: 100% !important;
	height: 100% !important;
}
.gray-img {
	-webkit-filter: grayscale(100%);
	 filter: grayscale(100%);
}
.gray-img:hover {
	-webkit-filter: grayscale(0%);
	 filter: grayscale(0%);
}
h2 {
	margin: 0 0 20px 0;
	font-weight: 500;
	font-size: 34px;
	color: #333;
	text-transform: uppercase;
}
h3 {
	font-size: 22px;
	font-weight: 500;
	color: #333;
}
h4 {
	font-size: 24px;
	text-transform: uppercase
	color: #333;
}
h5 {
	text-transform: uppercase;
	font-weight: 700;
	line-height: 20px;
}
p {
	font-size: 16px;
}
p.intro {
	margin: 12px 0 0;uppercase;
}
h3 {
	font-size: 22px;
	font-weight: 500;
	color: #333;
}
h4 {
	font-size: 24px;
	text-transform: uppercase
a {
	color: <?php echo $color1; ?>;
}
a:hover, a:focus {
	text-decoration: none;
	color: #222;
}
ul, ol {
	list-style: none;
}
.clearfix:after {
	visibility: hidden;
	display: block;
	font-size: 0;
	content: " ";
	clear: both;
	height: 0;
}
.clearfix {
	display: inline-block;
}
* html .clearfix {
	height: 1%;
}
	padding: 0;
	webkit-padding: 0;
	moz-padding: 0;
}
hr {
	height: 2px;
	width: 70px;
	text-align: center;
	position: relative;
	/*background: <?php echo $img_fond; ?>;*/
	background : white;
	margin: 0;
	margin-bottom: 40px;
	border: 0;
}
.btn:active, .btn.active {
	background-ima
	-webkit-box-shadow: none;
	box-shadow: none;
}
a:focus, .btn:focus, .btn:active:focus, .btn.active:focus, .btn.focus, .btn:active.focus, .btn.active.focus {
	outline: none;
	outline-offset: none;
}
/* Navigation */
.navbar-fixed-top{
	z-index: 1;
}
#menu {
	padding: 20px;
	transition: all 0.8s;
}
#menu.navbar-default {
	background-color: rgba(0,0,0,.4);
	border-color: rgba(231, 231, 231, 0);
}
#menu a.navbar-brand {
	font-family: <?php echo explode(".", $font[0]["filename"])[0]; ?>, cursive;
	text-transform: uppercase;
	font-size: 28px;
	color: #fff;
	font-weight: 400;
	letter-spacing: 1px;
}
#menu a.navbar-brand:hover {
	color: <?php echo $color1; ?>;
}
#menu.navbar-default .navbar-nav > li > a {
	text-transform: uppercase;
	color: #ddd;
	font-weight: 500;
	font-size: 20px;
	padding: 5px 0;
	border: 2px solid transparent;
	letter-spacing: 0.5px;
	margin: 10px 15px 0 15px;
}
#menu.navbar-default .navbar-nav > li > a:hover {
	color: <?php echo $color1; ?>;
}
.on {
	background-color: #262626 !important;
	padding: 0 !important;
	padding: 10px 0 !important;
}
.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
	color: <?php echo $color1; ?> !important;
	background-color: transparent;
}
.navbar-toggle {
	border-radius: 0;
}
.navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus {
	background-color: <?php echo $color1; ?>;
	border-color: <?php echo $color1; ?>;
}
.navbar-default .navbar-toggle:hover>.icon-bar {
	background-color: #FFF;
}
.section-title {
	margin-bottom: 70px;
    background: <?php echo $img_fond; ?> no-repeat center center fixed;
	background-size: cover;
}
.section-title h2, .section-title p {
	color: white;
 text-shadow:-1px -1px 9px #000;
}

.section-title .overlay {
	padding: 80px 0;

}
.section-title p {
	font-size: 22px;
	color: rgba(255,255,255,0.8);
}
.section-title hr {
	margin: 0 auto;
	margin-bottom: 40px;
}
.btn-custom {
	text-transform: uppercase;
	color: #fff;
     background-color: <?php echo $color1; ?>;
	border: 0;
	padding: 14px 20px;
	margin: 0;
	font-size: 16px;
	font-weight: 500;
	letter-spacing: 0.5px;
	border-radius: 0;
	margin-top: 20px;
	transition: all 0.5s;
}
.btn-custom:hover, .btn-custom:focus, .btn-custom.focus, .btn-custom:active, .btn-custom.active {
	color: #fff;
	background-color: <?php echo $color1; ?>;
}
/* Header Section */
.intro {
	display: table;
	width: 100%;
	padding: 0;
    background: <?php echo $img_fond; ?> no-repeat center center fixed;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	background-size: cover;
	-o-background-size: cover;
}
.intro .overlay {
	background: rgba(0,0,0,0.2);
}
.intro h1 {
	font-family: <?php echo explode(".", $font[0]["filename"])[0]; ?>, cursive;
	text-transform: uppercase;
	text-shadow:-1px -1px 9px #000;
	color: #fff;
	font-size: 6em;
	font-weight: 400;
	margin-top: 0;
	margin-bottom: 10px;
}
.intro span {
	color: #a7c44c;
	font-weight: 600;
}
.intro p {
	color: #fff;
	text-shadow:-1px -1px 9px #000;
	font-size: 34px;
	font-weight: 400;
	margin-top: 10px;
	margin-bottom: 40px;
}
header .intro-text {
	padding-top: 250px;
	padding-bottom: 200px;
	text-align: center;
}
/* About Section */
#about {
	padding: 120px 0;
}
#about h3 {
	font-size: 20px;
}
#about .about-text {
	margin-left: 10px;
}
#about .about-img {
	display: inline-block;
	position: relative;
}
#about .about-img:before {
	display: block;
	content: '';
	position: absolute;
	top: 8px;
	right: 8px;
	bottom: 8px;
	left: 8px;
	border: 1px solid rgba(255, 255, 255, 0.5);
}
#about p {
	line-height: 24px;
	margin: 15px 0 30px;
}
/* Portfolio Section */
#portfolio {
	padding: 0 0 120px 0;
}
#portfolio .section-title {
	background: #444 <?php echo $img_fond; ?> center center no-repeat fixed;
	background-size: cover;
	margin-bottom: 50px;
}
#portfolio .section-title h2 {
	color: #fff;
}
.categories {
	padding-bottom: 30px;
	text-align: center;
}
ul.cat li {
	display: inline-block;
}
ol.type li {
	display: inline-block;
	margin: 0 10px;
	padding: 20px 0;
}
ol.type li a {
	color: #999;
	font-weight: 500;
	font-size: 14px;
	padding: 12px 24px;
	background: #eee;
	border: 0;
	border-radius: 0;
	text-transform: uppercase;
	letter-spacing: 0.5px;
}
ol.type li a.active {
	color: #fff;
	background-image: <?php echo $img_fond; ?>;
}
ol.type li a:hover {
	color: #fff;
	background-image: <?php echo $img_fond; ?>;
}
.isotope-item {
	z-index: 2
}
.isotope-hidden.isotope-item {
	z-index: 1
}
.isotope, .isotope .isotope-item {
	/* change duration value to whatever you like */
	-webkit-transition-duration: 0.8s;
	-moz-transition-duration: 0.8s;
	transition-duration: 0.8s;
}
.isotope-item {
	margin-right: -1px;
	-webkit-backface-visibility: hidden;
	backface-visibility: hidden;
}
.isotope {
	-webkit-backface-visibility: hidden;
	backface-visibility: hidden;
	-webkit-transition-property: height, width;
	-moz-transition-property: height, width;
	transition-property: height, width;
}
.isotope .isotope-item {
	-webkit-backface-visibility: hidden;
	backface-visibility: hidden;
	-webkit-transition-property: -webkit-transform, opacity;
	-moz-transition-property: -moz-transform, opacity;
	transition-property: transform, opacity;
}
.portfolio-item {
	margin: 15px 0;
}
.portfolio-item .hover-bg {
	overflow: hidden;
	position: relative;
}
.portfolio-item .hover-bg:before {
	display: block;
	content: '';
	position: absolute;
	top: 6px;
	right: 6px;
	bottom: 6px;
	left: 6px;
	border: 1px solid rgba(255, 255, 255, 0.6);
}
.hover-bg .hover-text {
	position: absolute;
	text-align: center;
	margin: 0 auto;
	color: #fff;
	background: rgba(38, 22, 84, 0.3);
	padding: 30% 0 0 0;
	height: 100%;
	width: 100%;
	opacity: 0;
	transition: all 0.5s;
}
.hover-bg .hover-text>h4 {
	opacity: 0;
	color: #fff;
	-webkit-transform: translateY(100%);
	transform: translateY(100%);
	transition: all 0.3s;
	font-size: 17px;
	letter-spacing: 0.5px;
	font-weight: 500;
}
.hover-bg:hover .hover-text>h4 {
	opacity: 1;
	-webkit-backface-visibility: hidden;
	-webkit-transform: translateY(0);
	transform: translateY(0);
}
.hover-bg:hover .hover-text {
	opacity: 1;
}
/* Team Section */
#team {
	color: #fff;
	background: #444 <?php echo $img_fond; ?> center top no-repeat fixed;
	background-size: cover;
}
#team .overlay {
	padding: 120px 0 80px 0;
	background: rgba(0, 0, 0, 0.6);
}
#team h2, #team p {
	color: #fff;
}
#team hr {
	background: #fff;
}
#team h3 {
	color: #fff;
	font-weight: 400;
	font-size: 20px;
	margin: 5px 0;
}
#team img {
	width: 280px;
}
#team .thumbnail {
	background: transparent;
	border: 0;
}
#team .thumbnail .team-img {
	display: inline-block;
	position: relative;
}
#team .thumbnail .team-img:before {
	display: block;
	content: '';
	position: absolute;
	top: 8px;
	right: 8px;
	bottom: 8px;
	left: 8px;
	border: 1px solid rgba(255, 255, 255, 0.2);
}
#team .thumbnail .caption {
	padding-top: 10px;
}
#team .thumbnail .caption p {
	color: rgba(255,255,255,0.7);
	padding: 0 10px;
	font-size: 15px;
}
/* Call Reservation Section */
#call-reservation {
	padding: 90px 0;
	color: #fff;
	/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/<?php echo $img_fond; ?>+50,779936+100 */
	background: rgb(32, 28, 85); /* Old browsers */
	background: -moz-linear-gradient(top, rgba(231, 43, 123) 50%, rgba(231, 43, 123) 100%); /* FF3.6-15 */
	background: -webkit-linear-gradient(top, rgba(1231, 43, 123) 50%, rgba(231, 43, 123) 100%); /* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(to bottom, rgba(231, 43, 123) 50%, rgba(231, 43, 123) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $img_fond; ?>', endColorstr='<?php echo $img_fond; ?>', GradientType=0 ); /* IE6-9 */
}
#call-reservation .overlay {
	padding: 80px 0;
	background: <?php echo $img_fond; ?>;
}
#call-reservation h2 {
	font-family: 'Open Sans', sans-serif;
	color: #fff;
	font-weight: 400;
	margin: 0;
}
#call-reservation hr {
	background: #fff;
}
#call-reservation h3 {
	color: #fff;
	font-weight: 500;
	font-size: 20px;
	margin: 5px 0;
}
/* Contact Section */
#contact {
	padding: 100px 0 60px 0;
	background: #F6F6F6;
}

#contact form {
	padding: 0;
}
#contact h3 {
	text-transform: uppercase;
	font-size: 20px;
	font-weight: 400;
	color: #555;
}
#contact .text-danger {
	color: #cc0033;
	text-align: left;
}
label {
	font-size: 12px;
	font-weight: 400;
	font-family: 'Open Sans', sans-serif;
	float: left;
}
#contact .form-control {
	display: block;
	width: 100%;
	padding: 6px 12px;
	font-size: 16px;
	line-height: 1.42857143;
	color: #444;
	background-color: #fff;
	background-image: none;
	border: 1px solid #ddd;
	border-radius: 0;
	-webkit-box-shadow: none;
	box-shadow: none;
	-webkit-transition: none;
	-o-transition: none;
	transition: none;
}
#contact .form-control:focus {
	border-color: #999;
	outline: 0;
	-webkit-box-shadow: transparent;
	box-shadow: transparent;
}
.form-control::-webkit-input-placeholder {
color: #000;
}
.form-control:-moz-placeholder {
color: #000;
}
.form-control::-moz-placeholder {
color: #000;
}
.form-control:-ms-input-placeholder {
color: #000;
}
#contact .contact-item {
	margin: 20px 0 40px 0;
}
#contact .contact-item span {
	font-weight: 400;
	color: #aaa;
	text-transform: uppercase;
	margin-bottom: 6px;
	display: inline-block;
}
#contact .contact-item p {
	font-size: 16px;
}
/* Footer Section*/
#footer {
	background: <?php echo $color2; ?>;
	padding: 50px 0 0 0;
	width: 100%;
}
#footer h3 {
	color: <?php echo $color1; ?>;
	font-weight: 400;
	font-size: 18px;
	text-transform: uppercase;
	margin-bottom: 20px;
}
#footer .copyrights {
	padding: 20px 0;
	margin-top: 50px;
	/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#779936+0,E72A7B+50 */
	background: rgb(255, 255, 255); /* Old browsers */
	background: -moz-linear-gradient(top, <?php echo $color2; ?> 0%, <?php echo $color1; ?> 50%); /* FF3.6-15 */
	background: -webkit-linear-gradient(top, <?php echo $color2; ?> 0%, <?php echo $color1; ?> 50%); /* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(to bottom, <?php echo $color2; ?> 0%, <?php echo $color1; ?> 50%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#779936', endColorstr='<?php echo $img_fond; ?>', GradientType=0 ); /* IE6-9 */
}
#footer .social i.fa {
	font-size: 26px;
	padding: 20px;
	color: #fff;
	transition: all 0.3s;
}
#footer .social i.fa:hover {
	color: #201C54;
}
#footer p {
	font-size: 15px;
	color: rgba(255,255,255,0.8)
}
#footer a {
	color: #f6f6f6;
}
#footer a:hover {
	color: #333;
}

</style>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/nivo-lightbox/1.3.1/nivo-lightbox.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/nivo-lightbox/1.3.1/themes/default/default.min.css"/>
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet"/>
<script src='https://www.google.com/recaptcha/api.js' type="text/javascript"></script>
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js" type="text/javascript"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js" type="text/javascript"></script>
    <![endif]-->

<div id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation
    ==========================================-->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand page-scroll" href="#page-top">Bacchanight</a> </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about" class="page-scroll">&Agrave; Propos</a></li>
        <li><a href="#programme" class="page-scroll">Programme</a></li>
        <li><a href="#gallery" class="page-scroll">Galerie des photos</a></li>
        <li><a href="#contact" class="page-scroll">Contact</a></li>
        <li><a href="#partners" class="page-scroll">Partenaires</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
</nav>
<!-- Header -->
<header id="header">
  <div class="intro" id="intro">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="intro-text">
            <h1>Bacchanight</h1>
            <p>Musée des Beaux Arts - Bordeaux</p>
            <script type="text/javascript">
              function StopGray() {
                document.getElementById("intro").className = "intro";
              }
              function StartGray() {
                document.getElementById("intro").className += " gray-img";
              }
            </script>
            <a href="" class="btn btn-custom btn-lg page-scroll">Découvrez Bacchanight!</a> </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- About Section -->
<div id="about">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-6 ">
        <div class="about-img gray-img"><img src="<?php echo file_create_url($img_desc[0]["uri"]); ?>" class="img-responsive" alt="image fond"/></div>
      </div>
      <div class="col-xs-12 col-md-6">
        <div class="about-text">
          <h2 style="font-family: 'CaslonCP', cursive;">Bacchanight</h2>
          <hr/>
          <?php echo strip_tags($desc[0]["value"], '<strong><br><p>'); ?>
	</div>
      </div>
    </div>
  </div>
</div>
<!-- Restaurant Menu Section -->
<div id="programme">
  <div class="section-title text-center center">
    <div class="overlay">
      <h2>Programme de la Bacchanight</h2>
      <hr/>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <h2 class="menu-section-title">Programme</h2>
      <div class="col-md-12">
        <div class="menu-section col-xs-12 col-sm-6">
          <hr/>
            <br/><p style="color:<?php echo $color1; ?>;">
            <strong>[G= Galerie]  [M= musée]</strong>
          </p><br/>
          <?php
            $row = 0;
            if (($handle = fopen(file_create_url($prog[0]["uri"]), "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) {
                    if($row == 0){
                        echo "<div class='menu-item' style='padding-left:0;'><div class='menu-item-description'><h3>".$data[0];
                    }
                    if($row == 1){
                        echo " : ".$data[0]."</h3>";
                    }
                    if($row == 2){
                        echo "<p>".$data[0];
                    }
                    if($row == 3){
                        echo " <strong style='color:".$color1.";'>[".$data[0]."]</strong></p></div></div>";
                    }
                    $row = ($row+1)%5;
                    }
                fclose($handle);
            }
          ?>
        </div>
      <div class="col-xs-12 col-sm-6" style="margin-top:172px; position: relative; top: 50%; transform: translateY(50%);">
        <div class="about-img gray-img"><img src="<?php echo file_create_url($img_prog[0]["uri"]); ?>" class="img-responsive" alt="Plan"/></div>
      </div>
      </div>
    </div>
    <br/><br/><br/>
    <div class="row">
        <h2 class="menu-section-title">En continu </h2>
        <hr/>
          <?php
            $row = 0;
            $ligne=0;
            if (($handle = fopen(file_create_url($cont[0]["uri"]), "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) {
                    if($ligne == 0){
                        echo "<div class='col-md-12'>";
                    }
                    if($row == 0){
                        echo "<div class='menu-item col-sm-6 col-xs-12' style='padding-left:0;'><div class='menu-item-description'><h3>".$data[0];
                    }
                    if($row == 1){
                        echo " : ".$data[0]."</h3>";
                    }
                    if($row == 2){
                        echo "<p>".$data[0];
                    }
                    if($row == 3){
                        echo " <strong style='color:".$color1.";'>[".$data[0]."]</strong></p></div></div>";
                    }
                    if($ligne == 9){
                        echo "</div>";
                    }
                    $row = ($row+1)%5;
                    $ligne = ($ligne+1)%10;
                    }
                fclose($handle);
            }
          ?>

    </div>
  </div>
</div>
<br/><br/><br/>
<!-- Portfolio Section -->
<div id="gallery">
  <div class="section-title text-center center">
    <div class="overlay">
      <h2>Galerie des photos</h2>
      <hr/>
    </div>
  </div>
  <div class="container">
    <?php foreach($img as $i){ ?>
      <div class="col-sm-6 col-md-4 col-lg-4">
        <div class="portfolio-item">
          <div class="hover-bg"> <a href="<?php echo file_create_url($i["uri"]); ?>" title="Bacchanight" target="_blank" data-lightbox-gallery="gallery1">
            <div class="hover-text"></div>
          <img src="<?php echo file_create_url($i["uri"]); ?>" class="img-responsive" alt="Bacchanight"/> </a> </div>
        </div>
      </div>
    <?php } ?>
    <br/><br/>
  </div>
</div>

<!-- Contact Section -->
<div id="contact" class="text-center">
  <div class="section-title text-center center">
    <div class="overlay">
      <h2>Contact</h2>
      <hr/>
    </div>
  </div>
  <div class="container">
    <div class="col-md-10 col-md-offset-1">
      <form name="sentMessage" id="contactForm" action=""  novalidate>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="name" name="name" class="form-control" placeholder="Nom" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
          <p class="help-block text-danger"></p>
        </div>
	<div id="success"></div>
                <div class="g-recaptcha" data-sitekey="<?php echo $captcha[0]['value']; ?>"></div>
        <button type="submit" class="btn btn-custom btn-lg">Envoyer</button>
        <br/>
      </form>
    </div>
  </div>
</div>
<div class="section-title text-center center" id="partners">
  <div class="overlay">
          <h2>
            <strong>Merci à tous nos partenaires !</strong>
          </h2>
          <hr/>
      </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <div class="container">
	<center>

<p>
<?php echo strip_tags($text_part[0]["value"]); ?>
</p>
<br/><br/>
<img src="<?php echo file_create_url($img_part[0]["uri"]); ?>" alt="image partenaire" width="300px"/>
<p><?php echo $img_part[0]['title']; ?></p><br/>
<br/>	</center>
    </div>
  </div>
</div>
<div id="footer">
  <div class="container text-center">
    <div class="col-md-4">
      <h3>Adresse</h3>
      <div class="contact-item">
        <p>
           20 Cours d'Albret
          <br/>33000 Bordeaux, France
	</p>
	<p>
Galerie des Beaux-Arts <br/>Place du Colonel Raynal, <br/>33000, Bordeaux, France</p>
      </div>
    </div>
    <div class="col-md-4">
      <h3>Date et heure</h3>
      <div class="contact-item">
        <p><?php echo strip_tags($date[0]["value"]); ?>
         <br/><?php echo strip_tags($heure[0]["value"]); ?>
        </p>
      </div>
    </div>
    <div class="col-md-4">
      <h3>informations de Contact</h3>
      <div class="contact-item">
        <p>Phone: <?php echo strip_tags($tel[0]["value"]); ?></p>
        <p>Email: <?php echo strip_tags($mail[0]["value"]); ?></p>
      </div>
    </div>
  </div>
  <div class="container-fluid text-center copyrights">
    <div class="col-md-12">
      <div class="social">
       <a href="<?php echo strip_tags($facebook[0]["value"]); ?>"><i class="fa fa-facebook"></i></a>
       <a href="<?php echo strip_tags($twitter[0]["value"]); ?>"><i class="fa fa-twitter"></i></a>
       <a href="<?php echo strip_tags($instagram[0]["value"]); ?>"><i class="fa fa-instagram"></i></a>
      </div>
      <p> 
<img src="<?php echo $img_bordeaux; ?>" alt="Mairie de Bordeaux" width="100px"/>
<img src="<?php echo $img_mba; ?>" alt="Musée des Beaux Arts de Bordeaux" width="100px"/>
</p>      <p><?php echo strip_tags($copyright[0]["value"]); ?></p>
    </div>
  </div>
</div>
<script src="http://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.6/SmoothScroll.min.js" type="text/javascript"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/nivo-lightbox/1.3.1/nivo-lightbox.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.3/isotope.pkgd.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqBootstrapValidation/1.3.7/jqBootstrapValidation.min.js" type="text/javascript"></script>
<script type="text/javascript">
function main() {
(function () {
   'use strict';
  	$('a.page-scroll').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top - 40
            }, 900);
            return false;
          }
        }
      });
    // Show Menu on Book
    $(window).bind('scroll', function() {
        var navHeight = $(window).height() - 500;
        if ($(window).scrollTop() > navHeight) {
            $('.navbar-default').addClass('on');
        } else {
            $('.navbar-default').removeClass('on');
        }
    });
    $('body').scrollspy({ 
        target: '.navbar-default',
        offset: 80
    });
	// Hide nav on click
  $(".navbar-nav li a").click(function (event) {
    // check if window is small enough so dropdown is created
    var toggle = $(".navbar-toggle").is(":visible");
    if (toggle) {
      $(".navbar-collapse").collapse('hide');
    }
  });	
  	// Portfolio isotope filter
    $(window).load(function() {
        var $container = $('.portfolio-items');
        $container.isotope({
            filter: '*',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
        $('.cat a').click(function() {
            $('.cat .active').removeClass('active');
            $(this).addClass('active');
            var selector = $(this).attr('data-filter');
            $container.isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
            return false;
        });
    });	
    // Nivo Lightbox 
    $('.portfolio-item a').nivoLightbox({
            effect: 'slideDown',  
            keyboardNav: true,                            
        });
}());
}
main();
</script>
<script type="text/javascript">
$(function() {
    $("input,textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var name = $("input#name").val();
            var email = $("input#email").val();
            var message = $("textarea#message").val();
	    var captcha_r = grecaptcha.getResponse();//$("textarea#g-recaptcha-response").val();
	    if(captcha_r.length == 0){
		      $('#success').html("<div class='alert alert-danger'>");
		                        $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
		                            .append("</button>");
		                        $('#success > .alert-danger').append("<strong>Le Captcha n'a pas été validé").append("</strong>");
		                        $('#success > .alert-danger').append('</div>');
		                        //clear all fields
		    //                    $('#contactForm').trigger("reset");
		    return false;
            }
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
<?php if(function_exists('mail')){ ?>
            $.ajax({
                url: window.location.href,
                type: "POST",
                data: {
                    name: name,
                    email: email,
                    message: message
                },
                cache: false,
                success: function(code,statut) {
                    // Success message
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>Votre message a bien été envoyé.</strong>");
                    $('#success > .alert-success')
                        .append('</div>');
                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
                error: function() {
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Désolé " + firstName + ", le service semble HS.!");
                    $('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
            })
                <?php }else{ ?>
    window.location = "mailto:<?php echo strip_tags($mail[0]["value"])?>?subject=Contact%20Bacchanight%20" + $('input#name').val().replace(/([ ])/g, "%20") + "&body=" + $("textarea#message").val().replace(/\n/g, "%0d%0a").replace(/([ ])/g, "%20");
<?php } ?>
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});
/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
    $('#success').html('');
});
</script>
<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo $ga[0]["value"]; ?>', 'auto');
  ga('send', 'pageview');

</script>
</div>
</div>
