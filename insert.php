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
 
<section class="head darkmode mt-3">
	<div class="row mt-3">
		<div class="d-flex justify-content-start col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="title">
				<strong><sapan class="sitename sitenameinsert">POST BOOK</span></strong>
			</div>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 mt-2 d-flex justify-content-center">
			<span class="usernamer">
				<?php echo 'Date : '.date('d m Y');?>
			</span>
		</div>
		<?php 
			if (isset($_GET['action']) && $_GET['action'] === 'logout') {
				Session::destroy();
			}
		?>
		<div class="d-flex justify-content-end col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="button">
				<a href="?action=logout" class="logout btn btn-danger lginsert">Logout</a>
			</div>
		</div>
	</div>
</section>

<section class="username">
	<div class="row col-sm-12">
		
		
	</div>
</section>

<section class="form darkmode">
	<div class="row">
	</div>
	<div class="d-flex justify-content-center">
		<div class="row col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<?php 
				if (isset($_POST['btnpost'])){

					$personname = $_POST['personname'];
					$file_name = $_FILES['image']['name'];
					$description = $_POST['description'];
					
					$permited = array('jpg','jpeg','png','gif');
					$file_size = $_FILES['image']['size'];
					$file_tmp = $_FILES['image']['tmp_name'];
					$div = explode('.', $file_name);
				    $file_ext = strtolower(end($div));
				    $unique_image_name = substr(md5(time()), 0, 10).'.'.$file_ext;
					$folder  = "uploads/";
					

					


					if (empty($personname & $description & $file_name)) {
						echo "<span class='error'>Feild must be not empty !</span>";
					}elseif($file_size > 1048576){
						echo "<span class='mt-3 err'>Image size should be less than 1 MB !</span>";
					}elseif(in_array($file_ext, $permited) == false){
						echo "<span class='mt-3 err'>You can upload only :- ".implode(' , ', $permited)." !</span>";
					}else{
						move_uploaded_file($file_tmp, $folder.$unique_image_name);
						$query = "INSERT INTO post_info(name, img, description) VALUES ('$personname','$unique_image_name','$description')";
						$result = $db->insert($query);

						if ($result) {
							header("location: index.php?succmsg=<span class='success'>You are successfully posted</span>");
						}else{
							echo "Image is not inserted !";
						}
					}
				}
			?>
			<form action="" method="POST" enctype="multipart/form-data">
			  	<div class="mb-3">
					<label for="text" class="form-label mt-3">Person Name:</label>
				    <input type="text" class="form-control" id="text" placeholder="Enter person name" name="personname">

				    <div class="showimg">
				    	<img src="" width="200" id="showimg">
				    </div>

				    <label for="fileupload" class="form-label mt-3">Select image:</label>
			 		<input name="image" class="form-control" type="file" id="fileupload" >

				    <label for="comment" class="form-label mt-3">Description:</label>
					<textarea class="form-control" rows="5" id="comment" name="description"></textarea>
				</div>
			   <button name="btnpost" type="submit" class="btn btn-primary" id="post">Post</button>
			   <a href="index.php" class="btn btn-primary">Go back</a>
			</form>	
		</div>
	</div>
	
</section>

<?php include "inc/footer.php" ?>
