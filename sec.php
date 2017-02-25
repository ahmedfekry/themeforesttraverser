<?php 

ini_set('max_execution_time', 3000);
error_reporting(E_ALL);

require 'html_dom.php';
require 'config.php';

function format_uri( $string, $separator = '-' )
{
    $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
    $special_cases = array( '&' => 'and', "'" => '');
    $string = mb_strtolower( trim( $string ), 'UTF-8' );
    $string = str_replace( array_keys($special_cases), array_values( $special_cases), $string );
    $string = preg_replace( $accents_regex, '$1', htmlentities( $string, ENT_QUOTES, 'UTF-8' ) );
    $string = preg_replace("/[^a-z0-9]/u", "$separator", $string);
    $string = preg_replace("/[$separator]+/u", "$separator", $string);
    return $string;
}

try {
	$conn = new PDO("mysql:host=localhost;dbname=".DATABASE, USERNAME, PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
	echo "<br>";
	$website_name = "themeforest";
	$website_link = ""; // could be null
	$category_name = "wordpress"; 
	$category_link = ""; // could be null

	$website = null;
	$category = null;

	$stmt = $conn->prepare("SELECT * FROM website WHERE name = ?"); 
	$stmt->execute([$website_name]);
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); // set the resulting array to associative
   	$website = $stmt->fetch();

   	if ($website == null) {
   		$stmt = $conn->prepare("INSERT INTO website (name) values (?)");
		$stmt->execute([$website_name]);   

	    $stmt = $conn->prepare("SELECT * FROM website WHERE name = ?"); 
	    $stmt->execute([$website_name]);
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); // set the resulting array to associative
	   	$website = $stmt->fetch();
    }

	$stmt = $conn->prepare("SELECT * FROM category WHERE website_id = ? AND name = ?"); 
	$stmt->execute([$website['id'],$category_name]);
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
   	$category = $stmt->fetch();
   	if ($category == null) {
   		$stmt = $conn->prepare("INSERT INTO category (name,website_id) values (?,?)");
		$stmt->execute([$category_name,$website['id']]);

	   	$stmt = $conn->prepare("SELECT * FROM category WHERE website_id = ? AND name = ?"); 
		$stmt->execute([$website['id'],$category_name]);
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
	   	$category = $stmt->fetch();
   	}

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

			// slug url
			$slug = format_uri($title);

			// meta_element
			$meta_element = str_replace(' ', ',', $title);

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
				$meta_attributes = htmlentities(htmlspecialchars($html->find('.meta-attributes',0)->innertext));

				// price 
				$price = intval(substr($html->find('.js-purchase-price',0)->innertext,1,2));

				// description
				// htmlentities(htmlspecialchars(thehmldata));
				$description = htmlentities(htmlspecialchars($html->find('.user-html',0)->innertext));
				$meta_element .= str_replace(' ',',',$html->find('.user-html',0)->children(1)->innertext);

				$tags = '';
				foreach($html->find('.meta-attributes__attr-tags a') as $e) {
					$tags .=$e->innertext.',';
				}
				$meta_element .=$tags;
				// echo $tags;
				// echo $meta_element;
				// echo "<hr>";
				// break;
				$stmt = $conn->prepare("INSERT INTO item (title,link,small_picture_link,big_picture_link,price,description,meta_data,category_id,meta_element,slug,created_at,updated_at) values (?,?,?,?,?,?,?,?,?,?,?,?)");
				$stmt->execute([$title,$link,$small_image,$big_image,$price,$description,$meta_attributes,$category['id'],$meta_element,$slug,date('Y-m-d H:i:s'),date('Y-m-d H:i:s')]);
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