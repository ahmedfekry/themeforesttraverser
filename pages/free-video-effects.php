<?php 
ini_set('max_execution_time', 3000);
error_reporting(E_ALL);
require 'html_dom.php';
require 'config.php';

// echo json_encode($response);
$response = array();
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
	$maincategory = "video-effects";
	$subcategory = "free-video-effects"; 

	$main_category = null;
	$category = null;

	$stmt = $conn->prepare("SELECT * FROM main_category WHERE name = ?"); 
	$stmt->execute([$maincategory]);
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); // set the resulting array to associative
   	$main_category = $stmt->fetch();

   	if ($main_category == null) {
   		$stmt = $conn->prepare("INSERT INTO main_category (name) values (?)");
		$stmt->execute([$maincategory]);
	    $stmt = $conn->prepare("SELECT * FROM main_category WHERE name = ?"); 
	    $stmt->execute([$maincategory]);
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); // set the resulting array to associative
	   	$main_category = $stmt->fetch();
    }

	$stmt = $conn->prepare("SELECT * FROM category WHERE main_category_id = ? AND name = ?"); 
	$stmt->execute([$main_category['id'],$subcategory]);
	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
   	$category = $stmt->fetch();
   	if ($category == null) {
   		$stmt = $conn->prepare("INSERT INTO category (name,main_category_id) values (?,?)");
		$stmt->execute([$subcategory,$main_category['id']]);
	   	$stmt = $conn->prepare("SELECT * FROM category WHERE main_category_id = ? AND name = ?"); 
		$stmt->execute([$main_category['id'],$subcategory]);
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
	   	$category = $stmt->fetch();
   	}
	//  var_dump($row);
	for ($i=2; $i < 16; $i++) { 
		# code...
		$url = 'https://www.cutestockfootage.com/most-popular/'.$i;
		// Retrieve the DOM from a given URL
		$html = file_get_html($url,false);
		foreach($html->find('.portfolio-item') as $e) {
			// small image
			$small_image = $e->getElementByTagName('img')->src;
			$big_image = $e->getElementByTagName('img')->src;
			// title
			$title = $e->getElementByTagName('a')->getElementByTagName('p')->innertext;
			
			// slug url
			$slug = format_uri($title);
			// meta_element
			$meta_element = str_replace(' ', ',', $title);
			$meta_description = '';
			$stmt = $conn->prepare("SELECT * FROM item WHERE title = ?"); 
			$stmt->execute([$title]);
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		   	$item = $stmt->fetch();
		   	if ($item == null) {
		   		// link
				$link = $e->getElementByTagName('a')->href;
				$html = file_get_html($link,false);
				// video
				$video_link = $html->find('.embed-responsive-item',0)->src;
				// description
				// htmlentities(htmlspecialchars(thehmldata));
				$description = htmlentities(htmlspecialchars($html->find('.col-md-8 p',2)));
				
				$meta_description = strip_tags($html->find('.col-md-8 p',0)->innertext);
				
				
				$stmt = $conn->prepare("INSERT INTO item (title,link,small_picture_link,big_picture_link,video_link,description,category_id,meta_element,meta_description,slug,created_at,updated_at) values (?,?,?,?,?,?,?,?,?,?,?,?)");

				$stmt->execute([$title,$link,$small_image,$big_image,$video_link,$description,$category['id'],$meta_element,$meta_description,$slug,date('Y-m-d H:i:s'),date('Y-m-d H:i:s')]);
				array_push($response,"inserted");
		   	}else{
		   		// echo ;
				array_push($response,"no update");
		   	}
		}
	}
} catch (PDOException $e) {
	echo "Connection Failed with message : ".$e->getMessage();
}
	echo json_encode($response);	
?>