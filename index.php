<?php 
	include_once "utils/queryString.php";
	include_once "db/db.php";
?>
<?php 
	$page = getQueryString("page");
	switch($page) {
		case "products": {
			include_once "page/products.php";
			break;
		}
		case "single-product": {
			include_once "page/single-product.php";
			break;
		}
		default: {
			include_once "page/home.php";
		}
	}
?>
</body>

</html>

