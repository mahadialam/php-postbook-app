<?php include "inc/header.php" ?>
<?php
    include_once 'lib/Session.php';
    Session::checkSession();
    
    include_once 'lib/Database.php';
    include_once 'lib/config.php';
    include_once 'helpers/format.php';
    $db = new Database();
    $fm = new format();
?>

<!-- Add your site or application content here -->
<div class="container">
 
<section class="head darkmode">
	<div class="row mt-3">
		<div class="d-flex justify-content-start col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<div class="title">
				<strong><sapan class="sitename">POST BOOK</span></strong>
			</div>
		</div>
		<?php 
			if (isset($_GET['action']) && $_GET['action'] === 'logout') {
				Session::destroy();
			}
		?>
		<div class="button d-flex justify-content-end col-xs-6 col-sm-6 col-md-6 col-lg-6">
			
			<div class="button">
				<a href="?action=logout" class="logout btn btn-danger lgindex">Logout</a>
			</div>
		</div>
	</div>
</section>
<section class="username">
	<div class="row col-sm-12">
		<div class="p-3 d-flex justify-content-center">
			<span class="usernamer">
				<?php echo 'Hello '.$_SESSION['username'].' ! Welcome'?>
				<?php echo ' Date : '.date('d m Y');?>
			</span>
		</div>
		
	</div>
</section>

<section class="d-flex justify-content-center">
	<div class="row mt-3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<a href="insert.php" class="btn btn-primary">Create a post</a>
	</div>
</section>



<div class="text-center mt-4">
	<?php
		if (isset($_GET['succmsg'])) {
			echo $_GET['succmsg'];
		}
	?>
</div>



<?php 
	$query  = "SELECT * FROM post_info ORDER BY id DESC";
	$read = $db->select($query);
	$folder  = "uploads/";
?>

<?php if ($read) { 
	$contentId="";
	$xy=0;
	while ($row = $read->fetch_assoc()) { 
	$xy++;
	$contentId="mycontent".$xy;
?>
<section class="content darkmode">
	<div class="row mt-4 mb-4 pt-4 d-flex justify-content-center text-center">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<img src="<?php echo $folder.$row['img'];?>" width="200px"/>
		    <h5 class="mt-3"><?php echo $row['name'];?></h5>
		    <p style="color: #999;"><?php echo "Post by user";?></p>
		    <p class="p-3 postdesc" id="<?php echo $contentId;?>"><?php echo $row['description'];?></p>
		    <a class="btn btn-primary mb-3" onclick="myCustomFunction('<?php echo $contentId;?>')">Learn more</a>

		    <script type="text/javascript">
		    	//function for card text
			    function myCustomFunction(contentId){
	      			$("#"+contentId).toggle();

	      		}
		    </script>

		</div>
	</div>	
</section>
<?php } }else{ echo "<h5 class='err'>Data not found in the database !</h5>"; }?>
</div>
</div>

<?php include "inc/footer.php" ?>
