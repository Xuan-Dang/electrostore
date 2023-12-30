<?php 
	include_once "utils/queryString.php";
	include_once "db/db.php";
?>
<?php 
	$p = getQueryString("p");
	switch($p) {
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