<?php $randval = rand(); ?>

<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<link rel='stylesheet' href='dz5.css?ver=<?=$randval?>'>
</head>
<body>
	<div id='chessBoard'></div>
	<script>
		
		// Создать функцию, генерирующую шахматную доску. Можно использовать любые html-теги. Доска должна быть верно разлинована на черные и белые ячейки. Строки должны нумероваться числами от 1 до 8, столбцы — латинскими буквами A, B, C, D, E, F, G, H.
		
		
		function chessBoard (sizeBoard) {
			var $chessBoard = document.getElementById('chessBoard');
			$chessBoard.classList.add('chessBoard');

			if (sizeBoard > 26) { sizeBoard = 26; }
			var size = sizeBoard+1;

			for (var i=0; i<=size; i++) {

				var $line = document.createElement('div');
				$line.classList.add('line');

				for (var j=size; j>=0; j--) {

					var $square = document.createElement('div');

					if (i == 0 || i == size) {
						$square.classList.add('coordinateSquare');
						if (j > 0 && j < size) { $square.textContent = j; }
					}
					else if (j == 0 || j == size) {
						$square.classList.add('coordinateSquare');
						if (i > 0 && i < size) { $square.textContent = String.fromCharCode(64 + i); }
					}
					else {
						if (j == 0 || j == size) $square.classList.add('coordinateSquare');
						else if ((i+j) % 2 == 0) $square.classList.add('blackSquare');
						else $square.classList.add('whiteSquare');

						$square.setAttribute('id', String.fromCharCode(64 + i)+''+j);
					}

					$line.appendChild($square); 
				}	

				$chessBoard.appendChild($line); 
			}
		}
		
		var sizeBoard = +prompt('Размер сетки на шахматной доске [стандартная сетка - 8] : ');
		chessBoard (sizeBoard);
		
		
	</script>
</body>
</html>