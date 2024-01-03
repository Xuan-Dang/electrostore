<?php 
	include_once "utils/queryString.php";
	include_once "db/db.php";
	include_once "services/products.services.php";
?>
<?php 
	$page = getQueryString("page");
	getProducts();
	switch($page) {
		case "products": {
			include_once "page/products.php";
			break;
		}
		default: {
			include_once "page/home.php";
		}
	}
?>
</body>

</html>