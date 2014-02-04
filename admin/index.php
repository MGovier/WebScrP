<?php 

require_once("../inc/config.php");

$pageTitle = "Admin";
$section = "adminhome";
include(ROOT_PATH . 'inc/header.php'); ?>
<script src="<?php echo BASE_URL; ?>admin/OnShopAdminScripts.js"></script>

<div class="container">
	<div id="sideoptions">
		<ul>
		<li id="stockLevels">Manage items</li>
		<li id="productAddFormToggle">Add an item</li>
		<li id="manageCategories">Manage categories</li>
		<li id="addCategoryToggle">Add a category</li>
		</ul>
	</div>
		<h3 id="feature-title">Admin Control</h3>

		<div id="dynamic-content">
    	</div>
    		
</div>

<?php include(ROOT_PATH . 'inc/footer.php'); ?>