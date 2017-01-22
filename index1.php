<?php 

ini_set('max_execution_time', 3000);
error_reporting(E_ALL);

include('html_dom.php');

function getPage($value='')
{	
	$url = 'https://themeforest.net'.$value;
	$html = file_get_html($url,false);
	// big image
	echo $html->find('.item-preview a img',0)->src;
	echo "<br>";
	// meta-attributes 
	echo $html->find('.meta-attributes',0)->innertext;
	echo "<br>";
	// price 
	echo $html->find('.js-purchase-price',0)->innertext;
	echo "<br>";
	// description
	echo $html->find('.user-html',0)->innertext;
	echo "<br>";
}

for ($i=1; $i < 60; $i++) { 
	# code...
	$url = 'https://themeforest.net/category/wordpress?page='.$i;
	// Retrieve the DOM from a given URL
	$html = file_get_html($url,false);

	foreach($html->find('.product-list__columns-container') as $e) {
		// small image
		echo "<img src='".$e->getElementByTagName('img')->src ."'></img>";
		echo "<br>";
		// title
		echo $e->getElementByTagName('h3')->getElementByTagName('a')->innertext;
		echo "<br>";
		// link
		echo "<a target='_blank' href='themeforest.net/".$e->getElementByTagName('h3')->getElementByTagName('a')->href."'>link</a>";
		echo "<br>";
		getPage($e->getElementByTagName('h3')->getElementByTagName('a')->href);
		echo "<br><hr>";

	}
}
    
 ?>
