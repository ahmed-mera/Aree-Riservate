<?php


if (!isset($_COOKIE['view'])) {//controllo se c'e' cookie o no

	$conta  = leggo(); //assegno il valore che c'e' dentro il file

	setcookie('view',$conta,time() + 2592000,'/', FALSE, FALSE);  //2592000 = 30 DAY metto i cookie

	$conta++; //aumento il valore dei visitatori del sito

		salva($conta); // slavo il valore su un file
}


//la funziona che slava il valore sul file
function salva ($conta){

$fp = fopen('files/viewer.txt', 'w');

fprintf($fp,'%d', $conta);

fclose($fp);

}



//la funziona che legge il valore dal file
function leggo () {

$fp = fopen('files/viewer.txt', 'r');

fscanf($fp, '%d', $c);

fclose($fp);

return $c;

}



?>

<!-- <script type="text/javascript">

(function getCookie() {
var	allCookies = document.cookie,
		myCookie = allCookies.substring(allCookies.indexOf('view'),allCookies.indexOf('view').length);
		/*
		//per modificare il cookie
		content = myCookie.substring(myCookie.indexOf('='));
		content = '=100';
		document.cookie = 'view'+content;
		console.log(content);
		*/

	if (allCookies != myCookie) {
		$(function (){ $('.cookie').sildeToggle(1000); });
		$(function (){ $('.cookie').sildeToggle(1000); });//show alert cookie cookie
		$(function (){ $('.cookie .cls').on('click', function () {$('.cookie').sildeToggle(1000); }); });//click to hide alert cookie
	}
}());



</script> -->
