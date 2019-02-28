<?php $randval = rand(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css?ver=<?=$randval?>'">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<script>
	
		/*
		
		Реализовать страницу корзины:
			Добавить возможность не только смотреть состав корзины, но и редактировать его, обновляя общую стоимость или выводя сообщение «Корзина пуста».
		
		На странице корзины:
			Сделать отдельные блоки «Состав корзины», «Адрес доставки», «Комментарий»;
			Сделать эти поля сворачиваемыми;
			Заполнять поля по очереди, то есть давать посмотреть состав корзины, внизу которого есть кнопка «Далее». Если нажать ее, сворачивается «Состав корзины» и открывается «Адрес доставки» и так далее.

		*/

		var products = [
			{ id:'1', productName:'Mango футболка', price:52, qty:4 },
			{ id:'2', productName:'D&G блузка', price:48, qty:4 },
			{ id:'3', productName:'Mango куртка', price:49, qty:4 },
			{ id:'4', productName:'Mango платье', price:34, qty:4 },
			{ id:'5', productName:'ТВОЕ штаны', price:57, qty:4 },
			{ id:'6', productName:'ADIDAS костюм', price:20, qty:4 },
			{ id:'7', productName:'Reebok штаны', price:33, qty:4 },
			{ id:'8', productName:'ZARA толстовка', price:12, qty:4 }
		]
		
		var array = [];
		
	</script>		
</head>
<body>
	<div class="futured_items">
		<div class="container">
			<div id="product" class="product container">
				<div id="template" style="display:none;">
					<div id="item" class="item">
						<img id="item-img" class="item-img" src="" alt="">
						<div class="item-text-block">
							<p class="item-name"></p>
							<div class="item-footer">
								<p class="item-price pink"></p>
							</div>
							<div class="qty"></div>
						</div>
						<div class="add_cart" id="add_cart">
							<div class="add">Add to Cart</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
	<div class="headline">
		<div class="headline-big-text">Корзина: <i class="fas fa-times pink" title="очистить корзину" id="clearBasket"></i></div>
		<div id="templateBasket" style="display:none;">
			<li>
				<span class="productName"></span> (<span class="price"></span>)
				<button>Удалить</button>
			</li>
		</div>
		<div id="basket"></div>
	</div>
	
	<script>

			function allProducts (arr) { // вывод всех продуктов из массива
				var $product = document.getElementById('product');
				var $template = document.getElementById('template').children[0];

				if (arr && arr.length) {

					for (var i = 0; i < arr.length; i++) {
						var	$item = $template.cloneNode(true);
						
						$item.querySelector('.item-img').src = "img/product/img_"+arr[i].id+".jpg";
						$item.querySelector('.item-name').textContent = arr[i].productName;
						$item.querySelector('.item-price').textContent = "$"+arr[i].price;
						$item.querySelector('.qty').textContent = arr[i].qty;
						$item.querySelector('.add').id = arr[i].id;
						$item.querySelector('.qty').id = 'qty'+arr[i].id;
						
						$product.appendChild($item);
					}
				}
			}

			var $product = document.getElementById('product');
		
			function handleClick(event) { // клик запроса на добавление товара в корзину
				console.log('Добавить в корзину id товара:' + event.target.id);
				addToBasket (event.target.id);
			}
		
			$product.addEventListener('click', handleClick); 
		
			var $cb = document.getElementById('clearBasket');
		
			function handleClickClearBasket(event) { // клик запроса на очистку корзины
				console.log('Очистить корзину');
				clearBasket();
			}
		
			$cb.addEventListener('click', handleClickClearBasket);

		
			function addToBasket (id) { // Добавление товара в корзину
				console.log('=== ЗАПУСК ФУНКЦИИ addToBasket (id) ===');
				console.log('Добавляем в корзину товар ' + id);
				console.log(products.find(x => x.id === id));
				
				if (array.length > 0) {
					console.log('Массив не пуст: ' + array);
				}
				
				var $add_prod = products.find(x => x.id === id);

				console.log('Количество товара на складе с ID '+ id +' : ' + $add_prod.qty);
				
				if ($add_prod.qty > 0) {
					array.push($add_prod);	// добавление продукта в массив
					countBasketPrice(array); // добавление массива с продуктами в корзину
					$add_prod.qty = $add_prod.qty - 1;
					document.getElementById('qty' + $add_prod.id).textContent = $add_prod.qty;
				} else {
					alert('товар на складе закончился');
				}
			}

			function clearBasket () { // очистка корзины
				console.log('=== ЗАПУСК ФУНКЦИИ clearBasket - ОЧИСТКА КОРЗИНЫ ===');
				console.log('Товары в корзине которые нужно вернуть на склад:');
				console.log(array);
				
				for (var i = 0; i < array.length; i++) {
					console.log('Приписываем еденицу к товару с ID qty' + array[i].id);
					document.getElementById('qty' + array[i].id).textContent = parseFloat(document.getElementById('qty' + array[i].id).innerHTML) + 1;
					
					var $obj = products.find(x => x.id === array[i].id);
					var $objId = $obj.id;
					console.log('ID Продукта к которому надо вернуть еденицу товара: ' + $obj.id);
					console.log('Текущее количество товаров на складе продукта с таким ID: ' + products[$objId].qty);
					var $newQty = products[$objId].qty + 1;
					products[$objId].qty = $newQty;
					console.log('Текущее количество товаров на складе + 1: ' + $newQty);
				}
				
				array = [];	
				console.log('clearBasket. Количество элементов в массиве: ' + array.length);
				countBasketPrice(array);
				return array;
			}

			function decl(number, titles) { // склонение вводных слов 
				cases = [2, 0, 1, 1, 1, 2];
				return titles[ (number%100>4 && number%100<20)? 2 : cases[(number%10<5)?number%10:5] ];  
			}

			function countBasketPrice (arr) { // подсчет товара в корзине
				
				console.log('=== ЗАПУСК ФУНКЦИИ countBasketPrice (arr) - ПОДСЧЕТ КОЛ-ВА ТОВАРВ В КОРЗИНЕ ===');
				
				var basket = {
					sum: 0,
					qty: 0,
				};
				
				var $div = document.getElementById('basket');
				
				console.log('countBasketPrice. Количество элементов в массиве: ' + arr.length);
				if (arr.length < 1) {
					basket.sum = 0;
					basket.qty = 0;
					console.log('Обнуляем корзину: ' + basket.sum + ' и ' + basket.qty + ' должны быть нули');
				} else {
					for (var i = 0; i < arr.length; i++) {
						basket.sum += arr[i].price;
						basket.qty += 1;
					}
				}
				
				console.log(basket);

				if (basket.sum == 0) { 
					$div.textContent = 'товар не добавлен'; 
				}
				else {

					$div.textContent = basket.qty+ ' ' +decl(basket.qty, ['товар', 'товара', 'товаров'])+ ' на сумму ' +basket.sum+ ' ' +decl(basket.sum, ['доллар', 'доллара', 'долларов']) +'';

				}

			}

			allProducts(products);
			countBasketPrice(array);
	</script>
</body>
</html>