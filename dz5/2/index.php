<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<script>
	
		var productID_0 = {productName:'футболка', price:52, pcs:1};
		var productID_1 = {productName:'толстовка', price:48, pcs:1};
		var productID_2 = {productName:'штаны', price:49, pcs:1};
		var productID_3 = {productName:'толстовка', price:34, pcs:1};
		var productID_4 = {productName:'штаны', price:57, pcs:1};
		var productID_5 = {productName:'толстовка', price:20, pcs:1};
		var productID_6 = {productName:'штаны', price:33, pcs:1};
		var productID_7 = {productName:'толстовка', price:12, pcs:1};
		
		
		var sklad = {
			productID_0: 4,
			productID_1: 4,
			productID_2: 4,
			productID_3: 4,
			productID_4: 4,
			productID_5: 4,
			productID_6: 4,
			productID_7: 4,
		}
		
	</script>
			
</head>
<body>
	
	<div class="headline">
		<div class="headline-big-text">Корзина: <b id="basket"></b> <i class="fas fa-times pink" title="очистить корзину" onclick="clearBasket();"></i></div>
	</div>
	<div class="futured_items">
		<div class="container">
			<div class="product container">
				<div class="item">
					<img class="item-img" src="img/product/img_1.jpg" alt="Mango  People  T-shirt">
					<div class="item-text-block">
						<p class="item-name">Mango  People  T-shirt</p>
						<div class="item-footer">
							<p class="item-price pink">$52.00</p>
						</div>
					</div>
					<div class="add_cart"><a href="#" class="add" onclick="addToBasket(productID_0);">Add to Cart</a></div>
				</div>
				<div class="item">
					<img class="item-img" src="img/product/img_2.jpg" alt="Mango  People  T-shirt">
					<div class="item-text-block">
						<p class="item-name">Mango  People  T-shirt</p>
						<p class="item-price pink">$48.00</p>
					</div>
					<div class="add_cart"><a href="#" class="add" onclick="addToBasket(productID_1);">Add to Cart</a></div>
				</div>
				<div class="item">
					<img class="item-img" src="img/product/img_3.jpg" alt="Mango  People  T-shirt">
					<div class="item-text-block">
						<p class="item-name">Mango  People  T-shirt</p>
						<div class="item-footer">
							<p class="item-price pink">$49.00</p>
						</div>
					</div>
					<div class="add_cart"><a href="#" class="add" onclick="addToBasket(productID_2);">Add to Cart</a></div>
				</div>
				<div class="item">
					<img class="item-img" src="img/product/img_4.jpg" alt="Mango  People  T-shirt">
					<div class="item-text-block">
						<p class="item-name">Mango  People  T-shirt</p>
						<p class="item-price pink">$34.00</p>
					</div>
					<div class="add_cart"><a href="#" class="add" onclick="addToBasket(productID_3);">Add to Cart</a></div>
				</div>
				<div class="item">
					<img class="item-img" src="img/product/img_5.jpg" alt="Mango  People  T-shirt">
					<div class="item-text-block">
						<p class="item-name">Mango  People  T-shirt</p>
						<p class="item-price pink">$57.00</p>
					</div>
					<div class="add_cart"><a href="#" class="add" onclick="addToBasket(productID_4);">Add to Cart</a></div>
				</div>
				<div class="item">
					<img class="item-img" src="img/product/img_6.jpg" alt="Mango  People  T-shirt">
					<div class="item-text-block">
						<p class="item-name">Mango  People  T-shirt</p>
						<div class="item-footer">
							<p class="item-price pink">$20.00</p>
						</div>
					</div>
					<div class="add_cart"><a href="#" class="add" onclick="addToBasket(productID_5);">Add to Cart</a></div>
				</div>
				<div class="item">
					<img class="item-img" src="img/product/img_7.jpg" alt="Mango  People  T-shirt">
					<div class="item-text-block">
						<p class="item-name">Mango  People  T-shirt</p>
						<p class="item-price pink">$33.00</p>
					</div>
					<div class="add_cart"><a href="#" class="add" onclick="addToBasket(productID_6);">Add to Cart</a></div>
				</div>
				<div class="item">
					<img class="item-img" src="img/product/img_8.jpg" alt="Mango  People  T-shirt">
					<div class="item-text-block">
						<p class="item-name">Mango  People  T-shirt</p>
						<p class="item-price pink">$12.00</p>
					</div>
					<div class="add_cart"><a href="#" class="add" onclick="addToBasket(productID_7);">Add to Cart</a></div>
				</div>			
			</div>
			<div class="footline">
				<a href="#" class="button2">Browse All Product ➞</a>
			</div>
		</div>		
	</div>
	
	<script>
		
		/*
		
		Сделать генерацию корзины динамической: верстка корзины не должна находиться в HTML-структуре. Там должен быть только div, в который будет вставляться корзина, сгенерированная на базе JS:
			Пустая корзина должна выводить строку «Корзина пуста»;
			Наполненная должна выводить «В корзине: n товаров на сумму m рублей».

		*/
		var arr = [];
		
		function addToBasket (product) {
			
			if (sklad.product > 1) {		
				arr.push(product);	
				countBasketPrice(arr);
				sklad.product = sklad.product - 1;
			} else {
				alert('товар на складе закончился');
			}
			
			console.log(sklad);
			
		}
		
		function clearBasket () {
			arr = [];	
			countBasketPrice(arr);
			
		}
			
		
		function decl(number, titles) {  
			cases = [2, 0, 1, 1, 1, 2];  
			return titles[ (number%100>4 && number%100<20)? 2 : cases[(number%10<5)?number%10:5] ];  
		}
		
		function countBasketPrice (arr) {
			var basket = {
				sum: 0,
				pcs: 0,
			};
			var $div = document.getElementById('basket');

			for(var i = 0; i < arr.length; i++) {
				basket.sum += arr[i].price * arr[i].pcs;
				basket.pcs += arr[i].pcs;
			}
			
			console.log(basket);
			
			if (basket.sum == 0) { $div.textContent = 'товар не добавлен'; }
			else {
				
				$div.textContent = basket.pcs+ ' ' +decl(basket.pcs, ['товар', 'товара', 'товаров'])+ ' на сумму ' +basket.sum+ ' долларов';
				
			}
			
		}
		
		countBasketPrice(arr);
		
		
	</script>
</body>
</html>