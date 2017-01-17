<?php 

ini_set('max_execution_time', 3000);
error_reporting(E_ALL);

include('html_dom.php');

// Retrieve the DOM from a given URL
$html = file_get_html('https://themeforest.net/category/wordpress?page=2',false);

function getPage($value='')
{
	$url = 'https://themeforest.net'.$value;
	$html = file_get_html($url,false);
	echo $html->find('.user-html ul',0)->innertext;
}
$i = 0;
foreach($html->find('.product-list__columns-container') as $e) {
	echo "<img src='".$e->getElementByTagName('img')->src ."'></img>";
	echo $e->getElementByTagName('h3')->getElementByTagName('a')->innertext;
	echo "<br>";
	echo $e->getElementByTagName('h3')->getElementByTagName('a')->href;
	getPage($e->getElementByTagName('h3')->getElementByTagName('a')->href);
	echo "<br><hr>";

}
    


 ?>