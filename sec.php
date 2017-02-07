<?php 

ini_set('max_execution_time', 3000);
error_reporting(E_ALL);

require 'html_dom.php';
require 'config.php';

try {
	$conn = new PDO("mysql:host=localhost;dbname=".DATABASE, USERNAME, PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
	echo "<br>";
	
    $stmt = $conn->prepare("SELECT * FROM website WHERE name = ?"); 
    $stmt->execute(['themeforest']);

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
   	$row = $stmt->fetch();
    
	$stmt = $conn->prepare("SELECT * FROM category WHERE website_id = ?"); 
	$stmt->execute([$row['id']]);
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
   	$row = $stmt->fetch();
	// var_dump($row);
	for ($i=1; $i < 3; $i++) { 
		# code...
		$url = 'https://themeforest.net/category/wordpress?page='.$i;
		// Retrieve the DOM from a given URL
		$html = file_get_html($url,false);

		foreach($html->find('.product-list__columns-container') as $e) {
			// small image
			$small_image = $e->getElementByTagName('img')->src;
			
			// title
			$title = $e->getElementByTagName('h3')->getElementByTagName('a')->innertext;
			$stmt = $conn->prepare("SELECT * FROM item WHERE title = ?"); 
			$stmt->execute([$title]);
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		   	$item = $stmt->fetch();
		   	if ($item == null) {
		   		// link
				$link = "https://themeforest.net".$e->getElementByTagName('h3')->getElementByTagName('a')->href;
				
				$html = file_get_html($link,false);
				
				// big image
				$big_image = $html->find('.item-preview a img',0)->src;

				// meta-attributes 
				$meta_attributes = $html->find('.meta-attributes',0)->innertext;

				// price 
				$price = $html->find('.js-purchase-price',0)->innertext;

				// description
				// htmlentities(htmlspecialchars(thehmldata));
				$description = htmlentities(htmlspecialchars($html->find('.user-html',0)->innertext));

				$stmt = $conn->prepare("INSERT INTO item (title,link,small_picture_link,big_picture_link,price,description,meta_data,category_id) values (?,?,?,?,?,?,?,?)");
				$stmt->execute([$title,$link,$small_image,$big_image,$price,$description,$meta_attributes,$row['id']]);
				echo "inserted";
		   		echo "<br>";

		   	}else{

		   		echo "no update";
		   		echo "<br>";
		   	
		   	}

		}
	}

} catch (PDOException $e) {
	echo "Connection Failed with message : ".$e->getMessage();
}
?>