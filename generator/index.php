<!-- <?php 

	$file = fopen('first.php', 'w') or die("Unable to open the file ");
	$txt = "<?php \n";
	fwrite($file, $txt);
	$txt = "\techo 'Hello';";
	fwrite($file, $txt);
	fclose($file);
 ?> -->

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Main Form</title>
 	<link rel="stylesheet" type="text/css" href="../app/css/bootstrap.css">
 	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

 </head>
 <body>
 	<form class="container">
 	 	<div class="form-group row">
		  <label for="website-name" class="col-2 col-form-label">Website Name *</label>
		  <div class="col-10">
		    <input class="form-control" type="text" id="website-name" name="website_name" required>
		  </div>
		</div>

		<div class="form-group row">
		  <label for="website-main-url" class="col-2 col-form-label">Website Main URL</label>
		  <div class="col-10">
		    <input class="form-control" type="text" name="website_main_url" id="website-main-url">
		  </div>
		</div>

		<div class="form-group row">
		  <label for="website-category-name" class="col-2 col-form-label">Website Category Name *</label>
		  <div class="col-10">
		    <input class="form-control" type="text" name="website_category_name" id="website-category-name">
		  </div>
		</div>

		<div class="form-group row">
		  <label for="website-category-url" class="col-2 col-form-label">Website Category URL</label>
		  <div class="col-10">
		    <input class="form-control" type="text" name="website_category_url" id="website-category-url">
		  </div>
		</div>

		<div class="form-group row">
		  <label for="main-list-selector" class="col-2 col-form-label">Main List Selector *</label>
		  <div class="col-10">
		    <input class="form-control" type="text" name="main_list_selector" id="main-list-selector">
		  </div>
		</div>

		<div class="form-group row">
		  <label for="small-image-selector" class="col-2 col-form-label">Small Image Selector *</label>
		  <div class="col-10">
		    <input class="form-control" type="text" name="small_image_selector" id="small-image-selector">
		  </div>
		</div>

		<div class="form-group row">
		  <label for="small-image-selector" class="col-2 col-form-label">Small Image Selector *</label>
		  <div class="col-10">
		    <input class="form-control" type="text" name="small_image_selector" id="small-image-selector">
		  </div>
		</div>

		<div class="form-group row">
		  <label for="item-title-selector" class="col-2 col-form-label">Item Title Selector *</label>
		  <div class="col-10">
		    <input class="form-control" type="text" name="item_title_selector" id="item-title-selector">
		  </div>
		</div>

		<div class="form-group row">
		  <label for="item-page-link-selector" class="col-2 col-form-label">Item Page Link Selector *</label>
		  <div class="col-10">
		    <input class="form-control" type="text" name="item_title_selector"                            id="item-page-link-selector">
		  </div>
		</div>

		



	</form>
 	<script src="../app/js/jquery.min.js" ></script>
 	<script src="../app/js/bootstrap.js" ></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 </body>
 </html>