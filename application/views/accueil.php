<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cantine</title>
	<style>
		.container {
			width: 960px;
			margin: 0 auto;
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Bienvenue - Welcome - Tongasoa</h1>
		<h2>Examen Half Day P12</h2>
		<p>Lachapelle Kaky Jean Philippe - ETU 982</p>
		<br />
		<h3>Les liens qui n'ont pas besoin d'authentification</h3>

		<ul>
			<li>
				<a href="https://arcane-eyrie-65973.herokuapp.com/api/menu?date=2021-01-07">Menu du jour</a>
			</li>
			<li>
				<a href="https://arcane-eyrie-65973.herokuapp.com/api/cantine/plats">Liste plats avec nombre à préparer par la cantine</a>
			</li>
			<li>
				<a href="https://arcane-eyrie-65973.herokuapp.com/api/info">Info</a>
			</li>
		</ul>
	</div>
</body>
</html>