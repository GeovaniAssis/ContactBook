<?php

	$url = "http://contactbook.ga";

	if( !isset($_SESSION) ){ session_start(); }

	if( !isset( $_SESSION['user']['id'] ) ){ header( 'Location: ' . $url ); }

?>
<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title> <?php echo $page; ?> | Contact Book </title>

		<meta charset="utf-8">
		<meta http-equiv="Content-language" content="pt-br">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      	<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="imagem/x-icon" href="<?php echo $url; ?>/assets/image/icon/contact.png">
		<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/assets/css/style.css">

		<meta name="theme-color" content="#68531e">

	</head>

	<body>

		<nav class="navbar">
  			<div class="container">
			    <div class="navbar-header">
					<div class="hamburguer-bt">
					  <div class="hamburguer-bt__stripe hamburguer-bt__stripe__top"></div>
					  <div class="hamburguer-bt__stripe hamburguer-bt__stripe__middle"></div>
					  <div class="hamburguer-bt__stripe hamburguer-bt__stripe__bottom"></div>
					</div>
					<a href="<?php echo $url; ?>">
						<h1 style="float: left;">
							<img src="<?php echo $url; ?>/assets/image/icon/contact.png">
							Contact Book
						</h1>
					</a>
			    </div>

			    <div>
			      	<ul class="nav navbar-nav" id="menuNav">

						<li>
							<a href="<?php echo $url; ?>">
								<img src="<?php echo $url; ?>/assets/image/icon/home.png">
								<p>Home</p>
							</a>
						</li>

						<li>
							<a href="<?php echo $url; ?>/in/new_contact">
								<img src="<?php echo $url; ?>/assets/image/icon/add-contact.png">
								<p>New contact</p>
							</a>
						</li>

						<li>
							<a href="<?php echo $url; ?>/in/logout">
								<img src="<?php echo $url; ?>/assets/image/icon/exit.png">
								<p>EXIT</p>
							</a>
						</li>

			      	</ul>
			    </div>
		 	</div>
		</nav>

		<div id="space"></div>