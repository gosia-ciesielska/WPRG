<?php 
include_once "data.php";
include_once "post.php";
include_once "user.php";
session_start();
$data = new Data();
$user = false;
if (isset($_SESSION['login'])) {
	$login = $_COOKIE['login'];
	$user = $data->get_user($login);
}
?>
<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Blog</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Main -->
					<div id="main">
						<div class="inner">
							<header id="header">
								<a href="index.php" class="logo"><strong>My Blog</strong></a>
								<ul class="icons">
									<li>
										<?php
										if ($user == false) {
											echo "<a href='/wprg/Projekt/login.php'>Login</a>";
										} else {
											echo "<a href='/wprg/Projekt/logout.php'>Logout</a>";
										}	
										?>
									</li>
								</ul>
							</header>