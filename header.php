<?php

	$url = "http://contactbook.ga";

	if( !isset($_SESSION) ){ session_start(); }

	if( isset( $_SESSION['user'] ) ){ header('Location: /in/'); }

?>
<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<title> Contact Book </title>

		<meta charset="utf-8">
		<meta http-equiv="Content-language" content="pt-br">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      	<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="imagem/x-icon" href="<?php echo $url; ?>/assets/image/icon/contact.png">
		<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/assets/css/style.css">

		<meta name="theme-color" content="#68531e">

	</head>

	<body>