<?php

spl_autoload_register(function ($class) {
	require_once '../classes/' . str_replace('\\', '/', $class) . '.php';
});
[$price, $interest, $weight] = [1000, 20, 2];
$unitProduct = new UnitProduct($interest, $price);
$digitalProduct = new DigitalProduct($interest, $price);
$weightProduct = new WeightProduct($interest, $price, $weight);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Lesson 2</title>
</head>
<body>
<div class="container">
	<h1>Lesson 2</h1>
	<div class="row">
		<p><?= $unitProduct->getPrice(); ?></p>
		<p><?= $digitalProduct->getPrice(); ?></p>
		<p><?= $weightProduct->getPrice(); ?></p>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

