<?php 

require_once("inc/config.php");

$pageTitle = "Home";
$section = "home";
include(ROOT_PATH . 'inc/header.php'); ?>

<div class="container">
	<div class="categories">
		<ul>
			<?php 
				include(ROOT_PATH . "inc/db/database.php");
	    		include(ROOT_PATH . "inc/db/insert-demo-products.php");
	    		insert_demo_data($db);

	    		$categories = $db->query("SELECT * FROM CATEGORIES");
	    		while ($row = $categories->fetch_assoc()) {
	    			echo '<li>' . $row["CATEGORY_NAME"] . '</li>';
	    		}
    		?>
		</ul>
	</div>
	<div class="wrapper">
		<h3 class="feature-title">New Products</h3>
		<div class="pagination">
			<span>1</span>
			<a href="./?pg=2">2</a>
			<a href="./?pg=3">3</a>
			<a href="./?pg=4">4</a>								
		</div>
		<ul id="products">
		<script type="text/javascript">
			var xhr, target, changeListener;
			pageLoaded = function () {
			target = document.getElementById("products");
			xhr = new XMLHttpRequest();
			styleProducts = function (productsArray) {
				var formattedProducts = "";
				for (var i = productsArray.length - 1; i >= 0; i--) {
				 	var product = productsArray[i];
				 	formattedProducts += '<li><a href="#"><h4 class="productName">' 
				 					+ product["PRODUCT_NAME"] + '</h4>'
				 					+ '<img src="<?php echo BASE_URL; ?>' + product["PRODUCT_IMAGE"]
				 					+ '" alt="' + product["PRODUCT_NAME"] + '"><p class="description">'
				 					+ product["PRODUCT_DESCRIPTION"] + '</p></li>';
				 };
				return formattedProducts;
			}
			changeListener = function () {
				if (xhr.readyState === 4 && xhr.status === 200) {
					var productsArray = eval(xhr.responseText);
					target.innerHTML = styleProducts(productsArray);
				} else {
					target.innerHTML = "<p>Something went wrong.</p>";
				}
			};
			xhr.open("GET", "<?php echo BASE_URL; ?>API/GET/products.php", true);
			xhr.onreadystatechange = changeListener;
			xhr.send();
			};
			window.addEventListener("load", pageLoaded);
		</script>
    </ul>
	</div>
</div>

<?php include(ROOT_PATH . 'inc/footer.php'); ?>