<?php 


function fetch_date_($mainCategory,$category_name,$main_link,$number_of_pages,$sub_link)
{
	$response = array();
	try {
		$conn = new PDO("mysql:host=localhost;dbname=".DATABASE, USERNAME, PASSWORD);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    echo "Connected successfully";
		echo "<br>";
		$m_category = null;
		$category = null;
		$stmt = $conn->prepare("SELECT * FROM main_category WHERE name = ?"); 
		$stmt->execute([$mainCategory]);
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); // set the resulting array to associative
	   	$m_category = $stmt->fetch();
	   	if ($m_category == null) {
	   		$stmt = $conn->prepare("INSERT INTO main_category (name) values (?)");
			$stmt->execute([$mainCategory]);   
		    $stmt = $conn->prepare("SELECT * FROM main_category WHERE name = ?"); 
		    $stmt->execute([$mainCategory]);
		    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); // set the resulting array to associative
		   	$m_category = $stmt->fetch();
	    }
		$stmt = $conn->prepare("SELECT * FROM category WHERE main_category_id = ? AND name = ?"); 
		$stmt->execute([$m_category['id'],$category_name]);
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
	   	$category = $stmt->fetch();
	   	if ($category == null) {
	   		$stmt = $conn->prepare("INSERT INTO category (name,main_category_id) values (?,?)");
			$stmt->execute([$category_name,$m_category['id']]);
		   	$stmt = $conn->prepare("SELECT * FROM category WHERE main_category_id = ? AND name = ?"); 
			$stmt->execute([$m_category['id'],$category_name]);
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		   	$category = $stmt->fetch();
	   	}
		for ($i=1; $i <= $number_of_pages; $i++) { 
			# code...
			$url = $sub_link.$i;
			// echo $url;
			// Retrieve the DOM from a given URL
			$html = file_get_html($url,false);
			foreach($html->find('.product-grid__inside') as $e) {
				// small image
				$small_image = $e->getElementByTagName('img')->src;
				// title
				$title = $e->getElementByTagName('h3')->getElementByTagName('a')->innertext;
				// slug url
				$slug = format_uri($title);
				// meta_element
				$meta_element = str_replace(' ', ',', $title);
				$meta_element .='free,premium,download';
				$meta_description = '';
				$stmt = $conn->prepare("SELECT * FROM item WHERE title = ?"); 
				$stmt->execute([$title]);
				$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
			   	$item = $stmt->fetch();
			   	if ($item == null) {
			   		// link
					$link = $main_link.$e->getElementByTagName('h3')->getElementByTagName('a')->href;
					$html = file_get_html($link,false);
					// big image
					$big_image = $html->find('.item-preview img',0)->src;
					// meta-attributes 
					$meta_attributes = htmlentities(htmlspecialchars($html->find('.meta-attributes',0)->innertext));
					// price 
					$price = intval(substr($html->find('.js-purchase-price',0)->innertext,1,2));
					// description
					// htmlentities(htmlspecialchars(thehmldata));
					$description = htmlentities(htmlspecialchars($html->find('.item-description',0)->innertext));
					$meta_description = strip_tags($html->find('.item-description p',0)->innertext);
					$meta_description .= 'free,premium,download';
					$tags = '';
					foreach($html->find('.meta-attributes__attr-tags a') as $e) {
						$tags .=$e->innertext.',';
					}
					$meta_element .=$tags;

					$stmt = $conn->prepare("INSERT INTO item (title,link,small_picture_link,big_picture_link,price,description,meta_data,category_id,meta_element,meta_description,slug,created_at,updated_at) values (?,?,?,?,?,?,?,?,?,?,?,?,?)");
					$stmt->execute([$title,$link,$small_image,$big_image,$price,$description,$meta_attributes,$category['id'],$meta_element,$meta_description,$slug,date('Y-m-d H:i:s'),date('Y-m-d H:i:s')]);
					array_push($response,"inserted");
			   	}else{
					array_push($response,"no update");
			   	}
			}
		}
	} catch (PDOException $e) {
		echo "Connection Failed with message : ".$e->getMessage();
	}
		echo json_encode($response);
}
	
?>