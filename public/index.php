<?php
require_once '../classes/Product.php';
require_once '../classes/ProductDiscount.php';
/*
 * ####################### Lesson-1 Points 1-4  #######################
 * Разница будет только в том, что в классе наследнике под капотом применится скидка
 * */
$genProducts = fn($productData) => array_key_exists('discount', $productData) ? new ProductDiscount(...$productData) : new Product(...$productData);
$products = array_map($genProducts, [['name' => 'Телевизор', 'price' => 1000], ['name' => 'Холодильник', 'price' => 1500, 'discount' => 10]]);
/**
 * Пункт с 5 по 7 везде будет один и тот-же вывод от 1 до 4, так как изменяемое свойство статическое и не имеет отношения к экземпляру класса
 */
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Lesson-1</title>
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
<h1>Lesson-1</h1>
<div class="products">
	<?php array_walk($products, fn($product) => $product->genHtml()); ?>
</div>
</body>
</html>
